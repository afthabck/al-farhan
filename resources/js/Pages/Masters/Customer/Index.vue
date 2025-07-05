<template>
  <form @submit.prevent="submitForm">
    <div class="row g-3 px-3 m-0">
      <!-- Company Name -->
      <div class="col-lg-4 mb-2">
        <div class="row align-items-center">
          <label for="companyName" class="col-sm-5 col-form-label text-sm-end">
            Company Name
          </label>
          <div class="col-sm-7">
            <input
              type="text"
              id="companyName"
              name="company_name"
              class="form-control"
              v-model="form.company.name"
            />
          </div>
        </div>
      </div>

      <!-- VAT / Tax ID -->
      <div class="col-lg-4 mb-2">
        <div class="row align-items-center">
          <label for="vat" class="col-sm-5 col-form-label text-sm-end">
            VAT / Tax ID
          </label>
          <div class="col-sm-7">
            <input
              type="text"
              id="vat"
              name="vat_tax_id"
              class="form-control"
              v-model="form.company.vat"
            />
          </div>
        </div>
      </div>

      <!-- Customer Source -->
      <div class="col-lg-4 mb-2">
        <div class="row align-items-center">
          <label for="source" class="col-sm-5 col-form-label text-sm-end">
            Customer Source
          </label>
          <div class="col-sm-7">
            <select
              id="source"
              name="customer_source"
              class="form-select slim-select"
              v-model="form.company.source"
            >
              <option value="">Select</option>
              <option value="Field">Field</option>
              <option value="Mail">Mail</option>
              <option value="Call">Call</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Customer Code (readonly) -->
      <div class="col-lg-4 mb-2">
        <div class="row align-items-center">
          <label for="code" class="col-sm-5 col-form-label text-sm-end">
            Customer Code
          </label>
          <div class="col-sm-7">
            <input
              type="text"
              id="code"
              name="customer_code"
              class="form-control"
              v-model="form.company.code"
              readonly
            />
          </div>
        </div>
      </div>

      <!-- Website -->
      <div class="col-lg-4 mb-2">
        <div class="row align-items-center">
          <label for="website" class="col-sm-5 col-form-label text-sm-end">
            Website
          </label>
          <div class="col-sm-7">
            <input
              type="text"
              id="website"
              name="website"
              class="form-control"
              v-model="form.company.website"
            />
          </div>
        </div>
      </div>

      <!-- Customer Type -->
      <div class="col-lg-4 mb-2">
        <div class="row align-items-center">
          <label for="custType" class="col-sm-5 col-form-label text-sm-end">
            Customer Type
          </label>
          <div class="col-sm-7">
            <select
              id="custType"
              name="customer_type"
              class="form-select slim-select"
              v-model="form.company.type"
            >
              <option value="NO RESPONSE">NO RESPONSE</option>
              <option value="REGULAR">REGULAR</option>
              <option value="NORMAL">NORMAL</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Industry Type -->
      <div class="col-lg-4 mb-2">
        <div class="row align-items-center">
          <label for="industryType" class="col-sm-5 col-form-label text-sm-end">
            Industry Type
          </label>
          <div class="col-sm-7">
            <select
              id="industryType"
              name="industry_type"
              class="form-select slim-select"
              v-model="form.company.industryType"
            >
              <option value="large">Large</option>
              <option value="medium">Medium</option>
              <option value="small">Small</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Customer Category -->
      <div class="col-lg-4 mb-2">
        <div class="row align-items-center">
          <label for="custCategory" class="col-sm-5 col-form-label text-sm-end">
            Customer Category
          </label>
          <div class="col-sm-7">
            <select
              id="custCategory"
              name="customer_category"
              class="form-select slim-select"
              v-model="form.company.category"
            >
              <option value="regular">Regular</option>
              <option value="normal">Normal</option>
              <option value="no_response">No-response</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Customer Industry -->
      <div class="col-lg-4 mb-2">
        <div class="row align-items-center">
          <label for="custIndustry" class="col-sm-5 col-form-label text-sm-end">
            Customer Industry
          </label>
          <div class="col-sm-7">
            <select
              id="custIndustry"
              name="customer_industry"
              class="form-select slim-select"
              v-model="form.company.industry"
            >
              <option value="manufacturing">Manufacturing</option>
              <option value="trading">Trading</option>
              <option value="individual">Individual</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Customer Logo Upload -->
      <div class="col-lg-4 mb-2">
        <div class="row align-items-center">
          <label class="col-sm-5 col-form-label text-sm-end">
            Customer Logo
          </label>
          <div class="col-sm-7 formbold-file-input">
            <input
              type="file"
              id="fileLogo"
              class="d-none file-uploader"
              accept="image/*"
              @change="onLogoChange"
            />
            <label for="fileLogo" class="upload-icon-label">
              <!-- SVG omitted for brevity -->
              <span class="upload-text">Upload</span>
            </label>
            <div
              v-if="logoPreview"
              class="preview-wrap mt-2"
              style="max-width:200px"
            >
              <img :src="logoPreview" alt="Logo preview" class="img-fluid" />
              <span @click="removeLogo" class="remove-image bi bi-x-circle" style="cursor:pointer"></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Company Documents Upload -->
      <div class="col-lg-4 mb-2">
        <div class="row align-items-center">
          <div class="col-sm-6">
            <select
              name="company_documents"
              id="company_documents"
              class="form-select slim-select"
              v-model="form.company.documentType"
            >
              <option value="vat_certificates">VAT Certificates</option>
              <option value="company_licence">Company Licence</option>
              <option value="owner_details">Owner Details</option>
              <option value="others">Others</option>
            </select>
          </div>
          <div class="col-sm-6">
            <input
              type="file"
              id="documentUpload"
              class="d-none"
              multiple
              @change="onDocsChange"
            />
            <label for="documentUpload" class="upload-icon-label">
              <!-- SVG omitted -->
              <span class="upload-text">Upload</span>
            </label>
          </div>
        </div>

        <div v-if="docPreviews.length" class="mt-2 document-preview-container">
          <div class="document-preview-header d-flex justify-content-between">
            <span>Selected Files:</span>
            <button type="button" class="btn btn-sm btn-outline-danger" @click="clearDocs">
              Clear All
            </button>
          </div>
          <ul class="document-preview-list list-unstyled mt-2">
            <li v-for="(file, i) in docPreviews" :key="i">{{ file.name }}</li>
          </ul>
        </div>
      </div>

      <div class="col-12">
        <div class="d-flex justify-content-end px-3 mb-4">
          <button type="submit" class="btn btn-submit">Submit</button>
        </div>
      </div>
    </div>
  </form>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
  company: {
    name: '',
    vat: '',
    source: '',
    code: '12345',
    website: '',
    type: 'NO RESPONSE',
    industryType: 'large',
    category: 'regular',
    industry: 'manufacturing',
    documentType: '',
  }
})

// Logo preview URL
const logoPreview = ref(null)

// list of selected document files
const docPreviews = ref([])

function onLogoChange(e) {
  const file = e.target.files[0]
  if (!file) return
  logoPreview.value = URL.createObjectURL(file)
  form.company.logo = file
}

function removeLogo() {
  logoPreview.value = null
  form.company.logo = null
}

function onDocsChange(e) {
  const files = Array.from(e.target.files)
  form.company.documents = files
  docPreviews.value = files.map(f => ({ name: f.name }))
}

function clearDocs() {
  form.company.documents = []
  docPreviews.value = []
}

function submitForm() {
  const payload = new FormData()
  // append company fields
  for (let key in form.company) {
    if (key === 'logo' || key === 'documents') continue
    payload.append(key, form.company[key])
  }
  if (form.company.logo) {
    payload.append('customer_logo', form.company.logo)
  }
  if (form.company.documents) {
    form.company.documents.forEach((f, i) => {
      payload.append(`company_documents_files[${i}]`, f)
    })
  }

  router.post(route('customers.store'), payload, {
    preserveState: true,
    onError: errs => console.error(errs)
  })
}
</script>
