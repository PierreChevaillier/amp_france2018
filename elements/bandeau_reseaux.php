<?php
// ========================================================================
// description : definition de la classe Bandeau_Reseaux
//               affichage d'un bandeau avec les liens reseaux sociaux
// utilisation : destine a etre affiche sur toutes les pages du site
// teste avec  : PHP 5.5.3 sur Mac OS 10.11
// contexte    : Site du Championnat de France d'Aviron de Mer 2018
// Copyright (c) 2017 AMP
// ------------------------------------------------------------------------
// creation: 12-juin-2017 pchevaillier@gmail.com
// revision:
// ------------------------------------------------------------------------
// commentaires :
// attention :
// -
// a faire :
// - a completer avec d'autres reseaux sociaux : mail, Instagram ...
// ------------------------------------------------------------------------

// --- Classes utilisees
require_once 'generiques/element_page.php';

// ------------------------------------------------------------------------
// --- Definition de la classe Bandeau_Reseaux

/**
 * @author Pierre Chevaillier
 */
class Bandeau_Reseaux extends Element_Page {

  public $chemin_dossier = "";
  public $lien_facebook = "";
  public $lien_twitter = "";
  
  public function __construct($chemin_relatif_dossier_icones) {
    $this->chemin_dossier = $chemin_relatif_dossier_icones;
  }
  
  public function initialiser() {
  }
  
  private function facebook() {
    return strlen($this->lien_facebook) > 0;
  }
  
  private function twitter() {
    return strlen($this->lien_twitter) > 0;
  }
  
  protected function afficher_debut() {
    echo '<div style="text-align:right">';
  }
  
  protected function afficher_corps() {
    if ($this->facebook())
      echo '<a href="' . $this->lien_facebook . '"><img src="' . $this->chemin_dossier . '/icone_facebook_64x64.png" align="middle" /></a>';
    if ($this->twitter())
      echo '<a href="' . $this->lien_facebook . '"><img src="' . $this->chemin_dossier . '/icone_twitter_64x64.png" align="middle" /></a>';
  }
  
  protected function afficher_fin() {
    echo '</div>';
  }
}
// ========================================================================
