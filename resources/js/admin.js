require('./bootstrap')
import { createApp } from 'vue'

const app = createApp({})

import test from './components/ExampleComponent.vue'
app.component('test', test)

app.mount('#app')
