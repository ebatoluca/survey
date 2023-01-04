<?php

namespace App\Exports;

use App\Classes\Search\SearchBuilder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ClassroomsExports implements FromView
{

    protected $request;

    public function __construct($request) 
    {

        $this->request = $request;

    }

    public function view(): View
    {
        return view('excel.classroom', [
            'classrooms' => $this->getQuery()
        ]);
    }

    public function getQuery()
    {   

        $builder = new SearchBuilder('Classroom', $this->request);

        return $builder->get();

    }

}