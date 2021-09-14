<?php

namespace App\Entity;

use App\Repository\TypepgramRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Typepgram
 *
 * @ORM\Table(name="typepgram", indexes={@ORM\Index(name="IDX_BBB96469EA0ACD6", columns={"programmeid"})})
 * @ORM\Entity(repositoryClass=TypepgramRepository::class)
 */
class Typepgram
{
    /**
     * @var int
     *
     * @ORM\Column(name="typepgramid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="typepgram_typepgramid_seq", allocationSize=1, initialValue=1)
     */
    private $typepgramid;

    /**
     * @var string
     *
     * @ORM\Column(name="libtypepgram", type="text", nullable=false)
     */
    private $libtypepgram;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typepgramcode", type="text", nullable=true)
     */
    private $typepgramcode;

    /**
     * @var \Programme
     *
     * @ORM\ManyToOne(targetEntity=Programme::class, inversedBy="typepgram")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="programmeid", referencedColumnName="programmeid")
     * })
     */
    private $programmeid;

    public function __toString(){
        return(string)
        $this->getTypepgramid();
    }

    public function getTypepgramid(): ?int
    {
        return $this->typepgramid;
    }

    public function getLibtypepgram(): ?string
    {
        return $this->libtypepgram;
    }

    public function setLibtypepgram(string $libtypepgram): self
    {
        $this->libtypepgram = $libtypepgram;

        return $this;
    }

    public function getTypepgramcode(): ?string
    {
        return $this->typepgramcode;
    }

    public function setTypepgramcode(?string $typepgramcode): self
    {
        $this->typepgramcode = $typepgramcode;

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


}
