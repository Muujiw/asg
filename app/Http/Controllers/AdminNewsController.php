<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{

    public function showAll()
{
    $news = News::orderBy('publication_date', 'desc')->get(); // Trier par date de publication
    return view('news.index', compact('news'));
}

public function show(News $news)
{
    return view('news.show', compact('news'));
}


    // Afficher la liste des news
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('admin.news.create');
    }

    // Enregistrer une nouvelle news
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'publication_date' => 'required|date',
            'keywords' => 'nullable|max:191',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);
    
        // Initialiser les données de la news
        $data = $request->all();
    
        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Générer un nom unique pour l'image
            $image->move(public_path('images/news'), $imageName); // Déplacer l'image vers le dossier public/images/news
            $data['image_url'] = 'images/news/' . $imageName; // Sauvegarder le chemin dans la base de données
        }
    
        // Créer la news
        News::create($data);
    
        return redirect()->route('admin.news.index')
            ->with('success', 'News créée avec succès');
    }
    

    // Afficher le formulaire d'édition d'une news
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    // Mettre à jour une news existante
    public function update(Request $request, News $news)
    {
        // Validation des données
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'publication_date' => 'required|date',
            'keywords' => 'nullable|max:191',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);
    
        // Initialiser les données de la news
        $data = $request->all();
    
        // Gérer l'upload de la nouvelle image (si présente)
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($news->image_url && file_exists(public_path($news->image_url))) {
                unlink(public_path($news->image_url)); // Supprime l'ancienne image du serveur
            }
    
            // Sauvegarder la nouvelle image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/news'), $imageName);
            $data['image_url'] = 'images/news/' . $imageName;
        }
    
        // Mettre à jour la news
        $news->update($data);
    
        return redirect()->route('admin.news.index')
            ->with('success', 'News mise à jour avec succès');
    }
    
    

    // Supprimer une news
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'News supprimée avec succès');
    }
}
