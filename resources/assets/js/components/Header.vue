<template>
    <header id="header" class="d-flex align-items-center">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="logo-wrap hidden-md-down col-md-9 col-2 no-padding">
                    <div v-if="!$store.state.menu_open" id="logo" class="d-none d-md-block">
                        <img :src="$store.state.logoUrl" alt="">
                        
                    </div>
                    <div class="sidebar_btn-menu d-block d-md-none menu-btn" @click="handleResize()">
                        <img src="/img/interfacedashboard/menu.svg" class="svg" alt="">
                    </div>

                    <p v-if="$store.getters.getTheme=='rb'" class="header-parag">Web-кабинет клиента</p>

                    <p v-if="$store.getters.getTheme=='rb'" class="header-parag">Телефон обратной связи: + 7 (123) 456 78 90</p>

                </div>
                <div class="col-xs-12 col-md-7 col-14 d-flex justify-content-end">
                    <div class="header_right d-flex align-items-center">


                        <!--Вариант с кнопками языков-->
                        <!--<div class="header_lang">-->
                        <!--<ul>-->
                        <!--<li :class="{'active':$store.state.lang=='ru' }" @click="$store.state.lang='ru'"><a href="lang/ru">RU</a></li>-->
                        <!--<li :class="{'active':$store.state.lang=='en' }" @click="$store.state.lang='en'"><a href="lang/en">EN</a></li>-->
                        <!--</ul>-->
                        <!--</div>-->


                        <div class="header_notifications">
                            <a class="h_profile-name btn-dropdown d-flex align-items-center">
                                <i v-if="$store.getters.getTheme == 'rb' " class="icon">
                                    <span class="icon-counter" >
                                        {{notifications.length}}
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" v-if="$store.getters.getTheme == 'rb'" viewBox="0 0 370.625 512">
                                        <path class="cls-1" d="M368.192,415.136l-24.975-46.878V252.489c0-71.565-48.057-132.111-113.591-151.069V43.632a43.626,43.626,0,1,0-87.252,0v57.789C76.842,120.38,28.783,180.925,28.783,252.49V368.258L3.809,415.136a28.858,28.858,0,0,0,25.466,42.428h99.147a57.668,57.668,0,0,0,115.155,0h99.148A28.857,28.857,0,0,0,368.192,415.136ZM165.458,43.632a20.542,20.542,0,1,1,41.083,0V96.6a157.882,157.882,0,0,0-41.083,0V43.632h0ZM51.867,252.489c0-73.968,60.172-134.147,134.133-134.147s134.134,60.179,134.134,134.147V358.706H51.867V252.489ZM186,488.914a34.633,34.633,0,0,1-34.431-31.35h68.865A34.638,34.638,0,0,1,186,488.914Zm161.674-57.238a5.68,5.68,0,0,1-4.948,2.8H29.276a5.773,5.773,0,0,1-5.092-8.487l23.547-44.2H324.273l23.547,44.2A5.69,5.69,0,0,1,347.674,431.676ZM186,149.113A103.49,103.49,0,0,0,82.633,252.491a11.542,11.542,0,1,0,23.084,0A80.379,80.379,0,0,1,186,172.2,11.543,11.543,0,0,0,186,149.113Z" transform="translate(-0.375)"/>
                                    </svg>
                                </i>
                                <span class="" v-if="this.$store.getters.getTheme == 'default' "  >Notifications</span>
                                <img src="/img/dropdown-i.png" alt="">
                            </a>

                            <transition name="fade">
                                <div class="dropdown_box">
                                    <ul>
                                        <li v-for="notification in notifications">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 21.03 21">
                                                <path id="Forma_1_копия" data-name="Forma 1 копия" class="cls-1"
                                                      d="M1665.92,95.06a10.531,10.531,0,0,0-14.87,0,10.513,10.513,0,0,0-2.45,11,0.425,0.425,0,1,0,.8-0.29,9.779,9.779,0,0,1-.36-5.306,9.657,9.657,0,1,1,16.44,8.675l-0.06.065a1.067,1.067,0,0,1-.11.115,9.664,9.664,0,0,1-13.65,0l-0.06-.061v-0.374a0.245,0.245,0,0,1,.01-0.085v-0.171a0.34,0.34,0,0,0,.01-0.1c0.01-.051.01-0.1,0.02-0.153,0-.036.01-0.071,0.01-0.107s0.01-.1.02-0.144,0.01-.073.02-0.109,0.01-.093.02-0.14a0.418,0.418,0,0,0,.02-0.109l0.03-.137,0.03-.109,0.03-.134,0.03-.109c0.01-.044.03-0.087,0.04-0.131l0.03-.108c0.02-.043.03-0.086,0.05-0.128l0.03-.108c0.02-.042.03-0.084,0.05-0.126s0.03-.07.04-0.105,0.03-.083.05-0.124,0.03-.07.05-0.105,0.03-.081.05-0.121a0.48,0.48,0,0,0,.05-0.1l0.06-.12a0.467,0.467,0,0,0,.05-0.1c0.02-.039.05-0.079,0.07-0.118s0.03-.065.05-0.1a0.716,0.716,0,0,0,.07-0.116l0.06-.095c0.02-.038.05-0.076,0.07-0.113a0.566,0.566,0,0,1,.07-0.093c0.02-.037.05-0.074,0.07-0.111s0.05-.06.07-0.09a0.7,0.7,0,0,1,.08-0.108,0.5,0.5,0,0,1,.07-0.088c0.03-.036.05-0.071,0.08-0.106a0.524,0.524,0,0,0,.07-0.085l0.09-.1c0.03-.027.05-0.055,0.08-0.082l0.09-.1c0.03-.026.05-0.053,0.08-0.079a0.934,0.934,0,0,1,.1-0.1c0.02-.025.05-0.05,0.07-0.075,0.04-.033.07-0.064,0.11-0.1a0.577,0.577,0,0,1,.08-0.072,1.071,1.071,0,0,1,.11-0.093,0.642,0.642,0,0,1,.08-0.068,1.211,1.211,0,0,1,.11-0.091,0.558,0.558,0,0,0,.08-0.063c0.04-.031.09-0.06,0.13-0.09a0.486,0.486,0,0,1,.08-0.057c0.04-.033.09-0.064,0.13-0.095a0.425,0.425,0,0,0,.07-0.046c0.06-.04.13-0.078,0.19-0.116,0.01,0,.02-0.012.03-0.018,0.07-.043.14-0.085,0.22-0.125,0.02-.014.05-0.027,0.07-0.041,0.05-.026.1-0.053,0.15-0.078,0.03-.016.07-0.031,0.1-0.047l0.12-.058a4.169,4.169,0,0,0,5.77,0,6.963,6.963,0,0,1,3.42,3.485,0.431,0.431,0,0,0,.79-0.344,7.739,7.739,0,0,0-3.64-3.813,4.178,4.178,0,0,0-3.45-6.523,0.428,0.428,0,1,0,0,.855,3.316,3.316,0,0,1,2.46,5.543h0a3.31,3.31,0,0,1-4.93,0h0a3.332,3.332,0,0,1-.86-2.221,3.285,3.285,0,0,1,.99-2.362,0.427,0.427,0,0,0-.6-0.608,4.175,4.175,0,0,0-.52,5.313s-0.01,0-.01.006a0.922,0.922,0,0,0-.1.051l-0.15.08c-0.04.019-.07,0.04-0.11,0.059s-0.09.053-.14,0.08c-0.03.022-.07,0.043-0.1,0.065-0.05.027-.09,0.055-0.14,0.083-0.03.022-.07,0.046-0.1,0.069s-0.09.057-.13,0.086-0.07.049-.1,0.074l-0.12.089c-0.04.025-.07,0.052-0.11,0.078a1.212,1.212,0,0,1-.11.092,0.784,0.784,0,0,0-.1.082,0.88,0.88,0,0,0-.11.1,0.793,0.793,0,0,0-.1.085c-0.04.032-.07,0.066-0.11,0.1l-0.09.088c-0.04.035-.07,0.069-0.11,0.1l-0.09.09c-0.03.036-.07,0.073-0.1,0.109a0.657,0.657,0,0,0-.08.092,1.02,1.02,0,0,0-.1.114,0.662,0.662,0,0,0-.08.093,0.992,0.992,0,0,0-.1.122c-0.03.03-.05,0.06-0.08,0.091a1.257,1.257,0,0,1-.1.134l-0.06.084-0.12.178a0.165,0.165,0,0,1-.04.046c-0.05.076-.09,0.152-0.14,0.229-0.02.026-.03,0.053-0.05,0.08l-0.09.155-0.06.1c-0.02.047-.05,0.094-0.07,0.141l-0.06.107a0.9,0.9,0,0,1-.07.138,0.543,0.543,0,0,1-.05.111l-0.06.138c-0.02.038-.03,0.077-0.05,0.115l-0.06.139c-0.01.039-.03,0.078-0.04,0.118a0.757,0.757,0,0,0-.05.14,0.564,0.564,0,0,0-.04.12,0.775,0.775,0,0,0-.05.142c-0.01.04-.03,0.081-0.04,0.121s-0.03.1-.04,0.145l-0.03.122c-0.01.049-.03,0.1-0.04,0.148l-0.03.123-0.03.15c-0.01.041-.01,0.082-0.02,0.123l-0.03.154a0.51,0.51,0,0,1-.02.122c-0.01.054-.01,0.107-0.02,0.161,0,0.039-.01.079-0.01,0.118-0.01.056-.01,0.113-0.02,0.169,0,0.038-.01.075-0.01,0.113,0,0.063-.01.126-0.01,0.189v0.095a2.714,2.714,0,0,0-.01.285c0,0.1,0,.2.01,0.309a0.18,0.18,0,0,0,.01.073v0.006a0.167,0.167,0,0,0,.02.067V109.6l0.03,0.061c0.01,0,.01,0,0.01.007,0.01,0.019.03,0.037,0.04,0.053s0,0,.01,0l0.05,0.06c0.04,0.046.09,0.092,0.13,0.136a10.531,10.531,0,0,0,14.87,0c0.04-.044.09-0.09,0.13-0.136l0.05-.06A10.487,10.487,0,0,0,1665.92,95.06Z"
                                                      transform="translate(-1647.97 -92)"/>
                                            </svg>
                                            <router-link :to="'notifications'">{{notification.notification_title}}</router-link>
                                            <!--<a href="/000"> {{notification.title}} </a>-->
