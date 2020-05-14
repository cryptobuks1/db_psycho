<template>
    <div class="container attached-files">
        <transition-group name="fade" mode="in-out">
            <atom-spinner
                    key="1"
                    v-show="loading"
                    :animation-duration="1000"
                    color="var(--accent)"
            />
            {{loading}}
            <div v-show="!loading" key="2" class="">
                <div class="row">
                    <div class="col">
                        <h1>Faq</h1>
                    </div>
                </div>
                <!--<div class="row">
                    <template>
                        <div class="counter_list col hidden-md-down">
                            <p> Показаны  <b>{{countOf}}-{{countTo}}</b> из <b>{{totalRows}}</b>
                            </p>
                            <b-form-select :options="pageOptions" name="count" v-model="perPage" class="count"/>
                            <p>на странице </p>
                            &lt;!&ndash;{{perPage}} , {{perPagechange}}&ndash;&gt;
                        </div>
                    </template>
                </div>-->
                <div class="align-items-center margin-top-2">

                    <template v-if="sets">
                        <div class="list_btn">
                            <div class="list_btn_second-line" v-if="sets && sets.faq_dropdown_actions">
                                <div class="dropdown" :class="{active: listAction}">
                                    <button class="btn btn-dropdown">

                                        {{translateList.Actions}}
                                        <img class="drop-i" src="/img/dropdown-i.png" alt="">
                                    </button>
                                    <div class="dropdown_box">
                                        <ul>
                                            <!--                                       <li v-if="actions && action.code!='add_row'" v-for="action in actions">-->
                                            <!--                                           <button @click="sendAction(action.code, action.link)"-->
                                            <!--                                                   class="dropwond_link">{{action.title}}-->
                                            <!--                                           </button>-->
                                            <!--                                       </li>-->
                                            <li v-for="item in sets.faq_dropdown_actions">
                                                <button @click="deleteItem(item.code, item.link)"
                                                        class="dropwond_link">
                                                    {{item.title}}
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                            </div>
                            <template v-for="btn in sets.faq_command_bar">
                                <!--<button v-if="btn.faq_code === 'add_section'" :class="btn.class" @click="clickAction(btn.faq_code,{group_l:true})">{{btn.faq_title}}</button>-->
                                <button :class="btn.class" @click="clickAction(btn.code,btn)"> {{btn.title}}</button>
                            </template>
                        </div>
                    </template>
                </div>

                <div class="faq-main">
                    <!--Вывод груп-->
                    <div class="faq" v-for="item in items"> <!--v-for  id-parent-id -->
                        <div class="faq-el faq-el-section" :class=""
                             @click.stop="sectionClick($event)">
                            <!--v-if :class=faq-el-article-->
                            <div class="faq-cont">

                                <div class="faq-text">
                                    <span @click.stop="" class="faq-icon">+</span>
                                    <p>{{item.bl_att_doc_kind_name}}</p>
                                </div>


                            </div>
                        </div>

                        <div class="faq-dropdow" style="display:none;">
                            <template v-for="file in item.files">
                                <!--вывод ответово в группах-->
                                <div class="faq-el faq-el-article"

                                >  <!--v-if :class=faq-el-article-->
                                    <div class="faq-cont">

                                        <div class="faq-text">

                                            <p>{{file.att_file_name}}</p>
                                        </div>

                                        <div class="faq-menu" >

                                            <div class="smenu"
                                                >
                                                <ul class="smenu-list">
                                                    <li v-for="action in actions">
                                                        <button :class="action.class">
                                                            <img :src="action.img" alt="" class="svg">
                                                        </button>
                                                    </li>
                                                </ul>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </template>
                        </div>

                    </div>


                </div>
            </div>
        </transition-group>
    </div>


</template>

