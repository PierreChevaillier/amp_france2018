<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web album des videos
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves.
      // ------------------------------------------------------------------------
      // creation : 13-oct-2017 pchevaillier@gmail.com
      // revision : 14-mar-2018 pchevaillier@gmail.com ajout video de fevrier
      // revision : 21-avr-2018 pchevaillier@gmail.com ajout video chez Ramine
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

      // --- Classe definissant la page a afficher
      require_once 'elements/page_france2018.php';
      
      // --- Classes des elements contenus dans la page
      require_once 'generiques/vignette_media.php';
      require_once 'elements/album_videos.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Vidéos");
      
      $chemin_media = "media/videos";
      $liste_videos = array();
      
      $media = new vignette_Media();
      $media->chemin_vignette = $chemin_media;
      $media->nom_fichier_vignette = "vignette_webcam_trez-hir.png";
      $media->def_titre("Webcam du Trez Hir");
      $media->lien_page_media = "webcam.php";
      $media->contenu = "Découvrez ce qui se passe en ce moment sur le site de la compétition.";

      $liste_videos[] = $media;
      
      $media = new vignette_Media();
      $media->chemin_vignette = $chemin_media;
      $media->nom_fichier_vignette = "vignette_direct.jpg";
      $media->def_titre("Le direct");
      $media->lien_page_media = "video_direct.php";
      $media->contenu = "Suivez le retransmission en direct des courses.";
      
      $liste_videos[] = $media;
    
      $media = new vignette_Media();
      $media->chemin_vignette = $chemin_media;
      $media->nom_fichier_vignette = "vignette_100-jours.jpg";
      $media->def_titre("Moins de 100 jours..");
      $media->lien_page_media = "video_moins-100-jours.php";
      $media->contenu = "La dete approche... et on se prépare très séieursement à l'Aviron de Mer de Plougonbelin ! A terre, comme en mer.";
      
      $liste_videos[] = $media;
      
      $media = new vignette_Media();
      $media->chemin_vignette = $chemin_media;
      $media->nom_fichier_vignette = "vignette_teaser_france2018.png";
      $media->def_titre("Le teaser...");
      $media->lien_page_media = "teaser.php";
      $media->contenu = "Cette video devrait vous motiver pour vous joindre à nous pour vivre cet événement majeur pour nous toutes et tous.";

      $liste_videos[] = $media;
      
      $media = new vignette_Media();
      $media->chemin_vignette = $chemin_media;
      $media->nom_fichier_vignette = "vignette_ramine.jpg";
      $media->def_titre("La génèse de l'affiche");
      $media->lien_page_media = "video_ramine.php";
      $media->contenu = "Un entretien avec Râmine, l'artiste-auteur installé à Brest qui a conçu l'oeuvre qui compose l'affiche du Championnat de France d'aviron de mer 2018.";
      
      $liste_videos[] = $media;
      
      
 /*
      $media = new vignette_Media();
      $media->chemin_vignette = $chemin_media;
      $media->nom_fichier_vignette = "vignette_video_plougonvelin.png";
      $media->def_titre("Découvrez Plougonvelin");
      $media->lien_page_media = "http://www.plougonvelin-tourisme.fr/video.html";
      $media->contenu = "Accédez à de splendides vidéos qui vous ferons découvrir Plougonvelin et qui vous donnerons sans doute l'envie de prolonger votre séjour.";

      $liste_videos[] = $media;
   */   
      // --- Elements de la page
      $nb_video_par_ligne = 3;
      $album = new Album_Videos($liste_videos, $nb_video_par_ligne);
      $page->contenus[] = $album;
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
