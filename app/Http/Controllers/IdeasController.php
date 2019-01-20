<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreIdea;
use App\Idea;

class IdeasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $ideas = Idea::where('board_id', '=', $id)->latest()->get();
        return response()->json($ideas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIdea $request)
    {
        $ideas = new Idea;
        $ideas->title = request('title');
        $ideas->description = request('description');
        $ideas->user_id = auth()->id();
        $ideas->board_id = request('board');
        $ideas->save();
        return response()->json($ideas);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($boardId, $ideaId)
    {
        $idea = Idea::findOrFail($ideaId);
        return response()->json($idea);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreIdea $request, $id)
    {
        $ideas = Idea::find($request->id);
        $ideas->update($request->all());
        return response()->json($ideas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($boardId, $ideaId)
    {
        Idea::findOrFail($ideaId)->delete();
        return response()->json(['status' => 'success'], 204);
    }
}
