<template>
	
	<div class="user-profile">
		<div class="container no-padding">
			<div class="top-buttons">
				<button v-for="link in links" :class="link.class">
					<router-link :to="link.link_url">{{link.link_title}}</router-link>
				</button>
			
			</div>
			
			<div class="tab" v-for="tab in tabs">
				<div class="block" v-for="(block,index) in tab.blocks">
					<div v-if="photo_block" class="col-md-4">
						
						<div class="photo-block">
							<!--<img id="profile-photo" style="width: 100%; height: 100%;" :src="photo_path" alt="">-->
							<div id="profile-photo">
							
							</div>
						</div>
						
						<div class="photo-wrapper">
							<p class="user-name">
								<span v-if="models.Consumer[0].first_name">{{models.Consumer[0].first_name}} </span>
								<span v-if="models.Consumer[0].last_name"> {{models.Consumer[0].last_name}}</span>
							</p>
							
							<div class="photo-buttons">
								<label for="photo-load" class="btn btn-green">
									Загрузить
									<input id="photo-load"  style="display: none;" type="file"  @change="photoLoad">
								</label>
								<button class="btn btn-dark " @click="deletePhoto">Удалить</button>
							</div>
						</div>
					
					</div>
					<div :class="{'col-md-12':photo_block, 'col-md-16':!photo_block, 'no-padding':true, }">
						<div class="profile-card">
							<div class="fields">
								
								<div :class="{'left-zone':true, 'full-width':block.block_zone_quantity==1,'photo-left-col':photo_block}">
									<!--если количество зон == 1, выводим только левую  -->
									<div v-for="(item,index) in block.block_fields"
									     v-if="item.zone==1"
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
                                                 'col70':item.width=='70%',
                                                 'col80':item.width=='80%',
                                                 'col90':item.width=='90%',
                                                 'border-right':item.border_right,
                                             }"
									     :style="{'order':item.order}"
									
									>
										<!-- Выставляем ширину колонки в зависимости от параметра -->
										
										<div :class="{'field-box':true, 'hidden':item.hidden}">
											
											<label v-if="item.type!='button'" :class="{'label-green': item.type=='title'}">{{item.type == 'checkbox' ? "" : item.title}}</label>
											
											<div style="position: relative;">
												<input v-validate="item.validation"
												       v-if="item.type=='text'"
												       :type="item.type"
												       :name="item.model"
												       v-model="models[block.block_model][0][item.model]"
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
											        v-model="models[block.block_model][0][item.model]"
											>
												<option v-if="item.model=='db_area_id'" value="">Открепить</option>
												<option value="">1ewf</option>
												<option value="">2ewfwe</option>
												<option v-if="item.model=='country_id'" v-for="opt in item.options"
												        :value="opt.id">{{opt.country_name}}
												</option>
												<option  v-for="opt in item.options"
												         :value="opt.id">{{opt.name}}
												</option>
											</select>
											
											<div v-if="item.type=='lt-select'" class="dropdown">
												<button class="btn btn-dropdown " @click="dropdownClick ">
													<input type="text" v-model="item.options_data.search"
													       class="dropwond_link filterSelect" @input="selectSearch(item)"
													       @keypress="dropDownKeyPress"
													       @keyup="dropDownArrows($event,item,  models[block.block_model][0])">
													{{item.value}}
													<img class="drop-i btn-dropdown" src="/img/dropdown-i.png" alt="">
												</button>  <!-- dropdown -->
												<transition name="fade">
													<div class="dropdown_box dropdown_box_select">
														<ul>
															
															<li v-for="(option, index) in item.options"
															    :data-select="index"
															    :class="{'li-selected':index==currentOption}"
															>
																<button @click="chooseSelectItem(item, option, models[block.block_model][0])"
																        @mouseover="hoverSelectItem"
																        class="dropwond_link">
																	{{option[item.options_data.options_field_title]}}
																</button>
															</li>
														</ul>
													</div>
												</transition>
											</div>
											
											<div class="contractor_checkbox checkbox " :class="{'checkbox-disabled':item.disabled}"  v-if="item.type=='checkbox'">
												<label :for="item.model">
													<input :disabled=item.disabled :name="item.model" type="checkbox" :id="item.model"
													       @change="checkboxChange"
													       v-model="models[block.block_model][0][item.model]">
													<span class="checkbox-custom"><i class="fa fa-check"></i></span>
													<span> {{item.title}}</span>
												</label>
											</div>
											
											<div class="contractor_parag" v-if="item.type=='label'">
												<p>{{models[block.block_model][0][item.model]}}</p>
											</div>
											
											<!--<input v-if="item.type=='label'"-->
											<!--type="text"-->
											<!--v-model="models[block.block_model][0][item.model]"-->
											<!---->
											<!--unselectable="on"-->
											<!--onselectstart="return false;"-->
											<!---->
											<!--onmousedown="return false;"-->
											<!--&gt;-->
											
											<datepicker v-if="item.type=='date'" :language="datapicker_translations.en"
											            :format="'dd/MM/yyyy'"
											            v-model="models[block.block_model][0][item.model]"
											></datepicker>
											
											<button class="btn dark" v-if="item.type=='button'"
											        @click="$store.commit('showModal', {type:item.action})">{{item.title}}
											</button>
											
											<button class="btn dark" v-if="item.type=='DynamicModal'"
											        @click=" $parent.$refs.dmodal.showmodal({modal:item.modal,model:models[block.block_model][0]})">
												{{item.text}}
											</button>
											
											
											<span class="vv-error">{{ errors.first('' + item.model) || item.tip }}</span>
										</div>
									
									</div>
								
								</div>
								
								
								<div v-if="block.block_zone_quantity==2" :class="{'right-zone':true, 'photo-right-col':photo_block}">
									<!--Если количество зон==2 показываем и вторую -->
									
									<div v-for="(item,index) in block.block_fields"
									     v-if="item.zone==2"
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
                                                 'col70':item.width=='70%',
                                                 'col80':item.width=='80%',
                                                 'col90':item.width=='90%',
                                                 'border-right':item.border_right,
                                             }"
									     :style="{'order':item.order}"
									>
										<!-- Выставляем ширину колонки в зависимости от параметра -->
										
										<div :class="{'field-box':true, 'hidden':item.hidden}">
											
											<label v-if="item.type!='button'" :class="{'label-green': item.type=='title'}">{{item.type == 'checkbox' ? "" : item.title}}</label>
											
											<div style="position: relative;">
												<input v-validate="item.validation"
												       v-if="item.type=='text'"
												       :type="item.type"
												       :name="item.model"
												       v-model="models[block.block_model][0][item.model]"
												       :class="{'valid':fieldsVV[item.model]&&fieldsVV[item.model].valid&&fieldsVV[item.model].touched&&item.validation, 'invalid':fieldsVV[item.model]&&fieldsVV[item.model].invalid&&fieldsVV[item.model].touched && item.validation}"
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
											
											<!--<input v-if="item.type=='text'" :type="item.type" :name="item.model"-->
											<!--v-model="models[block.block_model][0][item.model]">-->
											
											<select v-if="item.type=='select'" :name="item.model"
											        v-model="models[block.block_model][0][item.model]"
											>
												<option v-if="item.model=='db_area_id'" value="">Открепить</option>
												<option v-if="item.model=='country_id'" v-for="opt in item.options"
												        :value="opt.id">{{opt.country_name}}
												</option>
												<option  v-for="opt in item.options"
												         :value="opt.id">{{opt.name}}
												</option>
											</select>
											
											<div v-if="item.type=='lt-select'" class="dropdown">
												<button class="btn btn-dropdown " @click="dropdownClick ">
													<input type="text" v-model="item.options_data.search"
													       class="dropwond_link filterSelect" @input="selectSearch(item)"
													       @keypress="dropDownKeyPress"
													       @keyup="dropDownArrows($event,item,  models[block.block_model][0])">
													{{item.value}}
													<img class="drop-i btn-dropdown" src="/img/dropdown-i.png" alt="">
												</button>  <!-- dropdown -->
												<transition name="fade">
													<div class="dropdown_box dropdown_box_select">
														<ul>
															
															<li v-for="(option, index) in item.options"
															    :data-select="index"
															    :class="{'li-selected':index==currentOption}"
															>
																<button @click="chooseSelectItem(item, option, models[block.block_model][0])"
																        @mouseover="hoverSelectItem"
																        class="dropwond_link">
																	{{option[item.options_data.options_field_title]}}
																</button>
															</li>
														</ul>
													</div>
												</transition>
											</div>
											
											<div class="contractor_checkbox checkbox"  :class="{'checkbox-disabled':item.disabled}" v-if="item.type=='checkbox'">
												<label :for="item.model">
													<input :name="item.model" :disabled=item.disabled type="checkbox" :id="item.model"
													       @change="checkboxChange"
													       v-model="models[block.block_model][0][item.model]">
													<span class="checkbox-custom"><i class="fa fa-check"></i></span>
													<span> {{item.title}}</span>
												</label>
											</div>
											
											<div class="contractor_parag" v-if="item.type=='label'">
												<p>{{models[block.block_model][0][item.model]}}</p>
											</div>
											
											<datepicker v-if="item.type=='date'" :language="datapicker_translations.en"
											            :format="'dd/MM/yyyy'"
											            v-model="models[block.block_model][0][item.model]"
											></datepicker>
											
											<button class="btn dark" v-if="item.type=='button'"
											        @click="$store.commit('showModal', {type:item.action})">{{item.title}}
											</button>
											
											<button class="btn dark" v-if="item.type=='DynamicModal'"
											        @click=" $parent.$refs.dmodal.showmodal({modal:item.modal,model:models[block.block_model][0]})">
												{{item.text}}
											</button>
										 
											
											
											<!--<button class="btn dark" :class="[item.class ]" v-if="item.type=='ConfirmModal'" @click="confirm({modal:item.modal})"> {{item.text}} </button>-->
											
											
											
											<span class="vv-error">{{ errors.first('' + item.model) }}</span>
										</div>
									
									</div>
								
								</div>
							
							</div>
							<div class="card-buttons">
								<!--<div class="contractor_checkbox checkbox">-->
								<!--<label>-->
								<!--<input type="checkbox">-->
								<!--<span class="checkbox-custom"><i class="fa fa-check"></i></span>-->
								<!--<span> {{actual}}</span>-->
								<!--</label>-->
								<!--</div>-->
								
								<div class="card-buttons-list">
									<a v-for="action in actions" :name="action.code" :class="action.class"
									   @click="sendProfile">{{action.title}}</a>
								</div>
							
							</div>
						</div>
					
					
					</div>
				</div>
			</div>
		</div>
	</div>
