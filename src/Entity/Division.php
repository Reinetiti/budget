<?php

namespace App\Entity;

use App\Repository\DivisionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Division
 *
 * @ORM\Table(name="division")
 * @ORM\Entity(repositoryClass=DivisionRepository::class)
 */
class Division
{
    /**
     * @var int
     *
     * @ORM\Column(name="divisionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="division_divisionid_seq", allocationSize=1, initialValue=1)
     */
    private $divisionid;

    /**
     * @var string
     *
     * @ORM\Column(name="libdivision", type="text", nullable=false)
     */
    private $libdivision;

    /**
     * @var string|null
     *
     * @ORM\Column(name="divisioncode", type="text", nullable=true)
     */
    private $divisioncode;

    /**
     * @ORM\OneToMany(targetEntity=Groupe::class, mappedBy="divisionid")
     */
    private $groupes;

    public function __toString(){
        return (string)
        $this->getDivisionid();
    }

    public function __construct()
    {
        $this->groupes = new ArrayCollection();
    }

    public function getDivisionid(): ?int
    {
        return $this->divisionid;
    }

    public function setDivisionid(int $divisionid): self
    {
        $this->divisionid = $divisionid;

        return $this;
    }

    public function getLibdivision(): ?string
    {
        return $this->libdivision;
    }

    public function setLibdivision(string $libdivision): self
    {
        $this->libdivision = $libdivision;

        return $this;
    }

    public function getDivisioncode(): ?string
    {
        return $this->divisioncode;
    }

    public function setDivisioncode(?string $divisioncode): self
    {
        $this->divisioncode = $divisioncode;

        return $this;
    }

    /**
     * @return Collection|Groupe[]
     */
    public function getGroupes(): Collection
    {
        return $this->groupes;
    }

    public function addGroupe(Groupe $groupe): self
    {
        if (!$this->groupes->contains($groupe)) {
            $this->groupes[] = $groupe;
            $groupe->setDivisionid($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupes->removeElement($groupe)) {
            // set the owning side to null (unless already changed)
            if ($groupe->getDivisionid() === $this) {
                $groupe->setDivisionid(null);
            }
        }

        return $this;
    }


}
