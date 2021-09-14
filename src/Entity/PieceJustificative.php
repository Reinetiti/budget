<?php

namespace App\Entity;

use App\Repository\PieceJustificativeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * PieceJustificative
 *
 * @ORM\Table(name="piece_justificative", indexes={@ORM\Index(name="IDX_F73DDA3E397CD4C", columns={"num_demande"})})
 * @ORM\Entity(repositoryClass=PieceJustificativeRepository::class)
 */
class PieceJustificative
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_piece", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="piece_justificative_id_piece_seq", allocationSize=1, initialValue=1)
     */
    private $idPiece;

    /**
     * @var int
     *
     * @ORM\Column(name="ref", type="integer", nullable=false)
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="lib_piece", type="text", nullable=false)
     */
    private $libPiece;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_piece", type="date", nullable=false)
     */
    private $datePiece;

    /**
     * @var \DemandeEngagement
     *
     * @ORM\ManyToOne(targetEntity=DemandeEngagement::class, inversedBy="pieceJustificative")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="num_demande", referencedColumnName="num_demande")
     * })
     */
    private $numDemande;

    public function __toString(){
        return(string)
        $this->getIdPiece();
    }

    public function getIdPiece(): ?int
    {
        return $this->idPiece;
    }

    public function setIdPiece(int $idPiece): self
    {
        $this->idPiece = $idPiece;

        return $this;
    }

    public function getRef(): ?int
    {
        return $this->ref;
    }

    public function setRef(int $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getLibPiece(): ?string
    {
        return $this->libPiece;
    }

    public function setLibPiece(string $libPiece): self
    {
        $this->libPiece = $libPiece;

        return $this;
    }

    public function getDatePiece(): ?\DateTimeInterface
    {
        return $this->datePiece;
    }

    public function setDatePiece(\DateTimeInterface $datePiece): self
    {
        $this->datePiece = $datePiece;

        return $this;
    }

    public function getNumDemande(): ?DemandeEngagement
    {
        return $this->numDemande;
    }

    public function setNumDemande(?DemandeEngagement $numDemande): self
    {
        $this->numDemande = $numDemande;

        return $this;
    }


}
