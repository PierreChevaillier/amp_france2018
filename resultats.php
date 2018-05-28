<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web affichant les resultats des courses
      // contexte    : Site web du Championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves.
      // -----------------------------------------------------------------------
      // creation : 25-mai-2018 pchevaillier@gmail.com
      // revision : 26-mai-2018 pchevaillier@gmail.com informations en direct
      // -----------------------------------------------------------------------
      // commentaires :
      // attention :
      // a faire :
      // lien vers la page resultat de la FFA.
      // =======================================================================
      
      set_include_path('./');
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      require_once 'generiques/cadre_texte.php';
      
      $s = new Site("Championnat France 2018");
      $s->initialiser();
      
      // --- Classe définissant la page a afficher
      require_once 'elements/page_france2018.php';
      require_once 'elements/contenu_hebergements.php';
      
      // --- Creation dynamique de la page et affichage
      // http://resultats.ffaviron.fr/Resultats-tout.php?Regate=2018007&Epreuves=tout
      
      $page = new Page_France2018("Résultats");
      
      $texte = '<div class="page-header"><h1>Résultats des courses</h1><ul class="pager"><li><a class="bouton-lien" href="http://resultats.ffaviron.fr/Resultats-tout.php?Regate=2018007&Epreuves=tout" target="_new">Résultats officiels</a></li></ul></div>';
      
      $texte = $texte . "<h2>Résultats des Séries - vendredi 25 mai</h2><ul class=\"list-group\"><li class=\"list-group-item\"><a href=\"media/resultats/SH2x_serie-1_page1.pdf\">SH2X Série 1 - page 1</a> et <a href=\"media/resultats/SH2x_serie-1_page2.pdf\">SH2x Série 1 - page 2</a></li><li class=\"list-group-item\"><a href=\"media/resultats/SH1x_serie-1.pdf\">SH1x Série 1</a></li><li class=\"list-group-item\"><a href=\"media/resultats/SH1x_serie-2.pdf\">SH1x Série 2</a></li><li class=\"list-group-item\"><a href=\"media/resultats/SH4x+_serie-1.pdf\">SH4x+ Série 1</a></li><li class=\"list-group-item\"><a href=\"media/resultats/SH4x+_serie-2.pdf\">SH4x+ Série 2</a></li></ul><h2>Résultats des Courses Open - vendredi 25 mai</h2><ul class=\"list-group\"><li class=\"list-group-item\"><a href=\"media/resultats/J18F4x+_serie-open.pdf\">J18F4x+</a></li><li class=\"list-group-item\"><a href=\"media/resultats/SF1x_serie-open.pdf\">SF1x</a></li><li class=\"list-group-item\"><a href=\"media/resultats/J18M4x+_serie-open.pdf\">J18M4x+</a></li><li class=\"list-group-item\"><a href=\"media/resultats/SF2x_serie-open.pdf\">SF2x</a></li><li class=\"list-group-item\"><a href=\"media/resultats/J18H4x+_serie-open.pdf\">J18H4x+</a></li><li class=\"list-group-item\"><a href=\"media/resultats/J18M4x+_serie-open.pdf\">J18M4x+</a></li><li class=\"list-group-item\"><a href=\"media/resultats/SF4+_serie-open.pdf\">SF4+</a><li class=\"list-group-item\"><a href=\"media/resultats/J18M4x+_serie-open.pdf\">J18M4x+</a></li><li class=\"list-group-item\"><a href=\"media/resultats/SF4x+_serie-open.pdf\">SF4x+</a></li></ul>";
      $texte = $texte . "<h2>Résultats des Finales - samedi 26 mai</h2><ul class=\"list-group\"><li class=\"list-group-item\"><a href=\"media/resultats/SH4x+_finale-b.pdf\">SH4X+ Finale B</a> - 4 avec barreur en couple sénior Homme</li><li class=\"list-group-item\"><a href=\"media/resultats/SH2x_finale-b.pdf\">SH2x Finale B</a> - Double sénior Homme</li><li class=\"list-group-item\"><a href=\"media/resultats/SH1x_finale-b.pdf\">SH1x Finale B</a> - Solo sénior Homme</li><li class=\"list-group-item\"><a href=\"media/resultats/J18M4x+_finale.pdf\">J18M4x+ Finale A</a> - 4 avec barreur en couple junior Mixte</li><li class=\"list-group-item\"><a href=\"media/resultats/J18H4x+_finale.pdf\">J18H4x+ Finale A</a> - 4 avec barreur en couple junior Homme</li><li class=\"list-group-item\"><a href=\"media/resultats/J18F4x+_finale.pdf\">J18F4x+ Finale A</a> - 4 avec barreur en couple junior Femme</li><li class=\"list-group-item\"><a href=\"media/resultats/SF4+_finale.pdf\">SF4+ Finale A</a> - 4 avec barreur en pointe sénior Femme</li><li class=\"list-group-item\"><a href=\"media/resultats/SF1x_finale.pdf\">SF1x Finale A</a> - solo sénior Femme</li><li class=\"list-group-item\"><a href=\"media/resultats/SF2x_finale.pdf\">SF2x Finale A</a> - double sénior Femme</li><li class=\"list-group-item\"><a href=\"media/resultats/SF4x+_finale.pdf\">SF4x+ Finale A</a> - Quatre avec barreur en couple sénior Femme</li><li class=\"list-group-item\"><a href=\"media/resultats/SH4+_finale.pdf\">SH4+ Finale A</a> - Quatre avec barreur en pointe sénior Homme</li><li class=\"list-group-item\"><a href=\"media/resultats/SH1x_finale.pdf\">SH1x Finale A</a> - Solo sénior Homme</li><li class=\"list-group-item\"><a href=\"media/resultats/SH2x_finale.pdf\">SH2x Finale A</a> - Double sénior Homme</li><li class=\"list-group-item\"><a href=\"media/resultats/SH4x+_finale_page-1.pdf\">SH4x Finale A - page 1</a> et <a href=\"media/resultats/SH4x+_finale_page-2.pdf\">page 2</a>- Quatre avec barreur en couple sénior Homme</li></ul>";
      $infos = new Cadre_Texte($texte);
      //$infos->def_titre("Résultats des courses");
      $page->contenus[] = $infos;
      
      $page->initialiser();
      $page->afficher();
      // ======================================================================
    ?>
  </html>
