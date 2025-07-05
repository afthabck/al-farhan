<template>
  <AppLayout>
    <div class="dashboard-main-body PageSecMain userRegistration">
      <h4 class="page-title">Create Customer</h4>
      <form class="form-wrapper" id="customerForm" @submit.prevent="submitForm" enctype="multipart/form-data">
        <div class="section-header">Customer Information</div>
        <div id="customer-info-errors" class="error-message form-section-error"></div>

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
                    <div v-if="errors.company_name" class="text-danger small">{{ errors.company_name }}</div>
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
                         <div v-if="errors.vat_tax_id" class="text-danger small">{{ errors.vat_tax_id }}</div>
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
                                v-model="form.company.customer_source"
                                >
                                <option value="">Select</option>
                                <option value="Field">Field</option>
                                <option value="Mail">Mail</option>
                                <option value="Call">Call</option>
                                </select>
                            </div>
                            </div>
                            <div v-if="errors.customer_source" class="text-danger small">{{ errors.customer_source }}</div>
                        </div>
                        <!-- Customer Code -->
                         <div class="col-lg-4 mb-2">
                        <div class="row align-items-center">
                        <label for="code" class="col-sm-5 col-form-label text-sm-end">Customer Code</label>
                        <div class="col-sm-7">
                            <input
                            type="text"
                            id="code"

                            name="customer_code"
                            class="form-control"
                            v-model="form.company.customer_code"
                            readonly
                            >
                        </div>
                        </div>
                         <div v-if="errors.customer_code" class="text-danger small">{{ errors.customer_code }}</div>
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
                          <div v-if="errors.website" class="text-danger small">{{ errors.website }}</div>
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
                        v-model="form.company.customer_type"
                        >
                        <option value="NO RESPONSE">NO RESPONSE</option>
                        <option value="REGULAR">REGULAR</option>
                        <option value="NORMAL">NORMAL</option>
                        </select>
                    </div>
                    </div>
                     <div v-if="errors.customer_type" class="text-danger small">{{ errors.customer_type }}</div>
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
              v-model="form.company.industry_type"
            >
              <option value="large">Large</option>
              <option value="medium">Medium</option>
              <option value="small">Small</option>
            </select>
          </div>
        </div>
        <div v-if="errors.industry_type" class="text-danger small">{{ errors.industry_type }}</div>
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
        <div v-if="errors.customer_category" class="text-danger small">{{ errors.customer_category }}</div>
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
              v-model="form.company.customer_industry"
            >
              <option value="manufacturing">Manufacturing</option>
              <option value="trading">Trading</option>
              <option value="individual">Individual</option>
            </select>
          </div>
        </div>
        <div v-if="errors.customer_industry" class="text-danger small">{{ errors.customer_industry }}</div>
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
                name="logo"
                class="d-none file-uploader"
                accept="image/*"
                @change="onLogoChange"
                />
                <label for="fileLogo" class="upload-icon-label">
                <!-- SVG omitted for brevity -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                    <path
                        d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                </svg>
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
            <div v-if="errors.logo" class="text-danger small">{{ errors.logo }}</div>
        </div>
         <!-- Company Documents Upload -->
      <div class="col-lg-4 mb-2">
        <div class="row align-items-center">
          <div class="col-sm-6">
            <select
              name="document_type"
              id="document_type"
              class="form-select slim-select"
              v-model="form.company.document_type"
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                <path
                    d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
            </svg>
              <span class="upload-text">Upload</span>
            </label>
          </div>
          <div v-if="errors.document_type" class="text-danger small">{{ errors.document_type }}</div>
