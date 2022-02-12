<template>
    <div class="main-wrapper">
        <h1 class="title">Résultats</h1>
        <table class="run-view">
            <tr>
                <th>Question</th>
                <th>Réponse</th>
                <th>Explication réponse</th>
                <th>Correct</th>
            </tr>
            <tr v-for="result in results" :key="result.id">
                <td>{{ result.question.text }}</td>
                <td>{{ result.answer.text }}</td>
                <td>{{ result.question.answer_description }}</td>
                <td>{{ result.answer.is_correct }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    created() {
        axios.get(`http://localhost/api/run-results/${this.$route.params.questionnaire_id}`).then(response => {
            this.results= response.data;
        })
    },

    props: {
    },

    data() {
        return {
            results: null,
        }
    },
}
</script>

<style>
    .main-wrapper {
        display: flex;
        justify-content: center;
        flex-direction: column;
    }
</style>
