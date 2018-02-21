<?php
  // ===========================================================================
  // description : traitement d'une action sur l'enregistrement d'une annonce
  // contexte    : action / soumission du formulaire
  // Copyright (c) 2017-2018 AMP. Tous droits reserves
  // -----------------------------------------------------------------------
  // creation : 06-fev-2018 pchevaillier@gmail.com
  // revision :
  // -----------------------------------------------------------------------
  // commentaires :
  // - aucun affichage afin que le formulaire ne puisse pas etre soumis
  //   plusieurs fois
  // attention :
  // a faire :
  // =======================================================================
  
  set_include_path('./');
  
  // --- Informations relatives au site web
  require_once 'generiques/site.php';

  $site = new Site("Championnat France 2018");
  $site->initialiser();
      
  // --- recuperation des donnees saisies dans le formulaire
  require_once 'elements/annonce_bateau.php';

  $cloture_annonce = (isset($_GET['a']) && ($_GET['a'] == 'c'));
  $suppression_annonce = (isset($_GET['a']) && ($_GET['a'] == 's'));
  if ($cloture_annonce || $suppression_annonce) {
    $id_annonce  = $_GET['id'];
    $annonce = new Annonce_Bateau();
    $annonce->def_cle_access($id_annonce);
    $e = new Enregistrement_Annonce_bateau();
    $e->def_annonce($annonce);
    $e->def_type_id('cle_access');
    
    if ($cloture_annonce)
      $e->desactiver_annonce();
    elseif ($suppression_annonce)
      $e->supprimer_annonce();
  }
    
  // --- Affichage du message de confirmation de traitement de la demande
  header("location: annonce_bateau_confirm_enreg.php?a=" . $_GET['a'] . "&idd=" . $annonce->code());
  // ===========================================================================
?>
