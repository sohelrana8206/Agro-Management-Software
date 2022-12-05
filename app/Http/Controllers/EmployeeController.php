<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::select('*')->orderBy('id','desc')->get();
        return view('admin/employee_list',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student_type = DB::table('employees')->get();
        return view('admin/employee_add_form',['data'=> $student_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee_name = $request->input('employee_name');
        $designation = $request->input('designation');
        $emp_type = $request->input('emp_type');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $present_address = $request->input('present_address');

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = public_path('/uploads/employee/thumbnail');
            $img = Image::make($image->path());
            $img->resize(300, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            $image->move(public_path('uploads/employee'), $fileName);

            $data = array(
                'name'=>$employee_name,
                "image"=>$fileName,
                "designation"=>$designation,
                "email"=>$email,
                "mobile"=>$mobile,
                "address"=>$present_address,
                "employment_type"=>$emp_type,
                "create_user"=>session('userID'),
                "created_at"=>date('Y-m-d h:i:s')
            );
            Employee::create($data);

            return back()
                ->with('toast_success','Employee Information Successfully Added.');
        }else{
            return back()
                ->with('toast_success','Image Upload Problem.');
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
        $employee_info = Employee::find($id);

        require_once base_path() . '/vendor/autoload.php';

        $mpdf = new \Mpdf\Mpdf();
        $html = view('admin/employee_info',['data'=> $employee_info]);
        $mpdf->WriteHTML($html);
        $mpdf->Output('employee.pdf','I');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Employee::find($id);
        return view('admin/employee_edit_form',['data' => $data]);
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
        $employee_name = $request->input('employee_name');
        $designation = $request->input('designation');
        $emp_type = $request->input('emp_type');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $present_address = $request->input('present_address');

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = public_path('/uploads/employee/thumbnail');
            $img = Image::make($image->path());
            $img->resize(300, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            $image->move(public_path('uploads/employee'), $fileName);

            $data = array(
                'name'=>$employee_name,
                "image"=>$fileName,
                "designation"=>$designation,
                "email"=>$email,
                "mobile"=>$mobile,
                "address"=>$present_address,
                "employment_type"=>$emp_type,
                "update_user"=>session('userID'),
                "updated_at	"=>date('Y-m-d h:i:s')
            );
            $record = Employee::find($id);
            $record->update($data);

            return back()
                ->with('toast_success','Employee Information Successfully Updated.');
        }else{
            $data = array(
                'name'=>$employee_name,
                "designation"=>$designation,
                "email"=>$email,
                "mobile"=>$mobile,
                "address"=>$present_address,
                "employment_type"=>$emp_type,
                "update_user"=>session('userID'),
                "updated_at	"=>date('Y-m-d h:i:s')
            );
            $record = Employee::find($id);
            $record->update($data);

            return back()
                ->with('toast_success','Employee Information Successfully Updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Employee::find($id);
        $record->delete();
    }

    public function employees_payment_history(Request $request){
        $employeeID = $request->input('id');
        $employee = Employee::find($employeeID);
        $employeeID = $employee->id;
        $employee_name = $employee->transactions($employeeID);

        return view('admin/reports/employees_payment_history',['employee_name'=> $employee_name]);
    }
}
