<template>
    <div id="report">
        <div class="container">
            <div class="row">
                <div class="col no-padding">
                    <h1>{{section_title}}</h1>
                </div>
            </div>
            <div class="row report_box d-flex align-items-start">
                <div class="list_btn">
                    <div class="list_btn_first-line">
                        <router-link class="btn btn-default" to="/externalReportsByCompanies">{{archive}}</router-link>
                        <router-link class="btn btn-green" to="/externalReportsByCompanies/create"><span>+</span>{{send}}</router-link>
                    </div>
                    <div class="list_btn_second-line">
                        <div class="dropdown">
                            <button class="btn btn-dropdown">{{action}} <img class="drop-i" src="/img/dropdown-i.png" alt=""></button>
                            <transition name="fade">
                                <div v-if="listAction" class="dropdown_box">
                                    <ul>
                                        <!--todo: wtf ??! -->
                                        <li><a href="#" class="dropwond_link">1</a></li>
                                        <li><a href="#" class="dropwond_link">2</a></li>
                                        <li><a href="#" class="dropwond_link">3</a></li>
                                    </ul>
                                </div>
                            </transition>
                        </div>
                    </div>
                </div>
            </div>
            <form class="row create_report_box d-flex align-items-start"
                  @submit.prevent="createReport"
                  method="post"
            >
                <div class="left-side">
                    <div  v-for="(item,index) in fields" v-if="index<3" :class="{'col-md-8':item.long_i===undefined, 'col-md-16':item.long_i===true}">
                        <div class="field-box">
                            <label v-if="item.type!='title'">{{item.title}}</label>
                            <input @change="addToMemory" v-if="item.type=='text'" :type="item.type" :name="item.model" v-model="modelObj[item.model]">
                            <select @change="addToMemory" v-if="item.model=='TypeReport'" :name="item.model" v-model="modelObj[item.model]">
                                <!--<option v-if="$store.getters.getLang == 'ru'" v-for="option in item.options" :value="option.id">{{option.ru}}</option>-->
                                <!--<option v-if="$store.getters.getLang == 'en'" v-for="option in item.options" :value="option.id">{{option.en}}</option>-->
                                <option v-if="$store.getters.getLang == 'ru'" v-for="option in item.options" :value="option.name_report">{{option.ru}}</option>
                                <option v-if="$store.getters.getLang == 'en'" v-for="option in item.options" :value="option.name_report">{{option.en}}</option>
                            </select>
                            <select @change="addToMemory" value="8" v-if="item.model=='CompanyReport'" :name="item.model" v-model="modelObj[item.model]" >
                                <!--<option v-for="option in item.options" :value="option.id">{{option.company_full_name}}</option>-->
                                <!--<option v-for="option in item.options" :value="option.id">{{option.title}}</option>-->
                                <option v-for="option in item.options" :value="option.id">{{option.company_full_name}}</option>
                                
