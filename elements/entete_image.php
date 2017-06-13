<?php
// ========================================================================
// description : definition de la classe Entete_Image
//               affichage d'une image dans une division header'
// utilisation : destine a etre affiche sur la page d'accueil
// teste avec  : PHP 5.5.3 sur Mac OS 10.11
// contexte    : Site du Championnat de France d'Aviron de Mer 2018
// Copyright (c) 2017 AMP
// ------------------------------------------------------------------------
// creation: 09-juin-2017 pchevaillier@gmail.com
// revision:
// ------------------------------------------------------------------------
// commentaires :
// - en chantier
// attention :
// -
// a faire :
// ------------------------------------------------------------------------

// --- Classes utilisees
require_once 'generiques/element_page.php';

// ------------------------------------------------------------------------
// --- Definition de la classe Page_Accueil

/**
 * @author Pierre Chevaillier
 */
class Entete_Image extends Element_Page {

  private $chemin_image;
  
  public function __construct($chemin_relatif_fichier_image) {
    $this->chemin_image = $chemin_relatif_fichier_image;
  }
  
  public function initialiser() {
  }
  
  /**
    *
    */
  protected function afficher_debut() {
    echo '<div class="page-header">';
  }
  
  protected function afficher_corps() {
    echo '<img src="' . $this->chemin_image . '" alt="bandeau" width="100%" />';
  }
  
  protected function afficher_fin() {
    echo '</div>';
  }
}
// ========================================================================
