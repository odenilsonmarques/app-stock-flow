<h1>Hello world</h1>
<ul>
    @foreach ($productsEmptys as $productsEmpty)
        <li>
            {{$productsEmpty->name}}
        </li>
    @endforeach

</ul>
