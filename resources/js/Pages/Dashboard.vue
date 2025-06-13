<template>
  <AppLayout>
    <div class="page-content">
      <div class="row">
        <div class="col-md-4" v-for="(card, index) in cards" :key="index">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">{{ card.title }}</h6>
                <div class="dropdown mb-2">
                  <button class="btn p-0" type="button">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i>View</a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i>Edit</a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i>Delete</a>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">{{ card.value }}</h3>
                  <div class="d-flex align-items-baseline">
                    <p :class="card.growth >= 0 ? 'text-success' : 'text-danger'">
                      <span>{{ card.growth > 0 ? '+' : '' }}{{ card.growth }}%</span>
                      <i :data-feather="card.growth >= 0 ? 'arrow-up' : 'arrow-down'" class="icon-sm mb-1"></i>
                    </p>
                  </div>
                </div>
                <div class="col-6 col-md-12 col-xl-7">
                  <div :id="`apexChart${index + 1}`" class="mt-md-3 mt-xl-0" style="height: 200px;"></div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

// Data for each card
const cards = ref([
  { title: 'New Customers', value: '3,897', growth: 3.3 },
  { title: 'New Orders', value: '35,084', growth: -2.8 },
  { title: 'Growth', value: '89.87%', growth: 2.8 }
])

onMounted(() => {
  // Feather Icons (must be available in global script)
  if (window.feather) window.feather.replace()
  alert($.fn.jquery);

  // Render one chart per card
  cards.value.forEach((card, index) => {
    const options = {
      chart: {
        height: 200,
        type: 'line',
        parentHeightOffset: 0
      },
      colors: ['#4d8af0'],
      stroke: {
        width: 3,
        curve: 'smooth'
      },
      series: [{
        name: card.title,
        data: [10, 20, 30, 40] // You can customize data per card if needed
      }],
      xaxis: {
        categories: ['2015', '2016', '2017', '2018']
      },
      grid: {
        borderColor: 'rgba(77, 138, 240, .1)',
        padding: {
          bottom: -6
        }
      }
    }

    const chartEl = document.querySelector(`#apexChart${index + 1}`)
    if (chartEl) {
      const chart = new ApexCharts(chartEl, options)
      chart.render()
    }
  })
})
</script>
