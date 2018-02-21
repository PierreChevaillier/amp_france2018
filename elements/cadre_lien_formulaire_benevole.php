<?php
  // ==========================================================================
  // description : definition de la classe Cadre_Lien_Formulaire_Benevole
  //               affichage d'un cadre avec un lien vers formualaire benevole
  // utilisation : destine a etre affiche comme contenu d'une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // dependance  : bootstrap 3.3 https://getbootstrap.com/docs/3.3/
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2108 AMP. Tous droits reserves.
  // --------------------------------------------------------------------------
  // creation : 08-fev-2018 pchevaillier@gmail.com
  // revision : 10-fev-2018 pchevaillier@gmail.com correction lien -> formulaire
  // --------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // ==========================================================================
  
  // --- Classes utilisees
  require_once 'generiques/element_page.php';

  // --------------------------------------------------------------------------
  // --- Definition de la classe

  class Cadre_Lien_Formulaire_Benevole extends Element_Page {
    private $page_cible = "https://docs.google.com/forms/d/e/1FAIpQLScLkB08ZfDKLDJD1lRKuX0RBNbZfUSnzOym2ptZicw3CONe_w/viewform?usp=sf_link";
    
    public function initialiser() {
      $this->def_titre("Devenez bénévole");
    }
  
    protected function afficher_debut() {
      echo '<div class="page-header">';
    }
  
    protected function afficher_corps() {
     echo '<ul class="pager"><li><a class="bouton-lien" href="' . $this->page_cible . '" target="_new">' . $this->titre() . '</a></li></ul>';
    }
  
    protected function afficher_fin() {
      echo '</div>';
    }
  }
  // ==========================================================================
?>
