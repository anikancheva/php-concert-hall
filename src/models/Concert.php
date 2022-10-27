<?php

namespace src\models;

class Concert
{
    private $id=null;

    private $artist;

    private $venue;

    private $dates;

    private $price;

    private $img;

    /**
     * @param int $id
     * @param string $artist
     * @param string $venue
     * @param string $dates
     * @param float $price
     * @param string $img
     */

    public function __construct( string $artist, string $venue, string $dates, float $price, string $img)
    {
        $this->setArtist($artist);
        $this->setVenue($venue);
        $this->setDates($dates);
        $this->setPrice( $price);
        $this->setImg($img);
    }

    public function getId() : int{
        return $this->id;
    }

    public function setId(int $id) :void{
        $this->id=$id;
    }

    /**
     * @return string
     */
    public function getArtist(): string
    {
        return $this->artist;
    }

    /**
     * @param string $artist
     */
    public function setArtist(string $artist): void
    {
        $this->artist = $artist;
    }

    /**
     * @return string
     */
    public function getVenue(): string
    {
        return $this->venue;
    }

    /**
     * @param string $venue
     */
    public function setVenue(string $venue): void
    {
        $this->venue = $venue;
    }

    /**
     * @return string
     */
    public function getDates(): string
    {
        return $this->dates;
    }

    /**
     * @param string $dates
     */
    public function setDates(string $dates): void
    {
        $this->dates = $dates;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }




}