<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketerCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_order_id',
        'company_id',
        'marketer_id',
        'percentage',
    ]; 

    public function jobDetails(){
        return $this->belongsTo(JobOrder::class,'job_order_id','id');
    }

    
}
