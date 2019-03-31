<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TalaqqiExport implements FromCollection, WithHeadings
{
	use Exportable;

	public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        return DB::table('talaqqi')
        			->select('adddate','overall','tajwid','tarannum','kefasihan','kelancaran','komen','ayat_dari','ayat')
        			->where('user_id','=',$this->id)
        			->get();
    }

    public function headings(): array
    {
        return [
            'Tarikh','Overall','Tajwid','Tarannum','Kefasihan','Kelancaran','Komen','Ayat dari','Ayat hingga'
        ];
    }
}