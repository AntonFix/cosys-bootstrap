<template>

    <div>

        <Multiselect
            v-model="tempLang"
            :allow-absent="true"
            mode="tags"
            locale="nl"
            :close-on-select="false"
            :searchable="true"
            :create-option="false"
            :options="options"
            class="multiselect-gm"
        />

        <input type="hidden"
               v-for="language in tempLang"
               name="person_language[]"
               :value="language">

    </div>

</template>

<script>

import Multiselect from '@vueform/multiselect'

export default {

    props: ['langs'],

    components: {
        Multiselect
    },

    data() {
        return {
            tempLang: null,

            options: async (query) => {
                return await fetchLanguages(query)
            },

        }
    },

    methods: {},

    mounted() {
        this.tempLang = JSON.parse(this.langs).map(l => {
            return l.id
        })
    }
}

const fetchLanguages = async (query) => {

    try {
        const items = await fetch('/json/languages.json');

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


