<?php

namespace App\Http\Controllers;

use App\Traits\PaginatorTraits;
use Illuminate\Http\Request;
use Parse\ParseQuery;

class CallLogsController extends Controller
{

    use PaginatorTraits;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($page)
    {
        $page = trim($page);
        $value = "";
        $query = new ParseQuery("CallLogs");
        $count = new ParseQuery("CallLogs");

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
        return view("CallLogs.table", compact("value", "displayLimit", "from", "to", "total", "results", "pages"))->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

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
       $edit=new ParseQuery("CallLogs");
       $edit=$edit->get($id);

        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view("CallLogs.edit",compact("edit"))->with($data);

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
        $call = new ParseQuery("CallLogs");
        $call = $call->get($id);


        $this->validate($request, [

            'number' => 'required',
            'name' => 'required',
            'type' => 'required',

        ]);

//        $cricket->set("objectId", $request->objectId);
        $call->set("number", $request->number);
        $call->set("name", $request->name);
        $call->set("type", $request->type);
        $call->save();
        return redirect("/CallLogs/index/1");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $call = new ParseQuery("CallLogs");
        $call = $call->get($id);
        $call->destroy($id);
        return redirect()->back();

    }
}
