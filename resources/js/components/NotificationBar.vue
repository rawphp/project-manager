<template>
    <b-alert show :variant="notificationTypeClass" dismissible>
        <p>{{ message }}</p>
    </b-alert>
</template>

<script>
    import {mapState, mapActions} from 'vuex';

    export default {
        name: 'NotificationBar',
        props: {
            id: {
                type: Number,
                required: true,
            },
            type: {
                type: String,
                required: true,
            },
            message: {
                type: String,
                required: true,
            }
        },
        data() {
            return {
                timeout: null,
            }
        },
        mounted() {
            this.timeout = setTimeout(() => this.removeNotification(this.id), 5000);
        },
        methods: {
            ...mapActions(['removeNotification'])
        },
        computed: {
            ...mapState({
                notifications: (state) => state.notifications.items,
            }),
            notificationTypeClass() {
                let cls;

                switch (this.type) {
                    case 'error':
                        cls = 'danger';
                        break;
                    case 'success':
                        cls = 'success';
                        break;
                    default:
                        cls = 'info';
                }

                return cls;
            }
        }
    }
</script>

<style scoped>
    .notification-bar {
        margin: 1em 0 1em;
    }
</style>
