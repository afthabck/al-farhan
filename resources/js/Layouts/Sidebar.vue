<script>
import { Link } from '@inertiajs/vue3'
import feather from 'feather-icons'

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

        <li class="nav-item nav-category">Web Apps</li>
        <li class="nav-item">
          <div
            class="nav-link cursor-pointer flex justify-between items-center"
            @click="emailMenuOpen = !emailMenuOpen"
          >
            <div class="flex items-center gap-2">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Email</span>
            </div>
            <i
              class="link-arrow transition-transform"
              :class="{ 'rotate-180': emailMenuOpen }"
              data-feather="chevron-down"
            ></i>
          </div>

          <ul
            v-show="emailMenuOpen"
            class="nav sub-menu pl-4 py-2 transition-all duration-300"
          >
            <li class="nav-item">
              <Link href="/inbox" class="nav-link">Inbox</Link>
            </li>
            <li class="nav-item">
              <Link href="/read" class="nav-link">Read</Link>
            </li>
            <li class="nav-item">
              <Link href="/compose" class="nav-link">Compose</Link>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</template>

<style scoped>
/* Optional: add your own sidebar styling */
</style>
