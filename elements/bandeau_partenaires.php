<?php
  // ===========================================================================
  // description : definition de la classe Bandeau_Partenaires
  //               affichage d'un bandeau horizontal des logos des partenaires
  //               sportifs et institutionnels
  // utilisation : destine a etre affiche sur toutes les pages du site
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11 - PHP 7.0 sur serveur OVH
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP. Tous droits reserves.
  // ---------------------------------------------------------------------------
  // creation : 09-juin-2017 pchevaillier@gmail.com
  // revision : 24-juin-2017 pchevaillier@gmail.com bandeau responsive
  // revision : 27-aout-2017 pchevaillier@gmail.com logos MAIF et FFA
  // revision : 18-mars-2018 pchevaillier@gmail.com nouveau logo FFA + liens href
  // revision : 03-mai-2018  pchevaillier@gmail.com logos BZH, PI, Plougonvelin
  // revision : 20-mai-2018  pchevaillier@gmail.com logo finistere
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // -
  // a faire :
  // ---------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/element_page.php';

  // ---------------------------------------------------------------------------
  // --- Definition de la classe Bandeau_Partenaires

/**
 * @author Pierre Chevaillier
 */
class Bandeau_Partenaires extends Element_Page {

  private $chemin_dossier = "";
  
  public function __construct($chemin_relatif_dossier_logos) {
    $this->chemin_dossier = $chemin_relatif_dossier_logos;
  }
  
  public function initialiser() {
  }
  
  protected function afficher_debut() {
    echo "\n\n<div class=\"row\">\n";
  }
  
  protected function afficher_corps() {
    //echo '<td><img src="' . $this->chemin_dossier . '/logo_ffa_maif_cnr.png" height="120" /></td>';
    echo '<div class="col-sm-2" style="text-align:center;padding:5px;"><a href="http://avironfrance.fr"><img src="' . $this->chemin_dossier . '/ffaviron-logo-horizontal.jpg" style="height:100px;align:middle;" /></a></div>';
    echo '<div class="col-sm-2" style="text-align:center;padding:5px;"><a href="https://www.maif.fr"><img src="' . $this->chemin_dossier . '/logo_maif_blanc_200x196.png" style="height:100px;align:middle;" /></a></div>';
    echo '<div class="col-sm-2" style="text-align:center;padding:5px;"><a href="https://avironplougonvelin.fr"><img src="' . $this->chemin_dossier . '/logo_amp.png" style="height:80px;align:middle;" /></a></div>';
    echo '<div class="col-sm-2" style="text-align:center;padding:5px;"><a href="http://www.bretagne.bzh"><img src="' . $this->chemin_dossier . '/logo_region_bretagne.jpg" style="height:100px;align:middle;" /></a></div>';
    echo '<div class="col-sm-2" style="text-align:center;padding:5px;"><a href="http://www.pays-iroise.bzh"><img src="' . $this->chemin_dossier . '/logo_29.png" style="height:100px;align:middle;" /></a></div>';
    echo '<div class="col-sm-1" style="text-align:center;padding:5px;"><a href="http://www.pays-iroise.bzh"><img src="' . $this->chemin_dossier . '/logo_pays_iroise.png" style="height:100px;align:middle;" /></a></div>';
    echo '<div class="col-sm-1" style="text-align:center;padding:5px;"><a href="http://www.plougonvelin.fr"><img src="' . $this->chemin_dossier . '/logo_plougonvelin.png" style="height:100px;align:middle;" /></a></div>';
  }
  
  protected function afficher_fin() {
    echo '</div>';
  }
  
  /*
  protected function afficher_debut() {
    echo '<div class="table-responsive"><table class="table"><tr>';
  }
  
  protected function afficher_corps() {
    //echo '<td><img src="' . $this->chemin_dossier . '/logo_ffa_maif_cnr.png" height="120" /></td>';
    echo '<td style="text-align:center"><img src="' . $this->chemin_dossier . '/logo_ffa_avironfrance.jpg" height="120" align="middle" /></td>';
    echo '<td style="text-align:center"><img src="' . $this->chemin_dossier . '/logo_maif.jpg" height="120" align="middle" /></td>';
    echo '<td style="text-align:center"><img src="' . $this->chemin_dossier . '/logo_amp.png" height="100" align="middle" /></td>';
  }
  
  protected function afficher_fin() {
    echo '</tr></table></div>';
  }
   */
}
  // ========================================================================
  ?>
