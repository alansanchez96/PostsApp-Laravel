import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['src/Presentation/Laravel/assets/css/app.css', 'src/Presentation/Laravel/assets/js/app.js'],
            refresh: true,
        }),
    ],
});
