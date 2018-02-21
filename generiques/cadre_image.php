<?php
  // ===========================================================================
  // description : definition de la classe Cadre_Image
  //               affichage d'un cadre avec une image
  // utilisation : destine a etre affiche sur differentes pages web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11, serveur OVH (php 7)
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP. Tous droits reserves
  // ---------------------------------------------------------------------------
  // creation : 10-fev-2018 pchevaillier@gmail.com
  // revision :
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // ---------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/element_page.php';

  // ---------------------------------------------------------------------------
  // --- Definition de la classe
  
  class Cadre_Image extends Element_Page {

    private $chemin_contenu;
    
    public function __construct($chemin_relatif_fichier_contenu) {
      $this->chemin_contenu = $chemin_relatif_fichier_contenu;
    }
    
    public function initialiser() {
    }
  
    protected function afficher_debut() {
      echo '<div>';
    }
  
    protected function afficher_corps() {
      if ($this->a_un_titre())
        echo '<h3>' . $this->titre() . '</h3>';
      echo '<a href="' . $this->chemin_contenu . '"><img width="100%" src="' . $this->chemin_contenu . '" /></a>';
    }
  
    protected function afficher_fin() {
      echo '</div>';
    }
  }
  // ===========================================================================
?>
