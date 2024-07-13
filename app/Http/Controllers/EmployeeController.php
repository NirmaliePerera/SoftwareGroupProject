<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function EmployeeDashboard (){
        return view('employees.employee_dashboard');
    }
    
    public function index(){
        $employees = Employee::all();   /**get all employees from db -> before view */
        return view('employees.index', ['employees' => $employees]); /**then pass employee to view */
    }                                  /** [array -> this $employees is passed to view->'employees' from employees.index] */

    public function create(){
        return view('employees.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'emp_name' => 'required|string|max:255',
            'birthday' => ['required', 'date', 'before:18 years ago'],  //Rule
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|digits:10|unique:employees',
            'address' => 'required|string|max:255|unique:employees',
            'email' => 'required|string|email|max:255|unique:employees',
            'joined_date' => 'required|date|before_or_equal:today',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            //Message
            'birthday.before' => 'The employee must be at least 18 years old.',
            'phone.unique' => 'The phone number has already been taken.',
            'address.unique' => 'The address has already been taken.',
            'joined_date.before_or_equal' => 'The joined date must be today or a date before today.'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/category/';
            $file->move(public_path($path), $filename);
            $data['image'] = $path . $filename;
        }
        $newEmployee = new Employee();
        $newEmployee->emp_name = $data['emp_name'];
        $newEmployee->birthday = $data['birthday'];
        $newEmployee->gender = $data['gender'];
        $newEmployee->phone = $data['phone'];
        $newEmployee->address = $data['address'];
        $newEmployee->email = $data['email'];
        $newEmployee->joined_date = $data['joined_date'];
        $newEmployee->image = $data['image'] ?? null;

        $newEmployee->save();   //storing data into db

        //when adding is finished
        return redirect(route('employee.index'))->with('success','Employee details added successfully');
        //with-> "message"
    
    }

            //this 'Employee' is module, '$employee' varialble employee from route
    public function edit(Employee $employee){
        return view('employees.edit', ['employee' => $employee]);
    }

            //this 'Employee' is module, '$employee' varialble employee from route {employee}
    public function update(Employee $employee, Request $request) { //we want to get info from form, so "Request $request"
            //in update, have to validate
        $data = $request->validate([    //$data is data we recieve from the form
            // 'emp_id' => 'required|string|max:5|unique:employees',
            'emp_name' => 'required|string|max:255',
            'birthday' => ['required', 'date', 'before:18 years ago'],
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|digits:10',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'joined_date' => 'required|date|before_or_equal:today',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                //Message
                'birthday.before' => 'The employee must be at least 18 years old.',
                'joined_date.before_or_equal' => 'The joined date must be today or a date before today.'
            ]);
            //pass $data into Employee module from the form
       
            if ($request->hasFile('image')) {
                if ($employee->image) {
                    Storage::delete('public/' . $employee->image);
                }
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = 'uploads/category/';
                $file->move(public_path($path), $filename);
                $data['image'] = $path . $filename;
            }

            $employee->emp_name = $data['emp_name'];
            $employee->birthday = $data['birthday'];
            $employee->gender = $data['gender'];
            $employee->phone = $data['phone'];
            $employee->address = $data['address'];
            $employee->email = $data['email'];
            $employee->joined_date = $data['joined_date'];
            $employee->image = $data['image'] ?? $employee->image;

        // Handle the file upload
    
    
        $employee->save();

        //when update is finished
        return redirect(route('employee.index'))->with('success','Details updated successfully');
        //with-> "message"
    } 

    public function destroy(Employee $employee){
        $employee->delete();
        return redirect(route('employee.index'))->with('success','Employee removed successfully');

    }
}
