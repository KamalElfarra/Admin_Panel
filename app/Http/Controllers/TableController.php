<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\table;
use App\users;
use Illuminate\Http\Request;
use Parse\ParseClient;
use Parse\ParseException;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseUser;
use App\Traits\PaginatorTraits;

class TableController extends Controller
{
    use PaginatorTraits;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return redirect("/Contacts/page/1");
    }

    public function paginate($page)
    {

        $page = trim($page);
        $value="";
        $query = new ParseQuery("Contacts");
        $count = new ParseQuery("Contacts");
//        $id=$query->get('GYBjFnXuDd');
//        $user = $id->getRelation("userId")->getQuery()->find();


        if(isset($_GET["search"]) && strlen($_GET["search"])>0) {
            $value = $_GET["search"];
            if (is_numeric($value)) {
                //number
                $query = $query->contains("number", $value);
                $count = $query->contains("number", $value);
            } else {
                //name
                $query = $query->contains("name", $value);
                $count = $query->contains("name", $value);
            }
        }
        $displayLimit = Request("group_list","100");
        $total = $count->count();
        $count = ceil( $total/ $displayLimit);

        //list group to get records
        if(isset($_GET["group_list"]) && strlen($_GET["group_list"])>0) {
            $displayLimit = $_GET["group_list"];
        }

        $query->ascending('name');
        $query->limit($displayLimit);
        $results= $query->skip(($page - 1) * $displayLimit)->find();

        if($value!= ""){
            $results= $results["results"];
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

        $pages= $this->getPager($page,$count);
        $from = ($page -1) *$displayLimit +1;
        $to = $page * $displayLimit;
        if($page==$count)
            $to=$total;

        return view("tables.table", compact("value","displayLimit","from", "to" , "total" , "results" , "pages"))->with($data);

    }

    public function profile($id){

        $profile=new ParseQuery("Contacts");
        $query=$profile->get($id);
        $value=$profile->contains("userId",$id)->find();
      //  dd($user);

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("tables.user",compact('value','query'))->with($data);

    }

    public function user($id){

        $count = new ParseQuery("Contacts");
        $edit = $count->get($id);
        $user = $edit->getRelation("userId")->getQuery()->find();

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("tables.table",compact('user','edit'))->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $contact = new ParseQuery("Contacts");
        $contact = $contact->get($id);
        $contact->destroy($id);
        return redirect()->back();

    }

    public function edit($id)
    {
        $view = new ParseQuery("Contacts");
        $edit = $view->get($id);


        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];


        return view("tables.edit", compact('edit'))->with($data);
    }


    public function update(Request $request, $id)
    {

        $Contacts = new ParseQuery("Contacts");
//        $cricket = new Contacts();
        $Contacts = $Contacts->get($id);

        $this->validate($request, [

            'number' => 'required',
            'accountName' => 'required',
            'accountType' => 'required',
            'name' => 'required',
            'email' => 'required',

        ]);

//        $cricket->set("objectId", $request->objectId);
        $Contacts->set("number", $request->number);
        $Contacts->set("accountName", $request->accountName);
        $Contacts->set("accountType", $request->accountType);
        $Contacts->set("name", $request->name);
        $Contacts->set("email", $request->email);
        $Contacts->save();
        return redirect("/Contacts/contacts");

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'objectId' => 'required',
            'number' => 'required',
            'accountName' => 'required',
            'accountType' => 'required',
            'name' => 'required',
            'userId' => 'required',
            'email' => 'required',

        ]);

        $Contact = new Contacts();

        $Contact->ID = $request->objectId;
        $Contact->number = $request->number;
        $Contact->accountName = $request->accountName;
        $Contact->accountType = $request->accountType;
        $Contact->name = $request->name;
        $Contact->userId = $request->userId;
        $Contact->email = $request->email;

        $Contact->save();
        return redirect("/Contacts/contacts");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Contacts
     */
    public function show()
    {
        $view = new ParseQuery("Contacts");
        $get_name = $view->get("Bt79YZM5jZ");
        dd($get_name);


    }

    public function create()
    {

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];
        return view("tables.create")->with($data);

    }


    public function createTable($tableName, $arr = [])
    {
        $table = new ParseObject($tableName);
        foreach ($arr as $key => $value) {
            $table->set($key, $value);
        }

    }

//    public function search($value)
//    {
////        dd($value);
//        $search = new ParseQuery("Contacts");
//
//        $results = [];
//
//        if (is_numeric($value)) {
//            //number
//            $results = $search->contains("number", $value)->find();
//
//        } else {
//            //name
//            $results = $search->contains("name", $value)->find();
//        }
//
////           dd($results);
//
//        $data = [
//            'category_name' => 'dashboard',
//            'page_name' => 'analytics',
//            'has_scrollspy' => 0,
//            'scrollspy_offset' => '',
//            'alt_menu' => 0,
//        ];
//
//        return view('tables.table', compact('results'))->with($data);
//
//    }

//    public function get_search($value)
//    {
////        dd($value);
//        // Get the search value from the request
//        $search = new ParseQuery("Contacts");
////         $results = $request->input('search');
//
//        $results=[];
//
//        if (is_numeric($value)) {
//            //number
//            $results = $search->contains("number", $value)->find();
//
//        } else {
//            //name
//            $results = $search->contains("name", $value)->find();
//        }
//
////           dd($results);
//
//        $data = [
//            'category_name' => 'dashboard',
//            'page_name' => 'analytics',
//            'has_scrollspy' => 0,
//            'scrollspy_offset' => '',
//            'alt_menu' => 0,
//        ];
//
//        return view('tables.table', compact('results'))->with($data);
//
//    }

//    public function index($id=1)
//    {
//        $query = new ParseQuery("Contacts");
////        $queryCount = new ParseQuery("Contacts");
////        $count = $queryCount->count();
//
//        $pageCount = 100;
//        $query->limit($pageCount);
//
////        $results = $query->skip($pageCount)->find();
//        $results = $query->skip(($id-1)*$pageCount)->find();
//
//
//
//        $data = [
//            'category_name' => 'dashboard',
//            'page_name' => 'analytics',
//            'has_scrollspy' => 0,
//            'scrollspy_offset' => '',
//            'alt_menu' => 0,
//        ];
//
//        return view("tables.table",compact("results"))->with($data);
//
//    }

}
