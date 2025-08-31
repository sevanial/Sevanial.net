// SEVANIAL.NET - Optimized JavaScript
let theme = localStorage.getItem('theme') || 'dark';
let menuOpen = false;
let rulesOpen = false;

// Theme management
function initTheme() {
    document.documentElement.setAttribute('data-theme', theme);
    updateThemeButton();
}

function toggleTheme() {
    theme = theme === 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
    updateThemeButton();
    showToast(`Switched to ${theme} theme`);
}

function updateThemeButton() {
    const btn = document.getElementById('theme-btn');
    if (btn) {
        btn.textContent = theme === 'dark' ? '🌙' : '☀️';
        btn.setAttribute('aria-label', `Switch to ${theme === 'dark' ? 'light' : 'dark'} theme`);
    }
}

// Mobile menu
function toggleMenu() {
    menuOpen = !menuOpen;
    const nav = document.getElementById('nav');
    const btn = document.getElementById('menu-btn');
    
    if (nav && btn) {
        nav.classList.toggle('active', menuOpen);
        btn.textContent = menuOpen ? '✕' : '☰';
        btn.setAttribute('aria-expanded', menuOpen);
        document.body.style.overflow = menuOpen ? 'hidden' : '';
    }
}

function closeMenu() {
    if (menuOpen) {
        menuOpen = false;
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

// Clipboard
async function copyIP() {
    const ip = document.getElementById('server-ip')?.textContent?.trim();
    if (!ip) return;
    
    try {
        if (navigator.clipboard) {
            await navigator.clipboard.writeText(ip);
        } else {
            // Fallback
            const textArea = document.createElement('textarea');
            textArea.value = ip;
            textArea.style.cssText = 'position:fixed;left:-999px;opacity:0';
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
        }
        showToast('Server IP Copied! 🎮', 'success');
    } catch (err) {
        showToast('Copy failed', 'error');
    }
}

// Rules panel
function toggleRules() {
    rulesOpen = !rulesOpen;
    const panel = document.getElementById('rules-panel');
    const btn = document.getElementById('rules-btn');
    
    if (panel && btn) {
        panel.classList.toggle('active', rulesOpen);
        btn.textContent = rulesOpen ? 'Rules & Info ▲' : 'Rules & Info ▼';
        btn.setAttribute('aria-expanded', rulesOpen);
    }
}

// Toast notifications
function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.textContent = message;
    toast.style.cssText = `
        position:fixed;top:20px;right:20px;z-index:1000;
        background:${getToastColor(type)};color:#fff;
        padding:0.875rem 1.25rem;border-radius:8px;
        font-weight:600;box-shadow:0 4px 12px rgba(0,0,0,0.3);
        transform:translateY(-20px);opacity:0;transition:all 0.3s ease;
        max-width:300px;word-wrap:break-word;
    `;
    
    document.body.appendChild(toast);
    
    requestAnimationFrame(() => {
        toast.style.transform = 'translateY(0)';
        toast.style.opacity = '1';
    });
    
    setTimeout(() => {
        toast.style.transform = 'translateY(-20px)';
        toast.style.opacity = '0';
        setTimeout(() => document.body.removeChild(toast), 300);
    }, 3000);
    
    toast.addEventListener('click', () => document.body.removeChild(toast));
}

function getToastColor(type) {
    const colors = {
        success: '#28a745',
        error: '#dc3545',
        warning: '#ffc107',
        info: '#17a2b8'
    };
    return colors[type] || colors.info;
}

// Scroll handling
function handleScroll() {
    const header = document.getElementById('header');
    const backBtn = document.getElementById('back-to-top');
    const currentY = window.pageYOffset;
    
    // Header hide/show
    if (header && currentY > 100) {
        header.style.transform = currentY > (handleScroll.lastY || 0) ? 'translateY(-100%)' : 'translateY(0)';
    }
    handleScroll.lastY = currentY;
    
    // Back to top button
    if (backBtn) {
        backBtn.classList.toggle('visible', currentY > 300);
    }
}

// Smooth scroll
function handleNavClick(e) {
    if (e.target.tagName !== 'A') return;
    
    const href = e.target.getAttribute('href');
    if (!href?.startsWith('#')) return;
    
    e.preventDefault();
    const target = document.querySelector(href);
    
    if (target) {
        closeMenu();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        history.pushState(null, null, href);
    }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    
    // Event listeners
    document.getElementById('theme-btn')?.addEventListener('click', toggleTheme);
    document.getElementById('menu-btn')?.addEventListener('click', toggleMenu);
    document.getElementById('back-to-top')?.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    
    // Scroll handling
    let scrollTimeout;
    window.addEventListener('scroll', () => {
        if (scrollTimeout) return;
        scrollTimeout = setTimeout(() => {
            handleScroll();
            scrollTimeout = null;
        }, 16);
    });
    
    // Smooth scrolling
    document.addEventListener('click', handleNavClick);
    
    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (menuOpen && !e.target.closest('nav') && !e.target.closest('#menu-btn')) {
            closeMenu();
        }
    });
    
    // Keyboard shortcuts
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && menuOpen) closeMenu();
    });
    
    console.log('✅ Sevanial.net loaded');
});
