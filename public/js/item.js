const couleurItems = ["#9d9d9d", "#fff", "#1eff00", "#0081ff", "#c600ff", "#ff8000", "#e5cc80", "#0cf"];

function ajaxGetStats(itemId){
  let item = new XMLHttpRequest();
    item.open("GET", "https://eu.api.battle.net/wow/item/" + itemId + "?locale=fr_FR&apikey=ku2wn4dac3gcfeb7vjubk927g2bmsfn3");
    item.addEventListener("load",function () {
    const statsItem = JSON.parse(item.responseText);
    itemInfo(statsItem);
    });
    item.send(null);
}


  function itemInfo(statsItem){
    let itemQuality = statsItem['quality'];
      let color = couleurItems[itemQuality];

      let itemName = document.getElementById("itemName");
      let itemImg = document.getElementById("itemImg");
      itemName.style.color = couleurItems[itemQuality];
      itemImg.style.border = "3px solid"+ couleurItems[itemQuality];

  }


