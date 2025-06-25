<template>
  <AppLayout>
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Create Product</h6>
          <form class="forms-sample" @submit.prevent="handleSubmit">
            <div class="row">
              <!-- Left 6-column -->
              <div class="col-md-6">
                <!-- Product Name -->
                <div class="form-group row">
                  <label for="product_name" class="col-sm-4 col-form-label">Product Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="product_name" v-model="form.product_name" placeholder="Product Name" />
                    <div v-if="errors.product_name" class="text-danger mt-1">{{ errors.product_name }}</div>
                  </div>
                </div>

                <!-- Product Code -->
                <div class="form-group row">
                  <label for="product_code" class="col-sm-4 col-form-label">Product Code</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="product_code" v-model="form.product_code" placeholder="Product Code" />
                    <div v-if="errors.product_code" class="text-danger mt-1">{{ errors.product_code }}</div>
                  </div>
                </div>
                <!-- Custom Size -->
                <div class="form-group row">
                  <label for="custom_size" class="col-sm-4 col-form-label">Custom Size</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="custom_size" v-model="form.custom_size" placeholder="Custom size" />
                    <div v-if="errors.custom_size" class="text-danger mt-1">{{ errors.custom_size }}</div>
                  </div>
                </div>
                <!-- select status -->
                <div class="form-group row">
                  <label for="status" class="col-sm-4 col-form-label">Select Status</label>
                  <div class="col-sm-8">
                    <select class="form-control" id="status" v-model="form.status">
                      <option selected value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Right 6-column -->
              <div class="col-md-6">
                <!-- Select Size -->
                <div class="form-group row">
                  <label for="size" class="col-sm-4 col-form-label">Select Size</label>
                  <div class="col-sm-8">
                    <select class="form-control" id="size" v-model="form.size">
                      <option v-for="size in sizes" :key="size.id" :value="size.id">{{ size.size }}</option>
                    </select>
                    <div v-if="errors.size" class="text-danger mt-1">{{ errors.size }}</div>
                  </div>
                </div>

                <!-- Select Thickness -->
                <div class="form-group row">
                  <label for="size" class="col-sm-4 col-form-label">Select Thickness</label>
                  <div class="col-sm-8">
                    <select class="form-control" id="thickness" v-model="form.thickness">
                      <option v-for="thickness in thicknesses" :key="thickness.id" :value="thickness.id">{{ thickness.thickness }}</option>
                    </select>
                    <div v-if="errors.thickness" class="text-danger mt-1">{{ errors.thickness }}</div>
                  </div>
                </div>
                <!-- Custom Thickness -->
                <div class="form-group row">
                  <label for="custom_thickness" class="col-sm-4 col-form-label">Custom Thickness</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="custom_thickness" v-model="form.custom_thickness" placeholder="Custom Thickness" />
                    <div v-if="errors.custom_thickness" class="text-danger mt-1">{{ errors.custom_thickness }}</div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Submit & Cancel Buttons -->
            <div class="mt-3">
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button type="button" class="btn btn-light" @click="handleCancel">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AppLayout>
</template>


<script setup>
import { reactive } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';
import '../../../../css/style.css';
import { router } from '@inertiajs/vue3';


const props = defineProps({
  errors: Object,
  sizes:Array,
  thicknesses:Array

});

const form = reactive({
 product_name: '',
 product_code: '',
 custom_size:'',
 custom_thickness:'',
thickness:'',
  size: '',
  status: '1', // default to Active
})

function handleSubmit() {

  router.post('/products', form)
}


function handleCancel() {
    form.product_name = '',
    form.product_code = '',
    form.sizes = '',
    form.thicknesses  = '',
    form.custom_size = '',
    form.custom_thickness = '',
    form.status = '1'

}

</script>
