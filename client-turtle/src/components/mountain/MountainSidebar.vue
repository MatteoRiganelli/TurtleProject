<template>
    <ul class="nav nav-pills nav-stacked PrivateMessage-Sidebar">
        <li><router-link :to="{name: 'mountain-list'}">Moutain List</router-link></li>
        <li><router-link :to="{name: 'mountain-insert'}">Insert</router-link></li>
    </ul>
</template>

<script>
export default {
  name: 'MountainSidebar'
}
</script>

<style scoped>

</style>
