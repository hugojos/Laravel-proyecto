@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ultimos agregados</h1>
    <div class="" style="display:flex; flex-wrap:wrap;">
      @foreach ($post as $product)
        <div style="">
          <h5>Vendedor: <a href="/users/{{$product->user_id}}">{{$product->alias}}</a></h5>
          <a href="/articles/{{ $product->id }}" id="art">
            <h1>{{ $product->title }}</h1>
            <p>{{$product->description}}</p>
            <p>Precio: <span style="color:green;">{{$product->price}}</span></p>
          </a>
        </div>
        
      @endforeach

    </div>
      {{ $post->links() }}
    </div>

</div>
@endsection
