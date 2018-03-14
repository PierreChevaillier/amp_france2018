<?php
  // ===========================================================================
  // description : definition de la classe Bandeau_Entete
  //               affichage d'un bandeau avec la compte a rebours
  // utilisation : destine a etre affiche en entete de toutes les pages du site
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP
  // ---------------------------------------------------------------------------
  // creation: 18-oct-2017 pchevaillier@gmail.com
  // revision: 07-nov-2017 pchevaillier@gmail.com corps du bandeau
  // revision: 25-fev-2018 pchevaillier@gmail.com affichage France 2018
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
      echo '<table class="table"><tr><td style="text-align:left;width:50%;"><span id="menuDynamiqueInfo"></span></td><td style="text-align:right;font-size: 200%;"><i><span style="color:blue;">France</span>&nbsp;<span style="color:white;">20</span><span style="color:red;">18</span></i></td></tr></table>';
    }
  
    protected function afficher_fin() {
      echo '</div>';
    }
  }
  // ========================================================================
?>
