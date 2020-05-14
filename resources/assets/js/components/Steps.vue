<template>
    <div class="steps container no-padding" v-if="current_step">
        <div class="steps-panel">
            <div class="step"
                 v-for="(step,index) in steps"
                 :class="{'active':index == current_step_index, 'done':step['completed_l']}"
                 v-if="step['line_n'] !== 0"
                 @click="switchStep(index)"
            >
                <div class="step-text">
                    <h3>{{step.fe_route_step_title}}</h3>
                    <p>{{step.fe_route_step_name}}</p>
                </div>
                <!--<img :src=" index == current_step_index ? '/public/img/interfacerbl/rbl_edit.svg' : step['completed_l'] ? '/public/img/interfacerbl/rbl_done.svg' : '/public/img/interfacerbl/rbl_error.svg'" alt="" class="svg">-->
                <!--Так как иначе придется вызывать скрипт по трансформации img в svg каждый раз после клика и удалять старый svg-->
                <div v-show="index == current_step_index">
                    <img class="svg"  src="/public/img/interfacerbl/rbl_edit.svg" alt="">
                </div>
                <div v-show="index != current_step_index && step['completed_l']" >
                    <img class="svg"  src="/public/img/interfacerbl/rbl_done.svg" alt="">
                </div>
                <div v-show="index != current_step_index && !step['completed_l']">
                    <img class="svg"  src="/public/img/interfacerbl/rbl_error.svg" alt="">
                </div>
                
<!--                <p style="position: absolute; top: 0; right: 1rem;">{{step.completed_l}}</p>-->
            </div>
        </div>
        
        <div class="steps__container">
            <transition name="fade" appear mode="out-in">
                <router-view @modelSaved="modelSaved"
                             :key="$bRoute.fullPath"
                             :disable_inputs="disable_inputs"
                             :row_id_fe_route_step_object="current_step['row_id_fe_route_step_object']"
                             :step_l="'true'"
        
                ></router-view>
            </transition>
        </div>
        
        <div class="d-flex" v-if="current_step_index+1 <= steps.length -1">
            <div @click="switchStep(current_step_index-1)" class="btn btn-empty left"><img src="/public/img/interfacerbl/rbl_arrow.svg" alt="" class="svg">  Назад </div>
            <div class="btn btn-empty "> Шаг {{current_step_index+1}} </div>
            <div @click="switchStep(current_step_index+1)" class="btn btn-empty right"> Далее <img src="/public/img/interfacerbl/rbl_arrow.svg" alt="" class="svg"> </div>
            
            <button @click="closeStep" class="btn btn-darkaccent"> Закрыть шаг </button>
        </div>
    
    </div>


</template>

