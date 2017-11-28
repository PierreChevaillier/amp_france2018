<?php
  // ===========================================================================
  // description : definition de la classe Pied_Page
  // utilisation : destine a etre affiche en bas de chaque page du site web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site web de l'association
  // Copyright (c) 2017 AMP
  // ---------------------------------------------------------------------------
  // creation: 05-jun-2017 pchevaillier@gmail.com
  // revision: 22-jun-2017 pchevaillier@gmail.com style, copyright
  // revision: 25-nov-2017 pchevaillier@gmail.com mentions legales
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // - Implementer Copyright comme un element.
  // ---------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/element_page.php';
  require_once 'elements/mentions_legales_presentations.php';
  
  // ---------------------------------------------------------------------------
  // --- Definition de la classe Page_Accueil
  
  class Pied_Page extends Element_Page {

    public function initialiser() {
      // rien a faire de particulier
    }
  
    protected function afficher_debut() {
      echo '<footer>';
    }
  
    protected function afficher_corps() {
      $this->afficher_copyright();
      $this->afficher_mentions_legales();
      $this->afficher_credits();
      $this->afficher_contenu_table();
    }
  
    protected function afficher_fin() {
      echo '</footer>';
    }
  
    private function afficher_copyright() {
      echo '<div class="collapse" id="zone_copyright"><p class="small">';
      echo '<p>Copyright &copy; 2017 - ' . date('Y') . ' ' . Site::copyright() . '</p>';
      echo "<p>Le présent site est la propriété exclusive de l'association loi 1901 dénomée " . Site::sigle_proprietaire() . ", " . Site::nom_proprietaire() . " dont le siège social est à ";
      foreach (Site::adresses() as $adr) echo $adr . ', ' ;
      echo '</p><p class="small">';
      echo "Toute représentation ou reproduction intégrale ou partielle faite sans le consentement de l’auteur ou de ses ayants droit ou ayants cause est illicite. Il en est de même pour la traduction, l’adaptation ou la transformation, l’arrangement ou la reproduction par un art ou un procédé quelconque. (article L122-4 du Code de la Propriété intellectuelle).";
      echo '</p></div>';
    }
  
    private function afficher_mentions_legales() {
      echo '<div class="collapse" id="zone_mentions">';
      $e = new Vue_Mentions_legales();
      $e->initialiser();
      $e->afficher();
      echo '</div>';
    }
  
    private function afficher_credits() {
      echo '<div class="collapse" id="zone_credits">';
      echo '<p></p>';
      echo '</div>';
    }

    private function afficher_contenu_liste() {
      echo '<center><table class="table"><tr><td align="center"><ul class="list-inline">';
      echo '<li><a data-toggle="collapse" href="#zone_copyright" aria-expanded="false" aria-controls="zone_copyright">Copyright<span class="glyphicon glyphicon-menu-up"></span></a></li>';
//    echo '<li><a data-toggle="collapse" href="#zone_mentions" aria-expanded="false" aria-controls="zone_mentions">Mentions légales<span class="glyphicon glyphicon-menu-up"></span></a></li>';
      echo '<li><a data-toggle="collapse" href="#zone_credits" aria-expanded="false" aria-controls="zone_zone_credits">Credits<span class="glyphicon glyphicon-menu-up"></span></a></li>';
      echo '</ul></td></tr></table></center>';
    }
  
    private function afficher_contenu_table() {
      echo '<table class="table"><tr>';
      echo '<td style="text-align:center"><a class="footer" data-toggle="collapse" href="#zone_copyright" aria-expanded="false" aria-controls="zone_copyright">Copyright</a></td>';
 
    //echo '<td style="text-align:center"><a class="footer" data-toggle="collapse" href="#zone_mentions" aria-expanded="false" aria-controls="zone_mentions">Mentions légales</a></td>';
      echo '<td style="text-align:center"><a class="footer" href="mentions_legales.php">Mentions légales</a></td>';
      echo '<td style="text-align:center"><a class="footer" data-toggle="collapse" href="#zone_credits" aria-expanded="false" aria-controls="zone_zone_credits">Credits</a></td>';
      echo '</tr></table>';
    }
  }
  // ===========================================================================
  ?>
