import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Header from './components/Header';
import Footer from './components/Footer';
import Home from './pages/Home';
import About from './pages/About';
import Contact from './pages/Contact';
import './styles/App.css';

function App() {
  // Check if we're in WordPress context
  const isWordPress = typeof window !== 'undefined' && (
    window.wp || 
    process.env.REACT_APP_IS_WORDPRESS === 'true' ||
    window.location.href.includes('wp-content')
  );
  
  // If in WordPress, don't use React Router to avoid URL conflicts
  if (isWordPress) {
    return (
      <div className="App">
        <Header />
        <main className="main-content">
          <Home />
        </main>
        <Footer />
      </div>
    );
  }
  
  // If not in WordPress, use React Router normally
  return (
    <Router>
      <div className="App">
        <Header />
        <main className="main-content">
          <Routes>
            <Route path="/" element={<Home />} />
            <Route path="/about" element={<About />} />
            <Route path="/contact" element={<Contact />} />
            <Route path="*" element={<Home />} />
          </Routes>
        </main>
        <Footer />
      </div>
    </Router>
  );
}

export default App;
