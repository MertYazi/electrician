<?php

namespace App\Http\Controllers;

use App\Reference;
use App\Site;
use App\Contact;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class ReferenceController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $references = Reference::all();
        $site = Site::first();
        $contact = Contact::first();

        return view('admin.references.admin_references', compact('references', 'site', 'contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $site = Site::first();
        $contact = Contact::first();

        return view('admin.references.admin_references_create', compact('site', 'contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate_data($request);
        $all_references = Reference::all();
        $reference = new Reference();
        $reference->reference_title = $request['reference_title'];
        foreach ($all_references as $single_reference) {
          if($request['reference_title'] == $single_reference->reference_title){
            return redirect()->back()->withInput()->withErrors(['reference_exist' => 'The reference already exist!']);
          }
        }
        if($request['reference_image'] != null){
          $reference_name = str_slug($request['reference_title']);
          $reference->reference_image = $reference_name . '.' . $request['reference_image']->extension();
          $this->handle_image($request, $reference, 'reference_image');
        }
        $reference->reference_link = $request['reference_link'];
        $reference->save();

        return redirect('/admin/references');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function show(Reference $reference)
    {
        return redirect('/admin/references');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function edit(Reference $reference)
    {
        $site = Site::first();
        $contact = Contact::first();

        return view('admin.references.admin_references_edit', compact('reference', 'site', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reference $reference)
    {
        $this->validate_data($request);
        $reference->reference_title = $request['reference_title'];
        if($request['reference_image'] != null){
          $this->handle_image($request, $reference, 'reference_image');
        }else{
          $reference_name = str_slug($request['reference_title']);
          $image_extension = explode('.', $reference->reference_image);
          $new_image_name = $reference_name . '.' . $image_extension[1];
          rename(public_path('img/' . $reference->reference_image), public_path('img/' . $new_image_name));
          $reference->reference_image = $new_image_name;
        }
        $reference->reference_link = $request['reference_link'];
        $reference->save();

        return redirect('/admin/references');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reference $reference)
    {
        $reference->delete();
        if(file_exists(public_path('img/' . $reference->reference_image))){
          unlink(public_path('img/' . $reference->reference_image));
        }

        return redirect('/admin/references');
    }

    public function validate_data(Request $request){

        $request->validate([
          'reference_title' => 'required|between:2,255',
          'reference_link' => 'required|url',
          'reference_image' => 'image',
        ]);
    }
}
