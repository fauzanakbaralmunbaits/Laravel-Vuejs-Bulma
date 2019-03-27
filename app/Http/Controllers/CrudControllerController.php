<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrudRequest;
use App\CrudController;
use Illuminate\Http\Request;

class CrudControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('crud');
    }

    public function getData()
    {

        return CrudController::orderBy('name','ASC')->get();
        
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrudRequest $request)
    {
        //
        // return $request->all();
        $save = new CrudController;
        $save->name = $request->name;
        $save->phone = $request->phone;
        $save->email = $request->email;
        $save->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CrudController  $crudController
     * @return \Illuminate\Http\Response
     */
    public function show(CrudController $crudController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CrudController  $crudController
     * @return \Illuminate\Http\Response
     */
    public function edit(CrudController $crudController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CrudController  $crudController
     * @return \Illuminate\Http\Response
     */
    public function update(CrudRequest $request)
        // public function update(Request $request, CrudController $crudController)
    {
        //
        $save = CrudController::find($request->id);
        $save->name = $request->name;
        $save->phone = $request->phone;
        $save->email = $request->email;
        $save->save();

        // return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CrudController  $crudController
     * @return \Illuminate\Http\Response
     */
    // public function destroy(CrudController $crudController)
    public function destroy(CrudController $crud)
    {
        //
        CrudController::where('id', $crud->id)->delete();
    }
}
