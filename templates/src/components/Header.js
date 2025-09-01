import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import '../styles/Header.css';

const Header = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [wpMenuItems, setWpMenuItems] = useState([]);
  const [siteInfo, setSiteInfo] = useState({});
  const [isScrolled, setIsScrolled] = useState(false);

  // Check if we're in WordPress context
  const isWordPress = typeof window !== 'undefined' && (
    window.wp || 
    process.env.REACT_APP_IS_WORDPRESS === 'true' ||
    window.location.href.includes('wp-content')
  );

  // Handle scroll effect
  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 50);
    };

    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  // Fetch WordPress menu items and site info
  useEffect(() => {
    if (isWordPress && typeof window !== 'undefined') {
      // Get data from WordPress
      if (window.wpReactThemeData) {
        setSiteInfo(window.wpReactThemeData.siteInfo || {});
        setWpMenuItems(window.wpReactThemeData.menuItems || []);
      } else {
        // Fallback: try to get from WordPress REST API
        fetch('/wp-json/wp-react-theme/v1/menus/primary')
          .then(response => response.json())
          .then(data => {
            if (Array.isArray(data)) {
              setWpMenuItems(data);
            }
          })
          .catch(error => {
            console.log('Could not fetch WordPress menu items:', error);
          });
      }
    }
  }, [isWordPress]);

  const toggleMenu = () => {
    setIsMenuOpen(!isMenuOpen);
  };

  const closeMenu = () => {
    setIsMenuOpen(false);
  };

  // Render WordPress menu items
  const renderWpMenuItems = () => {
    if (wpMenuItems.length > 0) {
      return wpMenuItems.map((item, index) => (
        <li key={item.id || index} className={item.classes?.join(' ') || ''}>
          <a 
            href={item.url} 
            onClick={closeMenu}
            target={item.target || '_self'}
            rel={item.target === '_blank' ? 'noopener noreferrer' : ''}
            dangerouslySetInnerHTML={{ __html: item.title }}
          />
        </li>
      ));
    }
    
    // Fallback menu items
    return (
      <>
        <li><a href="/" onClick={closeMenu}>Home</a></li>
        <li><a href="/about" onClick={closeMenu}>About</a></li>
        <li><a href="/contact" onClick={closeMenu}>Contact</a></li>
      </>
    );
  };

  // If in WordPress, use WordPress menu data
  if (isWordPress) {
    return (
      <header className={`header ${isScrolled ? 'header-scrolled' : ''}`}>
        <div className="header-container">
          <div className="logo">
            <a href={siteInfo.url || '/'}>
              {siteInfo.name ? (
                <h1>{siteInfo.name}</h1>
              ) : (
                <h1>WP React Professional Theme</h1>
              )}
            </a>
            {siteInfo.description && (
              <p className="site-description">{siteInfo.description}</p>
            )}
          </div>
          
          <nav className={`nav ${isMenuOpen ? 'nav-open' : ''}`}>
            <ul className="nav-list">
              {renderWpMenuItems()}
            </ul>
          </nav>
          
          <button 
            className={`menu-toggle ${isMenuOpen ? 'active' : ''}`}
            onClick={toggleMenu}
            aria-label="Toggle menu"
            aria-expanded={isMenuOpen}
          >
            <span className="hamburger"></span>
          </button>
        </div>
      </header>
    );
  }

  // If not in WordPress (development preview), use React Router navigation
  return (
    <header className={`header ${isScrolled ? 'header-scrolled' : ''}`}>
      <div className="header-container">
        <div className="logo">
          <Link to="/">
            <h1>WP React Professional Theme</h1>
          </Link>
          <p className="site-description">Development Preview</p>
        </div>
        
        <nav className={`nav ${isMenuOpen ? 'nav-open' : ''}`}>
          <ul className="nav-list">
            <li><Link to="/" onClick={closeMenu}>Home</Link></li>
            <li><Link to="/about" onClick={closeMenu}>About</Link></li>
            <li><Link to="/contact" onClick={closeMenu}>Contact</Link></li>
          </ul>
        </nav>
        
        <button 
          className={`menu-toggle ${isMenuOpen ? 'active' : ''}`}
          onClick={toggleMenu}
          aria-label="Toggle menu"
          aria-expanded={isMenuOpen}
        >
          <span className="hamburger"></span>
        </button>
      </div>
    </header>
  );
};

export default Header;
