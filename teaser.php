<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page visualisation video promo de l'evenement
      // contexte    : Site web du chamionnat de France 2018
      // Copyright (c) 2017 AMP
      // ------------------------------------------------------------------------
      // creation : 14-oct-2017 pchevaillier@gmail.com
      // revision :
      // -----------------------------------------------------------------------
      // commentaires :
      // attention :
      // a faire :
      // ======================================================================
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $s = new Site("Championnat France 2018");
      $s->initialiser();

      // --- Classe définissant la page a afficher
      require_once 'generiques/cadre_video.php';
      require_once 'elements/page_france2018.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("teaser");
      
      $page->contenus[] = new Cadre_Video("media/videos/teaser_france2018_12mbs.mp4");
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
