<?php

namespace Ampache\Factory;

class VideoFactory
{
    public function hydrateObject(\SimpleXmlElement $xml)
    {
        if (true === empty($xml['id'])) {
            return null;
        }

        $video = new \Ampache\Model\Video;
        $video->setId((int) $xml['id']);
        $video->setTitle((string) $xml->title);
        $video->setMime((string) $xml->mime);
        $video->setResolution((string) $xml->resolution);
        $video->setSize((float) $xml->size);
        $video->setUrl((string) $xml->url);

        $tags = array();

        foreach ($xml->tag as $element) {
            $tag = new \Ampache\Model\LightTag(
                (int) $element['id'],
                (string) $element
            );
            $tags[] = $tag;
        }

        $video->setTags($tags);

        return $video;
    }
}
