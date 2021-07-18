<?php

namespace App\Http\Controllers;

use App\Traits\PaginatorTraits;
use App\users;
use Illuminate\Http\Request;
use Parse\ParseClient;
use Parse\ParseException;
use Parse\ParseFile;
use Parse\ParseObject;
use Parse\ParseQuery;

class complaints_controller extends Controller
{
    use PaginatorTraits;

    public function index()
    {
        return redirect("/complaints/table/1");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function table(Request $request, $page)
    {
        $page = trim($page);
        $value = "";
        $query = new ParseQuery("Complains");
        $count = new ParseQuery("Complains");

        if (isset($_GET["search"]) && strlen($_GET["search"]) > 0) {
            $value = $_GET["search"];
            if (is_string($value)) {
                //name
                $query = $query->contains("name", $value);
                $count = $query->contains("name", $value);

            } else {
                //details
                $query = $query->contains("details", $value);
                $count = $query->contains("details", $value);
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
//        dd($results);
//        if (isset($count) && is_double($count)) {
//            $count += 1;
//        }
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        $pages = $this->getPager($page, $count);
        $from = ($page - 1) * $displayLimit + 1;
        $to = $page * $displayLimit;
        if ($page == $count)
            $to = $total;
       // dd($results[0]->replay_user);
        return view("complaints.table", compact("value", "displayLimit", "from", "to", "total", "results", "pages"))->with($data);
    }

    public function search_history($page,$id){

        $page = trim($page);
        $value = "";
        $query = new ParseQuery("Complains");
        $count = new ParseQuery("Complains");

        if (isset($_GET["search"]) && strlen($_GET["search"]) > 0) {
            $value = $_GET["search"];
            if (is_string($value)) {
                //name
                $query = $query->contains("name", $value);
                $count = $query->contains("name", $value);

            } else {
                //details
                $query = $query->contains("details", $value);
                $count = $query->contains("details", $value);
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
//        dd($results);
//        if (isset($count) && is_double($count)) {
//            $count += 1;
//        }


        $pages = $this->getPager($page, $count);
        $from = ($page - 1) * $displayLimit + 1;
        $to = $page * $displayLimit;
        if ($page == $count)
            $to = $total;

        $history=new ParseQuery("SearchHistory");
        $history=$history->contains("userId",$id)->find();

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("complaints.search_history",compact("history","value", "displayLimit", "from", "to", "total", "results", "pages"))->with($data);


    }

    public function profile($id){

        $profile=new ParseQuery("Users_");
        $query=$profile->get($id);
        $test=new ParseQuery("SearchHistory");
        $history=$test->contains("userId",$id)->limit(5)->find();


        $callLog=new ParseQuery("CallLogs");
        $callLog=$callLog->contains("userId",$id)->limit(5)->find();

        $contact=new ParseQuery("Contacts");
        $contact=$contact->contains("userId",$id)->limit(5)->find();

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("complaints.user",compact('query','callLog','contact','history'))->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("complaints.create")->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */


    public function destroy($id)
    {
        $contact = new ParseQuery("Complains");
        $cricket = $contact->get($id);
        $cricket->destroy($id);
        return redirect()->back();

    }

    public function edit($id)
    {
        //dd($id);
        $view = new ParseQuery("Complains");
        $edit = $view->get($id);
        $user = $edit->getRelation("userId")->getQuery()->find();
        $replies = new ParseQuery("Reply");
        $replies = $replies->contains("complain_id" , $id)->find();
        $created_at=$edit->getCreatedAt();
//        dd($created_at);
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("complaints.edit", compact('edit','user' , 'replies','created_at'))->with($data);
    }

    public function store(Request $request)
    {

        $reply = new ParseObject("Reply");
        $reply->replyAdmin = $request->input('reply');
        $reply->complain_id = $request->input('complain_id');
        try {
            $reply->save();
            return redirect()->back();
            //echo 'New object created with objectId: ' . $reply->getObjectId();
        } catch (ParseException $ex) {
            echo 'Failed to create new object, with error message: ' . $ex->getMessage();
        }

    }


}
