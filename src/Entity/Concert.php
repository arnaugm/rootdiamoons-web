<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concert
 */
class Concert
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var string
     */
    private $concertCat;

    /**
     * @var string
     */
    private $concertCas;

    /**
     * @var string
     */
    private $concertEng;

    /**
     * @var string
     */
    private $lloc;

    /**
     * @var string
     */
    private $ciutat;

    /**
     * @var string
     */
    private $adreca;

    /**
     * @var string
     */
    private $grups;

    /**
     * @var float
     */
    private $preu;

    /**
     * @var float
     */
    private $preuAnticipada;

    /**
     * @var string
     */
    private $comprar;

    /**
     * @var string
     */
    private $arribar;

    /**
     * @var string
     */
    private $mapa;

    /**
     * @var string
     */
    private $cartellNom;

    /**
     * @var string
     */
    private $cartellTipus;

    /**
     * @var integer
     */
    private $cartellMida;

    /**
     * @var string
     */
    private $textCat;

    /**
     * @var string
     */
    private $textCas;

    /**
     * @var string
     */
    private $textEng;

    /**
     * @var string
     */
    private $facebook;

    /**
     * @var boolean
     */
    private $cancelat;


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
     * Set data
     *
     * @param \DateTime $data
     * @return Concert
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set concertCat
     *
     * @param string $concertCat
     * @return Concert
     */
    public function setConcertCat($concertCat)
    {
        $this->concertCat = $concertCat;

        return $this;
    }

    /**
     * Get concertCat
     *
     * @return string
     */
    public function getConcertCat()
    {
        return $this->concertCat;
    }

    /**
     * Set concertCas
     *
     * @param string $concertCas
     * @return Concert
     */
    public function setConcertCas($concertCas)
    {
        $this->concertCas = $concertCas;

        return $this;
    }

    /**
     * Get concertCas
     *
     * @return string
     */
    public function getConcertCas()
    {
        return $this->concertCas;
    }

    /**
     * Set concertEng
     *
     * @param string $concertEng
     * @return Concert
     */
    public function setConcertEng($concertEng)
    {
        $this->concertEng = $concertEng;

        return $this;
    }

    /**
     * Get concertEng
     *
     * @return string
     */
    public function getConcertEng()
    {
        return $this->concertEng;
    }

    /**
     * Gets the corresponding concert name according to the locale
     *
     * @param string $locale
     * @return string
     */
    public function getConcert($locale)
    {
        if ($locale == 'es') {
            return $this->getConcertCas();
        } elseif ($locale == 'en') {
            return $this->getConcertEng();
        } else {
            return $this->getConcertCat();
        }
    }

    /**
     * Set lloc
     *
     * @param string $lloc
     * @return Concert
     */
    public function setLloc($lloc)
    {
        $this->lloc = $lloc;

        return $this;
    }

    /**
     * Get lloc
     *
     * @return string
     */
    public function getLloc()
    {
        return $this->lloc;
    }

    /**
     * Set ciutat
     *
     * @param string $ciutat
     * @return Concert
     */
    public function setCiutat($ciutat)
    {
        $this->ciutat = $ciutat;

        return $this;
    }

    /**
     * Get ciutat
     *
     * @return string
     */
    public function getCiutat()
    {
        return $this->ciutat;
    }

    /**
     * Set adreca
     *
     * @param string $adreca
     * @return Concert
     */
    public function setAdreca($adreca)
    {
        $this->adreca = $adreca;

        return $this;
    }

    /**
     * Get adreca
     *
     * @return string
     */
    public function getAdreca()
    {
        return $this->adreca;
    }

    /**
     * Set grups
     *
     * @param string $grups
     * @return Concert
     */
    public function setGrups($grups)
    {
        $this->grups = $grups;

        return $this;
    }

    /**
     * Get grups
     *
     * @return string
     */
    public function getGrups()
    {
        return $this->grups;
    }

    /**
     * Set preu
     *
     * @param float $preu
     * @return Concert
     */
    public function setPreu($preu)
    {
        $this->preu = $preu;

        return $this;
    }

    /**
     * Get preu
     *
     * @return float
     */
    public function getPreu()
    {
        return $this->preu;
    }

    /**
     * Set preuAnticipada
     *
     * @param float $preuAnticipada
     * @return Concert
     */
    public function setPreuAnticipada($preuAnticipada)
    {
        $this->preuAnticipada = $preuAnticipada;

        return $this;
    }

    /**
     * Get preuAnticipada
     *
     * @return float
     */
    public function getPreuAnticipada()
    {
        return $this->preuAnticipada;
    }

    /**
     * Set comprar
     *
     * @param string $comprar
     * @return Concert
     */
    public function setComprar($comprar)
    {
        $this->comprar = $comprar;

        return $this;
    }

    /**
     * Get comprar
     *
     * @return string
     */
    public function getComprar()
    {
        return $this->comprar;
    }

    /**
     * Set arribar
     *
     * @param string $arribar
     * @return Concert
     */
    public function setArribar($arribar)
    {
        $this->arribar = $arribar;

        return $this;
    }

    /**
     * Get arribar
     *
     * @return string
     */
    public function getArribar()
    {
        return $this->arribar;
    }

    /**
     * Set mapa
     *
     * @param string $mapa
     * @return Concert
     */
    public function setMapa($mapa)
    {
        $this->mapa = $mapa;

        return $this;
    }

    /**
     * Get mapa
     *
     * @return string
     */
    public function getMapa()
    {
        return $this->mapa;
    }

    /**
     * Set cartellNom
     *
     * @param string $cartellNom
     * @return Concert
     */
    public function setCartellNom($cartellNom)
    {
        $this->cartellNom = $cartellNom;

        return $this;
    }

    /**
     * Get cartellNom
     *
     * @return string
     */
    public function getCartellNom()
    {
        return $this->cartellNom;
    }

    /**
     * Set cartellTipus
     *
     * @param string $cartellTipus
     * @return Concert
     */
    public function setCartellTipus($cartellTipus)
    {
        $this->cartellTipus = $cartellTipus;

        return $this;
    }

    /**
     * Get cartellTipus
     *
     * @return string
     */
    public function getCartellTipus()
    {
        return $this->cartellTipus;
    }

    /**
     * Set cartellMida
     *
     * @param integer $cartellMida
     * @return Concert
     */
    public function setCartellMida($cartellMida)
    {
        $this->cartellMida = $cartellMida;

        return $this;
    }

    /**
     * Get cartellMida
     *
     * @return integer
     */
    public function getCartellMida()
    {
        return $this->cartellMida;
    }

    /**
     * Set textCat
     *
     * @param string $textCat
     * @return Concert
     */
    public function setTextCat($textCat)
    {
        $this->textCat = $textCat;

        return $this;
    }

    /**
     * Get textCat
     *
     * @return string
     */
    public function getTextCat()
    {
        return $this->textCat;
    }

    /**
     * Set textCas
     *
     * @param string $textCas
     * @return Concert
     */
    public function setTextCas($textCas)
    {
        $this->textCas = $textCas;

        return $this;
    }

    /**
     * Get textCas
     *
     * @return string
     */
    public function getTextCas()
    {
        return $this->textCas;
    }

    /**
     * Set textEng
     *
     * @param string $textEng
     * @return Concert
     */
    public function setTextEng($textEng)
    {
        $this->textEng = $textEng;

        return $this;
    }

    /**
     * Get textEng
     *
     * @return string
     */
    public function getTextEng()
    {
        return $this->textEng;
    }

    /**
     * Gets the corresponding text according to the locale
     *
     * @param string $locale
     * @return string
     */
    public function getText($locale)
    {
        if ($locale == 'es') {
            return $this->getTextCas();
        } elseif ($locale == 'en') {
            return $this->getTextEng();
        } else {
            return $this->getTextCat();
        }
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return Concert
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set cancelat
     *
     * @param boolean $cancelat
     * @return Concert
     */
    public function setCancelat($cancelat)
    {
        $this->cancelat = $cancelat;

        return $this;
    }

    /**
     * Get cancelat
     *
     * @return boolean
     */
    public function getCancelat()
    {
        return $this->cancelat;
    }
}
