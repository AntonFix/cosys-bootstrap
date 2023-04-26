<template>

    <div>

        <Multiselect
            v-model="personLanguage"
            mode="tags"
            locale="nl"
            :close-on-select="false"
            :searchable="true"
            :create-option="false"
            :options="options"
            class="multiselect-gm"
        />

        <input type="hidden"
               v-for="language in personLanguage"
               name="person_language[]"
               :value="language">

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
            personLanguage: [],
            language: '',
            options: async (query) => {
                return await fetchLanguages(query)
            },
        }
    },

    methods: {}
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


