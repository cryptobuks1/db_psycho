<template>
    <div class="zone">
        <!--если количество зон == 1, выводим только левую  -->

        <div v-for="(item,index) in fields"
             :class="{
                                                 'col-md-16':item.width=='100%',
                                                 'col-md-12':item.width=='75%',
                                                 'col-md-8':item.width=='50%',
                                                 'col-md-4':item.width=='25%',
                                                 'col10':item.width=='10%',
                                                 'col20':item.width=='20%',
                                                 'col30':item.width=='30%',
                                                 'col33':item.width=='33%',
                                                 'col40':item.width=='40%',
                                                 'col60':item.width=='60%',
                                                 'col66':item.width=='66%',
                                                 'col70':item.width=='70%',
                                                 'col80':item.width=='80%',
                                                 'col90':item.width=='90%',
                                                 'border-right':item.border_right,
                                             }"
             :style="{'order':item.order}"

        >
            <!-- Выставляем ширину колонки в зависимости от параметра -->

            <div :class="[{'field-box':true, 'hidden':item.hidden},item.display && item.display.length > 0 ? 'field-box__'+item.display : false]">

                <label class="clip"
                       :class="{'label-green': item.type=='title'}">{{item.type == 'checkbox' ? "" :
                    item.title}}</label>

                <div style="position: relative;">
                    <input v-validate="item.validation"
                           v-if="item.type=='text'"
                           :type="item.type"
                           :name="item.model"
                           :disabled="disable_inputs"
                           v-model="model[0][item.model]"
                           @input="modelChangeHandler"

                           :class="{'valid':fieldsVV[item.model]&&fieldsVV[item.model].valid&&fieldsVV[item.model].touched && item.validation, 'invalid':fieldsVV[item.model]&&fieldsVV[item.model].invalid&&fieldsVV[item.model].touched && item.validation}"
                    >
                    <svg class="svg-invalid" width="16" height="16" viewBox="0 0 16 16">
                        <path id="Forma_1"
                              d="M1284,590a8,8,0,1,0,8,8A8,8,0,0,0,1284,590Zm4,10.868L1286.87,602l-2.87-2.868L1281.13,602l-1.13-1.132,2.87-2.868-2.87-2.868,1.13-1.132,2.87,2.868,2.87-2.868,1.13,1.132L1285.13,598Z"
                              transform="translate(-1276 -590)"/>
                    </svg>
                    <svg class="svg-valid" width="16" height="16" viewBox="0 0 16 16">
                        <path id="Forma_1"
                              d="M1284,494a8,8,0,1,0,8,8A8.01,8.01,0,0,0,1284,494Zm4.46,5.332-4.92,5.538a0.61,0.61,0,0,1-.46.207,0.631,0.631,0,0,1-.39-0.135l-3.07-2.461a0.613,0.613,0,1,1,.76-0.962l2.62,2.1,4.54-5.1A0.616,0.616,0,1,1,1288.46,499.332Z"
                              transform="translate(-1276 -494)"/>
                    </svg>
                </div>


                <select v-if="item.type=='select'" :name="item.model"
                        v-model="model[item.model]"
                        :disabled="disable_inputs"
                        @change="modelChangeHandler"
                >
                    <option v-if="item.model=='db_area_id'" value="">Открепить</option>
                    <option value="">1ewf</option>
                    <option value="">2ewfwe</option>
                    <option v-if="item.model=='country_id'" v-for="opt in item.options"
                            :value="opt.id">{{opt.country_name}}
                    </option>
                    <option v-if="item.model=='db_area_id'" v-for="opt in item.options"
                            :value="opt.id">{{opt.db_area_code}}
                    </option>
                </select>

                <div v-if="item.type=='lt-select'" class="dropdown">
                    <button class="btn btn-dropdown " :disabled="disable_inputs" @click="dropdownClick ">
                        <input type="text" v-model="item.options_data.search"
                               class="dropwond_link filterSelect clip"
                               @input="selectSearch(item)"
                               :disabled="disable_inputs"
                               @keypress="dropDownKeyPress"
                               @keyup="dropDownArrows($event,item,  model[0])">
                        {{item.value}}
                        <img class="drop-i btn-dropdown" src="/img/dropdown-i.png"
                             alt="" @click="dropImgClick">
                    </button>  <!-- dropdown -->
                    <transition name="fade">
                        <div class="dropdown_box dropdown_box_select">
                            <ul>

                                <li v-for="(option, index) in item.options"
                                    :data-select="index"
                                    :class="{'li-selected':index==currentOption}"
                                >
                                    <button @click="chooseSelectItem(item, option, model[0])"
                                            @mouseover="hoverSelectItem"
                                            class="dropwond_link">
                                        {{option[item.options_data.options_field_title]}}
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </transition>
                </div>

                <div class="contractor_checkbox checkbox "
                     :class="{'checkbox-disabled':item.disabled}"
                     v-if="item.type=='checkbox'">
                    <label :for="item.model">
                        <input :disabled="item.disabled || disable_inputs" :name="item.model"
                               type="checkbox" :id="item.model"
                               @change="checkboxChange"
                               v-model="model[0][item.model]">
                        <span class="checkbox-custom"><i class="fa fa-check"></i></span>
                        <span> {{item.title}}</span>
                    </label>
                </div>

                <!--<div class="contractor_parag" v-if="item.type=='label'">-->
                <!--<p>{{model[0][item.model]}}</p>-->
                <!--</div>-->
                <input v-if="item.type=='label'"
                       type="text"
                       v-model="model[0][item.model]"
                       :disabled="disable_inputs"
                       unselectable="on"
                       onselectstart="return false;"
                       onmousedown="return false;"
                >

                <datepicker v-if="item.type=='date'"
                            :language="datapicker_translations.en"
                            :format="'dd/MM/yyyy'"
                            :disabled="disable_inputs"
                            v-model="model[0][item.model]"
                            @input="modelChangeHandler"
                ></datepicker>

                <template v-if="item.type=='editor'">
                    <!--                    <vue-editor v-model="model[0][item.model]"></vue-editor>-->
                    <!--                    <div id="editor"></div>-->
                    <!--                    <froala :config="config" v-model="model[0][item.model]"></froala>-->
                    <jodit-vue v-model="model[0][item.model]"/>

                </template>
                <!--<textarea v-if="item.type=='textarea'"-->
                <!--v-model="models[block.block_model][0][item.model]"-->
                <!--@input="modelChangeHandler" >-->
                <!--</textarea>-->
                <div class="textareaView ql-editor" v-if="item.type=='textarea'"
                     v-html="model[0][item.model]"></div>

                <div class="dlink" v-if="item.type=='dlink' ">
                    <p class="dlink-p" v-for="link in item.list">
                        <span class="dlink-name"> {{link.name }}</span>
                        <a :href="link.link" class="dlink-link"> {{link.title}} </a>
                    </p>
                </div>

                <div class="img-previev" v-if="item.type=='img-previev'">
                    <img :src="dynamicsrc" alt="">
                </div>


                <input class="" v-validate="item.validation"
                       v-if="item.type=='disabledInput'"
                       type="text"
                       :name="item.model"
                       v-model="item.model"

                       unselectable="on"
                       onselectstart="return false;"
                       onmousedown="return false;"


                       :class="{'valid':fieldsVV[item.model]&&fieldsVV[item.model].valid&&fieldsVV[item.model].touched && item.validation, 'invalid':fieldsVV[item.model]&&fieldsVV[item.model].invalid&&fieldsVV[item.model].touched && item.validation}"
                >

                <div v-if="item.type==='radiobuttons'" class="radiobuttons"
                     :class="['radiobuttons-'+item.options.view,'radiobuttons-'+item.options.direction]">
                    <p v-for="button in item.list"
                       :style="button.margin"
                       class="radiobuttons__item">
                        <label :for="button.name">
                            {{button.title}}
                            <input class="radiobuttons__input" :value="button.value"
                                   v-validate="item.validation"
                                   @change="item.additional ? item.additional.value = '':false"
                                   :name="item.model"
                                   :id="button.value"
                                   type="radio"
                                   v-model="model[0][item.model]">
                            <span class="radiobuttons__span"></span>
                        </label>
                    </p>
                    <p v-if="item.additional"
                       class="radiobuttons__item radiobuttons__item-additional">
                        <label>{{item.additional.title}}</label>

                        <input
                                :type="item.additional.type"
                                :name="item.model"
                                v-mask="item.additional.mask"
                                :placeholder="item.additional.mask"
                                v-model="item.additional.value"
                                @input="model[0][item.model] = $event.target.value"
                                v-validate="item.additional.validation"
                                :class="{
                                'valid':fieldsVV[item.model]&&fieldsVV[item.model].valid&&fieldsVV[item.model].touched && item.additional.validation,
                                'invalid':fieldsVV[item.model]&&fieldsVV[item.model].invalid&&fieldsVV[item.model].touched && item.additional.validation}"
                        >
                    </p>
                </div>
                <div v-if="item.type=='double-date'" class="double-datepicker">
                    <span>C</span>
                    <datepicker :language="datapicker_translations.ru"
                                :format="'dd/MM/yyyy'"
                                v-model="model[0][item.model]['from']"
                                @input="modelChangeHandler"
                    ></datepicker>
                    <span>по</span>
                    <datepicker :language="datapicker_translations.ru"
                                :format="'dd/MM/yyyy'"
                                v-model="model[0][item.model]['to']"
                                @input="modelChangeHandler"
                    ></datepicker>
                    <span @click="loadContent(model[0][item.model]['from'],model[0][item.model]['to'], $event)">Скачать</span>
                </div>

                <div v-if="item.type==='file_loader'" class="file-loader">
                    <div class="loader-header">
                        <span class="invalid">{{ errors.first('att_file')}}</span>
                        <input type="file" style="display: none;" name="att_file" id="att_file" accept="image/*,.pdf"
                               v-validate="item.validation" @change="addFile($event, item)">
                        <label for="att_file">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="svg replaced-svg">
                                <path d="M17.1 2.9C15.2 1 12.7 0 10 0S4.8 1 2.9 2.9 0 7.3 0 10s1 5.2 2.9 7.1S7.3 20 10 20s5.2-1 7.1-2.9S20 12.7 20 10s-1-5.2-2.9-7.1zM10 18.4c-4.7 0-8.4-3.8-8.4-8.4S5.3 1.6 10 1.6s8.4 3.8 8.4 8.4-3.7 8.4-8.4 8.4zm.8-9.2h3.5v1.6h-3.5v3.5H9.2v-3.5H5.7V9.2h3.5V5.7h1.6v3.5z"></path>
                            </svg>

                        </label>
                    </div>
                    <div class="loader-body">

                        <bTable
                                :items="model[0][item.model]"
                                :fields="item.fields"
                        >
                            <template slot="list_actions" slot-scope="items">

                                <div class="list-actions">

                                    <template v-for="action in item.item_actions.att_file_bar">

                                        <div v-if="action.code=='view_att_file'"
                                             class="list_action-btn"
                                             @click.stop>
                                            <button :class="{'showModal':true, 'active':true}"
                                                    @click="att_file_action(action, items.item)"
                                            >
                                                <img src="/img/interfacedashboard/info.svg" class="svg" alt="">
                                            </button>
                                        </div>
                                        <!--Скачать отчёт-->
                                        <div v-if="action.code=='download_att_file'"
                                             class="list_action-btn"
                                             @click.stop>

                                            <button :class="{'showModal':true, 'active':true}"
                                                    @click="att_file_action(action, items.item)"
                                            >
                                            <img src="/img/interfacedashboard/download.svg" class="svg"
                                                 alt="">
                                            </button>

                                        </div>
                                        <!--Удалить отчёт-->
                                        <div v-if="action.code=='delete_att_file'"
                                             class="list_action-btn"
                                             @click.stop>

                                            <button  @click="att_file_action(action, items.item)"
                                            >
                                                <img src="/img/interfacedashboard/remove.svg" class="svg"
                                                     alt="">
                                            </button>
                                        </div>
                                    </template>

                                </div>

                            </template>

                        </bTable>
                    </div>

                </div>

                <i @click="openEditor(model[0],item.model)" v-if="item.type=='textarea'" class="fa fa-pencil"></i>
                <span class="vv-error">
                    {{ errors.first('' + item.model) || item.tip}}</span>

            </div>

        </div>

    </div>
