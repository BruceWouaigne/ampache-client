<?php

namespace Ampache\Model;

class Tag
{
    protected $id;
    protected $name;
    protected $albumNumber;
    protected $artistNumber;
    protected $songNumber;
    protected $videoNumber;
    protected $playlistNumber;
    protected $streamNumber;

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

    public function getArtistNumber()
    {
        return $this->artistNumber;
    }

    public function setArtistNumber($artistNumber)
    {
        $this->artistNumber = $artistNumber;
    }

    public function getSongNumber()
    {
        return $this->songNumber;
    }

    public function setSongNumber($songNumber)
    {
        $this->songNumber = $songNumber;
    }

    public function getVideoNumber()
    {
        return $this->videoNumber;
    }

    public function setVideoNumber($videoNumber)
    {
        $this->videoNumber = $videoNumber;
    }

    public function getPlaylistNumber()
    {
        return $this->playlistNumber;
    }

    public function setPlaylistNumber($playlistNumber)
    {
        $this->playlistNumber = $playlistNumber;
    }

    public function getStreamNumber()
    {
        return $this->streamNumber;
    }

    public function setStreamNumber($streamNumber)
    {
        $this->streamNumber = $streamNumber;
    }
}
