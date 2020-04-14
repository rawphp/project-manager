<template>
    <div class="notification-container">
        <NotificationBar
            v-for="notification in notifications"
            :key="notification.id"
            :id="notification.id"
            :type="notification.type"
            :message="notification.message"
        />
    </div>
</template>

<script>
    import NotificationBar from "./NotificationBar";
    import {mapState} from 'vuex';

    export default {
        name: 'NotificationContainer',
        components: {
            NotificationBar
        },
        computed: {
            ...mapState({
                notifications: (state) => state.notifications.items,
            })
        }
    }
</script>

<style scoped>
    .notification-container {
        position: fixed;
        bottom: 0;
        right: 0;
        padding-right: 40px;
    }
</style>
