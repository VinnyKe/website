<template>
    <div class="questions-wrapper">
        <question v-for="question in questions" :key="question.id" :question="question"></question>
    </div>
</template>

<script>
import Question from './Question/Question.vue';
export default {
  components: { Question },
    created() {
        axios.get('http://localhost/api/questions').then(response => this.questions = response.data);
    },

    data() {
        return {
            questions: {},
        }
    },
}
</script>

<style lang="scss" scoped>

</style>
