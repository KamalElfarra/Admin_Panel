<?php
namespace App\Traits;

trait PaginatorTraits
{

    function getPager($current_page, $total_pages){
        $data=[];
        $first = $this->createPagex("first" ,1, "" , $current_page ==1);
        $previos = $this->createPagex("previous" ,$current_page-1, "" , $current_page ==1);
        $data[]= $first;
        $data[]=$previos;
        $cnt =0;
        $pointer = $current_page -3;
        $pointer = $pointer<1 ? 1: $pointer;
        while($cnt < 7){
            $active = $pointer == $current_page ?"active":"";
            $data[] = $this->createPagex($pointer ,$pointer, $active , false);
            $pointer++;
            $cnt++;
            if($pointer > $total_pages)
                break;
        }


        $next = $this->createPagex("next" ,$current_page+1, "" , $current_page ==$total_pages);
        $last = $this->createPagex("last" ,$total_pages, "" , $current_page ==$total_pages);
        $data[]= $next;
        $data[]=$last;
        return $data;
    }

    function createPagex($text, $page_number ,$active ,$disabled){
        $p = new \stdClass();
        $p->text =$text;
        $p->active = $active;
        $p->disabled = $disabled? "disabled":"";
//        $p->url = $this->url . $page_number;
        $p->page_number = $page_number;

        return $p;
    }
}
