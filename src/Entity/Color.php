<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ColorRepository")
 */
class Color
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $hex;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Car", mappedBy="color")
     */
    private $cars;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHex(): ?string
    {
        return $this->hex;
    }

    public function setHex(string $hex): self
    {
        $this->hex = $hex;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCars()
    {
        return $this->cars;
    }

    /**
     * @param mixed $cars
     * @return Color
     */
    public function setCars($cars)
    {
        $this->cars = $cars;
        return $this;
    }
}
