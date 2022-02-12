<template>
    <div class="definition" :style="{ left: coords.x, top: coords.y }">
        {{ definition }}
    </div>
</template>

<script>
export default {
    mounted() {
    },
    props: {
        definition: String,
        coords: Object,
    },
    data() {
        return {
        }
    },
    methods: {
    },
    computed: {
        styles() {

        }
    }
}
</script>

<style lang="scss" scoped>
    .definition {
        color: black;
        font-weight: normal;
        position: absolute;
    }
</style>
