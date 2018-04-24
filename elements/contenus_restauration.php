<?php
  // ===========================================================================
  // description : definition des classes pour la gestion
  //               des informations sur la restauration de l'evenement
  //               information + commandes
  // utilisation : destine a etre affiche comme element d'un page du site
  // teste avec  : PHP 7,1,14 sur Mac OS 10.13
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2018 AMP. Tous droits reserves.
  // ---------------------------------------------------------------------------
  // creation: 21-avr-2018 pchevaillier@gmail.com
  // revision: 23-avr-2018  pchevaillier@gmail.com gestion formulaire
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // -
  // a faire :
  // ===========================================================================
  
  // --- Classes utilisees
  require_once 'generiques/element_page.php';

  
  // ---------------------------------------------------------------------------
  /**
   * Presentation generale des informations sur l'offre de restauration
   * information sur la prestation + possibilites de commande de repas
   * il peut y avoir plusieurs types de prestation.
   */
  
  abstract class Commande_Restauration extends Element_Page {
    public $mail_contact = ""; // pour demande info et envoi formulaire commande
    public $lien_commande_enligne = ""; // page web du formulaire de commande - paiement
    public $formulaire_telechargement = ""; // pour commande par courrier
    public $date_limite_commande = "";
  
    public function __construct($mail_contact,
                                $lien_commande_enligne = "",
                                $formulaire_telechargement = "") {
      $this->mail_contact = $mail_contact;
      $this->lien_commande_enligne = $lien_commande_enligne;
      $this->formulaire_telechargement = $formulaire_telechargement;
    }
    
    public function initialiser() { }
    
    protected function afficher_debut() {
      echo "\n<div class=\"panel panel-default\">";
      echo '<div class="panel-heading"><p class="lead">' . $this->titre() . '</p></div>';
      echo '<div class="panel-body">';
    }
    
    protected function afficher_commande_cheque() {
      echo '<p>Pour tout renseignement ou commande avec <strong>paiement par chèque</strong>';
      if (strlen($this->mail_contact) > 0)
        echo '<br />Envoyez un mail à <a href="mailto: ' . $this->mail_contact . '?subject=[AMP%20-%20France 2018]%20' . $this->titre() . '">' . $this->mail_contact . '</a>';
      if (strlen($this->formulaire_telechargement) > 0)
        echo '<br />Téléchargez et envoyez <strong>par courrier</strong> ce <a href="' . $this->formulaire_telechargement . '" target="_blank">formulaire</a> une fois complété et accompagné de votre réglement';
      echo '</p>';
    }
    
    protected function afficher_commande_enligne() {
      if (strlen($this->lien_commande_enligne) > 0)
        echo '<div style="text-align:center;"><ul class="pager"><li><a class="bouton-lien" href="' . $this->lien_commande_enligne . '">Réservez et payez par CB</a></li></ul></div>';
    }
    
    protected function afficher_fin() {
      echo "</div></div>\n";
    }
  }
  
  // ---------------------------------------------------------------------------
  class Commande_Restauration_Courses extends Commande_Restauration {
  
    protected function afficher_corps() {
      echo '<div><p>Les jours de courses, des <strong>plateaux repas</strong> seront proposés aux compétiteurs et aux accompagnants. De plus, un <strong>stand restauration</strong> sera installé sur la plage à partir de 14 heures le jeudi 24.</p></div>';
      echo '<div><p style="font-size:18px">Tarif : 10 euros par plateau.</p></div>';
      $this->afficher_commande_cheque();
      $this->afficher_commande_enligne();
    }
  }
  
  // ---------------------------------------------------------------------------
  class Commande_Repas_Cloture extends Commande_Restauration {
    
    protected function afficher_corps() {
      echo '<div><p>Amis rameurs et accompagnateurs du monde de l’aviron de mer, nous vous proposons de partager autour d’un repas convivial, une sélection de produits bretons aux saveurs authentiques, entre terre et mer.</p></div>';
      
      $this->afficher_commande_enligne();
      
      echo '<div style="text-align:center;"><p style="font-size:18px">Entrée</p><p>Assiette de langoustines et/ou crevettes selon arrivage</p><p></p><p style="font-size:18px">Plat</p><p>Cochon grillé à la broche<br />Légumes du terroir</p></p><p></p><p style="font-size:18px">Dessert</p><p>Composition de pâtisseries bretonnes<br />Fraises de saison</p><p></p><p style="font-size:18px">Boissons</p><p>Eau plate<br />Vin rouge – vin blanc – vin rosé<br />Café ou thé</p></div><div><p style="font-size:18px">Tarif boissons comprises : 20 euros par convive.</p></div>';
      $this->afficher_commande_cheque();
    }
  }
  // ==========================================================================
?>