<div v-if="errors['company_documents.0']" class="text-danger small">{{ errors['company_documents.0'] }}</div>
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




            </div>
        <div class="section-header">Address</div>
            <!-- Error message container -->
                    <div id="address-errors" class="error-message form-section-error"></div>

                    <!-- Start repeatable address block -->
                    <div
                    v-for="(address, index) in form.addresses"
                    :key="index"
                    class="row g-3 px-3 repeat-item m-0"
                    >
                <!-- Address -->
                <div class="col-lg-4">
                    <div class="row align-items-center">
                    <label :for="`address_${index}`" class="col-sm-5 col-form-label text-sm-end">
                        Address
                    </label>
                    <div class="col-sm-7">
                        <input
                        :id="`address_${index}`"
                        :name="`addresses[${index}][address]`"
                        class="form-control address-field"
                        type="text"
                        v-model="address.address"
                        />
                    </div>
                    </div>
                    <div v-if="errors.address" class="text-danger small">{{ errors.address }}</div>
                </div>

                <!-- Street Address / PO Box -->
                <div class="col-lg-4">
                    <div class="row align-items-center">
                    <label :for="`poBox_${index}`" class="col-sm-5 col-form-label text-sm-end">
                        Street Address / PO Box
                    </label>
                    <div class="col-sm-7">
                        <input
                        :id="`poBox_${index}`"
                        :name="`addresses[${index}][street_address]`"
                        class="form-control"
                        type="text"
                        v-model="address.street_address"
                        />
                    </div>
                    </div>
                </div>

                                <!-- Is Shipping Address -->
                                <div class="col-lg-4">
                                    <div class="row align-items-center">
                                    <label class="col-sm-5 col-form-label text-sm-end">
                                        Is Shipping Address?
                                    </label>
                                    <div class="col-sm-7 checkbox-align">
                                        <input
                                        class="form-check-input"
                                        type="checkbox"
                                        :name="`addresses[${index}][is_shipping]`"
                                        v-model="address.is_shipping"
                                        style="accent-color: #2ba394;"
                                        />
                                    </div>
                                    </div>
                                </div>
                                <br><br>

                                <!-- Country -->
                                <div class="col-lg-4">
                                    <div class="row align-items-center">
                                    <label :for="`country_${index}`" class="col-sm-5 col-form-label text-sm-end">
                                        Country
                                    </label>
                                    <div class="col-sm-7">
                                        <select
                                        :id="`country_${index}`"
                                        :name="`addresses[${index}][country_id]`"
                                        class="form-select country-field slim-select"
                                        v-model="address.country_id"
                                        >
                                        <option value="">Select Country</option>
                                       <option v-for="country in countries" :key="country.id" :value="country.id">
                                             {{ country.name }}
                                        </option>

                                        </select>
                                    </div>
                                    </div>
                                </div>
                                  <!-- Zip / Postal Code -->
                                <div class="col-lg-4">
                                    <div class="row align-items-center">
                                    <label :for="`zip_${index}`" class="col-sm-5 col-form-label text-sm-end">
                                        Zip / Postal Code
                                    </label>
                                    <div class="col-sm-7">
                                        <input
                                        :id="`zip_${index}`"
                                        :name="`addresses[${index}][zip_code]`"
                                        class="form-control"
                                        type="text"
                                        v-model="address.zip_code"
                                        />
                                    </div>
                                    </div>
                                </div>
                                  <!-- Is Billing Address -->
                    <div class="col-lg-4">
                        <div class="row align-items-center">
                        <label class="col-sm-5 col-form-label text-sm-end">
                            Is Billing Address?
                        </label>
                        <div class="col-sm-7 checkbox-align">
                            <input
                            class="form-check-input"
                            type="checkbox"
                            :name="`addresses[${index}][is_billing]`"
                            v-model="address.is_billing"
                            style="accent-color: #2ba394;"
                            />
                        </div>
                        </div>
                    </div>
                    <br><br>
                    <!-- State / Region -->
                    <div class="col-lg-4">
                        <div class="row align-items-center">
                        <label :for="`state_${index}`" class="col-sm-5 col-form-label text-sm-end">
                            State / Region
                        </label>
                        <div class="col-sm-7">
                            <input
                            :id="`state_${index}`"
                            :name="`addresses[${index}][state]`"
                            class="form-control"
                            type="text"
                            v-model="address.state"
                            />
                        </div>
                        </div>
                    </div>

                <!-- Phone -->
                <div class="col-lg-4">
                    <div class="row align-items-center">
                    <label :for="`phone_${index}`" class="col-sm-5 col-form-label text-sm-end">
                        Phone
                    </label>
                    <div class="col-sm-7">
                        <div class="input-group">
                        <span class="input-group-text country-code" style="padding: 0.1rem 0.8rem;">+971</span>
                        <input
                            :id="`phone_${index}`"
                            :name="`addresses[${index}][phone]`"
                            class="form-control"
                            type="text"
                            v-model="address.phone"
                        />
                        </div>
                    </div>
                    </div>
                </div>
                <!-- Set as primary -->
                <div class="col-lg-4">
                    <div class="row align-items-center">
                    <label class="col-sm-5 col-form-label text-sm-end">
                        Set as primary
                    </label>
                    <div class="col-sm-7 checkbox-align">
                        <input
                        class="form-check-input"
                        type="checkbox"
                        :name="`addresses[${index}][is_primary]`"
                        v-model="address.is_primary"
                        style="accent-color: #2ba394;"
                        />
                    </div>
                    </div>
                </div>
                <br><br>

                                <!-- City -->
                <div class="col-lg-4">
                    <div class="row align-items-center">
                    <label :for="`city_${index}`" class="col-sm-5 col-form-label text-sm-end">
                        City
                    </label>
                    <div class="col-sm-7">
                        <input
                        :id="`city_${index}`"
                        :name="`addresses[${index}][city]`"
                        class="form-control"
                        type="text"
                        v-model="address.city"
                        />
                    </div>
                    </div>
                </div>

                                    <!-- Email -->
                    <div class="col-lg-4">
                        <div class="row align-items-center">
                        <label :for="`email_${index}`" class="col-sm-5 col-form-label text-sm-end">
                            Email
                        </label>
                        <div class="col-sm-7">
                            <input
                            :id="`email_${index}`"
                            :name="`addresses[${index}][email]`"
                            class="form-control"
                            type="email"
                            v-model="address.email"
                            />
                        </div>
                        </div>
                    </div>

                     <!-- Plus & Minus buttons -->
                    <div class="col-lg-4">
                        <div class="row align-items-center">
                            <label class="col-sm-5 col-form-label text-sm-end repeat-label">Additional Address</label>
                                <div class="col-sm-7 d-flex align-items-center addDeleteWrap" style="gap: 10px;">

                                 <span
                                        class="text-success fs-4"
                                        style="cursor: pointer !important;"
                                        v-if="index === form.addresses.length - 1"
                                        @click="addAddress"
                                        >
                                        ➕
                                    </span>

                                    <!-- Show MINUS if more than one -->
                                    <span
                                        v-if="form.addresses.length > 1"
                                        @click="removeAddress(index)"
                                        class="text-danger fs-4"
                                        style="cursor: pointer;"
                                        >
                                        ➖
                                    </span>
                                </div>
                        </div>
                    </div>
                </div>

                <br>
            <div class="section-header">Bank Account</div>
                <div id="bank-errors" class="error-message form-section-error"></div>
                   <div id="bankGroup">
                            <div
                                v-for="(bank, index) in form.bank_accounts"
                                :key="index"
                                class="row g-3 px-3 mb-4 repeat-item m-0"
                            >
                        <!-- Account Holder Name -->
                        <div class="col-lg-4 mb-2">
                        <div class="row align-items-center">
                            <label
                            :for="`acctName_${index}`"
                            class="col-sm-5 col-form-label text-sm-end"
                            >
                            Account Holder Name
                            </label>
                            <div class="col-sm-7">
                            <input
                                type="text"
                                :id="`acctName_${index}`"
                                class="form-control acct-name-field"
                                :name="`bank_accounts[${index}][account_holder_name]`"
                                v-model="bank.account_holder_name"
                            />
                            </div>
                        </div>
                        </div>
                          <!-- Country -->
                        <div class="col-lg-4 mb-2">
                        <div class="row align-items-center">
                            <label :for="`country2_${index}`" class="col-sm-5 col-form-label text-sm-end">Country</label>
                            <div class="col-sm-7">
                            <select
                                :id="`country2_${index}`"
                                :name="`bank_accounts[${index}][country_id]`"
                                class="form-select slim-select"
                                v-model="bank.country_id"
                            >
                                <option value="">Select Country</option>
                               <option v-for="country in countries" :key="country.id" :value="country.id">
                                             {{ country.name }}
                                        </option>
                            </select>
                            </div>
                        </div>
                        </div>
                          <!-- Currency -->
                        <div class="col-lg-4 mb-2">
                        <div class="row align-items-center">
                            <label :for="`currency_${index}`" class="col-sm-5 col-form-label text-sm-end">Currency</label>
                            <div class="col-sm-7">
                            <select
                                :id="`currency_${index}`"
                                :name="`bank_accounts[${index}][currency]`"
                                class="form-select slim-select"
                                v-model="bank.currency"
                            >
                                <option value="AED">AED</option>
                            </select>
                            </div>
                        </div>
                        </div>
                <!-- Bank Name -->
                    <div class="col-lg-4 mb-2">
                    <div class="row align-items-center">
                        <label :for="`bankName_${index}`" class="col-sm-5 col-form-label text-sm-end">Bank Name</label>
                        <div class="col-sm-7">
                        <input
                            type="text"
                            :id="`bankName_${index}`"
                            class="form-control bank-name-field"
                            :name="`bank_accounts[${index}][bank_name]`"
                            v-model="bank.bank_name"
                        >
                        </div>
                    </div>
                    </div>
                <!-- IBAN -->
                <div class="col-lg-4 mb-2">
                <div class="row align-items-center">
                    <label :for="`iban_${index}`" class="col-sm-5 col-form-label text-sm-end">IBAN / Account Number</label>
                    <div class="col-sm-7">
                    <input
                        type="text"
                        :id="`iban_${index}`"
                        class="form-control iban-field"
                        :name="`bank_accounts[${index}][iban_account_number]`"
                        v-model="bank.iban_account_number"
                    >
                    </div>
                </div>
                </div>
            <!-- Remarks -->
                <div class="col-lg-4 mb-2">
                <div class="row align-items-center">
                    <label :for="`remarks_${index}`" class="col-sm-5 col-form-label text-sm-end">Notes / Remarks</label>
                    <div class="col-sm-7">
                    <input
                        type="text"
                        :id="`remarks_${index}`"
                        class="form-control"
                        :name="`bank_accounts[${index}][remarks]`"
                        v-model="bank.remarks"
                    >
                    </div>
                </div>
                </div>

                <!-- Branch Name -->
                <div class="col-lg-4 mb-2">
                <div class="row align-items-center">
                    <label :for="`branch_${index}`" class="col-sm-5 col-form-label text-sm-end">Branch Name</label>
                    <div class="col-sm-7">
                    <input
                        type="text"
                        :id="`branch_${index}`"
                        class="form-control"
                        :name="`bank_accounts[${index}][branch_name]`"
                        v-model="bank.branch_name"
                    >
                    </div>
                </div>
                </div>

                 <!-- SWIFT -->
                <div class="col-lg-4 mb-2">
                <div class="row align-items-center">
                    <label :for="`swift_${index}`" class="col-sm-5 col-form-label text-sm-end">SWIFT / BIC Code</label>
                    <div class="col-sm-7">
                    <input
                        type="text"
                        :id="`swift_${index}`"
                        class="form-control"
                        :name="`bank_accounts[${index}][swift_bic]`"
                        v-model="bank.swift_bic"
                    >
                    </div>
                </div>
                </div>

                  <!-- Documents -->
                <div class="col-lg-4 mb-2">
                <div class="row align-items-center">
                    <label class="col-sm-5 col-form-label text-sm-end">Documents</label>
                    <div class="col-sm-7 formbold-file-input">
                    <input
                        type="file"
                        :id="`fileBank_${index}`"
                        :name="`bank_accounts[${index}][documents][]`"
                        class="d-none file-uploader"
                        multiple
                        accept=".pdf,.jpg,.jpeg,.png,.webp"
                        @change="onBankDocsChange($event, index)"
                    >
                    <label :for="`fileBank_${index}`" class="upload-icon-label">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                    <path
                                        d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                </svg>
                        <span>Upload</span>
                    </label>
                    <div :id="`prevBank_${index}`" class="preview-wrap" style="display:none;margin-top:10px"></div>
                    </div>
                </div>
                </div>

                  <!-- Set as primary -->
                <div class="col-lg-4 mb-2">
                <div class="row align-items-center">
                    <label class="col-sm-5 col-form-label text-sm-end">Set as primary</label>
                    <div class="col-sm-7 checkbox-align">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        :name="`bank_accounts[${index}][is_primary]`"
                        v-model="bank.is_primary"
                        style="accent-color: #2ba394;"
                    >
                    </div>
                </div>
                </div>

        <!-- Add / Remove icons -->
        <div class="col-lg-4 mb-2">
          <div class="row align-items-center">
            <label class="col-sm-5 col-form-label text-sm-end repeat-label">
              Add / Remove Accounts
            </label>
            <div
              class="col-sm-7 d-flex align-items-center addDeleteWrap"
              style="gap: 10px;"
            >
              <!-- only on last row -->
              <span
                class="text-success fs-4"
                style="cursor: pointer;"
                v-if="index === form.bank_accounts.length - 1"
                @click="addBankAccount"
              >
                ➕
              </span>
              <!-- on any row when >1 rows -->
              <span
                class="text-danger fs-4"
                style="cursor: pointer;"
                v-if="form.bank_accounts.length > 1"
                @click="removeBankAccount(index)"
              >
                ➖
              </span>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end #bankGroup -->
             <div class="section-header">Contact Person</div>
            <div id="contact-errors" class="error-message form-section-error"></div>
             <div id="contactGroup">
                    <div
                        v-for="(contact, index) in form.contact_persons"
                        :key="index"
                        class="row g-3 px-3 mb-4 repeat-item m-0"
                    >

                      <!-- Full Name -->
                    <div class="col-lg-4 mb-2">
                    <div class="row align-items-center">
                        <label
                        :for="`fullName_${index}`"
                        class="col-sm-5 col-form-label text-sm-end"
                        >
                        Full Name
                        </label>
                        <div class="col-sm-7">
                        <input
                            type="text"
                            :id="`fullName_${index}`"
                            class="form-control full-name-field"
                            :name="`contact_persons[${index}][full_name]`"
                            v-model="contact.full_name"
                        />
                        </div>
                    </div>
                    </div>
                     <!-- Country -->
                        <div class="col-lg-4 mb-2">
                        <div class="row align-items-center">
                            <label
                            :for="`country3_${index}`"
                            class="col-sm-5 col-form-label text-sm-end"
                            >
                            Country
                            </label>
                            <div class="col-sm-7">
                            <select
                                :id="`country3_${index}`"
                                :name="`contact_persons[${index}][country_id]`"
                                class="form-select contact-country-field slim-select"
                                v-model="contact.country_id"
                            >
                                <option value="">Select Country</option>
                                <option v-for="country in countries" :key="country.id" :value="country.id">
                                             {{ country.name }}
                                        </option>
                            </select>
                            </div>
                        </div>
                        </div>
                         <!-- Department -->
                        <div class="col-lg-4 mb-2">
                        <div class="row align-items-center">
                            <label
                            :for="`dept_${index}`"
                            class="col-sm-5 col-form-label text-sm-end"
                            >
                            Department
                            </label>
                            <div class="col-sm-7">
                            <input
                                type="text"
                                :id="`dept_${index}`"
                                class="form-control"
                                :name="`contact_persons[${index}][department]`"
                                v-model="contact.department"
                            />
                            </div>
                        </div>
                        </div>
                         <!-- Designation -->
                        <div class="col-lg-4 mb-2">
                        <div class="row align-items-center">
                            <label
                            :for="`designation_${index}`"
                            class="col-sm-5 col-form-label text-sm-end"
                            >
                            Designation
                            </label>
                            <div class="col-sm-7">
                            <input
                                type="text"
                                :id="`designation_${index}`"
                                class="form-control"
                                :name="`contact_persons[${index}][designation]`"
                                v-model="contact.designation"
                            />
                            </div>
                        </div>
                        </div>
                         <!-- Phone -->
                <div class="col-lg-4 mb-2">
                <div class="row align-items-center">
                    <label
                    :for="`phone2_${index}`"
                    class="col-sm-5 col-form-label text-sm-end"
                    >
                    Phone
                    </label>
                    <div class="col-sm-7">
                    <div class="input-group">
                        <span class="input-group-text contactPerson_country-code"
                        >{{ contact.country_code || '+' }}</span
                        >
                        <input
                        type="text"
                        :id="`phone2_${index}`"
                        :name="`contact_persons[${index}][phone]`"
                        class="form-control phone-field"
                        v-model="contact.phone"
                        />
                    </div>
                    </div>
                </div>
                </div>

            <!-- Set as primary -->
                    <div class="col-lg-4 mb-2">
                    <div class="row align-items-center">
                        <label class="col-sm-5 col-form-label text-sm-end">
                        Set as primary
                        </label>
                        <div class="col-sm-7 checkbox-align">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            :name="`contact_persons[${index}][is_primary]`"
                            v-model="contact.is_primary"
                            style="accent-color: #2ba394;"
                        />
                        </div>
                    </div>
                    </div>
                    <br><br>
                     <!-- Email -->
                    <div class="col-lg-4 mb-2">
                    <div class="row align-items-center">
                        <label
                        :for="`email2_${index}`"
                        class="col-sm-5 col-form-label text-sm-end"
                        >
                        Email
                        </label>
                        <div class="col-sm-7">
                        <input
                            type="email"
                            :id="`email2_${index}`"
                            class="form-control contact-email-field"
                            :name="`contact_persons[${index}][email]`"
                            v-model="contact.email"
                        />
                        </div>
                    </div>
                    </div>
                    <!-- Alternate Phone -->
                    <div class="col-lg-4 mb-2">
                    <div class="row align-items-center">
                        <label
                        :for="`altPhone_${index}`"
                        class="col-sm-5 col-form-label text-sm-end"
                        >
                        Alternate Phone
                        </label>
                        <div class="col-sm-7">
                        <input
                            type="text"
                            :id="`altPhone_${index}`"
                            class="form-control"
                            :name="`contact_persons[${index}][alternate_phone]`"
                            v-model="contact.alternate_phone"
                        />
                        </div>
                    </div>
                    </div>
                      <!-- Add / Remove icons -->
                    <div class="col-lg-4 mb-2">
                    <div class="row align-items-center">
                        <label class="col-sm-5 col-form-label text-sm-end repeat-label">
                        Additional Contact
                        </label>
                        <div
                        class="col-sm-7 d-flex align-items-center addDeleteWrap"
                        style="gap: 10px;"
                        >
                        <span
                            v-if="index === form.contact_persons.length - 1"
                            @click="addContactPerson"
                            class="text-success fs-4"
                            style="cursor: pointer;"
                        >
                            ➕
                        </span>
                        <span
                            v-if="form.contact_persons.length > 1"
                            @click="removeContactPerson(index)"
                            class="text-danger fs-4"
                            style="cursor: pointer;"
                        >
                            ➖
                        </span>
                        </div>
                    </div>
                    </div>


                    </div>


                </div>
             <div class="d-flex justify-content-end px-3 mb-4">
                <button type="submit" class="btn btn-submit">Submit</button>
            </div>
      </form>
    </div>
  </AppLayout>
