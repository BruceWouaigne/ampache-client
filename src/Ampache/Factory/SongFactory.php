<?php

namespace Ampache\Factory;

class SongFactory implements FactoryInterface
{
    public function hydrateObject(\SimpleXmlElement $xml)
    {
        if (true === empty($xml->time)) {
            return null;
        }

        $song = new \Ampache\Model\Song;
        $song->setId((int) $xml['id']);
        $song->setTitle((string) $xml->title);
        $song->setAlbum(new \Ampache\Model\LightAlbum(
            (int) $xml->album['id'],
            (string) $xml->album
        ));
        $song->setTrack((int) $xml->track);
        $song->setTime((int) $xml->time);
        $song->setUrl((string) $xml->url);
        $song->setSize((float) $xml->size);
        $song->setArtUrl((string) $xml->art);
        $song->setPreciseRating((int) $xml->preciserating);
        $song->setRating((float) $xml->rating);

        $tags = array();

        foreach ($xml->tag as $element) {
            $tag = new \Ampache\Model\LightTag(
                (int) $element['id'],
                (string) $element
            );
            $tags[] = $tag;
        }

        $song->setTags($tags);

        return $song;
    }
}
