<template>
    <div class="list" id="list">
        <transition-group name="fade" mode="in-out">
            <!--Анимация-->
            <atom-spinner
                    key="1"
                    v-show="loading"
                    :animation-duration="1000"
                    color="var(--accent)"
            />
            <div key="2" v-show="!loading" class="container no-padding">
                <!--Заголовок страницы-->
                <div class="row"
                     v-if="section_title">
                    <div class="col">
                        <h1>{{section_title}}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="links">
                            <!--<div class="link" v-for="link in links" :class="link.class"
                                 @click="goToUrl(link.link_url,link.link_type)">
                                <a>{{link.link_title}}</a>
                            </div>-->
        
                            <div class="link" v-for="link in links" :class="link.class">
                                <router-link :to="link.link_url"> {{link.link_title}} </router-link>
                            </div>
    
                        </div>
                    </div>
                </div>
                <!--Кнопки-->
                <div class="row"
                     v-if="JSON.stringify(buttons) !== JSON.stringify({})">
                    <div class="col">
                        <div class="list_btn_first-line">
                            <router-link class="btn btn-green" v-if="this.buttons.archive_report"
                                         to="/externalReportsByCompanies">{{archive}}
                            </router-link>
                            <router-link class="btn btn-default" v-if="this.buttons.create_report"
                                         to="/externalReportsByCompanies/create"><span>+</span>{{send}}
                            </router-link>
                        </div>
                        <template v-for="action in buttons">
                            <button v-if="action.action_code=='add_line'" class="btn btn-green"
                                    @click="addRow(block)">{{action.name}}
                            </button>

                            <button v-if="action.action_code=='delete'" class="btn btn-green">
                                {{action.name}}
                            </button>
                        </template>
                    </div>
                </div>
                <div class="row d-flex justify-content-between">
                    <!--Элементы пагинации-->
                    <template v-if="!sets">
                        <div class="counter_list col hidden-md-down">
                            <p>{{translateList.Showing}} <b>{{countOf}}-{{countTo}}</b> {{translateList.of}} <b>{{totalRows}}</b>
                            </p>
                            <b-form-select :options="pageOptions" name="count" v-model="perPage" class="count"/>
                            <p>{{translateList.onThePage}}</p>
                        </div>
                    </template>
                    <template v-else-if="sets && sets.list_top">
                        <template v-for="item in sets.list_top">
                            <div class="counter_list col hidden-md-down" v-if="item.code === 'items_per_page'">
                                <p>{{translateList.Showing}} <b>{{countOf}}-{{countTo}}</b> {{translateList.of}} <b>{{totalRows}}</b>
                                </p>
                                <b-form-select :options="pageOptions" name="count" v-model="perPage" class="count"/>
                                <p>{{translateList.onThePage}}</p>
                            </div>
                        </template>
                    </template>
                    <!--Зависимый dropdown-->
                    <div v-if="form_parameters.form_is_dependent"
                         class="col-xl-4 col-lg-5 col-md-6 d-flex align-items-end">
                        <div class="list_items">
                            <span>{{response.dependent.dependent_fields.title}}</span>
                            <div class="dropdown" :class="{active: listItemsS}"
                                 v-if="response.dependent.dependent_fields.type.includes('select')">
                                <button class="btn btn-dropdown">
                                    <span class="dropdown-textover">{{listItemsText}}</span>
                                    <img class="drop-i" src="/img/dropdown-i.png" alt="">
                                </button>  <!-- dropdown -->
                                <transition name="fade">
                                    <div class="dropdown_box">
                                        <ul>
                                            <!--Поиск по элементам dropdown-->
                                            <li>
                                                <input type="text" :placeholder="translateList.Search"
                                                       v-model="filterSelect" class="dropwond_link filterSelect">
                                            </li>
                                            <!--Дефолтное значение-->
                                            <li :class="{selected:defaultSelectId == ''}">
                                                <button class="dropwond_link"
                                                        @click="filterList('',dependent.searchFilterVal,'select')">
                                                    {{translateList.all_select}}
                                                </button>
                                            </li>
                                            <!--Перебор элементов-->
                                            <li v-for="item in filteredList"
                                                :class="{selected:defaultSelectId == item['id'] || item[dependent.searchFilterVal] == listItemsText}">
                                                <button @click="filterList(item[dependent.searchFilterVal],dependent.searchFilterVal,'select','',item.id)"
                                                        class="dropwond_link">
                                                    {{item[dependent.searchFilterVal]}}
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </transition>
                            </div>

                            <div class="dropdown" v-if="response.dependent.dependent_fields.type=='label'">
                                <button class="btn btn-dropdown">{{response.dependent.dependent_fields.current_value}}
                                </button>  <!-- dropdown -->
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row align-items-end margin-top-2">
                    <div class="col hidden-md-down">
    
                        <div class="list_btn">
                            <div class="list_btn_second-line" v-if="sets && sets.list_top_dropdown_actions">
                                <div class="dropdown" :class="{active: listAction}">
                                    <button class="btn btn-dropdown">
                                        {{translateList.Actions}}
                                        <img class="drop-i" src="/img/dropdown-i.png" alt="">
                                    </button>
                                    <div class="dropdown_box">
                                        <ul>
                                            <!--                                       <li v-if="actions && action.code!='add_row'" v-for="action in actions">-->
                                            <!--                                           <button @click="sendAction(action.code, action.link)"-->
                                            <!--                                                   class="dropwond_link">{{action.title}}-->
                                            <!--                                           </button>-->
                                            <!--                                       </li>-->
                                            <li v-for="item in sets.list_top_dropdown_actions">
                                                <button @click="massAction(item.code, item.link)"
                                                        class="dropwond_link">
                                                    {{item.title}}
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--<a class="btn btn-green" v-if="this.buttons.add_contactor">{{add}}</a>-->
                                <a class="btn btn-green" v-for="action in actions" v-if="action.code=='add_row'"
                                   @click="addItem(action.link)">{{action.title}}</a>
                                <!--todo: это костыль, надо проработать вывод отдельных действий -->

                            </div>
    
                            <template v-if="!sets && form_parameters.hideFilter">
                                <a @click="filterToggle" class="btn btn-default list-filter" :class="{active: filterOn}"
                                   v-if="$store.getters.getTheme == 'rb'">
                                    <img src="img/interfacerbl/rbl_filter.svg" class="svg filter-icon" alt="">
                                </a>
                                <a @click="filterToggle" class="btn btn-default " v-else> {{``}} </a>
                            </template>
                            <template v-else>
                                <template v-for="item in sets.list_top_left_command_bar"
                                          v-if="sets && sets.list_top_left_command_bar">
                                    <template v-if="item.code === 'filter'">
                                        <a @click="filterToggle" class="btn btn-default list-filter"
                                           :class="{active: filterOn}"
                                           v-if="$store.getters.getTheme == 'rb'">
                                            <img :src="item.img" class="svg filter-icon">
                                        </a>
                                        <a @click="filterToggle" class="btn btn-default " v-else> {{``}} </a>
                                    </template>
                                    <template v-else>
                                        <button
                                            v-if="item.code === 'add'"
                                            @click="openCard(item.code,'/new')" :id="item.code"
                                            :title="item.title"
                                            :class="item.class">
                                            {{item.title}}
                                        </button>
                                        <button
                                            v-else-if="item.code === 'receive_documents'"
                                            @click="openCard(item.code,'/cardRequest')" :id="item.code"
                                            :title="item.title"
                                            :class="item.class">
                                            {{item.title}}
                                        </button>
                                        <router-link v-else :to="item.to" :id="item.code" :title="item.title" :class="item.class"> {{item.title}}</router-link>
                                    </template>
                                </template>
                            </template>

                        </div>
                    </div>
                    <template v-if="sets && sets.list_top" v-for="item in sets.list_top">
                        <template v-if="item.code === 'items_per_page'">
                            <!--Элементы пагинации для телефона-->
                            <div class="col-8 hidden-md-up order-1">
                                <div class="counter_list-m counter_list">
                                    <p>{{translateList.Showing}} <b>{{countOfMobile}}</b> {{translateList.of}}
                                        <b>{{totalRows}}</b></p>
                                    <b-form-select :options="pageOptions" name="count" class="d-none d-md-block"
                                                   v-model="perPage" id="count"/>
                                    <p>{{translateList.onThePage}}</p>
                                </div>
                            </div>
                            <!--Элементы управление слайдером на телефоне-->
                            <div class="col-8 hidden-md-up order-1">
                                <div class="buttons-slider">
                                    <button class="btn-slider hidden-md-up slider-left" @click="changeSlide('right')">
                                        <img
                                                src="img/left.png" alt=""></button>
                                    <button class="btn-slider hidden-md-up slider-right" @click="changeSlide('left')">
                                        <img
                                                src="img/right.png" alt=""></button>
                                </div>
                            </div>
                        </template>
                    </template>
                    <!--Поиск по элементам по заданому полю-->
                    <template v-if="!sets">
                        <div class="col-xl-4 col-lg-5 col-md-6 col-16 d-flex align-items-end order-0">
                            <div class="search-box">
                                <input type="text" id="search" v-model="filter"
                                       @input="filterList(filter,searchNameVal)"
                                       :placeholder="translateList.Search">
                                <!--<input type="text" id="search" v-model="filter" :placeholder="this.search">-->
                                <button class="search_btn"><img :src="'/img/interfacedashboard/Search_icon.svg'" class="svg" alt=""></button>
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-16 d-flex align-items-end order-0"
                             v-if="sets && sets.list_top_right_command_bar">
                            <template v-for="item in sets.list_top_right_command_bar">
                                <div class="search-box" v-if="item.code === 'search'">
                                    <input type="text" id="search" v-model="filter"
                                           @input="filterList(filter,searchNameVal)"
                                           :placeholder="item.title">
                                    <!--<input type="text" id="search" v-model="filter" :placeholder="this.search">-->
                                    <button class="search_btn"><img :src="item.img" class="svg" alt=""></button>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
                <div v-if="type=='document' && form_parameters.show_list_legend" class="list-legend row margin-top-2">
                    <!--todo caption-->
                    <div class="col-md-2">
                        <div class="list-legend-item">
                            <p>{{translateList.Payment}}:</p>
                        </div>
                    </div>

                    <div class="list-legend-item">
                        <div class="legend-color"></div>
                        <p>{{translateList.Planned}}</p>
                    </div>
                    <div class="list-legend-item">
                        <div class="legend-color legend-grey"></div>
                        <p>{{translateList.Paid}}</p>
                    </div>
                    <div class="list-legend-item">
                        <div class="legend-color legend-red"></div>
                        <p>{{translateList.Overdue}}</p>
                    </div>
                </div>
                <!--Таблица-->
                <div class="row">
                    <div class="col">
                        <div id="list-box">
                            <div id="list_table-box" :class="{exFilter: filterOn,'preventClick': form_parameters.prevent_list_click}">
                                <!--Таблица bootstrap-->
                                <b-table :sort-by="sortBy"
                                         :sort-desc="false"
                                         :empty-filtered-text="translateList.EmptyFilteredText"
                                         :empty-text="translateList.EmptyFilteredText"
                                         ref="table"
                                         show-empty
                                         responsive
                                         v-model="tableValues"
                                         :items="listItems"
                                         stacked="md"
                                         :per-page="perPage"
                                         :filter="filter"
                                         thead-tr-class="resizable"
                                         @row-clicked="showCard"
                                         @sort-changed="sortingChanged"
                                         id="list_table"
                                         tbody-class="carousel"
                                         thead-class="swiper-head"
                                         no-local-sorting
                                         :data-path="$bRoute.path"
                                         :fields="fields"
                                         :hover="true"
                                         :foot-clone="foot_clone"
                                >
                                    <div slot="table-busy" class="text-center text-danger my-2">
                                        <atom-spinner
                                                :animation-duration="1000"
                                                color="var(--accent)"
                                        />
                                        <strong>Loading...</strong>
                                    </div>
                                    <template :slot="'HEAD_'+fielde.key" v-for="fielde in fields" slot-scope="head">
                                        <div class="table__thead__overflow">{{head.label}}</div>
                                    </template>
                                    <!--Слот для фильтров-->
                                    <template :slot="'HEAD_'+field.key" v-for="field in exFilterData" class="filteasd"
                                              slot-scope="head">
                                        <div v-show="filterOn" class="dropdown">
                                            <button class="btn btn-dropdown" @click.stop="filterOpen($event)">
                                                <!--<input type="text"-->
                                                <!--@input="exFilterSelectList(field.key,$event.target.value)"-->
                                                <!--&gt;-->
                                                {{field.label}}
                                            </button>  <!-- dropdown -->
                                            <!--  todo: Перевести фильтры -->
                                            <img class="drop-i" src="/img/dropdown-i.png" alt="">
                                            <transition name="fade">
                                                <div class="dropdown_box dropdown_box_select exFilterDropdown">
                                                    <div class="exFilterSorts">
                                                        <button @click="sortingChanged({sortBy: field.key,sortDesc: false})"
                                                                class="dropwond_link">Сортировать A → Я
                                                        </button>
                                                        <button @click="sortingChanged({sortBy: field.key,sortDesc: true})"
                                                                class="dropwond_link">Сортировать Я → А
                                                        </button>
                                                    </div>
                                                    <div class="exFilterСondition active exFilterBox" v-if="exFilters">
                                                        <div class="exFilterHead"
                                                             @click.stop="$event.target.parentNode.parentNode.classList.toggle('active')">
                                                            <p>Фильтр по условию...</p>
                                                        </div>
                                                        <div class="exFilterBody">
                                                            <ul :class="field.key">
                                                                <li v-for="option in exFilters"
                                                                    :class="{'selected':field.condition.value === option.key}">
                                                                    <button @click="exFilterCondition(option.key,field.key,option.dependent,option,'')"
                                                                            class="dropwond_link">
                                                                        {{option.label}}
                                                                    </button>
                                                                    <template v-if="option.showDependent">
                                                                        <input type="text"
                                                                               :placeholder="option.placeholder"
                                                                               @input="exFilterCondition(option.key,field.key,false,option,$event.target.value)"
                                                                               v-if="option.typeDependent === 'text'">
                                                                        <template
                                                                                v-if="option.typeDependent === 'range'">
                                                                            <form>
                                                                                <input type="text"
                                                                                       :placeholder="option.placeholder[0]"
                                                                                       @input="exFilterCondition(option.key,field.key,false,option,$event.target)">
                                                                                <input type="text"
                                                                                       :placeholder="option.placeholder[1]"
                                                                                       @input="exFilterCondition(option.key,field.key,false,option,$event.target)">
                                                                            </form>
                                                                        </template>
                                                                        <datepicker
                                                                                v-if="option.typeDependent === 'date'"
                                                                                :format="'dd-MM-yyyy'"
                                                                                v-model="exFiltersDate"
                                                                                :placeholder="option.placeholder"
                                                                                @input="exFilterCondition(option.key,field.key,false,option,exFiltersDate)"
                                                                        ></datepicker>
                                                                    </template>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="exFilterValue active exFilterBox">
                                                        <div class="exFilterHead"
                                                             @click.stop="$event.target.parentNode.parentNode.classList.toggle('active')">
                                                            <p>Фильтр по значению...</p>
                                                        </div>
                                                        <div class="exFilterBody active">
                                                            <ul :class="field.key">
                                                                <li v-for="option in type==='document' ? removeDuplicateObject(field.items,'value') : removeDuplicate(field.items)"
                                                                    :class="{'selected': (type ==='document' ? !field.rules.includes(option.value) : !field.rules.includes(option))}">
                                                                    <button @click="exFilterList(option.value,field.key,type)"
                                                                            class="dropwond_link"
                                                                            v-if="type"
                                                                    >
                                                                        {{option || option.value || option.value.length
                                                                    !== 0 ? option.value : '(Пустые)'}}
                                                                    </button>
                                                                    <button @click="exFilterList(option,field.key)"
                                                                            class="dropwond_link"
                                                                            v-else
                                                                    >
                                                                        {{(option && option.length) !== 0 ? option : '(Пустые)'}}
                                                                    </button>
                                                                    <!--<button @click="exFilterList(option,field.key)"-->
                                                                    <!--class="dropwond_link"-->
                                                                    <!--v-else>(Пустые)-->
                                                                    <!--</button>-->
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </transition>
                                        </div>
                                        <div v-show="!filterOn"
                                             :class="{'table__thead__overflow':!form_parameters.list_header_break_line,
                                                      'table_thead_break_line':form_parameters.list_header_break_line
                                                        }"
                                        >{{field.label}}
                                        </div>
                                    </template>
                                    <template v-for="field in fields" :slot="field.key"
                                              slot-scope="items">

                                        <div v-if=" field.type=='text'" class="text-input-container"
                                             :style="{'position': 'relative', 'background-color':items.item[field.key].color}">
                                            <input
                                                    type="text"
                                                    v-model="items.item[field.key].value"
                                                    :name="items.item[field.key].input_name"
                                                    :class="{'invalid':fieldsVV[items.item[field.key].input_name]&&fieldsVV[items.item[field.key].input_name].invalid&&fieldsVV[items.item[field.key].input_name].touched && items.item[field.key].validation}"

                                            >

                                            <div v-if="fieldsVV[items.item[field.key].input_name]&&fieldsVV[items.item[field.key].input_name].invalid&&fieldsVV[items.item[field.key].input_name].touched && items.item[field.key].validation"
                                                 class="vv-error-box">
                                                <span class="vv-error">{{ errors.first('' + items.item[field.key].input_name)}}</span>
                                            </div>

                                        </div>

                                        <div v-else-if=" field.type=='lt-select'" class="dropdown"
                                             @click="checkPosition">
                                            <button class="btn btn-dropdown dropdown-table"
                                                    @click="dropdownClick ">
                                                <input type="text"
                                                       v-model="items.item[field.key].options_data.search"
                                                       class="dropwond_link filterSelect"
                                                       @input="selectSearch(items.item[field.key])"
                                                       @keypress="dropDownKeyPress"
                                                       @keyup="dropDownArrows($event,items.item[field.key])"

                                                >


                                                <!--{{items.value}}-->
                                                <img class="drop-i btn-dropdown"
                                                     src="/img/dropdown-i.png" alt="">
                                            </button>  <!-- dropdown -->
                                            <transition name="fade">
                                                <div class="dropdown_box dropdown_box_select">
                                                    <ul>
                                                        <li v-for="(option, index) in items.item[field.key].options"
                                                            :data-select="index"
                                                            :class="{'li-selected':index==currentOption}"
                                                        >
                                                            <button @click="chooseSelectItem(option,items.item, field.key)"
                                                                    @mouseover="hoverSelectItem"
                                                                    class="dropwond_link">
                                                                {{option[items.item[field.key].options_data.options_field_title]}}
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </transition>
                                        </div>

                                        <div v-else-if=" field.type=='button'"
                                             :class="{
                                                                    'btn-container':true,
                                                                    'invalid':fieldsVV[items.item[field.key].input_name]&&
                                                                    fieldsVV[items.item[field.key].input_name].invalid&&
                                                                    fieldsVV[items.item[field.key].input_name].touched &&
                                                                    items.item[field.key].validation
                                                                    }"
                                             :style="{'background-color':items.item[field.key].color}"
                                        >
                                            <label class="btn btn-green"
                                                   :for="items.item[field.key].input_name">{{items.item[field.key].title}}

                                            </label>

                                            <p class="clip" v-if="items.item[field.key].action_type=='load_file'">
                                                {{items.item[field.key].name}}
                                            </p>

                                            <img v-if="items.item[field.key].value"
                                                 src="/img/staple.png" alt="">

                                            <input :name="items.item[field.key].input_name"
                                                   :id="items.item[field.key].input_name"
                                                   v-if="items.item[field.key].action_type=='load_file'"
                                                   type="file"
                                                   v-validate="items.item[field.key].validation"
                                                   @change="photoLoad(items.item,field.key, $event,block.block_model)">

                                            <div class="vv-error-box" v-if="(fieldsVV[items.item[field.key].input_name]&&
                                                                                              fieldsVV[items.item[field.key].input_name].invalid&&
                                                                                              fieldsVV[items.item[field.key].input_name].touched &&
                                                                                              items.item[field.key].validation)
                                                                                                                                                    ">
                                                <span class="vv-error">{{ errors.first('' + items.item[field.key].input_name) || serverErrors.first(items.item[field.key].input_name)}}</span>
                                            </div>
                                        </div>

                                        <div v-else-if="field.type=='label'"
                                             class="parag-wrapper"
                                             :style="{'background-color':items.item[field.key].color}">
                                            <p>
                                                {{items.item[field.key].value}}
                                            </p>
                                        </div>

                                        <div v-else>
                                            {{$getProp(items.item, field.key)}}
                                        </div>

                                    </template>
                                    <!--Слот для выбора всех элемента-->
                                    <template slot="HEAD_actions" slot-scope="head">
                                        <div class="list_checkbox checkbox checkbox-all">
                                            <label for="checkbox-all" @click.stop>
                                                <input type="checkbox" id="checkbox-all" @click.stop="toggleSelected"
                                                       v-model="allSelected">
                                                <span class="checkbox-custom"><i class="fa fa-check"></i></span>
                                            </label>
                                        </div>
                                    </template>
                                    <!--Слот для выбора одного элемента-->
                                    <template slot="actions" slot-scope="items">
                                        <div class="list_checkbox checkbox checkbox-all" @click.stop>
                                            <label :for="items.item.id">
                                                <input type="checkbox"
                                                       :id="items.item.id"
                                                       :key="items.index"
                                                       v-model="checkedItems"
                                                       :value="items.item.id">
                                                <span class="checkbox-custom"><i class="fa fa-check"></i></span>
                                            </label>
                                        </div>
                                    </template>
                                    <!--Слот для формата отчёта-->
                                    <template slot="report_format" slot-scope="data">
                                        <img :src="'/img/'+data.value+'.png'" alt="">
                                    </template>
                                    <!--Слот для периода отчёта-->
                                    <template slot="report_start_date" slot-scope="items">
                                        <p>{{items.item.report_start_date | moment("DD-MM-YYYY")}}</p>
                                        <p>{{items.item.report_end_date | moment("DD-MM-YYYY")}}</p>
                                    </template>
                                    <!--Слот для статуса отчёта-->
                                    <template slot="report_status" slot-scope="items">
                                        <span :class="{'red':items.item.report_status=='is formed' , 'green':items.item.report_status!='is formed'}">
                                            <span v-if="items.item.report_status == 'is formed' && $store.getters.getLang == 'en'">is formed</span>
                                            <span v-if="items.item.report_status == 'is formed' && $store.getters.getLang == 'ru'">ФОРМИРУЕТСЯ</span>
                                            <span v-if="items.item.report_status == 'created' && $store.getters.getLang == 'en'">created</span>
                                            <span v-if="items.item.report_status == 'created' && $store.getters.getLang == 'ru'">Создан</span>
                                        </span>
                                    </template>
                                    <!--Слот действий элемента-->
                                    <!--<template slot="list_actions" slot-scope="items" @click.stop>-->
                                    <!--<div class="list_actions-box" @click.stop>-->
                                    <!--&lt;!&ndash;Просмотр отчёта&ndash;&gt;-->
                                    <!--<div class="list_action-btn" @click.stop>-->
                                    <!--<button class="showModal"-->
                                    <!--@click="showModal(items.item.id,items.item.report_format,items.item.report_status)"-->
                                    <!--v-if="actions.view_report"-->
                                    <!--:class="{ active: items.item.report_format == 'html' && items.item.report_status == 'сreated'}">-->
                                    <!--<img src="/img/info.svg" class="svg" alt="">-->
                                    <!--</button>-->
                                    <!--</div>-->
                                    <!--&lt;!&ndash;Скачать отчёт&ndash;&gt;-->
                                    <!--<div class="list_action-btn" v-if="actions.download_report && true "-->
                                    <!--@click.stop>-->
                                    <!--<a v-if="items.item.report_file"-->
                                    <!--:download="items.item.report_end_date+'.'+items.item.report_format"-->
                                    <!--:href="'data:application/octet-stream;base64,'+items.item.report_file">-->
                                    <!--<img src="/img/download.svg" class="svg" alt="">-->
                                    <!--</a>-->
                                    <!--<img v-else :class="{ disabled: items.item.report_status != 'сreated'}"-->
                                    <!--src="/img/download.svg" class="svg" alt="">-->
                                    <!--</div>-->
                                    <!--&lt;!&ndash;Удалить отчёт&ndash;&gt;-->
                                    <!--<div class="list_action-btn" v-if="actions.remove_report" @click.stop>-->
                                    <!--<button @click="removeReport(items.item.id)">-->
                                    <!--<img src="/img/remove.svg" class="svg" alt="">-->
                                    <!--</button>-->
                                    <!--</div>-->
                                    <!--</div>-->
                                    <!--</template>-->
                                    <template slot="list_actions" slot-scope="items" @click.stop>

                                        <div class="list_actions-box" v-if="block" @click.stop>
                                            <!--Просмотр отчёта-->

                                            <template v-for="action in block.block_actions">

                                                <div v-if="action.action_code=='view'"
                                                     class="list_action-btn"
                                                     @click.stop>
                                                    <button :class="{showModal:true, active:items.item.document.value}"
                                                            @click="photoPreview(items.item.document.value, items.item.doc_ext.value)">
                                                        <img src="/img/interfacedashboard/info.svg" class="svg" alt="">
                                                    </button>
                                                </div>
                                                <!--Скачать отчёт-->
                                                <div v-if="action.action_code=='download'"
                                                     class="list_action-btn"
                                                     @click.stop>
                                                    <a v-if="items.item.document.value!=''" download
                                                       :href="items.item.document.value">
                                                        <img src="/img/interfacedashboard/download.svg" class="svg"
                                                             alt="">
                                                    </a>
                                                    <a v-else class="disabled">
                                                        <img src="/img/interfacedashboard/download.svg" class="svg"
                                                             alt="">
                                                    </a>
                                                </div>
                                                <!--Удалить отчёт-->
                                                <div class="list_action-btn"
                                                     v-if="action.action_code=='delete'"
                                                     @click.stop>
                                                    <button @click="removeDocument(items.item,block.block_model)">
                                                        <img src="/img/interfacedashboard/remove.svg" class="svg"
                                                             alt="">
                                                    </button>
                                                </div>
                                            </template>
                                        </div>
                                        <div class="list_actions-box" v-else-if="actions" @click.stop>
                                            <!--Просмотр отчёта-->
                                            <div class="list_action-btn" @click.stop>
                                                <!--old modal-->
                                                <!--  <button class="showModal"

                                                          @click="showModal(items.item.id,items.item.report_format,items.item.report_status)"
                                                          v-if="actions.view_report"
                                                          :class="{ active: items.item.report_format == 'html' && items.item.report_status == 'сreated'}">
                                                      <img src="/img/interfacedashboard/info.svg" class="svg" alt="">
                                                  </button>-->
                                                <!--dynamic modal-->
                                                <button class="showModal"
                                                        @click="callmodal(items, $event)"
                                                        v-if="actions.view_report"
                                                        :class="{ active: items.item.report_format == 'html' && items.item.report_status == 'сreated'}">
                                                    <img src="/img/interfacedashboard/info.svg" class="svg" alt="">
                                                </button>
                                            </div>
                                            <!--Скачать отчёт-->
                                            <div class="list_action-btn" v-if="actions.download_report && true "
                                                 @click.stop>
                                                <a v-if="items.item.report_file"
                                                   :download="items.item.report_end_date+'.'+items.item.report_format"
                                                   :href="'data:application/octet-stream;base64,'+items.item.report_file">
                                                    <img src="/img/interfacedashboard/download.svg" class="svg" alt="">
                                                </a>
                                                <img v-else :class="{ disabled: items.item.report_status != 'сreated'}"
                                                     src="/img/interfacedashboard/download.svg" class="svg" alt="">
                                            </div>
                                            <!--Удалить отчёт-->
                                            <div class="list_action-btn" v-if="actions.remove_report" @click.stop>
                                                <button @click="removeReport(items.item.id)">
                                                    <img src="/img/interfacedashboard/remove.svg" class="svg" alt="">
                                                </button>
                                            </div>
                                        </div>

                                    </template>
                                    <!--Слот для отображение disable checkbox-->
                                    <template slot="individual_l" slot-scope="items">
                                        <div class="list_checkbox checkbox checkbox-all">
                                            <label>
                                                <input type="checkbox" :id="items.item.id"
                                                       :checked="items.item.individual_l" disabled>
                                                <span class="checkbox-custom"><i class="fa fa-check"></i></span>
                                            </label>
                                        </div>
                                    </template>
                                    <!--Слот для отображение disable checkbox-->
                                    <template slot="actual_l" slot-scope="items">
                                        <div class="list_checkbox checkbox checkbox-all">
                                            <label>
                                                <input type="checkbox" :id="items.item.id"
                                                       :checked="items.item.actual_l" disabled>
                                                <span class="checkbox-custom"><i class="fa fa-check"></i></span>
                                            </label>
                                        </div>
                                    </template>
                                    <!--Слот для отображение disable checkbox-->
                                    <template slot="use_file_titles_l" slot-scope="items">
                                        <div class="list_checkbox checkbox checkbox-all">
                                            <label>
                                                <input type="checkbox" :id="items.item.id"
                                                       :checked="items.item.use_file_titles_l" disabled>
                                                <span class="checkbox-custom"><i class="fa fa-check"></i></span>
                                            </label>
                                        </div>
                                    </template>
                                    <!--Форматирование даты для отчётов-->
                                    <template slot="created_at" slot-scope="items">
                                        <span class="hidden">{{items.item.created_at}}</span>
                                        <p>{{items.item.created_at | moment("DD-MM-YYYY")}}</p>
                                    </template>

                                    <template slot="att_doc_file_name" slot-scope="items">
                                        <ul v-for="item in items.item.attach_document_file">
                                            <li>{{item.att_doc_file_name}}</li>
                                        </ul>
                                    </template>
                                    <template slot="file_type_id" slot-scope="items">
                                        <ul v-for="item in items.item.attach_document_file">
                                            <li>{{item.file_type_id}}</li>
                                        </ul>
                                    </template>
                                    <template slot="att_doc_file_size" slot-scope="items">
                                        <ul v-for="item in items.item.attach_document_file">
                                            <li>{{item.att_doc_file_size}} Kb</li>
                                        </ul>
                                    </template>
                                    <template slot="attach_document_file" slot-scope="items">
                                        <ul>
                                            <li v-for="item in items.item.attach_document_file">
                                                {{item.type_file[0].file_type_code}}
                                            </li>
                                            <!--<img :src="'/img/'+data.value+'.png'" alt="">-->
                                        </ul>
                                    </template>
                                    <template slot="index" slot-scope="items">
                                       <p> {{items.index + 1}}</p>
                                    </template>
                                    <template slot="image_path" slot-scope="data">
                                        <img :src="data.value" alt="">
                                    </template>
                                    <template slot="status" slot-scope="data">
                                        <div class="status_box">
                                            <img src="img/interfacedashboard/deleted_l.png" class="status_box-deleted"
                                                 v-if="data.index === 0" alt="">
                                            <img src="img/interfacedashboard/completed_l.png"
                                                 class="status_box-completed" v-if="data.index === 1" alt="">
                                            <img src="img/interfacedashboard/actual_l.png" class="status_box-actual"
                                                 v-if="data.index === 2" alt="">
                                            <img src="img/interfacedashboard/deleted_l.png" class="status_box-deleted"
                                                 v-if="data.index === 3" alt="">
                                            <img src="img/interfacedashboard/completed_l.png"
                                                 class="status_box-completed" v-if="data.index === 4" alt="">
                                            <img src="img/interfacedashboard/actual_l.png" class="status_box-actual"
                                                 v-if="data.index === 5" alt="">
                                        </div>
                                    </template>
                                    <!--<template slot="FOOT_bl_leasing_schedule_payment_date" slot-scope="data">-->
                                        <!--Итого-->
                                    <!--</template>-->
                                    <template v-if="list_footer" v-for="field in list_footer" :slot="'FOOT_'+field['bl_schedule_article_name']" slot-scope="data">
                                      <strong> {{field.total_plan}}</strong>
                                    </template>

                                </b-table>
                            </div>
                            <div v-if="!sets" class="table_footer d-flex justify-content-between hidden-md-down">
                                <!--Элементы пагинации-->
                                <div class="counter_list">
                                    <p>{{translateList.Showing}} <b>{{countOf}}-{{countTo}}</b> {{translateList.of}} <b>{{totalRows}}</b>
                                    </p>
                                    <b-form-select :options="pageOptions" name="count" v-model="perPage" class="count"/>
                                    <p>{{translateList.onThePage}}</p>
                                </div>
                                <!--Пагинация-->
                                <b-pagination
                                        :total-rows="totalRows"
                                        :per-page="perPage"
                                        :hide-goto-end-buttons="true"
                                        v-model="currentPage"
                                        @change="changePage"
                                        id="paginator"
                                />
                            </div>
                            <div v-else-if="sets && sets.list_bottom"
                                 class="table_footer d-flex justify-content-between hidden-md-down">
                                <template v-for="item in sets.list_bottom">
                                    <!--Элементы пагинации-->
                                    <div class="counter_list" v-if="item.code === 'items_per_page'">
                                        <p>{{translateList.Showing}} <b>{{countOf}}-{{countTo}}</b> {{translateList.of}} <b>{{totalRows}}</b>
                                        </p>
                                        <b-form-select :options="pageOptions" name="count" v-model="perPage"
                                                       class="count"/>
                                        <p>{{translateList.onThePage}}</p>
                                    </div>
                                    <!--Пагинация-->
                                    <b-pagination
                                            v-if="item.code === 'pagination'"
                                            :total-rows="totalRows"
                                            :per-page="perPage"
                                            :hide-goto-end-buttons="true"
                                            v-model="currentPage"
                                            @change="changePage"
                                            id="paginator"
                                    />
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition-group>
        <!--<div class="devTooltip" v-if="dev">-->
            <!--Страница в разработке-->
        <!--</div>-->
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
    import {mapGetters} from 'vuex';

    export default {
        name: 'List',
        props: ['block', 'model', 'type'],
        data: function () {
            return {
                sets: false,
                dev: false,
                exFilters: [],
                exFiltersDate: '',
                loading: true, // Флаг отображения preloader
                block_model: '',
                response: {},
                form_parameters: {
                    form_is_dependent: false,
                },
                dependent: {
                    searchFilterVal: '',
                },
                searchNameVal: '',
                listAction: false,
                checkedItems: [],
                listItemsS: false,
                listItems: [],
                filterSelect: '',
                mobileListItems: {},
                listItemsAll: [],
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
                filter: null,
                totalRows: null,
                currentPage: 1,
                countOfMobile: 1,
                quantityRecord: 1,
                perPage: 10,
                allSelected: false,
                pageOptions: [10, 20, 50, 100],
                asyncReports: '',
                fields: [],
                buttons: {},
                actions: {},
                exFilterData: [],
                links: [],
                translateList: [],
                itemsDependent: [],
                filterOn: false,
                list_footer:null,
                foot_clone:false
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
            filteredList() {
                // Фильтрация массива `itemsDependent`
                let res = this.itemsDependent.filter((elem) => {
                    if (elem[this.dependent.searchFilterVal] === '' || this.filterSelect === '') return true;
                    else return elem[this.dependent.searchFilterVal].toLowerCase().indexOf(this.filterSelect.toLowerCase()) > -1;
                });
                return this.removeDuplicateObject(res, this.dependent.searchFilterVal);
            },
        },
        watch: {
            checkedItems(a, b) {
                this.allSelected = (this.tableValues.length === a.length && a.length !== 0) ? true : false;
            },
            perPage(a, b) {
                let self = this;
                if (a !== b) {
                    this.clearSelected();
                    this.listItems = this.mobileListItems.slice((this.countOf - 1), this.countTo);
                }
            },
            currentPage(a, b) {
                if (a !== b) {
                    this.clearSelected();
                }
            },
            filter(a, b) {
                if (a !== b) {
                    this.clearSelected();
                }
            },
            async(a, b) {
                if (a !== b) {
                    this.clearSelected();
                }
            },
        },
        methods: {
            /**
             * Создание новой записи
             */
            async openCard(code,url){
                //owner_id:this.defaultSelectId
                if(this.form_parameters.form_is_dependent){
                    var obj = {controllerId : this.$bRoute.params[this.$bRoute.meta.id_field] };
                    if(this.dependent && this.dependent.dependent_fields && this.dependent.dependent_fields.type==='select'){
                        if(this.defaultSelectId===''){
                            this.$toast.error('Выберите зависимый справочник', '', {position: 'topRight'});
                            return;
                        }
                        obj['owner_id']=this.defaultSelectId;
                    }
                    this.$store.commit("setParamCard", obj);
                }
                this.$bRouter.push(this.$bRoute.path +  url);
            },
            callmodal(items, e) {
                /*console.log( items.item.id,items.item.report_format,items.item.report_status );*/
                var self = this, btn = e.target.parentElement;
                btn.classList.remove('active');
                btn.disabled = true;
                this.$http.post('/report/html/file/modal/ajax', {
                    id: items.item.id,
                }).then(res => {
                    // this.$modal.show('modalHtmlReport');
                    /*this.$store.commit('showModal', {type: 'htmlModal', html: res.data});*/
                    btn.disabled = false;
                    btn.classList.add('active');
                    self.$parent.$refs.dmodal.htmlmodal({modal: {htmlModal: true, html: res.data}});
                    // setTimeout(function() {
                    //     $('#modal_view_report').html(res.data);
                    //     $('#modalHtml').css('top',window.pageYOffset);
                    // }, 100);
                });

                //showModal(items.item.id,items.item.report_format,items.item.report_status)
            },
            /**
             * Массовые действие
             * @param {string} code
             * @param {string} url
             */
            massAction(code, url) {
                this.$http.post(url, {items: this.checkedItems, main_model:this.form_parameters.form_base_data_model})
                    .then(res => {
                        //обновление элементов списка после действия
                        this.componentData(this.$bRoute.meta.route, {id: this.$bRoute.params[this.$bRoute.meta.id_field]});
                    })
                    .catch(error=>{
                        this.$toast.error(error.response.data.message, '' + error.response.status, {position: 'topRight'})
                    })
            },
            goToUrl(url, type) {
                this.$store.commit("setFaqid", 26);
                if (type == 'internal') {
                    this.$bRouter.push({path: url});
                } else {
                    this.$bRouter.push({path: this.$bRoute.path + url});
                }
            },
            filterOpen(event) {
                let status = false;
                let index = null;
                let elemTh = $(event.target).parent().parent();
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
            sortingChanged(ctx) {
                function compare(a, b) {
                    if (a[ctx.sortBy] < b[ctx.sortBy])
                        return -1;
                    if (a[ctx.sortBy] > b[ctx.sortBy])
                        return 1;
                    return 0;
                }

                if (!ctx.sortDesc) {
                    this.listItems = this.mobileListItems.sort(compare).slice((this.countOf - 1), this.countTo)
                } else {
                    this.listItems = this.mobileListItems.sort(compare).reverse().slice((this.countOf - 1), this.countTo);
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
            filterList(filterName, filterCol, type, start, itemId) {
                // Проверка типа фильтра
                if (type === 'select' && !start) {
                    if (filterName !== '') {
                        this.listItemsText = filterName;
                        this.defaultSelectId = itemId;
                    } else {
                        this.listItemsText = this.translateList.all_select;
                        this.defaultSelectId = '';
                    }
                }
                // Фильтрация
                this.mobileListItems = this.listItemsAll.filter((elem) => {
                    var columnVal = this.$getProp(elem, filterCol)
                    if (filterName === '') return true;
                    if (!columnVal || !filterName) return false;
                    if (type === 'select') {
                        return columnVal.toLowerCase() === (filterName.split(' - ')[1] || filterName).toLowerCase();
                        //return elem[filterCol].toLowerCase() === filterName.toLowerCase();
                    } else {
                        if (filterCol === '') { // todo заменить на флаг Глобальный поиск
                            return JSON.stringify(elem).toLowerCase().includes(filterName.toLowerCase());
                        }
                        return columnVal.toLowerCase().includes(filterName.toLowerCase());
                    }
                });
                this.listItems = this.mobileListItems.slice(0, 100);
                this.totalRows = this.mobileListItems.length;
                if (window.innerWidth < 768) {
                    this.listItems = this.mobileListItems.slice(0, 1);
                    $('.list_mobile').attr('data-item', 1);
                    this.currentPage = 1;
                    this.countOfMobile = 1;
                }
                this.$refs.table.refresh();
            },
            changeAsyncReports() {
                this.$store.dispatch('asyncReports');
            },
            sendAction(action_code, url) {
                this.$http.post(url, {
                    items: self.checkedItems,
                    action_code: action_code
                }).then(res => {
                    console.log(res.data);
                    this.listItems = res.data; //обновление элементов списка после удаления
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
            showCard(id, key, i, e) {
                if (this.form_parameters.prevent_list_click) return;
                if (this.$bRoute.path !== '/externalReportsByCompanies' && this.$bRoute.path !== '/documents') {
                    let id = this.form_parameters.form_type_list &&
                        this.form_parameters.form_type_list.form_card_col ?
                        this.tableValues[key][this.form_parameters.form_type_list.form_card_col] :
                        this.tableValues[key].id
                    this.$bRouter.push({path: this.$bRoute.path + '/' + id})
                }
            },
            toggleSelected() {
                if (this.checkedItems.length === this.tableValues.length) {
                    this.checkedItems = [];
                    this.allSelected = false;
                } else {
                    this.checkedItems = this.tableValues.map(element => element.id);
                    this.allSelected = true;
                }
            },
            clearSelected() {
                this.allSelected = false;
                this.checkedItems = [];
            },
            /**
             * Получение ширин колонок из localStorage
             * @param {string} name
             */
            getWidthFromLocal(name) {
                // Проверка `localStorage` на наличие
                if (localStorage.getItem(name)) return localStorage.getItem(name).split(',');
                // Вернуть строе значение
                return this.sizeFields;
            },
            /**
             * Добавление возможности изменять ширину колонок,
             * Сохранение ширин в localStorage
             * @param {string} name
             * @param {object} sizes
             * @param {boolean} localWidth
             * @param {boolean} removeActions
             */
            addResizeTable(name, sizes, localWidth,removeActions) {
                let self = this; // Vue this
                let thElem; // Активный `th`
                let thSumWidth; // сумма ширин для `th` активного + следующий после активного
                let startOffset; // Начальное значение курсора мыши при клике на элемент `grip`
                let arrayTh = document.querySelectorAll('#list_table th'); // Массив `thead th`
                let widthTable = document.querySelectorAll('.list table[data-path="' + this.$bRoute.path + '"]')[0].offsetWidth; // Ширина таблицы

                // Цикл колонок thead
                arrayTh.forEach((th, index) => {
                    if (arrayTh.length > index + 1 || removeActions) {
                        if (sizes[index] && localWidth){
                            th.style.width = sizes[index] + '%';
                        }
                        th.style.width = widthTable * parseInt(th.style.width) / 100 + 'px'; // Перевод % в px
                        // Создание и заполнение дополнительного элемента

                        var grip = document.createElement('div');
                        grip.classList.add('grip');
                        grip.innerHTML = "&nbsp;";
                        th.appendChild(grip);
                        // end
                        // Добавление события `mousedown` на созданый дополнительный элемент
                        grip.addEventListener('mousedown', function (e) {
                            thElem = th;
                            startOffset = th.offsetWidth - e.pageX;
                            thSumWidth = th.offsetWidth + th.nextElementSibling.offsetWidth;
                            e.preventDefault();
                        })
                    }
                })

                // Добавление события `mousemove` на document
                document.addEventListener('mousemove', function (e) {
                    // Проверка на существование активного th`
                    // Проверка на минимальную ширину колонки
                    if (!thElem || thSumWidth - (startOffset + e.pageX) < 90 || thSumWidth - (startOffset + e.pageX) > thSumWidth - 90) return false
                    thElem.style.width = startOffset + e.pageX + 'px'; // Новое значение ширины для колонки
                    thElem.nextElementSibling.style.width = thSumWidth - parseInt(thElem.style.width) + 'px'; // Новое значение ширины для следующей колонки

                });
                // Добавление события `mouseup` на document
                document.addEventListener('mouseup', addResize);

                function addResize() {
                    // Массив ширин колонок в `%`
                    let arrWidthTh = [];
                    arrayTh.forEach((th, i) => {
                        // Заполнение массива
                        arrWidthTh.push(Math.round(100 / (widthTable / th.offsetWidth)));
                    })
                    // При изменении ширины колонок идёт запись в localStorage
                    if (arrWidthTh[0] != 0) localStorage.setItem(self.$bRoute.path, arrWidthTh);
                    thElem = undefined; // Удаление активного `th`
                }

                this.$refs.table.refresh(); // Обновление таблицы
            },
            mobileTable() {
                let self, list, table;
                self = this;
                list = $('#list_table .carousel').addClass('list_mobile');
                table = $('#list-box');
                self.perPage = 1;
                let timerReadyTable = setInterval(function () {
                    let lengthTr = $(list).find('tr').length;
                    if (lengthTr === self.totalRows || lengthTr === self.perPage) {
                        clearInterval(timerReadyTable);
                        $(list).attr('data-item', '1');
                        if ($(list).children('tr').children('.list_actions-box').length > 0) $(table).addClass('list_actions_enable');
                        self.countOfMobile = 1;
                        $("#list_table").swipe({
                            allowPageScroll: "auto",
                            swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                                self.changeSlide(direction);
                            }
                        });
                    }
                }, 500)
            },
            destroyMobileTable() {
                $('.list_mobile').css('transform', 'initial').removeClass('list_mobile');
                this.perPage = 20;
                this.listItems = this.mobileListItems.slice(0, this.perPage);
                this.totalRows = this.mobileListItems.length;
            },
            resizeWindow() {
                let self = this;
                window.onresize = function (event) {
                    if (window.innerWidth < 768 && !$('#list_table tbody').hasClass('list_mobile')) {
                        self.mobileTable();
                    } else if (window.innerWidth > 768 && $('#list_table tbody').hasClass('list_mobile')) {
                        self.destroyMobileTable();
                    }
                    // Проверка размера экрана, если размер меньше 768 включить "Мобильную таблицу"
                    // if (window.innerWidth < 768) {
                    //     self.mobileTable();
                    // }
                };
            },
            changeSlide(direction) {
                let currentPage, list;
                list = $('.list_mobile');
                if (direction === 'left' && this.countOfMobile < this.totalRows) {
                    currentPage = parseInt($(list).attr('data-item'));
                    this.listItems = this.mobileListItems.slice(currentPage, currentPage + 1);
                    $(list).attr('data-item', ++currentPage);
                    this.countOfMobile++;
                } else if (direction === 'right' && 1 < this.countOfMobile) {
                    currentPage = parseInt($(list).attr('data-item'));
                    this.listItems = this.mobileListItems.slice(currentPage - 2, currentPage - 1);
                    $(list).attr('data-item', --currentPage);
                    this.countOfMobile--;
                }
            },
            /**
             * Готовность таблицы
             * @param {string} page
             */
            readyTable(page) {
                let removeActions = false;
                let localWidth = false;
                // Отключение preloader
                this.loading = false;
                if( (this.sets &&
                    this.sets.list_top_dropdown_actions &&
                    this.sets.list_top_dropdown_actions.lenth > 0 &&
                    this.fields[0].key === 'actions') ||
                    (this.sets && !this.sets.list_top_dropdown_actions && this.fields[0].key === 'actions') ||
                    (!this.sets &&
                    this.fields[0].key === 'actions')
                ){
                    removeActions = true;
                    this.fields.shift();

                }
                this.$nextTick(() => {
                    this.imgtosvg();
                    if (this.dev) {
                        this.fields.push({key: 'status', thStyle: "width: 6%", class: "status"})
                    }
                    // Получение ширины из LocalStorage
                    this.sizeFields = this.getWidthFromLocal(this.$bRoute.path);

                    if (this.sizeFields.length === this.fields.length){
                        localWidth = true;
                    }
                    // Добавление ранее полученой ширины в таблицу
                    this.addResizeTable(page, this.sizeFields, localWidth,removeActions);
                    // Проверка на мобильную версию
                    if (window.innerWidth < 768) {
                        // Построение мобильной таблицы
                        this.mobileTable();
                    }
                    // Обновление таблицы
                    this.$refs.table.refresh();
                })
            },
            /**
             * Удаление дубликатов из массива
             * @param {array} arr
             * @return {array} arr
             */
            removeDuplicate(arr) {
                return arr.filter((item, pos, self) => self.indexOf(item) === pos);
            },
            removeDuplicateObject(array, field) {
                if(array[0]===undefined)return false;
                return array.filter((obj, pos, arr) => {
                    return arr.map(mapObj => mapObj[field]).indexOf(obj[field]) === pos;
                });
            },
            exFilter() {
                this.fields.forEach((e, i) => {
                    e.items = this.mobileListItems.map(elem => this.$getProp(elem, e.key))
                        .filter((item, pos, self) => self.indexOf(item) === pos);
                    this.exFilterData.push({
                        key: e.key,
                        itemsAll: e.items,
                        items: e.items,
                        label: e.label,
                        rules: [],
                        condition: {},
                        fixed: false
                    });
                })
                // this.refreshFilter();
            },
            exFilterList(value, key) {
                this.exFilterData.forEach((e, i) => {
                    if (e.key === key) {
                        e.fixed = true;
                        let findRemove = e.rules.findIndex(el => el === value);
                        if (findRemove !== -1) e.rules.splice(findRemove, 1);
                        else e.rules.push(value);
                    }
                });
                this.refreshFilter();
            },
            exFilterReset() {
                this.exFilterData.forEach(e => {
                    e.rules = [];
                });
                // $('.exFilterValue ul li').addClass('selected');
                this.exFilterData.forEach(e => {
                    e.condition = {};
                    this.mobileListItems = this.listItemsAll;
                    this.refreshItems();
                });
                // $('.exFilterСondition ul li').removeClass('selected');
            },
            exFilterCondition(optionKey, fieldKey, dependent, option, value) {
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
                        this.exFilterData.forEach((e, i) => {
                            if (e.key === fieldKey) {
                                if (JSON.stringify(e.condition) !== '{}') {
                                    if (e.condition.value === optionKey && value.length !== 0) {
                                        e.condition = {};
                                        this.refreshItems();
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
                        this.refreshFilter();
                        return false;
                    } else {
                        return false;
                    }
                }
                this.exFilterData.forEach((e, i) => {
                    if (e.key === fieldKey) {
                        if (JSON.stringify(e.condition) !== '{}') {
                            if (e.condition.value === optionKey && value.length === 0) {
                                e.condition = {};
                                this.refreshItems();
                            } else {
                                e.condition = {value: optionKey, valueT: value};
                            }
                        } else {
                            e.condition = {value: optionKey, valueT: value};
                        }
                    }
                });
                this.refreshFilter();
            },
            refreshItems() {
                if (window.innerWidth < 768) {
                    this.listItems = this.mobileListItems.slice(0, 1);
                    this.totalRows = this.mobileListItems.length;
                    $('.list_mobile').attr('data-item', 1);
                    this.currentPage = 1;
                    this.countOfMobile = 1;
                } else {
                    this.listItems = this.mobileListItems.slice(0, 100);
                    this.totalRows = this.mobileListItems.length;
                }
                this.$refs.table.refresh();
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
            notfilled(key) {
                this.mobileListItems = this.mobileListItems.filter(e =>
                    e[key].length === 0
                );
            },
            filled(key) {
                this.mobileListItems = this.mobileListItems.filter(e =>
                    e[key].length !== 0
                );
            },
            textcontains(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                    this.type === 'document' ?
                        (this.$getProp(e[key], 'value').toString().toLowerCase() || false).includes(text.toLowerCase()) :
                        e[key].toLowerCase().includes(text.toLowerCase())
                );
            },
            textnotcontains(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                    // !(e[key].toLowerCase().includes(text.toLowerCase()||false))
                    this.type === 'document' ?
                        !(this.$getProp(e[key], 'value').toString().toLowerCase() || false).includes(text.toLowerCase()) :
                        !e[key].toLowerCase().includes(text.toLowerCase())
                );
            },
            textstarts(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                    // (e[key].toLowerCase().indexOf(text.toLowerCase() || '')) === 0
                    this.type === 'document' ?
                        this.$getProp(e[key], 'value').toString().toLowerCase().startsWith(text.toLowerCase()) :
                        e[key].toLowerCase().startsWith(text.toLowerCase())
                );
            },
            textends(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                    // e[key].toLowerCase().endsWith(text.toLowerCase() || '')
                    this.type === 'document' ?
                        this.$getProp(e[key], 'value').toString().toLowerCase().endsWith(text.toLowerCase()) :
                        e[key].toLowerCase().endsWith(text.toLowerCase())
                );
            },
            textexactly(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                        this.type === 'document' ?
                            this.$getProp(e[key], 'value').toString().toLowerCase() === text.toLowerCase() :
                            e[key].toLowerCase() === text.toLowerCase()
                    // return e[key].toLowerCase() === text.toLowerCase();
                );
            },
            date(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                        this.type === 'document' ?
                            this.$moment(this.$getProp(e[key], 'value')).isSame(this.$moment(text, 'DD-MM-YYYY'), 'day') :
                            this.$moment(e[key]).isSame(this.$moment(text, 'DD-MM-YYYY'), 'day')
                    // return e[key] === text;
                );
            },
            dateto(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                        this.type === 'document' ?
                            this.$moment(this.$getProp(e[key], 'value')).isBefore(this.$moment(text)) :
                            this.$moment(e[key]).isBefore(this.$moment(text))
                    // return new Date( Date.parse(e[key].split('-').reverse().join('-'))) < new Date( Date.parse(text));
                );
            },
            datefrom(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                    this.type === 'document' ?
                        this.$moment(this.$getProp(e[key], 'value')).isAfter(this.$moment(text)) :
                        this.$moment(e[key]).isAfter(this.$moment(text))
                );
            },
            /**
             * Получение универсального JSON
             * @param {string} Request
             * @param {object} params
             */
            componentData(Request, params = null) {
                this.$http.post(Request, params)
                    .then(res => {
                        this.response = res.data;
                        // Название модели
                        this.block_model = res.data.tabs[0].blocks[0].block_model;
                        // Параменты формы
                        this.form_parameters = res.data.form_parameters;
                        // Зависимость формы к select
                        this.form_parameters.form_is_dependent = res.data.form_parameters.form_is_dependent;
                        // Название страницы
                        this.section_title = res.data.form_parameters.form_title;
                        // Получение всех элементов
                        this.mobileListItems = res.data.main_data_models[this.block_model];
                        // Получение количества элементов
                        this.totalRows = this.mobileListItems.length;
                        // По какому полю соверщать поиск
                        this.searchNameVal = res.data.form_parameters.form_type_list.form_search_field;
                        // Кол-во элементов в списке
                        this.totalRows = res.data.main_data_models[this.block_model].length;
                        // Все элементы
                        this.listItemsAll = res.data.main_data_models[this.block_model];
                        // Сеты
                        this.sets = res.data.sets || false;
                        if (res.data.actions)
                            this.actions = res.data.actions.actions_list;
                        if (res.data.form_parameters.form_is_dependent) {
                            this.dependent = res.data.dependent;
                            if (res.data.dependent.dependent_fields.type.includes('select')) {
                                // Начальное значение select
                                this.defaultSelectId = res.data.dependent.dependent_fields.options_data.options_field_id_value;
                                // По какому полю фильтровать
                                this.dependent.searchFilterVal = res.data.dependent.dependent_fields.options_data.options_field_title;
                                // Получение всех элементов
                                if (res.data.add_data_models) {
                                    this.itemsDependent = res.data.add_data_models[res.data.dependent.dependent_fields.options_data.options_data_model]

                                } else {
                                    this.itemsDependent = res.data.main_data_models[this.block_model];
                                }
                                if (this.defaultSelectId === '') {
                                    this.listItemsText = this.translateList.all_select;
                                } else {
                                    // Поиск начального значение поля
                                    this.itemsDependent.forEach((elem) => {
                                        if (elem['id'] == this.defaultSelectId) {
                                            this.listItemsText = elem[this.dependent.searchFilterVal];
                                            this.filterList(elem[this.dependent.searchFilterVal], this.dependent.searchFilterVal, 'select', 1)
                                        }

                                    });
                                }
                            }
                        }
                        this.links = res.data.links;
                        // Проверка на мобильную версию
                        if (window.innerWidth < 768) {
                            this.perPage = 1;
                        }
                        this.listItems = this.mobileListItems.slice(0, this.perPage);
                        // Колонки в списке
                        this.fields = res.data.tabs[0].blocks[0].block_fields;
                        // Проверка на готовность таблицы
                        this.readyTable(this.form_parameters.form_code);
                        this.exFilter();

                    })
                    .catch((error) => {
                        if(error.response.status == 403){
                            this.$toast.error('Ошибка доступа', ''+error.response.status, {position: 'topRight'})

                        }

                        if (error.response) {
                            this.$bRouter.push({path: '/' + error.response.status})
                        }
                    });
            },
            refreshFilter() {
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
                this.mobileListItems = this.listItemsAll;
                this.exFilterData.forEach(filter => {
                    filter.itemsAll = [];
                    this.mobileListItems = this.mobileListItems.filter(item => {
                        if (item.status === 'deleted') return false;
                        if (this.$getProp(item, filter.key)) filter.itemsAll.push(this.$getProp(item, filter.key));
                        return this.type === 'document' ? !filter.rules.includes(item[filter.key].value) : !filter.rules.includes(this.$getProp(item, filter.key))
                    })
                })
                let itemsFilter = [];
                this.exFilterData.forEach((e, index) => {
                    switch (e.condition.value) { //todo
                        case 'notfilled':
                            self.notfilled(e.key);
                            break
                        case 'filled':
                            self.filled(e.key);
                            break
                        case 'textcontains':
                            self.textcontains(e.key, e.condition.valueT);
                            break
                        case 'textnotcontains':
                            self.textnotcontains(e.key, e.condition.valueT);
                            break
                        case 'textstarts':
                            self.textstarts(e.key, e.condition.valueT);
                            break
                        case 'textends':
                            self.textends(e.key, e.condition.valueT);
                            break
                        case 'textexactly':
                            self.textexactly(e.key, e.condition.valueT);
                            break
                        case 'date':
                            self.date(e.key, e.condition.valueT);
                            break
                        case 'dateto':
                            self.dateto(e.key, e.condition.valueT);
                            break
                        case 'datefrom':
                            self.datefrom(e.key, e.condition.valueT);
                            break
                        case 'more':
                            self.more(e.key, e.condition.valueT);
                            break
                        case 'moreorequal':
                            self.moreorequal(e.key, e.condition.valueT);
                            break
                        case 'less':
                            self.less(e.key, e.condition.valueT);
                            break
                        case 'lessorequal':
                            self.lessorequal(e.key, e.condition.valueT);
                            break
                        case 'equal':
                            self.equal(e.key, e.condition.valueT);
                            break
                        case 'notequal':
                            self.notequal(e.key, e.condition.valueT);
                            break
                        case 'between':
                            self.between(e.key, e.condition.valueT, e.condition.valueTwo);
                            break
                        case 'notbetween':
                            self.notbetween(e.key, e.condition.valueT, e.condition.valueTwo);
                            break
                    }
                });
                this.exFilterData.forEach((filter, index) => {
                    if (!filter.fixed) {
                        filter.items = filter.itemsAll.filter(item => {
                            let status = 0;
                            self.mobileListItems.map(e => {
                                if (this.$getProp(e, filter.key) === item) status++;
                            });
                            return status > 0;
                        });
                    }
                });
                this.refreshItems();
            },
            more(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                    this.type === 'document' ?
                        parseInt(text) < parseInt(this.$getProp(e[key], 'value')) :
                        parseInt(text) < parseInt(e[key])
                );
            },
            moreorequal(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                    // return parseInt(text) <= parseInt(e[key])
                    this.type === 'document' ?
                        parseInt(text) <= parseInt(this.$getProp(e[key], 'value')) :
                        parseInt(text) <= parseInt(e[key])
                );
            },
            less(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                    this.type === 'document' ?
                        parseInt(text) > parseInt(this.$getProp(e[key], 'value')) :
                        parseInt(text) > parseInt(e[key])
                );
            },
            lessorequal(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                    this.type === 'document' ?
                        parseInt(text) >= parseInt(this.$getProp(e[key], 'value')) :
                        parseInt(text) >= parseInt(e[key])
                );
            },
            equal(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                    this.type === 'document' ?
                        parseInt(text) === parseInt(this.$getProp(e[key], 'value')) :
                        parseInt(text) === parseInt(e[key])
                );
            },
            notequal(key, text = '') {
                if (text === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                    this.type === 'document' ?
                        parseInt(text) !== parseInt(this.$getProp(e[key], 'value')) :
                        parseInt(text) !== parseInt(e[key])
                );
            },
            between(key, first = '', second = '') {
                if (first === '' || second === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                    this.type === 'document' ?
                        parseInt(first) < parseInt(this.$getProp(e[key], 'value')) && parseInt(this.$getProp(e[key], 'value')) < parseInt(second) :
                        parseInt(first) < parseInt(e[key]) && parseInt(e[key]) < parseInt(second)
                );
            },
            notbetween(key, first = '', second = '') {
                if (first === '' || second === '') return false;
                this.mobileListItems = this.mobileListItems.filter(e =>
                        this.type === 'document' ?
                            (parseInt(first) < parseInt(this.$getProp(e[key], 'value')) && parseInt(this.$getProp(e[key], 'value')) > parseInt(second)) || (parseInt(first) > parseInt(this.$getProp(e[key], 'value')) && parseInt(this.$getProp(e[key], 'value')) < parseInt(second)) :
                            (parseInt(first) < parseInt(e[key]) && parseInt(e[key]) > parseInt(second)) || (parseInt(first) > parseInt(e[key]) && parseInt(e[key]) < parseInt(second))
                    // return (parseInt(first) < parseInt(e[key]) && parseInt(e[key]) > parseInt(second)) || (parseInt(first) > parseInt(e[key]) && parseInt(e[key]) < parseInt(second))
                );
            },
            addItem(link) {
                this.$store.commit('changeAddingLink', link);
                this.$store.commit('changeAddingDependencyField', this.$bRoute.params.id);
                this.$bRouter.push(this.$bRoute.path + '/new')
            },
            filterToggle() {
                this.filterOn = !this.filterOn;
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
                        } else {

                            item[key].value = null; // clean the model
                            item[key].name = null // clean the model
                            item.doc_size.value = null;  //clean the model
                            item.doc_ext.value = null;// clean the model
                            this.errors.items.forEach(err => {

                                if (err.field === item[key].input_name) {
                                    this.$toast.error(err.msg, '', {position: 'topRight'});
                                }
                            })
                            if (e.target.classList.contains('notVerify')) {
                                this.listItems.pop();
                                this.listItemsAll.pop();
                                return false;
                            }
                        }
                    });
                } else {


//                    reader.readAsDataURL(e.target.files[0]);

//                    this.refreshFilter(model);


                }


            },
            addRow(block) {
                let model = block.block_model;

                var obj = JSON.parse(JSON.stringify(this.listItems[0]));

                for (var item in obj) {

                    if (item == 'status') obj[item] = 'new'; // меняем флаг, чтобы видеть, что строка новая


                    else if (item == 'id') {
                        obj[item] = model + '_new_id_' + block.current_new_id; // меняем флаг, чтобы видеть, что input  новая todo проверить надо ли
                        block.current_new_id++; // увеличиваем счетчик текущего нового айдишника
                    } else if (item == '_rowVariant') {
                        obj[item] = '';
                    } else {
                        obj[item].value = null;
                        if (item == 'document') {
                            obj[item].input_name = model + '_new_' + block.current_new_id;
                            obj[item].name = null;
                        }
                    }


                }

                this.listItems.push(obj);
                this.listItemsAll.push(obj);
                this.refreshFilter();
                this.$nextTick(() => {
                    let self = this;
                    let inputFile = document.querySelectorAll('tbody tr:last-child input[type="file"]')[0];
                    inputFile.classList.add('notVerify');
                    inputFile.onclick = charge
                    inputFile.click();

                    function charge() {
                        document.body.onfocus = checkFile
                    }

                    function checkFile() {
                        let inputFile = document.querySelectorAll('tbody tr:last-child input[type="file"]')[0];
                        setTimeout(function () {
                            if (!inputFile.value.length) {
                                self.listItems.pop();
                                self.listItemsAll.pop();
                            }
                        }, 500)
                        document.body.onfocus = null
                    }
                })
                // this.mobileListItems[model].push(obj);
            },
            photoPreview(src, ext) {
                if (src == '') return;
                if (ext != 'pdf') this.$store.commit('showModal', {type: 'htmlModal', html: '<img src=' + src + '>'});
                else this.$store.commit('showModal', {type: 'htmlModal', html: '<embed src=' + src + '>'});

            },
            removeDocument(item, model) {
                item.status = 'deleted';
                this.refreshFilter();

            },
            downloadFile(href) {

                if (href != '') this.$http.post(href, null).then(res => {
                    console.log(res.data)
                })
                else return;
            },
        },
        async created() {
            await this.$http.post('/admin/menu?mode=0&module=main&object=translateList', null)
                .then(res => {
                    this.translateList = res.data;
                    const self = this;
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
                    ];
                    if (this.$bRoute.path === '/externalReportsByCompanies') {

                        this.buttons = {
                            create_report: true,
                            archive_report: true,
                            add_contactor: false,

                        };
                        this.actions = {
                            view_report: true,
                            download_report: true,
                            remove_report: true,
                        };
                        if (this.$store.getters.getLang == 'ru') {
                            this.send = "Создать новый отчет";
                            this.archive = "Список отчетов";
                            this.action = "Действия";
                            this.search = "Поиск по наименованию";
                            this.section_title = 'Отчеты по компаниям';
                            this.fields = [
                                {key: 'actions', sortable: false, 'class': 'list_checkbox', thStyle: 'width: 6%'},
                                {
                                    key: 'report_name_en',
                                    filter: true,
                                    sortable: false,
                                    'class': 'report_name',
                                    label: 'Report Type',
                                    thStyle: 'width: 10%'
                                },
                                {
                                    key: 'report_lng',
                                    sortable: true,
                                    'class': 'report_lng',
                                    label: 'Language',
                                    thStyle: 'width: 11%'
                                },
                                {
                                    key: 'report_organisation',
                                    filter: false,
                                    sortable: true,
                                    'class': 'report_organisation',
                                    label: 'Organization',
                                    thStyle: 'width: 11%'
                                },
                                {
                                    key: 'report_format',
                                    filter: true,
                                    sortable: false,
                                    'class': 'format_report',
                                    label: 'Format',
                                    thStyle: 'width: 11%'
                                },
                                {
                                    key: 'report_start_date',
                                    filter: true,
                                    sortable: false,
                                    'class': 'report_start_date',
                                    label: 'Period',
                                    thStyle: 'width: 11%'
                                },
                                {
                                    key: 'report_status',
                                    filter: false,
                                    sortable: true,
                                    'class': 'report_status',
                                    label: 'Status',
                                    thStyle: 'width: 11%'
                                },
                                {
                                    key: 'created_at',
                                    filter: true,
                                    sortable: false,
                                    'class': 'report_start_date',
                                    label: 'Formed',
                                    thStyle: 'width: 11%'
                                },
                                {
                                    key: 'list_actions',
                                    sortable: false,
                                    'class': 'list_actions-box',
                                    label: 'Actions',
                                    thStyle: 'width: 15%'
                                }
                            ];
                        }
                        if (this.$store.getters.getLang == 'en') {
                            this.send = "Create a new report";
                            this.archive = "Reports List";
                            this.action = "Actions";
                            this.search = "Search by name";
                            this.section_title = "Companies reports";
                            this.fields = [
                                {key: 'actions', sortable: false, 'class': 'list_checkbox', thStyle: 'width: 6%'},
                                {
                                    key: 'report_name_en',
                                    filter: true,
                                    sortable: false,
                                    'class': 'report_name',
                                    label: 'Report Type',
                                    thStyle: 'width: 10%'
                                },
                                {
                                    key: 'report_lng',
                                    sortable: true,
                                    'class': 'report_lng',
                                    label: 'Language',
                                    thStyle: 'width: 11%'
                                },
                                {
                                    key: 'report_organisation',
                                    filter: false,
                                    sortable: true,
                                    'class': 'report_organisation',
                                    label: 'Organization',
                                    thStyle: 'width: 11%'
                                },
                                {
                                    key: 'report_format',
                                    filter: true,
                                    sortable: false,
                                    'class': 'format_report',
                                    label: 'Format',
                                    thStyle: 'width: 11%'
                                },
                                {
                                    key: 'report_start_date',
                                    filter: true,
                                    sortable: false,
                                    'class': 'report_start_date',
                                    label: 'Period',
                                    thStyle: 'width: 11%'
                                },
                                {
                                    key: 'report_status',
                                    filter: false,
                                    sortable: true,
                                    'class': 'report_status',
                                    label: 'Status',
                                    thStyle: 'width: 11%'
                                },
                                {
                                    key: 'created_at',
                                    filter: true,
                                    sortable: false,
                                    'class': 'report_start_date',
                                    label: 'Formed',
                                    thStyle: 'width: 11%'
                                },
                                {
                                    key: 'list_actions',
                                    sortable: false,
                                    'class': 'list_actions-box',
                                    label: 'Actions',
                                    thStyle: 'width: 15%'
                                }
                            ];
                        }


                        this.$http.post('admin/company/report', null)
                            .then(res => {
                                let mobileListItems;
                                mobileListItems = [];
                                for (var i = 0; i < res.data.report.length; i++) {
                                    if (res.data.report[i].reports.length != 0) {
                                        for (var k = 0; k < res.data.report[i].reports.length; k++) {
                                            mobileListItems.push(res.data.report[i].reports[k]);
                                        }
                                    }
                                }
                                mobileListItems.forEach(e => {
                                    // e.updated_at_format = e.updated_at;
                                    // e.updated_at = this.formatDate(new Date( Date.parse(e.updated_at)));
                                    // e.created_at_format = e.created_at;
                                    // e.created_at = this.formatDate(new Date( Date.parse(e.created_at)));
                                    // e.report_start_date_format = e.report_start_date;
                                    // e.report_start_date = this.formatDate(new Date( Date.parse(e.report_start_date)));
                                    // e.report_end_date_format = e.report_end_date;
                                    // e.report_end_date = this.formatDate(new Date( Date.parse(e.report_end_date)));
                                });
                                if (window.innerWidth < 768) {
                                    self.listItems = mobileListItems.slice(0, 1);
                                } else {
                                    self.listItems = mobileListItems.slice(0, self.perPage);
                                }
                                self.mobileListItems = mobileListItems;
                                self.listItemsAll = mobileListItems;
                                self.totalRows = self.mobileListItems.length;
                                self.block_model = 'externalReportsByCompanies';
                                self.readyTable('externalReportsByCompanies');
                                self.exFilter();
                            })
                            .catch((error) => {
                                if (error.response) {
                                    this.$bRouter.push({path: '/' + error.response.status})
                                }
                            });
                        if (this.$store.state.asyncReports === false) {
                            this.changeAsyncReports();
                            this.asyncReports = setInterval(function () { // Ajax запрос на обновленние данных
                                self.getReports();
                                if (self.$bRoute.path != '/externalReportsByCompanies') {
                                    clearTimeout(self.asyncReports);
                                    self.changeAsyncReports();
                                }
                            }, 5000);
                        }
                        return false;
                    }
                    if (this.block && this.model) {
                        // Название модели
                        this.block_model = this.block.block_model;
                        // Зависимость формы к select
                        this.form_parameters.form_is_dependent = this.block.form_is_dependent;
                        //дописываем флаг на блокировку клика на списке
                        if(this.block.block_parameters){
                            //дописываем флаг на блокировку клика на списке
                            this.form_parameters.prevent_list_click = this.block.block_parameters.prevent_list_click;
                            //дописываем флаг на блокировку легенды на списке
                            this.form_parameters.show_list_legend = this.block.block_parameters.show_list_legend;
                            this.form_parameters.hide_filter = this.block.block_parameters.hide_filter;
                        }
                        // если есть подвал списка - cохраняем его в компоненте
                        if(this.block.list_footer){
                            this.list_footer=this.block.list_footer;
                            this.foot_clone=true;
                        }

                        // Получение всех элементов
                        this.mobileListItems = this.model;
                        // Получение количества элементов
                        this.totalRows = this.mobileListItems.length;
                        // Все элементы
                        this.listItemsAll = this.model;
                        // Элементы на странице
                        this.listItems = this.mobileListItems.slice(0, this.perPage);
                        // Колонки в списке
                        this.fields = this.block.block_fields;
                        // Колонка для поиска
                        this.searchNameVal = this.block.form_search_field;
                        this.buttons = this.block.block_actions || {};

                        // Проверка на готовность таблицы
                        this.readyTable(this.block_model);
                        this.exFilter();

                    } else {
                        this.componentData(this.$bRoute.meta.route, {id: this.$bRoute.params[this.$bRoute.meta.id_field]});
                    }
                })
                .catch(error=>{
                    console.log(error);
                })
        },
        mounted() {
            if (this.$bRoute.path.includes('Dev')) this.dev = true;
            this.actions = {
                view_report: true,
                download_report: true,
                remove_report: true,
            };
            global.list = this;
            this.resizeWindow();
            let self = this;
            this.$store.commit("changeTab", 0);
        },
        components: {
            bTable,
            bPagination,
            bFormSelect,
            AtomSpinner,
            Datepicker,
        }
    }


