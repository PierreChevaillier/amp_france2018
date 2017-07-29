<?php
  // ===========================================================================
  // description : definition de la classe Cadre_Carte
  //               affichage d'une carte dans un cadre
  // utilisation : element du corps d'une page web
  // teste avec  : PHP 5.5.3 sur Mac OS 10.11
  // contexte    : Site du Championnat de France d'Aviron de Mer 2018
  // Copyright (c) 2017 AMP
  // ---------------------------------------------------------------------------
  // creation: 29-juil-2017 pchevaillier@gmail.com
  // revision:
  // ---------------------------------------------------------------------------
  // commentaires :
  // - centree sur 4 boulevard de la mer, France.
  //   ce serait bien de rendre l'adresse parametrable.
  // attention :
  // -
  // a faire :
  // ---------------------------------------------------------------------------

  // --- Classes utilisees
  require_once 'generiques/element_page.php';

  // ---------------------------------------------------------------------------
  // --- Definition de la classe

  /**
   * @author Pierre Chevaillier
   */
  class Cadre_Carte extends Element_Page {
  
    public function initialiser() {
    }
  
    /**
     *
     */
    protected function afficher_debut() {
      echo '<div class="embed-responsive embed-responsive-4by3" style="margin:10px;">';
    }
  
    protected function afficher_corps() {
      echo '<iframe class="embed-responsive-item" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=4+Boulevard+de+la+Mer,+Plougonvelin,+France&amp;aq=0&amp;oq=4,+boulevard+de+la+mer,+plougonvelin&amp;sll=48.346866,-4.704251&amp;sspn=0.007002,0.018625&amp;g=4,+boulevard+de+la+mer,+plougonvelin&amp;ie=UTF8&amp;hq=&amp;hnear=4+Boulevard+de+la+Mer,+29217+Plougonvelin,+Finist%C3%A8re,+Bretagne,+France&amp;t=m&amp;ll=48.442867,-4.457703&amp;spn=0.318848,0.823975&amp;z=10&amp;iwloc=A&amp;output=embed" width="600" height="400" scrolling="yes"></iframe>';
    }
  
    protected function afficher_fin() {
      echo '</div>';
    }
  }
// =============================================================================
