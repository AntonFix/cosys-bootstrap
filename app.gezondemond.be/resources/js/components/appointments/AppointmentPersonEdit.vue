<template>

    <div>

        <Multiselect
            v-model="persons"
            :allow-absent="true"
            mode="single"
            locale="nl"
            :close-on-select="false"
            :searchable="true"
            :create-option="false"
            :options="options"
            class="multiselect-gm"
        />

        <input type="hidden"
               v-for="person in persons"
               name="appointment_person[]"
               :value="person">

    </div>

</template>

<script>

import Multiselect from '@vueform/multiselect'

export default {

    props: ['persons'],

    components: {
        Multiselect
    },

    data() {
        return {
            tempPersons: null,

            options: async (query) => {
                return await fetchPersons(query)
            },

        }
    },

    methods: {},

    mounted() {
        this.tempPersons = JSON.parse(this.persons).map(l => {
            return l.id
        })
    }
}

const fetchPersons = async (query) => {

    try {
        const items = await fetch('/json/appointments.json?inputSelect=1');
        return items.json();
    } catch (err) {
        console.error(err);
    }

}


</script>

<style scoped>

.multiselect-gm {
    --ms-tag-bg: #DBEAFE;
    --ms-tag-color: #007bff;

    --ms-ring-color: #DBEAFE;
    --ms-placeholder-color: #9CA3AF;
    --ms-max-height: 10rem;

}

</style>

<style src="@vueform/multiselect/themes/default.css"></style>


