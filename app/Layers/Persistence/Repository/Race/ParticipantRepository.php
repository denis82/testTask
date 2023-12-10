<?php

namespace App\Layers\Persistence\Repository\Race;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use App\Layers\Persistence\Entity\Race\ParticipantPersistence;

class ParticipantRepository
{
    public function getParticipantsWithResults(): array
    {
        $jsonCars = Storage::disk('local')->json('data_cars.json');
        $jsonAttempts = Storage::disk('local')->json('data_attempts.json');

        return collect($jsonCars['data'])->map(
            function (array $participants) use ($jsonAttempts) : ParticipantPersistence{
                $participants['attempt'] = collect($jsonAttempts['data'])->whereIn('id', [$participants['id']])->pluck('result')->all();
                return $this->_makePersistenceEntity(collect($participants));
            }
        )->toArray();
    }

    private function _makePersistenceEntity($participants): ParticipantPersistence
    {
        return new ParticipantPersistence(
                $participants->get('id'),
                $participants->get('car'),
                $participants->get('name'),
                $participants->get('city'),
                $participants->get('attempt'),
        );
     }
}
