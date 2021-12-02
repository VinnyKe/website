<template>
    <div>
        <h2>Questionnaires</h2>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="questionnaire in questionnaires" :key="questionnaire.id">
                    <th scope="row">{{ questionnaire.id }}</th>
                    <td>{{ questionnaire.name }}</td>
                    <td>{{ questionnaire.description }}</td>
                    <td class="btn-group">
                        <a class="btn btn-warning" >Edit</a>
                        <a class="btn btn-danger" @click="deleteQuestionnaire(questionnaire.id)">Delete</a>
                    </td>
                </tr>

                <tr v-if="!!!questionnaires.length">
                    <td class="text-center" colspan="4">No questionnaires</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
  components: {},
    data() {
        return {
            questionnaires: [],
        }
    },

    created(){
        fetch('api/questionnaires')
            .then(res => res.json())
            .then(res => this.questionnaires = res)
    },

    methods: {
        deleteQuestionnaire(id){
            if(confirm('This will delete the questionnaire for ever. Are you sure ?')) {
                fetch(`api/questionnaires/${id}`, {
                    method: 'delete'
                })
            }
        }
    }
}
</script>
