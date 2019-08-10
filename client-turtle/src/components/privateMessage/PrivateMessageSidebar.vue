<template>
    <ul class="nav nav-pills nav-stacked PrivateMessage-Sidebar">
        <li><router-link :to="{name: 'new-pm'}">Send PM</router-link></li>
        <li><router-link :to="{name: 'my-pms'}">Inbox</router-link></li>
        <li><router-link :to="{name: 'sent-pms'}">Sent</router-link></li>
    </ul>
</template>

<script>
export default {
  name: 'PrivateMessageSidebar'
}
</script>

<style scoped>

</style>
