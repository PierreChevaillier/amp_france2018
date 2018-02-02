<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web affichant le parcours des courses
      // contexte    : Site web du Championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves
      // -----------------------------------------------------------------------
      // creation : 19-jan-2018 pchevaillier@gmail.com
      // revision :
      // -----------------------------------------------------------------------
      // commentaires :
      //  - en attendant que le parcours soit officiel et diffusable
      // attention :
      // a faire :
      //   - mettre la bonne version du parcours
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
    
      // Entete mentionnant que le parcours n'est pas encore connu
      $texte = "\n<div class=\"page-header\"><h1>Parcours des courses</h1><div class=\"panel panel-warning\" style=\"margin: 10px;\"><div class=\"panel-heading\" style=\"padding: 10px;\"><p class=\"lead\">Information non encore disponible.</p></div><div class=\"panel-body\"><p>Les courses se déroulerons dans la baie du Trez-Hir, approximativement dans le zone ci-dessous.</p></div></div></div>\n";
      
      $entete = new Cadre_Texte($texte);
      //$entete->def_titre("Programme de la compétition");
      $page->contenus[] = $entete;
      
      // --- Vue aerienne de la zone de navigation
      $page->contenus[] = new Cadre_Video('media/photos/baie-Trez-Hir_lr.jpg');
      
      $page->initialiser();
      $page->afficher();
      // ======================================================================
    ?>
  </html>
