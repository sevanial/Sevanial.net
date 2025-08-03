// ====================================================================
// SEVANIAL.NET - ULTRA-LIGHTWEIGHT JAVASCRIPT
// Raspberry Pi 5 Optimized - <3KB Target
// ====================================================================

// Theme Toggle
let theme = localStorage.getItem('theme') || 'dark';
document.documentElement.setAttribute('data-theme', theme);

function toggleTheme() {
    theme = theme === 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
    document.getElementById('theme-btn').textContent = theme === 'dark' ? '🌙' : '☀️';
}

// Mobile Menu
function toggleMenu() {
    const nav = document.getElementById('nav');
    const btn = document.getElementById('menu-btn');
    nav.classList.toggle('active');
    btn.textContent = nav.classList.contains('active') ? '✕' : '☰';
}

// Copy Server IP
function copyIP() {
    const ip = document.getElementById('server-ip').textContent;
    navigator.clipboard.writeText(ip).then(() => {
        showToast('IP Copied!', 'success');
    }).catch(() => {
        // Fallback
        const el = document.createElement('textarea');
        el.value = ip;
        el.style.position = 'fixed';
        el.style.left = '-999px';
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        showToast('IP Copied!', 'success');
    });
}

// Toggle Rules Panel
function toggleRules() {
    const panel = document.getElementById('rules-panel');
    const btn = document.getElementById('rules-btn');
    panel.classList.toggle('active');
    btn.textContent = panel.classList.contains('active') ? 'Rules & Info ▲' : 'Rules & Info ▼';
}

// Toast Notifications
function showToast(msg, type) {
    const toast = document.createElement('div');
    toast.textContent = msg;
    toast.style.cssText = `position:fixed;top:20px;right:20px;background:${type === 'success' ? '#28a745' : '#dc3545'};color:#fff;padding:0.75rem 1rem;border-radius:8px;font-weight:600;z-index:1000;box-shadow:0 4px 12px rgba(0,0,0,0.3);transform:translateY(-20px);opacity:0;transition:all 0.3s ease`;
    document.body.appendChild(toast);
    
    requestAnimationFrame(() => {
        toast.style.transform = 'translateY(0)';
        toast.style.opacity = '1';
    });
    
    setTimeout(() => {
        toast.style.transform = 'translateY(-20px)';
        toast.style.opacity = '0';
        setTimeout(() => toast.remove(), 300);
    }, 2000);
}

// Scroll Handlers
let lastScrollY = 0;
function handleScroll() {
    const header = document.getElementById('header');
    const backBtn = document.getElementById('back-to-top');
    const currentY = window.scrollY;
    
    // Hide/show header on scroll
    if (currentY > lastScrollY && currentY > 100) {
        header.style.transform = 'translateY(-100%)';
    } else {
        header.style.transform = 'translateY(0)';
    }
    
    // Back to top button
    backBtn.classList.toggle('visible', currentY > 300);
    
    lastScrollY = currentY;
}

// Smooth scroll for anchor links
function smoothScroll(e) {
    if (e.target.tagName === 'A' && e.target.getAttribute('href').startsWith('#')) {
        e.preventDefault();
        const target = document.querySelector(e.target.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
            // Close mobile menu if open
            document.getElementById('nav').classList.remove('active');
            document.getElementById('menu-btn').textContent = '☰';
        }
    }
}

// Throttled scroll handler
let scrollTicking = false;
function onScroll() {
    if (!scrollTicking) {
        requestAnimationFrame(() => {
            handleScroll();
            scrollTicking = false;
        });
        scrollTicking = true;
    }
}

// Initialize when DOM is ready
function init() {
    // Set initial theme button
    document.getElementById('theme-btn').textContent = theme === 'dark' ? '🌙' : '☀️';
    
    // Bind events
    document.getElementById('theme-btn').addEventListener('click', toggleTheme);
    document.getElementById('menu-btn').addEventListener('click', toggleMenu);
    document.getElementById('back-to-top').addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    
    // Scroll events
    window.addEventListener('scroll', onScroll, { passive: true });
    
    // Smooth scroll for all anchor links
    document.addEventListener('click', smoothScroll);
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('nav') && !e.target.closest('#menu-btn')) {
            document.getElementById('nav').classList.remove('active');
            document.getElementById('menu-btn').textContent = '☰';
        }
    });
    
    console.log('✅ Sevanial.net loaded');
}

// Start when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
