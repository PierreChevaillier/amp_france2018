<!doctype html>
<html lang="fr">
  <?php
    // =========================================================================
    // description : page html avec un message confirmation enregistrement demande
    // contexte    :
    // Copyright (c) 2017-2018 AMP
    // -------------------------------------------------------------------------
    // creation : 06-fev-2018 pchevaillier@gmail.com
    // revision :
    // -----------------------------------------------------------------------
    // commentaires :
    // attention :
    // a faire :
    // =========================================================================
    set_include_path('./');
    
    echo "<head>\n      <meta charset=\"utf-8\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
    <link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" />";
    echo "     <link rel=\"stylesheet\" href=\"amp_france2018.css\" media=\"screen\" />\n";
    echo "     <script src=\"https://code.jquery.com/jquery-3.2.1.min.js\"
    integrity=\"sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=\"
    crossorigin=\"anonymous\"></script>
    <script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>\n";
    
    require_once 'generiques/message_acquitement.php';
    
    $texte = "<p class=\"lead\">Votre annonce a bien été enregistrée.</p><p class=\"lead\">Nous vous remercions pour votre message.</p>";
    $page_suivante = "index.php";
    $message = new Message_Confirmation($texte, $page_suivante);
    $message->def_titre("Petite annonce prêt - location bateaux");
    
    $message->initialiser();
    $message->afficher();
    // =========================================================================
  ?>
</html>
