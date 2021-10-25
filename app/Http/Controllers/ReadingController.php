<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class ReadingController extends Controller
{
    public function index($id)
    {
        $data['patient'] = Patient::findOrFail($id);
        return view('pages.readings.add')->with($data);
    }
}
