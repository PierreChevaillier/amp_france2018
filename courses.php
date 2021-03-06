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
      // revision : 25-avr-2018 pchevaillier@gmail.com programme dimanche
      // revision : 27-avr-2018 pchevaillier@gmail.com ajout dates importantes
      // revision : 17-mai-2018 pchevaillier@gmail.com lien -> liste engages
      // revision : 17-mai-2018 pchevaillier@gmail.com lien -> horaires departs
      // revision : 26-mai-2018 pchevaillier@gmail.com informations en direct
      // revision : 27-mai-2018 pchevaillier@gmail.com informations dimanche matin
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
      $source = '<div class="page-header"><h1>Programme des courses</h1><ul class="pager"><li><a class="bouton-lien" href="media/documents/programme_officiel.pdf" target="_new">Télécharger le programme officiel</a></li><li><a class="bouton-lien" href="http://ffaviron.fr/articles/engagements-championnats-de-france-d-aviron-de-mer-2018">Liste des engagés</a></li></ul></div>';
      
      $page->contenus[] = new Cadre_Texte($source);
      // -----------------------------------------------------------------------
      // Entete du programme
      
      $texte = "\n<div class=\"panel\" style=\"margin: 10px;\"><div class=\"panel-heading\" style=\"padding: 10px;\"><h2>Dates importantes</h2></div><div class=\"panel-body\"><ul><li><s>Ouverture des inscriptions sur l'Internet fédéral : lundi 30 avril à 8h00</s></li><li>Clôture des inscriptions : mardi 15 mai à 14h00</li><li><a href=\"http://ffaviron.fr/articles/engagements-championnats-de-france-d-aviron-de-mer-2018\">Consultation des inscriptions sur avironfrance.fr</a> : mardi 15 mai 17h00.</li><li><a href=\"http://ffaviron.fr/medias/downloads/ffaviron-programme-championnat-de-france-mer-2018--20180517213514.pdf\">Consultation de l'ordre des départs sur avironfrance.fr</a> : à partir du jeudi 17 mai 17h00</li></ul></div></div>\n";

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
      
      $texte = "<ul class=\"list-group\"><li class=\"list-group-item\">Ouverture du bureau d'accueil de 9h00 à 19h00</li><li class=\"list-group-item\">Ouverture du plan d'eau de 14h00 à 19h00</li></ul>";
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
      
      // <span class=\"label label-info\">Nouveau</span>
      
      $texte = "<ul class=\"list-group\"><li class=\"list-group-item\">Ouverture officielle de la compétition</li><li class=\"list-group-item\">Réunion d'information obligatoire à l'Espace Kéraudy (12 rue du stade, 29217 Plougonvelin) : 10 heures. Réservée aux chefs de bord et aux délégués de club</li><li class=\"list-group-item\"><strong>Séries qualificatives</strong></li><ul class=\"list-group\"><li class=\"list-group-item\">13h00 : SH2X / Double Homme Série 1</li><li class=\"list-group-item\">13h15 : SH2X / Double Homme Série 2</li><li class=\"list-group-item\">13h30 : SH1X / Solo Homme - Série 1</li><li class=\"list-group-item\">13h45 : SH1X / Solo Homme - Série 2</li><li class=\"list-group-item\">14h05 : SH4X / Quatre de couple avec barreur Homme - Série 1</li><li class=\"list-group-item\">14h20 : SH4X / Quatre de couple avec barreur Homme - Série 2</li></ul><li class=\"list-group-item\"><strong>courses open</strong></li></ul>";
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
      // <span class="label label-info">Direct</span>
      $texte = '<ul class="list-group"><li class="list-group-item"> <strong>Finales</strong></li><ul class="list-group"><li class="list-group-item">09h00 : SH4x+ Finale B - 18 bateaux<br />Quatre avec barreur en couple sénior homme</li><li class="list-group-item">09h20 : SH2X Finale B - 13 bateaux<br />Double sénior Homme</li><li class="list-group-item">09h40 : SH1X Finale B - 11 bateaux<br />Solo sénior Homme</li><li class="list-group-item">10h20 : J18M4X+ Finale A - 4 bateaux<br />4 avec barreur en couple junior Mixte</li><li class="list-group-item">11h40 : J18H4X+ Finale A - 8 bateaux<br />4 avec barreur en couple junior Homme</li><li class="list-group-item">14h00 : 18F4X+ Finale A - 7 bateaux<br />4 avec barreur en couple junior Femme</li><li class="list-group-item">14h20 : SF4+ Finale A - 2 bateaux<br />4 avec barreur en pointe sénior Femme</li><li class="list-group-item">14h40 : SF1X Finale A - 15 bateaux<br />Solo sénior Femme</li><li class="list-group-item">15h00 : SF2X Finale A - 15 bateaux<br />Double sénior Femme</li><li class="list-group-item">15h20 : SF4X+ Finale A - 19 bateaux<br />4 avec barreur en couple sénior Femme</li><li class="list-group-item">15h40 : SH4+ Finale A - 3 bateaux<br />4 avec barreur en pointe sénior Homme</li><li class="list-group-item">16h00 : SH1X Finale A - 20 bateaux<br />solo sénior Homme</li><li class="list-group-item">16h20 : SH2X Finale A - 15 bateaux<br />Double sénior Homme</li><li class="list-group-item">16h40 : SH4X+ Finale A - 24 bateaux <br />Quatre avec barreur en couple sénior Homme</li></ul><li class="list-group-item"><strong>Remise des prix</strong> et cérémonie de clôture</li><li class="list-group-item">Pot de l’amitié</li><li class="list-group-item"><strong>Soirée</strong> : repas des équipages. Voir le <a href="repas_cloture.php">menu</a></li></ul>';
      
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
      
      //$texte = '<div class="alert alert-warning" role="alert">En cas de report dû à la météo, les finales auront lieu le dimanche matin</div><ul class="list-group"><li class="list-group-item"><strong>Course Open Longue Distance</strong><br />Modifiable selon les conditions météorologiques<br />Réunion information sous le chapiteau plage à 9h30 <br />Départ de la régate à 10h30</li><li class="list-group-item">Parcours Aviron santé</li><li class="list-group-item">Pot de l’amitié après la course longue distance</li></ul>';
      $texte = '<ul class="list-group"><li class="list-group-item"><strong>Course Open Longue Distance</strong><br />Réunion information sous le chapiteau plage à 9h30 <br />Départ de la régate à 10h30</li><li class="list-group-item">Parcours Aviron santé</li><li class="list-group-item"><strong>Pot de l’amitié</strong> après la course longue distance sur la plage du Trez-Hir.</li></ul>';
      
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
