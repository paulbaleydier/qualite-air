

self.addEventListener('install', event => {
    event.waitUntil(
        caches.open('my-cache').then(cache => {
            return cache.addAll([
                '/',
                '/webroot/index.php',
                '/webroot/manifest.json'
            ]);
        })
    );
});
