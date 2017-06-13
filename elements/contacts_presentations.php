<?php
// ========================================================================
// description : definition de(s) classe(s) de presentation des contacts
// utilisation : destine a etre affiche sur une page specifique
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
class Vue_Contacts extends Element_Page {

  public function initialiser() {
    $this->titre = "Contacter les organisateurs";
  }
  
  protected function afficher_debut() {
    echo '<div class=\panel panel-default"><div class="panel-body">';
    echo '<p class="lead">' . $this->titre . '</p>';
      }
  
  protected function afficher_corps() {
    echo '<h3>Adresse</h3><p>';
    foreach (Site::adresses() as $adr)
      echo $adr . '<br />';
    echo '</p>';
    echo '<h3>Télephone</h3><p>';
    foreach (Site::telephones() as $tel)
      echo $tel . '<br />';
    echo '</p>';
    echo '<h3>Courrier électronique</h3><p>';
    echo '<a href="mailto:' . Site::mail_contact() . '">' . Site::mail_contact() . '</a>';
    echo '</p>';
  }
  
  protected function afficher_fin() {
    echo '</div></div>';
  }
}
// ========================================================================
