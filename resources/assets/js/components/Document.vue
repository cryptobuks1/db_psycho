<template>
    <div class="list" id="document">
        <div class="print-header print-toggle-dnone">
            <h1> hello print header</h1>
        </div>
        <div class="container no-padding">
            <div class="row">
                <div class="col-md-16">
                    <div class="contractor_list-link">
                        <ul>
                            <li v-for="(item, index) in tabs"
                                :class="{'active':tab_index==index}"
                                @click="changeTab(index, item)"
                            >
                                <a>{{item.tab_title}} </a>
                            </li><!--сначала выводим кнопки для перехода на табы -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab" v-if="tab_index==index" v-for="(tab , index) in tabs"> <!--Перебираем табы -->
                <div class="row">
                    <div class="col">
                        <h1>{{tab.tab_title}}</h1>
                    </div>
                </div>
                <button class="print-hide" @click="$store.commit('showModal', {type: 'documentModal',texts:{h1:'documentModal',p:'text',btn_revert: 'Назад',btn_confirm: 'Ок'}});">
                    Open Modal
                </button>

                <div class="block-row">


                    <Sector
                            :blocks="tab.blocks"
                            :models="models"
                            :position="'left'"
                            :class="{
                                            'left-sector':true,
                                            'full-width':tab.sectors_quantity==1 || !tab.sectors_quantity,
                                            'grid':tab.sectors_quantity
                                        }"

                    ></Sector>

                    <Sector
                            v-if="tab.sectors_quantity==2"
                            :blocks="tab.blocks"
                            :models="models"
                            :position="'right'"
                            :class="{
                                            'right-sector':true,
                                            'grid':true
                                        }"

                    ></Sector>



                    <!--<div :class="{'left-sector':true, 'full-width':tab.sectors_quantity==1}">-->

                        <!--<div :class="{'block':true, 'full-width':tab.sectors_quantity==1}"-->
                             <!--:style="{'grid-column':block.column, 'grid-row':block.row}"-->
                             <!--v-for="(block, index) in tab.blocks" :key="block.block_model"-->
                             <!--v-if="block.sector=='left'"> &lt;!&ndash;Перебираем блоки &ndash;&gt;-->

                            <!--&lt;!&ndash;Dependency todo перенести из блока наверх таба &ndash;&gt;-->
                            <!--<div class="row d-flex justify-content-between">-->
                                <!--&lt;!&ndash;Элементы пагинации&ndash;&gt;-->
                                <!--&lt;!&ndash;<div class="counter_list col hidden-md-down">&ndash;&gt;-->
                                <!--&lt;!&ndash;<p>{{textLang[0]}} <b>{{countOf}}-{{countTo}}</b> {{textLang[1]}} <b>{{totalRows}}</b></p>&ndash;&gt;-->
                                <!--&lt;!&ndash;<b-form-select :options="pageOptions"  name="count" v-model="perPage" id="count"/>&ndash;&gt;-->
                                <!--&lt;!&ndash;<p>{{textLang[2]}}</p>&ndash;&gt;-->
                                <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                <!--&lt;!&ndash;Зависимый dropdown&ndash;&gt;-->
                                <!--<div v-if="form_parameters.form_is_dependent"-->
                                     <!--class="col-xl-4 col-lg-5 col-md-6 d-flex align-items-end">-->
                                    <!--<div class="list_items">-->
                                        <!--<span>{{response.dependent.dependent_fields.title}}</span>-->
                                        <!--<div class="dropdown" :class="{active: listItemsS}"-->
                                             <!--v-if="response.dependent.dependent_fields.type == 'select'">-->
                                            <!--<button class="btn btn-dropdown">{{listItemsText}}<img class="drop-i"-->
                                                                                                   <!--src="/img/dropdown-i.png"-->
                                                                                                   <!--alt=""></button>-->
                                            <!--&lt;!&ndash; dropdown &ndash;&gt;-->
                                            <!--<transition name="fade">-->
                                                <!--<div class="dropdown_box">-->
                                                    <!--<ul>-->
                                                        <!--&lt;!&ndash;Поиск по элементам dropdown&ndash;&gt;-->
                                                        <!--<li>-->
                                                            <!--<input type="text" v-model="filterSelect"-->
                                                                   <!--class="dropwond_link filterSelect">-->
                                                        <!--</li>-->
                                                        <!--&lt;!&ndash;Дефолтное значение&ndash;&gt;-->
                                                        <!--<li :class="{selected:defaultSelectId == ''}">-->
                                                            <!--<button class="dropwond_link"-->
                                                                    <!--@click="filterList('',dependent.searchFilterVal,'select')">-->
                                                                <!--All-->
                                                            <!--</button>-->
                                                        <!--</li>-->
                                                        <!--&lt;!&ndash;Перебор элементов&ndash;&gt;-->
                                                        <!--<li v-for="item in filteredList(listItemsAll,dependent.searchFilterVal)"-->
                                                            <!--:class="{selected:defaultSelectId == item['id']}">-->
                                                            <!--<button @click="filterList(item[dependent.searchFilterVal],dependent.searchFilterVal,'select')"-->
                                                                    <!--class="dropwond_link">-->
                                                                <!--{{item[dependent.searchFilterVal]}}-->
                                                            <!--</button>-->
                                                        <!--</li>-->
                                                    <!--</ul>-->
                                                <!--</div>-->
                                            <!--</transition>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->


                            <!--<div class="card-row" v-if="block.block_type=='block_card'">-->
                                <!--<div class="row contractor_box d-flex align-items-start">-->

                                    <!--<div :class="{'left-zone':true, 'full-width':block.block_zone_quantity==1}">-->
                                        <!--&lt;!&ndash;если количество зон == 1, выводим только левую  &ndash;&gt;-->
                                        <!--<div v-for="(item,index) in block.block_fields"-->
                                             <!--v-if="item.zone==1"-->
                                             <!--:class="{-->
                                                 <!--'col-md-16':item.width=='100%',-->
                                                 <!--'col-md-12':item.width=='75%',-->
                                                 <!--'col-md-8':item.width=='50%',-->
                                                 <!--'col-md-4':item.width=='25%',-->
                                                 <!--'col10':item.width=='10%',-->
                                                 <!--'col20':item.width=='20%',-->
                                                 <!--'col30':item.width=='30%',-->
                                                 <!--'col33':item.width=='33%',-->
                                                 <!--'col40':item.width=='40%',-->
                                                 <!--'col60':item.width=='60%',-->
                                                 <!--'col70':item.width=='70%',-->
                                                 <!--'col80':item.width=='80%',-->
                                                 <!--'col90':item.width=='90%',-->
                                                 <!--'border-right':item.border_right,-->
                                             <!--}"-->
                                             <!--:style="{'order':item.order}"-->

                                        <!--&gt;-->
                                            <!--&lt;!&ndash; Выставляем ширину колонки в зависимости от параметра &ndash;&gt;-->

                                            <!--<div :class="{'field-box':true, 'hidden':item.hidden}">-->

                                                <!--<label :class="{'label-green': item.type=='title'}">{{item.type == 'checkbox' ? "" : item.title}}</label>-->

                                                <!--<div style="position: relative;">-->
                                                    <!--<input v-validate="item.validation"-->
                                                           <!--v-if="item.type=='text'"-->
                                                           <!--:type="item.type"-->
                                                           <!--:name="item.model"-->
                                                           <!--v-model="models[block.block_model][0][item.model]"-->
                                                           <!--@input="modelChangeHandler"-->
                                                           <!--:class="{'valid':fieldsVV[item.model]&&fieldsVV[item.model].valid&&fieldsVV[item.model].touched && item.validation, 'invalid':fieldsVV[item.model]&&fieldsVV[item.model].invalid&&fieldsVV[item.model].touched && item.validation}"-->
                                                    <!--&gt;-->
                                                    <!--<svg class="svg-invalid" width="16" height="16" viewBox="0 0 16 16">-->
                                                        <!--<path id="Forma_1"-->
                                                              <!--d="M1284,590a8,8,0,1,0,8,8A8,8,0,0,0,1284,590Zm4,10.868L1286.87,602l-2.87-2.868L1281.13,602l-1.13-1.132,2.87-2.868-2.87-2.868,1.13-1.132,2.87,2.868,2.87-2.868,1.13,1.132L1285.13,598Z"-->
                                                              <!--transform="translate(-1276 -590)"/>-->
                                                    <!--</svg>-->
                                                    <!--<svg class="svg-valid" width="16" height="16" viewBox="0 0 16 16">-->
                                                        <!--<path id="Forma_1"-->
                                                              <!--d="M1284,494a8,8,0,1,0,8,8A8.01,8.01,0,0,0,1284,494Zm4.46,5.332-4.92,5.538a0.61,0.61,0,0,1-.46.207,0.631,0.631,0,0,1-.39-0.135l-3.07-2.461a0.613,0.613,0,1,1,.76-0.962l2.62,2.1,4.54-5.1A0.616,0.616,0,1,1,1288.46,499.332Z"-->
                                                              <!--transform="translate(-1276 -494)"/>-->
                                                    <!--</svg>-->
                                                <!--</div>-->


                                                <!--<select v-if="item.type=='select'" :name="item.model"-->
                                                        <!--v-model="models[block.block_model][0][item.model]"-->
                                                        <!--@change="modelChangeHandler"-->
                                                <!--&gt;-->
                                                    <!--<option v-if="item.model=='db_area_id'" value="">Открепить</option>-->
                                                    <!--<option value="">1ewf</option>-->
                                                    <!--<option value="">2ewfwe</option>-->
                                                    <!--<option v-if="item.model=='country_id'" v-for="opt in item.options"-->
                                                            <!--:value="opt.id">{{opt.country_name}}-->
                                                    <!--</option>-->
                                                    <!--<option v-if="item.model=='db_area_id'" v-for="opt in item.options"-->
                                                            <!--:value="opt.id">{{opt.db_area_code}}-->
                                                    <!--</option>-->
                                                <!--</select>-->

                                                <!--<div v-if="item.type=='lt-select'" class="dropdown">-->
                                                    <!--<button class="btn btn-dropdown " @click="dropdownClick ">-->
                                                        <!--<input type="text" v-model="item.options_data.search"-->
                                                               <!--class="dropwond_link filterSelect"-->
                                                               <!--@input="selectSearch(item)"-->
                                                               <!--@keypress="dropDownKeyPress"-->
                                                               <!--@keyup="dropDownArrows($event,item,  models[block.block_model][0])">-->
                                                        <!--{{item.value}}-->
                                                        <!--<img class="drop-i btn-dropdown" src="/img/dropdown-i.png"-->
                                                             <!--alt="">-->
                                                    <!--</button>  &lt;!&ndash; dropdown &ndash;&gt;-->
                                                    <!--<transition name="fade">-->
                                                        <!--<div class="dropdown_box dropdown_box_select">-->
                                                            <!--<ul>-->

                                                                <!--<li v-for="(option, index) in item.options"-->
                                                                    <!--:data-select="index"-->
                                                                    <!--:class="{'li-selected':index==currentOption}"-->
                                                                <!--&gt;-->
                                                                    <!--<button @click="chooseSelectItemCard(item, option, models[block.block_model][0])"-->
                                                                            <!--@mouseover="hoverSelectItem"-->
                                                                            <!--class="dropwond_link">-->
                                                                        <!--{{option[item.options_data.options_field_title]}}-->
                                                                    <!--</button>-->
                                                                <!--</li>-->
                                                            <!--</ul>-->
                                                        <!--</div>-->
                                                    <!--</transition>-->
                                                <!--</div>-->

                                                <!--<div class="contractor_checkbox checkbox "-->
                                                     <!--:class="{'checkbox-disabled':item.disabled}"-->
                                                     <!--v-if="item.type=='checkbox'">-->
                                                    <!--<label :for="item.model">-->
                                                        <!--&lt;!&ndash;@change="checkboxChange"&ndash;&gt;-->
                                                        <!--<input :disabled=item.disabled :name="item.model"-->
                                                               <!--type="checkbox"-->
                                                               <!--:id="item.model"-->

                                                               <!--v-model="models[block.block_model][0][item.model]">-->
                                                        <!--<span class="checkbox-custom"><i class="fa fa-check"></i></span>-->
                                                        <!--<span> {{item.title}}</span>-->
                                                    <!--</label>-->
                                                <!--</div>-->

                                                <!--<div class="contractor_parag" v-if="item.type=='label'">-->
                                                    <!--<p>{{models[block.block_model][0][item.model]}}</p>-->
                                                <!--</div>-->

                                                <!--<datepicker v-if="item.type=='date'"-->
                                                            <!--:language="datapicker_translations.en"-->
                                                            <!--:format="'dd/MM/yyyy'"-->
                                                            <!--v-model="models[block.block_model][0][item.model]"-->
                                                            <!--@input="modelChangeHandler"-->
                                                <!--&gt;</datepicker>-->

                                                <!--<div v-if="item.type=='double-date'" class="double-datepicker">-->
                                                    <!--<datepicker :language="datapicker_translations.en"-->
                                                                <!--:format="'dd/MM/yyyy'"-->
                                                                <!--v-model="models[block.block_model][0][item.model]['from']"-->
                                                                <!--@input="modelChangeHandler"-->
                                                    <!--&gt;</datepicker>-->

                                                    <!--<datepicker :language="datapicker_translations.en"-->
                                                                <!--:format="'dd/MM/yyyy'"-->
                                                                <!--v-model="models[block.block_model][0][item.model]['to']"-->
                                                                <!--@input="modelChangeHandler"-->
                                                    <!--&gt;</datepicker>-->
                                                <!--</div>-->

                                                <!--<span class="vv-error">{{ errors.first('' + item.model) || serverErrors.first(item.model)-->
                                                    <!--}}</span>-->
                                            <!--</div>-->

                                        <!--</div>-->

                                    <!--</div>-->

                                    <!--<div v-if="block.block_zone_quantity==2" class="right-zone">-->
                                        <!--&lt;!&ndash;Если количество зон==2 показываем и вторую &ndash;&gt;-->

                                        <!--<div v-for="(item,index) in block.block_fields"-->
                                             <!--v-if="item.zone==2"-->
                                             <!--:class="{-->

                                                <!--'col-md-16':item.width=='100%',-->
                                                 <!--'col-md-12':item.width=='75%',-->
                                                 <!--'col-md-8':item.width=='50%',-->
                                                 <!--'col-md-4':item.width=='25%',-->
                                                 <!--'col10':item.width=='10%',-->
                                                 <!--'col20':item.width=='20%',-->
                                                 <!--'col30':item.width=='30%',-->
                                                 <!--'col33':item.width=='33%',-->
                                                 <!--'col40':item.width=='40%',-->
                                                 <!--'col60':item.width=='60%',-->
                                                 <!--'col70':item.width=='70%',-->
                                                 <!--'col80':item.width=='80%',-->
                                                 <!--'col90':item.width=='90%',-->
                                                 <!--'border-right':item.border_right,-->
                                             <!--}"-->
                                             <!--:style="{'order':item.order}"-->
                                        <!--&gt;-->
                                            <!--&lt;!&ndash; Выставляем ширину колонки в зависимости от параметра &ndash;&gt;-->

                                            <!--<div :class="{'field-box':true, 'hidden':item.hidden}">-->

                                                <!--<label :class="{'label-green': item.type=='title'}">{{item.type == 'checkbox' ? "" : item.title}}</label>-->

                                                <!--<div v-if="item.type=='text'" style="position: relative;">-->
                                                    <!--<input v-validate="item.validation"-->
                                                           <!--:type="item.type"-->
                                                           <!--:name="item.model"-->
                                                           <!--v-model="models[block.block_model][0][item.model]"-->
                                                           <!--@input="modelChangeHandler"-->
                                                           <!--:class="{'valid':fieldsVV[item.model]&&fieldsVV[item.model].valid&&fieldsVV[item.model].touched&&item.validation, 'invalid':fieldsVV[item.model]&&fieldsVV[item.model].invalid&&fieldsVV[item.model].touched && item.validation}"-->
                                                    <!--&gt;-->
                                                    <!--<svg class="svg-invalid" width="16" height="16" viewBox="0 0 16 16">-->
                                                        <!--<path id="Forma_1"-->
                                                              <!--d="M1284,590a8,8,0,1,0,8,8A8,8,0,0,0,1284,590Zm4,10.868L1286.87,602l-2.87-2.868L1281.13,602l-1.13-1.132,2.87-2.868-2.87-2.868,1.13-1.132,2.87,2.868,2.87-2.868,1.13,1.132L1285.13,598Z"-->
                                                              <!--transform="translate(-1276 -590)"/>-->
                                                    <!--</svg>-->
                                                    <!--<svg class="svg-valid" width="16" height="16" viewBox="0 0 16 16">-->
                                                        <!--<path id="Forma_1"-->
                                                              <!--d="M1284,494a8,8,0,1,0,8,8A8.01,8.01,0,0,0,1284,494Zm4.46,5.332-4.92,5.538a0.61,0.61,0,0,1-.46.207,0.631,0.631,0,0,1-.39-0.135l-3.07-2.461a0.613,0.613,0,1,1,.76-0.962l2.62,2.1,4.54-5.1A0.616,0.616,0,1,1,1288.46,499.332Z"-->
                                                              <!--transform="translate(-1276 -494)"/>-->
                                                    <!--</svg>-->
                                                <!--</div>-->

                                                <!--&lt;!&ndash;<input v-if="item.type=='text'" :type="item.type" :name="item.model"&ndash;&gt;-->
                                                <!--&lt;!&ndash;v-model="models[block.block_model][0][item.model]">&ndash;&gt;-->

                                                <!--<select v-if="item.type=='select'" :name="item.model"-->
                                                        <!--v-model="models[block.block_model][0][item.model]"-->
                                                        <!--@change="modelChangeHandler"-->
                                                <!--&gt;-->
                                                    <!--<option v-if="item.model=='db_area_id'" value="">Открепить</option>-->
                                                    <!--<option v-if="item.model=='country_id'" v-for="opt in item.options"-->
                                                            <!--:value="opt.id">{{opt.country_name}}-->
                                                    <!--</option>-->
                                                    <!--<option v-if="item.model=='db_area_id'" v-for="opt in item.options"-->
                                                            <!--:value="opt.id">{{opt.db_area_code}}-->
                                                    <!--</option>-->
                                                <!--</select>-->

                                                <!--<div v-if="item.type=='lt-select'" class="dropdown">-->
                                                    <!--<button class="btn btn-dropdown " @click="dropdownClick ">-->
                                                        <!--<input type="text" v-model="item.options_data.search"-->
                                                               <!--class="dropwond_link filterSelect"-->
                                                               <!--@input="selectSearch(item)"-->
                                                               <!--@keypress="dropDownKeyPress"-->
                                                               <!--@keyup="dropDownArrows($event,item,  models[block.block_model][0])">-->
                                                        <!--{{item.value}}-->
                                                        <!--<img class="drop-i btn-dropdown" src="/img/dropdown-i.png"-->
                                                             <!--alt="">-->
                                                    <!--</button>  &lt;!&ndash; dropdown &ndash;&gt;-->
                                                    <!--<transition name="fade">-->
                                                        <!--<div class="dropdown_box dropdown_box_select">-->
                                                            <!--<ul>-->

                                                                <!--<li v-for="(option, index) in item.options"-->
                                                                    <!--:data-select="index"-->
                                                                    <!--:class="{'li-selected':index==currentOption}"-->
                                                                <!--&gt;-->
                                                                    <!--<button @click="chooseSelectItemCard(item, option, models[block.block_model][0])"-->
                                                                            <!--@mouseover="hoverSelectItem"-->
                                                                            <!--class="dropwond_link">-->
                                                                        <!--{{option[item.options_data.options_field_title]}}-->
                                                                    <!--</button>-->
                                                                <!--</li>-->
                                                            <!--</ul>-->
                                                        <!--</div>-->
                                                    <!--</transition>-->
                                                <!--</div>-->

                                                <!--<div class="contractor_checkbox checkbox"-->
                                                     <!--:class="{'checkbox-disabled':item.disabled}"-->
                                                     <!--v-if="item.type=='checkbox'">-->
                                                    <!--<label :for="item.model">-->
                                                        <!--&lt;!&ndash;@change="checkboxChange"&ndash;&gt;-->
                                                        <!--<input :name="item.model" :disabled=item.disabled-->
                                                               <!--type="checkbox"-->
                                                               <!--:id="item.model"-->

                                                               <!--v-model="models[block.block_model][0][item.model]">-->
                                                        <!--<span class="checkbox-custom"><i class="fa fa-check"></i></span>-->
                                                        <!--<span> {{item.title}}</span>-->
                                                    <!--</label>-->
                                                <!--</div>-->

                                                <!--<div class="contractor_parag" v-if="item.type=='label'">-->
                                                    <!--<p>{{models[block.block_model][0][item.model]}}</p>-->
                                                <!--</div>-->

                                                <!--<datepicker v-if="item.type=='date'"-->
                                                            <!--:language="datapicker_translations.ru"-->
                                                            <!--:format="'dd/MM/yyyy'"-->
                                                            <!--v-model="models[block.block_model][0][item.model]"-->
                                                            <!--@input="modelChangeHandler"-->
                                                <!--&gt;</datepicker>-->

                                                <!--<div v-if="item.type=='double-date'" class="double-datepicker">-->
                                                    <!--<span>C</span>-->
                                                    <!--<datepicker :language="datapicker_translations.ru"-->
                                                                <!--:format="'dd/MM/yyyy'"-->
                                                                <!--v-model="models[block.block_model][0][item.model]['from']"-->
                                                                <!--@input="modelChangeHandler"-->
                                                    <!--&gt;</datepicker>-->
                                                    <!--<span>по</span>-->
                                                    <!--<datepicker :language="datapicker_translations.ru"-->
                                                                <!--:format="'dd/MM/yyyy'"-->
                                                                <!--v-model="models[block.block_model][0][item.model]['to']"-->
                                                                <!--@input="modelChangeHandler"-->
                                                    <!--&gt;</datepicker>-->
                                                    <!--<span @click="loadContent(models[block.block_model][0][item.model]['from'],models[block.block_model][0][item.model]['to'], $event)">Скачать</span>-->
                                                <!--</div>-->

                                                <!--<span class="vv-error">{{ errors.first('' + item.model) }}</span>-->
                                            <!--</div>-->

                                        <!--</div>-->

                                    <!--</div>-->


                                <!--</div>-->
                            <!--</div>-->

                            <!--<div class="list-row" v-if="block.block_type=='block_list_base'">-->
                                <!--&lt;!&ndash; todo уточнить поиск и фильтрацию&ndash;&gt;-->
                                <!--<div class="row align-items-center margin-top-2">-->

                                    <!--&lt;!&ndash;Элементы пагинации для телефона&ndash;&gt;-->
                                    <!--<div class="col-8 hidden-md-up order-1">-->
                                        <!--<div class="counter_list-m counter_list">-->
                                            <!--<p>{{translateList.Showing}} <b>{{countOfMobile[block.block_model]}}</b>-->
                                                <!--{{translateList.of}} <b>{{totalRows[block.block_model]}}</b>-->
                                            <!--</p>-->
                                            <!--<b-form-select :options="pageOptions" name="count" v-model="perPage"-->
                                                           <!--class="count"/>-->
                                            <!--<p>{{translateList.onThePage}}</p>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--&lt;!&ndash;Элементы управление слайдером на телефоне&ndash;&gt;-->
                                    <!--<div class="col-8 hidden-md-up order-1">-->
                                        <!--<div class="buttons-slider">-->
                                            <!--<button class="btn-slider hidden-md-up slider-left"-->
                                                    <!--@click="changeSlide('right',block.block_model)">-->
                                                <!--<img src="img/left.png" alt=""></button>-->
                                            <!--<button class="btn-slider hidden-md-up slider-right"-->
                                                    <!--@click="changeSlide('left',block.block_model)">-->
                                                <!--<img src="img/right.png" alt=""></button>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--&lt;!&ndash;Поиск по элементам по заданому полю&ndash;&gt;&lt;!&ndash;TODO&ndash;&gt;-->
                                    <!--<div class="col-xl-4 col-lg-5 col-md-6 col-16 d-flex align-items-end order-0">-->
                                        <!--<div class="search-box">-->
                                            <!--<input type="text" id="search" v-model="block.filter"-->
                                                   <!--:placeholder="translateList.Search">-->
                                            <!--<button class="search_btn"><img src="/img/Search_icon.svg" class="svg"-->
                                                                            <!--alt="">-->
                                            <!--</button>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--<div class="add-line">-->
                                        <!--<template v-for="action in block.block_actions">-->
                                            <!--<button v-if="action.action_code=='add_line'" class="btn btn-green"-->
                                                    <!--@click="addRow(block)">{{action.name}}-->
                                            <!--</button>-->

                                            <!--<button v-if="action.action_code=='delete'" class="btn btn-green">-->
                                                <!--{{action.name}}-->
                                            <!--</button>-->
                                        <!--</template>-->

                                    <!--</div>-->
                                <!--</div>-->
                                <!--&lt;!&ndash;Фильтрация beta&ndash;&gt;-->

                                <!--&lt;!&ndash;Таблица&ndash;&gt;-->
                                <!--<div class="row">-->
                                    <!--<div class="col">-->

                                        <!--<div class="list-box" id="list-box">-->
                                            <!--&lt;!&ndash;Анимация&ndash;&gt;-->
                                            <!--<transition name="fade">-->
                                                <!--<atom-spinner-->
                                                        <!--:animation-duration="1000"-->
                                                        <!--v-show="loading"-->
                                                        <!--color="#86d2a1"-->
                                                <!--/>-->
                                            <!--</transition>-->
                                            <!--<div id="list_table-box" class="exFilter">-->
                                                <!--<transition name="fade">-->
                                                    <!--&lt;!&ndash;Таблица bootstrap&ndash;&gt;-->
                                                    <!--<b-table :sort-by="sortBy"-->
                                                             <!--:sort-desc="false"-->
                                                             <!--:ref="block.block_model"-->
                                                             <!--show-empty-->
                                                             <!--responsive-->
                                                             <!--:items="listItems[block.block_model]"-->
                                                             <!--stacked="md"-->
                                                             <!--v-model="tableValues[block.block_model]"-->
                                                             <!--:filter="block.filter"-->
                                                             <!--thead-tr-class="resizable"-->
                                                             <!--class="list_table"-->
                                                             <!--:id="'list_table_'+block.block_model"-->
                                                             <!--tbody-class="carousel"-->
                                                             <!--thead-class="swiper-head"-->
                                                             <!--:data-model="block.block_model"-->
                                                             <!--:fields="fields[block.block_model]">-->

                                                        <!--<template :slot="'HEAD_'+fielde.key"-->
                                                                  <!--v-for="fielde in block.block_fields"-->
                                                                  <!--slot-scope="head">-->
                                                            <!--<div class="table__thead__overflow clip">{{head.label}}-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для фильтров&ndash;&gt;-->
                                                        <!--<template :slot="'HEAD_'+field.key"-->
                                                                  <!--v-for="field in exFilterData[block.block_model]"-->
                                                                  <!--slot-scope="head">-->
                                                            <!--<div class="dropdown">-->
                                                                <!--<button class="btn btn-dropdown"-->
                                                                        <!--@click.stop="filterOpen($event,block.block_model)">-->
                                                                    <!--&lt;!&ndash;&gt;>>>>>> 7b09fa420cb739d01e281148ef5fc486971813d0&ndash;&gt;-->
                                                                    <!--&lt;!&ndash;<input type="text"&ndash;&gt;-->
                                                                    <!--&lt;!&ndash;@input="exFilterSelectList(field.key,$event.target.value)"&ndash;&gt;-->
                                                                    <!--&lt;!&ndash;&gt;&ndash;&gt;-->
                                                                    <!--{{field.label}}-->
                                                                <!--</button>  &lt;!&ndash; dropdown &ndash;&gt;-->
                                                                <!--<img class="drop-i" src="/img/dropdown-i.png" alt="">-->
                                                                <!--<transition name="fade">-->
                                                                    <!--<div class="dropdown_box dropdown_box_select exFilterDropdown">-->
                                                                        <!--<div class="exFilterSorts">-->

                                                                            <!--<button @click="sortingChanged({sortBy: field.key,sortDesc: false},block.block_model)"-->
                                                                                    <!--class="dropwond_link">-->
                                                                                <!--Сортировать A → Я-->
                                                                            <!--</button>-->
                                                                            <!--<button @click="sortingChanged({sortBy: field.key,sortDesc: true},block.block_model)"-->
                                                                                    <!--class="dropwond_link">-->
                                                                                <!--Сортировать Я → А-->
                                                                            <!--</button>-->
                                                                        <!--</div>-->
                                                                        <!--<div class="exFilterСondition active exFilterBox"-->
                                                                             <!--v-if="exFilters">-->
                                                                            <!--<div class="exFilterHead"-->
                                                                                 <!--@click.stop="$event.target.parentNode.parentNode.classList.toggle('active')">-->
                                                                                <!--<p>Фильтр по условию...</p>-->
                                                                            <!--</div>-->
                                                                            <!--<div class="exFilterBody">-->
                                                                                <!--<ul :class="field.key">-->

                                                                                    <!--<li v-for="option in exFilters"-->
                                                                                        <!--:class="{'selected':field.condition.value === option.key}">-->
                                                                                        <!--<button @click="exFilterCondition(option.key,field.key,option.dependent,option,'',block.block_model)"-->
                                                                                                <!--class="dropwond_link">-->
                                                                                            <!--{{option.label}}-->
                                                                                        <!--</button>-->
                                                                                        <!--<template-->
                                                                                                <!--v-if="option.showDependent">-->
                                                                                            <!--<input type="text"-->
                                                                                                   <!--:placeholder="option.placeholder"-->
                                                                                                   <!--@input="exFilterCondition(option.key,field.key,false,option,$event.target.value,block.block_model)"-->
                                                                                                   <!--v-if="option.typeDependent === 'text'">-->
                                                                                            <!--<template-->
                                                                                                    <!--v-if="option.typeDependent === 'range'">-->
                                                                                                <!--<form>-->
                                                                                                    <!--<input type="text"-->
                                                                                                           <!--:placeholder="option.placeholder[0]"-->
                                                                                                           <!--@input="exFilterCondition(option.key,field.key,false,option,$event.target,block.block_model)">-->
                                                                                                    <!--<input type="text"-->
                                                                                                           <!--:placeholder="option.placeholder[1]"-->
                                                                                                           <!--@input="exFilterCondition(option.key,field.key,false,option,$event.target,block.block_model)">-->
                                                                                                <!--</form>-->
                                                                                            <!--</template>-->
                                                                                            <!--<datepicker-->
                                                                                                    <!--v-if="option.typeDependent === 'date'"-->
                                                                                                    <!--:format="'dd-MM-yyyy'"-->
                                                                                                    <!--v-model="exFiltersDate"-->
                                                                                                    <!--:placeholder="option.placeholder"-->
                                                                                                    <!--@input="exFilterCondition(option.key,field.key,false,option,exFiltersDate,block.block_model)"-->
                                                                                            <!--&gt;</datepicker>-->
                                                                                        <!--</template>-->
                                                                                    <!--</li>-->
                                                                                <!--</ul>-->
                                                                            <!--</div>-->
                                                                        <!--</div>-->
                                                                        <!--<div class="exFilterValue active exFilterBox">-->
                                                                            <!--<div class="exFilterHead"-->
                                                                                 <!--@click.stop="$event.target.parentNode.parentNode.classList.toggle('active')">-->
                                                                                <!--<p>Фильтр по значению...</p>-->
                                                                            <!--</div>-->
                                                                            <!--<div class="exFilterBody active">-->
                                                                                <!--<ul :class="field.key">-->

                                                                                    <!--&lt;!&ndash;{{field.items}}&ndash;&gt;-->
                                                                                    <!--<li v-for="option in field.items"-->
                                                                                        <!--:class="{'selected':!field.rules.includes(option.value)}"-->
                                                                                        <!--v-if="typeof(option.value) !== 'undefined'">-->
                                                                                        <!--<button @click="exFilterList(option.value,field.key,block.block_model)"-->
                                                                                                <!--class="dropwond_link"-->
                                                                                        <!--&gt;-->
                                                                                            <!--<span v-if="option.value !== null && option.value !== ''">{{option.value}}</span>-->
                                                                                            <!--<span v-else>(Пустые)</span>-->
                                                                                        <!--</button>-->
                                                                                    <!--</li>-->
                                                                                <!--</ul>-->
                                                                            <!--</div>-->
                                                                        <!--</div>-->
                                                                    <!--</div>-->
                                                                <!--</transition>-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для выбора всех элемента&ndash;&gt;-->
                                                        <!--<template slot="HEAD_actions" slot-scope="head">-->
                                                            <!--<div class="list_checkbox checkbox checkbox-all"-->
                                                                 <!--:class="{active: allSelected[block.block_model]}"-->
                                                                 <!--@click.stop="toggleSelected(block.block_model)">-->
                                                                <!--<span class="checkbox-custom"><i-->
                                                                        <!--class="fa fa-check"></i></span>-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для формата отчёта&ndash;&gt;-->
                                                        <!--<template slot="report_format" slot-scope="data">-->
                                                            <!--<img :src="'/img/'+data.value+'.png'" alt="">-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для периода отчёта&ndash;&gt;-->
                                                        <!--<template slot="report_start_date" slot-scope="items">-->
                                                            <!--<p>{{items.item.report_start_date}}</p>-->
                                                            <!--<p>{{items.item.report_end_date}}</p>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для статуса отчёта&ndash;&gt;-->
                                                        <!--<template slot="report_status" slot-scope="items">-->
                                                <!--<span :class="{'red':items.item.report_status=='is formed' , 'green':items.item.report_status!='is formed'}">-->
                                            <!--<span v-if="items.item.report_status == 'is formed' && $store.getters.getLang == 'en'">is formed</span>-->
                                            <!--<span v-if="items.item.report_status == 'is formed' && $store.getters.getLang == 'ru'">ФОРМИРУЕТСЯ</span>-->
                                            <!--<span v-if="items.item.report_status == 'сreated' && $store.getters.getLang == 'en'">created</span>-->
                                            <!--<span v-if="items.item.report_status == 'сreated' && $store.getters.getLang == 'ru'">Создан</span>-->
                                             <!--</span>-->
                                                        <!--</template>-->

                                                        <!--&lt;!&ndash;Слот для отображение disable checkbox&ndash;&gt;-->
                                                        <!--<template slot="individual_l" slot-scope="items">-->
                                                            <!--<div class="list_checkbox checkbox checkbox-all"-->
                                                                 <!--@click.stop>-->
                                                                <!--<label>-->
                                                                    <!--<input type="checkbox" :id="items.item.id"-->
                                                                           <!--:checked="items.item.individual_l" disabled>-->
                                                                    <!--<span class="checkbox-custom"><i-->
                                                                            <!--class="fa fa-check"></i></span>-->
                                                                <!--</label>-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для отображение disable checkbox&ndash;&gt;-->
                                                        <!--<template slot="actual_l" slot-scope="items">-->
                                                            <!--<div class="list_checkbox checkbox checkbox-all"-->
                                                                 <!--@click.stop>-->
                                                                <!--<label>-->
                                                                    <!--<input type="checkbox" :id="items.item.id"-->
                                                                           <!--:checked="items.item.individual_l" disabled>-->
                                                                    <!--<span class="checkbox-custom"><i-->
                                                                            <!--class="fa fa-check"></i></span>-->
                                                                <!--</label>-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Форматирование даты для отчётов&ndash;&gt;-->
                                                        <!--<template slot="created_at" slot-scope="items">-->
                                                            <!--<span class="hidden">{{items.item.created_at_format}}</span>-->
                                                            <!--<p>{{items.item.created_at}}</p>-->
                                                        <!--</template>-->

                                                        <!--<template v-for="field in block.block_fields" :slot="field.key"-->
                                                                  <!--slot-scope="items">-->

                                                            <!--<div v-if=" field.type=='text'" class="text-input-container"-->
                                                                 <!--:style="{'position': 'relative', 'background-color':items.item[field.key].color}">-->
                                                                <!--<input-->
                                                                        <!--type="text"-->
                                                                        <!--v-model="items.item[field.key].value"-->
                                                                        <!--:name="items.item[field.key].input_name"-->
                                                                        <!--:class="{'invalid':fieldsVV[items.item[field.key].input_name]&&fieldsVV[items.item[field.key].input_name].invalid&&fieldsVV[items.item[field.key].input_name].touched && items.item[field.key].validation}"-->

                                                                <!--&gt;-->

                                                                <!--<div v-if="fieldsVV[items.item[field.key].input_name]&&fieldsVV[items.item[field.key].input_name].invalid&&fieldsVV[items.item[field.key].input_name].touched && items.item[field.key].validation"-->
                                                                     <!--class="vv-error-box">-->
                                                                    <!--<span class="vv-error">{{ errors.first('' + items.item[field.key].input_name)}}</span>-->
                                                                <!--</div>-->

                                                            <!--</div>-->

                                                            <!--<div v-else-if=" field.type=='lt-select'" class="dropdown"-->
                                                                 <!--@click="checkPosition">-->
                                                                <!--<button class="btn btn-dropdown dropdown-table"-->
                                                                        <!--@click="dropdownClick ">-->
                                                                    <!--<input type="text"-->
                                                                           <!--v-model="items.item[field.key].options_data.search"-->
                                                                           <!--class="dropwond_link filterSelect"-->
                                                                           <!--@input="selectSearch(items.item[field.key])"-->
                                                                           <!--@keypress="dropDownKeyPress"-->
                                                                           <!--@keyup="dropDownArrows($event,items.item[field.key])"-->

                                                                    <!--&gt;-->


                                                                    <!--&lt;!&ndash;{{items.value}}&ndash;&gt;-->
                                                                    <!--<img class="drop-i btn-dropdown"-->
                                                                         <!--src="/img/dropdown-i.png" alt="">-->
                                                                <!--</button>  &lt;!&ndash; dropdown &ndash;&gt;-->
                                                                <!--<transition name="fade">-->
                                                                    <!--<div class="dropdown_box dropdown_box_select">-->
                                                                        <!--<ul>-->
                                                                            <!--<li v-for="(option, index) in items.item[field.key].options"-->
                                                                                <!--:data-select="index"-->
                                                                                <!--:class="{'li-selected':index==currentOption}"-->
                                                                            <!--&gt;-->
                                                                                <!--<button @click="chooseSelectItem(option,items.item, field.key)"-->
                                                                                        <!--@mouseover="hoverSelectItem"-->
                                                                                        <!--class="dropwond_link">-->
                                                                                    <!--{{option[items.item[field.key].options_data.options_field_title]}}-->
                                                                                <!--</button>-->
                                                                            <!--</li>-->
                                                                        <!--</ul>-->
                                                                    <!--</div>-->
                                                                <!--</transition>-->
                                                            <!--</div>-->

                                                            <!--<div v-else-if=" field.type=='button'"-->
                                                                 <!--:class="{-->
                                                                    <!--'btn-container':true,-->
                                                                    <!--'invalid':fieldsVV[items.item[field.key].input_name]&&-->
                                                                    <!--fieldsVV[items.item[field.key].input_name].invalid&&-->
                                                                    <!--fieldsVV[items.item[field.key].input_name].touched &&-->
                                                                    <!--items.item[field.key].validation-->
                                                                    <!--}"-->
                                                                 <!--:style="{'background-color':items.item[field.key].color}"-->
                                                            <!--&gt;-->
                                                                <!--<label class="btn btn-green"-->
                                                                       <!--:for="items.item[field.key].input_name">{{items.item[field.key].title}}-->

                                                                <!--</label>-->

                                                                <!--<p v-if="items.item[field.key].action_type=='load_file'">-->
                                                                    <!--{{items.item[field.key].name}}-->
                                                                <!--</p>-->

                                                                <!--<img v-if="items.item[field.key].value"-->
                                                                     <!--src="/img/staple.png" alt="">-->

                                                                <!--<input :name="items.item[field.key].input_name"-->
                                                                       <!--:id="items.item[field.key].input_name"-->
                                                                       <!--v-if="items.item[field.key].action_type=='load_file'"-->
                                                                       <!--type="file"-->
                                                                       <!--v-validate="items.item[field.key].validation"-->
                                                                       <!--@change="photoLoad(items.item,field.key, $event,block.block_model)">-->

                                                                <!--<div class="vv-error-box" v-if="(fieldsVV[items.item[field.key].input_name]&&-->
                                                                                              <!--fieldsVV[items.item[field.key].input_name].invalid&&-->
                                                                                              <!--fieldsVV[items.item[field.key].input_name].touched &&-->
                                                                                              <!--items.item[field.key].validation)-->
                                                                                                                                                    <!--">-->
                                                                    <!--<span class="vv-error">{{ errors.first('' + items.item[field.key].input_name) || serverErrors.first(items.item[field.key].input_name)}}</span>-->
                                                                <!--</div>-->
                                                            <!--</div>-->

                                                            <!--<div v-else-if="field.type=='label'"-->
                                                                 <!--class="parag-wrapper"-->
                                                                 <!--:style="{'background-color':items.item[field.key].color}">-->
                                                                <!--<p>-->
                                                                    <!--{{items.item[field.key].value}}-->
                                                                <!--</p>-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для выбора одного элемента&ndash;&gt;-->
                                                        <!--<template slot="actions" slot-scope="items">-->
                                                            <!--<div class="list_checkbox checkbox checkbox-all"-->
                                                                 <!--@click.stop>-->
                                                                <!--<label :for="items.item.id">-->
                                                                    <!--<input type="checkbox"-->
                                                                           <!--:id="items.item.id"-->
                                                                           <!--:key="items.index"-->
                                                                           <!--v-model="checkedItems[block.block_model]"-->
                                                                           <!--:value="items.item.id">-->
                                                                    <!--<span class="checkbox-custom"><i-->
                                                                            <!--class="fa fa-check"></i></span>-->
                                                                <!--</label>-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот действий элемента&ndash;&gt;-->
                                                        <!--<template slot="list_actions" slot-scope="items" @click.stop>-->

                                                            <!--<div class="list_actions-box" @click.stop>-->
                                                                <!--&lt;!&ndash;Просмотр отчёта&ndash;&gt;-->

                                                                <!--<template v-for="action in block.block_actions">-->

                                                                    <!--<div v-if="action.action_code=='view'"-->
                                                                         <!--class="list_action-btn"-->
                                                                         <!--@click.stop>-->
                                                                        <!--<button :class="{showModal:true, active:items.item.document.value}"-->
                                                                                <!--@click="photoPreview(items.item.document.value, items.item.doc_ext.value)">-->
                                                                            <!--<img src="/img/info.svg" class="svg" alt="">-->
                                                                        <!--</button>-->
                                                                    <!--</div>-->
                                                                    <!--&lt;!&ndash;Скачать отчёт&ndash;&gt;-->
                                                                    <!--<div v-if="action.action_code=='download'"-->
                                                                         <!--class="list_action-btn"-->
                                                                         <!--@click.stop>-->
                                                                        <!--<a v-if="items.item.document.value!=''" download-->
                                                                           <!--:href="items.item.document.value">-->
                                                                            <!--<img src="/img/download.svg" class="svg"-->
                                                                                 <!--alt="">-->
                                                                        <!--</a>-->
                                                                        <!--<a v-else class="disabled">-->
                                                                            <!--<img src="/img/download.svg" class="svg"-->
                                                                                 <!--alt="">-->
                                                                        <!--</a>-->
                                                                    <!--</div>-->
                                                                    <!--&lt;!&ndash;Удалить отчёт&ndash;&gt;-->
                                                                    <!--<div class="list_action-btn"-->
                                                                         <!--v-if="action.action_code=='delete'"-->
                                                                         <!--@click.stop>-->
                                                                        <!--<button @click="removeDocument(items.item,block.block_model)">-->
                                                                            <!--<img src="/img/remove.svg" class="svg"-->
                                                                                 <!--alt="">-->
                                                                        <!--</button>-->
                                                                    <!--</div>-->
                                                                <!--</template>-->
                                                            <!--</div>-->
                                                        <!--</template>-->


                                                    <!--</b-table>-->
                                                <!--</transition>-->
                                            <!--</div>-->

                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->


                        <!--</div>-->

                    <!--</div>-->

                    <!--<div class="right-sector" v-if="tab.sectors_quantity==2">-->

                        <!--<div :class="{'block':true, 'full-width':tab.blocks_quantity==1, 'left-side':block.column[0]>2}"-->
                             <!--v-for="(block, index) in tab.blocks" :key="block.block_model"-->
                             <!--:style="{'grid-column':block.column, 'grid-row':block.row}"-->
                             <!--v-if="block.sector=='right'"-->
                        <!--&gt; &lt;!&ndash;Перебираем блоки &ndash;&gt;-->

                            <!--&lt;!&ndash;Dependency todo перенести из блока наверх таба &ndash;&gt;-->
                            <!--<div class="row d-flex justify-content-between">-->
                                <!--&lt;!&ndash;Элементы пагинации&ndash;&gt;-->
                                <!--&lt;!&ndash;<div class="counter_list col hidden-md-down">&ndash;&gt;-->
                                <!--&lt;!&ndash;<p>{{textLang[0]}} <b>{{countOf}}-{{countTo}}</b> {{textLang[1]}} <b>{{totalRows}}</b></p>&ndash;&gt;-->
                                <!--&lt;!&ndash;<b-form-select :options="pageOptions"  name="count" v-model="perPage" id="count"/>&ndash;&gt;-->
                                <!--&lt;!&ndash;<p>{{textLang[2]}}</p>&ndash;&gt;-->
                                <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                <!--&lt;!&ndash;Зависимый dropdown&ndash;&gt;-->
                                <!--<div v-if="form_parameters.form_is_dependent"-->
                                     <!--class="col-xl-4 col-lg-5 col-md-6 d-flex align-items-end">-->
                                    <!--<div class="list_items">-->
                                        <!--<span>{{response.dependent.dependent_fields.title}}</span>-->
                                        <!--<div class="dropdown" :class="{active: listItemsS}"-->
                                             <!--v-if="response.dependent.dependent_fields.type == 'select'">-->
                                            <!--<button class="btn btn-dropdown">{{listItemsText}}<img class="drop-i"-->
                                                                                                   <!--src="/img/dropdown-i.png"-->
                                                                                                   <!--alt=""></button>-->
                                            <!--&lt;!&ndash; dropdown &ndash;&gt;-->
                                            <!--<transition name="fade">-->
                                                <!--<div class="dropdown_box">-->
                                                    <!--<ul>-->
                                                        <!--&lt;!&ndash;Поиск по элементам dropdown&ndash;&gt;-->
                                                        <!--<li>-->
                                                            <!--<input type="text" v-model="filterSelect"-->
                                                                   <!--class="dropwond_link filterSelect">-->
                                                        <!--</li>-->
                                                        <!--&lt;!&ndash;Дефолтное значение&ndash;&gt;-->
                                                        <!--<li :class="{selected:defaultSelectId == ''}">-->
                                                            <!--<button class="dropwond_link"-->
                                                                    <!--@click="filterList('',dependent.searchFilterVal,'select')">-->
                                                                <!--All-->
                                                            <!--</button>-->
                                                        <!--</li>-->
                                                        <!--&lt;!&ndash;Перебор элементов&ndash;&gt;-->
                                                        <!--<li v-for="item in filteredList(listItemsAll,dependent.searchFilterVal)"-->
                                                            <!--:class="{selected:defaultSelectId == item['id']}">-->
                                                            <!--<button @click="filterList(item[dependent.searchFilterVal],dependent.searchFilterVal,'select')"-->
                                                                    <!--class="dropwond_link">-->
                                                                <!--{{item[dependent.searchFilterVal]}}-->
                                                            <!--</button>-->
                                                        <!--</li>-->
                                                    <!--</ul>-->
                                                <!--</div>-->
                                            <!--</transition>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->


                            <!--<div class="card-row" v-if="block.block_type=='block_card'">-->
                                <!--<div class="row contractor_box d-flex align-items-start">-->

                                    <!--<div :class="{'left-zone':true, 'full-width':block.block_zone_quantity==1}">-->
                                        <!--&lt;!&ndash;если количество зон == 1, выводим только левую  &ndash;&gt;-->
                                        <!--<div v-for="(item,index) in block.block_fields"-->
                                             <!--v-if="item.zone==1"-->
                                             <!--:class="{-->
                                                 <!--'col-md-16':item.width=='100%',-->
                                                 <!--'col-md-12':item.width=='75%',-->
                                                 <!--'col-md-8':item.width=='50%',-->
                                                 <!--'col-md-4':item.width=='25%',-->
                                                 <!--'col10':item.width=='10%',-->
                                                 <!--'col20':item.width=='20%',-->
                                                 <!--'col30':item.width=='30%',-->
                                                 <!--'col33':item.width=='33%',-->
                                                 <!--'col40':item.width=='40%',-->
                                                 <!--'col60':item.width=='60%',-->
                                                 <!--'col70':item.width=='70%',-->
                                                 <!--'col80':item.width=='80%',-->
                                                 <!--'col90':item.width=='90%',-->
                                                 <!--'border-right':item.border_right,-->
                                             <!--}"-->
                                             <!--:style="{'order':item.order}"-->

                                        <!--&gt;-->
                                            <!--&lt;!&ndash; Выставляем ширину колонки в зависимости от параметра &ndash;&gt;-->

                                            <!--<div :class="{'field-box':true, 'hidden':item.hidden}">-->

                                                <!--<label :class="{'label-green': item.type=='title'}">{{item.type == 'checkbox' ? "" : item.title}}</label>-->

                                                <!--<div style="position: relative;">-->
                                                    <!--<input v-validate="item.validation"-->
                                                           <!--v-if="item.type=='text'"-->
                                                           <!--:type="item.type"-->
                                                           <!--:name="item.model"-->
                                                           <!--v-model="models[block.block_model][0][item.model]"-->
                                                           <!--@input="modelChangeHandler"-->
                                                           <!--:class="{'valid':fieldsVV[item.model]&&fieldsVV[item.model].valid&&fieldsVV[item.model].touched && item.validation, 'invalid':fieldsVV[item.model]&&fieldsVV[item.model].invalid&&fieldsVV[item.model].touched && item.validation}"-->
                                                    <!--&gt;-->
                                                    <!--<svg class="svg-invalid" width="16" height="16" viewBox="0 0 16 16">-->
                                                        <!--<path id="Forma_1"-->
                                                              <!--d="M1284,590a8,8,0,1,0,8,8A8,8,0,0,0,1284,590Zm4,10.868L1286.87,602l-2.87-2.868L1281.13,602l-1.13-1.132,2.87-2.868-2.87-2.868,1.13-1.132,2.87,2.868,2.87-2.868,1.13,1.132L1285.13,598Z"-->
                                                              <!--transform="translate(-1276 -590)"/>-->
                                                    <!--</svg>-->
                                                    <!--<svg class="svg-valid" width="16" height="16" viewBox="0 0 16 16">-->
                                                        <!--<path id="Forma_1"-->
                                                              <!--d="M1284,494a8,8,0,1,0,8,8A8.01,8.01,0,0,0,1284,494Zm4.46,5.332-4.92,5.538a0.61,0.61,0,0,1-.46.207,0.631,0.631,0,0,1-.39-0.135l-3.07-2.461a0.613,0.613,0,1,1,.76-0.962l2.62,2.1,4.54-5.1A0.616,0.616,0,1,1,1288.46,499.332Z"-->
                                                              <!--transform="translate(-1276 -494)"/>-->
                                                    <!--</svg>-->
                                                <!--</div>-->


                                                <!--<select v-if="item.type=='select'" :name="item.model"-->
                                                        <!--v-model="models[block.block_model][0][item.model]"-->
                                                        <!--@change="modelChangeHandler"-->
                                                <!--&gt;-->
                                                    <!--<option v-if="item.model=='db_area_id'" value="">Открепить</option>-->
                                                    <!--<option value="">1ewf</option>-->
                                                    <!--<option value="">2ewfwe</option>-->
                                                    <!--<option v-if="item.model=='country_id'" v-for="opt in item.options"-->
                                                            <!--:value="opt.id">{{opt.country_name}}-->
                                                    <!--</option>-->
                                                    <!--<option v-if="item.model=='db_area_id'" v-for="opt in item.options"-->
                                                            <!--:value="opt.id">{{opt.db_area_code}}-->
                                                    <!--</option>-->
                                                <!--</select>-->

                                                <!--<div v-if="item.type=='lt-select'" class="dropdown">-->
                                                    <!--<button class="btn btn-dropdown " @click="dropdownClick ">-->
                                                        <!--<input type="text" v-model="item.options_data.search"-->
                                                               <!--class="dropwond_link filterSelect"-->
                                                               <!--@input="selectSearch(item)"-->
                                                               <!--@keypress="dropDownKeyPress"-->
                                                               <!--@keyup="dropDownArrows($event,item,  models[block.block_model][0])">-->
                                                        <!--{{item.value}}-->
                                                        <!--<img class="drop-i btn-dropdown" src="/img/dropdown-i.png"-->
                                                             <!--alt="">-->
                                                    <!--</button>  &lt;!&ndash; dropdown &ndash;&gt;-->
                                                    <!--<transition name="fade">-->
                                                        <!--<div class="dropdown_box dropdown_box_select">-->
                                                            <!--<ul>-->

                                                                <!--<li v-for="(option, index) in item.options"-->
                                                                    <!--:data-select="index"-->
                                                                    <!--:class="{'li-selected':index==currentOption}"-->
                                                                <!--&gt;-->
                                                                    <!--<button @click="chooseSelectItemCard(item, option, models[block.block_model][0])"-->
                                                                            <!--@mouseover="hoverSelectItem"-->
                                                                            <!--class="dropwond_link">-->
                                                                        <!--{{option[item.options_data.options_field_title]}}-->
                                                                    <!--</button>-->
                                                                <!--</li>-->
                                                            <!--</ul>-->
                                                        <!--</div>-->
                                                    <!--</transition>-->
                                                <!--</div>-->

                                                <!--<div class="contractor_checkbox checkbox "-->
                                                     <!--:class="{'checkbox-disabled':item.disabled}"-->
                                                     <!--v-if="item.type=='checkbox'">-->
                                                    <!--<label :for="item.model">-->
                                                        <!--&lt;!&ndash;@change="checkboxChange"&ndash;&gt;-->
                                                        <!--<input :disabled=item.disabled :name="item.model"-->
                                                               <!--type="checkbox"-->
                                                               <!--:id="item.model"-->

                                                               <!--v-model="models[block.block_model][0][item.model]">-->
                                                        <!--<span class="checkbox-custom"><i class="fa fa-check"></i></span>-->
                                                        <!--<span> {{item.title}}</span>-->
                                                    <!--</label>-->
                                                <!--</div>-->

                                                <!--<div class="contractor_parag" v-if="item.type=='label'">-->
                                                    <!--<p>{{models[block.block_model][0][item.model]}}</p>-->
                                                <!--</div>-->

                                                <!--<datepicker v-if="item.type=='date'"-->
                                                            <!--:language="datapicker_translations.en"-->
                                                            <!--:format="'dd/MM/yyyy'"-->
                                                            <!--v-model="models[block.block_model][0][item.model]"-->
                                                            <!--@input="modelChangeHandler"-->
                                                <!--&gt;</datepicker>-->

                                                <!--<div v-if="item.type=='double-date'" class="double-datepicker">-->
                                                    <!--<datepicker :language="datapicker_translations.en"-->
                                                                <!--:format="'dd/MM/yyyy'"-->
                                                                <!--v-model="models[block.block_model][0][item.model]['from']"-->
                                                                <!--@input="modelChangeHandler"-->
                                                    <!--&gt;</datepicker>-->

                                                    <!--<datepicker :language="datapicker_translations.en"-->
                                                                <!--:format="'dd/MM/yyyy'"-->
                                                                <!--v-model="models[block.block_model][0][item.model]['to']"-->
                                                                <!--@input="modelChangeHandler"-->
                                                    <!--&gt;</datepicker>-->
                                                <!--</div>-->

                                                <!--<span class="vv-error">{{ errors.first('' + item.model) || serverErrors.first(item.model)-->
                                                    <!--}}</span>-->
                                            <!--</div>-->

                                        <!--</div>-->

                                    <!--</div>-->

                                    <!--<div v-if="block.block_zone_quantity==2" class="right-zone">-->
                                        <!--&lt;!&ndash;Если количество зон==2 показываем и вторую &ndash;&gt;-->

                                        <!--<div v-for="(item,index) in block.block_fields"-->
                                             <!--v-if="item.zone==2"-->
                                             <!--:class="{-->

                                                <!--'col-md-16':item.width=='100%',-->
                                                 <!--'col-md-12':item.width=='75%',-->
                                                 <!--'col-md-8':item.width=='50%',-->
                                                 <!--'col-md-4':item.width=='25%',-->
                                                 <!--'col10':item.width=='10%',-->
                                                 <!--'col20':item.width=='20%',-->
                                                 <!--'col30':item.width=='30%',-->
                                                 <!--'col33':item.width=='33%',-->
                                                 <!--'col40':item.width=='40%',-->
                                                 <!--'col60':item.width=='60%',-->
                                                 <!--'col70':item.width=='70%',-->
                                                 <!--'col80':item.width=='80%',-->
                                                 <!--'col90':item.width=='90%',-->
                                                 <!--'border-right':item.border_right,-->
                                             <!--}"-->
                                             <!--:style="{'order':item.order}"-->
                                        <!--&gt;-->
                                            <!--&lt;!&ndash; Выставляем ширину колонки в зависимости от параметра &ndash;&gt;-->

                                            <!--<div :class="{'field-box':true, 'hidden':item.hidden}">-->

                                                <!--<label :class="{'label-green': item.type=='title'}">{{item.type == 'checkbox' ? "" : item.title}}</label>-->

                                                <!--<div v-if="item.type=='text'" style="position: relative;">-->
                                                    <!--<input v-validate="item.validation"-->
                                                           <!--:type="item.type"-->
                                                           <!--:name="item.model"-->
                                                           <!--v-model="models[block.block_model][0][item.model]"-->
                                                           <!--@input="modelChangeHandler"-->
                                                           <!--:class="{'valid':fieldsVV[item.model]&&fieldsVV[item.model].valid&&fieldsVV[item.model].touched&&item.validation, 'invalid':fieldsVV[item.model]&&fieldsVV[item.model].invalid&&fieldsVV[item.model].touched && item.validation}"-->
                                                    <!--&gt;-->
                                                    <!--<svg class="svg-invalid" width="16" height="16" viewBox="0 0 16 16">-->
                                                        <!--<path id="Forma_1"-->
                                                              <!--d="M1284,590a8,8,0,1,0,8,8A8,8,0,0,0,1284,590Zm4,10.868L1286.87,602l-2.87-2.868L1281.13,602l-1.13-1.132,2.87-2.868-2.87-2.868,1.13-1.132,2.87,2.868,2.87-2.868,1.13,1.132L1285.13,598Z"-->
                                                              <!--transform="translate(-1276 -590)"/>-->
                                                    <!--</svg>-->
                                                    <!--<svg class="svg-valid" width="16" height="16" viewBox="0 0 16 16">-->
                                                        <!--<path id="Forma_1"-->
                                                              <!--d="M1284,494a8,8,0,1,0,8,8A8.01,8.01,0,0,0,1284,494Zm4.46,5.332-4.92,5.538a0.61,0.61,0,0,1-.46.207,0.631,0.631,0,0,1-.39-0.135l-3.07-2.461a0.613,0.613,0,1,1,.76-0.962l2.62,2.1,4.54-5.1A0.616,0.616,0,1,1,1288.46,499.332Z"-->
                                                              <!--transform="translate(-1276 -494)"/>-->
                                                    <!--</svg>-->
                                                <!--</div>-->

                                                <!--&lt;!&ndash;<input v-if="item.type=='text'" :type="item.type" :name="item.model"&ndash;&gt;-->
                                                <!--&lt;!&ndash;v-model="models[block.block_model][0][item.model]">&ndash;&gt;-->

                                                <!--<select v-if="item.type=='select'" :name="item.model"-->
                                                        <!--v-model="models[block.block_model][0][item.model]"-->
                                                        <!--@change="modelChangeHandler"-->
                                                <!--&gt;-->
                                                    <!--<option v-if="item.model=='db_area_id'" value="">Открепить</option>-->
                                                    <!--<option v-if="item.model=='country_id'" v-for="opt in item.options"-->
                                                            <!--:value="opt.id">{{opt.country_name}}-->
                                                    <!--</option>-->
                                                    <!--<option v-if="item.model=='db_area_id'" v-for="opt in item.options"-->
                                                            <!--:value="opt.id">{{opt.db_area_code}}-->
                                                    <!--</option>-->
                                                <!--</select>-->

                                                <!--<div v-if="item.type=='lt-select'" class="dropdown">-->
                                                    <!--<button class="btn btn-dropdown " @click="dropdownClick ">-->
                                                        <!--<input type="text" v-model="item.options_data.search"-->
                                                               <!--class="dropwond_link filterSelect"-->
                                                               <!--@input="selectSearch(item)"-->
                                                               <!--@keypress="dropDownKeyPress"-->
                                                               <!--@keyup="dropDownArrows($event,item,  models[block.block_model][0])">-->
                                                        <!--{{item.value}}-->
                                                        <!--<img class="drop-i btn-dropdown" src="/img/dropdown-i.png"-->
                                                             <!--alt="">-->
                                                    <!--</button>  &lt;!&ndash; dropdown &ndash;&gt;-->
                                                    <!--<transition name="fade">-->
                                                        <!--<div class="dropdown_box dropdown_box_select">-->
                                                            <!--<ul>-->

                                                                <!--<li v-for="(option, index) in item.options"-->
                                                                    <!--:data-select="index"-->
                                                                    <!--:class="{'li-selected':index==currentOption}"-->
                                                                <!--&gt;-->
                                                                    <!--<button @click="chooseSelectItemCard(item, option, models[block.block_model][0])"-->
                                                                            <!--@mouseover="hoverSelectItem"-->
                                                                            <!--class="dropwond_link">-->
                                                                        <!--{{option[item.options_data.options_field_title]}}-->
                                                                    <!--</button>-->
                                                                <!--</li>-->
                                                            <!--</ul>-->
                                                        <!--</div>-->
                                                    <!--</transition>-->
                                                <!--</div>-->

                                                <!--<div class="contractor_checkbox checkbox"-->
                                                     <!--:class="{'checkbox-disabled':item.disabled}"-->
                                                     <!--v-if="item.type=='checkbox'">-->
                                                    <!--<label :for="item.model">-->
                                                        <!--&lt;!&ndash;@change="checkboxChange"&ndash;&gt;-->
                                                        <!--<input :name="item.model" :disabled=item.disabled-->
                                                               <!--type="checkbox"-->
                                                               <!--:id="item.model"-->

                                                               <!--v-model="models[block.block_model][0][item.model]">-->
                                                        <!--<span class="checkbox-custom"><i class="fa fa-check"></i></span>-->
                                                        <!--<span> {{item.title}}</span>-->
                                                    <!--</label>-->
                                                <!--</div>-->

                                                <!--<div class="contractor_parag" v-if="item.type=='label'">-->
                                                    <!--<p>{{models[block.block_model][0][item.model]}}</p>-->
                                                <!--</div>-->

                                                <!--<datepicker v-if="item.type=='date'"-->
                                                            <!--:language="datapicker_translations.ru"-->
                                                            <!--:format="'dd/MM/yyyy'"-->
                                                            <!--v-model="models[block.block_model][0][item.model]"-->
                                                            <!--@input="modelChangeHandler"-->
                                                <!--&gt;</datepicker>-->



                                                <!--<span class="vv-error">{{ errors.first('' + item.model) }}</span>-->
                                            <!--</div>-->

                                        <!--</div>-->

                                    <!--</div>-->


                                <!--</div>-->
                            <!--</div>-->

                            <!--<div class="list-row" v-if="block.block_type=='block_list_base'">-->
                                <!--&lt;!&ndash; todo уточнить поиск и фильтрацию&ndash;&gt;-->
                                <!--<div class="row align-items-center margin-top-2">-->

                                    <!--&lt;!&ndash;Элементы пагинации для телефона&ndash;&gt;-->
                                    <!--<div class="col-8 hidden-md-up order-1">-->
                                        <!--<div class="counter_list-m counter_list">-->
                                            <!--<p>{{translateList.Showing}} <b>{{countOfMobile[block.block_model]}}</b>-->
                                                <!--{{translateList.of}} <b>{{totalRows[block.block_model]}}</b>-->
                                            <!--</p>-->
                                            <!--<b-form-select :options="pageOptions" name="count" v-model="perPage"-->
                                                           <!--class="count"/>-->
                                            <!--<p>{{translateList.onThePage}}</p>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--&lt;!&ndash;Элементы управление слайдером на телефоне&ndash;&gt;-->
                                    <!--<div class="col-8 hidden-md-up order-1">-->
                                        <!--<div class="buttons-slider">-->
                                            <!--<button class="btn-slider hidden-md-up slider-left"-->
                                                    <!--@click="changeSlide('right',block.block_model)">-->
                                                <!--<img src="img/left.png" alt=""></button>-->
                                            <!--<button class="btn-slider hidden-md-up slider-right"-->
                                                    <!--@click="changeSlide('left',block.block_model)">-->
                                                <!--<img src="img/right.png" alt=""></button>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--&lt;!&ndash;Поиск по элементам по заданому полю&ndash;&gt;&lt;!&ndash;TODO&ndash;&gt;-->
                                    <!--<div class="col-xl-4 col-lg-5 col-md-6 col-16 d-flex align-items-end order-0">-->
                                        <!--<div class="search-box">-->
                                            <!--<input type="text" id="search" v-model="block.filter"-->
                                                   <!--:placeholder="translateList.Search">-->
                                            <!--<button class="search_btn"><img src="/img/Search_icon.svg" class="svg"-->
                                                                            <!--alt="">-->
                                            <!--</button>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--<div class="add-line">-->
                                        <!--<template v-for="action in block.block_actions">-->
                                            <!--<button v-if="action.action_code=='add_line'" class="btn btn-green"-->
                                                    <!--@click="addRow(block)">{{action.name}}-->
                                            <!--</button>-->

                                            <!--<button v-if="action.action_code=='delete'" class="btn btn-green">-->
                                                <!--{{action.name}}-->
                                            <!--</button>-->
                                        <!--</template>-->

                                    <!--</div>-->
                                <!--</div>-->
                                <!--&lt;!&ndash;Фильтрация beta&ndash;&gt;-->

                                <!--&lt;!&ndash;Таблица&ndash;&gt;-->
                                <!--<div class="row">-->
                                    <!--<div class="col">-->

                                        <!--<div class="list-box" id="list-box">-->
                                            <!--&lt;!&ndash;Анимация&ndash;&gt;-->
                                            <!--<transition name="fade">-->
                                                <!--<atom-spinner-->
                                                        <!--:animation-duration="1000"-->
                                                        <!--v-show="loading"-->
                                                        <!--color="#86d2a1"-->
                                                <!--/>-->
                                            <!--</transition>-->
                                            <!--<div id="list_table-box" class="exFilter">-->
                                                <!--<transition name="fade">-->
                                                    <!--&lt;!&ndash;Таблица bootstrap&ndash;&gt;-->
                                                    <!--<b-table :sort-by="sortBy"-->
                                                             <!--:sort-desc="false"-->
                                                             <!--:ref="block.block_model"-->
                                                             <!--show-empty-->
                                                             <!--responsive-->
                                                             <!--:items="listItems[block.block_model]"-->
                                                             <!--stacked="md"-->
                                                             <!--v-model="tableValues[block.block_model]"-->
                                                             <!--:filter="block.filter"-->
                                                             <!--thead-tr-class="resizable"-->
                                                             <!--class="list_table"-->
                                                             <!--:id="'list_table_'+block.block_model"-->
                                                             <!--tbody-class="carousel"-->
                                                             <!--thead-class="swiper-head"-->
                                                             <!--:data-model="block.block_model"-->
                                                             <!--:fields="fields[block.block_model]">-->

                                                        <!--<template :slot="'HEAD_'+fielde.key"-->
                                                                  <!--v-for="fielde in block.block_fields"-->
                                                                  <!--slot-scope="head">-->
                                                            <!--<div class="table__thead__overflow clip">{{head.label}}-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для фильтров&ndash;&gt;-->
                                                        <!--<template :slot="'HEAD_'+field.key"-->
                                                                  <!--v-for="field in exFilterData[block.block_model]"-->
                                                                  <!--slot-scope="head">-->
                                                            <!--<div class="dropdown">-->
                                                                <!--<button class="btn btn-dropdown"-->
                                                                        <!--@click.stop="filterOpen($event,block.block_model)">-->
                                                                    <!--&lt;!&ndash;&gt;>>>>>> 7b09fa420cb739d01e281148ef5fc486971813d0&ndash;&gt;-->
                                                                    <!--&lt;!&ndash;<input type="text"&ndash;&gt;-->
                                                                    <!--&lt;!&ndash;@input="exFilterSelectList(field.key,$event.target.value)"&ndash;&gt;-->
                                                                    <!--&lt;!&ndash;&gt;&ndash;&gt;-->
                                                                    <!--{{field.label}}-->
                                                                <!--</button>  &lt;!&ndash; dropdown &ndash;&gt;-->
                                                                <!--<img class="drop-i" src="/img/dropdown-i.png" alt="">-->
                                                                <!--<transition name="fade">-->
                                                                    <!--<div class="dropdown_box dropdown_box_select exFilterDropdown">-->
                                                                        <!--<div class="exFilterSorts">-->

                                                                            <!--<button @click="sortingChanged({sortBy: field.key,sortDesc: false},block.block_model)"-->
                                                                                    <!--class="dropwond_link">-->
                                                                                <!--Сортировать A → Я-->
                                                                            <!--</button>-->
                                                                            <!--<button @click="sortingChanged({sortBy: field.key,sortDesc: true},block.block_model)"-->
                                                                                    <!--class="dropwond_link">-->
                                                                                <!--Сортировать Я → А-->
                                                                            <!--</button>-->
                                                                        <!--</div>-->
                                                                        <!--<div class="exFilterСondition active exFilterBox"-->
                                                                             <!--v-if="exFilters">-->
                                                                            <!--<div class="exFilterHead"-->
                                                                                 <!--@click.stop="$event.target.parentNode.parentNode.classList.toggle('active')">-->
                                                                                <!--<p>Фильтр по условию...</p>-->
                                                                            <!--</div>-->
                                                                            <!--<div class="exFilterBody">-->
                                                                                <!--<ul :class="field.key">-->

                                                                                    <!--<li v-for="option in exFilters"-->
                                                                                        <!--:class="{'selected':field.condition.value === option.key}">-->
                                                                                        <!--<button @click="exFilterCondition(option.key,field.key,option.dependent,option,'',block.block_model)"-->
                                                                                                <!--class="dropwond_link">-->
                                                                                            <!--{{option.label}}-->
                                                                                        <!--</button>-->
                                                                                        <!--<template-->
                                                                                                <!--v-if="option.showDependent">-->
                                                                                            <!--<input type="text"-->
                                                                                                   <!--:placeholder="option.placeholder"-->
                                                                                                   <!--@input="exFilterCondition(option.key,field.key,false,option,$event.target.value,block.block_model)"-->
                                                                                                   <!--v-if="option.typeDependent === 'text'">-->
                                                                                            <!--<template-->
                                                                                                    <!--v-if="option.typeDependent === 'range'">-->
                                                                                                <!--<form>-->
                                                                                                    <!--<input type="text"-->
                                                                                                           <!--:placeholder="option.placeholder[0]"-->
                                                                                                           <!--@input="exFilterCondition(option.key,field.key,false,option,$event.target,block.block_model)">-->
                                                                                                    <!--<input type="text"-->
                                                                                                           <!--:placeholder="option.placeholder[1]"-->
                                                                                                           <!--@input="exFilterCondition(option.key,field.key,false,option,$event.target,block.block_model)">-->
                                                                                                <!--</form>-->
                                                                                            <!--</template>-->
                                                                                            <!--<datepicker-->
                                                                                                    <!--v-if="option.typeDependent === 'date'"-->
                                                                                                    <!--:format="'dd-MM-yyyy'"-->
                                                                                                    <!--v-model="exFiltersDate"-->
                                                                                                    <!--:placeholder="option.placeholder"-->
                                                                                                    <!--@input="exFilterCondition(option.key,field.key,false,option,exFiltersDate,block.block_model)"-->
                                                                                            <!--&gt;</datepicker>-->
                                                                                        <!--</template>-->
                                                                                    <!--</li>-->
                                                                                <!--</ul>-->
                                                                            <!--</div>-->
                                                                        <!--</div>-->
                                                                        <!--<div class="exFilterValue active exFilterBox">-->
                                                                            <!--<div class="exFilterHead"-->
                                                                                 <!--@click.stop="$event.target.parentNode.parentNode.classList.toggle('active')">-->
                                                                                <!--<p>Фильтр по значению...</p>-->
                                                                            <!--</div>-->
                                                                            <!--<div class="exFilterBody active">-->
                                                                                <!--<ul :class="field.key">-->

                                                                                    <!--&lt;!&ndash;{{field.items}}&ndash;&gt;-->
                                                                                    <!--<li v-for="option in field.items"-->
                                                                                        <!--:class="{'selected':!field.rules.includes(option.value)}"-->
                                                                                        <!--v-if="typeof(option.value) !== 'undefined'">-->
                                                                                        <!--<button @click="exFilterList(option.value,field.key,block.block_model)"-->
                                                                                                <!--class="dropwond_link"-->
                                                                                        <!--&gt;-->
                                                                                            <!--<span v-if="option.value !== null && option.value !== ''">{{option.value}}</span>-->
                                                                                            <!--<span v-else>(Пустые)</span>-->
                                                                                        <!--</button>-->
                                                                                    <!--</li>-->
                                                                                <!--</ul>-->
                                                                            <!--</div>-->
                                                                        <!--</div>-->
                                                                    <!--</div>-->
                                                                <!--</transition>-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для выбора всех элемента&ndash;&gt;-->
                                                        <!--<template slot="HEAD_actions" slot-scope="head">-->
                                                            <!--<div class="list_checkbox checkbox checkbox-all"-->
                                                                 <!--:class="{active: allSelected[block.block_model]}"-->
                                                                 <!--@click.stop="toggleSelected(block.block_model)">-->
                                                                <!--<span class="checkbox-custom"><i-->
                                                                        <!--class="fa fa-check"></i></span>-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для формата отчёта&ndash;&gt;-->
                                                        <!--<template slot="report_format" slot-scope="data">-->
                                                            <!--<img :src="'/img/'+data.value+'.png'" alt="">-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для периода отчёта&ndash;&gt;-->
                                                        <!--<template slot="report_start_date" slot-scope="items">-->
                                                            <!--<p>{{items.item.report_start_date}}</p>-->
                                                            <!--<p>{{items.item.report_end_date}}</p>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для статуса отчёта&ndash;&gt;-->
                                                        <!--<template slot="report_status" slot-scope="items">-->
                                                <!--<span :class="{'red':items.item.report_status=='is formed' , 'green':items.item.report_status!='is formed'}">-->
                                            <!--<span v-if="items.item.report_status == 'is formed' && $store.getters.getLang == 'en'">is formed</span>-->
                                            <!--<span v-if="items.item.report_status == 'is formed' && $store.getters.getLang == 'ru'">ФОРМИРУЕТСЯ</span>-->
                                            <!--<span v-if="items.item.report_status == 'сreated' && $store.getters.getLang == 'en'">created</span>-->
                                            <!--<span v-if="items.item.report_status == 'сreated' && $store.getters.getLang == 'ru'">Создан</span>-->
                                             <!--</span>-->
                                                        <!--</template>-->

                                                        <!--&lt;!&ndash;Слот для отображение disable checkbox&ndash;&gt;-->
                                                        <!--<template slot="individual_l" slot-scope="items">-->
                                                            <!--<div class="list_checkbox checkbox checkbox-all"-->
                                                                 <!--@click.stop>-->
                                                                <!--<label>-->
                                                                    <!--<input type="checkbox" :id="items.item.id"-->
                                                                           <!--:checked="items.item.individual_l" disabled>-->
                                                                    <!--<span class="checkbox-custom"><i-->
                                                                            <!--class="fa fa-check"></i></span>-->
                                                                <!--</label>-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для отображение disable checkbox&ndash;&gt;-->
                                                        <!--<template slot="actual_l" slot-scope="items">-->
                                                            <!--<div class="list_checkbox checkbox checkbox-all"-->
                                                                 <!--@click.stop>-->
                                                                <!--<label>-->
                                                                    <!--<input type="checkbox" :id="items.item.id"-->
                                                                           <!--:checked="items.item.individual_l" disabled>-->
                                                                    <!--<span class="checkbox-custom"><i-->
                                                                            <!--class="fa fa-check"></i></span>-->
                                                                <!--</label>-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Форматирование даты для отчётов&ndash;&gt;-->
                                                        <!--<template slot="created_at" slot-scope="items">-->
                                                            <!--<span class="hidden">{{items.item.created_at_format}}</span>-->
                                                            <!--<p>{{items.item.created_at}}</p>-->
                                                        <!--</template>-->

                                                        <!--<template v-for="field in block.block_fields" :slot="field.key"-->
                                                                  <!--slot-scope="items">-->

                                                            <!--<div v-if=" field.type=='text'" class="text-input-container"-->
                                                                 <!--:style="{'position': 'relative', 'background-color':items.item[field.key].color}">-->
                                                                <!--<input-->
                                                                        <!--type="text"-->
                                                                        <!--v-model="items.item[field.key].value"-->
                                                                        <!--:name="items.item[field.key].input_name"-->
                                                                        <!--:class="{'invalid':fieldsVV[items.item[field.key].input_name]&&fieldsVV[items.item[field.key].input_name].invalid&&fieldsVV[items.item[field.key].input_name].touched && items.item[field.key].validation}"-->

                                                                <!--&gt;-->

                                                                <!--<div v-if="fieldsVV[items.item[field.key].input_name]&&fieldsVV[items.item[field.key].input_name].invalid&&fieldsVV[items.item[field.key].input_name].touched && items.item[field.key].validation"-->
                                                                     <!--class="vv-error-box">-->
                                                                    <!--<span class="vv-error">{{ errors.first('' + items.item[field.key].input_name)}}</span>-->
                                                                <!--</div>-->

                                                            <!--</div>-->

                                                            <!--<div v-else-if=" field.type=='lt-select'" class="dropdown"-->
                                                                 <!--@click="checkPosition">-->
                                                                <!--<button class="btn btn-dropdown dropdown-table"-->
                                                                        <!--@click="dropdownClick ">-->
                                                                    <!--<input type="text"-->
                                                                           <!--v-model="items.item[field.key].options_data.search"-->
                                                                           <!--class="dropwond_link filterSelect"-->
                                                                           <!--@input="selectSearch(items.item[field.key])"-->
                                                                           <!--@keypress="dropDownKeyPress"-->
                                                                           <!--@keyup="dropDownArrows($event,items.item[field.key])"-->

                                                                    <!--&gt;-->


                                                                    <!--&lt;!&ndash;{{items.value}}&ndash;&gt;-->
                                                                    <!--<img class="drop-i btn-dropdown"-->
                                                                         <!--src="/img/dropdown-i.png" alt="">-->
                                                                <!--</button>  &lt;!&ndash; dropdown &ndash;&gt;-->
                                                                <!--<transition name="fade">-->
                                                                    <!--<div class="dropdown_box dropdown_box_select">-->
                                                                        <!--<ul>-->
                                                                            <!--<li v-for="(option, index) in items.item[field.key].options"-->
                                                                                <!--:data-select="index"-->
                                                                                <!--:class="{'li-selected':index==currentOption}"-->
                                                                            <!--&gt;-->
                                                                                <!--<button @click="chooseSelectItem(option,items.item, field.key)"-->
                                                                                        <!--@mouseover="hoverSelectItem"-->
                                                                                        <!--class="dropwond_link">-->
                                                                                    <!--{{option[items.item[field.key].options_data.options_field_title]}}-->
                                                                                <!--</button>-->
                                                                            <!--</li>-->
                                                                        <!--</ul>-->
                                                                    <!--</div>-->
                                                                <!--</transition>-->
                                                            <!--</div>-->

                                                            <!--<div v-else-if=" field.type=='button'"-->
                                                                 <!--:class="{-->
                                                                    <!--'btn-container':true,-->
                                                                    <!--'invalid':fieldsVV[items.item[field.key].input_name]&&-->
                                                                    <!--fieldsVV[items.item[field.key].input_name].invalid&&-->
                                                                    <!--fieldsVV[items.item[field.key].input_name].touched &&-->
                                                                    <!--items.item[field.key].validation-->
                                                                    <!--}"-->
                                                                 <!--:style="{'background-color':items.item[field.key].color}"-->
                                                            <!--&gt;-->
                                                                <!--<label class="btn btn-green"-->
                                                                       <!--:for="items.item[field.key].input_name">{{items.item[field.key].title}}-->

                                                                <!--</label>-->

                                                                <!--<p v-if="items.item[field.key].action_type=='load_file'">-->
                                                                    <!--{{items.item[field.key].name}}-->
                                                                <!--</p>-->

                                                                <!--<img v-if="items.item[field.key].value"-->
                                                                     <!--src="/img/staple.png" alt="">-->

                                                                <!--<input :name="items.item[field.key].input_name"-->
                                                                       <!--:id="items.item[field.key].input_name"-->
                                                                       <!--v-if="items.item[field.key].action_type=='load_file'"-->
                                                                       <!--type="file"-->
                                                                       <!--v-validate="items.item[field.key].validation"-->
                                                                       <!--@change="photoLoad(items.item,field.key, $event,block.block_model)">-->

                                                                <!--<div class="vv-error-box" v-if="(fieldsVV[items.item[field.key].input_name]&&-->
                                                                                              <!--fieldsVV[items.item[field.key].input_name].invalid&&-->
                                                                                              <!--fieldsVV[items.item[field.key].input_name].touched &&-->
                                                                                              <!--items.item[field.key].validation)-->
                                                                                                                                                    <!--">-->
                                                                    <!--<span class="vv-error">{{ errors.first('' + items.item[field.key].input_name) || serverErrors.first(items.item[field.key].input_name)}}</span>-->
                                                                <!--</div>-->
                                                            <!--</div>-->

                                                            <!--<div v-else-if="field.type=='label'"-->
                                                                 <!--class="parag-wrapper"-->
                                                                 <!--:style="{'background-color':items.item[field.key].color}">-->
                                                                <!--<p>-->
                                                                    <!--{{items.item[field.key].value}}-->
                                                                <!--</p>-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот для выбора одного элемента&ndash;&gt;-->
                                                        <!--<template slot="actions" slot-scope="items">-->
                                                            <!--<div class="list_checkbox checkbox checkbox-all"-->
                                                                 <!--@click.stop>-->
                                                                <!--<label :for="items.item.id">-->
                                                                    <!--<input type="checkbox"-->
                                                                           <!--:id="items.item.id"-->
                                                                           <!--:key="items.index"-->
                                                                           <!--v-model="checkedItems[block.block_model]"-->
                                                                           <!--:value="items.item.id">-->
                                                                    <!--<span class="checkbox-custom"><i-->
                                                                            <!--class="fa fa-check"></i></span>-->
                                                                <!--</label>-->
                                                            <!--</div>-->
                                                        <!--</template>-->
                                                        <!--&lt;!&ndash;Слот действий элемента&ndash;&gt;-->
                                                        <!--<template slot="list_actions" slot-scope="items" @click.stop>-->

                                                            <!--<div class="list_actions-box" @click.stop>-->
                                                                <!--&lt;!&ndash;Просмотр отчёта&ndash;&gt;-->

                                                                <!--<template v-for="action in block.block_actions">-->

                                                                    <!--<div v-if="action.action_code=='view'"-->
                                                                         <!--class="list_action-btn"-->
                                                                         <!--@click.stop>-->
                                                                        <!--<button :class="{showModal:true, active:items.item.document.value}"-->
                                                                                <!--@click="photoPreview(items.item.document.value, items.item.doc_ext.value)">-->
                                                                            <!--<img src="/img/info.svg" class="svg" alt="">-->
                                                                        <!--</button>-->
                                                                    <!--</div>-->
                                                                    <!--&lt;!&ndash;Скачать отчёт&ndash;&gt;-->
                                                                    <!--<div v-if="action.action_code=='download'"-->
                                                                         <!--class="list_action-btn"-->
                                                                         <!--@click.stop>-->
                                                                        <!--<a v-if="items.item.document.value!=''" download-->
                                                                           <!--:href="items.item.document.value">-->
                                                                            <!--<img src="/img/download.svg" class="svg"-->
                                                                                 <!--alt="">-->
                                                                        <!--</a>-->
                                                                        <!--<a v-else class="disabled">-->
                                                                            <!--<img src="/img/download.svg" class="svg"-->
                                                                                 <!--alt="">-->
                                                                        <!--</a>-->
                                                                    <!--</div>-->
                                                                    <!--&lt;!&ndash;Удалить отчёт&ndash;&gt;-->
                                                                    <!--<div class="list_action-btn"-->
                                                                         <!--v-if="action.action_code=='delete'"-->
                                                                         <!--@click.stop>-->
                                                                        <!--<button @click="removeDocument(items.item,block.block_model)">-->
                                                                            <!--<img src="/img/remove.svg" class="svg"-->
                                                                                 <!--alt="">-->
                                                                        <!--</button>-->
                                                                    <!--</div>-->
                                                                <!--</template>-->
                                                            <!--</div>-->
                                                        <!--</template>-->


                                                    <!--</b-table>-->
                                                <!--</transition>-->
                                            <!--</div>-->

                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--{{changeRowHeight(block.block_type)}}-->

                        <!--</div>-->

                    <!--</div>-->

                </div>


                <!--Кнопки сохранения моделей-->
                <div class="row">
                    <div class="col d-flex justify-content-end page_buttons_bottom_new">
                        <a v-for="action in action_buttons" :class="action.class"
                           @click="saveModel(action.link)">{{action.title}}</a>
                    </div>
                </div>
            </div>


        </div>
        <div class="print-footer print-toggle-dnone">
            <h1> hello print footer</h1>
        </div>
    </div>
