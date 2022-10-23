<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopicController extends Controller
{
    public function index(){
        return Inertia::render('Topics/Index',[
            'topics'=>Topic::all()->map(function($topic){
                return [
                    'id'=>$topic->id,
                    'name'=>$topic->name,
                    'image'=>asset('storage/' .$topic->image)
                ];
            })
        ]);
    }
    // 
    public function create(){
        return Inertia::render('Topics/Create');
    }
    // 
    public function store(Request $request){
        $image = $request->file('image')->store('topics','public');
        Topic::create([
            'name'=>$request->input('name'),
            'image'=>$image
        ]);
        return to_route('topics.index');
    }
    // 
    public function edit(Topic $topic){
        return Inertia::render('Topics/Edit',[
            'topic'=>$topic,
            'image'=>asset('storage/' .$topic->image)

        ]);
    }
    // 
    public function update(Topic $topic,Request $request){

        $image = $topic->image;
        if($request->file('image')){
            Storage::delete('public/'.$image);

            $image = $request->file('image')->store('topics','public');
        }


        $topic->update([
            'name'=>$request->name,
            'image'=>$image,
        ]);
        return to_route('topics.index');

    }
    // 
    public function destroy(Topic $topic){
        Storage::delete('public/'.$topic->image);
        $topic->delete();
        return to_route('topics.index');

    }
}
