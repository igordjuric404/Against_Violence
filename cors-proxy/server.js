const cors_proxy = require('cors-anywhere');

const host = '0.0.0.0'; // Listen on all interfaces (for remote access)
const port = 8080; // Port number, you can choose any

cors_proxy.createServer({
  originWhitelist: [], // Allow all origins
  // Remove 'requireHeader' to allow requests without specifying 'origin' or 'x-requested-with'
  removeHeaders: ['cookie', 'cookie2'], // Optionally remove cookie headers
}).listen(port, host, () => {
  console.log(`CORS Anywhere proxy running on ${host}:${port}`);
});
