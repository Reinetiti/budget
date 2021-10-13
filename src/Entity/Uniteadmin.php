<?php

namespace App\Entity;

use App\Repository\UniteadminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Uniteadmin
 *
 * @ORM\Table(name="uniteadmin", indexes={@ORM\Index(name="IDX_A6DD57B6E70B032", columns={"typeid"}), @ORM\Index(name="IDX_A6DD57B61CED5B0A", columns={"serviceid"}), @ORM\Index(name="IDX_A6DD57B68E10B992", columns={"communeid"})})
 * @ORM\Entity(repositoryClass=UniteadminRepository::class)
 */
class Uniteadmin
{
    /**
     * @var int
     *
     * @ORM\Column(name="uniteid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="uniteadmin_uniteid_seq", allocationSize=1, initialValue=1)
     */
    private $uniteid;

    /**
     * @var string
     *
     * @ORM\Column(name="libunite", type="text", nullable=false)
     */
    private $libunite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="unitecode", type="text", nullable=true)
     */
    private $unitecode;

     /**
     * @ORM\OneToMany(targetEntity=Budgetisation::class, mappedBy="uniteid")
     */
    private $budgetisations;

    /**
     * @var \Typeunite
     *
     * @ORM\ManyToOne(targetEntity=Typeunite::class, inversedBy="uniteadmins")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typeid", referencedColumnName="typeid")
     * })
     */
    private $typeid;

    /**
     * @var \Typeservice
     *
     * @ORM\ManyToOne(targetEntity=Typeservice::class, inversedBy="uniteadmins")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="serviceid", referencedColumnName="serviceid")
     * })
     */
    private $serviceid;

    /**
     * @var \Commune
     *
     * @ORM\ManyToOne(targetEntity=Commune::class, inversedBy="uniteadmins")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="communeid", referencedColumnName="communeid")
     * })
     */
    private $communeid;

    public function __toString(){
        return(string)
        $this->getLibunite();
    }

    public function __construct()
    {
        $this->budgetisations = new ArrayCollection();
    }

    public function getUniteid(): ?int
    {
        return $this->uniteid;
    }

    public function setUniteid(int $uniteid): self
    {
        $this->uniteid = $uniteid;

        return $this;
    }

    public function getLibunite(): ?string
    {
        return $this->libunite;
    }

    public function setLibunite(string $libunite): self
    {
        $this->libunite = $libunite;

        return $this;
    }

    public function getUnitecode(): ?string
    {
        return $this->unitecode;
    }

    public function setUnitecode(?string $unitecode): self
    {
        $this->unitecode = $unitecode;

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

    public function getServiceid(): ?Typeservice
    {
        return $this->serviceid;
    }

    public function setServiceid(?Typeservice $serviceid): self
    {
        $this->serviceid = $serviceid;

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
            $budgetisation->setUniteid($this);
        }

        return $this;
    }

    public function removeBudgetisation(Budgetisation $budgetisation): self
    {
        if ($this->budgetisations->removeElement($budgetisation)) {
            // set the owning side to null (unless already changed)
            if ($budgetisation->getUniteid() === $this) {
                $budgetisation->setUniteid(null);
            }
        }

        return $this;
    }


}
