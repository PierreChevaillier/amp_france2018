<!doctype html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web - affichage du parcours de repli Est
      // contexte    : site web du Championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves
      // -----------------------------------------------------------------------
      // creation : 10-fev-2017 pchevaillier@gmail.com
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

      // --- Le temps des marins
      require_once 'temps/calendrier.php';
      require_once 'temps/maree.php';
      
      $cal = Calendrier::obtenir();
      $lieu = '1'; // Trez Hir (pour les marees)
      
      // --- Classe définissant la page a afficher
      require_once 'elements/page_france2018.php';
  
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("parcours de repli - Est");
      
      // --- Contenu de la page
      require_once 'generiques/contenu_double_colonne.php';
      require_once 'generiques/cadre_image.php';
      require_once 'elements/contacts_presentations.php';
      require_once 'elements/information_jour.php';
  
      // Contenu du cadre principal de la page
      $principal = new Conteneur_Elements();
      
      $media = new Cadre_Image("media/parcours/Championnat-France-Mer-2018_repli-est.png");
      $media->def_titre("Parcours de repli Est");
      $principal->elements[] = $media;
      
      // Contenu du cadre secondaire de la page
      $secondaire = new Conteneur_Elements();
      //$secondaire ->elements[] = new Vue_Contacts();
      
      // ----------------------------------------------------------------------
      // Informations sur les marees
      for ($j = 25; $j <= 26; $j++) {
        $jour = $cal->jour($j, 5, 2018);
        $marees_jour = Enregistrement_Maree::recherche_marees_jour($lieu, $jour);
        $table_marees = new Table_Marees_jour($marees_jour);
        $cadre_jour = new Cadre_Ephemerides($jour, $table_marees);
        $cadre_jour->def_titre($cal->date_texte($jour));
        $secondaire->elements[] = $cadre_jour;
      }
      
      // ----------------------------------------------------------------------
      $page->contenus[] = new Contenu_Double_Colonne($principal,
                                                     $secondaire,
                                                     'col-sm-8',
                                                     'col-sm-4');
      
      $page->initialiser();
      $page->afficher();
      // =======================================================================
    ?>
  </html>
