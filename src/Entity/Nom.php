<?php

namespace App\Entity;

use App\Repository\NomRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NomRepository::class)]
class Nom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'integer')]
    private $Prix;

    #[ORM\Column(type: 'string', length: 255)]
    private $Photo_ticket;

    #[ORM\Column(type: 'date')]
    private $createdAt;

    #[ORM\Column(type: 'date')]
    private $date_garantie;

    #[ORM\Column(type: 'string', length: 255)]
    private $Lieu_achat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getPhotoTicket(): ?string
    {
        return $this->Photo_ticket;
    }

    public function setPhotoTicket(string $Photo_ticket): self
    {
        $this->Photo_ticket = $Photo_ticket;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDateGarantie(): ?\DateTimeInterface
    {
        return $this->date_garantie;
    }

    public function setDateGarantie(\DateTimeInterface $date_garantie): self
    {
        $this->date_garantie = $date_garantie;

        return $this;
    }

    public function getLieuAchat(): ?string
    {
        return $this->Lieu_achat;
    }

    public function setLieuAchat(string $Lieu_achat): self
    {
        $this->Lieu_achat = $Lieu_achat;

        return $this;
    }
}