</template>

<script setup>
import { reactive } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import '../../../../css/style.css'
import { router } from '@inertiajs/vue3'
import { ref } from 'vue'
import { usePage } from '@inertiajs/vue3'

const props = defineProps({
  errors: Object,
  countries:Array

});

const form = reactive({
    company: {
    name: '',
    vat: '',
    customer_source: '',      // ✅ must match v-model
    customer_code: '12345',   // ✅ must match v-model
    website: '',
    customer_type: 'NO RESPONSE',
    industry_type: 'large',
    customer_category: 'regular',
    customer_industry: 'manufacturing',
    document_type: '',        // ✅ must match v-model
    logo: null,
    documents: []             // ✅ files
  },

  // your existing addresses repeater
  addresses: [
    { address: '' ,
    street_address:'',
    is_shipping:'',
    country_id:'',
   is_billing:'',
    zip_code: '',
    state:'',
    phone:'',
    is_primary:'',
    email:'',
    documents: [],

    }
  ],

  // your new bank_accounts repeater
  bank_accounts: [
    {
      account_holder_name: '',
      country_id: '',
      currency: '',
      bank_name: '',
      iban_account_number: '',
      remarks: '',
      branch_name: '',
      swift_bic: '',
      is_primary: false,
      documents: []
    }
  ],
  contact_persons: [
    {
      full_name: '',
      country_id: '',
      country_code: '',
      department: '',
      designation: '',
      phone: '',
      is_primary: false,
      email: '',
      alternate_phone: ''
    }
  ]
})

