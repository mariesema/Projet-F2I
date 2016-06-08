<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consommation
 *
 * @ORM\Table(name="consommation", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Consommation
{
    /**
     * @var string
     *
     * @ORM\Column(name="quantite", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $quantite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee", type="datetime", nullable=true)
     */
    private $annee;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="bigint", nullable=true)
     */
    private $duree;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="consommation")
     * @ORM\JoinTable(name="conso_user",
     *   joinColumns={
     *     @ORM\JoinColumn(name="consommation_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     *   }
     * )
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
     * Set quantite
     *
     * @param string $quantite
     *
     * @return Consommation
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return string
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set annee
     *
     * @param \DateTime $annee
     *
     * @return Consommation
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return \DateTime
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     *
     * @return Consommation
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer
     */
    public function getDuree()
    {
        return $this->duree;
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
     * Add utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Consommation
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
