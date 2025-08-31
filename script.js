// SEVANIAL.NET - Enhanced JavaScript
(function() {
    'use strict';
    
    // State management
    let state = {
        theme: 'dark',
        menuOpen: false,
        rulesOpen: false,
        initialized: false
    };

    // Initialize theme from localStorage with fallback
    function initTheme() {
        try {
            state.theme = localStorage.getItem('theme') || 'dark';
        } catch (e) {
            console.warn('localStorage not available, using default theme');
            state.theme = 'dark';
        }
        
        document.documentElement.setAttribute('data-theme', state.theme);
        updateThemeButton();
    }

    function toggleTheme() {
        state.theme = state.theme === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', state.theme);
        
        try {
            localStorage.setItem('theme', state.theme);
        } catch (e) {
            console.warn('Could not save theme preference');
        }
        
        updateThemeButton();
        showToast(`Switched to ${state.theme} theme`, 'success');
    }

    function updateThemeButton() {
        const btn = document.getElementById('theme-btn');
        if (btn) {
            btn.textContent = state.theme === 'dark' ? '🌙' : '☀️';
            btn.setAttribute('aria-label', `Switch to ${state.theme === 'dark' ? 'light' : 'dark'} theme`);
        }
    }

    // Mobile menu with improved accessibility
    function toggleMenu() {
        state.menuOpen = !state.menuOpen;
        const nav = document.getElementById('nav');
        const btn = document.getElementById('menu-btn');
        
        if (nav && btn) {
            nav.classList.toggle('active', state.menuOpen);
            btn.textContent = state.menuOpen ? '✕' : '☰';
            btn.setAttribute('aria-expanded', state.menuOpen.toString());
            
            // Prevent body scroll when menu is open on mobile
            document.body.style.overflow = state.menuOpen ? 'hidden' : '';
            
            // Focus management
            if (state.menuOpen) {
                const firstLink = nav.querySelector('a');
                if (firstLink) firstLink.focus();
            }
        }
    }

    function closeMenu() {
        if (state.menuOpen) {
            state.menuOpen = false;
            const nav = document.getElementById('nav');
            const btn = document.getElementById('menu-btn');
            
            if (nav && btn) {
                nav.classList.remove('active');
                btn.textContent = '☰';
                btn.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }
        }
    }

    // Enhanced clipboard functionality
    async function copyIP() {
        const ipElement = document.getElementById('server-ip');
        const copyBtn = document.querySelector('.copy-btn');
        
        if (!ipElement) {
            showToast('Server IP not found', 'error');
            return;
        }
        
        const ip = ipElement.textContent?.trim();
        if (!ip) {
            showToast('No IP to copy', 'error');
            return;
        }
        
        // Visual feedback
        if (copyBtn) {
            copyBtn.textContent = 'Copying...';
            copyBtn.disabled = true;
        }
        
        try {
            if (navigator.clipboard && window.isSecureContext) {
                await navigator.clipboard.writeText(ip);
            } else {
                // Fallback for older browsers or non-HTTPS
                const textArea = document.createElement('textarea');
                textArea.value = ip;
                textArea.style.cssText = 'position:fixed;left:-999px;opacity:0;pointer-events:none;';
                document.body.appendChild(textArea);
                textArea.select();
                textArea.setSelectionRange(0, 99999); // For mobile
                
                const successful = document.execCommand('copy');
                document.body.removeChild(textArea);
                
                if (!successful) {
                    throw new Error('Copy command failed');
                }
            }
            
            showToast('Server IP Copied! 🎮', 'success');
        } catch (err) {
            console.error('Copy failed:', err);
            showToast('Copy failed - try selecting manually', 'error');
        } finally {
            // Reset button
            if (copyBtn) {
                setTimeout(() => {
                    copyBtn.textContent = 'Copy';
                    copyBtn.disabled = false;
                }, 1000);
            }
        }
    }

    // Rules panel with improved UX
    function toggleRules() {
        state.rulesOpen = !state.rulesOpen;
        const panel = document.getElementById('rules-panel');
        const btn = document.getElementById('rules-btn');
        
        if (panel && btn) {
            panel.classList.toggle('active', state.rulesOpen);
            panel.setAttribute('aria-hidden', (!state.rulesOpen).toString());
            
            const arrow = state.rulesOpen ? '▲' : '▼';
            btn.innerHTML = `Rules & Info ${arrow}`;
            btn.setAttribute('aria-expanded', state.rulesOpen.toString());
        }
    }

    // Enhanced toast notifications
    function showToast(message, type = 'info', duration = 3000) {
        // Remove existing toasts to prevent stacking
        const existingToasts = document.querySelectorAll('.toast');
        existingToasts.forEach(toast => toast.remove());
        
        const toast = document.createElement('div');
        toast.className = `toast ${type}`;
        toast.textContent = message;
        toast.setAttribute('role', 'alert');
        toast.setAttribute('aria-live', 'polite');
        
        document.body.appendChild(toast);
        
        // Trigger animation
        requestAnimationFrame(() => {
            toast.classList.add('visible');
        });
        
        // Auto-remove
        const removeToast = () => {
            toast.classList.remove('visible');
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.remove();
                }
            }, 300);
        };
        
        setTimeout(removeToast, duration);
        toast.addEventListener('click', removeToast);
        
        // Keyboard accessibility
        toast.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') removeToast();
        });
    }

    // Scroll handling with performance optimization
    let scrollTimeout;
    let lastScrollY = 0;
    
    function handleScroll() {
        const header = document.getElementById('header');
        const backBtn = document.getElementById('back-to-top');
        const currentY = window.pageYOffset;
        
        // Header hide/show on scroll
        if (header && currentY > 100) {
            const direction = currentY > lastScrollY ? 'translateY(-100%)' : 'translateY(0)';
            header.style.transform = direction;
        } else if (header) {
            header.style.transform = 'translateY(0)';
        }
        
        lastScrollY = currentY;
        
        // Back to top button
        if (backBtn) {
            backBtn.classList.toggle('visible', currentY > 300);
        }
    }

    function throttledScroll() {
        if (scrollTimeout) return;
        scrollTimeout = setTimeout(() => {
            handleScroll();
            scrollTimeout = null;
        }, 16); // ~60fps
    }

    // Smooth scroll with hash management
    function handleNavClick(e) {
        const target = e.target.closest('a');
        if (!target) return;
        
        const href = target.getAttribute('href');
        if (!href?.startsWith('#')) return;
        
        e.preventDefault();
        const element = document.querySelector(href);
        
        if (element) {
            closeMenu();
            
            // Smooth scroll with proper offset
            const headerHeight = document.getElementById('header')?.offsetHeight || 60;
            const elementPosition = element.offsetTop - headerHeight - 20;
            
            window.scrollTo({
                top: elementPosition,
                behavior: 'smooth'
            });
            
            // Update URL without triggering navigation
            if (history.pushState) {
                history.pushState(null, null, href);
            }
            
            // Focus management for accessibility
            setTimeout(() => {
                element.setAttribute('tabindex', '-1');
                element.focus();
                element.addEventListener('blur', () => {
                    element.removeAttribute('tabindex');
                }, { once: true });
            }, 500);
        }
    }

    // Keyboard navigation
    function handleKeyboard(e) {
        switch (e.key) {
            case 'Escape':
                if (state.menuOpen) {
                    closeMenu();
                    document.getElementById('menu-btn')?.focus();
                }
                break;
            case 't':
            case 'T':
                if (e.altKey || e.ctrlKey) {
                    e.preventDefault();
                    toggleTheme();
                }
                break;
        }
    }

    // Click outside handler
    function handleClickOutside(e) {
        if (state.menuOpen && 
            !e.target.closest('#nav') && 
            !e.target.closest('#menu-btn')) {
            closeMenu();
        }
    }

    // Performance monitoring
    function logPerformance() {
        if ('performance' in window) {
            window.addEventListener('load', () => {
                setTimeout(() => {
                    const timing = performance.timing;
                    const loadTime = timing.loadEventEnd - timing.navigationStart;
                    console.log(`🚀 Page loaded in ${loadTime}ms`);
                }, 0);
            });
        }
    }

    // Error handling
    function setupErrorHandling() {
        window.addEventListener('error', (e) => {
            console.error('JavaScript error:', e.error);
            showToast('Something went wrong', 'error');
        });
        
        window.addEventListener('unhandledrejection', (e) => {
            console.error('Unhandled promise rejection:', e.reason);
            showToast('Network error occurred', 'error');
        });
    }

    // Initialize everything when DOM is ready
    function initialize() {
        if (state.initialized) return;
        
        try {
            // Core initialization
            initTheme();
            setupErrorHandling();
            logPerformance();
            
            // Event listeners with error handling
            const themeBtn = document.getElementById('theme-btn');
            const menuBtn = document.getElementById('menu-btn');
            const backBtn = document.getElementById('back-to-top');
            
            if (themeBtn) {
                themeBtn.addEventListener('click', toggleTheme);
            }
            
            if (menuBtn) {
                menuBtn.addEventListener('click', toggleMenu);
            }
            
            if (backBtn) {
                backBtn.addEventListener('click', () => {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            }
            
            // Global event listeners
            window.addEventListener('scroll', throttledScroll, { passive: true });
            document.addEventListener('click', handleNavClick);
            document.addEventListener('click', handleClickOutside);
            document.addEventListener('keydown', handleKeyboard);
            
            // Make functions globally available
            window.copyIP = copyIP;
            window.toggleRules = toggleRules;
            
            state.initialized = true;
            console.log('✅ Sevanial.net enhanced version loaded');
            
        } catch (error) {
            console.error('Initialization error:', error);
            showToast('Site initialization error', 'error');
        }
    }

    // DOM ready handler
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initialize);
    } else {
        initialize();
    }

    // Expose utilities for debugging
    if (typeof window !== 'undefined') {
        window.SevanialUtils = {
            showToast,
            toggleTheme,
            getState: () => ({ ...state })
        };
    }
})();
