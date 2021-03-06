<?php
  // ========================================================================
  // description : definition de la classe Formulaire
  //               gestion d'un formulaire simple
  // utilisation : destine a etre affiche dans une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP
  // ------------------------------------------------------------------------
  // creation : 22-oct-2017 pchevaillier@gmail.com
  // revision : 04-fev-2018 pchevaillier@gmail.com mode responsive
  // revision : 10-fev-2018 pchevaillier@gmail.com bouton reset
  // revision : 11-fev-2018 pchevaillier@gmail.com gestion valeur initiale
  // revision : 18-fev-2018 pchevaillier@gmail.com action
  // ------------------------------------------------------------------------
  // commentaires :
  // - en chantier
  // attention :
  // -
  // a faire :
  // generer le code du script de controle : appel de tous les scripts de controle des champs
  // ------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/element_page.php';
  require_once 'generiques/champ_formulaire.php';
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe Formulaire

  class Formulaire extends Element_Page {

    protected $page_web = ""; // necessaire pour ajouter les scripts de controle des champs
    protected $script_traitement = "";
    protected $action = 'a'; // a => ajout (nouvelle saisie) m => modification (MaJ saisie)
    protected $id_objet;
    public function def_id_objet($valeur) { $this->id_objet = $valeur; }
    
    private $champs = array();
    public function champs() { return $this->champs;}
    public function champ($nom) {
      if (!array_key_exists($nom, $this->champs))
        throw new Exception('Erreur recherche champ formulaire - champ inexistant : ' . $nom);
      return $this->champs[$nom];
    }
    
    public function ajouter_champ($champ) {
      $resultat = False;
      if (strlen($champ->id()) == 0)
          throw new Exception('Erreur insertion champ formulaire - champ sans identifiant');
      if (array_key_exists($champ->id(), $this->champs))
          throw new Exception('Erreur insertion champ formulaire - identifiant existant : ' . $champ->id());
      $this->champs[$champ->id()] = $champ;
    }
  
    public function __construct($page, $script_traitement, $action = 'a', $id_object="") {
      $this->page_web = $page;
      $this->script_traitement = $script_traitement;
      $this->action = $action;
      $this->id_objet = $id_objet;
    }
  
    public function definir_valeur_champs($valeurs) {
      foreach ($valeurs as $cle => $v) {
        $this->champs[$cle]->def_valeur($v);
      }
    }
    
    public function initialiser() {
      foreach ($this->champs as $champ) {
        $champ->def_page_web($this->page_web);
        $champ->initialiser();
      }
      // ajout du script de verification de la saisie a l'entete de la page web
      $code = $this->generer_script_validation();
      $this->page_web->elements_entete[] = $code;
    }
  
    protected function afficher_debut() {
      if ($this->a_un_titre())
        echo '<div class="well well-sm"><p class="lead">' . $this->titre() . '</p></div>';
      echo '<form class="form-horizontal" role="form"  name="formulaire" onsubmit="return verification_formulaire(this)"  method="post" action="' . $this->script_traitement . '">';
      echo '<input type="hidden" name="a" value="' . $this->action . '" />';
      echo '<input type="hidden" name="id" value="' . $this->id_objet . '" />';
    }
  
    protected function afficher_corps() {
      foreach ($this->champs as $champ)
        $champ->afficher();
      $this->afficher_acquitement_saisie();
      $this->afficher_bouton_validation();
    }
  
    protected function generer_script_validation() {
      $code = "\n<script>\nfunction verification_formulaire(f) {\n";
      // TODO  collecter les scripts des champs
      $condition = "  var saisie_ok = (";
      $appel = "";
      $conds = array();
      foreach ($this->champs as $champ) {
        if (strlen($champ->script_controle) > 0) {
          $appel = $appel . "  var bon_" . $champ->id() . " = " . $champ->fonction_controle_saisie . "(f." . $champ->id() . ");\n";
          $conds[] = "bon_" . $champ->id();
        }
      }
      $code = $code . $appel;
      $n = count($conds);
      if ($n == 0) {
        $condition = $condition . "true";
      } else {
        for ($i = 0; $i < $n; $i++) {
          $condition = $condition . $conds[$i];
          if ($i < $n -1)
            $condition = $condition . " && ";
        }
      }
      $condition = $condition . ");\n";
      $code = $code . $condition;
        
      // var saisie_ok = (bon_XXX && bon_truc);
      // return saisie_ok;
      $code = $code . "  return saisie_ok;\n}\n</script>\n";
      return $code;
    }
    
    protected function afficher_acquitement_saisie() {
      echo '<div class="form-group"><div class="col-sm-offset-2 col-sm-10"><div class="checkbox"><label><input type="checkbox" name="remember" required>';
      echo "J'ai vérifié les informations saisies dans ce formulaire, elles sont complètes.";
      echo '</label></div></div></div>';
    }
    
    protected function afficher_bouton_validation() {
      echo '<div class="form-group"><div class="col-sm-offset-2 col-sm-10">';
      echo '<input class="btn btn-large btn-primary" type="submit" id="valid" value="Envoyer ma demande">&nbsp;&nbsp;<input class="btn btn-large btn-default" type="reset" id="reset" value="Ré-initialiser la saisie"></div></div>';
      
    }
    protected function afficher_fin() {
      echo '</form>';
    }
  
  }
  // ===========================================================================
?>
