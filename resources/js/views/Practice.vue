
<template id="plan-template">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Vue.js Practice Implementation</div>

                    <div class="card-body">
                        Date begin: December 27, 2018

                        <h1>{{ subject }}</h1>   
                        <button @click="updateCount">Increment {{ count }}</button>
                        
                        <h2>{{ fullName }}</h2>
                        <input type="text" v-model="first" placeholder="First name">
                        <input type="text" v-model="last" placeholder="Last name">

                        
                        	<div v-for="plan in plans">
                        		{{ $data }}
                        		<span>{{ plan.name }}</span>
                        		<span>{{ plan.price }}/month</span>
                        		<button @click="setActivePlan(plan)">Upgrade</button>
                        	</div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	
	export default {
		mounted: function() {
			console.log('Mounted...');
		},

		data() {
			return {								
				first: 'Vic',
				last: 'Andam',
				plans: [
					{ name: 'Enterprise', price: 100 },
					{ name: 'Pro', price: 50 },
					{ name: 'Personal', price: 10 },
					{ name: 'Free', price: 0 },
				]	
			}
		},

		props: ['subject'],

		methods: {

			updateCount: function() {
                this.count += 1;
            },

            setActivePlan: function(plan) {
				this.active = plan;
			}

		},
		computed: {
			fullName: function() {
				return this.first + ' ' + this.last;
			}
		},
		
		// Not working
		components: {
			plan: {

				template: '#plan-template',

				props: ['plan'],

				data: function() {
					return {
						active: false
					};					
				},

				
			}
		}
	}

</script>