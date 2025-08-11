<?php
    namespace App\Services\Company;

    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;

    use App\Models\SiteSetting;
    class HeroTextService
    {

        public function postHeroText($data){
            DB::beginTransaction();
            try{

                SiteSetting::UpdateOrcreate(
                    [
                        'company_id'      => Auth::user()->company_id,
                    ],
                    [
                        'hero_text'    => request('hero_text'),
                    ],
                );
                DB::commit();

            }catch(\Exception $th){
                DB::rollBack();
                return redirect()->back()->with('flash_error','An Error Occured: Please try later');
            }
            return redirect(route('company.settings.site.hero_text'))->with('flash_success','Hero text added successfully');
        }
    }

