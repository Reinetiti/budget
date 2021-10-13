<?php

namespace App\Entity;

use App\Repository\ProgrammeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Programme
 *
 * @ORM\Table(name="programme", indexes={@ORM\Index(name="IDX_3DDCB9FF2112B630", columns={"misbudgetid"})})
 * @ORM\Entity(repositoryClass=ProgrammeRepository::class)
 */
class Programme
{
    /**
     * @var int
     *
     * @ORM\Column(name="programmeid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="programme_programmeid_seq", allocationSize=1, initialValue=1)
     */
    private $programmeid;

    /**
     * @var string
     *
     * @ORM\Column(name="libprogramme", type="string", length=255, nullable=false, options={"fixed"=true})
     */
    private $libprogramme;

    /**
     * @var string|null
     *
     * @ORM\Column(name="programmecode", type="text", nullable=true)
     */
    private $programmecode;

    /**
     * @var \Misbudget
     *
     * @ORM\ManyToOne(targetEntity=Misbudget::class, inversedBy="programme")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="misbudgetid", referencedColumnName="misbudgetid")
     * })
     */
    private $misbudgetid;

    /**
     * @ORM\OneToMany(targetEntity=Typepgram::class, mappedBy="programmeid")
     */
    private $typepgrams;

    /**
     * @ORM\OneToMany(targetEntity=Action::class, mappedBy="programmeid")
     */
    private $actions;

    public function __toString(){
        return(string)
        $this->getLibprogramme();
    }

    public function __construct()
    {
        $this->typepgrams = new ArrayCollection();
        $this->actions = new ArrayCollection();
    }

    public function getProgrammeid(): ?int
    {
        return $this->programmeid;
    }

    public function setProgrammeid(int $programmeid): self
    {
        $this->programmeid = $programmeid;

        return $this;
    }

    public function getLibprogramme(): ?string
    {
        return $this->libprogramme;
    }

    public function setLibprogramme(string $libprogramme): self
    {
        $this->libprogramme = $libprogramme;

        return $this;
    }

    public function getProgrammecode(): ?string
    {
        return $this->programmecode;
    }

    public function setProgrammecode(?string $programmecode): self
    {
        $this->programmecode = $programmecode;

        return $this;
    }

    public function getMisbudgetid(): ?Misbudget
    {
        return $this->misbudgetid;
    }

    public function setMisbudgetid(?Misbudget $misbudgetid): self
    {
        $this->misbudgetid = $misbudgetid;

        return $this;
    }

    /**
     * @return Collection|Typepgram[]
     */
    public function getTypepgrams(): Collection
    {
        return $this->typepgrams;
    }

    public function addTypepgram(Typepgram $typepgram): self
    {
        if (!$this->typepgrams->contains($typepgram)) {
            $this->typepgrams[] = $typepgram;
            $typepgram->setProgrammeid($this);
        }

        return $this;
    }

    public function removeTypepgram(Typepgram $typepgram): self
    {
        if ($this->typepgrams->removeElement($typepgram)) {
            // set the owning side to null (unless already changed)
            if ($typepgram->getProgrammeid() === $this) {
                $typepgram->setProgrammeid(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Action[]
     */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    public function addAction(Action $action): self
    {
        if (!$this->actions->contains($action)) {
            $this->actions[] = $action;
            $action->setProgrammeid($this);
        }

        return $this;
    }

    public function removeAction(Action $action): self
    {
        if ($this->actions->removeElement($action)) {
            // set the owning side to null (unless already changed)
            if ($action->getProgrammeid() === $this) {
                $action->setProgrammeid(null);
            }
        }

        return $this;
    }



}
