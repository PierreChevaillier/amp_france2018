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
    
      // Entete mentionnant que le parcours n'est pas encore connu
      $texte = "<p></p>";
      //$texte = "\n<div class=\"page-header\"><h1>Parcours des courses</h1><div class=\"panel panel-warning\" style=\"margin: 10px;\"><div class=\"panel-heading\" style=\"padding: 10px;\"><p class=\"lead\">Information non encore disponible.</p></div><div class=\"panel-body\"><p>Les courses se déroulerons dans la baie du Trez-Hir, approximativement dans le zone ci-dessous.</p></div></div></div>\n";
      
      $entete = new Cadre_Texte($texte);
      $entete->def_titre("Parcours des courses");
      $page->contenus[] = $entete;
      
      // --- Vue aerienne de la zone de navigation
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
      
      $page->initialiser();
      $page->afficher();
      // ======================================================================
    ?>
  </html>
