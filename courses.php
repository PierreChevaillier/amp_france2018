<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web le programme des courses
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2017 AMP
      // -----------------------------------------------------------------------
      // creation : 12-nov-2017 pchevaillier@gmail.com
      // revision : 22-nov-2017 pchevaillier@gmail.com cadre / programme journalier
      // revision : 28-nov-2017 pchevaillier@gmail.com infos sur programme
      // -----------------------------------------------------------------------
      // commentaires :
      // attention :
      // a faire :
      // ======================================================================
     
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $s = new Site("Championnat France 2018");
      $s->initialiser();

      require_once 'temps/calendrier.php';
      require_once 'temps/maree.php';
      
      $cal = Calendrier::obtenir();

      // --- Classe définissant la page a afficher
      require_once 'elements/page_france2018.php';
      require_once 'generiques/cadre_texte.php';
      require_once 'elements/Information_jour.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Les Courses");

      // --------------------------------------------------------------------------
      // Entete du programme
      
      /*
      $jour = $cal->aujourdhui();
      $heure = $cal->maintenant();
      
      $t = $cal->date_texte($jour);
      $h = $cal->heures_minutes_texte($heure);
      */
      $texte = "<p class=\"lead\">Il s'agit d'un programme prévisionnel donné à titre indicatif. Le programme de chaque journée est susceptible d'évoluer.</p>";

      $entete = new Cadre_Texte($texte);
      //$entete->def_titre("Programme de la compétition");
      
      $page->contenus[] = $entete;
 
      // --------------------------------------------------------------------------
      // -- Programmme par jour
      
      $jour = $cal->jour(24, 5, 2018); // jeudi
      $marees_jour = new Marees_Jour($jour);
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($jour, 1, 21, 0), 5.5),
                     new Point_Maree('BM', $cal->heure($jour, 7, 42, 0), 2.0));
      $m->def_coefficient(57);
      $marees_jour->ajouter_dans_marees($m);
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($jour, 14, 01, 0), 5.45),
                     new Point_Maree('BM', $cal->heure($jour, 20, 14, 0), 2.10));
      $m->def_coefficient(59);
      $marees_jour->ajouter_dans_marees($m);
      
      $table_marees = new Table_Marees_jour($marees_jour);
      
      $texte = "";
      $programme_detaille = new Cadre_Texte($texte);

      $programme = new Cadre_Programme_Jour($jour, $programme_detaille);
      $programme->def_titre("Accueil - Entrainements");
      
      $ephemeride = new Cadre_Ephemerides($jour, $table_marees);
      
      $info_jour = new Cadre_Information_Jour($jour, $programme, $ephemeride);
      $page->contenus[] = $info_jour;
      
      // ----------------------------------------------------------------------
      $jour = $cal->jour(25, 5, 2018); // vendredi
      $marees_jour = new Marees_Jour($jour);
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($jour, 2, 29, 0), 5.65),
                     new Point_Maree('BM', $cal->heure($jour, 8, 46, 0), 1.85));
      $m->def_coefficient(62);
      $marees_jour->ajouter_dans_marees($m);
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($jour, 15, 02, 0), 5.7),
                     new Point_Maree('BM', $cal->heure($jour, 21, 15, 0), 1.85));
      $m->def_coefficient(53);
      $marees_jour->ajouter_dans_marees($m);
      
      $table_marees = new Table_Marees_jour($marees_jour);
      
      $texte = '<ul class="list-group"><li class="list-group-item">Ouverture officielle de la compétition</li><li class="list-group-item">Briefing</li><li class="list-group-item">Séries qualificatives</li></ul>';
      $programme_detaille = new Cadre_Texte($texte);
      
      $programme = new Cadre_Programme_Jour($jour, $programme_detaille);
      $programme->def_titre("Séries qualificatives");
      
      $ephemeride = new Cadre_Ephemerides($jour, $table_marees);
      
      $info_jour = new Cadre_Information_Jour($jour, $programme, $ephemeride);
      $page->contenus[] = $info_jour;
      
      
      // ----------------------------------------------------------------------
      $jour = $cal->jour(26, 5, 2018); // samedi
      $marees_jour = new Marees_Jour($jour);
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($jour, 3, 26, 0), 5.85),
                     new Point_Maree('BM', $cal->heure($jour, 9, 41, 0), 1.65));
      $m->def_coefficient(70);
      $marees_jour->ajouter_dans_marees($m);
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($jour, 15, 54, 0), 5.90),
                     new Point_Maree('BM', $cal->heure($jour, 22, 07, 0), 1.65));
      $m->def_coefficient(73);
      $marees_jour->ajouter_dans_marees($m);
      
      $table_marees = new Table_Marees_jour($marees_jour);
      
      $texte = '<ul class="list-group"><li class="list-group-item">Finales</li><li class="list-group-item">Remise des prix et cérémonie de clôture</li><li class="list-group-item">Pot de l’amitié</li><li class="list-group-item">Repas de clôture</li></ul>';
      
      $programme_detaille = new Cadre_Texte($texte);
      
      $programme = new Cadre_Programme_Jour($jour, $programme_detaille);
      $programme->def_titre("Finales");
      
      $ephemeride = new Cadre_Ephemerides($jour, $table_marees);
      
      $info_jour = new Cadre_Information_Jour($jour, $programme, $ephemeride);
      $page->contenus[] = $info_jour;
      
      
      // ----------------------------------------------------------------------
      $jour = $cal->jour(27, 5, 2018); // dimanche
      $marees_jour = new Marees_Jour($jour);
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($jour, 4, 15, 0), 6.0),
                     new Point_Maree('BM', $cal->heure($jour, 10, 29, 0), 1.5));
      $m->def_coefficient(77);
      $marees_jour->ajouter_dans_marees($m);
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($jour, 16, 39, 0), 6.1),
                     new Point_Maree('BM', $cal->heure($jour, 22, 53, 0), 1.45));
      $m->def_coefficient(79);
      $marees_jour->ajouter_dans_marees($m);
      
      $table_marees = new Table_Marees_jour($marees_jour);
      
      $texte = '<p>En cas de report dû à la météo, les finales auront lieu le dimanche matin</p><ul class="list-group"><li class="list-group-item">Course Open Longue Distance</li><li class="list-group-item">Parcours Aviron santé</li><li class="list-group-item">Pot de l’amitié</li></ul>';
      $programme_detaille = new Cadre_Texte($texte);
      
      $programme = new Cadre_Programme_Jour($jour, $programme_detaille);
      $programme->def_titre("Course longue distance");
      
      $ephemeride = new Cadre_Ephemerides($jour, $table_marees);
      
      $info_jour = new Cadre_Information_Jour($jour, $programme, $ephemeride);
      $page->contenus[] = $info_jour;
      
      $page->initialiser();
      $page->afficher();
      // ======================================================================
    ?>
  </html>
