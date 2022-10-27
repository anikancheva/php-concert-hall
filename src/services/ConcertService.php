<?php

namespace src\services;


use src\models\Concert;
use src\repositories\ConcertRepository;

class ConcertService
{
    private ConcertRepository $concertRepo;

    /**
     * @param ConcertRepository $concertRepo
     */
    public function __construct(ConcertRepository $concertRepo)
    {
        $this->concertRepo = $concertRepo;
    }

    public function add(Concert $concert) : bool{
        if(!$this->concertRepo->findByArtist($concert->getArtist())){
           return $this->concertRepo->save($concert);
        }
        return false;
    }

    public function removeByArtist($artist) : bool{
        $current=$this->concertRepo->findByArtist($artist);
        if($current){
            return $this->concertRepo->delete($current);
        }
        return false;
    }

    public function edit(Concert $concert): void
    {
        $this->concertRepo->update($concert);
    }

    public function getAllConcerts() : array{
       return $this->concertRepo->findAll();
    }
    public function find($artist) : ?Concert{
      return  $this->concertRepo->findByArtist($artist);
    }
}