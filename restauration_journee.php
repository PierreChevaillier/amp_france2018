<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web - informations et reservation
      //               restauration pendant l'evenement
      // utilisation : serveur web - php
      // teste avec  : PHP 7.1.14 sur Mac OS 10.13 et serveur OVH (PHP 7.x)
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2018 AMP. Tous droits reserves.
      // -----------------------------------------------------------------------
      // creation : 21-avr-2018 pchevaillier@gmail.com
      // revision : 21-avr-2018 pchevaillier@gmail.com - essai formulaire a telecharger
      // -----------------------------------------------------------------------
      // commentaires :
      // attention :
      // - travail en cours : manque info / date limite et formulaire a telecharger
      // a faire :
      // =======================================================================
      
      set_include_path('./');
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
 
      $s = new Site("Championnat France 2018");
      $s->initialiser();

      // --- Classe définissant la page a afficher
      require_once 'elements/page_france2018.php';
 
      // --- Classes des elements affiches dans la page
      require_once 'generiques/cadre_texte.php';
      require_once 'elements/contenus_restauration.php';
      
      // --- Creation dynamique de la page
      $page = new Page_France2018("Restauration courses");
   
      // --- Definition des contenus
      
      // Plateaux repas : restaurations journees de l'evenement
      $mail_contact = 'PlateauRepas@France2018.avironPlougonvelin.fr';
      $lien_commande_enligne = 'https://www.helloasso.com/associations/aviron-de-mer-de-plougonvelin-amp/evenements/championnat-de-france-d-aviron-de-mer-2018-plateaux-repas';
      $chemin_formulaire = ''; //media/documents/commande_plateaux_repas.pdf';
      $restau_courses = new Commande_Restauration_courses($mail_contact,
                                                          $lien_commande_enligne,
                                                          $chemin_formulaire);
      $restau_courses->def_titre('Restauration courses - plateaux repas');
      $page->contenus[] = $restau_courses;

      // --- Affichage de la page
      $page->initialiser();
      $page->afficher();
      // ======================================================================
    ?>
  </html>
