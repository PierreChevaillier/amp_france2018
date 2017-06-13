<!doctype html>
  <html lang="fr">
    <script language="php">

    // --- Informations relatives au site web
    require_once 'generiques/site.php';

    $s = new Site("Championnat France 2018");
    $s->initialiser();

    // --- Classe définissant la page a afficher
  	require_once 'pages/page_mentions_legales.php';

    // --- Creation dynamique de la page et affichage
  	$page = new Page_Mentions_Legales("Mentions légales");
  	$page->initialiser();
  	$page->afficher();

	</script>
</html>
