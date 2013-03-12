<?php

namespace Ampache\Factory;

class AlbumFactory implements FactoryInterface
{
    public function hydrateObject(\SimpleXmlElement $xml)
    {
        if (true === empty($xml['id'])) {
            return null;
        }

        $album = new \Ampache\Model\Album;
        $album->setId((int) $xml['id']);
        $album->setName((string) $xml->name);
        $album->setArtist(new \Ampache\Model\LightArtist(
            (int) $xml->artist['id'],
            (string) $xml->artist
        ));
        $album->setYear((int) $xml->year);
        $album->setTrackNumber((int) $xml->track);
        $album->setDisk((int) $xml->disk);
        $album->setArtUrl((string) $xml->art);
        $album->setPreciseRating((int) $xml->preciserating);
        $album->setRating((float) $xml->rating);

        $tags = array();

        foreach ($xml->tag as $element) {
            $tag = new \Ampache\Model\LightTag(
                (int) $element['id'],
                (string) $element
            );
            $tags[] = $tag;
        }

        $album->setTags($tags);

        return $album;
    }
}
