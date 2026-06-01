import { resolve } from 'path';
import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'index.html'),
        empresa: resolve(__dirname, 'empresa.html'),
        servicos: resolve(__dirname, 'servicos.html'),
        blog: resolve(__dirname, 'blog.html'),
        contato: resolve(__dirname, 'contato.html'),
      },
    },
  },
  server: {
    configureServer(server) {
      server.middlewares.use((req, res, next) => {
        if (req.url) {
          const url = new URL(req.url, 'http://localhost');
          const pathname = url.pathname;
          if (pathname !== '/' && !pathname.includes('.')) {
            // Se o caminho não tiver extensão e não for a raiz, adiciona .html
            req.url = pathname + '.html' + url.search;
          }
        }
        next();
      });
    }
  }
});
