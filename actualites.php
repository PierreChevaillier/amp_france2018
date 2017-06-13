<!DOCTYPE html>
  <html lang="fr">
    <?php
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $s = new Site("Championnat France 2018");
      $s->initialiser();

      // --- Classe définissant la page a afficher
      require_once 'elements/page_france2018.php';

      // --- Autres classes
      require_once 'generiques/actualite.php';
      require_once 'generiques/journal_actualites.php';
      require_once 'elements/contenu_actualites.php';
      require_once 'elements/contacts_presentations.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Actualites");
      
      $comm = new Categorie("Communication");
      
      $journal = new Journal_Actualites("media/photos");
      $page->contenus[] = new Contenu_Actualites($journal, new Vue_Contacts());
      
      // --- les actualites
      $actu = new Actualite("Lancement du site web");
      $actu->categorie = $comm;
      $actu->date = "13 juin 2017";
      $actu->nom_fichier_vignette = "vignette_site_fr2018.png";
      $actu->contenu = "L'AMP est fier de lancer le site web de l'Edition 2018 du Championnat de France d'aviron de mer. Ce n'est qu'un début... Rendez-nous visite régulièrement pour d'autres nouvelles.";
      $journal->actualites[] = $actu;
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
