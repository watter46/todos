<template>
    <div class="container">
        <div id="nav">
          <router-link :to="{name: 'task-list'}">Todo</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: 'main-component'
    }
</script>
