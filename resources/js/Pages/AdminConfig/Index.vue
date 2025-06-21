<template>
  <AppLayout>
    <div class="page-content">
      <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Tables</a></li>
          <li class="breadcrumb-item active">Config Table</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Configuration List</h6>
          <p class="card-description">
            Refer to the <a href="https://datatables.net/" target="_blank">DataTables Documentation</a> for customization.
          </p>
          <div class="table-responsive">
            <table id="vueDataTable" class="table display nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Key</th>
                  <th>Value</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(data, index) in config" :key="index">
                  <td>{{ index + 1 }}</td>
                  <td>{{ formatKey(data.key) }}</td>

                  <!-- Type 0: Text -->
                  <td v-if="data.type === 0">
                    {{ data.value }}
                  </td>

                  <!-- Type 1: Image -->
                  <td v-else-if="data.type === 1">
                    <img
                      :src="getImageUrl(data.value)"
                      class="rounded border"
                      alt="logo"
                      width="40"
                      height="40"
                      v-if="data.value"
                    />
                    <span v-else class="text-muted">No image</span>
                  </td>

                  <!-- Type 2: Color -->
                  <td v-else-if="data.type === 2">
                    <span
                      class="rounded-full border border-gray-300 me-2"
                      :style="{
                        backgroundColor: data.value,
                        display: 'inline-block',
                        width: '25px',
                        height: '25px'
                      }"
                    ></span>
                    <span>{{ data.value }}</span>
                  </td>

                  <!-- Fallback -->
                  <td v-else>
                    <span class="text-muted">Unknown type</span>
                  </td>

                  <!-- Action buttons -->
                  <td>
                    <button class="btn btn-sm btn-info me-2" @click="editConfig(data.id)" title="Edit">
                      <i data-feather="edit"></i>
                    </button>
                    <!-- Optional: Delete button
                    <button class="btn btn-sm btn-danger" @click="deleteMaterial(data.id)" title="Delete">
                      <i data-feather="trash-2"></i>
                    </button>
                    -->
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>


<script setup>
import { onMounted, ref, nextTick } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import { router } from '@inertiajs/vue3'
import '../../../css/style.css';

// Props from Laravel
const props = defineProps({
  config: Array
})

// Dummy data

onMounted(async () => {
  await nextTick()

  $('#vueDataTable').DataTable({
    dom: '<"d-flex justify-content-between align-items-center mb-3"Bf>rtip',
    buttons: [
      {
        text: 'Create',
        className: 'btn btn-primary',
        action: function () {
          // Option 1: Navigate using Inertia
          router.visit('/material-type/create')

          // Option 2: Regular redirect
          // window.location.href = '/material-type/create'
        }
      }
    ],
    responsive: true
  })
 })

function editConfig(id) {
  router.visit('/admin_settings/' + id + '/edit')
}

function deleteMaterial(id) {
  if (confirm('Are you sure you want to delete this material type?')) {
    router.delete(`/material-type/${id}`)
  }
}

function formatKey(key) {
  return key
    .split('_')
    .map(word => word.charAt(0).toUpperCase() + word.slice(1))
    .join(' ')
}
function getImageUrl(filename) {
  return `/storage/uploads/config/${filename}`;
}

</script>
