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
    import Product from './partials/Product.vue'
    import Filters from './partials/Filters.vue'
    import Pagination from '../pagination/Pagination.vue'

    export default {
        components: {
            Product, Pagination, Filters
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
            // land on the selected page on reload
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