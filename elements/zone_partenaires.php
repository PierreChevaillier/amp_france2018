<?php
  // ===========================================================================
  // description : definition de la classe Zone_Partenaires
  //               affichage des logos des partenaires
  // utilisation : destine a etre affiche en entete de toutes les pages du site
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP. Tous droits reserves.
  // ---------------------------------------------------------------------------
  // creation: 01-avr-2018 pchevaillier@gmail.com
  // revision: 05-avr-2018 pchevaillier@gmail.com mise en page, liens partenaire, benevoles
  // revision: 21-avr-2018 pchevaillier@gmail.com liens commande restauration
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // -
  // a faire :
  // ===========================================================================
  
  // --- Classes utilisees
  require_once 'generiques/element_page.php';

  // ---------------------------------------------------------------------------
  class Zone_Partenaires extends Element_Page {
  
    public function initialiser() {
    }
  
    protected function afficher_debut() {
      echo "\n<div align=\"center\">\n";
    }
  
    protected function afficher_corps() {
      echo '<div class="container" style="padding:0px;"><div class="row">';
      echo '<div class="col-sm-8" style="padding:0px;align:center;">';
      echo '<img id="logos_partenaires_or" style="height:200px;" />';
      echo '</div>'; // fin colonne gauche
      echo '<div class="col-sm-4" style="padding:0px;align:center;" >';
      echo "\n<div class=\"page-header\"><ul class=\"pager\"><li><a class=\"bouton-lien\" href=\"https://docs.google.com/forms/d/e/1FAIpQLScLkB08ZfDKLDJD1lRKuX0RBNbZfUSnzOym2ptZicw3CONe_w/viewform?usp=sf_link\" target=\"_new\">Devenez bénévole</a></li><li><a class=\"bouton-lien\" href=\"https://www.helloasso.com/associations/aviron-de-mer-de-plougonvelin-amp/collectes/devenez-partenaire-du-championnat-de-france-d-aviron-de-mer-2018-1\" target=\"_new\">Devenez partenaire</a></li><li><li><a class=\"bouton-lien\" href=\"http://avironplougonvelin.fr//France2018/restauration_journee.php\">Plateaux repas</a></li><li><a class=\"bouton-lien\" href=\"http://avironplougonvelin.fr//France2018/repas_cloture.php\">Repas des équipages</a></li></ul></div>\n";
      echo '</div>'; // fin colonne droite
      echo '</div></div>'; // fin row et fin container
      
      echo '<div id="bandeau_partenaires_autres" style="padding:0px;text-align:center;position:relative;width:1024px;height:150px;border:0px;overflow:hidden;">&nbsp;</div>';
    }
  
    protected function afficher_fin() {
      echo "\n</div>\n";
    }
  }
  // ==========================================================================
?>
