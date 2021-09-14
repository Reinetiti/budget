<?php

namespace App\Entity;

use App\Repository\TypeuniteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Typeunite
 *
 * @ORM\Table(name="typeunite")
 * @ORM\Entity(repositoryClass=TypeuniteRepository::class)
 */
class Typeunite
{
    /**
     * @var int
     *
     * @ORM\Column(name="typeid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="typeunite_typeid_seq", allocationSize=1, initialValue=1)
     */
    private $typeid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libtype_unite", type="text", nullable=true)
     */
    private $libtypeUnite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typecode", type="text", nullable=true)
     */
    private $typecode;

    /**
     * @ORM\OneToMany(targetEntity=Catservice::class, mappedBy="typeid")
     */
    private $catservices;

    /**
     * @ORM\OneToMany(targetEntity=Uniteadmin::class, mappedBy="typeid")
     */
    private $uniteadmins;

    public function __toString(){
        return (string)
        $this->getCodePays();
    }

    public function __construct()
    {
        $this->catservices = new ArrayCollection();
        $this->uniteadmins = new ArrayCollection();
    }

    public function getTypeid(): ?int
    {
        return $this->typeid;
    }

    public function setTypeid(int $typeid): self
    {
        $this->typeid = $typeid;

        return $this;
    }

    public function getLibtypeUnite(): ?string
    {
        return $this->libtypeUnite;
    }

    public function setLibtypeUnite(?string $libtypeUnite): self
    {
        $this->libtypeUnite = $libtypeUnite;

        return $this;
    }

    public function getTypecode(): ?string
    {
        return $this->typecode;
    }

    public function setTypecode(?string $typecode): self
    {
        $this->typecode = $typecode;

        return $this;
    }

    /**
     * @return Collection|Catservice[]
     */
    public function getCatservices(): Collection
    {
        return $this->catservices;
    }

    public function addCatservice(Catservice $catservice): self
    {
        if (!$this->catservices->contains($catservice)) {
            $this->catservices[] = $catservice;
            $catservice->setTypeid($this);
        }

        return $this;
    }

    public function removeCatservice(Catservice $catservice): self
    {
        if ($this->catservices->removeElement($catservice)) {
            // set the owning side to null (unless already changed)
            if ($catservice->getTypeid() === $this) {
                $catservice->setTypeid(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Uniteadmin[]
     */
    public function getUniteadmins(): Collection
    {
        return $this->uniteadmins;
    }

    public function addUniteadmin(Uniteadmin $uniteadmin): self
    {
        if (!$this->uniteadmins->contains($uniteadmin)) {
            $this->uniteadmins[] = $uniteadmin;
            $uniteadmin->setTypeid($this);
        }

        return $this;
    }

    public function removeUniteadmin(Uniteadmin $catuniteadmin): self
    {
        if ($this->uniteadmins->removeElement($uniteadmin)) {
            // set the owning side to null (unless already changed)
            if ($uniteadmin->getTypeid() === $this) {
                $uniteadmin->setTypeid(null);
            }
        }

        return $this;
    }


}
