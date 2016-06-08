<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_type_user_utilisateur", columns={"type_user"}), @ORM\Index(name="fk_ville_utilisateur", columns={"ville"})})
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="application_mobile", type="boolean", nullable=true)
     */
    private $applicationMobile;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=true)
     */
    private $dateCreation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\ModTypeUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ModTypeUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_user", referencedColumnName="id")
     * })
     */
    private $typeUser;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Exoneration", inversedBy="utilisateur")
     * @ORM\JoinTable(name="exoneration_user",
     *   joinColumns={
     *     @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="exoneration_id", referencedColumnName="id")
     *   }
     * )
     */
    private $exoneration;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Consommation", mappedBy="utilisateur")
     */
    private $consommation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->exoneration = new \Doctrine\Common\Collections\ArrayCollection();
        $this->consommation = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Utilisateur
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Utilisateur
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Utilisateur
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
     * Set mail
     *
     * @param string $mail
     *
     * @return Utilisateur
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
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Utilisateur
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set applicationMobile
     *
     * @param boolean $applicationMobile
     *
     * @return Utilisateur
     */
    public function setApplicationMobile($applicationMobile)
    {
        $this->applicationMobile = $applicationMobile;

        return $this;
    }

    /**
     * Get applicationMobile
     *
     * @return boolean
     */
    public function getApplicationMobile()
    {
        return $this->applicationMobile;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Utilisateur
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
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
     * Set typeUser
     *
     * @param \AppBundle\Entity\ModTypeUser $typeUser
     *
     * @return Utilisateur
     */
    public function setTypeUser(\AppBundle\Entity\ModTypeUser $typeUser = null)
    {
        $this->typeUser = $typeUser;

        return $this;
    }

    /**
     * Get typeUser
     *
     * @return \AppBundle\Entity\ModTypeUser
     */
    public function getTypeUser()
    {
        return $this->typeUser;
    }

    /**
     * Set ville
     *
     * @param \AppBundle\Entity\Ville $ville
     *
     * @return Utilisateur
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
     * Add exoneration
     *
     * @param \AppBundle\Entity\Exoneration $exoneration
     *
     * @return Utilisateur
     */
    public function addExoneration(\AppBundle\Entity\Exoneration $exoneration)
    {
        $this->exoneration[] = $exoneration;

        return $this;
    }

    /**
     * Remove exoneration
     *
     * @param \AppBundle\Entity\Exoneration $exoneration
     */
    public function removeExoneration(\AppBundle\Entity\Exoneration $exoneration)
    {
        $this->exoneration->removeElement($exoneration);
    }

    /**
     * Get exoneration
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExoneration()
    {
        return $this->exoneration;
    }

    /**
     * Add consommation
     *
     * @param \AppBundle\Entity\Consommation $consommation
     *
     * @return Utilisateur
     */
    public function addConsommation(\AppBundle\Entity\Consommation $consommation)
    {
        $this->consommation[] = $consommation;

        return $this;
    }

    /**
     * Remove consommation
     *
     * @param \AppBundle\Entity\Consommation $consommation
     */
    public function removeConsommation(\AppBundle\Entity\Consommation $consommation)
    {
        $this->consommation->removeElement($consommation);
    }

    /**
     * Get consommation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConsommation()
    {
        return $this->consommation;
    }
}
