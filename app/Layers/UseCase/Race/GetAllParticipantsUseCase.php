<?php

namespace App\Layers\UseCase\Race;

use App\Layers\Domain\Race\Entity\ParticipantDomain;
use App\Layers\Domain\Race\GetAllParticipantsInterface;

class GetAllParticipantsUseCase
{
    private GetAllParticipantsInterface $__getAllParticipants;

    public function __construct(GetAllParticipantsInterface $getSantaById)
    {
         $this->_getAllParticipants = $getSantaById;
    }

    public function getAll(): array
    {
         return $this->_getAllParticipants->getAll();
    }
}
