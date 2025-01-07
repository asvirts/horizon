<template>
    <div class="container">
        <h1>{{ title }}</h1>
        <button @click="handleClick">{{ buttonText }}</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            title: "Hello Vue",
            buttonText: "Click me",
        };
    },
    methods: {
        handleClick() {
            // ...
        },
    },
};
</script>
