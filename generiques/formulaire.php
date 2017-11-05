<?php
  // ========================================================================
  // description : definition de la classe Formulaire
  //               gestion d'un formulaire simple
  // utilisation : destine a etre affiche dans une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017 AMP
  // ------------------------------------------------------------------------
  // creation: 22-oct-2017 pchevaillier@gmail.com
  // revision:
  // ------------------------------------------------------------------------
  // commentaires :
  // - en chantier
  // attention :
  // -
  // a faire :
  // ------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/element_page.php';
  require_once 'generiques/champ_formulaire.php';
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe Formulaire

  /**
   * @author Pierre Chevaillier
   */
  class Formulaire extends Element_Page {

    protected $page_web = ""; // necessaire pour ajouter les scripts de controle des champs
    protected $script_traitement = "";
    public $champs = array();
  
    public function __construct($page, $script_traitement) {
      $this->page_web = $page;
      $this->script_traitement = $script_traitement;
    }
  
    public function initialiser() {
      foreach ($this->champs as $champ) {
        $champ->def_page_web($this->page_web);
        $champ->initialiser();
      }
    }
  
    protected function afficher_debut() {
      echo '<div>';
      echo '<div class="well well-sm"><p class="lead">' . $this->titre() . '</p></div>';
      echo '<form role="form" class="form-horizontal" name="formulaire" method="post" action="' . $this->script_traitement . '">';
    }
  
    protected function afficher_corps() {
      foreach ($this->champs as $champ)
        $champ->afficher();
    }
  
    protected function afficher_fin() {
      echo '<div align="center">';
      echo '<input class="btn btn-large btn-primary" type="submit" id="valid" value="Envoyer votre demande">';
      echo '</div></form></div>';
    }
  
  }
  // ===========================================================================
?>
