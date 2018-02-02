<?php
  // ===========================================================================
  // description : definition de la classe Cadre_Video
  //               affichage d'une video
  // utilisation : destine a etre affiche sur la page d'accueil
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017 AMP
  // ------------------------------------------------------------------------
  // creation: 13-juin-2017 pchevaillier@gmail.com
  // revision: 18-juil-2017 pchevaillier@gmail.com video plus grande
  // ------------------------------------------------------------------------
  // commentaires :
  //  - teste avec une video et une image
  //  - format 16x9
  // attention :
  // a faire :
  // ============================================================================
  
  // --- Classes utilisees
  require_once 'generiques/element_page.php';

  // ---------------------------------------------------------------------------
  // --- Definition de la classe

  class Cadre_Video extends Element_Page {

    private $chemin_video;
  
    public function __construct($chemin_relatif_fichier_video) {
      $this->chemin_video = $chemin_relatif_fichier_video;
    }
  
    public function initialiser() {
    }
  
    protected function afficher_debut() {
      echo '<div class="embed-responsive embed-responsive-16by9" style="margin:0px;">';
    }
  
    protected function afficher_corps() {
      echo '<iframe class="embed-responsive-item" style="margin:0px; padding:0px;" src="' . $this->chemin_video . '"></iframe>';
    }
  
    protected function afficher_fin() {
      echo '</div>';
    }
  }
  // ===========================================================================
?>
