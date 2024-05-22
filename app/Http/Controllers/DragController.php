<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DragController extends Controller
{
    public function index()
    {
        return view('draggable.drag');
    }

    public function saveOrder(Request $request)
    {
        return response()->json(['success' => true]);
    }
}

?>