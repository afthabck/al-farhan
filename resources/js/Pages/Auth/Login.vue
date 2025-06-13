<template>
    <div class="login-wrapper" :style="backgroundStyle">
      <div class="login-content py-32 px-24">
        <div class="login-form-container max-w-464-px mx-auto w-100">
          <div class="logo-container">
            <img :src="logoUrl" alt="Portal Logo" class="light-logo">
            <p class="welcome-text mb-32">Welcome back! Please enter your details</p>
          </div>
  
          <div v-if="errorMessage" class="alert alert-danger">
            {{ errorMessage }}
          </div>
  
          <form @submit.prevent="handleSubmit" class="login-form">
            <div class="input-group mb-16 position-relative">
              <div class="input-wrapper d-flex align-items-start position-relative">
                <span class="input-icon position-absolute">
                  <iconify-icon icon="mage:user"></iconify-icon>
                </span>
                <input
                  type="text"
                  v-model="form.username"
                  class="form-input form-control h-56-px bg-neutral-50 radius-12"
                  :class="{ 'is-invalid': errors.username }"
                  placeholder="Username"
                  autocomplete="off"
                  autofocus
                  style="padding-left: 2.5rem;"
                >
              </div>
              <span v-if="errors.username" class="invalid-feedback d-block">
                <strong>{{ errors.username }}</strong>
              </span>
            </div>
  
            <div class="input-group position-relative mb-20">
              <div class="input-wrapper icon-field position-relative">
                <span class="input-icon position-absolute" style="top: 16px;">
                  <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                </span>
                <input
                  :type="showPassword ? 'text' : 'password'"
                  v-model="form.password"
                  class="form-input form-control h-56-px bg-neutral-50 radius-12"
                  :class="{ 'is-invalid': errors.password }"
                  id="password"
                  placeholder="Password"
                  style="padding-left: 2.5rem;"
                >
                <span
                  class="password-toggle toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                  style="top:30px !important;"
                  @click="showPassword = !showPassword"
                ></span>
              </div>
              <span v-if="errors.password" class="invalid-feedback d-block">
                <strong>{{ errors.password }}</strong>
              </span>
            </div>
  
            <button
              type="submit"
              class="submit-button btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"
              :disabled="isSubmitting"
            >
              <span v-if="isSubmitting">Signing In...</span>
              <span v-else>Sign In</span>
            </button>
          </form>
        </div>
      </div>
      <div class="footer-image col-md-12">
        <img :src="groupImageUrl" style="width: 50%;" alt="Group Banner" class="login-banner">
      </div>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import axios from 'axios';
  
  export default {
    name: 'LoginPage',
    setup() {
      const form = ref({
        username: '',
        password: ''
      });
  
      const errors = ref({
        username: '',
        password: '',
        login_failed: ''
      });
  
      const errorMessage = ref('');
      const isSubmitting = ref(false);
      const showPassword = ref(false);
  
      const backgroundStyle = ref({
        background: "url('/assets/images/portal_bg.jpg')",
        backgroundSize: 'contain',
        backgroundPosition: 'center',
        backgroundRepeat: 'no-repeat'
      });
  
      const logoUrl = ref('/assets/images/logo_portal.png');
      const groupImageUrl = ref('/assets/images/group.png');
  
      const handleSubmit = async () => {
        isSubmitting.value = true;
        errorMessage.value = '';
        errors.value = { username: '', password: '', login_failed: '' };
  
        try {
          const response = await axios.post('/login', {
            username: form.value.username,
            password: form.value.password
          });
  
          // Handle successful login
          if (response.data.redirect) {
            window.location.href = response.data.redirect;
          }
        } catch (error) {
          if (error.response) {
            if (error.response.data.errors) {
              errors.value = error.response.data.errors;
            } else if (error.response.data.message) {
              errorMessage.value = error.response.data.message;
            }
          } else {
            errorMessage.value = 'An error occurred. Please try again.';
          }
        } finally {
          isSubmitting.value = false;
        }
      };
  
      return {
        form,
        errors,
        errorMessage,
        isSubmitting,
        showPassword,
        backgroundStyle,
        logoUrl,
        groupImageUrl,
        handleSubmit
      };
    }
  };
  </script>
  
  <style scoped>
  /* Base styles */
  .login-wrapper {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }
  
  .login-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  
  .login-form-container {
    max-width: 464px;
    width: 100%;
    margin: 0 auto;
  }
  
  /* Logo and welcome text */
  .logo-container {
    text-align: center;
    margin-bottom: 2rem;
  }
  
  .light-logo {
    display: block;
    margin: 0 auto;
    margin-bottom: 1rem;
  }
  
  .welcome-text {
    color: #6c757d;
    font-size: 1.125rem;
    text-align: center;
    margin-bottom: 2rem;
  }
  
  /* Form elements */
  .input-group {
    margin-bottom: 1rem;
    position: relative;
  }
  
  .input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
  }
  
  .form-input {
    width: 100%;
    height: 56px;
    padding: 0.5rem 1rem 0.5rem 2.5rem;
    border: 1px solid #ced4da;
    border-radius: 12px;
    font-size: 1rem;
    background-color: #f8f9fa;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }
  
  .form-input:focus {
    outline: none;
    border-color: #86b7fe;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
  }
  
  .input-icon {
    position: absolute;
    left: 1rem;
    color: #6c757d;
    font-size: 1.25rem;
    z-index: 2;
  }
  
  .password-toggle {
    position: absolute;
    right: 1rem;
    color: #6c757d;
    cursor: pointer;
    font-size: 1.25rem;
    z-index: 2;
  }
  
  /* Error states */
  .is-invalid {
    border-color: #dc3545 !important;
  }
  
  .invalid-feedback {
    display: block;
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
  }
  
  .alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
  }
  
  /* Button styles */
  .submit-button {
    width: 100%;
    height: 56px;
    padding: 0.75rem 1rem;
    border: none;
    border-radius: 12px;
    background-color: #0d6efd;
    color: white;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.15s ease-in-out;
  }
  
  .submit-button:hover {
    background-color: #0b5ed7;
  }
  
  .submit-button:disabled {
    background-color: #86b7fe;
    cursor: not-allowed;
    opacity: 0.7;
  }
  
  /* Footer image */
  .footer-image {
    text-align: center;
    padding: 1rem;
  }
  
  .login-banner {
    max-width: 50%;
    height: auto;
  }
  
  /* Utility classes */
  .d-flex {
    display: flex;
  }
  
  .align-items-start {
    align-items: flex-start;
  }
  
  .position-relative {
    position: relative;
  }
  
  .position-absolute {
    position: absolute;
  }
  
  .text-secondary-light {
    color: #6c757d;
  }
  
  .radius-12 {
    border-radius: 12px;
  }
  
  .h-56-px {
    height: 56px;
  }
  
  .bg-neutral-50 {
    background-color: #f8f9fa;
  }
  
  .w-100 {
    width: 100%;
  }
  
  .mb-16 {
    margin-bottom: 1rem;
  }
  
  .mb-20 {
    margin-bottom: 1.25rem;
  }
  
  .mb-32 {
    margin-bottom: 2rem;
  }
  
  .mt-32 {
    margin-top: 2rem;
  }
  
  .py-32 {
    padding-top: 2rem;
    padding-bottom: 2rem;
  }
  
  .px-24 {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
  }
  
  .max-w-464-px {
    max-width: 464px;
  }
  
  .mx-auto {
    margin-left: auto;
    margin-right: auto;
  }
  
  /* Responsive styles */
  @media (max-width: 500px) {
    .login-wrapper {
      padding: 0 22px 0 22px !important;
    }
    
    .login-content {
      padding: 1.5rem;
    }
    
    .light-logo {
      max-width: 150px;
    }
    
    .welcome-text {
      font-size: 1rem;
    }
    
    .login-banner {
      max-width: 70%;
    }
  }
  </style>