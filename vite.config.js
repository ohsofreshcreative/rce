import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import laravel from 'laravel-vite-plugin'
import { wordpressPlugin, wordpressThemeJson } from '@roots/vite-plugin'

export default defineConfig({
  server: {
    host: 'raab.local', // 🔁 <-- zmiana z 'localhost'
    port: 5173,
    strictPort: true,
    cors: true,
    origin: 'http://raab.local:5173',

    hmr: {
      protocol: 'ws',
      host: 'raab.local', // 🔁 <-- tu też!
      port: 5173,
    },
	proxy: {
    '/wp-content/uploads': {
      target: 'http://raab.local', // WordPress backend bez portu!
      changeOrigin: true,
    },
  },
  },

  base: '/build/', // 🔁 zgodne z tym, co generuje @vite()

  plugins: [
    tailwindcss(),

    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/css/editor.css',
        'resources/js/editor.js',
      ],
      refresh: true,
    }),

    wordpressPlugin(),

    wordpressThemeJson({
      disableTailwindColors: false,
      disableTailwindFonts: false,
      disableTailwindFontSizes: false,
    }),
  ],

  resolve: {
    alias: {
      '@scripts': '/resources/js',
      '@styles': '/resources/css',
      '@fonts': '/resources/fonts',
      '@images': '/resources/images',
    },
  },
})
