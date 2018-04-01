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
// ----------------------------------------------------------------------------

window.onload=function() {
  defilImgHrz("bandeau_partenaires_autres",[
                                            "media/logos/logo_amp.png",
                                            "media/logos/ffaviron-logo-horizontal.jpg",
                                            "media/logos/logo_amp.png",
                                            "media/logos/logo_maif_blanc_200x196.png"
                                            ], 10, 1000);
  choix_aleatoire_logo();
  countDown();
};

// ============================================================================
