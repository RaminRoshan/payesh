import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/MonitoringApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/messagesListApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/userListApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/Group/GroupApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/MonitoringChannelHomeApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/AdminMonitoringApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/invitationHomeApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/messagesTelegramChannelListApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/website/MonitoringWebsiteHomeApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/website/messagesListApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/instagram/instagramUsersListApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/instagram/instagramCommentsListApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/instagram/instagramHomeApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/instagram/instagramPostsApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/Session/App.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/Setting/clonyApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/Setting/makeUsersTagApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/Setting/makeQueryApp.js',
                'packages/pishgaman/CyberspaceMonitoring/src/resources/vue/UserDetection/IndexApp.js',
                'packages/pishgaman/pishgaman/src/resources/vue/Auth/app.js',
                'packages/pishgaman/pishgaman/src/resources/vue/test/app.js',
                'packages/pishgaman/pishgaman/src/resources/vue/AccessLevel/app.js',
                'packages/pishgaman/pishgaman/src/resources/vue/Users/app.js',
                'packages/pishgaman/pishgaman/src/resources/vue/Users/template/nextable/profile.js',
                'packages/pishgaman/pishgaman/src/resources/vue/History/app.js',
                'packages/pishgaman/pishgaman/src/resources/vue/download/app.js',
                'packages/pishgaman/pishgaman/src/resources/vue/messages/app.js',
                'Packages/pishgaman/Pishgaman/src/Resources/vue/download/downloadApp.js',
                'packages/pishgaman/WorkReport/src/resources/vue/WorkReportApp.js',
                'packages/pishgaman/PishgamanApi/src/resources/vue/webServiceApp.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
