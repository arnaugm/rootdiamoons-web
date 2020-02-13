<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConcertRepository")
 * @ORM\Table(name="concerts")
 */
class Concert
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $data;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $concertCat;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $concertCas;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $concertEng;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lloc;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ciutat;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $adreca;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $grups;

    /**
     * @ORM\Column(type="float")
     */
    private $preu;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $preuAnticipada;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comprar;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $arribar;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $mapa;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $cartellNom;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $cartellTipus;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cartellMida;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $textCat;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $textCas;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $textEng;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cancelat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getConcertCat(): ?string
    {
        return $this->concertCat;
    }

    public function setConcertCat(string $concertCat): self
    {
        $this->concertCat = $concertCat;

        return $this;
    }

    public function getConcertCas(): ?string
    {
        return $this->concertCas;
    }

    public function setConcertCas(string $concertCas): self
    {
        $this->concertCas = $concertCas;

        return $this;
    }

    public function getConcertEng(): ?string
    {
        return $this->concertEng;
    }

    public function setConcertEng(string $concertEng): self
    {
        $this->concertEng = $concertEng;

        return $this;
    }

    public function getLloc(): ?string
    {
        return $this->lloc;
    }

    public function setLloc(string $lloc): self
    {
        $this->lloc = $lloc;

        return $this;
    }

    public function getCiutat(): ?string
    {
        return $this->ciutat;
    }

    public function setCiutat(string $ciutat): self
    {
        $this->ciutat = $ciutat;

        return $this;
    }

    public function getAdreca(): ?string
    {
        return $this->adreca;
    }

    public function setAdreca(string $adreca): self
    {
        $this->adreca = $adreca;

        return $this;
    }

    public function getGrups(): ?string
    {
        return $this->grups;
    }

    public function setGrups(string $grups): self
    {
        $this->grups = $grups;

        return $this;
    }

    public function getPreu(): ?float
    {
        return $this->preu;
    }

    public function setPreu(float $preu): self
    {
        $this->preu = $preu;

        return $this;
    }

    public function getPreuAnticipada(): ?float
    {
        return $this->preuAnticipada;
    }

    public function setPreuAnticipada(?float $preuAnticipada): self
    {
        $this->preuAnticipada = $preuAnticipada;

        return $this;
    }

    public function getComprar(): ?string
    {
        return $this->comprar;
    }

    public function setComprar(?string $comprar): self
    {
        $this->comprar = $comprar;

        return $this;
    }

    public function getArribar(): ?string
    {
        return $this->arribar;
    }

    public function setArribar(?string $arribar): self
    {
        $this->arribar = $arribar;

        return $this;
    }

    public function getMapa(): ?string
    {
        return $this->mapa;
    }

    public function setMapa(?string $mapa): self
    {
        $this->mapa = $mapa;

        return $this;
    }

    public function getCartellNom(): ?string
    {
        return $this->cartellNom;
    }

    public function setCartellNom(?string $cartellNom): self
    {
        $this->cartellNom = $cartellNom;

        return $this;
    }

    public function getCartellTipus(): ?string
    {
        return $this->cartellTipus;
    }

    public function setCartellTipus(?string $cartellTipus): self
    {
        $this->cartellTipus = $cartellTipus;

        return $this;
    }

    public function getCartellMida(): ?int
    {
        return $this->cartellMida;
    }

    public function setCartellMida(?int $cartellMida): self
    {
        $this->cartellMida = $cartellMida;

        return $this;
    }

    public function getTextCat(): ?string
    {
        return $this->textCat;
    }

    public function setTextCat(string $textCat): self
    {
        $this->textCat = $textCat;

        return $this;
    }

    public function getTextCas(): ?string
    {
        return $this->textCas;
    }

    public function setTextCas(string $textCas): self
    {
        $this->textCas = $textCas;

        return $this;
    }

    public function getTextEng(): ?string
    {
        return $this->textEng;
    }

    public function setTextEng(string $textEng): self
    {
        $this->textEng = $textEng;

        return $this;
    }

    /**
     * Gets the corresponding text according to the locale
     * @param string $locale
     * @return string|null
     */
    public function getText(string $locale): ?string
    {
        if ($locale == 'es') {
            return $this->getTextCas();
        } elseif ($locale == 'en') {
            return $this->getTextEng();
        } else {
            return $this->getTextCat();
        }
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getCancelat(): ?bool
    {
        return $this->cancelat;
    }

    public function setCancelat(bool $cancelat): self
    {
        $this->cancelat = $cancelat;

        return $this;
    }
}
