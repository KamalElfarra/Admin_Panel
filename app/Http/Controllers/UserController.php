<?php

namespace App\Http\Controllers;

use App\Traits\PaginatorTraits;
use Illuminate\Http\Request;
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;

class UserController extends Controller
{
    use PaginatorTraits;

    public function page()
    {
        return redirect("/users/index/1");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
   public function index($page){

        $page = trim($page);
        $value="";
        $query = new ParseQuery("Users_");
        $count = new ParseQuery("Users_");
        if(isset($_GET["search"]) && strlen($_GET["search"])>0) {
            $value = $_GET["search"];
            if (is_string($value)) {
                //number
                $query = $query->contains("androidSerial", $value);
                $count = $query->contains("androidSerial", $value);
            } else {
                //name
                $query = $query->contains("country", $value);
                $count = $query->contains("country", $value);
            }
        }
       $displayLimit = Request("group_list","100");
       $total = $count->count();
       $count = ceil( $total/ $displayLimit);

       //list group to get records
       if(isset($_GET["group_list"]) && strlen($_GET["group_list"])>0) {
           $displayLimit = $_GET["group_list"];
       }

       $query->ascending('country');
       $query->limit($displayLimit);
       $results= $query->skip(($page - 1) * $displayLimit)->find();


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

        return view("users.table",compact("value","displayLimit","from", "to" , "total" , "results" , "pages"))->with($data);
    }

    public function search_history($page,$id){

        $page = trim($page);
        $value="";
        $query = new ParseQuery("SearchHistory");
        $count = new ParseQuery("SearchHistory");
        if(isset($_GET["search"]) && strlen($_GET["search"])>0) {
            $value = $_GET["search"];
            if (is_string($value)) {
                //name
                $query = $query->contains("name", $value);
                $count = $query->contains("name", $value);
            } else {
                //number
                $query = $query->contains("number", $value);
                $count = $query->contains("number", $value);
            }
        }

        $displayLimit = Request("group_list","100");
        $total = $count->count();
        $count = ceil( $total/ $displayLimit);

        //list group to get records
        if(isset($_GET["group_list"]) && strlen($_GET["group_list"])>0) {
            $displayLimit = $_GET["group_list"];
        }

        $query->ascending('number');
        $query->limit($displayLimit);
        $results= $query->skip(($page - 1) * $displayLimit)->find();

        if($value!= ""){
            $results= $results["results"];
        }

        $pages= $this->getPager($page,$count);
        $from = ($page -1) *$displayLimit +1;
        $to = $page * $displayLimit;
        if($page==$count)
            $to=$total;

        $history=new ParseQuery("SearchHistory");
        $history=$history->contains("userId",$id)->find();

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("users.search_history",compact("history","value","displayLimit","from", "to" , "total" , "results" , "pages"))->with($data);


    }

    public function callLogs_search($page,$id){

        $page = trim($page);
        $value="";
        $query = new ParseQuery("CallLogs");
        $count = new ParseQuery("CallLogs");
        if(isset($_GET["search"]) && strlen($_GET["search"])>0) {
            $value = $_GET["search"];
            if (is_string($value)) {
                //name
                $query = $query->contains("name", $value);
                $count = $query->contains("name", $value);
            } else {
                //number
                $query = $query->contains("number", $value);
                $count = $query->contains("number", $value);
            }
        }

        $displayLimit = Request("group_list","100");
        $total = $count->count();
        $count = ceil( $total/ $displayLimit);

        //list group to get records
        if(isset($_GET["group_list"]) && strlen($_GET["group_list"])>0) {
            $displayLimit = $_GET["group_list"];
        }

        $query->ascending('number');
        $query->limit($displayLimit);
        $results= $query->skip(($page - 1) * $displayLimit)->find();

        if($value!= ""){
            $results= $results["results"];
        }

        $pages= $this->getPager($page,$count);
        $from = ($page -1) *$displayLimit +1;
        $to = $page * $displayLimit;
        if($page==$count)
            $to=$total;

        $CallLogs=new ParseQuery("CallLogs");
        $CallLogs=$CallLogs->contains("userId",$id)->find();

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("users.callLogs_search",compact("CallLogs","value","displayLimit","from", "to" , "total" , "results" , "pages"))->with($data);

    }

    public function contacts_search($page,$id){

        $page = trim($page);
        $value="";
        $query = new ParseQuery("Contacts");
        $count = new ParseQuery("Contacts");
        if(isset($_GET["search"]) && strlen($_GET["search"])>0) {
            $value = $_GET["search"];
            if (is_string($value)) {
                //name
                $query = $query->contains("name", $value);
                $count = $query->contains("name", $value);
            } else {
                //number
                $query = $query->contains("number", $value);
                $count = $query->contains("number", $value);
            }
        }

        $displayLimit = Request("group_list","100");
        $total = $count->count();
        $count = ceil( $total/ $displayLimit);

        //list group to get records
        if(isset($_GET["group_list"]) && strlen($_GET["group_list"])>0) {
            $displayLimit = $_GET["group_list"];
        }

        $query->ascending('number');
        $query->limit($displayLimit);
        $results= $query->skip(($page - 1) * $displayLimit)->find();

        if($value!= ""){
            $results= $results["results"];
        }

        $pages= $this->getPager($page,$count);
        $from = ($page -1) *$displayLimit +1;
        $to = $page * $displayLimit;
        if($page==$count)
            $to=$total;

        $Contacts=new ParseQuery("Contacts");
        $Contacts=$Contacts->contains("userId",$id)->find();

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("users.contacts_search",compact("Contacts","value","displayLimit","from", "to" , "total" , "results" , "pages"))->with($data);


    }

    public function complains_search($page,$id){

        $page = trim($page);
        $value="";
        $query = new ParseQuery("Complains");
        $count = new ParseQuery("Complains");
        if(isset($_GET["search"]) && strlen($_GET["search"])>0) {
            $value = $_GET["search"];
            if (is_string($value)) {
                //name
                $query = $query->contains("name", $value);
                $count = $query->contains("name", $value);
            } else {
                //number
                $query = $query->contains("reply_user", $value);
                $count = $query->contains("reply_user", $value);
            }
        }

        $displayLimit = Request("group_list","100");
        $total = $count->count();
        $count = ceil( $total/ $displayLimit);

        //list group to get records
        if(isset($_GET["group_list"]) && strlen($_GET["group_list"])>0) {
            $displayLimit = $_GET["group_list"];
        }

        $query->ascending('reply_user');
        $query->limit($displayLimit);
        $results= $query->skip(($page - 1) * $displayLimit)->find();

        if($value!= ""){
            $results= $results["results"];
        }

        $pages= $this->getPager($page,$count);
        $from = ($page -1) *$displayLimit +1;
        $to = $page * $displayLimit;
        if($page==$count)
            $to=$total;

        $users=new ParseQuery("Users_");
        $users=$users->equalTo("objectId",$id)->find();
        $complainId =$users[0]->complain_id;
        $complains =new ParseQuery("Complains");
        $complain=$complains->get($complainId);
//        dd($complain);
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("users.complains_search",compact("complain","users","value","displayLimit","from", "to" , "total" , "results" , "pages"))->with($data);


    }
    public function profile($id)
    {
        $user=new ParseQuery("Users_");
        $value=$user->get($id);
        $search=new ParseQuery("SearchHistory");
        $history=$search->contains("userId",$id)->limit(5)->find();

        $callLog=new ParseQuery("CallLogs");
        $callLog=$callLog->contains("userId",$id)->limit(5)->find();

        $contact=new ParseQuery("Contacts");
        $contact=$contact->contains("userId",$id)->limit(5)->find();

        $users=new ParseQuery("Users_");
        $users=$users->equalTo("objectId",$id)->find();
        $complainId =$users[0]->complain_id;
        $complains =new ParseQuery("Complains");
        $complains=$complains->get($complainId);

//        dd($complains);
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("users.user",compact("complains","callLog","contact","value","history"))->with($data);
    }

    public function destroy($id)
    {
        $contact = new ParseQuery("Users_");
        $cricket = $contact->get($id);
        $cricket->destroy($id);
        return redirect()->back();

    }

    public function edit($id)
    {
        $view = new ParseQuery("Users_");
        $edit = $view->get($id);


        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];


        return view("users.edit", compact('edit'))->with($data);
    }

