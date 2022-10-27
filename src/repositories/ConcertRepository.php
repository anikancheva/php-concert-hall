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

    public function findById(int $id) :?Concert {

        $stm= $this->PDO->prepare("SELECT * FROM concerts WHERE id=?");
        $stm->execute([$id]);
        $resultSet=$stm->fetch(PDO::FETCH_ASSOC);

        if($resultSet){
            $concert=new Concert($resultSet["artist"], $resultSet["venue"], $resultSet["dates"], $resultSet["price"], $resultSet["img"]);
            $concert->setId($id);
            return $concert;
        }else {
            return null;
        }

    }

    public function findByArtist($artist) : ?Concert{
        $stm= $this->PDO->prepare("SELECT * FROM concerts WHERE artist=?");
        $stm->execute([$artist]);
        $resultSet=$stm->fetch(PDO::FETCH_ASSOC);

        if(!$resultSet){
            return null;
        }else {
            $found=new Concert($resultSet["artist"], $resultSet["venue"], $resultSet["dates"], $resultSet["price"], $resultSet["img"]);
            $found->setId($resultSet["id"]);
            return $found;
        }
    }

    public function findAll() : array{

        $stm= $this->PDO->prepare("SELECT * FROM concerts");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAllByUser(int $userId) : array{
        $stm= $this->PDO->prepare("SELECT * FROM users_concerts WHERE user_id=?");
        $stm->execute([$userId]);
       return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * @param Concert $concert
     * @return bool
     */
    public function save(Concert $concert) :bool
    {
        $stm=$this->PDO->prepare("INSERT INTO concerts (artist, venue, dates, price, img) 
                                    VALUES (?, ?, ?, ?, ?)");
       return $stm->execute([$concert->getArtist(), $concert->getVenue(), $concert->getDates(), $concert->getPrice(),$concert->getImg()]);
    }

    public function delete(Concert $concert) : bool
    {
        if($this->PDO->prepare("DELETE FROM users_concerts WHERE concert_id=?")->execute([$concert->getId()])){
            return $this->PDO->prepare("DELETE FROM concerts WHERE id=?")->execute([$concert->getId()]);
        }
        return false;

    }

    public function update(Concert $concert) : bool
    {
        return $this->PDO->prepare("UPDATE concerts SET artist=?, venue=?, dates=?, price=?, img=? WHERE id=?")
            ->execute([$concert->getArtist(), $concert->getVenue(), $concert->getDates(), $concert->getPrice(),$concert->getImg(), $concert->getId()]);
    }
}