</template>

<script>
    import $ from 'jquery';
    import 'jquery-touchswipe/jquery.touchSwipe';
    import bTable from 'bootstrap-vue/es/components/table/table';
    import bPagination from 'bootstrap-vue/es/components/pagination/pagination';
    import bFormSelect from 'bootstrap-vue/es/components/form-select/form-select';
    import {AtomSpinner} from 'epic-spinners';
    import Datepicker from 'vuejs-datepicker';
    import {ErrorBag} from 'vee-validate';
    import {Validator} from 'vee-validate';
    import {en, ru} from 'vuejs-datepicker/dist/locale';
    import Sector from './Sector.vue';

    export default {
        data: function () {
            return {
                tabs: [],
                tab_index: 0,
                models: {
                    Requisites: [{att_doc_kind_id: null}]
                },
                action_buttons: [],
                exFilters: [],
                exFiltersDate: '',
                loading: true,
                block_model: '',
                add_data_models: [],
                response: {},
                form_parameters: {
                    form_is_dependent: false,
                    form_base_data_model: {}
                },
                dependent: {
                    searchFilterVal: '',
                },
                searchNameVal: '',
                company: '',
                companies: [],
                listAction: false,
                checkedItems: {},
                listItemsS: false,
                listItems: {},
                filterSelect: '',
                mobileListItems: {},
                listItemsAll: {},
                selectedItems: [],
                tableValues: [],
                listItemsText: '',
                defaultSelectId: '',
                sortBy: 'created_at',
                sortDesc: true,
                section_title: '',
                send: '',
                archive: '',
                action: '',
                search: '',
                sizeFields: [],
                textLang: [],
                filter: null,
                totalRows: {},
                currentPage: {},
                countOfMobile: {},
                quantityRecord: 1,
                perPage: {},
                width: 0,
                height: 0,
                x: 0,
                y: 0,
                allSelected: {},
                pageOptions: [20, 50, 100],
                asyncReports: '',
                fields: {},
                buttons: {},
                actions: {},
                previousFile: null,
                customBag: null,
                exFilterData: {},
                currentOption: -1,
                translateList: [],
                itemsDependent: [],
                serverErrors: {
                    first: function (name) {
                        return this[name];
                    },

                    doc1: "error for doc1",
                    doc2: "error for doc2",
                    doc3: "error for doc3",
                    doc4: "error for doc4",
                    language_name: 'error for language_name  '
                },
                documentTypes: [],
                datapicker_translations: {
                    en: en,
                    ru: ru,
                },
                render: false
            }
        },

        computed: {
            countTo() {
                let countTo = this.perPage * this.currentPage;
                if (countTo > this.totalRows) {
                    return this.totalRows;
                } else {
                    return this.perPage * this.currentPage;
                }
            },
            countOf() {
                if (this.currentPage !== 1) {
                    return this.perPage * this.currentPage - this.perPage + 1;
                }
                return 1;
            },
            watchDocKindId: function () {
                console.log('computed works ' + this.models['Requisites'][0]['att_doc_kind_id']);
                return this.models['Requisites'][0]['att_doc_kind_id'];
            }
        },

        // perPage(a, b) {
        //     let self = this;
        //     self.animation();
        //     if (a !== b) {
        //         this.clearSelected();
        //         this.listItems = this.mobileListItems.slice((this.countOf - 1), this.countTo);
        //     }
        // },
        watch: {
            checkedItems: {
                handler: function (newValue) {
                    Object.keys(this.allSelected).forEach(e => {
                        this.allSelected[e] = (this.tableValues[e].length === newValue[e].length && newValue[e].length !== 0) ? true : false;
                    })
                },
                deep: true
                // this.allSelected = (this.tableValues.length === a.length && a.length !== 0) ? true : false;
            },
            currentPage(a, b) {
                this.animation();
                if (a !== b) {
                    this.clearSelected();
                }
            },
            // filter(a, b) {
            //     this.animation();
            //     if (a !== b) {
            //         this.clearSelected();
            //     }
            // },
            async(a, b) {
                if (a !== b) {
                    this.clearSelected();
                }
            },

            watchDocKindId(value) {
                console.log('watcher works')
                console.log(value);
                this.add_data_models.DocumentKinds.forEach(kind => {
                    if (kind.att_doc_kind_id == value) {
                        this.models.Requisites[0].att_doc_type_name = kind.att_doc_type.att_doc_type_name;
                        this.models.Requisites[0].required = kind.required;
                    }
                })
            },

        },

        created() {
            this.$http.post('/menu?mode=0&module=main&object=translateList', null)
                .then(res => {
                    this.translateList = res.data;
                })
        },


        methods: {
            removeDocument(item, model) {
                item.status = 'deleted';
                this.refreshFilter(model);

            },
            filteredList(listItems, FilterVal) {
                let self, select, res;
                self = this;
                select = this.filterSelect;
                res = self.filterListItemsAll(listItems, FilterVal);
                res = res.filter(function (elem) {
                    if (elem[FilterVal] === '' || select) return true;
                    else return elem[FilterVal].toLowerCase().indexOf(select.toLowerCase()) > -1;
                })
                return self.removeDuplicateObject(res, FilterVal);
            },
            sortingChanged(ctx, model) {
                function compare(a, b) {
                    if (a[ctx.sortBy].value < b[ctx.sortBy].value)
                        return -1;
                    if (a[ctx.sortBy].value > b[ctx.sortBy].value)
                        return 1;
                    return 0;
                }

                if (!ctx.sortDesc) {
                    this.listItems[model] = this.mobileListItems[model].sort(compare).slice((this.countOf[model] - 1), this.countTo[model])
                } else {
                    this.listItems[model] = this.mobileListItems[model].sort(compare).reverse().slice((this.countOf[model] - 1), this.countTo[model]);
                }
                // this.exFilterData[model].sort = true;
            },
            animation() {
                let self = this;
                self.loading = true;
                setTimeout(function () {
                    self.loading = false;
                }, 500);
            },
            filterOpen(event) {
                let status = false;
                let index = null;
                let elemTh = $(event.target).parent().parent();

                elemTh.parents('#list_table-box').addClass('open');
                $('thead th').each((i, e) => {
                    if ($(e).hasClass('open')) {
                        status = true;
                        index = i;
                    }
                })
                if (status && index === elemTh.index()) {
                    elemTh.removeClass('open');
                } else {
                    $('thead th').removeClass('open');
                    elemTh.addClass('open');
                }
            },
            filterListItemsAll(array, key) {
                let self, response, itemArray, add;
                self = this;
                response = [];
                array.forEach((e) => {
                    itemArray = e;
                    if (response.length === 0) response.push(itemArray);
                    response.forEach((e) => {
                        add = true;
                        if (e[key] === itemArray[key]) return add = false;
                    });
                    if (add) {
                        response.push(itemArray)
                    }
                });
                return response;
            },
            filterList(filterName, filterCol, type, start) {
                let self, list;
                self = this;
                list = $('.list_mobile');
                // Проверка типа фильтра
                if (type === 'select' && !start) {
                    let e = event.target;
                    $(e.parentNode).siblings().removeClass('selected');
                    e.parentNode.classList.add('selected');
                    this.listItemsText = e.innerText;
                }
                if (window.innerWidth < 768) {
                    this.mobileListItems = this.listItemsAll.filter(function (elem) {
                        if (filterName === '') return true;
                        if (!elem[filterCol] || !filterName) return false;
                        else {
                            return elem[filterCol].toLowerCase().indexOf(filterName.toLowerCase()) > -1;
                        }
                    });
                    this.listItems = this.mobileListItems.slice(0, 1);
                    this.totalRows = this.mobileListItems.length;
                    $(list).attr('data-item', 1);

                } else {
                    // Фильтрация
                    this.mobileListItems = this.listItemsAll.filter(function (elem) {
                        if (filterName === '') return true;
                        if (!elem[filterCol] || !filterName) return false;
                        else {
                            return elem[filterCol].toLowerCase().indexOf(filterName.toLowerCase()) > -1;
                        }
                    });
                    this.listItems = this.mobileListItems.slice(0, 100);
                    this.totalRows = this.mobileListItems.length;

                }
                self.$refs.table.refresh();
                if (window.innerWidth < 768) {
                    self.currentPage = 1;
                    self.countOfMobile = 1;
                }
            },
            changeAsyncReports() {
                this.$store.dispatch('asyncReports');
            },
            deleteChecked() {
                let self = this;
                if (self.checkedItems === '') return false;
                this.$http.post('/admin/company/report/delete', {
                    DeleteId: self.checkedItems,
                    type: 'delete'
                }).then(res => {
                    self.$refs.table.refresh();
                });
            },
            showModal(id, format, status) {
                if (format === 'html' && status === 'сreated') {
                    this.$http.post('/report/html/file/modal/ajax', {
                        id: id,
                    }).then(res => {
                        // this.$modal.show('modalHtmlReport');
                        this.$store.commit('showModal', {type: 'htmlModal', html: res.data});
                        // setTimeout(function() {
                        //     $('#modal_view_report').html(res.data);
                        //     $('#modalHtml').css('top',window.pageYOffset);
                        // }, 100);
                    });
                }
            },
            getReports() {
                let self;
                self = this;
                this.$http.post('/admin/company/report', null)
                    .then(res => {
                        var newList = [];
                        for (var i = 0; i < res.data.report.length; i++) {
                            if (res.data.report[i].reports.length !== 0) {
                                for (var k = 0; k < res.data.report[i].reports.length; k++) {
                                    newList.push(res.data.report[i].reports[k]);
                                }
                            }
                        }
                        if (window.innerWidth < 768) {
                            self.listItems = newList.slice((self.countOfMobile - 1), self.countOfMobile);
                        } else if (window.innerWidth > 768) {
                            self.listItems = newList.slice((self.countOf - 1), self.countTo);
                        }
                        self.mobileListItems = newList;
                        self.totalRows = newList.length;
                    });
            },
            removeReport(id) {
                let self = this;
                this.$http.post('/admin/company/report/delete', {
                    ReportDeleteId: id,
                }).then(res => {
                    self.getReports();
                    if (this.$store.getters.getLang == 'ru') {
                        this.$toast.success('Отчет удалён', '', {position: 'topRight'});
                    }
                    if (this.$store.getters.getLang == 'en') {
                        this.$toast.success('Report deleted', '', {position: 'topRight'});
                    }
                    this.$refs.table.refresh();
                });
            },
            changePage(page) {
                if (page !== 1) {
                    if (this.numberOfPages !== page) {
                        this.quantityRecord = (page * this.perPage + 1) - this.perPage;
                        this.listItems = this.mobileListItems.slice((this.quantityRecord - 1), (this.quantityRecord + this.perPage));
                    }
                } else {
                    this.quantityRecord = '1';
                    this.listItems = this.mobileListItems.slice(0, this.perPage);
                }
            },
            toggleSelected(model) {
                if (this.checkedItems[model].length === this.tableValues[model].length) {
                    this.checkedItems[model] = [];
                    this.allSelected[model] = false;
                } else {
                    this.checkedItems[model] = this.tableValues[model].map(element => element.id);
                    this.allSelected[model] = true;
                }
            },
            clearSelected() {
                this.allSelected = false;
                this.checkedItems = [];
            },
            getWidthFromLocal(name) {
                if (localStorage.getItem('document_' + name + '_0')) {
                    var fields = [];
                    Array.prototype.forEach.call(
                        document.querySelectorAll("#list_table_" + name + " th"),
                        function (th, i) {
                            fields.push(localStorage.getItem('document_' + name + '_' + i));
                        });
                } else {
                    return this.sizeFields;
                }
                return fields;
            },
            addResizeTable(name, sizes) {
                var nameComponent = name;
                var thElm;
                var startOffset;
                let self = this;
                Array.prototype.forEach.call(
                    document.querySelectorAll("#list_table_" + name + " th"),
                    function (th, index) {
                        th.style.position = 'relative';
                        th.style.width = sizes[index] + '%';
                        var grip = document.createElement('div');
                        grip.innerHTML = "&nbsp;";
                        grip.style.top = 0;
                        grip.style.right = 0;
                        grip.style.bottom = 0;
                        grip.style.width = '5px';
                        grip.style.position = 'absolute';
                        grip.style.cursor = 'col-resize';
                        grip.addEventListener('mousedown', function (e) {
                            thElm = th;
                            startOffset = th.offsetWidth - e.pageX;
                        });

                        th.appendChild(grip);
                    });

                // On mouse move event
                document.addEventListener('mousemove', function (e) {
                    if (thElm) {
                        var widthAllTh = 0;
                        Array.prototype.forEach.call(
                            document.querySelectorAll("#list_table_" + name + " th"),
                            function (th, index) {
                                widthAllTh += th.offsetWidth;
                            });
                        thElm.style.width = startOffset + e.pageX + 'px';
                    }

                });


                function addResize() {
                    var lsLen = localStorage.length;

                    Array.prototype.forEach.call(
                        document.querySelectorAll("#list_table_" + name + " th"),
                        function (th, i) {
                            let widthTable = document.getElementById("list_table_" + name).offsetWidth;
                            let offsetWidth = Math.round(100 / (widthTable / th.offsetWidth));
                            localStorage.setItem('document_' + name + '_' + i, offsetWidth);

                        });

                    thElm = undefined;
                }

                // On mouse up event
                document.getElementById('list').addEventListener('mouseup', addResize);
                this.$refs[nameComponent][0].refresh();
            },
            mobileTable(model) {
                let self, list, table;
                self = this;
                list = $('#list_table_' + model + ' .carousel').addClass('list_mobile');
                table = $(list).parents('.list-box');
                self.perPage[model] = 1;
                self.listItems[model] = self.mobileListItems[model].slice(0, 1);
                let timerReadyTable = setInterval(function () {
                    let lengthTr = $(list).find('tr').length;
                    if (lengthTr === self.totalRows[model] || lengthTr === self.perPage[model]) {
                        clearInterval(timerReadyTable);
                        $(list).attr('data-item', '1');
                        if ($(list).children('tr').children('.list_actions-box').length > 0) $(table).addClass('list_actions_enable');
                        self.countOfMobile[model] = 1;
                        $(".list_mobile").swipe({
                            allowPageScroll: "auto",
                            swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                                let modelSend = $(event.changedTouches[0].target).parents('table')[0].dataset.model;
                                self.changeSlide(direction, modelSend);
                            }
                        });
                    }
                }, 500)
            },
            destroyMobileTable(model) {
                $('.list_mobile').css('transform', 'initial').removeClass('list_mobile');
                this.perPage[model] = 20;
                this.listItems[model] = this.mobileListItems[model].slice(0, this.perPage[model]);
                this.totalRows[model] = this.mobileListItems[model].length;
            },
            resizeWindow() {
                if (window.NodeList && !NodeList.prototype.forEach) {
                    NodeList.prototype.forEach = Array.prototype.forEach;
                }
                let self = this;
                window.onresize = function (event) {
                    let tables = document.querySelectorAll('table');

                    tables.forEach((e) => {
                        if (window.innerWidth < 768 && !e.classList.contains('list_mobile')) {
                            self.mobileTable(e.dataset.model);
                        } else if (window.innerWidth > 768) {
                            self.destroyMobileTable(e.dataset.model);
                        }
                    })
                    // if (window.innerWidth < 768 && !$('#list_table tbody').hasClass('list_mobile')) {
                    //     self.mobileTable();
                    // } else if (window.innerWidth > 768 && $('#list_table tbody').hasClass('list_mobile')) {
                    //     self.destroyMobileTable();
                    // }
                };
            },
            changeSlide(direction, model, event) {
                let currentPage, list;
                list = $('#list_table_' + model + ' .list_mobile');
                if (direction === 'left' && this.countOfMobile[model] < this.totalRows[model]) {
                    currentPage = parseInt($(list).attr('data-item'));
                    this.listItems[model] = this.mobileListItems[model].slice(currentPage, currentPage + 1);
                    $(list).attr('data-item', ++currentPage);
                    this.countOfMobile[model]++;
                }
                else if (direction === 'right' && 1 < this.countOfMobile[model]) {
                    currentPage = parseInt($(list).attr('data-item'));
                    this.listItems[model] = this.mobileListItems[model].slice(currentPage - 2, currentPage - 1);
                    $(list).attr('data-item', --currentPage);
                    this.countOfMobile[model]--;
                }
            },
            readyTable(page) {
                let self = this;
                // Проверка на готовность таблицы
                let checkReadyTable = setInterval(function () {
                    let res = document.querySelectorAll("#list_table_" + page + " th");
                    if (res) {
                        // Таблица софрмирована
                        clearInterval(checkReadyTable);
                        // Получение ширины из LocalStorage
                        self.sizeFields = self.getWidthFromLocal(page);
                        // Добавление ранее полученой ширины в таблицу
                        self.addResizeTable(page, self.sizeFields);
                        if (window.innerWidth < 768) {
                            self.mobileTable(page);
                        }
                        // Обновление таблицы
                        self.$refs[page][0].refresh();
                        self.loading = false;
                    }
                    ;
                }, 500)
            },
            removeDuplicate(arr) {
                return arr.filter((item, pos, self) => self.indexOf(item) === pos);
            },
            removeDuplicateObject(arr, comp) {
                const unique = arr
                    .map(e => e[comp])

                    // store the keys of the unique objects
                    .map((e, i, final) => final.indexOf(e) === i && i)

                    // eliminate the dead keys & store unique objects
                    .filter(e => arr[e]).map(e => arr[e]);

                return unique;
                // return array.filter((obj, pos, arr) => {
                //     return arr.map(mapObj => mapObj[field]).indexOf(obj[field]) === pos;
                // });
            },
            exFilter(model) {
                let self;
                self = this;
                this.$set(self.exFilterData, model, [])
                // self.exFilterData[model] = [];
                self.fields[model].forEach((e, i) => {
                    if (e.filter) {
                        e.items = self.mobileListItems[model].map(elem => elem[e.key])
                            .filter((item, pos, self) => self.indexOf(item) === pos);

                        self.exFilterData[model].push({
                            key: e.key,
                            itemsAll: e.items,
                            items: self.removeDuplicateObject(e.items, 'value'),
                            label: e.label,
                            rules: [],
                            condition: {},
                            fixed: false
                        });
                    }
                })
                // this.refreshFilter();
            },
            exFilterList(value, key, model) {
                this.exFilterData[model].forEach((e, i) => {
                    if (e.key === key) {
                        e.fixed = true;
                        let findRemove = e.rules.findIndex(el => el === value);
                        if (findRemove !== -1) e.rules.splice(findRemove, 1);
                        else e.rules.push(value);
                    }
                });
                this.refreshFilter(model);
            },
            exFilterReset() {
                this.exFilterData.forEach(e => {
                    e.rules = [];
                });
                $('.exFilterValue ul li').addClass('selected');
                this.exFilterData.forEach(e => {
                    e.condition = {};
                    this.mobileListItems = this.listItemsAll;
                    this.refreshItems();
                });
                $('.exFilterСondition ul li').removeClass('selected');
            },
            exFilterCondition(optionKey, fieldKey, dependent, option, value, model) {
                let self = this;
                if (dependent) {
                    option.showDependent = !option.showDependent;
                }
                if (optionKey === 'date' && value.length !== 0) {
                    value = self.formatDate(value);
                }
                if (optionKey === 'between' || optionKey === 'notbetween') {
                    if (value.length === 0) return false
                    this.rangeItemFirst = value.parentNode.firstElementChild.value;
                    this.rangeItemLast = value.parentNode.lastElementChild.value;
                    if (this.rangeItemFirst.length !== 0 && this.rangeItemLast.length !== 0) {
                        this.exFilterData[model].forEach((e, i) => {
                            if (e.key === fieldKey) {
                                if (JSON.stringify(e.condition) !== '{}') {
                                    if (e.condition.value === optionKey && value.length !== 0) {
                                        e.condition = {};
                                        this.refreshItems(model);
                                    } else {
                                        e.condition = {
                                            value: optionKey,
                                            valueT: this.rangeItemFirst,
                                            valueTwo: this.rangeItemLast
                                        };
                                    }
                                } else {
                                    e.condition = {
                                        value: optionKey,
                                        valueT: this.rangeItemFirst,
                                        valueTwo: this.rangeItemLast
                                    };
                                }
                            }

                        });
                        this.refreshFilter(model);
                        return false;
                    } else {
                        return false;
                    }
                }
                this.exFilterData[model].forEach((e, i) => {
                    if (e.key === fieldKey) {
                        if (JSON.stringify(e.condition) !== '{}') {
                            if (e.condition.value === optionKey && value.length === 0) {
                                e.condition = {};
                                this.refreshItems(model);
                            } else {
                                e.condition = {value: optionKey, valueT: value};
                            }
                        } else {
                            e.condition = {value: optionKey, valueT: value};
                        }
                    }
                });
                this.refreshFilter(model);
            },
            refreshItems(model) {
                if (window.innerWidth < 768) {
                    this.listItems[model] = this.mobileListItems[model].slice(0, 1);
                    this.totalRows[model] = this.mobileListItems[model].length;
                    $('.list_mobile').attr('data-item', 1);
                    this.currentPage = 1;
                    this.countOfMobile = 1;
                } else {
                    this.listItems[model] = this.mobileListItems[model].slice(0, 100);
                    this.totalRows[model] = this.mobileListItems[model].length;
                }
                this.$refs[model][0].refresh();
            },
            formatDate(date) {
                var day = date.getDate();
                var month = date.getMonth();
                var year = date.getFullYear();
                month++;
                if (day < 10) day = '0' + day;
                if (month < 10) month = '0' + month;
                return day + "-" + month + "-" + year;
            },
            notfilled(key, model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e =>
                    e[key].length === 0
                );
            },
            filled(key, model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e =>
                    e[key].length !== 0
                );
            },
            textcontains(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e =>
                    String(e[key].value).toLowerCase().includes(text.toLowerCase())
                );
            },
            textnotcontains(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e =>
                    !(String(e[key].value).toLowerCase().includes(text.toLowerCase() || false))
                );
            },
            textstarts(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e =>
                    (String(e[key].value).toLowerCase().indexOf(text.toLowerCase() || '')) === 0
                );
            },
            textends(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e =>
                    String(e[key].value).toLowerCase().endsWith(text.toLowerCase() || '')
                );
            },
            textexactly(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e => {
                    if (text === '') return true;
                    return String(e[key].value).toLowerCase() === text.toLowerCase();
                });
            },
            date(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e => {
                    if (text === '') return true;
                    return e[key].value === text;
                });
            },
            dateto(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e => {
                    if (text === '') return true;
                    return new Date(Date.parse(e[key].value.split('-').reverse().join('-'))) < new Date(Date.parse(text));
                });
            },
            datefrom(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e => {
                    if (text === '') return true;
                    return new Date(Date.parse(e[key].value.split('-').reverse().join('-'))) > new Date(Date.parse(text));
                });
            },
            componentData(Request, params = null) {
                let self = this;
                this.$http.post(Request, params)
                    .then(res => {
                        this.form_base_data_model = res.data.form_parameters.form_base_data_model;
//
                        this.tabs = res.data.tabs; // сохранеям табы локально

                        this.links = res.data.links; // сохраняем ссылки локально

                        this.action_buttons = res.data.actions.actions_card;// сохраняет кнопки с действиями локально

                        this.models = res.data.main_data_models;// сохраняем основные модели локально

                        if (res.data.form_parameters.form_is_dependent) {

                            this.dependent = res.data.dependent;
//
                            this.dependent.dependent_fields.options = res.data.add_data_models[res.data.dependent.dependent_fields.options_data.options_data_model];
                            this.dependent.dependent_fields.options_data.search = res.data.main_data_models[res.data.dependent.dependent_data_model][0][res.data.dependent.dependent_fields.options_data.options_field_title];
//
                        }


                        this.add_data_models = res.data.add_data_models;//сохраняем локально дополонительные модели данных
//todo вернуть обратно заполненеие селектов значениями
                        this.tabs.forEach((tab) => {
                            tab.blocks.forEach((block) => {
                                if (block.block_type == 'block_card') {
                                    block.block_fields.forEach((field) => {
                                        if (field.type == 'lt-select') {

                                            field.options = res.data.add_data_models[field.options_data.options_data_model];//заполняем селект опциями из дополнительной модели
                                            field.options_data.search = this.models[block.block_model][0][field.options_data.options_field_title];//вставляем в селект текущее значение из базы
                                        }


                                    })
                                }

                            })
                        });

                        this.card_name = res.data.form_parameters.form_main_data_model_name + " (" + res.data.form_parameters.form_title + ") ";// устанавливаем заголовок карточки

//                    this.$store.commit('buildCrumb',{name:res.data.form_parameters.form_main_data_model_name, route: this.$route});

                        this.loading = false;


//                        self.response = res.data;
                        // Название модели
//                        self.block_model = res.data.tabs[0].blocks[1].block_model;
                        // Параменты формы
                        self.form_parameters = res.data.form_parameters;
                        // Зависимость формы к select
                        self.form_parameters.form_is_dependent = res.data.form_parameters.form_is_dependent;
                        // Название страницы
                        self.section_title = res.data.form_parameters.form_title;
                        this.tabs[0].blocks.forEach((block, index) => {
                            if (block.block_type === 'block_list_base') {
                                // let block_model = block.block_model;
                                // this.$set(self.mobileListItems, block_model, []);
                                // this.$set(self.allSelected, block_model, false);
                                // this.$set(self.checkedItems, block_model, []);
                                // this.$set(self.tableValues, block_model, []);
                                // this.$set(self.perPage, block_model, 1000);
                                // this.$set(self.countOfMobile, block_model, 1);
                                // this.$set(self.currentPage, block_model, 1);
                                // self.mobileListItems[block_model] = res.data.main_data_models[block_model];
                                // // Кол-во элементов в списке
                                // self.totalRows[block_model] = res.data.main_data_models[block_model].length;
                                // // Все элементы
                                // this.$set(self.listItemsAll, block_model, []);
                                // self.listItemsAll[block_model] = res.data.main_data_models[block_model];
                                // this.$set(self.listItems, block_model, []);
                                // // Проверка на мобильную версию
                                // if (window.innerWidth < 768) {
                                //     self.listItems[block_model] = self.mobileListItems[block_model].slice(0, 1);
                                // } else {
                                //     self.listItems[block_model] = self.mobileListItems[block_model].slice(0, self.perPage[block_model]);
                                // }
                                // self.fields[block_model] = block.block_fields;
                                // Обработка фильтров
                                // self.exFilter(block_model);
                                // Проверка на готовность таблицы
                                // self.readyTable(block_model);
                            }
                        })

                        if (res.data.dependent) {
                            // Начальное значение select
                            self.defaultSelectId = res.data.dependent.dependent_fields.options_data.options_field_id_value;
                            // Главная модель
                            let mainSelectModel = res.data.dependent.dependent_fields.options_data.options_data_model;
                            // По какому полю фильтровать
                            self.dependent.searchFilterVal = res.data.dependent.dependent_fields.options_data.options_field_title;
                            if (self.defaultSelectId === '') {
                                self.listItemsText = 'All';
                            } else {
                                // Поиск начального значение поля
                                res.data.main_data_models[mainSelectModel].forEach((elem) => {
                                    if (elem['id'] == self.defaultSelectId) {
                                        self.listItemsText = elem[self.dependent.searchFilterVal];
                                        self.filterList(elem[self.dependent.searchFilterVal], self.dependent.searchFilterVal, 'select', 1)
                                    }

                                });
                            }
                        }
                    })
                    .catch((error) => {
                        if (error.response) {
                            this.$bRouter.push({path: '/' + error.response.status})
                        }
                    });

//
            },
            refreshFilter(model) {
                let self, filterCounter, filterCount;
                self = this;
                // Фильтрация элементов таблицы
                // self.mobileListItems = self.listItemsAll.filter(item=>{
                //     filterCounter = 0;
                //     self.exFilterData.forEach(column=>{
                //         filterCount = column.rules.length;
                //         if(column.rules === item[column.key]) filterCounter++;
                //     });
                //     return filterCounter === filterCount;
                // });
                self.mobileListItems[model] = self.listItemsAll[model];
                self.exFilterData[model].forEach(filter => {
                    filter.itemsAll = [];
                    self.mobileListItems[model] = self.mobileListItems[model].filter(item => {
                        if (item.status === 'deleted') return false;
                        if (item[filter.key]) {
                            filter.itemsAll.push(item[filter.key]);
                        }
                        return !filter.rules.includes(item[filter.key].value)
                    })
                })
                let itemsFilter = [];
                // Проверка есть ли "Фильтр по условию"
                self.exFilterData[model].forEach((e, index) => {
                    switch (e.condition.value) {
                        case 'notfilled':
                            self.notfilled(e.key, model);
                            break
                        case 'filled':
                            self.filled(e.key, model);
                            break
                        case 'textcontains':
                            self.textcontains(e.key, e.condition.valueT, model);
                            break
                        case 'textnotcontains':
                            self.textnotcontains(e.key, e.condition.valueT, model);
                            break
                        case 'textstarts':
                            self.textstarts(e.key, e.condition.valueT, model);
                            break
                        case 'textends':
                            self.textends(e.key, e.condition.valueT, model);
                            break
                        case 'textexactly':
                            self.textexactly(e.key, e.condition.valueT, model);
                            break
                        case 'date':
                            self.date(e.key, e.condition.valueT, model);
                            break
                        case 'dateto':
                            self.dateto(e.key, e.condition.valueT, model);
                            break
                        case 'datefrom':
                            self.datefrom(e.key, e.condition.valueT, model);
                            break
                        case 'more':
                            self.more(e.key, e.condition.valueT, model);
                            break
                        case 'moreorequal':
                            self.moreorequal(e.key, e.condition.valueT, model);
                            break
                        case 'less':
                            self.less(e.key, e.condition.valueT, model);
                            break
                        case 'lessorequal':
                            self.lessorequal(e.key, e.condition.valueT, model);
                            break
                        case 'equal':
                            self.equal(e.key, e.condition.valueT, model);
                            break
                        case 'notequal':
                            self.notequal(e.key, e.condition.valueT, model);
                            break
                        case 'between':
                            self.between(e.key, e.condition.valueT, e.condition.valueTwo, model);
                            break
                        case 'notbetween':
                            self.notbetween(e.key, e.condition.valueT, e.condition.valueTwo, model);
                            break
                    }
                });
                // Фильтрация элементов в списке фильтра
                // Если фильтр зафиксирован (был нажат) то его не фильтруют
                self.exFilterData[model].forEach((filter, index) => {
                    if (!filter.fixed) {
                        filter.items = filter.itemsAll.filter(item => {
                            let status = 0;
                            self.mobileListItems[model].map(e => {
                                if (e[filter.key] === item) status++;
                            });
                            return status > 0;
                        });
                        filter.items = self.removeDuplicateObject(filter.items, 'value')
                    }
                });
                self.refreshItems(model);
            },
            more(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e => {
                    if (text === '') return true
                    return parseInt(text) < parseInt(e[key])
                });
            },
            moreorequal(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e => {
                    if (text === '') return true
                    return parseInt(text) <= parseInt(e[key].value)
                });
            },
            less(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e => {
                    if (text === '') return true
                    return parseInt(text) > parseInt(e[key].value)
                });
            },
            lessorequal(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e => {
                    if (text === '') return true
                    return parseInt(text) >= parseInt(e[key].value)
                });
            },
            equal(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e => {
                    if (text === '') return true
                    return parseInt(text) == parseInt(e[key].value)
                });
            },
            notequal(key, text = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e => {
                    if (text === '') return true
                    return parseInt(text) != parseInt(e[key].value)
                });
            },
            between(key, first = '', second = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e => {
                    return parseInt(first) < parseInt(e[key].value) && parseInt(e[key].value) < parseInt(second)
                });
            },
            notbetween(key, first = '', second = '', model) {
                this.mobileListItems[model] = this.mobileListItems[model].filter(e => {
                    return (parseInt(first) < parseInt(e[key].value) && parseInt(e[key].value) > parseInt(second)) || (parseInt(first) > parseInt(e[key]) && parseInt(e[key]) < parseInt(second))
                });
            },
            dbClicked: function () {
                console.log('dblclick')
            },
            inputClick: function (obj) {
                console.log(obj)
            },
            modelChangeHandler: function () {

            },

            saveModel(link) {
                let saveData;
                this.listItemsAll[this.form_parameters.form_base_data_model] = this.models[this.form_parameters.form_base_data_model];


                this.$validator.validate().then(result => {
                    console.log(result);
                    console.log(this.fieldsVV)
                    if (result && this.$validator.errors.items[0] == undefined) {
                        for (var item in this.fieldsVV) {
                            this.fieldsVV[item].touched = true;
                        }
                        this.$http.post(link, this.models)
                            .then(res => {
                                if (this.card_name[this.card_name.length - 1] == "*") this.card_name = this.card_name.slice(0, this.card_name.length - 1);

                                this.model_has_changed = false;
                                for (var item in this.fieldsVV) {
                                    this.fieldsVV[item].touched = false;
                                }

                                //если карточка только что созданная
                                if (this.models[this.form_base_data_model][0].id === null) {
                                    var paths = this.$bRouter.path.split('/');
                                    this.$bRouter.push(paths.slice(0, paths.length - 1).join('/') + '/' + res.data); // убираем '/new' из конца роута и заменяем его на id созданной карточки
                                }
                            });


                        if (action.code == 'save') this.$bRouter.go(-1);
                    }
                    else {
                        for (var item in this.fieldsVV) {
                            this.fieldsVV[item].touched = true;
                        }
                    }
                })
            },

            dropdownClick: function (e) {
                this.currentOption = -1;
//                e.target.nextElementSibling.scrollTop = 0;
//                console.log(e.target.parentNode.nextElementSibling.childNodes[0]);
//                e.target.parentNode.nextElementSibling.childNodes[0].scrollTop='0px';
//                console.log( e.target.parentNode.nextElementSibling.childNodes[0].scrollTop);
            },
            selectSearch: function (item) {

                console.log(item)
                item.options = this.add_data_models[item.options_data.options_data_model].filter((i) => {
                    return i[item.options_data.options_field_title].toLowerCase().includes(item.options_data.search.toLowerCase());
                })
                // Осуществляем поиск по массиву возможных опций при нажатии клавиши в поле поиска
//                this.model_has_changed = true;
//                console.log(item)
//                if (arguments.length == 1) {
//                    item.options = this.add_data_models[item.options_data.options_data_model].filter((i) => {
//                        return i[item.options_data.options_field_title].toLowerCase().includes(item.options_data.search.toLowerCase());
//                    });// Осуществляем поиск по массиву возможных опций при нажатии клавиши в поле поиска
//                }
                this.currentOption = -1
            },

            dropDownKeyPress: function (e) {
                e.target.parentNode.nextSibling.nextSibling.classList.add("open");

            }, // открывает список возможных опций при нажатии клавиши в поле поиска

            dropDownArrows: function (e, item,) {
                //проверяем, есть ли элементы в списке опций
                if (e.target.parentNode.nextElementSibling.childNodes[0] && e.target.parentNode.nextElementSibling.childNodes[0].childNodes[0]) {
                    let listHeight = e.target.parentNode.nextElementSibling.childNodes[0].childNodes[0].offsetHeight;// вычисляем высоту каждой опции
                    let listQuantity = e.target.parentNode.nextElementSibling.childNodes[0].childNodes.length;// вычисляем кол-во опций
                    console.log(e.keyCode)


                    if (e.keyCode == 40) {
                        if (this.firstSelectKeyPress) {
                            this.firstSelectKeyPress = false;
                            this.currentOption = 0;
                        }
                        else {
                            if (this.currentOption < listQuantity - 1) this.currentOption++;
                            if (this.currentOption > 2) e.target.parentNode.nextElementSibling.scrollTop += listHeight;
                            this.previous_dr_act = 'down';

                            console.log(e.target.parentNode.nextElementSibling.children[0].querySelector('li[data-select' + this.currentOption + ']'))
                        }
                    }

                    if (e.keyCode == 38) {
                        if (this.currentOption != 0) this.currentOption--;
                        e.target.parentNode.nextElementSibling.scrollTop -= listHeight;
                        this.previous_dr_act = 'up';
                    }

                    if (e.keyCode == 13) {
                        var elem = e.target.parentNode.nextElementSibling.childNodes[0].childNodes;
                        let index;
                        elem = Array.from(elem);
                        elem.forEach((lis) => {
                            if (lis.classList.contains('li-selected')) {
                                index = lis.getAttribute('data-select');

                            }
                        });

                        console.log(item)
                        item.value = item.options[index][item.options_data.options_field_id];
                        item.options_data.search = item.options[index][item.options_data.options_field_title]; // обновляем надпись в поле поиска, чтоб пользователь видел текущую выбранную опцию

//                        modelObj[item.model] = item.options[index][item.options_data.options_field_id];// записываем id в модель
//                        item.options_data.search = item.options[index][item.options_data.options_field_title];// обновляем надпись в поле поиска, чтоб пользователь видел текущую выбранную опцию
                        e.target.parentNode.nextElementSibling.classList.remove('open') // закрываем блок с опциями
//                        console.log(e.target.parentNode.nextElementSibling)
                    }
                }
            },

            chooseSelectItem: function (option, modelObj, key) {
                //item -  обьект поля, на котором произошло событие
                // option -обьект опции, которую выбрали
                //                modelObj - модель, которую будем обновлять


                modelObj[key].value = option[modelObj[key].options_data.options_field_id]
                modelObj[key].options_data.search = option[modelObj[key].options_data.options_field_title]; // обновляем надпись в поле поиска, чтоб пользователь видел текущую выбранную опцию

//                console.log('CHOOSING')
                console.log(modelObj)
//                this.model_has_changed = true;
//                modelObj[item.model] = option[item.options_data.options_field_id]; // записываем id в модель
//                console.log()
            },
            chooseSelectItemCard: function (item, option, modelObj) {
                //item -  обьект поля, на котором произошло событие
                // option -обьект опции, которую выбрали
                //                modelObj - модель, которую будем обновлять


//                this.model_has_changed = true;
                modelObj[item.model] = option[item.options_data.options_field_id]; // записываем id в модель
                item.options_data.search = option[item.options_data.options_field_title]
//                console.log()
            },

            //устанавливаем выделение на строку под курсором
            hoverSelectItem: function (e) {
                console.log('elem top' + e.target.getBoundingClientRect().top);
                console.log('block top' + e.target.parentNode.parentNode.parentNode.getBoundingClientRect().top)
                this.currentOption = e.target.parentNode.getAttribute('data-select');
            },

            photoLoad: function (item, key, e, model) {
                var reader = new FileReader();
                if (e.target.files[0]) {


                    reader.readAsDataURL(e.target.files[0]);


                    this.$validator.validate(item[key].input_name).then(result => {
                        if (result) {

                            reader.onload = (e) => {

                                item[key].value = e.target.result;
                                this.refreshFilter(model);

                            };

                            item[key].name = e.target.files[0].name;// set the name of loaded file in the button
                            item.doc_size.value = Math.round(e.target.files[0].size / 1024, 1) + "KB";  //set the size of file in the mode

                            item.doc_ext.value = e.target.files[0].name.substring(e.target.files[0].name.lastIndexOf('.') + 1);
                        }
                        else {
                            item[key].value = null; // clean the model
                            item[key].name = null // clean the model
                            item.doc_size.value = null;  //clean the model

                            item.doc_ext.value = null;// clean the model

                            this.errors.items.forEach(err => {
                                if (err.field === item[key].input_name) {
                                    this.$toast.error(err.msg, '', {position: 'topRight'});
                                }
                            })


                        }
                    });
                }
                else {


//                    reader.readAsDataURL(e.target.files[0]);

//                    this.refreshFilter(model);


                }


            },

            checkPosition(e) {
                console.log(e.currentTarget);
                var cell = e.currentTarget;
                var dropdown_box = cell.querySelector(".dropdown_box");

                var cell_bottom = cell.getBoundingClientRect().bottom;
                var doc_height = document.documentElement.clientHeight
                var dropdown_height = parseInt(getComputedStyle(dropdown_box).maxHeight)

                console.log(cell_bottom)
                console.log(dropdown_height);
                console.log(doc_height);

                if (cell_bottom + dropdown_height >= doc_height) {
                    console.log('more');
                    dropdown_box.classList.add('dropdown_box_top')
                }
                else {
                    if (dropdown_box.classList.contains('dropdown_box_top')) dropdown_box.classList.remove('dropdown_box_top')
                }
            },

            addRow(block) {
                let model = block.block_model;

                var obj = JSON.parse(JSON.stringify(this.listItems[model][0]));

                for (var item in obj) {

                    if (item == 'status') obj[item] = 'new'; // меняем флаг, чтобы видеть, что строка новая


                    else if (item == 'id') {
                        obj[item] = model + '_new_id_' + block.current_new_id; // меняем флаг, чтобы видеть, что input  новая todo проверить надо ли
                        block.current_new_id++; // увеличиваем счетчик текущего нового айдишника
                    }

                    else if (item == '_rowVariant') {
                        obj[item] = '';
                    }

                    else {
                        obj[item].value = null;
                        if (item == 'document') {
                            obj[item].input_name = model + '_new_' + block.current_new_id;
                            obj[item].name = null;
                        }
                    }


                }

                this.listItems[model].push(obj);
                this.listItemsAll[model].push(obj);
                this.refreshFilter(model);
                // this.mobileListItems[model].push(obj);
            },

            photoPreview(src, ext) {
                if (src == '') return;
                if (ext != 'pdf') this.$store.commit('showModal', {type: 'htmlModal', html: '<img src=' + src + '>'});
                else this.$store.commit('showModal', {type: 'htmlModal', html: '<embed src=' + src + '>'});

            },

            downloadFile(href) {

                if (href != '') this.$http.post(href, null).then(res => {
                    console.log(res.data)
                })
                else return;
            },

            loadContent(from, to, e) {
                //todo  узнать, надо ли проверять эти поля валидатором
                //проверка на пустоту
                if (from == '' || to == '') {
                    this.errors.add({
                        field: 'date',
                        msg: 'Пустое поле'
                    });
                    Array.from(e.target.parentElement.getElementsByTagName('input')).forEach(input => {
                        input.classList.add('invalid');
                    })
                    return;
                }
                else {
                    this.errors.remove('date');
                    Array.from(e.target.parentElement.getElementsByTagName('input')).forEach(input => {
                        input.classList.remove('invalid');
                    })

                }

                var dateFrom = new Date(Date.parse(from));
                var dateTo = new Date(Date.parse(to));

                //проверка на вхождение в интервал
                if (dateFrom > dateTo) {
                    console.log('Error! date1 is < then 2')
                    console.log(this.fieldsVV);
                    console.log(this.errors)
                    this.errors.add({
                        field: 'date',
                        msg: 'Поля заполнены неверно'
                    });
                    Array.from(e.target.parentElement.getElementsByTagName('input')).forEach(input => {
                        input.classList.add('invalid');
                    })
                }
                else {
                    this.errors.remove('date');
                    Array.from(e.target.parentElement.getElementsByTagName('input')).forEach(input => {
                        input.classList.remove('invalid');
                    })
                }
            },

            changeTab(index, tab) {

                if (tab.tab_type == 'default') {
                    this.tab_index = index;
                    return;
                }

                this.$validator.validate().then(result => {
                    if (result && this.$validator.errors.items[0] == undefined) {

                        //todo тут будет запрос на сохранение таба перед переходом
                        this.tab_index = index;

                    }
                    else {
                        this.$toast.error('Заполните все поля', '', {position: 'topRight'});
                        for (var item in this.fieldsVV) {
                            this.fieldsVV[item].touched = true;
                        }
                    } // подсветка неправильно заполненых полей
                })
            },

            changeRowHeight(block_type) {
                if (block_type == 'block_list_base') {
                 if( document.getElementsByClassName("right-sector")[0]) document.getElementsByClassName("right-sector")[0].style.gridAutoRows="initial";
                }
            }
        },

        mounted() {
            this.exFilters = [
                {label: 'Ячейка не заполнена', key: 'notfilled', dependent: false},
                {label: 'Ячейка с данными', key: 'filled', dependent: false},
                {
                    label: 'Текст содержит',
                    key: 'textcontains',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'text',
                    placeholder: 'Введите текст'
                },
                {
                    label: 'Текст не содержит',
                    key: 'textnotcontains',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'text',
                    placeholder: 'Введите текст'
                },
                {
                    label: 'Текст начинается с',
                    key: 'textstarts',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'text',
                    placeholder: 'Введите текст'
                },
                {
                    label: 'Текст заканчивается на',
                    key: 'textends',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'text',
                    placeholder: 'Введите текст'
                },
                {
                    label: 'Текст в точности',
                    key: 'textexactly',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'text',
                    placeholder: 'Введите текст'
                },
                {
                    label: 'Дата',
                    key: 'date',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'date',
                    placeholder: 'Выберите дату'
                },
                {
                    label: 'Дата до',
                    key: 'dateto',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'date',
                    placeholder: 'Выберите дату'
                },
                {
                    label: 'Дата после',
                    key: 'datefrom',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'date',
                    placeholder: 'Выберите дату'
                },
                {
                    label: 'Больше',
                    key: 'more',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'text',
                    placeholder: 'Введите число'
                },
                {
                    label: 'Больше или равно',
                    key: 'moreorequal',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'text',
                    placeholder: 'Введите число'
                },
                {
                    label: 'Меньше',
                    key: 'less',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'text',
                    placeholder: 'Введите число'
                },
                {
                    label: 'Меньше или равно',
                    key: 'lessorequal',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'text',
                    placeholder: 'Введите число'
                },
                {
                    label: 'Равно',
                    key: 'equal',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'text',
                    placeholder: 'Введите число'
                },
                {
                    label: 'Не равно',
                    key: 'notequal',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'text',
                    placeholder: 'Введите число'
                },
                {
                    label: 'Между',
                    key: 'between',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'range',
                    placeholder: ['От', 'До']
                },
                {
                    label: 'Не между',
                    key: 'notbetween',
                    dependent: true,
                    showDependent: false,
                    typeDependent: 'range',
                    placeholder: ['От', 'До']
                }
            ],
                global.vm = this;
            global.vmData = this.$data;
            this.resizeWindow();
            let self = this;


            this.loading = false;


            self.componentData('/admin/contractorSandBox/list');


        },


        components: {
            bTable,
            bPagination,
            bFormSelect,
            AtomSpinner,
            Datepicker,
            Sector
        }
    }


