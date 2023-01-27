<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\FactoryOrderTemplate;
use App\Http\Requests\V1\FactoryOrderTemplate\StoreFactoryOrderTemplateRequest;
use App\Http\Requests\V1\FactoryOrderTemplate\UpdateFactoryOrderTemplateRequest;
use App\Http\Resources\V1\FactoryOrder\FactoryOrderTemplateResource;
use App\Models\Option;
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
        $r_arr = $request->toArray();

        FactoryOrderTemplate::truncate();

        // FactoryOrderTemplate::insert($r_arr['items']);

        FactoryOrderTemplate::upsert($r_arr['items'], ['item_id'], ['serial']);

        Option::upsert($r_arr['labels'], ['name'], ['value']);

        return $this->success();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $output = [];
        $output['items'] = FactoryOrderTemplate::all(['item_id', 'serial']);
        $output['labels'] = Option::where('name', 'col1_labels')
            ->orWhere('name', 'col2_labels')
            ->get(['name', 'value']);

        return $this->success($output);
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
