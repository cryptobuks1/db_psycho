<template>
    <div class="block"
    > <!--Перебираем блоки -->
        <div class="block-heading">

            <h1 v-if="block.show_name"  class="block-name" @click="hideBlock(block)">{{block.block_title}}</h1>
            <svg :class="{'rotate':block.visible}" @click="hideBlock(block)" v-if="block.accordion"
                 xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10">
                <path id="Right_Arrow" data-name="Right Arrow" class="cls-1"
                      d="M1641.01,948l-6.01-5.012v10.024Z" transform="translate(-1635 -943)"/>
            </svg>
        </div>
        <transition name="fade" mode="out-in">
            <div v-if="block.visible || !block.accordion" class="row contractor_box d-flex align-items-start"
                 :class="'block_type__'+block.block_type">
                <Zone
                        :fields="left_zone_fields"
                        :model="model"
                        :model_name="model_name"
                        :class="{'left-zone':true,'full-width':block.block_zone_quantity===1}"
                        v-if="block.block_type === 'block_card'"
                        :add_models="add_models"
                        :disable_inputs="disable_inputs"
                ></Zone>

                <Zone v-if="block.block_zone_quantity===2 && block.block_type === 'block_card'"
                      :fields="right_zone_fields"
                      :model="model"
                      :model_name="model_name"
                      :add_models="add_models"
                      class="right-zone"
                      :disable_inputs="disable_inputs"
                ></Zone>

                <List
                        v-if="block.block_type === 'block_list_base'"
                        :block="block"
                        :disable_inputs="disable_inputs"
                        :model="model"
                        type="document"
                ></List>

            </div>
        </transition>
    </div>
</template>

<script>
    import Zone from './Zone.vue';
    import List from './List.vue';

    export default {
        data() {
            return {
                left_zone_fields: [],
                right_zone_fields: [],
            }
        },
        methods: {
            hideBlock(block) {
                if (block.accordion) block.visible = !block.visible;
            }
        },

        mounted() {
            this.block.block_fields.forEach(field => {
                if (field.zone == 1) this.left_zone_fields.push(field);
                else if (field.zone == 2) this.right_zone_fields.push(field);
            })
        },

        props: [
            "block",
            "model",
            "add_models",
            "disable_inputs",
            "model_name"
        ],
        components: {
            Zone,
            List
        }
    }

</script>

