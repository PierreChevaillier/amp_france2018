<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web donnant le programme des courses
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves.
      // -----------------------------------------------------------------------
      // creation : 12-nov-2017 pchevaillier@gmail.com
      // revision : 22-nov-2017 pchevaillier@gmail.com cadre programme journalier
      // revision : 28-nov-2017 pchevaillier@gmail.com infos sur le programme
      // revision : 05-jan-2018 pchevaillier@gmail.com path, nvelle version marees
      // revision : 20-mar-2018 pchevaillier@gmail.com lien -> horaires courses
      // revision : 23-avr-2018 pchevaillier@gmail.com lien -> repas equipage
      // -----------------------------------------------------------------------
      // commentaires :
      // - en construction : toutes les informations ne sont pas connues
      // attention :
      // a faire :
      // =======================================================================
     
      set_include_path('./');
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $s = new Site("Championnat France 2018");
      $s->initialiser();

      // --- Le temps des marins
      require_once 'temps/calendrier.php';
      require_once 'temps/maree.php';
      
      $cal = Calendrier::obtenir();

      // --- Classe definissant les elements a afficher
      require_once 'elements/page_france2018.php';
      require_once 'generiques/cadre_texte.php';
      require_once 'elements/information_jour.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Programme des courses");

      // Lien vers le fichier des horaires des courses
      $source = '<div class="page-header"><h1>Programme des courses</h1><ul class="pager"><li><a class="bouton-lien" href="media/documents/f18_horaires-courses-previsionnels.pdf" target="_new">Horaires prévisionnels des courses</a></li></ul></div>';
      
      $page->contenus[] = new Cadre_Texte($source);
      // -----------------------------------------------------------------------
      // Entete du programme
      
      $texte = "\n<div class=\"panel panel-warning\" style=\"margin: 10px;\"><div class=\"panel-heading\" style=\"padding: 10px;\">Attention </div><div class=\"panel-body\"><p class=\"lead\">Il s'agit d'un programme prévisionnel donné à titre indicatif. Le programme de chaque journée est susceptible d'évoluer.</p></div></div>\n";

      
      $entete = new Cadre_Texte($texte);
      //$entete->def_titre("Programme de la compétition");
      
      $page->contenus[] = $entete;

      $lieu = '1'; // Trez Hir (pour les marees)

      // --------------------------------------------------------------------------
      // -- Programmme par jour
      
      $jour = $cal->jour(24, 5, 2018); // jeudi
      
      $marees_jour = Enregistrement_Maree::recherche_marees_jour($lieu, $jour);
      /*
      $marees_jour = new Marees_Jour($lieu, $jour);
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($jour, 1, 21, 0), 5.5),
                     new Point_Maree('BM', $cal->heure($jour, 7, 42, 0), 2.0));
      $m->def_coefficient(57);
      $marees_jour->ajouter_dans_marees($m);
      
      $m = new Maree(new Point_Maree('PM', $cal->heure($jour, 14, 01, 0), 5.45),
                     new Point_Maree('BM', $cal->heure($jour, 20, 14, 0), 2.10));
      $m->def_coefficient(59);
      $marees_jour->ajouter_dans_marees($m);
      */
      $table_marees = new Table_Marees_jour($marees_jour);
      $ephemeride = new Cadre_Ephemerides($jour, $table_marees);
      
      $texte = "";
      $programme_detaille = new Cadre_Texte($texte);

      $programme = new Cadre_Programme_Jour($jour, $programme_detaille);
      $programme->def_titre("Accueil - Entrainements");
      
      $info_jour = new Cadre_Information_Jour($jour, $programme, $ephemeride);
      $page->contenus[] = $info_jour;
      
      // ----------------------------------------------------------------------
      $jour = $cal->jour(25, 5, 2018); // vendredi
      
      $marees_jour = Enregistrement_Maree::recherche_marees_jour($lieu, $jour);
      $table_marees = new Table_Marees_jour($marees_jour);
      $ephemeride = new Cadre_Ephemerides($jour, $table_marees);
      
      $texte = '<ul class="list-group"><li class="list-group-item">Ouverture officielle de la compétition</li><li class="list-group-item">Briefing</li><li class="list-group-item">Séries qualificatives</li></ul>';
      $programme_detaille = new Cadre_Texte($texte);
      
      $programme = new Cadre_Programme_Jour($jour, $programme_detaille);
      $programme->def_titre("Séries qualificatives");
      
      $info_jour = new Cadre_Information_Jour($jour, $programme, $ephemeride);
      $page->contenus[] = $info_jour;
      
      // ----------------------------------------------------------------------
      $jour = $cal->jour(26, 5, 2018); // samedi
      
      $marees_jour = Enregistrement_Maree::recherche_marees_jour($lieu, $jour);
      $table_marees = new Table_Marees_jour($marees_jour);
      $ephemeride = new Cadre_Ephemerides($jour, $table_marees);
      
      $texte = '<ul class="list-group"><li class="list-group-item">Finales</li><li class="list-group-item">Remise des prix et cérémonie de clôture</li><li class="list-group-item">Pot de l’amitié</li><li class="list-group-item">Soirée : repas des équipages. Voir le <a href="repas_cloture.php">menu et réserver</a></li></ul>';
      
      $programme_detaille = new Cadre_Texte($texte);
      
      $programme = new Cadre_Programme_Jour($jour, $programme_detaille);
      $programme->def_titre("Finales");
    
      $info_jour = new Cadre_Information_Jour($jour, $programme, $ephemeride);
      $page->contenus[] = $info_jour;
      
      // -----------------------------------------------------------------------
      $jour = $cal->jour(27, 5, 2018); // dimanche
      
      $marees_jour = Enregistrement_Maree::recherche_marees_jour($lieu, $jour);
      $table_marees = new Table_Marees_jour($marees_jour);
      $ephemeride = new Cadre_Ephemerides($jour, $table_marees);
      
      $texte = '<div class="alert alert-warning" role="alert">En cas de report dû à la météo, les finales auront lieu le dimanche matin</div><ul class="list-group"><li class="list-group-item">Course Open Longue Distance</li><li class="list-group-item">Parcours Aviron santé</li><li class="list-group-item">Pot de l’amitié</li></ul>';
      $programme_detaille = new Cadre_Texte($texte);
      
      $programme = new Cadre_Programme_Jour($jour, $programme_detaille);
      $programme->def_titre("Course longue distance");
      
      $info_jour = new Cadre_Information_Jour($jour, $programme, $ephemeride);
      $page->contenus[] = $info_jour;
      
      $page->initialiser();
      $page->afficher();
      // =======================================================================
    ?>
  </html>
