<template>
    <nav>
        <ul class="pagination">
            <li :class="{ 'disabled' : meta.current_page === 1 }">
                <a href="#" @click.prevent="switched(meta.current_page-1)">
                    <span> &laquo; </span>
                </a>
            </li>
            <li :class="{ 'active' : x === meta.current_page}" v-for="x in meta.last_page">
                <a href="#" @click.prevent="switched(x)">
                    {{ x }}
                </a>
            </li>
            <li :class="{ 'disabled' : meta.current_page === meta.last_page }">
                <a href="#" @click.prevent="switched(meta.current_page+1)">
                    <span> &raquo; </span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default{
        props: ['meta'],
        methods: {
            switched(page) {
                if (this.pageIsOutOfBounds(page)) {
                    return;
                }

                // go to the selected page
                this.$emit('pageSwitched', page)

                //
                this.$router.replace({
                    query: {
                        page
                    }
                })
            },
            pageIsOutOfBounds(page)
            {
                return page <= 0 || page > this.meta.last_page
            }
        }
    }
</script>

