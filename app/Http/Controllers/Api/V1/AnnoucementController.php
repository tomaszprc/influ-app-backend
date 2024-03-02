<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnnoucementResource;
use App\Models\Annoucement;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Annoucement $annoucement)
    {
        //
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
}
