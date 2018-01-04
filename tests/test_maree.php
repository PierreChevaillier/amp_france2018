<?php
  // ===========================================================================
  // description : definition des classes relatives aux marees
  // utilisation :
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11 ; PHP 7 sur serveur OVH
  // contexte    : Applications WEB
  // Copyright (c) 2017-2018 AMP
  // ---------------------------------------------------------------------------
  // creation: 04-jan-2018 pchevaillier@gmail.com
  // revision:
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // ===========================================================================
  
  // --- Classes utilisees
  require_once 'temps/calendrier.php';
  require_once 'generiques/element.php';
  require_once 'elements/information_jour.php';

 
  class Vue_Test_Marees extends Element {
    var $lieu; // Le Trez Hir
    var $jour;
    var $vue_reference;
    
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
      
      $table_marees = new Table_Marees_Jour($marees_jour);
      $this->vue_reference = new Cadre_Ephemeride($this->jour, $table_marees);
    }
  }
  
  // ===========================================================================
?>
