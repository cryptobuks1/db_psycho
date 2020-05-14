<template>
    <footer id="footer" class="d-flex align-items-center">
        <template v-if="$store.getters.getTheme==='default'">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <ul id="menu_footer">
                                <li v-for=" link in linklist"><router-link :to="link.link">{{link.title}}</router-link></li>

                            </ul>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <div id="copywriting">
                                <p>{{copyright}}</p>
                            </div>
                        </div>
                    </div>
            </div>
        </template>
        <template v-if="$store.getters.getTheme==='rb'">
            <div class="footer__top">
                <div class="container">
                    <div class="row" >
                        <div class="col"><p><b>Телефон обратной связи:</b><br> + 7 (123) 456 78 90</p></div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <b>Группа Societe Generale </b>
                            <p>
                                Любое предоставление ООО «РБ ЛИЗИНГ» информации на данном сайте не должно рассматриваться как предоставление неполной
                                или недостоверной информации, в том числе как умолчание или заверение об обстоятельствах, имеющих значение для заключения,
                                исполнения или прекращения сделки, или как обязательство заключить сделку на условиях, изложенных на данном сайте, или как оферта,
                                если только иное прямо не указано на данном сайте.
                            </p>
                            <div class="copyright">
                                <p>{{copyright}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </footer>
</template>

<script>

    export default {
        data() {
            return {
                msg: '',
                radio: '1',
                copyright:'',
                linklist:[],


            }
        },
        mounted(){
//
//                setTimeout(()=>{
//                    if(this.$store.getters.getLang=='ru'){
//                        this.blog='Блог';
//                        this.support='Поддержка';
//                        this.terms_and_conditions='Сроки и условия';
//                        this.privacy='Конфиденциальность';
//                    }
//                },1000)


            this.$http.post('/admin/menu?mode=0&module=main&object=footer', null)
                .then(res=>{
//                    console.log(res.data);
                    this.copyright= res.data.copyright.caption;
                    this.linklist=res.data.menu;
                })
        }
    }
</script>
<style lang="scss">
    @import '../../sass/variables';
    @import '../../sass/mixin';

    #footer {
        margin-top: 10rem;
        height: 6.9rem;
        border-radius: 3px;
        border: 1px solid #e4e7ea;
        background-color: #ffffff;
        width: 100%;
        flex-shrink: 0;
        #menu_footer{
            li{
                display: inline-block;
                margin-right: 2rem;
                a{
                    &:hover{
                        text-decoration: none;
                    }
                }
                &:last-child{
                    margin-right: 0;
                }
            }
            @include tablet-big{
                display: flex;
                justify-content: center;
                margin-bottom: 1rem;
            }
            @include tablet-mobile {
                li {
                    margin-right: 1rem;
                    a{
                        font-size: 1.2rem;
                    }
                }

            }
        }
        #copywriting{
            @include tablet-big {
                display: flex;
                width: 100%;
                justify-content: center;
            }
            @include tablet-mobile {
                p{
                    font-size: 1.2rem;
                }
            }
        }
        #copywriting p{
            color: #798699;
        }
    }
    .rb #footer{
        padding-top: 15px;
        padding-bottom: 30px;
        height: auto;
        display: block !important;
        .footer__top{
            line-height: 18px;
            color: $footer-text;
        }
        .footer__bottom{
            border-top: 1px solid #e4e7ea;
            margin-top: 15px;
            padding-top: 20px;
            color: $footer-text;
            font-size: 1.3rem;
            line-height: 18px;
            p{
                color: $table-color-text;
                font-size: 1.3rem;
            }
            .copyright{
                margin-top: 20px;
                font-size: 1.3rem;
            }
        }
    }
</style>
