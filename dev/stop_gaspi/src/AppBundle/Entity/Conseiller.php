<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conseiller
 *
 * @ORM\Table(name="conseiller", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_conseiller_prefecture", columns={"prefecture_id"}), @ORM\Index(name="fk_conseiller_disponibilite", columns={"disponibilites"})})
 * @ORM\Entity
 */
class Conseiller
{
    /**
     * @var \AppBundle\Entity\Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Utilisateur", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Prefecture
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Prefecture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prefecture_id", referencedColumnName="id")
     * })
     */
    private $prefecture;

    /**
     * @var \AppBundle\Entity\Disponibilite
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Disponibilite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="disponibilites", referencedColumnName="id")
     * })
     */
    private $disponibilites;



    /**
     * Set id
     *
     * @param \AppBundle\Entity\Utilisateur $id
     *
     * @return Conseiller
     */
    public function setId(\AppBundle\Entity\Utilisateur $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prefecture
     *
     * @param \AppBundle\Entity\Prefecture $prefecture
     *
     * @return Conseiller
     */
    public function setPrefecture(\AppBundle\Entity\Prefecture $prefecture = null)
    {
        $this->prefecture = $prefecture;

        return $this;
    }

    /**
     * Get prefecture
     *
     * @return \AppBundle\Entity\Prefecture
     */
    public function getPrefecture()
    {
        return $this->prefecture;
    }

    /**
     * Set disponibilites
     *
     * @param \AppBundle\Entity\Disponibilite $disponibilites
     *
     * @return Conseiller
     */
    public function setDisponibilites(\AppBundle\Entity\Disponibilite $disponibilites = null)
    {
        $this->disponibilites = $disponibilites;

        return $this;
    }

    /**
     * Get disponibilites
     *
     * @return \AppBundle\Entity\Disponibilite
     */
    public function getDisponibilites()
    {
        return $this->disponibilites;
    }

}
