<?php

namespace App\Framework\Di;

use App\Layers\Domain\Race\GetAllParticipantsInterface;
use App\Layers\Persistence\Action\Race\GetAllParticipantsAction;

class Race
{
    public function __invoke(): array
    {
        return [
            GetAllParticipantsInterface::class => GetAllParticipantsAction::class,
        ];
    }
}
