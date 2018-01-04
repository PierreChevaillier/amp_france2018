<?php
  // ===========================================================================
  // description : definition des classes relatives a la representation du temps
  // utilisation : require_once car instantiation d'une variable statique
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Applications WEB
  // Copyright (c) 2017 AMP
  // ---------------------------------------------------------------------------
  // creation: 11-nov-2017 pchevaillier@gmail.com
  // revision:
  // ---------------------------------------------------------------------------
  // commentaires :
  // -
  // attention :
  // -
  // a faire :
  // ===========================================================================
  
  // --- Classes utilisees
  
  // --- variables static
  
  new Calendrier();
  
  // ---------------------------------------------------------------------------
  class Instant {
    private $valeur = 0;
    
    public function __construct($valeur) {
      $this->definir($valeur);
    }
    
    public function date() {
      return $this->valeur;
    }
    
    public function definir($valeur) {
      $this->valeur = $valeur;
    }
    
    public function dupliquer () {
      return new Instant($this->valeur);
    }
    
  }
    
  // ---------------------------------------------------------------------------
  class Calendrier {
    
    
    public static $jours = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
    public static $mois = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
    
    public static $jours_courts = array("lun", "mar", "mer", "jeu", "ven", "sam", "dim");
    public static $mois_courts = array("janv", "févr", "mars", "avr", "mai", "juin", "juil", "août", "sept", "oct", "nov", "déc");
    
    private static $instance = null;
    
    private static function reference($objet) {
      self::$instance = $objet;
    }
    
    public static function obtenir() {
      return self::$instance;
    }
    
    public function __construct() {
      self::reference($this);
    }
    
    public function jour_semaine($jour) {
      $j = $jour->date();
      return self::$jours[date("N", $j) - 1];
    }
    
    public function date_texte($jour) {
      $j = $jour->date();
      return self::$jours[date("N", $j) - 1] . " " . date("j", $j) . " " . self::$mois[date("n", $j) - 1] . " " . date("Y", $j);
    }
    
    public function date_texte_court($jour) {
      return self::$jours_courts[date("N", $jour) - 1] . " " . date("j", $jour) . " " . self::$mois_courts[date("n", $jour) - 1];
    }
    
    public function aujourdhui() {
      return $this->jour(date("d"), date("m"), date("Y"));
    }
    
    public function jour($jour_mois, $mois, $annee) {
      return new Instant(mktime(0, 0, 0, $mois, $jour_mois, $annee));
    }
   
    public function heure($jour, $heures, $minutes, $secondes) {
      $j = $jour->date();
      return new Instant(mktime($heures, $minutes, $secondes, date("n", $j), date("j", $j), date("Y", $j)));
    }

    public function maintenant() {
      return $this->heure($this->aujourdhui(), date("H"), date("i"), date("s"));
    }
    
    public function lendemain($jour) {
      $j = $jour->date();
      $l = mktime(0, 0, 0, date("n", $j), date("d", $j) + 1, date("Y", $j));
      $resultat = new Instant($l);
      return $resultat;
    }

    public function heures_minutes_texte($instant) {
      $h = date("H", $instant->date());
      $m = date("i", $instant->date());
      return $h . "h" . $m;
    }
  }
  
  // ===========================================================================
?>
