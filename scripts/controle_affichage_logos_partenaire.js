// ============================================================================
// description : controle de l'affichage des logos des partenaires
//               partenaires 'or' et autres
// utilisation : javascript - controleur formulaire web
// teste avec  : firefox, safari sur Mac OS 10.11
// contexte    : Site web du championnat de France 2018
// Copyright (c) 2018 AMP. Tous droits reserves
// ----------------------------------------------------------------------------
// creation : 01-avr-2018 pchevaillier@gmail.com
// revision : 05-acr-2018 pchevaillier@gmail.com ajout logo SOPAM
// revision : 10-acr-2018 pchevaillier@gmail.com logos dans ordre aleatoire
// ----------------------------------------------------------------------------
// commentaires :
// -
// attention :
// -
// a faire :
//
// ----------------------------------------------------------------------------

function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    let j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
}

function choix_aleatoire_logo(id_element, logos, duree) {
  element = document.getElementById(id_element);
  if (element == null) return;
  var index_max = logos.length - 1;
  
  (function select_logo() {
   element.src = logos[Math.round(Math.random() * index_max)];
   setTimeout(select_logo, duree);
   })();
}

// source : http://memo-web.fr/categorie-javascript-156.php
// Fonction de defilement horizontal
// el est l'element HTML qui contiendra le contenu defilant
// src est un tableau comprenant le chemin des images a faire defiler
// pas est le pas d'incrementation de la translation (defaut 1px)
// tps est le temps entre deux translations (defaut 50ms)

function defilImgHrz(eln,srcs,pas,tps) {
  if (typeof eln == "string") {
    el = document.getElementById(eln);
  }
  if (el == null) return;
  shuffleArray(srcs); // Ajoute le 10-avr-2018
  
  var tps = tps || 50;
  var pas = pas || 1;
  var imgs = [];
  var offset = 0;
  for (var i=0, l=srcs.length; i<l; i++) {
    var img = new Image();
    img.src = srcs[i];
    imgs.push(img);
    img.style.height = el.offsetHeight + "px";
    img.style.position = "absolute";
    img.style.left = offset + "px";
    img.style.padding = "25px"; // ajout PCh
    el.appendChild(img);
    offset += img.offsetWidth;
  }
  var first = 0;
  var last = imgs.length-1;
  
  (function d() {
    for (var i=0,l=imgs.length;i<l;i++) {
      var left = parseInt(imgs[i].style.left,10);
      imgs[i].style.left = (left-pas) + "px";
      if (i==first && (left-pas+imgs[i].offsetWidth)<0) {
        imgs[i].style.left = (parseInt(imgs[last].style.left,10)+imgs[last].offsetWidth-(i==0?pas:0))+"px";
        last = first++;
      if (first>imgs.length-1) { first = 0; }
    }
   }
   setTimeout(d,tps);
   })();
}
// ============================================================================
