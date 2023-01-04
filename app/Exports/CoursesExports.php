<?php

namespace App\Exports;

use App\Classes\Search\SearchBuilder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CoursesExports implements FromView
{

    protected $request;

    public function __construct($request) 
    {

        $this->request = $request;

    }

    public function view(): View
    {
        return view('excel.course', [
            'courses' => $this->getQuery()
        ]);
    }

    public function getQuery()
    {   

        $builder = new SearchBuilder('Course', $this->request);

        return $builder->get();

    }

}