<template>
    <div class="container-fluid">
        <Nav/>
        <div>
            <transition name="fade">
                <div class="container-fluid">
                    <b-row class="mr-0">
                        <SideBar v-if="this.user !== null"/>
                        <b-col class="px-3">
                            <NotificationContainer />
                            <router-view :key="$route.fullPath"></router-view>
                        </b-col>
                    </b-row>
                </div>
            </transition>
        </div>
    </div>
</template>
<script>
    import Nav from './components/Nav.vue';
    import {mapMutations} from 'vuex';
    import SideBar from './components/SideBar.vue';
    import NotificationContainer from "./components/NotificationContainer";

    export default {
        name: 'App',
        components: {
            Nav,
            SideBar,
            NotificationContainer
        },
        methods: {
            ...mapMutations(['setCurrentPagination']),
        },
        created() {
            // this does not fire on paginate
            // this.setCurrentPagination({page: this.page, perPage: this.perPage})
        },
        updated() {
            // this.setCurrentPagination({page: this.page, perPage: this.perPage})
        },
        computed: {
            page() {
                return parseInt(this.$route.query.page) || 1
            },
            perPage() {
                return parseInt(this.$route.query.perPage) || 10
            },
            user() {
                return this.$store.state.auth.user;
            },
        }
    }
</script>
<style>
    * {
        padding: 0;
        margin: 0;
    }

    .container-fluid {
        padding: 0;
    }

    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.5s;
    }

    .fade-enter,
    .fade-leave-active {
        opacity: 0;
    }
</style>
