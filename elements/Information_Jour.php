<?php
  // ===========================================================================
  // description : definition des classes pour afficher les informations
  //               sur chaque jour de l'evenement
  // utilisation : destine a etre affiche sur la page du programme
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017 AMP
  // ---------------------------------------------------------------------------
  // creation: 18-nov-2017 pchevaillier@gmail.com
  // revision: 22-nov-2017 pchevaillier@gmail.com
  // revision: 28-nov-2017 pchevaillier@gmail.com responsive /tablette
  // commentaires :
  // https://openclassrooms.com/courses/prenez-en-main-bootstrap/un-peu-de-pratique-15
  // attention :
  // a faire :
  // ---------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/element_page.php';
  require_once 'temps/calendrier.php';

  // ------------------------------------------------------------------------
 
  abstract class Element_Jour extends Element_Page {
    protected $jour;
    public function __construct($jour) {
      $this->jour = $jour;
    }
  }
  
  class Cadre_Information_Jour extends Element_Jour {
    private $contenu_principal;
    private $contenu_annexe;
  
    public function __construct($jour, $contenu1, $contenu2) {
      parent::__construct($jour);
      $this->contenu_principal = $contenu1;
      $this->contenu_annexe = $contenu2;
    }
 
    public function initialiser() {
      $this->contenu_principal->initialiser();
      $this->contenu_annexe->initialiser();
    }
    
    protected function afficher_debut() {
      echo '<div class="container" style="padding:0px;" ><div class="row" style="padding:0px;">';
    }
  
    protected function afficher_corps() {
      echo '<div class="col-sm-2 col-md-1" style="padding:0px;" >';
      $this->afficher_jour();
      echo '</div><div class="col-sm-10 col-md-7" style="padding:0px;" >';
      $this->contenu_principal->afficher();
      echo '</div><div class="col-sm-12 col-md-4">';
      $this->contenu_annexe->afficher();
      echo '</div>';
    }
  
    protected function afficher_fin() {
      echo "</div></div>\n";
    }
    
    protected function afficher_jour() {
      echo '<div class="jour-mois">' . date("j", $this->jour->date())  . '</div>';
      echo '<div class="jour-sem">' . Calendrier::obtenir()->jour_semaine($this->jour) . '</div>';
    }
  
  }
  
  // ------------------------------------------------------------------------
  class Cadre_Programme_Jour extends Element_Jour {
    private $programme;
    
    public function __construct($jour, $programme_jour) {
      parent::__construct($jour);
      $this->programme = $programme_jour;
    }

    public function initialiser() {
      $this->programme->initialiser();
    }

    protected function afficher_debut() {
      echo "\n";
     }
    
    protected function afficher_corps() {
      $this->afficher_titre();
      $this->programme->afficher();
      }
    
    protected function afficher_fin() {
      echo "\n";
    }
 
    protected function afficher_titre() {
      echo '<div class="titre-prog-jour">' . $this->titre()  . '</div>';
    }
    
  }
  
  // ---------------------------------------------------------------------------
  class Cadre_Ephemerides extends Element_Jour {
    private $info_marees;
    
    public function __construct($jour, $table_marees) {
      parent::__construct($jour);
      $this->info_marees = $table_marees;
    }
    
    public function initialiser() {
      $this->info_marees->initialiser();
    }
    
    protected function afficher_debut() {
      echo '<div class="panel panel-default"><div class="panel-body">';
    }
    
    protected function afficher_corps() {
      if ($this->a_un_titre())
        echo '<h4>' . $this->titre() . '</h4>';
      $this->info_marees->afficher();
    }
    
    protected function afficher_fin() {
      echo "</div></div>\n";
    }
  }
  
  // ========================================================================
?>
