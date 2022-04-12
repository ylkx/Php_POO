<?php

/* connection à la base de données */

class Database
{
    public static function getPdo(): PDO
    {
        $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    }
}



/* 
//Designe paterne :  le paterne singleton : limite à une connexion
$model = new \Models\Comment(); 

$commentaires = $model->findAll(); // connexion à MYSQL : 1
$commentaire = $model->find(1); //connexion à MYSQL : 2
$model->delete(1); // connexion à MYSQL : 3

class Database
{
    private static $instance = null; // self::$instance permet 'appeler une classe static

    public static function getPdo(): PDO
    {
        if(self::$instance === null) {
            self::$instance = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        return self::$instance;
    }
}

**/