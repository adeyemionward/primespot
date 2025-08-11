<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Expense extends Model
{
    use HasFactory;

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function updateddBy(){
        return $this->belongsTo(User::class,'updated_by','id');
    }

    public function marketerName(){
        return $this->belongsTo(User::class,'marketer_id','id');
    }

    public function supplierCompany(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }

    public function categoryName(){
        return $this->belongsTo(ExpenseCategory::class,'category_id','id');
    }

    public function expenseHistories(){
        return $this->hasMany(ExpensePaymentHistory::class);
    }
}
