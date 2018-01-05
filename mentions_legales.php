<!DOCTYPE html>
  <html lang="fr">
  <?php
    // =======================================================================
    // description : page web indiquant les mentoins legales
    // contexte    :
    // Copyright (c) 2017 AMP
    // -----------------------------------------------------------------------
    // creation : 12-nov-2017 pchevaillier@gmail.com
    // revision :
    // -----------------------------------------------------------------------
    // commentaires :
    // attention :
    // a faire :
    // ======================================================================
    
    set_include_path('./');
    
    // --- Informations relatives au site web
    require_once 'generiques/site.php';

    $s = new Site("Championnat France 2018");
    $s->initialiser();

    // --- Classe définissant la page a afficher
    require_once 'elements/page_france2018.php';
    require_once 'elements/mentions_legales_presentations.php';

    // --- Creation dynamique de la page et affichage
  	$page = new Page_France2018("Mentions légales");
    
    $page->contenus[] = new Vue_Mentions_Legales();
    
  	$page->initialiser();
  	$page->afficher();
    // ======================================================================
	?>
</html>
