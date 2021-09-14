<?php

namespace App\Entity;

use App\Repository\BudgetisationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Budgetisation
 *
 * @ORM\Table(name="budgetisation", indexes={@ORM\Index(name="IDX_EC14AAB6C425DA8", columns={"typebudgetid"}), @ORM\Index(name="IDX_EC14AAB6456F66AA", columns={"rubriqueid"}), @ORM\Index(name="IDX_EC14AAB6D141104B", columns={"uniteid"}), @ORM\Index(name="IDX_EC14AAB61840070F", columns={"actionid"}), @ORM\Index(name="IDX_EC14AAB6C3FC6B56", columns={"classeid"}), @ORM\Index(name="IDX_EC14AAB6DE92C5CF", columns={"annee"})})
 * @ORM\Entity(repositoryClass=BudgetisationRepository::class)
 */
class Budgetisation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="budgetisation_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="cp", type="integer", nullable=false)
     */
    private $cp;

    /**
     * @var int
     *
     * @ORM\Column(name="ae", type="integer", nullable=false)
     */
    private $ae;

    /**
     * @var \Typebudget
     *
     * @ORM\ManyToOne(targetEntity=Typebudget::class, inversedBy="budgetisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typebudgetid", referencedColumnName="typebudgetid")
     * })
     */
    private $typebudgetid;

    /**
     * @var \Rubrique
     *
     * @ORM\ManyToOne(targetEntity=Rubrique::class, inversedBy="budgetisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rubriqueid", referencedColumnName="rubriqueid")
     * })
     */
    private $rubriqueid;

    /**
     * @var \Uniteadmin
     *
     * @ORM\ManyToOne(targetEntity=Uniteadmin::class, inversedBy="budgetisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uniteid", referencedColumnName="uniteid")
     * })
     */
    private $uniteid;

    /**
     * @var \Action
     *
     * @ORM\ManyToOne(targetEntity=Action::class, inversedBy="budgetisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="actionid", referencedColumnName="actionid")
     * })
     */
    private $actionid;

    /**
     * @var \Classe
     *
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="budgetisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="classeid", referencedColumnName="classeid")
     * })
     */
    private $classeid;

    /**
     * @var \Exercice
     *
     * @ORM\ManyToOne(targetEntity=Exercice::class, inversedBy="budgetisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="annee", referencedColumnName="annee")
     * })
     */
    private $annee;

    public function __toString(){
        return(string)
        $this->getId();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getAe(): ?int
    {
        return $this->ae;
    }

    public function setAe(int $ae): self
    {
        $this->ae = $ae;

        return $this;
    }

    public function getTypebudgetid(): ?Typebudget
    {
        return $this->typebudgetid;
    }

    public function setTypebudgetid(?Typebudget $typebudgetid): self
    {
        $this->typebudgetid = $typebudgetid;

        return $this;
    }

    public function getRubriqueid(): ?Rubrique
    {
        return $this->rubriqueid;
    }

    public function setRubriqueid(?Rubrique $rubriqueid): self
    {
        $this->rubriqueid = $rubriqueid;

        return $this;
    }

    public function getUniteid(): ?Uniteadmin
    {
        return $this->uniteid;
    }

    public function setUniteid(?Uniteadmin $uniteid): self
    {
        $this->uniteid = $uniteid;

        return $this;
    }

    public function getActionid(): ?Action
    {
        return $this->actionid;
    }

    public function setActionid(?Action $actionid): self
    {
        $this->actionid = $actionid;

        return $this;
    }

    public function getClasseid(): ?Classe
    {
        return $this->classeid;
    }

    public function setClasseid(?Classe $classeid): self
    {
        $this->classeid = $classeid;

        return $this;
    }

    public function getAnnee(): ?Exercice
    {
        return $this->annee;
    }

    public function setAnnee(?Exercice $annee): self
    {
        $this->annee = $annee;

        return $this;
    }


}
