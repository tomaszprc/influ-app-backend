<?php

namespace App\Http\Controllers\Api\V1;

use App\DataTypes\AnnouncementStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnnoucementResource;
use App\Models\ActiveCampaign;
use App\Models\Annoucement;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AnnoucementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AnnoucementResource::collection(Annoucement::all());
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
    public function store(Request $request)
    {
        $emailUser = $request->user()->email;
        $company = Company::where('email', $emailUser)->first();
        
        if(!$company) {
            throw ValidationException::withMessages([
                'user' => ['You dont have possibility to do this action']
            ]);
        } 

            $company_id = $company->id;
            $title = $request->title;
            $description = $request->description;
            $onlyVerifiedInfluencers = $request->onlyVerifiedInfluencers;
            $status = $request->status;

            Annoucement::create([
                'company_id' => $company_id,
                "title" => $title,
                "description"=> $description,
                "onlyVerifiedInfluencers" => $onlyVerifiedInfluencers,
                "start_at" => date("Y-m-d H:i:s"),
                "finished_at" => date("Y-m-d H:i:s"),
                "status"=> $status
            ]);
        
            return response()->json([
                "message" => "Post created"
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new AnnoucementResource(Annoucement::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annoucement $annoucement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Annoucement $annoucement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annoucement $annoucement)
    {
        //
    }

    public function createCampaign(Request $request) {

        $annoucement_id = $request->annoucement_id;
        $influencer_id = $request->influencer_id;

        $influencerInCampaign = ActiveCampaign::where('influencer_id', $influencer_id)->where('annoucement_id',$annoucement_id)->first();

        if ($influencerInCampaign) {
            throw ValidationException::withMessages([
                'message' => ['Influencer is already in annoucement!']
            ]);
        }

        ActiveCampaign::create([
            "annoucement_id" => $annoucement_id,
            "influencer_id" => $influencer_id
        ]);
        

        return response()->json([
            "message" => "Joined!"
        ]);
    }
}
