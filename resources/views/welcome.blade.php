<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Vue and Ajax</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}"> -->

    </head>
    <body>
        <!-- <div class="flex-center position-ref full-height"> -->
            
            {{--@include('includes.authentication')--}}

            <!-- <div class="content" id="app"> -->
                <!-- Working Previous videos -->
                <!-- <practice-coding subject="Likes"></practice-coding> -->
                <!-- <practice-coding subject="Dislikes"></practice-coding> -->
                
                <!-- Not working video -->
                <!-- <div v-for="plan in plans">

                    <plan>:plan="plan"</plan>
                    
                </div>-->                

                <!-- Custom components 101 - Not working-->

                <!-- <tasks :list="tasks"></tasks> -->
                <!-- <tasks></tasks> -->

                <!-- End custom components 101 -->

                
                
            <!-- </div> -->

            <div class="container" id="test">
                
                <tasks list="{{ json_encode($tasks) }}"></tasks>

            </div>

            <template id="task-template">
                
                <h1>My Tasks</h1>

                <ul class="list-group">                    

                        {{--<li class="list-group-item" v-for="task in list">

                            @{{ task.body }}
                            
                        </li>--}}
                    
                </ul>

            </template>

        <!-- </div> -->

        <!-- Working reference to previous videos -->
        <!-- <script type="text/javascript" src="js/app.js"></script> -->

        <!-- <script src="{{ asset('/js/vue.min.js') }}" crossorigin="anonymous"></script> -->

        <script src="/js/vue-1.0.8.js"></script>

        <script src="/js/main.js"></script>

    </body>
</html>
