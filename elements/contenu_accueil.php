<?php
// ========================================================================
// description : definition de la classe Contenu_Accueil
//               affichage du journal des actualités
//               et d'un cadre contacts et partenaires
// utilisation : destine a etre affiche sur la page des actualites
// teste avec  : PHP 5.5.3 sur Mac OS 10.11
// contexte    : Site du Championnat de France d'Aviron de Mer 2018
// Copyright (c) 2017 AMP
// ------------------------------------------------------------------------
// creation: 07-juillet-2017 pchevaillier@gmail.com
// revision: 18-juil-2017 pchevaillier@gmail.com video plus grande
// ------------------------------------------------------------------------
// commentaires :
// -
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
class Contenu_Accueil extends Element_Page {

  private $contenu_gauche;
  private $contenu_droite;
  
  public function __construct($contenu_gauche, $contenu_droite) {
    $this->contenu_gauche = $contenu_gauche;
    $this->contenu_droite = $contenu_droite;
  }
  
  public function initialiser() {
  }
  
  /**
    *
    */
  protected function afficher_debut() {
    echo '<div class="container" style="padding:10px;" ><div class="row" style="padding:10px;">';
  }
  
  protected function afficher_corps() {
    echo '<div class="col-sm-8" style="padding:10px;" >';
    $this->contenu_gauche->afficher();
    echo '</div>';
    echo '<div class="col-sm-4">';
    $this->contenu_droite->afficher();
    echo '</div>';
  }
  
  protected function afficher_fin() {
    echo '</div></div>';
  }
}
// ========================================================================
