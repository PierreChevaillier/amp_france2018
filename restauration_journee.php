<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web - informations et reservation
      //               repas de cloture de l'evenenement
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2018 AMP. Tous droits reserves.
      // -----------------------------------------------------------------------
      // creation : 21-acr-2018 pchevaillier@gmail.com
      // revision :
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
      $page = new Page_France2018("Repas des équipages");
   
      // --- Definition des contenus
      
      // Diner de cloture
      $mail_contact = 'PlateauRepas@France2018.avironPlougonvelin.fr';
      $lien_commande_enligne = 'https://www.helloasso.com/associations/aviron-de-mer-de-plougonvelin-amp/evenements/championnat-de-france-d-aviron-de-mer-2018-plateaux-repas';
      $restau_courses = new Commande_Restauration_courses($mail_contact, $lien_commande_enligne);
      $restau_courses->def_titre('Restauration courses');
      $page->contenus[] = $restau_courses;

      // --- Affichage de la page
      $page->initialiser();
      $page->afficher();
      // ======================================================================
    ?>
  </html>
