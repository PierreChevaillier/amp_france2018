<?php
  // ===========================================================================
  // description : definition de la classe Journal_Annonces_Bateau
  //               affichage des annonces en tant que contenu d'une page web
  // utilisation : conteu page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP. Tous droits reserves.
  // ---------------------------------------------------------------------------
  // creation: 06-fev-2017 pchevaillier@gmail.com
  // revision:
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // - en chantier
  // a faire :
  // ------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/element_page.php';
  require_once 'temps/calendrier.php';
  require_once 'elements/annonce_bateau.php';
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe Journal_Actualites
  
  class Journal_Annonces_Bateau extends Element_Page {
    private $site_web = null;
    public $annonces= array();
  
  
    public function initialiser() {
      //$this->annonces = Enregistrement_Annonce_bateau::rechercher();
    }
  
    protected function afficher_debut() {
      echo '<div>';
    }
  
    protected function afficher_corps() {
      echo '<div class="panel panel-default"><div class="panel-body">';
      foreach ($this->annonces as $annonce)
        $this->afficher_item($annonce);
      echo '</div></div>';
    }
  
    protected function afficher_fin() {
      echo '</div>';
    }
  
    private function afficher_item($annonce) {
      $cal = Calendrier::obtenir();
    }
  
  }
  // ========================================================================
  ?>
