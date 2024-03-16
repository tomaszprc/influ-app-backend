<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInfluencerRequest;
use App\Http\Requests\UpdateInfluencerRequest;
use App\Models\Influencer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class InfluencerController extends Controller
{
    public function register(Request $request) {
      
        Validator::make($request->all(), [
            'username' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'description' => 'required|max:255',
            'youtube_url' => 'required|max:255',
            'instagram_url' => 'required|max:255',
            'tiktok_url' => 'required|max:255',
            'email' => 'unique:companies|unique:influencers|required|email',
            'password' => 'required'
        ])->validate();

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $description = $request->description;
        $youtube_url = $request->youtube_url;
        $instagram_url = $request->instagram_url;
        $tiktok_url = $request->tiktok_url;

        $companyUser = Influencer::create([
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password),
            'description' => $description,
            'youtube_url' => $youtube_url,
            'instagram_url' => $instagram_url,
            'tiktok_url' => $tiktok_url,
            'first_name' => $first_name,
            'last_name' => $last_name,
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
        //
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
    public function store(StoreInfluencerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Influencer $influencer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Influencer $influencer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInfluencerRequest $request, Influencer $influencer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Influencer $influencer)
    {
        //
    }
}
