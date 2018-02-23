<?php
  // ==========================================================================
  // description : definition des classes / gestion bourse aux bateaux
  // utilisation : element d'une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11 - PHP 7.0 sur serveur OVH
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2018 AMP. Tous droits reserves.
  // ------------------------------------------------------------------------
  // creation : 20-jan-2018 pchevaillier@gmail.com
  // revision : 04-fev-2018 pchevaillier@gmail.com dates, montant
  // revision : 07-fev-2018 pchevaillier@gmail.com infos completes
  // revision : 18-fev-2018 pchevaillier@gmail.com ajout/modif, controle actions
  // revision : 23-fev-2018 pchevaillier@gmail.com mysql_real_escape_string --> PDO::quote
  // ------------------------------------------------------------------------
  // commentaires :
  // - en test
  // attention :
  // -
  // a faire :
  //  - classe Personne dans un fichier a part
  // ========================================================================
  
  // --- Classes utilisees
  require_once 'generiques/element_page.php';
  require_once 'generiques/formulaire.php';
  require_once 'temps/calendrier.php';
  require_once 'prive/connexion_bdd.php';
  
  class Controle_Actions_Annonce extends Element_Page {
    private $annonce = null;
    public function __construct($cle_access) {
      $this->annonce = new Annonce_Bateau();
      $this->annonce->def_cle_access($cle_access);
    }
    
    public function initialiser() {
      // recherche de l'annonce
    }
    
    protected function afficher_debut() {
      echo "\n<div class=\"container\" padding=\"10px\"><div class=\"panel panel-default\">\n<div class=\"panel-heading\">";
      echo "<h1>" . $this->titre() . "</h1></div><div class=\"panel-body\">";
      echo "<form role=\"form\" class=\"form-horizontal\" name=\"modif_annonce\" >";
    }
    
    protected function afficher_corps() {
      echo "<div class=\"form-group\">";

      echo "<div class=\"col-sm-4\"><a href=\"annonce_bateau.php?a=m&id=" . $this->annonce->cle_access() . "\" role=\"button\" class=\"btn btn-default form-control\" aria-describedby=\"aide_modif\">Modifier mon annonce</a><span id=\"aide_modif\" class=\"help-block\">Je souhaite ajouter des informations ou modifier mon annonce.</span></div>";
      
      echo "<div class=\"col-sm-4\"><a href=\"annonce_bateau_modif.php?a=c&id=" . $this->annonce->cle_access() . "\" role=\"button\" class=\"btn btn-default form-control\" aria-describedby=\"aide_cloture\">Clôre mon annonce</a><span id=\"aide_cloture\" class=\"help-block\">C'est bon, j'ai trouvé ce que je cherchais. Je souhaite que mon annonce ne soit plus visible.</span></div>";

      echo "<div class=\"col-sm-4\"><a href=\"annonce_bateau_modif.php?a=s&id=" . $this->annonce->cle_access() . "\" role=\"button\" class=\"btn btn-default form-control\" aria-describedby=\"aide_modif\">Supprimer mon annonce</a><span id=\"aide_mdof\" class=\"help-block\">Je renonce... Mon annonce n'a plus lieu d'être. Je souhaite la supprimer.</span></div>";

      echo "</div>\n";
    }
    
    protected function afficher_fin() {
      echo "\n</form></div></div></div>";
    }
  }
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe / Formulaire de saisie d'une annonce
  
  class Formulaire_Annonce_Bateau extends Formulaire {
  
    public function __construct($page, $script_traitement, $action= 'a') {
      parent::__construct($page, $script_traitement, $action);
      
      $item = null;
 
      try {
        $item = new Champ_Selection("typ");
        $item->def_titre("Type annonce");
        $item->options = Annonce_Bateau::$types_annonce;
        $this->ajouter_champ($item);

        $item = new Champ_Selection("pret");
        $item->def_titre("Prêt ou location");
        $item->options = array(1 => "Prêt", 0 => "Location");
        $this->ajouter_champ($item);
      
        $item = new Champ_Texte("cond");
        $item->def_titre("Prix / conditions");
        $this->ajouter_champ($item);
      
        $item = new Champ_Selection("bat");
        $item->def_titre("Type bateau");
        $item->options = Annonce_Bateau::$types_bateau;
        $this->ajouter_champ($item);
      
        $item = new Champ_Selection("pel");
        $item->def_titre("Avirons");
        $item->options = Annonce_Bateau::$types_aviron;
        $this->ajouter_champ($item);
      
        $item = new Champ_Date("deb");
        $item->def_titre("Début mise à dispo");
        $this->ajouter_champ($item);
      
        $item = new Champ_Date("fin");
        $item->def_titre("Fin mise à dispo");
        $this->ajouter_champ($item);
      
        $item = new Champ_Selection("crs");
        $item->def_titre("Courses");
        $item->valeurs_multiples = False;
        $item->options = Annonce_Bateau::$courses;
        $this->ajouter_champ($item);
      
        // --- Personne postant l'annonce
        $item = new Champ_Civilite("civ");
        $item->def_titre("Civilité");
        $this->ajouter_champ($item);
      
        $item = new Champ_Nom("prenom", "scripts/controle_saisie_nom.js", "verif_nom");
        $item->def_titre("Prénom");
        $this->ajouter_champ($item);
      
        $item = new Champ_Nom("nom", "scripts/controle_saisie_nom.js", "verif_nom");
        $item->def_titre("Nom");
        $this->ajouter_champ($item);
      
        $item = new Champ_Courriel("courriel", "scripts/controle_saisie_courriel.js", "verif_courriel");
        $item->def_titre("Adresse courriel");
        $item->def_obligatoire();
        $this->ajouter_champ($item);
      
        $item = new Champ_Telephone("tel", "scripts/controle_saisie_telephone.js", "verif_numero_telephone");
        $item->def_titre("Numéro de téléphone");
        $this->ajouter_champ($item);
      
        $item = new Champ_Texte("clb");
        $item->def_titre("Club");
        $this->ajouter_champ($item);
      
        $item = new Champ_Zone_Texte("txt");
        $item->def_titre("Texte de l'annonce");
        $item->nombre_lignes = 10;
        $this->ajouter_champ($item);
      } catch(Exception $e) {
        die('Exception dans constructeur de la classe Formulaire_Annonce_Bateau : ' . $e->getMessage());
      }
    }
    
    public function initialiser_champs($annonce) {
      $this->champ('typ')->def_valeur($annonce->code_type);
      $this->champ('pret')->def_valeur($annonce->pret);
      $this->champ('cond')->def_valeur(utf8_encode($annonce->condition));
      $this->champ('bat')->def_valeur($annonce->code_type_bateau);
      $this->champ('pel')->def_valeur($annonce->code_type_aviron);
      
      $cal = Calendrier::obtenir();
      if ($annonce->date_debut->date() > 0) {
        $v = $cal->date_html($annonce->date_debut);
        $this->champ('deb')->def_valeur($v);
      }
      if ($annonce->date_fin->date() > 0) {
        $v = $cal->date_html($annonce->date_fin);
        $this->champ('fin')->def_valeur($v);
      }
      
      $this->champ('crs')->def_valeur($annonce->codes_course);
      
      $this->champ('civ')->def_valeur($annonce->auteur->genre);
      $this->champ('prenom')->def_valeur(utf8_encode($annonce->auteur->prenom));
      $this->champ('nom')->def_valeur(utf8_encode($annonce->auteur->nom));
      $this->champ('courriel')->def_valeur($annonce->auteur->courriel);
      $this->champ('tel')->def_valeur($annonce->auteur->telephone);
      $this->champ('clb')->def_valeur(utf8_encode($annonce->auteur->club));
      $this->champ('txt')->def_valeur(utf8_encode($annonce->texte));
    }
    
  }
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe Personne
  
  class Personne {
    static $civilites = array('F' => "Madame", 'H' => "Monsieur");
    
    public $genre = "F";
    public function civilite() { self::$civilites[$this->genre]; }
    public $prenom = "";
    public $nom = "";
    public $date_naissance;
    public $telephone = "";
    public $courriel = "";
    public $club;
  }
  
  class Annonce_Bateau {
    static $types_annonce = array('dde' => "Demande", 'ofr' => "Offre");
    static $types_bateau = array('1x' => "Solo", '2x' => "Double", '4+' => "4 barré pointe", '4x' => "4 barré couple");
    static $types_aviron = array('0' => "Aucun",  'H' => "pelles hachoir", 'M' => "pelles Mâcon", '_' => "pelles de type indifférent");
    
    static $courses = array(0 => "Sélectionnez une course",
                            1 => "J18H4x+",
                            2 => "J18M4x+",
                            3 => "J18F4x+",
                            4 => "SF1X",
                            5 => "SF4+",
                            6 => "SF2X",
                            7 => "SF4x+",
                            8 => "SH1X",
                            9 => "SH4+",
                            10 => "SH2X",
                            11 => "SH4x+");
    
    public $auteur = null;
    
    public $numero = 0;
    public function code() { return $this->numero; }
    public function def_code($valeur) {$this->numero = $valeur; }
    
    public $cle_access = 0;
    public function cle_access() { return $this->cle_access; }
    public function def_cle_access($valeur) {$this->cle_access = $valeur; }
    
    public $code_type = "";
    public function type() { return self::$types_annonce[$this->code_type]; }
    
    public $active = True;
    
    public $pret = True;
    public function pret_location() { return ($this->pret)? "prêt": "location"; }
    
    public $date_publication = "";
    
    public $code_type_bateau = '';
    public function type_bateau() { return self::$types_bateau[$this->code_type_bateau]; }
    
    public $code_type_aviron = '';
    public function type_aviron() { return self::$types_aviron[$this->code_type_aviron]; }
    public function avec_aviron() { return (!$this->code_type_aviron == '0'); }
    
    public $date_debut = null;
    public $date_fin = null;
    
    public $codes_course = 0;
    public function courses() { return self::$courses[$this->codes_course]; }
    
    public $condition = "";
    public $texte = "";
    
    public function definir_depuis_formulaire() {
      $cal = Calendrier::obtenir();
      
      $this->code_type = strip_tags(trim(utf8_decode($_POST['typ'])));
      
      // Caracteristiques annonce
      $this->code_type_bateau = strip_tags(trim(utf8_decode($_POST['bat'])));
      $this->code_type_aviron = strip_tags(trim(utf8_decode($_POST['pel'])));
      $this->pret = $_POST['pret'];
      
      // dates
      $d = $_POST['deb'];
      if (strlen($d) == 0) $d="1970-01-01";
      $champs = explode("-", $d);
      if (intval($champs[0]) > 2000)
        $this->date_debut = $cal->jour(intval($champs[2]), intval($champs[1]), intval($champs[0]));
      else
        $this->date_debut = new Instant(0);
      
      $d = $_POST['fin'];
      if (strlen($d) == 0) $d="1970-01-01";
      $champs = explode("-", $d);
      if (intval($champs[0]) > 2000)
        $this->date_fin = $cal->jour(intval($champs[2]), intval($champs[1]), intval($champs[0]));
      else
        $this->date_fin = new Instant(0);
      
      // Courses
      $this->codes_course = $_POST['crs'];
      
      // Informations
      $bdd = Base_Donnees::accede();
     
      $this->condition = strip_tags(trim(utf8_decode($_POST['cond'])));
      $this->texte = strip_tags(trim(utf8_decode($_POST['txt'])));
      
      // Personne ayant poste l'annonce
      $this->auteur = new Personne();
      
      $this->auteur->civilite = $_POST['civ'];
      
      $this->auteur->prenom = strip_tags(trim(utf8_decode($_POST['prenom'])));
      $this->auteur->nom = strip_tags(trim(utf8_decode($_POST['nom'])));
      $this->auteur->telephone = strip_tags(trim(utf8_decode($_POST['tel'])));
      $this->auteur->courriel = strip_tags(trim(utf8_decode($_POST['courriel'])));
      $this->auteur->club = strip_tags(trim(utf8_decode($_POST['clb'])));
    }
  }

  class Enregistrement_Annonce_Bateau /* extends  Enregistrement_Annonce */ {
    static function source() {
      return Base_Donnees::$prefix_table . 'annonces_bateau';
    }
    
    static public function champs_donnees() {
      return "active, code_type, pret, code_type_bateau, code_type_aviron, debut, fin, courses, conditions, details, civilite, prenom, nom, courriel, telephone, club";
    }
    static public function champs_recherche() {
      return "code, cle_access, date_publication, " . self::champs_donnees();
    }
    
    private $annonce = null;
    public function annonce() { return $this->annonce; }
    public function def_annonce($annonce) { $this->annonce = $annonce; }
    
    
    private $type_id = 'code';
    public function def_type_id($nom_champ_table) {
      $this->type_id = $nom_champ_table;
    }
    
    private function critere_recherche() {
      if ($this->type_id == 'cle_access')
        return "cle_access = '" . $this->annonce->cle_access() . "' ";
      else
        return "code = '" . $this->annonce->code() . "' ";
    }
    
    private function id_annonce() {
      return ($this->type_id == 'cle_access')? $this->annonce->cle_access(): $this->annonce->code();
    }
    
    private function initialiser_depuis_table($donnee) {
      $this->annonce->def_code($donnee['code']);
      $this->annonce->def_cle_access($donnee['cle_access']);
      $this->annonce->date_publication = $donnee['date_publication'];
      
      $this->annonce->code_type = $donnee['code_type'];
      $this->annonce->pret = $donnee['pret'];
      $this->annonce->code_type_bateau = $donnee['code_type_bateau'];
      $this->annonce->code_type_aviron = $donnee['code_type_aviron'];
      
      $this->annonce->date_debut = new Instant($donnee['debut']);
      $this->annonce->date_fin = new Instant($donnee['fin']);
      
      $this->annonce->codes_course = $donnee['courses'];
      
      $this->annonce->condition = $donnee['conditions'];
      $this->annonce->texte = $donnee['details'];
      
      $this->annonce->auteur = new Personne();
      $this->annonce->auteur->civilite = $donnee['civilite'];
      $this->annonce->auteur->prenom = $donnee['prenom'];
      $this->annonce->auteur->nom = $donnee['nom'];
      $this->annonce->auteur->courriel = $donnee['courriel'];
      $this->annonce->auteur->telephone = $donnee['telephone'];
      $this->annonce->auteur->club = $donnee['club'];
    }
    
    public function enregistrer_annonce() {
      $ok = False;
      $bdd = Base_Donnees::accede(); // recupere l'access a la base de donnees
      if ($this->annonce == null) return $ok;
      $champs = "cle_access, " . self::champs_donnees();
      
      $cle = rand();
      $this->annonce->def_cle_access($cle);
      
      $valeurs = $bdd->quote($this->annonce->cle_access()) . ", " . $bdd->quote($this->annonce->active) . ", " . $bdd->quote($this->annonce->code_type) . ", " . $bdd->quote($this->annonce->pret) . ", " . $bdd->quote($this->annonce->code_type_bateau) . ", " . $bdd->quote($this->annonce->code_type_aviron) . ", " . $bdd->quote($this->annonce->date_debut->date()) . ", " . $bdd->quote($this->annonce->date_fin->date()) . ", "  . $bdd->quote($this->annonce->codes_course) . ", " . $bdd->quote($this->annonce->condition) . ", " . $bdd->quote($this->annonce->texte) . ", " . $bdd->quote($this->annonce->auteur->civilite) . ", " .  $bdd->quote($this->annonce->auteur->prenom) . ", " .  $bdd->quote($this->annonce->auteur->nom) . ", " . $bdd->quote($this->annonce->auteur->courriel) . ", " . $bdd->quote($this->annonce->auteur->telephone) . ", " . $bdd->quote($this->annonce->auteur->club);
      $requete = "INSERT INTO " . self::source() . "(" . $champs . ") VALUES(" . $valeurs . ")";
      try {
        $bdd->exec($requete);
        $ok = True;
      } catch(PDOException $e) {
          echo "<p>Erreur : " . $requete . "<br />" . $e->getMessage() . "</p>";
      }
      return $ok;
    }
    
    public function modifier_annonce() {
      $ok = False;
      if ($this->annonce == null) return $ok;
      $bdd = Base_Donnees::accede(); // recupere l'access a la base de donnees
      
      $critere = $this->critere_recherche();
      
      $commande = " SET code_type=" . $bdd->quote($this->annonce->code_type) . ", pret=" . $bdd->quote($this->annonce->pret) . ", code_type_bateau=" . $bdd->quote($this->annonce->code_type_bateau) . ", code_type_aviron=" . $bdd->quote($this->annonce->code_type_aviron)  . ", debut=" . $bdd->quote($this->annonce->date_debut->date()) . ", fin=" . $bdd->quote($this->annonce->date_fin->date()) . ", courses=" . $bdd->quote($this->annonce->codes_course) . ", conditions=" . $bdd->quote($this->annonce->condition) . ", details=" . $bdd->quote($this->annonce->texte) . ", civilite=" . $bdd->quote($this->annonce->auteur->civilite) . ", prenom=" . $bdd->quote($this->annonce->auteur->prenom) . ", nom=" . $bdd->quote($this->annonce->auteur->nom) . ", courriel=" . $bdd->quote($this->annonce->auteur->courriel) . ", telephone=" .  $bdd->quote($this->annonce->auteur->telephone) . ", club=" . $bdd->quote($this->annonce->auteur->club);
      $requete = "UPDATE " . self::source() . $commande . " WHERE " . $critere;
      try {
        $bdd->exec($requete);
        $ok = True;
      } catch(PDOException $e) {
        echo "<p>Erreur : " . $requete . "<br />" . $e->getMessage() . "</p>";
      }
      return $ok;
    }
    
    public function rechercher_annonce() {
      $critere = $this->critere_recherche();
      
      $requete = "SELECT " . self::champs_recherche() . " FROM " . self::source() . " WHERE " . $critere;
      try {
        $bdd = Base_Donnees::accede(); // recupere l'access a la base de donnees
        $resultat = $bdd->query($requete);
        $donnee = $resultat->fetch();
        $this->initialiser_depuis_table($donnee);
      } catch (PDOexception $e) {
        die("Erreur recherche annonce bateau par " . $this->type_id . " : ligne " . $e->getLine() . ' :</b> '. $e->getMessage());
      }
      $resultat->closeCursor();
    }
    
    public function rechercher_actives() {
      //$cal = Calendrier::obtenir();
      
      $requete = "SELECT " . self::champs_recherche() . " FROM " . self::source() . " WHERE active = '1' ORDER BY code DESC";
      //echo $requete;
      $annonces = array();
      try {
        $bdd = Base_Donnees::accede(); // recupere l'access a la base de donnees
        $resultat = $bdd->query($requete);
        while ($donnee = $resultat->fetch()) {
          $this->annonce = new Annonce_Bateau();
          $this->initialiser_depuis_table($donnee);
          $annonces[] = $this->annonce;
        }
      } catch (PDOexception $e) {
        die("Erreur recherche annonces bateau actives : ligne " . $e->getLine() . ' :</b> '. $e->getMessage());
      }
      $resultat->closeCursor();
      return $annonces;
    }
    
    public function desactiver_annonce() {
      $ok = False;
      $requete = "UPDATE " . self::source() . " SET active ='0' WHERE " . $this->critere_recherche();
      try {
        $bdd = Base_Donnees::accede(); // recupere l'access a la base de donnees
        $bdd->exec($requete);
      } catch(PDOException $e) {
        echo "<p>Erreur : " . $requete . "<br />" . $e->getMessage() . "</p>";
      }
      $ok = True;
      return $ok;
    }
    
    public function supprimer_annonce() {
      $ok = False;
      $requete = "DELETE FROM " . self::source() . " WHERE " . $this->critere_recherche();
      try {
        $bdd = Base_Donnees::accede(); // recupere l'access a la base de donnees
        $bdd->exec($requete);
        $ok = True;
      } catch(PDOException $e) {
        echo "<p>Erreur : " . $requete . "<br />" . $e->getMessage() . "</p>";
      }
      return $ok;
    }
  }
  
  // ===========================================================================
?>
