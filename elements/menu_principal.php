<?php
// ========================================================================
// description : definition de la classe Menu_principal : menu navigation
//               vers les differentes pages du site
// utilisation : destine a etre affiche sur toutes les pages web du site
//               pour cela l'ajouter dans la liste des elements
// teste avec  : PHP 5.5.3 sur Mac OS 10.11
// contexte    : site web du chamionnat de France d'aviron de Mer 2018
//               organise par l'AMP, Aviron de Mer de plougonvelin
// Copyright (c) 2017 AMP
// ------------------------------------------------------------------------
// creation : 04-juin-2017 pchevaillier@gmail.com
// revision :
// ------------------------------------------------------------------------
// commentaires :
// - en chantier
// attention :
// -
// a faire :
// - modifier les liens au fur et a mesure de la creation des pages
// ------------------------------------------------------------------------

// --- Classes utilisees
require_once 'generiques/menu_navigation.php';

// ------------------------------------------------------------------------
// --- Definition de la classe Menu_Principal

/**
 * @author Pierre Chevaillier
 */
class Menu_Principal extends Menu_Navigation {

  public function initialiser() {
    $this->titre = "";
  }
  
  protected function afficher_corps() {
    echo "<li><a href=\"index.php\">Accueil</a></li>";
    echo "<li><a href=\"actualites.php\">Actualités</a></li>";
    echo "<li><a href=\"index.php\">Courses</a></li>";
    echo "<li><a href=\"index.php\">Transports</a></li>";
    echo "<li><a href=\"index.php\">Hébergements</a></li>";
    echo "<li><a href=\"index.php\">Partenaires</a></li>";
    echo "<li><a href=\"contacts.php\">Contacts</a></li>";
  }
  
}
// ========================================================================
