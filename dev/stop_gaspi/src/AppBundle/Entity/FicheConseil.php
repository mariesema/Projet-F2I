<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FicheConseil
 *
 * @ORM\Table(name="fiche_conseil", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_domaine_fiche", columns={"domaine"})})
 * @ORM\Entity
 */
class FicheConseil
{
    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", length=65535, nullable=true)
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\ModTypeDomaine
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ModTypeDomaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="domaine", referencedColumnName="id")
     * })
     */
    private $domaine;



    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return FicheConseil
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return FicheConseil
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
     * Set domaine
     *
     * @param \AppBundle\Entity\ModTypeDomaine $domaine
     *
     * @return FicheConseil
     */
    public function setDomaine(\AppBundle\Entity\ModTypeDomaine $domaine = null)
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * Get domaine
     *
     * @return \AppBundle\Entity\ModTypeDomaine
     */
    public function getDomaine()
    {
        return $this->domaine;
    }
}
