<template>
    <nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Noble<span>UI</span>
        </a>
        <div class="sidebar-toggler not-active" @click="toggleSidebar">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </router-link>
          </li>
          <!-- Rest of the sidebar menu items -->
        </ul>
      </div>
    </nav>
    <nav class="settings-sidebar">
      <!-- Settings sidebar content -->
    </nav>
  </template>
  
  <script>
  export default {
    name: 'Sidebar',
    methods: {
      toggleSidebar() {
        document.querySelector('.sidebar').classList.toggle('collapsed');
        document.querySelector('.sidebar-toggler').classList.toggle('not-active');
      }
    },
    mounted() {
      // Initialize Feather Icons
      if (window.feather) {
        window.feather.replace();
      }
    }
  }
  </script>