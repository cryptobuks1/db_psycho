<template>
	<aside id="sidebar" :class="{'active':$store.state.menu_open, 'closed':!$store.state.menu_open}"
	       @click="$store.commit('hideModal')">
		<div class="sidebar_top">
			<div class="sidebar_btn-menu menu-btn" @click="handleResize()">
				<!--{{burger[$store.getters.getTheme]}}-->
				<img :src="burger[$store.getters.getTheme] || burger.default" alt="">
			</div>
			<div class="sidebar_logo">
				<div class="logo">
					<img src="/img/logo-rb-white.png" alt="">
				</div>
			</div>
		</div>
		<div class="scroll-view">
			<div class="navbar nav_title" style="border: 0;">
				<a href="/admin/server" class="site_title"><i class="fa fa-paw"></i> <span> AdminPanel </span></a>
			</div>
			<div class="clearfix"></div>
			
			<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
				
				<div class="menu_section">
					
					<!--<ul class="nav side-menu">-->
					<!--<li v-for="list in menu_data">-->
					<!--<router-link :to="list.link" :title="list.title">-->
					<!--<img :src="list.img" class="svg"-->
					<!--alt=""><span>{{list.title}}</span></router-link>-->
					<!--<ul v-if="list.children!=undefined" class="nav child_menu">-->
					<!--<li v-for="child in list.children">-->
					<!--<router-link :to="child.link" :title="child.title"><span>{{child.title}}</span></router-link>-->
					<!--<ul v-if="child.children!=undefined" class="nav child_menu child_menu-last">-->
					<!--<li v-for="child1 in child.children">-->
					<!--<router-link :to="child1.link" :title="child1.title"><span>{{child1.title}}</span></router-link>-->
					<!--</li>-->
					<!--</ul>-->
					<!--</li>-->
					<!--</ul>-->
					<!--</li>-->
					<!--</ul>-->
					
					
					<ul class="navTop__inner navTop__ul-first topMenu ">
						<li v-for="item in menu_data.items" class="navTop__li"
						    :class="{'link':!item.children || !item.children.length }">
							
							<router-link v-if="item.link" @click.native="toggleDropdown($event)"
							             class="navTop__link navTop__link-top" :class="{'opened':opened}"
							             :to="item.link" :title="item.title">
								<img :src="item.img" @click.stop class="svg" alt="">
								<span>{{item.title}}</span>
							</router-link>
							<p v-if="!item.link" @click="toggleDropdown($event)" class="navTop__link navTop__link-top"
							   :class="{'opened':opened}">
								
								<img :src="item.img" @Click.stop="" class="svg" alt="">
								<span>{{item.title}}</span>
							</p>
							
							<ul class="nav_top navTop__ul navTop__ul-2 navTop__wrap" @click.stop v-if="+item.group_l ">
								<!--v-if="item.children && item.children.length"-->
								<li v-if="!item.children" class="navTop__li item isLink" :class="'depth'+item.depth">
									<div class="navTop__link isLink">
										<div class="navTop__title">
											<div class="navTop__li_img">
												<img src="/img/interfacedashboard/file.svg" @click.stop class="svg" alt="">
											</div>
											<span> {{menu_data.menu_parameters.empty_title}} </span>
										</div>
									</div>
								</li>
								<template v-for="child in item.children">
									<MenuItem
											class="item"
											:model="child"
											:parameters="menu_data.menu_parameters"
									>
									</MenuItem>
								</template>
							</ul>
						</li>
					</ul>
				</div>
			
			</div>
		
		</div>
	
	
	</aside>
