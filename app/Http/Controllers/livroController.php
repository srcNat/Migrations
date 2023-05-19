<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;


class livroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Livros = Livro::all();
        return view('welcome',['livros'=>$Livros]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Livros = new Livro();

        $Livros -> Name = $request->Name;
        $Livros -> Description = $request->Description;
        
       
        if($request->hasFile('Image') && $request->file('Image')->isValid()){
            $requestImage = $request->Image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')) . ".".$extension;
            $requestImage -> move(public_path('img/books'),$imageName);
            $Livros -> Image = $imageName;
        }
        
        $Livros -> save();
        return redirect()-> route('index.blade')-> with('msg','Livro foi salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Livros = Livro::findOrFail($id);

        return view('show',['livro'=> $Livros]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Livros = Livro::findOrFail($id);

        return view('edit',['livro'=> $Livros]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $Livros = Livro::findOrFail($id);

        $Livros-> Name = $request->Name;
        $Livros-> Description = $request->Description;
        
        if($request->hasFile('Image') && $request->file('Image')->isValid()){
            $requestImage = $request->Image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')) . ".".$extension;
            $requestImage->move(public_path('img/book3'), $imageName);
            $Livros->Image = $imageName;
        }

        $Livros-> save();

        return redirect()->route('index.blade')->with('msg','Livro foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Livro::findOrFail($id)-> delete();
        return redirect()->route('index.blade')-> with('msg','Livro foi excluído com sucesso!');

    }
}