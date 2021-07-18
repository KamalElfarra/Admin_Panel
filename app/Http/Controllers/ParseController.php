<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Parse\ParseClient;
use Parse\ParseQuery;
use Parse\ParseObject;

class ParseController extends Controller
{
    //

    function index(){

        $query = new ParseQuery("GameScore");

        $query->equalTo("playerName", "Mojo Jojo");
        $results = $query->find();
        $scores=[];
        for ($i = 0; $i < count($results); $i++) {
            $object = $results[$i];
            $s = new \stdClass();
            $s->ID = $object->getObjectId();
            $s->playerName = $object->get('playerName');
            $s->score = $object->get('score');
            $s->cheatMode = $object->get('cheatMode');
            $s->createdAt = $object->getCreatedAt();
            $s->updatedAt = $object->getUpdatedAt();


            $scores[] = $s;

           // echo $object->getObjectId() . ' - ' . $object->get('playerName');
        }
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];
        return view("custom.scores", compact("scores"))->with($data);

    }
}
