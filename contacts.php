<!doctype html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web / formualire prise de contact
      // contexte    : site web du Championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves
      // -----------------------------------------------------------------------
      // creation : 02-oct-2017 pchevaillier@gmail.com
      // revision : 21-jan-2018 pchevaillier@gmail.com mise en forme
      // -----------------------------------------------------------------------
      // commentaires :
      // attention :
      // a faire :
      // =======================================================================
      
      set_include_path('./');
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';

      $s = new Site("Championnat France 2018");
      $s->initialiser();

      // --- Classe définissant la page a afficher
      require_once 'elements/page_france2018.php';
      
      // --- Contenu de la page
      require_once 'elements/formulaire_contact.php';
      require_once 'elements/contenu_contact.php';
      require_once 'elements/contacts_presentations.php';

      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Contacts");
      
      $formulaire = new Formulaire_Contact($page, 'demande_info.php');
      $formulaire->def_titre("Demande d'information");
      
      $contenu = new Contenu_Contact($formulaire, new Vue_Contacts());
      
      $page->contenus[] = $contenu;

      $page->initialiser();
      $page->afficher();
      // =======================================================================
    ?>
  </html>
