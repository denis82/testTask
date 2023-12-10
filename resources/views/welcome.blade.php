<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
        <!-- Styles -->
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">

                </div>
                <div class="mt-16">
                <div class="container-fluid" style="display:flex; justify-content:center; margin-top: 60px;">
                    <div class="row">
                        <main role="main">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                <th>Номер места</th>
                                <th>Имя пилота</th>
                                <th>Город пилота</th>
                                <th>Автомобиль</th>
                                <th>Попытка 1</th>
                                <th>Попытка 2</th>
                                <th>Попытка 3</th>
                                <th>Попытка 4</th>
                                <th>Сумма очков</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($participants as $key => $participant)
                                <tr>
                                <td>{{ $participant['place'] }}</td>
                                <td>{{ $participant['name'] }}</td>
                                <td>{{ $participant['city'] }}</td>
                                <td>{{ $participant['car'] }}</td>
                                <td>{{ $participant['attempt1'] }}</td>
                                <td>{{ $participant['attempt2'] }}</td>
                                <td>{{ $participant['attempt3'] }}</td>
                                <td>{{ $participant['attempt4'] }}</td>
                                <td>{{ $participant['attemptSum'] }}</td>
                                </tr>
                                <tr>
                            @endforeach
                            </tbody>
                            </table>
                            <div>
                                <button id="button" type="button" class="btn btn-primary"
                                >Обновить таблицу / Скачать csv</button>
                            </div>
                        </div>
                        </main>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById("button").addEventListener("click", myFunction);
            async function myFunction() {
                await  new Promise((resolve, reject) => {
                    const req = new XMLHttpRequest();
                    const url = "?export=1";
                    req.open('GET', url, true);
                    req.responseType = "blob";
                    req.onload = function (event) {
                        var blob = req.response;
                        var link=document.createElement('a');
                        link.href=window.URL.createObjectURL(blob);
                        link.download="result.csv";
                        link.click();
                    };
                    req.send();
                    setTimeout(resolve, 1000)
                });
                location.href='/';
            }
            </script>
    </body>
</html>
