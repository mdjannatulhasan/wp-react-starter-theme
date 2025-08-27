import React from 'react';
import '../styles/About.css';

const About = () => {
  return (
    <div className="about">
      <div className="container">
        <section className="about-hero">
          <h1>About Our Theme</h1>
          <p>Learn more about this modern WordPress React theme starter.</p>
        </section>

        <section className="about-content">
          <div className="about-grid">
            <div className="about-text">
              <h2>Built for Modern Web Development</h2>
              <p>
                This WordPress React theme starter is designed to provide developers 
                with a solid foundation for building modern, fast, and beautiful 
                WordPress themes using React.
              </p>
              <p>
                With features like hot reloading, modern JavaScript support, and 
                a component-based architecture, you can focus on building amazing 
                user experiences without worrying about the setup.
              </p>
            </div>
            
            <div className="about-features">
              <h3>Key Features</h3>
              <ul>
                <li>React 18 with modern hooks</li>
                <li>Webpack 5 with hot reloading</li>
                <li>Responsive design out of the box</li>
                <li>Modern CSS with flexbox and grid</li>
                <li>SEO-friendly structure</li>
                <li>Accessibility focused</li>
              </ul>
            </div>
          </div>
        </section>

        <section className="team-section">
          <h2>Built with ❤️</h2>
          <p>
            This theme starter is created to help developers build better 
            WordPress themes faster and more efficiently.
          </p>
        </section>
      </div>
    </div>
  );
};

export default About;
