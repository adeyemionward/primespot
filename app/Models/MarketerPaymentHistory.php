<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketerPaymentHistory extends Model
{
    use HasFactory;

    public static function updateWallet($company_id, $amount_paid)
    {
        //find the marketer in users ta
       
        $marketer = User::find($customer_id);
        
        if ($marketer) {
            $user = $marketer->user;
            $user($user);
            if ($user && $user->wallet) {
                $user->wallet->increment('amount', $competition->participant_fee);
            } else {
                // Handle the case where the user or user wallet is not found
                return toastr()->error('User wallet not found');
            }
        } else {
            // Handle the case where the competition is not found
            return toastr()->error('Competition not found');
        }
    }

    
}
