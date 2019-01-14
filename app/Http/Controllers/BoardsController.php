<?php

namespace App\Http\Controllers;

use App\Board;
use App\Http\Requests\StoreBoard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;

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
    public function index(Request $request)
    {
        $param = $request->param;
        $q = Board::all();
        $boards = Board::when($param, function ($q, $param) {
            return $this->filter($q, $param);
        })->with('user')->orderBy('created_at', 'id')->paginate(20)->appends(request('page'));
        return response()->json($boards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function filter($boards, $param)
    {
        if ($param === "all") {
            return $boards;
        }
        if ($param === "day") {
            return $boards->whereDay('created_at', Carbon::now());
        }
        if ($param === "week") {
            return $boards->whereDate('created_at', '>', Carbon::now()->subWeek());
        }
        if ($param === "month") {
            return $boards->whereDate('created_at', '>', Carbon::now()->subMonth());
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBoard $request)
    {

        $validated = $request->validated();
        $boards = new Board;
        $boards->title = request('title');
        $boards->user_id = auth()->id();
        $boards->save();
        return response()->json($boards);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $board = Board::findOrFail($id);
        return view('idea', ['board'=>$board]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $board = Board::findOrFail($id);
        return response()->json($board);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBoard $request, $id)
    {

        $request->validated();
        $boards = Board::findOrFail($id);
        $boards->update($request->all());
        return response()->json($boards);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Board::findOrFail($id)->delete();
        return response()->json(['status' => 'success'], 204);
    }
}
