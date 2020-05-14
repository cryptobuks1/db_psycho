/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/** ******  left menu  *********************** **/

$('#main').click(function () {
    $('.nav-sm .child_menu').hide();
    //$('.nav-sm #sidebar-menu li').removeClass('actives');
});

$(document).on('click', '.content', function (event) {
    var box = $('.dropdown_box') , th = $('thead th'), $target = $(event.target);

    // Убирает активные эллементы с navTop__li-top.active , если нажатый эллемент не является дочерным обьекта #menu .topMenu
    if(!$('#menu .topMenu').has(document.activeElement).length ){
        $('#menu .topMenu .navTop__li-top.active').removeClass('active');
    }

    if (event.target.closest('.navTop__li')) {
        if(!event.target.closest('.navTop__li').classList.contains('isLink')){
            return false;
        }
    }



    /*if ($target.hasClass('dropdown_box_select') ||
        $target.hasClass('btn-dropdown') ||
        $($target.context).parents('.exFilterDropdown').length ||
        $target.parents('exFilter')[0] ||
        $target.parents('exFilterSortss')[0] )
    {
        $("#menu .topMenu .navTop__li-top.active").removeClass('active');

    }*/

// Закоментировал Костыль для ie11
   /* if (event.target.className != 'dropdown_box'
        && event.target.parentNode.className != 'dropdown_box'
        && event.target.className != 'btn-dropdown'
        && event.target.parentNode.children[0].className != 'btn-dropdown'
        && event.target.className != 'dropwond_link filterSelect')
    {

        //$(box).removeClass('open');
        //$(th).removeClass('open');
    }*/

    closeAllDdl(event)

});

function closeAllDdl(event){
    // собираем не кликнутые ddl
    if(! event.target.classList) {return false};
    var  boxes = document.querySelectorAll('.dropdown_box.open'), // формируем список открытых листов
        current = event.target.classList.contains('btn-dropdown')? event.target : event.target.closest('.btn-dropdown'); // определяем кликнутый лист, если он кликнут
    current = current  ? current.parentElement.querySelectorAll('.dropdown_box.open')[0] : false ;

    removeFromList(boxes,current); //Делаем черное дело...

    // собираем не кликнутые filter
    var  boxes = document.querySelectorAll('th.open'), // формируем список открытых фильтров
        current = event.target.tagName == 'th'.toUpperCase() ? event.target : event.target.closest('th') ; // определяем кликнутый фильтр, если он кликнут
    removeFromList(boxes,current); //Делаем черное дело...

}
function removeFromList(boxes,current){
    if(!boxes[0]){ return false }
    Array.prototype.forEach.call(boxes, function (item) {
        if(item != current)
        {
            item.classList.remove('open')
        }

    })
}
/*$('#list_table th *,#list_table th').click(function(e){
    /!*console.log('click',e.target);
    $(document).click(e);
})*!/*/


//выстреливает после клика в шапке таблицы

$(document).on('mousedown', 'table th', function (e) {
    switch (e.which) {
        case 1:
            closeAllDdl(e)
            //Left Mouse button pressed.
            break;
        case 2:

            //Middle Mouse button pressed.
            break;
        case 3:

            //Right Mouse button pressed.
            break;
        default:

            //You have a strange Mouse!
    }

});



/*
$('body').on('click', '.btn-dropdown', function (e) {
    var  boxes = document.querySelectorAll('.dropdown_box.open');
    Array.prototype.forEach.call(boxes, function (item) {
          console.log('item')
          item.classList.remove('open')

    })
    // console.log(boxes)
})*/

$(document).on('click', '#main.active', function (e) {
    if ($(window).width() < 768) {
        $('#sidebar .sidebar_btn-menu').click();
    }
});
$(document).on('click', '.exFilterHead', function (e) {
    // let dropdown = $(this).parents('.exFilterDropdown')[0];
    // let sorts = $(dropdown).children('.exFilterSorts')[0];
    // let condition = $(dropdown).children('.exFilterСondition')[0];
    // let value = $(dropdown).children('.exFilterValue')[0];
    // console.log($($($(this).parent()[0]).children('.exFilterBody')[0]).height($(dropdown).height() - $(sorts).height() - $(value).height() - $(condition).height()));
    // // console.log($(dropdown).height(),$(sorts).height(),$(condition).height(),$(value).height())
    $(this).parent().toggleClass('active');
    // console.log($(dropdown).height());
    // console.log($(this).parent().find('.exFilterBody').height());
});

