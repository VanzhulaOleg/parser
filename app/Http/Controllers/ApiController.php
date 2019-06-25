<?php

namespace App\Http\Controllers;

use App\Http\Resources\Vacancy as VacancyResource;
use App\Models\Vacancy;
use App\Http\Requests;
use Illuminate\Routing\Controller;



class ApiController extends Controller
{

    public function index()
    {
        $vacancies = Vacancy::with('company')->jsonPaginate();
        return VacancyResource::collection($vacancies);
    }

}
