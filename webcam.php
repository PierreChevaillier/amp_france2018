<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page visualisation de la webcam de l'evenement
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2017 AMP. Tous droits reserves.
      // ------------------------------------------------------------------------
      // creation : 14-oct-2017 pchevaillier@gmail.com
      // revision :
      // -----------------------------------------------------------------------
      // commentaires :
      // attention :
      // a faire :
      // ======================================================================
      
      set_include_path('./');
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $s = new Site("Championnat France 2018");
      $s->initialiser();

      
      // --- Classe définissant la page a afficher
      require_once 'generiques/cadre_video.php';
      
      require_once 'elements/page_france2018.php';
      require_once 'elements/contenu_accueil.php';
      require_once 'elements/contacts_presentations.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("teaser");
      
      $video = new cadre_Video("http://www.vision-environnement.com/webcams/player/plougonvelin.php");
      $video->def_titre("La plage du Trez-Hir en ce moment");
      
      $contenu = new Contenu_Accueil($video, new Vue_Contacts());
      $page->contenus[] = $contenu;
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
