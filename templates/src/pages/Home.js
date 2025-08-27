import React from 'react';
import '../styles/Home.css';

const Home = () => {
  return (
    <div className="home" id="home">
      <section className="hero">
        <div className="hero-content">
          <h1>Welcome to Your WordPress React Theme</h1>
          <p>A modern, fast, and beautiful React-based WordPress theme starter.</p>
          <button className="cta-button">Get Started</button>
        </div>
      </section>

      <section className="features" id="about">
        <div className="container">
          <h2>Why Choose This Theme?</h2>
          <div className="features-grid">
            <div className="feature-card">
              <div className="feature-icon">⚡</div>
              <h3>Fast Performance</h3>
              <p>Built with modern React and optimized for speed.</p>
            </div>
            
            <div className="feature-card">
              <div className="feature-icon">🎨</div>
              <h3>Modern Design</h3>
              <p>Clean, responsive design that looks great on all devices.</p>
            </div>
            
            <div className="feature-card">
              <div className="feature-icon">🔧</div>
              <h3>Easy Customization</h3>
              <p>Simple to customize and extend with your own components.</p>
            </div>
            
            <div className="feature-card">
              <div className="feature-icon">📱</div>
              <h3>Mobile First</h3>
              <p>Responsive design that works perfectly on mobile devices.</p>
            </div>
          </div>
        </div>
      </section>

      <section className="cta-section" id="contact">
        <div className="container">
          <h2>Ready to Build Something Amazing?</h2>
          <p>Start building your next WordPress site with React today.</p>
          <button className="cta-button">Learn More</button>
        </div>
      </section>
    </div>
  );
};

export default Home;
