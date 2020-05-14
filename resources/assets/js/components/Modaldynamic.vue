<template>
	<div class="dynamic modal-wrapper" v-show="show" @click.stop="hideModal">
		
			<div class="modal-body" :class="{htmlmodal:ishtmlModal}" ref="modalBody" @click.stop="">
				<!--@click.stop="" нужен, чтобы окно не закрывалось при клике на форму-->
				<div class="input-modal">
					<form v-if="!confirm && !ishtmlModal" action="" data-vv-scope='ModalForm'>
						<div class="field-box" v-for="item in inputs">
							<!--Ставим поля ввода в форму-->
							<label>{{item.title}}</label>
							<input :data-vv-as="item.customname" v-validate="item.validation"
							       v-if="item.type=='text'|| item.type=='password'"
							       :type="item.type"
							       :name="item.model"
							       :ref="item.ref"
							       v-model="modelObj[item.model]"
							>
							<span v-if="errors.has('ModalForm.' + item.model)" style="display: block;" class="vv-error">{{ errors.first('ModalForm.' + item.model) || server_errors.first(item.model) }}</span>
						</div>
					</form>
					<div v-if="confirm || ishtmlModal" v-html="html"></div>
					<button class="closeModal" @click="focehideModal"> <i class="fa fa-times"></i> </button>
					<div class="control-buttons" v-if="!ishtmlModal">
						<!--Копки для формы-->
						<a v-for="action in actions" :disabled="action.disabled" class="btn " :class="action.class"
						   @click=" actionClick( action.code,action )">
							<!--
							:disabled="!isValid && action.code == 'submit' "
							не получилось проверять поля на валидацию
							-->
							{{action.title}}
						
						</a>
					</div>
				</div>
			</div>
		
	</div>
