<?php
  // ==========================================================================
  // description : definition de la classe Cadre_Video_Direct
  // utilisation : element d'une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11 - PHP 7.0 sur serveur OVH
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2018 AMP. Tous droits reserves.
  // --------------------------------------------------------------------------
  // creation : 18-mai-2018 pchevaillier@gmail.com
  // revision :
  // --------------------------------------------------------------------------
  // commentaires :
  // - en test
  // attention :
  // -
  // a faire :
  //  -
  // ==========================================================================
  
  // --- Classes utilisees
  require_once 'generiques/element_page.php';

  // --------------------------------------------------------------------------
  class Cadre_Video_Direct extends Element_Page {
    
    public function initialiser() {
      
    }
    
    protected function afficher_debut() {
      echo "\n<div>\n";
    }
    
    protected function afficher_corps() {
      echo "<center><iframe id=\"ls_embed_1526653425\" src=\"https://livestream.com/accounts/13634278/events/8177145/player?width=640&height=360&enableInfoAndActivity=true&defaultDrawer=&autoPlay=true&mute=false\" width=\"640\" height=\"360\" frameborder=\"0\" scrolling=\"no\" allowfullscreen> </iframe></center><script type=\"text/javascript\" data-embed_id=\"ls_embed_1526653425\" src=\"https://livestream.com/assets/plugins/referrer_tracking.js\"></script>";
    }
    
    protected function afficher_fin() {
      echo "\n</div>\n";
    }
  }
  
  // ==========================================================================
?>
