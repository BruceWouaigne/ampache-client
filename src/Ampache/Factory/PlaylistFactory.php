<?php

namespace Ampache\Factory;

class PlaylistFactory
{
    public function hydrateObject(\SimpleXmlElement $xml)
    {
        if (true === empty($xml['id'])) {
            return null;
        }

        $playlist = new \Ampache\Model\Playlist;
        $playlist->setId((int) $xml['id']);
        $playlist->setName((string) $xml->name);
        $playlist->setOwner((string) $xml->owner);
        $playlist->setType((string) $xml->type);

        $tags = array();

        foreach ($xml->tag as $element) {
            $tag = new \Ampache\Model\LightTag(
                (int) $element['id'],
                (string) $element
            );
            $tags[] = $tag;
        }

        $playlist->setTags($tags);

        return $playlist;
    }
}
