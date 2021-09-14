<?php

namespace App\Entity;

use App\Repository\CatserviceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Catservice
 *
 * @ORM\Table(name="catservice", indexes={@ORM\Index(name="IDX_C6A99824E70B032", columns={"typeid"})})
 * @ORM\Entity(repositoryClass=CatserviceRepository::class)
 */
class Catservice
{
    /**
     * @var int
     *
     * @ORM\Column(name="catid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="catservice_catid_seq", allocationSize=1, initialValue=1)
     */
    private $catid;

    /**
     * @var string
     *
     * @ORM\Column(name="libcat", type="text", nullable=false)
     */
    private $libcat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="catcode", type="text", nullable=true)
     */
    private $catcode;

    /**
     * @var \Typeunite
     *
     * @ORM\ManyToOne(targetEntity=Typeunite::class, inversedBy="catservices")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typeid", referencedColumnName="typeid")
     * })
     */
    private $typeid;

    public function __toString(){
        return(string)
        $this->getCatid();
    }

    public function getCatid(): ?int
    {
        return $this->catid;
    }

    public function getLibcat(): ?string
    {
        return $this->libcat;
    }

    public function setLibcat(string $libcat): self
    {
        $this->libcat = $libcat;

        return $this;
    }

    public function getCatcode(): ?string
    {
        return $this->catcode;
    }

    public function setCatcode(?string $catcode): self
    {
        $this->catcode = $catcode;

        return $this;
    }

    public function getTypeid(): ?Typeunite
    {
        return $this->typeid;
    }

    public function setTypeid(?Typeunite $typeid): self
    {
        $this->typeid = $typeid;

        return $this;
    }


}
