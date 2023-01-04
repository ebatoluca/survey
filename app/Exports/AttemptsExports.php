<?php

namespace App\Exports;

use App\Classes\Search\SearchBuilder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AttemptsExports implements FromView
{

    protected $request;

    public function __construct($request) 
    {

        $this->request = $request;

    }

    public function view(): View
    {
        return view('excel.attempt', [
            'attempts' => $this->getQuery()
        ]);
    }

    public function getQuery()
    {   

        $builder = new SearchBuilder('Attempt', $this->request);

        return $builder->get();

    }

}