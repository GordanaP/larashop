<template>
    <div class="products">
        <div class="row">
            <div class="col-md-3">
                <filters :endpoint="filtersUrl"></filters>
            </div>
            <div class="col-md-9">
                <template v-if="products.length > 0">
                    <div class="text-center">
                        <pagination v-if="meta.current_page" :meta="meta"></pagination>
                    </div>
                    <div class="row" v-for="chunk in chunkedItems">
                        <product v-for="product in chunk" :product="product" :key="product.id"></product>
                    </div>
                </template>
                <template v-else>
                    No product found
                </template>
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
            '$route.query' : {
                handler (query) {
                    this.getProducts(1, query)
                },
                deep: true
            }
        },
        computed: {
           chunkedItems () {
             return _.chunk(this.products, 3)
           }
        },
        methods: {
            // land on the current page after reloading
            getProducts(page = this.$route.query.page, query = this.$route.query) {
                axios.get(('/api/products/' + this.$route.params.category), {
                    params: {
                        page,
                        ... query
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