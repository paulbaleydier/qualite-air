<?php
namespace Entity;

use Entity\Entity;

class Utilisateurs extends Entity  {

    public int|null $id;
    public string|null $nom;
    public string|null $prenom;
    public string|null $email;
    public string|null $password;
    public string|null $createdDate;

    


}