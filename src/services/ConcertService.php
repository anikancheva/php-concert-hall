<?php

namespace src\services;


use src\models\Concert;
use src\repositories\ConcertRepository;

class ConcertService
{
    private $concertRepo;

    /**
     * @param ConcertRepository $concertRepo
     */
    public function __construct(ConcertRepository $concertRepo)
    {
        $this->concertRepo = $concertRepo;
    }

    public function add(Concert $concert) : bool{
        if(!$this->concertRepo->findByArtist($concert)){
           return $this->concertRepo->save($concert);
        }
        return false;
    }

    public function remove(Concert $concert) : bool{
        $current=$this->concertRepo->findByArtist($concert);
        if($current){
            return $this->concertRepo->delete($concert);
        }
        return false;
    }

    public function edit(Concert $concert){
        $this->concertRepo->update($concert);
    }

    public function getAllConcerts() : array{
       return $this->concertRepo->findAll();
    }
}