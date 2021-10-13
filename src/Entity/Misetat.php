<?php

namespace App\Entity;

use App\Repository\MisetatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Misetat
 *
 * @ORM\Table(name="misetat")
 * @ORM\Entity(repositoryClass=MisetatRepository::class)
 */
class Misetat
{
    /**
     * @var int
     *
     * @ORM\Column(name="misetatid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="misetat_misetatid_seq", allocationSize=1, initialValue=1)
     */
    private $misetatid;

    /**
     * @var string
     *
     * @ORM\Column(name="libmisetat", type="text", nullable=false)
     */
    private $libmisetat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="misetatcode", type="text", nullable=true)
     */
    private $misetatcode;

    /**
     * @ORM\OneToMany(targetEntity=Misbudget::class, mappedBy="misetatid")
     */
    private $misbudgets;

    public function __toString(){
        return (string)
        $this->getLibmisetat();
    }

    public function __construct()
    {
        $this->misbudgets = new ArrayCollection();
    }

    public function getMisetatid(): ?int
    {
        return $this->misetatid;
    }

    public function setMisetatid(int $misetatid): self
    {
        $this->misetatid = $misetatid;

        return $this;
    }

    public function getLibmisetat(): ?string
    {
        return $this->libmisetat;
    }

    public function setLibmisetat(string $libmisetat): self
    {
        $this->libmisetat = $libmisetat;

        return $this;
    }

    public function getMisetatcode(): ?string
    {
        return $this->misetatcode;
    }

    public function setMisetatcode(?string $misetatcode): self
    {
        $this->misetatcode = $misetatcode;

        return $this;
    }

    /**
     * @return Collection|Misbudget[]
     */
    public function getMisbudgets(): Collection
    {
        return $this->misbudgets;
    }

    public function addMisbudget(Misbudget $misbudget): self
    {
        if (!$this->misbudgets->contains($misbudget)) {
            $this->misbudgets[] = $misbudget;
            $misbudget->setMisetatid($this);
        }

        return $this;
    }

    public function removeMisbudget(Misbudget $misbudget): self
    {
        if ($this->misbudgets->removeElement($misbudget)) {
            // set the owning side to null (unless already changed)
            if ($misbudget->getMisetatid() === $this) {
                $misbudget->setMisetatid(null);
            }
        }

        return $this;
    }


}
