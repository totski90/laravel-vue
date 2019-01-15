@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome back {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Left panel</div>
                    
                    
                <div class="card-body">
                    <div id="app">
                        
                        <h1>{{ skill }} </h1>
                        <input type="text" v-model="points">
                        <!-- <counter subject="Likes"></counter>

                        <counter subject="Dislikes"></counter> -->

                    </div>

                    <!-- <template id="counter-template">
                        
                        <h1>@{{ subject }}</h1>

                        <button @click="count += 1">@{{ count }}</button>

                    </template> -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

    <script>

        // This is from Video 4
        // Vue.component('counter', {

        //     data: { count: 0 },

        //     template: '#counter-template',

        //     props: ['subject']            

        // });

        new Vue({
            el: '#app',

            data() {
            return {
                points: 50
            }
        },
        computed: {

            skill: function() {
                if (this.points <= 100) {
                    return 'Beginner';
                }

                return 'Advanced';
            }

        }
            
            // data: {
            //     message: 'textarea'
            // }

            // methods: {
            //     handleIt: function(){
            //         alert('Handled');
            //     }
            // }

        });

    </script>
    <!-- <script src="{{ asset('js/pages/home.js') }}"></script> -->
@endpush