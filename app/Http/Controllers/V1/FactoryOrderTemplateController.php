<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\FactoryOrderTemplate;
use App\Http\Requests\V1\FactoryOrderTemplate\StoreFactoryOrderTemplateRequest;
use App\Http\Requests\V1\FactoryOrderTemplate\UpdateFactoryOrderTemplateRequest;
use App\Http\Resources\V1\FactoryOrder\FactoryOrderTemplateResource;
use App\Traits\V1\HttpResponses;

class FactoryOrderTemplateController extends Controller
{
    use HttpResponses;
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
     * @param  \App\Http\Requests\StoreFactoryOrderTemplateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFactoryOrderTemplateRequest $request)
    {
        FactoryOrderTemplate::upsert($request->toArray(), ['item_id'], ['serial']);

        return $this->success();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return $this->success(FactoryOrderTemplateResource::collection(FactoryOrderTemplate::all()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FactoryOrderTemplate  $factoryOrderTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(FactoryOrderTemplate $factoryOrderTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFactoryOrderTemplateRequest  $request
     * @param  \App\Models\FactoryOrderTemplate  $factoryOrderTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFactoryOrderTemplateRequest $request, FactoryOrderTemplate $factoryOrderTemplate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FactoryOrderTemplate  $factoryOrderTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(FactoryOrderTemplate $factoryOrderTemplate)
    {
        //
    }
}
