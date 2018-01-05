<?php
  // ===========================================================================
  // description : traitement du formulaire de demande d'information
  // contexte    : action / soumission du formulaire
  // Copyright (c) 2017 AMP
  // -----------------------------------------------------------------------
  // creation : 28-oct-2017 pchevaillier@gmail.com
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
  require_once 'elements/formulaire_contact.php';
      
  $demande = new Demande_Information();
  $demande->definir_depuis_formulaire();
      
  // --- Enregistrement de la demande d'information (ici envoi d'un mail)
  $enregistrement = new Mail_Demande_Information($demande);
  $enregistrement->def_adresse_mail($site->mail_contact());
  $enregistrement->executer();

  // --- Affichage du message de confiramtion de traitement de la demande
  header("location: demande_info_confirmation.php");
  // ===========================================================================
?>
