@extends('base.base')
@section('content')


@foreach ($produtos as $produto)
    <div id="a" class='card-item'>
        <img height="200" src="{{$produto->photo_url}}" alt="">
        <p class='card-title'>{{$produto->name}}</p>
        <p class='money card-price'>{{$produto->price}}</p>
        <p>no pix ou boleto</p>
        <p class='card-condition-payment'>5x de <span class="money">{{$produto->price / 5}}</span> sem juros</p>
        <div class="card-actions">
            <div class="card-quantificator">
                <i v-on:click="counter -= 1" class="bi bi-dash"></i>
                <span class="card-quantitity"></span>
                <i v-on:click="counter += 1" class="bi bi-plus"></i>
            </div>
            <button class="card-buy">comprar</button>
        </div>
    </div>  
  
@endforeach




@endsection