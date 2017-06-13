<?php
// ========================================================================
// description : definition de la classe Journal_Actialites
//               affichage des actualites en tant que contenu d'une page web
// utilisation : destine a etre affiche sur la page d'accueil
// teste avec  : PHP 5.5.3 sur Mac OS 10.11
// contexte    : Site du Championnat de France d'Aviron de Mer 2018
// Copyright (c) 2017 AMP
// ------------------------------------------------------------------------
// creation: 13-juin-2017 pchevaillier@gmail.com
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
  require_once 'generiques/actualite.php';
  

// ------------------------------------------------------------------------
// --- Definition de la classe Journal_Actualites

/**
 * @author Pierre Chevaillier
 */
class Journal_Actualites extends Element_Page {

  private $chemin_photos = "";
  public $actualites = array();
  
  public function __construct($chemin_relatif_fichier_photos) {
    $this->chemin_photos = $chemin_relatif_fichier_photos;
  }
  
  public function initialiser() {
  }
  
  protected function afficher_debut() {
    echo '<div>';
  }
  
  protected function afficher_corps() {
    echo '<div class="panel panel-default"><div class="panel-body"><ul class="media-list">';
    foreach ($this->actualites as $actu)
      $this->afficher_item($actu);
    echo '</ul></div></div>';
  }
  
  protected function afficher_fin() {
    echo '</div>';
  }
  
  private function afficher_item($actu) {
    $source = $this->chemin_photos . '/' . $actu->nom_fichier_vignette;
    $lien = "#";
    echo '<li class="media"><div class="media-left"><a href="' . $lien . '"><img class="media-object" src="' . $source . '" alt="alt"></a></div><div class="media-body">';
    echo '<h4 class="media-heading">' . $actu->titre() . '<small> - ' . $actu->date . '</small></h4>';
    echo '<p>' . $actu->contenu . '</p></div></li>';
  }
  
}
// ========================================================================
