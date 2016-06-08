<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prefecture
 *
 * @ORM\Table(name="prefecture", indexes={@ORM\Index(name="fk_ville_prefecture", columns={"ville"})})
 * @ORM\Entity
 */
class Prefecture
{
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombre_conseillers", type="integer", nullable=true)
     */
    private $nombreConseillers;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Prefecture
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
     * Set nombreConseillers
     *
     * @param integer $nombreConseillers
     *
     * @return Prefecture
     */
    public function setNombreConseillers($nombreConseillers)
    {
        $this->nombreConseillers = $nombreConseillers;

        return $this;
    }

    /**
     * Get nombreConseillers
     *
     * @return integer
     */
    public function getNombreConseillers()
    {
        return $this->nombreConseillers;
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
     * Set ville
     *
     * @param \AppBundle\Entity\Ville $ville
     *
     * @return Prefecture
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
}
