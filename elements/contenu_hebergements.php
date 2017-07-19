<?php
// ========================================================================
// description : definition de la classe Contenu_Hebergements
// utilisation : destine a etre affiche sur la page des actualites
// teste avec  : PHP 5.5.3 sur Mac OS 10.11
// contexte    : Site du Championnat de France d'Aviron de Mer 2018
// Copyright (c) 2017 AMP
// ------------------------------------------------------------------------
// creation: 15-juin-2017 pchevaillier@gmail.com
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
class Contenu_Hebergements extends Element_Page {
  
  public function initialiser() {
  }
  
  /**
    *
    */
  protected function afficher_debut() {
    echo '<div class="container"><div class="row">';
  }
  
  protected function afficher_corps() {
    echo "<h2>Solutions d'hébergement</h2>\n";
    echo '<div class="col-sm-6">';
    echo "<p>La région est touristique et les solutions d'hébergement sont nombreuses et variées : campings, gites ruraux, hôtèlerie simple ou luxueuse...</p>";
    echo "<ul class=\"list-group\">\n";
    echo "<li class=\"list-group-item\">Le <a href=\"http://fr.calameo.com/books/00465658703545b1bc3bb\" targe=\"_new\">guide Touristique 2017 de l'Iroise</a></li>";
    echo "<li class=\"list-group-item\"> Quelques documentations éditées par <a href=\"http://www.pays-iroise.bzh/component/publications/\">le pays d'Iroise</a></li>";

    echo "<li class=\"list-group-item\">L'Office du Tourisme de <a href=\"http://www.plougonvelin-tourisme.fr\" target=\"_new\">Plougonvelin</a></li>";
    echo "<li class=\"list-group-item\">L'Office du Tourisme du <a href=\"http://www.tourismeleconquet.fr\" target=\"_new\">Conquet</a></li>";
    echo "<li class=\"list-group-item\">L'Office du Tourisme de <a href=\"http://www.brest-metropole-tourisme.fr\" target=\"_new\">Brest</a></li>";
    echo "</ul>";
    echo '</div><div class="col-sm-6">';
    echo '<img src="media/photos/saint-mathieu_pierre.jpg" width="100%">';
    echo '</div>';
}
  
  protected function afficher_fin() {
    echo '</div></div>';
  }
}
// ========================================================================
