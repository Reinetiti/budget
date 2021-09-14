<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 *
 * @ORM\Table(name="action", indexes={@ORM\Index(name="IDX_47CC8C929EA0ACD6", columns={"programmeid"})})
 * @ORM\Entity(repositoryClass=ActionRepository::class)
 */
class Action
{
    /**
     * @var int
     *
     * @ORM\Column(name="actionid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="action_actionid_seq", allocationSize=1, initialValue=1)
     */
    private $actionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="actioncode", type="text", nullable=true)
     */
    private $actioncode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libaction", type="text", nullable=true)
     */
    private $libaction;

    /**
     * @var \Programme
     *
     * @ORM\ManyToOne(targetEntity=Programme::class, inversedBy="actions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="programmeid", referencedColumnName="programmeid")
     * })
     */
    private $programmeid;

    /**
     * @ORM\OneToMany(targetEntity=Budgetisation::class, mappedBy="actionid")
     */
    private $budgetisations;

    public function __toString(){
        return(string)
        $this->getActionid();
    }

    public function __construct()
    {
        $this->budgetisations = new ArrayCollection();
    }

    public function getActionid(): ?int
    {
        return $this->actionid;
    }

    public function setActionid(int $actionid): self
    {
        $this->actionid = $actionid;

        return $this;
    }

    public function getActioncode(): ?string
    {
        return $this->actioncode;
    }

    public function setActioncode(?string $actioncode): self
    {
        $this->actioncode = $actioncode;

        return $this;
    }

    public function getLibaction(): ?string
    {
        return $this->libaction;
    }

    public function setLibaction(?string $libaction): self
    {
        $this->libaction = $libaction;

        return $this;
    }

    public function getProgrammeid(): ?Programme
    {
        return $this->programmeid;
    }

    public function setProgrammeid(?Programme $programmeid): self
    {
        $this->programmeid = $programmeid;

        return $this;
    }

    /**
     * @return Collection|Budgetisation[]
     */
    public function getBudgetisations(): Collection
    {
        return $this->budgetisations;
    }

    public function addBudgetisation(Budgetisation $budgetisation): self
    {
        if (!$this->budgetisations->contains($budgetisation)) {
            $this->budgetisations[] = $budgetisation;
            $budgetisation->setActionid($this);
        }

        return $this;
    }

    public function removeBudgetisation(Budgetisation $budgetisation): self
    {
        if ($this->budgetisations->removeElement($budgetisation)) {
            // set the owning side to null (unless already changed)
            if ($budgetisation->getActionid() === $this) {
                $budgetisation->setActionid(null);
            }
        }

        return $this;
    }


}
