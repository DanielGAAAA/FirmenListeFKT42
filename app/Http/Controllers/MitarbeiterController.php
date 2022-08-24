<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Mitarbeiter;
use App\Http\Resources\Mitarbeiter as MitarbeiterResource;

class MitarbeiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($firmen_id)
    {
        $mitarbeiter= Mitarbeiter::paginate(15);
        $mitarbeiter_collection= MitarbeiterResource::collection($mitarbeiter);
        $mitarbeiter_collection_firmen= collect([]);
        foreach($mitarbeiter_collection as $item){
            if($item["firmen_id"]==$firmen_id){
                $mitarbeiter_collection_firmen->push($item);
            }
        }
        return $mitarbeiter_collection_firmen;
        }
      //  return MitarbeiterResource::collection($mitarbeiter)->collection;
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mitarbeiter= Mitarbeiter::findOrFail($id);
        return response()->json(new MitarbeiterResource($mitarbeiter));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
