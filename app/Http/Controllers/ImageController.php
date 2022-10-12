<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::get();
        return view('gallery',compact('images'));
    }

    /**
     * Details of image
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function seeInfo($id)
    {
        try{
            $image = Image::findOrFail($id);
        }catch (ModelNotFoundException){
            return view('image_info')->withErrors('La imagen buscada no existe.');;
        }
        return view('image_info',compact('image'));
    }


    /**
     * Upload image function
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();

        $request->image->move(public_path('images'), $input['image']);

        $input['title'] = $request->title;
        Image::create($input);

        return back()->with('success','Imagen añadida a la galería.');
    }


    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $img = Image::find($id);
        if(file_exists(public_path('images/'.$img['image']))) {
            @unlink(public_path('images/'.$img['image']));
        }
        $img->delete();
        return back()->with('success','Imagen eliminada de la galería.');
    }

    /**
     * Update Image function
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $img = Image::findOrFail($id);
        $img['title'] = $request->title;
        $img->save();
        return back()->with('success','Imagen actualizada.');
    }
}
