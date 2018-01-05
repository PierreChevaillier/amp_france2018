<!DOCTYPE html>
  <html lang="fr">
    <?php
      
      set_include_path('./');
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $s = new Site("Championnat France 2018");
      $s->initialiser();

      // --- Classe définissant la page a afficher
      require_once 'elements/page_france2018.php';
      require_once 'elements/contenu_hebergements.php';

      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Hébergement");
      $hebergements = new Contenu_Hebergements();
      $hebergements->def_titre("Quelques solutions d'hebergement alentour");
      $page->contenus[] = $hebergements;
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
