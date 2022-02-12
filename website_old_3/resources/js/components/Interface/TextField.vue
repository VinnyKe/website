<template>
    <dir class="textfield">
        <label class="input-prefix">{{ label }}</label>
        <input type="text" class="text-input" v-model="text">
        <input class="radio-input" v-if="withRadio" type="radio" name="correct" v-model="isCorrect">
    </dir>
</template>

<script>
export default {
    props: {
        inputText: String,
        label: String,
        withRadio: Boolean,
        answerId: Number,
        propIsCorrect: Number,
    },

    computed: {

        text: {
            get() {
                return this.inputText;
            },
            set(newText) {
                this.$emit('input', newText);
            }
        },

        isCorrect: {
            get() {
                return this.propIsCorrect;
            },
            set() {
                this.$emit('isCorrect', this.answerId)
            }
        }
    },

    methods: {
    }
}
</script>

<style lang="scss">
.textfield {
    display: flex;
    align-items: center;

    height: 35px;

    padding: 0;
    width: 90%;
    min-width: 500px;

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

    .radio-input {
        appearance: none;

        border-radius: 50%;
        width: 16px;
        height: 16px;

        border: 1px solid black;
        transition: 0.1s all linear;
        margin-left: 20px;
    }

    .radio-input:checked {
        border: 4px solid rgb(241, 183, 34);
        background-color: rgb(16, 90, 165);
    }
}

</style>
