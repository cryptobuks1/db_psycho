(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-a03ffc50"],{"3dfd8":function(e,t,i){"use strict";i.r(t);var n=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",[i("div",{directives:[{name:"show",rawName:"v-show",value:e.loading,expression:"loading"}],staticClass:"spinner-container"},[i("atom-spinner",{directives:[{name:"show",rawName:"v-show",value:!0,expression:"true"}],attrs:{"animation-duration":1e3,color:"var(--accent)"}})],1),e.questionnaire&&!e.loading?i("div",{staticClass:"container questionnaire"},[i("div",{staticClass:"questionnaire-pages"},e._l(e.QTPage,function(t,n){return t.hidden?e._e():i("div",{staticClass:"page-button",class:{active:n===e.current_page_index},on:{click:function(t){e.current_page_index=n}}},[e._v("\n                "+e._s(t.page_name)+"\n            ")])}),0),e._l(e.QTPage,function(t,n){return t.hidden?e._e():i("div",{directives:[{name:"show",rawName:"v-show",value:n===e.current_page_index,expression:"page_index===current_page_index"}],staticClass:"questionnaire-page"},e._l(t.qt_blocks,function(t){return t.hidden?e._e():i("div",{staticClass:"questionnaire-block"},[i("h2",[e._v("\n                    "+e._s(t.block_name)+"\n                ")]),e._l(t.qt_sets,function(t,a){return t.hidden?e._e():i("div",{staticClass:"questionnaire-set"},[e.set_contains_table(t)?t.questions[0].hidden?e._e():i("div",{staticClass:"list-section"},[i("label",[e._v(e._s(t.questions[0]["question_name"]))]),e.view_table_in_set_l(t)?i("div",[i("InlineList",{attrs:{block:e.formatListBlock(t,n,a),model:e.main_data_models["Questionnaire"][0][t.questions[0]["id"]],add_models:e.add_data_models}})],1):i("List",{attrs:{block:e.formatListBlock(t,n,a),model:e.main_data_models["Questionnaire"][0][t.questions[0]["id"]],add_models:e.add_data_models}})],1):i("Zone",{staticClass:"full-width",attrs:{models:e.main_data_models,fields:e.format_zone_fields(t),add_models:e.add_data_models},on:{scenario:e.handleScenario}})],1)})],2)}),0)}),i("div",{staticClass:"row action-buttons"},[i("div",{staticClass:"col d-flex justify-content-end page_buttons_bottom margin-top-2"}),i("a",{staticClass:"btn btn-green",on:{click:function(t){return e.save()}}},[e._v("\n                Сохранить\n            ")])])],2):e._e()])},a=[],s=i("a8db"),o=(i("20d6"),i("c5f6"),i("96cf"),i("3b8d")),r=(i("7514"),i("75fc")),d=i("cebc"),l=(i("7f7f"),i("456d"),i("ac6a"),i("cadf"),i("5df3"),i("4f7f"),i("c777")),c=i("2e90"),u=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{staticClass:"inline-list-container"},[i("div",{staticClass:"control-panel"},[i("button",{staticClass:" btn btn-green btn-small",on:{click:e.addLine}},[i("i",{staticClass:"fa fa-plus-circle",attrs:{"aria-hidden":"true"}})])]),e.items.length?e._e():i("p",[e._v("Нет записей, соответствующих вашему запросу")]),i("div",{staticClass:"inline-list"},e._l(e.items,function(t,n){return 3!==t.status?i("div",{staticClass:"inline-list-item"},[i("Zone",{key:n,staticClass:"full-width",attrs:{fields:e.zone_fields,models:{item:[t]},add_models:e.add_models}}),i("i",{staticClass:"fa fa-times-circle delete-icon",attrs:{"aria-hidden":"true"},on:{click:function(i){return e.deleteLine(t)}}})],1):e._e()}),0)])},_=[],f=i("56d7"),m={name:"InlineList",data:function(){return{zone_fields:[],items:[]}},methods:{formatBlockFields:function(){this.zone_fields=this.block.block_fields.map(function(e){var t={title:e.label,model:e.key,model_name:"item",type:e.type||"text",width:e.width+"%"||!1,hidden:!1};return"select"===e.type&&(t.type="vue-select",t.options_data=e.options_data),t})},addLine:function(){var e=this,t=Object(d["a"])({},this.block.block_parameters.empty_row);t.line_n=this.model[this.model.length-1]&&this.model[this.model.length-1].line_n+1||1;var i={modal:{modal_title:this.block.block_title,fields:this.block.block_fields,type:"editRow",model:t,addModels:this.add_models,model_name:this.block_model,request:!1,block:this.block}};f["EventBus"].$emit("showModal",i),f["EventBus"].$on("editFinish",function(t){t&&(t.status=2,e.items.push(t)),f["EventBus"].$off("editFinish")})},deleteLine:function(e){if(e.status||this.$set(e,"status",3),2===e.status){var t=this.items.findIndex(function(t){return t===e});this.items.splice(t,1)}}},props:{block:{type:Object},model:{type:Array},add_models:{type:Object}},created:function(){this.formatBlockFields(),this.items=this.model},components:{Zone:l["a"]}},h=m,p=(i("a8c2"),i("2877")),b=Object(p["a"])(h,u,_,!1,null,null,null),v=b.exports,q=i("4583"),g={name:"Questionnaire",data:function(){return{questionnaire:null,QTPage:[],QTBlock:[],QTSet:[],QTSetsQuestionsList:[],current_page_index:0,question_types:{text:"text",select:"vue-select",checkbox:"checkbox",radio:"radiobuttons",title:"title",table:"table",date:"date",datetime:"datetime",time:"time"},main_data_models:{},add_data_models:[],affected_by_scenarios:{QTSetsQuestionsList:new Set,QTSet:new Set,QTBlock:new Set,QTPage:new Set},paramCard:{},loading:!0}},provide:function(){return{$validator:this.$validator}},computed:{format_zone_fields:function(){var e=this;return function(t){return t.questions.map(e.formatFields)}},set_contains_table:function(){return function(e){return e.questions.some(function(e){return"table"===e.question_type_code})}},view_table_in_set_l:function(){var e=this;return function(t){return e.add_data_models[t.questions[0]["question_kind_code"]]["table_params"].view_table_in_set_l}}},methods:{formatFields:function(e){var t={title:e.question_name,model:e.id,model_name:"Questionnaire",type:this.question_types[e.question_type_code],width:e.question_width+"%",tip:e.question_description,hidden:e.hidden||!1,reference_l:e.reference_l,validation:{required:e.question_required_l}};if(e.validations.forEach(function(e){t.validation[e.validation_code]=e.validation_value}),"vue-select"===t.type&&(t.options=this.add_data_models[e.question_kind_code],t.scenarios=e.scenarios,t.options_data={options_data_model:e.question_kind_code,options_field_id:"question_answer_value",options_field_title:"question_answer_value"}),t.reference_l&&(t.type="vue-select",t.options=this.add_data_models[e.question_kind_code],t.scenarios=e.scenarios,t.options_data={options_data_model:e.question_kind_code,options_field_id:Object.keys(this.add_data_models[e.question_kind_code][0])[0],options_field_title:this.add_data_models[e.question_kind_code][0]["name"]},t.dependent_data={},e.owner_question&&(t.dependent_data.supreme=!0,t.dependent_data.supreme_field_key=e.owner_question.supreme_field_key),e.dependent_question&&(t.dependent_data=Object(d["a"])({},t.dependent_data,{},e.dependent_question))),"radiobuttons"===t.type){t.scenarios=e.scenarios;try{t.list=this.add_data_models[e.question_kind_code].map(function(e){return{name:e.question_answer_value,title:e.question_answer_value,value:e.question_answer_value}}),t.options={view:"radio",direction:"horizontal"}}catch(i){alert(i)}}return t},formatListBlock:function(e,t,i){var n=this;if(!this.add_data_models[e.questions[0]["question_kind_code"]]["table_attributes"].length)throw new Error("Неккоректный формат полей списка");var a=this.add_data_models[e.questions[0]["question_kind_code"]]["table_attributes"].map(function(e){var t={key:e.question_code,label:e.question_name,edit:!0,width:e.question_width};if(e.reference_l&&(t.type="select",t.options=n.add_data_models[e.question_kind_code],t.options_data={options_data_model:e.question_kind_code,options_field_id:Object.keys(n.add_data_models[e.question_kind_code][0])[0],options_field_title:Object.keys(n.add_data_models[e.question_kind_code][0])[1]}),e.question_required_l&&(t.validation={required:!0}),"select"===e.question_type_code){if(t.type="select",t.options=n.add_data_models[e.question_kind_code],!n.add_data_models[e.question_kind_code])throw new Error("Отсутствует дополнительная модель под варианты ответа");t.options_data={options_data_model:e.question_kind_code,options_field_id:"question_answer_value",options_field_title:"question_answer_value"}}return"checkbox"===e.question_type_code&&(t.type="checkbox"),t});return{block_fields:a,block_parameters:{edit_values:!0,hide_pagination:!0,edit_mode:"inline",prevent_list_click:!0,hide_search:!0,unique_name:""+t+i}}},createTableKey:function(e){return this.main_data_models["Questionnaire"][0][e.questions[0]["id"]]=this.main_data_models["Questionnaire"][0][e.questions[0]["id"]]&&Array.isArray(this.main_data_models["Questionnaire"][0][e.questions[0]["id"]])?Object(r["a"])(this.main_data_models["Questionnaire"][0][e.questions[0]["id"]]):[],this.main_data_models["Questionnaire"][0][e.questions[0]["id"]]},handleScenario:function(e){switch(e.scenario.table_code){case"QTSetsQuestionsList":this.hideElement(this.QTSetsQuestionsList,e.scenario);break;case"QTSet":this.hideElement(this.QTSet,e.scenario);break;case"QTBlock":this.hideElement(this.QTBlock,e.scenario);break;case"QTPage":this.hideElement(this.QTPage,e.scenario);break}},hideElement:function(e,t){var i=e.find(function(e){return e.id===t.row_id});"show"===t.scenario_name?this.$set(i,"hidden",!1):this.$set(i,"hidden",!0)},filterAffectedElements:function(){var e=this;this.QTSetsQuestionsList.forEach(function(t){t.scenarios.length>0&&t.scenarios.forEach(function(t){if("hide"===t.scenario_name){var i=e[t.table_code].find(function(e){return e.id===t.row_id}),n=e.main_data_models.Questionnaire[0][t.qt_sets_questions_list_id];(!n||n&&n===t.question_answer_value)&&e.$set(i,"hidden",!0)}}),"table"===t.question_type_code&&(e.main_data_models.Questionnaire[0][t.id]||(e.main_data_models.Questionnaire[0][t.id]=[]))})},save:function(){var e=Object(o["a"])(regeneratorRuntime.mark(function e(){var t,i,n,a,s,o,r,d,l;return regeneratorRuntime.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,this.$validator.validateAll();case 2:if(t=e.sent,!t){e.next=25;break}for(i in this.fieldsVV)this.fieldsVV[i].touched=!0;return this.deleteHiddenFieldsFromModel(),n={main_data_models:this.main_data_models},e.prev=7,this.loading=!0,e.next=11,this.$http.post("/admin/qt/questionnaire/save",n);case 11:return a=e.sent,this.$store.dispatch("showToast",{template:"success",title:"OK",message:"Successfully saved",position:"topRight"}),this.questionnaire=null,this.fillComponent(a),this.loading=!1,e.abrupt("return",a);case 19:e.prev=19,e.t0=e["catch"](7),this.loading=!1,this.$store.dispatch("showToast",{template:"error",title:"Ошибка",message:"Некорректные данные",position:"topRight"});case 23:e.next=33;break;case 25:for(s in this.fieldsVV)this.fieldsVV[s].touched=!0;this.$store.dispatch("showToast",{template:"error",title:"Ошибка",message:"Некорректные данные",position:"topRight"}),o=this.errors.items[0],r=this.QTSetsQuestionsList.find(function(e){return e.id===Number(o.field)}),d=this.QTSet.find(function(e){return e.id===r.qt_set_id}),l=this.QTBlock.find(function(e){return e.id===d.qt_block_id}),this.current_page_index=this.QTPage.findIndex(function(e){return e.id===l.qt_page_id}),this.$nextTick(function(){var e=document.querySelector('[name="'+o.field+'"]');e.classList.contains("radiobuttons__input")?e.parentElement.scrollIntoView({behavior:"smooth",block:"center",inline:"center"}):e.classList.contains("datetime-picker-error-input")?e.previousElementSibling.scrollIntoView({behavior:"smooth",block:"center",inline:"center"}):e.scrollIntoView({behavior:"smooth",block:"center",inline:"center"})});case 33:case"end":return e.stop()}},e,this,[[7,19]])}));function t(){return e.apply(this,arguments)}return t}(),deleteHiddenFieldsFromModel:function(){var e=this,t=new Set;this.QTPage.forEach(function(e){e.hidden&&e.qt_blocks.forEach(function(e){e.qt_sets.forEach(function(e){e.questions.forEach(function(e){t.add(e.id)})})})}),this.QTBlock.forEach(function(e){e.hidden&&e.qt_sets.forEach(function(e){e.questions.forEach(function(e){t.add(e.id)})})}),this.QTSet.forEach(function(e){e.hidden&&e.questions.forEach(function(e){t.add(e.id)})}),this.QTSetsQuestionsList.forEach(function(e){e.hidden&&t.add(e.id)}),t.forEach(function(t){e.main_data_models.Questionnaire[0][t]=null})},componentData:function(){var e=Object(o["a"])(regeneratorRuntime.mark(function e(){var t;return regeneratorRuntime.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return e.prev=0,e.next=3,this.$http.post(this.$bRoute.meta.route,this.paramCard);case 3:t=e.sent,this.fillComponent(t),this.loading=!1,e.next=11;break;case 8:e.prev=8,e.t0=e["catch"](0),console.log(e.t0);case 11:case"end":return e.stop()}},e,this,[[0,8]])}));function t(){return e.apply(this,arguments)}return t}(),fillComponent:function(e){var t=this;this.add_data_models=e.data.add_data_models,this.main_data_models=e.data.main_data_models,this.questionnaire=function(){var t=e.data.questionnaire_template[0],i=(t.qt_pages,Object(s["a"])(t,["qt_pages"]));return i}(),this.QTPage=e.data.questionnaire_template[0].qt_pages,this.QTPage.forEach(function(e){t.QTBlock=[].concat(Object(r["a"])(t.QTBlock),Object(r["a"])(e.qt_blocks))}),this.QTBlock.forEach(function(e){t.QTSet=[].concat(Object(r["a"])(t.QTSet),Object(r["a"])(e.qt_sets))}),this.QTSet.forEach(function(e){t.QTSetsQuestionsList=[].concat(Object(r["a"])(t.QTSetsQuestionsList),Object(r["a"])(e.questions))}),this.filterAffectedElements()}},components:{Zone:l["a"],List:c["default"],InlineList:v,AtomSpinner:q["a"]},props:["row_id_fe_route_step_object","step_l","controller_alias"],created:function(){var e=Object(o["a"])(regeneratorRuntime.mark(function e(){var t=this;return regeneratorRuntime.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return f["EventBus"].$on("close_step",Object(o["a"])(regeneratorRuntime.mark(function e(){var i;return regeneratorRuntime.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return e.prev=0,e.next=3,t.save();case 3:i=e.sent,i.data&&t.$emit("modelSaved"),e.next=10;break;case 7:e.prev=7,e.t0=e["catch"](0),console.log(e.t0);case 10:case"end":return e.stop()}},e,null,[[0,7]])}))),this.paramCard.id=this.step_l?this.row_id_fe_route_step_object:this.$bRoute.params[this.$bRoute.meta.id_field],this.controller_alias&&(this.paramCard.dependent={controller_alias:this.controller_alias,id:this.$bRoute.params[this.$bRoute.matched[0].meta.id_field]}),e.next=5,this.componentData();case 5:case"end":return e.stop()}},e,this)}));function t(){return e.apply(this,arguments)}return t}(),beforeDestroy:function(){f["EventBus"].$off("close_step")}},k=g,w=(i("8997"),Object(p["a"])(k,n,a,!1,null,"4bfd1811",null));t["default"]=w.exports},5020:function(e,t,i){t=e.exports=i("2350")(!1),t.push([e.i,":root{--accent:#e1002d;--bg-color:#fff;--base-color:#202a3d;--darkAccent:#a2001e;--tableHead:#788699}.inline-list-container .control-panel{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:10px 15px}.inline-list-container p{color:#7c8ca5;text-align:center}.inline-list-container .inline-list .inline-list-item{margin-left:2.5rem;border:1px solid #ced0da;margin-top:1rem;-webkit-transition:all .3s ease-in-out;transition:all .3s ease-in-out;position:relative}.inline-list-container .inline-list .inline-list-item .delete-icon{position:absolute;top:0;right:0;-webkit-transform:translate(50%,-50%);transform:translate(50%,-50%);color:var(--accent);cursor:pointer;background-color:#fff}",""])},8997:function(e,t,i){"use strict";var n=i("a5b6"),a=i.n(n);a.a},a5b6:function(e,t,i){var n=i("f56d");"string"===typeof n&&(n=[[e.i,n,""]]),n.locals&&(e.exports=n.locals);var a=i("499e").default;a("1b8bc50b",n,!0,{sourceMap:!1,shadowMode:!1})},a8c2:function(e,t,i){"use strict";var n=i("b22d"),a=i.n(n);a.a},a8db:function(e,t,i){"use strict";var n=i("e265"),a=i.n(n),s=i("a4bb"),o=i.n(s);function r(e,t){if(null==e)return{};var i,n,a={},s=o()(e);for(n=0;n<s.length;n++)i=s[n],t.indexOf(i)>=0||(a[i]=e[i]);return a}function d(e,t){if(null==e)return{};var i,n,s=r(e,t);if(a.a){var o=a()(e);for(n=0;n<o.length;n++)i=o[n],t.indexOf(i)>=0||Object.prototype.propertyIsEnumerable.call(e,i)&&(s[i]=e[i])}return s}i.d(t,"a",function(){return d})},b22d:function(e,t,i){var n=i("5020");"string"===typeof n&&(n=[[e.i,n,""]]),n.locals&&(e.exports=n.locals);var a=i("499e").default;a("7cdbe742",n,!0,{sourceMap:!1,shadowMode:!1})},f56d:function(e,t,i){t=e.exports=i("2350")(!1),t.push([e.i,"[data-v-4bfd1811]:root{--accent:#e1002d;--bg-color:#fff;--base-color:#202a3d;--darkAccent:#a2001e;--tableHead:#788699}.questionnaire[data-v-4bfd1811]{margin-bottom:2rem}.questionnaire-pages[data-v-4bfd1811]{display:-webkit-box;display:-ms-flexbox;display:flex}.questionnaire-pages .page-button[data-v-4bfd1811]{border-radius:3px;height:4rem;border:1px solid #e2e2e2;background-image:none;background-color:transparent;line-height:4rem;font-size:1.45rem;color:#293036;padding:0 1.5rem;margin-right:1.5rem;-webkit-transition:all .3s;transition:all .3s;cursor:pointer}.questionnaire-pages .page-button.active[data-v-4bfd1811]{background-color:var(--accent);border-color:var(--accent);color:#fff!important;font-weight:700}.questionnaire-pages .page-button[data-v-4bfd1811]:hover{color:var(--accent);border-color:var(--accent)}.questionnaire-page .questionnaire-block[data-v-4bfd1811]{padding:2rem}.questionnaire-page .questionnaire-block h2[data-v-4bfd1811]{font-size:1.7rem;text-transform:uppercase;font-weight:600}.questionnaire-page .questionnaire-block .list-section[data-v-4bfd1811]{padding:0 15px;padding-top:1.5rem}.questionnaire-page .questionnaire-block .list-section label[data-v-4bfd1811]{color:var(--base-color);font-size:1.4rem;display:-webkit-box;display:-ms-flexbox;display:flex;font-weight:600;min-height:1.6rem;padding-left:.3rem}.atom-spinner[data-v-4bfd1811]{margin-left:auto;margin-right:auto;margin-top:3rem}",""])}}]);
//# sourceMappingURL=chunk-a03ffc50.8036af06.js.map