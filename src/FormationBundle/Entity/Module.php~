<?php

namespace FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 */
class Module
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $numero;

    /**
     * @var string
     */
    private $nom;


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
     * Set numero
     *
     * @param integer $numero
     * @return Module
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Module
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $promotion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->promotion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add promotion
     *
     * @param \FormationBundle\Entity\Promotion $promotion
     *
     * @return Module
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $eleve;


    /**
     * Add eleve
     *
     * @param \FormationBundle\Entity\Eleve $eleve
     *
     * @return Module
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $langage;


    /**
     * Add langage
     *
     * @param \FormationBundle\Entity\Langage $langage
     *
     * @return Module
     */
    public function addLangage(\FormationBundle\Entity\Langage $langage)
    {
        $this->langage[] = $langage;

        return $this;
    }

    /**
     * Remove langage
     *
     * @param \FormationBundle\Entity\Langage $langage
     */
    public function removeLangage(\FormationBundle\Entity\Langage $langage)
    {
        $this->langage->removeElement($langage);
    }

    /**
     * Get langage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLangage()
    {
        return $this->langage;
    }
}
