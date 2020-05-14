<template>
	<li class="navTop__li" :class="{active: open,isFolder: isFolder,isLink: !isFolder}" v-if="model && parameters"
	    :style="'padding-bottom:'+model.separator+'px'">
		<router-link
				:to="model.link"
				class="navTop__link"
				:class="{isLink:!isFolder}"
				@click.native="toggle($event.target)"
		>
			<div class="navTop__title">
				<div class="navTop__li_img" v-if="parameters.any_level_icons">
					<img v-if="model.img" :src="model.img" class="svg" alt="">
					<template v-else>
						<img v-if="isFolder" src="/img/folder.svg" class="svg" alt="">
						<img v-else src="/img/file.svg" class="svg" alt="">
					</template>
				</div>
				<span>{{ model.title}} </span>
			</div>
			<svg
					v-if="isFolder"
					class="arrow"
					xmlns="http://www.w3.org/2000/svg"
					xmlns:xlink="http://www.w3.org/1999/xlink"
					width="5px" height="8px">
				<path fill-rule="evenodd" fill="rgb(32, 43, 61)"
				      d="M0.453,7.917 C0.401,7.972 0.337,8.000 0.266,8.000 C0.195,8.000 0.131,7.972 0.079,7.917 C-0.024,7.807 -0.024,7.628 0.079,7.518 L3.362,4.002 L0.079,0.487 C-0.024,0.377 -0.024,0.198 0.079,0.088 C0.182,-0.023 0.350,-0.023 0.453,0.088 L3.923,3.803 C4.026,3.913 4.026,4.092 3.923,4.202 L0.453,7.917 Z" />
			</svg>
		</router-link>
		<ul class="nav_top navTop__ul" ><!--v-if="isFolder"searchempty -->
			<li v-if="+model.group_l && !model.children" class="navTop__li item isLink" :class="'depth'+model.depth">
				<div class="navTop__link isLink" >
					<div class="navTop__title">
						<div class="navTop__li_img">
							<img src="/img/interfacedashboard/file.svg" class="svg" alt="">
						</div>
						<span> {{parameters.empty_title}} </span>
					</div>
				</div>
			</li>
			<MenuItem
					class="item"
					
					v-for="(model, index)  in model.children"
					:key="index"
					:model="model"
					:parameters="parameters"
					:class="'depth'+model.depth"
					
			>
			</MenuItem>
		</ul>
	</li>
</template>


