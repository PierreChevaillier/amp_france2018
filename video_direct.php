<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web pour la visualisation transmission en direct
      //               de l'evenement
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves
      // ------------------------------------------------------------------------
      // creation : 19-mai-2018 pchevaillier@gmail.com
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
      require_once 'elements/flux_video_direct.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("le direct");
      
      $page->contenus[] = new Cadre_Video_Direct();
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
