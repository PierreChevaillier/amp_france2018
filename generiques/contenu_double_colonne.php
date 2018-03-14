<?php
  // ==========================================================================
  // description : definition de la classe Contenu_Double_Colonne
  // utilisation : destine a etre affiche dans une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP. Tous droits reserves
  // --------------------------------------------------------------------------
  // creation : 06-fev-2018 pchevaillier@gmail.com
  // revision : 24-fev-2018 pchevaillier@gmail.com padding
  // --------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // --------------------------------------------------------------------------
  
  // --- Classes utilisees
  require_once 'generiques/element_page.php';
  
  // --------------------------------------------------------------------------
  // --- Definition de la classe
  
  class Contenu_Double_Colonne extends Element_Page {

    public $principal;
    public $secondaire;
    private $format_principal = 'col-sm-8';
    private $format_secondaire = 'col-sm-4';
    
    public function __construct($principal, $secondaire,
                                $format_principal = 'col-sm-8',
                                $format_second = 'col-sm-4') {
      $this->principal = $principal;
      $this->secondaire = $secondaire;
      $this->format_principal = $format_principal;
      $this->format_secondaire = $format_second;
    }
  
    public function initialiser() {
      $this->principal->initialiser();
      $this->secondaire->initialiser();
    }
   
    protected function afficher_debut() {
      echo '<div class="container" style="padding:10px;><div class="row">';
    }
  
    protected function afficher_corps() {
      echo '<div class="' . $this->format_principal . '" style="padding:10px;" >';
      $this->principal->afficher();
      echo '</div>';
      echo '<div class="' . $this->format_secondaire . '">';
      $this->secondaire->afficher();
      echo '</div>';
    }
  
    protected function afficher_fin() {
      echo '</div></div>';
    }
  }
  // ==========================================================================
  ?>
