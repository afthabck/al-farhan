<template>
  <AppLayout>

    <!-- Breadcrumb -->
        <nav class="text-sm text-gray-600 mb-4" aria-label="Breadcrumb">
        <ol class="list-reset flex">
            <li><a href="#" class="text-indigo-600 hover:underline">Home</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-800 font-semibold">Supply Management</li>
        </ol>
        </nav>
        <!-- Create Supplier Form -->
        <form @submit.prevent="submitSupplierForm" class="bg-white border border-gray-200 rounded-lg shadow">
            <div class="p-6 bg-white rounded-lg shadow">
                <!-- Supplier Card -->
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                        <!-- Card Title -->
                        <!-- Title (white background) -->
                            <div class="bg-white px-6 py-4 border-b border-gray-200">
                                <h2 class="text-base font-medium text-gray-800">CREATE NEW SUPPLIER</h2>
                            </div>
                        <!-- Card Content -->
                        <!-- Subtitle (ash background) -->
                            <div class="bg-gray-200 px-6 py-3">
                                <h3 class="text-base font-medium text-gray-700">Basic Information</h3>
                            </div>
                         <!-- Form Content -->
                                <div class="p-6">
                                    <div class="grid grid-cols-3 gap-6 items-center">
                                        <!-- Supplier Name -->
                                        <div class="flex items-center">
                                            <label for="supplier_name" class="w-28 text-sm font-medium text-gray-700">Supplier Name</label>
                                            <input
                                            type="text"
                                            id="supplier_name"
                                            v-model="form.supplier_name"
                                            required
                                            class="flex-1 px-3 py-2 ml-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                            placeholder="Enter name"
                                            >
                                        </div>

                                        <!-- Designation -->
                                        <div class="flex items-center">
                                            <label for="designation" class="w-24 text-sm font-medium text-gray-700">Designation</label>
                                            <input
                                            type="text"
                                            id="designation"
                                            v-model="form.designation"
                                            required
                                            class="flex-1 px-3 py-2 ml-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                            placeholder="Enter designation"
                                            >
                                        </div>

                                        <!-- Email Address -->
                                        <div class="flex items-center">
                                            <label for="email" class="w-24 text-sm font-medium text-gray-700">Email</label>
                                            <input
                                            type="email"
                                            id="email"
                                            v-model="form.email"
                                            required
                                            class="flex-1 px-3 py-2 ml-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                            placeholder="Enter email"
                                            >
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="p-6">
                                    <div class="grid grid-cols-3 gap-6 items-center">
                                        <!-- Supplier Name -->
                                        <div class="flex items-center">
                                            <label for="supplier_name_arabic" class="w-28 text-sm font-medium text-gray-700">Supplier Name(Arabic)</label>
                                            <input
                                            type="text"
                                            id="supplier_name_arabic"
                                            v-model="form.supplier_name_arabic"
                                            required
                                            class="flex-1 px-3 py-2 ml-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                            placeholder="Enter name"
                                            >
                                        </div>

                                        <!-- Phone Number-->
                                        <div class="flex items-center">
                                            <!-- Label -->
                                            <label for="phone_number" class="w-32 text-sm font-medium text-gray-700">Phone Number</label>

                                            <!-- Dropdown + Input Group -->
                                            <div class="flex flex-1 items-center ml-2 space-x-2">
                                                <!-- Country Code Dropdown -->
                                                <select
                                                v-model="form.country_code"
                                                class="w-24 px-2 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                                >
                                                <option value="+973">+973</option>
                                                <option value="+91">+91</option>
                                                <option value="+1">+1</option>
                                                </select>

                                                <!-- Phone Number Input -->
                                               <input
                                                    type="number"
                                                    id="phone_number"
                                                    v-model="form.phone_number"
                                                    required
                                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                                    placeholder="Enter phone number"
                                                    >
                                            </div>
                                        </div>


                                        <!-- Web-->
                                        <div class="flex items-center">
                                            <label for="web" class="w-24 text-sm font-medium text-gray-700">Web</label>
                                            <input
                                            type="web"
                                            id="web"
                                            v-model="form.web"
                                            required
                                            class="flex-1 px-3 py-2 ml-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                            placeholder="Enter web"
                                            >
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="p-6">
                                    <div class="grid grid-cols-3 gap-6 items-center">
                                        <!-- Supplier code/Id -->
                                        <div class="flex items-center">
                                            <label for="supplier_code" class="w-28 text-sm font-medium text-gray-700">Supplier Code/ID</label>
                                            <input
                                            type="text"
                                            id="supplier_code"
                                            v-model="form.supplier_code"
                                            required
                                            class="flex-1 px-3 py-2 ml-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                            placeholder="Enter Supplier Code/ID"
                                            >
                                        </div>

                                        <!-- Alternate contact number-->
                                        <div class="flex items-center">
                                            <!-- Label -->
                                            <label for="alternate_contact_number" class="w-32 text-sm font-medium text-gray-700">Alternate Contact Number </label>

                                            <!-- Dropdown + Input Group -->
                                            <div class="flex flex-1 items-center ml-2 space-x-2">
                                                <!-- Country Code Dropdown -->
                                                <select
                                                v-model="form.country_code"
                                                class="w-24 px-2 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                                >
                                                <option value="+973">+973</option>
                                                <option value="+91">+91</option>
                                                <option value="+1">+1</option>
                                                </select>

                                                <!-- Phone Number Input -->
                                               <input
                                                    type="number"
                                                    id="alternate_contact_number"
                                                    v-model="form.alternate_contact_number"
                                                    required
                                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                                    placeholder="Enter Alternate Contact Number"
                                                    >
                                            </div>
                                        </div>

                                                <!-- Logo-->
                                        <div class="flex items-center">
                                            <!-- Label -->
                                            <label for="logo" class="w-24 text-sm font-medium text-gray-700">Logo</label>

                                            <!-- File Input -->
                                                <div class="flex-1 ml-2">
                                                    <input
                                                    type="file"
                                                    id="logo"
                                                    @change="handleLogoUpload"
                                                    accept="image/*"
                                                    class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                                    >
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            <!--  -->
                              <div class="p-6">
                                    <div class="grid grid-cols-3 gap-6 items-center">
                                        <!-- Contact Person Name -->
                                        <div class="flex items-center">
                                            <label for="contact_person_name" class="w-28 text-sm font-medium text-gray-700">Contact Person Name</label>
                                            <input
                                            type="text"
                                            id="contact_person_name"
                                            v-model="form.contact_person_name"
                                            required
                                            class="flex-1 px-3 py-2 ml-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                            placeholder="Enter Contact Person Name"
                                            >
                                        </div>

                                        <!-- Whats app Number -->
                                        <div class="flex items-center">
                                            <!-- Label -->
                                            <label for="whats_app_number" class="w-32 text-sm font-medium text-gray-700">Whats App Number</label>

                                            <!-- Dropdown + Input Group -->
                                            <div class="flex flex-1 items-center ml-2 space-x-2">
                                                <!-- Country Code Dropdown -->
                                                <select
                                                v-model="form.whats_app_number"
                                                class="w-24 px-2 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                                >
                                                <option value="+973">+973</option>
                                                <option value="+91">+91</option>
                                                <option value="+1">+1</option>
                                                </select>

                                                <!-- Phone Number Input -->
                                               <input
                                                    type="number"
                                                    id="whats_app_number"
                                                    v-model="form.whats_app_number"
                                                    required
                                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                                    placeholder="Enter Whats app number"
                                                    >
                                            </div>
                                        </div>

                                        <!-- Mark as primary -->
                                        <div class="flex items-center">
                                            <label for="primary" class="w-28 text-sm font-medium text-gray-700">Mark as Primary</label>

                                            <input
                                                type="checkbox"
                                                id="primary"
                                                v-model="form.primary"
                                                class="w-5 h-5 ml-2 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                            >
                                            </div>
                                    </div>
                                </div>
                                <!--  -->
                            <div class="p-6">
                                <div class="flex items-center space-x-2">
                                    <label class="text-sm font-medium text-gray-700">Multiple Contact</label>

                                    <button
                                    type="button"
                                    @click="addContact"
                                    class="text-white bg-red-600 hover:bg-red-700 font-bold py-1 px-3 rounded-full text-lg leading-none"
                                    >
                                    +
                                    </button>
                                </div>

                            </div>


                    </div>
                </div>

            </form>
  </AppLayout>
</template>

<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import '../../../css/style.css';

const form = ref({
  item_name: '',
  quantity: '',
  supplier: '',
  date_received: ''
});

const submitForm = () => {
  console.log('Form submitted:', form.value);
  // Add your form submission logic here
  // Example: Inertia.post('/supplies', form.value)
};
</script>

<style scoped>
/* Add any custom styles here */
.debug-content {
  margin-bottom: 1.5rem;
}
</style>
