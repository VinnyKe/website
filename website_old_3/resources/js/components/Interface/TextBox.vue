<template>
    <dir class="textbox">
        <label class="input-prefix">{{ label }}</label>
        <text-area class="text-input" v-model="model"/>
    </dir>
</template>

<script>
export default {
    props: {
        model: Object,
        label: String,
    }
}
</script>

<style lang="scss">
.textbox {
    display: flex;

    height: 35px;

    padding: 0;
    width: 90%;
    min-width: 500px;
}

.text-input {
    flex-grow: 2;

    background-color: rgb(255, 255, 255);
    font-size: 20px;

    height: 100%;
    max-width: 900px;

    border: none;
    border-radius: 0 10px 10px 0;
}

.text-input:focus {
    outline: none;
    border: 1px solid black;
    border-radius: 0 10px 10px 0;
}

.input-prefix {
    display: flex;
    justify-content: center;
    align-items: center;

    background-color: rgb(255, 182, 46);

    height: 100%;
    width: fit-content;
    padding: 0 10px;
    font-size: 22px;

    border-radius: 10px 0 0 10px;
}
</style>
