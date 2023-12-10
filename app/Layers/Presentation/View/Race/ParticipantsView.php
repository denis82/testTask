<?php

namespace App\Layers\Presentation\View\Race;

use Illuminate\Support\Arr;
use App\Layers\Domain\Race\Entity\ParticipantDomain;

class ParticipantsView
{
    public const PARTICIPANT_ID          = 'id';
    public const PARTICIPANT_CAR         = 'car';
    public const PARTICIPANT_NAME        = 'name';
    public const PARTICIPANT_CITY        = 'city';
    public const PARTICIPANT_PLACE       = 'place';
    public const PARTICIPANT_ATTEMPT1    = 'attempt1';
    public const PARTICIPANT_ATTEMPT2    = 'attempt2';
    public const PARTICIPANT_ATTEMPT3    = 'attempt3';
    public const PARTICIPANT_ATTEMPT4    = 'attempt4';
    public const PARTICIPANT_ATTEMPT_SUM = 'attemptSum';


    public function __construct()
    {
    }

    public function toArrayWithSort(array $participants): array
    {
        $participants = $this->toArray($participants);
        return $this->_sort($participants);
    }

    public function toArray(array $participants): array
    {
        $participants = array_map(function($participant){
            return [
                self::PARTICIPANT_PLACE       => 0,
                self::PARTICIPANT_CAR         => $participant->getParticipantCar(),
                self::PARTICIPANT_NAME        => $participant->getParticipantName(),
                self::PARTICIPANT_CITY        => $participant->getParticipantCity(),
                self::PARTICIPANT_ATTEMPT1    => $participant->getParticipantAttempt()[0],
                self::PARTICIPANT_ATTEMPT2    => $participant->getParticipantAttempt()[1],
                self::PARTICIPANT_ATTEMPT3    => $participant->getParticipantAttempt()[2],
                self::PARTICIPANT_ATTEMPT4    => $participant->getParticipantAttempt()[3],
                self::PARTICIPANT_ATTEMPT_SUM => array_sum($participant->getParticipantAttempt()),
            ];
        }, $participants);
        return $participants;
    }


    private function _sort(array $participants): array
    {
        $sorted = collect($participants)->sortBy([
            fn (array $a, array $b) => $b['attemptSum'] <=> $a['attemptSum'],
            fn (array $a, array $b) => $b['attempt4']   <=> $a['attempt4'],
            fn (array $a, array $b) => $b['attempt3']   <=> $a['attempt3'],
            fn (array $a, array $b) => $b['attempt2']   <=> $a['attempt2'],
            fn (array $a, array $b) => $b['attempt1']   <=> $a['attempt1'],
            fn (array $a, array $b) => $a['name']       <=> $b['name'],
        ]);
        return array_map(function($key, $value) {$value['place'] = ++$key;return $value;},
            array_keys($sorted->values()->all()), $sorted->values()->all());
    }
}
