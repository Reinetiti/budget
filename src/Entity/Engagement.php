<?php

namespace App\Entity;

use App\Repository\EngagementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Engagement
 *
 * @ORM\Table(name="engagement", indexes={@ORM\Index(name="IDX_D86F0141E397CD4C", columns={"num_demande"})})
 * @ORM\Entity(repositoryClass=EngagementRepository::class)
 */
class Engagement
{
    /**
     * @var int
     *
     * @ORM\Column(name="num_engagement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="engagement_num_engagement_seq", allocationSize=1, initialValue=1)
     */
    private $numEngagement;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer", nullable=false)
     */
    private $montant;

    /**
     * @var \DemandeEngagement
     *
     * @ORM\ManyToOne(targetEntity=DemandeEngagement::class, inversedBy="engagements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="num_demande", referencedColumnName="num_demande")
     * })
     */
    private $numDemande;

    /**
     * @ORM\OneToMany(targetEntity=ProjetMandat::class, mappedBy="numEngagement")
     */
    private $projetMandats;

    public function __toString(){
        return(string)
        $this->getNumEngagement();
    }

    public function __construct()
    {
        $this->projetMandats = new ArrayCollection();
    }

    public function getNumEngagement(): ?int
    {
        return $this->numEngagement;
    }

    public function setNumEngagement(int $numEngagement): self
    {
        $this->numEngagement = $numEngagement;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getNumDemande(): ?DemandeEngagement
    {
        return $this->numDemande;
    }

    public function setNumDemande(?DemandeEngagement $numDemande): self
    {
        $this->numDemande = $numDemande;

        return $this;
    }

    /**
     * @return Collection|ProjetMandat[]
     */
    public function getProjetMandats(): Collection
    {
        return $this->projetMandats;
    }

    public function addProjetMandat(ProjetMandat $projetMandat): self
    {
        if (!$this->projetMandats->contains($projetMandat)) {
            $this->projetMandats[] = $projetMandat;
            $projetMandat->setNumEngagement($this);
        }

        return $this;
    }

    public function removeProjetMandat(ProjetMandat $visiter): self
    {
        if ($this->projetMandats->removeElement($projetMandat)) {
            // set the owning side to null (unless already changed)
            if ($projetMandat->getNumEngagement() === $this) {
                $projetMandat->setNumEngagement(null);
            }
        }

        return $this;
    }


}
