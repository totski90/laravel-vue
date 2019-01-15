<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component. I finally got it!

                        <h1>{{ skill }} - {{ message }}</h1>
                        <input type="text" v-model="points">
                        <input type="text" v-model="message">

                        <form @submit.prevent="handleIt">
                            
                            <div class="row">
                                
                                <div v-show="!message" class="col-md-4">
                                    <span style="color: red" class="error">You must enter a message</span>
                                </div>
                                <div class="col-md-4">
                                    <textarea v-model="message"></textarea>
                                </div>
                                

                                <button v-show="message" @click="count += 1" type="submit" class="btn btn-default">Increment count: {{ count }}</button>

                            </div>
                            

                        </form>

                        <pre>
                            {{ $data }}
                        </pre>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<div class="form-group">
    <!-- <counter></counter>
    <counter></counter> -->
</div>



<script>

    // Vue.component('counter', {

    //     template: '#counter-template'

    // });

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                points: 50,
                message: '',
                count: 0
            }
        },

        methods: {

            handleIt: function(e) {

                // alert('Handled!');

            },
            updateCount: function() {
                this.count += 1;
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
    }
</script>
