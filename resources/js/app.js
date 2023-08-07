require('./bootstrap');

import {createApp} from 'vue'
import {store} from './store/store'

import Departments from './components/Departments.vue';
import PermissionsCreate from './components/permissions/PermissionsCreate.vue';
import Users from './components/users/Users.vue';

import Form from 'vform';
window.Form = Form;

import Multiselect from '@vueform/multiselect';
import '@vueform/multiselect/themes/default.css';

const app = createApp({})

app.component('departments', Departments);
app.component('permissions-create', PermissionsCreate);
app.component('users', Users);
app.component('multi-select', Multiselect);

window.url = '/task_mis/'

app.use(store);

app.mount('#app')
