<!DOCTYPE html>
  <html lang="fr">
    <?php
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $s = new Site("Championnat France 2018");
      $s->initialiser();

      // --- Classe définissant la page a afficher
      require_once 'generiques/cadre_video.php';
      require_once 'generiques/cadre_texte.php';
      
      require_once 'elements/page_france2018.php';
      require_once 'elements/contenu_accueil.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Accueil");
      
      $video_promotion = new Cadre_Video("media/videos/teaser_france2018_12mbs.mp4");
      
      $texte = "<p><img src=\"media/photos/photo_president_co.jpg\" style=\"float:left; height:180px; margin:0px 20px 5px 0px \" />Chers amis rameurs,</p><p style=\"text-align: justify;\" >C’est pour moi un réel plaisir de vous accueillir sur notre nouveau site web, en ma qualité de président du Comité d’Organisation du Championnat de France d'Aviron de Mer 2018.</p><p style=\"text-align: justify;\" >La F.F.A. nous a fait l'honneur et le plaisir de nous confier l'organisation de ce grand évènement de l'Aviron de Mer et nous mettons déjà tout en oeuvre pour que vous passiez un excellent moment sur notre plan d'eau et sur la commune de Plougonvelin.</p><p style=\"text-align: justify;\" >Les adhérents de l'Aviron de Mer de Plougonvelin, les bénévoles proches de l'AMP, l'équipe municipale, les acteurs de la Communauté de Commune du Pays d'Iroise ainsi que nos partenaires locaux, se mobilisent pour que la fête soit une réussite.</p><p style=\"text-align: justify;\" >Notre objectif est de vous voir participer nombreux avec le sourire et que vous profitiez au maximum de l’instant. La mission qui nous a été confiée est importante, mais je sais qu'avec l'aide de tous nos collaborateurs nous atteindrons cet objectif.</p><p style=\"text-align: justify;\" >Rejoignez-nous dès à présent sur les réseaux sociaux pour suivre les évolutions de la préparation de l’évènement.</p><p style=\"text-align: justify;\" >Bon entraînement à toutes et tous, préparez-vous bien et à bientôt sur notre plan d'eau.</p><p>Xavier HERVE</p>";
      $mot_president = new Cadre_Texte($texte);
      $mot_president->def_titre("Mot du président du Comité d'Organisation");
      
      $contenu = new Contenu_Accueil($video_promotion, $mot_president);
      $page->contenus[] = $contenu;
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