const logoPreview = ref(null)
const docPreviews = ref([])
const bankDocsPreviews = ref(form.bank_accounts.map(() => []))

function onLogoChange(e) {
  const file = e.target.files[0]
  form.company.logo = file
  if (file) {
    logoPreview.value = URL.createObjectURL(file)
  } else {
    logoPreview.value = null
  }
}

function removeLogo() {
  form.company.logo = null
  logoPreview.value = null
}

function onDocsChange(e) {
  const files = Array.from(e.target.files)
  form.company.documents = files
  docPreviews.value = files
}

function clearDocs() {
  form.company.documents = []
  docPreviews.value = []
}
function onBankDocsChange(e, index) {
  const files = Array.from(e.target.files)
  form.bank_accounts[index].documents = files

  // Clean previews first
  bankDocsPreviews.value[index] = []

  files.forEach(file => {
    bankDocsPreviews.value[index].push({
      name: file.name,
      url: URL.createObjectURL(file)
    })
  })
}


function addAddress() {
  form.addresses.push({ address: '' ,

  })
}

function removeAddress(index) {
  if (form.addresses.length > 1) {
    form.addresses.splice(index, 1)
  }
}

function addBankAccount() {
  form.bank_accounts.push({
    account_holder_name: '',
    country_id: '',
    currency: '',
    bank_name: '',
    iban_account_number: '',
    remarks: '',
    branch_name: '',
    swift_bic: '',
    is_primary: false,
    documents: []
  })
}

