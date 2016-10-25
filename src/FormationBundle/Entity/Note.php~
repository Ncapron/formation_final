<?php

namespace FormationBundle\Entity;

/**
 * Note
 */
class Note
{


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $note;

    /**
     * @var \FormationBundle\Entity\Promotion
     */
    private $promotion;

    /**
     * @var \FormationBundle\Entity\Eleve
     */
    private $eleve;

    /**
     * @var \FormationBundle\Entity\Module
     */
    private $module;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $commentaire;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentaire = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set promotion
     *
     * @param \FormationBundle\Entity\Promotion $promotion
     *
     * @return Note
     */
    public function setPromotion(\FormationBundle\Entity\Promotion $promotion = null)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion
     *
     * @return \FormationBundle\Entity\Promotion
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * Set eleve
     *
     * @param \FormationBundle\Entity\Eleve $eleve
     *
     * @return Note
     */
    public function setEleve(\FormationBundle\Entity\Eleve $eleve = null)
    {
        $this->eleve = $eleve;

        return $this;
    }

    /**
     * Get eleve
     *
     * @return \FormationBundle\Entity\Eleve
     */
    public function getEleve()
    {
        return $this->eleve;
    }

    /**
     * Set module
     *
     * @param \FormationBundle\Entity\Module $module
     *
     * @return Note
     */
    public function setModule(\FormationBundle\Entity\Module $module = null)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return \FormationBundle\Entity\Module
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Add commentaire
     *
     * @param \FormationBundle\Entity\Commentaire $commentaire
     *
     * @return Note
     */
    public function addCommentaire(\FormationBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaire[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \FormationBundle\Entity\Commentaire $commentaire
     */
    public function removeCommentaire(\FormationBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaire->removeElement($commentaire);
    }

    /**
     * Get commentaire
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
}
