
self.addEventListener('install', event => {
    event.waitUntil(
        Promise.all([
            cacheFiles('my-cache', '/src'),
            cacheFiles('my-cache', '/webroot')
        ])
    );
});

async function cacheFiles(cacheName, directory) {
    const cache = await caches.open(cacheName);
    const response = await fetch(directory);
    const html = await response.text();
    const urls = [...html.matchAll(/href="([^"]+)"/g)].map(match => match[1]);

    // Filtrer les URLs pour ne garder que les fichiers dans le répertoire actuel
    const files = urls.filter(url => {
        const path = new URL(url, location.href).pathname;
        return path.startsWith(directory) && !path.includes('/');
    });

    await cache.addAll(files.map(file => new Request(file, { mode: 'no-cors' })));
    console.log(`Cached ${files.length} files from ${directory}`);
}

self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                // Cache-first, si une réponse est trouvée dans le cache, on la renvoie
                if (response) {
                    return response;
                }

                // Network-fallback, sinon on essaie de récupérer la réponse sur le réseau
                return fetch(event.request)
                    .then(response => {
                        // On stocke la réponse du réseau dans le cache pour les prochaines fois
                        caches.open('my-cache').then(cache => {
                            cache.put(event.request, response.clone());
                        });

                        return response;
                    })
                    .catch(err => {
                        // Si une erreur se produit, on renvoie une réponse par défaut (ou on gère l'erreur d'une autre manière)
                        return new Response('Service worker failed to get data from network', {
                            status: 503,
                            statusText: 'Service Unavailable',
                            headers: new Headers({
                                'Content-Type': 'text/plain'
                            })
                        });
                    });
            })
    );
});
