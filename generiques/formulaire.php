<?php
  // ========================================================================
  // description : definition de la classe Formulaire
  //               gestion d'un formulaire simple
  // utilisation : destine a etre affiche dans une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP
  // ------------------------------------------------------------------------
  // creation : 22-oct-2017 pchevaillier@gmail.com
  // revision : 04-fev-2018 pchevaillier@gmail.com mode responsive
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
      echo '<div class="well well-sm"><p class="lead">' . $this->titre() . '</p></div>';
      echo '<form class="form-horizontal" role="form"  name="formulaire" method="post" action="' . $this->script_traitement . '">';
    }
  
    protected function afficher_corps() {
      foreach ($this->champs as $champ)
        $champ->afficher();
      $this->afficher_boutton_validation();
    }
  
    protected function afficher_boutton_validation() {
      echo '<div class="form-group"><div class="col-sm-offset-2 col-sm-10">';
      echo '<input class="btn btn-large btn-primary" type="submit" id="valid" value="Envoyer votre demande"></div></div>';
      
    }
    protected function afficher_fin() {
      echo '</form>';
    }
  
  }
  // ===========================================================================
?>
