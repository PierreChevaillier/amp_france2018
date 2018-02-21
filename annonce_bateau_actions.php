<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web pour affichage actions possibles sur annonce
      // contexte    : Site web du championnat de France 2018 - page simple
      // Copyright (c) 2017-2018 AMP
      // -----------------------------------------------------------------------
      // creation : 17-fev-2018 pchevaillier@gmail.com
      // revision :
      // -----------------------------------------------------------------------
      // commentaires :
      // attention :
      // a faire :
      // =======================================================================
      
      set_include_path("./");
      
      // --- Connexion a la base de donnees
      require_once 'prive/connexion_bdd.php';
      
      $bdd = Base_donnees::accede();

      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $site = new Site("Championnat France 2018");
      $site->initialiser();
      
      // --- Classe definissant la page a afficher
      require_once 'elements/page_france2018.php';
      
      // --- Classes des contenus de la page
      require_once 'elements/annonce_bateau.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Modification d'une petite annonce");

      $identifiant_annonce = $_GET['id'];
      $contenu = new Controle_Actions_Annonce($identifiant_annonce);
      $contenu->def_titre("Modification de mon annonce");
      $page->contenus[] = $contenu;

      $page->initialiser();
      $page->afficher();
      
      // ======================================================================
    ?>
  </html>
