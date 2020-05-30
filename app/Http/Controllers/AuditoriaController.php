<?php

namespace App\Http\Controllers;

use App\auditoria;
use Illuminate\Http\Request;

class AuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        if(isset($_SESSION['user'])){
            return view('desktop'); 
        }else{
            return redirect()->action('UsuarioController@index');
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function show(auditoria $auditoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function edit(auditoria $auditoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, auditoria $auditoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(auditoria $auditoria)
    {
        //
    }
}
