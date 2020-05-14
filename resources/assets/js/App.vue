<template>
    <div class="content"
         :class="{'active':$store.state.menu_open,'nav-md':$store.state.menu_open,'nav-sm':!$store.state.menu_open}">
        <Sidebar v-if="userVerify"></Sidebar>
        <div id="main" :class="{'active':$store.state.menu_open}">
            <div class="wrapper" v-if="userVerify">

                <Header
                    :notifications="notifications"
                    :user="user"
                    :userActions="userActions">
                </Header>
                <Menu></Menu>
                <Breadcrumbs></Breadcrumbs>
                <transition name="fade" mode="out-in">
                    <router-view :key="$bRoute.matched&& $bRoute.matched[0] && $bRoute.matched[0].path "></router-view>
                </transition>
            </div>
            <!--<router-view :key="$route.fullPath"></router-view>-->
            <modal v-if="getModalState"></modal>
            <Modaldynamic ref="dmodal"></Modaldynamic>

            <Footer v-if="userVerify"></Footer>
        </div>
    </div>
</template>

<script>
    import Header from './components/Header.vue';
    import Sidebar from './components/Sidebar.vue';
    import Footer from './components/Footer.vue';
    import Modal from './components/Modal.vue';
    import Modaldynamic from './components/Modaldynamic.vue';
    import Menu from './components/Menu.vue';
    import Breadcrumbs from './components/Breadcrumbs';
    import {AtomSpinner} from 'epic-spinners';
    import {mapGetters} from 'vuex';
    const Home = resolve => {
        require.ensure(['./components/Home.vue'], () => {
            resolve(require('./components/Home.vue'))
        });
    };
    const List = resolve => {
        require.ensure(['./components/List.vue'], () => {
            resolve(require('./components/List.vue'));
        });
    };
    const Card = resolve => {
        require.ensure(['./components/Card.vue'], () => {
            resolve(require('./components/Card.vue'));
        });
    };
    const Report = resolve => {
        require.ensure(['./components/Report.vue'], () => {
            resolve(require('./components/Report.vue'));
        });
    };
    const Profile = resolve => {
        require.ensure(['./components/Profile.vue'], () => {
            resolve(require('./components/Profile.vue'));
        });
    };
    const Error = resolve => {
        require.ensure(['./components/Error.vue'], () => {
            resolve(require('./components/Error.vue'));
        });
    };
    const Document = resolve => {
        require.ensure(['./components/Document.vue'], () => {
            resolve(require('./components/Document.vue'));
        });
    };
    const TextPage = resolve => {
        require.ensure(['./components/TextPage.vue'], () => {
            resolve(require('./components/TextPage.vue'));
        });
    };
    const Steps = resolve => {
        require.ensure(['./components/Steps.vue'], () => {
            resolve(require('./components/Steps.vue'));
        });
    };
    const Info = resolve => {
        require.ensure(['./components/Info.vue'], () => {
            resolve(require('./components/Info.vue'));
        });
    };
    const Faq = resolve => {
        require.ensure(['./components/Faq.vue'], () => {
            resolve(require('./components/Faq.vue'));
        });
    };
    const AttachedFiles = resolve => {
        require.ensure(['./components/AttachedFiles.vue'], () => {
            resolve(require('./components/AttachedFiles.vue'));
        });
    };

    export default {
        name: 'app',
        components: {
            List,
            Home,
            Card,
            Report,
            Profile,
            Error,
            Document,
            TextPage,
            Steps,
            Info,
            Header,
            Sidebar,
            Footer,
            Modal,
            Modaldynamic,
            Menu,
            Breadcrumbs,
            AtomSpinner,
            Faq,
            AttachedFiles
        },
        data:function () {
            return{
                key: 0,
                userVerify: false,
                currentComponent: '',
                routes: [],
                userActions: [],
                user:null,
                notifications: [],
                router: {},
                loading: false,

            }
        },
        computed: {
            getTheme() {
                return this.$store.state.theme;
            },
            modalState(){
                console.log(this.getModalState);
            },
            ...mapGetters([
                'getModalState',
                'getModalType',
                'getModalTexts',
                'getModalHtml',
                'getModalEditorContent',
                'getModalResponse',
            ]),
            getNotifications() {
                return this.$store.state.notifications;
            }

        },
        watch:{
            '$bRoute.path': function(old){
                this.routeChange();
            },
            getTheme() {
                this.theme();
            },
            getNotifications: {

                handler: function (value) {
                    this.notifications = value;
                },
                deep: true
            }
        },
        methods: {

            theme(){
                // console.log('method theme');
                switch (this.$store.state.theme) {
                    case 'rb':
                        document.body.classList.add('rb');
                        document.documentElement.style.setProperty('--accent', '#e1002d');
                        document.documentElement.style.setProperty('--bg-color', '#fff');
                        document.documentElement.style.setProperty('--base-color', '#2f3339');
                        break;
                    case 'default':
                        document.body.className= '';
                        document.documentElement.style.setProperty('--accent', '#50d3a0');
                        document.documentElement.style.setProperty('--bg-color', '#eff3f6');
                        document.documentElement.style.setProperty('--base-color', '#202a3d');
                        break;
                }
            },
            routeChange(){
                let currentPath,routes,result;
                currentPath = this.$bRoute.path; // Текущий url
                routes = this.routes; // Все роуты из backend
                result = this.$bRouter.matcher.matchBackRoutes(currentPath,routes); // Поиск роута по url
                if(!this.$bRoute.matched[0]) this.$bRouter.replace('/404'); // Роут не найден
            },
            async getRouters(){
                await this.$http.post('/admin/FeRoutes/index', null)
                    .then(res => {
                        this.routes = res.data;
                    })
            },
            async checkChangePassword(){
                await this.$refs.dmodal.showmodal({"modal":{"ipost":"/changePassword","inputs":[{"model":"oldPassword","title":"Старый пароль","type":"password","validation":"required|min:6|max:20",},{"model":"newPassword","title":"Новый пароль","type":"password","ref":"newpass","validation":"required|min:6|max:20|confirmed:repeatpass","returnfield":"first_name"},{"model":"repeatPassword","title":"Повторить пароль","type":"password","ref":"repeatpass","validation":"required|min:6|max:20|"}],"actions":[{"title":"Ok","code":"await.ModalRequest,showtoast,ReturnRes,ifResetModal,hideModal","class":"btn btn-green","img":""},{"title":"Отмена","code":"resetModal,focehideModal","class":"btn btn-grey",},{"title":"Сбросить","code":"resetModal","class":"btn btn-grey",},],}});
                let result = this.getModalResponse;
                this.$store.commit('setModalResponse','');
                if(result.status !== 0) window.location = '/logout';
                this.userVerify = true;

            },
            async getProfileInfo(){
                await this.$http.post('/admin/menu?mode=0&module=main&object=profilemenu', null)
                    .then(res => {
                        this.userActions = res.data.actions;
                        this.user = res.data.user;
                        this.$store.state.notifications = res.data.notifications;
                        if(res.data.user.column_change_password_l){
                            this.checkChangePassword();
                        }else{
                            this.userVerify = true;
                        }
                    });
            }

        },
        notificationSystem: {
            options: {
                ballon: {
                    balloon: true,
                    position: 'topRight'
                },
                info: {
                    position: 'topRight'
                },
                success: {
                    position: 'topRight'
                },
                warning: {
                    position: 'topRight'
                },
                error: {
                    position: 'topRight'
                },
            }
        },
        async mounted() {
            // Дефолтное значение Modal vuex
            this.$store.commit('defaultState');
            // Проверка темы
            this.theme();
            // Получение Header
            await this.getProfileInfo();
            // Получение роутов через API
            await this.getRouters();
            // Вызов метода парса роутов
            this.routeChange();


        }
    };
</script>

<style lang="scss">
    #main {
        min-height: 100vh;
    }
    .fade-transition {
        transition: opacity 0.2s ease;
    }
    .fade-enter, .fade-leave {
        opacity: 0;
    }
    .switch-transition{
        transition: all .5s ease-in-out;
    }
    .switch-enter{
        left: 100%;
    }
    .switch-leave{
        left: -100%;
    }

</style>
