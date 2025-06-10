<!-- <script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
 -->

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>
 <template>
    <div class="page-content">
      <!-- Dashboard content sections -->
      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
          <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
        <!-- Dashboard controls -->
      </div>
  
      <div class="row">
        <!-- Dashboard cards and charts -->
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'MainContent',
    mounted() {
      // Initialize dashboard scripts
      if (window.initializeDashboard) {
        window.initializeDashboard();
      }
    }
  }
  </script>