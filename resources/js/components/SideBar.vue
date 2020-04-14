<template>
    <div class="sidebar">
        <b-list-group>
            <b-list-group-item class="d-flex align-items-center">
                <router-link :to="{name: 'dashboard'}">Dashboard</router-link>
            </b-list-group-item>
            <b-list-group-item class="d-flex align-items-center">
                <router-link to="projects">Projects</router-link>
            </b-list-group-item>
            <b-list-group-item class="d-flex align-items-center">
                <router-link :to="{name: 'tasks'}">Tasks</router-link>
            </b-list-group-item>
            <b-list-group-item class="d-flex align-items-center">
                <router-link :to="{name: 'users'}">Users</router-link>
            </b-list-group-item>
            <b-list-group-item class="d-flex align-items-center">
                <router-link :to="{name: 'roles'}">Roles</router-link>
            </b-list-group-item>
            <b-list-group-item class="d-flex align-items-center">
                <router-link :to="{name: 'permissions'}">Permissions</router-link>
            </b-list-group-item>
        </b-list-group>
    </div>
</template>

<script>
    export default {
        name: 'SideBar',
    }
</script>

<style scoped>
    .container-fluid, .row {
        min-width: 100%;
    }

    .sidebar {
        background: #032544;
        margin-top: 0;
        padding: 0;
        min-width: 200px;
        max-width: 300px;
        cursor: pointer;
        min-height: 100vh;
    }

    .list-group {
        padding: 0;
    }

    .list-group-item {
        background: #032544;
        border-bottom: 1px solid #c4c4c4;
    }

    .list-group-item:hover {
        background: #033054;
    }

    .list-group-item a {
        color: #fff;
    }

    .list-group-item a:hover {
        background: #033054;
    }

    @media (max-width: 650px) {
        .container-fluid, .row {
            min-width: 100%;
        }

        .sidebar {
            min-width: 100vw;
            min-height: 0vh;
        }

        .list-group {
            min-width: 100%;
            padding: 0;
        }

        .list-group-item {
            width: 100%;
        }

        .list-group-item a {
            min-width: 100%;
            text-align: center;
        }

    }

    @media (max-width: 500px) {
        .container-fluid, .row {
            min-width: 100%;
        }

        .sidebar {
            min-width: 100vw;
        }

        .list-group-item {
            min-width: 100vw;
        }
    }
</style>
