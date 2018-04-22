<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web - informations sur la restauration
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves.
      // -----------------------------------------------------------------------
      // creation : 19-jan-2018 pchevaillier@gmail.com
      // revision : 10-avr-2018 pchevaillier@gmail.com menu - debut
      // revision : 20-avr-2018 pchevaillier@gmail.com lien mail + paiement en ligne
      
      // -----------------------------------------------------------------------
      // commentaires :
      // attention :
      // - travail en cours
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
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Restauration");
   
      // --- Definition des contenus
      
      // Restauration journee
      $mail_contact = 'PlateauRepas@France2018.avironPlougonvelin.fr';
      $lien_commande_enligne = 'https://www.helloasso.com/associations/aviron-de-mer-de-plougonvelin-amp/evenements/championnat-de-france-d-aviron-de-mer-2018-diner-de-cloture';
      $restau_courses = new Commande_Restauration_courses($mail_contact, $lien_commande_enligne);
      $restau_courses->def_titre('Restauration courses');
      $page->contenus[] = $restau_courses;

      // Diner de cloture
      $mail_contact = 'RepasEquipage@France2018.avironPlougonvelin.fr';
      $lien_commande_enligne = 'https://www.helloasso.com/associations/aviron-de-mer-de-plougonvelin-amp/evenements/championnat-de-france-d-aviron-de-mer-2018-diner-de-cloture';
      $diner_cloture = new Commande_Repas_Cloture($mail_contact, $lien_commande_enligne);
      $diner_cloture->def_titre('Repas des équipages du samedi 26 mai');
      $page->contenus[] = $diner_cloture;
/*
      $menu = "<div class=\"panel panel-default\"><div class=\"panel-heading\"><p class=\"lead\">Repas des équipages du samedi 26 mai</p></div><div style=\"text-align:center;\"><p style=\"font-size:20px\">REPAS DES EQUIPAGES</p><p>Amis rameurs et accompagnateurs du monde de l’aviron de mer, <br />nous vous proposons de partager autour d’un repas convivial, <br />une sélection de produits bretons aux saveurs authentiques, entre terre et mer.</p><p style=\"font-size:18px\">Entrée</p><p>Assiette de langoustines et/ou crevettes selon arrivage</p><p></p><p style=\"font-size:18px\">Plat</p><p>Cochon grillé à la broche<br />Légumes du terroir</p></p><p></p><p style=\"font-size:18px\">Dessert</p><p>Composition de pâtisseries bretonnes<br />Fraises de saison</p><p></p><p style=\"font-size:18px\">Boissons</p>Eau plate<br />Vin rouge – vin blanc – vin rosé<br />Café ou thé</p></div><div style=\"padding:20px;\"><p style=\"font-size:18px\">Tarif boissons comprises : 20 euros par convive.</p><p>Pour tout renseignement ou commande avec paiement par chèque<br />Envoyez un mail à <a href=\"mailto: RepasEquipage@France2018.avironPlougonvelin.fr\">RepasEquipage@France2018.avironPlougonvelin.fr</a></p></div><div style=\"text-align:center;\"><ul class=\"pager\"><li><a class=\"bouton-lien\" href=\"https://www.helloasso.com/associations/aviron-de-mer-de-plougonvelin-amp/evenements/championnat-de-france-d-aviron-de-mer-2018-diner-de-cloture\">Réservez et payez en ligne</a></li></ul></div></div></div>";
 */
      /*
      $element = new Cadre_Texte($menu);
      //$element->def_titre("Repas des équipages du samedi 26 mai");
      $page->contenus[] = $element;
      */
      $page->initialiser();
      $page->afficher();
      // ======================================================================
    ?>
  </html>
