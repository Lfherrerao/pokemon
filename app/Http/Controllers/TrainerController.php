<?php

namespace laraDex\Http\Controllers;

use Illuminate\Http\Request;
use laraDex\Http\Requests\StoreTrainerRecuest;
use laraDex\Trainer;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = Trainer::all();
        // var_dump(compact($t));
        return view('trainers.index', compact('t'));
        // return $t;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRecuest $request)
    {


        if ($request->hasFile('avatar')) {
            echo "entra al if";
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
        }
        $trainer = new Trainer();
        $trainer->name = $request->input('name');
        $trainer->description = $request->input('description');
        $trainer->avatar = $name;
        $trainer->slug = time() . $request->input('name');

        $trainer->save();
        return redirect()->route('trainer.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $t = Trainer::where('slug', '=', $slug)->firstOrFail();
        return view('trainers.show', compact('t'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $t = Trainer::where('slug', '=', $slug)->firstOrFail();
        return view('trainers.edit', compact('t'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $slug)
    {

        /**

         *  unset($request['_method'],$request['_token']);
         *   
         *   $t = Trainer::where('slug', '=', $slug)->update($request->toArray());
         */




        unset($request['_method'], $request['_token']);
        $t = Trainer::where('slug', '=', $slug)->firstOrFail();


        $t->fill($request->except('avatar'));
        if ($request->hasFile('avatar')) {
            echo "entra al if";
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $t->avatar = $name;
            $file->move(public_path() . '/images/', $name);
        }

        $t->save();
        return redirect()->route('trainer.show', [$slug])->with('status','Entrenador '.$t->name.' modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {


        $t = Trainer::where('slug', '=', $slug)->firstOrFail();
        $file_path = public_path().'/images/'.$t->avatar;
        \File::delete($file_path);
        $t->delete();
       return redirect()->route('trainer.index')->with('status','Entrenador '.$t->name.' Eliminado con exito');;
      // return $file_path;
    }
}
