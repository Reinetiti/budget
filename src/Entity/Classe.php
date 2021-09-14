<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="classe", indexes={@ORM\Index(name="IDX_8F87BF96D7A8B901", columns={"groupeid"})})
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
{
    /**
     * @var int
     *
     * @ORM\Column(name="classeid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="classe_classeid_seq", allocationSize=1, initialValue=1)
     */
    private $classeid;

    /**
     * @var string
     *
     * @ORM\Column(name="libclasse", type="text", nullable=false)
     */
    private $libclasse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="classecode", type="text", nullable=true)
     */
    private $classecode;

    /**
     * @var \Groupe
     *
     * @ORM\ManyToOne(targetEntity=Groupe::class, inversedBy="classes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupeid", referencedColumnName="groupeid")
     * })
     */
    private $groupeid;

    /**
     * @ORM\OneToMany(targetEntity=Budgetisation::class, mappedBy="classeid")
     */
    private $budgetisations;

    public function __toString(){
        return(string)
        $this->getClasseid();
    }

    public function __construct()
    {
        $this->budgetisations = new ArrayCollection();
    }

    public function getClasseid(): ?int
    {
        return $this->classeid;
    }

    public function setClasseid(int $classeid): self
    {
        $this->classeid = $classeid;

        return $this;
    }

    public function getLibclasse(): ?string
    {
        return $this->libclasse;
    }

    public function setLibclasse(string $libclasse): self
    {
        $this->libclasse = $libclasse;

        return $this;
    }

    public function getClassecode(): ?string
    {
        return $this->classecode;
    }

    public function setClassecode(?string $classecode): self
    {
        $this->classecode = $classecode;

        return $this;
    }

    public function getGroupeid(): ?Groupe
    {
        return $this->groupeid;
    }

    public function setGroupeid(?Groupe $groupeid): self
    {
        $this->groupeid = $groupeid;

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
            $budgetisation->setClasseid($this);
        }

        return $this;
    }

    public function removeBudgetisation(Budgetisation $budgetisation): self
    {
        if ($this->budgetisations->removeElement($budgetisation)) {
            // set the owning side to null (unless already changed)
            if ($budgetisation->getClasseid() === $this) {
                $budgetisation->setClasseid(null);
            }
        }

        return $this;
    }


}
