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
        <h6 class="card-title">Create Material type</h6>
        <form class="forms-sample" @submit.prevent="handleSubmit">
          <div class="form-group row">
            <label for="process_name" class="col-sm-3 col-form-label">Process Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="process_name" v-model="form.process_name" placeholder="Process Name" />
               <div v-if="errors.process_name" class="text-danger mt-1">{{ errors.process_name }}</div>
            </div>
          </div>
          <!-- select machine -->
           <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Select Machine</label>
                    <div class="col-sm-9">
                    <select class="form-control" id="status" v-model="form.machine_ids" multiple>
                        <option v-for="machine in machines" :key="machine.id" :value="machine.id">{{ machine.name}}</option>

                    </select>
                     <div v-if="errors.machine_ids" class="text-danger mt-1">{{ errors.machine_ids }}</div>
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
  machines:Array

});

const form = reactive({
 process_name: '',
  machine_ids: [],
  status: '1', // default to Active
})

function handleSubmit() {

  router.post('/process', form)
}


function handleCancel() {
  form.material_name = ''
  form.status = '1',
  form.machine_ids = []
}

</script>
