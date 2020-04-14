<template>
    <b-navbar toggleable="lg" type="dark" variant="info">
        <b-navbar-brand :to="{name: 'home'}">Project Manager</b-navbar-brand>
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav></b-navbar-nav>

            <b-navbar-nav v-if="guest" class="ml-auto">
                <b-nav-item :to="{name: 'docs'}">Docs</b-nav-item>
                <b-nav-item :to="{name: 'login'}">Login</b-nav-item>
            </b-navbar-nav>
            <b-navbar-nav v-else class="ml-auto">
                <b-nav-item :to="{name: 'docs'}">Docs</b-nav-item>
                <b-nav-item-dropdown :text="fullName" right>
                    <b-dropdown-item :to="{name: 'profile'}">Profile</b-dropdown-item>
                    <b-dropdown-divider/>
                    <b-dropdown-item @click="onLogout">Logout</b-dropdown-item>
                </b-nav-item-dropdown>
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>
</template>

<script>
    import {mapState, mapActions} from 'vuex';

    export default {
        name: 'Nav',
        methods: {
            ...mapActions(['logout']),
            onLogout() {
                this.logout();
            }
        },
        computed: mapState({
            guest: (state) => state.auth.user === null,
            user: (state) => state.auth.user,
            fullName: (state) => `${state.auth.user.first_name} ${state.auth.user.last_name}`,
        }),
    }
</script>

<style scoped>
    .navbar-brand a, b-nav-item .nav-link {
        text-decoration: none;
        color: #fff;
    }
</style>
