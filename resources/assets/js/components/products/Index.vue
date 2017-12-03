<template>
    <div>
        <h1>Products</h1>
        <product v-for="product in products" :product="product" :key="product.name"></product>
    </div>
</template>

<script>
    import Product from './partials/Product.vue'

    export default {
        components: {
            Product
        },
        data(){
            return {
                products: []
            }
        },
        mounted() {
            axios.get('/api/products/' + this.$route.params.category ).then((response)=> {
                this.products = response.data.data
            })
        }
    }
</script>