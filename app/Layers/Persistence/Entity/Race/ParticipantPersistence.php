<?php

namespace App\Layers\Persistence\Entity\Race;

class ParticipantPersistence
{
    private ?int $_participantId;
    private string $_participantCar;
    private string $_participantName;
    private string $_participantCity;
    private array $_participantAtt;

    public function __construct(
        ?int $participantId,
        string $participantCar,
        string $participantName,
        string $participantCity,
        array $participantAtt,
    ) {
        $this->_participantId   = $participantId;
        $this->_participantCar  = $participantCar;
        $this->_participantName = $participantName;
        $this->_participantCity = $participantCity;
        $this->_participantAtt  = $participantAtt;
    }

    public function getId(): ?int
    {
        return $this->_participantId;
    }

    public function getName(): string
    {
        return $this->_participantName;
    }

    public function getCar(): string
    {
        return $this->_participantCar;
    }

    public function getCity(): string
    {
        return $this->_participantCity;
    }

    public function getAttempt(): array
    {
        return $this->_participantAtt;
    }
}
