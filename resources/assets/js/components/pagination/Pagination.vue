<template>
    <nav>
        <ul class="pagination">
            <li :class="{ 'disabled' : meta.current_page === 1 }">
                <a href="#" @click.prevent="switched(meta.current_page-1)">
                    <span> &laquo; </span>
                </a>
            </li>
            <template v-if="currentSection > 1">
                <li>
                    <a href="#" @click.prevent="switched(1)">
                        1
                    </a>
                </li>
                <li>
                    <a href="#" @click.prevent="toSectionBackward">
                        ...
                    </a>
                </li>
            </template>
            <li :class="{ 'active' : page === meta.current_page}" v-for="page in pagesRange">
                <a href="#" @click.prevent="switched(page)">
                    {{ page }}
                </a>
            </li>
            <template v-if="currentSection < sectionsCount">
                <li>
                    <a href="#" @click.prevent="toSectionForward">
                        ...
                    </a>
                </li>
                <li>
                    <a href="#" @click.prevent="switched(meta.last_page)">
                        {{ meta.last_page }}
                    </a>
                </li>
            </template>
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
        data() {
            return {
                pagesPerSection: 5
            }
        },
        computed: {
            currentSection() {
                return Math.ceil(this.meta.current_page / this.pagesPerSection)
            },
            // # of sections depending on the pagesPerSection
            sectionsCount() {
                return Math.ceil(this.meta.last_page / this.pagesPerSection)
            },
            lastPage(){
                let lastPage = ((this.currentSection - 1) * this.pagesPerSection) + this.pagesPerSection

                if (this.currentSection === this.sectionsCount) {
                    lastPage = this.meta.last_page
                }

                return lastPage;
            },
            pagesRange () {
                return _.range((this.currentSection - 1) * this.pagesPerSection + 1, this.lastPage + 1)
            }
        },
        mounted(){
            if (this.meta.current_page > this.meta.last_page) {
                this.switched(this.meta.last_page)
            }
        },
        methods: {
            switched(page) {
                // Disable page switch
                if (this.pageIsOutOfBounds(page)) {
                    return;
                }

                // Go to the selected page
                this.$emit('pageSwitched', page)

                // Append page querystring to the route
                this.$router.replace({
                    query: Object.assign({}, this.$route.query, {page : page})
                })
            },
            pageIsOutOfBounds(page)
            {
                return page <= 0 || page > this.meta.last_page
            },
            toSectionForward(){
                this.switched(
                    this.sectionFirstPage(this.currentSection + 1)
                )
            },
            toSectionBackward(){
                this.switched(
                    this.sectionFirstPage(this.currentSection - 1)
                )
            },
            sectionFirstPage(section){
                return ((section - 1) * this.pagesPerSection) + 1
            }
        }
    }
</script>

<style>
    ul.pagination {margin-top: 0;}
</style>