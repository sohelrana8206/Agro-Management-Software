<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'min:8|required_with:re_password|same:re_password',
            're_password' => 'min:8',
        ];
        $this->validate($request, $rules);

        $email = $request->input('email');
        $duplicate_email = User::where('email',$email)->get();
        if(count($duplicate_email) > 0){
            return back()
                ->with('success','You are already registered.');
        }else{
            $name = $request->input('name');
            $email = $request->input('email');
            $password = encrypt($request->input('password'));
            $re_password = $request->input('re_password');

            $data = array(
                'name'=>$name,
                "email"=>$email,
                "password"=>$password,
                "created_at"=>date('Y-m-d h:i:s')
            );
            User::create($data);

            return back()
                ->with('success','You have successfully registration.');
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
}
