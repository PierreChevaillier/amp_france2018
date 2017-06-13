<?php
// ------------------------------------------------------------------------
// description: definition de la classe Jour
// contexte   : Resable
// ------------------------------------------------------------------------
// creation: 26-sep-2015 pchevaillier@gmail.com
// revision: 26-nov-2016 pchevaillier@gmail.com, numero_semaine, annee_semaine
// revision: 30-dec-2016 pchevaillier@gmail.com, annee du jour (cas du dim 1er janvier)
// revision: 28-jan-2017 pchevaillier@gmail.com, methode lendemain
// revision: 29-jan-2017 pchevaillier@gmail.com, methode date_heure_creneau
// revision: 25-fev-2017 pchevaillier@gmail.com, texte, texte_court
// ------------------------------------------------------------------------
// commentaires : 
// le 26-nov-2016 : 1 creneau de plus le soir pour les ergos (en hiver)
// attention : 
// a faire :
// ------------------------------------------------------------------------

class Jour {
  public static $ete = 0;
  public static $hiver = 1;
  public static $heure_debut =  array(0 => 9, 1 => 9); // 0 pour l'ete,  1 pour l'hiver
  public static $debut_creneau = array(0 => "00", 1 => "30");
  public static $nb_max_creneaux = array(0 => 11, 1 => 11);
  
  public static $jours = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
	public static $mois = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"); 

	public static $jours_courts = array("lun", "mar", "mer", "jeu", "ven", "sam", "dim");
	public static $mois_courts = array("janv", "févr", "mars", "avr", "mai", "juin", "juil", "août", "sept", "oct", "nov", "déc"); 

  public $jour = 0;
  private $heure_hiver = 0;
	
  public function __construct($j) {
    $this->jour = $j;
    $this->heure_hiver = 1 - date('I', $this->jour);
  }
  
  public static function aujourdhui() {
  	return new Jour(mktime(0, 0, 0, date("m"), date("d"), date("Y")));
  }
  
  public function lendemain() {
  	$j = mktime(0, 0, 0, date("n", $this->jour), date("d", $this->jour) + 1, date("Y", $this->jour));
  	$resultat = new Jour($j);
  	return $resultat;
	}

  public function heure_hiver() {
    return $this->heure_hiver;
  }

	public function texte() {
	 	return self::$jours[date("N", $this->jour) - 1] . " " . date("j", $this->jour) . " " . self::$mois[date("n", $this->jour) - 1] . " " . date("Y", $this->jour); 
	}
	
	public function texte_court() {
	 return self::$jours_courts[date("N", $this->jour) - 1] . " " . date("j", $this->jour) . " " . self::$mois_courts[date("n", $this->jour) - 1];
	}
	
  public function nombre_creneaux() {
    return self::$nb_max_creneaux[$this->heure_hiver()];
  }

  public function dernier_creneau() {
    return self::$nb_max_creneaux[$this->heure_hiver()];
  }

  public function creneau_en_texte($numero) {
    $heure = self::$heure_debut[$this->heure_hiver()] + $numero;
    $minutes = self::$debut_creneau[$this->heure_hiver()];
    return $heure . "h" . $minutes;
  }

	public function date_heure_creneau($numero_creneau) {
		$heure = self::$heure_debut[$this->heure_hiver()] + $numero_creneau;
		$minutes = self::$debut_creneau[$this->heure_hiver()];
		$resultat = mktime($heure, $minutes, 0, date("n", $this->jour), date("d", $this->jour), date("Y", $this->jour));
		return $resultat;
	}
	
	public function numero_semaine() {
		return date("W", $this->jour);
	}
	
	public function annee_semaine() {
	/*
		$jourDeLAn = mktime(0, 0, 0, 1, 1, date("Y"));
  $jour_semaine_jourDeLAn = date("N", $jourDeLAn);
  echo "-" . $jour_semaine_jourDeLAn . " " . date('W', $jourDeLAn) . "-<br/>";
  if ((date("W", $this->jour) == 53) && (date('W', $jourDeLAn) == 53) && (date("N", $this->jour) >= $jour_semaine_jourDeLAn)) 
  	return (date("Y", $this->jour) - 1);
  else
  	return date("Y", $this->jour);

	*/
	$jourDeLAn = mktime(0, 0, 0, 1, 1, date("Y", $this->jour));
  $jour_semaine_jourDeLAn = date("N", $jourDeLAn);  
  // On est le jour de l'an et c'est un dimanche : derniere semaine de l'annee qui se termine.
  // cas du 1er janvier 2017
  if (($this->jour == mktime(0, 0, 0, 1, 1, date("Y", $this->jour))) && (date("N", $this->jour) == 7))
  	return (date("Y", $this->jour) - 1);
  elseif ((date("W", $this->jour) == 53) && (date('W', $jourDeLAn) == 53) && (date("N", $this->jour) >= $jour_semaine_jourDeLAn)) 
  	return (date("Y", $this->jour) - 1);
  else
  	return date("Y", $this->jour);
}

}
