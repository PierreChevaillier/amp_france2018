<?php
  // ===========================================================================
  // description : definition de la classe Zone_Partenaires
  //               affichage des logos des partenaires
  // utilisation : destine a etre affiche en entete de toutes les pages du site
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP. Tous droits reserves.
  // ---------------------------------------------------------------------------
  // creation: 01-avr-2018 pchevaillier@gmail.com
  // revision: 05-avr-2018 pchevaillier@gmail.com mise en page, liens partenaire, benevoles
  // revision: 21-avr-2018 pchevaillier@gmail.com liens commande restauration
  // revision: 23-avr-2018 pchevaillier@gmail.com liens en relatif
  // revision: 24-avr-2018 pchevaillier@gmail.com utilisation jquery bxslider
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // -
  // a faire :
  // ===========================================================================
  
  // --- Classes utilisees
  require_once 'generiques/element_page.php';

  // ---------------------------------------------------------------------------
  class Zone_Partenaires extends Element_Page {
    private $chemin = "";
    private $logos = array();
    
    public function initialiser() {
      $this->chemin = "media/logos/partenaires/autres/";
      $this->logos = ["logo_eleonore-cerid.jpg",
      "logo_laot.png",
      "logo_fumaison_iroise.png",
      "logo_in-extenso.png",
      "logo_papillon-deco-com-2018.jpg",
      "logo_sill.jpg",
      "logo-hotel-large-plougonvelin.png",
      "logo_restaurant-archipel-plougonvelin.png",
      "carte_castrec.jpg",
      "carte_calvarin.png",
      "carte_rdv_4_saisons.png",
      "carte_grand_optical.png",
      "carte_sans_souci.png",
      "cave_keruzas.jpg",
      "carte_chemin.png",
      "carte_gouerec.png",
      "carte_holidays_hair.jpg",
      "logo_iroise_promotion.png",
      "photo_chez_coco.png",
      "potager_saint_mathieu.png",
      "logo_iroise_info.jpg",
      "logo_qalian-2017.png",
      "logo_emerys.jpg",
      "logo_bertheaume-rond-bleu.png",
      "logo_meilleurtaux.jpg",
      "carte_bellec.jpg",
      "logo_sobrefer.jpg",
      "logo_martenat-ouest-bretagne.jpg",
      "logo_cristaline.png",
      "logo_hkp.png",
      "logo_larc.png",
      "logo_saveol.png",
      "logo_veg_echo_natur.png",
      "logo_safran-aviron-mer.jpg",
      "logo_sotravi_binard_stpa.jpg",
      "logo_brets.png",
      "logo_fileur-verre.png",
      "logo_imer.jpg"
        ];
     shuffle($this->logos);
    }
  
    protected function afficher_debut() {
      echo "\n<div align=\"center\">\n";
    }
  
    /*
    private function afficher_autres_partenaires() {
      echo '<div id="bandeau_partenaires_autres" style="padding:0px;text-align:center;position:relative;width:1024px;height:150px;border:0px;overflow:hidden;">&nbsp;</div>';
    }
    */
    private function afficher_autres_partenaires() {
      echo '<div class="bxslider">';
      foreach($this->logos as $logo) {
        echo '<div><img height="75px" alt="" src="' . $this->chemin . '/' . $logo . '"></div>';
      }
      echo '</div>';
    }
    
    protected function afficher_corps() {
      echo '<div class="container" style="padding:0px;"><div class="row">';
      echo '<div class="col-sm-8" style="padding:0px;align:center;">';
      echo '<img id="logos_partenaires_or" style="height:200px;" />';
      echo '</div>'; // fin colonne gauche
      echo '<div class="col-sm-4" style="padding:0px;align:center;" >';
      echo "\n<div class=\"page-header\"><ul class=\"pager\">";
      //echo "<li><a class=\"bouton-lien\" href=\"https://docs.google.com/forms/d/e/1FAIpQLScLkB08ZfDKLDJD1lRKuX0RBNbZfUSnzOym2ptZicw3CONe_w/viewform?usp=sf_link\" target=\"_new\">Devenez bénévole</a></li>";
      echo "<li><a class=\"bouton-lien\" href=\"https://www.helloasso.com/associations/aviron-de-mer-de-plougonvelin-amp/collectes/devenez-partenaire-du-championnat-de-france-d-aviron-de-mer-2018-1\" target=\"_new\">Devenez partenaire</a></li><li><li><a class=\"bouton-lien\" href=\"restauration_journee.php\">Paniers repas</a></li><li><a class=\"bouton-lien\" href=\"repas_cloture.php\">Repas des équipages</a></li></ul></div>\n";
      echo '</div>'; // fin colonne droite
      echo '</div></div>'; // fin row et fin container
      
      $this->afficher_autres_partenaires();
    }
  
    protected function afficher_fin() {
      echo "\n</div>\n";
    }
  }
  // ==========================================================================
?>
