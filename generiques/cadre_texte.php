<?php
// ========================================================================
// description : definition de la classe Cadre_texte
//               affichage d'un cadre avec du texte
// utilisation : destine a etre affiche sur la page d'accueil
// teste avec  : PHP 5.5.3 sur Mac OS 10.11
// contexte    : Site du Championnat de France d'Aviron de Mer 2018
// Copyright (c) 2017 AMP
// ------------------------------------------------------------------------
// creation: 07-juillet-2017 pchevaillier@gmail.com
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
// --- Definition de la classe

/**
 * @author Pierre Chevaillier
 */
class Cadre_Texte extends Element_Page {

  private $texte;
  
  public function __construct($texte) {
    $this->texte = $texte;
  }
  
  public function initialiser() {
  }
  
  /**
    *
    */
  protected function afficher_debut() {
    echo '<div>';
  }
  
  protected function afficher_corps() {
    echo '<p class="lead">' . $this->titre() . '</p>';
    echo '<p>' . $this->texte . '</p>';
  }
  
  protected function afficher_fin() {
    echo '</div>';
  }
}
// ========================================================================
