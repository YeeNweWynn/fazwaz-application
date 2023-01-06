import './bootstrap';
import {createApp} from 'vue'
import Pagination from 'v-pagination-3';

import App from './components/App.vue'

const app = createApp(App)

app.component('pagination',Pagination);

app.mount('#app')