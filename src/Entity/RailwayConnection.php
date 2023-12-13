<?php

namespace App\Entity;

use App\Repository\RailwayConnectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RailwayConnectionRepository::class)]
class RailwayConnection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $initial_station = null;

    #[ORM\Column(length: 255)]
    private ?string $destination_station = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $leaves_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $arrives_at = null;

    #[ORM\Column(length: 255)]
    private ?string $train_name = null;

    #[ORM\Column]
    private ?int $distance_traveled = null;

    #[ORM\Column]
    private ?float $ticket_price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInitialStation(): ?string
    {
        return $this->initial_station;
    }

    public function setInitialStation(string $initial_station): static
    {
        $this->initial_station = $initial_station;

        return $this;
    }

    public function getDestinationStation(): ?string
    {
        return $this->destination_station;
    }

    public function setDestinationStation(string $destination_station): static
    {
        $this->destination_station = $destination_station;

        return $this;
    }

    public function getLeavesAt(): ?\DateTimeImmutable
    {
        return $this->leaves_at;
    }

    public function setLeavesAt(\DateTimeImmutable $leaves_at): static
    {
        $this->leaves_at = $leaves_at;

        return $this;
    }

    public function getArrivesAt(): ?\DateTimeImmutable
    {
        return $this->arrives_at;
    }

    public function setArrivesAt(\DateTimeImmutable $arrives_at): static
    {
        $this->arrives_at = $arrives_at;

        return $this;
    }

    public function getTrainName(): ?string
    {
        return $this->train_name;
    }

    public function setTrainName(string $train_name): static
    {
        $this->train_name = $train_name;

        return $this;
    }

    public function getDistanceTraveled(): ?int
    {
        return $this->distance_traveled;
    }

    public function setDistanceTraveled(int $distance_traveled): static
    {
        $this->distance_traveled = $distance_traveled;

        return $this;
    }

    public function getTicketPrice(): ?float
    {
        return $this->ticket_price;
    }

    public function setTicketPrice(float $ticket_price): static
    {
        $this->ticket_price = $ticket_price;

        return $this;
    }
}
