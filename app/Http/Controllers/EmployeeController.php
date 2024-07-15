<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function EmployeeDashboard()
    {
        return view('employees.employee_dashboard');
    }

    public function index()
    {
        $employees = Employee::all(); // Get all employees from db
        return view('employees.index', ['employees' => $employees]); // Pass employees to view
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'emp_name' => 'required|string|max:255',
            'birthday' => ['required', 'date', 'before:18 years ago'], // Rule
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|digits:10|unique:employees',
            'address' => 'required|string|max:255|unique:employees',
            'email' => 'required|string|email|max:255|unique:employees',
            'joined_date' => 'required|date|before_or_equal:today',
            'image' => 'nullable|mimes:png,jpeg,jpg|max:2048',
        ], [
            // Message
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
        
        $newEmployee->save(); // Storing data into db

        // When adding is finished
        return redirect(route('admin.employee.index'))->with('success', 'Employee details added successfully');
        // with-> "message"
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', ['employee' => $employee]);
    }

    public function update(Employee $employee, Request $request)
    {
        $data = $request->validate([
            'emp_name' => 'required|string|max:255',
            'birthday' => ['required', 'date', 'before:18 years ago'],
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|digits:10',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'joined_date' => 'required|date|before_or_equal:today',
            'image' => 'nullable|mimes:png,jpeg,jpg|max:2048',
        ], [
            'birthday.before' => 'The employee must be at least 18 years old.',
            'joined_date.before_or_equal' => 'The joined date must be today or a date before today.'
        ]);
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
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
        $employee->image = $data['image'] ?? $product->image;

        $employee->save();

        // When update is finished
        return redirect(route('admin.employee.index'))->with('success', 'Details updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect(route('admin.employee.index'))->with('success', 'Employee removed successfully');
    }

    public function register()
    {
        return view('auth.register');
    }
}