</template>
<script>
    import $ from 'jquery';
    import 'jquery-touchswipe/jquery.touchSwipe';
    import MenuItem from '../components/MenuItem.vue';

    export default {
        data() {
            return {
                menu_data: [],
                list_active: [],
                burger: {'default': '/img/menu.png', 'rb': '/img/menu2.png'},
                opened: false,
            }
        },
        beforeMount() {

        },
        methods: {

            handleResize() {
                this.$store.state.menu_open = !this.$store.state.menu_open;
                if (this.$store.getters.getTheme == 'rb') {
                    // Убирает active эллементов при закрытии\открытии бокового меню, нужно для "РБ"
                    this.$el.querySelectorAll('.active').forEach(function (el) {
                        if (el.classList.contains('isFolder')) {
                            el.__vue__.toggle(el);
                        }
                        else {
                            el.classList.remove('active');
                        }
                    });
                }

                // localStorage.setItem('menuOpen', this.$store.state.menu_open);

            },
            checkMenuOpen() {
                return this.$store.state.menu_open;
            },
            toggleDropdown(e) {
                this.opened = !this.opened;
                var item = e.target.closest(".navTop__li");
                if (!$(item).hasClass('active')) {
                    if (!this.$store.state.menu_open) {
                        Array.from(document.querySelectorAll('#sidebar .topMenu  ul')).forEach(function (item) {
                            $(item).slideUp(250);
                        });
                        $('#sidebar .topMenu .navTop__li.active').each(function (index, el) {
                            if (el.__vue__) {
                                el.__vue__.$data.open = false;
                            }
                            ;
                            $(el).removeClass('active');
                        })
                    }
                }

                $(item.getElementsByClassName("navTop__ul")[0]).slideToggle(250);

                if (!item.className.match('link')) {
                    $(item).toggleClass('active');
                }
            },

            /* searchempty(items){
				 // Рекурсивный метод ищет пустые эллементы в списке бокового меню
				 var self = this;
				 if(!items) return false;
				 items.forEach(function(item,index,array){
					 if(+item.group_l){
						 if(!item.children){
							 item.children = [{
								 'title':""+self.$data.menu_data.menu_parameters.empty_title,
								 'img': "/img/interfacedashboard/file.svg",
								 'depth':item.depth+1,
								 'separator': "10",
								 'link':''
							 }];
						 }
						 else{
							 self.searchempty(item.children);
						 }
						 return false
					 }
				 })
			 },*/

        },
        watch: {
            $bRoute(to, from) {
                if (window.innerWidth < 768) {
                    this.$store.state.menu_open = false;
                    // localStorage.setItem('menuOpen', false);
                } else {
                    var elems = document.querySelectorAll('.content.nav-sm .side-menu li');
                    [].forEach.call(elems, function (el) {
                        el.classList.remove("actives");
                        var child = el.querySelector('ul');
                        if (child) {
                            child.style.display = 'none';
                        }
                    });
                }
            },
            menuState(value) {
                Array.from(document.querySelectorAll('#sidebar .topMenu  ul')).forEach(function (item) {
                    $(item).css("display", "none")
                })
            },
        },
        computed: {
            menuState() {
                return this.$store.state.menu_open;
            }

        },
        beforeUpdate() {
            /*this.searchempty(this.$data.menu_data.items);*/
        },

        mounted() {


            this.checkMenuOpen();
            var self = this;
            this.$http.post('/admin/menu?mode=0&module=main&object=mainmenu&menutype=left', null)
                .then(res => {
                    self.menu_data = res.data;
                    setTimeout(function () {
                        self.imgtosvg();

                        if (window.innerWidth < 768) {
                            $("#main").swipe({
                                allowPageScroll: "auto",
                                excludedElements: "label, button, input, select, textarea, .noSwipe",
                                swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                                    if (fingerData[0].start.x < 50 && direction === 'right') self.handleResize();
                                }
                            });
                            $("#sidebar").swipe({
                                allowPageScroll: "auto",
                                swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                                    if (direction === 'left') self.handleResize();
                                }
                            });
                        }
                        menuAutoClick();
                    })

                });

            function menuAutoClick() {
                
                if (!self.$store.state.menu_open) {
                    return false
                }
                ;
                var list = JSON.parse(localStorage.MYsideMenu || false) || false;
                if (!list) {
                    return false
                }
                ;
                var sidebar = document.querySelector('#sidebar');
                list.forEach(function (el) {
                    sidebar.querySelector(el).click();
                });
                localStorage.MYsideMenu = "";

            }

            document.addEventListener('click', function (e) {

                if (!self.$store.state.menu_open && e.target.closest("#sidebar-menu") == null) {

                    Array.from(document.querySelectorAll('#sidebar .topMenu  ul')).forEach(function (item) {
                        $(item).css("display", "none")
                    })
                    $('#sidebar .topMenu .navTop__li.active').each(function (index, el) {
                        if (el.__vue__) {
                            el.__vue__.$data.open = false;
                        }
                        ;
                        $(el).removeClass('active');
                    })
                } else {

                }

            })
        },

        components: {
            MenuItem
        }
    }
