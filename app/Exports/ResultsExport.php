<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use App\Layers\UseCase\Race\GetAllParticipantsUseCase;
use App\Layers\Presentation\View\Race\ParticipantsView;

class ResultsExport implements FromCollection, WithCustomCsvSettings, WithHeadings, WithStyles
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

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [ 1 => ['font' => ['bold' => true]]];
    }

    public function headings(): array
    {
        return [
            'Номер места',
            'Имя пилота',
            'Город пилота',
            'Автомобиль',
            'Попытка 1',
            'Попытка 2',
            'Попытка 3',
            'Попытка 4',
            'Сумма очков',
        ];
    }

    public function collection()
    {
        $participants = $this->_participantsView->toArray(
            $this->_getAllParticipantsUseCase->getAll()
        );
        return collect($this->_participantsView->sort($participants));
    }
}
