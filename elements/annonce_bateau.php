<?php
  // ==========================================================================
  // description : definition des classes / gestion bourse aux bateaux
  // utilisation : element d'une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2018 AMP
  // ------------------------------------------------------------------------
  // creation: 20-jan-2018 pchevaillier@gmail.com
  // revision:
  // ------------------------------------------------------------------------
  // commentaires :
  // - en chantier
  // attention :
  // -
  // a faire :
  // ========================================================================
  
  // --- Classes utilisees
  require_once 'generiques/formulaire.php';
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe / Bloc de dates
  /*
  class Bloc_Dates extends Element {
    
  }
*/
  // ------------------------------------------------------------------------
  // --- Definition de la classe / Formualire de saisie d'une annonce
  
  class Formulaire_Annonce_Bateau extends Formulaire {
  
    public function initialiser() {
      $item = null;
 
      $item = new Champ_Selection("typ", "typ", "");
      $item->def_titre("Type d'annonce");
      $item->options = array(1 => "Demande", 2 => "Offre");
      $this->champs[] = $item;
      
      $item = new Champ_Selection("bat", "bat", "");
      $item->def_titre("Type de bateau");
      $item->options = array(1 => "Solo", 2 => "Double", 3 => "4 barré pointe", 4 => "4 barré couple");
      $this->champs[] = $item;

      $item = new Champ_Selection("pel", "pel", "");
      $item->def_titre("Avirons");
      $item->options = array(0 => "Aucun", 1 => "Pelles Mâcon", 3 => "Pelles hache", 4 => "Indifférent");
      $this->champs[] = $item;

      $item = new Champ_Binaire("j1-ma", "j1-ma", "");
      $item->def_titre("Quand ?");
      $item->texte = "Mercredi matin";
      $this->champs[] = $item;
      
      // --- Personne postant l'annonce
      $item = new Champ_Civilite("civilite", "civilite", "");
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
    public $auteur = null; // Personne
    
    public $code_type = "";
    public $code_type_bateau = "";
    public $code_type_aviron = "";
    public $date_publication = null;
    public $date_mise_a_dispo = null;
    
    public function definir_depuis_formulaire() {
      $this->civilite = ($s == "H") ? 'Monsieur' : 'Madame';
      $this->prenom = strip_tags(trim(utf8_decode($_POST['prenom'])));
      $this->nom = strip_tags(trim(utf8_decode($_POST['nom'])));
      $this->telephone = strip_tags(trim(utf8_decode($_POST['tel'])));
      $this->adresse_mail = strip_tags(trim(utf8_decode($_POST['courriel'])));
      $this->adresse_postale = strip_tags(trim(utf8_decode($_POST['adr'])));
      $this->message = strip_tags(trim(utf8_decode($_POST['msg'])));
    }
  }
  
  abstract class Enregistrement_Annonce {
    protected $annonce = null;
    
    public function __construct($annonce) {
      $this->annonce = $annonce;
    }
    
    abstract public function executer();
    
  }
  
  class Enregistrement_Annonce_Base extends  Enregistrement_Annonce {
    private $nom_tabme = "Annonce";
    public function def_adresse_mail($valeur) {
      $this->adresse_mail = $valeur;
    }
    
    
    public function executer() {
      $resultat = False;
      return $resultat;
    }
  }
  
  // ===========================================================================
?>
