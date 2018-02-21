<?php
  // ========================================================================
  // description : definition de la classe Element
  // utilisation : classe racine des elements de pages web, pages comprises
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Elements generique d'un site web
  // Copyright (c) 2017-208 AMP. Tous droits reserves.
  // ------------------------------------------------------------------------
  // creation : 04-jun-2017 pchevaillier@gmail.com
  // revision : 06-fev-2018 pchevaillier@gmail.com ajout Conteneur_Elements
  // ------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // ------------------------------------------------------------------------

  // --- Classes utilisees

  // ------------------------------------------------------------------------
  // --- Definition de la classe Element

  abstract class Element {

  /**
    * @var string
    */
  private $titre = "";
  public function titre() { return $this->titre; }
  public function def_titre($titre) { $this->titre = $titre; }
  public function a_un_titre() { return strlen($this->titre) > 0; }
  
  /**
    *
    */
  public abstract function initialiser();

  /**
    *
    */
  final public function afficher() {
  	$this->afficher_debut();
    $this->afficher_corps();
    $this->afficher_fin();
  }

  /**
    *
    */
  protected abstract function afficher_debut();

  /**
    *
    */
  protected abstract function afficher_corps();

  /**
    *
    */
  protected abstract function afficher_fin();
}
  
  // --------------------------------------------------------------------------
  class Conteneur_Elements extends Element {
    public $elements = array();
    
    public function initialiser() {
      foreach ($this->elements as $element)
        $element->initialiser();
    }
    
    protected function afficher_debut() {
      echo "\n";
    }
    
    protected function afficher_corps() {
      foreach ($this->elements as $element)
        $element->afficher();
    }
    
    protected function afficher_fin() {
      echo "\n";
    }
  }
  
  
  // ========================================================================
