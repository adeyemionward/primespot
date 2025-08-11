<?php
    namespace App\Services\Company;

    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;

    use App\Models\SiteSetting;
    class ColorLogoService
    {

        public function postColorLogo($data){
            DB::beginTransaction();
            try{

                $fileName = $data->file('site_logo');
                if ($data->hasFile('site_logo')) {
                    if ($img = $fileName) {
                        $ImageName = str_replace(' ', '', $fileName->getClientOriginalName());//$fileName->getClientOriginalName();
                        $uniqueFileName = time() . '_' . $ImageName;
                        $img->move(public_path('siteimages/'), $uniqueFileName);
                    }
                }

                SiteSetting::UpdateOrcreate(
                    [
                        'company_id'  => Auth::user()->company_id,
                    ],
                    [
                        'site_logo1'  => $uniqueFileName,
                    ],
                );
                DB::commit();

            }catch(\Exception $th){
                DB::rollBack();
                return redirect()->back()->with('flash_error','An Error Occured: Please try later');
            }
            return redirect(route('company.settings.site.color_logo'))->with('flash_success','Logo and color added successfully');
        }
    }

