<template>
    <div class="text" @mouseenter="emitCursorOn" @mouseleave="emitCursorOff">
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: {
        text: String,
        id: Object,
    },
    data() {
        return {
        }
    },
    methods: {
        emitCursorOn() {
            this.$emit('cursorOn', {state: true, id: this.id});
        },
        emitCursorOff() {
            this.$emit('cursorOn', {state: false, id: this.id});
        },
        getCoords(event) {
            console.log(event);
        }
    },
    computed: {
    }
}
</script>

<style lang="scss" scoped>
    .text {
        font-weight: bold;
        color: rgb(24, 73, 165);
        display: inline;
    }
</style>
