<?php

namespace Ampache\Model;

class Album
{
    protected $id;
    protected $name;
    protected $artist;
    protected $year;
    protected $trackNumber;
    protected $disk;
    protected $artUrl;
    protected $preciseRating;
    protected $rating;
    protected $tags;

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

    public function getArtist()
    {
        return $this->artist;
    }

    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getTrackNumber()
    {
        return $this->trackNumber;
    }

    public function setTrackNumber($trackNumber)
    {
        $this->trackNumber = $trackNumber;
    }

    public function getDisk()
    {
        return $this->disk;
    }

    public function setDisk($disk)
    {
        $this->disk = $disk;
    }

    public function getArtUrl()
    {
        return $this->artUrl;
    }

    public function setArtUrl($artUrl)
    {
        $this->artUrl = $artUrl;
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

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }
}
