<?php
namespace Entity;

use Entity\Entity;

class Produits extends Entity  {

    public int|null $produit_id;
    public string|null $nom_produit;
    public float|null $prix;
    public int|null $stock;




}