<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MONUV</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">


        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <img src="{{ asset('img/logo.png') }}" class="logo img-fluid" alt="Logo Unidesk">
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="ml-4">
                            <div class="flex items-center">
                                <h4 class="text-gray-900 dark:text-white">1ª DESAFIO</h4>
                            </div>

                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">

                                <form method="POST" action="{{ route('desafio.um.submit') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Informe os preços</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="precos" id="precos" required></textarea>
                                        <small id="Help" class="form-text text-muted">Digite os valores separado por virgulo Ex:. 15, 3, 11, 7, 13, 9</small>
                                    </div>

                                    @include('button-submit')

                                </form>

                                @if($errors->has('precos'))
                                    @include('error', ['error' => $errors->first('precos')])
                                @endif

                                @isset($errorPrecos)
                                    @include('error', ['error' => $errorPrecos])
                                @endisset

                                @isset($lucro)
                                <div class="mt-4">
                                    <hr>
                                    <h6>PREÇOS: <b>[{{$entrada}}]</b></h6>
                                    <h6>SAÍDA: <b>{{$lucro}}</b></h6>
                                </div>
                                @endisset
                             
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                     
                        <div class="ml-4">
                            <div class="flex items-center">
                                <h4 class="text-gray-900 dark:text-white">2ª DESAFIO</h4>
                            </div>

                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">

                                <form method="POST" action="{{ route('desafio.dois.submit') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Informe a duração dos comerciais</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comerciais" id="comerciais" required></textarea>
                                        <small id="Help" class="form-text text-muted">Digite os valores separado por virgulo Ex:. 17, 18, 14, 11, 23, 29, 24, 25</small>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlInput1">Informe o intervalo</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" name="intervalo" id="intervalo" required>
                                    </div>

                                    @include('button-submit')

                                </form>


                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        @include('error', ['error' => $error])
                                    @endforeach                               
                                @endif

                                @isset($errorComerciais)
                                    @include('error', ['error' => $errorComerciais])
                                @endisset


                                @isset($combinacao)
                                <div class="mt-4">
                                    <hr>
                                    <h6>COMERCIAIS: <b>[{{$comerciais}}]</b></h6>
                                    <h6>INTERVALO: <b>{{$intervalo}}</b></h6>
                                    <h6>SAÍDA: <b>[{{$combinacao}}]</b></h6>
                                </div>
                                @endisset

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
