<template>
    <div class="question-form">
        <div class="section-block">
            <label class="section-title">Question</label>
            <div class="section-wrapper">
                <text-field :input-text="question.text" :label="'Question'" @input="question.text = $event"></text-field>
                <text-field :input-text="question.description" :label="'Description'" @input="question.description = $event"></text-field>
            </div>
        </div>
        <div class="black-line"/>
        <div class="section-block">
            <label class="section-title">Réponses</label>
            <div class="section-wrapper">
                <text-field
                    v-for="index in 4"
                    :key="index"
                    :input-text="answers[index]"
                    :label="answerPrefixes[index-1]"
                    :with-radio="true"
                    :answer-id="index"
                    @input="answers[index] = $event"
                    @isCorrect="correct = $event"
                />
            </div>
        </div>
        <div class="button save-button" @click.prevent="editQuestion">Enregistrer</div>
    </div>
</template>

<script>
export default {
    created() {

    },
    props: {
    },
    data() {
        return {
            answerPrefixes: ['A', 'B', 'C', 'D'],
            question: {},
            answers: {},
            correct: null,
        }
    },
    methods: {
        editQuestion() {
            console.log('Edit question');
            axios.post('http://localhost/api/questions', this.question);
        },

        selectCorrect() {
            answers[index].is_correct = true
        }
    },
    computed: {

    }
}
</script>

<style lang="scss" scoped>
.question-form {
    background-color: rgb(22, 110, 199);

    display: flex;
    flex-direction: column;
    align-items: center;

    border-radius: 80px;
    padding: 30px;
    margin-top: 100px;

    width: 1100px;

    .section-title {
        display: flex;
        align-items: center;

        color: white;
        font-weight: bold;

        margin-right: 50px;
        width: 150px;
        font-size: 30px;
    }

    .section-block {
        display: flex;
        justify-content: flex-start;

        width: 100%;
    }

    .question {
        display: flex;
        align-items: center;

        height: 35px;

        padding: 0;
    }

    .answer {
        display: flex;

        align-items: center;

        height: 35px;

        margin: 10px 0;
    }

    .section-wrapper {
        display: flex;
        flex-direction: column;
        width: inherit;
    }

    .save-button {
        margin-top: 50px;
    }
}
</style>
