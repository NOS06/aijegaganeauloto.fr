<?php

namespace App;

use Symfony\Component\Validator\Constraints as Assert;

class DidIWinDto
{
    /**
     * @Assert\NotBlank()
     * @Assert\Range(min="1", max="49")
     */
    private ?int $ball1;

    /**
     * @Assert\NotBlank()
     * @Assert\Range(min="1", max="49")
     */
    private ?int $ball2;

    /**
     * @Assert\NotBlank()
     * @Assert\Range(min="1", max="49")
     */
    private ?int $ball3;

    /**
     * @Assert\NotBlank()
     * @Assert\Range(min="1", max="49")
     */
    private ?int $ball4;

    /**
     * @Assert\NotBlank()
     * @Assert\Range(min="1", max="49")
     */
    private ?int $ball5;

    /**
     * @Assert\NotBlank()
     * @Assert\Range(min="1", max="10")
     */
    private ?int $luckyNumber;

    public function getBall1(): ?int
    {
        return $this->ball1;
    }

    public function setBall1(?int $ball1): void
    {
        $this->ball1 = $ball1;
    }

    public function getBall2(): ?int
    {
        return $this->ball2;
    }

    public function setBall2(?int $ball2): void
    {
        $this->ball2 = $ball2;
    }

    public function getBall3(): ?int
    {
        return $this->ball3;
    }

    public function setBall3(?int $ball3): void
    {
        $this->ball3 = $ball3;
    }

    public function getBall4(): ?int
    {
        return $this->ball4;
    }

    public function setBall4(?int $ball4): void
    {
        $this->ball4 = $ball4;
    }

    public function getBall5(): ?int
    {
        return $this->ball5;
    }

    public function setBall5(?int $ball5): void
    {
        $this->ball5 = $ball5;
    }

    public function getLuckyNumber(): ?int
    {
        return $this->luckyNumber;
    }

    public function setLuckyNumber(?int $luckyNumber): void
    {
        $this->luckyNumber = $luckyNumber;
    }

    public function getBalls(): array
    {
        return [
            $this->getBall1(),
            $this->getBall2(),
            $this->getBall3(),
            $this->getBall4(),
            $this->getBall5(),
        ];
    }
}
