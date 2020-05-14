<template>
	<div class="modal-wrapper" v-show="getModalState" @click.stop="hideModal" >

		<div :class="{'modal-body':true, 'small':getModalType=='infoModal','htmlModal-body':getModalType=='htmlModal'}" @click.stop="" ref="modal" >

			<div v-if="getModalType=='passwordModal' || getModalType=='emailModal'  || getModalType=='loginModal'" class="input-modal">

				<div class="field-box" v-for="item in inputs">

					<label >{{item.title}}</label>
					<input :data-vv-as="item.customname" v-validate="item.validation" v-if="item.type=='text'|| item.type=='password'" :type="item.type" :name="item.model" v-model="modelObj[item.model]" :ref="item.ref" >

					<span style="display: block;" class="vv-error">{{ errors.first('' + item.model) || server_errors.first(item.model) }}</span>
				</div>

				<div class="control-buttons">
					<a  class="btn btn-green" @click="modalSendRequest">Применить</a>
					<a  class="btn btn-grey" @click="hideModal"> Отменить</a>
				</div>
			</div>
			<div v-if="getModalType=='confirmModal'" class="confirm-modal">
				<h1>{{getModalTexts.confirmModalText.h1}}</h1>
				<p>{{getModalTexts.confirmModalText.p}}</p>
				<div class="control-buttons">
					<a  class="btn btn-grey" @click="hideModal">{{getModalTexts.confirmModalText.btn_revert}}</a>
					<a  class="btn btn-green" @click="submitModal">{{getModalTexts.confirmModalText.btn_confirm}}</a>

				</div>
			</div>
			<div v-if="getModalType=='editorModal'" class="editor-modal">
				<vue-editor v-model="editor"></vue-editor>
				<div class="control-buttons">
					<a  class="btn btn-green" @click="saveEditor">{{getModalTexts.save}}</a>
					<a  class="btn btn-grey" @click="hideModal">{{getModalTexts.cancel}}</a>
				</div>
				<div class="hidden">
					{{loading = true}}
				</div>
			</div>
			<div v-if="getModalType==='documentModal'" class="documentModal">
				<h1>{{getModalTexts.h1}}</h1>
				<p v-if="getModalTexts.p">{{getModalTexts.p}}</p>
				<div class="modal_documentTable">
					<div class="modal_documentTable_thead">
						<div class="modal_documentTable_row">
							<div class="modal_documentTable_col modal_documentTable_col-name">Наименование</div>
							<div class="modal_documentTable_col actual_l">Актуальность</div>
						</div>
					</div>
					<div class="modal_documentTable_tbody">
						<div class="modal_documentTable_row">
							<div class="modal_documentTable_col modal_documentTable_col-name">Наименование</div>
							<div class="modal_documentTable_col actual_l">
								<div class="list_checkbox checkbox checkbox-all">
									<label>
										<input type="checkbox" id="1">
										<span class="checkbox-custom"><i class="fa fa-check"></i></span>
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="control-buttons">
					<a  class="btn btn-grey" @click="hideModal">{{getModalTexts.btn_revert}}</a>
					<a  class="btn btn-green" @click="submitModal">{{getModalTexts.btn_confirm}}</a>
				</div>
			</div>
			<div v-if="getModalType=='infoModal'" class="infoModal">
				<h1>{{getModalTexts}}</h1>
				<a class="btn btn-green" @click="$store.commit('hideModal')">OK</a>
			</div>

			<div v-if="getModalType=='htmlModal'" class="htmlModal">
				<span class="closeModal" @click="$store.commit('hideModal')"><i class="fa fa-times"></i></span>
				<div v-html="getModalHtml" class="htmlModalBody"></div>
			</div>
		</div>
	</div>
</template>

