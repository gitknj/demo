<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crontest;

class CronController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
    
        $crontest=new Crontest;
        $crontest->cronval='test';
        $crontest->save();
        echo "hello";
    }
}
