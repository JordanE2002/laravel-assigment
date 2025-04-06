<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees; // Correct model name

class EmployeesController extends Controller
{
    // Show all employees
    public function index()
    {
        $employees = Employees::paginate(10);
        return view('auth.info.employees', compact('employees'));
    }

    // Show a form to create a new employee
    public function create()
    {
        return view('auth.info.create-employee');
    }

    // Store a newly created employee in the database
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'company' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
        ]);

        Employees::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'company' => $request->company,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('employees')->with('status', 'Employee created successfully!');
    }
    // Show details of a specific employee
    public function show(Employees $employee) // Correct model name
    {
        //
    }

    // Show a form to edit an existing employee
    public function edit(Employees $employee)
    {
        //
    }

    // Update an employee in the database
    public function update(Request $request, Employees $employee)
    {
        //
    }

    // Delete an employee from the database
    public function destroy(Employees $employee)
    {
        $employee->delete();
    return redirect()->route('employees')->with('status', 'Employee deleted successfully!');
    }
}
