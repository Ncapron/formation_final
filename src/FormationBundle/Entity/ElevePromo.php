<?php

namespace FormationBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ElevePromo
 */
class ElevePromo
{

    public function __construct() {
        $this->eleve = new ArrayCollection();
        $this->promotion = new ArrayCollection();
    }
    
    // GENERATE
    /**
     * @var int
     */
    private $id;


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
     * @var \FormationBundle\Entity\Eleve
     */
    private $eleve;

    /**
     * @var \FormationBundle\Entity\Promotion
     */
    private $promotion;


    /**
     * Set eleve
     *
     * @param \FormationBundle\Entity\Eleve $eleve
     *
     * @return ElevePromo
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
     * Set promotion
     *
     * @param \FormationBundle\Entity\Promotion $promotion
     *
     * @return ElevePromo
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
}
