
class Errors {

	constructor() {

		this.errors = {};

	}

	get(field) {

		if (this.errors[field]) {

			return this.errors[field][0];

		}
	}

	record(errors) {

		this.errors = errors;
	}

	clear(field) {

		if(field) {

			delete this.errors[field];

			return;
		}


		this.errors = {};

	}

	has(field) {

		return this.errors.hasOwnProperty(field);

	}

	any() {

		return Object.keys(this.errors).length > 0;

	}

}

 class Form {

 	constructor(data) {

 		this.originalData = data;

 		for (let field in data) {

	 		this[field] = data[field];

	 	}

	 	this.errors = new Errors();

 	}

 	data() {

 		let data = Object.assign({}, this);

 		delete data.originalData;

 		delete data.errors;

 		return data;

 	}

 	reset() {

 		for (let field in this.originalData) { 			

 			this[field] = '';

 		}

 		this.errors.clear();

 	}

 	submit(requestType, url) {

 		axios[requestType](url, this.data())				

			.then(this.onSuccess.bind(this))

			.catch(this.onFail.bind(this));


 	}

 	onSuccess(response) {

 		alert(response.data.message); 		

 		this.reset();

 	}

 	onFail(error) {

 		this.errors.record(error.response.data.errors);

 	}
 	

 }

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

		onSuccess(response) {

			alert(response.data.message);

			form.reset();

		}

	}

});