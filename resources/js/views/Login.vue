<template>
    <div>
        <h1>Login</h1>
        <b-form @submit.prevent="onLogin" v-if="show">
            <b-form-group label="Email:" label-for="email">
                <b-form-input id="email" v-model="form.email" type="email" required placeholder="Enter email"/>
            </b-form-group>

            <b-form-group label="Password:" label-for="password">
                <b-form-input id="password" v-model="form.password" required type="password"
                              placeholder="Enter password"/>
            </b-form-group>
            <b-button type="submit" variant="primary">Login</b-button>
        </b-form>
    </div>
</template>

<script>
    import {mapActions, mapMutations} from 'vuex';

    export default {
        name: 'Login',
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                },
                show: true,
                user: null,
            };
        },
        methods: {
            ...mapMutations(['setCredentials']),
            ...mapActions(['authenticate']),
            async onLogin() {
                this.setCredentials(this.form);
                const result = await this.authenticate();

                if (result.email) {
                    this.$router.push('/');
                }
            }
        }
    }
</script>

<style scoped>

</style>
