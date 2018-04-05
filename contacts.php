<!doctype html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web / formulaire prise de contact
      // contexte    : site web du Championnat de France 2018
      // Copyright (c) 2017-2018 AMP. Tous droits reserves
      // -----------------------------------------------------------------------
      // creation : 02-oct-2017 pchevaillier@gmail.com
      // revision : 21-jan-2018 pchevaillier@gmail.com mise en forme
      // revision : 09-fev-2018 pchevaillier@gmail.com lien formulaire benevoles
      // revision : 05-avr-2018 pchevaillier@gmail.com utilisation Contenu_Double_Colonne
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

      // --- Classe définissant la page a afficher
      require_once 'elements/page_france2018.php';
  
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Contacts");
      
      // --- Contenu de la page
      require_once 'generiques/contenu_double_colonne.php';
      require_once 'elements/formulaire_contact.php';
      require_once 'elements/cadre_lien_formulaire_benevole.php';
      require_once 'elements/contacts_presentations.php';

      // Contenu du cadre principal de la page
      $principal = new Conteneur_Elements();
      
      $formulaire = new Formulaire_Contact($page, 'demande_info.php');
      $formulaire->def_titre("Demande d'information");
      $principal->elements[] = $formulaire;
      
      // Contenu du cadre secondaire de la page
      $secondaire = new Conteneur_Elements();
      $secondaire->elements[] = new Vue_Contacts();
      //$secondaire->elements[] = new Cadre_Lien_Formulaire_Benevole();
      
      $page->contenus[] = new Contenu_Double_Colonne($principal,
                                                     $secondaire,
                                                     'col-sm-8',
                                                     'col-sm-4');
      
      $page->initialiser();
      $page->afficher();
      // =======================================================================
    ?>
  </html>