    public function update(Request $request, $id)
    {

        $gameScore = new ParseQuery("Users_");
//        $cricket = new Contacts();
        $cricket = $gameScore->get($id);


        $this->validate($request, [
            'androidSerial' => 'required',
            'fullVersion' => 'required',
            'host' => 'required',
            'company' => 'required',
            'model' => 'required',
            'deviceName' => 'required',
            'version' => 'required',
            'email' => 'required',
            'country' => 'required',
            'active' => 'required',
            'free' => 'required',
        ]);

//        $cricket->set("objectId", $request->objectId);
        $cricket->set("androidSerial", $request->androidSerial);
        $cricket->set("fullVersion", $request->fullVersion);
        $cricket->set("host", $request->host);
        $cricket->set("company", $request->company);
        $cricket->set("model", $request->model);
        $cricket->set("deviceName", $request->deviceName);
        $cricket->set("version", $request->version);
        $cricket->set("email", $request->email);
        $cricket->set("country", $request->country);
        $cricket->set("active", $request->active);
        $cricket->set("free", $request->free);
        $cricket->save();
        return redirect("users/index/1");

    }

    public function edit_history($id)
    {
        $SearchHistory = new ParseQuery("SearchHistory");
        $SearchHistory = $SearchHistory->get($id);


        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("users.edit_history", compact('SearchHistory'))->with($data);
    }

