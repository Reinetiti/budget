<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="articleid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="article_articleid_seq", allocationSize=1, initialValue=1)
     */
    private $articleid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libarticle", type="text", nullable=true)
     */
    private $libarticle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="articlecode", type="text", nullable=true)
     */
    private $articlecode;

    /**
     * @ORM\OneToMany(targetEntity=Paragraphe::class, mappedBy="articleid")
     */
    private $paragraphes;

    public function __toString(){
        return (string)
        $this->getLibarticle();
    }

    public function __construct()
    {
         $this->paragraphes = new ArrayCollection();
    }

    public function getArticleid(): ?int
    {
        return $this->articleid;
    }

    public function setArticleid(int $articleid): self
    {
        $this->articleid = $articleid;

        return $this;
    }

    public function getLibarticle(): ?string
    {
        return $this->libarticle;
    }

    public function setLibarticle(?string $libarticle): self
    {
        $this->libarticle = $libarticle;

        return $this;
    }

    public function getArticlecode(): ?string
    {
        return $this->articlecode;
    }

    public function setArticlecode(?string $articlecode): self
    {
        $this->articlecode = $articlecode;

        return $this;
    }

    /**
     * @return Collection|Paragraphe[]
     */
    public function getParagraphes(): Collection
    {
        return $this->paragraphes;
    }

    public function addParagraphe(Paragraphe $paragraphe): self
    {
        if (!$this->paragraphes->contains($paragraphe)) {
            $this->paragraphes[] = $paragraphe;
            $paragraphe->setArticleid($this);
        }

        return $this;
    }

    public function removeParagraphe(Paragraphe $paragraphe): self
    {
        if ($this->paragraphes->removeElement($paragraphe)) {
            // set the owning side to null (unless already changed)
            if ($paragraphe->getArticleid() === $this) {
                $paragraphe->setArticleid(null);
            }
        }

        return $this;
    }


}
