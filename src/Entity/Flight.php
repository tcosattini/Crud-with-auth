<?php

namespace App\Entity;

use App\Repository\FlightRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=FlightRepository::class)
 */
class Flight
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="entrez un prix entre 100 et 300")
     * @Assert\Range(
     *     min=100,
     *     max=300,
     *     minMessage="minimum 100",
     *     maxMessage="maximum 300"
     * )

     */
    private $price;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $schedule;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $reduction;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="flights")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotEqualTo(
     *           propertyPath="arrival", 
     *           message="Le départ et l'arrivée doivent être différents")
     */
    private $departure;

    /**
     * @ORM\ManyToOne(targetEntity=City::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrival;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank(message="50 sièges max.")
     * @Assert\Range(
     *  min=1,
     *  max=50,
     *  minMessage = "minimum 1",
     *  maxMessage = "maximum 50"
     * )
     */
    private $seat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSchedule(): ?\DateTimeInterface
    {
        return $this->schedule;
    }

    public function setSchedule(?\DateTimeInterface $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getReduction(): ?bool
    {
        return $this->reduction;
    }

    public function setReduction(?bool $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getDeparture(): ?City
    {
        return $this->departure;
    }

    public function setDeparture(?City $departure): self
    {
        $this->departure = $departure;

        return $this;
    }

    public function getArrival(): ?City
    {
        return $this->arrival;
    }

    public function setArrival(?City $arrival): self
    {
        $this->arrival = $arrival;

        return $this;
    }

    public function getSeat(): ?int
    {
        return $this->seat;
    }

    public function setSeat(?int $seat): self
    {
        $this->seat = $seat;

        return $this;
    }
}
