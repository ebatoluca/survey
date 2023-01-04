<?php

namespace App\Exports;

use App\Classes\Search\SearchBuilder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CourseCategoriesExports implements FromView
{

    protected $request;

    public function __construct($request) 
    {

        $this->request = $request;

    }

    public function view(): View
    {
        return view('excel.course_category', [
            'course_categories' => $this->getQuery()
        ]);
    }

    public function getQuery()
    {   

        $builder = new SearchBuilder('CourseCategory', $this->request);

        return $builder->get();

    }

}