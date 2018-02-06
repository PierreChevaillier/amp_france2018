<?php
  // ==========================================================================
  // description : definition des classes / gestion bourse aux bateaux
  // utilisation : element d'une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2018 AMP. Tous droits reserves.
  // ------------------------------------------------------------------------
  // creation : 20-jan-2018 pchevaillier@gmail.com
  // revision : 04-fev-2018 pchevaillier@gmail.com dates, montant
  // ------------------------------------------------------------------------
  // commentaires :
  // - en chantier
  // attention :
  // -
  // a faire :
  // ========================================================================
  
  // --- Classes utilisees
  require_once 'generiques/formulaire.php';
  require_once 'temps/calendrier.php';
  require_once 'prive/connexion_bdd.php';
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe / Bloc de dates
  
  class Bloc_Dates extends Element {
    private $dates = array();
    
    protected $page_web = null;
    public function def_page_web($page) {
      $this->page_web = $page;
    }
    public function initialiser() {
      $item = new Champ_Binaire("j1-ma", "j1-ma", "");
      $item->texte = "Jeudi matin";
      $this->dates[] = $item;
      
      $item = new Champ_Binaire("j1-am", "j1-am", "");
      $item->texte = "Jeudi après-midi";
      $this->dates[] = $item;
     
      $item = new Champ_Binaire("j2-ma", "j2-ma", "");
      $item->texte = "Vendredi matin";
      $this->dates[] = $item;
      
      $item = new Champ_Binaire("j2-am", "j2-am", "");
      $item->texte = "Vendredi après-midi";
      $this->dates[] = $item;
      
      $item = new Champ_Binaire("j3-ma", "j3-ma", "");
      $item->texte = "Samedi matin";
      $this->dates[] = $item;
      
      $item = new Champ_Binaire("j3-am", "j3-am", "");
      $item->texte = "Samedi après-midi";
      $this->dates[] = $item;
      
      $item = new Champ_Binaire("j4-ma", "j4-ma", "");
      $item->texte = "Dimanche matin";
      $this->dates[] = $item;
      
      foreach ($this->dates as $d)
      $d->initialiser();
    }
    
    protected function afficher_debut() {
      //echo '<div><label class="control-label" for="dummy">' . $this->titre() . '</label>';
    }
   
    protected function afficher_fin() {
      //echo '</div>';
    }
 
    protected function afficher_corps() {
      foreach ($this->dates as $d)
        $d->afficher();
    }
    
  }
  // ------------------------------------------------------------------------
  // --- Definition de la classe / Formualire de saisie d'une annonce
  
  class Formulaire_Annonce_Bateau extends Formulaire {
  
    public function initialiser() {
      $item = null;
 
      $item = new Champ_Selection("typ", "typ", "");
      $item->def_titre("Type annonce");
      $item->options = array('dde' => "Demande", 'ofr' => "Offre");
      $this->champs[] = $item;

      $item = new Champ_Texte("cond", "cond", "");
      $item->def_titre("Prix / conditions");
      $this->champs[] = $item;
      
      $item = new Champ_Selection("bat", "bat", "");
      $item->def_titre("Type bateau");
      $item->options = array('1x' => "Solo", '2x' => "Double", '4+' => "4 barré pointe", '4x' => "4 barré couple");
      $this->champs[] = $item;

      $item = new Champ_Selection("pel", "pel", "");
      $item->def_titre("Avirons");
      $item->options = array('0' => "Aucun",  'H' => "Pelles hache", 'M' => "Pelles Mâcon", '_' => "Indifférent");
      $this->champs[] = $item;

      $item = new Bloc_Dates();
      $item->def_titre("Quand ?");
      $this->champs[] = $item;
      
      // --- Personne postant l'annonce
      $item = new Champ_Civilite("civ", "civ", "");
      $item->def_titre("Civilité");
      $this->champs[] = $item;
      
      $item = new Champ_Nom("prenom", "prenom", "scripts/controle_saisie_nom.js");
      $item->def_titre("Prénom");
      $this->champs[] = $item;
      
      $item = new Champ_Nom("nom", "nom", "scripts/controle_saisie_nom.js");
      $item->def_titre("Nom");
      $this->champs[] = $item;
  
      $item = new Champ_Courriel("courriel", "courriel", "scripts/controle_saisie_courriel.js");
      $item->def_titre("Adresse courriel");
      $this->champs[] = $item;
      
      $item = new Champ_Telephone("tel", "tel", "scripts/controle_saisie_telephone.js");
      $item->def_titre("Numéro de téléphone");
      $this->champs[] = $item;
      
      $item = new Champ_Texte("clb", "clb", "");
      $item->def_titre("Club");
      $this->champs[] = $item;
      
      $item = new Champ_Zone_Texte("msg", "msg", "");
      $item->def_titre("Laisser un message");
      $item->nombre_lignes = 10;
      $this->champs[] = $item;
      
      parent::initialiser();
    }
  
  }
  
  class Annonce_Bateau {
    public $auteur = null; // Personne (a faire plus tard)
    
    public $code_type = ""; // dde, ofr
    public $active = True;
    
    public $code_type_bateau = "";
    public $code_type_aviron = ""; // 0 => aucun H => Hachoir ou M => Macon
    
    
    public $civilite = "";
    public $prenom = "";
    public $nom = "";
    public $telephone = "";
    public $courriel = "";
    public $nom_club = "";
    
    public $j1_ma = False;
    public $j1_am = False;
    public $j2_ma = False;
    public $j2_am = False;
    public $j3_ma = False;
    public $j3_am = False;
    public $j4_ma = False;
    
    public $condition = "";
    public $texte = "";
    
    public function definir_depuis_formulaire() {
      $cal = Calendrier::obtenir();
      
      $this->code_type = strip_tags(trim(utf8_decode($_POST['typ'])));
      
      // Caracteristiques annonce
      $this->code_type_bateau = strip_tags(trim(utf8_decode($_POST['cod'])));
      $this->code_type_aviron = strip_tags(trim(utf8_decode($_POST['cod'])));

      // dates
      
      // Informations
      $this->condition = strip_tags(trim(utf8_decode($_POST['bat'])));
      $this->texte = strip_tags(trim(utf8_decode($_POST['pel'])));
      
      // Personne ayant poste l'annonce
      $this->civilite = strip_tags(trim(utf8_decode($_POST['civ'])));
      $this->prenom = strip_tags(trim(utf8_decode($_POST['prenom'])));
      $this->nom = strip_tags(trim(utf8_decode($_POST['nom'])));
      $this->telephone = strip_tags(trim(utf8_decode($_POST['tel'])));
      $this->adresse_mail = strip_tags(trim(utf8_decode($_POST['courriel'])));
      $this->club = strip_tags(trim(utf8_decode($_POST['clb'])));
      
    }
  }

  /*
  abstract class Enregistrement_Annonce {
    protected $annonce = null;
    
    public function __construct($annonce) {
      $this->annonce = $annonce;
    }
    
    abstract public function executer();
    
  }
  */
  
  class Enregistrement_Annonce_Bateau /* extends  Enregistrement_Annonce */ {
    static function source() {
      return Base_Donnees::$prefix_table . 'annonces_bateau';
    }
    
    static public function enregistrer($annonce) {
      $bdd = Base_Donnees::accede(); // recupere l'access a la base de donnees
      
      $requete = "INSERT INTO " . self::source() . "";
      try {
        $bdd->exec($requete);
      } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
      }
      $resultat = False;
      return $resultat;
    }
  }
  
  // ===========================================================================
?>
