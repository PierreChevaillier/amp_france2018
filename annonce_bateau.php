<!doctype html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web / formualire prise de contact
      // contexte    : site web du Championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves
      // -----------------------------------------------------------------------
      // creation : 02-oct-2017 pchevaillier@gmail.com
      // revision : 21-jan-2018 pchevaillier@gmail.com mise en forme
      // revision : 06-fev-2018 pchevaillier@gmail.com renommer en annonce_bateau
      // revision : 18-fev-2018 pchevaillier@gmail.com ajout et modification
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
      
      // --- Contenu de la page
      require_once 'generiques/contenu_double_colonne.php';
      require_once 'elements/annonce_bateau.php';
      require_once 'elements/cadre_lien_formulaire_benevole.php';
      require_once 'elements/contacts_presentations.php';

      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Bourse aux bateaux");
      
      // Contenu du cadre principal de la page
      $principal = new Conteneur_Elements();
 
      $action = $_GET['a'];
      
      $formulaire = new Formulaire_Annonce_bateau($page, 'annonce_bateau_enreg.php', $action);
      $formulaire->def_titre("Petite annonce prêt - location bateaux");
      if ($action == 'a') {
        $valeurs_defaut = array('typ' => 'dde', 'civ' => 'H');
        $formulaire->definir_valeur_champs($valeurs_defaut);
      } elseif($action == 'm')  {
        $identifiant_annonce = $_GET['id'];
        // recherche annonce dans base de donnees
        $annonce = new annonce_Bateau();
        $annonce->def_cle_access($identifiant_annonce);
        $table = new Enregistrement_Annonce_Bateau();
        $table->def_type_id('cle_access');
        $table->def_annonce($annonce);
        $table->rechercher_annonce();
        
        // remplit le formulaire
        $formulaire->initialiser_champs($annonce);
        $formulaire->def_id_objet($identifiant_annonce);
      } else {
        die("annonce_bateau : action inconnue : " . $action);
      }
      $principal->elements[] = $formulaire;
      
      // Contenu du cadre secondaire de la page
      $secondaire = new Conteneur_Elements();
      $secondaire ->elements[] = new Vue_Contacts();
      $secondaire ->elements[] = new Cadre_Lien_Formulaire_Benevole();
      
      $page->contenus[] = new Contenu_Double_Colonne($principal,
                                                     $secondaire,
                                                     'col-sm-8',
                                                     'col-sm-4');
      
      $page->initialiser();
      $page->afficher();

	?>
</html>
