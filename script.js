// ====================================================================
// SEVANIAL.NET - ENHANCED LIGHTWEIGHT JAVASCRIPT
// Raspberry Pi 5 Optimized - No External Dependencies
// ====================================================================

// Theme Management
class ThemeManager {
    constructor() {
        this.theme = localStorage.getItem('theme') || 'dark';
        this.init();
    }
    
    init() {
        document.documentElement.setAttribute('data-theme', this.theme);
        this.bindEvents();
    }
    
    bindEvents() {
        const toggle = document.getElementById('theme-toggle');
        if (toggle) {
            toggle.addEventListener('click', () => this.toggleTheme());
        }
    }
    
    toggleTheme() {
        this.theme = this.theme === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', this.theme);
        localStorage.setItem('theme', this.theme);
        
        // Add a subtle animation
        document.body.style.transition = 'background-color 0.3s ease';
        setTimeout(() => {
            document.body.style.transition = '';
        }, 300);
    }
}

// Mobile Menu Management
class MobileMenu {
    constructor() {
        this.menuToggle = document.getElementById('menu-toggle');
        this.navMenu = document.getElementById('nav-menu');
        this.init();
    }
    
    init() {
        if (this.menuToggle && this.navMenu) {
            this.bindEvents();
        }
    }
    
    bindEvents() {
        this.menuToggle.addEventListener('click', () => this.toggleMenu());
        
        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('nav') && !e.target.closest('#menu-toggle')) {
                this.closeMenu();
            }
        });
        
        // Close menu when clicking nav links
        this.navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => this.closeMenu());
        });
    }
    
    toggleMenu() {
        this.menuToggle.classList.toggle('active');
        this.navMenu.classList.toggle('active');
    }
    
    closeMenu() {
        this.menuToggle.classList.remove('active');
        this.navMenu.classList.remove('active');
    }
}

// Header Scroll Behavior
class HeaderScroll {
    constructor() {
        this.header = document.querySelector('.header');
        this.lastScrollY = window.scrollY;
        this.init();
    }
    
    init() {
        if (this.header) {
            this.bindEvents();
        }
    }
    
    bindEvents() {
        let ticking = false;
        
        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(() => {
                    this.handleScroll();
                    ticking = false;
                });
                ticking = true;
            }
        });
    }
    
    handleScroll() {
        const currentScrollY = window.scrollY;
        
        // Hide/show header based on scroll direction
        if (currentScrollY > this.lastScrollY && currentScrollY > 100) {
            this.header.classList.add('hidden');
        } else {
            this.header.classList.remove('hidden');
        }
        
        // Add scrolled class for styling
        this.header.classList.toggle('scrolled', currentScrollY > 50);
        
        this.lastScrollY = currentScrollY;
    }
}

// Back to Top Button
class BackToTop {
    constructor() {
        this.button = document.getElementById('back-to-top');
        this.init();
    }
    
    init() {
        if (this.button) {
            this.bindEvents();
        }
    }
    
    bindEvents() {
        let ticking = false;
        
        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(() => {
                    this.handleScroll();
                    ticking = false;
                });
                ticking = true;
            }
        });
        
        this.button.addEventListener('click', () => this.scrollToTop());
        
        // Keyboard accessibility
        this.button.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.scrollToTop();
            }
        });
    }
    
    handleScroll() {
        const show = window.scrollY > 300;
        this.button.classList.toggle('visible', show);
        this.button.tabIndex = show ? 0 : -1;
    }
    
    scrollToTop() {
        window.scrollTo({ 
            top: 0, 
            behavior: 'smooth' 
        });
    }
}

// Smooth Scrolling for Internal Links
class SmoothScroll {
    constructor() {
        this.init();
    }
    
    init() {
        this.bindEvents();
    }
    
    bindEvents() {
        document.querySelectorAll('a[href^="#"]').forEach(link => {
            link.addEventListener('click', (e) => this.handleClick(e, link));
        });
    }
    
