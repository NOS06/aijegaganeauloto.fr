<?php

namespace App\Entity;

use App\Repository\DrawingRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass=DrawingRepository::class)
 */
class Drawing
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     */
    private string $id;

    /**
     * @ORM\Column(type="date")
     */
    private ?\DateTime $drawDate;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $ball1;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $ball2;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $ball3;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $ball4;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $ball5;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $luckyNumber;

    public function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDrawDate(): ?\DateTimeInterface
    {
        return $this->drawDate;
    }

    public function setDrawDate(?\DateTimeInterface $drawDate): self
    {
        $this->drawDate = $drawDate;

        return $this;
    }

    public function getBall1(): ?int
    {
        return $this->ball1;
    }

    public function setBall1(int $ball1): self
    {
        $this->ball1 = $ball1;

        return $this;
    }

    public function getBall2(): ?int
    {
        return $this->ball2;
    }

    public function setBall2(int $ball2): self
    {
        $this->ball2 = $ball2;

        return $this;
    }

    public function getBall3(): ?int
    {
        return $this->ball3;
    }

    public function setBall3(int $ball3): self
    {
        $this->ball3 = $ball3;

        return $this;
    }

    public function getBall4(): ?int
    {
        return $this->ball4;
    }

    public function setBall4(int $ball4): self
    {
        $this->ball4 = $ball4;

        return $this;
    }

    public function getBall5(): ?int
    {
        return $this->ball5;
    }

    public function setBall5(int $ball5): self
    {
        $this->ball5 = $ball5;

        return $this;
    }

    public function getLuckyNumber(): ?int
    {
        return $this->luckyNumber;
    }

    public function setLuckyNumber(?int $luckyNumber): void
    {
        $this->luckyNumber = $luckyNumber;
    }
}
