<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/bulma.css') }}">

        <title>Learning Vue 2.1.3</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> -->
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
            }
            
            .color-red{
                color: red;
            }
            .color-blue{
                color: blue;
            }
            .is-loading{
                color: green;
            }

        </style>

    </head>
    <body>

        <div id="root" class="container">

            <tabs>
                
                <tab name="About Us" :selected="true">
                    
                    <h1>Here is the content for about us</h1>

                </tab>

                <tab name="About Our Culture">
                    
                    <h1>Here is the content for about our culture</h1>

                </tab>

                <tab name="About our Vision">
                    
                    <h1>Here is the content for about our vision</h1>

                </tab>

            </tabs>

            <modal-message v-if="showModal" @close="showModal = false">
                
                <p>We insert any text here.</p>

            </modal-message>

            <modal-form v-if="showFormModal" @close="showFormModal = false">

                <template slot="header">This is my title</template>

                This is content body

                <template slot="footer">

                    <button class="button is-success">Save changes</button>
                    <button class="button" @click="closing">Cancel</button>
                    
                </template>                

            </modal-form>

            <button @click="showModal = true">Show modal</button>

            <button @click="showFormModal = true">Show form modal</button>


            <message title="Hello World" body="Lorem ipsum dolor mit."></message>

            <message title="Hello Universe" body="Bla bla bla"></message>
        
            <h1 :class="className">Learning Vue 2.1.3</h1>

            <task-list></task-list>

            <!-- Lists -->
            <li v-for="name in names">
                
                @{{ name }}

            </li>

            <input type="text" id="input" v-model="newName"> 

            <button id="button" @click="addName">Add Name</button>
            <!-- End Lists -->


            <button :title="title">Hover over me!</button>

            <button :class="{ 'is-loading': isLoading }" @click="toggleClass">Toggle me</button>
            
            <br>
            
            <coupon @applied="onCouponApplied"></coupon>

            <h1 v-show="couponApplied">It was applied</h1>

            <progress-view inline-template>
                
                <div>
                    
                    <p>Your Progress Through this Course Is @{{ completionRate }} %</p>

                    <p><button @click="completionRate += 10">Update completion rate</button></p>

                </div>                

            </progress-view>


        </div>

        <div id="roots-canal" class="container" style="padding-top: 15px">
            
            <ul>
                
                <li v-for="skill in skills" v-text="skill"></li>

            </ul>

        </div>

        <div id="oriented-form" class="container">

            <form method="post" action="/projects" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">

                <div class="control">

                    <label for="name" class="label">Project name:</label>
                    
                    <input type="text" id="name" name="name" v-model="form.name" class="input">  

                    <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>                  
                    
                </div>

                <div class="control">

                    <label for="name" class="label">Description:</label>

                    <input type="text" id="description" name="description" v-model="form.description" class="input">

                    <span class="help is-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
                    
                </div>

                <br>

                <div class="control">

                    <button class="button is-primary" :disabled="form.errors.any()">Create</button>
                    
                </div>

                
            </form>

                

            <form action="/projects" @submit.prevent="onUpdate">
                
                <div class="control">
                    <br>
                    <button class="button is-primary" :disabled="form.errors.any()">Update</button>                    
                    <a @click.prevent="onDelete" class="button is-danger" :disabled="form.errors.any()" href="{{url('/projects')}}">Delete</a>

                    <a class="button is-success" href="{{ url('/') }}">Compiled version</a>
                    
                </div>

            </form>
            
            
        </div>

        <br>

        <div id="one" class="container">

            <h1>This is data one name: @{{ shared.user.name }}</h1>

            
        </div>

        <div id="two" class="container">

            <h1>This is data two name: @{{ shared.user.name }}</h1>
            
        </div>

        <div id="app" class="container">
            
            <h1>Custom input components</h1>

            <!-- <input type="text" v-model="coupon"> -->

            <!-- <input type="text" :value="coupon" @input="coupon = $event.target.value"> -->

            <coupon v-model="coupon">

        </div>
        
        <script src="/js/jquery.js"></script>

        <script src="/js/vue2.1.3.js"></script>
        <script type="text/javascript" src="/js/axios.js"></script>

        <script type="text/javascript" src="/js/vue2.1.3.main.js"></script>
        <script type="text/javascript" src="/js/axios-request.js"></script>
        <script type="text/javascript" src="/js/axios-submit-form.js"></script>

    </body>
</html>
