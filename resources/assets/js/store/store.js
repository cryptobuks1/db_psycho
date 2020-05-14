import Vue from 'vue';
import Vuex from 'vuex'
import axios from 'axios'
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        menu_open: true,
        lang: 'en',
        svgStore: {},
        paramCard: {
            // group_l:true,
        },
        paramDataCard: {},
        faqid:false,
        logoUrl: '/img/logo-rb.png',
        logoUrlSidebar: '/img/logo-rb.png',
        content: '',
        asyncReports: false,
        currentTabPage: 0,
        adding_elems_link: '', //ссылка для перехода на пустую карточку
        adding_dependency_field: null, // айди родительского обьекта при создании пустой карточки
        modal: {
            html: '',
            response: '',
            editor: {
                value: '',
                model: '',
                name: '',
            },
            showModal: false,
            modalType: '', //passwordModal  || emailModal || submitModal || infoModal || htmlModal || editorModal
            submitModal: undefined,
            texts: {}
        },
        notifications: [], //массив пользовательских уведомлений
        theme: 'rb',
        validators:[]
    },
    getters: {
        getLang: state => {
            return state.lang;
        },
        getSvgStore: state => {
            return state.svgStore;
        },
        getParamCard: state => {
            return state.paramCard;
        },
        getParamDataCard: state => {
            return state.paramDataCard;
        },
        getModalResponse: state => {
            return state.modal.response;
        },
        getModalState: state => {
            return state.modal.showModal;
        },
        getModalType: state => {
            return state.modal.modalType;
        },
        getModalSubmit: state => {
            return state.modal.submitModal;
        },
        getModalTexts: state => {
            return state.modal.texts;
        },
        getModalEditorContent: state => {
            return state.modal.editor;
        },
        getAsyncReports: state => {
            return state.asyncReports;
        },
        getTabIndex: state => {
            return state.currentTabPage;
        },
        getModalHtml: state => {
            return state.modal.html;
        },
        getAddingLink: state => {
            return state.adding_elems_link;
        },
        getAddingDependencyField: state => {
            return state.adding_dependency_field;
        },
        getNotifications: state => {
            return state.notifications;
        },
        getTheme: state => {
            return state.theme;
        },
        getFaqid: state => {
            return state.faqid;
        }
    },
    actions: {
        asyncReports(context) {
            context.commit('asyncReports');
        },
        ["ParamDataCard"]:function({commit}, data){commit("setParamDataCard", data);},
        ["setSvgStore"]:function({commit}, data){return commit("setSvgStore", data);}
    },
    mutations: {
        defaultState(state, info) {
            state.modal.html = '';
            state.modal.editorContent = '';
            state.modal.showModal = false;
            state.modal.modalType = '';
            state.modal.submitModal = undefined;
            state.modal.texts = {};
        },

        showModal(state, info) {
            state.modal.html = info.html;
            state.modal.showModal = true;
            state.modal.modalType = info.type;
            if (info.type == 'infoModal' || info.type == 'confirmModal' || info.type == 'editorModal' || info.type === 'documentModal') {
                state.modal.texts = info.texts;
            }
            if (info.type === 'editorModal') {
                state.modal.editor.value = info.editor.val;
                state.modal.editor.model = info.editor.model;
                state.modal.editor.name = info.editor.name;
            }
        },
        hideModal(state) {
            state.modal.showModal = false;
            if (state.modal.modalType == 'confirmModal') {
                state.modal.submitModal = false;
            }
        },
        submitModal(state) {
            console.log("MODAL submitted")
            state.modal.submitModal = true;
        },
        setModalResponse(state,data) {
            state.modal.response = data;
        },

        changeTab(state, tab) {
            state.currentTabPage = tab;
            // console.log(state.currentTabPage);
        },
        changeAddingLink(state, link) {
            state.adding_elems_link = link;
        },
        changeAddingDependencyField(state, field) {
            state.adding_dependency_field = field;
        },
        asyncReports(state) {
            state.asyncReports = !state.asyncReports;
        },
        deleteNotification(state, link) {
            state.notifications.forEach((notification, index) => {
                if (notification.link == link) {
                    state.notifications.splice(index, 1);
                }
            })
        },
        changeTheme(state, newTheme) {
            state.theme = newTheme;
        },
        validateChildren(state, result){
            state.validators.push(result);
        },
        setParamCard(state, data) {
            state.paramCard={
                // group_l:true
            };
            Object.keys(data).forEach((key) => {
                state.paramCard[key] = data[key];
            });
        },
        setParamDataCard(state, data) {
            console.log(typeof data,data,data.length);
            if(Object.keys(data).length > 0){
                Object.keys(data).forEach((key) => {
                    state.paramDataCard[key] = data[key];
                });
            }else{
                state.paramDataCard = {};
            }

        },
        setSvgStore(state, data) {
            if(Object.keys(data).length > 0){
                Object.keys(data).forEach((key) => {
                    state.svgStore[key] = data[key];
                });
            }else{
                state.svgStore = {};
            }

        },
        setFaqid(state,id){
            state.faqid = id
        }
    },
    plugins: [createPersistedState()]
});
