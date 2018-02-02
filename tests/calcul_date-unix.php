<?php
  // ===========================================================================
  // description : definition des classes pour les tests sur les marees
  // utilisation : utilitaire pour usage local
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : developement
  // Copyright (c) 2017-2018 AMP. All rights reserved.
  // ---------------------------------------------------------------------------
  // creation: 27-jan-2018 pchevaillier@gmail.com
  // revision:
  // ---------------------------------------------------------------------------
  // commentaires :
  // attention :
  // a faire :
  // ===========================================================================
  
  // --- Classes utilisees
  require_once '../temps/calendrier.php';

  // ---------------------------------------------------------------------------
  $cal = Calendrier::obtenir();
  $jour = $cal->jour('25', '01', '2018');
  echo $cal->date_texte($jour) . ' : ' . $jour->date();
  echo "\n";
  
  // ===========================================================================
?>
