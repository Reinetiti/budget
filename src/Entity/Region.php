<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity(repositoryClass=RegionRepository::class)
 */
class Region
{
    /**
     * @var int
     *
     * @ORM\Column(name="regionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="region_regionid_seq", allocationSize=1, initialValue=1)
     */
    private $regionid;

    /**
     * @var string
     *
     * @ORM\Column(name="libregion", type="text", nullable=false)
     */
    private $libregion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="regioncode", type="text", nullable=true)
     */
    private $regioncode;

    /**
     * @ORM\OneToMany(targetEntity=Departement::class, mappedBy="regionid")
     */
    private $departements;

    public function __toString(){
        return (string)
        $this->getRegionid();
    }

    public function __construct()
    {
        $this->departements = new ArrayCollection();
    }

    public function getRegionid(): ?int
    {
        return $this->regionid;
    }

    public function setRegionid(int $regionid): self
    {
        $this->regionid = $regionid;

        return $this;
    }

    public function getLibregion(): ?string
    {
        return $this->libregion;
    }

    public function setLibregion(string $libregion): self
    {
        $this->libregion = $libregion;

        return $this;
    }

    public function getRegioncode(): ?string
    {
        return $this->regioncode;
    }

    public function setRegioncode(?string $regioncode): self
    {
        $this->regioncode = $regioncode;

        return $this;
    }

    /**
     * @return Collection|Departement[]
     */
    public function getDepartements(): Collection
    {
        return $this->departements;
    }

    public function addDepartement(Departement $departement): self
    {
        if (!$this->departements->contains($departement)) {
            $this->departements[] = $departement;
            $departement->setRegionid($this);
        }

        return $this;
    }

    public function removeDepartement(Departement $departement): self
    {
        if ($this->departements->removeElement($departement)) {
            // set the owning side to null (unless already changed)
            if ($departement->getRegionid() === $this) {
                $departement->setRegionid(null);
            }
        }

        return $this;
    }



}
