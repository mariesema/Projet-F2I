<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RendezVous
 *
 * @ORM\Table(name="rendez_vous", indexes={@ORM\Index(name="fk_ville_rdv", columns={"ville"}), @ORM\Index(name="fk_utilisateur_rdv", columns={"utilisateur_id"}), @ORM\Index(name="fk_domaine_rdv", columns={"domaine"}), @ORM\Index(name="IDX_65E8AA0A1AC39A0D", columns={"conseiller_id"})})
 * @ORM\Entity
 */
class RendezVous
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure", type="datetime", nullable=true)
     */
    private $heure;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var \AppBundle\Entity\Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     * })
     */
    private $utilisateur;

    /**
     * @var \AppBundle\Entity\Conseiller
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Conseiller")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conseiller_id", referencedColumnName="id")
     * })
     */
    private $conseiller;

    /**
     * @var \AppBundle\Entity\Ville
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ville", referencedColumnName="id")
     * })
     */
    private $ville;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return RendezVous
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set heure
     *
     * @param \DateTime $heure
     *
     * @return RendezVous
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return \DateTime
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return RendezVous
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
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return RendezVous
     */
    public function setUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set conseiller
     *
     * @param \AppBundle\Entity\Conseiller $conseiller
     *
     * @return RendezVous
     */
    public function setConseiller(\AppBundle\Entity\Conseiller $conseiller)
    {
        $this->conseiller = $conseiller;

        return $this;
    }

    /**
     * Get conseiller
     *
     * @return \AppBundle\Entity\Conseiller
     */
    public function getConseiller()
    {
        return $this->conseiller;
    }

    /**
     * Set ville
     *
     * @param \AppBundle\Entity\Ville $ville
     *
     * @return RendezVous
     */
    public function setVille(\AppBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \AppBundle\Entity\Ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set domaine
     *
     * @param \AppBundle\Entity\ModTypeDomaine $domaine
     *
     * @return RendezVous
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
