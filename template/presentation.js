// @license magnet:?xt=urn:btih:1f739d935676111cfff4b4693e3816e664797050&dn=gpl-3.0.txt GPL-v3-or-Later
function getSection(num){
    return sections[num];
}
function findPos(obj) {
    var curtop = 0;
    if (obj.offsetParent) {
        do {
            curtop += obj.offsetTop;
        } while (obj = obj.offsetParent);
        return [curtop];
    }
}
function launchIntoFullscreen(element) {
  if(element.requestFullscreen) {
    element.requestFullscreen();
  } else if(element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if(element.webkitRequestFullscreen) {
    element.webkitRequestFullscreen();
  } else if(element.msRequestFullscreen) {
    element.msRequestFullscreen();
  }
}
function update(){
    container.scroll(0,findPos(section));
    slideparameter="?slide="+slidenum;
    animstateparameter="&";
    if(slidenum==0){
        slideparameter="";
        animstateparameter="?";
    }
    animstateparameter+="animstate="+animstate;
    if(animstate==0){
        animstateparameter="";
    }
    window.history.replaceState(null,"Slide "+slidenum,location.pathname+slideparameter+animstateparameter);
    updateData();
}
function updateData(){
    setData("pagenum", slidenum+1);
    setData("totalpages", sections.length);
}
function setData(name, data){

    elements=document.querySelectorAll(".data-"+name)
    for(i=0;i<elements.length;i++){
        elements[i].innerHTML=data;
    };
}

function sortAnimItems(nodelist){
    var itemsArray=Array.prototype.slice.call(nodelist, 0);
    itemsArray=itemsArray.sort(function(a,b){
        return a.dataset.order > b.dataset.order;
    });
    return itemsArray;
}
function getvar(name){
    var get = unescape(window.location.search) + '&';
    var regex = new RegExp('.*?[&\\?]' + name + '=(.*?)&.*');
    value = get.replace(regex, "$1");
    return value == get ? false : value;
}
function prev(){
    items=section.querySelectorAll("*[data-order]");
    if(items[animstate-1]){
        var items=sortAnimItems(items);
        var cur=items[animstate-1];
        cur.classList.remove("visible");
        animstate-=1;
    }else{
        slidenum-=1;
        var updateanim=true;
        if(slidenum<0){
            slidenum=0
            animstate=0;
            updateanim=false;

        }
        section=getSection(slidenum);
        if(updateanim){
            items=section.querySelectorAll("*[data-order]");
            animstate=items.length;
        }
    }
    update();
}
function next(){
    items=section.querySelectorAll("*[data-order]");
    if(items[animstate]){
        var items=sortAnimItems(items);
        var cur=items[animstate];
        cur.classList.add("visible");
        animstate+=1;
    }else{
        slidenum+=1;
        animstate=0;
        section=getSection(slidenum);
        if(!section){
            slidenum-=1;
            section=getSection(slidenum);
        }
    }
    update();
}
container=document.querySelector(".browser-presentation-tool");
container.classList.remove("no-js");
container.classList.add("js-loaded");
if(window.self !== window.top){
    container.classList.add("iframed");
}
var sections=document.querySelectorAll('section');
var targetslide=getvar("slide");
if(!targetslide){
    targetslide=0;
}
var targetanimstate=getvar("animstate");
if(!targetanimstate){
    targetanimstate=0;
}
var slidenum=0
var animstate=0
var section=getSection(slidenum);
while(slidenum<targetslide){
    next();
    if(slidenum>=sections.length-1){
        targetslide=slidenum;
    }
}
while(animstate<targetanimstate){
    var items=section.querySelectorAll("*[data-order]");
    if(targetanimstate>=items.length){
        targetanimstate=items.length-1;
        if(targetanimstate<0){
            targetanimstate=0;
        }
    }else{
        next();
    }
}
update();

document.addEventListener('keydown', function(e){
    var nextkeys=[32,34,39,40,13];
    var prevkeys=[33,8,37,38];
    var fullscreenkeys=[70];
    if(nextkeys.includes(e.keyCode)){
        next();
    }else if(prevkeys.includes(e.keyCode)){
        prev();
    }else if(fullscreenkeys.includes(e.keyCode)){
        launchIntoFullscreen(container);
    }
});
// @license-end
