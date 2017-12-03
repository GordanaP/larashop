<template>
    <div>
        <div class="row">
            <product v-for="product in products" :product="product" :key="product.id"></product>
        </div>
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