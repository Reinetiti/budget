<?php

namespace App\Entity;

use App\Repository\DemandeEngagementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeEngagement
 *
 * @ORM\Table(name="demande_engagement", indexes={@ORM\Index(name="IDX_2EA30BE0BF396750", columns={"id"})})
 * @ORM\Entity(repositoryClass=DemandeEngagementRepository::class)
 */
class DemandeEngagement
{
    /**
     * @var int
     *
     * @ORM\Column(name="num_demande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="demande_engagement_num_demande_seq", allocationSize=1, initialValue=1)
     */
    private $numDemande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_demande", type="date", nullable=false)
     */
    private $dateDemande;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="text", nullable=false)
     */
    private $objet;

    /**
     * @var int
     *
     * @ORM\Column(name="montant_total", type="integer", nullable=false)
     */
    private $montantTotal;

    /**
     * @var \Budgetisation
     *
     * @ORM\ManyToOne(targetEntity=Budgetisation::class, inversedBy="demandeEngagements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Engagement::class, mappedBy="numDemande")
     */
    private $engagements;

    /**
     * @ORM\OneToMany(targetEntity=PieceJustificative::class, mappedBy="numDemande")
     */
    private $pieceJustificatives;

    public function __toString(){
        return(string)
        $this->getNumDemande();
    }

    public function __construct()
    {
        $this->engagements = new ArrayCollection();
        $this->pieceJustificatives = new ArrayCollection();
    }

    public function getNumDemande(): ?int
    {
        return $this->numDemande;
    }

    public function setNumDemande(int $numDemande): self
    {
        $this->numDemande = $numDemande;

        return $this;
    }

    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->dateDemande;
    }

    public function setDateDemande(\DateTimeInterface $dateDemande): self
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getMontantTotal(): ?int
    {
        return $this->montantTotal;
    }

    public function setMontantTotal(int $montantTotal): self
    {
        $this->montantTotal = $montantTotal;

        return $this;
    }

    public function getId(): ?Budgetisation
    {
        return $this->id;
    }

    public function setId(?Budgetisation $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Collection|Engagement[]
     */
    public function getEngagements(): Collection
    {
        return $this->engagements;
    }

    public function addEngagement(Engagement $engagement): self
    {
        if (!$this->engagements->contains($engagement)) {
            $this->engagements[] = $engagement;
            $engagement->setNumDemande($this);
        }

        return $this;
    }

    public function removeEngagement(Engagement $engagement): self
    {
        if ($this->engagements->removeElement($engagement)) {
            // set the owning side to null (unless already changed)
            if ($engagement->getNumDemande() === $this) {
                $engagement->setNumDemande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PieceJustificative[]
     */
    public function getPieceJustificatives(): Collection
    {
        return $this->pieceJustificatives;
    }

    public function addPieceJustificative(PieceJustificative $pieceJustificative): self
    {
        if (!$this->pieceJustificatives->contains($pieceJustificative)) {
            $this->pieceJustificatives[] = $pieceJustificative;
            $pieceJustificative->setNumDemande($this);
        }

        return $this;
    }

    public function removePieceJustificative(PieceJustificative $pieceJustificative): self
    {
        if ($this->pieceJustificatives->removeElement($pieceJustificative)) {
            // set the owning side to null (unless already changed)
            if ($pieceJustificative->getNumDemande() === $this) {
                $pieceJustificative->setNumDemande(null);
            }
        }

        return $this;
    }


}
