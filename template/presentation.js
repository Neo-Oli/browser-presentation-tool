var slidenum=1;
var section=getSection(slidenum);
function getSection(num){
    return document.querySelector('section:nth-of-type('+num+')')
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
function update(){
    window.scroll(0,findPos(section));
}

function sortAnimItems(nodelist){
    var itemsArray=Array.prototype.slice.call(nodelist, 0);
    itemsArray=itemsArray.sort(function(a,b){
        return a.dataset.order > b.dataset.order;
    });
    return itemsArray;
}
function prev(){
    items=section.querySelectorAll("*[data-order].visible");
    if(items[0]){
        var items=sortAnimItems(items);
        var cur=items.slice(-1)[0];
        cur.classList.remove("visible");
    }else{
        slidenum-=1;
        if(slidenum==0){
            slidenum=1
        }
        section=getSection(slidenum);
        update();
    }
}
function next(){
    items=section.querySelectorAll("*[data-order]:not(.visible)");
    if(items[0]){
        var items=sortAnimItems(items);
        var cur=items[0];
        cur.classList.add("visible");
    }else{
        slidenum+=1;
        section=getSection(slidenum);
        if(!section){
            slidenum-=1;
            section=getSection(slidenum);
        }
        update();
    }
}
document.addEventListener('keydown', function(e){
    var nextkeys=new Array(32,34,39,40,13);
    var prevkeys=new Array(33,8,37,38);
    console.log(e.keyCode);
    if(nextkeys.includes(e.keyCode)){
        next();
    }else if(prevkeys.includes(e.keyCode)){
        prev();
    }
});
//window.addEventListener('wheel', function(e) {
    //if (e.deltaY < 0) {
        //prev();
    //}else if (e.deltaY > 0) {
        //next();
    //}
//});
