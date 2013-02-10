<?php

namespace UniversDj\Model;

class Mixshow
{

    protected $id;
    protected $name;
    protected $episodes;
    protected $dj;

    /**
     * Get name.
     *
     * @return name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name.
     *
     * @param name the value to set.
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get id.
     *
     * @return id.
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set id.
     *
     * @param id the value to set.
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get episodes.
     *
     * @return episodes.
     */
    public function getEpisodes()
    {
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

    /**
     * Get dj.
     *
     * @return dj.
     */
    public function getDj()
    {
        return $this->dj;
    }

    /**
     * Set dj.
     *
     * @param dj the value to set.
     */
    public function setDj($dj)
    {
        $this->dj = $dj;
    }
}