function removeBankAccount(index) {
  if (form.bank_accounts.length > 1) {
    form.bank_accounts.splice(index, 1)
  }
}
function addContactPerson() {
  form.contact_persons.push({
    full_name: '',
    country_id: '',
    country_code: '',
    department: '',
    designation: '',
    phone: '',
    is_primary: false,
    email: '',
    alternate_phone: ''
  })
}

function removeContactPerson(index) {
  if (form.contact_persons.length > 1) {
    form.contact_persons.splice(index, 1)
  }
}
// form submission

function submitForm() {
  const formData = new FormData()

  // Company fields
  formData.append('company_name', form.company.name)
  formData.append('vat_tax_id', form.company.vat)
  formData.append('customer_source', form.company.customer_source)
  formData.append('website', form.company.website)
   formData.append('customer_code', form.company.customer_code)
  formData.append('customer_type', form.company.customer_type)
  formData.append('industry_type', form.company.industry_type)
  formData.append('customer_category', form.company.customer_category)
  formData.append('customer_industry', form.company.customer_industry)
  formData.append('document_type', form.company.document_type)
  form.company.documents.forEach(file => {
  formData.append('documents[]', file)
})

  // Logo file
  if (form.company.logo) {
    formData.append('logo', form.company.logo)
  }

  // Company documents
  if (form.company.documents.length) {
    form.company.documents.forEach(file => {
      formData.append('company_documents[]', file)
    })
  }

  // Addresses
  form.addresses.forEach((address, i) => {
    for (const [key, value] of Object.entries(address)) {
      formData.append(`addresses[${i}][${key}]`, value ?? '')
    }
  })

  // Bank accounts
  form.bank_accounts.forEach((bank, i) => {
    for (const [key, value] of Object.entries(bank)) {
      if (key === 'documents') {
        if (value.length) {
          value.forEach(file => {
            formData.append(`bank_accounts[${i}][documents][]`, file)
          })
        }
      } else {
        formData.append(`bank_accounts[${i}][${key}]`, value ?? '')
      }
    }
  })

  // Contact persons
  form.contact_persons.forEach((person, i) => {
    for (const [key, value] of Object.entries(person)) {
      formData.append(`contact_persons[${i}][${key}]`, value ?? '')
    }
  })

  router.post('/customers', formData)
}