<!--                                <option v-for="option in item.options" :value="option[0]">{{option[1]}}</option>--> // todo вернуть
                            </select>
                            <div class="contractor_parag" v-if="item.type=='label'">
                                <p>{{modelObj[item.model]}}</p>
                            </div>
                            <div class="report_parag" v-if="item.type=='title'">
                                <p>{{item.title}}</p>
                            </div>
                            <input v-if="item.type=='date'" type="date" @change="addToMemory" v-model="modelObj[item.model]">
                        </div>
                    </div>

                </div>
                <div class="right-side">
                    <div  v-for="(item,index) in fields" v-if="index>=3" :class="{'col-md-4':item.long_i===undefined, 'col-md-8':item.long_i===true}">
                        <div class="field-box">
                            <label v-if="item.type!='title'">{{item.title}}</label>
                            <input @change="addToMemory" v-if="item.type=='text'" :type="item.type" :name="item.model" v-model="modelObj[item.model]">
                            <select @change="addToMemory" v-if="item.model=='LanguageReport'" :name="item.model" v-model="modelObj[item.model]">
                                <option v-for="option in item.options" :value="option.lang">{{option.caption}}</option>
                            </select>
                            <select @change="addToMemory" v-if="item.model=='formatReport'" :name="item.model" v-model="modelObj[item.model]">
                                <option v-for="option in item.options" :value="option.value">{{option.caption}}</option>
                            </select>
                            <select @change="addToMemory" v-if="item.model=='TypeReport'" :name="item.model" v-model="modelObj[item.model]">
                                <option v-for="option in item.options" :value="option.name_report">{{option.name_report}}</option>
                            </select>
                            <select @change="addToMemory" v-if="item.model=='CompanyReport'" :name="item.model" v-model="modelObj[item.model]">
                                <option v-for="option in item.options" :value="option.id">{{option.company_full_name}}</option>
                            </select>
                            <div class="contractor_parag" v-if="item.type=='label'">
                                <p>{{modelObj[item.model]}}</p>
                            </div>
                            <div class="report_parag" v-if="item.type=='title'">
                                <p>{{item.title}}</p>
                            </div>
                            <input @change="addToMemory" v-if="item.type=='date'" type="date" :name="item.model"  v-model="modelObj[item.model]">
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-end page_buttons_bottom">
                    <button  name="ok" class="btn btn-green">{{send}}</button>
                    <a name="back" @click="$bRouter.go(-1)" class="btn btn-grey">{{back}}</a>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    //    import Datepicker from 'vuejs-datepicker';
    import  axios from 'axios';
    export default {
        data:function () {
            return{
                listAction: '',
                reportNames:[],
                reportCompanys:[],
                format:[],
                send: '',
                archive: '',
                section_title: '',
                back:'',
                counter: 0,
                action: '',
                date:[],
                lang:[],
                modelObj:{},
                fields:[],
                error: false,
                lng: this.$store.getters.getLang,
            }
        },
        computed:{
        },
        watch:{
        },
        methods:{
            checkMemory: function (){
                let self = this;
                if(localStorage.getItem('createReport_0')){
                    var arr=Array.from( document.querySelectorAll(".field-box label"));
                    arr.forEach(function (th, i) {
                        var valInput = localStorage.getItem('createReport_'+i);
                        var valName = th.nextSibling.nextElementSibling.name;
                        self.modelObj[valName]=valInput;
                    });
                }else{

                    this.addToMemory();
                }
            },
            addToMemory: function(){
                Array.prototype.forEach.call(
                    document.querySelectorAll(".field-box label"),
                    function (th, i) {
                        var valInput = th.nextSibling.nextElementSibling.value;
                        var valName = th.nextSibling.nextElementSibling.name;
                        localStorage.setItem('createReport_'+i,valInput);
                    });
            },
            createReport: function () {
                if(!this.modelObj['CompanyReport']){
                    if(this.$store.getters.getLang=='ru'){
                        this.$toast.error('Не выбрана "Организация"','',{position: 'topRight'});
                    }
                    if(this.$store.getters.getLang=='en'){
                        this.$toast.error('Not selected "Company"','',{position: 'topRight'});
                    }
                    this.error = true;
                }
                if(!this.modelObj['TypeReport']){
                    if(this.$store.getters.getLang=='ru'){
                        this.$toast.error('Не выбрано "Вид Отчета"','',{position: 'topRight'});
                    }
                    if(this.$store.getters.getLang=='en'){
                        this.$toast.error('Not selected "Report Type"','',{position: 'topRight'});
                    }
                    this.error = true;
                }
                if(!this.error) {
                    if(this.$store.getters.getLang=='ru'){
                        this.$toast.info('Формирование отчета','',{position: 'topRight'});
                    }
                    if(this.$store.getters.getLang=='en'){
                        this.$toast.info('Report generation','',{position: 'topRight'});
                    }
                    this.$http.post('/admin/company/report/create', {
                        TypeReport: this.modelObj['TypeReport'],
                        CompanyReport: this.modelObj['CompanyReport'],
                        StartDateReport: this.modelObj['StartDateReport'],
                        EndDateReport: this.modelObj['EndDateReport'],
                        LanguageReport: this.modelObj['LanguageReport'],
                        formatReport: this.modelObj['formatReport'],
                    })
                        .then(res => {
                            if (this.$store.getters.getLang == 'ru') {
                                this.$toast.success('Отчет сформирован', '', {position: 'topRight'});
                            }
                            if (this.$store.getters.getLang == 'en') {
                                this.$toast.success('The report is formed', '', {position: 'topRight'});
                            }
                            this.$bRouter.push({path: '/externalReportsByCompanies'});
                        })
                }
            }
        },
      
        updated(){
            if(this.counter == 0){
                this.checkMemory();
                this.counter = 1;
            }
        },
        mounted(){
            this.$http.post('/admin/company/report', null).then(res=>{
                this.modelObj= {
                    StartDateReport: '',
                    EndDateReport: '',
                    LanguageReport: '',
                    formatReport: '',
                    TypeReport: '',
                    CompanyReport: '',
                };
                if(res.data.date.startYear){
                    this.modelObj['StartDateReport'] = res.data.date.startYear;
                }else{
                    this.modelObj['StartDateReport'] = '';
                }
                if(res.data.date.now){
                    this.modelObj['EndDateReport'] = res.data.date.now;
                }else{
                    this.modelObj['EndDateReport'] = '';
                }
                if(res.data.lang[0].lang){
                    this.modelObj['LanguageReport'] = res.data.lang[0].lang;
                }else{
                    this.modelObj['LanguageReport'] = '';
                }
                if(res.data.format[0].value){
                    this.modelObj['formatReport'] = res.data.format[0].value;
                }else{
                    this.modelObj['formatReport'] = '';
                }
                if(res.data.report_name[0]){
                    this.modelObj['TypeReport'] = res.data.report_name[0].name_report;
                }else{
                    this.modelObj['TypeReport'] = '';
                }
                if(res.data.accessCompanyAllArr[0]){
                    // this.modelObj['CompanyReport'] = res.data.accessCompanyAllArr[0][0].id;
                    this.modelObj['CompanyReport'] = res.data.accessCompanyAllArr[0][0];
                    // this.modelObj['CompanyReport'] = res.data.accessCompanyAllArr[0].id;
                }else{
                    this.modelObj['CompanyReport'] = '';
                }

                if(this.$store.getters.getLang=='ru'){
                    this.send = "Создать новый отчет";
                    this.archive = "Список отчетов";
                    this.action = "Действия";
                    this.add = "Добавить";
                    this.back = "Назад";
                    this.section_title = "Формирование отчета";
                    // this.modelObj['TypeReport'] = res.data.report_name[0].id;
                    // this.modelObj['TypeReport'] = res.data.report_name[0].name_report;
                    // this.modelObj['CompanyReport'] = res.data.report_companys[0].id;
                    // this.modelObj['CompanyReport'] = res.data.accessCompanyAllArr[0][0];

                    this.fields=[
                        {title:'Вид отчета и организации', type:'title',long_i:true},
                        {title:'Выберите вид отчета', model:'TypeReport', options: res.data.report_name, type:'select', long_i:true},
                        // {title:'Выберите организацию', model:'CompanyReport',options: res.data.report_companys, type:'select',long_i:true},
                        {title:'Выберите организацию', model:'CompanyReport',options: res.data.accessCompanyAllArr, type:'select',long_i:true},
                        /////
                        {title:'Период отчета', type:'title'},
                        {title:'Параметры', type:'title'},
                        {title:'Начало периода', model:'StartDateReport', type:'date'},
                        {title:'Выберите язык', model:'LanguageReport', options: res.data.lang, type:'select'},
                        {title:'Конец периода', model:'EndDateReport', type:'date'},
                        {title:'Выберите формат', model:'formatReport', type:'select', options: res.data.format},

                    ];


                }
                if(this.$store.getters.getLang=='en'){
                    this.send = "Create a new report";
                    this.archive = "Reports List";
                    this.action = "Actions";
                    this.add = "Add";
                    this.back = "Back";
                    this.section_title = "Report generation";
                    // this.modelObj['TypeReport'] = res.data.report_name[0].name_report;
                    // this.modelObj['TypeReport'] = res.data.report_name[0].id;
                    // this.modelObj['CompanyReport'] = res.data.report_companys[0].id;
                    // this.modelObj['CompanyReport'] = res.data.accessCompanyAllArr[0][0];

                    this.fields=[
                        {title:'Report type and Company', type:'title',long_i:true},
                        {title:'Select report type', model:'TypeReport', options: res.data.report_name, type:'select', long_i:true},
                        // {title:'Select Company', model:'CompanyReport',options: res.data.report_companys, type:'select',long_i:true},
                        {title:'Select Company', model:'CompanyReport',options: res.data.report_companys, type:'select',long_i:true},
                        /////
                        {title:'Report period', type:'title'},
                        {title:'Options', type:'title'},
                        {title:'Beginning of period', model:'StartDateReport', type:'date'},
                        {title:'Choose language', model:'LanguageReport', options: res.data.lang, type:'select'},
                        {title:'End of the period', model:'EndDateReport', type:'date'},
                        {title:'Choose format', model:'formatReport', type:'select', options: res.data.format},

                    ];
                }
            });
        },
        components:{
//            Datepicker
        }
    }

