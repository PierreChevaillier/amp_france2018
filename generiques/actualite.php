<?php
  // ==========================================================================
  // description : definition de la classe Actualite et des classes associees
  // utilisation : pages web affichant une actualite
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Elements generique d'un site web
  // Copyright (c) 2017-2018 AMP
  // --------------------------------------------------------------------------
  // creation : 13-jun-2017 pchevaillier@gmail.com
  // revision : 06-nov-2017 pchevaillier@gmail.com lien media
  // revision : 13-jan-2018 pchevaillier@gmail.com actualites dans base donnees
  // revision : 30-jan-2018 pchevaillier@gmail.com affichage une actualite
  // --------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // --------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'temps/calendrier.php';
  require_once 'prive/connexion_bdd.php';
  require_once 'generiques/element_page.php';
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe Actualite

  class Actualite {
    private $code = null;
    public function code() { return $this->code; }
    
    private $titre = "";
    public function titre() { return $this->titre; }

    public $date = "";
    public $resume = "";
    public $texte = "";
    public $lien_media = "#";
    public $nom_fichier_vignette = "";
    
    public $categorie;
    
    public function __construct($code, $titre) {
      $this->code = $code;
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
  
  // ----------------------------------------------------------------------------
  class Enregistrement_Actualite {
    
    static function source() {
      return Base_Donnees::$prefix_table . 'actualites';
    }
    
    static public function recherche_actualites($code_site, $code_categorie) {
      $bdd = Base_Donnees::accede(); // recupere l'access a la base de donnees
      $cal = Calendrier::obtenir();
      
      if (strlen($code_categorie) > 0)
          $select_categorie = " AND code_categorie = '" . $code_categorie . "' ";
      $requete = "SELECT code, date, titre, resume, texte, chemin_media FROM " . self::source() . " WHERE code_site = '" . $code_site . $select_categorie . "' ORDER BY date DESC";
      //echo $requete;
      $actus = array();
      
      try {
        $resultat = $bdd->query($requete);
        while ($donnee = $resultat->fetch()) {
          $actu = new Actualite($donnee['code'], $donnee['titre']);
          $d = new Instant($donnee['date']);
          $actu->date = $cal->date_texte($d);
          $actu->lien_media = $donnee['chemin_media'];
          $actu->nom_fichier_vignette = $donnee['chemin_media'];
          $actu->resume = $donnee['resume'];
          $actu->texte = $donnee['texte'];
          $actus[] = $actu;
        }
      } catch (PDOexception $e) {
        die("Erreur recherche actualites : ligne " . $e->getLine() . ' :</b> '. $e->getMessage());
      }
      $resultat->closeCursor();
      return $actus;
    }
    
    static public function recherche_actualite($code) {
      $bdd = Base_Donnees::accede(); // recupere l'access a la base de donnees
      $cal = Calendrier::obtenir();
      
      $requete = "SELECT date, titre, resume, texte, chemin_media FROM " . self::source() . " WHERE code = '" . $code . "'";
      try {
        $resultat = $bdd->query($requete);
        $donnee = $resultat->fetch();
        $actu = new Actualite($code, $donnee['titre']);
        $d = new Instant($donnee['date']);
        $actu->date = $cal->date_texte($d);
        $actu->lien_media = $donnee['chemin_media'];
        $actu->nom_fichier_vignette = $donnee['chemin_media'];
        $actu->resume = $donnee['resume'];
        $actu->texte = $donnee['texte'];
        
      } catch (PDOexception $e) {
        die("Erreur recherche actualites : ligne " . $e->getLine() . ' :</b> '. $e->getMessage());
      }
      $resultat->closeCursor();
      return $actu;
    }
  }
  
  class Vue_Actualite extends Element_Page {
    private $code_actu = null;
    private $actualite = null;
    private $chemin_images = "";
    private $page_suivante = ""; // page a afficher quand on quitte la page courante
    
    public function __construct($code, $dossier_images, $page_suivante) {
      $this->code_actu = $code;
      $this->chemin_images = $dossier_images;
      $this->page_suivante = $page_suivante;
    }
    
    public function initialiser() {
      $this->actualite = Enregistrement_Actualite::recherche_actualite($this->code_actu);
    }
    
    protected function afficher_debut() {
      echo '<div>';
    }
    
    protected function afficher_corps() {
      $fichier_image = $this->chemin_images . '/' . $this->actualite->lien_media;
      echo '<h1>' . utf8_encode($this->actualite->titre()) . '</h1></div>';
      echo '<div style="padding:10px;"><img width="100%" src="'. $fichier_image . '" /><p>' . utf8_encode($this->actualite->resume) . '</p><p>' . utf8_encode($this->actualite->texte) . '</p></div>';
      echo '<div><center><a href="' . $this->page_suivante . '" class="btn btn-lg btn-primary" role="button">Retour au journal des actualités</a></center></div>';
    }
    
    protected function afficher_fin() {
      echo '</div>';
    }
  }
  // ========================================================================
?>
