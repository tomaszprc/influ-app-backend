<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function __construct() {
        $this->middleware("auth:sanctum")->except(['show', 'register']);
    }

    public function register(Request $request) {
      
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'unique:companies|required|email',
            'password' => 'required'
        ])->validate();

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $description = $request->description;
        $website = $request->website;

        $companyUser = Company::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'description' => $description,
            'website' => $website,
            'verified' => false
        ]);

        $token = $companyUser->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        return CompanyResource::collection(Company::all());
    }  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->all());
        error_log($company);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return response()->json($company);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
