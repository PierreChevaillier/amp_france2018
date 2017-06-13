<?php
// ========================================================================
// description : definition de la classe Actualite et des classes associees
// utilisation : page actualites
// teste avec  : PHP 5.5.3 sur Mac OS 10.11
// contexte    : Elements generique d'un site web
// Copyright (c) 2017 AMP
// ------------------------------------------------------------------------
// creation : 13-juin-2017 pchevaillier@gmail.com
// revision :
// ------------------------------------------------------------------------
// commentaires :
// attention :
// a faire :
// ------------------------------------------------------------------------

// --- Classes utilisees

// ------------------------------------------------------------------------
// --- Definition de la classe Actualite

  class Actualite {

    private $titre = "";
    public function titre() { return $this->titre; }

    public $date_publication;
  
    public $contenu = "";
  
    public $chemin_fichier_image = "";
    
    public $lien_media = "";
    
    public $categorie;
    
    public function __construct($titre) {
      $this->titre = $titre;
    }
}
  

  class Categorie {
    private $nom = "";
    public function nom() { return $this->nom; }
    
    public function __construct($titre) {
      $this->titre = $titre;
    }
    
  }
// ========================================================================
