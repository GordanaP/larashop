<template>
    <div>
        <div class="row">
            <div class="col-md-3">
                Filters
            </div>
            <div class="col-md-9">
                <pagination :meta="meta" v-on:pageSwitched="getCourses"></pagination>
                <product v-for="product in products" :product="product" :key="product.id"></product>
            </div>
        </div>
    </div>
</template>

<script>
    import Product from './partials/Product.vue'
    import Pagination from '../pagination/Pagination.vue'

    export default {
        components: {
            Product, Pagination
        },
        data(){
            return {
                products: [],
                meta: {}
            }
        },
        methods: {
            // land on the selected page on reload
            getCourses(page = this.$route.query.page) {
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
            this.getCourses()
        }
    }
</script>