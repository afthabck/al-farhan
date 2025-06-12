
<script>
  import { ref } from 'vue';

  import { Head, Link, router } from '@inertiajs/vue3'
    import Sidebar from './Sidebar.vue'
    import Header from './Navbar.vue'
    import Footer from './Footer.vue'


  export default {
    name: 'App',
    components: {
      Sidebar,
      Header,
      Footer,

    }
  }
  </script>
<template>
    <div class="main-wrapper">
      <Sidebar />
      <div class="page-wrapper">
        <Header />
             <slot /> <!-- This renders Dashboard.vue content -->

        <Footer />
      </div>
    </div>
  </template>



  <style>


  </style>