<script>
    import {AtomSpinner} from 'epic-spinners';
    import {mapGetters} from 'vuex';
    import bFormSelect from 'bootstrap-vue/es/components/form-select/form-select';

    export default {
        data: function () {
            return {
                items: [],
                loading: true,
                checkedItems: [],
                dependent: null,
                sets: null,
                listAction: false,

            }
        },
        async mounted() {
            this.$root.imgtosvg();

            this.loading = false;

            this.items = [
                {
                    bl_att_doc_kind_name: 'Документ 1',
                    files: [
                        {
                            att_file_name: 'File1',
                            att_file_size: '2MB',
                            att_file_ext: "jpeg"
                        }, {
                            att_file_name: 'File1',
                            att_file_size: '2MB',
                            att_file_ext: "jpeg"
                        }, {
                            att_file_name: 'File1',
                            att_file_size: '2MB',
                            att_file_ext: "jpeg"
                        }, {
                            att_file_name: 'File1',
                            att_file_size: '2MB',
                            att_file_ext: "jpeg"
                        },


                    ],
                    _showDetails: true,

                },
                {
                    bl_att_doc_kind_name: 'Документ 2',
                    files: [
                        {
                            att_file_name: 'File1',
                            att_file_size: '2MB',
                            att_file_ext: "jpeg"
                        }, {
                            att_file_name: 'File1',
                            att_file_size: '2MB',
                            att_file_ext: "jpeg"
                        }, {
                            att_file_name: 'File1',
                            att_file_size: '2MB',
                            att_file_ext: "jpeg"
                        }, {
                            att_file_name: 'File1',
                            att_file_size: '2MB',
                            att_file_ext: "jpeg"
                        },


                    ]
                },
                {
                    bl_att_doc_kind_name: 'Документ 3',
                    files: [
                        {
                            att_file_name: 'File1',
                            att_file_size: '2MB',
                            att_file_ext: "jpeg"
                        }, {
                            att_file_name: 'File1',
                            att_file_size: '2MB',
                            att_file_ext: "jpeg"
                        }, {
                            att_file_name: 'File1',
                            att_file_size: '2MB',
                            att_file_ext: "jpeg"
                        }, {
                            att_file_name: 'File1',
                            att_file_size: '2MB',
                            att_file_ext: "jpeg"
                        },


                    ]
                },

            ]

            this.actions = [
                {
                    class: null,
                    code: "download_att_file",
                    execute_fe_action_l: true,
                    img: '/img/interfacedashboard/download.svg',
                    link: "/admin/action/file/download",
                    title: "Скачать",
                    type: "button"
                },

                {
                    class: null,
                    code: "delete_att_file",
                    execute_fe_action_l: true,
                    img: "/img/interfacedashboard/remove.svg",
                    link: "/admin/action/file/download",
                    title: "Удалить",
                    type: "button"
                },

            ]

        },

        updated() {
            this.$root.imgtosvg();
        },
        computed: {
            countTo() {
                /*let countTo = this.perPage * this.currentPage;
                if (countTo > this.totalRows) {
                    return this.totalRows;
                } else {
                    return this.perPage * this.currentPage;
                }*/
                return 10;
            },
            countOf() {
                /*  if (this.currentPage !== 1) {
                    return this.perPage * this.currentPage - this.perPage + 1;
                }*/
                return 1;
            },

            ...mapGetters([

                'getFaqid',
            ]),

        },
        methods: {
            // Развернуть все
            async expandAll() {
                $('.faq-dropdow').show(300); // разворот верстки
                $('.faq-el').addClass('active');


            },

            collapseAll() {
                $('.faq-dropdow').hide(300); // разворот верстки

                $('.faq-el').removeClass('active');
            },
            //запрашивает ответ на вопрос

            // toggle блока с ответом

            // toggle раздела
            sectionClick(e) {
                var r = this.ftoggle($(e.target).parents('.faq-el-section').next());
                if (r) {
                    $(e.target).parents('.faq').addClass('active')
                } else {
                    $(e.target).parents('.faq').removeClass('active');
                }
            },
            //Вызов менюшки в элементах
            toggleMenu(e, tbool) {

                var listparent = $(e.target), list = '';
                listparent = listparent.hasClass('smenu') ? listparent : listparent.parents('.smenu');
                list = listparent.find('.smenu-list');

                console.log('tbool', tbool, list, listparent, e.target.className);

                if (tbool) {
                    $(list).show(300);
                    listparent.addClass('active')
                } else {
                    $(list).hide(300);

                    listparent.removeClass('active');
                }
            },
            // Функция тогла show\hide
            ftoggle(el, sec) {
                var res = $(el).css('display') == 'none' ? true : false
                if (res) {
                    $(el).show(sec || 300);
                } else {
                    $(el).hide(sec || 300);
                }
                return res;
            },
            // чекает все дочерние эллементы

            //toggle элементы в масив
            idToggle(obj_id, check) {
                var target = false, index = false;
                if (!obj_id) return false;
                this.checkedItems.some(function (el_id, i) {
                    if (el_id == obj_id) {
                        index = i;
                        return i;
                    }
                });
                if (check) { // ture - записываем false - удаляем
                    if (!index && index !== 0) { // если добовляемого эллемента уже нету в массиве
                        this.checkedItems.push(obj_id);
                    }
                } else {
                    this.checkedItems.splice(index, 1);
                }


            },






        },
        components: {
            AtomSpinner,
            bFormSelect
        }
    }
