<template>
    
    <div class="container">
        
        <div class="colums">
    
            <div class="colum">

                <div class="message" v-for="status in statuses">

                    <div class="message-header">
                        
                        <p>
                            
                            @{{ status.user.name }}

                        </p>

                        <p>
                            
                            A moment ago...

                        </p>

                    </div>


                    <div class="message-body" v-text="status.body"></div>
                    
                </div>                   


            </div>

        </div>

    </div>

</template>

<script>
    
    export default {

        data() {

            return {

                statuses: []

            }

        },

        created() {

            axios.get('/statuses')

                .then(response => this.statuses = response.data);

        }        

    }

</script>