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
        <h6 class="card-title">Edit Raw Material</h6>
        <form class="forms-sample" @submit.prevent="handleSubmit">
          <div class="form-group row">
            <label for="raw_materials_name" class="col-sm-3 col-form-label">Raw raw_materials Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="raw_materials_name" v-model="form.name" placeholder="RawMaterial Name" />
               <div v-if="errors.raw_materials_name" class="text-danger mt-1">{{ errors.raw_materials_name }}</div>
            </div>
          </div>
           <!-- Select Unit -->
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
import { reactive } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';
import '../../../../css/style.css';
import { router } from '@inertiajs/vue3';


const props = defineProps({

    errors: Object,
    raw_material: Object

});

const form = reactive({
  name: props.raw_material.name,
  status: String(props.raw_material.status),
  unit: props.raw_material.unit || '', // Set unit from backend
})

function handleSubmit() {

  router.put(`/raw_materials/${props.raw_material.id}`, form)
}


function handleCancel() {
  form.name = ''
  form.status = '1',
  form.unit = []
}

</script>
