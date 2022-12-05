<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Account_head;
use App\Animal_inventory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaction::with('account_head')->orderBy('id','desc')->get();

        return view('admin/transactions_list',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animal = DB::table('animal_profiles')
            ->join('animal_inventories','animal_profiles.id' , '=','animal_inventories.animal_profile_id','LEFT')
            ->where('animal_inventories.animal_status', 'active')
            ->select('animal_profiles.id','animal_profiles.animal_name','animal_profiles.animal_registration_no')
            ->get();
        $accounts_head = Account_head::orderBy('id','desc')->get();
        return view('admin/transaction_add_form',compact('animal','accounts_head'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accounts_head_dr_id = $request->input('acc_head_dr_id');
        $accounts_head_cr_id = $request->input('acc_head_cr_id');
        $dr = $request->input('dr');
        $cr = $request->input('cr');
        $tran_amount = $request->input('tran_amount');
        $narration = $request->input('narration');
        $tran_date = date('Y-m-d',strtotime($request->input('tran_date')));

        $debit_data = array(
            'account_head_id'=>$accounts_head_dr_id,
            "dr_cr"=>$dr,
            "amount"=>$tran_amount,
            "transaction_date"=>$tran_date,
            "narration"=>$narration,
            "create_user"=>session('userID'),
            "created_at"=>date('Y-m-d h:i:s')
        );
        Transaction::create($debit_data);
        $credit_data = array(
            'account_head_id'=>$accounts_head_cr_id,
            "dr_cr"=>$cr,
            "amount"=>$tran_amount,
            "transaction_date"=>$tran_date,
            "narration"=>$narration,
            "create_user"=>session('userID'),
            "created_at"=>date('Y-m-d h:i:s')
        );
        Transaction::create($credit_data);

        if($accounts_head_cr_id == 5){
            $animalID = $request->input('animal_profile_id');
            $flight = Animal_inventory::where('animal_profile_id',$animalID)->update(['animal_status' => 'sale']);
        }

        return back()
            ->with('toast_success','Transactions Successfully added.');
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
        $data = Transaction::find($id);
        $accounts_head = DB::table('account_heads')->get();
        return view('admin/transaction_edit_form',['data' => $data,'accounts_head'=> $accounts_head]);
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
        $accounts_head_id = $request->input('acc_head_id');
        $dr_cr = $request->input('dr_cr');
        $tran_amount = $request->input('tran_amount');
        $narration = $request->input('narration');
        $tran_date = date('Y-m-d',strtotime($request->input('tran_date')));
        $data = array(
            'account_head_id'=>$accounts_head_id,
            "dr_cr"=>$dr_cr,
            "amount"=>$tran_amount,
            "transaction_date"=>$tran_date,
            "narration"=>$narration,
            "update_user"=>session('userID'),
            "updated_at"=>date('Y-m-d h:i:s')
        );
        $record = Transaction::find($id);
        $record->update($data);

        return back()
            ->with('toast_success','Transactions Successfully Updated.');
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

    public function accountTypeByAjax(Request $request){
        $acc_head_id = $request->input('acc_head_id');
        $accounts_head = DB::table('account_heads')->find($acc_head_id);
        if(($accounts_head->account_type_id == 1) || ($accounts_head->account_type_id == 6)){
            $member = DB::table('members')->get();
            $select = '<p class="mb-3"><b>Member Name</b></p><select style="padding: 7px;font-size: 15px;color: #7b818c" class="form-control show-tick mb-3 last_payment" data-href="http://localhost/cms/lastPaymentByAjax" name="acc_type_id"><option value="">Please Select</option>';
            foreach($member as $row){
                $select .= '<option value="Member_'.$row->id.'">'.$row->member_id.' - '.$row->member_name.'</option>';
            }
            $select .= '</select>';
            return $select;
        }elseif(($accounts_head->account_type_id == 2) || ($accounts_head->account_type_id == 7)){
            $student = DB::table('students')->get();
            $select = '<p class="mb-3"><b>Student Name</b></p><select style="padding: 7px;font-size: 15px;color: #7b818c" class="form-control show-tick mb-3 last_payment" data-href="http://localhost/cms/lastPaymentByAjax" name="acc_type_id"><option value="">Please Select</option>';
            foreach($student as $row){
                $select .= '<option value="Student_'.$row->id.'">'.$row->student_name.'</option>';
            }
            $select .= '</select>';
            return $select;
        }elseif($accounts_head->account_type_id == 5){
            $employee = DB::table('employees')->get();
            $select = '<p class="mb-3"><b>Employee Name</b></p><select style="padding: 7px;font-size: 15px;color: #7b818c" class="form-control show-tick mb-3 last_payment" data-href="http://localhost/cms/lastPaymentByAjax" name="acc_type_id"><option value="">Please Select</option>';
            foreach($employee as $row){
                $select .= '<option value="Employee_'.$row->id.'">'.$row->name.'</option>';
            }
            $select .= '</select>';
            return $select;
        }
    }

    public function lastPaymentByAjax(Request $request){
        $data_id = explode('_',$request->input('data_id'));
        $transaction_data = DB::table('transactions')
            ->where('transactionable_id', $data_id[1])
            ->where('transactionable_type', $data_id[0])
            ->orderBy('id', 'desc')
            ->select('*')
            ->get();

        if(count($transaction_data) > 0){
            $months_for = explode('/',$transaction_data[0]->months_for);
            $first_month = $months_for[0];
            $second_month = $months_for[1];

            if(!empty($second_month)){
                $textBox = '<p class="mb-3"><b>Last Payment</b></p><input type="text" class="form-control show-tick mb-3" value="'.date('M Y',strtotime($first_month)).' to '.date('M Y',strtotime($second_month)).'" readonly>';
            }else{
                $textBox = '<p class="mb-3"><b>Last Payment</b></p><input type="text" class="form-control show-tick mb-3" value="'.date('M Y',strtotime($first_month)).'" readonly>';
            }
        }else{
            $textBox = '<p class="mb-3"><b>Last Payment</b></p><input type="text" class="form-control show-tick mb-3" readonly>';
        }

        return $textBox;
    }
}
