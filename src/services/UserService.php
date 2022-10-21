<?php

namespace src\services;

use src\models\Concert;
use src\models\exceptions\LoginException;
use src\models\User;
use src\repositories\ConcertRepository;
use src\repositories\UserRepository;

class UserService
{
    private $userRepo;
    private $concertRepo;

    /**
     * @param UserRepository $repo
     */
    public function __construct(UserRepository $userRepo, ConcertRepository $concertRepo)
    {
        $this->userRepo = $userRepo;
        $this->concertRepo=$concertRepo;
    }

    public function register(User $user) : bool | User{
        if($this->userRepo->findByEmail($user->getEmail())){
            return false;
        }else {
            if($this->userRepo->save($user)){
              return $this->userRepo->findByEmail($user->getEmail());

            }else{
                return false;
            }
        }

    }

    public function login(string $email, string $password) : bool | User {
       $current= $this->userRepo->findByEmail($email);

       if($current){
           if(password_hash($password, PASSWORD_ARGON2I)===$current->getPassword()){
               return $current;
           }else {
               return false;
           }
       }
       return false;

    }

    public function buyTicket(User $user, Concert $concert) : bool{
       $userId= $this->userRepo->findByEmail($user->getEmail())->getId();
       $concertId= $this->concertRepo->findByArtist($concert)->getId();
       if ($userId && $concertId){
           $this->userRepo->buy($userId, $concertId);
           return true;
       }
       return false;

    }

    public function findUser($email) : User {
       return $this->userRepo->findByEmail($email);
    }
}