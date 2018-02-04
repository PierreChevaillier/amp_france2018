<?php
  // ===========================================================================
  // description : definition de la classe Contenu_Contact
  //               affichage des moyens de contact des organisateurs de l'evenement
  // utilisation : destine a etre affiche sur une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017 AMP
  // ------------------------------------------------------------------------
  // creation : 22-oct-2017 pchevaillier@gmail.com
  // revision : 04-fev-2018 pchevaillier@gmail.com mise en forme
  // ---------------------------------------------------------------------------
  // commentaires :
  // -
  // attention :
  // -
  // a faire :
  // ===========================================================================
  
  // --- Classes utilisees
  require_once 'generiques/element_page.php';
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe Contenu_Contact
  
  class Contenu_Contact extends Element_Page {

    private $formulaire; // demande information
    private $information; // comment contacter les organisateus de l'evenement
  
    public function __construct($formulaire, $info_contact) {
      $this->formulaire = $formulaire;
      $this->information = $info_contact;
    }
  
    public function initialiser() {
      $this->formulaire->initialiser();
      $this->information->initialiser();
    }
  
    protected function afficher_debut() {
      echo '<div class="container-fluid" style="padding:10px;"><div class="row">';
    }
  
    protected function afficher_corps() {
      echo '<div class="col-sm-8">';
      $this->formulaire->afficher();
      echo '</div>';
      echo '<div class="col-sm-4">';
      $this->information->afficher();
      echo '</div>';
    }
  
    protected function afficher_fin() {
      echo '</div></div>';
    }
  }
  
  // ===========================================================================
?>
