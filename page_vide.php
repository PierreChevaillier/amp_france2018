<!DOCTYPE html>
  <html lang="fr">
    <?php
      // ======================================================================
      // creation: 02-octo-2018 pchevaillier@gmail.com
      // commentaires : pour les tests
      // ======================================================================
      
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
