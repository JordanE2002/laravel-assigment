<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees; // Correct model name
use App\Models\Companies; // Ensure you import the Companies model

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
        // Fetch all companies and pass them to the view
        $companies = Companies::all();
        return view('auth.info.create-employee', compact('companies'));
    }

    // Store a newly created employee in the database
    public function store(Request $request)
    {
        // Validate incoming data, ensure 'company_id' is provided
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'company_id' => 'required|exists:companies,id', // Validation for company_id
            'phone_number' => 'nullable|string|max:20',
        ]);

        // Create the employee and associate the company by company_id
        Employees::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'company_id' => $request->company_id, // Store the company_id here
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('employees')->with('status', 'Employee created successfully!');
    }

    // Show details of a specific employee
    public function show(Employees $employee)
    {
        //
    }

    // Show a form to edit an existing employee
    public function edit(Employees $employee)
    {
        $companies = Companies::all(); // Fetch companies for dropdown in the edit form
        return view('auth.info.edit-employee', compact('employee', 'companies'));
    }

    // Update an employee in the database
    public function update(Request $request, Employees $employee)
    {
        // Validate incoming data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'company_id' => 'required|exists:companies,id', // Validation for company_id
            'phone_number' => 'nullable|string|max:20',
        ]);

        // Update the employee with new values
        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'company_id' => $request->company_id, // Update company_id
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('employees')->with('status', 'Employee updated successfully!');
    }

    // Delete an employee from the database
    public function destroy(Employees $employee)
    {
        $employee->delete();
        return redirect()->route('employees')->with('status', 'Employee deleted successfully!');
    }
}