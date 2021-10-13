<?php

namespace App\Entity;

use App\Repository\RubriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Rubrique
 *
 * @ORM\Table(name="rubrique", indexes={@ORM\Index(name="IDX_8FA4097CA2AC3939", columns={"paragrapheid"})})
 * @ORM\Entity(repositoryClass=RubriqueRepository::class)
 */
class Rubrique
{
    /**
     * @var int
     *
     * @ORM\Column(name="rubriqueid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="rubrique_rubriqueid_seq", allocationSize=1, initialValue=1)
     */
    private $rubriqueid;

    /**
     * @var string
     *
     * @ORM\Column(name="librubrique", type="text", nullable=false)
     */
    private $librubrique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rubriquecode", type="text", nullable=true)
     */
    private $rubriquecode;

    /**
     * @var \Paragraphe
     *
     * @ORM\ManyToOne(targetEntity=Paragraphe::class, inversedBy="rubriques")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="paragrapheid", referencedColumnName="paragrapheid")
     * })
     */
    private $paragrapheid;

     /**
     * @ORM\OneToMany(targetEntity=Budgetisation::class, mappedBy="rubriqueid")
     */
    private $budgetisations;

    public function __toString(){
        return(string)
        $this->getLibrubrique();
    }

    public function __construct()
    {
        $this->budgetisations = new ArrayCollection();
    }

    public function getRubriqueid(): ?int
    {
        return $this->rubriqueid;
    }

    public function setRubriqueid(int $rubriqueid): self
    {
        $this->rubriqueid = $rubriqueid;

        return $this;
    }

    public function getLibrubrique(): ?string
    {
        return $this->librubrique;
    }

    public function setLibrubrique(string $librubrique): self
    {
        $this->librubrique = $librubrique;

        return $this;
    }

    public function getRubriquecode(): ?string
    {
        return $this->rubriquecode;
    }

    public function setRubriquecode(?string $rubriquecode): self
    {
        $this->rubriquecode = $rubriquecode;

        return $this;
    }

    public function getParagrapheid(): ?Paragraphe
    {
        return $this->paragrapheid;
    }

    public function setParagrapheid(?Paragraphe $paragrapheid): self
    {
        $this->paragrapheid = $paragrapheid;

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
            $budgetisation->setRubriqueid($this);
        }

        return $this;
    }

    public function removeBudgetisation(Budgetisation $budgetisation): self
    {
        if ($this->budgetisations->removeElement($budgetisation)) {
            // set the owning side to null (unless already changed)
            if ($budgetisation->getRubriqueid() === $this) {
                $budgetisation->setRubriqueid(null);
            }
        }

        return $this;
    }


}
