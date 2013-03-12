<?php

namespace Ampache\Model;

class Song
{
    protected $id;
    protected $title;
    protected $album;
    protected $track;
    protected $time;
    protected $url;
    protected $size;
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

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getAlbum()
    {
        return $this->album;
    }

    public function setAlbum($album)
    {
        $this->album = $album;
    }

    public function getTrack()
    {
        return $this->track;
    }

    public function setTrack($track)
    {
        $this->track = $track;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
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
