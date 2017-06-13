<?php
// ========================================================================
// description : definition de la classe Site
//               identification (pnetions legagles), localisation
// utilisation : Definition des parametres generaux du site.
// teste avec  : PHP 5.5.3 sur Mac OS 10.11
// contexte    : Elements generique d'un site web
// Copyright (c) 2017 AMP
// ------------------------------------------------------------------------
// creation : 05-juin-2017 pchevaillier@gmail.com
// revision :
// ------------------------------------------------------------------------
// commentaires :
// - singleton car unique et utilise par de nombreuses classes d'objet
// attention :
// a faire :
// ------------------------------------------------------------------------

// --- Classes utilisees

// ------------------------------------------------------------------------
// --- Definition de la classe Site

class Site {

  public $nom = "";
  
  private $sigle_proprietaire = "AMP";
  public static function sigle_proprietaire() { return Site::$instance->sigle_proprietaire; }
  public static function copyright() { return Site::$instance->sigle_proprietaire; }
  
  private $nom_proprietaire = "Aviron de Mer de Plougonvelin";
  public static function nom_proprietaire() { return Site::$instance->nom_proprietaire; }
  
  private $adresses = array();
  public static function adresses() { return Site::$instance->adresses; }
  
  public $telephones = array();
  public static function telephones() { return Site::$instance->telephones; }

  private $mail_contact = "france2018@avironplougonvelin.fr";
  public static function mail_contact() { return Site::$instance->mail_contact; }
  
  private $directeur_publication = "Joël Champeau, président de l’association";
  public static function directeur_publication() { return  Site::$instance->directeur_publication; }
  
  private $redaction = "Pierre Chevaillier";
  public static function redaction() { return  Site::$instance->redaction; }
  
  private $hebergeur = "OVH, France";
  public static function hebergeur() { return  Site::$instance->hebergeur; }
  
  public $fuseau_horaire = "Europe/Paris";
  public $latitude = 48.347;
  public $longitude = -4.704;
  public $elevation = 6.0;
  
  public static $instance;
  
  public function __construct($nom_site) {
    $this->nom = $nom_site;
    Site::$instance = $this;
    
  }
  
  public function initialiser() {
    // Fuseau horaire (necessaire pour utiliser la fonction date
    date_default_timezone_set($this->fuseau_horaire);
    
    $this->adresses[] = "4 boulevard de la Mer";
    $this->adresses[] = "29217 Plougonvelin, France";
    $this->telephones[] = "+33 2 98 48 27 41";
    $this->telephones[] = "+33 6 82 74 71 22";
    
  }
  
}
// ========================================================================
