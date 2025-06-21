<template>
  <AppLayout>
    <!-- Title Row -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Edit Config: {{ formatKey(config.key) }}</h3>
            <Link href="/admin_config" class="btn btn-primary btn-sm">
              <i class="fas fa-list"></i> Config
            </Link>
          </div>
        </div>
      </div>
    </div>

    <!-- Form -->
   <form @submit.prevent="submitForm" :enctype="form.type === 1 ? 'multipart/form-data' : null">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <input type="hidden" v-model="form.type" />

                    <!-- Website Name -->
                    <div v-if="config.key === 'website_name'" class="form-group">
                        <label for="value">Website Name</label>
                        <input
                        type="text"
                        id="value"
                        class="form-control"
                        v-model="form.value"
                        placeholder="Enter Website Name"
                        />
                        <div v-if="errors.value" class="invalid-feedback d-block">
                        {{ errors.value }}
                        </div>
                    </div>

                    <!-- Website Logo -->
                    <div v-else-if="config.key === 'website_logo'" class="form-group">
                        <label for="value">Website Logo</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input
                            type="file"
                            class="custom-file-input"
                            id="value"
                            @change="handleFileChange"
                            />
                            <label class="custom-file-label" for="value">{{ fileName || 'Choose file' }}</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        </div>
                        <div v-if="errors.value" class="invalid-feedback d-block">
                        {{ errors.value }}
                        </div>

                        <div class="form-group mt-3">
                        <div class="image-container">
                            <img
                            :src="getImageUrl(config.value)"
                            alt="Uploaded Image"
                            class="uploaded-image"
                            width="100"
                            />
                        </div>
                        </div>
                    </div>

                    <!-- Dashboard Title -->
                    <div v-else-if="config.key === 'dashboard_title'" class="form-group">
                        <label for="dashboard_title">Dashboard Title</label>
                        <input
                            type="text"
                            id="value"
                            class="form-control"
                            v-model="form.value"
                            placeholder="Enter Dashboard Title"
                            />
                        <div v-if="errors.dashboard_title" class="invalid-feedback d-block">
                        {{ errors.dashboard_title }}
                        </div>
                    </div>

                    <!-- Sidebar Label -->
                    <div v-else-if="config.key === 'sidebar_label'" class="form-group">
                        <label for="sidebar_label">Sidebar Label</label>
                        <input
                        type="text"
                        id="sidebar_label"
                        class="form-control"
                        v-model="form.sidebar_label"
                        placeholder="Enter Sidebar Label"
                        />
                        <div v-if="errors.sidebar_label" class="invalid-feedback d-block">
                        {{ errors.sidebar_label }}
                        </div>
                    </div>

                    <!-- Color Picker -->
                    <div v-else-if="form.type === 2" class="form-group">
                        <label for="value">Color</label>
                        <input
                        type="color"
                        class="form-control"
                        id="value"
                        v-model="form.value"
                        />
                        <div v-if="errors.value" class="invalid-feedback d-block">
                        {{ errors.value }}
                        </div>
                    </div>

                    <!-- Default Text Field (Fallback) -->
                    <div v-else class="form-group">
                        <label for="value">Value</label>
                        <input
                        type="text"
                        id="value"
                        class="form-control"
                        v-model="form.value"
                        placeholder="Enter Value"
                        />
                        <div v-if="errors.value" class="invalid-feedback d-block">
                        {{ errors.value }}
                        </div>
                    </div>
                    </div>

              </div>
            </div>

            <!-- Submit -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" id="submitBtn">Update</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </AppLayout>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { router, Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import '../../../css/style.css'

const props = defineProps({
  config: Object,
  errors: Object
})

// Reactive form data
const form = reactive({
  type: props.config.type,
  value: props.config.type === 1 ? null : props.config.value,
  sidebar_label: props.config.sidebar_label || '',
  dashboard_title: props.config.dashboard_title || ''
})

const fileName = ref('')

// Format config key nicely
function formatKey(key) {
  return key
    .split('_')
    .map(word => word.charAt(0).toUpperCase() + word.slice(1))
    .join(' ')
}

// Handle file change
function handleFileChange(event) {
  const file = event.target.files[0]
  if (file) {
    form.value = file
    fileName.value = file.name
  }
}

// Get image URL
function getImageUrl(path) {
return `/storage/uploads/config/${path}`;
}

// Submit form
function submitForm() {
  const formData = new FormData()
  formData.append('_method', 'PUT') // Tell Laravel this is a PUT request
  formData.append('type', form.type)

  if (form.type === 1) {
    // Type 1 = File
    if (form.value instanceof File) {
      formData.append('value', form.value)
    }
    // Don't append 'value' at all if no new file is uploaded
  } else {
    // Type 0 or 2 = Text / Color
    formData.append('value', form.value ?? '')
  }

  formData.append('sidebar_label', form.sidebar_label ?? '')
  formData.append('dashboard_title', form.dashboard_title ?? '')

  router.post(`/admin_settings/${props.config.id}`, formData, {
    forceFormData: true,
    preserveScroll: true
  })
}
</script>
