<template>
  <AppLayout>
    <div class="page-content">
      <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Tables</a></li>
          <li class="breadcrumb-item active">Data Table</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Data Table</h6>
          <p class="card-description">
            Read the <a href="https://datatables.net/" target="_blank">Official DataTables Documentation</a>
          </p>
          <div class="table-responsive">
            <table id="vueDataTable" class="table display nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>Size</th>
                  <th>Status</th>
                  <th>Actions</th>

                </tr>
              </thead>
              <tbody>
                <tr v-for="(row, index) in props.sizes" :key="index">
                <td>{{ row.size }}</td>
                <td>{{ row.status == 1 ? "Active" : "Inactive" }}</td>
                <td>
                    <button class="btn btn-sm btn-info me-2" @click="editSize(row.id)" title="Edit">
                        <i data-feather="edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" @click="deleteSize(row.id)" title="Delete">
                        <i data-feather="trash-2"></i>
                    </button>
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
import '../../../../css/style.css';

// Props from Laravel
const props = defineProps({
  sizes: Array
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
          router.visit('/sizes/create')

          // Option 2: Regular redirect
          // window.location.href = '/material-type/create'
        }
      }
    ],
    responsive: true
  })
})

function editSize(id) {
  router.visit('/sizes/' + id + '/edit')
}

function deleteSize(id) {
  if (confirm('Are you sure you want to delete this material type?')) {
    router.delete(`/sizes/${id}`)
  }
}
</script>
