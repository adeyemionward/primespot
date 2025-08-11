<?php

    namespace App\Repository;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;

    class ProfileRepository
    {
        public function storeProfile($data){
            $user = Auth::user();
            try{
                $firstname      = $data['firstname'];
                $lastname       = $data['lastname'];
                $email          = $data['email'];
                $phone          = $data['phone'];
                $company_name   = $data['company_name'];
                $address        = $data['address'];

                //update to user
                $user = User::where('id',$user->id)->first();
                $user->firstname        = $firstname;
                $user->lastname         = $lastname;
                $user->email            = $email;
                $user->phone            = $phone;
                $user->company_name     = $company_name;
                $user->address          = $address;
               
                $user->save();

            }catch(\Exception $th){
                return ['success' => false, 'error' => $th->getMessage()];
            }
            return ['success' => true, 'user' => $user];
        }

    }

?>
