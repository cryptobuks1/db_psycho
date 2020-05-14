<template>
    <div id="menu" class="menu">
        <div class="container">
            <div class="row">
                <div class="col no-padding">
                    <nav class="navTop">

                        <ul class="topMenu navTop__inner navTop__ul-first">
                            <li v-for="item in menu_data.items" class="navTop__li navTop__li-top">
                                <router-link @click.native="openDropdown($event)" class="navTop__link navTop__link-top"
                                             :to="item.link" :title="item.title">
                                    <img :src="item.img" alt="" v-if="menu_data.menu_parameters.first_level_icons"
                                         class="svg">
                                    <span>{{item.title}}</span>
                                </router-link>
                                <div class="navTop__dropdown" v-bar="{preventParentScroll: true}">
                                    <div>
                                        <ul class="nav_top navTop__ul navTop__ul-2 navTop__wrap"
                                            @click="refreshDropdown">
                                            <template v-for="child in item.children">
                                                <MenuItem
                                                        class="item"
                                                        :model="child"
                                                        :parameters="menu_data.menu_parameters"
                                                >
                                                </MenuItem>
                                            </template>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    import MenuItem from './MenuItem.vue';

    export default {
        data() {
            return {
                menu_data: {},
                self: '',
            }
        },
       
        components: {
            MenuItem
        },
        methods: {
            refreshDropdown(e) {


            },
            openDropdown(e) {
                let parentLi;
                if(!e.target.closest('.navTop__li')) { return false } // Костыль для ie11
                var drop_menu = e.target.closest('.navTop__li').getElementsByClassName("navTop__dropdown")[0];
                var drop_menus = document.getElementsByClassName("navTop__dropdown");

                Array.from(drop_menus).forEach(function (e) {
                    if (e != drop_menu) {
                        e.parentElement.classList.remove("active");
                    }
                });
                var list = document.querySelectorAll('.topMenu  li');
                Array.from(list).forEach(function (e) {
                    e.style.marginTop = 0;
                });
                (!drop_menu.parentElement.classList.contains("active")) ? drop_menu.parentElement.classList.add("active") : drop_menu.parentElement.classList.remove("active");
            },
        },
        updated() {
            let topMenu = document.querySelectorAll('#menu .topMenu > li');
            Array.from(topMenu).forEach(function (e) {
                let childs = e.querySelectorAll('.navTop__ul')[0].childNodes;
                let height = 0;
                Array.from(childs).forEach(function (elem) {
                    height = height + elem.offsetHeight;
                })
                e.querySelectorAll('.navTop__dropdown')[0].style.height = height + 1 + 'px';
            });
            this.imgtosvg();
            
        },
        mounted() {
            this.self = this;

            this.$http.post('/admin/menu?mode=0&module=main&object=mainmenu&menutype=top', null)
                .then(res => {
                    this.menu_data = res.data;
                })
        }
    }

    function closeAllMenu() {
        var lis = document.querySelectorAll('.topMenu li');
        Array.from(lis).forEach(function (e) {
            e.classList.remove("active");
        });
        // var drop_menus = document.getElementsByClassName("drop_menu");
        // Array.from(drop_menus).forEach(function(e){
        //     e.classList.remove("active");
        // });
    }
</script>

<style lang="scss">
    @import '../../sass/variables';
    @import '../../sass/mixin';

    #menu {
        img.svg{
            max-width: 22px;
        }
        background: #fff;
        margin-bottom: 3.5rem;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #e4e7ea;
        .topMenu {
            & > .navTop__li.active {
                & > .navTop__link {
                    text-decoration: none;
                    color: #6bb485;
                    svg {
                        path {
                            fill: $accent;
                        }
                    }
                }
            }
        }
        .navTop__wrap {
            position: relative;
        }
        .navTop {
            &__inner {
                height: 3.6rem;
                display: flex;
                align-items: center;
                & > .navTop__li {
                    & > .navTop__link {
                        font-weight: 600;
                        //&:hover{
                        //    svg{
                        //        path{
                        //            fill: $accent;
                        //        }
                        //    }
                        //}
                    }
                }
                .navTop__link {
                    transition: .25s;
                    color: #202a3d;
                    display: flex;
                    align-items: center;
                    padding-right: 2.5rem;
                    &:hover {
                        text-decoration: none;
                        /*color: #6bb485;*/
                    }
                    &-top {
                        margin-right: 10px;
                        padding-right: 0;
                        svg {
                            max-height: 20px;
                            margin-right: 5px;
                            path {
                                transition: .25s;
                                fill: $base-color;
                            }
                        }
                    }
                }
                .navTop__wrap {
                    .navTop__li {
                        &_img {
                            text-align: center;
                            width: 25px;
                            margin-right: 10px;
                        }
                        &.active {
                            & > .navTop__link {
                                .arrow {
                                    transform: rotate(90deg);
                                }
                            }
                        }
                    }
                }
                & > .navTop__li {
                    height: 100%;
                    display: flex;
                    align-items: center;
                    position: relative;
                    & > .navTop__link {
                        height: 100%;
                        padding-right: 1.8rem;
                        &:hover {
                            background: #d7dde3 !important;
                            color: inherit !important;
                            svg path {
                                fill: #202a3d !important;
                            }
                        }
                    }
                    &.active {
                        & > .navTop__dropdown {
                            transform: scaleY(1);
                            .navTop__link {
                                opacity: 1;
                            }
                        }
                    }
                }
            }
        }
    }

    .rb #menu {
        background: #9d9d9d;

        .navTop__inner {

            .navTop__link-top {

                svg {
                    display: none;
                }
            }

            & > .navTop__li{
                & > .navTop__link{
                    padding-left: 1.8rem;
                    span{
                        color: $white-color;
                        font-weight:300;
                        letter-spacing:1px
                    }
                    &:hover{
                        background: #adadad!important;
                    }
                }
            }
        }

    }
</style>
