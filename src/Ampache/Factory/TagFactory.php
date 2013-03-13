<?php

namespace Ampache\Factory;

class TagFactory
{
    public function hydrateObject(\SimpleXmlElement $xml)
    {
        if (true === empty($xml['id'])) {
            return null;
        }

        $tag = new \Ampache\Model\Tag;
        $tag->setId((int) $xml['id']);
        $tag->setName((string) $xml->name);
        $tag->setAlbumNumber((int) $xml->albums);
        $tag->setArtistNumber((int) $xml->artists);
        $tag->setSongNumber((int) $xml->songs);
        $tag->setVideoNumber((int) $xml->video);
        $tag->setPlaylistNumber((int) $xml->playlist);
        $tag->setStreamNumber((int) $xml->stream);

        return $tag;
    }
}
