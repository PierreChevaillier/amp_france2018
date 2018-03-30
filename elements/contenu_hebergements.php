<?php
// ========================================================================
// description : definition de la classe Contenu_Hebergements
// utilisation : contenu d'une page web
// teste avec  : PHP 5.5.3 sur Mac OS 10.11
// contexte    : Site du Championnat de France d'Aviron de Mer 2018
// Copyright (c) 2017-2018 AMP. Tous droits reserves.
// ------------------------------------------------------------------------
// creation : 14-oct-2017 pchevaillier@gmail.com
// revision : 30-oct-2018 pchevaillier@gmail.com info disponibilites
// ------------------------------------------------------------------------
// commentaires :
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
  
    protected function afficher_debut() {
      echo '<div class="container">';
      echo "<h2>" . $this->titre() . "</h2>\n";
      echo "<p>Ces informations sont données à titre indicatif. La liste n'est pas exhaustive et les organisateurs ne s'engagent pas sur la disponibilité ni sur la qualité des hébergements listés ici. Les disponibiltés sont données à titre indicatif (date du 22 mars 2018).</p>\n";
      echo '<p>Les offices du Tourisme de Plougonvelin et du Conquet fournissent des listes d\'hébergements. Vous pouvez y accéder depuis notre page <a href="toutisme.php">Tourisme</a></p>';
    }
  
    protected function afficher_corps() {
      echo '<table class="table table-striped">';
      echo '<thead><tr><th>Type</th><th>Localisation</th><th>Nom</th><th>Distance</th><th>Site web</th><th>Téléphone</th><th>Disponibilités</th></tr></thead><tbody>';
      echo '<tr><td>Résidence</td><td>Plougonvelin</td><td>Résidence du Domaine de Bertheaume</td><td>100 m</td><td><a target="new" href="http://www.nemea.fr">www.nemea.fr</a></td><td>05 57 26 99 31</td><td>50</td></tr>';
      echo '<tr><td>Résidence</td><td>Locmaria-Plouzané</td><td>Résidence Iroise Armorique</td><td>4 km</td><td><a target="new" href="http://www.nemea.fr">www.nemea.fr</a></td><td>05 57 26 99 31</td><td>30</td></tr>';
      echo '<tr><td>Résidence</td><td>Le Conquet</td><td>Résidence des Iles</td><td>7 km</td><td><a target="new" href="http://www.residence-des-iles.com/">www.residence-des-iles.com</a></td><td>02 98 89 48 12</td><td>30</td></tr>';
      echo '<tr><td>Résidence</td><td>Ploumoguer</td><td>Résidence Blue idea</td><td>11 km</td><td><a target="new" href="http://www.blue-idea.fr">www.blue-idea.fr</a></td><td>06 48 05 55 48</td><td>30</td></tr>';
      echo '<tr><td>Mobile-Home</td><td>Plougonvelin</td><td>Camping Les Terrasses de Berthaume</td><td>1,5 km</td><td><a target="new" href="http://www.camping-brest.com/">camping-brest.com</a></td><td>02 98 48 32 37</td><td>complet</td></tr>';
      echo '<tr><td>Camping + Mobile-Home</td><td>Plougonvelin</td><td>Camping Vert de Keryel</td><td>3,3 km</td><td><a target="new" href="http://domainedekeryel.fr/">domainedekeryel.com</a></td><td>06 62 06 33 35</td><td>20</td></tr>';
      echo '<tr><td>Camping</td><td>Locmaria-Plouzané</td><td>Camping municipal de Portez</td><td>4,2 km</td><td><a target="new" href="http://www.locmaria-plouzane.fr/joomla/index.php/decouvrir-bouger/tourisme/camping-de-portez">www.locmaria-plouzane.fr</a></td><td>02 98 48 40 09</td><td></td></tr>';
      echo '<tr><td>Camping</td><td>Le Conquet</td><td>Camping Les Blancs Sablons</td><td>7 km</td><td><a target="new" href="http://www.camping-blancs-sablons.com/">www.les-blancs-sablons.com</a></td><td>02 98 36 07 91</td><td></td></tr>';
      echo '<tr><td>Camping + Mobile-Home</td><td>Brest</td><td>Camping du Goulet</td><td>16 km</td><td><a target="new" href="http://www.campingdugoulet.fr/">www.campingdugoulet.fr</a></td><td>02 98 45 86 84</td><td>100</td></tr>';
      echo '<tr><td>Village vacances</td><td>Le Conquet</td><td>Village Vacances Beauséjour</td><td>6 km</td><td><a target="new" href="https://www.revesdemer.com/">www.revesdemer.com/</a></td><td>02 98 83 55 17</td><td>25</td></tr>';
      echo '<tr><td>Village vacances (1)</td><td>Plougonvelin</td><td>Village CLub Le Tre Hir</td><td> 300 m</td><td><a target="new" href="https://www.igesa.fr/">www.igesa.fr</a></td><td></td><td></td></tr>';
      echo '<tr><td>Hôtel ****</td><td>Plougonvelin</td><td>Hostellerie de la Pointe Saint-Mathieu</td><td>5,5 km</td><td><a target="new" href="http://www.pointe-saint-mathieu.com/">www.pointe-saint-mathieu.com</a></td><td>02 98 89 00 19</td><td>15 chambres</td></tr>';
      echo '<tr><td>Hôtel **</td><td>Plougonvelin</td><td>Hôtel le Vent d\'Iroise</td><td>5,5 km</td><td><a target="new" href="http://www.hotel-vent-iroise.com/">www.hotel-vent-iroise.com</a></td><td>02 98 89 45 00</td><td>12 chambres</td></tr>';
      echo '<tr><td>Hôtel ***</td><td>Plougonvelin</td><td>Hôtel du large</td><td>5,5 km</td><td><a target="new" href="https://www.hoteldularge.com/index.php/fr/">www.hoteldularge.com</a></td><td> 02 98 36 36 36</td><td>complet</td></tr>';
      echo '<tr><td>Hôtel</td><td>Le Conquet</td><td>Auberge de Keringar</td><td>5,7 km</td><td><a target="new" href="http://www.keringar.fr/">www.keringar.fr</a></td><td>02 98 89 09 59</td><td>10 chambres</td></tr>';
      echo '<tr><td>Hôtel ***</td><td>Le Conquet</td><td>Hôtel de la Vinotière</td><td>6,1 km</td><td><a target="new" href="http://www.lavinotiere.fr">www.lavinotiere.fr</a></td><td>02 98 89 17 79</td><td>5 chambres</td></tr>';
      echo '<tr><td>Hôtel **</td><td>Le Conquet</td><td>Hôtel Au Bout du Monde</td><td>6,3 km</td><td><a target="new" href="http://www.hotel-le-conquet.fr">www.hotel-le-conquet.fr</a></td><td>02 98 89 07 22</td><td>10 chambres</td></tr>';
      echo '<tr><td>Hôtel **</td><td>Le Conquet</td><td>Le Relai du Vieux Port</td><td>6,5 km</td><td><a target="new" href="http://www.lerelaisduvieuxport.com">www.lerelaisduvieuxport.com</a></td><td>02 98 89 15 91</td><td>7 chambres</td></tr>';
      //echo '<tr><td>--</td><td>--</td><td>--</td><td>--</td><td>--</td><td>--</td><td></td></tr>';
      echo '</tbody></table>';
      echo '<p>(1) L’Igesa impose la présence d’un ressortissant du Ministère de la défense dans le groupe</p>';
    }
  
    protected function afficher_fin() {
      echo '</div>';
    }
}
// ========================================================================
