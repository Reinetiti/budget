<?php

namespace App\Entity;

use App\Repository\ExerciceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Exercice
 *
 * @ORM\Table(name="exercice")
 * @ORM\Entity(repositoryClass=ExerciceRepository::class)
 */
class Exercice
{
    /**
     * @var int
     *
     * @ORM\Column(name="annee", type="integer", nullable=false)
     * @ORM\Id
     
     
     */
    private $annee;
    // * @ORM\GeneratedValue(strategy="SEQUENCE")
    // * @ORM\SequenceGenerator(sequenceName="exercice_annee_seq", allocationSize=1, initialValue=1)
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut", type="date", nullable=false)
     */
    private $debut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin", type="date", nullable=false)
     */
    private $fin;

    /**
     * @ORM\OneToMany(targetEntity=Budgetisation::class, mappedBy="annee")
     */
    private $budgetisations;

    public function __toString(){
        return(string)
        $this->getAnnee();
    }

    public function __construct()
    {
        $this->budgetisations = new ArrayCollection();
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * @return Collection|Budgetisation[]
     */
    public function getBudgetisations(): Collection
    {
        return $this->budgetisations;
    }

    public function addBudgetisation(Budgetisation $budgetisation): self
    {
        if (!$this->budgetisations->contains($budgetisation)) {
            $this->budgetisations[] = $budgetisation;
            $budgetisation->setAnnee($this);
        }

        return $this;
    }

    public function removeBudgetisation(Budgetisation $budgetisation): self
    {
        if ($this->budgetisations->removeElement($budgetisation)) {
            // set the owning side to null (unless already changed)
            if ($budgetisation->getAnnee() === $this) {
                $budgetisation->setAnnee(null);
            }
        }

        return $this;
    }


}
