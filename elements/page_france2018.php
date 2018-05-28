<?php
  // ===========================================================================
  // description : definition de la classe Page_France2018
  //               Structure de toutes les pages du site
  // utilisation : Site web page web dynamique
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11 ; PHP 7.0 sur serveur OVH
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP. Tous droits reserves.
  // ---------------------------------------------------------------------------
  // creation: 04-juin-2017 pchevaillier@gmail.com
  // revision: 11-juin-2017 pchevaillier@gmail.com
  // revision: 23-juin-2017 pchevaillier@gmail.com script / controle menu
  // revision: 29-juil-2017 pchevaillier@gmail.com script / compte a rebours
  // revision: 20-mai-2018 pchevaillier@gmail.com ajout cadre information
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // -
  // a faire :
  // ---------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/page.php';
  require_once 'generiques/cadre_information.php';
  
  require_once 'elements/entete_image.php';
  require_once 'elements/menu_principal.php';
  require_once 'elements/bandeau_partenaires.php';
  require_once 'elements/bandeau_reseaux.php';
  require_once 'elements/bandeau_entete.php';
  require_once 'elements/zone_partenaires.php';
  require_once 'elements/pied_page.php';
  
  // ---------------------------------------------------------------------------
  // --- Definition de la classe Page_France2018

/**
 * @author Pierre Chevaillier
 */
class Page_France2018 extends Page {
  
  public function __construct($nom_page) {
    parent::__construct($nom_page);
    $this->javascripts[] = "scripts/menu_controleur.js";
    $this->javascripts[] = "scripts/compte_rebours.js";
    $this->javascripts[] = "scripts/controle_affichage_logos_partenaire.js";
    $this->javascripts[] = "scripts/chargement_page.js";
  }
  
  /**
   * Definit les elments de la page
   */
  protected function definir_elements() {
    $this->elements_haut[] = new Bandeau_Entete();
    $this->elements_haut[] = new Menu_Principal();
    /*
    $infos = "<span class=\"label label-info\">Nouveau</span> Des <strong>courses open</strong> seront programmées le <strong>vendredi 25</strong>. Les horaires seront diffusés après la réunion d'information, suivant le nombre d'inscriptions.</br><span class=\"label label-warning\">attention</span> Pour les véhicules tractant des yoles : évitez de passer par Gouesnou car il y a des travaux.";
    $this->elements_haut[] = new Cadre_Information($infos);
     */
    $this->elements_haut[] = new Zone_Partenaires();
    
    //$this->elements_haut[] = new Entete_Image("media/entetes/banniere_france2018.jpg");
    
    $this->elements_bas[] = new Bandeau_Partenaires("media/logos");
    
    $b = new Bandeau_Reseaux("media/logos");
    $b->lien_facebook = "http://www.facebook.com/AvironMerPlougonvelin2018";
    $b->lien_twitter = "http://www.twitter.com/AvironMer29217";
    $this->elements_bas[] = $b;
    
    $this->elements_bas[] = new Pied_Page();
    
  }
  
  protected function inclure_meta_donnees_open_graph() {
    echo "<meta property=\"og:type\" content=\"website\" />";
    echo "<meta property=\"og:title\" content=\"Championnat d'Aviron de Mer 2018 - Plougonvelin\" />\n";
    echo "<meta property=\"og:description\" content=\"France 2018 -  25-26 mai 2018 à Plougonvelin\" />\n";
    //echo '<meta property="og:type" content="video.movie" />';
    echo "<meta property=\"og:url\" content=\"http://avironplougonvelin.fr/France2018/france2018.html\" />\n";
    echo "<meta property=\"og:image\" content=\"http://avironplougonvelin.fr/France2018/media/entetes/banniere_france2018_lr.png\" />\n";
  }

}
// ========================================================================
