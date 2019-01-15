window.Event = new class {

    constructor() {

        this.vue = new Vue();

    }

    fire(event, data = null){

        this.vue.$emit(event, data);

    }

    listen(event, callback){

        this.vue.$on(event, callback);

    }

}

Vue.component('tabs', {

    template: `

        <div>
        
            <div class="tabs">

              <ul>

                <li v-for="tab in tabs" :class="{ 'is-active': tab.isActive }">

                    <a :href="tab.href" @click="selectTab(tab)">{{ tab.name }}</a>

                </li>

              </ul>

            </div>

            <div class="tabs-details">

                <slot></slot>

            </div>

        </div>

    `,

    data() {

        return { tabs: [] }

    },

    created()  {

        this.tabs = this.$children;

    },

    methods: {

        selectTab(selectedTab) {
            
            this.tabs.forEach(tab => {

                tab.isActive = (tab.name == selectedTab.name);

            });

        }

    }

});

Vue.component('tab', {

    template: `

        <div v-show="isActive"><slot></slot></div>

    `,

    props: {

        name: { required: true },
        selected: { default: false }

    },

    data() {

        return {

            isActive: false

        };

    },

    mounted() {

        this.isActive = this.selected;

    },

    computed: {

        href() {

            return '#' + this.name.toLowerCase().replace(/ /g, '-');

        }

    }

})

Vue.component('modal-message', {

    template: `

            <div class="modal is-active">

              <div class="modal-background"></div>

              <div class="modal-content">
                
                <div class="box">
                    
                    <slot></slot>

                </div>                

              </div>

              <button class="modal-close is-large" aria-label="close" @click="$emit('close')"></button>

            </div>

    `

});

Vue.component('modal-form', {

    template: `

        <div class="modal is-active">

          <div class="modal-background"></div>

          <div class="modal-card">

            <header class="modal-card-head">

              <p class="modal-card-title">

                <slot name="header"></slot>

              </p>              

              <button class="delete" aria-label="close" @click="closed"></button>

            </header>

            <section class="modal-card-body">
              
              <slot></slot>

            </section>

            <footer class="modal-card-foot">
              
              <slot name="footer"></slot>

            </footer>

          </div>

        </div>

    `,
    methods: {

        closed() {

            this.$emit('close');

        }
    }

});

Vue.component('message', {

    props: ['title', 'body'],

    template: `

        <article class="message" v-show="isVisible">

          <div class="message-header">

            <p>{{ title }}</p>

            <button class="delete" aria-label="delete" @click="isVisible = false"></button>

          </div>

          <div class="message-body">

            {{ body }}

          </div>

        </article>
    `,

    data() {

        return {

            isVisible: true

        };

    }

});

Vue.component('task-list', {

    template: `

        <div>

                <task v-for="task in tasks">{{ task.task }}</task>

        </div>

        `,

        data() {

            return {

                tasks: [

                    { task: 'Go to the store', completed: true },
                    { task: 'Go to the email', completed: false }, 
                    { task: 'Go to the farm', completed: true }, 
                    { task: 'Go to the work', completed: false }, 
                ]

            };
        }

});

Vue.component('task', {

    template: '<li><slot></slot></li>'

});

Vue.component('coupon', {

    template: '<input placeholder="Enter your coupon code" @blur="onCouponApplied">',

    methods: {

        onCouponApplied() {

             Event.fire('applied');

        }

    }

});

Vue.component('progress-view', {

    data() {

        return {

            completionRate: 50

        }

    }

});

var app = new Vue({

    el: '#root',

    data: {

        couponApplied: false,

        showModal: false,

        showFormModal: false,
        
        names: ['Joe', 'Mary', 'Jane', 'Jack'],

        newName: '',

        title: 'Now the title is being set through JavaScript',

        className: 'color-red',

        isLoading: false
    },

    created() {

        Event.listen('applied', () => alert('Handling it!'));        

    },

    methods: {

        closing() {

            // this.$emit('close');            

        },

        onCouponApplied() {

            this.couponApplied = true

        },

        toggleClass() {

            this.isLoading = true;

        },

        addName() {

            this.names.push(this.newName);

            this.newName = '';

        }

    }

}); 