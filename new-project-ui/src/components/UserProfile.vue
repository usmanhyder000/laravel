<template>
  <div>
    <h1>Edit Profile</h1>
    <!-- Form for updating user profile -->
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      picture: null,
    }
  },
  methods: {
    updateProfile() {
      // Send PUT request to update user profile
    }
  }
}
</script>
