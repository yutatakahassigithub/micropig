<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KensakuController extends Controller
{
    public function index($area = null)
    {
        if ($area && $area !== 'すべて') {
            $users = User::where('area', $area)->get();
        } else {
            $users = User::all();
        }

        return view('kensaku', [
            'users' => $users,
            'selectedArea' => $area ?? 'すべて',
        ]);
    }
    
    
}