</template>

<script>
    import {EventBus} from '../app';
    import {en, ru} from 'vuejs-datepicker/dist/locale';
    import bTable from 'bootstrap-vue/es/components/table/table';
    import Datepicker from 'vuejs-datepicker';
    import {Validator} from 'vee-validate';
    import 'jodit/build/jodit.min.css'
    import JoditVue from 'jodit-vue'
    import axios from 'axios';

    const dictionary = {
        en: {
            messages: {
                required: (e) => 'This field is required'
            }
        },

    };
    export default {
        data() {
            return {
                model_has_changed: false,
                currentOption: -1,
                selectedImg: null,
                config: {
                    language: 'ru',
                    theme: "dark",
                    heightMin: 150,
                    heightMax: 500,
                    fontFamily: {
                        'Proxima Nova,sans-serif': 'Proxima Nova',
                        'Arial,Helvetica,sans-serif': 'Arial',
                        'Impact,Charcoal,sans-serif': 'Impact',
                        'Tahoma,Geneva,sans-serif': 'Tahoma'
                    },
                    fontFamilyDefaultSelection: 'Proxima Nova',
                },
                datapicker_translations: {
                    en: en,
                    ru: ru,
                },
                editorInitialized: false,
                fontFamilySelection: true
            }
        },

        computed: {
            dynamicsrc() {
                return this.selectedImg || this.model[0].image_path;
            }
        },

        methods: {
            modelChangeHandler: function () {
                this.model_has_changed = true;
            },

            dropdownClick: function (e) {
                this.currentOption = -1;
            },

            selectSearch: function (item) {
                this.model_has_changed = true;

                if (arguments.length == 1) {
                    item.options = this.add_models[item.options_data.options_data_model].filter((i) => {
                        return i[item.options_data.options_field_title].toLowerCase().includes(item.options_data.search.toLowerCase());
                    });// Осуществляем поиск по массиву возможных опций при нажатии клавиши в поле поиска
                }
                this.currentOption = -1
            },

            chooseSelectItem: function (item, option, modelObj) {
                //item -  обьект поля, на котором произошло событие
                // option -обьект опции, которую выбрали
                //                modelObj - модель, которую будем обновлять
                this.model_has_changed = true;
                this.selectedImg = option.image_path;
                modelObj[item.model] = option[item.options_data.options_field_id]; // записываем id в модель
                item.options_data.search = option[item.options_data.options_field_title]; // обновляем надпись в поле поиска, чтоб пользователь видел текущую выбранную опцию
            },

            //устанавливаем выделение на строку под курсором
            hoverSelectItem: function (e) {

                this.currentOption = e.target.parentNode.getAttribute('data-select');
            },

            dropDownKeyPress: function (e) {
                e.target.parentNode.nextSibling.nextSibling.classList.add("open");

            }, // открывает список возможных опций при нажатии клавиши в поле поиска

            dropDownArrows: function (e, item, modelObj) {
                //проверяем, есть ли элементы в списке опций
                if (e.target.parentNode.nextElementSibling.childNodes[0] && e.target.parentNode.nextElementSibling.childNodes[0].childNodes[0]) {
                    let listHeight = e.target.parentNode.nextElementSibling.childNodes[0].childNodes[0].offsetHeight;// вычисляем высоту каждой опции
                    let listQuantity = e.target.parentNode.nextElementSibling.childNodes[0].childNodes.length;// вычисляем кол-во опций
//                    console.log(e.keyCode)


                    if (e.keyCode == 40) {
                        if (this.firstSelectKeyPress) {
                            this.firstSelectKeyPress = false;
                            this.currentOption = 0;
                        } else {
                            if (this.currentOption < listQuantity - 1) this.currentOption++;
                            if (this.currentOption > 2) e.target.parentNode.nextElementSibling.scrollTop += listHeight;
                            this.previous_dr_act = 'down';

//                            console.log(e.target.parentNode.nextElementSibling.children[0].querySelector('li[data-select' + this.currentOption + ']'))
                        }
                    }

                    if (e.keyCode == 38) {
                        if (this.currentOption != 0) this.currentOption--;
                        e.target.parentNode.nextElementSibling.scrollTop -= listHeight;
                        this.previous_dr_act = 'up';
                    }

                    if (e.keyCode == 13) {
                        var elem = e.target.parentNode.nextElementSibling.childNodes[0].childNodes;
                        let index;
                        elem = Array.from(elem);
                        elem.forEach((lis) => {
                            if (lis.classList.contains('li-selected')) {
                                index = lis.getAttribute('data-select');

                            }
                        });


                        modelObj[item.model] = item.options[index][item.options_data.options_field_id];// записываем id в модель
                        item.options_data.search = item.options[index][item.options_data.options_field_title];// обновляем надпись в поле поиска, чтоб пользователь видел текущую выбранную опцию
                        e.target.parentNode.nextElementSibling.classList.remove('open') // закрываем блок с опциями
//                        console.log(e.target.parentNode.nextElementSibling)
                    }
                }
            },

            dropImgClick(e) {

                var dropdown_box = e.target.closest(".dropdown").getElementsByClassName("dropdown_box")[0];

                dropdown_box.classList.toggle('open');
                e.stopPropagation();
            },//закрытие дропдауна по клику на картинку

            checkboxChange: function (e) {
                this.model_has_changed = true;
//                console.log(this.relevance);
            },

            openEditor(model, name) {
                this.$store.commit('showModal', {
                    editor: {val: model[name], model, name}, type: 'editorModal', texts: {
                        save: 'save',
                        cancel: 'cancel'
                    }
                });
            },

            loadContent(from, to, e) {
                //todo  узнать, надо ли проверять эти поля валидатором
                //проверка на пустоту
                if (from == '' || to == '') {
                    this.errors.add({
                        field: 'date',
                        msg: 'Пустое поле'
                    });
                    Array.from(e.target.parentElement.getElementsByTagName('input')).forEach(input => {
                        input.classList.add('invalid');
                    })
                    return;
                } else {
                    this.errors.remove('date');
                    Array.from(e.target.parentElement.getElementsByTagName('input')).forEach(input => {
                        input.classList.remove('invalid');
                    })

                }

                var dateFrom = new Date(Date.parse(from));
                var dateTo = new Date(Date.parse(to));

                //проверка на вхождение в интервал
                if (dateFrom > dateTo) {
                    console.log('Error! date1 is < then 2')
                    console.log(this.fieldsVV);
                    console.log(this.errors)
                    this.errors.add({
                        field: 'date',
                        msg: 'Поля заполнены неверно'
                    });
                    Array.from(e.target.parentElement.getElementsByTagName('input')).forEach(input => {
                        input.classList.add('invalid');
                    })
                } else {
                    this.errors.remove('date');
                    Array.from(e.target.parentElement.getElementsByTagName('input')).forEach(input => {
                        input.classList.remove('invalid');
                    })
                }
            },

            async addFile(e, item) {
                var reader = new FileReader();

                if (e.target.files[0]) {
                    var name = e.target.files[0].name;
                    name = name.slice(0, name.lastIndexOf('.'));
                    var main_data_models = JSON.parse(JSON.stringify(item['empty_model']));
                    main_data_models[this.model_name][0]['db_area_file_name'] = name;
                    var obj = {
                        id: null,
                        storedFile: {
                            stored_file_name: name,
                            stored_file_ext: e.target.files[0].name.slice(e.target.files[0].name.lastIndexOf(".") + 1),
                            stored_file_size: e.target.files[0].size,
                            table_n_doc: main_data_models[this.model_name][0]['table_n_doc'],
                            row_id_doc: main_data_models[this.model_name][0]['row_id_doc'],
                        }
                    };


                    reader.readAsDataURL(e.target.files[0]);

                    this.$validator.validate('att_file').then(res => {
                        if (res) {
                            reader.onload = async (e) => {
                                var mime = e.target.result.split(',');
                                obj['storedFile']['stored_file_bd'] = mime[1];
                                obj['storedFile']['stored_file_mime_type']=mime[0];
                                main_data_models[this.model_name][0]['stored_file'] = obj;
                                axios.post('/admin/dbArea/file/write', {
                                    main_data_models: main_data_models,
                                    form_parameters: {form_base_data_model: this.model_name}
                                })
                                    .then(res => {
                                        this.model[0][item.model].push(res.data);
                                        document.getElementById('att_file').value = '';
                                    })
                                    .catch(error => {
                                        this.$toast.error(error.response.data.message, '' + error.response.status, {position: 'topRight'})
                                    })


                            }
                        }
                    });
                }
            },

            att_file_action(action, model){
              var  data={};
                if(action.code==='delete_att_file'){
                    data['main_model']=this.model_name;
                    data['items']=model.id;
                }
                else{
                    data['id']=model.id;
                }

                axios.post(action.link, data)
                    .then(res=>{
                        if(action.code==="download_att_file")this.saveFile(res.data);
                        if(action.code==="delete_att_file")this.deleteFile(model.id);
                    })
                    .catch(error=>{
                        this.$toast.error(error.response.data.message, '' + error.response.status, {position: 'topRight'})
                    })
            },
            saveFile(res){
                //todo тут будет обьединение
                const linkSource =res.mime+','+ res.file;
                const downloadLink = document.createElement("a");
                const fileName = res.name+'.'+res.extension;

                downloadLink.href = linkSource;
                downloadLink.download = fileName;
                downloadLink.click();

            },

            deleteFile(id){

                var index = this.model[0].files.findIndex(elem=>elem.id===id);

                this.model[0].files.splice(index,1);
            }
        },

        props: [
            "fields",
            "model",
            "add_models",
            "disable_inputs",
            "model_name"
        ],

        mounted() {


            Validator.localize(dictionary);

            const validator = new Validator({first_name: 'alpha'});

            this.imgtosvg();

            validator.localize('en');
            //console.log(this);
            this.$ZONE = true;

        },
        updated() {
            this.imgtosvg();
        },

        components: {
            Datepicker,
            JoditVue,
            bTable
        }
    }

</script>

<style lang="scss">
    @import '../../sass/variables';

    .field-box {
        &.hidden {
            display: block !important;
        }

        .list-actions {
            display: flex;

            .list_action-btn {
                img.svg {
                    display: inherit;
                }

                svg path {
                    fill: $accent;
                }

                text-align: center;
                border: 0;
                margin-right: 1rem;
                height: 4.4rem;
                background: none;
                display: flex;
                justify-content: center;
                align-items: center;

                button, a {
                    background: none;
                    border: 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                &:last-child {
                    margin-right: 0;
                }
            }
        }
    }
</style>
