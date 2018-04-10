<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web - informations sur la restauration
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves
      // -----------------------------------------------------------------------
      // creation : 19-jan-2018 pchevaillier@gmail.com
      // revision : 10-avr-2018 pchevaillier@gmail.com menu - debut
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
      
      
      // Menu du repas des equipages
      $menu = "<div style=\"text-align:center;\"><p>REPAS DES EQUIPAGES</p><p>Amis rameurs et accompagnateurs du monde de l’aviron de mer, nous vous proposons de partager autour d’un repas convivial, une sélection de produits bretons aux saveurs authentiques, entre terre et mer.</p><p>Entrée</p><p>Assiette de langoustines et/ou crevettes selon arrivage</p><p></p><p>Plat</p><p>Cochon grillé à la broche<br />Légumes du terroir</p></p><p></p><p>Dessert</p><p>Composition de pâtisseries bretonnes<br />Fraises de saison</p><p></p><p>Boissons</p>Eau plate<br />Vin rouge – vin blanc – vin rosé<br />Café ou thé</p></div>";
      $element = new Cadre_Texte($menu);
      $element->def_titre("Menu des équipages du samedi 26 mai");
      $page->contenus[] = $element;
      
      $page->initialiser();
      $page->afficher();
      // ======================================================================
    ?>
  </html>