    handleClick(e, link) {
        e.preventDefault();
        const targetId = link.getAttribute('href');
        const target = document.querySelector(targetId);
        
        if (target) {
            target.scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
            });
        }
    }
}

// Server Info Panel Toggle
class ServerInfoToggle {
    constructor() {
        this.toggleBtn = document.querySelector('.toggle-btn');
        this.infoPanel = document.getElementById('server-info');
        this.init();
    }
    
    init() {
        if (this.toggleBtn && this.infoPanel) {
            this.bindEvents();
        }
    }
    
    bindEvents() {
        this.toggleBtn.addEventListener('click', () => this.toggle());
    }
    
    toggle() {
        this.toggleBtn.classList.toggle('active');
        this.infoPanel.classList.toggle('active');
    }
}

// Copy Server IP Functionality
class ServerIPCopy {
    constructor() {
        this.copyBtn = document.querySelector('.copy-btn');
        this.serverIP = document.getElementById('server-ip');
        this.init();
    }
    
    init() {
        if (this.copyBtn && this.serverIP) {
            this.bindEvents();
        }
    }
    
    bindEvents() {
        this.copyBtn.addEventListener('click', () => this.copyToClipboard());
    }
    
    async copyToClipboard() {
        const text = this.serverIP.textContent.trim();
        
        try {
            await navigator.clipboard.writeText(text);
            this.showFeedback('Copied!', 'success');
        } catch (err) {
            // Fallback for older browsers
            this.fallbackCopy(text);
        }
    }
    
    fallbackCopy(text) {
        const textArea = document.createElement('textarea');
        textArea.value = text;
        textArea.style.position = 'fixed';
        textArea.style.left = '-999999px';
        textArea.style.top = '-999999px';
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        
        try {
            document.execCommand('copy');
            this.showFeedback('Copied!', 'success');
        } catch (err) {
            this.showFeedback('Copy failed', 'error');
        } finally {
            document.body.removeChild(textArea);
        }
    }
    
    showFeedback(message, type) {
        const feedback = document.createElement('div');
        feedback.textContent = message;
        feedback.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${type === 'success' ? '#28a745' : '#dc3545'};
            color: white;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            z-index: 10000;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transform: translateY(-20px);
            opacity: 0;
            transition: all 0.3s ease;
        `;
        
        document.body.appendChild(feedback);
        
        // Animate in
        requestAnimationFrame(() => {
            feedback.style.transform = 'translateY(0)';
            feedback.style.opacity = '1';
        });
        
        // Remove after 2 seconds
        setTimeout(() => {
            feedback.style.transform = 'translateY(-20px)';
            feedback.style.opacity = '0';
            setTimeout(() => {
                if (feedback.parentNode) {
                    feedback.parentNode.removeChild(feedback);
                }
            }, 300);
        }, 2000);
    }
}

// Performance Observer for Optimization
class PerformanceMonitor {
    constructor() {
        this.init();
    }
    
    init() {
        // Only monitor in development or when performance API is available
        if (typeof performance !== 'undefined' && performance.mark) {
            this.markPageLoad();
        }
    }
    
    markPageLoad() {
        performance.mark('sevanial-site-loaded');
        
        // Log performance metrics after everything loads
        window.addEventListener('load', () => {
            setTimeout(() => {
                const navigationEntry = performance.getEntriesByType('navigation')[0];
                if (navigationEntry) {
                    console.log('🚀 Sevanial.net Performance:', {
                        'DOM Content Loaded': `${navigationEntry.domContentLoadedEventEnd - navigationEntry.domContentLoadedEventStart}ms`,
                        'Page Load': `${navigationEntry.loadEventEnd - navigationEntry.loadEventStart}ms`,
                        'Total Load Time': `${navigationEntry.loadEventEnd - navigationEntry.fetchStart}ms`
                    });
                }
            }, 100);
        });
    }
}

// Utility Functions
const Utils = {
    // Debounce function for performance
    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },
    
    // Throttle function for scroll events
    throttle(func, limit) {
        let inThrottle;
        return function(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    },
    
    // Check if element is in viewport
    isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }
};

// Global Functions (for inline onclick handlers)
window.toggleServerInfo = function() {
    const serverInfoToggle = new ServerInfoToggle();
    serverInfoToggle.toggle();
};

window.copyServerIP = function() {
    const ipCopy = new ServerIPCopy();
    ipCopy.copyToClipboard();
};

// Embed Loading Functions (preserved from original)
window.loadYouTube = function() {
    const container = document.querySelector('#content .embed-container');
    if (!container) return;
    
    const iframe = document.createElement('iframe');
    iframe.src = 'https://www.youtube.com/embed/videoseries?list=UUsHxmJH68ShemUhqNXlzd7w';
    iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
    iframe.allowFullscreen = true;
    iframe.style.cssText = `
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        border-radius: inherit;
    `;
    
    container.innerHTML = '';
    container.appendChild(iframe);
};

window.loadTwitch = function() {
    const container = document.querySelector('#streams .embed-container');
    if (!container) return;
    
    const iframe = document.createElement('iframe');
    iframe.src = `https://player.twitch.tv/?channel=sevanial&parent=${window.location.hostname}`;
    iframe.allowFullscreen = true;
    iframe.style.cssText = `
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        border-radius: inherit;
    `;
    
    container.innerHTML = '';
    container.appendChild(iframe);
};

// Enhanced Page Visibility API for performance
class PageVisibility {
    constructor() {
        this.isVisible = !document.hidden;
        this.init();
    }
    