<script>
    import {EventBus} from '../app';

    const Home = resolve => {
        require.ensure(['./Home.vue'], () => {
            resolve(require('./Home.vue'))
        });
    };
    const List = resolve => {
        require.ensure(['./List.vue'], () => {
            resolve(require('./List.vue'));
        });
    };
    const Card = resolve => {
        require.ensure(['./Card.vue'], () => {
            resolve(require('./Card.vue'));
        });
    };
    const Report = resolve => {
        require.ensure(['./Report.vue'], () => {
            resolve(require('./Report.vue'));
        });
    };
    const Profile = resolve => {
        require.ensure(['./Profile.vue'], () => {
            resolve(require('./Profile.vue'));
        });
    };
    const Error = resolve => {
        require.ensure(['./Error.vue'], () => {
            resolve(require('./Error.vue'));
        });
    };
    const Document = resolve => {
        require.ensure(['./Document.vue'], () => {
            resolve(require('./Document.vue'));
        });
    };
    const TextPage = resolve => {
        require.ensure(['./TextPage.vue'], () => {
            resolve(require('./TextPage.vue'));
        });
    };
    const Steps = resolve => {
        require.ensure(['./Steps.vue'], () => {
            resolve(require('./Steps.vue'));
        });
    };
    const Info = resolve => {
        require.ensure(['./Info.vue'], () => {
            resolve(require('./Info.vue'));
        });
    };


    export default {
        data: function () {
            return {
                steps: [],
                current_step_index: null,
                current_step: null,
                completed_l: null,          // все шаги закрыты
                steps_config: null,           //набор конфигурационных констант
                disable_inputs: false,
                izitoast_question_config: {
                    timeout: 20000,
                    close: false,
                    overlay: true,
                    toastOnce: true,
                    id: 'question',
                    zindex: 999,
                    index_to: null,
                    step_is_completed: null,
                    position: 'center',
                    buttons: [
                        ['<button><b>YES</b></button>', async (instance, toast) => {
                            // this.goToStep(this.izitoast_question_config.index_to, this.izitoast_question_config.step_is_completed); //вызываем функцию
                            // перехода на шаг после нажатия на изитоаст
                            if (this.steps_config.allow_editing_completed && this.completed_l) {
                                await this.rollbackRequest();
                                await this.loadSteps(true)
                            }

                            this.goToStep(this.izitoast_question_config.index_to, this.izitoast_question_config.step_is_completed);
                            instance.hide({transitionOut: 'fadeOut'}, toast, 'button');
                        }, true],
                        ['<button>NO</button>', (instance, toast) => {
                            instance.hide({transitionOut: 'fadeOut'}, toast, 'button');
                        }]
                    ],
                    onClosing: (instance, toast, closedBy) => {

                    },
//                            onClosed: function (instance, toast, closedBy) {
//                                console.info('Closed | closedBy: ' + closedBy);
//                            }
                },


            }
        },
        methods: {
            setCurrentStep() {
                this.steps.some((step, index) => {
                    if (!step.completed_l) {
                        this.current_step = step;
                        this.current_step_index = index;
                        // if(!this.$bRoute.path.includes(this.current_step.fe_route_step_code)&& this.$bRoute.path)
                        this.$bRouter.replace(this.$bRoute.matched[0].path.replace(':' + this.$bRoute.matched[0].meta.id_field, this.$bRoute.params[this.$bRoute.matched[0].meta.id_field]) + '/' + this.current_step.fe_route_step_code);
                        return true;
                    }
                    return false;
                })
                if (this.current_step_index == null) {
                    this.current_step_index = this.steps.length - 1;
                    this.current_step = this.steps[this.steps.length - 1];
                    this.$bRouter.replace(this.$bRoute.matched[0].path.replace(':' + this.$bRoute.matched[0].meta.id_field, this.$bRoute.params[this.$bRoute.matched[0].meta.id_field]) + '/' + this.current_step.fe_route_step_code);
                }
            },

            closeStep() {

                if (this.steps_config.close_in_order) {
                    var index = this.current_step_index;
                    if (this.steps.some((step, st_index) => {
                        return !step.completed_l && st_index < index;
                    })) {
                        this.$toast.error('Закрытие шага не по порядку', '', {position: 'topRight'})
                        return
                    }


                }

                EventBus.$emit('close_step')

            },

            modelSaved() {
                let row_id_fe_route_object = this.$bRoute.params[this.$bRoute.meta.id_field]
                this.$http.post('/admin/FeRoute/objects/closeStep',
                    {
                        fe_route_step_id: this.current_step.fe_route_step_id,
                        row_id_fe_route_object
                    })
                    .then(async res => {
                        if (this.current_step_index === this.steps.length - 2) await this.finishRequest();
                        this.loadSteps(true);
                    })
//                    .then(res => {
//                        this.loadSteps(true);
//                    })
            },

            async loadSteps(goToStep) {
                //goToStep - параметр, указывающий позиционироваться ли на первом незаполненном шаге
                await this.$http.post(this.$bRoute.matched[0].meta.route, {
                    row_id_fe_route_object: this.$bRoute.params[this.$bRoute.meta.id_field],
                    fe_route_id: this.$bRoute.matched[0].meta.id_route
                })
                    .then(res => {
                        if(this.$bRoute.params[this.$bRoute.meta.id_field] === 'new'){
                            this.$bRoute.params[this.$bRoute.meta.id_field] = res.data.row_id_fe_route_object;
                        }
                        this.steps = res.data.steps;
                        this.completed_l = res.data.completed_l;
                        this.steps_config = res.data.steps_config;
                        if (goToStep) this.setCurrentStep();
                    })
            },

            async switchStep(index) {
                var step_is_completed = this.steps[index].completed_l;    // определяем закрытый ли шаг, на который переходим

                if (step_is_completed) {
                    if (!this.steps_config.allow_editing) return; // проверка на разрешение редактировать закрытый шаг

                    if (this.steps_config.use_modal_confirmation) {
                        this.izitoast_question_config.index_to = index;
                        this.izitoast_question_config.step_is_completed = step_is_completed;
                        this.$toast.question('Are you sure about that?', 'Hey', this.izitoast_question_config);
                       return;
                    }


                }

                else {
                    if (!this.steps_config.allow_browsing) return  // проверяем разрешение заполнять шаги не по порядку без закрытия шага


                }

                if (this.steps_config.allow_editing_completed && this.completed_l) {
                    await this.rollbackRequest();
                    await this.loadSteps(true)
                }

                this.goToStep(index, step_is_completed);


            },
            rollbackSteps(multiple, index) {
                var data = [this.current_step.fe_route_step_id];

                if (multiple) {
                    data = this.steps
                        .filter(step => {
                            return step.line_n >= this.current_step.line_n && step.completed_l != 0;
                        })
                        .map(step => {
                            return step.fe_route_step_id;
                        });
                }

                this.$http.post('/admin/FeRoute/objects/rollbackStep', {fe_route_step_ids: data})
                    .then(res => {
                        this.loadSteps(false);
                    })
                    .then(res => {
                        this.current_step = this.steps[index];
                    })
            },

            goToStep(index, step_is_completed) {
                this.current_step_index = index;
                this.current_step = this.steps[index];

                //-------//формирование нового пути
                var newPath = this.$bRoute.path.split('/');
                newPath.splice(-1, 1);
                newPath = newPath.join('/') + '/' + this.current_step.fe_route_step_code;
                this.$bRouter.push(newPath);

                if (step_is_completed) { // если переходим на закрытый шаг - откатываем его
                    this.rollbackSteps(this.steps_config.multiple_rollback, index)
                }

            },

            async finishRequest() {
                await  this.$http.post('/admin/FeRoute/step/objects/update', {
                    fe_route_id: this.$bRoute.matched[0].meta.id_route,
                    row_id_fe_route_object: this.$bRoute.params[this.$bRoute.meta.id_field],
                    completed_l: 1
                })
                    .then(res => {
                    })
                    .catch(async err => {
                        this.$toast.error('Ошибка при закрытии заявки', '', {position: 'topRight'})
                        this.current_step_index = this.steps.length - 2
                        this.current_step = this.steps[this.current_step_index];
                        await this.rollbackSteps(false, this.steps.length - 2);
                        this.loadSteps(true);

                    })
            },

            async rollbackRequest() {
                await  this.$http.post('/admin/FeRoute/step/objects/update', {
                    fe_route_id: this.$bRoute.matched[0].meta.id_route,
                    row_id_fe_route_object: this.$bRoute.params[this.$bRoute.meta.id_field],
                    completed_l: 0
                })
                    .then(res => {

                    })
            }

        },
        mounted() {
            this.$STEPS = true;

            this.loadSteps(true);

        },
        updated() {
            this.imgtosvg();
        },
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
        },
    }

