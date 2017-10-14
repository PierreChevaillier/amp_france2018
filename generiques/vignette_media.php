<?php
  // ===========================================================================
  // description : definition de la classe Vignette_Media
  //               affichage d'un element d'un album de media (photo, video)
  //               l'element est sur une page web a laquelle on accede via la
  //               vibgnette.
  // utilisation : elements d'un contenu de page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Elements generique d'un site web
  // Copyright (c) 2017 AMP
  // ------------------------------------------------------------------------
  // creation : 04-juin-2017 pchevaillier@gmail.com
  // revision :
  // ------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // ------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'element.php';
  
  // ------------------------------------------------------------------------
  // --- Definition de la Vignette_media

  class Vignette_Media extends Element {

    public $chemin_vignette = "";
    public $nom_fichier_vignette = "";
    public $lien_page_media = "";
    
    public function initialiser() {
    }

    protected function afficher_debut() {
      echo '<div class="thumbnail">';
      
    }

    protected function afficher_corps() {
      echo '<a href="' . $this->lien_page_media . '">';
      echo '<img src="' . $this->chemin_vignette . '/' . $this->nom_fichier_vignette . '" alt="Video"></a>';
      echo '<div class="caption"><h3>' . $this->titre() . '</h3>';
      echo '<p>' . $this->contenu . '</p>';
      echo '</div>';
    }
    
    protected function afficher_fin() {
      echo '</div>';
    }
  }
// ========================================================================
