<?php
// ========================================================================
// description : definition de la classe generique Page
// utilisation : structure commune a toutes les pages du site
// teste avec  : PHP 5.5.3 sur Mac OS 10.11
// contexte    : Elements generique d'un site web
// Copyright (c) 2017-2018 AMP. All rights reserved.
// ------------------------------------------------------------------------
// creation: 04-juin-2017 pchevaillier@gmail.com
// revision: 13-juin-2017 pchevaillier@gmail.com separation haut, bas , contenu
// revision: 23-juin-2017 pchevaillier@gmail.com javascripts
// revision: 18-juil-2017 pchevaillier@gmail.com padding: 0px
  // revision: 04-fev-2018 pchevaillier@gmail.com padding: 10px pour corps
  // revision: 18-fev-2018 pchevaillier@gmail.com head en static
  // revision: 24-avr-2018 pchevaillier@gmail.com gestion bandeau partenaires
  // --------------------------------------------------------------------------
// commentaires : 
// -
// attention :
  // - pas si generique que ca : probleme de dependance (bandeau partenaires)
// a faire :
// ------------------------------------------------------------------------

// --- Classes utilisees
require_once 'element.php';
require_once 'site.php';

// ------------------------------------------------------------------------
// --- Definition de la classe Page

/**
 * @author Pierre Chevaillier
 */
abstract class Page extends Element {
  
  public $javascripts = array();

  protected $elements_haut = array();
  protected $elements_bas = array();
 
  public $elements_entete = array();
  
  public $contenus = array();
  
	public function __construct($nom_page) {
		$this->def_titre(Site::$instance->nom . " - " . $nom_page);
	}
	
  public function initialiser() {
    $this->definir_elements();
    foreach ($this->elements_haut as $e) $e->initialiser();
    foreach ($this->elements_bas as $e) $e->initialiser();
    foreach ($this->contenus as $e) $e->initialiser();
  }
  
  protected final function afficher_corps() {
  	echo "      <div class=\"container-fluid\" style=\"padding: 0px;\" >\n";
    foreach ($this->elements_haut as $e) $e->afficher();
    foreach ($this->contenus as $e) $e->afficher();
    foreach ($this->elements_bas as $e) $e->afficher();
    echo "      </div>\n";
  }

  private function code_bandeau_partenaires() {
    $code = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css"><script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>';
    $code = $code . "\n <script>\n $(document).ready(function(){ $('.bxslider').bxSlider(";
    // see https://bxslider.com/options/ for all available options
    $code = $code . "\n{ controls: false, auto: true,\n autoStart: true, randomStart: true, \n autoControls: false,\n stopAutoOnClick: true,\n pager: false,\n minSlides: 2, maxSlides: 5, slideWidth: 600}";
    $code = $code . ");\n });\n</script>\n";
    return $code;
  }
  
  protected function afficher_titre() {
     echo "      <title>" . $this->titre() . "</title>\n";
  }
  
  protected function inclure_meta_donnees_open_graph() {
  }
  
  protected function afficher_debut() {
    echo "<head>\n      <meta charset=\"utf-8\" />";
    $this->inclure_meta_donnees_open_graph();   echo "  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
      <link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" />";
    echo "     <link rel=\"stylesheet\" href=\"" . get_include_path() . "amp_france2018.css\" media=\"screen\" />\n";
    echo "     <script src=\"https://code.jquery.com/jquery-3.2.1.min.js\"
			  integrity=\"sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=\"
			  crossorigin=\"anonymous\"></script>
      <script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>\n";
    
    echo $this->code_bandeau_partenaires() . "\n";
    
    foreach ($this->javascripts as $scripts) {
      echo "      <script src=\"" . get_include_path() . $scripts . "\"></script>\n";
    }
    foreach ($this->elements_entete as $e)
      echo $e;
    $this->afficher_titre();
    echo "    </head>\n    <body>\n";
  }

  protected function afficher_fin() {
  	echo "    </body>\n";
  }

  abstract protected function definir_elements();

}
  
  class Page_Simple extends Page {
    protected function definir_elements() {
      //de base : rien
    }
  }
  
// ========================================================================
