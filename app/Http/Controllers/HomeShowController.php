<?php

namespace App\Http\Controllers;

use App\Models\TblBarang;
use Illuminate\Http\Request;

class HomeShowController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\View\View
     */
    public function ProductShow(): \Illuminate\View\View
    {
        $dtproduct = TblBarang::all();
        return view('Home',['dtproduct' => $dtproduct]);
    }
}