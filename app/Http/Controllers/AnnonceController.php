<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnonceRequest;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function create(){
        return view("annonce.create");
    }

    public function add(AnnonceRequest $request){
        $request = $request->validated();

        Annonce::create($request);

        return redirect('/add-annonce');
    }

    public function AllAnnonce(){
        $annonces = Annonce::all();
        return view("annonce.AllAnnonce", compact('annonces'));
    }

    
    
    
    public function SearchAnnonce(Request $request){
        $SearchTitre = $request->input('search-titre');
        $SearchDescription = $request->input('search-description');
        
        if($SearchTitre === null){
            $posts = Annonce::query()
            ->where('description', 'LIKE', "{$SearchDescription}%")
            ->get();
        }elseif($SearchDescription === null){
            $posts = Annonce::query()
            ->where('titre', 'LIKE', "{$SearchTitre}%")
            ->get();
        }else{
            $posts = Annonce::query()
            ->where('titre', 'LIKE', "{$SearchTitre}%")
            ->orWhere('description', 'LIKE', "{$SearchDescription}%")
            ->get();
        }

        if($request->submit == "récent"){
            $posts = Annonce::query()
                ->orderBy('created_at', 'desc')
                ->get();
        }
    
        return view("annonce.SearchAnnonce", compact('posts'));
    }

    
    
    
    public function edit($annonce_id){
        $annonce = Annonce::find($annonce_id);
        return view('annonce.edit', compact('annonce'));
    }

    public function update(AnnonceRequest $request, $annonce_id){
        $request = $request->validated();
        Annonce::where('id', $annonce_id)->update([
            'titre' => $request['titre'],
            'description' => $request['description'],
            'photographie' => $request['photographie'],
            'prix' => $request['prix']
        ]);

        return redirect('/annonce');
    }

    public function delete($annonce_id){
        $annonce = Annonce::find($annonce_id)->delete();
        return redirect('/annonce');
    }
}
