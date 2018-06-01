<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page visualisation video prises de vue drone
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves
      // ------------------------------------------------------------------------
      // creation : 01-jun-2018 pchevaillier@gmail.com
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
      require_once 'generiques/cadre_video.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("France 2018 : la compétition vue du ciel");
      
      $page->contenus[] = new Cadre_Video("media/videos/vue_du_ciel.mp4");
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