</script>

<style lang="scss">
    @import '../../sass/variables';
    @import '../../sass/mixin';
    #report{
        padding: 0 1.5rem;
        .btn-green{
            padding: 1rem 3rem;
        }
        .page_buttons_bottom{
            flex-wrap: wrap;
            .btn{
                @include tablet-mobile{
                    width: 100%;
                    margin-right: 0;
                    margin-bottom: .8rem;
                }
            }
        }
        .left-side,
        .right-side{
            display: flex;
            flex-wrap: wrap;
            @include  desktop-max-little{

                max-width:100%;

            }
            min-width:50rem;
            width: 100%;
            max-width:50%;
            .col-md-8{
                max-width:100%;
                min-width:100%;
            }
            .col-md-4{
                max-width:50%;
                min-width:50%;
            }
        }
        .list_btn_first-line{
            margin-bottom: 2rem;
            .btn-green{
                padding: 1rem 3rem;
                span{
                    margin-right: 1rem;
                }
            }
        }
        .create_report-block{
            border-right: 1px solid #e4e7ea;
        }
        .create_report_box{
            background: #fff;
            padding: 5rem 0;
            margin-left: -1.5rem;
            margin-right: -1.5rem;
            margin-top: 2.5rem;
            border-radius: 4px;
            border: 1px solid #e6eaee;
            .btn-grey{
                margin-right: 0;
            }
            .field-box{
                margin-bottom: 3rem;
                label{
                    color: #202a3d;
                    font-size: 1.4rem;
                    display: -ms-flexbox;
                    display: flex;
                    font-weight: 600;
                }
                input{
                    width: 100%;
                    height: 3.5rem;
                    border-radius: 4px;
                    border: 1px solid #ced0da;
                    background-color: #ffffff;
                    padding-left: 2rem;
                    font-size: 1.5rem;
                    margin-top: 1.3rem;
                    padding-right: 1.5rem;
                    background-image: linear-gradient(to top, #f1f3f7 0%, #ffffff 100%);
                }
                select{
                    width: 100%;
                    margin-top: 1.3rem;
                    height: 3.5rem;
                    border-radius: 4px;
                    border: 1px solid #ced0da;
                    padding-left: 1.5rem;
                    background-image: linear-gradient(to top, #f1f3f7 0%, #ffffff 100%);
                }
                .report_parag{
                    p{
                        color: $accent;
                        font-size: 1.8rem;
                        margin-bottom: 3rem;
                    }
                }
            }
        }
    }
    @include tablet-mobile{
        #report{
            .left-side,.right-side{
                min-width: 100%;
            }
            .container{
                padding: 0 1.5rem;
            }
        }

    }
</style>
