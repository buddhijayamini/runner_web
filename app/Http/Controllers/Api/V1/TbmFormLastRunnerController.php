<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\APIController;
use App\Models\TbmFormLastRunner;
use App\Http\Requests\StoreTbmFormLastRunnerRequest;
use App\Http\Requests\UpdateTbmFormLastRunnerRequest;

class TbmFormLastRunnerController extends APIController
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
     * @param  \App\Http\Requests\StoreTbmFormLastRunnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTbmFormLastRunnerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TbmFormLastRunner  $tbmFormLastRunner
     * @return \Illuminate\Http\Response
     */
    public function show(TbmFormLastRunner $tbmFormLastRunner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TbmFormLastRunner  $tbmFormLastRunner
     * @return \Illuminate\Http\Response
     */
    public function edit(TbmFormLastRunner $tbmFormLastRunner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTbmFormLastRunnerRequest  $request
     * @param  \App\Models\TbmFormLastRunner  $tbmFormLastRunner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTbmFormLastRunnerRequest $request, TbmFormLastRunner $tbmFormLastRunner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TbmFormLastRunner  $tbmFormLastRunner
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbmFormLastRunner $tbmFormLastRunner)
    {
        //
    }
}
