<?php
  // ===========================================================================
  // description : definition de la classe Journal_Actualites
  //               affichage des actualites en tant que contenu d'une page web
  // utilisation : destine a etre affiche sur la page d'accueil
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP. Tous droits reserves.
  // ---------------------------------------------------------------------------
  // creation: 13-jun-2017 pchevaillier@gmail.com
  // revision: 06-nov-2017 pchevaillier@gmail.com lien media
  // revision: 13-jan-2018 pchevaillier@gmail.com actualites dans base donnees
  // revision: 27-jan-2018 pchevaillier@gmail.com resume, texte
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // - en chantier
  // a faire :
  //   - ne pas afficher le texte.
  //   - lien vers la page avec acut complete
  //   - mettre a jour la base de donnees sur le site OVH
  // ------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/element_page.php';
  require_once 'generiques/actualite.php';
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe Journal_Actualites
  
  class Journal_Actualites extends Element_Page {
    private $site_web = null;
    private $chemin_photos = "";
    public $actualites = array();
  
    public function __construct($site_web, $chemin_relatif_fichier_photos) {
      $this->site_web = $site_web;
      $this->chemin_photos = $chemin_relatif_fichier_photos;
    }
  
    public function initialiser() {
      $this->actualites = Enregistrement_Actualite::recherche_actualites($this->site_web->code(), "");
      // TODO : activier quand base de donnees renseignee.
    }
  
    protected function afficher_debut() {
      echo '<div>';
    }
  
    protected function afficher_corps() {
      echo '<div class="panel panel-default"><div class="panel-body"><ul class="media-list">';
      foreach ($this->actualites as $actu)
        $this->afficher_item($actu);
      echo '</ul></div></div>';
    }
  
    protected function afficher_fin() {
      echo '</div>';
    }
  
    private function afficher_item($actu) {
      $source = $this->chemin_photos . '/' . $actu->nom_fichier_vignette;
      echo '<li class="media"><div class="media-left"><img class="media-object" src="' . $source . '" alt="alt"></div><div class="media-body">';
      echo '<h4 class="media-heading">' . utf8_encode($actu->titre()) . '<br><small>' . $actu->date . '</small><br /></h4>';
      echo '<p>' . utf8_encode($actu->resume);
      if (strlen($actu->texte) >0)
        echo '<br /><a href="actu.php?id=' . $actu->code() . '"> lire la suite  ...</a>';
        //echo '<div><p>' . utf8_encode($actu->texte) . '</p></div>';
      echo '<p></div></li>';
    }
  
  }
  // ========================================================================
  ?>
