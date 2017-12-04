<template>
    <div class="filters">
        <!-- map = slug, name -->
        <div class="list-group" v-for="map, filtername in filters">
            <a href="#" class="list-group-item text-uppercase">{{ filtername }}</a>
            <a href="#" class="list-group-item" v-for="key, value in map">
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
                filters: {}
            }
        },
        mounted() {
            axios.get(this.endpoint).then((response) => {
                this.filters = response.data.data
            })
        }
    }
</script>