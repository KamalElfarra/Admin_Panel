<?php

namespace App\Http\Controllers;

use App\Traits\PaginatorTraits;
use Illuminate\Http\Request;
use Parse\ParseQuery;

class SocialsController extends Controller
{
    use PaginatorTraits;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

        $query = new ParseQuery("socials");
        $query->equalTo("accountType",'facebook');
        $count = $query->count();
        $fb=new ParseQuery("socials");
        $facebook=$fb->contains("accountType",'facebook')->find();

        $whatsapp = new ParseQuery("socials");
        $whatsapp->equalTo("accountType",'whatsapp');
        $count_wh = $whatsapp->count();
        $wh=new ParseQuery("socials");
        $whatsapp=$wh->contains("accountType",'whatsapp')->find();


        $twitter = new ParseQuery("socials");
        $twitter->equalTo("accountType",'twitter');
        $count_tw = $twitter->count();
        $tw=new ParseQuery("socials");
        $twitter=$tw->contains("accountType",'twitter')->find();


        $snap = new ParseQuery("socials");
        $snap->equalTo("accountType",'snapshat');
        $count_sn = $snap->count();
        $sn=new ParseQuery("socials");
        $snapshat=$sn->contains("accountType",'twitter')->find();

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view('socials.view_data',compact('snapshat','twitter','whatsapp','facebook','count','count_wh','count_tw','count_sn'))->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function facebook($page)
    {
        $page = trim($page);
        $value = "";
        $query = new ParseQuery("socials");
        $count = new ParseQuery("socials");
        $count=$count->equalTo("accountType","facebook");

        if (isset($_GET["search"]) && strlen($_GET["search"]) > 0) {
            $value = $_GET["search"];
            if (is_string($value)) {
                //username
                $query = $query->contains("username", $value);
                $count = $query->contains("username", $value);

            } else {
                //number
                $query = $query->contains("number", $value);
                $count = $query->contains("number", $value);
            }
        }

        $displayLimit = Request("group_list", "100");
        $total = $count->count();
        $count = ceil($total / $displayLimit);

        //list group to get records
        if (isset($_GET["group_list"]) && strlen($_GET["group_list"]) > 0) {
            $displayLimit = $_GET["group_list"];
        }

        $query->ascending('name');
        $query->limit($displayLimit);
        $results = $query->skip(($page - 1) * $displayLimit)->find();

        if ($value != "") {
            $results = $results["results"];
        }

        $pages = $this->getPager($page, $count);
        $from = ($page - 1) * $displayLimit + 1;
        $to = $page * $displayLimit;
        if ($page == $count)
            $to = $page;
        // dd($results[0]->replay_user);
        $test=new ParseQuery("socials");
        $facebook=$test->contains("accountType",'facebook')->find();

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];
       return view("socials.facebook",compact('facebook',"value", "displayLimit", "from", "to", "total", "results", "pages"))->with($data);
    }

    public function whatsapp($page)
    {
        $page = trim($page);
        $value = "";
        $query = new ParseQuery("socials");
        $count = new ParseQuery("socials");
        $count=$count->equalTo("accountType","whatsapp");

        if (isset($_GET["search"]) && strlen($_GET["search"]) > 0) {
            $value = $_GET["search"];
            if (is_string($value)) {
                //name
                $query = $query->contains("username", $value);
                $count = $query->contains("username", $value);

            } else {
                //details
                $query = $query->contains("number", $value);
                $count = $query->contains("number", $value);
            }
        }

        $displayLimit = Request("group_list", "100");
        $total = $count->count();
        $count = ceil($total / $displayLimit);

        //list group to get records
        if (isset($_GET["group_list"]) && strlen($_GET["group_list"]) > 0) {
            $displayLimit = $_GET["group_list"];
        }

        $query->ascending('name');
        $query->limit($displayLimit);
        $results = $query->skip(($page - 1) * $displayLimit)->find();

        if ($value != "") {
            $results = $results["results"];
        }

        $pages = $this->getPager($page, $count);
        $from = ($page - 1) * $displayLimit + 1;
        $to = $page * $displayLimit;
        if ($page == $count)
            $to = $page;

        $test=new ParseQuery("socials");
        $whatsapp=$test->contains("accountType",'whatsapp')->find();

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];
        return view("socials.whatsapp",compact('whatsapp',"value", "displayLimit", "from", "to", "total", "results", "pages"))->with($data);
    }

    public function twitter($page)
    {
        $page = trim($page);
        $value = "";
        $query = new ParseQuery("socials");
        $count = new ParseQuery("socials");
        $count=$count->equalTo("accountType","twitter");

        if (isset($_GET["search"]) && strlen($_GET["search"]) > 0) {
            $value = $_GET["search"];
            if (is_string($value)) {
                //name
                $query = $query->contains("username", $value);
                $count = $query->contains("username", $value);

            } else {
                //details
                $query = $query->contains("number", $value);
                $count = $query->contains("number", $value);
            }
        }

        $displayLimit = Request("group_list", "100");
        $total = $count->count();
        $count = ceil($total / $displayLimit);

        //list group to get records
        if (isset($_GET["group_list"]) && strlen($_GET["group_list"]) > 0) {
            $displayLimit = $_GET["group_list"];
        }

        $query->ascending('name');
        $query->limit($displayLimit);
        $results = $query->skip(($page - 1) * $displayLimit)->find();

        if ($value != "") {
            $results = $results["results"];
        }

        $pages = $this->getPager($page, $count);
        $from = ($page - 1) * $displayLimit + 1;
        $to = $page * $displayLimit;
        if ($page == $count)
            $to = $page;

        $test=new ParseQuery("socials");
        $twitter=$test->contains("accountType",'twitter')->find();

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];
        return view("socials.twitter",compact('twitter',"value", "displayLimit", "from", "to", "total", "results", "pages"))->with($data);
    }

    public function snapchat($page)
    {
        $page = trim($page);
        $value = "";
        $query = new ParseQuery("socials");
        $count = new ParseQuery("socials");
        $count=$count->equalTo("accountType","snapshat");

        if (isset($_GET["search"]) && strlen($_GET["search"]) > 0) {
            $value = $_GET["search"];
            if (is_string($value)) {
                //name
                $query = $query->contains("username", $value);
                $count = $query->contains("username", $value);

            } else {
                //details
                $query = $query->contains("number", $value);
                $count = $query->contains("number", $value);
            }
        }

        $displayLimit = Request("group_list", "100");
        $total = $count->count();
        $count = ceil($total / $displayLimit);

        //list group to get records
        if (isset($_GET["group_list"]) && strlen($_GET["group_list"]) > 0) {
            $displayLimit = $_GET["group_list"];
        }

        $query->ascending('name');
        $query->limit($displayLimit);
        $results = $query->skip(($page - 1) * $displayLimit)->find();

        if ($value != "") {
            $results = $results["results"];
        }

        $pages = $this->getPager($page, $count);
        $from = ($page - 1) * $displayLimit + 1;
        $to = $page * $displayLimit;
        if ($page == $count)
            $to = $page;

        $test=new ParseQuery("socials");
        $snapchat=$test->contains("accountType",'snapshat')->find();

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];
        return view("socials.snapchat",compact('snapchat',"value", "displayLimit", "from", "to", "total", "results", "pages"))->with($data);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $view = new ParseQuery("socials");
        $edit = $view->get($id);


        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];


        return view("socials.edit", compact('edit'))->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $socials = new ParseQuery("socials");
//        $cricket = new Contacts();
        $update = $socials->get($id);


        $this->validate($request, [

            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'number' => 'required',

        ]);

        $update->set("username", $request->username);
        $update->set("firstname", $request->firstname);
        $update->set("lastname", $request->lastname);
        $update->set("number", $request->number);
        $update->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $contact = new ParseQuery("socials");
        $cricket = $contact->get($id);
        $cricket->destroy($id);
        return redirect()->back();
    }
}
