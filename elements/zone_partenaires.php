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
  // revision:
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
  
    public function initialiser() {
    }
  
    protected function afficher_debut() {
      echo '<div align="center">';
    }
  
    protected function afficher_corps() {
      echo '<img id="logos_partenaires_or" style="height:300px;" />';
      //echo '<div id="bandeau_partenaires_autres" style="align:center;position:relative;width:1024px%;height:150px;border:0px solid black;overflow:hidden;">&nbsp;</div>';
    }
  
    protected function afficher_fin() {
      echo '</div>';
    }
  }
  // ==========================================================================
?>
