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
  // revision:
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // ---------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/cadre_texte.php';

  // ---------------------------------------------------------------------------
  // --- Definition de la classe
  
  class Cadre_Information extends Cadre_Texte {

    private $role;
  
    public function __construct($texte, $role = 'info') {
      parent::__construct($texte);
      $this->role = $role;
    }
  
    protected function afficher_debut() {
      echo '<div class="alert alert-' . $this->role . '" role="alert">';
    }
  
  }
  // ===========================================================================
?>
