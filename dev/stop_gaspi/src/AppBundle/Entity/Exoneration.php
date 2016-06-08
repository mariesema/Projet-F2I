<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exoneration
 *
 * @ORM\Table(name="exoneration", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_type_exoneration", columns={"type"})})
 * @ORM\Entity
 */
class Exoneration
{
    /**
     * @var string
     *
     * @ORM\Column(name="taux", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $taux;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\ModTypeExoneration
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ModTypeExoneration")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type", referencedColumnName="id")
     * })
     */
    private $type;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Utilisateur", mappedBy="exoneration")
     */
    private $utilisateur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->utilisateur = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set taux
     *
     * @param string $taux
     *
     * @return Exoneration
     */
    public function setTaux($taux)
    {
        $this->taux = $taux;

        return $this;
    }

    /**
     * Get taux
     *
     * @return string
     */
    public function getTaux()
    {
        return $this->taux;
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
     * Set type
     *
     * @param \AppBundle\Entity\ModTypeExoneration $type
     *
     * @return Exoneration
     */
    public function setType(\AppBundle\Entity\ModTypeExoneration $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\ModTypeExoneration
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Exoneration
     */
    public function addUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateur[] = $utilisateur;

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     */
    public function removeUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateur->removeElement($utilisateur);
    }

    /**
     * Get utilisateur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
