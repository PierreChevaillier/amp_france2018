<?php
// ========================================================================
// description : definition de la classe Contenu_Actualites
//               affichage du journal des actualités
//               et d'un cadre contacts et partenaires
// utilisation : destine a etre affiche sur la page des actualites
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

// ------------------------------------------------------------------------
// --- Definition de la classe

/**
 * @author Pierre Chevaillier
 */
class Contenu_Actualites extends Element_Page {

  private $journal;
  private $contact;
  
  public function __construct($journal, $contacts) {
    $this->journal = $journal;
    $this->contacts = $contacts;
  }
  
  public function initialiser() {
  }
  
  /**
    *
    */
  protected function afficher_debut() {
    echo '<div class="container"><div class="row">';
  }
  
  protected function afficher_corps() {
    echo '<div class="col-sm-8">';
    $this->journal->afficher();
    echo '</div>';
    echo '<div class="col-sm-4">';
    $this->contacts->afficher();
    echo '</div>';
  }
  
  protected function afficher_fin() {
    echo '</div></div>';
  }
}
// ========================================================================
