<?php

namespace UniversDj\Model;

class Episode
{
    protected $id;
    protected $mixshow;
    protected $name;
    protected $filename;
    protected $file;
    protected $url;

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
     * Get mixshow.
     *
     * @return mixshow.
     */
    public function getMixshow()
    {
        return $this->mixshow;
    }

    /**
     * Set mixshow.
     *
     * @param mixshow the value to set.
     */
    public function setMixshow($mixshow)
    {
        $this->mixshow = $mixshow;
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
     * Get filename.
     *
     * @return filename.
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set filename.
     *
     * @param filename the value to set.
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    public function getFile()
    {
        return new \SplFileInfo(__DIR__ . '/../../../www/uploads/' . $this->getMixshow()->getId() . '/' . $this->filename);
    }

    public function getUrl()
    {
        if ($this->url == null) {
            $this->url = 'http://api.universdj.com.local/uploads/' . $this->getMixshow()->getId() . '/' . $this->filename;
        }

        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

}
