<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page visualisation video 'Chez Ramine'
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves
      // ------------------------------------------------------------------------
      // creation : 14-mar-2018 pchevaillier@gmail.com
      // revision :
      // -----------------------------------------------------------------------
      // commentaires :
      // attention :
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
      require_once 'elements/page_france2018.php';      
      require_once 'generiques/cadre_video.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("la génèse de l'affiche avec Ramine");
      
      $page->contenus[] = new Cadre_Video("media/videos/chez_Ramine.mp4");
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
