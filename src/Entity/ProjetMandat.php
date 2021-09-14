<?php

namespace App\Entity;

use App\Repository\ProjetMandatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ProjetMandat
 *
 * @ORM\Table(name="projet_mandat", indexes={@ORM\Index(name="IDX_3CFA5F83577841CA", columns={"num_engagement"})})
 * @ORM\Entity(repositoryClass=ProjetMandatRepository::class)
 */
class ProjetMandat
{
    /**
     * @var int
     *
     * @ORM\Column(name="num_projet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="projet_mandat_num_projet_seq", allocationSize=1, initialValue=1)
     */
    private $numProjet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_projet", type="date", nullable=false)
     */
    private $dateProjet;

    /**
     * @var string
     *
     * @ORM\Column(name="objet_projet", type="text", nullable=false)
     */
    private $objetProjet;

    /**
     * @var \Engagement
     *
     * @ORM\ManyToOne(targetEntity=Engagement::class, inversedBy="projetMandats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="num_engagement", referencedColumnName="num_engagement")
     * })
     */
    private $numEngagement;

    /**
     * @ORM\OneToMany(targetEntity=Mandat::class, mappedBy="numProjet")
     */
    private $mandats;

    public function __toString(){
        return(string)
        $this->getNumProjet();
    }

    public function __construct()
    {
        $this->mandats = new ArrayCollection();
    }

    public function getNumProjet(): ?int
    {
        return $this->numProjet;
    }

    public function setNumProjet(int $numProjet): self
    {
        $this->numProjet = $numProjet;

        return $this;
    }

    public function getDateProjet(): ?\DateTimeInterface
    {
        return $this->dateProjet;
    }

    public function setDateProjet(\DateTimeInterface $dateProjet): self
    {
        $this->dateProjet = $dateProjet;

        return $this;
    }

    public function getObjetProjet(): ?string
    {
        return $this->objetProjet;
    }

    public function setObjetProjet(string $objetProjet): self
    {
        $this->objetProjet = $objetProjet;

        return $this;
    }

    public function getNumEngagement(): ?Engagement
    {
        return $this->numEngagement;
    }

    public function setNumEngagement(?Engagement $numEngagement): self
    {
        $this->numEngagement = $numEngagement;

        return $this;
    }

    /**
     * @return Collection|Mandat[]
     */
    public function getMandats(): Collection
    {
        return $this->mandats;
    }

    public function addMandat(Mandat $mandat): self
    {
        if (!$this->mandats->contains($mandat)) {
            $this->mandats[] = $mandat;
            $mandat->setNumProjet($this);
        }

        return $this;
    }

    public function removeMandat(Mandat $mandat): self
    {
        if ($this->mandats->removeElement($mandat)) {
            // set the owning side to null (unless already changed)
            if ($mandat->getNumProjet() === $this) {
                $mandat->setNumProjet(null);
            }
        }

        return $this;
    }


}
