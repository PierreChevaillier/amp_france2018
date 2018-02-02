<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web donnant acces au reglement des regates de la FFA
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

      // --- Classe definissant la page a afficher
      require_once 'elements/page_france2018.php';
     
      // --- Classes des elements affiches dans la page
      require_once 'generiques/cadre_texte.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Réglement");
      $contenu = "<div class=\"page-header\" padding=\><h1>Réglement des compétitions</h1><ul class=\"pager\"><li><a class=\"bouton-lien\" href=\"http://avironfrance.fr/medias/downloads/ffaviron-annexe-7-2-reglement-interieur-ffa-code-regates-mer_874544823.pdf\" target=\"_new\">Accèder au code des régates en mer de la FFA</a></li><li><a class=\"bouton-lien\" href=\"media/documents/Reglementation-sportive-2018-20171205123912.pdf\">Réglementation sportive du Championnat de France 2018</ul></div>";
      
      $page->contenus[] = new Cadre_Texte($contenu);
      
      $page->initialiser();
      $page->afficher();
      // ======================================================================
    ?>
  </html>
