
$.getScript('./js/helper/utilities.js', function() {

	 // ===================OBJECT ORIENTED FORM=========================

	new Vue({

		el: '#oriented-form',

		data: {

			form: new Form({

				name: '',

				description: ''
			})

		},

		methods: {

			onSubmit() {			

				this.form.submit('post', '/projects');

			},

			onUpdate() {

				this.form.submit('put', '/projects');

			},

			onDelete() {

				this.form.submit('delete', '/projects');

			}

		}

	});

});

// ==========================CUSTOM INPUT COMPONENTS==============================
Vue.component('coupon', {

	props: ['code'],

	template: `

			<input type="text" :value="code" @input="updateCode($event.target.value)" ref="input">

	`,

	data() {

		return { 

			invalids: ['ALLFREE', 'SOMETHINGELSE']

		}

	},

	methods: {

		updateCode(code) {

			// Validation

			if (this.invalids.includes(code)) {

				alert('This coupon is no longer valid. Sorry!');

				this.$refs.input.value = code = '';

			}

			this.$emit('input', code);

		}

	}

});

 new Vue({

 	el: '#app',

 	data: {

 		coupon: 'FREEBIE'

 	}

 });

// =================SHARED STATE 101========================
  let store = {

 	user: {

 		name: 'John Doe'

 	}

 };

 new Vue({

 	el: '#one',

 	data: {

 		foo: 'bar',

 		shared: store

 	}

 });

 new Vue({

 	el: '#two',

 	data: {

 		foo: 'Other bar',

 		shared: store
 	}

 })