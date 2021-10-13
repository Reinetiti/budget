<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="departement", indexes={@ORM\Index(name="IDX_C1765B63CE674C8", columns={"regionid"})})
 * @ORM\Entity(repositoryClass=DepartementRepository::class)
 */
class Departement
{
    /**
     * @var int
     *
     * @ORM\Column(name="depid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="departement_depid_seq", allocationSize=1, initialValue=1)
     */
    private $depid;

    /**
     * @var string
     *
     * @ORM\Column(name="libdep", type="text", nullable=false)
     */
    private $libdep;

    /**
     * @var string|null
     *
     * @ORM\Column(name="depcode", type="text", nullable=true)
     */
    private $depcode;

    /**
     * @var \Region
     *
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="departements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="regionid", referencedColumnName="regionid")
     * })
     */
    private $regionid;

    /**
     * @ORM\OneToMany(targetEntity=Commune::class, mappedBy="depid")
     */
    private $communes;

    public function __toString(){
        return(string)
        $this->getLibdep();
    }

    public function __construct()
    {
        $this->communes = new ArrayCollection();
    }

    public function getDepid(): ?int
    {
        return $this->depid;
    }

    public function setDepid(int $depid): self
    {
        $this->depid = $depid;

        return $this;
    }

    public function getLibdep(): ?string
    {
        return $this->libdep;
    }

    public function setLibdep(string $libdep): self
    {
        $this->libdep = $libdep;

        return $this;
    }

    public function getDepcode(): ?string
    {
        return $this->depcode;
    }

    public function setDepcode(?string $depcode): self
    {
        $this->depcode = $depcode;

        return $this;
    }

    public function getRegionid(): ?Region
    {
        return $this->regionid;
    }

    public function setRegionid(?Region $regionid): self
    {
        $this->regionid = $regionid;

        return $this;
    }

    /**
     * @return Collection|Commune[]
     */
    public function getCommunes(): Collection
    {
        return $this->communes;
    }

    public function addCommune(Commune $commune): self
    {
        if (!$this->communes->contains($commune)) {
            $this->communes[] = $commune;
            $commune->setDepid($this);
        }

        return $this;
    }

    public function removeCommune(Commune $commune): self
    {
        if ($this->communes->removeElement($commune)) {
            // set the owning side to null (unless already changed)
            if ($commune->getDepid() === $this) {
                $commune->setDepid(null);
            }
        }

        return $this;
    }


}
