<?php

namespace App\Entity;

use App\Repository\TypebudgetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Typebudget
 *
 * @ORM\Table(name="typebudget")
 * @ORM\Entity(repositoryClass=TypebudgetRepository::class)
 */
class Typebudget
{
    /**
     * @var int
     *
     * @ORM\Column(name="typebudgetid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="typebudget_typebudgetid_seq", allocationSize=1, initialValue=1)
     */
    private $typebudgetid;

    /**
     * @var string
     *
     * @ORM\Column(name="libtypebudget", type="text", nullable=false)
     */
    private $libtypebudget;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typebudgetcode", type="text", nullable=true)
     */
    private $typebudgetcode;

    /**
     * @ORM\OneToMany(targetEntity=Budgetisation::class, mappedBy="typebudgetid")
     */
    private $budgetisations;

    public function __toString(){
        return(string)
        $this->getLibtypebudget();
    }

    public function __construct()
    {
        $this->budgetisations = new ArrayCollection();
    }

    public function getTypebudgetid(): ?int
    {
        return $this->typebudgetid;
    }

    public function setTypebudgetid(int $typebudgetid): self
    {
        $this->typebudgetid = $typebudgetid;

        return $this;
    }

    public function getLibtypebudget(): ?string
    {
        return $this->libtypebudget;
    }

    public function setLibtypebudget(string $libtypebudget): self
    {
        $this->libtypebudget = $libtypebudget;

        return $this;
    }

    public function getTypebudgetcode(): ?string
    {
        return $this->typebudgetcode;
    }

    public function setTypebudgetcode(?string $typebudgetcode): self
    {
        $this->typebudgetcode = $typebudgetcode;

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
            $budgetisation->setTypebudgetid($this);
        }

        return $this;
    }

    public function removeBudgetisation(Budgetisation $budgetisation): self
    {
        if ($this->budgetisations->removeElement($budgetisation)) {
            // set the owning side to null (unless already changed)
            if ($budgetisation->getTypebudgetid() === $this) {
                $budgetisation->setTypebudgetid(null);
            }
        }

        return $this;
    }


}