    public function update_history(Request $request, $id)
    {

        $SearchHistory = new ParseQuery("SearchHistory");
        $SearchHistory = $SearchHistory->get($id);

        $this->validate($request, [
            'number' => 'required',
            'name' => 'required',
            'searchPrefix' => 'required',
            'userPrefix' => 'required',

        ]);

        $SearchHistory->set("number", $request->number);
        $SearchHistory->set("name", $request->name);
        $SearchHistory->set("searchPrefix", $request->searchPrefix);
        $SearchHistory->set("userPrefix", $request->userPrefix);
        $SearchHistory->save();
        return redirect()->back();

    }

    public function edit_callLogs($id)
    {
        $call = new ParseQuery("CallLogs");
        $call = $call->get($id);

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("users.edit_callLogs", compact('call'))->with($data);
    }


    public function update_callLogs(Request $request, $id)
    {

        $CallLogs = new ParseQuery("CallLogs");
        $CallLogs = $CallLogs->get($id);


        $this->validate($request, [
            'number' => 'required',
            'name' => 'required',
            'type' => 'required',

        ]);

        $CallLogs->set("number", $request->number);
        $CallLogs->set("name", $request->name);
        $CallLogs->set("type", $request->type);
        $CallLogs->save();
        return redirect()->back();

    }

    public function edit_contacts($id)
    {
        $Contacts = new ParseQuery("Contacts");
        $Contacts = $Contacts->get($id);


        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];


        return view("users.edit_contacts", compact('Contacts'))->with($data);
    }

    public function update_contacts(Request $request, $id)
    {

        $Contacts = new ParseQuery("Contacts");
//        $cricket = new Contacts();
        $Contacts = $Contacts->get($id);

        $this->validate($request, [
            'number' => 'required',
            'name' => 'required',
            'accountType' => 'required',
            'accountName' => 'required',
            'email' => 'required',

        ]);

        $Contacts->set("number", $request->number);
        $Contacts->set("name", $request->name);
        $Contacts->set("accountType", $request->accountType);
        $Contacts->set("accountName", $request->accountName);
        $Contacts->set("email", $request->email);
        $Contacts->save();
        return redirect()->back();

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

       return view("users.create")->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
   public function destroy_history($id){

       $delete=new ParseQuery("SearchHistory");
       $history=$delete->get($id);
       $history->destroy($id);
       $history->save();
       return redirect()->back();

   }

    public function destroy_callLogs($id){

        $delete=new ParseQuery("CallLogs");
        $history=$delete->get($id);
        $history->destroy($id);
        $history->save();
        return redirect()->back();

    }

    public function destroy_contacts($id){

        $delete=new ParseQuery("Contacts");
        $history=$delete->get($id);
        $history->destroy($id);
        $history->save();
        return redirect()->back();

    }

}
