<?php
  // ===========================================================================
  // description : traitement du formulaire de demande d'information
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
      
  $annonce = new Annonce_Bateau();
  $annonce->definir_depuis_formulaire();
      
  // --- Enregistrement de l'annonce
  $action = $_POST['a'];
  
  $table = new Enregistrement_Annonce_bateau();
  $table->def_annonce($annonce);
  $action = $_POST['a'];
  if ($action == 'a') {
    $statut = $table->enregistrer_annonce();
  } elseif ($action == 'm') {
    $id_annonce  = $_POST['id'];
    $annonce->def_cle_access($id_annonce);
    $table->def_type_id('cle_access');
    $statut = $table->modifier_annonce();
  }
  
  // --- Affichage du message de confirmation de traitement de la demande
  header("location: annonce_bateau_confirm_enreg.php?a=" . $action . "&id=" . $annonce->cle_access());
  // ===========================================================================
?>
