<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web vide pour test (modele)
      // contexte    : Application  web
      // Copyright (c) 2017-2018 AMP. Tous droits reserves
      // -----------------------------------------------------------------------
      // creation : 02-oct-2017 pchevaillier@gmail.com
      // revision : 19-jan-2018 pchevaillier@gmail.com mise en forme
      // -----------------------------------------------------------------------
      // commentaires :
      //  - pour les tests et en attendant d'avoir ecrit le contenu de la page
      // attention :
      // a faire :
      // =======================================================================
      
      set_include_path('./');
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      require_once 'generiques/cadre_texte.php';

      $s = new Site("Championnat France 2018");
      $s->initialiser();

      // --- Classe définissant la page a afficher
      require_once 'elements/page_france2018.php';
      require_once 'elements/contenu_hebergements.php';

      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Hébergement");
      $page->contenus[] = new Cadre_Texte("");
      
      $page->initialiser();
      $page->afficher();
      // ======================================================================
    ?>
  </html>
