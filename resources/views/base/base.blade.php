<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Drink</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script> --}}

    <meta charset='UTF-8'>
    <meta name='viewport' content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel='stylesheet' href='{{asset('css/style.css')}}'>

    @yield('headers')
</head>
<body>
    <nav style="padding: 24px;" class="navbar" >
        <img src="{{ asset('img/logo.png')}}" alt="" srcset="">
        <div class="search-bar-container">
            <input type="text">
            <i class="bi bi-search"></i>
        </div>
        <div class="nav-icons">
    
            <a href="" data-bs-toggle="offcanvas" data-bs-target="#conta" aria-controls="offcanvasRight"><i
                    class="bi bi-person"></i>
                @auth
                    {{ auth()->user()->name }} 
                @endauth
                @guest
                    Minha Conta 
                @endguest
                </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="conta" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="contaLabel">Logar</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="card mb-3 item" style="max-width: 540px;">
    
    
                    @auth
                        <a href='{{ route('logout') }}'>Sair</button>
                    @endauth
    
                    @guest
                        <form method='POST' action="{{route('login')}}">
                            @csrf
                            <div class="form-group">
                                <x-Input name='email' text='Email'/>
                            </div>
                            <div class="form-group">
    
                                <x-Input name='password' text='Senha' type='password'/>
    
                                <a href="{{route('registrar')}}"> Criar conta </a>
                            </div>
                            <div class="card-actions">
                                <button class="card-logar" type='submit'>Logar</button>
                            </div>
                        </form>
                    @endguest
    
    
                    
    
                    <div class="row g-0">
                    </div>
                </div>
            </div>
    
            <a href="" data-bs-toggle="offcanvas" data-bs-target="#contato" aria-controls="offcanvasRight"><i
                    class="bi bi-telephone"></i>Contato</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="contato" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="contatoLabel">Contato</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="card mb-3 item" style="max-width: 540px;">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email para contato</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descricão do problema</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="card-actions">
                            <button class="card-logar" type='submit'>Enviar</button>
                        </div>
                    </form>
                    <div class="row g-0">
                    </div>
                </div>
            </div>
            <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                    class="bi bi-cart"></i>Carrinho</a>
            <div class=" offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Carrinho</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class= " card mb-3 item" style="max-width: 540px;">
                    <div class="row g-0">
                        <div style="justify-content: center;" class="col-md-4">
                            <img src="./b.jpg" class="img-fluid rounded-start" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5>Kit Opala</h5>
                                <p style="margin-bottom: 0px;" class="card-text"><small
                                        class="money text-muted">5</small> </p>
                                <p style="margin-bottom: 0px;" class="card-text"><small class="text-muted">Quantidade
                                        Comprada: 2</small> </p>
                                <p style="margin-bottom: 0px;" class="card-text"><small class="text-muted">TOTAL:
                                    </small><small class="money text-muted">10</small></p>
                                <div class="card-actions">
                                    <button class="card-remove">remover</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="card mb-3 item" style="max-width: 540px;">
                    <div class="row g-0">
                        <div style="justify-content: center;" class="col-md-4">
                            <img src="./b.jpg" class="img-fluid rounded-start" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5>Kit Opala</h5>
                                <p style="margin-bottom: 0px;" class="card-text"><small
                                        class="money text-muted">5</small> </p>
                                <p style="margin-bottom: 0px;" class="card-text"><small class="text-muted">Quantidade
                                        Comprada: 2</small> </p>
                                <p style="margin-bottom: 0px;" class="card-text"><small class="text-muted">TOTAL:
                                    </small><small class="money text-muted">10</small></p>
                                <div class="card-actions">
                                    <button class="card-buy">remover</button>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='carrinho-checkout'>
                    <p style="margin-bottom: 0px;" class="card-text"><small class="text-muted">Quantidade Comprada: 4</small> </p>
                    <p style="margin-bottom: 0px;" class="card-text"><small class="text-muted">TOTAL:
                    </small><small class="money text-muted">20</small></p>
                    <div class="card-actions">
                        <button class="card-buy">Comprar</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </nav>
    <ul class='nav-menu'>
        <a href="./ofertas.html"><li>Ofertas</li></a>
        <a href="./kit.html"><li>Kits</li></a>
        <a href="./gourmet.html"> <li>Gourmet</li></a> 
    </ul>

    <main>
        @yield('content')
    </main>

</body>
</html>