<script>
    import axios from 'axios';
    import {mapGetters} from 'vuex';
    import { VueEditor } from "vue2-editor";
    export default {
        watch: {

            loading(a){
                if(a === true){
                    if(this.getModalType==='editorModal'){
                        this.editor = this.getModalEditorContent.value;
                    }
                }
            },
            'getModalType': {
                immediate: true,
                handler (value) {
                    let tlang =  this.$store.getters.getLang == 'ru'? false:true;
                    let ntitlee= {
                        oldpass: tlang? 'Введите старый пароль':'Enter old password',
                        newpass: tlang? 'Введите новый пароль':'Enter new password',
                        reppass: tlang? 'Повторите  новый пароль':'Repeat new password',
                        newmail: tlang? 'Введите новый email' : 'Enter new email',
                        newlogin:tlang? 'Введите новый логин' : 'Enter new login '

                    }
                    if (value === 'passwordModal') {
                        this.inputs = [
                            {
                                title:ntitlee.oldpass,
                                model: 'oldPassword',
                                customname:'old Password',
                                type: 'password',
                                showError: false,
                                errors: [],
                                validation: {required: true,}
                            },
                            {
                                title: ntitlee.newpass,
                                model: 'newPassword',
                                customname:'new Password',
                                type: 'password',
                                showError: false,
                                errors: [],
                                validation: {required: true},
                                ref: 'password'
                            },
                            {
                                title: ntitlee.reppass,
                                model: 'repeatPassword',
                                customname:'repeat Password',
                                type: 'password',
                                showError: false,
                                errors: [],
                                validation: {required: true, confirmed: 'password'}
                            },
                        ]
                    }
                    if (value === 'emailModal') {
                        this.inputs = [
                            {
                                title: ntitlee.newmail,
                                model: 'newEmail',
                                customname:'new Email',
                                type: 'text',
                                validation: {required: true, email: true}
                            },
                        ]
                    }
                    if (value === 'loginModal') {
                        this.inputs = [
                            {title: ntitlee.newlogin, model: 'newLogin', type: 'text', validation: {required: true,}},
                        ]
                    }
                }
            }

        },
        computed:{
            ...mapGetters([
                'getModalState',
                'getModalType',
                'getModalTexts',
                'getModalHtml',
                'getModalEditorContent',
            ]),
        },

        data:function () {
            return{
                some:'',
                editor: '',
                loading: false,
                showRepeatError:false,
                modelObj:{
                    oldPassword:'',
                    newPassword:'',
                    repeatPassword:'',
                    newEmail:''
                },
                inputs:[],
                server_errors:{
                    first:function (elem) {
//                        console.log(this[elem][0])
                        if(this[elem]!=undefined){return this[elem][0]}

                        else return '';
                    },
                    //oldPassword:['error1', 'error2', 'error3'],
                    //repeatPassword:['fghfdhdf']
                },

            }
        },

        methods:{
            saveEditor: function(){
                console.log('saveEditor');
                this.getModalEditorContent.model[this.getModalEditorContent.name] = this.editor;
                this.$store.commit('hideModal');
            },
            test:function () {

                var modal= this.$refs['modal-body'];
                console.log(modal.getBoundingClientRect())
            },
            hideModal:function () {

                this.loading = false;
                this.$store.commit('hideModal');
            },
            submitModal:function () {
                this.$store.commit('submitModal')
            },
            comparePasswords:function () {
                return (this.modelObj.newPassword===this.modelObj.repeatPassword) && this.modelObj.newPassword !='' && this.modelObj.repeatPassword!=''
            },
            modalSendRequest:function () {


                if(this.getModalType=='passwordModal' ){

                    this.$validator.validate().then(result => {
                        console.log(result);
                        if (result) {
                            for (var item in this.fieldsVV) {
                                this.fieldsVV[item].touched = true;
                            }

                            axios.post('/changePassword',this.modelObj )
                                .then(res=>{
                                    if(res.data.status==0){
                                        
                                        this.$store.commit('showModal', {type:'infoModal', infoModalText:res.data.message} );
                                        
                                        for(var key in this.modelObj){
                                            this.modelObj[key]="";
                                        }
                                    }
                                    if(res.data.status==1){

                                    }
                                    if(res.data.status==2){

                                    }
                                    this.showtoast(res);
                                })
                        }
                        else {
                            for (var item in this.fieldsVV) {
                                this.fieldsVV[item].touched = true;
                            }
                            console.log(this.fieldsVV)
                            console.log(this.errors)
                        }
                    });



                }

                if(this.getModalType == 'emailModal'){
                    this.$validator.validate().then(result => {
                        console.log(result);
                        if (result) {
                            for (var item in this.fieldsVV) {
                                this.fieldsVV[item].touched = true;
                            }
                            console.log(this.modelObj);
                            axios.post('/admin/consumer/email',this.modelObj )
                                .then(res=>{
                                    if(res.data.status==0){
                                        this.$store.commit('showModal', {type:'infoModal', infoModalText:res.data.message} );
                                        for(var key in this.modelObj){
                                            this.modelObj[key]="";
                                        }
                                    }
                                    if(res.data.status==1){

                                    }
                                    if(res.data.status==2){

                                    }
                                    this.showtoast(res);
                                });
                        }
                        else {
                            for (var item in this.fieldsVV) {
                                this.fieldsVV[item].touched = true;
                            }
                            console.log(this.fieldsVV);
                            console.log(this.errors);
                        }
                    });
                }

            },
            showtoast(res) {
                // Метод вызывает toast
                if (res && !res.data.status) {
                    this.$toast.success(res.data.message, '', {position: 'topRight'});
                    this.hideModal(); // Закрыть окно после успеха
                }
                else {
                    this.$toast.error(res.data.message, '', {position: 'topRight'})
                }
                return res;
            },



        },
        beforeDestroy(){
            this.$store.commit('defaultState');
        },
        mounted() {
            // if (this.getModalState) {
            //     var modal = this.$refs['modal'];
            //     modal.style.top = 100 + pageYOffset + 'px';
            // }
//            console.log(this.$refs)
            var self = this;
            // window.onscroll = function () {
            //     if (self.getModalState) {
            //         var modal = self.$refs['modal'];
            //         modal.style.top = 100 + pageYOffset + 'px';
            //     }
            // }
//            console.log(this.$store.state.modalType)

            // console.log(this.getModalTexts);
        },
        components: {
            VueEditor
        },
    }