</script>

<style lang="scss">
    @import '../../sass/variables';
    @import '../../sass/mixin';

    #document {
        padding-bottom: 20rem;
        table.b-table > thead > tr > th.sorting::before, table.b-table > tfoot > tr > th.sorting::before {
            content: '';
        }
        table.b-table > thead > tr > th.sorting_asc::after, table.b-table > thead > tr > th.sorting_desc::before, table.b-table > tfoot > tr > th.sorting_asc::after, table.b-table > tfoot > tr > th.sorting_desc::before {
            content: '';
        }
        .container {
            position: relative;
        }
        .counter_list {
            display: flex;
            align-items: center;
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
        .counter_list-m {
            padding-left: 1.5rem;
        }
        .list_btn {
            /*margin-top: 3rem;*/

        }
        .list_btn_first-line {
            margin-bottom: 2rem;
            .btn {
                padding: 1rem 3rem;
                span {
                    margin-right: 1rem;
                }
            }
        }
        .list_table {
            width: 100%;
            margin-top: 3rem;
            margin-bottom: 0;
            table-layout: fixed;
            position: relative;
            .list_checkbox {
                margin: 0 auto;
                span {
                    margin: 0 auto
                }
            }
            th.list_checkbox {
                max-width: 6% !important;
                width: 6% !important;
            }
            .list_actions-box {
                width: 20rem !important;
                .showModal, .disabled {
                    opacity: 0.5;
                    cursor: default;
                }
                .active {
                    opacity: 1;
                    cursor: pointer;
                }
            }
            thead {
                border-radius: 3px;
                border: 1px solid #e4e7ea;
                th {
                    padding-left: 3rem;
                    background: #788699;
                    height: 5.4rem;
                    color: white;
                    vertical-align: middle;
                    font-weight: 600;
                    border-right: 1px solid #fff;
                    border-left: 1px solid #fff;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    /*overflow: hidden;*/
                    min-width: 7.5rem !important;
                    font-size: 1.5rem;
                    &.open {
                        z-index: 10000 !important;
                        .exFilterDropdown {
                            display: block;
                        }
                    }
                    &:after {
                        display: none;
                    }
                    &:last-child {
                        border-right: 0;
                    }
                    &.sorting {
                        background-image: url('/img/bg_table_sort.png');
                        background-repeat: no-repeat;
                        background-position: 94%;
                    }
                    &.sorting_asc {
                        background-image: url('/img/bg_table_down.png');
                    }
                    &.sorting_desc {
                        background-image: url('/img/bg_table_up.png');
                    }
                    &.individual_l, &.actual_l {
                        max-width: 10.5rem;
                    }
                }
                .list_checkbox {
                    padding-left: 0;
                    padding-right: 0;
                }
                .list_head-arrow {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    svg {
                        /*width: 4px;*/
                        /*height: 7px;*/
                        path {
                            fill: #fff;
                        }
                    }
                    .list_head-arrow-top {
                        transform: rotate(180deg);
                        margin-bottom: 4px;
                    }
                }
                .list_head {
                    display: flex;
                    justify-content: space-between;
                    padding-right: 3.5rem;
                }
                .active-up {
                    .list_head-arrow-top {
                        display: none;
                    }
                }
                .active-bottom {
                    .list_head-arrow-bottom {
                        display: none;
                    }
                }
            }
            tbody {

                td {
                    padding-left: 3rem;
                    background: #fff;
                    border: 1px solid #e4e7ea;
                    height: 4.1rem;
                    vertical-align: middle;
                    font-size: 1.5rem;
                    color: #7c8ca5;
                    word-wrap: break-word;
                    padding-right: 1rem !important;
                    &.list_actions-box, &.individual_l, &.actual_l {
                        width: 24rem;
                        padding: 0;
                        padding-left: 0 !important;
                        padding-right: 0 !important;
                    }
                    &:first-child {
                        width: 7.5rem;
                        text-align: center;
                        margin-top: 0;
                        margin-bottom: 0;
                        padding-right: 0;
                        padding-left: 0 !important;
                    }
                    &.list_checkbox {
                        padding-right: 0 !important;
                    }

                    &.table-danger {
                        background-color: #ed969e;
                    }

                    &.table-info {
                        background-color: #bee5eb;
                    }

                    &.table-success {
                        background-color: #c3e6cb;
                    }

                    &.table-warning {
                        background-color: #ffeeba;
                    }

                }

                tr {
                    &.table-danger {
                        td {
                            background-color: #ed969e;
                        }
                    }
                    &.table-info {
                        td {
                            background-color: #bee5eb;
                        }
                    }
                    &.table-success {
                        td {
                            background-color: #c3e6cb;
                        }
                    }
                    &.table-warning {
                        td {
                            background-color: #ffeeba;
                        }
                    }
                }
                .list_checkbox {
                    padding-left: 0;
                }
                .list_actions {
                    width: 2.4rem;
                    padding-left: 0;
                }
                .format_report {
                    text-align: center;
                    padding-right: 3rem !important;
                }
                .list_actions-box .list_actions-box {
                    display: flex;
                    & > .list_action-btn {
                        width: 33.3%;
                        text-align: center;
                        border: 0;
                        border-right: 1px solid #e4e7ea;
                        height: 4.4rem;
                        background: none;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        button, a {
                            background: none;
                            border: 0;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        }
                        &:last-child {
                            border-right: 0;
                        }
                    }
                }
                .report_status {
                    .red {
                        color: #db637e;
                        font-size: 1.5rem;
                        text-transform: uppercase;
                        font-weight: 600;
                    }
                    .green {
                        color: #86d2a1 !important;
                        font-size: 1.5rem;
                        text-transform: uppercase;
                        font-weight: 600;
                    }
                }
                .col-input {
                    padding: 0 !important;
                    position: relative;
                    .dropdown {
                        width: 100%;
                        .dropdown_box {
                        }
                    }

                    & > div {
                        width: 100%;
                        height: 100%;
                        input {
                            padding-left: 3rem;
                            border: none;
                            width: 100%;
                            height: 100%;
                            font-size: 1.5rem;
                        }
                    }

                    .btn-container {
                        display: flex;
                        /*justify-content: space-around;*/
                        flex-wrap: nowrap;
                        align-items: center;
                        padding-left: 2rem;
                        padding-right: 1rem;
                        height: 100%;

                        &:hover {
                            & > .vv-error-box {
                                opacity: 1;
                                display: block;
                            }
                        }
                        .btn {
                            padding: 0rem;
                        }
                        p {
                            word-break: break-all;
                            padding-right: 1rem;
                        }
                        input[type="file"] {
                            opacity: 0;
                            position: absolute;
                            z-index: -10;
                        }
                        label {
                            cursor: pointer;
                            padding: 0 2rem !important;
                        }
                    }

                    .text-input-container {
                        position: relative;
                        width: 100%;
                        height: 100%;
                        &:hover {
                            & > .vv-error-box {
                                opacity: 1;
                                display: block;

                            }
                        }
                    }

                }
                .dropdown-table {
                    background-image: none;
                    background-color: $white-color;
                    border: none;
                    margin-right: 0;
                    width: 100%;
                    padding-right: 0;
                    img {
                        border: none;
                        background-color: $white-color;
                        background-image: none;
                    }
                }
            }
        }
        .table_footer {
            height: 8rem;
            border: 1px solid #e4e7ea;
            background-color: #d7dde3;
            display: flex;
            align-items: center;
            padding-left: 2.5rem;

        }
        #list-box {
            position: relative;
        }
        .atom-spinner {
            width: 100% !important;
            height: 100% !important;
            z-index: 999999;
            position: absolute;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            .spinner-inner {
                width: 6rem;
                height: 6rem;
            }
        }

        .exFilter {
            th {
                .dropdown_box {
                    width: 150%;
                    min-height: 40rem;
                    height: auto;
                    max-height: 100%;
                    left: -3rem;
                    overflow: hidden !important;
                    .exFilterSorts {
                        border-bottom: 1px solid #e4e7ea;
                        .dropwond_link {
                            border-bottom: 0;
                            height: 3rem;
                        }
                    }
                    .exFilterBox {
                        &.active {
                            .exFilterBody {
                                display: block;
                                li {
                                    form {
                                        display: flex;
                                        input {
                                            &:first-child {
                                                border-right: 1px solid $accent
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    .exFilterBody {
                        display: none;
                        /*width: calc(100% + 1.5rem);*/
                        height: 13.6rem;
                        overflow: auto;
                        /*padding-right: 1.5rem;*/
                        li {
                            input {
                                width: 100%;
                                padding-left: 2.1rem;
                                height: 4.4rem;
                                border: 0;
                                border-bottom: 1px solid rgb(80, 211, 160);
                            }
                        }
                    }
                    .exFilterHead {
                        p {
                            font-weight: 500;
                            padding: 5px 2rem;
                            color: rgb(124, 140, 165);
                            font-size: 1.5rem;
                        }
                    }
                }
            }
        }
        .vdp-datepicker__calendar {
            width: 100%;
            header span {
                font-size: 1.2rem;
            }
        }
        .vdp-datepicker__calendar header .prev:after, .vdp-datepicker__calendar header .next:after {
            border: 4px solid rgba(0, 0, 0, 0);
        }
        .vdp-datepicker__calendar header .prev:after {
            border-right: 5px solid rgb(0, 0, 0);
            margin-left: 0px;
        }
        .vdp-datepicker__calendar header .next:after {
            border-left: 5px solid rgb(0, 0, 0);
            margin-left: 0px;
        }
        .vdp-datepicker__calendar .cell.day-header {
            font-size: 50%;
        }
        .vdp-datepicker__calendar .cell {
            height: 25px;
            line-height: 25px;
            font-size: 1.2rem;
        }
        #list_table-box.exFilter {
            th .dropdown {
                width: 100%;
                align-items: center;
                .btn-dropdown {
                    background: none;
                    border: 0;
                    color: white;
                    font-size: unset;
                    font-weight: 600;
                    padding-left: 0;
                    padding-right: 0;
                    margin-bottom: 0;
                    display: flex;
                    justify-content: space-between;
                    width: 100%;
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    display: block;
                }
                img {
                    margin-left: 0rem;
                }
                .dropdown_box {
                    width: 30rem;
                    input {
                        font-weight: 400;
                        color: #7c8ca5;
                    }
                }
                .dropwond_link {
                    font-weight: 400;
                    font-size: 1.4rem;
                    height: 3rem;
                    display: flex;
                }
            }
        }

        .block{
            /*height: 100%;*/
        }
        .block-row {
            display: flex;
            overflow: hidden;
            @include tablet-big {
                flex-direction: column;
            }

            /*<!--.left-sector,-->*/
            /*<!--.right-sector {-->*/
                /*<!--@include tablet-big {-->*/
                    /*<!--width: 100%;-->*/
                /*<!--}-->*/
                /*<!--@include phone {-->*/
                    /*<!--display: flex;-->*/
                    /*<!--flex-direction: column;-->*/
                /*<!--}-->*/

                /*<!--width: 50%;-->*/
                /*<!--display: grid;-->*/
                /*<!--grid-template-columns: 50% 50%;-->*/
                /*<!--grid-auto-rows: 9.36rem;-->*/
            /*<!--}-->*/
            /*flex-direction: column;*/
            /*max-height: 1000px;*/
            /*<!--display: grid;-->*/
            /*<!--grid-template-columns: 25% 25% 25% 25%;-->*/
            /*<!--grid-template-rows: repeat(100, 9.36rem);-->*/
            /*<!--@include tablet-big{-->*/
            /*<!--grid-template-columns: 50% 50%;-->*/
            /*<!--}-->*/
        }

        .full-width {
            width: 100% !important;
            max-width: 100%;
        }
        .checkbox-disabled {
            pointer-events: none;
        }
    }

    .contractor_list-link {
        ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            li {
                width: 26rem;
                height: 5rem;
                margin-right: 1.5rem;
                border-radius: 4px;
                border: 1px solid #ced0da;
                background-image: linear-gradient(to top, #f1f3f7 0%, #ffffff 100%);
                cursor: pointer;
                a {
                    width: 100%;
                    height: 100%;
                    display: block;
                    font-size: 1.8rem;
                    color: #788699;
                    text-decoration: none;
                    text-align: center;
                    line-height: 4.6rem;
                    transition: .25s all;
                }
                &:hover {
                    border: 1px solid $accent;
                    a {
                        color: $accent;
                    }
                }
                &.active {
                    background: #ffffff;
                    a {
                        color: $accent;
                        font-weight: 700;
                    }
                }
            }
        }
    }

    .rb #list {
        .counter_list {
            b {
                font-weight: normal;
            }
        }
        #list_table_Documents {
            thead {
                th {
                    background: #F2F2F2;
                    color: black;
                    font-weight: 400;
                    height: 2rem;
                    border: 1px solid #e4e7ea;
                    .dropdown .btn-dropdown {
                        font-weight: normal;
                        padding: 0;
                    }

                }
            }
            tbody {
                td {
                    font-weight: 400;
                    color: #000;
                    border: 1px solid #e4e7ea;
                }
            }
        }
    }

    .rb #list #list_table-box.exFilter .dropdown .btn-dropdown {
        color: #000;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter, .fade-leave-to {
        opacity: 0;
    }

    @include desktop-max-little {
        #list {
            #list-box {
                overflow: auto;
            }
            .table_footer {
                width: 112rem;
            }
            .list_table {
                width: 112rem;
            }

        }

    }

    @include tablet-mobile {
        #list {
            h1 {
                margin-bottom: 2rem;
            }
            .list_btn_first-line {
                margin-bottom: 0;
            }
            #search {
                max-width: 100%;
            }
            .buttons-slider {
                display: flex;
                justify-content: flex-end;
                .btn-slider {
                    background: #f9f9f9;
                    border: 1px solid #dfe3e9;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 5.8rem;
                    height: 5.8rem;
                    &:first-child {
                        margin-right: 1rem;
                    }
                    img {
                        width: 6px;
                        opacity: 0.4;
                    }
                }
            }
            #list-box {
                overflow: visible;
                margin-top: 1.5rem;
                #list_table-box {
                    transform: translateX(0);
                    .list_table {
                        overflow: visible;
                        thead {
                            display: block;
                            position: absolute;
                            width: 100%;
                            tr {
                                display: flex;
                                flex-direction: column;
                                padding-bottom: 0;
                                
                                th {
                                    width: 33% !important;
                                    z-index: 999;
                                    padding-left: 1rem;
                                    display: flex;
                                    align-items: center;
                                    height: 5.2rem;
                                    &:first-child {
                                        display: none;
                                    }
                                }
                            }
                        }
                        tbody {
                            transform: initial;
                            height: auto;
                            tr {
                                max-height: none;
                                position: static;
                                overflow: visible;
                                td.list_actions-box {
                                    z-index: 999;
                                    bottom: -4px;
                                    height: 5.4rem !important;
                                }
                            }
                        }
                    }
                    &.open {
                        z-index: 9999;
                        position: relative;
                    }
                }
                .list_table {
                    margin-top: 0rem;
                    overflow-y: hidden;
                    overflow-x: hidden;
                    tbody {
                        height: 200px;
                        transform: translateX(0);
                        border-bottom: 1px solid $border-grey;
                        .b-table-empty-row td {
                            justify-content: center;
                        }
                        td {
                            min-height: 5rem;
                            height: auto !important;
                            align-items: center;
                            padding: 0 !important;
                            text-align: left;
                            padding-left: 0 !important;
                            border-top-left-radius: 3px;
                            border-bottom-left-radius: 3px;
                            background: $bg-mobile-list;
                            display: flex;
                            width: 100%;
                            &:before {
                                border-radius: 3px;
                            }
                            &.list_checkbox,
                            &.list_actions-box,
                            &.individual_l {
                                width: 100% !important;
                                margin: 0;
                                padding: 0 !important;
                                align-items: center;
                                .checkbox-custom {
                                    margin-left: 0;
                                }
                            }
                            &.list_actions-box {
                                justify-content: center;
                                position: fixed;
                                bottom: -1px;
                                transition: .25s all;
                                div {
                                    /*width: 100% !important;*/
                                    border-right: 0;
                                }
                                &:before {
                                    display: none !important;
                                }
                            }
                            &.list_checkbox {
                                display: none;
                            }
                            &:first-child {
                                width: 100% !important;
                            }
                        }
                        tr {
                            max-height: 200px;
                            min-width: 290px;
                            overflow: auto;
                            position: absolute;
                            width: 100%;
                            /*transition: 1s all;*/
                            /*transform: translateX(0);*/
                            /*padding-bottom: 5rem;*/
                            & > [data-label]::before {
                                max-width: 768px;
                                text-align: left;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                width: 33%;
                                background: #788699;
                                height: 5rem;
                                padding: 0 1rem !important;
                                margin-right: 1.5rem;
                                color: white;
                                flex-shrink: 0;
                                display: flex;
                                align-items: center;
                                line-height: 1;
                            }
                            &.slide {
                                opacity: 0;
                                display: none;
                            }
                            &.slide-active {
                                opacity: 1;
                                z-index: 99;
                                display: block;
                            }
                        }
                    }
                }
                &.list_actions_enable {
                    tr {
                        padding-bottom: 4.9rem;
                    }
                    .btn-slider {
                        top: 48%;
                    }
                }
            }
            .list_mobile {
                display: flex !important;
                transition: 0.5s left;
            }
            .count {
                display: none;
                & + p {
                    display: none;
                }
            }
            .list_items {
                .dropdown_box {
                    max-width: 100%;
                }
            }
        }
    }

    .dropdown_box_top {
        top: 0% !important;
        transform: translateY(-100%);
        margin-top: 0 !important;
    }

    .invalid {
        border: 1px solid $invalid !important;
    }

    .vv-error-box {
        position: absolute;
        bottom: 100%;
        right: 0;
        left: 0;
        background-color: $invalid;
        display: none;
        opacity: 0;
        z-index: 100;
        margin-bottom: 0;
        transition: all .3s;
        color: $white-color;
        padding: 1rem;
        &:hover {
            display: none !important;
        }
    }

</style>
