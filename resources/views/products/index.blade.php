<!DOCTYPE html>
<html>
<head>
    <title>Product Index</title>
    @viteReactRefresh
    @vite('resources/js/app.js')
</head>
<body>

<h1>Products INDEX </h1>

@foreach ($products as $product)
    <li class="list-group-item">
        <strong>{{ $product->name }}</strong><br>
        Count: {{ $product->count }}<br>
        Price: ${{ $product->price }}<br>
        Description: {{ $product->description }}
    </li>
@endforeach

<div id="productsIndex" data-products="{{ json_encode($products) }}"></div>


</body>
</html>


