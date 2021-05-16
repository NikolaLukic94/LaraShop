<template>
    <div class="container">
        <canvas class="pt-8" id="canvas"></canvas>
    </div>
</template>

<script>
    import {Chart} from 'Chart.js';

    export default {
        data: function () {
            return {
                loaded: false,
                values: null,
                months: null
            }
        },
        methods: {
            renderChart() {
                new Chart(document.getElementById('canvas').getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: JSON.parse(this.months),
                        datasets: [{
                            data: JSON.parse(this.values),
                            backgroundColor: [
                                '#2ecc71',
                                '#e74c3c',
                                '#8e44ad',
                                '#d35400',
                                '#16a085'
                            ]
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            fontSize: 12,
                            text: 'Sales Breakdown'
                        }
                    }
                });
            },
            getSalesBreakdown() {
                return axios.get('/api/dashboard/monthly-breakdown')
                    .then((response) => {
                        this.values = response.data.values;
                        this.months = response.data.names;
                        this.loaded = true;
                    })
                    .catch(function (error) {
                    })
            }
        },
        mounted() {
            this.getSalesBreakdown();
            this.renderChart();
        },
        watch: {
            loaded: function () {
                this.renderChart();
            }
        },
    }
</script>
