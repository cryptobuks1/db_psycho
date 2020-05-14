<template>
	<div class="container">
		<transition-group name="fade" mode="in-out" v-on:after-enter="afterEnter">
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
						<div class="faq-el faq-el-section" v-if="item.group_l" :class="" :id="item.id"
						     @click.stop="sectionClick($event)">
							<!--v-if :class=faq-el-article-->
							<div class="faq-cont">
								<div class="faq-check" v-if="sets.faq_dropdown_actions">
									
									<div class="list_checkbox checkbox checkbox-all" @click.stop="">
										<label>
											<input type="checkbox" @click.stop="checkall($event)">
											<span class="checkbox-custom"><i class="fa fa-check"></i></span>
										</label>
									</div>
								
								</div>
								<div class="faq-text">
									<span class="faq-icon"><img class="svg" :src="item.image.image_path" alt=""></span>
									<p>{{item.faq_title}}</p>
								</div>
								<div class="faq-menu" v-if="sets.faq_section_actions">
									
									<div class="smenu">
										<ul style="" class="smenu-list">
											<li v-for="sbtn in sets.faq_section_actions">
												<button :class="sbtn.class" @click.stop=" clickAction(sbtn.code,item)">
													<img :src="sbtn.img" alt="" class="svg">
												</button>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="faq-dropdow" style="display:none;">
							<template v-for="child in item.children">
								<!--вывод ответово в группах-->
								<div class="faq-el faq-el-article" :id="child.id" :data-pid="child.parent_id"
								     @click.stop="expandAnswer(child,$event)"
								>  <!--v-if :class=faq-el-article-->
									<div class="faq-cont">
										<div class="faq-check" v-if="sets.faq_dropdown_actions">
											
											<div class="list_checkbox checkbox " @click.stop="">
												<label>
													<input type="checkbox" @click.stop="checkthis($event)">
													<span class="checkbox-custom"><i class="fa fa-check"></i></span>
												</label>
											</div>
										
										</div>
										<div class="faq-text">
											<span class="faq-icon"><img :src="child.image.image_path" class="svg"
											                            alt=""></span>
											<p>{{child.faq_title}}</p>
										</div>
										<div class="faq-menu" v-if="sets.faq_article_actions">
											
											<div class="smenu">
												<ul style="" class="smenu-list">
													<li v-for="sbtn in sets.faq_article_actions">
														<button :class="sbtn.class"
														        @click.stop=" clickAction(sbtn.code,child)">
															<img :src="sbtn.img" alt="" class="svg">
														</button>
													</li>
												</ul>
											</div>
										
										</div>
									</div>
									<div class="faq-answer" :class="{'border':sets.faq_dropdown_actions}"
									     style="display: none">
										<transition-group
												name="fade"
												mode="in-out"
										
										>
											<atom-spinner
													key="1"
													:animation-duration="1000"
													
													color="var(--accent)"
													v-show="!child.faq_text"
											/>
											<div class=""
											     key="2"
											     v-show="child.faq_text"
											     v-html="child.faq_text">
											
											</div>
										</transition-group>
									
									</div>
								</div>
							</template>
						</div>
					
					</div>
					<!--вывод ответов без групп-->
					<div class="faq" v-for="child in items" v-if="!child.group_l">
						<div class="faq-el faq-el-article" v-if="!child.group_l" :id="child.id"
						     :data-pid="child.parent_id"
						     @click.stop="expandAnswer(child,$event)"
						>  <!--v-if :class=faq-el-article-->
							<div class="faq-cont">
								<div class="faq-check " v-if="sets.faq_dropdown_actions">
									
									<div class="list_checkbox checkbox " @click.stop="">
										<label>
											<input type="checkbox" @click.stop="checkthis($event)">
											<span class="checkbox-custom"><i class="fa fa-check"></i></span>
										</label>
									</div>
								
								</div>
								<div class="faq-text">
									<span class="faq-icon"><img :src="child.image.image_path" class="svg" alt=""></span>
									<p>{{child.faq_title}}</p>
								</div>
								<div class="faq-menu" v-if="sets.faq_article_actions">
									
									<div class="smenu">
										<ul class="smenu-list">
											<li v-for="sbtn in sets.faq_article_actions">
												<button :class="sbtn.class" @click.stop=" clickAction(sbtn.code,child)">
													<img :src="sbtn.img" alt="" class="svg">
												</button>
											</li>
										</ul>
									</div>
								
								</div>
							</div>
							<div class="faq-answer" :class="{'border':sets.faq_dropdown_actions}" style="display: none">
								<transition-group
										name="fade"
										mode="in-out"
								
								>
									<atom-spinner
											key="1"
											:animation-duration="1000"
											
											color="var(--accent)"
											v-show="!child.faq_text"
									/>
									<div class=""
									     key="2"
									     v-show="child.faq_text"
									     v-html="child.faq_text">
									
									</div>
								</transition-group>
							
							</div>
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
                items: false,
                loading: true,
                checkedItems: [],
                dependent: null,
                sets: null,
                listAction: false,
                answers: []
            }
        },
        async mounted() {

            const trans = await this.getTranslateList(), info = await this.getInfo();
            this.loading = false;

            this.imgtosvg();
            $(document).on('mousewheel DOMMouseScroll', function (event) {
                $('body,html').stop(true, false);
            });


        },

        updated() {
            this.imgtosvg();
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
                $('.faq-answer').show(300); // разворот верстки
                $('.faq-el').addClass('active');
                var answers = false; // Массив всех ответов

                await this.$http.post('/admin/FaqDev/getAllAnswer').then(res => {
                    answers = res.data;
                });
                /*
                * Выделяем всех дитей в один массив*/


                this.answers.forEach(function (item, i) {
                    var j = false
                        , item = answers.some(function (answer, i) {

                        if (item.id == answer.id) {
                            item.faq_text = answer.faq_text; // Раставляем ответы по эллементам
                            j = i;
                            return true
                        }
                    });
                    answers.splice(j, 1); // Удаляем ответ, чтобы уменьшить кол-во операций
                });
            },
            collapseAll() {
                $('.faq-dropdow').hide(300); // разворот верстки
                $('.faq-answer').hide(300); // разворот верстки
                $('.faq-el').removeClass('active');
            },
            //запрашивает ответ на вопрос
            async getAnswer(id) {
                if (!id && id != 0) return false;
                let ret;
                await this.$http.post('/admin/FaqDev/getAnswer', {'id': id}).then(res => {
                    ret = res.data;
                });
                return ret
            },
            // toggle блока с ответом
            async expandAnswer(item, el) {

                var r = this.ftoggle($(el.target).parents('.faq-el').find('.faq-answer'));
                if (r) {
                    $(el.target).parents('.faq-el').addClass('active');
                }
                else {
                    $(el.target).parents('.faq-el').removeClass('active');
                }
                item.faq_text = !item.group_l ? item.faq_text ? item.faq_text : await this.getAnswer(item.id) : '';
            },
            // toggle раздела
            sectionClick(e) {
                var r = this.ftoggle($(e.target).parents('.faq-el-section').next());
                if (r) {
                    $(e.target).parents('.faq').addClass('active')
                }
                else {
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
                }
                else {
                    $(list).hide(300);

                    listparent.removeClass('active');
                }
            },
            // Функция тогла show\hide
            ftoggle(el, sec) {
                var res = $(el).css('display') == 'none' ? true : false
                if (res) {
                    $(el).show(sec || 300);
                }
                else {
                    $(el).hide(sec || 300);
                }
                return res;
            },
            // чекает все дочерние эллементы
            checkall(e) {
                const
                    check = e.target.checked,
                    collection = $(e.target).parents('.faq').find('.faq-el-article')
                    , section = $(e.target).parents('.faq-el-section')
                    , self = this;
                collection.each(function (i, el) {
                    $(el).find(' .checkbox input')[0].checked = check;
                    self.idToggle(el.id, check); // Запись в массив
                });
                self.idToggle(section[0].id, check); // записть id раздела в масив


            },
            // чекает конкретный эллемнет
            checkthis(e) {
                var el = $(e.target).parents('.faq-el')
                    , section = $(e.target).parents('.faq').find('.faq-el-section')
                    , sectioncheck = section.find('.list_checkbox input')[0];
                this.idToggle(el[0].id, e.target.checked); // Запись в массив

                if (!sectioncheck || !sectioncheck.checked) return false;
                section.find('.list_checkbox input')[0].checked = false;
                this.idToggle(section[0].id, false); // записть id раздела в масив
            },
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
                }
                else {
                    this.checkedItems.splice(index, 1);
                }


            },
            // обработка клика
            clickAction(code, item) {

                switch (code) {
                    case 'expand_all':
                        this.expandAll();
                        break;
                    case 'collapse_all':
                        this.collapseAll();
                        break;
                    case 'add_section':
                        this.setParamCard({group_l: true});
                        break;
                    case 'edit_article':
                        this.setParamCard({id: item.id, group_l: false});
                        break;
                    case 'add_article':
                        this.setParamCard({id: 'new', parent_id: item.id, group_l: false});
                        break;
                    case 'edit_section':
                        this.setParamCard({id: item.id, group_l: true});
                        break;
                    default:

                        break;

                }
            },
            // отправка состояния в глоб-е хранилище
            setParamCard(info) {
                this.$store.commit("setParamCard", info);
                this.$bRouter.push(this.$bRoute.path + (info.id ? '/' + info.id : '/new'));
            },
            // заготовка к массовым действияю
            deleteItem(code, url) {
                const self = this;
                if (!self.checkedItems.length || !self.checkedItems) {
                    return false
                }
                this.$http.post(url, {
                    items: self.checkedItems,
                    main_model: self.main_model
                }).then(res => {
                    if (res.status == 200) {
                        self.checkedItems.forEach(el => {
                            $('#' + el).hide(300, () => {
                                $('#' + el).remove()
                            });
                        });
                        self.checkedItems = [];
                        self.$toast.success(res.data.message, '', {position: 'topRight'})
                    }
                    else {
                        self.$toast.error(res.data.message, '', {position: 'topRight'})
                    }
                })
            },
            //Порционная выдача данных, пока не используется
            async getInfo() {
                await  this.$http.post('/admin/FaqDev/index', {maxel: this.perPage}).then(res => {
                    this.items = res.data.main_data_models[res.data.form_parameters.form_base_data_model];
                    this.sets = res.data.sets;
                    this.main_model = res.data.form_parameters.form_base_data_model;
                    return true
                });
                this.answers = this.$data.items.reduce(function (prev, obj) {
                    if (obj.group_l) {
                        prev.push(...obj.children);
                    }
                    else {
                        prev.push(obj);
                    }

                    return prev;
                }, []);
            },
            // Запрос переводов
            async getTranslateList() {
                await this.$http.post('/admin/menu?mode=0&module=main&object=translateList', null)
                    .then(res => {
                        this.translateList = res.data;


                        return true;

                    });
            },
            // Разскрывает нужный faq
            async afterEnter() {
                const id = new URLSearchParams(document.location.search.substring(1)).get('id');
                if (!id) {
                    return false
                }


                $('html, body').animate({
                    scrollTop: $('#' + id).parents('.faq').offset().top
                }, 400);

                $('#' + id).parents('.faq').find('.faq-dropdow').show();
                $('#' + id).find('.faq-answer').show();
                let item = this.getAsweritem(id);
                item.faq_text = item.faq_text ? item.faq_text : await this.getAnswer(item.id);


            },

            getAsweritem(id) {
                var index = false;
                this.answers.some((el, i) => {
                    index = i;
                    return el.id == id
                });
                return this.answers[index];
            }
        },
        components: {
            AtomSpinner,
            bFormSelect
        }
    }
