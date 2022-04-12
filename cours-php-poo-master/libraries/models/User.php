<?php

namespace Models;


// Pour afficher les données de la table User


class User extends Model
{
    protected $table = "users";
}

/* Permet d'afficher la table user de notre base de donées grâce au fichier Model
 *
 * require_once('libraries/models/User.php');
 * $userModel = new User();
 * $users = $userModel->findAll();
 * var_dump($users);
 * die();
 */
