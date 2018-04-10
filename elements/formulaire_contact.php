<?php
  // ==========================================================================
  // description : definition des classes / formulaire de demande d'information
  // utilisation : element d'une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP. Tous droits reserves
  // ------------------------------------------------------------------------
  // creation: 23-oct-2017 pchevaillier@gmail.com
  // revision: 30-oct-2017 pchevaillier@gmail.com formatage message
  // revision: 06-avr-2018 pchevaillier@gmail.com correction appels constructeur
  // ------------------------------------------------------------------------
  // commentaires :
  // -
  // attention :
  // -
  // a faire :
  // ========================================================================
  
  // --- Classes utilisees
  require_once 'generiques/formulaire.php';
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe Formulaire_Contact
  
  class Formulaire_Contact extends Formulaire {
  
    public function initialiser() {
      $item = null;
 
      try {
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
        $this->ajouter_champ($item);
        
        $item = new Champ_Telephone("tel", "scripts/controle_saisie_telephone.js", "verif_numero_telephone");
        $item->def_titre("Numéro de téléphone");
        $this->ajouter_champ($item);
        
        $item = new Champ_Zone_Texte("adr");
        $item->def_titre("Adresse postale");
        $this->ajouter_champ($item);
        
        $item = new Champ_Zone_Texte("msg");
        $item->def_titre("Votre message");
        $item->nombre_lignes = 10;
        $this->ajouter_champ($item);
        
        parent::initialiser();
      } catch(Exception $e) {
        die('Exception dans la methode initialiser de la classe Formulaire_Contact : ' . $e->getMessage());
      }
    }
  
  }
  
  class Demande_Information {
    public $civilite = "";
    public $prenom = "";
    public $nom = "";
    public $telephone = "";
    public $adresse_mail = "";
    public $adresse_postale = "";
    public $message = "";
    
    public function definir_depuis_formulaire() {
      $this->civilite = ($_POST['civ'] == "H") ? 'Monsieur' : 'Madame';
      $this->prenom = strip_tags(trim(utf8_decode($_POST['prenom'])));
      $this->nom = strip_tags(trim(utf8_decode($_POST['nom'])));
      $this->telephone = strip_tags(trim(utf8_decode($_POST['tel'])));
      $this->adresse_mail = strip_tags(trim(utf8_decode($_POST['courriel'])));
      $this->adresse_postale = strip_tags(trim(utf8_decode($_POST['adr'])));
      $this->message = strip_tags(trim(utf8_decode($_POST['msg'])));
    }
  }
  
  abstract class Enregistrement_Demande_Information {
    protected $demande = null;
    
    public function __construct($demande) {
      $this->demande = $demande;
    }
    
    abstract public function executer();
    
  }
  
  class Mail_demande_Information extends  Enregistrement_Demande_Information {
    
    private $adresse_mail = "";
    public function def_adresse_mail($valeur) {
      $this->adresse_mail = $valeur;
    }
    
    private function formatter_sujet() {
        return "France 2018 - demande information depuis site web";
    }
    
    // Chaque ligne doit etre separee par un caractere CRLF (\r\n).
    // Les lignes ne doivent pas comporter plus de 70 caracteres.
    private function formatter_texte() {
      $resulat = "";
      $ligne = "";
      $ligne = "Bonjour,\r\n\r\n";
      $resultat = $resultat . $ligne;
      $resultat = $resultat . $this->demande->message;
      
      $ligne = "\r\nDemande de la part de " . $this->demande->civilite . " " . $this->demande->prenom . " " . $this->demande->nom . "\r\n";
      $resultat = $resultat . $ligne;
      
      $ligne = $this->demande->adresse_postale . "\r\n";
      $resultat = $resultat . $ligne;
      
      if (strlen($this->demande->telephone) > 0)
        $resultat = $resultat . utf8_decode("Téléphone : ") . $this->demande->telephone . "\r\n";
      if (strlen($this->demande->adresse_mail) > 0)
        $resultat = $resultat . "Courriel : " . $this->demande->adresse_mail . "\r\n";
      
      return $resultat;
    }
    
    public function executer() {
      $sujet = $this->formatter_sujet();
      $texte = $this->formatter_texte();
      $resultat = mail($this->adresse_mail, $sujet, $texte);
      //bool mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )
      return $resultat;
    }
  }
  
  // ===========================================================================
?>
