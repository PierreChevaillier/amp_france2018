<!DOCTYPE html>
  <html lang="fr">
    <?php
      // =======================================================================
      // description : page web avec les moyens de transports pour venir sur
      //               le lieu de l'evenement
      // contexte    : Site web du chamionnat de France 2018
      // Copyright (c) 2017 AMP
      // ------------------------------------------------------------------------
      // creation : 11-oct-2017 pchevaillier@gmail.com
      // revision :
      // -----------------------------------------------------------------------
      // commentaires :
      // attention :
      // a faire :
      // ======================================================================
      
      // --- Informations relatives au site web
      require_once 'generiques/site.php';
      
      $s = new Site("Championnat France 2018");
      $s->initialiser();

      // --- Classe definissant la page a afficher
      require_once 'elements/page_france2018.php';
      
      // --- Classes des elements contenus dans la page
      require_once 'generiques/cadre_carte.php';
      require_once 'elements/contenu_transport.php';
      require_once 'elements/contacts_presentations.php';
      
      // --- Creation dynamique de la page et affichage
      $page = new Page_France2018("Transports");
      
      $chemin_picto = "media/logos";
      
      // Informations sur les moyens de transport
      $liste_transports = array();
      
      $transport = new Information_Transport();
      $transport->chemin_picto = $chemin_picto;
      $transport->nom_fichier_picto = "picto_train_64x64.png";
      $transport->def_titre("Venir en train");
      $transport->lien_site_web = "https://www.gares-sncf.com/fr/gare/frbes/brest";
      $transport->contenu = "La Gare SNCF la plus proche est celle de Brest. Elle est située au centre ville.";
      $liste_transports[] = $transport;
      
      $transport = new Information_Transport();
      $transport->chemin_picto = $chemin_picto;
      $transport->nom_fichier_picto = "picto_autocar_64x64.png";
      $transport->def_titre("Venir en bus");
      $transport->lien_site_web = "http://www.viaoo29.fr/presentation/?rub_code=36";
      $transport->contenu = "La Gare routière se situe au centre ville, à proximité de la gare SNCF. Des autocars au départ de la la gare de Brest permettent de rejoindre Plougonvelin, Le Conquet...";
      $liste_transports[] = $transport;

      $transport = new Information_Transport();
      $transport->chemin_picto = $chemin_picto;
      $transport->nom_fichier_picto = "picto_avion_64x64.png";
      $transport->def_titre("Venir en avion");
      $transport->lien_site_web = "https://www.brest.aeroport.bzh/accueil";
      $transport->contenu = "L'aéroport le plus proche est celui de Brest Bretagne, situé à Guipavas. Un service de navettes permet de rejoindre le terminal du tram (Porte de Guipavas) avec lequel on peut rejoindre le centre ville de Brest.";
      $liste_transports[] = $transport;

      // --- Elements de la page
      $infos_transports = new Contenu_Transport($liste_transports, new Vue_Contacts());
      $page->contenus[] = $infos_transports;
      $page->contenus[] = new Cadre_Carte();
      
      $page->initialiser();
      $page->afficher();
    ?>
  </html>
