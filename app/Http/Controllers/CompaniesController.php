<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

class CompaniesController extends Controller
{
    // Show all companies
   public function index(Request $request)
{
    $sort = $request->query('sort', 'name'); // Default sort by name
    $order = $request->query('order', 'asc'); // Default order

    $companies = Companies::orderBy($sort, $order)->paginate(10);

    return view('auth.info.companies', compact('companies', 'sort', 'order'));
}
    // Show form to create a new company
    public function create()
    {
        return view('auth.info.create-company');
    }

    // Store a newly created company in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => ['nullable', 'email', 'regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/'],
            'website' => 'nullable|url',
            'logo' => 'nullable|image',
        ]);

        // Handle logo (upload or fallback to API)
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $logo = $path;
        } else {
            $logo = 'http://picsum.photos/seed/' . rand(0, 10000) ;
        }

        Companies::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $logo,
        ]);

        return redirect()->route('companies')->with('status', 'Company created successfully!');
    }

    // Show a specific company (not implemented yet)
    public function show(Companies $company)
    {
        //
    }

    // Show form to edit an existing company
    public function edit(Companies $company)
    {
        return view('auth.info.edit-companies', compact('company'));
    }

    // Update a company in the database
    public function update(Request $request, Companies $company)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
           'email' => ['nullable', 'email', 'regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/'],
            'website' => 'nullable|url',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
        ]);

        // Handle logo upload (if a new logo is provided)
        if ($request->hasFile('logo')) {
            // Store the new logo
            $path = $request->file('logo')->store('logos', 'public');
            // Update the company's logo
            $company->logo = $path;
        }

        // Update the company details
        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $company->logo, // Update the logo only if a new one was uploaded
        ]);

        return redirect()->route('companies')->with('status', 'Company updated successfully!');
    }

    // Delete a company
    public function destroy(Companies $company)
    {
        $company->delete();
        return redirect()->route('companies')->with('status', 'Company deleted successfully!');
    }
}
