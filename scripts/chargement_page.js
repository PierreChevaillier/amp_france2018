// ============================================================================
// description : controle de l'affichage des logos des partenaires
//               partenaires 'or' et autres
// utilisation : javascript - chargement de la page
// teste avec  : firefox, safari sur Mac OS 10.11
// contexte    : Site web du championnat de France 2018
// Copyright (c) 2018 AMP. Tous droits reserves.
// ----------------------------------------------------------------------------
// creation : 01-avr-2018 pchevaillier@gmail.com
// revision : 06-avr-2018 pchevaillier@gmail.com ajout logos
// revision : 10-avr-2018 pchevaillier@gmail.com liste logos 'or' definis ici
// revision : 22-avr-2018 pchevaillier@gmail.com ajout cartes : sans souci, 4 saisons, Grand optical
// revision : 24-avr-2018 pchevaillier@gmail.com jquery bxslider pour le bandeau
// ----------------------------------------------------------------------------
// commentaires :
// -
// attention :
// -
// a faire :
// - utiliser bxslider pour l'affichage des partenaires 'or'
// ----------------------------------------------------------------------------

window.onload=function() {
  /*
   * obsolete / utitilisation bxslider
   
  defilImgHrz("bandeau_partenaires_autres",
              [
               "media/logos/partenaires/autres/logo_eleonore-cerid.jpg",
               "media/logos/partenaires/autres/logo_laot.png",
               "media/logos/partenaires/autres/logo_in-extenso.png",
               "media/logos/partenaires/autres/logo_papillon-deco-com-2018.jpg",
               "media/logos/partenaires/autres/logo_sill.jpg",
               "media/logos/partenaires/autres/logo-hotel-large-plougonvelin.png",
               "media/logos/partenaires/autres/logo_restaurant-archipel-plougonvelin.png",
               "media/logos/partenaires/autres/carte_castrec.jpg",
               "media/logos/partenaires/autres/carte_4_saisons.jpg",
               "media/logos/partenaires/autres/grand_optical_lr.png",
               "media/logos/partenaires/autres/carte_sans_souci.jpg",
               "media/logos/partenaires/autres/logo_iroise_info.jpg",
               "media/logos/partenaires/autres/logo_qalian-2017.png",
               "media/logos/partenaires/autres/logo_emerys.jpg",
               "media/logos/partenaires/autres/logo_bertheaume-rond-bleu.png",
               "media/logos/partenaires/autres/logo_meilleurtaux.jpg",
               "media/logos/partenaires/autres/carte_bellec.jpg",
               "media/logos/partenaires/autres/logo_sobrefer.jpg",
               "media/logos/partenaires/autres/logo_martenat-ouest-bretagne.jpg",
               "media/logos/partenaires/autres/logo_cristaline.png",
               "media/logos/partenaires/autres/logo_hkp.png",
               "media/logos/partenaires/autres/logo_larc.png",
               "media/logos/partenaires/autres/logo_safran-aviron-mer.jpg",
               "media/logos/partenaires/autres/logo_sotravi_binard_stpa.jpg",
               "media/logos/partenaires/autres/logo_brets.png",
               "media/logos/partenaires/autres/logo_fileur-verre.png",
               "media/logos/partenaires/autres/logo_imer.jpg"
              ],
              10,
              300);
  */
  choix_aleatoire_logo("logos_partenaires_or",
                       [
                        "media/logos/partenaires/or/logo_fonds-le-saint.jpg",
                        "media/logos/partenaires/or/logo_Intermarche_plougonvelin-1024x489.png",
                        "media/logos/partenaires/or/logo-le-telegramme-570x300.png",
                        "media/logos/partenaires/or/logo_Les-jardins-darcadie.png",
                        "media/logos/partenaires/or/logo_sopam_300x570.png"
                      ],
                       3000);
  countDown();
};

// ============================================================================
