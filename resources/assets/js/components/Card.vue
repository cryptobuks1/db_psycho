<template>
    <div id="contractor">

        <div class="container no-padding">

            <transition-group name="fade" mode="out-in">
                <div v-show="loading" key="1" class="spinner-container">
                    <atom-spinner
                            :animation-duration="1000"
                            v-show="true"
                            color="var(--accent)"
                    />
                </div>
                <div v-show="!loading" key="2">
                    <div class="row">
                        <div class="col">
                            <h1 v-if="!contact_info_show">

                                {{card_name}}</h1>
                            <h1 v-else> {{tabs[0].blocks[0].block_title}}</h1>
                            <!--Выводим имя + название карточки -->
                            <!--<input type="text" v-model="tab_index">-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="contractor_list-link">
                                <ul>
                                    <li v-for="(item, index) in tabs"
                                        v-if="!item.hide_tab_as_link"
                                        :class="{'active':tab_index==index}"
                                        @click="tab_index = index"
                                    >
                                        <a>{{item.tab_title}} </a>
                                    </li><!--сначала выводим кнопки для перехода на табы -->

                                    <li v-for="(item,index) in links "
                                        :class="[{'active':tab_index==2}, 'link']"
                                        @click="goToUrl(item)"
                                    >
                                        <a>{{item.link_title}}</a>
                                    </li> <!--а потом кнопки для перехода по ссылке -->
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4" v-if="dependent!=null">
                            <div class="dependent">
                                <div v-if="dependent.dependent_fields.type=='lt-select'" class="dropdown">
                                    <button class="btn btn-dropdown" @click="dropdownClick ">
                                        <input type="text" v-model="dependent.dependent_fields.options_data.search"
                                               class="dropwond_link filterSelect clip"
                                               @input="selectSearch(dependent.dependent_fields)"
                                               @keypress="dropDownKeyPress"
                                               @keyup="dropDownArrows($event,dependent.dependent_fields,  models[dependent.dependent_data_model][0])">

                                        <img class="drop-i btn-dropdown" src="/img/dropdown-i.png" alt=""
                                             @click="dropImgClick">
                                    </button>  <!-- dropdown -->
                                    <transition name="fade">
                                        <div class="dropdown_box dropdown_box_select">
                                            <ul>

                                                <li v-for="(option, index) in dependent.dependent_fields.options"
                                                    :data-select="index"
                                                    :class="{'li-selected':index==currentOption}"
                                                >
                                                    <button @click="chooseSelectItem(dependent.dependent_fields, option, models[dependent.dependent_data_model][0])"
                                                            class="dropwond_link">
                                                        {{option[dependent.dependent_fields.options_data.options_field_title]}}
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </transition>
                                </div>
                                <div class="list_items" v-if="dependent.dependent_fields.type=='label'">
                                    <span v-if="dependent.dependent_fields.title"> {{dependent.dependent_fields.title}} </span>
