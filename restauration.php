<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web - informations sur la restauration
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves
      // -----------------------------------------------------------------------
      // creation : 19-jan-2018 pchevaillier@gmail.com
      // revision :
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

      // --- Classe définissant la page a afficher
      require_once 'elements/page_france2018.php';
 
      // --- Classes des elements affiches dans la page
      require_once 'generiques/cadre_texte.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Restauration");
      $contenu = "<p>Les jours de courses, des plateaux repas seront proposés aux compétiteurs et aux accompagnants. De plus, un stand resturation sera installé sur la plage à partir de 14 heures le jeudi 24.</p>";
      
      $element = new Cadre_Texte($contenu);
      $element->def_titre("Restauration");
      $page->contenus[] = $element;
      
      $page->initialiser();
      $page->afficher();
      // ======================================================================
    ?>
  </html>
