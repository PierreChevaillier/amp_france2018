<?php
  // ===========================================================================
  // description : definition de la classe Album_Videos
  //               affichage de l'album des videos
  // utilisation : destine a etre affiche dans une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017 AMP
  // ---------------------------------------------------------------------------
  // creation: 13-oct-2017 pchevaillier@gmail.com
  // revision:
  // ---------------------------------------------------------------------------
  // commentaires :
  // - en chantier
  // attention :
  // -
  // a faire :
  // -
  // ---------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/vignette_media.php';

  // ---------------------------------------------------------------------------
  // --- Definition de la classe

  /**
   * @author Pierre Chevaillier
   */
  class Album_Videos extends Element_Page {

    public $colonnage = "col-sm-6 col-md-4";
    private $nb_colonnes = 3;
    private $videos = array();
  
    public function __construct($liste_media, $nb_colonnes) {
      $this->nb_colonnes = $nb_colonnes;
      foreach ($liste_media as $media)
        $this->videos[] = $media;
    }
    
    public function initialiser() {
      //$ratio_md_xs = 3;
      //$n_md = 12 / $nb_par_ligne;
      //$n_xs = $n_md * $n_md;

      if (count($this->videos) < $this->nb_colonnes)
        $this->nb_colonnes = count($this->videos);
      foreach ($this->videos as $media)
        $media->initialiser();
    }
  
    protected function afficher_debut() {
      echo '<div class="container">';
    }
  
    protected function afficher_corps() {
      $n = count($this->videos);
      $nb = $n;
      while ($n > 0) {
        echo "\n";
        echo '<div class="row">';
        for ($i = 0; $i < $this->nb_colonnes; $i++) {
          echo '<div class="col-sm-6 col-md-4">';
          $this->videos[$nb - $n]->afficher();
          echo '</div>';
          $n--;
        }
        echo '</div></div>';
        echo "\n";
      }
      echo "\n";
    }
  
    protected function afficher_fin() {
      echo '</div>';
    }
    
  }
  // ===========================================================================
