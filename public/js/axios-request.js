new Vue({

	el: '#roots-canal',

	data: {

		skills: []

	},

	mounted() {

		axios.get('/skills').then(response => this.skills = response.data);

	}

});