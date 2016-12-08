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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $eleve;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $promotion;


    /**
     * Add eleve
     *
     * @param \FormationBundle\Entity\Eleve $eleve
     *
     * @return Commentaire
     */
    public function addEleve(\FormationBundle\Entity\Eleve $eleve)
    {
        $this->eleve[] = $eleve;

        return $this;
    }

    /**
     * Remove eleve
     *
     * @param \FormationBundle\Entity\Eleve $eleve
     */
    public function removeEleve(\FormationBundle\Entity\Eleve $eleve)
    {
        $this->eleve->removeElement($eleve);
    }

    /**
     * Get eleve
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEleve()
    {
        return $this->eleve;
    }

    /**
     * Add promotion
     *
     * @param \FormationBundle\Entity\Promotion $promotion
     *
     * @return Commentaire
     */
    public function addPromotion(\FormationBundle\Entity\Promotion $promotion)
    {
        $this->promotion[] = $promotion;

        return $this;
    }

    /**
     * Remove promotion
     *
     * @param \FormationBundle\Entity\Promotion $promotion
     */
    public function removePromotion(\FormationBundle\Entity\Promotion $promotion)
    {
        $this->promotion->removeElement($promotion);
    }

    /**
     * Get promotion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPromotion()
    {
        return $this->promotion;
    }
}
