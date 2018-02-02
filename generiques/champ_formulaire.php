<?php
  // ========================================================================
  // description : definition des classes de champs de formulaire (classiques)
  // utilisation : elements d'un formulaire simple
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : classe Formulaire
  // Copyright (c) 2017 AMP
  // ------------------------------------------------------------------------
  // creation : 21-oct-2017 pchevaillier@gmail.com
  // revision :
  // ------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire : ajouter l'attribue value
  // ------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'element.php';
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe

  abstract class Champ_Formulaire extends Element {

    /**
     * @var string
     */
    protected $identifiant = "";

    /**
     * @var string
     */
    protected $nom_variable = "";
    
    /**
     * @var string
     */
    protected $script_controle = "";
    
    /**
     * @var string
     */
    protected $page_web = null;
    public function def_page_web($page) {
      $this->page_web = $page;
    }
    
    public function __construct($id, $nom, $script) {
      $this->identifiant = $id;
      $this->nom_variable = $nom;
      $this->script_controle = $script;
    }
    
    public function initialiser() {
      if ((strlen($this->script_controle) > 0) && ($this->page_web))
        $this->page_web->javascripts[] = $this->script_controle;
    }
    
    protected function afficher_debut() {
      echo '<div><label class="control-label" for="' . $this->identifiant . '">' . $this->titre() . '</label>';
    }
 
    protected function afficher_fin () {
      echo '</div>';
    }
    
  }
  
  // ---------------------------------------------------------------------------
  
  class Champ_Civilite extends Champ_Formulaire {
    protected function afficher_corps () {
      echo '<select class="form-control"';
      echo ' id="' . $this->identifiant . '"  name="' . $this->nom_variable . '" >';
      echo '<option value="F">Madame</option>';
      echo '<option value="H">Monsieur</option>';
      echo '</select>';
    }
  }

  class Champ_Telephone extends Champ_Formulaire {
    protected function afficher_corps () {
      echo '<input class="form-control"';
      echo ' id="' . $this->identifiant . '" name="' . $this->nom_variable . '"';
      echo ' type="tel" size="15" maxlength="14"';
      echo ' onchange="verif_numero_telephone(this)" placeholder="0601020304" />';
    }
  }
 
  class Champ_Courriel extends Champ_Formulaire {
    protected function afficher_corps () {
      echo '<input class="form-control" id="' . $this->identifiant . '"';
      echo ' name="' . $this->nom_variable . '" type="mail"';
      echo ' onchange="verif_courriel(this)" placeholder="xxx@yyy.zz" />';
    }
  }
  
  class Champ_Nom extends Champ_Formulaire {
    protected function afficher_corps () {
      echo '<input class="form-control" id="' . $this->identifiant . '"';
      echo ' name="' . $this->nom_variable . '" type="text"';
      echo ' onchange="verif_nom(this)" />';
    }
  }

  class Champ_Texte extends Champ_Formulaire {
    public $longueur_max = 50;
    protected function afficher_corps () {
      echo '<input class="form-control"';
      echo ' id="' . $this->identifiant . '"  name="' . $this->nom_variable . '"';
      echo ' type="text" size = "' . $this->longueur_max . '" maxlength="' . $this->longueur_max . '" />';
    }
  }

  class Champ_Zone_Texte extends Champ_Formulaire {
    public $longueur_max = 50;
    public $nombre_lignes = 2;
    public $largeur = 30;
    protected function afficher_corps () {
      echo '<textarea class="form-control"';
      echo ' id="' . $this->identifiant . '"  name="' . $this->nom_variable . '"';
      echo ' rows= "' . $this->nombre_lignes . '" cols="' . $this->largeur . '" >';
      echo '</textarea>';
    }
  }
  
  class Champ_Binaire extends Champ_Formulaire {
    public $texte = "";
    protected function afficher_corps () {
      echo '<input class="form-control"';
      echo ' id="' . $this->identifiant . '"  name="' . $this->nom_variable . '"';
      echo ' type="checkbox" />' . $this->texte;
    }
  }
  
  class Champ_Selection extends Champ_Formulaire {
    public $options = array();
    public $option_defaut = "";
    protected function afficher_corps () {
      echo '<select class="form-control"';
      echo ' id="' . $this->identifiant . '"  name="' . $this->nom_variable . '" >';
      foreach ($this->options as $code => $libelle)
        echo '<option value="' . $code . '">' . $libelle . '</option>';
      echo '</select>';
    }
  }
  // ===========================================================================
?>
