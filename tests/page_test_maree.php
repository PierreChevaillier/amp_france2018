<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web pour les tests (modele)
      //               test de la connexion a la base de donnees
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2017-2018 AMP
      // -----------------------------------------------------------------------
      // creation : 04-jan-2018 pchevaillier@gmail.com
      // revision :
      // -----------------------------------------------------------------------
      // commentaires :
      // attention :
      // a faire :
      // =======================================================================
      
      set_include_path("./../");
      
      // --- Connexion a la base de donnees
      require_once 'prive/connexion_bdd.php';
      
      $bdd = Base_donnees::accede();

      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $s = new Site("AMP");
      $s->initialiser();
      
      // --- Classe définissant la page a afficher
      require_once 'tests/page_test.php';
      
      // --- Autres classes
      require_once 'temps/maree.php';
      require_once 'tests/test_maree.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_Test("Test marées");

      $page->contenus[] = new Vue_Test_Maree("Ceci est un test");
      
      $page->initialiser();
      $page->afficher();
      
      // ======================================================================
    ?>
  </html>
