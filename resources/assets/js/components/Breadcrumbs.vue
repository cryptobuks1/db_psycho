<template>
    <div class="breadcrumb hidden-md-down">
        <div class="container">
            <div class="row">
                <div class="col">
                    <template>
                        <ol class="breadcrumb" :class="{'breadcrumb_empty': crumbs}">
                            <li role="presentation" class="breadcrumb-item" v-for="item in crumbs.data">
                                <router-link :to="item.to" :title="item.text"
                                             :tag="$bRoute.path === item.to ? 'span':'a'">{{item.text}}
                                </router-link>
                            </li>
                        </ol>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Breadcrumbs",
        data: function () {
            return {
                crumbs: [],
                firstLoad: true,
                staticCrumbs: {}
            }
        },
        computed: {
            //Сортировка breadcrumbs
            // sortedArray: function () {
            //     function compare(a, b) {
            //         if (a.order < b.order)
            //             return -1;
            //         if (a.order > b.order)
            //             return 1;
            //         return 0;
            //     }
            //
            //     return this.crumbs.sort(compare);
            // }
        },
        watch: {
            '$bRoute.fullPath'() {
                this.firstLoad = true;
                this.crumbsBuild();
            },
        },
        methods: {
            // formingUrl(Array) {
            //     let newArray = [''];
            //     Array.shift();
            //     Array.forEach((e, i) => {
            //         newArray.push(newArray[i] + '/' + e);
            //     });
            //     newArray[0] = '/';
            //     return newArray;
            // },
            async crumbsBuild() {

                //Проверка на повторное выполнение
                if (this.$bRoute && this.$bRoute.meta && this.$bRoute.meta.id_route && this.firstLoad){
                    this.firstLoad = false;
                    this.crumbs = await this.$http.post('/admin/FeRoutes/getBreadcrumbs', {
                        fe_route_id: this.$bRoute.meta.id_route,
                        params: this.$bRoute.params
                    }).catch((error) => {
                        this.crumbs = [];
                    });
                }
//                 let routes, breadcrumbArray = [];
//                 let pathArray, linksArray;
//                 //Получение массива роутов страницы
//                 pathArray = this.formingUrl(this.$bRoute.path.split('/'));
//                 //Получение массива ссылок страницы
//                 linksArray = this.formingUrl(this.$bRoute.matched[0].path.split('/'));
//                 //Получение роутов соответствующих страницы
//                 routes = this.$bRouter.routes.filter(rout => {
//                     return linksArray.some(newPath => {
//                         return rout.path === newPath;
//                     })
//                 });
//                 let breadcrumbsLength = routes.length;
//                 //Заполнение массива breadCrumbs
//                 routes.forEach(async (rout, index) => {
//                     // Проверка на статическое значение
//                     if (!rout.meta.model) {
//                         breadcrumbArray.push({
//                             to: pathArray[index],
//                             text: this.staticCrumbs[rout.path],
//                             order: index,
//                         });
//                         //Перевод в переменную VUE
//                         if (breadcrumbsLength === breadcrumbArray.length) this.crumbs = breadcrumbArray;
//                     } else {
//                         // Отправка запроса на получение динамического значения
// //                        let response = await this.$http.post('/admin/FeRoutes/getBreadcrumbs', {
// //                            fe_route_id: this.$bRoute.meta.id_route,
// //                            params: this.$bRoute.params
// //                        });
//                         breadcrumbArray.push({
//                             to: pathArray[index],
//                             text: response.data,
//                             order: index,
//                         });
//                         //Перевод в переменную VUE
//                         if (breadcrumbsLength === breadcrumbArray.length) this.crumbs = breadcrumbArray;
//                     }
//                 });
            }
        },
        mounted() {
           this.$nextTick(()=>{
               let waitRoute  = setInterval(() =>{
                   if(this.firstLoad) this.crumbsBuild();
                   else clearInterval(waitRoute);
               },200)
           })

            // this.$http.post('/menu?mode=0&module=main&object=buildBreadcrumbs', null)
            //     .then(res => {
            //         this.staticCrumbs = res.data[0];
            //         this.$store.state.lang = res.data[0].currentLng;
            //     });
        }
    }
</script>

<style lang="scss">
    div.breadcrumb {
        padding: 0 1.5rem;
        margin-bottom: 0;
        .container {
            padding: 0;
        }
    }

    .breadcrumb {
        padding: 0;
        background: none;
        margin-bottom: 3.5rem;
        .breadcrumb-item {
            a {
                color: #798699;
            }
            &.active span {
                color: #202a3d;
            }
        }
        & > li + li:before {
            content: '>';
            color: #798699;
        }
    }
</style>
