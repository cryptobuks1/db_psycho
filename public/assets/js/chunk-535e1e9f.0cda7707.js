(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-535e1e9f"],{"05f8":function(t,e,a){"use strict";a.r(e);var o=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{attrs:{id:"contractor"}},[a("div",{staticClass:"container no-padding"},[a("transition-group",{attrs:{name:"fade",mode:"out-in"}},[a("div",{directives:[{name:"show",rawName:"v-show",value:t.loading,expression:"loading"}],key:"1",staticClass:"spinner-container"},[a("atom-spinner",{directives:[{name:"show",rawName:"v-show",value:!0,expression:"true"}],attrs:{"animation-duration":1e3,color:"var(--accent)"}})],1),t.loading?t._e():a("div",{key:"2"},[a("div",{staticClass:"row"},[a("div",{staticClass:"col"},[t.contact_info_show?a("h1",[t._v(" "+t._s(t.tabs[0].blocks[0].block_title))]):a("h1",[t._v("\n\n                                "+t._s(t.card_name))])])]),a("div",{staticClass:"row"},[a("div",{staticClass:"col"},[a("div",{staticClass:"contractor_list-link"},[a("ul",[t._l(t.tabs,function(e,o){return t.tabs.length>1?a("li",{class:{active:t.tab_index==o},on:{click:function(e){t.tab_index=o}}},[a("a",[t._v(t._s(e.tab_title)+" ")])]):t._e()}),t._l(t.links,function(e,o){return a("li",{class:[{active:2==t.tab_index},"link"],on:{click:function(a){return t.goToUrl(e)}}},[a("a",[t._v(t._s(e.link_title))])])})],2)])]),null!=t.dependent?a("div",{staticClass:"col-md-4"},[a("div",{staticClass:"dependent"},["lt-select"==t.dependent.dependent_fields.type?a("div",{staticClass:"dropdown"},[a("button",{staticClass:"btn btn-dropdown",on:{click:t.dropdownClick}},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.dependent.dependent_fields.options_data.search,expression:"dependent.dependent_fields.options_data.search"}],staticClass:"dropwond_link filterSelect clip",attrs:{type:"text"},domProps:{value:t.dependent.dependent_fields.options_data.search},on:{input:[function(e){e.target.composing||t.$set(t.dependent.dependent_fields.options_data,"search",e.target.value)},function(e){return t.selectSearch(t.dependent.dependent_fields)}],keypress:t.dropDownKeyPress,keyup:function(e){return t.dropDownArrows(e,t.dependent.dependent_fields,t.models[t.dependent.dependent_data_model][0])}}}),a("img",{staticClass:"drop-i btn-dropdown",attrs:{src:"/img/dropdown-i.png",alt:""},on:{click:t.dropImgClick}})]),a("transition",{attrs:{name:"fade"}},[a("div",{staticClass:"dropdown_box dropdown_box_select"},[a("ul",t._l(t.dependent.dependent_fields.options,function(e,o){return a("li",{class:{"li-selected":o==t.currentOption},attrs:{"data-select":o}},[a("button",{staticClass:"dropwond_link",on:{click:function(a){return t.chooseSelectItem(t.dependent.dependent_fields,e,t.models[t.dependent.dependent_data_model][0])}}},[t._v("\n                                                        "+t._s(e[t.dependent.dependent_fields.options_data.options_field_title])+"\n                                                    ")])])}),0)])])],1):t._e(),"label"==t.dependent.dependent_fields.type?a("div",{staticClass:"list_items"},[t.dependent.dependent_fields.title?a("span",[t._v(" "+t._s(t.dependent.dependent_fields.title)+" ")]):t._e(),a("div",{staticClass:"dependent-label"},[a("p",[t._v("\n                                            "+t._s(t.models[t.dependent.dependent_data_model][0][t.dependent.dependent_fields.options_data.options_field_title]))])])]):t._e()])]):t._e()]),t._l(t.tabs,function(e,o){return t.tab_index==o||e.accordion?a("div",{staticClass:"tab"},[e.tab_name||e.tab_description?a("div",{staticClass:"row tab_info"},[a("div",{staticClass:"col"},[a("div",{staticClass:"tab-heading"},[e.tab_name?a("h2",{on:{click:function(a){return t.hideTab(e)}}},[t._v(t._s(e.tab_name))]):t._e(),e.accordion?a("svg",{class:{rotate:e.visible},attrs:{xmlns:"http://www.w3.org/2000/svg",width:"6",height:"10",viewBox:"0 0 6 10"},on:{click:function(a){return t.hideTab(e)}}},[a("path",{staticClass:"cls-1",attrs:{id:"Right_Arrow","data-name":"Right Arrow",d:"M1641.01,948l-6.01-5.012v10.024Z",transform:"translate(-1635 -943)"}})]):t._e()]),a("transition",{attrs:{name:"fade",mode:"out-in"}},[e.tab_description&&e.visible?a("p",{domProps:{innerHTML:t._s(e.tab_description)}}):t._e()])],1)]):t._e(),a("transition",{attrs:{name:"fade",mode:"out-in"}},[e.visible||!e.accordion?a("div",{staticClass:"tab_box"},[a("div",{staticClass:"row block-row"},[a("Zone",{class:{"full-width":t.fields&&t.fields.list&&!t.fields.list.list_model&&0===t.fields.zone_fields.filter(function(t){return"2"===t.zone}).length,grid:t.form_parameters.use_grid_layout},attrs:{models:t.models,fields:t.fields&&t.fields.zone_fields.filter(function(t){return"1"===t.zone}),add_models:t.add_data_models,disable_inputs:t.disable_inputs_card}}),t.fields&&t.fields.zone_fields.filter(function(t){return"2"===t.zone}).length>0?a("Zone",{class:{grid:t.form_parameters.use_grid_layout},attrs:{models:t.models,fields:t.fields.zone_fields.filter(function(t){return"2"===t.zone}),add_models:t.add_data_models,disable_inputs:t.disable_inputs_card}}):t._e(),t.fields&&t.fields.list&&t.fields.list.list_model?a("List",{staticStyle:{width:"50%"},attrs:{block:t.fields.list.list_block,disable_inputs:t.disable_inputs,model:t.models[t.fields.list.list_model],add_models:t.add_data_models,type:"document"}}):t._e()],1),a("div",{staticClass:"row"},[t.sets?[t.sets.card_actions&&!t.form_parameters.hide_sets?a("div",{staticClass:"col d-flex justify-content-end page_buttons_bottom_new"},t._l(t.sets.card_actions,function(e){return a("a",{class:e.class,attrs:{id:e.code},on:{click:function(a){return t.saveModel(e)}}},[t._v("\n                                                "+t._s(e.title)+"\n                                            ")])}),0):t._e(),t.sets.request_card_actions&&!t.form_parameters.hide_sets?a("div",{staticClass:"col d-flex justify-content-end page_buttons_bottom_new"},t._l(t.sets.request_card_actions,function(e){return a("a",{class:e.class,attrs:{id:e.code},on:{click:function(a){return t.saveModel(e)}}},[t._v("\n                                                "+t._s(e.title)+"\n                                            ")])}),0):t._e(),t.sets.request_card_send_save&&!t.form_parameters.hide_sets?a("div",{staticClass:"col d-flex justify-content-end page_buttons_bottom_new"},t._l(t.sets.request_card_send_save,function(e){return a("a",{class:e.class,attrs:{id:e.code},on:{click:function(a){return t.saveModel(e)}}},[t._v("\n                                                "+t._s(e.title)+"\n                                            ")])}),0):t._e()]:[a("div",{staticClass:"col d-flex justify-content-end page_buttons_bottom_new"},t._l(t.action_buttons,function(e){return a("a",{class:e.class,attrs:{id:e.code},on:{click:function(a){return t.saveModelOld(e)}}},[t._v(t._s(e.title))])}),0)]],2)]):t._e()])],1):t._e()})],2)])],1),t.dev?a("div",{staticClass:"devTooltip"},[t._v("\n            Страница в разработке\n        ")]):t._e()])},n=[],i=(a("6762"),a("2fdb"),a("96cf"),a("3b8d")),r=(a("7514"),a("ac6a"),a("cebc")),s=a("fa33"),d=a("c777"),l=a("2e90"),c=a("56d7"),_=a("2f62"),m=a("2430"),f=a("4583"),p=a("b3e94"),b=a("252c"),h={mixins:[b["a"]],data:function(){return{sets:{},dev:!1,loading:!0,disable_inputs_card:!1,form_base_data_model:"",models:{Contractor:[{db_area_id:null}]},form_parameters:null,tabs:[],links:[],tab_index:this.$store.getters.getTabIndex,paramCard:this.$store.getters.getParamCard,paramDataCard:this.$store.getters.getParamDataCard,action_buttons:[],add_data_models:[],datapicker_translations:{en:m["a"],ru:m["b"]},card_name:"",db_areas:[],dependent:null,modelObj:{},filterSelect:"fff",filteredItems:[],currentOption:-1,contact_info_show:!1,model_has_changed:!1,watch_model_changing:!1,fields:null}},props:["row_id_fe_route_step_object","step_l","disable_inputs","controller_alias"],name:"requestCard",provide:function(){return{$validator:this.$validator}},computed:Object(r["a"])({},Object(_["b"])(["getModalSubmit","getTabIndex","getParamCard","getParamDataCard"]),{watchDBID:function(){if(!this.contact_info_show&&("Contractor"==this.form_base_data_model||"Companies"==this.form_base_data_model)){if("Contractor"==this.form_base_data_model)return this.models.Contractor[0].db_area_id;if("Companies"==this.form_base_data_model)return this.models.Company[0].db_area_id}if("Invoices"===this.form_base_data_model||"ServiceAcceptanceActs"===this.form_base_data_model||"PaymentInvoices"===this.form_base_data_model)return this.models[this.form_base_data_model][0]["contractor_contract_id"]},watchIndividual:function(){if(!this.contact_info_show&&("Contractors"===this.form_base_data_model||"Companies"===this.form_base_data_model)){if("Contractors"==this.form_base_data_model)return this.models.Contractors[0].individual_l;if("Companies"==this.form_base_data_model)return this.models.Company[0].individual_l}return"Invoices"===this.form_base_data_model?this.models.Invoices[0].entire_period:"ServiceAcceptanceActs"===this.form_base_data_model?this.models.ServiceAcceptanceActs[0].entire_period:"PaymentInvoices"===this.form_base_data_model?this.models.PaymentInvoices[0].entire_period:void 0}}),watch:{tab_index:function(t){this.$store.commit("changeTab",t),this.fields=this.parseFields(this.tabs[t])},watchDBID:function(t){var e=this;if("Contractor"==this.form_base_data_model||"Companies"==this.form_base_data_model){var a="";if("Contractor"==this.form_base_data_model&&(a="Contractor"),"Companies"==this.form_base_data_model&&(a="Company"),console.log("reserved "+this.db_area_id_res),this.db_areas.forEach(function(o){o.id==t&&(e.models[a][0].db_name=o.d_base.db_name,e.models[a][0].server_name=o.d_base.server_db.server_name,e.db_area_id_res=t)}),""===t){this.models[a][0].db_name="",this.models[a][0].server_name="",this.$store.commit("showModal",{type:"confirmModal"})}}"Invoices"!==this.form_base_data_model&&"ServiceAcceptanceActs"!==this.form_base_data_model&&"PaymentInvoices"!==this.form_base_data_model||null!==t&&(this.models[this.form_base_data_model][0]["contractor_name"]=this.add_data_models["Contracts"].find(function(e){return e.id===t})["contractor"]["contractor_short_name"])},watchIndividual:function(t){var e=this;"Contractors"!=this.form_base_data_model&&"Companies"!=this.form_base_data_model||(t||this.tabs[this.tab_index].blocks.forEach(function(t){t.block_fields.forEach(function(t){"entrepreneur_certificate"!=t.model&&"entrepreneur_certificate_date"!=t.model||(console.log(t),t.hidden=!0)})}),t&&this.tabs.forEach(function(t){t.blocks.forEach(function(t){t.block_fields.forEach(function(t){"entrepreneur_certificate"!=t.model&&"entrepreneur_certificate_date"!=t.model||(t.hidden=!1)})})})),"Invoices"!==this.form_base_data_model&&"ServiceAcceptanceActs"!==this.form_base_data_model&&"PaymentInvoices"!==this.form_base_data_model||(t?(this.tabs[this.tab_index].blocks.forEach(function(t){t.block_fields.forEach(function(t){"date"===t.model&&(t.disabled=!0)})}),this.$validator.pause(),this.$nextTick(function(){e.$validator.reset(),e.$validator.errors.clear()})):(this.tabs[this.tab_index].blocks.forEach(function(t){t.block_fields.forEach(function(t){"date"===t.model&&(t.disabled=!1)})}),this.$validator.resume()))},"$store.state.modal.submitModal":function(t){"Contractor"==this.form_base_data_model&&0==t&&(this.models.Contractor[0].db_area_id=this.db_area_id_res)},model_has_changed:function(t){1==t&&(this.card_name+="*")},getModalSubmit:function(t){},models:{handler:function(t,e){console.log("%c Model watcher","color:white; background-color:#2274A5","Model has changed"),this.watch_model_changing&&(this.model_has_changed=!0)},deep:!0}},methods:{},mounted:function(){var t=Object(i["a"])(regeneratorRuntime.mark(function t(){var e=this;return regeneratorRuntime.wrap(function(t){while(1)switch(t.prev=t.next){case 0:return console.log("RequestCard"),this.$bRoute.path.includes("Dev")&&(this.dev=!1),c["EventBus"].$on("close_step",Object(i["a"])(regeneratorRuntime.mark(function t(){var a,o;return regeneratorRuntime.wrap(function(t){while(1)switch(t.prev=t.next){case 0:if(!1!==e.form_parameters.requires_saving){t.next=4;break}e.$emit("modelSaved"),t.next=10;break;case 4:return a=e.sets.request_card_send_save.filter(function(t){return"send_request"===t.code}),t.next=8,e.saveModel(a[0]);case 8:o=t.sent,o&&e.$emit("modelSaved");case 10:case"end":return t.stop()}},t)}))),this.paramCard.id=this.step_l?this.row_id_fe_route_step_object:this.$bRoute.params[this.$bRoute.meta.id_field],this.controller_alias&&(this.paramCard.dependent={controller_alias:this.controller_alias,id:this.$bRoute.params[this.$bRoute.matched[0].meta.id_field]}),this.$bRoute.meta.prev_controller_alias&&(this.paramCard.dependent={controller_alias:this.$bRoute.meta.prev_controller_alias,id:this.$bRoute.params[this.$bRoute.meta.prev_id_field]}),t.next=8,this.fillComponent(this.$bRoute.meta.route,this.paramCard);case 8:this.fields=this.parseFields(this.tabs[this.tab_index]),this.$store.commit("setParamCard",{});case 10:case"end":return t.stop()}},t,this)}));function e(){return t.apply(this,arguments)}return e}(),updated:function(){this.watch_model_changing=!0},beforeDestroy:function(){c["EventBus"].$off("close_step")},components:{Datepicker:s["a"],AtomSpinner:f["a"],VueEditor:p["VueEditor"],List:l["default"],Zone:d["a"]}},u=h,g=(a("f670"),a("2877")),v=Object(g["a"])(u,o,n,!1,null,null,null);e["default"]=v.exports},"835f":function(t,e,a){var o=a("fad3");"string"===typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);var n=a("499e").default;n("289ab967",o,!0,{sourceMap:!1,shadowMode:!1})},f670:function(t,e,a){"use strict";var o=a("835f"),n=a.n(o);n.a},fad3:function(t,e,a){e=t.exports=a("2350")(!1),e.push([t.i,":root{--accent:#e1002d;--bg-color:#fff;--base-color:#202a3d;--darkAccent:#a2001e;--tableHead:#788699}#contractor{padding:0 1.5rem}#contractor .spinner-container{position:absolute;left:0;right:0}#contractor .spinner-container .atom-spinner{margin:auto}#contractor h1{font-size:2.3rem;color:#202a3d;font-weight:700;margin-bottom:2.5rem}#contractor .jodit_container h1{all:unset}#contractor .page_buttons_bottom_new{-ms-flex-wrap:wrap;flex-wrap:wrap}@media (max-width:767px){#contractor .page_buttons_bottom_new .btn{width:100%;margin-right:0;margin-bottom:.8rem}}#contractor .page_buttons_bottom_new .btn:last-child{margin-right:0}#contractor .contractor_list-link ul{display:-webkit-box;display:-ms-flexbox;display:flex;list-style:none;padding:0;margin:0;-ms-flex-wrap:wrap;flex-wrap:wrap}#contractor .contractor_list-link ul li{height:5rem;margin-bottom:1.5rem;margin-right:1.5rem;padding:0 1.5rem;border-radius:4px;border:1px solid #ced0da;background-image:-webkit-gradient(linear,left bottom,left top,from(#f1f3f7),to(#fff));background-image:linear-gradient(0deg,#f1f3f7 0,#fff);cursor:pointer;-webkit-box-flex:0;-ms-flex:0 0 auto;flex:0 0 auto}#contractor .contractor_list-link ul li:last-child{margin-right:0}#contractor .contractor_list-link ul li.link{border:none}#contractor .contractor_list-link ul li.link a{text-decoration:underline}#contractor .contractor_list-link ul li.link:hover{border:none}#contractor .contractor_list-link ul li.link:hover a{color:var(--accent)}#contractor .contractor_list-link ul li a{width:100%;height:100%;display:block;font-size:1.8rem;color:#788699;text-decoration:none;text-align:center;line-height:4.6rem;-webkit-transition:all .25s;transition:all .25s}#contractor .contractor_list-link ul li:hover{border:1px solid var(--accent)}#contractor .contractor_list-link ul li:hover a{color:var(--accent)}#contractor .contractor_list-link ul li.active{background:#fff}#contractor .contractor_list-link ul li.active a{color:var(--accent);font-weight:700}#contractor .vdp-datepicker__calendar{bottom:100%}#contractor .vdp-datepicker__calendar .cell{height:3rem!important;line-height:3rem!important}#contractor .dependent{height:100%}#contractor .dependent .dropdown{margin-top:1.3rem;width:100%;height:100%}#contractor .dependent .dropdown .btn-dropdown{width:100%;height:100%;font-size:1.6rem;line-height:1.6rem;border:none;margin-right:0}#contractor .dependent .dropdown .btn-dropdown img{position:absolute;right:10px!important;padding-right:1rem!important;width:auto!important;height:auto!important;background-image:none!important}#contractor .dependent .dropdown .btn-dropdown input{position:absolute;left:0;right:0;margin-top:0;width:100%;height:100%;border-radius:4px;border:1px solid #ced0da;background-color:#fff;padding-left:2rem;font-size:1.5rem;padding-right:1.5rem}#contractor .dependent .dropdown .dropdown_box{max-height:20rem;overflow:auto!important;width:100%;top:-.5rem;-webkit-box-shadow:4px 5px 2rem rgba(0,0,0,.29);box-shadow:4px 5px 2rem rgba(0,0,0,.29);z-index:100}#contractor .dependent .dropdown .dropdown_box .li-selected button{text-decoration:none;color:#202b3d;background-color:#d7dde3}#contractor .dependent .dependent-label{border-radius:4px;border:1px solid #ced0da;background-color:#fff;background-image:-webkit-gradient(linear,left bottom,left top,from(#f1f3f7),to(#fff));background-image:linear-gradient(0deg,#f1f3f7 0,#fff);margin-left:0;color:#7c8ca5;display:-ms-inline-flexbox;display:-webkit-inline-box;display:inline-flex;-ms-flex-align:center;-webkit-box-align:center;align-items:center;-webkit-box-shadow:none;box-shadow:none;text-align:left;position:relative;padding:1rem 2.4rem;-webkit-transition:all .25s;transition:all .25s;z-index:99;display:-webkit-box;display:-ms-flexbox;display:flex}#contractor .dependent .dependent-label p{font-size:1.8rem;line-height:1.42857143}#contractor .tab{margin-bottom:2rem}#contractor .tab_info h2{font-weight:600;font-size:24px}#contractor .tab_info P{margin-top:10px;color:#71757b;line-height:1.3}#contractor .tab_info .tab-heading{-webkit-box-align:center;-ms-flex-align:center;align-items:center}#contractor .tab_info .tab-heading h2,#contractor .tab_info .tab-heading svg{cursor:pointer}#contractor .tab_info .tab-heading svg{-webkit-transition:all .3s;transition:all .3s;margin-left:1rem}#contractor .tab_info .tab-heading svg.rotate{-webkit-transform:rotate(90deg);transform:rotate(90deg)}#contractor .tab_info .tab-heading svg path{fill:#71757b}#contractor .tab_box{border-radius:10px;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;margin-top:3rem;padding-bottom:3rem;background-color:#fff}#contractor .tab_box .block-row{-ms-flex-wrap:nowrap;flex-wrap:nowrap;margin-bottom:3rem}@media (max-width:1249px){#contractor .tab_box .block-row{-ms-flex-wrap:wrap;flex-wrap:wrap}}#contractor .tab_box .jodit_container{margin-top:1rem}#contractor .tab_box .full-width{width:100%;max-width:100%}#contractor .tab_box .checkbox-disabled{pointer-events:none}.dlink-p{display:-webkit-box;display:-ms-flexbox;display:flex;margin:.5rem 0;color:var(--base-color);font-size:1.5rem;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.dlink-name{-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto;min-width:1rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.dlink-link,.dlink-name{color:inherit;font-size:inherit}.dlink-link{-webkit-box-flex:0;-ms-flex:0 0 auto;flex:0 0 auto;margin-left:auto;font-weight:700}.fade-enter-active,.fade-leave-active{-webkit-transition:opacity .5s;transition:opacity .5s}.fade-enter,.fade-leave-to{opacity:0}",""])}}]);
//# sourceMappingURL=chunk-535e1e9f.0cda7707.js.map