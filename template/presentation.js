// @license magnet:?xt=urn:btih:1f739d935676111cfff4b4693e3816e664797050&dn=gpl-3.0.txt GPL-v3-or-Later
const getSection = (num) => {
    return sections[num]
}
const findPos = (obj) => {
    let curtop = 0
    if (obj.offsetParent) {
        do {
            curtop += obj.offsetTop
        } while ((obj = obj.offsetParent))
        return [curtop]
    }
}
const launchIntoFullscreen = (element) => {
    if (element.requestFullscreen) {
        element.requestFullscreen()
    } else if (element.mozRequestFullScreen) {
        element.mozRequestFullScreen()
    } else if (element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen()
    } else if (element.msRequestFullscreen) {
        element.msRequestFullscreen()
    }
}
const update = () => {
    container.scroll(0, findPos(section))
    let slideparameter = `?slide=${slidenum}`
    let animstateparameter = "&"
    if (slidenum === 0) {
        slideparameter = ""
        animstateparameter = "?"
    }
    animstateparameter += `animstate=${animstate}`
    if (animstate === 0) {
        animstateparameter = ""
    }
    window.history.replaceState(
        null,
        `Slide ${slidenum}`,
        location.pathname + slideparameter + animstateparameter
    )
    updateData()
}
const updateData = () => {
    setData("pagenum", slidenum + 1)
    setData("totalpages", sections.length)
}
const setData = (name, data) => {
    const elements = document.querySelectorAll(`.data-${name}`)
    for (let i = 0; i < elements.length; i++) {
        elements[i].innerHTML = data
    }
}

const sortAnimItems = (nodelist) => {
    let itemsArray = Array.prototype.slice.call(nodelist, 0)
    itemsArray = itemsArray.sort((a, b) => {
        return a.dataset.order > b.dataset.order
    })
    return itemsArray
}
const getvar = (name) => {
    const get = `${unescape(window.location.search)}&`
    const regex = new RegExp(`.*?[&\\?]${name}=(.*?)&.*`)
    const value = get.replace(regex, "$1")
    return value === get ? false : value
}
const prev = () => {
    let items = section.querySelectorAll("*[data-order]")
    if (items[animstate - 1]) {
        items = sortAnimItems(items)
        const cur = items[animstate - 1]
        cur.classList.remove("visible")
        animstate -= 1
    } else {
        slidenum -= 1
        let updateanim = true
        if (slidenum < 0) {
            slidenum = 0
            animstate = 0
            updateanim = false
        }
        section = getSection(slidenum)
        if (updateanim) {
            items = section.querySelectorAll("*[data-order]")
            animstate = items.length
        }
    }
    update()
}
const next = () => {
    let items = section.querySelectorAll("*[data-order]")
    if (items[animstate]) {
        items = sortAnimItems(items)
        const cur = items[animstate]
        cur.classList.add("visible")
        animstate += 1
    } else {
        slidenum += 1
        animstate = 0
        section = getSection(slidenum)
        if (!section) {
            slidenum -= 1
            section = getSection(slidenum)
        }
    }
    update()
}
const container = document.querySelector(".browser-presentation-tool")
container.classList.remove("no-js")
container.classList.add("js-loaded")
if (window.self !== window.top) {
    container.classList.add("iframed")
}
const sections = document.querySelectorAll("section")
let targetslide = getvar("slide")
if (!targetslide) {
    targetslide = 0
}
let targetanimstate = getvar("animstate")
if (!targetanimstate) {
    targetanimstate = 0
}
let slidenum = 0
let animstate = 0
let section = getSection(slidenum)
while (slidenum < targetslide) {
    next()
    if (slidenum >= sections.length - 1) {
        targetslide = slidenum
    }
}
while (animstate < targetanimstate) {
    const items = section.querySelectorAll("*[data-order]")
    if (targetanimstate >= items.length) {
        targetanimstate = items.length - 1
        if (targetanimstate < 0) {
            targetanimstate = 0
        }
    } else {
        next()
    }
}
update()

document.addEventListener("keydown", (e) => {
    const nextkeys = [32, 34, 39, 40, 13]
    const prevkeys = [33, 8, 37, 38]
    const fullscreenkeys = [70]
    if (nextkeys.includes(e.keyCode)) {
        next()
    } else if (prevkeys.includes(e.keyCode)) {
        prev()
    } else if (fullscreenkeys.includes(e.keyCode)) {
        launchIntoFullscreen(container)
    }
})
// @license-end
