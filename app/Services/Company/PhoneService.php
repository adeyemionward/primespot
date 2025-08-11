<?php
    namespace App\Services\Company;

    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;

    use App\Models\SiteSetting;
    class PhoneService
    {

        public function postPhone($data){
            DB::beginTransaction();
            try{

                SiteSetting::UpdateOrcreate(
                    [
                        'company_id'      => Auth::user()->company_id,
                    ],
                    [
                        'phone_1' => request('phone_1'),
                        'phone_2' => request('phone_2'),
                        'phone_3' => request('phone_3'),
                    ],
                );
                DB::commit();

            }catch(\Exception $th){
                DB::rollBack();
                return redirect()->back()->with('flash_error','An Error Occured: Please try later');
            }
            return redirect(route('company.settings.site.phone'))->with('flash_success','Phone added successfully');
        }
    }