$('body').on('click', '.btn-dropdown', function (e) {
    if(e.target.getAttribute('disabled') === 'disabled') return false;
    $('.dropdown_box_select').removeClass('open');
    if($(this).next().hasClass('open')) $(this).next().removeClass('open');

    else {
        $(this).next().addClass('open');
    }
});

$('body').on('keyup', 'filterSelect', function (e) {
    $('dropdown_box_select').addClass('open');
});




$(function () {
    // var tdM = 'LB_';
    // $('#list-box').on("mouseup", '.JColResizer', function (e) {
    //     $('#list_table thead tr th').each(function (i, e) {
    //         localStorage.setItem(tdM + i, $(e).width());
    //     })
    // });


    // setInterval (function(){
    //
    // }, 1000);


    // function setWidthTable() {
    //     console.log('setWidthTable');
    //     var lsLen = localStorage.length;
    //     if (lsLen > 0) {
    //         for (var i = 0; i < lsLen; i++) {
    //             var key = localStorage.key(i);
    //             if (key.indexOf(tdM) == 0) {
    //                 // console.log(key);
    //                 var thW = localStorage.getItem(key);
    //                 var elem = $('#list_table thead th')[i];
    //                 $(elem).css('width', thW);
    //                 // console.log($(elem).width());
    //             }
    //         }
    //         setLeftResizeDiv();
    //
    //     } else {
    //         setDefaultWidth('list_table');
    //     }
    // }
    // function setLeftResizeDiv(table){
    //     var arr = new Array();
    //     $('#list_table thead th').each(function (i,e) {
    //         arr[i] = $(e).position().left - 15;
    //     });
    //     $('.JCLRgrips > div').each(function (i,e) {
    //         console.log(arr[i+1]);
    //         $(e).css('left',arr[i+1]);
    //     })
    // }
    // function setDefaultWidth(table) {
    //     $('#' + table + ' thead th').each(function (i, e) {
    //         var key = $(e).width();
    //         // console.log(key);
    //         setLocalStorage(tdM, i, key);
    //         var keyW = getLocalStorage(tdM, i);
    //         $(e).css('width', keyW);
    //     })
    // }
    //
    // function setLocalStorage(pre, i, key) {
    //     localStorage.setItem(pre + i, key);
    // }
    //
    // function getLocalStorage(pre, i) {
    //     var key = localStorage.getItem(pre + i);
    //     console.log(key);
    //     return key;
    // }

    // setWidthTable();
    //$('#sidebar-menu li ul').slideUp();
    //$('#sidebar-menu li').removeClass('actives');
    // $('.child_menu-last li').click(function (e) {
    //     $(this).parent().find('li').removeClass('actives');
    // });


    // $('#sidebar-menu li').click(function () {
    //     if ($(this).is('.active')) {
    //         $(this).removeClass('active');
    //         $('ul', this).slideUp();
    //         $(this).removeClass('nv');
    //         $(this).addClass('vn');
    //     } else {
    //         $('#sidebar-menu li ul').slideUp();
    //         $(this).removeClass('vn');
    //         $(this).addClass('nv');
    //         $('ul', this).slideDown();
    //         $('#sidebar-menu li').removeClass('active');
    //         $(this).addClass('active');
    //     }
    // });
    // $('.nav-sm ul li > a').click(function (e) {
    //     var th = $(this).parent('li')[0];
    //     console.log($('#main'));
    //     if($(th).is('.actives')){
    //         $(th).removeClass('actives');
    //         $(th).children('ul').slideUp();
    //     }else{
    //         $(th).children('ul').slideDown();
    //         $(th).parent().find('li').removeClass('actives');
    //         $(th).addClass('actives');
    //     }
    //     // $('.nav-sm #sidebar-menu .menu_section ul > li').removeClass('actives');
    //     // $(th).addClass('actives');
    //     // $(thH).addClass('actives');
    //     // $(th).children('ul').slideDown();
    // });
    $("body").on('click', '#sidebar-menu .side-menu li > a', function (e) {
        if ($(window).width < 768) {

        } else {
            var th = $(this).parent('li');
            var mode;
            if ($('.content').attr('class') == 'nav-sm') {
                mode = 'mobile';
            } else {
                mode = 'destope'
            }
            if ($(th).children('ul').length > 0) {
                if (mode == 'mobile') {


                    if ($(th).hasClass('actives')) {
                        if ($(th).parent('ul').attr('class') == 'nav side-menu') {
                            $('.nav.side-menu > li').removeClass('actives').children('ul').slideUp();
                        }
                        $(th).removeClass('actives');
                        $(th).children('ul').slideUp();
                    } else {
                        $(th).siblings().removeClass('actives').children('ul').slideUp();

                        $(th).addClass('actives');

                        $(th).children('ul').slideDown();
                    }
                } else {
                    if ($(th).hasClass('actives')) {
                        $(th).removeClass('actives');
                        sidebarMenu();
                    } else {
                        $(th).addClass('actives');
                        sidebarMenu();
                    }
                }
            }
        }


    });

});

