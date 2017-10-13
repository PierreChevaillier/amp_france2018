<?php
// ------------------------------------------------------------------------
// description : definition de la classe generique Menu navigation
//               sorte d'interface generique
// contexte : chamionnat de France d'aviron de Mer organise par l'AMP
// Copyright : 2017 AMP
// ------------------------------------------------------------------------
// creation: 04-jun-2017 pchevaillier@gmail.com
// revision: 29-jul-2017 pchevaillier@gmail.com texte affichage dynamique
// ------------------------------------------------------------------------
// commentaires : 
// - en chantier
// - l'element menuDynamiqueInfo sert a afficher le compte a rebours
// attention :
// - 
// a faire :
// ------------------------------------------------------------------------

// --- Classes utilisees
require_once 'element_page.php';

// ------------------------------------------------------------------------
// --- Definition de la classe 

/**
 * @author Pierre Chevaillier
 */
abstract class Menu_Navigation extends Element_Page {

	/**
    *
    */
  protected function afficher_debut() {
    //echo "<nav class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\"><div class=\"container-fluid\">\n";
    
  	echo "<nav class=\"navbar navbar-default\" role=\"navigation\"><div class=\"container-fluid\">\n";
    
 		// le bouton du menu sur smartphone
  	echo "<div class=\"navbar-header\">\n<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" 	data-target=\"#menu_nav\" aria-expanded=\"false\">";
   	echo "<span class=\"glyphicon glyphicon-menu-hamburger\" aria-hidden=\"true\"></span><span class=\"sr-only\">Menu</span></button>";
  	/* echo "Menu</button>"; */
		echo "<a class=\"navbar-brand\" href=\"http://avironplougonvelin.fr\" target=\"_new\">AMP</a>\n";
    
    // texte modifiable par script
    echo " <p class=\"navbar-text\" id=\"menuDynamiqueInfo\"></p>";
    echo "\n</div>\n";
    
    // la barre de menu
		echo "<div class=\"collapse navbar-collapse\" id=\"menu_nav\">\n";
  	echo "<ul class=\"nav navbar-nav\" id=\"menu_items\">\n";
	}

    
  /**
    *
    */
  protected function afficher_fin() {
  	echo "\n</ul>\n</div>\n</div>\n</nav>\n";
  }

}
