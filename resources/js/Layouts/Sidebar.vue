<script>
import { Link } from '@inertiajs/vue3'


export default {
  name: 'Sidebar',
  data() {
    return {
      showDropdown: false,
      emailMenuOpen: false,
    }
  },
  methods: {
    toggleSidebar() {
      document.querySelector('.sidebar')?.classList.toggle('collapsed')
    },
    handleClickOutside(event) {
      const dropdown = document.getElementById('languageDropdownMenu')
      if (dropdown && !dropdown.contains(event.target)) {
        this.showDropdown = false
      }
    }
  },
  mounted() {
    feather.replace()
    document.addEventListener('click', this.handleClickOutside)
  },
  beforeUnmount() {
    document.removeEventListener('click', this.handleClickOutside)
  }
}
</script>

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
          <Link href="/dashboard" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </Link>
        </li>
        <li class="nav-item nav-category">Masters</li>
        <li class="nav-item">
          <div class="nav-link cursor-pointer flex justify-between items-center">
            <div class="flex items-center gap-2">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Raw Materials</span>
            </div>
           
          </div>

          </li>
      </ul>
    </div>
  </nav>
</template>

<style scoped>
/* Optional: add your own sidebar styling */
</style>
