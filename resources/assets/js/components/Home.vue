<template>

    <div class="container">
        <div class="Chart__list">
            <div class="Chart">
                <h2>{{text}}</h2>
                <br>
                <bar-chart ref="chart" :chart-data="chartData" :chart-options="chartOptions"
                           :y-ticks="{min: 0, max: 7.5}"></bar-chart>
                <button class="btn hidden"  @click="getChaetData"></button>
            </div>
        </div>
    </div>

</template>

<script>
    import {Bar, mixins} from 'vue-chartjs';

    const {reactiveProp} = mixins;
    let defchartData = {
        data: {

            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [
                {
                    label: 'Data One',
                    backgroundColor: '#f87979',
                    data: [5, 5.7, 6, 6.4, 3, 7, 2, 4, 4.2, 10, 11, 12]
                }
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            layout: {
                //padding: 50
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        min: 3,
                        max: 5,
                    }
                }]
            }
        },
    };

    const barChart = {
        extends: Bar,
        props: ["chartOptions", "chartData"],
        mixins: [reactiveProp],
        mounted() {
            this.renderChart(this.chartData, this.chartOptions);
        },
        watch: {
            chartOptions() {
                this.renderChart(this.chartData, this.chartOptions);
            }
        }
    };
    export default {
        data() {
            return {
                chartData: null,
                chartOptions: null,
                toggle: false,
                text: '',
            }
        },
        mounted() {

        },
        created() {
            this.getChaetData();
        },
        methods: {
            getChaetData() {
                this.toggle = !this.toggle;
                this.toggleData(this.toggle);
            },
            toggleData(arg) {
                if (!arg) {
                    this.text = 'Статистика посещений за последний год';
                    this.chartData = {

                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        datasets: [
                            {
                                label: 'Data One',
                                backgroundColor: '#ccc',
                                data: [5, 5.7, 6, 6.4, 3, 7, 2, 4, 4.2, 10, 11, 12]
                            }
                        ],
                    };
                    this.chartOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        layout: {
                            //padding: 50
                        },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    display: false
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    min: 0,
                                    /*  max: 12,*/
                                }
                            }]
                        }
                    };
                }
                else {
                    this.text = 'Статистика посещений за последние 30 дней';
                    this.chartData = {
                        labels: ['01.07', '02.07', '03.07', '04.07', '05.07', '06.07', '07.07', '08.07', '09.07', '10.07', '11.07', '12.07', '13.07', '14.07', '15.07', '16.07', '17.07', '18.07', '19.07', '20.07', '21.07'],
                        datasets: [
                            {
                                label: 'Посещения',
                                backgroundColor: '#ccc',
                                data: [7, 4, 4.5, 3.5, 5.5, 5.2, 6.5, 4, 3.7, 6.5, 5.3, 6.5, 5.4, 6, 6.5, 6.5, 7, 6, 6, 6.3, 5]
                            }
                        ],
                    };
                    this.chartOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        layout: {
                            //padding: 50
                        },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    display: false
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    min:1
                                }
                            }]
                        }
                    };
                    /* data:{
                         labels: ['01.07', '02.07', '03.07', '04.07', '05.07', '06.07', '07.07', '08.07', '09.07', '10.07', '11.07', '12.07', '13.07', '14.07', '15.07', '16.07', '17.07', '18.07', '19.07', '20.07', '21.07'],
                         datasets: [
                             {
                                 label: 'Посещения',
                                 backgroundColor: '#ccc',
                                 data: [7, 4, 4.5, 3.5, 5.5, 5.2, 6.5, 4, 3.7, 6.5, 5.3, 6.5, 5.4, 6, 6.5, 6.5, 7, 6, 6, 6.3, 5]
                             }
                         ],

                     },


                     options: {
                         responsive: true,
                         maintainAspectRatio: false,
                         legend: {
                             display: false
                         },
                         layout: {
                             //padding: 50
                         },
                         scales: {
                             xAxes: [{
                                 gridLines: {
                                     display: false
                                 }
                             }],
                             yAxes: [{
                                 gridLines: {
                                     display: false
                                 },
                                 ticks: {
                                     min: 0,
                                     max: 10,
                                 }
                             }]
                         }
                     },*/

                }

            }

        }
        ,
        components: {
            barChart
        }
    }
</script>

<style>

</style>