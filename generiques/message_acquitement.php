<?php
  // ===========================================================================
  // description : definition de la classe Message_Confirmation
  //               affichage d'un cadre avec un message et un bouton 'Continuer'
  // utilisation : element d'une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP
  // ---------------------------------------------------------------------------
  // creation: 29-oct-2017 pchevaillier@gmail.com
  // revision: 18-fev-2018 pchevaillier@gmail.com affichage titre
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // ===========================================================================
  
  // --- Classes utilisees
  require_once 'generiques/element_page.php';

  // ---------------------------------------------------------------------------
  // --- Definition de la classe

  /**
   * @author Pierre Chevaillier
   */
  class Message_Confirmation extends Element_Page {

    private $texte = "";
    private $page_suivante = "";
  
    public function __construct($texte, $page_suivante) {
      $this->texte = $texte;
      $this->page_suivante = $page_suivante;
      
    }
  
    public function initialiser() {
    }
  
    
    protected function afficher_debut() {
      echo '<div><center>';
    }
  
    protected function afficher_corps() {
      echo '<div class="well well-sm"><h2>' . $this->titre() . '</h2></div>';
      echo '<div>' . $this->texte . '</div>';
      echo '<a href="' . $this->page_suivante . '" class="btn btn-lg btn-primary" role="button">Continuer</a>';
    }
  
    protected function afficher_fin() {
      echo '</center></div>';
    }
  }
  // ===========================================================================
?>
