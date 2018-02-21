<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web affichant le parcours des courses
      // contexte    : Site web du Championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves
      // -----------------------------------------------------------------------
      // creation : 19-jan-2018 pchevaillier@gmail.com version provisoire
      // revision : 04-fev-2018 pchevaillier@gmail.com parcours officiels
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

      // --- Classe definissant la page a afficher
      require_once 'elements/page_france2018.php';
      
      // ---- Classes des elements affiches dans la page
      require_once 'generiques/cadre_texte.php';
      require_once 'generiques/cadre_video.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Parcours des courses");
      
      // --- Classes des elements contenus dans la page
      require_once 'generiques/vignette_media.php';
      require_once 'elements/album_videos.php';
 
      // Entete mentionnant que le parcours n'est pas encore connu
      $texte = "<p></p>";
      //$texte = "\n<div class=\"page-header\"><h1>Parcours des courses</h1><div class=\"panel panel-warning\" style=\"margin: 10px;\"><div class=\"panel-heading\" style=\"padding: 10px;\"><p class=\"lead\">Information non encore disponible.</p></div><div class=\"panel-body\"><p>Les courses se déroulerons dans la baie du Trez-Hir, approximativement dans le zone ci-dessous.</p></div></div></div>\n";
      
      $entete = new Cadre_Texte($texte);
      $entete->def_titre("Parcours des courses");
      $page->contenus[] = $entete;
      
      $chemin_media = "media/parcours";
      $liste_media = array();
      
      $media = new Vignette_Media();
      $media->chemin_vignette = $chemin_media;
      $media->nom_fichier_vignette = "f18_informations-pratiques_lr.png";
      $media->def_titre("Informations pratiques");
      $media->lien_page_media = "parcours_info_pratiques.php";
      $media->contenu = "Les cheneaux pour les départs de plage, les zones à éviter...";
      $liste_media[] = $media;
      
      $media = new Vignette_Media();
      $media->chemin_vignette = $chemin_media;
      $media->nom_fichier_vignette = "f18_parcours-principal_plan-large_lr.png";
      $media->def_titre("Parcours principal");
      $media->lien_page_media = "parcours_principal_large.php";
      $media->contenu = "Le parcours principal et la zone d'accès";
      $liste_media[] = $media;
 
      $media = new Vignette_Media();
      $media->chemin_vignette = $chemin_media;
      $media->nom_fichier_vignette = "f18_parcours-principal_plan-serre_lr.png";
      $media->def_titre("Parcours principal");
      $media->lien_page_media = "parcours_principal_serre.php";
      $media->contenu = "Le parcours principal en plan serré.";
      $liste_media[] = $media;
    
      $media = new Vignette_Media();
      $media->chemin_vignette = $chemin_media;
      $media->nom_fichier_vignette = "f18_parcours-repli-est_lr.png";
      $media->def_titre("Parcours de repli Est");
      $media->lien_page_media = "parcours_repli_est.php";
      $media->contenu = "Le parcours de repli - zone Est.";
      $liste_media[] = $media;
    
      $media = new Vignette_Media();
      $media->chemin_vignette = $chemin_media;
      $media->nom_fichier_vignette = "f18_parcours-repli-sud_lr.png";
      $media->def_titre("Parcours de repli Sud");
      $media->lien_page_media = "parcours_repli_sud.php";
      $media->contenu = "Le parcours de repli - zone Sud.";
      $liste_media[] = $media;
      
      // --- Elements de la page
      $album = new Album_Videos($liste_media, 3);
      $page->contenus[] = $album;
      
      // --- Vue aerienne de la zone de navigation
      /*
      $parcours = new Cadre_Video('media/parcours/Championnat-France-Mer-2018_Informations-pratiques.png');
      $parcours->def_titre("Informations pratiques");
      $page->contenus[] = $parcours;
      
      $parcours = new Cadre_Video('media/parcours/Championnat-France-Mer-2018_Parcours-principal_plan-large.png');
      $page->contenus[] = $parcours;
      
      $parcours = new Cadre_Video('media/parcours/Championnat-France-Mer-2018_parcours-principal_plan-serre.png');
      $page->contenus[] = $parcours;
      
      $parcours = new Cadre_Video('media/parcours/Championnat-France-Mer-2018_repli-est.png');
      $page->contenus[] = $parcours;
      
      $parcours = new Cadre_Video('media/parcours/Championnat-France-Mer-2018_repli-sud.png');
      $page->contenus[] = $parcours;
      */
      $page->initialiser();
      $page->afficher();
      // ======================================================================
    ?>
  </html>
