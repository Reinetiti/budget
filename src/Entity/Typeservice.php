<?php

namespace App\Entity;

use App\Repository\TypeserviceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Typeservice
 *
 * @ORM\Table(name="typeservice")
 * @ORM\Entity(repositoryClass=TypeserviceRepository::class)
 */
class Typeservice
{
    /**
     * @var int
     *
     * @ORM\Column(name="serviceid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="typeservice_serviceid_seq", allocationSize=1, initialValue=1)
     */
    private $serviceid;

    /**
     * @var string
     *
     * @ORM\Column(name="libservice", type="text", nullable=false)
     */
    private $libservice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="servicecode", type="text", nullable=true)
     */
    private $servicecode;

    /**
     * @ORM\OneToMany(targetEntity=Uniteadmin::class, mappedBy="serviceid")
     */
    private $uniteadmins;

    public function __toString(){
        return (string)
        $this->getServiceid();
    }

    public function __construct()
    {
        $this->uniteadmins = new ArrayCollection();
    }

    public function getServiceid(): ?int
    {
        return $this->serviceid;
    }

    public function setServiceid(int $serviceid): self
    {
        $this->serviceid = $serviceid;

        return $this;
    }

    public function getLibservice(): ?string
    {
        return $this->libservice;
    }

    public function setLibservice(string $libservice): self
    {
        $this->libservice = $libservice;

        return $this;
    }

    public function getServicecode(): ?string
    {
        return $this->servicecode;
    }

    public function setServicecode(?string $servicecode): self
    {
        $this->servicecode = $servicecode;

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
            $musee->setServiceid($this);
        }

        return $this;
    }

    public function removeUniteadmin(Uniteadmin $uniteadmin): self
    {
        if ($this->uniteadmins->removeElement($uniteadmin)) {
            // set the owning side to null (unless already changed)
            if ($uniteadmin->getServiceid() === $this) {
                $uniteadmin->setServiceid(null);
            }
        }

        return $this;
    }


}
