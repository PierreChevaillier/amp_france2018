<?php
  // ===========================================================================
  // description : definition de la classe Cadre_texte
  //               affichage d'un cadre avec du texte
  // utilisation : destine a etre affiche sur differentes pages web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11, serveur OVH (php 7)
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017 AMP
  // ---------------------------------------------------------------------------
  // creation: 07-jul-2017 pchevaillier@gmail.com
  // revision: 29-nov-2017 pchevaillier@gmail.com affichage texte
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // ---------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/element_page.php';

  // ---------------------------------------------------------------------------
  // --- Definition de la classe
  
  class Cadre_Texte extends Element_Page {

    private $texte;
  
    public function __construct($texte) {
      $this->texte = $texte;
    }
  
    public function initialiser() {
    }
  
    protected function afficher_debut() {
      echo '<div>';
    }
  
    protected function afficher_corps() {
      if ($this->a_un_titre())
        echo '<p class="lead">' . $this->titre() . '</p>';
      echo $this->texte;
    }
  
    protected function afficher_fin() {
      echo '</div>';
    }
  }
  // ===========================================================================
?>
