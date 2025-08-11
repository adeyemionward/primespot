<?php
    namespace App\Services\Company;

    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;

    use App\Models\SiteSetting;
    class AddressService
    {

        public function postAddress($data){
            DB::beginTransaction();
            try{

                SiteSetting::UpdateOrcreate(
                    [
                        'company_id'      => Auth::user()->company_id,
                    ],
                    [
                        'address_1' => request('address_1'),
                        'address_2' => request('address_2'),
                        'address_3' => request('address_3'),
                    ],
                );
                
                DB::commit();

            }catch(\Exception $th){
                DB::rollBack();
                return redirect()->back()->with('flash_error','An Error Occured: Please try later');
            }
            return redirect(route('company.settings.site.address'))->with('flash_success','Address added successfully');
        }
    }

