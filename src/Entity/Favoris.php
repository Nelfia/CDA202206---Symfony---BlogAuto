<?php

namespace App\Entity;

use App\Repository\FavorisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FavorisRepository::class)]
class Favoris
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'favoris')]
    private ?user $annonceFav = null;

    #[ORM\ManyToOne(inversedBy: 'favoris')]
    private ?annonce $usersFav = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnonceFav(): ?user
    {
        return $this->annonceFav;
    }

    public function setAnnonceFav(?user $annonceFav): self
    {
        $this->annonceFav = $annonceFav;

        return $this;
    }

    public function getUsersFav(): ?annonce
    {
        return $this->usersFav;
    }

    public function setUsersFav(?annonce $usersFav): self
    {
        $this->usersFav = $usersFav;

        return $this;
    }
}
