<template>
    <div>
        <h1>Projects</h1>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>User</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="project in projects" :key="project.id">
                <td>{{project.id}}</td>
                <td>{{project.name}}</td>
                <td>{{project.start_date}}</td>
                <td>{{project.end_date}}</td>
                <td>{{project.user_id}}</td>
                <td></td>
            </tr>
            </tbody>
        </table>
<!--        <template v-if="pagination.page != 1">-->
<!--            <router-link class="btn btn-secondary" :to="{name: 'projects', query: { page: pagination.page - 1 }}" rel="prev">-->
<!--                Prev Page-->
<!--            </router-link>-->
<!--        </template>-->
<!--        <router-link class="btn btn-secondary" :to="{name: 'projects', query: { page: pagination.page + 1 }}" rel="next">-->
<!--            Next Page-->
<!--        </router-link>-->
    </div>
</template>

<script>
    import {mapState, mapActions} from 'vuex';

    export default {
        name: 'Projects',
        created() {
            this.fetchProjects(this.pagination);
        },
        methods: {
            ...mapActions(['fetchProjects'])
        },
        computed: {
            ...mapState({
                pagination: (state) => state.projects.pagination,
                projects: (state) => state.projects.list,
            }),
        },
    }
</script>

<style scoped>

</style>