function sidebarMenu() {
    $('#sidebar-menu li').each(function (i, e) {
        var sta = $(e).hasClass('actives');
        if (sta) {
            $(e).children('ul').slideDown();
        } else {
            $(e).children('ul').slideUp();
        }
    })
    // $('#sidebar-menu .actives ul').slideDown();
}

/* Sidebar Menu active class */
$(function () {
    var url = window.location;
    $('#sidebar-menu a[href="' + url + '"]').parent('li').addClass('current-page');
    $('#sidebar-menu a').filter(function () {
        return this.href == url;
    }).parent('li').addClass('current-page').parent('ul').slideDown().parent().addClass('active');
});

/** ******  /left menu  *********************** **/


/** ******  tooltip  *********************** **/
// $(function () {
//         $('[data-toggle="tooltip"]').tooltip()
//     })
//     /** ******  /tooltip  *********************** **/
//     /** ******  progressbar  *********************** **/
// if ($(".progress .progress-bar")[0]) {
//     $('.progress .progress-bar').progressbar(); // bootstrap 3
// }
// /** ******  /progressbar  *********************** **/
// /** ******  switchery  *********************** **/
// if ($(".js-switch")[0]) {
//     var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
//     elems.forEach(function (html) {
//         var switchery = new Switchery(html, {
//             color: '#26B99A'
//         });
//     });
// }
/** ******  /switcher  *********************** **/
/** ******  collapse panel  *********************** **/
// Close ibox function
$('.close-link').click(function () {
    var content = $(this).closest('div.x_panel');
    content.remove();
});

