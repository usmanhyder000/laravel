<template>
  <div>
    <h1>Contacts</h1>
    <!-- List of contacts -->
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      contacts: [],
    }
  },
  mounted() {
    this.fetchContacts();
  },
  methods: {
    fetchContacts() {
      // Send GET request to fetch contacts
    }
  }
}
</script>
