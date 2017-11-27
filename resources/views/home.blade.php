@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ultimos agregados</h1>
    <div class="" style="display:flex; flex-wrap:wrap;">
      @foreach ($post as $product)
        <div class="" style="margin: 0 20px; min-width:150px;">
          <h1>{{ $product->title }}</h1>
          <p>{{$product->description}}</p>
          <p>Precio: <span style="color:green;">{{$product->price}}</span></p>
        </div>
      @endforeach
    </div>

      {{ $post->links() }}
    </div>

</div>
@endsection
