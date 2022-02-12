<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <router-link class="navbar-brand" to="/">Vinny's Place</router-link>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" v-for="route in routes" :key="route.name">
                    <router-link class="nav-link" :to="route.path">
                        {{ route.name }}
                    </router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
import router from '../routes.js';

export default {
    data() {
        return {
            routes: null,
        }
    },
    mounted() {
        this.routes = router['options']['routes'];
    }
}
</script>

<style>
    .container {
        justify-content: flex-start !important;
    }

    .navbar-nav {
        font-size: 20px;
    }

    .navbar-brand {
        font-size: 30px;
    }
</style>
