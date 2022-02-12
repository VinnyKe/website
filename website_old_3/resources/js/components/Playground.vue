<template>
    <div class="content">
        <definition :definition="currentDefinition" v-bind="{coords}"/>

        <div>
            This is a <p class="definition-word" :id=1 @mouseenter="mouseEnter" @mouseleave="mouseLeave" @mousemove="getCoords($event)">test</p>
        </div>
        <!-- <div>
            This is another <p class="definition-word" id=2 @mousemove="getCoords">test</p>
        </div> -->
    </div>
</template>

<script>
import Definition from './DefinitionViewer/Definition.vue'
import Word from './DefinitionViewer/Word.vue'
export default {
    components: { Word, Definition },
    data() {
        return {
            definitions: {
                1: {
                    definition: 'This is a test definition',
                },
                2: {
                    definition: 'This is a similar test but with a different definition',
                },
            },
            isOn: false,
            currentDefinition: null,
            coords: {
                x:100,
                y:100
            },
            test: null,
        }
    },
    methods: {
        mouseEnter() {
            this.isOn = true;
            this.currentDefinition = this.definitions[1].definition;
            // this.test = ;
        },
        mouseLeave() {
            this.isOn = false;
            this.currentDefinition = null;
        },
        getCoords(event) {
            this.coords.x = event.pageX;
            this.coords.y = event.pageY;
            // console.log(this.coords);
        }
    },
    computed: {

    },
}
</script>

<style lang="scss">
    .content {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select:none;
        user-select:none;
        -o-user-select:none;

        font-size: 20px;

        text-align: center;

        width: 350px;

        // background-color: red;
        .definition-word {
            width: fit-content;
            font-weight: bold;
            color: rgb(24, 73, 165);
            display: inline;
        }
    }
</style>