</template>
<script>

    import axios from 'axios';
    import {mapGetters} from 'vuex';
    import {VueEditor} from "vue2-editor";

    export default {
        watch: {},
        computed: {},

        data: function () {
            return {
                show: false,
                inputs: false,
                ipost: false,
                actions: false,
                model: false,
                confirm: false,
                html: false,
                ishtmlModal: false,
	            responseData:false,
                modelObj: {},
            }
        },

        methods: {
            async showmodal(info) {
                /*Иннициализация модальных окон*/
	            
                this.actions = info.modal.actions;
	            this.actions.forEach((action)=>{
                    this.$set(action, 'disabled', false);
	            });
                
                this.confirm = false;
                return await this.modalinit(info);


            },
            async confirmmodal(info) {

                var
                    actionOk =
                        {
                            ...{
                                'visible': 1,
                                "title": "Ok",
                                "code": "confirmOK",
                                "class": "btn btn-green",
                            },
                            ...(info.modal.actionOk || {})
                        },
                    actionCancle =
                        {
                            ...{
                                'visible': 1,
                                "title": "Отмена",
                                "code": "resetModal,focehideModal",
                                "class": "btn btn-grey",
                            },
                            ...(info.modal.actionCancle || {})
                        };


                this.confirm = true;
                this.html = info.modal.html;
                this.actions = [];
                if (actionOk.visible) this.actions.push(actionOk);
                if (actionCancle.visible) this.actions.push(actionCancle);

                return await this.modalinit(info);
            },
            htmlmodal(info) {
                this.show = true;
                this.ishtmlModal = true;
                this.html = info.modal.html;
            },

            async modalinit(info) {
                this.show = true; // Открывает окно
                this.inputs = info.modal.inputs; // описывает поля ввода
                this.ipost = info.modal.ipost; // Запрос по клику на кнопку

                this.model = info.model || {}; // Вся структура Модели
                return await this.f().then(() => {
                    /*Тут возвращается результат формы
                      note:this.modelObj - всегда возвращает обьект, а не false при отмене ...  */
                    return JSON.stringify(this.modelObj) != '{}' && this.modelObj ? this.modelObj : false
                });

            },

            // ожидание результата Начало
            async f() {
                // Запуск ожидания
                var self = this;
                if (self.show) { // если окно открыто
                    await self.modalWait().then(async function () { // Продолжаем ждать
                        await self.f();
                    }, function () {
                        // Функция отказа промиса
                        return 'fail'
                    });
                } else {
                    return false
                }
            },

            async modalWait() {
                var self = this;
                return new Promise(function (res, rej) {
                    setTimeout(function () {
                        // Ждем
                        res();
                    }, 1000); // note:по факту вреяя ожилания ничего не меняет
                });
            },
            // ожидание результата Конец

            actionClick: async function (code,item) {
                
                item.disabled = true;
                
                /*Клик по кнопе в нутри popup*/
                await this.processArray(code.split(','));
                this.undisablebtn()
            },
	        undisablebtn(){
                //отключает disable для всех кнопок
                if(!this.$data.actions) return false;
                this.$data.actions.forEach(function (el) {
			        el.disabled=false;
                })
	        },
            async ModalRequest() {
                /*Метод делает запрос на бэк*/
	            
	            var rs= await this.$validator.validateAll('ModalForm');
                if (rs) {
                  //  var r = await axios.post(this.ipost, this.modelObj);
                    try {
                        var   r = await axios.post(this.ipost, this.modelObj);
                    } catch (e) {
                        // необработаная ошибка
	                    // TODO:WTF?!
                     
	                    var mes= "";
                        for (var error in e.response.data.errors) {
                            mes+= e.response.data.errors[error]+' '
                        }
                        this.showtoast({data:{status:true,message:mes}})
	                    
                    }
                    this.responseData = r.data;
					this.$store.commit('setModalResponse',r.data);
                    return r;
                    //this.show = false;
                }
                else {
                    this.showtoast({
                        data: {
                            status: 3,
                            message: "Поля введены неверно"
                        }
                    });
                }
                
            },
            async processArray(array) {
                /*Метод перебирает процессы с кнопки*/
                var res;
                for (const item of array) {
                    if(/await./.test(item))
                    {
                        res = await this[item.split('.')[1]](res)
                    }
                        else {
                            this[item](res);
                     
                    }
                }
            },
            confirmOK() {
                
                this.modelObj = true;
                this.show = false;
                this.undisablebtn()
            },
            resetModal: function () {
                /*Обнуляет форму*/
                this.$validator.reset(); // обнуляем форму
                this.modelObj = {}; // обнуляем введенные данные
                
            },
            hideModal: function () {
                /*Проверяет поля ну пустоту и закрывает окно */
	            if(this.responseData.status) return false;
                for (var item in this.modelObj ) {
                    if (item  ) {
                        return false;
                    }
                }
                this.focehideModal()
            },
            focehideModal() {
                
                /*Закрывает окно, без проверки на пустоту полей*/
                
                this.show = false;
                this.inputs = false;
                this.ipost = false;
                this.actions = false;
                this.model = false;
                this.confirm = false;
                this.html = false;
                this.ishtmlModal = false;
                this.responseData = false;
            },

            ReturnRes(res) {
                /* Метод возвращает результат в указанные поля в переданой модели
                *  Нужно, если метод вызывается инлафново ( <button @click=" $parent.$refs.dmodal.showmodal({modal:item.modal,model:models[block.block_model][0]})"> </button> ) , можно сюда передать модель и если поля
                *  'returnfield' совпадет с названием свойства в переданном обьекте this.model, то данные из формы
                *  передадутся в ней */
                if (res.data.status || JSON.stringify(this.model) == '{}') return res;
                if(this.inputs){
					this.inputs.forEach(item => {
						this.model[item.returnfield] = this.modelObj[item.model];
					});
				}
                return res;

            },
            showtoast(res) {
                
                // Метод вызывает toast
                if (res && !res.data.status) {
                    this.$toast.success(res.data.message, '', {position: 'topRight'});
                    this.focehideModal(); // Закрыть окно после успеха
                }
                else {
                    this.$toast.error(res.data.message, '', {position: 'topRight'})
                }
                this.undisablebtn();
                return res;
            },
            ifResetModal(res) {
                /*Обнуление при успехе*/
                if (res && !res.data.status) {
                    this.resetModal();
                }
                return res;
            }
        },
        beforeUpdate() {
        
        },
 
	    updated(){
     
	    }
    }

