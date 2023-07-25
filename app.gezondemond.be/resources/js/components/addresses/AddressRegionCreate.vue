<template>

    <div>

        <Multiselect
            v-model="regions"
            mode="single"
            locale="nl"
            :close-on-select="true"
            :searchable="true"
            :create-option="false"
            :resolve-on-load="false"
            :filter-results="true"
            :delay="0"
            :min-chars="1"
            :options="options"
            class="multiselect-gm"
        />

        <input type="hidden"
               v-for="region in regions"
               name="dictionary_geos_id"
               :value="region">

    </div>

</template>

<script>

import Multiselect from '@vueform/multiselect'

export default {

    props: {
        max: [String, Number]
    },

    components: {
        Multiselect
    },

    data() {
        return {
            regions: [],
            options: async (query) => {
                return await fetchRegions(query)
            },
        }
    }


}

const fetchRegions = async (query) => {

    try {
        const items = await fetch('/json/regions.json?inputSelect=1');
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


