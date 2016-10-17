<?php

namespace FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langage
 */
class Langage
{
    public function __toString()
    {
        return $this->getNom();
    }

    // generate

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $langage;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->langage = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Langage
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
     * Add langage
     *
     * @param \FormationBundle\Entity\Langage $langage
     *
     * @return Langage
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $module;


    /**
     * Add module
     *
     * @param \FormationBundle\Entity\Module $module
     *
     * @return Langage
     */
    public function addModule(\FormationBundle\Entity\Module $module)
    {
        $this->module[] = $module;

        return $this;
    }

    /**
     * Remove module
     *
     * @param \FormationBundle\Entity\Module $module
     */
    public function removeModule(\FormationBundle\Entity\Module $module)
    {
        $this->module->removeElement($module);
    }

    /**
     * Get module
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModule()
    {
        return $this->module;
    }
}
