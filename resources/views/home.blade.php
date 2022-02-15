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
            <div class="card-quantificator">
                <i v-on:click="contador -= 1" class="bi bi-dash"></i>
                <span class="card-quantitity"></span>
                <i v-on:click="contador += 1" class="bi bi-plus"></i>
            </div>
            <button class="card-buy">comprar</button>
        </div>
    </div>  
    <script src="{{ asset('js/app.js') }}">
    </script>
@endforeach




@endsection