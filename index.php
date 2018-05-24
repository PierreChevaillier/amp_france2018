<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page d'accueil du site web de l'evenement
      // utilisation : serveur web - php
      // teste avec  : en local avec PHP 5.5.3 sur Mac OS 10.11
      //               en local avec PHP 7.1.14 sur Mac OS 13.4
      //               sur serveur OVJ : PHP 7.0
      // contexte    : Championnat de France d'Aviron de Mer 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves.
      // ------------------------------------------------------------------------
      // creation :             pchevaillier@gmail.com
      // revision : 11-oct-2017 pchevaillier@gmail.com
      // revision : 07-nov-2017 pchevaillier@gmail.com disposition, indirecton teaser
      // revision : 05-jan-2018 pchevaillier@gmail.com include_path
      // revision : 01-avr-2018 pchevaillier@gmail.com lien 'devenez partenaire'
      // revision : 05-avr-2018 pchevaillier@gmail.com suppression liens 'partenaire' et benevoles
      // -----------------------------------------------------------------------
      // commentaires :
      // attention :
      // a faire :
      // =======================================================================
      
      set_include_path('./');
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $s = new Site("Championnat de France 2018");
      $s->initialiser();

      // --- Classe définissant la page a afficher
      //require_once 'generiques/cadre_video.php';
      require_once 'generiques/cadre_texte.php';
      require_once 'generiques/vignette_media.php';
      require_once 'generiques/element.php';
      
      require_once 'elements/page_france2018.php';
      require_once 'elements/flux_video_direct.php';
      require_once 'elements/entete_image.php';
      require_once 'elements/contenu_accueil.php';
      require_once 'elements/zone_partenaires.php';

      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Accueil");
      /*
      $code_liens = "<div class=\"page-header\" padding=\"10px\"><ul class=\"pager\"><li><a class=\"bouton-lien\" href=\"https://docs.google.com/forms/d/e/1FAIpQLScLkB08ZfDKLDJD1lRKuX0RBNbZfUSnzOym2ptZicw3CONe_w/viewform?usp=sf_link\" target=\"_new\">Devenez bénévole</a></li><li><a class=\"bouton-lien\" href=\"https://www.helloasso.com/associations/aviron-de-mer-de-plougonvelin-amp/collectes/devenez-partenaire-du-championnat-de-france-d-aviron-de-mer-2018-1\" target=\"_new\">Devenez partenaire</a></li></ul></div>";
   
      $cadre_liens = new Cadre_Texte($code_liens);
      $page->contenus[] = $cadre_liens;
      */
      $secondaire = new Conteneur_Elements();
      $media = new vignette_Media();
      $media->chemin_vignette = "media/videos";
      $media->nom_fichier_vignette = "vignette_teaser_france2018.png";
      $media->def_titre("Le teaser...");
      $media->lien_page_media = "teaser.php";
      $media->contenu = "Cette video devrait vous motiver pour vous joindre à nous pour vivre cet événement majeur pour nous toutes et tous.";
   
      //$video_promotion = new Cadre_Video("media/videos/teaser_france2018_12mbs.mp4");
      
      $texte = "<p><img src=\"media/photos/photo_president_co.jpg\" style=\"float:left; height:180px; margin:0px 20px 5px 0px \" />Chers amis rameurs,</p><p style=\"text-align: justify;\" >C’est pour moi un réel plaisir de vous accueillir sur notre nouveau site web, en ma qualité de président du Comité d’Organisation du Championnat de France d'Aviron de Mer 2018.</p><p style=\"text-align: justify;\" >La F.F.A. nous a fait l'honneur et le plaisir de nous confier l'organisation de ce grand évènement de l'Aviron de Mer et nous mettons déjà tout en oeuvre pour que vous passiez un excellent moment sur notre plan d'eau et sur la commune de Plougonvelin.</p><p style=\"text-align: justify;\" >Les adhérents de l'Aviron de Mer de Plougonvelin, les bénévoles proches de l'AMP, l'équipe municipale, les acteurs de la Communauté de Commune du Pays d'Iroise ainsi que nos partenaires locaux, se mobilisent pour que la fête soit une réussite.</p><p style=\"text-align: justify;\" >Notre objectif est de vous voir participer nombreux avec le sourire et que vous profitiez au maximum de l’instant. La mission qui nous a été confiée est importante, mais je sais qu'avec l'aide de tous nos collaborateurs nous atteindrons cet objectif.</p><p style=\"text-align: justify;\" >Rejoignez-nous dès à présent sur les réseaux sociaux pour suivre les évolutions de la préparation de l’évènement.</p><p style=\"text-align: justify;\" >Bon entraînement à toutes et tous, préparez-vous bien et à bientôt sur notre plan d'eau.</p><p>Xavier HERVE</p>";
      $mot_president = new Cadre_Texte($texte);
      $mot_president->def_titre("Mot du président du Comité d'Organisation");
      
      $page->contenus[] = new Cadre_Video_Direct(); //new Entete_Image("media/entetes/banniere_france2018.jpg");
      
      //$contenu = new Contenu_Accueil($video_promotion, $mot_president);
      $secondaire = new Conteneur_Elements();
      $secondaire->elements[] = $media;
      //$contenu = new Contenu_Accueil($mot_president, $media);
      $contenu = new Contenu_Accueil($mot_president, $secondaire);
      
      $page->contenus[] = $contenu;
      
      $page->initialiser();
      $page->afficher();
      // =======================================================================
    ?>
  </html>
