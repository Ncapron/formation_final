<?php

namespace FormationBundle\Entity;

/**
 * Commentaire
 */
class Commentaire
{

    public function __toString()
    {
        return $this->getMessage();
    }
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $message;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Commentaire
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $note;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->note = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add note
     *
     * @param \FormationBundle\Entity\Note $note
     *
     * @return Commentaire
     */
    public function addNote(\FormationBundle\Entity\Note $note)
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * Remove note
     *
     * @param \FormationBundle\Entity\Note $note
     */
    public function removeNote(\FormationBundle\Entity\Note $note)
    {
        $this->note->removeElement($note);
    }

    /**
     * Get note
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNote()
    {
        return $this->note;
    }
}
