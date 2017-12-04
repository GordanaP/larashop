<template>
    <div class="products">
        <div class="row">
            <div class="col-md-3">
                <filters :endpoint="filtersUrl"></filters>
            </div>
            <div class="col-md-9">
                <div class="text-center">
                    <pagination v-if="meta.current_page" :meta="meta"></pagination>
                </div>
                <product v-for="product in products" :product="product" :key="product.id"></product>
            </div>
        </div>
    </div>
</template>

<script>
    import Filters from './partials/Filters.vue'
    import Pagination from '../pagination/Pagination.vue'
    import Product from './partials/Product.vue'

    export default {
        components: {
            Filters,
            Pagination,
            Product
        },
        data(){
            return {
                products: [],
                meta: {},
                filtersUrl: '/api/products/' + this.$route.params.category + '/filters'
            }
        },
        watch: {
            '$route.query'(query){
                this.getProducts(query.page)
            }
        },
        methods: {
            // land on the current page after reloading
            getProducts(page = this.$route.query.page) {
                axios.get(('/api/products/' + this.$route.params.category), {
                    params: {
                        page
                    }
                }).then((response)=> {
                    this.products = response.data.data
                    this.meta = response.data.meta
                })
            }
        },
        mounted() {
            this.getProducts()
        }
    }
</script>