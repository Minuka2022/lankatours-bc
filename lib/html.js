   // Check if the current URL ends with ".html"
if (window.location.pathname.endsWith(".html")) {
  // Remove the ".html" extension
  const newURL = window.location.href.replace(/\.html$/, '');

  // Replace the URL without the ".html" extension
  window.history.replaceState({}, document.title, newURL);
}
