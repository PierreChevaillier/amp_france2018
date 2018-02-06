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
      // revision : 06-fev-2018 pchevaillier@gmail.com renommer en annonce_bateau
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
      require_once 'elements/annonce_bateau.php';
      require_once 'elements/contenu_contact.php';
      require_once 'elements/contacts_presentations.php';

      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Bourse aux bateaux");
      
      $formulaire = new Formulaire_Annonce_bateau($page, 'annonce_bateau_enreg.php');
      $formulaire->def_titre("Petite annonce prêt - location bateaux");
      
      $contenu = new Contenu_Contact($formulaire, new Vue_Contacts());
      
      $page->contenus[] = $contenu;

      $page->initialiser();
      $page->afficher();

	?>
</html>
