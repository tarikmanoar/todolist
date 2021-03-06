<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Todo::with('user')->findOrFail(1);
        $todos = Todo::with('user')->latest()->paginate();
        return view('home', compact('todos'));
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
        $this->validate($request, [
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
            'name'    => $request->get('name'),
            'phone'   => $request->get('phone'),
            'email'   => $request->get('email'),
            'address' => $request->get('address'),
            'age'     => $request->get('age'),
            'image'   => 'Uploads/Images/' . $fileNew,
        ];
        Todo::create($data);
        $this->setSuccessMsg('Person Insert Successful!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $this->validate($request, [
            'name'    => 'required|string|max:50',
            'phone'   => 'required|numeric|min:11|unique:todos,phone,' . $todo->id.',id',
            'email'   => 'required|email|string|unique:todos,email,' . $todo->id.',id',
            'address' => 'required|string',
            'age'     => 'required|numeric',
        ]);
        $user_id = auth()->user()->id;
        if ($request->hasFile('avater')) {
            if ($request->file('avater')->isValid()) {
                File::delete($todo->image);
                $avater = $request->file('avater');
                $fileNew = 'Avater_' . Str::random(5) . '.' . $avater->getClientOriginalExtension();
                // $avater->storeAs('Images',$fileNew);
                Image::make($avater)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('Uploads/Images/' . $fileNew);
                $fileNew = 'Uploads/Images/' . $fileNew;
            }
        } else {
            $fileNew = $todo->image;
        }

        $data = [
            'user_id' => $user_id,
            'name'    => $request->get('name'),
            'phone'   => $request->get('phone'),
            'email'   => $request->get('email'),
            'address' => $request->get('address'),
            'age'     => $request->get('age'),
            'image'   => $fileNew,
        ];
        $todo->update($data);
        $this->setSuccessMsg('Person Insert Successful!');
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        if ($todo->image) {
            //    Storage::delete($todo->image);
            File::delete($todo->image);
            // return $todo->image ;
        }
        $todo->delete();
        $this->setSuccessMsg('Person Delete Success!');
        return redirect()->back();
    }
}
