new Vue({

	el:'#app',

	postSubmit : function() {
            this.isPosting = true;
            // this.isProcessing = true;

            // console.log("Post 1 = ", this.post);

            let url = this.url + '/store';

            this.errors = [];

            let data = {};
            
                data = this.post;         

            console.log(this.post);

            axios.post(url, data)
                .then(function (response) {
                    let url = this.url;
                    this.isPosting = false;
                    // this.isProcessing = false;

                    let post = response.data.data.post;
                    let posts = this.posts;

                    posts.unshift(post);

                    this.recordCount = (posts).length;
                    this.posts = posts;

                    // Clear all the fields
                    this.post.description = '';


                }.bind(this))
                .catch(function (error) {

                    // this.isPosting = false;
                    // this.isProcessing = false;
                    this.isPosting = false;



                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                }.bind(this));

        },

});