</script>

<style>
.page-title {
  font-weight: 600;
  margin: 1.5rem 0 0.75rem;
}

.error-message {
  color: #dc3545;
  font-size: 0.875rem;
  margin-top: 0.25rem;
  display: none;
}

.form-section-error {
  border: 1px solid #dc3545;
  padding: 0.5rem;
  margin-bottom: 1rem;
  background-color: #f8d7da;
  border-radius: 0.25rem;
}

.col-form-label {
  padding: 0px !important;
}

.section-header {
  background-color: #e0e0e0;
  padding: 0.75rem 1rem;
  font-weight: 600;
  font-size: 1rem;
  margin-bottom: 1rem;
}
.upload-icon-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        background-color: #f8f9fa;
        border: 1px dashed #ccc;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
     .upload-text {
            color: #555;
            font-weight: 500;
        }

        .form-wrapper {
            border: 1px solid #ccc;
            border-radius: .25rem;
            margin-bottom: 2rem;
        }
        .slim-select {
            height: 35px;
            border: 1px solid #ddd; /* lighter grey border */
            font-size: 0.9rem;      /* optional: smaller text */
            border-radius: 4px;     /* optional: consistent radius */
            padding: 0.25rem 0.5rem; /* adjust padding if needed */
            background-color: #fff; /* keep default background */
        }
        .btn-submit{
            background-color:rgb(77, 201, 176);
        }
</style>
