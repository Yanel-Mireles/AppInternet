import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js',
            'resources/css/nucleo-icons.css',
            'resources/css/nucleo-svg.css',
            'resources/css/soft-ui-dashboard-tailwind.css',                
            'resources/js/plugins/chartjs.min.js',
            'resources/js/plugins/Chart.extension.js',
            'resources/js/plugins/perfect-scrollbar.min.js',
            'resources/js/soft-ui-dashboard-tailwind.js',
            'resources/js/soft-ui-dashboard-tailwind.min.js',
            'resources/js/navbar-sticky.js',
        ],
            refresh: true,
        }),
    ],
    server:{
        hrm:{
            host: 'localhost',
        },
    },
});
