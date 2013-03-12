<?php

namespace Ampache\Factory;

class ArtistFactory implements FactoryInterface
{
    public function hydrateObject(\SimpleXmlElement $xml) {
         if (true === empty($xml['id'])) {
            return null;
        }

        $artist = new \Ampache\Model\Artist;
        $artist->setId((int) $xml['id']);
        $artist->setName((string) $xml->name);
        $artist->setAlbumNumber((int) $xml->albums);
        $artist->setSongNumber((int) $xml->songs);
        $artist->setPreciseRating((int) $xml->preciseRating);
        $artist->setRating((float) $xml->rating);

        $tags = array();

        foreach ($xml->tag as $element) {
            $tag = new \Ampache\Model\LightTag(
                (int) $element['id'],
                (string) $element
            );
            $tags[] = $tag;
        }

        $artist->setTags($tags);

        return $artist;
    }
}
