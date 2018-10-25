
function getItemsStats(itemId){

  let item = new XMLHttpRequest();
    item.open("GET", "https://eu.api.battle.net/wow/item/" + itemId + "?locale=fr_FR&apikey=ku2wn4dac3gcfeb7vjubk927g2bmsfn3");

    item.addEventListener("load",function () {
      const statsItem = JSON.parse(item.responseText);
      wishlistItemInfo(statsItem);
    });
    item.send(null);
}

//Create Item Info on the table
function wishlistItemInfo(statsItem){

    let item = document.getElementsByClassName("item"+statsItem.id);
    let itemDetailList = document.getElementById("itemDetailList");
    //item[0] = current Item children[2] = 3rd col in table
    let itemName = item[0].children[2];
    let itemImg = item[0].children[0];

    itemName.innerHTML = statsItem.name;
    itemImg.children[0].src = 'https:/render-eu.worldofwarcraft.com/icons/56/'+statsItem.icon+'.jpg';
    itemImg.children[0].style.border = "3px solid"+ colorsItems[statsItem.quality];

    //Get bonus stats on MouseOver ItemImg
    itemImg.children[0].addEventListener("mouseover",function(){
      ajaxGetStats(statsItem.id);

      document.onmousemove = position;
      function position(e) {
        x = (navigator.appName.substring(0,3) == "Net") ? e.pageX : event.x+document.body.scrollLeft;
        y = (navigator.appName.substring(0,3) == "Net") ? e.pageY : event.y+document.body.scrollTop;
        }

        itemDetailList.style.display = "block";
        itemDetailList.style.left = x-10 +"%"
        itemDetailList.style.top = y-10 +"%"

    })

    //Mousse leaving ItemImg
    itemImg.children[0].addEventListener("mouseleave",function(){

      itemDetailList.style.display = "none";
      let onUseElt = document.getElementsByClassName("onUse");
      let bonusStat1Elt = document.getElementsByClassName("bonusStat_1");
      let itemDescription = document.getElementById("itemDescription");

      [...onUseElt].forEach(function(elt){
        itemStats.removeChild(elt);
      });

      [...bonusStat1Elt].forEach(function(elt){
          itemStats.removeChild(elt);
      });

      if(itemDescription){
        itemStats.removeChild(itemDescription);
      }

    })

}




