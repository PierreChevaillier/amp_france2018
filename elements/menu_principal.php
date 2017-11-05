<?php
  // ========================================================================
  // description : definition de la classe Menu_principal
  //               permet la navigation vers les differentes pages du site
  // utilisation : destine a etre affiche sur toutes les pages web du site
  //               pour cela l'ajouter dans la liste des elements
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : site web du chamionnat de France d'aviron de Mer 2018
  //               organise par l'AMP, Aviron de Mer de plougonvelin
  // Copyright (c) 2017 AMP
  // ------------------------------------------------------------------------
 // creation : 04-jun-2017 pchevaillier@gmail.com
 // revision : 15-jun-2017 pchevaillier@gmail.com liens vers les bonnes pages
 // revision : 23-jun-2017 pchevaillier@gmail.com ajout id / li
 // revision : 04-oct-2017 pchevaillier@gmail.com menus infos pratiques et competitions
 // revision : 21-oct-2017 pchevaillier@gmail.com ordre items menu infos pratiques
// ------------------------------------------------------------------------
// commentaires : en chantier
// attention :
// - pas teste (cf. script ajouté à page_france2018.php - en chantier)
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
  
  protected function afficher_menu_competitions() {
    echo '<li id="competitions"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Compétitions<span class="caret"></span></a>';
    echo '<ul class="dropdown-menu">';
    echo '<li><a href="courses.php">Programme</a></li>';
    echo '<li><a href="page_vide.php">Parcours</a></li>';
    echo '<li><a href="page_vide.php">Résultats</a></li>';
    echo '<li><a href="page_vide.php">Réglement</a></li>';
    echo '</ul></li>';
}
  
  protected function afficher_menu_info_pratiques() {
    echo '<li id="info_pratiques"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Informations pratiques <span class="caret"></span></a>';
    echo '<ul class="dropdown-menu">';
    echo '<li><a href="transports.php">Venir</a></li>';
    echo '<li><a href="hebergements.php">Hébergements</a></li>';
    echo '<li><a href="page_vide.php">Restauration</a></li>';
    echo '<li><a href="page_vide.php">Village</a></li>';
    echo '<li><a href="tourisme.php">Tourisme</a></li>';
    echo '</ul></li>';
  }
  
  protected function afficher_menu_videos() {
    echo '<li id="videos"><a href="videos.php">Vidéos</a></li>';
    // webcam ; teasing ; Plougonvelin ; Courses en direct
  }
  protected function afficher_corps() {
    echo '<li id="index"><a href="index.php">Accueil</a></li>';
    echo '<li id="actualites"><a href="actualites.php">Actualités</a></li>';
    
    
    $this->afficher_menu_videos();
    $this->afficher_menu_competitions();
    $this->afficher_menu_info_pratiques();
    
    echo '<li id="contacts"><a href="contacts.php">Contacts</a></li>';
     //echo "<li><a href=\"partenaires.php\">Partenaires</a></li>";
  }
  
}
// ========================================================================
