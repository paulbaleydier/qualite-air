<?php
namespace Entity;

use Entity\Entity;
use Model\Produits\Produits;
use Model\Utilisateurs\Utilisateurs;

class Commands extends Entity  {

    public int|null $commande_id;
    public int|null $utilisateur_id;
    public int|null $produit_id;
    public int|null $quantite;
    public string|null $date_commande;

    public object|null $_produit;
    public object|null $_user;

 

    public function __construct() {
        if ( isset($this->produit_id) ) {
            $this->_produit = Produits::getByID($this->produit_id);
        }
        if ( isset($this->utilisateur_id) ) {
            $this->_user = Utilisateurs::getByID($this->utilisateur_id);
        }
    }



}