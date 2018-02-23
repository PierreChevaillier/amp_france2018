<!doctype html>
<html lang="fr">
  <?php
    // =========================================================================
  // description : page html avec un message confirmation enregistrement demande
  // contexte    :
  // Copyright (c) 2017-2018 AMP
  // -------------------------------------------------------------------------
  // creation : 06-fev-2018 pchevaillier@gmail.com
  // revision : 22-fev-2018 pchevaillier@gmail.com
  // -----------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // =========================================================================
  
  set_include_path('./');
  
  require_once 'generiques/page.php';
  require_once 'generiques/message_acquitement.php';
   
  $page = new Page_simple("Traitement petite annonce");
    
  $messages = array('a' => "enregistrée", 'm' => "modifiée", 's' => "supprimée", 'c' => "clôturée");
    
  $type_action = $_GET['a'];
  $id_annonce = $_GET['id'];

  $texte = "<p class=\"lead\">Votre annonce a bien été ". $messages[$type_action] . ".</p>";
    
  $localisation = "avironplougonvelin.fr/France2018";
  //$localisation = "localhost/~chevaillier/france2018";
    
  if ($type_action == 'a' || $type_action == 'm')
    $texte = $texte . "<p>Vous pouvez modifier votre annonce en allant sur la page <a href=\"http://" . $localisation . "/annonce_bateau_actions.php?id=" . $id_annonce . "\" >http://" . $localisation . "/annonce_bateau_actions.php?id=" . $id_annonce . "</a>.<br />Attention : notez bien cette adresse quelque part. Elle ne vous sera plus jamais indiquée.<p>";
   
  $page_suivante = "bourse_bateaux.php";
  $message = new Message_Confirmation($texte, $page_suivante);
  $message->def_titre("Petite annonce prêt - location de bateaux");
    
  $page->contenus[] = $message;
    
  $page->initialiser();
  $page->afficher();
  // =========================================================================
?>
</html>
