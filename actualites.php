<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web presentant le journal des actualites sur
      //               le lieu de l'evenement
      // contexte    : Site web du chamionnat de France 2018
      // Copyright (c) 2017 AMP
      // ------------------------------------------------------------------------
      // creation : 11-oct-2017 pchevaillier@gmail.com
      // revision : 06-nov-2017 pchevaillier@gmail.com actu du 2 nov.
      // revision : 05-jan-2018 pchevaillier@gmail.com include_path
      // revision : 13-jan-2018 pchevaillier@gmail.com actualites dans base donnees
      // -----------------------------------------------------------------------
      // commentaires :
      // attention :
      // en chantier
      // a faire :
      // ======================================================================
      
      set_include_path('./');
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $site = new Site("Championnat France 2018");
      $site->initialiser();

      // --- Classe definissant la page a afficher
      require_once 'elements/page_france2018.php';

      // --- Autres classes
      require_once 'generiques/actualite.php';
      require_once 'generiques/journal_actualites.php';
      require_once 'elements/contenu_actualites.php';
      require_once 'elements/contacts_presentations.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Actualites");
      
      $comm = new Categorie("Communication");
      $compet = new Categorie("Compétition");
      
      $journal = new Journal_Actualites($site, "media/actus");
      $page->contenus[] = new Contenu_Actualites($journal, new Vue_Contacts());
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
