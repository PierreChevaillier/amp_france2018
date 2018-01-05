<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web presentant le journal des actualites sur
      //               le lieu de l'evenement
      // contexte    : Site web du chamionnat de France 2018
      // Copyright (c) 2017 AMP
      // ------------------------------------------------------------------------
      // creation : 11-oct-2017 pchevaillier@gmail.com
      // revision : 06-nov-2017 pchevaillier@gmail.com actu du 2 nov.
      // revision : 05-jan-2018 pchevaillier@gmail.com include_path
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

      // --- Autres classes
      require_once 'generiques/actualite.php';
      require_once 'generiques/journal_actualites.php';
      require_once 'elements/contenu_actualites.php';
      require_once 'elements/contacts_presentations.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Actualites");
      
      $comm = new Categorie("Communication");
      
      $journal = new Journal_Actualites("media/photos");
      $page->contenus[] = new Contenu_Actualites($journal, new Vue_Contacts());
      
      // --- les actualites
      
      $actu = new Actualite("Enthousiasme, motivation, synergies");
      $actu->categorie = $comm;
      $actu->lien_media = "media/photos/rencontre_ffa_mairie.jpg";
      $actu->date = "2 novembre 2017";
      $actu->nom_fichier_vignette = "vignette_rencontre_ffa_mairie.png";
      $actu->contenu = "<p>Ou comment résumer en 3 mots la rencontre de nos élus locaux, de nos cadres fédéraux et du Comité d’Organisation de l’AMP à la mairie de Plougonvelin cette semaine !</p><p>Lundi soir, l’équipe municipale de Plougonvelin nous a fait l’honneur de recevoir à la mairie une délégation de la Commission Mer de la Fédération Française d’Aviron. En présence d’élus des communes voisines, de représentants de la CCPI (Communauté de Communes du Pays d’Iroise) et de Didier Le Gac, député de la 3e circonscription du Finistère, nos cadres fédéraux ont pu prendre la mesure du soutien moral, logistique et financier apporté par nos partenaires locaux à l’organisation du championnat de France 2018.<p><p>Les points à retenir :<ul><li>Une équipe habituée à l’accompagnement d’événements sportifs d’ampleur nationale (comme le Trail du Bout du Monde, ou le Festival d’Armor)</li><li>Une commune forte de ses bénévoles avec 60 associations pour 4000 habitants</li><li>Un cadre naturel exceptionnel, parfait pour la pratique de l’aviron de mer</li><li>Une confiance à toute épreuve dans notre capacité à trouver des solutions aux problèmes éventuels</li></ul><p>Bref, même pas peur !!!</p><p>L’AMP et son Comité d’Organisation du championnat remercient particulièrement M. Bernard Gouérec, maire de plougonvelin,<br />M. Stéphane Corre, adjoint aux vies associative et sportive, et aux animations,<br />Et toute l’équipe municipale<br />Et bien sûr, Richard Mouchel, Lionnel Girard et Yvonig Foucault, représentant la Commission Mer de la FFA.<p>";
      $journal->actualites[] = $actu;
      
      $actu = new Actualite("Passage de relais à Marseille");
      $actu->categorie = $comm;
      $actu->date = "17 juin 2017";
      $actu->nom_fichier_vignette = "logo-amp-carre-64x64.png";
      $actu->lien_media = "media/photos/passation_marseille_plougonvelin.jpg";
      
      $actu->contenu = "Ce week-end à l’occasion du Championnat de France d’Aviron de Mer 2017 qui se déroulait à Marseille, l’Aviron de Mer de Plougonvelin a été officiellement annoncé comme l’organisateur de l’édition 2018.<br />A Cette occasion Joël Champeau, président de l’AMP et Xavier Hervé, président du comité local d’organisation ont dévoilé l’affiche de l’édition 2018. Le Club est déjà mobilisé pour cet événement majeur et met toute son énergie pour l’organisation de cet événement.";
      $journal->actualites[] = $actu;
     
      $actu = new Actualite("Lancement du site web");
      $actu->categorie = $comm;
      $actu->date = "13 juin 2017";
      $actu->nom_fichier_vignette = "vignette_site_fr2018.png";
      $actu->contenu = "L'AMP est fier de lancer le site web de l'Edition 2018 du Championnat de France d'aviron de mer. Ce n'est qu'un début... Rendez-nous visite régulièrement pour d'autres nouvelles.";
      $journal->actualites[] = $actu;
      
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
