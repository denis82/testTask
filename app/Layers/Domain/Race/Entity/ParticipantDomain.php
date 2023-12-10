<?php

namespace App\Layers\Domain\Race\Entity;

class ParticipantDomain
{
    private ?int $_participantId;
    private string $_participantCar;
    private string $_participantName;
    private string $_participantCity;
    private array $_participantAttempt;

    public function __construct(
        ?int $participantId,
        string $participantCar,
        string $participantName,
        string $participantCity,
        array $participantAttempt,
    ) {
        $this->_participantId         = $participantId;
        $this->_participantCar        = $participantCar;
        $this->_participantName       = $participantName;
        $this->_participantCity       = $participantCity;
        $this->_participantAttempt    = $participantAttempt;
    }

    public function getParticipantId(): ?int
    {
        return $this->_participantId;
    }

    public function getParticipantName(): string
    {
        return $this->_participantName;
    }

    public function getParticipantCar(): string
    {
        return $this->_participantCar;
    }

    public function getParticipantCity(): string
    {
        return $this->_participantCity;
    }
    public function getParticipantAttempt(): array
    {
        return $this->_participantAttempt;
    }
}
