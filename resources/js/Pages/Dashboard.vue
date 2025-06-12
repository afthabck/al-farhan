
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { onMounted, ref } from 'vue'

// 👇 REMOVE THIS — doesn't work with Vite. Keep style.css in app.blade.php instead.
// import '/public/assets/css/style.css'

// Card data
const cards = ref([
  { title: 'New Customers', value: '3,897', growth: 3.3 },
  { title: 'New Orders', value: '35,084', growth: -2.8 },
  { title: 'Growth', value: '89.87%', growth: 2.8 }
])

// JS that runs after Vue mounts the DOM
onMounted(() => {
  // Feather Icons
  if (window.feather) window.feather.replace()

 if (window.initApexCharts) window.initApexCharts()


})
</script>


<template>
  <AppLayout>
    <div class="page-content">
      <!-- Header Section -->
      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
          <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
          <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
            <span class="input-group-addon bg-transparent">
              <i data-feather="calendar" class="text-primary"></i>
            </span>
            <input type="text" class="form-control" />
          </div>
          <button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block">
            <i class="btn-icon-prepend" data-feather="download"></i>
            Import
          </button>
          <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="printer"></i>
            Print
          </button>
          <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="download-cloud"></i>
            Download Report
          </button>
        </div>
      </div>

      <!-- Card Section -->
      <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
          <div class="row flex-grow">
            <!-- Repeat this block for each card (Customer, Order, Growth) -->
            <div class="col-md-4 grid-margin stretch-card" v-for="(card, index) in cards" :key="index">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">{{ card.title }}</h6>
                    <div class="dropdown mb-2">
                      <button class="btn p-0" type="button" :id="`dropdownMenuButton${index}`" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                      </button>
                      <div class="dropdown-menu" :aria-labelledby="`dropdownMenuButton${index}`">
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span>View</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span>Edit</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span>Delete</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span>Print</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span>Download</span></a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                      <h3 class="mb-2">{{ card.value }}</h3>
                      <div class="d-flex align-items-baseline">
                        <p :class="card.growth > 0 ? 'text-success' : 'text-danger'">
                          <span>{{ card.growth > 0 ? '+' : '' }}{{ card.growth }}%</span>
                          <i :data-feather="card.growth > 0 ? 'arrow-up' : 'arrow-down'" class="icon-sm mb-1"></i>
                        </p>
                      </div>
                    </div>
                    <div class="col-6 col-md-12 col-xl-7">
                      <div :id="`apexChart${index + 1}`" class="mt-md-3 mt-xl-0"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- end card column -->
          </div>
        </div>
      </div> <!-- end row -->
    </div>
  </AppLayout>
</template>




