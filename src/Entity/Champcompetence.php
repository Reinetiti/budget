<?php

namespace App\Entity;

use App\Repository\ChampcompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Champcompetence
 *
 * @ORM\Table(name="champcompetence", indexes={@ORM\Index(name="IDX_D7F081A58E10B992", columns={"communeid"})})
 * @ORM\Entity(repositoryClass=ChampcompetenceRepository::class)
 */
class Champcompetence
{
    /**
     * @var int
     *
     * @ORM\Column(name="competenceid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="champcompetence_competenceid_seq", allocationSize=1, initialValue=1)
     */
    private $competenceid;

    /**
     * @var string
     *
     * @ORM\Column(name="libcompetence", type="text", nullable=false)
     */
    private $libcompetence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="competencecode", type="text", nullable=true)
     */
    private $competencecode;

    /**
     * @var \Commune
     *
     * @ORM\ManyToOne(targetEntity=Commune::class, inversedBy="champcompetences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="communeid", referencedColumnName="communeid")
     * })
     */
    private $communeid;

    public function __toString(){
        return(string)
        $this->getCompetenceid();
    }

    public function getCompetenceid(): ?int
    {
        return $this->competenceid;
    }

    public function setCompetenceid(int $competenceid): self
    {
        $this->competenceid = $competenceid;

        return $this;
    }

    public function getLibcompetence(): ?string
    {
        return $this->libcompetence;
    }

    public function setLibcompetence(string $libcompetence): self
    {
        $this->libcompetence = $libcompetence;

        return $this;
    }

    public function getCompetencecode(): ?string
    {
        return $this->competencecode;
    }

    public function setCompetencecode(?string $competencecode): self
    {
        $this->competencecode = $competencecode;

        return $this;
    }

    public function getCommuneid(): ?Commune
    {
        return $this->communeid;
    }

    public function setCommuneid(?Commune $communeid): self
    {
        $this->communeid = $communeid;

        return $this;
    }


}
