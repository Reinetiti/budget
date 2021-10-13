<?php

namespace App\Entity;

use App\Repository\MisbudgetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Misbudget
 *
 * @ORM\Table(name="misbudget", indexes={@ORM\Index(name="IDX_9B3155A323E8FED8", columns={"misetatid"})})
 * @ORM\Entity(repositoryClass=MisbudgetRepository::class)
 */
class Misbudget
{
    /**
     * @var int
     *
     * @ORM\Column(name="misbudgetid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="misbudget_misbudgetid_seq", allocationSize=1, initialValue=1)
     */
    private $misbudgetid;

    /**
     * @var string
     *
     * @ORM\Column(name="libmisbudget", type="text", nullable=false)
     */
    private $libmisbudget;

    /**
     * @var string|null
     *
     * @ORM\Column(name="misbudgetcode", type="text", nullable=true)
     */
    private $misbudgetcode;

    /**
     * @var \Misetat
     *
     * @ORM\ManyToOne(targetEntity=Misetat::class, inversedBy="misbudgets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="misetatid", referencedColumnName="misetatid")
     * })
     */
    private $misetatid;

    /**
     * @ORM\OneToMany(targetEntity=Programme::class, mappedBy="misbudgetid")
     */
    private $programmes;

    public function __toString(){
        return(string)
        $this->getLibmisbudget();
    }

    public function __construct()
    {
        $this->programmes = new ArrayCollection();
    }

    public function getMisbudgetid(): ?int
    {
        return $this->misbudgetid;
    }

    public function setMisbudgetid(int $misbudgetid): self
    {
        $this->misbudgetid = $misbudgetid;

        return $this;
    }

    public function getLibmisbudget(): ?string
    {
        return $this->libmisbudget;
    }

    public function setLibmisbudget(string $libmisbudget): self
    {
        $this->libmisbudget = $libmisbudget;

        return $this;
    }

    public function getMisbudgetcode(): ?string
    {
        return $this->misbudgetcode;
    }

    public function setMisbudgetcode(?string $misbudgetcode): self
    {
        $this->misbudgetcode = $misbudgetcode;

        return $this;
    }

    public function getMisetatid(): ?Misetat
    {
        return $this->misetatid;
    }

    public function setMisetatid(?Misetat $misetatid): self
    {
        $this->misetatid = $misetatid;

        return $this;
    }

    /**
     * @return Collection|Programme[]
     */
    public function getProgrammes(): Collection
    {
        return $this->programmes;
    }

    public function addProgramme(Programme $programme): self
    {
        if (!$this->programmes->contains($programme)) {
            $this->programmes[] = $programme;
            $programme->setMisbudgetid($this);
        }

        return $this;
    }

    public function removeProgramme(Programme $programme): self
    {
        if ($this->programmes->removeElement($programme)) {
            // set the owning side to null (unless already changed)
            if ($programme->getMisbudgetid() === $this) {
                $programme->setMisbudgetid(null);
            }
        }

        return $this;
    }


}
