<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use Response;
use App\Http\Requests\StoreBoard;

class BoardsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $boards = Board::all();
        return view('board', compact('boards'));
    }

    public function store(StoreBoard $request){

        $validated = $request->validated();
        $boards = new Board;
        $boards->title = request('title');
        $boards->user_id = auth()->id();
        $boards->save();

        return response()->json($boards);

        // return redirect('/board');
    }
}