</script>

<style lang="scss" >
    @import '../../sass/variables';

    $fz: 11;
    @function toRem($size) {

        @return $size / $fz *1rem;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter, .fade-leave-to {
        opacity: 0;
    }

    .atom-spinner {
        display: block;
        margin: auto;
    }

    .list_btn {
        display: flex;
        flex-wrap: wrap;
    }

    .attached-files{

        .faq {
            margin-bottom: toRem(20);

            &-main {
                margin-top: 3rem;
            }


            &-dropdow {
                width: 100% !important; // Гасим действие метода hide
            }

            &-el {
                border-color: $tabbd;
                border-style: solid;
                border-width: 1px;
                border-radius: 3px;
                margin-top: -1px;

                &-article {
                    .faq-text {
                        padding-left: toRem(50);
                    }

                }

                &-section {
                    position: relative;
                    background-color: $faqsection;

                    &:before {
                        position: absolute;
                        left: 0;
                        top: 0;
                        bottom: 0;
                        margin: auto;
                        content: '';
                        border: 3px solid $accent;
                        width: 0;
                        height: 100%;
                        border-radius: 3px;
                    }
                }
            }

            &-icon {
                flex: 1 1 auto;
                width: toRem(35);
                height: toRem(35);
                background-color: $accent;
                position: relative;
                border-radius: 3px;
                overflow: hidden;
                margin-right: toRem(13);
                color: $white-color;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2rem;
                font-weight: bold;


            }

            &-cont {
                display: flex;
            }

            &-check {
                width: toRem(70);
                flex: 0 0 auto;
                border-right: 1px solid $tabbd;
                border-radius: 3px;
                padding: toRem(20) toRem(22);

                .checkbox-custom {
                    background-color: $white-color;
                }
            }

            &-text {
                flex: 1 1 100%;
                display: flex;
                align-items: center;
                padding: 1rem toRem(20);

                p {
                    flex: 1 1 auto;
                    width: 100%;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    font-size: toRem(16);
                    font-family: 'Proxima Nova';
                }

            }

            &-menu {
                flex: 0 0 auto;
                display: flex;
                align-items: center;
                padding: toRem(18);

                &.active {

                }
            }

            &-el.active > &-cont > &-check {
                border-bottom-right-radius: 0;
            }

            .checkbox {
                &, &-custom {
                    margin: 0;
                }
            }
        }

        .smenu {
            display: flex;

            svg {
                display: inherit;
                width: 100%;
                max-width: toRem(21);
                height: toRem(21);
                path{
                    fill: $accent!important;
                    fill-rule: evenodd;
                }
            }

            &.active {
                .smenu-btn {
                    svg {
                        path {
                            fill: $accent;
                        }
                    }

                    &:hover {
                        svg {
                            path {
                                fill: $light-grey;
                            }
                        }
                    }
                }
            }

            &-btn {
                padding: 0;
                background-color: transparent;
                margin: 0;
                box-shadow: none;
                border: none;
                min-width: toRem(7);
                margin-top: 5px;
                /*height: toRem(25);*/

            }

            &-list {
                display: flex;
                padding-right: toRem(12);
                margin-right: toRem(11);
                height: 100% !important;

                li {
                    height: toRem(30);
                    padding: 0 toRem(14);

                    button{
                        background: transparent;
                        border: none;
                        svg {
                            path{
                                fill: $accent !important;
                                fill-rule: evenodd;
                            }
                        }
                    }
                }
            }
        }



    }

</style>

