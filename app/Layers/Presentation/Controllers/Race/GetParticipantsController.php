<?php

namespace App\Layers\Presentation\Controllers\Race;

use Illuminate\Http\Request;
use App\Exports\ResultsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Layers\Presentation\Controllers\Controller;
use App\Layers\UseCase\Race\GetAllParticipantsUseCase;
use App\Layers\Presentation\View\Race\ParticipantsView;

class GetParticipantsController extends Controller
{
    private ParticipantsView $_participantsView;
    private GetAllParticipantsUseCase $_getAllParticipantsUseCase;

    public function __construct(
        ParticipantsView $participantsView,
        GetAllParticipantsUseCase $getAllParticipantsUseCase)
    {
         $this->_participantsView = $participantsView;
         $this->_getAllParticipantsUseCase = $getAllParticipantsUseCase;
    }

    public function get(Request $request)
    {
        $participants = $this->_participantsView->toArrayWithSort(
            $this->_getAllParticipantsUseCase->getAll()
        );
        return view('welcome',['participants' => $participants]);
    }

    public function export()
    {
        return Excel::download(new ResultsExport($this->_participantsView,$this->_getAllParticipantsUseCase),'resultl.csv');
    }
}
