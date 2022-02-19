@extends('base.base')
@section('content')


@foreach ($produtos as $produto)
    <div id="cont" class='card-item'>
        <img height="200" src="{{$produto->photo_url}}" alt="">
        <p class='card-title'>{{$produto->name}}</p>
        <p class='money card-price'>{{$produto->price}}</p>
        <p>no pix ou boleto</p>
        <p class='card-condition-payment'>5x de <span class="money">{{$produto->price / 5}}</span> sem juros</p>
        <div class="card-actions">
            <a href="{{ route('remover-produto', ['id' => $produto->id])}}"><button class="card-buy">Remover</button></a>
        </div>
    </div>  
    <script src="{{ asset('js/app.js') }}">
    </script>
@endforeach




@endsection