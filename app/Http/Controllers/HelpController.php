<?php

namespace App\Http\Controllers;

use App\Help;
use App\Site;
use App\Contact;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class HelpController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $help = Help::first();
        $site = Site::first();
        $contact = Contact::first();

        return view('admin.help.admin_help', compact('help', 'site', 'contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/admin/help');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('/admin/help');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function show(Help $help)
    {
        return redirect('/admin/help');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function edit(Help $help)
    {
        $site = Site::first();
        $contact = Contact::first();

        return view('admin.help.admin_help_edit', compact('help', 'site', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Help $help)
    {
        $this->validate_data($request);
        $help->help_caption=$request['help_caption'];
        $help->help_keywords=$request['help_keywords'];
        $help->decide_text=$request['decide_text'];
        if($request['decide_image'] != null){
          $this->handle_image($request, $help, 'decide_image');
        }
        $help->reach_text=$request['reach_text'];
        if($request['reach_image'] != null){
          $this->handle_image($request, $help, 'reach_image');
        }
        $help->consult_text=$request['consult_text'];
        if($request['consult_image'] != null){
          $this->handle_image($request, $help, 'consult_image');
        }
        $help->get_service_text=$request['get_service_text'];
        if($request['get_service_image'] != null){
          $this->handle_image($request, $help, 'get_service_image');
        }
        $help->save();

        return redirect('/admin/help');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function destroy(Help $help)
    {
        return redirect('/admin/help');
    }

    public function validate_data(Request $request){

        $request->validate([
          'help_caption' => 'required|between:2,255',
          'help_keywords' => 'required|between:2,255',
          'decide_text' => 'required|min:2',
          'reach_text' => 'required|min:2',
          'consult_text' => 'required|min:2',
          'get_service_text' => 'required|min:2',
          'decide_image' => 'image',
          'reach_image' => 'image',
          'consult_image' => 'image',
          'get_service_image' => 'image',
        ]);
    }
}
