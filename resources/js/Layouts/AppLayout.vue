
<script>
  import { ref } from 'vue';

  import { Head, Link, router } from '@inertiajs/vue3'
  import Sidebar from './components/Layouts/Sidebar.vue'
  import Header from './components/Layouts/Navbar.vue'
  import Footer from './components/Layouts/Footer.vue'
  import MainContent from './components/MainContent.vue'
  
  export default {
    name: 'App',
    components: {
      Sidebar,
      Header,
      Footer,
      MainContent
    }
  }
  </script>
<template>
    <div class="main-wrapper">
      <Sidebar />
      <div class="page-wrapper">
        <Header />
        <MainContent />
        <Footer />
      </div>
    </div>
  </template>
  
  
  
  <style>
  /* Import your CSS files here */
  @import '../assets/css/style.css';
  </style>