<?php

namespace src\services;

use src\models\Concert;
use src\models\User;
use src\repositories\ConcertRepository;
use src\repositories\UserRepository;

class UserService
{
    private UserRepository $userRepo;
    private ConcertRepository $concertRepo;

    /**
     * @param UserRepository $userRepo
     * @param ConcertRepository $concertRepo
     */
    public function __construct(UserRepository $userRepo, ConcertRepository $concertRepo)
    {
        $this->userRepo = $userRepo;
        $this->concertRepo = $concertRepo;
    }

    public function register(User $user): bool|User
    {
        if ($this->userRepo->findByEmail($user->getEmail())) {
            return false;
        } else {
            if ($this->userRepo->save($user)) {
                return $this->userRepo->findByEmail($user->getEmail());

            } else {
                return false;
            }
        }

    }

    public function login(string $email, string $password): false|User
    {
        $current = $this->userRepo->findByEmail($email);

        if ($current != null) {
            if (password_verify($password, $current->getPassword())) {
                return $current;
            } else {
                return false;
            }
        } else {
            return false;
        }


    }

    public function buyTicket(int $userId, string $artist): bool
    {
        $concertId = $this->concertRepo->findByArtist($artist)->getId();
        return $this->userRepo->buy($userId, $concertId);
    }

    public function updateUser(int $id, string $first, string $last, string $pass): bool
    {

        $user = $this->userRepo->findById($id);
        $user->setFirstName($first);
        $user->setLastName($last);
        $user->setPassword($pass);
        return $this->userRepo->update($user);
    }

    public function findUserByEmail($email): User
    {
        return $this->userRepo->findByEmail($email);
    }

    public function getConcerts(int $userId): array
    {
        return $this->concertRepo->findAllByUser($userId);

    }
}