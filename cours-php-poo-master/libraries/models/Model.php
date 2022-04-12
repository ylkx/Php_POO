<?php

namespace Models;

require_once('libraries/Database.php');

/*
 * Abstract rend la classe model impossible à se fair appeler par elle même ex: $model = new Model();
 */
abstract class Model
{

    protected $pdo;
    protected $table;

    public function __construct()
    {
         // \ pour database car le namespace recherchde que dans le dossier Models
        $this->pdo = \Database::getPdo();
    }
    /* Retourne la liste des articles/Commentaire */
    public function findAll(?string $order = ""): array
    {

        $sql = "SELECT * FROM {$this->table}";

        if ($order) {
            $sql .= " ORDER BY " . $order;
        }
        $resultats = $this->pdo->query($sql);
        $articles = $resultats->fetchAll();
        return $articles;
    }

    /* Retourne un article/Commentaire de la base de données */
    public function find(int $id)
    {

        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();
        return $item;
    }

    /* Supprime un article/Commentaire de la base de donnée */
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }
}
