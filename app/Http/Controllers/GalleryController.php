<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\ArtPiece;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('artwork.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artwork.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //     $this->validate($request, [
    //        'title' => 'required|min:3',
    //        'published' => 'required|min:4|numeric',
    //        'cover' => 'required|url',
    //        'purchase_link' => 'required|url',
    //    ]);

        $file = $request->file('image_upload');
        if($file->isValid()) {

            # Step 1) Record info in DB- this will require requsts
            $artpiece = new ArtPiece();
            $artpiece->title = $request->input('title');
            $artpiece->artist = $request->input('artist');
            $artpiece->date = $request->input('date');
            $artpiece->image = $request->file('image_upload');
            $artpiece->save();

            # Step 2) Save image
            $destination = public_path().'uploads/';
            $extension = $file->getClientOriginalExtension();
            $fileName = $artpiece->id.'.'.$extension;

            # Update this artpieace saving the image name
            $artpiece->image = $fileName;
            $artpiece->save();

            # Save to public/uploads
            $file->move($destination, $fileName);
            //saving the file
        }

        return view('artwork.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('artwork.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('artwork.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('artwork.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