</template>


<script>
    import {en, ru} from 'vuejs-datepicker/dist/locale'
    import axios from 'axios';
    import Datepicker from 'vuejs-datepicker';


    export default {
        data: function () {
            return {
                modelObj: {},
                tabs: [],
                models: {},
                actions: [],
                links: [],
                actual: '',
                datapicker_translations: {
                    en: en,
                    ru: ru,
                },
                photo_block: null,
                photo_path: ''
            }
        },
        methods: {
            async test(item) {
                var r = await this.$parent.$refs.dmodal.showmodal(item);
            },
            async confirm(modal) {
                var item = {
                    modal: {
                        confirm: true,
                        html: '<h1> Внимание </h1> <p>Спасибо за внимание</p>',
                        actionOk: {
                            title: 'агась'
                        }
                    }
                };

                var r  = await this.$parent.$refs.dmodal.confirmmodal(modal);

            },
            sendProfile: function (e) {


                if (e.target.name == 'save' || e.target.name == 'apply') {

                    axios.post('/api/admin/user/profile/update', this.models);
                    if (e.target.name == 'save') this.$bRouter.go(-1);
                    return;
                }
                this.$bRouter.go(-1);


            },
            photoLoad: function (e) {
                var img = document.querySelector('#profile-photo');
                var reader = new FileReader();

                reader.onload = (e) => {
                    img.style.backgroundImage = 'url(' + e.target.result + ')';
                    this.models.Consumer[0].photo = e.target.result;
                };

                reader.readAsDataURL(e.target.files[0]);

            },
            deletePhoto() {
                var img = document.querySelector('#profile-photo');
                var img_input = document.querySelector('#photo-load');
                img.style.backgroundImage = '';
                this.models.Consumer[0].photo = "";
                img_input.value = '';
            }
        },

        mounted() {

            /*this.$parent.$refs.dmodal*/

            var photo = true;

            if (this.$bRouter.path == '/profileTest') photo = false;

            if (this.$store.getters.getLang == 'en') this.actual = 'Actual';
            if (this.$store.getters.getLang == 'ru') this.actual = 'Актуальность';

            /*axios.post('/admin/user/card', {photo:photo})*/
            axios.post(this.$bRoute.meta.route,{photo:photo})
                .then(res => {
                    this.tabs = res.data.tabs;
                    this.models = res.data.main_data_models;
                    this.actions = res.data.actions.actions_card;
                    this.links = res.data.links;
                    this.photo_block = res.data.form_parameters.photo_block;
                    this.photo = res.data.main_data_models.Consumer[0].photo;

                    this.$nextTick(() => {
                        document.querySelector('#profile-photo').style.backgroundImage = 'url(' + this.photo + ')'; //устанавливаем фотографию при загрузке
                    });
                });


//                this.fields=[
//                    {title:'Общая информация', model:'', type:'title', column:1},
//                    {title:'Логин', model:'consumer_login', type:'label', column:1},
//                    {title:'Имя', model:'name', type:'text', column:1},
//                    {title:'Код', model:'consumer_code', type:'label', column:1},
//                    {title:'Изменить пароль', model:'', type:'button', column:1, action:'passwordf'},
////                    {title:'Изменить e-mail', model:'', type:'button', column:1, action:'emailModal'},
//
//
//
//                    {title:'Контактная информация', model:'', type:'title', column:2},
//                    {title:'E-mail', model:'email', type:'label', column:2},
//                    {title:'E-mail 2', model:'email2', type:'text', column:2},
//                    {title:'Номер телефона', model:'phone_number', type:'text', column:2},
//                    {title:'URL', model:'url_name', type:'text', column:2},
//
//                    {title:'Личная информация', model:'', type:'title', column:3},
//                    {title:'Фамилия', model:'last_name', type:'text', column:3},
//                    {title:'Имя', model:'first_name', type:'text', column:3},
//                    {title:'Отчество', model:'middle_name', type:'text', column:3},
//                    {title:'Пол', model:'male_l', type:'select', options:[{name:'Male', id:1},{name:'Female', id:0}], column:3},
//                    {title:'Дата рождения', model:'birth_date', type:'date', column:3},
//                ];
//            axios.get('/admin/user/profile', null)
//                .then(res=>{
//                    this.modelObj=res.data.consumer;
//                })

        },
        components: {
            Datepicker,
        }
    }

