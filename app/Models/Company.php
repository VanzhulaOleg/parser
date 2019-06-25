<?php

namespace App\Models;
use DB;
use App\Http\Requests;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Model;

class Company extends Model{
    protected $fillable = ['company_id','name','site','logo','description','verified'];
    protected $visible = ['company_id','name','site','logo','description','verified'];

}
