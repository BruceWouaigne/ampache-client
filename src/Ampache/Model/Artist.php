<?php

namespace Ampache\Model;

class Artist
{
    protected $id;
    protected $name;
    protected $albumNumber;
    protected $songNumber;
    protected $tags;
    protected $preciseRating;
    protected $rating;

    public function __construct()
    {
        $this->tags = array();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAlbumNumber()
    {
        return $this->albumNumber;
    }

    public function setAlbumNumber($albumNumber)
    {
        $this->albumNumber = $albumNumber;
    }

    public function getSongNumber()
    {
        return $this->songNumber;
    }

    public function setSongNumber($songNumber)
    {
        $this->songNumber = $songNumber;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getPreciseRating()
    {
        return $this->preciseRating;
    }

    public function setPreciseRating($preciseRating)
    {
        $this->preciseRating = $preciseRating;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }
}
