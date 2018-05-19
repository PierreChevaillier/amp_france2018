<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web - informations et reservation
      //               repas de cloture de l'evenenement
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2018 AMP. Tous droits reserves.
      // -----------------------------------------------------------------------
      // creation : 21-avr-2018 pchevaillier@gmail.com
      // revision : 25-avr-2018 pchevaillier@gmail.com date limite de commande
      // revision : 20-mai-2018 pchevaillier@gmail.com suppression possibilite commande
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
      $mail_contact = ''; //'RepasEquipage@France2018.avironPlougonvelin.fr';
      $lien_commande_enligne = ''; //'https://www.helloasso.com/associations/aviron-de-mer-de-plougonvelin-amp/evenements/championnat-de-france-d-aviron-de-mer-2018-diner-de-cloture';
      $chemin_formulaire = ''; //'media/documents/formulaire-inscription_repas-equipages.docx.zip';
      $date_limite_commande = '15 mai 2018';
      $diner_cloture = new Commande_Repas_Cloture($mail_contact,
                                                   $lien_commande_enligne,
                                                          $chemin_formulaire,
                                                          $date_limite_commande);
      $diner_cloture->def_titre('Repas des équipages du samedi 26 mai');
      $page->contenus[] = $diner_cloture;

      // --- Affichage de la page
      $page->initialiser();
      $page->afficher();
      // ======================================================================
    ?>
  </html>