    init() {
        document.addEventListener('visibilitychange', () => {
            this.isVisible = !document.hidden;
            this.handleVisibilityChange();
        });
    }
    
    handleVisibilityChange() {
        if (this.isVisible) {
            // Page became visible - resume animations
            document.body.style.animationPlayState = 'running';
        } else {
            // Page hidden - pause animations for performance
            document.body.style.animationPlayState = 'paused';
        }
    }
}

// Enhanced Error Handling
class ErrorHandler {
    constructor() {
        this.init();
    }
    
    init() {
        window.addEventListener('error', (e) => {
            console.error('🚨 JavaScript Error:', {
                message: e.message,
                source: e.filename,
                line: e.lineno,
                column: e.colno
            });
        });
        
        window.addEventListener('unhandledrejection', (e) => {
            console.error('🚨 Unhandled Promise Rejection:', e.reason);
            e.preventDefault(); // Prevent console spam
        });
    }
}

// Main Application Initialization
class SevanialApp {
    constructor() {
        this.components = [];
        this.init();
    }
    
    init() {
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.initializeComponents());
        } else {
            this.initializeComponents();
        }
    }
    
    initializeComponents() {
        try {
            // Initialize all components
            this.components = [
                new ThemeManager(),
                new MobileMenu(),
                new HeaderScroll(),
                new BackToTop(),
                new SmoothScroll(),
                new ServerInfoToggle(),
                new ServerIPCopy(),
                new PageVisibility(),
                new ErrorHandler(),
                new PerformanceMonitor()
            ];
            
            // Set copyright year
            this.setCurrentYear();
            
            // Mark initialization complete
            performance.mark('sevanial-app-initialized');
            console.log('✅ Sevanial.net initialized successfully');
            
        } catch (error) {
            console.error('❌ Failed to initialize Sevanial.net:', error);
        }
    }
    
    setCurrentYear() {
        const yearElement = document.getElementById('year');
        if (yearElement) {
            yearElement.textContent = new Date().getFullYear();
        }
    }
}

// Initialize the application
const app = new SevanialApp();

// Export for potential module usage
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { SevanialApp, Utils };
}
