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

                    <div class="is-grouped" :id="status.id">
                        <a @click="deleteStatus(status.id)" class="button is-danger is-fullwidth">Delete</a>
                        <a @click="editStatus(status)" class="button is-primary is-fullwidth">Edit</a>
                    </div>
                    
                </div>

            <form @submit.prevent="updateStatus" @keydown="form.errors.clear()">

                <textarea v-if="showEditor" class="textarea" placeholder="Just another textarea..." v-model="form.body"></textarea>

                <span class="help is-danger" v-if="form.errors.has('body')" v-text="form.errors.get('body')"></span>

                <div class="is-grouped" v-if="showEditor" style="margin-top: 5px">                    
                    <button class="button is-primary" :disabled="form.errors.any()">Save</button>

                     <a @click="editCancel" class="button is-danger is-outlined">
                        <span>Close</span>
                        <span class="icon is-small">
                          <i class="fa fa-times"></i>
                        </span>
                    </a>
                </div>
                <br>

            </form>

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

                form: new Form({ body: '', id: ''}),

                status: {
                    id: '',
                    body: ''                    
                },
                showEditor: false

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

            showAction(id) {

            },

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

                this.form.body = status.body;

                this.form.id = status.id;     

                this.showEditor = true;          

            },

            updateStatus() {
                this.form.put('/statuses').then(status => alert('Your status has been successfully updated.'));

                Status.all(statuses => this.statuses = statuses);

                this.form.errors.any() ? alert('has error') : alert(this.form.errors.has('body')); //this.showEditor = false;
            },

            editCancel() {
                this.showEditor = false;
                this.form.errors.clear()
            }

        }

    }

</script>