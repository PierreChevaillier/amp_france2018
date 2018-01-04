<?php
  // ===========================================================================
  // description : definition des classes relatives aux marees
  // utilisation :
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11 ; PHP 7 sur serveur OVH
  // contexte    : Applications WEB
  // Copyright (c) 2017-2018 AMP
  // ---------------------------------------------------------------------------
  // creation: 11-nov-2017 pchevaillier@gmail.com
  // revision: 28-nov-2017 pchevaillier@gmail.com 
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // ===========================================================================
  
  
  // --- Classes utilisees
  require_once 'temps/calendrier.php';
  require_once 'generiques/element.php';
  require_once 'prive/connexion_bdd.php';
  
  // ---------------------------------------------------------------------------
  class Point_Maree {
    private $instant = null;
    private $hauteur = 0.0;
    private $point = '';
    public function point() {
      return $this->point;
    }
    
    public function hauteur() {
      return $this->hauteur;
    }
    
    public function heure() {
      return $this->instant;
    }
    
    public function __construct($point, $instant, $hauteur) {
      $this->instant = $instant;
      $this->hauteur = $hauteur;
      $this->point = $point;
    }
    
    public function dupliquer() {
      $heure = $this->instant->dupliquer();
      $copie = new Point_Maree($this->point, $heure, $this->hauteur);
      return $copie;
    }
  }
  
  // ---------------------------------------------------------------------------
  class Maree {
    public $debut = null;
    public $fin = null;
    
    private $coefficient = 0;
    public function coefficient() {
      return $this->coefficient;
    }
    public function def_coefficient($valeur) {
      $this->coefficient = $valeur;
    }
    
    public function __construct($debut, $fin) {
      $this->debut = $debut->dupliquer();
      $this->fin = $fin->dupliquer();
    }
    
    public function marnage() {
      return abs($this->debut->hauteur() - $this->fin->hauteur());
    }
  }
  
  // ---------------------------------------------------------------------------
  class Marees_Jour {
    private $jour = null;
    private $marees = array();
    
    public function __construct($jour) {
      $this->jour = $jour;
    }
    
    public function ajouter_dans_marees($maree) {
      $this->marees[] = $maree;
    }
    
    public function marees() {
      return $this->marees;
    }
  }
  
  // ===========================================================================
  // Presentation des informations sur les marees
  
  
  class Table_Marees_Jour extends Element {
    private $marees = null; // l'objet qui contient les marees a afficher
    
    public function __construct($marees_jour) {
      $this->marees = $marees_jour;
    }
    
    public function initialiser() {}
    
    private function afficher_niveaux() {
      echo '<div style="height:120px; float:left;" >';
      foreach ($this->marees->marees() as $maree) {
        if ($maree->debut->point() === 'PM')
          echo '<div class="maree_haute" style="width:40px; height:30px;">PM</div>';
        else
          echo '<div class="maree_basse" style="width:40px; height:30px;">BM</div>';
        if ($maree->fin->point() === 'PM')
          echo '<div class="maree_haute" style="width:40px; height:30px;">PM</div>';
        else
          echo '<div class="maree_basse" style="width:40px; height:30px;">BM</div>';
      }
      echo '</div>';
    }
    
    private function afficher_heures() {
      echo '<div style="height:120px; float:left;" >';
      foreach ($this->marees->marees() as $maree) {
        $classe_div = ($maree->debut->point() === 'PM') ? 'maree_haute': 'maree_basse';
        echo '<div class="' . $classe_div . '" style="width:60px; height:30px;">' . Calendrier::obtenir()->heures_minutes_texte($maree->debut->heure()) . '</div>';
        
        $classe_div = ($maree->fin->point() === 'PM') ? 'maree_haute': 'maree_basse';
        echo '<div class="' . $classe_div . '" style="width:60px; height:30px;">' . Calendrier::obtenir()->heures_minutes_texte($maree->fin->heure()) . '</div>';
      }
      echo '</div>';
    }
    
    private function afficher_hauteurs() {
      echo '<div style="height:120px; float:left;" >';
      foreach ($this->marees->marees() as $maree) {
        $classe_div = ($maree->debut->point() === 'PM') ? 'maree_haute': 'maree_basse';
        echo '<div class="' . $classe_div . '" style="width:60px; height:30px;">' . $maree->debut->hauteur() . ' m</div>';
        
        $classe_div = ($maree->fin->point() === 'PM') ? 'maree_haute': 'maree_basse';
        echo '<div class="' . $classe_div . '" style="width:60px; height:30px;">' . $maree->fin->hauteur() . ' m</div>';
      }
      echo '</div>';
    }
    
    
    private function afficher_coefficients() {
      echo '<div style="height:120px; float:left; ">';
      foreach ($this->marees->marees() as $maree)
      echo '<div class="cadre_coef_maree" style="width:40px;"><div class="coef_maree">' . $maree->coefficient() . '</div></div>';
      echo '</div>';
    }
    
    private function afficher_marnages() {
      echo '<div style="height:120px; float:left; ">';
      foreach ($this->marees->marees() as $maree)
      echo '<div class="marnage_maree" style="width:60px;">' . $maree->marnage() . ' m</div>';
      echo '</div>';
    }
    
    public function afficher_debut() {
      echo '<div>';
    }
    
    public function afficher_corps() {
      $this->afficher_niveaux();
      $this->afficher_coefficients();
      $this->afficher_heures();
      $this->afficher_hauteurs();
      $this->afficher_marnages();
      echo '<div style="clear: both;"></div>';
    }
    
    public function afficher_fin() {
      echo '</div>';
    }
  }
  
  class Vue_Test_Marees extends Element {
    $lieu; // Le Trez Hir
    $jour;
    
    $donnees_reference;
    $donnees_base; // celles de la base de donnees
    
    public function initialiser() {
      $cal = Calendrier::obtenir();
      $this->lieu = '1'; // Trez Hir dans la table
      $this->jour = $cal->jour(24, 5, 2018); // jeudi
      $this->def_resultat();
    }
    
    
    public function afficher_debut() {
      echo '<div>';
    }
    
    public function afficher_corps() {
      echo '<p>Tests marees</p>';
    }
    
    public function afficher_fin() {
      echo '</div>';
    }
    
    private function def_resultat() {
      $marees_jour = new Marees_Jour($this->jour);
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($jour, 1, 21, 0), 5.5),
                     new Point_Maree('BM', $cal->heure($jour, 7, 42, 0), 2.0));
      $m->def_coefficient(57);
      $marees_jour->ajouter_dans_marees($m);
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($jour, 14, 01, 0), 5.45),
                     new Point_Maree('BM', $cal->heure($jour, 20, 14, 0), 2.10));
      $m->def_coefficient(59);
      $marees_jour->ajouter_dans_marees($m);
      
      $table_marees = new Table_Marees_jour($marees_jour);
    }
  }
  
  // ===========================================================================
  // Enregistrement des informations sur les marees
  
  class Enregistrement_Maree {
    
    static public function recherche_marees_jour($base_donnees, $jour, $lieu) {
      $bdd = Base_Donnees::accede();
      $cal = Calendrier::obtenir();
      
      $horaires = array();
      $coefficients = array();
      self::recherche_horaires($bdd,
                               $jour->date(),
                               $cal->lendemain($jour)->date(),
                               $horaires,
                               $coefficients);
      $table = new Table_Marees_Jour();
      
      return $table;
    }
    
    static public function recherche_horaires($base_donnees, $debut, $fin, & $horaires, & $coefficients) {
      $requete = "SELECT date, etat, heure, hauteur, coefficient FROM heures_marees  WHERE heure BETWEEN '" . $debut . "' AND '" . $fin . "' ORDER BY heure";
      //echo $requete;
      try {
        $resultat = $base_donnees->query($requete);
        while ($donnee = $resultat->fetch()) {
          $h = new Point_Maree();
          $horaires[] = $h;
          $h->point = $donnee['etat'];
          $h->instant = $donnee['heure'];
          $h->hauteur = $donnee['hauteur'];
          //          $h->date_clair = $donnee['date'];
          if ($h->point == "PM") {
            $coefficients[$h] = $donnee['coefficient'];
          }
        }
      } catch (PDOexception $e) {
        die("Erreur recherche marees : ligne " . $e->getLine() . ' :</b> '. $e->getMessage());
      }
      $resultat->closeCursor();
      return count($horaires);
    }
    
  }
  
  // ===========================================================================
  ?>
