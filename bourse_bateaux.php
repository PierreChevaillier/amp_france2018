<!DOCTYPE html>
  <html lang="fr">
    <?php
      // ======================================================================
      // description : page web presentant les petites annonces de pret/location
      //               de materiel
      // contexte    : Site web du championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves.
      // ----------------------------------------------------------------------
      // creation : 06-fev-2018 pchevaillier@gmail.com
      // creation : 21-mar-2018 pchevaillier@gmail.com message avertissement.
      // revision : 05-avr-2018 pchevaillier@gmail.com utilisation Contenu_Double_Colonne
      // ----------------------------------------------------------------------
      // commentaires :
      // attention :
      // a faire :
      // ======================================================================
      
      set_include_path('./');
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $site = new Site("Championnat France 2018");
      $site->initialiser();

      // --- Classe definissant la page a afficher
      require_once 'elements/page_france2018.php';

      // --- Autres classes
      require_once 'generiques/cadre_texte.php';
      require_once 'generiques/contenu_double_colonne.php';
      
      require_once 'elements/journal_annonces_bateau.php';
      require_once 'elements/contacts_presentations.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Bourse aux bateaux");
      
      // Contenu du cadre principal de la page
      $principal = new Conteneur_Elements();
      
      $acces_formulaire = "<div class=\"page-header\"><h1>Bourses aux bateaux</h1><ul class=\"pager\"><li><a class=\"bouton-lien\" href=\"annonce_bateau.php?a=a\">Publier une nouvelle annonce</a></li></ul></div>";
      
      $principal->elements[] = new Cadre_Texte($acces_formulaire);

      $texte_intro = "<p>Cette page a pour but de faciliter la mise en relation des équipages en recherche de bateaux avec les clubs ou fabricants qui pourraient en proposer. L'AMP décline toute responsabilité sur les accords qui pourraient être conclus ou non.</p>";
      
      $principal->elements[] = new Cadre_Texte($texte_intro);

      $journal = new Journal_Annonces_Bateau($site);
      $journal->def_titre("Petites annonces prêts-location de bateaux");
      $principal->elements[] = $journal;
      
       // Contenu du cadre secondaire de la page
      $secondaire = new Conteneur_Elements();
      $secondaire->elements[] = new Vue_Contacts();

      $page->contenus[] = new Contenu_Double_Colonne($principal,
                                                     $secondaire,
                                                     'col-sm-8',
                                                     'col-sm-4');
      
      $page->initialiser();
      $page->afficher();
      
      // ======================================================================
    ?>
  </html>
