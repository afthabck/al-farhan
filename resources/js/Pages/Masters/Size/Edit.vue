<template>
  <AppLayout>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <!-- flash message -->
        <div v-if="flash.success" class="alert alert-success">{{ flash.success }}</div>
        <div v-if="flash.error" class="alert alert-danger">{{ flash.error }}</div>

        <div class="card-body">
          <h6 class="card-title">Edit Size</h6>
          <form class="forms-sample" @submit.prevent="handleSubmit">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Size</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" v-model="form.size" />
                <div v-if="errors.size" class="text-danger mt-1">{{ errors.size }}</div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Select Status</label>
              <div class="col-sm-9">
                <select class="form-control" v-model="form.status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
            </div>

            <button type="submit" class="btn btn-primary mr-2">Update</button>
            <button type="button" class="btn btn-light" @click="handleCancel">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { reactive } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import { usePage, router } from '@inertiajs/vue3'
import { computed } from 'vue'
import '../../../../css/style.css';

const page = usePage()
const flash = page.props.flash || {}

const props = defineProps({
  errors: Object,
  size: Object,
})

const form = reactive({
  size: props.size.size || '',
  status: props.size.status?.toString() || '1',
})

function handleSubmit() {
  router.put(`/sizes/${props.size.id}`, form)
}

function handleCancel() {
  window.history.back()
}
</script>
