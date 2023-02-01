<template>
    <div>
        <h1>Welcome to Vue.JS!</h1>
        <ul>
            <li v-for="item in items">
                {{ item.message }}
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    data() {
        return {
            items: [{message: 'Foo'}, {message: 'Bar'}]
        }
    },
    created() {
        // TODO ajax request to fetch debugItems
    }
}
</script>