<!--                                            <a href="/notifications"> {{notification.notification_title}} </a>-->
                                        </li>


                                    </ul>
                                </div>
                            </transition>

                        </div>


                        <!--<div class="header_lang">-->
                            <!--<a class="h_lang-name btn-dropdown d-flex align-items-center"-->
                               <!--@click="langDropdown = !langDropdown">-->
                                <!--&lt;!&ndash;<div class="h_profile-img">&ndash;&gt;-->
                                <!--&lt;!&ndash;<img src="/img/man.png" alt="">&ndash;&gt;-->
                                <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                <!--<span class="">{{$store.getters.getLang.toUpperCase()}}</span>-->
                                <!--<img src="/img/dropdown-i.png" alt="">-->
                            <!--</a>-->
                            <!--<transition name="fade">-->
                                <!--<div class="dropdown_box">-->
                                    <!--<ul>-->
                                        <!--<li>-->
                                            <!--<a @click=" changeLang('en')">EN </a>-->
                                        <!--</li>-->
                                        <!--<li>-->
                                            <!--<a @click=" changeLang('ru')">RU </a>-->
                                        <!--</li>-->

                                    <!--</ul>-->
                                <!--</div>-->
                            <!--</transition>-->

                            <!--&lt;!&ndash;<ul>&ndash;&gt;-->
                            <!--&lt;!&ndash;<li :class="{'active':$store.state.lang=='ru' }" @click="$store.state.lang='ru'"><a&ndash;&gt;-->
                            <!--&lt;!&ndash;href="lang/ru">RU</a></li>&ndash;&gt;-->
                            <!--&lt;!&ndash;<li :class="{'active':$store.state.lang=='en' }" @click="$store.state.lang='en'"><a&ndash;&gt;-->
                            <!--&lt;!&ndash;href="lang/en">EN</a></li>&ndash;&gt;-->
                            <!--&lt;!&ndash;</ul>&ndash;&gt;-->
                        <!--</div>-->
                        <div class="header_profile">
                            <div class="h_profile-photo" v-if="$store.getters.getTheme == 'rb' " style="">
                                <img src="/img/defphoto.png" alt="">
                            </div>
                            <a class="h_profile-name btn-dropdown d-flex align-items-center"
                               @click="userDropdown = !userDropdown">
                                <!--<div class="h_profile-img">-->
                                <!--<img src="/img/man.png" alt="">-->
                                <!--</div>-->
                                <span v-if="user" class="">{{user.username}}</span>
                                <img src="/img/dropdown-i.png" alt="">
                            </a>

                            <transition name="fade">
                                <div class="dropdown_box">
                                    <ul>
                                        <li v-for="action in userActions">
                                            <svg v-if="action.type=='link'" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 21.03 21">
                                                <path id="Forma_1_копия" data-name="Forma 1 копия" class="cls-1"
                                                      d="M1665.92,95.06a10.531,10.531,0,0,0-14.87,0,10.513,10.513,0,0,0-2.45,11,0.425,0.425,0,1,0,.8-0.29,9.779,9.779,0,0,1-.36-5.306,9.657,9.657,0,1,1,16.44,8.675l-0.06.065a1.067,1.067,0,0,1-.11.115,9.664,9.664,0,0,1-13.65,0l-0.06-.061v-0.374a0.245,0.245,0,0,1,.01-0.085v-0.171a0.34,0.34,0,0,0,.01-0.1c0.01-.051.01-0.1,0.02-0.153,0-.036.01-0.071,0.01-0.107s0.01-.1.02-0.144,0.01-.073.02-0.109,0.01-.093.02-0.14a0.418,0.418,0,0,0,.02-0.109l0.03-.137,0.03-.109,0.03-.134,0.03-.109c0.01-.044.03-0.087,0.04-0.131l0.03-.108c0.02-.043.03-0.086,0.05-0.128l0.03-.108c0.02-.042.03-0.084,0.05-0.126s0.03-.07.04-0.105,0.03-.083.05-0.124,0.03-.07.05-0.105,0.03-.081.05-0.121a0.48,0.48,0,0,0,.05-0.1l0.06-.12a0.467,0.467,0,0,0,.05-0.1c0.02-.039.05-0.079,0.07-0.118s0.03-.065.05-0.1a0.716,0.716,0,0,0,.07-0.116l0.06-.095c0.02-.038.05-0.076,0.07-0.113a0.566,0.566,0,0,1,.07-0.093c0.02-.037.05-0.074,0.07-0.111s0.05-.06.07-0.09a0.7,0.7,0,0,1,.08-0.108,0.5,0.5,0,0,1,.07-0.088c0.03-.036.05-0.071,0.08-0.106a0.524,0.524,0,0,0,.07-0.085l0.09-.1c0.03-.027.05-0.055,0.08-0.082l0.09-.1c0.03-.026.05-0.053,0.08-0.079a0.934,0.934,0,0,1,.1-0.1c0.02-.025.05-0.05,0.07-0.075,0.04-.033.07-0.064,0.11-0.1a0.577,0.577,0,0,1,.08-0.072,1.071,1.071,0,0,1,.11-0.093,0.642,0.642,0,0,1,.08-0.068,1.211,1.211,0,0,1,.11-0.091,0.558,0.558,0,0,0,.08-0.063c0.04-.031.09-0.06,0.13-0.09a0.486,0.486,0,0,1,.08-0.057c0.04-.033.09-0.064,0.13-0.095a0.425,0.425,0,0,0,.07-0.046c0.06-.04.13-0.078,0.19-0.116,0.01,0,.02-0.012.03-0.018,0.07-.043.14-0.085,0.22-0.125,0.02-.014.05-0.027,0.07-0.041,0.05-.026.1-0.053,0.15-0.078,0.03-.016.07-0.031,0.1-0.047l0.12-.058a4.169,4.169,0,0,0,5.77,0,6.963,6.963,0,0,1,3.42,3.485,0.431,0.431,0,0,0,.79-0.344,7.739,7.739,0,0,0-3.64-3.813,4.178,4.178,0,0,0-3.45-6.523,0.428,0.428,0,1,0,0,.855,3.316,3.316,0,0,1,2.46,5.543h0a3.31,3.31,0,0,1-4.93,0h0a3.332,3.332,0,0,1-.86-2.221,3.285,3.285,0,0,1,.99-2.362,0.427,0.427,0,0,0-.6-0.608,4.175,4.175,0,0,0-.52,5.313s-0.01,0-.01.006a0.922,0.922,0,0,0-.1.051l-0.15.08c-0.04.019-.07,0.04-0.11,0.059s-0.09.053-.14,0.08c-0.03.022-.07,0.043-0.1,0.065-0.05.027-.09,0.055-0.14,0.083-0.03.022-.07,0.046-0.1,0.069s-0.09.057-.13,0.086-0.07.049-.1,0.074l-0.12.089c-0.04.025-.07,0.052-0.11,0.078a1.212,1.212,0,0,1-.11.092,0.784,0.784,0,0,0-.1.082,0.88,0.88,0,0,0-.11.1,0.793,0.793,0,0,0-.1.085c-0.04.032-.07,0.066-0.11,0.1l-0.09.088c-0.04.035-.07,0.069-0.11,0.1l-0.09.09c-0.03.036-.07,0.073-0.1,0.109a0.657,0.657,0,0,0-.08.092,1.02,1.02,0,0,0-.1.114,0.662,0.662,0,0,0-.08.093,0.992,0.992,0,0,0-.1.122c-0.03.03-.05,0.06-0.08,0.091a1.257,1.257,0,0,1-.1.134l-0.06.084-0.12.178a0.165,0.165,0,0,1-.04.046c-0.05.076-.09,0.152-0.14,0.229-0.02.026-.03,0.053-0.05,0.08l-0.09.155-0.06.1c-0.02.047-.05,0.094-0.07,0.141l-0.06.107a0.9,0.9,0,0,1-.07.138,0.543,0.543,0,0,1-.05.111l-0.06.138c-0.02.038-.03,0.077-0.05,0.115l-0.06.139c-0.01.039-.03,0.078-0.04,0.118a0.757,0.757,0,0,0-.05.14,0.564,0.564,0,0,0-.04.12,0.775,0.775,0,0,0-.05.142c-0.01.04-.03,0.081-0.04,0.121s-0.03.1-.04,0.145l-0.03.122c-0.01.049-.03,0.1-0.04,0.148l-0.03.123-0.03.15c-0.01.041-.01,0.082-0.02,0.123l-0.03.154a0.51,0.51,0,0,1-.02.122c-0.01.054-.01,0.107-0.02,0.161,0,0.039-.01.079-0.01,0.118-0.01.056-.01,0.113-0.02,0.169,0,0.038-.01.075-0.01,0.113,0,0.063-.01.126-0.01,0.189v0.095a2.714,2.714,0,0,0-.01.285c0,0.1,0,.2.01,0.309a0.18,0.18,0,0,0,.01.073v0.006a0.167,0.167,0,0,0,.02.067V109.6l0.03,0.061c0.01,0,.01,0,0.01.007,0.01,0.019.03,0.037,0.04,0.053s0,0,.01,0l0.05,0.06c0.04,0.046.09,0.092,0.13,0.136a10.531,10.531,0,0,0,14.87,0c0.04-.044.09-0.09,0.13-0.136l0.05-.06A10.487,10.487,0,0,0,1665.92,95.06Z"
                                                      transform="translate(-1647.97 -92)"/>
                                            </svg>

                                            <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.03 17">
                                                <path class="cls-1"
                                                      d="M1648,147.835v11.33a2.816,2.816,0,0,0,2.79,2.835h9a2.814,2.814,0,0,0,2.78-2.835V157.33a0.552,0.552,0,0,0-.55-0.562,0.559,0.559,0,0,0-.55.562v1.835a1.708,1.708,0,0,1-1.69,1.717h-8.99a1.708,1.708,0,0,1-1.69-1.717v-11.33a1.708,1.708,0,0,1,1.69-1.717h9a1.7,1.7,0,0,1,1.68,1.717v1.835a0.555,0.555,0,1,0,1.11,0v-1.835a2.816,2.816,0,0,0-2.79-2.835h-9A2.813,2.813,0,0,0,1648,147.835Zm17.29,9.888a0.553,0.553,0,0,0,.39.164,0.52,0.52,0,0,0,.39-0.164l3.77-3.83a0.574,0.574,0,0,0,0-.79l-3.77-3.83a0.533,0.533,0,0,0-.77,0,0.555,0.555,0,0,0,0,.79l2.82,2.875h-10.31a0.562,0.562,0,0,0,0,1.123h10.31l-2.83,2.876A0.569,0.569,0,0,0,1665.29,157.723Z"
                                                      transform="translate(-1648 -145)"/>
                                            </svg>

                                            <a v-if="action.type=='logout'" :href="action.link">{{action.title}}</a>
                                            <a v-if="action.type=='change_style'"
                                               @click="changeStyle">{{action.title}}</a>
                                            <router-link v-if="action.type=='link'" :to="action.link">{{action.title}}
                                            </router-link>

                                        </li>


                                    </ul>
                                </div>
                            </transition>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
        data() {
            return {
                userDropdown: false,
                langDropdown: false,
            }
        },
        props:['notifications', 'userActions', 'user'],
        mounted() {
        },
        methods: {
            handleResize() {
                this.$store.state.menu_open = !this.$store.state.menu_open;
                if (localStorage.getItem('menuOpen')) {
                    localStorage.setItem('menuOpen', this.$store.state.menu_open);
                } else {
                    localStorage.setItem('menuOpen', this.$store.state.menu_open);
                }

            }
            ,
            changeLang: function (lang) {
                //save sidebar active
                var self = this;
                var sbActiveList = [];
                document.getElementById('sidebar').querySelectorAll('.active > a').forEach(function (el) {
                    sbActiveList.push( self.cssPath( el ) );
                })
                
                localStorage.setItem('MYsideMenu', JSON.stringify(sbActiveList) );
                
                this.$http.get('/lang/' + lang, null)
                    .then(res => {
                        this.$bRouter.go(0);
                    });
               
                
            },
            cssPath (el) {

                if (!(el instanceof Element)) return;
                var parent = document.getElementById('sidebar') ,path = [];
                while (el.nodeType === Node.ELEMENT_NODE && el != parent) {
                    var selector = el.nodeName.toLowerCase();
                    if (el.id) {
                        selector += '#' + el.id;
                    } else {
                        var sib = el, nth = 1;
                        while (sib.nodeType === Node.ELEMENT_NODE && (sib = sib.previousSibling) && nth++);
                        selector += ":nth-child("+nth+")";
                    }
                    path.unshift(selector);
                    el = el.parentNode;
                }
                return path.join(" > ");
            },
            changeStyle() {

                document.body.classList.toggle('rb');

                if (document.body.classList.contains('rb')) {
                    this.$store.commit('changeTheme', 'rb')
                }
                else {
                    this.$store.commit('changeTheme', 'default')
                }
            }
        }
    }
