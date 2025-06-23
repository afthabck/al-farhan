<template>
<AppLayout>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <!-- flash message -->
         <!-- <div v-if="flash.success" class="alert alert-success">
            {{ flash.success }}
        </div>
        <div v-if="flash.error" class="alert alert-danger">
            {{ flash.error }}
        </div> -->
        <!--  -->
      <div class="card-body">
        <h6 class="card-title">Create Raw Material</h6>
        <form class="forms-sample" @submit.prevent="handleSubmit">
          <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Raw Material Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="name" v-model="form.name" placeholder="Raw Material Name" />
               <div v-if="errors.name" class="text-danger mt-1">{{ errors.name }}</div>
            </div>
          </div>

            <!-- select Unit -->
                <div class="form-group row">
                    <label for="unit" class="col-sm-3 col-form-label">Select Unit</label>
                    <div class="col-sm-9">
                    <select class="form-control" id="status" v-model="form.unit">
                        <option selected>Please Select Unit</option>
                        <option value="kg">Kilogram</option>
                        <option value="ltr">Liter</option>
                        <option value="pcs">Pieces</option>
                        <option value="cm">CentiMeter</option>
                        <option value="m">Meter"</option>
                        <option value="mm">MilliMeter"</option>
                        <option value="others">Others</option>

                    </select>
                     <div v-if="errors.unit" class="text-danger mt-1">{{ errors.unit }}</div>
                        </div>
                </div>
           <!-- select status -->
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Select Status</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="status" v-model="form.status">
                            <option selected value="1">Active</option>
                            <option value="0">Inactive</option>

                        </select>
                    </div>
                </div>

          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button type="button" class="btn btn-light" @click="handleCancel">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</AppLayout>
</template>

<script setup>

import AppLayout from '@/Layouts/AppLayout.vue';
import '../../../../css/style.css';
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue'


const props = defineProps({
  errors: Object,
 

});

const form = reactive({
 name: '',
 unit: '',
  status: '1', // default to Active
})

function handleSubmit() {

  router.post('/raw_materials', form)
}


function handleCancel() {
  form.name = ''
  form.status = '1'
  form.unit = ''
}

</script>
