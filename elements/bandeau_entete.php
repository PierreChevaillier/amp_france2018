<?php
  // ===========================================================================
  // description : definition de la classe Bandeau_Entete
  //               affichage d'un bandeau avec la compte a rebours
  // utilisation : destine a etre affiche en entete de toutes les pages du site
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017 AMP
  // ---------------------------------------------------------------------------
  // creation: 18-oct-2017 pchevaillier@gmail.com
  // revision:
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // -
  // a faire :
  // ===========================================================================
  
  // --- Classes utilisees
  require_once 'generiques/element_page.php';

  // ---------------------------------------------------------------------------
  // --- Definition de la classe Bandeau_Entete

  /**
   * @author Pierre Chevaillier
   */
  class Bandeau_Entete extends Element_Page {
  
    public function initialiser() {
    }
  
    protected function afficher_debut() {
      echo '<div class="header">';
    }
  
    protected function afficher_corps() {
      echo 'Dans <span id="menuDynamiqueInfo"></span>';
    }
  
    protected function afficher_fin() {
      echo '</div>';
    }
  }
  // ========================================================================
?>
