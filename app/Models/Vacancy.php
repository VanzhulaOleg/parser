<?php

namespace App\Models;
use DB;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
class Vacancy extends Model{
     protected $fillable = ['name','vacancy_id','companyName','city', 'date','salary','branch','description', 'contactPerson', 'contactPhone', 'contactURL', 'dateTxt'];
    protected $visible = ['name','vacancy_id','company','city', 'date','salary','branch','description', 'contactPerson', 'contactPhone', 'contactURL', 'dateTxt'];
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'companyName', 'name');
    }


    public function companyLogo(){
        if($this->company){
            return $this->company->logo;
        }else{
            return '';
        }

    }

    public function companyId(){
        if($this->company){
            return $this->company->company_id;
        }else{
            return '';
        }

    }
}
