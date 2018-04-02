// ============================================================================
// description : controle de l'affichage des logos des partenaires
//               partenaires 'or' et autres
// utilisation : javascript - controleur formulaire web
// teste avec  : firefox, safari sur Mac OS 10.11
// contexte    : Site web du championnat de France 2018
// Copyright (c) 2018 AMP. Tous droits reserves
// ----------------------------------------------------------------------------
// creation : 01-avr-2018 pchevaillier@gmail.com
// revision :
// ----------------------------------------------------------------------------
// commentaires :
// -
// attention :
// -
// a faire :
// il faudrait faire avec choix_aleatoire_logo comme avec defilImgHrz :
// une lambda fonction. Ceci permettrait d'avoir comme signature
// choix_aleatoire_logo(nom_element, images)
// ----------------------------------------------------------------------------

function choix_aleatoire_logo() {
  element = document.getElementById('logos_partenaires_or');
  if (element == null) return;
  var images = new Array();
  images[0]  = "media/logos/partenaires/or/logo_fonds-le-saint.jpg";
  images[1]  = "media/logos/partenaires/or/logo_Intermarche_plougonvelin-1024x489.png";
  images[2]  = "media/logos/partenaires/or/logo-le-telegramme-570x300.png";
  var index_max = images.length - 1;
  element.src = images[Math.round(Math.random() * index_max)];
  setTimeout("choix_aleatoire_logo()", 3000);
}

// source : http://memo-web.fr/categorie-javascript-156.php
// Fonction de défilement horizontal
// el est l'élément HTML qui contiendra le contenu défilant
// src est un tableau comprenant le chemin des images à faire defiler
// pas est le pas d'incrémentation du défilement (defaut 1px)
// tps est le temps entre deux incrémentations  (defaut 50ms)

function defilImgHrz(eln,srcs,pas,tps) {
  if (typeof eln == "string") {
    el = document.getElementById(eln);
  }
  if (el == null) return;
  
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
    img.style.padding = "50px"; // ajout PCh
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
