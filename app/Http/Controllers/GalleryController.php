<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use p4\ArtPiece;
use p4\Tag;
use p4\Artist;
use Session;


class GalleryController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();
        if($user) {
            $artpieces = Artpiece::where('user_id', '=', $user->id)->orderBy('id','DESC')->get();
            // $artpieces = $user->artpieces()->get();
        }
        else {
            $artpieces = [];
        }
        return view('artwork.index')->with([
            'artpieces' => $artpieces
        ]);

    }

    public function create()
    {
        $artists_for_dropdown = Artist::getForDropdown();
        $tags_for_checkboxes = Tag::getForCheckboxes();
        return view('artwork.create')->with([
            'artists_for_dropdown' => $artists_for_dropdown,
            'tags_for_checkboxes' => $tags_for_checkboxes
        ]);

    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|min:1',
            'date' => 'required',
            'artist_id' => 'required|min:1',
            'image' => 'required',
            'description' => 'required',
            'medium' => 'required',
        ]);

        $file = $request->file('image');
        if($file->isValid()) {

            # Step 1) Record info in DB- this will require requsts
            $artpiece = new Artpiece();
            $artpiece->title = $request->input('title');
            $artpiece->artist_id = $request->input('artist_id');
            $artpiece->date = $request->input('date');
            $artpiece->image = $request->file('image');
            $artpiece->medium = $request->input('medium');
            $artpiece->user_id = $request->user()->id;
            $artpiece->save();

            # Step 2) Save image
            $destination = public_path().'/uploads/';
            $extension = $file->getClientOriginalExtension();
            $fileName = $artpiece->id.'.'.$extension;

            # Update this artpieace saving the image name
            $artpiece->image = $fileName;
            $artpiece->save();

            # Save to public/uploads
            $file->move($destination, $fileName);
            //saving the file
        }

        Session::flash('flash_message', 'Your work, ""'.$artpiece->title.'"" was added.');
        return redirect('/artwork');

    }


    public function show($id)
    {
        $artwork = Artpiece::find($id);
        if(is_null($artwork)) {
            Session::flash('message','This piece cannot be found');
            return redirect('/artwork');
        }
        return view('artwork.show')->with([
            'artpiece' => $artpiece,
        ]);

    }


    public function edit($id)
    {
        $artpiece = Artpiece::find($id);
        $artists_for_dropdown = Artist::getForDropdown();
        $tags_for_checkboxes = Tag::getForCheckboxes();
        $tags_for_this_artpiece = [];
        foreach($artpiece->tags as $tag) {
            $tags_for_this_artpiece[] = $artpiece->name;
        }
        return view('artwork.edit')->with(
            [
                'artpiece' => $artpiece,
                'artists_for_dropdown' => $artists_for_dropdown,
                'tags_for_checkboxes' => $tags_for_checkboxes,
                'tags_for_this_artpiece' => $tags_for_this_artpiece,
            ]
        );
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
            'artist_id' => 'required',
            'image' => 'required',
            'description' => 'required',
            'medium' => 'required',
        ]);

        $artpiece = Artpiece::find($request->id);
        $artpiece->title = $request->title;
        $artpiece->image = $request->image;
        $artpiece->date = $request->date;
        $artpiece->artist_id = $request->artist_id;
        $artpiece->description = $request->description;
        $artpiece->medium = $request->medium;
        $artpiece->save();


        if($request->tags) {
            $tags = $request->tags;
        }

        else {
            $tags = [];
        }

        $artpiece->tags()->sync($tags);
        $artpiece->save();
        # Finish
        Session::flash('flash_message', 'Your changes to '.$artpiece->title.' were saved.');
        return redirect('/artwork');

    }


    public function delete($id) {
        $artpiece = Artpiece::find($id);
        return view('artwork.delete')->with('artpiece', $artpiece);
    }


    public function destroy($id)
    {
        $artpiece = Artpiece::find($id);
        if(is_null($artpiece)) {
            Session::flash('message','artpiece not found.');
            return redirect('/artwork');
        }
        if($artpiece->tags()) {
            $artpiece->tags()->detach();
        }
        $artpiece->delete();

        Session::flash('flash_message', $artpiece->title.' was deleted.');
        return redirect('/artwork');
    }

}