</script>

<style lang="scss">
	@import '../../sass/variables';
	@import '../../sass/mixin';
	
	.user-profile {
		
		.block {
			display: flex;
			@include tablet-big {
				flex-direction: column;
			}
		}
		.top-buttons {
			padding-left: 15px;
			margin-bottom: 5rem;
			a {
				text-decoration: none;
			}
			.btn-green,.btn-grey {
				a {
					color: $white-color;
					
				}
			}
		}
		
		.col-md-4 {
			@include tablet-big {
				flex-direction: row;
				width: 100%;
				min-width: 100%;
				max-width: 100%;
				margin-bottom: 3rem;
				
			}
			
			display: flex;
			flex-direction: column;
			align-items: center;
			
			.photo-block {
				margin-top: 2rem;
				/*background-color: green;*/
				border-radius: 50%;
				width: 20rem;
				height: 20rem;
				max-height: 20rem;
				@include desktop-max-little {
					height: 20rem;
					width: 20rem;
					max-height: 20rem;
				}
				@include tablet-big {
					width: 17rem;
					height: 17rem;
				}
				
				@include phone {
					max-height: 9rem;
					max-width: 9rem;
				}
				
				#profile-photo {
					height: 100%;
					width: 100%;
					background-size: cover;
					background-position: center center;
					-webkit-border-radius: 50%;
					-moz-border-radius: 50%;
					border-radius: 50%;
				}
			}
			.photo-wrapper {
				display: flex;
				flex-direction: column;
				align-items: center;
				@include tablet-big {
					padding-left: 3rem;
				}
				.user-name {
					margin-top: 3.5rem;
					color: $grey-font;
					font-size: 1.8rem;
				}
				
				.photo-buttons {
					margin-top: 3rem;
					button, label {
						max-height: 3.5rem;
						font-size: 1.5rem;
						padding: .5rem 2rem;
						@media all and(max-width: 450px) {
							width: 100% !important;
						}
					}
					.dark {
						background-color: $dark-grey !important;
					}
					
					/*@media all  and(min-width:450px){*/
					/*width:100%;*/
					/*}*/
				}
			}
			
		}
		.col-md-12 {
			max-width: 100%;
		}
		.profile-card {
			padding-top: 3.5rem;
			/*min-height: 80rem;*/
			background-color: white;
			display: flex;
			flex-direction: column;
			.col-md-3 {
				min-width: 100%;
				max-width: 100%;
				max-height: 9rem;
			}
			//Bogdan Yartsun 01.10.2018 Добавление стилей
			.col-md-small {
				min-width: 50%;
				max-width: 50%;
				padding-left: 15px;
				padding-right: 15px;
				position: relative;
				min-height: 1px;
				
			}
			
			.field-box {
				margin-bottom: 3rem;
				label {
					color: #202a3d;
					font-size: 1.4rem;
					display: flex;
					font-weight: 600;
					text-transform: capitalize;
					padding-left: .3rem;
				}
				input {
					width: 100%;
					height: 3.5rem;
					border-radius: 4px;
					border: 1px solid #ced0da;
					background-color: #ffffff;
					padding-left: 2rem;
					font-size: 1.5rem;
					margin-top: 1.3rem;
					padding-right: 1.5rem;
				}
				select {
					width: 100%;
					margin-top: 1.3rem;
					height: 3.5rem;
					border-radius: 4px;
					border: 1px solid #ced0da;
				}
				.contractor_checkbox {
					height: 3.5rem;
					display: flex;
					align-items: center;
				}
				.contractor_parag {
					height: 3.5rem;
					margin-top: 1.2rem;
					display: flex;
					align-items: center;
					padding-left: 2rem;
					input {
						border: none;
					}
					p {
						margin-bottom: 0;
					}
					
				}
				.label-green {
					color: $accent;
					font-size: 1.7rem;
					/*letter-spacing: 1px;*/
					font-weight: 400;
				}
				button {
					padding: 0;
				}
			}
			.fields {
				display: flex;
				flex-wrap: wrap;
			}
			.left-block,
			.middle-block,
			.right-block {
				display: flex;
				flex-direction: row;
				width: 33.3%;
				flex-wrap: wrap;
				border-right: $border-grey;
				height: 100%;
			}
			
			.left-block {
				@media all and(max-width: 992px) {
					width: 100%;
					flex-direction: row;
					flex-wrap: wrap;
					.col-md-3 {
						max-width: 100%;
						min-width: 100%;
					}
					.first-line {
						min-width: 100% !important;
					}
					.dark {
						padding: 1rem;
					}
				}
				
				@include tablet-mobile {
					.col-md-3 {
						min-width: 100%;
					}
					.dark {
						margin-top: 0;
					}
				}
				
			}
			
			.middle-block,
			.right-block {
				@media all and(max-width: 992px) {
					width: 50%;
				}
				
				@include tablet-mobile {
					width: 100%;
				}
			}
			
			.first-line {
				max-height: 4rem;
				min-width: 100% !important;
			}
			
			.dark {
				margin-top: 2.6rem;
				margin-bottom: 0;
				height: 3.5rem;
				background-color: $dark-grey !important;
				font-size: 1.5rem;
				line-height: 1.4rem;
				width: 100%;
				box-shadow: 0 5px 7px 1px rgba(120, 134, 153, 0.22) !important;
			}
			
			.card-buttons {
				display: flex;
				justify-content: flex-end;
				margin-bottom: 6rem;
				margin-top: 2rem;
				@include tablet-mobile {
					flex-direction: column;
					.card-buttons-list {
						flex-wrap: wrap;
						padding: 0 15px;
						margin-top: 2rem;
						.btn {
							width: 100%;
							margin-right: 0;
							margin-bottom: .8rem;
						}
					}
				}
				.contractor_checkbox {
					margin-right: auto;
					padding-left: 1.5rem;
					font-size: 1.5rem;
					font-weight: 400 !important;
				}
				.card-buttons-list {
				
				}
			}
		}
		
		.left-zone,
		.right-zone {
			display: flex;
			flex-wrap: wrap;
			height: 100%;
			@include desktop-max-little {
				max-width: 50%;
				
			}
			@include tablet-big {
				max-width: 100%;
			}
			
			@include tablet-mobile {
				.col-md-4 {
					min-width: 100% !important;
				}
				min-width: 100%;
				
			}
			
			/*@media all and(max-width: 1250px) {*/
			/*background-color: green;*/
			/*max-width: 50%;*/
			/*}*/
			min-width: 50%;
			
			max-width: 50%;
			.col-md-16 {
				max-width: 100%;
				min-width: 100%;
				@media all and(min-width: 992px) {
					order: unset !important;
					
				}
			}
			
			.col-md-12 {
				@media all and(min-width: 992px) {
					order: unset !important;
					
				}
				min-width: 75%;
				max-width: 75%;
			}
			
			.col-md-8 {
				max-width: 50%;
				min-width: 50%;
				@media all and(min-width: 992px) {
					order: unset !important;
					
				}
				
				@include tablet-big {
					max-width: 50%;
					min-width: 50%;
				}
				
				@include tablet-mobile {
					max-width: 100%;
					min-width: 100%;
				}
			}
			
			.col-md-4 {
				max-width: 25%;
				min-width: 25%;
				@media all and(min-width: 992px) {
					order: unset !important;
					
				}
				
				@include tablet-big {
					max-width: 50%;
					min-width: 50%;
				}
				@include tablet-mobile {
					max-width: 100%;
					min-width: 100%;
				}
			}
			
			.col10 {
				@media all and(min-width: 992px) {
					order: unset !important;
					
				}
				
				max-width: 10%;
				min-width: 10%;
				padding-left: 15px;
				padding-right: 15px;
				@include tablet-mobile {
					max-width: 100% !important;
					min-width: 100% !important;
				}
			}
			
			.col20 {
				@extend .col10;
				max-width: 20%;
				min-width: 20%;
			}
			
			.col30 {
				@extend .col10;
				max-width: 30%;
				min-width: 30%;
			}
			
			.col33 {
				@extend .col10;
				max-width: 33.3%;
				min-width: 33.3%;
			}
			
			.col40 {
				
				max-width: 40%;
				min-width: 40%;
				@extend .col10;
			}
			
			.col60 {
				@extend .col10;
				min-width: 60%;
				max-width: 60%;
			}
			
			.col70 {
				@extend .col10;
				min-width: 70%;
				max-width: 70%;
			}
			
			.col80 {
				@extend .col10;
				min-width: 80%;
				max-width: 80%;
			}
			
			.col90 {
				@extend .col10;
				min-width: 90%;
				max-width: 90%;
			}
			
		}
		.vdp-datepicker__calendar {
			top: -27rem;
			height: 28rem;
		}
		.border-right {
			border-right: $border;
		}
		.full-width {
			width: 100%;
			max-width: 100%;
		}
		
		.photo-left-col {
			@include tablet-mobile {
				min-width: 100%;
				max-width: 100%;
			}
			min-width: 33%;
			max-width: 33%;
			& > div {
				min-width: 100% !important;
				max-width: 100% !important;
			}
		}
		.photo-right-col {
			@include tablet-mobile {
				min-width: 100%;
				max-width: 100%;
			}
			min-width: 66%;
			max-width: 66%;
		}
	}
</style>
