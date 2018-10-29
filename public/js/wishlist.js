
function getItemsStats(itemId){
  let item = new XMLHttpRequest();
    item.open("GET", "https://eu.api.battle.net/wow/item/" + itemId + "?locale=fr_FR&apikey=ku2wn4dac3gcfeb7vjubk927g2bmsfn3");
    item.addEventListener("load",function () {
      const statsItem = JSON.parse(item.responseText);
      wishlistItemInfo(statsItem);
    });
    item.send(null);
}

//Create Item Info on the table (itemImg, itemName)
function wishlistItemInfo(statsItem){

    let item = document.getElementsByClassName("item"+statsItem.id);
    let itemDetailList = document.getElementById("itemDetailList");
    if(!item[0]){
      return;
    }
    item[0].setAttribute('data-loaded', true);
    let itemName = item[0].children[2];
    let itemImg = item[0].children[0];

    itemName.innerHTML = statsItem.name;
    itemName.style.color = colorsItems[statsItem.quality];
    itemImg.children[0].src = 'https:/render-eu.worldofwarcraft.com/icons/56/'+statsItem.icon+'.jpg';
    itemImg.children[0].style.border = "3px solid"+ colorsItems[statsItem.quality];

    //Get bonus stats on MouseOver ItemImg
    itemImg.children[0].addEventListener("mouseover",function(event){
      ajaxGetStats(statsItem.id, itemDetailList);

      itemDetailList.style.left = (110+event.offsetX)+ "px";
      itemDetailList.style.top = (event.pageY-400) + "px";

    })
    //Mousse leaving ItemImg
    itemImg.children[0].addEventListener("mouseleave",function(){
      cleanItemStats();
      itemDetailList.style.display = "none";
   })
    //Touch Event
   itemImg.children[0].addEventListener("touchstart",function(event){
    event.preventDefault();
    ajaxGetStats(statsItem.id);
      itemDetailList.style.left = (50+event.offsetX)+ "px";
      itemDetailList.style.top = (event.pageY-400) + "px";
      itemDetailList.style.display = "block";
   }, false)
   itemImg.children[0].addEventListener("touchend",function(e){
      itemDetailList.style.display = "none";
      cleanItemStats();
   }, false)
}

function cleanItemStats(){
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

}
function fillRow(row, data){
  if(row.getAttribute('data-loaded') == "true"){
    return;
  }
  getItemsStats(data[1]);
}
