<template>
    <div class="filters">
        <!-- map = slug, name -->
        <div class="list-group" v-for="map, filter in filters">
            <a href="#" class="list-group-item text-uppercase">
                {{ filter }}
            </a>
            <a href="#" class="list-group-item"
                :class="{'active' : selectedFilters[filter] === key}"
                v-for="key, value in map"
                @click.prevent="activateFilter(filter, key)"
            >
                {{ value }}
            </a>
        </div>
    </div>
</template>

<script>
    export default{
        props: [
            'endpoint'
        ],
        data() {
            return {
                filters: {},
                selectedFilters: _.omit(this.$route.query, ['page'])
            }
        },
        methods: {
            activateFilter(filter, key) {
                this.selectedFilters = Object.assign({}, this.selectedFilters, {[filter] : key})
                this.updateQueryString()
            },
            updateQueryString()
            {
                this.$router.replace({
                    query: {
                        // spread the Object above into multipel itens to apply to the query string
                        ...this.selectedFilters,
                        page : 1
                    }
                })
            }
        },
        mounted() {
            axios.get(this.endpoint).then((response) => {
                this.filters = response.data.data
            })
        }
    }
</script>