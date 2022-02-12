<template>
    <div class="container">
        <table class="table" v-if="!!weatherData">
            <thead>
                <tr>
                    <th scope="col"  v-for="key in Object.keys(weatherData[0])" :key="key">
                        {{ key }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="record in weatherData" :key="record.dt">
                    <td v-for="(value, key, index) in record" :key="index">
                        {{ value }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    data() {
        return {
            weatherData: null,
            tideData: null,
        }
    },
    mounted() {
        axios.get('/api/weather-data').then((response) => (this.weatherData = response.data['list']));

        // axios.get('/api/tide-data').then((response) => (this.tideData = response.data));
    },
    computed: {
    }
}
</script>

<style>

</style>
