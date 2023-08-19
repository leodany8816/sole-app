<?php

namespace App\Repositories\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExcelBooks implements FromView
{
	public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
    	return view('books.excel', [
            'data' => $this->data
        ]);
    }
}