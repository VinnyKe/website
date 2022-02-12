import Vue from 'vue';
import VueRouter from 'vue-router';

import Questionnaire from './components/Questionnaire/Questionnaire.vue'
import ViewQuestionnaire from './components/Questionnaire/ViewQuestionnaire.vue'
import EditQuestion from './components/Questionnaire/Question/EditQuestion.vue'
import QuestionnaireResults from './components/Questionnaire/QuestionnaireResults.vue'
import EditQuestionnaire from './components/Questionnaire/EditQuestionnaire.vue'
import ImportQuestions from './components/ImportQuestions.vue'
import Playground from './components/Playground.vue'

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        // Available from menu
        { path: '/', component: ImportQuestions, name: 'Home' },
    ]
});
