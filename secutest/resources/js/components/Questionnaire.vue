<template>
    <div class="questionnaire-wrapper">
        <img class="image" :src="this.currentQuestion.media[0].original_url" v-if="!!currentQuestion.media">
        <h3 class="question">
            {{ currentQuestion.text }}
        </h3>
        <div class="answers-wrapper">
            <div
                v-for="answer in currentQuestion.answers"
                :key="answer.id"
                :class="[
                    !!userAnswers[currentQuestion.id] ? 'selected-answer' : '',
                    'answer',
                ]"
                @click="answerClicked(answer.id)"
            >
                {{ answer.text}}
                </div>
        </div>
        <div class="button validate-button">
            {{ currentQuestion.id == questions[questions.length-1].id ? 'Terminer' :  'Suivant' }}
        </div>
    </div>
</template>

<script>export default {
    mounted() {
    },
    created() {
        axios.get('api/get-questionnaire').then((response) => {
            this.questions = response.data;
            this.isFetching = false;
            this.currentQuestion = this.questions[19];
        });
    },

    props: {
    },

    data() {
        return {
            //VARIABLES
            isFetching: true,
            questions: {},
            currentQuestion: {},
            userAnswers: {}
        }
    },

    computed: {
        isSelectedAnswer(answerId) {
            return !!this.userAnswers[this.currentQuestion.id] ?
                this.userAnswers[this.currentQuestion.id].includes(answerId) :
                null;
        }
    },

    methods: {
        answerClicked(answerId) {
            if (!!this.userAnswers[this.currentQuestion.id]) {
                // If array of user answers exists
                if (!this.userAnswers[this.currentQuestion.id].includes(answerId)) {
                    // If answer is not selected add it to user answers array
                    this.userAnswers[this.currentQuestion.id].push(answerId);
                } else {
                    // Else remove it from the array
                    this.removeAnswer(answerId);
                    if (this.userAnswers[this.currentQuestion.id].length == 0) {
                        // If current question has no user answers, delete the answers object (keep things clean)
                        delete this.userAnswers[this.currentQuestion.id];
                    }
                }
            } else {
                // If array of user answers does not exist
                this.userAnswers[this.currentQuestion.id] = [answerId];
            }
        },
        removeAnswer(answerId) {
            this.removeFromArray(this.userAnswers[this.currentQuestion.id], answerId);
        },
        removeFromArray(array, element) {
            var index = array.indexOf(element);
            if (index > -1) {
                array.splice(index, 1);
            }
        }
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
    background-color: rgb(5, 185, 252);
    cursor: pointer;
}
.selected-answer {
    background-color: rgb(3, 158, 214);
}
.myvars {
    //Default
    color: rgb(201, 241, 255);
    color: rgb(5, 185, 252);
    color: rgb(250, 221, 6);

    //Dark
    color: rgb(201, 241, 255);
    color: rgb(3, 158, 214);
    color: rgb(250, 221, 6);
}
</style>
