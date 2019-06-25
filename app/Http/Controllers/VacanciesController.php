<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Resources\Vacancy as VacancyResource;
use App\Models\Vacancy;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class VacanciesController extends Controller
{
    public function index($paginatCount=10)
    {
       $vacancies = Vacancy::with('company')->paginate($paginatCount);
       return view('vacancies.index', compact('vacancies'));
    }

    public function show($id)
    {
        $vacancy=Vacancy::with('company')->find($id);
        return view('vacancies.show', compact('vacancy'));
    }
}
