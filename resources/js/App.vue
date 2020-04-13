<template>
    <div class="container-fluid">
        <Nav/>
        <br/>
        <div>
            <transition name="fade">
                <div class="container">
                    <router-view></router-view>
                </div>
            </transition>
        </div>
    </div>
</template>
<script>
    import Nav from './components/Nav.vue';

    export default {
        name: 'App',
        components: {
            Nav
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
