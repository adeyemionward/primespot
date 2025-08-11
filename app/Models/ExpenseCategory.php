<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'category_name',
        'created_by',
        'updated_by',
    ];

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

}
