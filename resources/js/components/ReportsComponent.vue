<template>
  <div>
    <v-container fluid>
        <v-row align="center">
            <v-col
                cols="12"
                sm="6"
            >
            <v-subheader>
                <b>Report type</b>
            </v-subheader>
            <v-select
                @input="changedLabel"
                item-text="text"
                item-value="this.items"
                :options="['User Report', 'Monthly Report', 'Products Report']"
                label="Outlined style"
                outlined
            ></v-select>
            </v-col>
        </v-row>
        <v-row>
            <v-col
                cols="12"
                sm="6"
            >
            <v-subheader v-if="userReport">
                <b>User</b>
            </v-subheader> 
            <v-select v-if="userReport"
                item-text="text"
                item-value="this.items"
                :options="['User no1', 'User no2', 'User no3']"
                label="Outlined style"
                v-model="user"
                outlined
            ></v-select>

            <v-subheader v-if="monthlyReport">
                <b>Month</b>
            </v-subheader> 
            <v-select v-if="monthlyReport"
                item-text="text"
                item-value="this.items"
                :options="['January', 'February', 'March', 'April', 'May', 'August', 'September', 'October', 'November', 'December']"
                label="Outlined style"
                    v-model="month"
                outlined
            ></v-select>
            </v-col>
            <v-col
                cols="12"
                sm="6"
            >
            <v-subheader v-if="monthlyReport">
                <b>Year</b>
            </v-subheader> 
            <v-select v-if="monthlyReport"
                item-text="text"
                item-value="this.items"
                :options="['2015', '2016', '2017', '2018', '2019', '2020']"
                label="Outlined style"
                    v-model="year"
                outlined
            ></v-select>
            </v-col>
        </v-row>
        <v-btn v-if="userReport || monthlyReport || productsReport"
            class="mt-3"
            elevation="2"
            medium>
            Export
        </v-btn>
    </v-container>
  </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex';
    import { VueGoodTable } from 'vue-good-table';
    import 'vue-good-table/dist/vue-good-table.css';

    export default {
        name: 'reports-component',
        data: function () {
            return {
                selectedReport: null,
                userReport: false,
                monthlyReport: false,
                productsReport: false,
                user: null,
                month: null,
                year: null
            }
        },
        methods: {
            changedLabel(event) {
                this.selectedReport = event;

                if (this.selectedReport === 'User Report') {
                    this.userReport = true;
                    this.monthlyReport = false;
                    this.productsReport = false;
                }

                if (this.selectedReport === 'Monthly Report') {
                    this.monthlyReport = true;
                    this.userReport = false;
                    this.productsReport = false;
                }

                if (this.selectedReport === 'Products Report') {
                    this.productsReport = true;
                    this.monthlyReport = false;
                    this.userReport = false;
                }
            },
        }
    }
</script>
