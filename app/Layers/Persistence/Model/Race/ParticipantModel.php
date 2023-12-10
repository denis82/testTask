<?php

namespace App\Layers\Persistence\Model\Race;

use App\Layers\Domain\Race\Entity\ParticipantDomain;
use App\Layers\Persistence\Entity\Race\ParticipantPersistence;

class ParticipantModel
{
    public function toDomain(ParticipantPersistence $participantPersistence): ParticipantDomain
    {
        return new ParticipantDomain(
            $participantPersistence->getId(),
            $participantPersistence->getCar(),
            $participantPersistence->getName(),
            $participantPersistence->getCity(),
            $participantPersistence->getAttempt(),
        );
    }
}
