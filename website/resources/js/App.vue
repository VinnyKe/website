<template>
    <div class="container">
        <h1>{{ welcomeMessage }}</h1>
        <ExampleComponent></ExampleComponent>
    </div>
</template>

<script>
    import ExampleComponent from './components/ExampleComponent';

    export default {
        components: {
            ExampleComponent
        },
        data(){
            return {
                welcomeMessage: 'Hello there!'
            }
        }
    }

</script>
