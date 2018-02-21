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
    
    /*
    echo "<head>\n      <meta charset=\"utf-8\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
    <link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" />";
    echo "     <link rel=\"stylesheet\" href=\"amp_france2018.css\" media=\"screen\" />\n";
    echo "     <script src=\"https://code.jquery.com/jquery-3.2.1.min.js\"
    integrity=\"sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=\"
    crossorigin=\"anonymous\"></script>
    <script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>\n";
    */
    
    require_once 'generiques/page.php';
    require_once 'generiques/message_acquitement.php';
   
    $page = new Page_simple("Traitement petite annonce");
    
    $messages = array('a' => "enregistrée", 'm' => "modifiée", 's' => "supprimée", 'c' => "clôturée");
    
    $type_action = $_GET['a'];
    $id_annonce = $_GET['id'];

    $texte = "<p class=\"lead\">Votre annonce a bien été ". $messages[$type_action] . ".</p>";
    if ($type_action == 'a' || $type_action == 'm')
      $texte = $texte . "<p>Vous pouvez modifier votre annonce en allant sur la page <a href=\"http://localhost/~chevaillier/france2018/annonce_bateau_actions.php?id=" . $id_annonce . "\" >http://localhost/~chevaillier/france2018/annonce_bateau_actions.php?id=" . $id_annonce . "</a>.<br />Attention : notez bien cette adresse quelque part. Elle ne vous sera jamais plus indiquée.<p>";
   
    $page_suivante = "bourse_bateaux.php";
    $message = new Message_Confirmation($texte, $page_suivante);
    $message->def_titre("Petite annonce prêt - location de bateaux");
    
    $page->contenus[] = $message;
    
    $page->initialiser();
    $page->afficher();
    // =========================================================================
  ?>
</html>
