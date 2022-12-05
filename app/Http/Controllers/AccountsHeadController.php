<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account_head;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Session;

class AccountsHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Account_head::with('get_accounts_type')->orderBy('id','desc')->get();

        return view('admin/accounts_head_list',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts_type = DB::table('account_types')->get();

        return view('admin/accounts_head_form',['accounts_type' => $accounts_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accounts_head_name = $request->input('accounts_head');
        $accounts_head_type = $request->input('accounts_type');
        $data = array(
            'account_title'=>$accounts_head_name,
            "account_type_id"=>$accounts_head_type,
            "create_user"=>session('userID'),
            "created_at"=>date('Y-m-d h:i:s')
        );
        Account_head::create($data);

        return back()
            ->with('success','Accounts Head successfully added.');
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
        $accounts_type = DB::table('account_types')->pluck('account_type_name','id');
        $data = Account_head::find($id);
        return view('admin/accounts_head_edit_form',['account_type_id' => $accounts_type, 'data' => $data]);
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
        $accounts_head_name = $request->input('accounts_head');
        $accounts_head_type = $request->input('accounts_type');
        $data = array(
            'account_title'=>$accounts_head_name,
            "account_type_id"=>$accounts_head_type,
            "update_user"=>session('userID'),
            "updated_at"=>date('Y-m-d h:i:s')
        );
        $record = Account_head::find($id);
        $record->update($data);

        return redirect('accounts_head')
            ->with('success','Accounts Head successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Account_head::find($id);
        $record->delete();
    }
}
