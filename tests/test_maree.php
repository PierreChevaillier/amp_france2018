<?php
  // ===========================================================================
  // description : definition des classes pour les tests sur les marees
  // utilisation : composant d'une page web dynamique
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11 ; PHP 7 sur serveur OVH
  // contexte    : Applications WEB
  // Copyright (c) 2017-2018 AMP. All rights reserved.
  // ---------------------------------------------------------------------------
  // creation: 04-jan-2018 pchevaillier@gmail.com
  // revision: 08-jan-2018 pchevaillier@gmail.com test duree
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // ===========================================================================
  
  // --- Classes utilisees
  require_once 'temps/calendrier.php';
  require_once 'generiques/element.php';
  require_once 'elements/information_jour.php';

 
  class Vue_Test_Maree extends Element {
    private $lieu = '';
    private $jour = null;
    private $marees_test = array();
    private $vue_reference = null;
    private $vue_donnees_table = null;
    
    public function initialiser() {
      $cal = Calendrier::obtenir();
      $this->lieu = '1'; // Trez Hir dans la table
      $this->jour = $cal->jour(6, 2, 2018); // jeudi
      $this->def_resultat();
      $this->recherche_donnees_table();
    }
    
    public function afficher_debut() {
      echo '<div>';
    }
    
    public function afficher_corps() {
      $cal = Calendrier::obtenir();
      echo "\n<p>Tests marees</p>";
      $cal = Calendrier::obtenir();
      $this->vue_reference->afficher();
      if ($this->vue_donnees_table)
        $this->vue_donnees_table->afficher();
      else
        echo '<p>pas de marée trouvée pour le ' . $cal->date_texte($this->jour) . '</p>';
      
      echo "\n<p> Durees des marees : ";
      
      foreach ($this->marees_test as $m) {
        echo '<p>' . $m->duree_texte() . '</p>';
      }
    }
    
    public function afficher_fin() {
      echo '</div>';
    }
    
    private function def_resultat() {
      $cal = Calendrier::obtenir();
      $j = $this->jour;
      
      $marees_jour = new Marees_Jour($this->lieu, $j);
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($j, 1, 21, 0), 5.5),
                     new Point_Maree('BM', $cal->heure($j, 7, 42, 0), 2.0));
      $m->def_coefficient(57);
      $marees_jour->ajouter_dans_marees($m);
      $this->marees_test[] = $m;
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($j, 14, 01, 0), 5.45),
                     new Point_Maree('BM', $cal->heure($j, 20, 14, 0), 2.10));
      $m->def_coefficient(59);
      $marees_jour->ajouter_dans_marees($m);
      $this->marees_test[] = $m;
      
      $table_marees = new Table_Marees_Jour($marees_jour);
      $this->vue_reference = new Cadre_Ephemerides($j, $table_marees);
    }
    
    private function recherche_donnees_table() {
      $marees_jour = Enregistrement_Maree::recherche_marees_jour($this->lieu,
                                                                 $this->jour);
      if ($marees_jour) {
        $table_marees = new Table_Marees_Jour($marees_jour);
        $this->vue_donnees_table = new Cadre_Ephemerides($this->jour,
                                                       $table_marees);
      }
    }
  }
  
  // ===========================================================================
?>
