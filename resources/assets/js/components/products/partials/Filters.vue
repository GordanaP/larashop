<template>
    <div class="filters">

        <p v-if="filtersInUse">
            <a href="#" @click.prevent="clearAllFilters">
                Clear all filters
            </a>
        </p>

        <!-- map = slug, name -->
        <div class="list-group" v-for="map, filter in filters">
            <a href="#" class="list-group-item text-uppercase">
                {{ filter }}
            </a>
            <a  href="#" class="list-group-item"
                :class="{'active' : selectedFilters[filter] === key}"
                v-for="key, value in map"
                @click.prevent="activateFilter(filter, key)"
            >
                {{ value }}
            </a>
            <a  href="#" class="list-group-item list-group-item-warning"
                v-if="selectedFilters[filter]" @click.prevent="clearFilter(filter)"
            >
                Clear the filter
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
        computed: {
            filtersInUse () {
                return ! _.isEmpty(this.selectedFilters)
            }
        },
        methods: {
            getFilters() {
                axios.get(this.endpoint).then((response) => {
                    this.filters = response.data.data
                })
            },
            activateFilter(filter, key) {
                this.selectedFilters = Object.assign({}, this.selectedFilters, {[filter] : key})
                this.updateQueryString()
            },
            clearFilter(filter) {
                this.selectedFilters = _.omit(this.selectedFilters, filter)
                this.updateQueryString()
            },
            clearAllFilters() {
                this.selectedFilters = {}
                this.updateQueryString()
            },
            updateQueryString() {
                this.$router.replace({
                    query: {
                        ...this.selectedFilters, //spread out the object into multiple items
                        page : 1
                    }
                })
            }
        },
        mounted() {
            this.getFilters()
        }
    }
</script>
