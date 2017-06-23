<?php
// ========================================================================
// description : definition de la classe generique Page
// utilisation : structure commune a toutes les pages du site
// teste avec  : PHP 5.5.3 sur Mac OS 10.11
// contexte    : Elements generique d'un site web
// Copyright (c) 2017 AMP
// ------------------------------------------------------------------------
// creation: 04-juin-2017 pchevaillier@gmail.com
// revision: 13-juin-2017 pchevaillier@gmail.com, separation haut, bas , contenu
// revision: 23-juin-2017 pchevaillier@gmail.com, javascripts
// ------------------------------------------------------------------------
// commentaires : 
// -
// attention :
// - 
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
  /**
    * @var string[]
    */
  public $javascripts = array();

  protected $elements_haut = array();
  protected $elements_bas = array();
 
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
  	echo "      <div class=\"container-fluid\">\n";
    foreach ($this->elements_haut as $e) $e->afficher();
    foreach ($this->contenus as $e) $e->afficher();
    foreach ($this->elements_bas as $e) $e->afficher();
    echo "      </div>\n";
  }

	/**
  	* TODO : les javascript
  	*/
  protected function afficher_debut() {
  	echo "<head>\n      <meta charset=\"utf-8\" />
      <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
      <link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" />";
    echo "     <link rel=\"stylesheet\" href=\"amp_france2018.css\" media=\"screen\" />\n";
    echo "     <script src=\"https://code.jquery.com/jquery-3.2.1.min.js\"
			  integrity=\"sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=\"
			  crossorigin=\"anonymous\"></script>
      <script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>\n";
    foreach ($this->javascripts as $scripts) {
      echo "      <script src=\"" . $scripts . "\"></script>\n";
    }
    echo "      <title>" . $this->titre() . "</title>\n    </head>\n    <body>\n";
  }

  protected function afficher_fin() {
  	echo "    </body>\n";
  }

  abstract protected function definir_elements();

}
// ========================================================================
