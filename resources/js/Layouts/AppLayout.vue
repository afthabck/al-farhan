<script setup>
import Sidebar from './Sidebar.vue'
import Header from './Navbar.vue'
import Footer from './Footer.vue'



</script>

<template>
  <div class="main-wrapper">
    <Sidebar />
    <div class="page-wrapper">
      <Header />

      <!-- Main content area with proper spacing -->
      <main class="page-content">
        <slot /> <!-- This will render your page content -->
      </main>

      <Footer />
    </div>
  </div>
</template>

<style scoped>
.main-wrapper {
  display: flex;
  min-height: 100vh;
}

.page-wrapper {
  flex: 1;
  display: flex;
  flex-direction: column;
}

.page-content {
  flex: 1;
  padding: 20px;
}
</style>
