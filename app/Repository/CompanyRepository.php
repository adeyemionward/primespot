<?php

    namespace App\Repository;
    use App\Models\Company;
    use App\Models\User;
    use App\Models\Subscription;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Spatie\Permission\Models\Role;
    class CompanyRepository
    {
        public function postCompany($data){
            DB::beginTransaction();
            try{
                //save company
                $company = new Company();
                $company->name             = request('name');
                $company->contactperson    = request('contactperson');
                $company->email            = request('email');
                $company->phone            = request('phone');
                $company->city             = request('city');
                $company->state            = request('state');
                $company->country          = request('country');
                $company->address          = request('address');
                $company->subdomain        = request('subdomain');
                $company->status           = request('status');

                $company->sub_amount       = request('sub_amount');
                $company->sub_start_date   = request('sub_start_date');
                $company->sub_end_date     = request('sub_end_date');

                $company->save();

                //save user
                $input = $data->all();
                $input['password']      = Hash::make($input['password']);
                $input['user_type']     = User::COMPANY;
                $input['company_id']    = $company->id;
                $input['firstname']     = $input['name'];
                $input['lastname']      = $input['name'];
                $input['remember_token'] = urlencode(Hash::make(time() . request('email')));
                $companyUser = User::create($input);
                $companyUser->assignRole($data->input('roles'));

                //save subscription
                $subscription = new Subscription();
                $subscription->company_id       = $company->id;
                $subscription->sub_amount       = request('sub_amount');
                $subscription->sub_start_date   = request('sub_start_date');
                $subscription->sub_end_date     = request('sub_end_date');
                $subscription->status           = request('status');
                $subscription->created_by       = Auth::user()->id;
                $subscription->save();

                DB::commit();

            }catch(\Exception $th){
                DB::rollBack();
                return redirect()->back()->with('flash_error','An Error Occured: Please try later');
            }
            return redirect(route('admin.company.list'))->with('flash_success','Company added successfully');
        }

        public function updateCompany($data){
            DB::beginTransaction();
            try{
                $id = request()->id;
                 $company = Company::find($id);
                $company->name             = request('name');
                $company->contactperson    = request('contactperson');
                $company->email            = request('email');
                $company->phone            = request('phone');
                $company->city             = request('city');
                $company->state            = request('state');
                $company->country          = request('country');
                $company->address          = request('address');
                $company->subdomain        = request('subdomain');
                $company->status           = request('status');

                $company->sub_amount       = request('sub_amount');
                $company->sub_start_date   = request('sub_start_date');
                $company->sub_end_date     = request('sub_end_date');
                $company->save();

                DB::commit();

            }catch(\Exception $th){
                DB::rollBack();
                return redirect()->back()->with('flash_error','An Error Occured: Please try later');
            }
            return redirect(route('admin.company.list'))->with('flash_success','Company details updated successfully');
        }

        public function companyStatus($status){

            try{
                $id = request()->id;
                $company = Company::find($id);
                $company->status  = $status;

                 $company->save();

            }catch(\Exception $th){
                //return redirect()->back()->with('flash_error','An Error Occured: Please try later');
            }

        }



        public function deactivateCompany(){

            try{
                $this->companyStatus('inactive');

            }catch(\Exception $th){
                return redirect()->back()->with('flash_error','An Error Occured: Please try later');
            }
            return redirect(route('admin.company.view', request()->id))->with('flash_success','Company deactivated');
        }

        public function activateCompany(){
            try{
                $this->companyStatus('active');

            }catch(\Exception $th){
                return redirect()->back()->with('flash_error','An Error Occured: Please try later');
            }
            return redirect(route('admin.company.view', request()->id))->with('flash_success','Company activated');
        }

    }

?>
