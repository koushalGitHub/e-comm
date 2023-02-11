
<div id="result" class="trending-wrapper">
    
    <h3>Results Products</h3>
        @foreach($products as $key => $items)
        <div class="searched-items">
            <a href="details/{{$items['id']}}">
                <img class="trending-size" src="{{$items['gallery']}}" alt="img">
            </a>
            <div class="caption">
                <h2>{{$items['name']}}</h2>
                <h5>{{$items['description']}}</h5>
            </div>

        </div>
        @endforeach
    </div>