<script>
    import $ from 'jquery';

    export default {
        name: 'MenuItem',
        props: {
            model: Object,
            parameters: Object
        },
        data() {
            return {
                open: false
            }
        },
        computed: {
            isFolder: function () {
                return +this.model.group_l
            }
        },
        methods: {
            toggle: function (target) {
                if (this.isFolder) {
                    /*
					   * Убираем соседние active
					   * так как залипание сделано для rb, тут не проверяется тема rb
					* */
                    if (target.closest('#sidebar')) {
                        var _ = this, isOpen = !target.closest('#sidebar').__vue__.$data.opened;
                        if (isOpen) {
                            _.$el.parentElement.querySelectorAll('.active').forEach(function (el) {
                                if (el != _.$el) {
                                    el.classList.remove('active');
                                    el.__vue__.$data.open = false;
                                }
                            })
                        }
                        /*
                        * Убираем active с top menu, если клик был по внутреннему эллементу side bar
                        * */
                        var istopMenu = document.querySelector('.navTop .topMenu .active');
                        istopMenu ? istopMenu.classList.remove('active') : '';
                    }
                    /*
					* Убираем соседние active END
					* */
                    this.open = !this.open;
                    if (!this.$store.state.menu_open && target.closest('#sidebar')) {

                        /*Array.from(target.closest(".navTop__ul").childNodes).forEach(item => {
//                            if(!$(target.closest('.navTop__li').lastChild.nodeName=='UL')){
                            $(item.getElementsByClassName("navTop__ul")[0]).slideUp(250);
//                            }
                        });*/


                        const
                            $ultarget = $(target.closest('.navTop__li').getElementsByClassName("navTop__ul")[0]),
                            $parentList = $ultarget.parents("ul.navTop__ul[style='display: block;']");

                        $(target.closest('.navTop__wrap')).find("ul.navTop__ul[style='display: block;']").each(function (i, el) {
                            let bool = false;
                            $parentList.each(function (index, ul) {
                                bool = !bool ? el == ul : bool;
                            })
                            if (!bool && el != $ultarget[0]) {
                                /*$(el).slideUp(250)*/
                                $(el).css("display", "none");
                            }


                        })

                        //var display = window.getComputedStyle($(target.closest('.navTop__li').getElementsByClassName("navTop__ul")[0])[0]).display;

                        //if (display == 'block') return;
                    }


                    $(target.closest('.navTop__li').getElementsByClassName("navTop__ul")[0]).slideToggle(250, function (e) {
                        let dropDown = target.closest('.navTop__wrap');
                        let heightBox = $(dropDown.closest('.navTop__dropdown')).innerHeight();
                        let heightAllChilds = 0;
                        Array.from(dropDown.childNodes).forEach(e => {
                            heightAllChilds = heightAllChilds + e.offsetHeight;
                        })
                        if (heightAllChilds > heightBox) {
                            $(dropDown.closest('.navTop__dropdown')).addClass('scroll');
                            $(dropDown.closest('.navTop__dropdown')).find('.vb-dragger').css('max-height', 'calc(100% - 50px)');
                        } else {

                            $(dropDown.closest('.navTop__dropdown')).removeClass('scroll');
                            $(dropDown.closest('.navTop__dropdown')).find('.vb-dragger').css('max-height', '0');

                        }
                    });
                }
                else {
                    $('#sidebar .topMenu .navTop__li.link.active').removeClass('active');
                    $('#menu .topMenu .navTop__li-top.active').removeClass('active');
                    if (!this.$store.state.menu_open) {
                        Array.from(document.querySelectorAll('#sidebar .topMenu  ul')).forEach(function (item) {
                            $(item).slideUp(250);
                        });
                        $('#sidebar .topMenu .navTop__li.active').removeClass('active');
                    }

                }
            },
        },
    }
</script>

<style lang="scss">
	@import '../../sass/variables';
	@import '../../sass/mixin';
	
	.navTop__wrap {
		position: absolute;
	}
	
	.navTop__dropdown {
		position: absolute !important;
		z-index: 9999;
		background: #fff;
		top: calc(100% + 1px);
		left: -15px;
		border: 1px solid #e4e7ea;
		border-top: 0;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
		min-width: 305px;
		transform: scaleY(0);
		transform-origin: top;
		transition: .25s;
		display: block;
		height: 400px;
		box-shadow: 6px 16px 29px rgba(32, 43, 61, 0.25);
		overflow: auto;
		
		&.scroll {
			&:after {
				opacity: 1;
			}
		}
	}
	
	.navTop__wrap {
		.navTop__link {
			opacity: 0;
			transition: .25s;
			display: flex;
			justify-content: space-between;
		}
		.navTop__ul {
			display: none;
			width: 100%;
			.navTop__link {
				padding-left: 3rem !important;
			}
			.navTop__ul {
				.navTop__link {
					padding-left: 6rem !important;
				}
			}
		}
		.navTop__li {
			min-height: 4rem;
			display: flex;
			align-items: center;
			transition: .25s background-color;
			flex-direction: column;
			&_img {
				svg path {
					fill: $base-color;
					
				}
			}
			.navTop__title {
				display: flex;
				align-items: center;
				.navTop__li_img {
					flex-shrink: 0;
				}
			}
			.navTop__link {
				width: 100%;
				display: flex;
				padding: 0 1.8rem;
				align-items: center;
				height: 4rem;
				color: #202a3d;
				&:hover {
					background-color: #d7dde3;
					text-decoration: none;
					span {
						color: #202a3d;
					}
				}
			}
			span {
				color: #202a3d;
				transition: .25s;
			}
		}
		
	}
</style>
