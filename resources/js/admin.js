require('./bootstrap')
import { createApp } from 'vue'

const app = createApp({})

import chartPayment from './components/ExampleComponent.vue'
app.component('chart-payment', chartPayment)
import chartNewJob from './components/ExampleComponent.vue'
app.component('chart-new-job', chartNewJob)

app.mount('#app')