</script>
<style lang="scss">
    @import '../../sass/variables';
    @import '../../sass/mixin';

    #header {
        /*height: 76px;*/
        height: 7.5rem;
        /*border-radius: 3px;*/
        /*margin-bottom: 3.5rem;*/
        border-bottom: 1px solid #e4e7ea;
        background-color: #ffffff;
        padding: 0 15px;
        .header_lang {
            margin-right: 4rem;
            position: relative;
            .h_lang-name {
                text-decoration: none;
                cursor: pointer;
                .btn-dropdown {
                    margin-right: 1rem;
                }
            }
            .dropdown_box {
                min-width: 6rem;
                right: 50%;
                top: 100%;
                background-color: #fff;
                position: absolute;
                margin-top: 1rem;
                box-shadow: 4px 5px 2rem #00000026;
                border: 1px solid #ced0da;
                border-radius: .5rem;
                z-index: 10;

                ul {
                    border-radius: 5px
                }
                li {
                    padding-top: 0;
                    padding-bottom: 0;
                    border-bottom: $border;
                    background-color: $white-color;
                    /*border-radius: .5rem;*/

                    a {
                        border-radius: .5rem;
                        padding-left: 0;
                        height: 3rem;
                        display: -ms-inline-flexbox;
                        display: inline-flex;
                        cursor: pointer;
                        align-items: center;
                        width: 100%;
                    }
                }
            }
        }

        .menu-btn {
            width: 3.1rem;
            height: 1.6rem;
            text-align: center;
            cursor: pointer;
            padding-bottom: 5.5rem;
            transition: .25s margin linear;
            padding-bottom: 0;
        }

        .header_profile {
            display: flex;
            flex-direction: column;
            position: relative;

            .h_profile-img {
                margin-right: 2rem;
            }
            .h_profile-name {
                text-decoration: none;
                cursor: pointer;
                span {
                    margin-right: 1.5rem;
                }
            }
        }

        .header_notifications {
            @extend .header_profile;
            margin-right: 4rem;
            .icon{
                width: 1.45rem;
                height: 2.09rem;
                margin-right: 1.9rem ;
                position: relative;
                &-counter{
                    background-color: $menubtnColor;
                    border-radius: .27rem;
                    box-shadow:  0 .45rem .6rem .03rem $shadow;
                    position: absolute;
                    width: 1.36rem;
                    height: 1.36rem;
                    z-index: 7;
                    left: 59%;
                    bottom: 60%;
                    color: white;
                    text-align: center;
                    align-items: center;
                    display: flex;
                    justify-content: center;
                    font-size: .9rem;
                }
                .cls-1{
                    fill:#5a6971;
                }
            }
            .dropdown_box {
                min-width: 30rem;
            }
        }

        .dropdown_box {
            min-width: 12.5rem;

            background-color: #fff;
            position: absolute;
            margin-top: 1rem;
            box-shadow: 4px 5px 2rem #00000026;
            border: 1px solid #ced0da;
            border-radius: .5rem;
            display: none;
            z-index: 10;
            right: 50%;
            transform: translateX(50%);
            top: 100%;
            &.open {
                display: flex;
            }
            ul {
                width: 100%;
                padding-left: 1.8rem;
                padding-right: 1.8rem;
            }
            li {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
                border-bottom: $border;
                display: flex;
                align-items: center;

                &:last-of-type {
                    border: none;
                }
                &:hover {
                    svg path {
                        fill: $accent;
                    }
                    a {
                        color: $accent;
                    }
                }

                svg {
                    height: 2.1rem;
                    width: 2.1rem;
                    path {
                        transition: all .3s;
                        fill: #5a738e;
                    }
                }
                a {
                    padding-left: 1rem;
                    /*height: 6rem;*/
                    display: inline-flex;
                    align-items: center;
                    width: 100%;
                    font-size: 1.6rem;
                    transition: all .3s;
                }
            }
        }

        #logo {
            transform: scale(.7);
            margin-left: -11rem;
        }
    }

    .rb #header {

        height: 6.8rem;
        background-color: white;
        #logo {
            transform: none;
            margin-left: 0;
            width: 11.8rem;
            max-width: 100%;
            img{
                max-width: 100%;
            }
        }
        .header_profile{
            flex-direction: row;
            .h_profile-photo{
                overflow: hidden;
                min-width: 4.72rem;
                height: 4.72rem;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                border-radius: 50%;
                margin-right: 1.18rem;
            }
        }
        .logo-wrap{
            display: flex;
            align-items: center;
            .header-parag{
                margin-left:3rem;
                font-size: 1.45rem;
            }
        }
        .header-parag{
            margin-left:3rem;
            color:#6B6B6B;
        }
        a{
            color: #6B6B6B;
        }
        .dropdown_box {
            //width: 130%;
            width:20rem;
            min-width: 1px;
            left: -10px;
            right: auto;
            transform: none;
            padding-top: .9rem;
            padding-bottom: .9rem;
            
            
            
            
            &:before{
                content: '';
                width: 1.27rem;
                height: 1.27rem;
                background-color: white;
                position: absolute;
                left: 10px;
                bottom: 100%;
                border: 1px solid $popupborder;
                border-right: none;
                border-bottom: none;
                transform: rotate(45deg);
                margin-bottom: -7px;
            }
            li {
                border-bottom: none;
                padding: 0;
                margin-bottom: .9rem;
                &:last-child{
                    margin-bottom: 0;
                }
                a{
                    padding-left: 0;
                    text-decoration: none;
                    font-size: 1.27rem;
                }
                svg {
                    display: none;
                }
            }
            
        }
        .header_lang {
            img {
                margin-left: .9rem;
            }
        }
        .header_profile, .header_lang{
            .dropdown_box {
                left: auto;
                right: -1.2rem;
                &:before {
                    left: auto;
                    right: .9rem;
                }
            }
        }
        .header_notifications {
            .dropdown_box{
                width: 20rem;
                max-height: 18rem;
                overflow-y: auto;
                ul{
                    padding-left: 9.9/11*1rem;
                    
                }
            }
        }
        
    }

    @include tablet-mobile {
        #header {
            height: 4rem;
            margin-bottom: 2rem;
            .header_lang {
                margin-right: 3rem;
            }
        }
    }
</style>
