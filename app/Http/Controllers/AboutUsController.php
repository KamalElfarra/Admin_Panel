<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Parse\ParseObject;
use Parse\ParseQuery;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $edit=new ParseQuery("Constants");
        $result=$edit->descending("createdAt")->find();


        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("about_us.index",compact('result'))->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=new ParseQuery("Constants");
        $edit=$edit->get($id);
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];
        return view("about_us.edit",compact('edit'))->with($data);
    }

//    public function edit_term($id)
//    {
//        $term=new ParseQuery("Constants");
//        $term=$term->get($id);
//        $data = [
//            'category_name' => 'dashboard',
//            'page_name' => 'analytics',
//            'has_scrollspy' => 0,
//            'scrollspy_offset' => '',
//            'alt_menu' => 0,
//        ];
//        return view("about_us.edit_terms",compact('term'))->with($data);
//    }
//
//    public function edit_privacy($id)
//    {
//        $privacy=new ParseQuery("Constants");
//        $privacy=$privacy->get($id);
//        $data = [
//            'category_name' => 'dashboard',
//            'page_name' => 'analytics',
//            'has_scrollspy' => 0,
//            'scrollspy_offset' => '',
//            'alt_menu' => 0,
//        ];
//        return view("about_us.edit_privacy",compact('privacy'))->with($data);
//    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $constants = new ParseObject("Constants");
//        $update = $constants->get($id);
        $this->validate($request, [
            'about' => 'required',
            'term' => 'required',
            'privacy' => 'required',
        ]);

        $constants->set("aboutUs", $request->about);
        $constants->set("terms", $request->term);
        $constants->set("privacyPolicy", $request->privacy);
        $constants->save();
        return redirect("/about/index");
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


//
//    public function store_term(Request $request,$id)
//    {
//        $constants = new ParseQuery("Constants");
//        $update = $constants->get($id);
//
//        $this->validate($request, [
//            'term' => 'required',
//        ]);
//
//        $update->set("terms", $request->term);
//        $update->save();
//        return redirect("/about/index");
//    }
//
//    public function store_privacy(Request $request,$id)
//    {
//        $constants = new ParseQuery("Constants");
//        $update = $constants->get($id);
//
//        $this->validate($request, [
//            'privacy' => 'required',
//        ]);
//
//        $update->set("privacyPolicy", $request->privacy);
//        $update->save();
//        return redirect("/about/index");
//    }

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
