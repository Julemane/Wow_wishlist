const colorsItems = ["#9d9d9d", "#fff", "#1eff00", "#0081ff", "#c600ff", "#ff8000", "#e5cc80", "#0cf"];
const bind = ["","Lié quand ramassé","Lié quand équipé"];
const bonusStats = {
  "3":"Agilité",
  "4":"Force",
  "5":"Intelligence",
  "7":"Endurance",
  "32":"Coup critique",
  "36":"Hâte",
  "40":"Polyvalence",
  "49":"Maitrise",
  "63":"Evitement",
  "71":"Agilité ou Force ou Intelligence",
  "72":"Agilité ou Force",
  "73":"Agilité ou Intelligence",
  "74":"Force ou Intelligence"
}

function ajaxGetStats(itemId, itemDetailList){
  let item = new XMLHttpRequest();
    item.open("GET", "https://eu.api.battle.net/wow/item/" + itemId + "?locale=fr_FR&apikey=ku2wn4dac3gcfeb7vjubk927g2bmsfn3");
    item.addEventListener("load",function () {
      const statsItem = JSON.parse(item.responseText);
      itemInfo(statsItem);
      if(itemDetailList){
        itemDetailList.style.display = "block";
      }

    });
    item.send(null);
}

//Item Stats Area on search result
function itemInfo(statsItem){
    let itemStats = document.getElementById("itemStats");
    let itemName = document.getElementById("itemName");
    let itemImg = document.getElementById("itemImg");
    let itemLvl = document.getElementById("itemLvl");
    let itemArmor = document.getElementById("armor");
    let itemBind = document.getElementById("bind");
    let itemDurability = document.getElementById("durability");
    let itemLvlRequiered = document.getElementById("itemLvlRequiered");

    let itemDescElt = document.createElement('li');
    let itemBonusStatsElt = document.createElement('li');

    if(itemImg){
       itemImg.style.border = "3px solid"+ colorsItems[statsItem.quality];
     };
    itemName.innerHTML = statsItem.name;
    itemName.style.color = colorsItems[statsItem.quality];
    itemLvl.innerHTML = "Niveau d'objet " + statsItem.itemLevel;
    itemLvl.style.color = "#ffd100";
    itemArmor.innerHTML = "Armure : " + statsItem.baseArmor;
    itemBind.innerHTML = bind[statsItem.itemBind];
    itemDurability.innerHTML = "Durabilité : "+statsItem.maxDurability+"/"+statsItem.maxDurability;
    itemLvlRequiered.innerHTML = "Niveau"+ " " + statsItem.requiredLevel + " " + "requis";

    //If item spell (ON USE SPELL) is return by api
    let spells = statsItem.itemSpells;
    spells.forEach(function(spells){
      let onUse = document.createElement('li');
      itemStats.appendChild(onUse);
      onUse.innerHTML = "Utiliser: " + spells.scaledDescription;
      onUse.setAttribute("class", "onUse");
      onUse.style.color = "#1eff00";
    });

    //If Item description is return by the api
    let itemDesc = statsItem.description;
    if(itemDesc){
      itemStats.appendChild(itemDescElt);
      itemDescElt.innerHTML = '"' + statsItem.description + '"';
      itemDescElt.setAttribute("id", "itemDescription");
      itemDescElt.style.color = "#ffd100";
    }

    //Stats Bonus Management
    //For every Stats in the BonusStats array return by the api we do :
    for(i=0;i<=statsItem['bonusStats'].length-1;i++){
      let stat = statsItem['bonusStats'][i];
      //Conditionement de l'ecriture des stats
      let statName = bonusStats[stat.stat];
      if (statName =="Coup critique" ||
          statName =="Hâte" ||
          statName =="Maitrise" ||
          statName == "Polyvalence" ||
          statName == "Evitement"){
            itemBonusStatsElt.innerHTML = '<li class="bonusStat_1"> Augmente votre score de' + ' ' + statName + ' de '  + '+' + stat.amount+'</li>';
            itemArmor.insertAdjacentHTML('afterEnd',itemBonusStatsElt.innerHTML);
            //coloration en vert des bonusStat_1
            let bonusStatsColor = document.getElementsByClassName("bonusStat_1");
            bonusStatsColor[0].style.color = "#1eff00";

      }else{
        //Affichage des autres stats bonus
        itemBonusStatsElt.innerHTML = '<li class="bonusStat_2">+'+stat.amount + " " + statName;
        itemArmor.insertAdjacentHTML('beforeEnd',itemBonusStatsElt.innerHTML);
      }
    }
}






