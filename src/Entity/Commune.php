<?php

namespace App\Entity;

use App\Repository\CommuneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commune
 *
 * @ORM\Table(name="commune", indexes={@ORM\Index(name="IDX_E2E2D1EEC793C5E", columns={"depid"})})
 * @ORM\Entity(repositoryClass=CommuneRepository::class)
 */
class Commune
{
    /**
     * @var int
     *
     * @ORM\Column(name="communeid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="commune_communeid_seq", allocationSize=1, initialValue=1)
     */
    private $communeid;

    /**
     * @var string
     *
     * @ORM\Column(name="libcommune", type="text", nullable=false)
     */
    private $libcommune;

    /**
     * @var string|null
     *
     * @ORM\Column(name="communecode", type="text", nullable=true)
     */
    private $communecode;

    /**
     * @var \Departement
     *
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="communes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="depid", referencedColumnName="depid")
     * })
     */
    private $depid;

    /**
     * @ORM\OneToMany(targetEntity=Champcompetence::class, mappedBy="communeid")
     */
    private $champcompetences;

    public function __toString(){
        return(string)
        $this->getCommuneid();
    }

    public function __construct()
    {
        $this->champcompetences = new ArrayCollection();
    }

    public function getCommuneid(): ?int
    {
        return $this->communeid;
    }

    public function setCommuneid(int $communeid): self
    {
        $this->communeid = $communeid;

        return $this;
    }

    public function getLibcommune(): ?string
    {
        return $this->libcommune;
    }

    public function setLibcommune(string $libcommune): self
    {
        $this->libcommune = $libcommune;

        return $this;
    }

    public function getCommunecode(): ?string
    {
        return $this->communecode;
    }

    public function setCommunecode(?string $communecode): self
    {
        $this->communecode = $communecode;

        return $this;
    }

    public function getDepid(): ?Departement
    {
        return $this->depid;
    }

    public function setDepid(?Departement $depid): self
    {
        $this->depid = $depid;

        return $this;
    }

    /**
     * @return Collection|Champcompetence[]
     */
    public function getChampcompetences(): Collection
    {
        return $this->champcompetences;
    }

    public function addChampcompetence(Champcompetence $champcompetence): self
    {
        if (!$this->champcompetences->contains($champcompetence)) {
            $this->champcompetences[] = $champcompetence;
            $champcompetence->setCommuneid($this);
        }

        return $this;
    }

    public function removeChampcompetence(Champcompetence $champcompetence): self
    {
        if ($this->champcompetences->removeElement($visiter)) {
            // set the owning side to null (unless already changed)
            if ($champcompetence->getCommuneid() === $this) {
                $champcompetence->setCommuneid(null);
            }
        }

        return $this;
    }


}
