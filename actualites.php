<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web presentant le journal des actualites sur
      //               le lieu de l'evenement
      // contexte    : Site web du chamionnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves.
      // ------------------------------------------------------------------------
      // creation : 11-oct-2017 pchevaillier@gmail.com
      // revision : 06-nov-2017 pchevaillier@gmail.com actu du 2 nov.
      // revision : 05-jan-2018 pchevaillier@gmail.com include_path
      // revision : 13-jan-2018 pchevaillier@gmail.com actualites dans base donnees
      // revision : 05-avr-2018 pchevaillier@gmail.com utilisation Contenu_Double_Colonne
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
      //require_once 'generiques/actualite.php';
      require_once 'generiques/contenu_double_colonne.php';
      require_once 'generiques/journal_actualites.php';
      //require_once 'elements/contenu_actualites.php';
      require_once 'elements/contacts_presentations.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Actualites");
      
      $journal = new Journal_Actualites($site, "media/actus");
      
      $principal = new Conteneur_Elements();
      $principal->elements[] = $journal;
      
      // Contenu du cadre secondaire de la page
      $secondaire = new Conteneur_Elements();
      $secondaire->elements[] = new Vue_Contacts();
      
      $page->contenus[] = new Contenu_Double_Colonne($principal,
                                                     $secondaire,
                                                     'col-sm-8',
                                                     'col-sm-4');
      
      //$page->contenus[] = new Contenu_Actualites($journal, new Vue_Contacts());
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
