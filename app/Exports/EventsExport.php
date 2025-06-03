<?php

namespace App\Exports;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EventsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Event::where('user_id', Auth::id())->get();
    }

    public function headings():array {
        return [
            'Tarefa',
            'Descrição',
            'Local',
            'Data de Início',
            'Data de Término'
        ];
    }

    public function map($data):array {
        return [
            $data->title,
            $data->body,
            $data->place,
            date('d/m/Y', strtotime($data->start_date)),
            date('d/m/Y', strtotime($data->end_date))
        ];
    }
}
