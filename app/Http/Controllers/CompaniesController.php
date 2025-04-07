<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies; // Using plural model name

class CompaniesController extends Controller
{
    // Show all companies
    public function index()
    {
        $companies = Companies::all(); // Fetch all companies
        return view('auth.info.companies', compact('companies'));
    }

    // Show a form to create a new company
    public function create()
    {
        return view('auth.info.create-company');
    }

    // Store a newly created company in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
        ]);
    
        // Check if user uploaded a logo
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $logo = $path;
        } else {
            // Fallback to random API image if no upload
            $logo = 'http://picsum.photos/seed/' . rand(0, 10000) . '/100';
        }
    
        Companies::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $logo,
        ]);
    
        return redirect()->route('companies')->with('status', 'Company created successfully!');
    }

    // Show details of a specific company
    public function show(Companies $companies)
    {
        //
    }

    // Show a form to edit an existing company
    public function edit(Companies $companies)
    {
        //
    }

    // Update a company in the database
    public function update(Request $request, Companies $companies)
    {
        //
    }

    // Delete a company from the database
    public function destroy(Companies $companies)
    {
        $companies->delete();
        return redirect()->route('companies')->with('status', 'Company deleted successfully!');

        
    }
}