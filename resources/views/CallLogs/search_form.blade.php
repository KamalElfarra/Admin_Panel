
    <form method="POST" class="example" action="/tables/search/{{$res}}" style="text-align: right;">
        @csrf
        <input type="text" placeholder="Search.." name="search">
        <a type="submit"><i class="fa fa-search"></i></a>
    </form>
