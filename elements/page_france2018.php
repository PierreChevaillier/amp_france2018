<?php
// ========================================================================
// description : definition de la classe Page_Accueil
//               Page d'accueil du site
// utilisation : Site web -  inclusion dans page web dynamique
// teste avec  : PHP 5.5.3 sur Mac OS 10.11 ; PHP 7.0 sur serveur OVH
// contexte    : Site du Championnat de France d'Aviron de Mer 2018
// Copyright (c) 2017 AMP
// ------------------------------------------------------------------------
// creation: 04-juin-2017 pchevaillier@gmail.com
// revision: 11-juin-2017 pchevaillier@gmail.com
// ------------------------------------------------------------------------
// commentaires :
// - en chantier
// - version provisoire du site
// attention :
// -
// a faire :
// - revoir la structuration de la classe Page
// ------------------------------------------------------------------------

// --- Classes utilisees
require_once 'generiques/page.php';
require_once 'elements/entete_image.php';
require_once 'elements/menu_principal.php';
require_once 'elements/bandeau_partenaires.php';
require_once 'elements/bandeau_reseaux.php';
require_once 'elements/pied_page.php';
  
// ------------------------------------------------------------------------
// --- Definition de la classe Page_Accueil

/**
 * @author Pierre Chevaillier
 */
class Page_France2018 extends Page {
  /**
   * Definit les elments de la page
   */
  protected function definir_elements() {
    $this->elements_haut[] = new Menu_Principal();
    $this->elements_haut[] = new Entete_Image("media/entetes/banniere_france2018.jpg");
    
    $this->elements_bas[] = new Bandeau_Partenaires("media/logos");
    
    $b = new Bandeau_Reseaux("media/logos");
    $b->lien_facebook = "http://www.facebook.com/AvironMerPlougonvelin2018";
    $b->lien_twitter = "http://www.twitter.com/AvironMer29217";
    $this->elements_bas[] = $b;
    
    $this->elements_bas[] = new Pied_Page();
    
  }
}
// ========================================================================
