<?php

namespace UniversDj\Podcast\Model;

class Podcast
{
    protected $url;

    protected $episodes;

    /**
     * Get url.
     *
     * @return url.
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set url.
     *
     * @param url the value to set.
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get episodes.
     *
     * @return episodes.
     */
    public function getEpisodes()
    {
        if($this->episodes == null) {
            $xmlContent = file_get_contents($this->url);
            $xml = new \SimpleXMLElement($xmlContent);

            $items = $xml->xpath('//item');

            $this->episodes = array();

            foreach ($items as $item) {
                $episode = new Episode();
                $episode->setTitle((string)$item->title);
                $episode->setUrl((string)$item->enclosure['url']);
                $this->episodes[] = $episode;
            }
        }

        return $this->episodes;
    }

    /**
     * Set episodes.
     *
     * @param episodes the value to set.
     */
    public function setEpisodes($episodes)
    {
        $this->episodes = $episodes;
    }
}
