import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App';
import './styles/main.css';

// Function to initialize the React app
function initReactApp() {
  const rootElement = document.getElementById('root');
  if (rootElement) {
    const root = ReactDOM.createRoot(rootElement);
    root.render(
      <React.StrictMode>
        <App />
      </React.StrictMode>
    );
  }
}

// Export for WordPress
if (typeof module !== 'undefined' && module.exports) {
  module.exports = { default: initReactApp };
} else if (typeof window !== 'undefined') {
  window.ReactApp = { default: initReactApp };
}

// Auto-initialize if not in WordPress context or in development mode
if (typeof window !== 'undefined' && (!window.wp || process.env.REACT_APP_DEV_MODE === 'true')) {
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initReactApp);
  } else {
    initReactApp();
  }
}
