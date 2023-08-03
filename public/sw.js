importScripts('/workbox/workbox-v7.0.0/workbox-sw.js');

workbox.setConfig({
  modulePathPrefix: '/workbox/workbox-v7.0.0/',
});

// Precache assets (except HTML pages, those will be handled automatically)
workbox.precaching.precacheAndRoute([
  '/offline',
  '/assets/img/undraw_quitting_time_dm8t.svg',
  '/site.webmanifest',
  '/favicon-16x16.png',
  '/favicon-32x32.png',
  '/apple-touch-icon.png',
  '/safari-pinned-tab.svg',
  '/assets/bootstrap/css/homepage-style.css',
  '/assets/css/vanilla-zoom.min.css',
  '/assets/css/baguetteBox.min.css',
  '/assets/css/tabler.min.css',
  '/assets/summernote-0.8.18-dist/summernote-lite.css',
  '/assets/css/select2.min.css',
  '/assets/DataTables/datatables.min.css',
  '/assets/js/jquery.min.js',
  '/assets/js/masonry.pkgd.min.js',
  '/assets/js/tabler.min.js',
  '/assets/js/sweetalert2.all.min.js',
  '/assets/summernote-0.8.18-dist/summernote-lite.js',
  '/assets/js/jquery.validate.min.js',
  '/assets/js/additional-methods.min.js',
  '/assets/js/select2.min.js',
  '/assets/DataTables/datatables.min.js',
  '/ViewerJS/pdf.worker.js',
]);

// Cache images using the Stale While Revalidate strategy
workbox.routing.registerRoute(
  ({ request }) => request.destination === 'image',
  new workbox.strategies.StaleWhileRevalidate({
    cacheName: 'images',
    plugins: [
      new workbox.expiration.ExpirationPlugin({
        maxEntries: 50, // Adjust the maximum number of entries in the cache
      }),
    ],
  })
);

// Cache CSS assets using the Cache First strategy
workbox.routing.registerRoute(
  ({ request }) => request.destination === 'style',
  new workbox.strategies.CacheFirst({
    cacheName: 'styles',
    plugins: [
      new workbox.expiration.ExpirationPlugin({
        maxEntries: 50, // Adjust the maximum number of entries in the cache
      }),
    ],
  })
);

// Cache JavaScript assets using the Cache First strategy
workbox.routing.registerRoute(
  ({ request }) => request.destination === 'script',
  new workbox.strategies.CacheFirst({
    cacheName: 'scripts',
    plugins: [
      new workbox.expiration.ExpirationPlugin({
        maxEntries: 50, // Adjust the maximum number of entries in the cache
      }),
    ],
  })
);

// Handle navigation requests and show the offline page if fetching fails
const navigationRoute = new workbox.routing.NavigationRoute(({ event }) => {
  const { request } = event;
  return caches.match(request)
    .then(cachedResponse => {
      if (cachedResponse) {
        // Serve the cached page if available
        return cachedResponse;
      }

      // If the page is not in the cache, try fetching from the network
      return fetch(request)
        .then(networkResponse => {
          // Clone the network response before caching
          const responseClone = networkResponse.clone();

          // Cache the fetched page for future use
          caches.open('pages')
            .then(cache => cache.put(request, responseClone));

          return networkResponse;
        })
        .catch(() => {
          // If fetching from the network also fails, serve the offline page
          return caches.match('/offline');
        });
    });
});

workbox.routing.registerRoute(navigationRoute);

// Helper function to create a custom cache key
function createCacheKey(request) {
  const url = new URL(request.url);
  const params = new URLSearchParams(url.search);
  const cacheKey = url.pathname + '?' + params.toString();
  return cacheKey;
}

self.addEventListener('fetch', function (event) {
  // Check if the request URL ends with "/datatable"
  if (event.request.url.endsWith('/datatable')) {
    event.respondWith(
      fetch(event.request)
        .then(function (response) {
          // If the response was successful (status code 200),
          // cache the JSON data using a custom cache key
          if (response.status === 200) {
            const cacheKey = createCacheKey(event.request);
            const clonedResponse = response.clone();
            caches.open('datatable-cache')
              .then(function (cache) {
                cache.put(cacheKey, clonedResponse);
              });
            return response;
          }
          return response;
        })
        .catch(function () {
          // If the Ajax request fails (offline), attempt to serve the cached response
          const cacheKey = createCacheKey(event.request);
          return caches.match(cacheKey)
            .then(function (cachedResponse) {
              if (cachedResponse) {
                return cachedResponse;
              }
              // If no cached response is available, return a fallback response
              return new Response('{"data": []}', {
                headers: { 'Content-Type': 'application/json' }
              });
            });
        })
    );
  }
});