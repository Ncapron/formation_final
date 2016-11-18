<?php

namespace FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eleve
 */
class Eleve
{

    public function __toString()
    {
        return $this->getNom();
    }

    public $file;

    protected function getUploadDir()
    {
        return 'uploads/eleves';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->logo ? null : $this->getUploadDir().'/'.$this->logo;
    }

    public function getAbsolutePath()
    {
        return null === $this->logo ? null : $this->getUploadRootDir().'/'.$this->logo;
    }

    public $filecv;

    protected function getUploadDirCV()
    {
        return 'uploads/cv';
    }

    protected function getUploadRootDirCV()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDirCV();
    }

    public function getWebPathCV()
    {
        return null === $this->cv ? null : $this->getUploadDirCV().'/'.$this->cv;
    }

    public function getAbsolutePathCV()
    {
        return null === $this->cv ? null : $this->getUploadRootDirCV().'/'.$this->cv;
    }

    public $filecva;

    protected function getUploadDirCVA()
    {
        return 'uploads/cva';
    }

    protected function getUploadRootDirCVA()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDirCVA();
    }

    public function getWebPathCVA()
    {
        return null === $this->cva ? null : $this->getUploadDirCVA().'/'.$this->cva;
    }

    public function getAbsolutePathCVA()
    {
        return null === $this->cva ? null : $this->getUploadRootDirCVA().'/'.$this->cva;
    }

    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->logo = uniqid().'.'.$this->file->guessExtension();
        }

        if (null !== $this->filecv) {
            // do whatever you want to generate a unique name
            $this->cv = uniqid().'.'.$this->filecv->guessExtension();
        }

        if (null !== $this->filecva) {
            // do whatever you want to generate a unique name
            $this->cva = uniqid().'.'.$this->filecva->guessExtension();
        }
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PrePersist
     */
    public function setExpiresAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->logo);

        unset($this->file);

        if (null === $this->filecv) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->filecv->move($this->getUploadRootDirCV(), $this->cv);

        unset($this->filecv);

        if (null === $this->filecva) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->filecva->move($this->getUploadRootDirCVA(), $this->cva);

        unset($this->filecva);
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }

        if ($filecv = $this->getAbsolutePathCV()) {
            unlink($filecv);
        }

        if ($filecva = $this->getAbsolutePathCVA()) {
            unlink($filecva);
        }
    }

    //generate
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var integer
     */
    private $cp;

    /**
     * @var string
     */
    private $ville;

    /**
     * @var string
     */
    private $sexe;

    /**
     * @var integer
     */
    private $tel;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var \DateTime
     */
    private $datenaissance;

    /**
     * @var boolean
     */
    private $archive;

    /**
     * @var string
     */
    private $cv;

    /**
     * @var string
     */
    private $cva;

    /**
     * @var string
     */
    private $etude;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $promotion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $module;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->promotion = new \Doctrine\Common\Collections\ArrayCollection();
        $this->module = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Eleve
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
     * Set logo
     *
     * @param string $logo
     *
     * @return Eleve
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Eleve
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     *
     * @return Eleve
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Eleve
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Eleve
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     *
     * @return Eleve
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return integer
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Eleve
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set datenaissance
     *
     * @param \DateTime $datenaissance
     *
     * @return Eleve
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return \DateTime
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * Set archive
     *
     * @param boolean $archive
     *
     * @return Eleve
     */
    public function setArchive($archive)
    {
        $this->archive = $archive;

        return $this;
    }

    /**
     * Get archive
     *
     * @return boolean
     */
    public function getArchive()
    {
        return $this->archive;
    }

    /**
     * Set cv
     *
     * @param string $cv
     *
     * @return Eleve
     */
    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Set cva
     *
     * @param string $cva
     *
     * @return Eleve
     */
    public function setCva($cva)
    {
        $this->cva = $cva;

        return $this;
    }

    /**
     * Get cva
     *
     * @return string
     */
    public function getCva()
    {
        return $this->cva;
    }

    /**
     * Set etude
     *
     * @param string $etude
     *
     * @return Eleve
     */
    public function setEtude($etude)
    {
        $this->etude = $etude;

        return $this;
    }

    /**
     * Get etude
     *
     * @return string
     */
    public function getEtude()
    {
        return $this->etude;
    }

    /**
     * Add promotion
     *
     * @param \FormationBundle\Entity\Promotion $promotion
     *
     * @return Eleve
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
     * Add module
     *
     * @param \FormationBundle\Entity\Module $module
     *
     * @return Eleve
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
