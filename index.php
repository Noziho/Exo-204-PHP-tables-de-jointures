<?php

require __DIR__ . '/Config.php';
require  __DIR__ . '/DB_Connect.php';
/*
 * 1 - Uniquement pour la pratique, reproduisez via mysql workbench le schémas proposé.
 * 2 - Exportez le résultat de manière à créer les tables en base de données.
 * 3 - Ajoutez des utilisateurs, des rôles et ajoutez des données dans la table user_role ( attention, au moins un utilisateur doit avoir deux rôles au moins ).
 * 4 - A l'aide d'un simple print_r, afficher les rôles de chaque utilisateur.
 * 5 - FIN !
 */

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT user.username, role.role
    FROM user_role
        INNER JOIN role ON user_role.role_id = role.id
        INNER JOIN user ON user_role.user_id = user.id
");

$stmt->execute();

echo "<pre>";
print_r($stmt->fetchAll());
echo "</pre>";

