<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>My App</title>


    </head>

    <body>
        
        <div id="app">


            <router-link to="/">Home</router-link>

            <router-link to="/about">About</router-link>



            <router-view></router-view>
            

        </div>


        <script src="/js/app.js"></script>

    </body>

</html>
