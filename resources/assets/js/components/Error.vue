<template>
    <div id="error">
        <div class="container">
            <div class="row">
                <div class="col-md-12 offset-md-2">
                    <img :src="getpath+error+'.png'" alt="">
                    <h1>{{texts[error]}}</h1>
                    <p>{{texts['PageDoesnExist']}}</p>
                    <p><router-link to="/">{{texts['GoHeadOver']}}</router-link> {{texts['or']}} <router-link to="">{{texts['ContactUs']}}</router-link> </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function (){
            return{
                error: '',
                path:'',
                texts: {},
            }
        },
        computed:{
            getpath: function () {
                return app.$store.getters.getTheme=='rb'? 'img/rberrors' : 'img'
            }
        },
        created(){
        
        },
//        created() {
//            console.log('beforeCreate',window.history.old );
//            if(window.history.old) {
//                if (window.history.old == window.location.href) {
//                    window.history.old ='';
//                    window.history.go(-2)
//                }
//            }else{
//                window.history.old = window.location.href;
//            }
//        },
        mounted() {
            this.error = this.$bRoute.path;
            this.$http.post('/admin/menu?mode=0&module=main&object=buildError', null)
                .then(res => {
                    this.texts = res.data;
                });
        }
    }
</script>

<style lang="scss">
    @import '../../sass/variables';
    @import '../../sass/mixin';
    #error{
        text-align: center;
        img{
            max-width: 100%;
        }
        h1{
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 3rem;
            margin: 6rem 0;
            text-align: center;
        }
        p{
            font-size: 1.8rem;
            text-align: center;
            margin-bottom: 2.5rem;
            a{
                color: $accent;
                font-weight: 600;
            }
        }
        @include tablet-mobile(){
            img{
                margin-top: 3rem;
            }
            h1{
                font-size: 2rem;
                margin: 3.5rem 0;
            }
            P{
                font-size: 1.4rem;
            }
        }
    }
</style>
