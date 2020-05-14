<template>
    <div id="info" class="page__info">
        <template v-if="template === 'verticalInfo'">
            <div class="container verticalInfo">
                <div class="row">
                    <div class="col-md-12 offset-md-2">
                        <div class="header_top" v-if="data.fe_url_header_top" v-html="data.fe_url_header_top"></div>
                        <div class="header_bottom" v-if="data.fe_url_header_bottom" v-html="data.fe_url_header_bottom"></div>
                        <img class="image" v-if="data.image_path" :src="data.image_path" alt="">
                        <div class="info" v-if="data.fe_url_info" v-html="data.fe_url_info"></div>
                        <div class="footer_top" v-if="data.fe_url_footer_top" v-html="data.fe_url_footer_top"></div>
                        <div class="footer_bottom" v-if="data.fe_url_footer_bottom" v-html="data.fe_url_footer_bottom"></div>
                    </div>
                </div>
            </div>
        </template>
        <template v-else-if="template === 'flexInfo'">
            <div class="container flexInfo">
                <div class="row">
                    <div class="col-md-12 offset-md-2">
                        <div class="header_template">
                            <div class="header_top" v-if="data.fe_url_header_top" v-html="data.fe_url_header_top"></div>
                            <div class="header_bottom" v-if="data.fe_url_header_bottom" v-html="data.fe_url_header_bottom"></div>
                        </div>
                        <div class="body_template">
                            <img class="image" v-if="data.image_path" :src="data.image_path" alt="">
                            <div class="info" v-if="data.fe_url_info" v-html="data.fe_url_info"></div>
                        </div>
                        <div class="footer_template">
                            <div class="footer_top" v-if="data.fe_url_footer_top" v-html="data.fe_url_footer_top"></div>
                            <div class="footer_bottom" v-if="data.fe_url_footer_bottom" v-html="data.fe_url_footer_bottom"></div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template v-else-if="template === 'flexInfoCenter'">
            <div class="container flexInfoCenter">
                <div class="row">
                    <div class="col-md-12 offset-md-2">
                        <div class="header_template">
                            <div class="header_top" v-if="data.fe_url_header_top" v-html="data.fe_url_header_top"></div>
                            <div class="header_bottom" v-if="data.fe_url_header_bottom" v-html="data.fe_url_header_bottom"></div>
                        </div>
                        <div class="body_template">
                            <img class="image" v-if="data.image_path" :src="data.image_path" alt="">
                            <div class="info" v-if="data.fe_url_info" v-html="data.fe_url_info"></div>
                        </div>
                        <div class="footer_template">
                            <div class="footer_top" v-if="data.fe_url_footer_top" v-html="data.fe_url_footer_top"></div>
                            <div class="footer_bottom" v-if="data.fe_url_footer_bottom" v-html="data.fe_url_footer_bottom"></div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template v-else-if="template === 'flexInfoMiddle'">
            <div class="container flexInfoMiddle">
                <div class="row">
                    <div class="col-md-12 offset-md-2">
                        <div class="header_top" v-if="data.fe_url_header_top" v-html="data.fe_url_header_top"></div>
                        <div class="header_bottom" v-if="data.fe_url_header_bottom" v-html="data.fe_url_header_bottom"></div>
                        <div class="body_template">
                            <img class="image" v-if="data.image_path" :src="data.image_path" alt="">
                            <div class="info" v-if="data.fe_url_info" v-html="data.fe_url_info"></div>
                        </div>
                        <div class="footer_top" v-if="data.fe_url_footer_top" v-html="data.fe_url_footer_top"></div>
                        <div class="footer_bottom" v-if="data.fe_url_footer_bottom" v-html="data.fe_url_footer_bottom"></div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
    import {EventBus} from '../app';
    export default {
        name: "Info",
        data: function () {
            return {
                data: {},
                template: 'verticalInfo', // flexInfo,flexInfoMiddle,verticalInfo,flexInfoCenter
            }
        },
        beforeDestroy() {
            EventBus.$off('close_step');
        },
        mounted() {
            EventBus.$on('close_step', async () => {
                this.$emit('modelSaved')
            });
            this.$http.post(this.$bRoute.meta.route, {code: this.$bRoute.meta.fe_url_code})
                .then(res => {
                    this.data = res.data;
                })
        }
    }
</script>

<style lang="scss">
    @import '../../sass/variables';
    @import '../../sass/mixin';
    #info{
        text-align: center;
        img{
            max-width: 100%;
        }
        p{
            font-size: 1.8rem;
            text-align: center;
            line-height: 1.2;
            margin-bottom: 2.5rem;
        }
        a {
            color: var(--accent);
            font-weight: 600;
        }
        .image{
            margin-bottom: 65px;
        }
        .flexInfo{
            .header_template{
                display: flex;
                justify-content: space-between;
            }
            .body_template{
                display: flex;
                justify-content: space-between;
            }
            .footer_template{
                display: flex;
                justify-content: space-between;
            }
        }
        .flexInfoCenter{
            .header_template{
                display: flex;
                justify-content: center;
            }
            .body_template{
                display: flex;
                justify-content: center;
            }
            .footer_template{
                display: flex;
                justify-content: center;
            }
        }
        .flexInfoMiddle{
            .body_template{
                display: flex;
                justify-content: space-between;
            }
        }
    }
</style>
