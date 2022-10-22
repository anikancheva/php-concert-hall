<?php

namespace src\repositories;

use PDO;
use src\models\User;

class UserRepository
{

    private PDO $PDO;

    /**
     * @param PDO $PDO
     */
    public function __construct(PDO $PDO)
    {
        $this->PDO = $PDO;
    }

    public function findById(int $id)
    {

        $stm = $this->PDO->prepare("SELECT * FROM users WHERE id=?");
        $stm->execute([$id]);
        $resultSet = $stm->fetch(PDO::FETCH_ASSOC);

        $user = new User($resultSet["first_name"], $resultSet["last_name"], $resultSet["email"], $resultSet["_password"], $resultSet["_role"]);
        $user->setId($resultSet["id"]);
        return $user;
    }

    public function findByEmail(string $email)
    {
        $stm = $this->PDO->prepare("SELECT * FROM users WHERE email=?");
        $stm->execute([$email]);
        $resultSet = $stm->fetch(PDO::FETCH_ASSOC);

        if ($resultSet) {
            $user = new User($resultSet["first_name"], $resultSet["last_name"], $resultSet["email"], $resultSet["_password"], $resultSet["_role"]);
            $user->setId($resultSet["id"]);
            return $user;
        }else{
            return null;
        }

    }

    public function save(User $user): bool
    {
        $user->setPassword($this->hashPassword($user->getPassword()));
        $stm = $this->PDO->prepare("INSERT INTO users (first_name, last_name, email, _password, _role) VALUES 
                                                                       (?, ?, ?, ?, ?)");
        return $stm->execute([$user->getFirstName(), $user->getLastName(), $user->getEmail(), $user->getPassword(), $user->getRole()]);

    }

    public function delete(User $user): bool
    {
        return $this->PDO->prepare("DELETE FROM users WHERE id=?")->execute([$user->getId()]);

    }

    public function updatePassword(User $user): bool
    {
        $user->setPassword($this->hashPassword($user->getPassword()));
        return $this->PDO->prepare("UPDATE users SET _password=? WHERE id=?")
            ->execute([$user->getPassword(), $user->getId()]);
    }

    public function buy(int $userId, int $concId): bool
    {
        $stm = $this->PDO->prepare("INSERT INTO users_concerts VALUES (?, ?)");
        return $stm->execute([$userId, $concId]);
    }

    private function hashPassword(string $password)
    {
        return password_hash($password, PASSWORD_ARGON2I);
    }
}