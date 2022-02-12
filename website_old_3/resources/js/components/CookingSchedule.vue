<template>
  <div class="container">
      <h1>Programme cuisine</h1>
      <table>
          <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Chef</th>
                <th scope="col">Sous-Chef</th>
                <th scope="col">Pays</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="schedule in schedules" :key="schedule.id">
                <td>{{ schedule.date }}</td>
                <td>{{ schedule.chef }}</td>
                <td>{{ schedule.sous_chef }}</td>
                <td>{{ schedule.country }}</td>
            </tr>
        </tbody>
      </table>
  </div>
</template>

<script>

export default {
    data() {
        return {
            schedules: {},
        }
    },
    mounted() {
        axios.get('/api/cooking-schedules').then((response) => (this.schedules = response.data));
    }
}
</script>

<style>

</style>
