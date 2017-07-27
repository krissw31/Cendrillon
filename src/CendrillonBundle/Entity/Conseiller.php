<?php
/**
 * Created by PhpStorm.
 * User: krissw
 * Date: 28/06/2017
 * Time: 11:46
 */

namespace CendrillonBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="wp_cendrillon_6239_conseillere")
 */
class Conseiller
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     *
     * @ORM\OneToOne(targetEntity="CendrillonBundle\Entity\User",cascade={"persist"})
     */
    private $user_id;

    /**
     * @ORM\Column(type="string")
     */
    private $user_sexe;

    /**
     * @ORM\Column(type="integer")
     */
    private $indice_confiance;

    /**
     * @ORM\Column(type="string")
     */
    private $confiance;

    /**
     * @ORM\Column(type="date")
     */
    private $date_register;

    /**
     * @ORM\Column(type="string",length=50)
     */
    private $displayname;

    /**
     * @ORM\Column(type="boolean")
     */
    private $garcon;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fille;
    /**
     * @ORM\Column(type="boolean")
     */
    private $college;

    /**
     * @ORM\Column(type="boolean")
     */
    private $lycee;

    /**
     * @ORM\Column(type="boolean")
     */
    private $adulte;

    /**
     * @ORM\Column(type="boolean")
     *
     */
    private $amour;

    /**
     * @ORM\Column(type="boolean")
     */
    private $amitie;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sexo;

    /**
     * @ORM\Column(type="text")
     */
    private $presentation;

    /**
     * @ORM\Column(type="date")
     */
    private $last_connexion;



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
     * Set userSexe
     *
     * @param string $userSexe
     *
     * @return Conseiller
     */
    public function setUserSexe($userSexe)
    {
        $this->user_sexe = $userSexe;

        return $this;
    }

    /**
     * Get userSexe
     *
     * @return string
     */
    public function getUserSexe()
    {
        return $this->user_sexe;
    }

    /**
     * Set indiceConfiance
     *
     * @param integer $indiceConfiance
     *
     * @return Conseiller
     */
    public function setIndiceConfiance($indiceConfiance)
    {
        $this->indice_confiance = $indiceConfiance;

        return $this;
    }

    /**
     * Get indiceConfiance
     *
     * @return integer
     */
    public function getIndiceConfiance()
    {
        return $this->indice_confiance;
    }

    /**
     * Set confiance
     *
     * @param string $confiance
     *
     * @return Conseiller
     */
    public function setConfiance($confiance)
    {
        $this->confiance = $confiance;

        return $this;
    }

    /**
     * Get confiance
     *
     * @return string
     */
    public function getConfiance()
    {
        return $this->confiance;
    }

    /**
     * Set dateRegister
     *
     * @param \DateTime $dateRegister
     *
     * @return Conseiller
     */
    public function setDateRegister($dateRegister)
    {
        $this->date_register = $dateRegister;

        return $this;
    }

    /**
     * Get dateRegister
     *
     * @return \DateTime
     */
    public function getDateRegister()
    {
        return $this->date_register;
    }

    /**
     * Set displayname
     *
     * @param string $displayname
     *
     * @return Conseiller
     */
    public function setDisplayname($displayname)
    {
        $this->displayname = $displayname;

        return $this;
    }

    /**
     * Get displayname
     *
     * @return string
     */
    public function getDisplayname()
    {
        return $this->displayname;
    }

    /**
     * Set garcon
     *
     * @param boolean $garcon
     *
     * @return Conseiller
     */
    public function setGarcon($garcon)
    {
        $this->garcon = $garcon;

        return $this;
    }

    /**
     * Get garcon
     *
     * @return boolean
     */
    public function getGarcon()
    {
        return $this->garcon;
    }

    /**
     * Set fille
     *
     * @param boolean $fille
     *
     * @return Conseiller
     */
    public function setFille($fille)
    {
        $this->fille = $fille;

        return $this;
    }

    /**
     * Get fille
     *
     * @return boolean
     */
    public function getFille()
    {
        return $this->fille;
    }

    /**
     * Set college
     *
     * @param boolean $college
     *
     * @return Conseiller
     */
    public function setCollege($college)
    {
        $this->college = $college;

        return $this;
    }

    /**
     * Get college
     *
     * @return boolean
     */
    public function getCollege()
    {
        return $this->college;
    }

    /**
     * Set lycee
     *
     * @param boolean $lycee
     *
     * @return Conseiller
     */
    public function setLycee($lycee)
    {
        $this->lycee = $lycee;

        return $this;
    }

    /**
     * Get lycee
     *
     * @return boolean
     */
    public function getLycee()
    {
        return $this->lycee;
    }

    /**
     * Set adulte
     *
     * @param boolean $adulte
     *
     * @return Conseiller
     */
    public function setAdulte($adulte)
    {
        $this->adulte = $adulte;

        return $this;
    }

    /**
     * Get adulte
     *
     * @return boolean
     */
    public function getAdulte()
    {
        return $this->adulte;
    }

    /**
     * Set amour
     *
     * @param boolean $amour
     *
     * @return Conseiller
     */
    public function setAmour($amour)
    {
        $this->amour = $amour;

        return $this;
    }

    /**
     * Get amour
     *
     * @return boolean
     */
    public function getAmour()
    {
        return $this->amour;
    }

    /**
     * Set amitie
     *
     * @param boolean $amitie
     *
     * @return Conseiller
     */
    public function setAmitie($amitie)
    {
        $this->amitie = $amitie;

        return $this;
    }

    /**
     * Get amitie
     *
     * @return boolean
     */
    public function getAmitie()
    {
        return $this->amitie;
    }

    /**
     * Set sexo
     *
     * @param boolean $sexo
     *
     * @return Conseiller
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return boolean
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     *
     * @return Conseiller
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set lastConnexion
     *
     * @param \DateTime $lastConnexion
     *
     * @return Conseiller
     */
    public function setLastConnexion($lastConnexion)
    {
        $this->last_connexion = $lastConnexion;

        return $this;
    }

    /**
     * Get lastConnexion
     *
     * @return \DateTime
     */
    public function getLastConnexion()
    {
        return $this->last_connexion;
    }

    /**
     * Set userId
     *
     * @param \CendrillonBundle\Entity\User $userId
     *
     * @return Conseiller
     */
    public function setUserId(\CendrillonBundle\Entity\User $userId = null)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \CendrillonBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
