<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\VueTodo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class VueTodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vue.index');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name'    => 'required|string|max:50',
            'phone'   => 'required|numeric|min:11|unique:todos',
            'email'   => 'required|email|string|unique:todos',
            'address' => 'required|string',
            'age'     => 'required|numeric',
            'avater'  => 'required|image|max:2048',
        ]);
        $avater  = $request->file('avater');
        $user_id = auth()->user()->id;
        $fileNew = 'Avater_' . Str::random(5) . '.' . $avater->getClientOriginalExtension();
        // $avater->storeAs('Images',$fileNew);
        Image::make($avater)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save('Uploads/Images/' . $fileNew);

        $data = [
            'user_id' => $user_id,
            'image'   => 'Uploads/Images/' . $fileNew,
        ];
        Todo::create($data);
        return json_encode(['data'=>$data,'response'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VueTodo  $vueTodo
     * @return \Illuminate\Http\Response
     */
    public function show(VueTodo $vueTodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VueTodo  $vueTodo
     * @return \Illuminate\Http\Response
     */
    public function edit(VueTodo $vueTodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VueTodo  $vueTodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VueTodo $vueTodo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VueTodo  $vueTodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(VueTodo $vueTodo)
    {
        //
    }
}
