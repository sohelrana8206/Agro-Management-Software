<?php

namespace App\Http\Controllers;

//use App\Cms_accounts_head;
use App\Animal_born_info;
use App\Animal_feeding;
use App\Animal_medicine_vaccine;
use App\Animal_physician;
use App\Food_inventory;
use App\Food_purchase;
use App\Purchase;
use App\User;
use App\Animal_profile;
use App\Animal_breed;
use App\Animal_insemination_info;
use App\Insemination_company;
use App\Bull_info;
use App\Hut_bazar;
use App\Farmer;
use App\Agent;
use App\Animal_inventory;
use App\Animal_health;
use App\Animal_health_condition;
use App\Employee;
use App\Yield_info;
use App\Yield_purchase_info;
use App\Yield_rent_info;
use Session;
use Image;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $get_pass = User::where('email',$email)->find(1);
        if($get_pass){
            if($password === decrypt($get_pass['password'])){
                session([
                    'email' => $email,
                    'userID' => $get_pass['id'],
                    'name' => $get_pass['name']
                ]);
                return redirect('dashboard');
            }else{
                return back()
                    ->with('success','Incorrect Password.');
            }
        }else{
            return back()
                ->with('success','Incorrect User Email Address.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dashboard(Request $request){
        if ($request->session()->has('userID')) {
            return view('admin.dashboard');
        }else{
            return redirect('admin');
        }
    }

    public function animal_list(){
        $data = Animal_profile::with('animal_breed','animal_inventory')->orderBy('id','desc')->get();
        return view('admin.animal.animal_list',compact('data'));
    }

    public function view_animal_profile(){
        $data = Animal_profile::with('animal_breed','animal_inventory')->orderBy('id','desc')->get();
        return view('admin.animal.animal_list',compact('data'));
    }

    public function create_animal(){
        $breed = Animal_breed::all();
        $animal_mother = Animal_profile::all();
        $animal_physician = Animal_physician::all();
        $insemination_company = Insemination_company::all();
        $bull = Bull_info::all();
        return view('admin.animal.animal_create_form',compact('breed','animal_mother','animal_physician','insemination_company','bull'));
    }

    public function store_animal(Request $request){
        if(($request->hasFile('animal_pic'))){
            $destinationPath = public_path('/uploads/physician/thumbnail');
            $publicPath = 'public/uploads/physician/thumbnail';
            if(!File::isDirectory($destinationPath)){
                File::makeDirectory($destinationPath, 0777, true, true);
            }

            $photo = $request->file('animal_pic');
            $extension = $photo->getClientOriginalExtension();
            $fileName = 'phys_'.time().'.'.$extension;
            $img = Image::make($photo->path());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            $photo->move(public_path('uploads/physician'), $fileName);
            File::delete(public_path('uploads/physician/'.$fileName));
            $animal_photo = $publicPath.'/'.$fileName;

            $data = array(
                'animal_name'=>$request->input('animal_name'),
                'animal_type'=>$request->input('animal_type'),
                'animal_registration_no'=>$request->input('animal_registration_no'),
                'animal_birth_date'=>date('Y-m-d',strtotime($request->input('animal_birth_date'))),
                'animal_age'=>$request->input('animal_age'),
                'animal_gender'=>$request->input('animal_gender'),
                'animal_current_location'=>$request->input('animal_current_location'),
                'animal_height'=>$request->input('animal_height'),
                'animal_weight'=>$request->input('animal_weight'),
                'animal_color'=>$request->input('animal_color'),
                'animal_breed_id'=>$request->input('animal_breed_id'),
                'animal_teeth_availability'=>$request->input('animal_teeth_availability'),
                'animal_pic'=>$animal_photo,
                'user_id'=>session('userID'),
            );
            $animal_profile = Animal_profile::create($data);

            if($request->input('collection_type') == 1){
                $purchaseData = array(
                    'animal_profile_id' => $animal_profile->id,
                    'purchase_date' => date('Y-m-d',strtotime($request->input('purchase_date'))),
                    'purchase_price' => $request->input('purchase_price'),
                );

                $animal_purchase = Purchase::create($purchaseData);

                $animalInventoryData = array(
                    'animal_profile_id' => $animal_profile->id,
                    'estimated_price' => $request->input('purchase_price'),
                    'animal_status' => 'active',
                    'collection_type' => $request->input('collection_type'),
                    'user_id' => session('userID'),
                );

                Animal_inventory::create($animalInventoryData);

                if($request->input('purchase_from') == 1){
                    $hutData = array(
                        'purchase_id' => $animal_purchase->id,
                        'hut_bazar_name' => $request->input('hut_bazar_name'),
                        'hut_bazar_address' => $request->input('hut_bazar_address'),
                        'animal_owner_name' => $request->input('animal_owner_name'),
                        'animal_owner_phone' => $request->input('animal_owner_phone'),
                        'animal_previous_history' => $request->input('animal_previous_history'),
                    );

                    Hut_bazar::create($hutData);
                }elseif($request->input('purchase_from') == 2){
                    $farmerData = array(
                        'purchase_id' => $animal_purchase->id,
                        'farmer_name' => $request->input('farmer_name'),
                        'farmer_phone' => $request->input('farmer_phone'),
                        'farmer_address' => $request->input('farmer_address'),
                        'animal_previous_history' => $request->input('animal_previous_history_farmer'),
                    );

                    Farmer::create($farmerData);
                }else{
                    $agentData = array(
                        'purchase_id' => $animal_purchase->id,
                        'agent_name' => $request->input('agent_name'),
                        'agent_phone' => $request->input('agent_phone'),
                        'agent_address' => $request->input('agent_address'),
                        'animal_owner_name' => $request->input('animal_owner_name'),
                        'animal_owner_phone' => $request->input('animal_owner_phone'),
                        'animal_owner_address' => $request->input('animal_owner_address'),
                        'animal_previous_history' => $request->input('animal_previous_history_agent'),
                    );

                    Agent::create($agentData);
                }

            }else{
                $bornData = array(
                    'animal_profile_id' => $animal_profile->id,
                    'animal_born_type' => $request->input('animal_born_type'),
                    'animal_maturity' => $request->input('animal_maturity'),
                    'animal_mother_profile_id' => $request->input('animal_mother_profile_id'),
                    'animal_estimated_price' => $request->input('animal_estimated_price'),
                    'animal_born_status' => $request->input('animal_born_status'),
                    'animal_physician_id' => $request->input('animal_physician_id'),
                    'insemination_company_id' => $request->input('insemination_company_id'),
                    'bull_info_id' => $request->input('bull_info_id'),
                );

                Animal_born_info::create($bornData);

                $animalInventoryData = array(
                    'animal_profile_id' => $animal_profile->id,
                    'estimated_price' => $request->input('animal_estimated_price'),
                    'animal_status' => $request->input('animal_born_status'),
                    'collection_type' => $request->input('collection_type'),
                    'user_id' => session('userID'),
                );

                Animal_inventory::create($animalInventoryData);
            }

            return redirect('animalList')
                ->with('toast_success','Animal successfully added.');
        }else{
            return back()
                ->with('toast_success','Image Upload Problem.');
        }
    }

    public function edit_animal($id){

    }

    public function animal_inventory_list(){
        $data = Animal_inventory::orderBy('id','desc')->get();
        return view('admin.animal.animal_inventory_list',compact('data'));
    }

    public function edit_animal_status_form(Request $request){
        $id = $request->input('id');
        $data = Animal_inventory::find($id);
        return view('admin.animal.edit_animal_status_form',compact('data'));
    }

    public function update_animal_status_form(Request $request){
        $id = $request->input('id');
        $data = array(
            'animal_status' => $request->input('animal_status'),
            'updated_at' => date('Y-m-d'),
        );

        $record = Animal_inventory::find($id);
        $record->update($data);

        return back()
            ->with('toast_success','Animal Status successfully updated.');
    }

    public function animal_breed_list(){
        $data = Animal_breed::orderBy('id','desc')->get();
        return view('admin.animal.animal_breed_list',compact('data'));
    }

    public function create_animal_breed(){
        return view('admin.animal.animal_breed_create_form');
    }

    public function store_animal_breed(Request $request){
        $data = array(
            'breed_name' => $request->input('breed_name'),
            'breed_nationality' => $request->input('breed_nationality'),
            'animal_type' => $request->input('animal_type'),
        );

        Animal_breed::create($data);

        return back()
            ->with('toast_success','Animal Breed successfully added.');
    }

    public function physician_list(){
        $data = Animal_physician::orderBy('id','desc')->get();
        return view('admin.animal_health.physician_list',compact('data'));
    }

    public function create_physician(){
        return view('admin.animal_health.physician_create_form');
    }

    public function store_physician(Request $request){
        if(($request->hasFile('physician_photo')) || $request->hasFile('physician_nid_image')){
            $destinationPath = public_path('/uploads/physician/thumbnail');
            $publicPath = 'public/uploads/physician/thumbnail';
            if(!File::isDirectory($destinationPath)){
                File::makeDirectory($destinationPath, 0777, true, true);
            }

            if($request->hasFile('physician_photo')){
                $phys_photo = $request->file('physician_photo');
                $phys_extension = $phys_photo->getClientOriginalExtension();
                $physFileName = 'phys_'.time().'.'.$phys_extension;
                $physImg = Image::make($phys_photo->path());
                $physImg->resize(300, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$physFileName);
                $phys_photo->move(public_path('uploads/physician'), $physFileName);
                File::delete(public_path('uploads/physician/'.$physFileName));
                $physician_photo = $publicPath.'/'.$physFileName;
            }else{
                $physician_photo = '';
            }

            if($request->hasFile('physician_nid_image')){
                $nid_photo = $request->file('physician_nid_image');
                $nid_extension = $nid_photo->getClientOriginalExtension();
                $nidFileName = 'nid_'.time().'.'.$nid_extension;
                $nidImg = Image::make($nid_photo->path());
                $nidImg->resize(500, 700, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$nidFileName);
                $nid_photo->move(public_path('uploads/physician'), $nidFileName);
                File::delete(public_path('uploads/physician/'.$nidFileName));
                $physician_nid_image = $publicPath.'/'.$nidFileName;
            }else{
                $physician_nid_image = '';
            }

            $data = array(
                'physician_name'=>$request->input('physician_name'),
                'physician_phone'=>$request->input('physician_phone'),
                'physician_job_type'=>$request->input('physician_job_type'),
                'physician_organization_name'=>$request->input('physician_organization_name'),
                'physician_address'=>$request->input('physician_address'),
                'physician_emergency_contact_number'=>$request->input('physician_emergency_contact_number'),
                'physician_nid'=>$request->input('physician_nid'),
                'physician_photo'=>$physician_photo,
                'physician_nid_image'=>$physician_nid_image,
            );
            Animal_physician::create($data);

            return redirect('physicianList')
                ->with('toast_success','Physician successfully added.');
        }else{
            return back()
                ->with('toast_success','Image Upload Problem.');
        }
    }

    public function insemination_list(){
        $data = Animal_insemination_info::orderBy('id','desc')->get();
        return view('admin.insemination.insemination_list',compact('data'));
    }

    public function create_insemination(){
        $animal = DB::table('animal_profiles')
            ->join('animal_inventories','animal_profiles.id' , '=','animal_inventories.animal_profile_id','LEFT')
            ->where('animal_inventories.animal_status', 'active')
            ->select('animal_profiles.id','animal_profiles.animal_name','animal_profiles.animal_registration_no')
            ->get();
        $ins_company = Insemination_company::all();
        $bulls = Bull_info::all();
        return view('admin.insemination.create_insemination',compact('animal','ins_company','bulls'));
    }

    public function store_insemination(Request $request){
        $data = array(
            'animal_profile_id' => $request->input('animal_profile_id'),
            'insemination_date' => $request->input('insemination_date'),
            'insemination_company_id' => $request->input('insemination_company_id'),
            'bull_info_id' => $request->input('bull_info_id'),
            'insemination_status_birth_status' => $request->input('insemination_status_birth_status'),
        );

        Animal_insemination_info::create($data);

        return redirect('insemination')
            ->with('toast_success','Insemination Information successfully added.');
    }

    public function insemination_company_list(){
        $data = Insemination_company::orderBy('id','desc')->get();
        return view('admin.insemination.insemination_company_list',compact('data'));
    }

    public function create_insemination_company(){
        return view('admin.insemination.insemination_company_create_form');
    }

    public function store_insemination_company(Request $request){
        $data = array(
            'company_name' => $request->input('company_name'),
            'company_phone' => $request->input('company_phone'),
            'company_email' => $request->input('company_email'),
            'company_address' => $request->input('company_address'),
            'company_representative_name' => $request->input('company_representative_name'),
            'company_representative_phone' => $request->input('company_representative_phone'),
        );

        Insemination_company::create($data);

        return redirect('inseminationCompanyList')
            ->with('toast_success','Insemination Company successfully added.');
    }

    public function bull_list(){
        $data = Bull_info::with('insemination_company')->orderBy('id','desc')->get();
        return view('admin.insemination.bull_list',compact('data'));
    }

    public function create_bull(){
        $insemination_company = Insemination_company::all();
        return view('admin.insemination.bull_create_form',compact('insemination_company'));
    }

    public function store_bull(Request $request){
        $data = array(
            'bull_name' => $request->input('bull_name'),
            'bull_registration_number' => $request->input('bull_registration_number'),
            'insemination_company_id' => $request->input('insemination_company_id'),
        );

        Bull_info::create($data);

        return redirect('bullList')
            ->with('toast_success','Bull Info successfully added.');
    }

    public function animal_health(){
        $data = Animal_health::orderBy('id','desc')->get();
        return view('admin.animal_health.animal_health_list',compact('data'));
    }

    public function create_animal_health(){
        $animal = DB::table('animal_profiles')
            ->join('animal_inventories','animal_profiles.id' , '=','animal_inventories.animal_profile_id','LEFT')
            ->where('animal_inventories.animal_status', 'active')
            ->select('animal_profiles.id','animal_profiles.animal_name','animal_profiles.animal_registration_no')
            ->get();
        $health_condition = Animal_health_condition::all();
        $vaccine = Animal_medicine_vaccine::all();
        $physician = Animal_physician::all();
        $emp = Employee::all();
        return view('admin.animal_health.create_animal_health',compact(
            'animal',
            'health_condition',
            'vaccine',
            'physician',
            'emp'
        ));
    }

    public function store_animal_health(Request $request){
        $data = array(
            'animal_profile_id' => $request->input('animal_profile_id'),
            'animal_health_condition_id' => $request->input('animal_health_condition_id'),
            'start_date' => $request->input('start_date'),
            'start_time' => $request->input('start_time'),
            'note' => $request->input('note'),
            'treatment' => $request->input('treatment'),
            'animal_medicine_vaccine_id' => $request->input('animal_medicine_vaccine_id'),
            'animal_physician_id' => $request->input('animal_physician_id'),
            'animal_visit_date_time' => $request->input('animal_visit_date_time'),
            'physician_comments' => $request->input('physician_comments'),
            'employee_id' => $request->input('employee_id'),
            'treatment_status' => $request->input('treatment_status'),
            'treatment_action_note' => $request->input('treatment_action_note'),
            'animal_health_status' => $request->input('animal_health_status'),
        );

        Animal_health::create($data);

        return redirect('animalHealth')
            ->with('toast_success','Animal Health successfully added.');
    }

    public function animal_health_condition_list(){
        $data = Animal_health_condition::all();
        return view('admin.animal_health.animal_health_condition_list',compact('data'));
    }

    public function create_animal_health_condition(){
        return view('admin.animal_health.create_animal_health_condition');
    }

    public function store_animal_health_condition(Request $request){
        $data = array(
            'animal_health_condition_name' => $request->input('animal_health_condition_name'),
        );

        Animal_health_condition::create($data);

        return back()
            ->with('toast_success','Animal Health Condition successfully added.');
    }

    public function edit_animal_health_condition($id){

    }

    public function medicine_list(){
        $data = Animal_medicine_vaccine::all();
        return view('admin.animal_health.medicine_list',compact('data'));
    }

    public function create_medicine(){
        return view('admin.animal_health.create_medicine');
    }

    public function store_medicine(Request $request){
        $data = array(
            'animal_medicine_vaccine_name' => $request->input('animal_medicine_vaccine_name'),
            'animal_type' => $request->input('animal_type'),
        );

        Animal_medicine_vaccine::create($data);

        return back()
            ->with('toast_success','Animal Medicine/Vaccine successfully added.');
    }

    public function food_inventory_list(){
        $data = Food_inventory::all();
        return view('admin.food.food_inventory_list',compact('data'));
    }

    public function food_inventory_create(){
        return view('admin.food.food_inventory_create');
    }

    public function food_inventory_store(Request $request){
        $data = array(
            'food_name'=>$request->input('food_name'),
            'food_quality'=>$request->input('food_quality'),
            'food_quantity'=>$request->input('food_quantity'),
            'food_cost'=>$request->input('food_cost'),
            'food_status'=>'active',
        );
        $food_inventory = Food_inventory::create($data);

        if($request->input('collectionForm') == 2){
            $yieldData = array(
                'food_inventory_id' => $food_inventory->id,
                'yield_name' => $request->input('yield_name'),
                'yield_location' => $request->input('yield_location'),
                'yield_size' => $request->input('yield_size'),
            );

            $yield_info = Yield_info::create($yieldData);

            if($request->input('yieldOwnership') == 1){
                $yieldRentData = array(
                    'yield_info_id' => $yield_info->id,
                    'yield_owner_name' => $request->input('yield_owner_name'),
                    'yield_owner_phone' => $request->input('yield_owner_phone'),
                    'yield_owner_address' => $request->input('yield_owner_address'),
                    'yield_rent_start_date' => date('Y-m-d',strtotime($request->input('yield_rent_start_date'))),
                    'yield_rent_end_date' => date('Y-m-d',strtotime($request->input('yield_rent_end_date'))),
                    'yield_rent_cost' => $request->input('yield_rent_cost'),
                );

                Yield_rent_info::create($yieldRentData);
            }else{
                $yieldPurchaseData = array(
                    'yield_info_id' => $yield_info->id,
                    'previous_yield_owner_name' => $request->input('previous_yield_owner_name'),
                    'previous_yield_owner_address' => $request->input('previous_yield_owner_address'),
                    'yield_purchase_date' => date('Y-m-d',strtotime($request->input('yield_purchase_date'))),
                    'yield_purchase_cost' => $request->input('yield_purchase_cost'),
                );

                Yield_purchase_info::create($yieldPurchaseData);
            }

        }else{
            $purchaseData = array(
                'food_inventory_id' => $food_inventory->id,
                'food_supplier_name' => $request->input('food_supplier_name'),
                'food_supplier_phone' => $request->input('food_supplier_phone'),
                'food_supplier_address' => $request->input('food_supplier_address'),
            );

            Food_purchase::create($purchaseData);
        }

        return redirect('foodInventory')
            ->with('toast_success','Food Inventory successfully added.');
    }

    public function food_supplier_list(){
        $data = Food_purchase::all();
        return view('admin.food.food_supplier_list',compact('data'));
    }

    public function yield_list(){
        $data = Yield_info::all();
        return view('admin.food.yield_list',compact('data'));
    }

    public function rental_yield_list(Request $request){
        $id = $request->input('id');
        $data = Yield_rent_info::where('yield_info_id',$id)->orderBy('id','desc')->get();;
        return view('admin.food.rental_yield_list',compact('data'));
    }

    public function own_yield_list(Request $request){
        $id = $request->input('id');
        $data = Yield_purchase_info::where('yield_info_id',$id)->orderBy('id','desc')->get();;
        return view('admin.food.own_yield_list',compact('data'));
    }

    public function animal_feeding_list(){
        $data = Animal_feeding::all();
        return view('admin.food.animal_feeding_list',compact('data'));
    }

    public function animal_feeding_create(){
        $animal = DB::table('animal_profiles')
            ->join('animal_inventories','animal_profiles.id' , '=','animal_inventories.animal_profile_id','LEFT')
            ->where('animal_inventories.animal_status', 'active')
            ->select('animal_profiles.id','animal_profiles.animal_name','animal_profiles.animal_registration_no')
            ->get();
        $food_inventory = Food_inventory::all();
        $employee = Employee::all();
        return view('admin.food.animal_feeding_create',compact('animal','food_inventory','employee'));
    }

    public function animal_feeding_store(Request $request){
        $data = array(
            'animal_profile_id' => $request->input('animal_profile_id'),
            'food_inventory_id' => $request->input('food_inventory_id'),
            'food_quantity' => $request->input('food_quantity'),
            'food_cost' => $request->input('food_cost'),
            'feeding_time' => date('Y-m-d H:i:s',strtotime($request->input('feeding_time'))),
            'employee_id' => $request->input('employee_id'),
        );

        Animal_feeding::create($data);

        return redirect('animalFeeding')
            ->with('toast_success','Animal Feeding Info successfully added.');
    }

    public function logout(){
        Session::flush();
        return redirect('admin');
    }
}
