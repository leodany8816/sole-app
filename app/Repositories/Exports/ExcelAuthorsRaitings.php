<?php

namespace App\Repositories\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExcelAuthorsRaitings implements FromView
{
	public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
    	return view('authors.authorsRaitings.excel', [
            'data' => $this->data
        ]);
    }
}