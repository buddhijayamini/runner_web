<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\APIController;
use App\Models\TbmFormData;
use App\Http\Requests\StoreTbmFormDataRequest;
use App\Http\Requests\UpdateTbmFormDataRequest;

class TbmFormDataController extends APIController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTbmFormDataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTbmFormDataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TbmFormData  $tbmFormData
     * @return \Illuminate\Http\Response
     */
    public function show(TbmFormData $tbmFormData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TbmFormData  $tbmFormData
     * @return \Illuminate\Http\Response
     */
    public function edit(TbmFormData $tbmFormData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTbmFormDataRequest  $request
     * @param  \App\Models\TbmFormData  $tbmFormData
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTbmFormDataRequest $request, TbmFormData $tbmFormData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TbmFormData  $tbmFormData
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbmFormData $tbmFormData)
    {
        //
    }
}
