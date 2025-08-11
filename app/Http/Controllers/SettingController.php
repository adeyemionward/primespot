<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExpenseCategory;
use App\Models\User;
use App\Models\Testimonial;
use App\Models\SiteSetting;
use App\Models\SiteTheme;
use App\Services\Company\ColorLogoService;
use App\Services\Company\ThemeService;
use App\Services\Company\AddressService;
use App\Services\Company\HeroTextService;
use App\Services\Company\EmailService;
use App\Services\Company\PhoneService;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:settings-category-list', ['only' => ['all_category']]);
        $this->middleware('permission:settings-category-create', ['only' => ['create_category','post_category']]);

        $this->middleware('permission:settings-category-edit', ['only' => ['editCategory','updateCategory']]);
        $this->middleware('permission:settings-category-delete', ['only' => ['deleteCategory']]);

        $this->middleware('permission:settings-logo-create', ['only' => ['color_logo','storeColorLogo']]);
        $this->middleware('permission:settings-theme-create', ['only' => ['theme','storeTheme']]);
        $this->middleware('permission:settings-hero-text-create', ['only' => ['hero_text','storeHeroText']]);

        $this->middleware('permission:settings-address-create', ['only' => ['address','storeAddress']]);
        $this->middleware('permission:settings-email-create', ['only' => ['email','storeEmail']]);
        $this->middleware('permission:settings-phone-create', ['only' => ['phone','storePhone']]);
    }



    public function all_category()
    {
        $expense_category =  ExpenseCategory::where('company_id', app('company_id'))->get();
        return view('company.settings.category.all_category', compact('expense_category'));
    }

    public function create_category()
    {
        return view('company.settings.category.add_category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post_category()
    {
        try{
            $user = Auth::user();
            //save into locations

            $name                 =  request('name');
            for ($count=0; $count < count($name); $count++) {
                $order_location =  ExpenseCategory::updateOrCreate(
                    [
                        'company_id'    => app('company_id'),
                        'category_name' => $name[$count],
                        'created_by'    => $user->id,
                    ],
                );
            }
            return redirect(route('company.settings.category.all_category'))->with('flash_success','Expense category added successfully');
        }catch(\Exception $th){
                return redirect()->back()->with('flash_error','An Error Occured: Please try later');
        }

    }

    public function editCategory($id){
        $expense_category =  ExpenseCategory::find($id);
        return view('company.settings.category.edit_category', compact('expense_category'));
    }

    public function updateCategory($id){
        try{
            $expense_category =  ExpenseCategory::find($id);
            $expense_category->category_name = request('name');
            $expense_category->save();
            return redirect(route('company.settings.category.all_category'))->with('flash_success','Expense category edited successfully');
        }catch(\Exception $th){
            return redirect()->back()->with('flash_error','An Error Occured: Please try later');
        }

    }

    public function deleteCategory($id){
        try{
            $expense_category =  ExpenseCategory::find($id);
            $expense_category->delete();
            return redirect(route('company.settings.category.all_category'))->with('flash_success','Expense category deleted successfully');
        }catch(\Exception $th){
            return redirect()->back()->with('flash_error','An Error Occured: Please try later');
        }

    }

    private function siteDetails (){
        $user = Auth::user();
        return SiteSetting::where('company_id', $user->company_id)->first();
    }

    public function color_logo(){
        return view('company.settings.site.color_logo');
    }

    public function theme(){
        $themes = SiteTheme::all();
        $site_theme = $this->siteDetails();
        return view('company.settings.site.theme', compact('themes','site_theme'));
    }

    public function storeTheme(Request $request, ThemeService $themeservice){
        return $themeservice->postTheme($request);
    }

    public function storeColorLogo(Request $request, ColorLogoService $colorlogoservice){
        return $colorlogoservice->postColorLogo($request);
    }

    public function hero_text(){
        return view('company.settings.site.hero_text');
    }

    public function storeHeroText(Request $request, HeroTextService $herotextservice){
        return $herotextservice->postHeroText($request);
    }

    public function address(){
        return view('company.settings.site.address');
    }

    public function storeAddress(Request $request, AddressService $addressservice){
        return $addressservice->postAddress($request);
    }

    public function email(){
        return view('company.settings.site.email');
    }

    public function storeEmail(Request $request, EmailService $emailservice){
        return $emailservice->postEmail($request);
    }

    public function phone(){
        return view('company.settings.site.phone');
    }

    public function storePhone(Request $request, PhoneService $phoneservice){
        return $phoneservice->postPhone($request);
    }
}
