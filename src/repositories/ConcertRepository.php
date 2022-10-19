<?php

namespace src\repositories;

use PDO;
use src\models\Concert;

class ConcertRepository
{

    private PDO $PDO;

    /**
     * @param PDO $PDO
     */
    public function __construct(PDO $PDO)
    {
        $this->PDO = $PDO;
    }

    public function findById(int $id) {

        $stm= $this->PDO->prepare("SELECT * FROM concerts WHERE id=?");
        $stm->execute([$id]);
        $resultSet=$stm->fetch(PDO::FETCH_ASSOC);

        $concert=new Concert($resultSet["artist"], $resultSet["venue"], $resultSet["dates"], $resultSet["price"], $resultSet["img"]);
        return $concert;
    }

    public function findByArtist(Concert $concert){
        $stm= $this->PDO->prepare("SELECT * FROM concerts WHERE artist=?");
        $stm->execute([$concert->getArtist()]);
        $resultSet=$stm->fetch(PDO::FETCH_ASSOC);

        $concert=new Concert($resultSet["artist"], $resultSet["venue"], $resultSet["dates"], $resultSet["price"], $resultSet["img"]);
        return $concert;
    }

    /** @param Concert $concert */
    public function save(Concert $concert) :bool
    {
        $stm=$this->PDO->prepare("INSERT INTO concerts (artist, venue, dates, price, img) 
                                    VALUES (?, ?, ?, ?, ?)");
       return $stm->execute([$concert->getArtist(), $concert->getVenue(), $concert->getDates(), $concert->getPrice(),$concert->getImg()]);
    }

    public function delete(Concert $concert) : bool
    {
        return $this->PDO->prepare("DELETE FROM concerts WHERE id=?")->execute([$concert->getId()]);
    }

    public function update(Concert $concert) : bool
    {
        return $this->PDO->prepare("UPDATE concerts SET artist=?, venue=?, dates=?, price=?, img=? WHERE id=?")
            ->execute([$concert->getArtist(), $concert->getVenue(), $concert->getDates(), $concert->getPrice(),$concert->getImg(), $concert->getId()]);
    }
}