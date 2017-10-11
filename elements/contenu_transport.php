<?php
  // ========================================================================
  // description : definition de la classe Contenu_Transport
  //               affichage des moyens d'acces a l'eveneent
  //               et d'un cadre contacts et partenaires
  // utilisation : destine a etre affiche sur la page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017 AMP
  // ------------------------------------------------------------------------
  // creation: 11-oct-2017 pchevaillier@gmail.com
  // revision:
  // ------------------------------------------------------------------------
  // commentaires :
  // -
  // attention :
  // -
  // a faire :
  // - ajouter le lien vers le site web
  // ========================================================================
  
  // --- Classes utilisees
  require_once 'generiques/element.php';
  require_once 'generiques/element_page.php';
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe Information_Transport

  class Information_Transport extends Element {
    public $chemin_picto = "";
    public $nom_fichier_picto = "";
    public $lien_site_web = "";
    
    public function initialiser() {}
    
    protected function afficher_debut() {
      echo '<li class="media"><div class="media-left">';
    }
    
    protected function afficher_corps() {
      $source = $this->chemin_picto . '/' . $this->nom_fichier_picto;
      $lien = "#";
      echo '<a href="' . $lien . '"><img class="media-object" src="' . $source . '" alt="alt"></a></div><div class="media-body">';
      echo '<h4 class="media-heading">' . $this->titre() . '</h4>';
      echo '<p>' . $this->contenu . '</p>';
    }
    
    protected function afficher_fin() {
      echo '</div></li>';
    }
  }
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe Contenu_Transport
  
  class Contenu_Transport extends Element_Page {

    private $moyens_transport = array();
    private $contact;
  
    public function __construct($liste_transports, $contact) {
      foreach ($liste_transports as $item)
        $this->moyens_transport[] = $item;
      $this->contact = $contact;
    }
  
    public function initialiser() {
      foreach ($this->moyens_transport as $item) {
        $item->initialiser();
      }
    }
  
    protected function afficher_debut() {
      echo '<div class="container"><div class="row">';
    }
  
    protected function afficher_corps() {
      echo '<div class="col-sm-8">';

      echo '<div class="panel panel-default"><div class="panel-body"><ul class="media-list">';
      foreach ($this->moyens_transport as $item)
        $item->afficher();
      echo '</ul></div></div>';
      echo '</div>';
      echo '<div class="col-sm-4">';
      $this->contact->afficher();
      echo '</div>';
    }
  
    protected function afficher_fin() {
      echo '</div></div>';
    }
  }
  
  // ========================================================================
