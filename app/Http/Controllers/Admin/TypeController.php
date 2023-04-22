<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::paginate(10);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:100',
            'color' => 'required|string|min:7|max:7',

        ], [
            'label.required' => 'il nome del tipo è obbligatorio',
            'label.max' => 'il nome del tipo deve essere massimo di 100 caratteri',
            'color.required' => 'il nome del colore è obbligatorio e deve essere esadecimale es #123456',
            'color.min_digits' => 'il nome del colore deve avere minimo 7 caratteri e massimo 7 caratteri',
            'color.max' => 'il nome del colore deve avere massimo 7 caratteri',
        ]);

        $data = $request->all();
        $type = new Type;
        $type->label = $data['label'];
        $type->color = $data['color'];
        $type->save();
        return redirect()->route('types.show', compact('type'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'label' => 'required|string|max:100',
            'color' => 'required|string|min:7|max:7',

        ], [
            'label.required' => 'il nome del tipo è obbligatorio',
            'label.max' => 'il nome del tipo deve essere massimo di 100 caratteri',
            'color.required' => 'il nome del colore è obbligatorio e deve essere esadecimale es #123456',
            'color.min_digits' => 'il nome del colore deve avere minimo 7 caratteri e massimo 7 caratteri',
            'color.max' => 'il nome del colore deve avere massimo 7 caratteri',
        ]);

        $data = $request->all();
        $type->label = $data['label'];
        $type->color = $data['color'];
        $type->save();
        return redirect()->route('types.show', $type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('types.index');
    }
}
