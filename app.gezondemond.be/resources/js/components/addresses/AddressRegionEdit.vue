<template>

    <div>

        <Multiselect
            v-model="tempAddr"
            mode="single"
            locale="nl"
            :close-on-select="false"
            :searchable="true"
            :create-option="false"
            :options="options"
            class="multiselect-gm"
        />

        <input type="hidden"
               v-for="address in tempAddr"
               name="person_address[]"
               :value="address">

    </div>

</template>

<script>

import Multiselect from '@vueform/multiselect'

export default {

    props: ['addresses'],

    components: {
        Multiselect
    },

    data() {
        return {
            tempAddr: null,
            options: async (query) => {
                return await fetchAddresses(query)
            },
        }
    },

    methods: {},

    mounted () {
        this.tempAddr = JSON.parse(this.addresses).map(a => {
            return a.id
        })
    }
}


const fetchAddresses = async (query) => {

    try {
        const items = await fetch('/json/addresses.json?inputSelect=1');
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