</script>

<style lang="scss">
    @import "../../sass/variables";
    @import "../../sass/mixin";
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
        opacity: 0;
    }
    .steps {
        .steps__container{
            min-height: 30rem;
            transition: .25s all;
        }
        .steps-panel {
            display: flex;
            justify-content: space-around;
            padding: 15px;
            padding-top: 0;
            @include phone{
                flex-direction: column;
            }
            .step {
                flex-grow: 1;
                flex-basis: 16.5%;
                border: $border;
                border-right: none;
                padding: 1rem;
                transition: color 0.3s, background-color .3s,box-shadow .3s;
                cursor: pointer;
                position: relative;
                display: flex;
                align-items: center;
                
                box-shadow:inset  0px 0px 0px 0px  $shadow;
    
                @include phone{
                    border-right: $border;
                }
                
                &:last-of-type {
                    border-right: $border;
                }
                svg {
                    display: block;
                    path{
                        fill:$accent;
                    }
                }
                
                &.active {
                    //background-color: $accent;
                    background-color: $darkAccent;
                    color: $white-color;
                    svg {
                        display: block;
                        path{
                            fill:$white-color;
                        }
                    }
                }
                &.done{
                    svg path{
                        fill:$rbl-green;
                    }
                }
                &:hover {
                    //background-color: $accent;
                    //  color: $white-color;
                    box-shadow:inset  0px 0px 3px 1px  $shadow;
                    svg {
                        //     display: block;
                    }
                }
                &-text{
                    flex: 1 1 auto;
                }
                /* .svg{
					 flex: 0 0 auto;
				 }*/
                
                
                h3 {
                    font-weight: 600;
                    font-size: 2rem;
                }
                
                p {
                    font-size: 1.3rem;
                    margin-top: .4rem;
                }
                
                /*svg {
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    right: 1rem;
                    display: none;
                    path {
                        fill: $white-color
                    }
                }*/
            }
        }
    }
    
    .d-flex{
        display: flex;
        flex-wrap: wrap;
    }
    .btn-empty{
        display: flex;
        justify-content: center;
        align-items: center;
        svg{
            flex: 0 0  1rem;
        }
        &.left svg{
            transform: rotate(90deg);
            margin-right: 5/11*1rem;
        }
        &.right svg{
            transform: rotate(-90deg);
            margin-left: 5/11*1rem;
        }
    }

</style>
