<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Diary;
use Illuminate\Support\Facades\DB;

class DiaryController extends Controller
{
    public function index()
    {
        $values = Diary::all();
        $diaries = DB::table('diaries')->get();
        DD($diaries);
        return view('diaries.diary', compact('diaries'));
    }
}
