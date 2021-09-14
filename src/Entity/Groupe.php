<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe", indexes={@ORM\Index(name="IDX_4B98C21792F7421", columns={"divisionid"})})
 * @ORM\Entity(repositoryClass=GroupeRepository::class)
 */
class Groupe
{
    /**
     * @var int
     *
     * @ORM\Column(name="groupeid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="groupe_groupeid_seq", allocationSize=1, initialValue=1)
     */
    private $groupeid;

    /**
     * @var string
     *
     * @ORM\Column(name="libgroupe", type="text", nullable=false)
     */
    private $libgroupe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="groupecode", type="text", nullable=true)
     */
    private $groupecode;

    /**
     * @var \Division
     *
     * @ORM\ManyToOne(targetEntity=Division::class, inversedBy="groupes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="divisionid", referencedColumnName="divisionid")
     * })
     */
    private $divisionid;

    /**
     * @ORM\OneToMany(targetEntity=Classe::class, mappedBy="groupeid")
     */
    private $classes;

    public function __toString(){
        return(string)
        $this->getGroupeid();
    }

    public function __construct()
    {
        $this->classes = new ArrayCollection();
    }

    public function getGroupeid(): ?int
    {
        return $this->groupeid;
    }
    public function setGroupeid(int $groupeid): self
    {
        $this->groupeid = $groupeid;

        return $this;
    }

    public function getLibgroupe(): ?string
    {
        return $this->libgroupe;
    }

    public function setLibgroupe(string $libgroupe): self
    {
        $this->libgroupe = $libgroupe;

        return $this;
    }

    public function getGroupecode(): ?string
    {
        return $this->groupecode;
    }

    public function setGroupecode(?string $groupecode): self
    {
        $this->groupecode = $groupecode;

        return $this;
    }

    public function getDivisionid(): ?Division
    {
        return $this->divisionid;
    }

    public function setDivisionid(?Division $divisionid): self
    {
        $this->divisionid = $divisionid;

        return $this;
    }

    /**
     * @return Collection|Classe[]
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClasse(Classe $classe): self
    {
        if (!$this->classes->contains($classe)) {
            $this->classes[] = $classe;
            $classe->setGroupeid($this);
        }

        return $this;
    }

    public function removeClasse(Classe $classe): self
    {
        if ($this->classes->removeElement($classe)) {
            // set the owning side to null (unless already changed)
            if ($classe->getGroupeid() === $this) {
                $classe->setGroupeid(null);
            }
        }

        return $this;
    }


}
