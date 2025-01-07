module.exports = {
    plugins: ["vue"],
    extends: ["plugin:vue/vue3-recommended"], // or 'plugin:vue/recommended' for Vue 2
    rules: {
        "vue/component-tags-order": [
            "error",
            {
                order: ["script", "template", "style"],
            },
        ],
    },
};
