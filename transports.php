<!DOCTYPE html>
  <html lang="fr">
    <?php
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $s = new Site("Championnat France 2018");
      $s->initialiser();

      // --- Classe définissant la page a afficher
      require_once 'generiques/cadre_carte.php';
      require_once 'elements/page_france2018.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Transports");
      $page->contenus[] = new Cadre_Carte();
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
