<?php

namespace UniversDj\Model;

class Dj
{
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $name;
    protected $email;
    protected $fbid;
    protected $twid;
    protected $radioshow;
    protected $episodes;
    protected $biography;
    protected $picture;

    /**
     * Get firstname.
     *
     * @return firstname.
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set firstname.
     *
     * @param firstname the value to set.
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get lastname.
     *
     * @return lastname.
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set lastname.
     *
     * @param lastname the value to set.
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

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
     * Get email.
     *
     * @return email.
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email.
     *
     * @param email the value to set.
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get twid.
     *
     * @return twid.
     */
    public function getTwid()
    {
        return $this->twid;
    }

    /**
     * Set twid.
     *
     * @param twid the value to set.
     */
    public function setTwid($twid)
    {
        $this->twid = $twid;
    }

    /**
     * Get radioshow.
     *
     * @return radioshow.
     */
    public function getRadioshow()
    {
        return $this->radioshow;
    }

    /**
     * Set radioshow.
     *
     * @param radioshow the value to set.
     */
    public function setRadioshow($radioshow)
    {
        $this->radioshow = $radioshow;
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
     * Get biography.
     *
     * @return biography.
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set biography.
     *
     * @param biography the value to set.
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;
    }

    /**
     * Get picture.
     *
     * @return picture.
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set picture.
     *
     * @param picture the value to set.
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }
}
