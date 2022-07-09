import { defineConfig } from 'vite'
import tailwindcss from 'tailwindcss'
// @ts-ignore
import autoprefixer from 'autoprefixer'
import laravel from 'vite-plugin-laravel'
// @ts-ignore
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    server: {
        host: '0.0.0.0'
    },
    plugins: [
        laravel({
            postcss: [
                tailwindcss(),
                autoprefixer(),
            ],
        }),
        vue()
    ],
})
