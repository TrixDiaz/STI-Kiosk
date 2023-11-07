<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CheckoutController extends Controller
{
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
    public function store(Request $request)
    {

       

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function qrCode()
    {
        return QrCode::size(200)
        ->backgroundColor(255, 255, 0)
        ->color(0, 0, 255)
        ->margin(1)
        ->generate('https://checkout.paymongo.com/cs_QwKhXTq88ugDuXV4tycMak3N_client_mdVrX3UHvMLfez3dQ3JG2AC5#cGtfdGVzdF93eWc5d2RkVE5tWjJzSk5SZzFyeDlnd0s=');

        // View 
        // {!! QrCode::size(300)->generate('sampleText') !!}
    }
    
    
}
