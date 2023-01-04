<?php

namespace App\Exports;

use App\Classes\Search\SearchBuilder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentsExports implements FromView
{

    protected $request;

    public function __construct($request) 
    {

        $this->request = $request;

    }

    public function view(): View
    {
        return view('excel.student', [
            'students' => $this->getQuery()
        ]);
    }

    public function getQuery()
    {   

        $builder = new SearchBuilder('Student', $this->request);

        return $builder->get();

    }

}