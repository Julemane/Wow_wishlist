const colorsItems = ["#9d9d9d", "#fff", "#1eff00", "#0081ff", "#c600ff", "#ff8000", "#e5cc80", "#0cf"];
const bind = ["","Lié quand ramassé","Lié quand équipé"];


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
      let itemStatsUl = document.getElementById("itemStats");
      let itemName = document.getElementById("itemName");
      let itemImg = document.getElementById("itemImg");
      let itemLvl = document.getElementById("itemLvl");
      let itemArmor = document.getElementById("armor");
      let itemBind = document.getElementById("bind");
      let itemDurability = document.getElementById("durability");
      let itemLvlRequiered = document.getElementById("itemLvlRequiered");
      let onUse = document.createElement('li');




      itemName.style.color = colorsItems[statsItem['quality']];
      itemImg.style.border = "3px solid"+ colorsItems[statsItem['quality']];

      itemLvl.innerHTML = "Niveau d'objet " + statsItem['itemLevel'];
      itemLvl.style.color = "#ffd100";

      itemArmor.innerHTML = "Armure : " + statsItem['baseArmor'];

      itemBind.innerHTML = bind[statsItem['itemBind']];

      itemDurability.innerHTML = "Durabilité : "+statsItem['maxDurability']+"/"+statsItem['maxDurability'];

      //Creation de la puce itemSpell si defini dans la reponse
      let spells = statsItem['itemSpells'][0];
      if(spells){
        itemStats.appendChild(onUse);
        onUse.innerHTML = "Utiliser: " + spells.scaledDescription;
        onUse.style.color = "#1eff00";
      }

      itemLvlRequiered.innerHTML = "Niveau"+ " " + statsItem['requiredLevel'] + " " + "requis";











  }


