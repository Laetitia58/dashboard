<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    
    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(min:10, max:255, minMessage:"Minumum 10 caractères")]
    private $Nom;

    #[ORM\Column(type: 'integer')]
    private $Prix;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Url()]
    private $Photo_ticket;

    #[ORM\Column(type: 'date')]
    private $Date_Achat;

    #[ORM\Column(type: 'date')]
    private $Date_Garantie;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(min:0, max:255)]
    private $Lieu_Achat;
    

    #[ORM\Column(type: 'text')]
    #[Assert\Length(min:0, max:255)]
    private $Zone_Saisie;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\Length(min:0,max:255)]
    private $Notice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

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

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->Date_Achat;
    }

    public function setDateAchat(\DateTimeInterface $Date_Achat): self
    {
        $this->Date_Achat = $Date_Achat;

        return $this;
    }

    public function getDateGarantie(): ?\DateTimeInterface
    {
        return $this->Date_Garantie;
    }

    public function setDateGarantie(\DateTimeInterface $Date_Garantie): self
    {
        $this->Date_Garantie = $Date_Garantie;

        return $this;
    }

    public function getLieuAchat(): ?string
    {
        return $this->Lieu_Achat;
    }

    public function setLieuAchat(string $Lieu_Achat): self
    {
        $this->Lieu_Achat = $Lieu_Achat;

        return $this;
    }

    public function getZoneSaisie(): ?string
    {
        return $this->Zone_Saisie;
    }

    public function setZoneSaisie(string $Zone_Saisie): self
    {
        $this->Zone_Saisie = $Zone_Saisie;

        return $this;
    }

    public function getNotice(): ?string
    {
        return $this->Notice;
    }

    public function setNotice(?string $Notice): self
    {
        $this->Notice = $Notice;

        return $this;
    }
}
