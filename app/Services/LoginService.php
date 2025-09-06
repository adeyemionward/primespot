<?php

    namespace App\Services;
    use App\Models\Company;
    use App\Models\User;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Carbon\Carbon;

    class LoginService
    {
        protected function activeSub($data){
            $email = request('email');
            $user_details = User::where('email', $email)->orWhere('admin_username',$email)->first();
            $today = Carbon::today()->toDateString();
            $subdomain = explode('.', $data->getHost())[0];
            $company_details = Company::where('subdomain', $subdomain)->first();


            if($company_details->id != $user_details->company_id) return response()->json([ [7] ]);

            if($company_details->status == 'inactive') return response()->json([ [9] ]); //acount is inactive

            //if($company_details->plan == null) return response()->json([ [15] ]); //plan is empty

            if($company_details->sub_end_date < $today ) return response()->json([ [10] ]); // subscription expired

        }
        public function login($data){
           // try{
                $user_cred   = $data->only('password');

                //$email = request('email');

                $input = request('email');
                $isEmail = filter_var($input, FILTER_VALIDATE_EMAIL);

                // Prepare the query to find the user
                $userQuery = User::where(function ($query) use ($input, $isEmail) {
                    if ($isEmail) {
                        // If it's an email, search by email
                        $query->where('email', $input);
                    }
                });

                // Retrieve the user details
                $user_details = $userQuery->first();

                //$user_details = User::where('email', $email)->first();
                if(is_null($user_details)) return response()->json([ [7] ]);

                $user_cred['email'] = $isEmail ? $input : $user_details->email;

                $user_type =  $user_details->user_type;

                if (Auth::attempt($user_cred)) {
                    if($user_type == User::CUSTOMER){

                        return response()->json([ [1] ]); //go to customer page dashboard

                    }elseif($user_type == User::HOST){

                        return response()->json([ [2] ]); //go to vendor page dashboard

                    }elseif($user_type == User::ADMIN){

                        return response()->json([ [11] ]); //go to admin page dashboard
                    }
                }else{
                    return response()->json([ [7] ]);
                }

            // }catch (\Throwable $th){
            //     ErrorLog::log('auth', 'signin', $th->getMessage()); //log error
            //     return response()->json([ [5] ]);
            // }
        }
    }

?>
