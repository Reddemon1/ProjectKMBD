import './bootstrap';
 
import Alpine from 'alpinejs'; 
 
window.Alpine = Alpine; 
 
Alpine.start(); 
 
import { createApp } from 'vue' 
import PostsIndex from './components/Posts/index.vue' 
 
createApp({}) 
    .component('PostsIndex', PostsIndex)
    .mount('#app') 