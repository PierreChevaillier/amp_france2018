<?php
// ========================================================================
// description : definition de(s) classe(s) de presentation des mentions legales
// utilisation : destine a etre affiche sur une page specifique
// teste avec  : PHP 5.5.3 sur Mac OS 10.11
// contexte    : Site du Championnat de France d'Aviron de Mer 2018
// Copyright (c) 2017 AMP
// ------------------------------------------------------------------------
// creation: 05-juin-2017 pchevaillier@gmail.com
// revision: 22-juin-2017 pchevaillier@gmail.com, id="mentions-legales" pour css
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
class Vue_Mentions_Legales extends Element_Page {

  public function initialiser() {
    $this->titre = "Mentions légales";
  }
  
  protected function afficher_debut() {
    echo "<div class=\"panel panel-default\" id=\"mentions-legales\" ><div class=\"panel-body\">\n";
    echo "<p class=\"lead\">" . $this->titre . "</p>";
      }
  
  protected function afficher_corps() {
    echo "<table class=\"table\">";
    echo "<tr><td width=\"20%\">Nom de l'association</td><td width=\"80%\">" . Site::nom_proprietaire() . "</td></tr>";
  
    echo "<tr><td width=\"20%\">Adresse du siège social</td><td width=\"80%\">";
    foreach (Site::adresses() as $adr) echo $adr . "<br />";
    echo "</td></tr>";
    echo "<tr><td width=\"20%\">Directeur de la publication</td><td width=\"80%\">" . Site::directeur_publication() . "</td></tr>";
    echo "<tr><td width=\"20%\">Responsable de la rédaction</td><td width=\"80%\">" . Site::redaction() . "</td></tr>";
    echo "<tr><td width=\"20%\">Hébergeur du site</td><td width=\"80%\">" . Site::hebergeur() . "</td></tr>";
    echo "</table>";
    
    echo "<p class=\"small\">Alors que nous avons effectué toutes les démarches pour nous assurer de la fiabilité des informations contenues sur ce site internet, l’association Aviron de Mer de Plougonvelin ne peut encourir aucune responsabilité du fait d’erreurs, d’omissions, ou pour les résultats qui pourraient être obtenus par l’usage de ces informations.</p>";
  }
  
  protected function afficher_fin() {
    echo "</div></div>\n";
  }
}
// ========================================================================