</script>

<style lang="scss">
	@import '../../sass/variables';
	@import '../../sass/mixin';
	
	#sidebar {
		img.svg {
			max-width: 22px;
			opacity: 0;
			position: relative;
			z-index: 1;
		}
		width: 15rem;
		height: 100vh;
		background-color: #202b3d;
		position: fixed;
		overflow: hidden;
		left: 0;
		top: 0;
		z-index: 9999;
		display: flex;
		padding-top: 2.5rem;
		transition: .25s all linear;
		flex-direction: column;
		.menu-btn {
			width: 3.1rem;
			height: 1.6rem;
			text-align: center;
			margin-left: 5.9rem;
			cursor: pointer;
			padding-bottom: 5.5rem;
			transition: .25s margin linear;
			margin-right: 2rem;
			img {
				width: 3.1rem;
				height: 1.6rem;
				margin: 0 auto;
			}
		}
		#sidebar-menu {
			//height: 100vh;
			.menu_section {
				height: 100%;
			}
		}
		.sidebar-footer {
			display: none;
			&.active {
				display: block;
			}
		}
		.navbar.nav_title {
			background: none;
			float: none;
		}
		.scroll-view {
			max-height: calc(100% - 10rem);
			overflow-y: scroll;
			width: calc(100% + 1.9rem);
			overflow-x: hidden;
			.navbar.nav_title {
				background: none;
				display: none;
			}
		}
		.side-menu {
			& > li {
				margin-bottom: 3rem;
				&:hover, &.actives {
					& > a {
						svg path {
							fill: $accent;
						}
					}
				}
			}
			& > li {
				& > .navTop__link span {
					left: 7rem !important;
				}
			}
			li > a {
				height: 6rem;
				display: flex;
				justify-content: start;
				align-items: center;
				cursor: pointer;
				font-size: 1.4rem;
				position: relative;
				padding-left: 0;
				padding-top: 0.7rem;
				transition: .25s;
				margin-bottom: 0;
				
				svg {
					width: 2rem;
					margin-right: 2rem;
					margin-left: 4rem;
					transition: .25s margin linear;
					path {
						transition: .25s all;
						fill: white;
					}
				}
				img {
					margin-left: 1.5rem;
				}
				span {
					display: block;
					left: 31.5rem;
					visibility: hidden;
					transition: .45s left;
					transition: .45s left;
					position: absolute;
				}
			}
			& > li > a {
				border-left: 3px transparent solid;
				
			}
			& > li.actives > a {
				background-color: rgba(255, 255, 255, 0.05);
				color: $accent !important;
				border-color: $accent;
			}
			//& > li li a.router-link-active{ //todo Router-link-active
			//color: $accent !important;
			//border-color: $accent;
			//}
			& > li:hover > a {
				background-color: rgba(255, 255, 255, 0.05);
				color: $accent !important;
				border-color: $accent;
			}
		}
		.sidebar_logo {
			margin-left: 10rem;
			visibility: hidden;
			transition: 0.5s margin;
			transform: scale(.8);
		}
		.sidebar_top {
			display: flex;
		}
		li:before {
			margin-top: 2.4rem !important;
			transition: .25s background;
		}
		li:after {
			transition: .25s border-color;
		}
		li.actives > .child_menu li.actives > a {
			color: $accent !important;
			&:before, &:after {
				background: $accent;
				border-color: $accent;
			}
		}
		/*ul ul a {*/
		/*padding-left: 1rem !important;*/
		/*}*/
		ul ul li {
			&:hover > a {
				color: $accent !important;
				&:before, &:after {
					background: $accent !important;
					border-color: $accent !important;
				}
			}
		}
		.child_menu:last-child {
			li {
				&.actives {
					background: none !important;
				}
			}
		}
		ul li.actives .actives {
			background-color: rgba(255, 255, 255, 0.05);
		}
		ul ul a {
			//position: static !important;
		}
		/*ul ul {*/
		/*display: none;*/
		/*}*/
		& + * .modal-wrapper {
			left: 6rem;
			@include tablet-mobile  {
				left: 0;
			}
			
		}
		&.active {
			width: 31.5rem;
			.sidebar_logo {
				display: block;
			}
			.scroll-view {
				.profile {
					display: none;
				}
			}
			.menu-btn {
				margin-left: 1.5rem;
			}
			.sidebar_logo {
				margin-left: -2rem;
				margin-top: -.5rem;
				visibility: visible;
			}
			.side-menu li > a {
				svg {
					margin-left: 0;
				}
				span {
					left: 5rem;
					visibility: visible;
				}
			}
			.navTop__li, .navTop__link {
				span {
					display: block;
					opacity: 1;
				}
				svg {
					margin-right: 2rem;
				}
				
			}
			.navTop__link-top {
				justify-content: flex-start;
				padding-top: 1rem;
				padding-bottom: 1rem;
			}
			
			.navTop__ul-first {
				& > .navTop__li {
					margin-bottom: 2rem;
				}
			}
			.navTop__inner {
				flex-direction: column;
				height: auto;
			}
			.navTop__li {
				/*margin-bottom: 3rem;*/
				padding-top: 1rem;
				padding-bottom: 1rem;
				flex-direction: column;
				transition: 2s;
				&.depth2 {
					.navTop__link {
						padding-left: 9.6rem !important;
					}
				}
				&.depth3 {
					.navTop__link {
						//padding-left: 7rem!important;
					}
				}
				&.depth4 {
					.navTop__link {
						//padding-left: 9rem!important;
					}
				}
				&.active {
				
				}
				
				svg {
					/*  width: 2.5rem !important;
					  margin-right: 0rem;
					  transition: .25s margin linear;
					  flex-shrink: 0;
					  path {
						  transition: .25s all;
						  fill: white;
					  }*/
				}
				
				.navTop__link-top {
					display: flex;
					align-items: center;
					/*justify-content: center;*/
					svg {
						width: 6rem;
						margin-right: 0rem;
						transition: .25s margin linear;
						-ms-flex-negative: 0;
						flex-shrink: 0;
					}
				}
				
				span {
					color: $white-color;
					font-weight: 500;
					letter-spacing: .5px;
					min-width: 15rem;
				}
			}
			.navTop__wrap {
				background-color: transparent;
				position: inherit;
				transform: inherit;
				border: none;
				transition: auto;
				max-height: 100%;
				/*transition: 5s;*/
				.navTop__link {
					opacity: 1;
					padding-left: 4rem;
					svg {
						width: 2.5rem;
						margin-right: 0rem;
						/*margin-left: 4rem;*/
						justify-content: flex-start;
						transition: .25s margin linear;
						path {
							transition: .25s all;
							fill: white;
						}
						&.arrow {
							width: 0.455rem !important;
							margin-right: 2.045rem;
						}
					}
				}
				.active > .navTop__link svg.arrow {
					transform: rotate(90deg);
				}
			}
			.navTop__ul-2 {
				/*margin-left: 3rem;*/
				margin-top: 2rem;
				display: none;
			}
			
			& + * .modal-wrapper {
				left: 28.5rem;
				@include tablet-mobile {
					left: 0;
				}
				
			}
			
		}
		
		.navTop__link {
			position: relative;
			transition: .3s;
			border-left: 4px solid transparent;
			&:after{
				// Костыль для ie
				content: '';
				left: 0;
				right: 0;
				top: 0;
				bottom: 0;
				margin: auto;
				position: absolute;
				opacity: 0;
			}
			/*&::before{*/
			/*content: '';*/
			/*width: 3rem;*/
			/*height: 3rem;*/
			/*background-color: red;*/
			/*}*/
			&:hover {
				border-left: 4px solid $accent;
				
				text-decoration: none;
				background-color: #303a4b;
				/*border-left:3px solid red;*/
				span {
					color: $accent;
				}
				svg path {
					fill: $accent !important;
				}
			}
		}
		&.closed {
			
			.navTop__ul-first {
				& > .navTop__li {
					margin-bottom: 2rem;
					position: relative;
					& > .navTop__link {
						span {
							display: none;
							opacity: 0;
						}
					}
				}
			}
			.navTop__link:hover span {
				color: $accent;
			}
			.navTop__inner {
				flex-direction: column;
				height: auto;
			}
			.navTop__li {
				/*margin-bottom: 3rem;*/
				padding: 1rem;
				flex-direction: column;
				position: relative;
				/*transition: 2s;*/
				&.active {
				
				}
				
				svg {
					width: 2.5rem !important;
					margin-right: 0rem;
					transition: .25s margin linear;
					flex-shrink: 0;
					path {
						transition: .25s all;
						fill: white;
					}
				}
				
				.navTop__link-top {
					display: flex;
					align-items: center;
					justify-content: center;
					svg {
						width: 6rem !important;
					}
				}
				
				span {
					color: $white-color;
					font-weight: 500;
					letter-spacing: .5px;
					min-width: 15rem;
				}
			}
			.navTop__ul {
				position: absolute;
				top: 0;
				left: 100%;
				background-color: $base-color;
				display: none;
			}
			.navTop__wrap {
				background-color: transparent;
				position: inherit;
				transform: inherit;
				border: none;
				transition: auto;
				max-height: inherit;
				/*transition: 5s;*/
				.navTop__link {
					opacity: 1;
					svg {
						width: 6rem;
						margin-right: 1rem;
						/*margin-left: 4rem;*/
						justify-content: flex-start;
						transition: .25s margin linear;
						path {
							transition: .25s all;
							fill: white;
						}
					}
				}
			}
			.navTop__ul-2 {
				/*margin-left: 3rem;*/
				/*margin-top: 2rem;*/
				display: none;
				position: absolute;
				left: 100%;
				top: 0;
				/*min-height:fit-content;*/
				background-color: $base-color;
				overflow: inherit;
			}
			.navTop__wrap .navTop__li .navTop__link {
				padding-left: 1.8rem !important;
			}
		}
		.menu_section {
			svg {
				max-height: 3rem;
				fill: white;
				
			}
		}
	}
	
	.nav-sm #sidebar {
		overflow: visible;
		.side-menu {
			& > ul li a span {
				display: none;
			}
			ul span {
				left: 0;
			}
			& > li > a > img {
				margin-left: 5.5rem;
			}
		}
		.scroll-view {
			overflow: visible;
			width: 15rem;
		}
		.sidebar_logo {
			display: block;
		}
		ul .child_menu {
			visibility: hidden !important;
		}
		ul .actives > .child_menu {
			visibility: visible !important;
			span {
				visibility: visible;
			}
		}
		.side-menu {
			& > li > a span {
				left: 20rem !important;
			}
		}
	}
	
	#main {
		transition: .25s all linear;
		display: flex;
		flex-direction: column;
		min-height: 100vh;
		position: relative;
		&.active {
			width: calc(100% - 31.5rem);
			left: 31.5rem;
		}
	}
	
	.rb {
		#sidebar {
			width: 6.73636rem;
			/*overflow: hidden;*/
			background: $sbarbg;
			padding-top: 0;
			.menu-btn {
				margin: 0;
				width: auto;
				height: auto;
				padding: 2.09rem;
				background-color: $menubtnColor;
				//border-radius: .273rem;
				img {
					width: 2.54rem;
					height: 2.27rem;
				}
			}
			.menu_section > ul:first-child {
				margin-top: 0;
			}
			.sidebar_top {
				align-items: center;
				position: relative;
				background-color: #242628;
				
				margin-bottom: 3.67273rem;
				&:after {
					
					background-color: #242628;
					transition: .5s height;
					content: '';
					display: block;
					position: absolute;
					left: 0;
					right: 0;
					top: 100%;
					height: 0;
					width: 100%;
					
				}
				.sidebar_logo {
					position: relative;
					right: -10rem;
					max-width: 0px;
					margin-left: -1px;
				}
			}
			.navTop {
				&__link {
					font-size: 1.45rem;
					&-top {
						padding: .9rem 0;
						span {
							color: white;
						}
						svg {
							max-height: 2.27rem;
							width: 2rem;
							overflow: visible;
							path {
								fill: white;
							}
						}
						&:hover {
							background: $bgMenubtnColor;
							svg path {
								fill: white !important;
							}
						}
					}
				}
				&__ul-first > &__li {
					padding: 0;
					margin-bottom: .7rem;
				}
				&__li {
					padding: 0 !important;
					//margin-bottom: .7rem;
				}
			}
			.navTop__li.active .navTop__link-top {
				border-left: 4px solid var(--accent);
				text-decoration: none;
				background-color: $bgMenubtnColor;
			}
			.scroll-view {
				trtransition: .5s width;
				/*margin-top: 5.45rem;*/
				width: 100%;
			}
			.navTop__ul-2 li {
				.navTop__link:hover, &.active > .navTop__link {
					border-left: 4px solid transparent;
					background-color: $bgMenubtnColor;
					span {
						color: white !important;
					}
					svg path {
						fill: white !important
					}
				}
			}
			.navTop__wrap .navTop__link {
				svg.arrow {
					display: none;
				}
			}
			.menu_section {
				svg {
					max-height: 2.5rem;
					max-width: 2.5rem;
				}
			}
			
			&.active {
				width: 28.5rem;
				.navTop
				.navTop__wrap .navTop__link svg {
					width: 1.6rem;
					overflow: visible;
					
				}
				.navTop {
					&__link {
						
						font-size: 1.45rem;
						padding-left: 5.6rem;
						
						span {
							transition: .5s color;
							margin-left: 20/11*1rem;
						}
						
						&-top {
							padding: .9rem 1.81rem;
							svg {
								width: 2rem;
								padding: 0;
								path {
									transition: .5s fill;
								}
							}
						}
					}
					&__li.depth3 .navTop__link {
						padding-left: 9rem !important;
					}
					&__li.depth4 .navTop__link {
						padding-left: 12.5rem !important;
					}
					
					&__ul-2 {
						margin-top: 12/11*1rem;
					}
				}
				.scroll-view {
					max-height: calc(100% - 10rem);
					overflow-y: scroll;
					width: calc(100% + 1.9rem);
					overflow-x: hidden;
				}
				.sidebar_logo {
					transition: .5s max-width, 0.5s right, 0.3s margin-left;
					display: block;
					margin-left: 3rem;
					margin-top: 0;
					transform: scale(1);
					right: 0;
				}
				.sidebar_top:after {
					//height: (36/11)*1rem;
					height: 3.67273rem;
				}
				
			}
			
			&.closed {
				.navTop__ul {
					//background: #9D9D9D;
				}
				.navTop__li > .navTop__ul {
					background-color: $bgMenubtnColor;
					& > li {
						& > .navTop__link:hover, &.active > .navTop__link {
							background-color: $sbarbg;
						}
					}
					.navTop__li > .navTop__ul {
						background-color: $sbarbg;
						& > li {
							& > .navTop__link:hover, &.active > .navTop__link {
								background-color: $bgMenubtnColor;
							}
						}
					}
				}
			}
			
		}
		#main {
			width: calc(100% - 6rem);
			left: 6rem;
			&.active {
				width: calc(100% - 28.5rem);
				left: 28.5rem;
			}
		}
		
	}
	
	@include desktop-large-max {
		#main {
			width: calc(100% - 15rem);
			left: 15rem;
		}
		#main.active {
			width: calc(100% - 31.5rem);
			left: 31.5rem;
		}
		
	}
	
	@include desktop-large-min {
		#main.active {
			width: 100% !important;
			left: 0 !important;
		}
		#sidebar.active {
		}
	}
	
	@include tablet-mobile {
		.content.nav-sm {
			#sidebar {
				ul ul {
					display: none !important;
				}
			}
		}
		#main {
			width: 100% !important;
			left: 0 !important;
		}
		#sidebar {
			margin-left: -15rem;
			&.active {
				margin-left: 0;
			}
		}
	}
</style>