// Collapse ibox function
$('.collapse-link').click(function () {
    var x_panel = $(this).closest('div.x_panel');
    var button = $(this).find('i');
    var content = x_panel.find('div.x_content');
    content.slideToggle(200);
    (x_panel.hasClass('fixed_height_390') ? x_panel.toggleClass('').toggleClass('fixed_height_390') : '');
    (x_panel.hasClass('fixed_height_320') ? x_panel.toggleClass('').toggleClass('fixed_height_320') : '');
    button.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
    setTimeout(function () {
        x_panel.resize();
    }, 50);
});
/** ******  /collapse panel  *********************** **/
/** ******  iswitch  *********************** **/
if ($("input.flat")[0]) {
    $(document).ready(function () {
        $('input.flat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });
}
/** ******  /iswitch  *********************** **/
/** ******  star rating  *********************** **/
// Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function ($, window) {
    var Starrr;

    Starrr = (function () {
        Starrr.prototype.defaults = {
            rating: void 0,
            numStars: 5,
            change: function (e, value) {
            }
        };

        function Starrr($el, options) {
            var i, _, _ref,
                _this = this;

            this.options = $.extend({}, this.defaults, options);
            this.$el = $el;
            _ref = this.defaults;
            for (i in _ref) {
                _ = _ref[i];
                if (this.$el.data(i) != null) {
                    this.options[i] = this.$el.data(i);
                }
            }
            this.createStars();
            this.syncRating();
            this.$el.on('mouseover.starrr', 'span', function (e) {
                return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('mouseout.starrr', function () {
                return _this.syncRating();
            });
            this.$el.on('click.starrr', 'span', function (e) {
                return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('starrr:change', this.options.change);
        }

        Starrr.prototype.createStars = function () {
            var _i, _ref, _results;

            _results = [];
            for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
            }
            return _results;
        };

        Starrr.prototype.setRating = function (rating) {
            if (this.options.rating === rating) {
                rating = void 0;
            }
            this.options.rating = rating;
            this.syncRating();
            return this.$el.trigger('starrr:change', rating);
        };

        Starrr.prototype.syncRating = function (rating) {
            var i, _i, _j, _ref;

            rating || (rating = this.options.rating);
            if (rating) {
                for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                }
            }
            if (rating && rating < 5) {
                for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                }
            }
            if (!rating) {
                return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
            }
        };

        return Starrr;

    })();
    return $.fn.extend({
        starrr: function () {
            var args, option;

            option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
            return this.each(function () {
                var data;

                data = $(this).data('star-rating');
                if (!data) {
                    $(this).data('star-rating', (data = new Starrr($(this), option)));
                }
                if (typeof option === 'string') {
                    return data[option].apply(data, args);
                }
            });
        }
    });
})(window.jQuery, window);

$(function () {
    return $(".starrr").starrr();
});

$(document).ready(function () {

    $('#stars').on('starrr:change', function (e, value) {
        $('#count').html(value);
    });


    $('#stars-existing').on('starrr:change', function (e, value) {
        $('#count-existing').html(value);
    });

});
/** ******  /star rating  *********************** **/
/** ******  table  *********************** **/
$('table input').on('ifChecked', function () {
    check_state = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('table input').on('ifUnchecked', function () {
    check_state = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});

var check_state = '';
$('.bulk_action input').on('ifChecked', function () {
    check_state = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('.bulk_action input').on('ifUnchecked', function () {
    check_state = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});
$('.bulk_action input#check-all').on('ifChecked', function () {
    check_state = 'check_all';
    countChecked();
});
$('.bulk_action input#check-all').on('ifUnchecked', function () {
    check_state = 'uncheck_all';
    countChecked();
});

function countChecked() {
    if (check_state == 'check_all') {
        $(".bulk_action input[name='table_records']").iCheck('check');
    }
    if (check_state == 'uncheck_all') {
        $(".bulk_action input[name='table_records']").iCheck('uncheck');
    }
    var n = $(".bulk_action input[name='table_records']:checked").length;
    if (n > 0) {
        $('.column-title').hide();
        $('.bulk-actions').show();
        $('.action-cnt').html(n + ' Records Selected');
    } else {
        $('.column-title').show();
        $('.bulk-actions').hide();
    }
}

/** ******  /table  *********************** **/
/** ******    *********************** **/
/** ******    *********************** **/
/** ******    *********************** **/
/** ******    *********************** **/
/** ******    *********************** **/
/** ******    *********************** **/
/** ******  Accordion  *********************** **/

$(function () {
    $(".expand").on("click", function () {
        $(this).next().slideToggle(200);
        $expand = $(this).find(">:first-child");

        if ($expand.text() == "+") {
            $expand.text("-");
        } else {
            $expand.text("+");
        }
    });
});

/** ******  Accordion  *********************** **/
/** ******  scrollview  *********************** **/
// $(document).ready(function () {
//
//             $(".scroll-view").niceScroll({
//                 touchbehavior: true,
//                 cursorcolor: "rgba(42, 63, 84, 0.35)"
//             });
//
// });
/** ******  /scrollview  *********************** **/

