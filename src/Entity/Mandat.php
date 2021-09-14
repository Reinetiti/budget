<?php

namespace App\Entity;

use App\Repository\MandatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Mandat
 *
 * @ORM\Table(name="mandat", indexes={@ORM\Index(name="IDX_1E53EFD5E934CB11", columns={"num_projet"})})
 * @ORM\Entity(repositoryClass=MandatRepository::class)
 */
class Mandat
{
    /**
     * @var int
     *
     * @ORM\Column(name="num_mandat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mandat_num_mandat_seq", allocationSize=1, initialValue=1)
     */
    private $numMandat;

    /**
     * @var int
     *
     * @ORM\Column(name="montant_mandat", type="integer", nullable=false)
     */
    private $montantMandat;

    /**
     * @var \ProjetMandat
     *
     * @ORM\ManyToOne(targetEntity=ProjetMandat::class, inversedBy="mandats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="num_projet", referencedColumnName="num_projet")
     * })
     */
    private $numProjet;

    public function __toString(){
        return(string)
        $this->getNumMandat();
    }

    public function getNumMandat(): ?int
    {
        return $this->numMandat;
    }

    public function setNumMandat(int $numMandat): self
    {
        $this->numMandat = $numMandat;

        return $this;
    }

    public function getMontantMandat(): ?int
    {
        return $this->montantMandat;
    }

    public function setMontantMandat(int $montantMandat): self
    {
        $this->montantMandat = $montantMandat;

        return $this;
    }

    public function getNumProjet(): ?ProjetMandat
    {
        return $this->numProjet;
    }

    public function setNumProjet(?ProjetMandat $numProjet): self
    {
        $this->numProjet = $numProjet;

        return $this;
    }


}
