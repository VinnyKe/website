<template>
    <div class="questionnaire-wrapper" v-if="!isFetching">
        <img class="image"
            v-if="currentQuestion.media.length > 0"
            :src="this.currentQuestion.media[0].original_url"
        >
        <h3 class="question">
            {{ currentQuestion.text }}
        </h3>
        <div
            class="answers-wrapper"
            v-if="!!selectedAnswers"
        >
            <div
                v-for="answer in currentQuestion.answers"
                :key="answer.id"
                :class="[
                    answerIsSelected(answer.id) ? 'selected-answer' : '',
                    'answer',
                ]"
                @click="answerClicked(answer.id)"
            >
                {{ answer.text}}
                </div>
        </div>
        <div
            class="button validate-button"
            @click="nextQuestion"
        >
            {{ (currentQuestion.id == questions[questions.length-1].id) ? 'Terminer' :  'Suivant' }}
        </div>
    </div>
</template>

<script>export default {
    /**
     * TODO
     *  - get answers with slectedAnswers object then add them to userAnswers when saved (no logic with userAnswers)
     */
    mounted() {
        axios.get('api/get-questionnaire').then((response) => {
            this.questions = response.data;
            this.isFetching = false;
        });
    },
    created() {
    },

    props: {
    },

    data() {
        return {
            //VARIABLES
            isFetching: true,
            questions: {},
            userAnswers: {},
            selectedAnswers: [],
            currentIndex: 18,
        }
    },

    computed: {
        currentQuestion() {
            return this.questions[this.currentIndex];
        }
    },

    methods: {
        answerIsSelected(answerId) {
            return this.selectedAnswers.includes(answerId);
        },
        answerClicked(answerId) {
            console.log('Handling '+answerId);
            if (!this.selectedAnswers.includes(answerId)) {
                this.selectedAnswers.push(answerId);
            } else {
                this.removeFromArray(this.selectedAnswers, answerId);
            }
        },
        saveAnswers() {
            this.userAnswers[this.currentQuestion.id] = this.selectedAnswers;
        },
        removeFromArray(array, element) {
            var index = array.indexOf(element);
            if (index > -1) {
                array.splice(index, 1);
            }
        },
        nextQuestion() {
            if (this.currentQuestion.id == this.questions[this.questions.length-1].id) {
                this.endQuestionnaire();
            } else {
                this.saveAnswers();
                this.currentIndex++;
            }
        },
        endQuestionnaire() {

        },
    },
}
</script>

<style lang="scss" scoped>
.questionnaire-wrapper {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin: 20px 0;
}
.image {
    margin-bottom: 20px;
    width: auto;
    height: 600px;
}
.question {
    text-align: center;
}
.answers-wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin: 20px 0;
}
.answer {
    flex-basis: calc(50% - 30px);
    display: flex;
    justify-content: center;
    align-items: center;
    align-self: center;
    text-align: center;

    max-width: 800px;
    min-width: 400px;

    margin: 10px;
    padding: 0 10px;
    font-size: 25px;
    border-radius: 20px;
    border: 3px solid transparent;

    background-color: lightskyblue;
}
.answer:hover {
    background-color: rgb(90, 186, 247);
    cursor: pointer;
}
.selected-answer, .selected-answer:hover {
    background-color: rgb(233, 207, 14);
}
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
