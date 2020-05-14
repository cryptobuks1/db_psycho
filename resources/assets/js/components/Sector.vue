<template>
    <div>
        <Block :class="{'full-width':blocks.length==1 || block.block_width==='100%', 'half-width':blocks.length==2 && block.block_width!=='100%' }"
               v-for="(block, index)  in blocks"
               v-if="!block.sector || block.sector==position"
               :key="index"
               :block="block"
               :disable_inputs="disable_inputs"
               :model="models[block.block_model]"
               :model_name="block.block_model"
               :add_models="add_models"
               :style="{'grid-column':block.column, 'grid-row':block.row}"
        ></Block>
    </div>
</template>

<script>
    import Block from './Block.vue'

    export default {
        data() {
            return {}
        },
        props: [
            'blocks',
            'models',
            'add_models',
            'position',
            'disable_inputs'
        ],
        components: {
            Block
        },
        mounted() {

        }
    }

</script>

<style lang="scss">
    @import "../../sass/variables";
    @import "../../sass/mixin";
    .left-sector,
    .right-sector {
        display: flex;
        flex-wrap: wrap;
        /*flex-direction: column;*/
    }

    .grid {
        @include tablet-big {
            width: 100%;
        }
        @include phone {
            display: flex;
            flex-direction: column;
        }

        width: 50%;
        display: grid!important;
        grid-template-columns: 50% 50%;
        grid-auto-rows: 9.36rem;

        .block{
            margin-bottom: 0!important;
        }
        .half-width{
            width: 50%;
            max-width:50%;
        }
    }
</style>    