</script>

<style lang="scss">
	@import '../../sass/variables';
	@import '../../sass/mixin';

	.modal-wrapper{

		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		bottom:0;
		background-color:rgba(135,143,153,.4);
		/*display: flex;*/
		/*justify-content: center;*/
		/*align-items: center;*/
		z-index:99;
		.quillWrapper{
			margin-bottom: 20px;
		}
		.modal-body{
			position: fixed;
			top:100px;
			left:50%;
			transform: translateX(-50%);
			background-color: $white-color;
			width:58rem;
			border-radius:.5rem;

			.input-modal{
				display: flex;
				flex-direction: column;
				align-items: center;
				padding-top: 6.5rem;
				padding-bottom: 7.5rem;
				.field-box{
					max-width:33rem;
					margin-bottom: 3rem;
					label{
						color: #202a3d;
						font-size: 14px;
						display: flex;
						font-weight: 600;
					}
					input{
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
					select{
						width:100%;
						margin-top:13px;
						height: 35px;
						border-radius: 4px;
						border: 1px solid #ced0da;
					}
					.contractor_checkbox{
						height: 35px;
						display: flex;
						align-items:center;
					}
					.contractor_parag{
						height:3.5rem;
						margin-top:1.2rem;
						display: flex;
						align-items: center;
						p{
							margin-bottom: 0;
						}

					}
				}

				.errors{
					min-width:33rem;
					p{
						color: red;
					}
				}

				.control-buttons{
					min-width: 33rem;
					margin-top: 1rem;
					display: flex;
					justify-content: space-between;
					a{
						width:calc(50% - 10px);
						margin: 0;
					}
				}
			}

			.confirm-modal{
				padding-top: 6.5rem;
				padding-bottom: 7.5rem;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;

				h1{
					padding-bottom: 1rem;
					font-size: 2.5rem;
					font-weight:900;
				}

				p{
					padding-bottom: 3.5rem;
					font-size: 1.4rem;
					word-spacing:1px;
				}

				.control-buttons{
					a{
						height: 3.5rem!important;
						line-height: 1.3rem;
						font-size: 1.4rem;
						padding:1rem 3rem;
					}
				}
			}

			.infoModal{
				padding-top: 6.5rem;
				padding-bottom: 6.5rem;
				display: flex;
				flex-direction: column;
				align-items: center;
				h1{
					text-align: center;
					margin-bottom: 3rem;
				}
				.btn{
					max-width:10rem;
					height: 3.5rem !important;
					line-height: 1.3rem;
					font-size: 1.4rem;
					padding: 1rem 3rem;
				}
			}
			.htmlModal{
				.htmlModalBody{
					overflow: auto;
					max-height: 55rem;
					justify-content: center;
					align-items: center;
					embed{
						width:100%;
						height:55rem;
					}
				}
				.closeModal{
					width: 100%;
					display: inline-block;
					text-align: right;
					padding-bottom: 2rem;
				}
			}
		}

		.small{
			width: 35rem !important;
		}
		.htmlModal-body{
			max-width: 100rem;
			width: 100%;
			@include tablet-mobile(){
				width: 95vw;
			}
		}

		.documentModal{
			.modal_documentTable{
				display: flex;
				flex-direction: column;
				margin: 2rem 0;
				&_row{
					display: flex;
				}
				&_thead{
					.modal_documentTable_row{
						.modal_documentTable_col{
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
				&_tbody{
					.modal_documentTable_row{
						.modal_documentTable_col{
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
						.actual_l{
							padding-left: 0 !important;
							display: flex;
							justify-content: center;
							align-items: center;
							padding-left: 1.5rem !important;
							padding-right: 1.5rem !important;
						}
					}
				}
				.actual_l{
					width: 40% !important;
				}
			}
		}

		.vv-error{
			font-size: 1.3rem;
			color: $light-grey;
			padding-left: 2rem;
			position: absolute;
			margin-top: 3/11*1rem;
		}
	}
	.rb modal-wrapper {
		.vv-error{
			margin-top: 3/11*1rem;
		}
	}
</style>
