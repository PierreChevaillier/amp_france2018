<!doctype html>
<html lang="fr">
  <?php
    // =========================================================================
    // description : page html affichant une actualite
    // contexte    :
    // Copyright (c) 2017-2018 AMP. Tous droits reserves
    // -------------------------------------------------------------------------
    // creation : 30-jan-2018 pchevaillier@gmail.com
    // revision : 02-fev-2018 pchevaillier@gmail.com dans page 'normal'
    // -------------------------------------------------------------------------
    // commentaires :
    // attention :
    // a faire :
    // =========================================================================
    set_include_path('./');
    
    // --- Informations relatives au site web
    require_once 'generiques/site.php';
    
    $site = new Site("Championnat France 2018");
    $site->initialiser();
  
    // --- Classe définissant la page a afficher
    require_once 'elements/page_france2018.php';
    
    // --- Classes des contenus
    require_once 'generiques/actualite.php';
    
    // --- Creation dynamique de la page et affichage
    $page = new Page_France2018("Actualite");
    
    $page_suivante = "actualites.php";
    $dossier_images = "media/actus";
    $code_actu = $_GET['id'];
    
    $page->contenus[] = new Vue_Actualite($code_actu,
                                          $dossier_images,
                                          $page_suivante);
    
    $page->initialiser();
    $page->afficher();
    
    // =========================================================================
  ?>
</html>