</script>
<style lang="scss">
	@import '../../sass/variables';
	@import '../../sass/mixin';
	
	.dynamic.modal-wrapper {
		
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		
		bottom: 0;
		background-color: rgba(135, 143, 153, .4);
		transition: left .35s;
		display: flex;
		justify-content: center;
		align-items: center;
		z-index: 99;
	 
		.quillWrapper {
			margin-bottom: 20px;
		}
		.modal-body {
			position: absolute;
			
			top: 100px;
			/*left: 50%;*/
			left: -100%;
			right: -100%;
			
			margin: auto;
			
			transform: none;
			
			//transform: translateX(-50%);
			background-color: $white-color;
			width: 58rem;
			border-radius: .5rem;
			table{
				width: auto!important;
			}
			.closeModal {
				width: 100%;
				display: inline-block;
				text-align: right;
				padding-bottom: 2rem;
				background-color: transparent;
				border:none;
				width: auto;
				height: auto;
				position: absolute;
				top: 10px;
				right: 10px;
				padding: 5px;
				
			}
			&.htmlmodal {
				max-width: 90%;
				width: auto;
				position: relative;
				display: inline-block;
				left: 0;
				right: 0;
				top: 0;
				
				
				.input-modal {
					overflow: auto;
					max-width: 100%;
					max-height: 80vh;
					width: auto;
					display: inline-block;
				}
			}
			
			.input-modal {
				display: flex;
				flex-direction: column;
				align-items: center;
				padding-top: 6.5rem;
				padding-bottom: 7.5rem;
				.field-box {
					max-width: 33rem;
					margin-bottom: 3rem;
					label {
						color: #202a3d;
						font-size: 14px;
						display: flex;
						font-weight: 600;
					}
					input {
						width: 100%;
						height: 35px;
						border-radius: 4px;
						border: 1px solid #ced0da;
						background-color: #ffffff;
						padding-left: 20px;
						font-size: 15px;
						margin-top: 13px;
						padding-right: 15px;
						min-width: 33rem;
					}
					select {
						width: 100%;
						margin-top: 13px;
						height: 35px;
						border-radius: 4px;
						border: 1px solid #ced0da;
					}
					.contractor_checkbox {
						height: 35px;
						display: flex;
						align-items: center;
					}
					.contractor_parag {
						height: 3.5rem;
						margin-top: 1.2rem;
						display: flex;
						align-items: center;
						p {
							margin-bottom: 0;
						}
						
					}
				}
				
				.errors {
					min-width: 33rem;
					p {
						color: red;
					}
				}
				
				.control-buttons {
					min-width: 33rem;
					margin-top: 1rem;
					display: flex;
					justify-content: space-between;
					.btn {
						//width: calc(50% - 10px);
						margin: 0;
						
						margin-right: 0.90909rem;
						width: auto;
						padding: 15/11*1rem;
						min-width: 115/11*1rem;
						margin-right: 10/11*1rem;
						&:last-child {
							margin-right: 0;
						}
						&[disabled]{
							opacity: .3;
						}
					}
				}
			}
			
			.confirm-modal {
				padding-top: 6.5rem;
				padding-bottom: 7.5rem;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				
				h1 {
					padding-bottom: 1rem;
					font-size: 2.5rem;
					font-weight: 900;
				}
				
				p {
					padding-bottom: 3.5rem;
					font-size: 1.4rem;
					word-spacing: 1px;
				}
				
				.control-buttons {
					a {
						height: 3.5rem !important;
						line-height: 1.3rem;
						font-size: 1.4rem;
						padding: 1rem 3rem;
					}
				}
			}
			
			.infoModal {
				padding-top: 6.5rem;
				padding-bottom: 6.5rem;
				display: flex;
				flex-direction: column;
				align-items: center;
				h1 {
					text-align: center;
					margin-bottom: 3rem;
				}
				.btn {
					max-width: 10rem;
					height: 3.5rem !important;
					line-height: 1.3rem;
					font-size: 1.4rem;
					padding: 1rem 3rem;
				}
			}
			.htmlModal {
				.htmlModalBody {
					overflow: auto;
					max-height: 55rem;
					justify-content: center;
					align-items: center;
					embed {
						width: 100%;
						height: 55rem;
					}
				}
				
			}
		}
		
		.small {
			width: 35rem !important;
		}
		.htmlModal-body {
			max-width: 100rem;
			width: 100%;
			@include tablet-mobile() {
				width: 95vw;
			}
		}
		
		.documentModal {
			.modal_documentTable {
				display: flex;
				flex-direction: column;
				margin: 2rem 0;
				&_row {
					display: flex;
				}
				&_thead {
					.modal_documentTable_row {
						.modal_documentTable_col {
							padding-left: 3rem;
							background: rgb(120, 134, 153);
							height: 4.1rem;
							color: rgb(255, 255, 255);
							vertical-align: middle;
							font-weight: 600;
							border-right: 1px solid rgb(255, 255, 255);
							border-left: 1px solid rgb(255, 255, 255);
							white-space: nowrap;
							text-overflow: ellipsis;
							width: 100%;
							font-size: 1.5rem;
							display: flex;
							align-items: center;
						}
					}
				}
				&_tbody {
					.modal_documentTable_row {
						.modal_documentTable_col {
							padding-left: 3rem;
							background: rgb(255, 255, 255);
							border: 1px solid rgb(228, 231, 234);
							height: 4.1rem;
							vertical-align: middle;
							font-size: 1.5rem;
							color: rgb(124, 140, 165);
							word-wrap: break-word;
							width: 100%;
							display: flex;
							align-items: center;
						}
						.actual_l {
							padding-left: 0 !important;
							display: flex;
							justify-content: center;
							align-items: center;
							padding-left: 1.5rem !important;
							padding-right: 1.5rem !important;
						}
					}
				}
				.actual_l {
					width: 40% !important;
				}
			}
		}
		
		.vv-error {
			font-size: 1.3rem;
			color: $light-grey;
			padding-left: 2rem;
			position: absolute;
			margin-top: 3/11*1rem;
		}
	}
	
	.rb .dynamic.modal-wrapper {
		.vv-error {
			margin-top: 3/11*1rem;
		}
	}
	
	.m {
		&l-a {
			margin-left: auto !important;
		}
		&r-a {
			margin-right: auto !important;
		}
		
	}
</style>
