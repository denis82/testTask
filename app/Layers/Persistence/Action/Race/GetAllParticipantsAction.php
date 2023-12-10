<?php

namespace App\Layers\Persistence\Action\Race;

use App\Layers\Domain\Race\GetAllParticipantsInterface;
use App\Layers\Persistence\Model\Race\ParticipantModel;
use App\Layers\Persistence\Entity\Race\ParticipantPersistence;
use App\Layers\Persistence\Repository\Race\ParticipantRepository;

class GetAllParticipantsAction implements GetAllParticipantsInterface
{
    private ParticipantModel $_participantModel;
    private ParticipantRepository $_participantRepository;

    public function __construct(ParticipantModel $participantModel,  ParticipantRepository $participantRepository)
    {
        $this->_participantModel = $participantModel;
        $this->_participantRepository = $participantRepository;
    }

    public function getAll(): array
    {
        return array_map(
            function (ParticipantPersistence $participantPersistence){
                return $this->_participantModel->toDomain($participantPersistence);
            },
            $this->_participantRepository->getParticipantsWithResults()
        );
    }
}
