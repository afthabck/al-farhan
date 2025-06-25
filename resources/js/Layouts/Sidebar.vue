<script>

import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

export default {
  name: 'Sidebar',
  setup() {
    const page = usePage()
    const appName = computed(() => page.props.app_name)
    return { appName }
  },
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
        <!-- Noble<span>UI</span> --> {{ appName }}

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
          <a href="/dashboard" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <!-- Masters Type  -->
        <li class="nav-item nav-category">Masters</li>
           <li class="nav-item">
            <a
                href="/material-type"
                class="nav-link cursor-pointer flex justify-between items-center"
                active-class="active-link"
            >
                <div class="flex items-center gap-2">
                <i class="link-icon" data-feather="layers"></i>
                <span class="link-title">Material Type</span>
                </div>
            </a>
        </li>
        <!-- Machines -->
         <li class="nav-item">
            <a
                href="/machines"
                class="nav-link cursor-pointer flex justify-between items-center"
                active-class="active-link"
            >
                <div class="flex items-center gap-2">
                <i class="link-icon" data-feather="tool"></i>
                <span class="link-title">Machines</span>
                </div>
            </a>
        </li>
        <!-- process -->
        <li class="nav-item">
            <a
                href="/process"
                class="nav-link cursor-pointer flex justify-between items-center"
                active-class="active-link"
            >
                <div class="flex items-center gap-2">
                <i class="link-icon" data-feather="repeat"></i>
                <span class="link-title">Process</span>
                </div>
            </a>
        </li>
        <!-- Raw Materials -->
         <li class="nav-item">
            <a
                href="/raw_materials"
                class="nav-link cursor-pointer flex justify-between items-center"
                active-class="active-link"
            >
                <div class="flex items-center gap-2">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Raw Materials</span>
                </div>
            </a>
        </li>

        <!-- Size -->
         <li class="nav-item">
            <a
                href="/sizes"
                class="nav-link cursor-pointer flex justify-between items-center"
                active-class="active-link"
            >
                <div class="flex items-center gap-2">
                <i class="link-icon" data-feather="maximize"></i>
                <span class="link-title">Sizes</span>
                </div>
            </a>
        </li>
          <!-- Thickness -->
         <li class="nav-item">
            <a
                href="/thickness"
                class="nav-link cursor-pointer flex justify-between items-center"
                active-class="active-link"
            >
                <div class="flex items-center gap-2">
                <i class="link-icon" data-feather="maximize"></i>
                <span class="link-title">Thickness</span>
                </div>
            </a>
        </li>
          <!-- Product -->
         <li class="nav-item">
            <a
                href="/products"
                class="nav-link cursor-pointer flex justify-between items-center"
                active-class="active-link"
            >
                <div class="flex items-center gap-2">
                <i class="link-icon" data-feather="shopping-bag"></i>
                <span class="link-title">Product</span>
                </div>
            </a>
        </li>

    <!-- Supply Management -->
          <li class="nav-item nav-category">Supply Management</li>
           <li class="nav-item">
            <a
                href="/supply-management"
                class="nav-link cursor-pointer flex justify-between items-center"
                active-class="active-link"
            >
                <div class="flex items-center gap-2">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Supply Management</span>
                </div>
            </a>
        </li>

        <!-- Admin Configuration Settings -->
          <li class="nav-item nav-category">Admin Configuration Settings</li>
          <br>

           <li class="nav-item">
            <a
                href="/admin_settings"
                class="nav-link cursor-pointer flex justify-between items-center"
                active-class="active-link"
            >
                <div class="flex items-center gap-2">
                <i class="link-icon" data-feather="settings"></i>
                <span class="link-title">Admin Settings</span>
                </div>
            </a>
        </li>

      </ul>



    </div>
  </nav>
</template>

<style scoped>
/* Optional: add your own sidebar styling */
</style>