<style lang="scss">
    @import "../../sass/variables.scss";
    @import "../../sass/mixin.scss";

    #contractor .block {
        display: flex;
        flex-direction: column;
        background-color: $white-color;
        /*padding-left: 15px;*/
        /*padding-right: 15px;*/
        /*height: 100%;*/
        border-radius: 8px;
        margin-bottom: 3rem;
        /*width: 100%;*/

        .block-heading {
            display: flex;
            align-items: center;
            position: relative;
            .block-name {
                padding-left: 15px;
                /*margin-top: 1rem;*/
                font-size: 2rem;
                margin-bottom: 0;
                padding-top: 1.8rem;
                padding-bottom: 1rem;
                cursor: pointer;
            }
            svg {
                transition: all .3s;
                cursor: pointer;
                &.rotate {
                    transform: rotate(90deg);
                }
                margin-left: 1rem;
                path {
                    fill: #71757b;
                }
            }
        }

        .contractor_box {
            background: #fff;
            height: 100%;
            width: 100%;
            /*padding: 5rem 0;*/
            margin-left: 0;
            margin-right: 0;
            /*margin-top: 3rem;*/
            /*border-radius: 4px;*/

            .field-box {
                margin-bottom: 1.5rem;
                margin-top: 1.5rem;
                label {
                    color: #202a3d;
                    font-size: 1.4rem;
                    display: flex;
                    font-weight: 600;
                    min-height: 1.6rem;
                    padding-left: .3rem;
                }
                input {
                    width: 100%;
                    height: 3.5rem;
                    border-radius: 4px;
                    border: 1px solid #ced0da;
                    background-color: #ffffff;
                    padding-left: 1.7rem;
                    font-size: 1.5rem;
                    margin-top: 1.3rem;
                    padding-right: 1.5rem;
                }
                select {
                    width: 100%;
                    margin-top: 1.3rem;
                    height: 3.5rem;
                    border-radius: 4px;
                    border: 1px solid #ced0da;

                    padding-left: 1.7rem;
                }
                //стили для дропдауна с поиском

                .dropdown {
                    margin-top: 1.3rem;
                    width: 100%;
                    .btn-dropdown {
                        width: 100%;
                        height: 3.5rem;
                        font-size: 1.6rem;
                        line-height: 1.6rem;
                        border: none;
                        margin-right: 0;
                        margin-bottom: 0;
                        img.btn-dropdown {
                            position: absolute !important;
                            right: 0 !important;
                            transform:translateY(-50%);
                            top:50%;
                            padding-right: 1rem !important;
                            width: auto !important;
                            height: auto !important;
                            background-color: transparent !important;
                            background-image: none !important;
                        }
                        input {
                            color: $base-color;
                            position: absolute;
                            left: 0;
                            right: 0;
                            top: 0;
                            margin-top: 0;
                        }
                    }
                    .dropdown_box {
                        max-height: 20rem;
                        overflow: auto !important;
                        width: 100%;
                        margin-top: .5rem;
                        top: 100%;
                        left: 0;
                        box-shadow: 4px 5px 2rem rgba(0, 0, 0, 0.29);
                        z-index: 100;
                        /*border:1px solid #ababab;*/
                        .li-selected {
                            button {
                                text-decoration: none;
                                color: #202b3d;
                                background-color: #d7dde3;
                            }
                        }
                    }
                }

                .contractor_checkbox {
                    height: 3.5rem;
                    display: flex;
                    align-items: center;

                    label {
                        margin-top: .7rem;
                    }
                }

                .contractor_parag {
                    height: 3.5rem;
                    margin-top: 1.2rem;
                    display: flex;
                    align-items: center;
                    padding-left: 1.7rem;
                    p {
                        margin-bottom: 0;

                    }

                }

                .double-datepicker {
                    display: flex;
                    align-items: center;
                    padding-top: 1.3rem;

                    & > span {
                        margin-left: .8rem;
                        &:first-of-type {
                            margin-left: 0;
                        }
                        &:last-of-type {
                            cursor: pointer;
                        }
                    }

                    .vdp-datepicker {

                        max-width: 29%;
                        margin-left: .8rem;
                        input {
                            font-size: 1.4rem;
                            margin-top: 0;
                            padding-left: 1rem;
                            padding-right: 0;
                        }

                        .vdp-datepicker__calendar {
                            min-width: 30rem;
                        }
                    }

                }

                .file-loader{
                    border: 1px solid #ced0da;
                    .loader-header{
                        padding: 0.5rem;
                        display: flex;
                        justify-content:space-between;
                        label{
                            margin-top: .5rem;
                            margin-right: .5rem;
                            cursor: pointer;
                        }
                        svg{
                            width: 2rem;
                            height: 2rem;
                           path{
                               fill: $accent;
                           }
                        }
                    }
                    .file-row{
                        display: flex;
                        justify-content: space-around;
                        padding: 1rem;
                        border-bottom: 1px solid #ced0da;
                        .file-loader-field{
                            flex-grow:1;
                            p{
                                text-align: center;
                            }
                        }
                    }
                }

                .vv-error {
                    font-size: 1.3rem;
                    color: $light-grey;
                    padding-left: 2rem;
                    position: absolute;
                    /*display: contents;*/
                }

                .label-green {
                    color: $accent;
                    font-size: 2rem;
                    font-weight: 400;
                    /*height: 6.36rem;*/
                    display: flex !important;
                    align-items: center;
                    padding-top: 3.5rem;

                }

                textarea, .textareaView {
                    min-width: 100%;
                    max-width: 100%;
                    min-height: 13rem;
                    height: 6rem;
                    border: 1px solid #ced0da;
                    border-radius: 4px;
                    margin-top: 1.3rem;
                    resize: none;

                    &:focus {
                        outline-style: inherit;
                        outline-width: 0;
                    }
                }
                .fa-pencil {
                    position: absolute;
                    right: 2rem;
                    bottom: 2rem;
                    color: $accent;
                    cursor: pointer;
                }
                &__horizontal {
                    display: flex;

                    label.clip {
                        flex-shrink: 0;
                        margin-right: 50px;
                    }
                    .radiobuttons {
                        margin-top: 0;
                    }
                    @include desktop-max-little {
                        display: block;
                        .radiobuttons {
                            margin-top: 1.3rem;
                        }
                    }
                }
                .img-previev img {
                    max-height: 113px;
                    margin: auto;
                    display: block;
                }

            }
        }
        .block_type__block_list_base {
            background: none;
        }

        /*<!--.list-row{-->*/
        /*<!--transform:translateX(4rem);-->*/
        /*<!--@include tablet-big{-->*/
        /*<!--transform: none;-->*/
        /*<!--}-->*/
        /*<!--}-->*/
        /*<!--.card-row{-->*/
        /*<!--height:100%;-->*/
        /*<!--}-->*/
        .left-zone,
        .right-zone {
            display: flex;
            flex-wrap: wrap;
            /*height: 100%;*/
            @include desktop-max-little {
                max-width: 50%;

            }
            @include tablet-big {
                max-width: 50%;
            }

            @include phone {
                .col-md-4 {
                    min-width: 100% !important;
                }
                min-width: 100%;

            }

            /*@media all and(max-width: 1250px) {*/
            /*background-color: green;*/
            /*max-width: 50%;*/
            /*}*/

            min-width: 50%;

            max-width: 50%;
            .col-md-16 {
                max-width: 100%;
                min-width: 100%;
                @media all and(min-width: 992px) {
                    order: 0 !important;

                }
                &:nth-child(1), &:nth-child(2) {
                    label {
                        padding-top: 0;
                    }
                }
            }

            .col-md-12 {
                @media all and(min-width: 992px) {
                    order: 0 !important;

                }
                min-width: 75%;
                max-width: 75%;
            }

            .col-md-8 {
                max-width: 50%;
                min-width: 50%;
                @media all and(min-width: 992px) {
                    order: 0 !important;

                }

                @include tablet-big {
                    max-width: 50%;
                    min-width: 50%;
                }

                @include tablet-mobile {
                    max-width: 100%;
                    min-width: 100%;
                }

                &:nth-child(1), &:nth-child(2) {
                    label {
                        padding-top: 0;
                    }
                }
            }

            .col-md-4 {
                max-width: 25%;
                min-width: 25%;
                @media all and(min-width: 992px) {
                    order: 0 !important;

                }

                @include tablet-big {
                    max-width: 50%;
                    min-width: 50%;
                }
                @include tablet-mobile {
                    max-width: 100%;
                    min-width: 100%;
                }
            }

            .col10 {
                @media all and(min-width: 992px) {
                    order: 0 !important;

                }

                max-width: 10%;
                min-width: 10%;
                padding-left: 15px;
                padding-right: 15px;
                @include tablet-mobile {
                    max-width: 100% !important;
                    min-width: 100% !important;
                }
            }

            .col20 {
                @extend .col10;
                max-width: 20%;
                min-width: 20%;
            }

            .col30 {
                @extend .col10;
                max-width: 30%;
                min-width: 30%;
            }

            .col33 {
                @extend .col10;
                max-width: 33.3%;
                min-width: 33.3%;
            }

            .col40 {

                max-width: 40%;
                min-width: 40%;
                @extend .col10;
            }

            .col60 {
                @extend .col10;
                min-width: 60%;
                max-width: 60%;
            }

            .col66 {
                @extend .col10;
                min-width: 66.6%;
                max-width: 66.6%;
            }

            .col70 {
                @extend .col10;
                min-width: 70%;
                max-width: 70%;
            }

            .col80 {
                @extend .col10;
                min-width: 80%;
                max-width: 80%;
            }

            .col90 {
                @extend .col10;
                min-width: 90%;
                max-width: 90%;
            }

        }

        .border-right {
            border-right: $border;
        }

        .full-width {
            width: 100% !important;
            max-width: 100%;
        }

    }

    .rb #contractor .block {
        .contractor_box .field-box {
            label {
                font-size: 16/11*1rem;
                color: $tabcol;
                line-height: 1.144;
            }
            .contractor_checkbox label {
                margin-top: 4/11*1rem;
            }
            .contractor_parag, input, .dropdown {
                margin-top: 1rem;
            }
            input {
                color: $tabcol;
            }

            .label-green {
                font-size: 2rem;
                color: $sbarbg;
                font-weight: bold;
                line-height: 1.333;

            }
        }
    }

    .half-width {
        width: 50%;
        max-width: 50%;
    }
</style>    