<template>
    <div class="content-wrapper">
        <h1>Hello</h1>
    </div>
</template>

<script>
export default {
    created() {
        axios.get('/google-sheet').then(response => this.data=response.data);
    },

    data() {
        return {
            data: null,
        }
    }
}
</script>

<style lang="scss">

</style>
