<?php
  // ===========================================================================
  // description : definition de la classe Journal_Annonces_Bateau
  //               affichage des annonces en tant que contenu d'une page web
  // utilisation : contenu de page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017-2018 AMP. Tous droits reserves.
  // ---------------------------------------------------------------------------
  // creation : 06-fev-2017 pchevaillier@gmail.com
  // revision : 06-fev-2017 pchevaillier@gmail.com dates debut-fin (init)
  // revision : 17-fev-2017 pchevaillier@gmail.com rechercher_actives
  // revision : 18-fev-2017 pchevaillier@gmail.com affichage annonce
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // ------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/element_page.php';
  require_once 'temps/calendrier.php';
  require_once 'elements/annonce_bateau.php';
  
  // ------------------------------------------------------------------------
  // --- Definition de la classe Journal_Actualites
  
  class Journal_Annonces_Bateau extends Element_Page {
    private $site_web = null;
    public $annonces= array();
  
  
    public function _construct($site_web) {
      $this->site_web = $site_web;
    }
    
    public function initialiser() {
      $e = new Enregistrement_Annonce_bateau();
      $this->annonces = $e->rechercher_actives();
    }
  
    protected function afficher_debut() {
      echo '<div>';
    }
  
    protected function afficher_corps() {
      foreach ($this->annonces as $annonce) {
        echo '<div class="panel panel-default"><div class="panel-body">';
        $this->afficher_item($annonce);
        echo '</div></div>';
      }
     
    }
  
    protected function afficher_fin() {
      echo '</div>';
    }
  
    private function afficher_item($annonce) {
      // si 2 dates saisies : entre le mardi 24 mai 2018 et le dimanche 29 mai 2018
      // si 1 date saisie : pour le mardi 24 mai 2018
      // si aucune : rien
      
      $cal = Calendrier::obtenir();
      $html = "\n<h4>" . $annonce->type() . " de " . $annonce->pret_location() . " de " . $annonce->type_bateau();
      if ($annonce->avec_aviron())
        $html = $html . " avec jeux de " . $annonce->type_aviron();
      $html = $html . "<br /><small>annonce publiée le " . $annonce->date_publication . "</small>";
      $html = $html . "</h4><p><small>";
 
      
      $deb = $annonce->date_debut->date();
      $fin = $annonce->date_fin->date();
      if ($deb > 0 || $fin > 0) {
        $texte_date = "Mise à disposition ";
        if ($deb == $fin)
          $texte_date = $texte_date . "le " . $cal->date_texte($annonce->date_debut);
        elseif ($fin == 0)
          $texte_date = $texte_date . "à partir du " . $cal->date_texte($annonce->date_debut);
        elseif ($deb == 0)
          $texte_date = $texte_date . "jusqu'au " . $cal->date_texte($annonce->date_fin);
        else
          $texte_date = $texte_date . "du " . $cal->date_texte($annonce->date_debut) . " au " . $cal->date_texte($annonce->date_fin);
        $html = $html . $texte_date;
      }
      
      if ($annonce->codes_course != 0)
        $html = $html . "<br />pour la course " . $annonce->courses() ;
      if (strlen($annonce->condition) > 0)
        $html = $html . "<br />Conditions : " . utf8_encode($annonce->condition);
       if (strlen($annonce->texte) > 0)
         $html = $html . "<br />Texte de l'annonce : " . utf8_encode($annonce->texte);
      
      
      $auteur = "";
      if ((strlen($annonce->auteur->prenom) > 0) || (strlen($annonce->auteur->nom) > 0)) {
        $auteur = utf8_encode($annonce->auteur->prenom) . " " . utf8_encode($annonce->auteur->nom);
        
      }
      $html = $html . "<br />Contact : ";
      if (strlen($annonce->auteur->club) > 0)
        $auteur = $auteur . " - " . utf8_encode($annonce->auteur->club);
      if (strlen($auteur))
        $html = $html . $auteur;
      
      $coordonnees = "";
      if (strlen($annonce->auteur->telephone) > 0)
        $coordonnees = $coordonnees . $annonce->auteur->telephone;
      if (strlen($annonce->auteur->courriel) > 0)
        $coordonnees = $coordonnees . " " . $annonce->auteur->courriel;
      if (strlen($coordonnees) > 0)
        $html = $html . "<br />(" . $coordonnees . ")";
      
       echo $html . "</small></p>\n";
    }
    
  }
  // ========================================================================
  ?>
