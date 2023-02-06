<template>

    <div>

        <h1>Welcome to Vue.JS!</h1>

        <!--        <router-link to="/debug" custom v-slot="{ navigate }">
                    <Button label="Debug" class="p-button-secondary" @click="navigate" @keypress.enter="navigate"
                            role="link"/>
                </router-link>

                <router-link to="/appointments-index" custom v-slot="{ navigate }">
                    <Button label="Module appointments-index" class="p-button-secondary" @click="navigate"
                            @keypress.enter="navigate"
                            role="link"/>
                </router-link>

                <hr>

                <h2>Router is here</h2>

                <router-view/>

                <hr>-->

        <!--        {{ appointments }}

                <ul>
                    <li v-for="item in appointments">
                        {{ item.id }}
                    </li>
                </ul>-->

        <Toast/>

        <DataTable :value="appointments"

                   v-model:selection="selectedAppointment"

                   v-model:filters="filters1"
                   :loading="loading1"
                   filterDisplay="menu"

                   :globalFilterFields="['nameString','float','dateTime']"
                   data-key="id"

                   selectionMode="single"
                   dataKey="id"
                   :metaKeySelection="false"
                   @rowSelect="onRowSelect"
                   class="p-datatable-sm"
                   stripedRows
                   showGridlines
                   sortMode="multiple"

                   :paginator="true"
                   :rows="10"

                   responsiveLayout="scroll">

            <template #header>
                <div class="flex justify-content-between">
                    <Button type="button" icon="pi pi-filter-slash" label="Clear" class="p-button-outlined"
                            @click="clearFilter1()"/>
                    <span class="p-input-icon-left">
                            <i class="pi pi-search"/>
                            <InputText v-model="filters1['global'].value" placeholder="Keyword Search"/>
                        </span>
                </div>
            </template>

            <template #empty>
                No customers found.
            </template>

            <template #loading>
                Loading customers data. Please wait.
            </template>

            <Column field="id" header="ID" :sortable="true"></Column>

            <Column field="nameString" header="nameString" :sortable="true">
                <template #body="{data}">
                    {{ data.nameString }}
                </template>
                <template #filter="{filterModel}">
                    <InputText type="text" v-model="filterModel.value" class="p-column-filter"
                               placeholder="Search by name"/>
                </template>
            </Column>

            <Column field="float" header="float" :sortable="true"></Column>

            <!--            <Column field="dateTime" header="dateTime" :sortable="true">
                            <template #body="{data}">
                                {{ formatDate(data.dateTime) }}
                            </template>
                            <template #filter="{filterModel}">
                                <Calendar v-model="filterModel.value" dateFormat="mm/dd/yy" placeholder="mm/dd/yyyy"/>
                            </template>
                        </Column>-->

            <Column header="date" filterField="date" dataType="date" :sortable="true">
                <template #body="{data}">
                    <!--                    {{ formatDate(data.date) }}-->
                    {{ data.date }}
                </template>
                <template #filter="{filterModel}">
                    <Calendar v-model="filterModel.value" dateFormat="yy-mm-dd" placeholder="yyyy-mm-dd"/>
                </template>
            </Column>

        </DataTable>


        <hr>

    </div>

</template>

<script>

import {FilterMatchMode, FilterOperator} from 'primevue/api';

export default {
    data() {
        return {
            appointments: '',
            selectedAppointment: null,
            filters1: null,
            loading1: true,
        }
    },

    created() {
        this.initFilters1()
    },

    mounted() {
        axios
            .get('http://127.0.0.1:8000/json-table')
            .then(response => (this.appointments = response.data))
            .then(response => (this.appointments = response.data.date = new Date()))
            .finally(() => (this.loading1 = false))

    },

    methods: {

        /*onRowSelect(event) {
            this.$toast.add({
                severity: 'info',
                summary: 'Product Selected',
                detail: 'nameString: ' + event.data.nameString,
                life: 3000
            });*/

        onRowSelect(event) {
            window.location.href = `/debug/${event.data.id}`;
        },


        formatDate(value) {
            return value.toLocaleDateString('en-US', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
            });
        },

        clearFilter1() {
            this.initFilters1();
        },

        initFilters1() {
            this.filters1 = {
                'global': {value: null, matchMode: FilterMatchMode.CONTAINS},
                'nameString': {
                    operator: FilterOperator.AND,
                    constraints: [{value: null, matchMode: FilterMatchMode.STARTS_WITH}]
                },
                'date': {
                    operator: FilterOperator.AND,
                    constraints: [{value: null, matchMode: FilterMatchMode.DATE_IS}]
                },
            }
        }

    }
}
</script>

<style lang="scss" scoped>
::v-deep(.p-paginator) {
    .p-paginator-current {
        margin-left: auto;
    }
}

::v-deep(.p-progressbar) {
    height: .5rem;
    background-color: #D8DADC;

    .p-progressbar-value {
        background-color: #607D8B;
    }
}

::v-deep(.p-datepicker) {
    min-width: 25rem;

    td {
        font-weight: 400;
    }
}

::v-deep(.p-datatable.p-datatable-customers) {
    .p-datatable-header {
        padding: 1rem;
        text-align: left;
        font-size: 1.5rem;
    }

    .p-paginator {
        padding: 1rem;
    }

    .p-datatable-thead > tr > th {
        text-align: left;
    }

    .p-datatable-tbody > tr > td {
        cursor: auto;
    }

    .p-dropdown-label:not(.p-placeholder) {
        text-transform: uppercase;
    }
}
</style>
