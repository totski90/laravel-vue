<template>
    
    <div class="container">
        
        <div class="colums">
    
            <div class="colum">

                <div class="message" v-for="status in statuses">

                    <div class="message-header">
                        
                        <p>
                            
                            {{ status.user.name }} said...

                        </p>

                        <p>
                            
                            {{ status.created_at | ago | capitalize }}

                        </p>                        

                    </div>


                    <div class="message-body" v-text="status.body"></div>

                    <a @click="deleteStatus(status.id)" class="button is-danger is-fullwidth">Delete</a>
                    <a @click="editStatus(status)" class="button is-primary is-fullwidth">Edit</a>
                    
                </div>

                <!-- add to stream form -->

                <add-to-stream @completed="addStatus"></add-to-stream>                 


            </div>

        </div>

    </div>

</template>

<script>

    import moment from 'moment';

    import Status from '../models/Status';

    import AddToStream from '../components/AddToStream.vue';


    
    export default {

        components: { AddToStream },

        data() {

            return {

                statuses: [],

                form: new Form(),

                status: {
                    id: '',
                    body: ''
                }

            }

        },

        filters: {

            ago(date) {

                return moment(date).fromNow();

            },

            capitalize(value) {

                return value.toUpperCase();

            }

        },

        created() {

            Status.all(statuses => this.statuses = statuses);

                // .then(response => this.statuses = response.data);

        },

        methods: {

            addStatus(status) {

                this.statuses.unshift(status);

                alert('Your status has been added to the stream.');

                window.scrollTo(0, 0);

            },

            deleteStatus(id) {

                this.form.delete(`/statuses/${id}`).then(status => alert('Your status has been successfully deleted.'));

                Status.all(statuses => this.statuses = statuses);

            },

            editStatus(status) {

                this.status.id = status.id;

                this.status.body = status.body;                

            }

        }

    }

</script>