<!--                                    <div class="dependent-label" v-if="paramDataCard.addModel">-->
<!--                                        <p v-for="(item, index) in add_data_models[dependent.dependent_fields.options_data.options_data_model]"-->
<!--                                           v-if="item.id === parseInt(paramDataCard.dependentId)">-->
<!--                                            {{item[dependent.dependent_fields.options_data.options_field_title]}}-->
<!--                                        </p>-->
<!--                                    </div>-->
                                    <div class="dependent-label">
                                        <p>
                                            {{models[dependent.dependent_data_model][0][dependent.dependent_fields.options_data.options_field_title]}}</p>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab" v-for="(tab, index) in tabs" v-if="tab_index==index || tab.accordion">
                        <!--Перебираем табы -->
                        <div class="row tab_info" v-if="tab.tab_name || tab.tab_description">
                            <div class="col">
                                <div class="tab-heading">

                                    <h2 v-if="tab.tab_name" @click="hideTab(tab)">{{tab.tab_name}}</h2>

                                    <svg :class="{'rotate':tab.visible}" @click="hideTab(tab)" v-if="tab.accordion"
                                         xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10">
                                        <path id="Right_Arrow" data-name="Right Arrow" class="cls-1"
                                              d="M1641.01,948l-6.01-5.012v10.024Z" transform="translate(-1635 -943)"/>
                                    </svg>

                                </div>
                                <transition name="fade" mode="out-in">
                                    <p v-if="tab.tab_description && tab.visible" v-html="tab.tab_description"></p>
                                </transition>
                            </div>
                        </div>
                        <transition name="fade" mode="out-in">
                            <div class="tab_box" v-if="tab.visible || !tab.accordion">
                                <div class="row block-row">

                                    <Sector
                                            :blocks="tab.blocks"
                                            :models="models"
                                            :disable_inputs="disable_inputs_card"
                                            :add_models="add_data_models"
                                            :position="'left'"
                                            :class="{
                                            'left-sector':true,
                                            'full-width':tab.sectors_quantity==1 || !tab.sectors_quantity,
                                            'grid':tab.sectors_quantity
                                        }"

                                    ></Sector>

                                    <Sector
                                            v-if="tab.sectors_quantity==2"
                                            :blocks="tab.blocks"
                                            :models="models"
                                            :disable_inputs="disable_inputs_card"
                                            :add_models="add_data_models"
                                            :position="'right'"
                                            :class="{
                                            'right-sector':true,
                                            'grid':true
                                        }"

                                    ></Sector>

                                </div>

                                <div class="row">
                                    <template v-if="!sets">
                                        <div class="col d-flex justify-content-end page_buttons_bottom_new">
                                            <a v-for="action in action_buttons" :id="action.code" :class="action.class"
                                               @click="saveModelOld(action)">{{action.title}}</a>
                                        </div>
                                    </template>
                                    <template v-else>
                                        <div class="col d-flex justify-content-end page_buttons_bottom_new">
                                            <a
                                                    v-for="action in sets.card_actions"
                                                    :id="action.code"
                                                    :class="action.class"
                                                    @click="saveModel(action)">
                                                {{action.title}}
                                            </a>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </transition>
                    </div>
                </div>
            </transition-group>


        </div>
        <div class="devTooltip" v-if="dev">
            Страница в разработке
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import Sector from './Sector.vue';
    import {EventBus} from '../app';
    import {mapGetters} from 'vuex';
    import {en, ru} from 'vuejs-datepicker/dist/locale';
    import {AtomSpinner} from 'epic-spinners';
    import {VueEditor} from "vue2-editor";


    export default {
        data: function () {
            return {
                sets: {},
                dev: false,
                loading: true,
                disable_inputs_card: false,
                form_base_data_model: '',
                models: {
                    Contractor: [{db_area_id: null}]
                },
                tabs: [],
                links: [],
                tab_index: this.$store.getters.getTabIndex,
                paramCard: this.$store.getters.getParamCard,
                paramDataCard: this.$store.getters.getParamDataCard,
                action_buttons: [],
                add_data_models: [],
                datapicker_translations: {
                    en: en,
                    ru: ru,
                },
                card_name: '',
                db_areas: [],
                dependent: null,
                modelObj: {},

                filterSelect: 'fff',
                filteredItems: [],
                firstSelectKeyPress: true,
                currentOption: -1,
                previous_dr_act: null,
                contact_info_show: false,
                model_has_changed: false,
                watch_model_changing: false
            }
        },

        props: ['row_id_fe_route_step_object', 'step_l', 'disable_inputs'],

        name: 'Card',

        computed: {

            ...mapGetters([
                'getModalSubmit',
                'getTabIndex',
                'getParamCard',
                'getParamDataCard',
            ]),

//             Возвращает текущий db_area_id
            watchDBID: function () {
                if (!this.contact_info_show && (this.form_base_data_model == 'Contractor' || this.form_base_data_model == 'Companies')) {

                    if (this.form_base_data_model == 'Contractor') return this.models.Contractor[0].db_area_id;

                    if (this.form_base_data_model == "Companies") return this.models.Company[0].db_area_id;

                }
            },

            // Возвращает текущий individual_l
            watchIndividual: function () {
                if (!this.contact_info_show && (this.form_base_data_model == 'Contractor' || this.form_base_data_model == 'Companies')) {

                    if (this.form_base_data_model == 'Contractor') return this.models.Contractor[0].individual_l;

                    if (this.form_base_data_model == 'Companies') return this.models.Company[0].individual_l;

                }
            },

//            sortBlocks(blocks, position) {
//                debugger;
//                var arr = [];
//                blocks.forEach(block=>{
//
//                    if (block.sector == position || !block.sector) arr.push(block);
//                    console.log(arr);
//                    return arr;
//
//                });
//            }
        },

        watch: {
            tab_index(val) {
                this.$store.commit("changeTab", val);
            },
            //Реагирует на изменение текущего db_area_id и меняет значения db_name i server_name
            watchDBID(value) {
                if (this.form_base_data_model == 'Contractor' || this.form_base_data_model == 'Companies') {
                    var mainModel = '';

                    if (this.form_base_data_model == 'Contractor') mainModel = 'Contractor';
                    if (this.form_base_data_model == 'Companies') mainModel = 'Company';

//                    console.log("watchers works")
                    console.log("reserved " + this.db_area_id_res);
                    this.db_areas.forEach((item) => {
                        if (item.id == value) {
                            this.models[mainModel][0].db_name = item.d_base.db_name;
                            this.models[mainModel][0].server_name = item.d_base.server_db.server_name;
                            this.db_area_id_res = value;

                        }

                    });
                    if (value === '') {
                        var self = this;
                        this.models[mainModel][0].db_name = '';
                        this.models[mainModel][0].server_name = '';
                        this.$store.commit('showModal', {type: 'confirmModal'});


                    }
                }
            },

            //Реагирует на изменение текущего individual_l и скрывает/ показывает поля entrepreneur_certificate i entrepreneur_certificate_date
            watchIndividual(value) {
//                console.log("TAB INDEX " + this.tabIndex)

                if (this.form_base_data_model == 'Contractor' || this.form_base_data_model == "Companies") {
//                    console.log("watchers works")
//                    console.log("individua_l " + value)
                    if (!value) {

                        this.tabs[this.tab_index].blocks.forEach((block) => {
                            block.block_fields.forEach((item) => {

                                if (item.model == 'entrepreneur_certificate' || item.model == 'entrepreneur_certificate_date') {
                                    console.log(item)
                                    item.hidden = true;
                                }
                            })
                        });


                    }
                    if (value) {
                        this.tabs.forEach((tab) => {
                            tab.blocks.forEach((block) => {
                                block.block_fields.forEach((item) => {
                                    if (item.model == 'entrepreneur_certificate' || item.model == 'entrepreneur_certificate_date') {
                                        item.hidden = false;
                                    }
                                })
                            })
                        })
//
                    }
                }
            },

            //Реагирует на нажатие кнопок на модалке типа submitModal
            '$store.state.modal.submitModal'(value) {
                if (this.form_base_data_model == 'Contractor') {
//                    console.log("watchers works")
//                    console.log("modalSubmit: " + value);
                    if (value == false) this.models.Contractor[0].db_area_id = this.db_area_id_res;
                }

            },

            'model_has_changed'(value) {
//                debugger;
                if (value == true) this.card_name += "*";
            },

            getModalSubmit(value) {

            },

            models: {
                handler: function (oldVal, val) {
                    console.log(val);
                    console.log("%c Model watcher",
                        'color:white; background-color:#2274A5',
                        "Model has changed"
                    );
//                    debugger;
                    if (this.watch_model_changing) this.model_has_changed = true;
                },
                deep: true
            }
        },

        methods: {
            /**
             * Реагирует на нажатие кнопок внизу страницы
             * @param {string} action
             */
            saveModel: async function (action) {
                if (action.code == 'back') {

                    if (this.model_has_changed) {
                        this.$toast.error('Изменения не были сохранены', '', {position: 'topRight'})
                        this.$bRouter.go(-1);
                    }
                    else {
                        this.$bRouter.go(-1);
                        return;
                    }
                }

                await this.validateChildren(this);

                var result = this.$store.state.validators.every((item) => item == true);

                this.$store.state.validators = [];
                if (result) {
//                    this.loading=true;
                    this.disableButtons(true);
                    for (var item in this.fieldsVV) {
                        this.fieldsVV[item].touched = true;
                    }
                    let data = {
                        main_data_models: this.models,
                        form_parameters: {
                            form_base_data_model: this.form_base_data_model
                        },
                    };
                    await this.$http.post(action.link, data)
                        .then(async res => {
                            //if (this.card_name[this.card_name.length - 1] == "*") this.card_name = this.card_name.slice(0, this.card_name.length - 1);

//                            this.model_has_changed = false;
                            for (var item in this.fieldsVV) {
                                this.fieldsVV[item].touched = false;
                            }

//                            if (res.data.error) {
//                                this.$toast.error(res.data.message, '', {position: 'topRight'});
//                                return false;
//                            }
                            this.$toast.success(res.data.message, '', {position: 'topRight'});
{
//                                debugger;
                                var paths = this.$bRoute.path.split('/');
                                this.$bRouter.replace(paths.slice(0, paths.length - 1).join('/') + '/' + res.data.id); // убираем '/new' из конца роута и заменяем его на id созданной карточки
                            }

                            if (res.data.requery && action.code !== 'ok') {
                                if (true)
                                    this.$nextTick(async () => {
                                    this.paramCard.id = (this.step_l) ? this.row_id_fe_route_step_object : this.$bRoute.params[this.$bRoute.meta.id_field];
                                    await this.fillComponent(this.$bRoute.meta.route, this.paramCard);

                                });
                            }
                            this.model_has_changed = false;
                            this.watch_model_changing = false;
                            this.loading = false;
                            this.disableButtons(false);
                            if (action.code == 'ok') this.$bRouter.go(-1);
//                            }
//                            else {
//                                this.loading = false;
//                            }

                        })
                        .catch(error => {
                            //debugger;
                            this.$toast.error(error.response.data.message, '' + error.response.status, {position: 'topRight'})
                            result = false;
                            if (error.response.data.requery) {

                                this.$nextTick(async () => {
                                    this.paramCard.id = (this.step_l) ? this.row_id_fe_route_step_object : this.$bRoute.params[this.$bRoute.meta.id_field];
                                    await this.fillComponent(this.$bRoute.meta.route, this.paramCard);
                                });
                            }
                            this.loading = false;
                            this.disableButtons(false);
                            if (error.response.status !== 400) this.$bRouter.replace({path: '/' + error.response.status})

                        });

//                    debugger
//                    if (action.code == 'ok') this.$bRouter.go(-1);
                }

                else {
                    for (var item in this.fieldsVV) {
                        this.fieldsVV[item].touched = true;
                    }
                    console.log(this.fieldsVV)
                    this.$toast.error('Changes weren`t saved', '', {position: 'topRight'})
                }

                return result;

            },
            // Реагирует на нажатие кнопок внизу страницы
            saveModelOld: async function (action) {
                if (action.code == 'back') {

                    if (this.model_has_changed) {
                        this.$toast.error('Changes weren`t saved', '', {position: 'topRight'})
                        this.$bRouter.go(-1);
                    }
                    else {
                        this.$bRouter.go(-1);
                        return;
                    }
                }

                await this.validateChildren(this);


                var result = this.$store.state.validators.every((item) => item == true);

                this.$store.state.validators = [];

                if (result) {
                    for (var item in this.fieldsVV) {
                        this.fieldsVV[item].touched = true;
                    }
                    let data = {
                        main_data_models: this.models,
                        form_parameters: {
                            form_base_data_model: this.form_base_data_model
                        },
                    };
                    //await this.$http.post(action.link, this.models) //todo  будет падать пока не поменяется запрос на сохранение
                    await this.$http.post(action.link, data)
                        .then(res => {

                            if (this.card_name[this.card_name.length - 1] == "*") this.card_name = this.card_name.slice(0, this.card_name.length - 1);

                            this.model_has_changed = false;
                            for (var item in this.fieldsVV) {
                                this.fieldsVV[item].touched = false;
                            }

                            //если карточка только что созданная todo надо проверить
                            if (this.models[this.form_base_data_model][0].id === null) {
                                var paths = this.$bRoute.path.split('/');
                                this.$bRouter.push(paths.slice(0, paths.length - 1).join('/') + '/' + res.data); // убираем '/new' из конца роута и заменяем его на id созданной карточки
                            }

                        })
                        .catch(error => {
                            console.log(" SAVING ERROR");
                            console.log(error.response)
                            result = false;
                            this.$bRouter.push({path: '/' + error.response.status})

                        })


                    if (action.code == 'save') this.$bRouter.go(-1);
                }

                else {
                    for (var item in this.fieldsVV) {
                        this.fieldsVV[item].touched = true;
                    }
                    console.log(this.fieldsVV)
                    this.$toast.error('Changes weren`t saved', '', {position: 'topRight'})
                }

                return result;

            },


            goToUrl: function (item) {
                //todo новый тип урла
                console.log(item);
                if (item.link_type == 'internal_push') this.$bRouter.push({path: this.$bRoute.path + item.link_url});
                else {
                    this.$bRouter.push(item.link_url);
                }
            },

            fillComponent: async function (route, params) {
//                debugger;

                await this.$http.post(route, params)
                    .then(res => {

                        this.form_base_data_model = res.data.form_parameters.form_base_data_model;

                        this.tabs = res.data.tabs; // сохранеям табы локально

                        this.links = res.data.links; // сохраняем ссылки локально

                        this.action_buttons = (res.data.sets && res.data.sets.card_actions) || res.data.actions.actions_card;// сохраняет кнопки с действиями локально

                        this.sets = res.data.sets || false;// сохраняет кнопки с действиями локально

                        this.models = res.data.main_data_models;// сохраняем основные модели локально

                        if (res.data.form_parameters.form_is_dependent) {

                            this.dependent = res.data.dependent;
//
                            this.dependent.dependent_fields.options = res.data.add_data_models[res.data.dependent.dependent_fields.options_data.options_data_model];
                            this.dependent.dependent_fields.options_data.search = res.data.main_data_models[res.data.dependent.dependent_data_model][0][res.data.dependent.dependent_fields.options_data.options_field_title];
//
                        }
                        // if(this.paramDataCard.dependent && this.$bRoute.path.includes('new') && this.$bRoute.path.includes('contactInfo')){
                        //     this.dependent = this.paramDataCard.dependent;
                        // }else{
                        //     this.$store.dispatch("ParamDataCard", {});
                        // }
                        this.disable_inputs_card = this.disable_inputs;
                        if (!this.disable_inputs_card) {

                            if (res.data.form_parameters.disable_inputs) {
                                this.disable_inputs_card = res.data.form_parameters.disable_inputs;
                            }
                        } else {
                            this.disable_inputs_card = true;
                        }

                        if (res.data.form_base_data_model == 'Contractors') {
                            this.models.Contractor[0].db_name = res.data.main_data_models.Contractor[0].db_name; // Дописываем в модель имя БД(чтобы показать)
                            this.models.Contractor[0].server_name = res.data.main_data_models.Contractor[0].server_name; // Дописываем в модель имя сервера(чтобы показать)
                            this.db_areas = res.data.add_data_models.DBAreas;// сохраняем список областей данных, чтобы можно было использовать вотчеры на db_area_id

                        }

                        if (res.data.form_base_data_model == 'Companies') {
                            this.models.Company[0].db_name = res.data.main_data_models.Company[0].db_name; // Дописываем в модель имя БД(чтобы показать)
                            this.models.Company[0].server_name = res.data.main_data_models.Company[0].server_name; // Дописываем в модель имя сервера(чтобы показать)
                            this.db_areas = res.data.add_data_models.DBAreas;// сохраняем список областей данных, чтобы можно было использовать вотчеры на db_area_id

                        }


                        this.add_data_models = res.data.add_data_models;//сохраняем локально дополонительные модели данных

                        this.tabs.forEach((tab) => {
                            tab.blocks.forEach((block) => {
                                block.block_fields.forEach((field) => {
                                    if (field.type == 'lt-select') {

                                        field.options = res.data.add_data_models[field.options_data.options_data_model];//заполняем селект опциями из дополнительной модели
                                        field.options_data.search = this.models[block.block_model][0][field.options_data.options_field_title];//вставляем в селект текущее значение из базы
                                    }


                                })
                            })
                        });
                        this.card_name = res.data.form_parameters.form_main_data_model_name + " (" + res.data.form_parameters.form_title + ") ";// устанавливаем заголовок карточки
//                        debugger;
                        this.loading = false;

                        //проверка на случай добавления нового запроса контрагента для замены "new"  на id
                        if(Object.values(this.$bRoute.params).indexOf('new')!==-1 && res.data['main_data_models'][this.form_base_data_model][0]['id']!=null){
                            var paths = this.$bRoute.path.split('/');
                            this.$bRouter.replace(paths.slice(0, paths.length - 1).join('/') + '/' + res.data['main_data_models'][this.form_base_data_model][0]['id']);
                        }
                    })
                    .catch(error => {
                        console.log("ERROR");
                        console.log(error.response)
                        this.$bRouter.push({path: '/' + error.response.status})

                    })
            },

            hideTab(tab) {

                if (tab.accordion) {
                    tab.visible = !tab.visible;
                }
            },

            validateChildren(component) {

                if (component.$ZONE) {
                    component.$validator.validate().then(result => {
                        this.$store.commit('validateChildren', result);
                    });
                    return;
                }

                if (component.$children.length != 0) {

                    component.$children.forEach(child => {

                        this.validateChildren(child);
                    })
                }

            },

            disableButtons(flag) {
                var buttons = Array.from(document.querySelectorAll(".btn"));

                function add(item) {
                    item.setAttribute('disabled', 'true')
                }

                function remove(item) {
                    item.removeAttribute('disabled')
                }

                if(flag)buttons.forEach(add);
                else buttons.forEach(remove);

            }

        },

        async mounted() {
            if (this.$bRoute.path.includes('Dev')) this.dev = true;
            // console.log(this.row_id_fe_route_step_object)
//            this.$CONTRACTOR = true;
            this.$store.state.validators = [];
//            Validator.localize(dictionary);

            EventBus.$on('close_step', async () => {
//                debugger
                var action = this.action_buttons.filter(action => {
                    return action.code === "apply"
                });
                var res = await this.saveModel(action[0]);
                if (res) this.$emit('modelSaved')

            });
//            const validator = new Validator({first_name: 'alpha'});
//
//            validator.localize('en');
            this.paramCard.id = (this.step_l) ? this.row_id_fe_route_step_object : this.$bRoute.params[this.$bRoute.meta.id_field];
            await this.fillComponent(this.$bRoute.meta.route, this.paramCard);
            this.$store.commit("setParamCard", {});
//
//             if (this.$bRoute.path.includes('new')) {
//
//                 this.$http.post(this.$store.getters.getAddingLink, {
//                         id: null,
//                         dependency_id: this.$store.getters.getAddingDependencyField
//                     }
//                 )
//                     .then(res => {
//                         console.log(res.data);
//                         this.form_base_data_model = res.data.form_parameters.form_base_data_model;
//
//                         this.tabs = res.data.tabs; // сохранеям табы локально
//
//                         this.links = res.data.links; // сохраняем ссылки локально
//
//                         this.action_buttons = res.data.actions.actions_card;// сохраняет кнопки с действиями локально
//
//                         this.models = res.data.main_data_models;// сохраняем основные модели локально
//
//                         if (res.data.form_parameters.form_is_dependent) {
//
//                             this.dependent = res.data.dependent;
// //
//                             this.dependent.dependent_fields.options = res.data.add_data_models[res.data.dependent.dependent_fields.options_data.options_data_model];
//                             this.dependent.dependent_fields.options_data.search = res.data.main_data_models[res.data.dependent.dependent_data_model][0][res.data.dependent.dependent_fields.options_data.options_field_title];
// //
//                         }
//
//
//                         if (res.data.form_base_data_model == 'Contractors') {
//                             this.models.Contractor[0].db_name = res.data.main_data_models.Contractor[0].db_name; // Дописываем в модель имя БД(чтобы показать)
//                             this.models.Contractor[0].server_name = res.data.main_data_models.Contractor[0].server_name; // Дописываем в модель имя сервера(чтобы показать)
//                             this.db_areas = res.data.add_data_models.DBAreas;// сохраняем список областей данных, чтобы можно было использовать вотчеры на db_area_id
//
//                         }
//
//                         if (res.data.form_base_data_model == 'Companies') {
//                             this.models.Company[0].db_name = res.data.main_data_models.Company[0].db_name; // Дописываем в модель имя БД(чтобы показать)
//                             this.models.Company[0].server_name = res.data.main_data_models.Company[0].server_name; // Дописываем в модель имя сервера(чтобы показать)
//                             this.db_areas = res.data.add_data_models.DBAreas;// сохраняем список областей данных, чтобы можно было использовать вотчеры на db_area_id
//
//                         }
//
//
//                         this.add_data_models = res.data.add_data_models;//сохраняем локально дополонительные модели данных
//
//                         this.tabs.forEach((tab) => {
//                             tab.blocks.forEach((block) => {
//                                 block.block_fields.forEach((field) => {
//                                     if (field.type == 'lt-select') {
//
//                                         field.options = res.data.add_data_models[field.options_data.options_data_model];//заполняем селект опциями из дополнительной модели
//                                         field.options_data.search = this.models[block.block_model][0][field.options_data.options_field_title];//вставляем в селект текущее значение из базы
//                                     }
//
//
//                                 })
//                             })
//                         });
//
//                         this.card_name = res.data.form_parameters.form_title + " (новый)";
//
//                         this.loading = false;
//                     })
//                     .catch(error => {
//                         console.log("ERROR");
//                         console.log(error.response)
//                         this.$bRouter.push({path: '/' + error.response.status})
//                     });
//                 return;
//
//             }
//             else {
//
//                 if (this.$parent.$STEPS) {
//                     //todo тут будет обращение к контроллеру, определяющему id записи в таблице
// //                    return;
//                 }
//
//                 await this.fillComponent(this.$bRoute.meta.route, (this.step_l) ? this.row_id_fe_route_step_object : this.$bRoute.params[this.$bRoute.meta.id_field]);
//
//                 this.$nextTick(function () {
// //                    this.watch_model_changing = true;
//                 })
//             }
        },

        updated() {
            this.watch_model_changing = true;
        },

        beforeDestroy() {
            EventBus.$off('close_step');
        },

        components: {
            Datepicker,
            AtomSpinner,
            VueEditor,
            Sector
        }
    }

