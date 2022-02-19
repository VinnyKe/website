<template>
    <div class="content">
        <h1>Hello there !</h1>
    </div>
</template>

<script>export default {
    mounted() {
        console.log('Mounted');
    },
    created() {
    },

    props: {
    },

    data() {
        return {
        }
    },

    computed: {
    },

    methods: {
    },
}
</script>

<style lang="scss" scoped>
.myvars {
    //Default
    color: rgb(201, 241, 255);
    color: rgb(5, 185, 252);
    color: rgb(250, 221, 6);

    //Dark
    color: rgb(201, 241, 255);
    color: rgb(3, 158, 214);
    color: rgb(233, 207, 14);
}
</style>
