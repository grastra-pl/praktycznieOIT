<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $author_id = null;

    #[ORM\Column]
    private ?int $game_platform_id = null;

    #[ORM\Column]
    private ?int $game_type_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creation_time = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $modification_time = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $deleted = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 20)]
    private ?string $screenshot = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthorId(): ?int
    {
        return $this->author_id;
    }

    public function setAuthorId(int $author_id): static
    {
        $this->author_id = $author_id;

        return $this;
    }

    public function getGamePlatformId(): ?int
    {
        return $this->game_platform_id;
    }

    public function setGamePlatformId(int $game_platform_id): static
    {
        $this->game_platform_id = $game_platform_id;

        return $this;
    }

    public function getGameTypeId(): ?int
    {
        return $this->game_type_id;
    }

    public function setGameTypeId(int $game_type_id): static
    {
        $this->game_type_id = $game_type_id;

        return $this;
    }

    public function getCreationTime(): ?\DateTimeInterface
    {
        return $this->creation_time;
    }

    public function setCreationTime(\DateTimeInterface $creation_time): static
    {
        $this->creation_time = $creation_time;

        return $this;
    }

    public function getModificationTime(): ?\DateTimeInterface
    {
        return $this->modification_time;
    }

    public function setModificationTime(\DateTimeInterface $modification_time): static
    {
        $this->modification_time = $modification_time;

        return $this;
    }

    public function getDeleted(): ?int
    {
        return $this->deleted;
    }

    public function setDeleted(int $deleted): static
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getScreenshot(): ?string
    {
        return $this->screenshot;
    }

    public function setScreenshot(string $screenshot): static
    {
        $this->screenshot = $screenshot;

        return $this;
    }
}
