// ============================================================================
// description : Compte  a rebours
// utilisation : destine a etre affiche en haut de chaque page du site web
// teste avec  : Mac OS 10.11
// contexte    : Site web du championnat de France 2018
// Copyright (c) 2017-2018 AMP
// ----------------------------------------------------------------------------
// creation : 29-jul-2017 pchevaillier@gmail.com
// revision : 24-fev-2018 pchevaillier@gmail.com suppression minutes
// ----------------------------------------------------------------------------
// commentaires :
// - code trouve sur https://www.w3schools.com/howto/howto_js_countdown.asp
// - affichage dans l'element compteRebours
// attention :
// - n'affiche le compte a rebourd qu'une seconde apres.
//   Affichage au chargement ne marche pas.
// a faire :
// ----------------------------------------------------------------------------

function countDown() {
  
  // Set the date we're counting down to
  var countDownDate = new Date("May 25, 2018 12:00:00").getTime();
  // Get todays date and time
  var now = new Date().getTime();
  
  // Find the distance between now an the count down date
  var distance = countDownDate - now;
  
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
  // Display the result in the element with id="demo"
  document.getElementById("menuDynamiqueInfo").innerHTML = days + " jours  - " + hours + " heures ";
  // + minutes + " minutes " + seconds + "s ";
  
  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("menuDynamiqueInfo").innerHTML = "";
  }
}

window.onload = countDown;

// Update the count down every 1 second
var x = setInterval(countDown, 1000);

// ============================================================================