</script>

<style lang="scss">
    @import '../../sass/variables';
    @import '../../sass/mixin';

    #contractor {
        padding: 0 1.5rem;
        .spinner-container {
            position: absolute;
            left: 0;
            right: 0;
            .atom-spinner {
                margin: auto;
            }
        }

        h1 {
            font-size: 2.3rem;
            color: #202a3d;
            font-weight: 700;
            margin-bottom: 2.5rem;
        }
        .page_buttons_bottom_new {
            flex-wrap: wrap;
            .btn {
                @include tablet-mobile {
                    width: 100%;
                    margin-right: 0;
                    margin-bottom: .8rem;
                }
                &:last-child {
                    margin-right: 0;
                }
            }
        }
        .contractor_list-link {
            ul {
                display: flex;
                list-style: none;
                padding: 0;
                margin: 0;
                flex-wrap: wrap;

                li {
                    //width: 26rem;
                    height: 5rem;
                    margin-bottom: 1.5rem;
                    margin-right: 1.5rem;
                    padding: 0 1.5rem;
                    border-radius: 4px;
                    border: 1px solid #ced0da;
                    background-image: linear-gradient(to top, #f1f3f7 0%, #ffffff 100%);
                    cursor: pointer;
                    flex: 0 0 auto;
                    &:last-child {
                        margin-right: 0;
                    }
                    &.link {
                        border: none;
                        /*margin-left: auto;*/
                        a {
                            text-decoration: underline;

                        }
                        &:hover {
                            border: none;
                            a {
                                color: $accent;
                            }
                        }
                    }

                    a {
                        width: 100%;
                        height: 100%;
                        display: block;
                        font-size: 1.8rem;
                        color: #788699;
                        text-decoration: none;
                        text-align: center;
                        line-height: 4.6rem;
                        transition: .25s all;
                    }
                    &:hover {
                        border: 1px solid $accent;
                        a {
                            color: $accent;
                        }
                    }
                    &.active {
                        background: #ffffff;
                        a {
                            color: $accent;
                            font-weight: 700;
                        }
                    }
                }
            }
        }

        .vdp-datepicker__calendar {
            //top: -25rem;
            //height: 26rem;
            bottom: 100%;
            .cell {
                height: 3rem !important;
                line-height: 3rem !important;
            }
        }
        .dependent {
            height: 100%;
            .dropdown {
                margin-top: 1.3rem;
                width: 100%;
                height: 100%;
                .btn-dropdown {
                    width: 100%;
                    height: 100%;
                    font-size: 1.6rem;
                    line-height: 1.6rem;
                    border: none;
                    margin-right: 0;
                    img {
                        /*position: absolute;*/
                        /*right: 0;*/
                        /*padding-right: 1rem;*/

                        position: absolute;
                        right: 10px !important;
                        padding-right: 1rem !important;
                        width: auto !important;
                        height: auto !important;
                        background-image: none !important;
                    }
                    input {
                        position: absolute;
                        left: 0;
                        right: 0;
                        margin-top: 0;
                        width: 100%;
                        height: 100%;
                        border-radius: 4px;
                        border: 1px solid #ced0da;
                        background-color: #ffffff;
                        padding-left: 2rem;
                        font-size: 1.5rem;
                        padding-right: 1.5rem;
                    }
                }
                .dropdown_box {
                    max-height: 20rem;
                    overflow: auto !important;
                    width: 100%;
                    top: -.5rem;
                    box-shadow: 4px 5px 2rem rgba(0, 0, 0, 0.29);
                    z-index: 100;
                    /*border:1px solid #ababab;*/
                    .li-selected {
                        button {
                            text-decoration: none;
                            color: #202b3d;
                            background-color: #d7dde3;
                        }
                    }
                }
            }

            .dependent-label {
                /*height: 100%;
                display: flex;
                !*justify-content: center;*!
                align-items: center;
                padding-left: 2rem;
                background-color: $white-color;
                border-radius: 4px;
                border: $border;
                p {
                    font-size: 1.8rem;
                    color: $dark-grey;
                }*/
                border-radius: 4px;
                border: 1px solid #ced0da;
                background-color: #ffffff;
                background-image: linear-gradient(to top, #f1f3f7 0%, #ffffff 100%);
                margin-left: 0;
                color: #7c8ca5;
                display: -ms-inline-flexbox;
                display: inline-flex;
                -ms-flex-align: center;
                align-items: center;

                box-shadow: none;
                text-align: left;
                position: relative;
                padding: 1rem 2.4rem;
                transition: .25s all;
                z-index: 99;
                display: flex;
                p {
                    font-size: 1.8rem;
                    line-height: 1.42857143;;
                }
            }
        }
        .tab {
            margin-bottom: 2rem;
        }
        .tab_info {
            h2 {
                font-weight: 600;
                font-size: 24px;
            }
            P {
                margin-top: 10px;
                color: #71757b;
                line-height: 1.3;
            }

            .tab-heading {
                align-items: center;

                h2, svg {
                    cursor: pointer;
                }
                svg {
                    transition: all .3s;
                    &.rotate {
                        transform: rotate(90deg);
                    }
                    margin-left: 1rem;
                    path {
                        fill: #71757b;
                    }
                }
            }
        }
        .tab_box {
            /*border: 1px solid #e6eaee;*/
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            margin-top: 3rem;
            padding-bottom: 3rem;
            background-color: $white-color;

            .block-row {
                flex-wrap: nowrap;
                margin-bottom: 3rem;
                @include desktop-max-little {
                    flex-wrap: wrap;
                }

                .grid {
                    @include tablet-big {
                        width: 100%;
                    }
                    @include phone {
                        display: flex;
                        flex-direction: column;
                    }

                    width: 50%;
                    display: grid;
                    grid-template-columns: 50% 50%;
                    grid-auto-rows: 9.36rem;
                }
            }
            .jodit_container {
                margin-top: 1rem;
            }
            /*<!--.block {-->*/
            /*<!--display: flex;-->*/
            /*<!--width: 50%;-->*/
            /*<!--.contractor_box {-->*/
            /*<!--background: #fff;-->*/
            /*<!--width: 100%;-->*/
            /*<!--!*padding: 5rem 0;*!-->*/
            /*<!--margin-left: 0;-->*/
            /*<!--margin-right: 0;-->*/
            /*<!--!*margin-top: 3rem;*!-->*/
            /*<!--!*border-radius: 4px;*!-->*/

            /*<!--.field-box {-->*/
            /*<!--margin-bottom: 1.5rem;-->*/
            /*<!--margin-top: 1.5rem;-->*/
            /*<!--label {-->*/
            /*<!--color: #202a3d;-->*/
            /*<!--font-size: 1.4rem;-->*/
            /*<!--display: flex;-->*/
            /*<!--font-weight: 600;-->*/
            /*<!--min-height: 1.6rem;-->*/
            /*<!--padding-left: .3rem;-->*/
            /*<!--}-->*/
            /*<!--input {-->*/
            /*<!--width: 100%;-->*/
            /*<!--height: 3.5rem;-->*/
            /*<!--border-radius: 4px;-->*/
            /*<!--border: 1px solid #ced0da;-->*/
            /*<!--background-color: #ffffff;-->*/
            /*<!--padding-left: 1.7rem;-->*/
            /*<!--font-size: 1.5rem;-->*/
            /*<!--margin-top: 1.3rem;-->*/
            /*<!--padding-right: 1.5rem;-->*/
            /*<!--}-->*/
            /*<!--.quillWrapper {-->*/
            /*<!--width: 100%;-->*/
            /*<!--border-radius: 4px;-->*/
            /*<!--border-color: #ced0da;-->*/
            /*<!--background-color: #ffffff;-->*/
            /*<!--margin-top: 1.3rem;-->*/
            /*<!--}-->*/
            /*<!--select {-->*/
            /*<!--width: 100%;-->*/
            /*<!--margin-top: 1.3rem;-->*/
            /*<!--height: 3.5rem;-->*/
            /*<!--border-radius: 4px;-->*/
            /*<!--border: 1px solid #ced0da;-->*/

            /*<!--padding-left: 1.7rem;-->*/
            /*<!--}-->*/
            /*<!--//стили для дропдауна с поиском-->*/

            /*<!--.dropdown {-->*/
            /*<!--margin-top: 1.3rem;-->*/
            /*<!--width: 100%;-->*/
            /*<!--.btn-dropdown {-->*/
            /*<!--width: 100%;-->*/
            /*<!--height: 3.5rem;-->*/
            /*<!--font-size: 1.6rem;-->*/
            /*<!--line-height: 1.6rem;-->*/
            /*<!--border: none;-->*/
            /*<!--margin-right: 0;-->*/
            /*<!--margin-bottom: 0;-->*/
            /*<!--img.btn-dropdown {-->*/
            /*<!--position: absolute !important;-->*/
            /*<!--right: 0 !important;-->*/
            /*<!--padding-right: 1rem !important;-->*/
            /*<!--width: auto !important;-->*/
            /*<!--height: auto !important;-->*/
            /*<!--background-color: transparent !important;-->*/
            /*<!--background-image: none !important;-->*/
            /*<!--}-->*/
            /*<!--input {-->*/
            /*<!--color: $base-color;-->*/
            /*<!--position: absolute;-->*/
            /*<!--left: 0;-->*/
            /*<!--right: 0;-->*/
            /*<!--margin-top: 0;-->*/
            /*<!--}-->*/
            /*<!--}-->*/
            /*<!--.dropdown_box {-->*/
            /*<!--max-height: 20rem;-->*/
            /*<!--overflow: auto !important;-->*/
            /*<!--width: 96%;-->*/
            /*<!--margin-top: 3.5rem;-->*/
            /*<!--box-shadow: 4px 5px 2rem rgba(0, 0, 0, 0.29);-->*/
            /*<!--z-index: 100;-->*/
            /*<!--!*border:1px solid #ababab;*!-->*/
            /*<!--.li-selected {-->*/
            /*<!--button {-->*/
            /*<!--text-decoration: none;-->*/
            /*<!--color: #202b3d;-->*/
            /*<!--background-color: #d7dde3;-->*/
            /*<!--}-->*/
            /*<!--}-->*/
            /*<!--}-->*/
            /*<!--}-->*/

            /*<!--.contractor_checkbox {-->*/
            /*<!--height: 3.5rem;-->*/
            /*<!--display: flex;-->*/
            /*<!--align-items: center;-->*/

            /*<!--label {-->*/
            /*<!--margin-top: .7rem;-->*/
            /*<!--}-->*/
            /*<!--}-->*/
            /*<!--.contractor_parag {-->*/
            /*<!--height: 3.5rem;-->*/
            /*<!--margin-top: 1.2rem;-->*/
            /*<!--display: flex;-->*/
            /*<!--align-items: center;-->*/
            /*<!--padding-left: 1.7rem;-->*/
            /*<!--p {-->*/
            /*<!--margin-bottom: 0;-->*/
            /*<!--word-break: break-all;-->*/
            /*<!--}-->*/

            /*<!--}-->*/

            /*<!--.vv-error {-->*/
            /*<!--font-size: 1.3rem;-->*/
            /*<!--color: $light-grey;-->*/
            /*<!--padding-left: 2rem;-->*/
            /*<!--position: absolute;-->*/
            /*<!--!*display: contents;*!-->*/
            /*<!--}-->*/

            /*<!--.label-green {-->*/
            /*<!--color: $accent;-->*/
            /*<!--font-size: 1.7rem;-->*/
            /*<!--!*letter-spacing: 1px;*!-->*/
            /*<!--font-weight: 400;-->*/
            /*<!--}-->*/

            /*<!--textarea, .textareaView {-->*/
            /*<!--min-width: 100%;-->*/
            /*<!--max-width: 100%;-->*/
            /*<!--min-height: 13rem;-->*/
            /*<!--height: 6rem;-->*/
            /*<!--border: 1px solid #ced0da;-->*/
            /*<!--border-radius: 4px;-->*/
            /*<!--margin-top: 1.3rem;-->*/
            /*<!--resize: none;-->*/

            /*<!--&:focus {-->*/
            /*<!--outline-style: inherit;-->*/
            /*<!--outline-width: 0;-->*/
            /*<!--}-->*/
            /*<!--}-->*/
            /*<!--.fa-pencil {-->*/
            /*<!--position: absolute;-->*/
            /*<!--right: 2rem;-->*/
            /*<!--bottom: 2rem;-->*/
            /*<!--color: $accent;-->*/
            /*<!--cursor: pointer;-->*/
            /*<!--}-->*/
            /*<!--}-->*/
            /*<!--}-->*/

            /*<!--.left-zone,-->*/
            /*<!--.right-zone {-->*/
            /*<!--display: flex;-->*/
            /*<!--flex-wrap: wrap;-->*/
            /*<!--!*height:100%;*!-->*/
            /*<!--@include desktop-max-little {-->*/
            /*<!--max-width: 50%;-->*/

            /*<!--}-->*/
            /*<!--@include tablet-big {-->*/
            /*<!--max-width: 100%;-->*/
            /*<!--}-->*/

            /*<!--@include tablet-mobile {-->*/
            /*<!--.col-md-4 {-->*/
            /*<!--min-width: 100% !important;-->*/
            /*<!--}-->*/
            /*<!--min-width: 100%;-->*/

            /*<!--}-->*/

            /*<!--!*@media all and(max-width: 1250px) {*!-->*/
            /*<!--!*background-color: green;*!-->*/
            /*<!--!*max-width: 50%;*!-->*/
            /*<!--!*}*!-->*/
            /*<!--min-width: 50%;-->*/

            /*<!--max-width: 50%;-->*/
            /*<!--.col-md-16 {-->*/
            /*<!--max-width: 100%;-->*/
            /*<!--min-width: 100%;-->*/
            /*<!--@media all and(min-width: 992px) {-->*/
            /*<!--order: unset !important;-->*/

            /*<!--}-->*/
            /*<!--}-->*/

            /*<!--.col-md-12 {-->*/
            /*<!--@media all and(min-width: 992px) {-->*/
            /*<!--order: unset !important;-->*/

            /*<!--}-->*/
            /*<!--min-width: 75%;-->*/
            /*<!--max-width: 75%;-->*/
            /*<!--}-->*/

            /*<!--.col-md-8 {-->*/
            /*<!--max-width: 50%;-->*/
            /*<!--min-width: 50%;-->*/
            /*<!--@media all and(min-width: 992px) {-->*/
            /*<!--order: unset !important;-->*/

            /*<!--}-->*/

            /*<!--@include tablet-big {-->*/
            /*<!--max-width: 50%;-->*/
            /*<!--min-width: 50%;-->*/
            /*<!--}-->*/

            /*<!--@include tablet-mobile {-->*/
            /*<!--max-width: 100%;-->*/
            /*<!--min-width: 100%;-->*/
            /*<!--}-->*/
            /*<!--}-->*/

            /*<!--.col-md-4 {-->*/
            /*<!--max-width: 25%;-->*/
            /*<!--min-width: 25%;-->*/
            /*<!--@media all and(min-width: 992px) {-->*/
            /*<!--order: unset !important;-->*/

            /*<!--}-->*/

            /*<!--@include tablet-big {-->*/
            /*<!--max-width: 50%;-->*/
            /*<!--min-width: 50%;-->*/
            /*<!--}-->*/
            /*<!--@include tablet-mobile {-->*/
            /*<!--max-width: 100%;-->*/
            /*<!--min-width: 100%;-->*/
            /*<!--}-->*/
            /*<!--}-->*/

            /*<!--.col10 {-->*/
            /*<!--@media all and(min-width: 992px) {-->*/
            /*<!--order: unset !important;-->*/

            /*<!--}-->*/

            /*<!--max-width: 10%;-->*/
            /*<!--min-width: 10%;-->*/
            /*<!--padding-left: 15px;-->*/
            /*<!--padding-right: 15px;-->*/
            /*<!--@include tablet-mobile {-->*/
            /*<!--max-width: 100% !important;-->*/
            /*<!--min-width: 100% !important;-->*/
            /*<!--}-->*/
            /*<!--}-->*/

            /*<!--.col20 {-->*/
            /*<!--@extend .col10;-->*/
            /*<!--max-width: 20%;-->*/
            /*<!--min-width: 20%;-->*/
            /*<!--}-->*/

            /*<!--.col30 {-->*/
            /*<!--@extend .col10;-->*/
            /*<!--max-width: 30%;-->*/
            /*<!--min-width: 30%;-->*/
            /*<!--}-->*/

            /*<!--.col33 {-->*/
            /*<!--@extend .col10;-->*/
            /*<!--max-width: 33.3%;-->*/
            /*<!--min-width: 33.3%;-->*/
            /*<!--}-->*/

            /*<!--.col40 {-->*/

            /*<!--max-width: 40%;-->*/
            /*<!--min-width: 40%;-->*/
            /*<!--@extend .col10;-->*/
            /*<!--}-->*/

            /*<!--.col60 {-->*/
            /*<!--@extend .col10;-->*/
            /*<!--min-width: 60%;-->*/
            /*<!--max-width: 60%;-->*/
            /*<!--}-->*/

            /*<!--.col70 {-->*/
            /*<!--@extend .col10;-->*/
            /*<!--min-width: 70%;-->*/
            /*<!--max-width: 70%;-->*/
            /*<!--}-->*/

            /*<!--.col80 {-->*/
            /*<!--@extend .col10;-->*/
            /*<!--min-width: 80%;-->*/
            /*<!--max-width: 80%;-->*/
            /*<!--}-->*/

            /*<!--.col90 {-->*/
            /*<!--@extend .col10;-->*/
            /*<!--min-width: 90%;-->*/
            /*<!--max-width: 90%;-->*/
            /*<!--}-->*/

            /*<!--}-->*/
            /*<!--.border-right {-->*/
            /*<!--border-right: $border;-->*/
            /*<!--}-->*/

            /*<!--.full-width {-->*/
            /*<!--width: 100%;-->*/
            /*<!--max-width: 100%;-->*/
            /*<!--}-->*/
            /*<!--}-->*/
            .full-width {
                width: 100%;
                max-width: 100%;
            }
            .checkbox-disabled {
                pointer-events: none;
            }
        }
    }

    .rb #contractor {
        .contractor_list-link {
            ul li {
                border-radius: 3px;
                height: 4rem;
                border-color: $tabbd;
                background-image: none;
                background-color: transparent;
                //margin-right: 0;
                //width:130/11*1rem;
                a {
                    line-height: 4rem;
                    font-size: 1.45rem;
                    color: $sbarbg;

                }
                &.active {
                    background-color: $menubtnColor !important;
                    a {
                        color: white;
                    }
                }
            }
        }
        #list {
            th {
                padding-left: 1rem;
                text-align: center;
                font-size: 1.3rem;
            }
            td {
                padding-left: 1rem;
                text-align: center;
                p {
                    font-size: 1.3rem;
                }
            }
            .table__thead__overflow {

                overflow: inherit;
                white-space: normal;
                text-overflow: inherit;
            }
        }
    }

    .dlink {
        &-p {
            display: flex;
            margin: .5rem 0;
            color: $base-color;
            font-size: 1.5rem;
            align-items: center;
        }
        &-name {
            flex: 1 1 auto;
            min-width: 1rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: inherit;
            font-size: inherit;
        }
        &-link {
            flex: 0 0 auto;
            margin-left: auto;
            font-weight: bold;
            color: inherit;
            font-size: inherit;

        }
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }

</style>