</script>

<style lang="scss">
    @import '../../sass/variables';
    @import '../../sass/mixin';

    #list {
        padding: 0 1.5rem;
        width: 100%;
        position: relative;
        #list-box .table-hover > tbody > tr:hover {
            box-shadow: inset 1px 0 0 #dadce0, inset -1px 0 0 #dadce0, 0 1px 2px 0 rgba(60, 64, 67, .3), 0 1px 3px 1px rgba(60, 64, 67, .15);
            cursor: pointer;
            transform: translateY(0px);
            
        }
        
        .btn.list-filter {
            &:active, &.active {
                box-shadow: none;
                background-color: #a00222;
                bottom: -3px;
            }
        }
        table.b-table > thead > tr > th.sorting::before, table.b-table > tfoot > tr > th.sorting::before {
            content: '';
        }

        .links {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 0.67em;
            .btn-link{
                padding:1rem 2rem;
               a{
                   font-size:1.45rem;
                   display: flex;
                   align-items: center;
               }
            }
            .btn-link-inline {
                padding:1rem 2rem;
                background-color: transparent;
                box-shadow:inherit;
                a {
                    color: #788699;
                    font-size:1.45rem;
                    &:hover{
                        color:$accent;
                        text-decoration: underline;
                    }
                }
            }
            .link{
                &:first-child{
                    padding-left: 0;
                }
            }
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
            display: flex;
            flex-wrap: wrap;
        }
        .list_btn_second-line {
            .dropdown_box {
                display: block;
                transform: scaleY(0);
                transform-origin: top;
                transition: .25s;
                a {
                    opacity: 0;
                    transition: .25s;
                }
                &.open {
                    transform: scaleY(1);
                    a {
                        opacity: 1;
                    }

                }
            }
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

        #list_table {
            transition: .25s;
            width: 100%;
            margin-top: 3rem;
            margin-bottom: 0;
            table-layout: fixed;
            position: relative;
            font-family: inherit;

            .flip-list-move {
                transition: transform 1s;
            }
            &.disable_actions {
                .list_checkbox {
                    display: none;
                }
            }
            .list_checkbox {
                margin: 0 auto;
                justify-content: center;
                align-items: center;

                span {
                    margin: 0 auto
                }
            }

            th.list_checkbox {
                max-width: 6% !important;
                /*width: 6% !important;*/
                .grip {
                    display: none;
                }
            }

            .list_actions-box {
                /*width: 20rem !important;*/
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

                    .grip {
                        position: absolute;
                        cursor: col-resize;
                        width: 20px;
                        top: 0;
                        right: -10px;
                        z-index: 999;
                        bottom: 0;
                    }

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

                    &[aria-sort] {
                        background-image: url('/img/bg_table_sort.png');
                        background-repeat: no-repeat;
                        background-position: calc(100% - 10px);
                    }

                    &[aria-sort="ascending"] {
                        background-image: url('/img/bg_table_down.png');
                    }

                    &[aria-sort="descending"] {
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
                    /*background: #fff;*/
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

                    &.actions {
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

                    .btn-container {
                        display: flex;
                        /*justify-content: space-around;*/
                        flex-wrap: nowrap;
                        align-items: center;
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
                    &.status {
                        padding-left: 0 !important;
                        padding-right: 0 !important;
                        .status_box {
                            text-align: center;
                            img {
                                max-width: 32px;
                            }
                        }
                    }

                }

                tr {
                    background: #fff;
                    transition: .25s;
                }

                .table-danger {
                    background-color: #e21841;
                    p {
                        color: $white-color;
                    }
                }

                .table-info {
                    background-color: #aeaeae;
                    p {
                        color: $white-color;
                    }
                }

                .table-success {
                    background-color: #c3e6cb;
                }

                .table-warning {
                    background-color: #ffeeba;
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

                .image_path {
                    padding: 11px !important;

                    div {
                        display: flex;
                        justify-content: center;
                    }

                    img {
                        max-width: 100%;
                        max-height: 3rem;
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
        tfoot{
            border-left:1px solid #e4e7ea;
            border-right:1px solid #e4e7ea;
                th{
                    padding:0;
                    padding-top:10px;
                    &::after{
                        content: '';
                    }
                }
        }

        #list-box {
            position: relative;
           
        }

        .atom-spinner {
            width: 100% !important;
            /*height: 100% !important;*/
            z-index: 999999;
            position: absolute;
            /*background: #fff;*/
            display: flex;
            justify-content: center;
            align-items: center;

            .spinner-inner {
                width: 6rem;
                height: 6rem;
            }
        }
        .preventClick{
            .carousel{
                td{
                    cursor: default !important;
                }
            }
        }
        .exFilter {
            .dropdown_box {
                width: 150%;
                min-height: 40rem;
                height: auto;
                max-height: 100%;
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

        .vdp-datepicker__calendar {
            width: 100%;
            /*position: relative;*/
            height: 20rem;
            display: flex;
            flex-direction: column;

            header span {
                font-size: 1.2rem;
                color: #202a3d;
            }

            & > div {
                display: flex;
                flex-wrap: wrap;

                span {
                    color: #202a3d;
                }
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
            .dropdown {
                width: 100%;
                align-items: center;

                .btn-dropdown {
                    background: none;
                    border: 0;
                    color: white;
                    font-size: unset;
                    font-weight: 400;
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
                    padding-top: 0;
                    padding-bottom: 0;

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
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter, .fade-leave-to {
        opacity: 0;
    }

    .table__thead__overflow {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .table_thead_break_line {
        white-space: normal;
    }
    .rb #list #list-box {
        tr > tbody > tr:hover{
          box-shadow: none;
        }
        tr.table-info:hover td{ border-color:#aeaeae }
        tr.table-danger:hover td{ border-color:$accent }
        tr:hover td{  border-color:#fff }
    }



    @include desktop-max-little {
        #list {
            #list-box {
                overflow: hidden;
            }

            .table_footer {
                width: 112rem;
                max-width: 100%;
            }

            #list_table {
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

                    #list_table {
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
                                    max-width: 33% !important;
                                    width: 100% !important;
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
                }

                #list_table {
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

    .rb #list {
        .table_footer {
            background: #fff;
            border-top: 0;
            /*display: none !important;*/
            color: #2f3339;
        }

        .counter_list {
            b {
                font-weight: normal;
            }
        }
        .filter-icon {
            width: 23/11*1rem;
            height: 25/11*1rem;
            path {
                fill: white;
            }
        }

        #list_table {
            color: $tabcol;
            font-size: 16/11*1rem;
            thead {
                border: 0;
                //border-bottom: 1px solid #e4e7ea;

                th {
                    color: white;
                    background-color: $thbg;

                    font-weight: 400;
                    height: 80/11*1rem;
                    border: 1px solid $tabbd;
                }
            }

            tbody {
                td {
                    border: 1px solid $tabbd;
                    // border: 0;
                    font-weight: 400;
                    color: $table-color-text;
                    // border-bottom: 1px solid #e4e7ea;
                }
            }
        }
        #list_table-box.exFilter {
            table th {
                background-image: none;
            }
            .dropdown .btn-dropdown {
                color: white;

            }
        }

        .list-legend {
            .list-legend-item {
                &:first-of-type {
                    margin-left: 0;
                }
                display: flex;
                align-items: center;
                height: 100%;
                margin-left: 2.5rem;
                .legend-color {
                    width: 2rem;
                    height: 2rem;
                    /*background: red;*/
                    margin-right: 1rem;
                    border-radius: 4px;
                    border: 1px solid #e2e2e2;

                }
                .legend-grey {
                    background: #aeaeae;
                    border-color: #aeaeae;
                }
                .legend-red {
                    background: #e1002d;
                    border-color: #e1002d;
                }
                p {
                    color: #5a6971;
                }
            }
        }
    }

    .dropdown .dropdown-textover {
        display: inline-block;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        font-weight: initial;
        margin-bottom: 0;
    }
</style>
