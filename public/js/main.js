
Vue.component('tasks', {

	props: ['list'],

	template: '#task-template'

});

new Vue({

	el: '#test'

	// data: { 

	// 	tasks: [

	// 		{ body: 'Go to the store', completed: false },

	// 		{ body: 'Go to the bank', completed: false },

	// 		{ body: 'Go to the doctor', completed: true }

	// 	]
	// },
	// methods: {
	// 	toggleCompletedFor(task) {

	// 		task.completed = !task.completed;

	// 	}
	// }

});