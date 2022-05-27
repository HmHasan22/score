<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    public function store(Request $request)
    {
        Qualification::truncate();
        Qualification::create([
            'qualification' => json_encode($request->qualifications),
        ]);

        return redirect()->back()->with("success","API SUCCESSFULLY UPDATED");
    }
}
