<?php

namespace App\Entity;

use App\Repository\ParagrapheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Paragraphe
 *
 * @ORM\Table(name="paragraphe", indexes={@ORM\Index(name="IDX_4C1BA9B66B26844C", columns={"articleid"})})
 * @ORM\Entity(repositoryClass=ParagrapheRepository::class)
 */
class Paragraphe
{
    /**
     * @var int
     *
     * @ORM\Column(name="paragrapheid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="paragraphe_paragrapheid_seq", allocationSize=1, initialValue=1)
     */
    private $paragrapheid;

    /**
     * @var string
     *
     * @ORM\Column(name="libparagraphe", type="text", nullable=false)
     */
    private $libparagraphe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="paragraphecode", type="text", nullable=true)
     */
    private $paragraphecode;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="paragraphes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="articleid", referencedColumnName="articleid")
     * })
     */
    private $articleid;

    /**
     * @ORM\OneToMany(targetEntity=Rubrique::class, mappedBy="paragrapheid")
     */
    private $rubriques;

    public function __toString(){
        return(string)
        $this->getLibparagraphe();
    }

    public function __construct()
    {
         $this->rubriques = new ArrayCollection();
    }

    public function getParagrapheid(): ?int
    {
        return $this->paragrapheid;
    }

    public function setParagrapheid(int $paragrapheid): self
    {
        $this->paragrapheid = $paragrapheid;

        return $this;
    }

    public function getLibparagraphe(): ?string
    {
        return $this->libparagraphe;
    }

    public function setLibparagraphe(string $libparagraphe): self
    {
        $this->libparagraphe = $libparagraphe;

        return $this;
    }

    public function getParagraphecode(): ?string
    {
        return $this->paragraphecode;
    }

    public function setParagraphecode(?string $paragraphecode): self
    {
        $this->paragraphecode = $paragraphecode;

        return $this;
    }

    public function getArticleid(): ?Article
    {
        return $this->articleid;
    }

    public function setArticleid(?Article $articleid): self
    {
        $this->articleid = $articleid;

        return $this;
    }

    /**
     * @return Collection|Rubrique[]
     */
    public function getRubriques(): Collection
    {
        return $this->rubriques;
    }

    public function addRubrique(Rubrique $rubrique): self
    {
        if (!$this->rubriques->contains($rubrique)) {
            $this->rubriques[] = $rubrique;
            $rubrique->setParagrapheid($this);
        }

        return $this;
    }

    public function removeRubrique(Rubrique $rubrique): self
    {
        if ($this->rubriques->removeElement($rubrique)) {
            // set the owning side to null (unless already changed)
            if ($rubrique->getParagrapheid() === $this) {
                $rubrique->setParagrapheid(null);
            }
        }

        return $this;
    }


}
