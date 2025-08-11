<?php
    namespace App\Services\Company;

    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;

    use App\Models\SiteSetting;
    class EmailService
    {

        public function postEmail($data){
            DB::beginTransaction();
            try{

                SiteSetting::UpdateOrcreate(
                    [
                        'company_id'      => Auth::user()->company_id,
                    ],
                    [
                        'email_1' => request('email_1'),
                        'email_2' => request('email_2'),
                        'email_3' => request('email_3'),
                    ],
                );
                DB::commit();

            }catch(\Exception $th){
                DB::rollBack();
                return redirect()->back()->with('flash_error','An Error Occured: Please try later');
            }
            return redirect(route('company.settings.site.email'))->with('flash_success','Email added successfully');
        }
    }

