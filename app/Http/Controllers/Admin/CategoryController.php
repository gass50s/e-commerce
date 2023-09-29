<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class CategoryController extends Controller
{
    //  
   
    
    public function index(){
        $category = Category::all();

        return view('admin.category.index',compact('category'));
    }

    public function add(){

        return view('admin.category.add');
    }
    public function insert(Request $request){
       
        $category = new Category();
       

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') ==TRUE ?'1':'0';
        $category->popular = $request->input('popular') ==TRUE ?'1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_descrip');
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category', $filename);
            $category->image=$filename;
        }
        $category->save();
        return redirect('/dashboard')->with('add-status','Catégorie ajoutée avec succès');

        

    }
    public function edit($id){
        $category = Category::Find($id);
       return view('admin.category.Edit' , compact('category'));
    }
    
    public function update(Request $request,$id){

        $category = Category::Find($id);

        if($request->hasFile('image'))
        {
            $path ='assets/uploads/category'.$category->image;
            if(File::exists ($path))
            {
                File::delete('assets/uploads/category'.$category->image);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category', $filename);
            $category->image=$filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') ==TRUE ?'1':'0';
        $category->popular = $request->input('popular') ==TRUE ?'1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->save();

        return redirect('/dashboard')->with('status','Categorie modifier avec succès');
    }
   public function destroy($id){
        $category = Category::find($id);
     if($category->image)
     {
        $path ='assets/uploads/category'.$category->image;
        if(File::exists ($path))
        {
           File::delete('public/assets/uploads/category'.$category->image);
        } 
        $category->delete();  
      }
      return redirect('/dashboard')->with('status','Categorie Supprimer avec  succès');

   }
	/**
	 */
	function __construct() {
	}
}