</script>

<style lang="scss">
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
	
	.faq {
		margin-bottom: toRem(20);
		
		&-main {
			margin-top: 3rem;
		}
		&-answer {
			margin-left: toRem(69) !important;
			
			padding: 3rem 0;
			padding-top: 1rem;
			padding-left: toRem(100) !important;
			width: 90% !important;
			position: relative;
			width: 95.1% !important;
			position: relative;
			max-height: toRem(300);
			overflow: auto;
			margin-right: 0px;
			padding-right: toRem(73);
			&.border {
				border-left: 1px solid #e2e2e2;
			}
			.atom-spinner {
				position: absolute;
				top: 0;
				bottom: 0;
				left: 0;
				right: 0;
				margin: auto;
			}
			
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
				transition: background-color .3s;
				&:hover {
					background-color: $lgrey;
				}
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
					border: 3px solid $sbarbg;
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
			background-color: $sbarbg;
			position: relative;
			border-radius: 50%;
			overflow: hidden;
			margin-right: toRem(13);
			svg {
				width: toRem(17);
				height: toRem(13);
				position: absolute;
				top: 0px;
				bottom: 0px;
				margin: auto;
				left: 0px;
				right: 0px;
				fill: $white-color;
			}
			
		}
		&-cont {
			display: flex;
			padding: toRem(17) 0;
		}
		&-check {
			width: toRem(70);
			flex: 0 0 auto;
			border-right: 1px solid $tabbd;
			border-radius: 3px;
			padding: 0 toRem(22);
			vertical-align: middle;
			display: flex;
			margin-top: -20px;
			margin-bottom: -20px;
			.checkbox-custom {
				background-color: $white-color;
			}
			
		}
		&-text {
			flex: 1 1 100%;
			display: flex;
			align-items: center;
			padding: 0 toRem(20);
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
			padding: 0 toRem(18);
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
		&.active {
			.faq {
				&-el-section:before {
					border: 3px solid $accent;
				}
			}
		}
	}
	
	.smenu {
		display: flex;
		svg {
			width: 100%;
			max-width: toRem(21);
			height: toRem(21);
		}
		&.active {
			.smenu-btn {
				svg {
					path {
						fill: $accent;
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
			&:hover {
				svg {
					path {
						fill: $light-grey;
					}
				}
			}
		}
		&-list {
			display: flex;
			height: 100% !important;
			
			li {
				height: toRem(30);
				padding: 0 toRem(14);
				
			}
		}
	}
	
	.counter {
		&_list {
			display: flex;
			align-items: center;
			
			&-m {
				padding-left: 1.5rem;
			}
			b {
				font-weight: normal;
			}
			select {
				margin-right: 1rem;
				margin-left: 3rem;
				width: 8rem;
				height: 4.5rem;
				border-radius: 4px;
				border: 1px solid #dfe3e9;
				background-color: #ffffff;
				padding-left: 2rem;
				box-shadow: none;
			}
		}
	}

</style>
