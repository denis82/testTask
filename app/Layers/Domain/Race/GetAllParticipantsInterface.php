<?php

namespace App\Layers\Domain\Race;

use App\Layers\Domain\Race\Entity\ParticipantDomain;

interface GetAllParticipantsInterface
{
    public function getAll(): array;
}
