<?php
// ====================================================================
// SEVANIAL.NET - LIGHTWEIGHT PERSONAL SITE
// Raspberry Pi 5 Optimized - No Database Required
// ====================================================================

// 📢 QUICK UPDATE SECTION - Edit this to change your "Now" status
$now_status = "Working on server automation scripts and prepping for Friday's stream!";
$last_updated = "August 2nd, 2025"; // Update this when you make changes

// 🎮 MINECRAFT SERVER CONFIG - Easy to update
$minecraft_server = [
    'ip' => 'mc.sevanial.net',
    'version' => '1.21.5',
    'type' => 'Survival Factions PvP Anarchy',
    'difficulty' => 'Hard',
    'status' => 'Online' // Online, Offline, Maintenance
];

// 📋 DYNAMIC CARDS - Add/remove/edit these easily
$content_cards = [
    [
        'title' => '🎥 Latest YouTube Video',
        'text' => 'Linux gaming setup guide - Getting Steam working perfectly on Ubuntu',
        'link' => 'https://www.youtube.com/@sevanial',
        'type' => 'youtube'
    ],
    [
        'title' => '🧱 Minecraft Anarchy Server',
        'text' => 'Join the chaos! No rules except no lag machines. Build, raid, survive!',
        'link' => '#minecraft',
        'type' => 'minecraft'
    ],
    [
        'title' => '🌐 Follow on Bluesky',
        'text' => 'Real-time updates about projects, tech discoveries, and Linux adventures',
        'link' => 'https://bsky.app/profile/sevanial.bsky.social',
        'type' => 'bluesky'
    ],
    [
        'title' => '🔧 Server Scripts on GitHub',
        'text' => 'Automation tools, dotfiles, and Raspberry Pi configurations',
        'link' => 'https://github.com/sevanial',
        'type' => 'github'
    ]
];

// 📺 SOCIAL LINKS - Central configuration
$social_links = [
    'youtube' => 'https://www.youtube.com/@sevanial',
    'twitch' => 'https://www.twitch.tv/sevanial',
    'bluesky' => 'https://bsky.app/profile/sevanial.bsky.social',
    'github' => 'https://github.com/sevanial',
    'email' => 'mailto:sevanial@sevanial.net',
    'kofi' => 'https://ko-fi.com/sevanial'
];

// 🕒 STREAM SCHEDULE
$stream_schedule = [
    'day' => 'Friday',
    'time' => '7:00 PM CST',
    'timezone' => 'America/Chicago'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sevanial - Linux enthusiast, content creator, Minecraft server host, and tech hobbyist">
    <meta name="theme-color" content="#1e1b4b">
    <meta name="author" content="Sevanial">
    <title>Sevanial - Gaming, Tech, and Self-Hosted Adventures</title>
    
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="stylesheet" href="styles.css">
</head>
<body data-theme="dark">
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="#" class="logo">
                    <img src="favicon/logo2.png" alt="Sevanial Logo"> 
                    <span>Sevanial</span>
                </a>
                <nav class="nav-container">
                    <button class="theme-toggle" id="theme-toggle" title="Toggle theme">
                        <svg class="theme-icon sun-icon" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                        <svg class="theme-icon moon-icon" viewBox="0 0 24 24">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                        </svg>
                    </button>
                    <button class="menu-toggle" id="menu-toggle">
                        <span></span><span></span><span></span>
                    </button>
                    <ul class="nav" id="nav-menu">
                        <li><a href="#now">Now</a></li>
                        <li><a href="#minecraft">Minecraft</a></li>
                        <li><a href="#content">Content</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero" id="home">
            <div class="container hero-content">
                <img src="favicon/logo1.png" alt="Sevanial Logo" class="hero-logo">
                <h1 class="hero-title">Hey, I'm Sevanial 👋</h1>
                <p class="hero-intro">
                    Linux gamer, server host, and content creator.<br>
                    Building digital experiences and hosting epic Minecraft adventures.
                </p>
                
                <!-- Primary Action Buttons -->
                <div class="hero-buttons">
                    <a href="<?php echo htmlspecialchars($social_links['youtube']); ?>" class="btn btn-youtube" target="_blank" rel="noopener noreferrer">
                        <svg viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
                        YouTube
                    </a>
                    <a href="<?php echo htmlspecialchars($social_links['twitch']); ?>" class="btn btn-twitch" target="_blank" rel="noopener noreferrer">
                        <svg viewBox="0 0 24 24"><path d="M21 2H3v16h5v4l4-4h5l4-4V2zm-10 9V7m5 4V7"></path></svg>
                        Twitch
                    </a>
                    <a href="#minecraft" class="btn btn-minecraft">
                        <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        Minecraft Server
                    </a>
                </div>
            </div>
        </section>

        <!-- Now Section -->
        <section id="now" class="section">
            <div class="container">
                <div class="now-update">
                    <h2 class="now-title">What I'm Up To Now</h2>
                    <div class="now-content">
                        <p class="now-status"><?php echo htmlspecialchars($now_status); ?></p>
                        <div class="now-meta">
                            <span class="now-date">Updated: <?php echo htmlspecialchars($last_updated); ?></span>
                            <span class="now-live">
                                <span class="live-indicator"></span>
                                Next stream: <?php echo htmlspecialchars($stream_schedule['day']); ?> at <?php echo htmlspecialchars($stream_schedule['time']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dynamic Cards Section -->
        <section id="content" class="section section-dark">
            <div class="container">
                <h2 class="section-title">Latest & Featured</h2>
                <div class="card-grid">
                    <?php foreach ($content_cards as $card): ?>
                    <div class="card card-<?php echo htmlspecialchars($card['type']); ?>">
                        <h3><?php echo htmlspecialchars($card['title']); ?></h3>
                        <p><?php echo htmlspecialchars($card['text']); ?></p>
                        <a href="<?php echo htmlspecialchars($card['link']); ?>" 
                           class="card-link btn-<?php echo htmlspecialchars($card['type']); ?>"
                           <?php echo strpos($card['link'], 'http') === 0 ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>>
                            <?php
                            switch($card['type']) {
                                case 'youtube': echo 'Watch →'; break;
                                case 'minecraft': echo 'Join Server →'; break;
                                case 'bluesky': echo 'Follow →'; break;
                                case 'github': echo 'View Code →'; break;
                                default: echo 'Learn More →'; break;
                            }
                            ?>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Minecraft Server Section -->
        <section id="minecraft" class="section">
            <div class="container">
                <h2 class="section-title">Minecraft Anarchy Server</h2>
                <div class="minecraft-showcase">
                    <div class="server-status">
                        <div class="server-main">
                            <div class="server-ip-display">
                                <span class="server-label">Server IP:</span>
                                <code class="server-ip" id="server-ip"><?php echo htmlspecialchars($minecraft_server['ip']); ?></code>
                                <button class="copy-btn" onclick="copyServerIP()" title="Copy to clipboard">
                                    <svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                </button>
                            </div>
                            <div class="server-status-indicator">
                                <span class="status-dot status-<?php echo strtolower($minecraft_server['status']); ?>"></span>
                                <span class="status-text"><?php echo htmlspecialchars($minecraft_server['status']); ?></span>
                            </div>
                        </div>
                        <div class="server-details">
                            <div class="detail-item">
                                <strong>Version:</strong> <?php echo htmlspecialchars($minecraft_server['version']); ?>
                            </div>
                            <div class="detail-item">
                                <strong>Type:</strong> <?php echo htmlspecialchars($minecraft_server['type']); ?>
                            </div>
                            <div class="detail-item">
                                <strong>Difficulty:</strong> <?php echo htmlspecialchars($minecraft_server['difficulty']); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="server-info-toggle">
                        <button class="toggle-btn" onclick="toggleServerInfo()">
                            <span>Server Rules & Info</span>
                            <svg class="toggle-icon" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <div class="server-info-panel" id="server-info">
                            <div class="info-grid">
                                <div class="info-section">
                                    <h4>🚨 Rules</h4>
                                    <ul>
                                        <li>No lag machines or server crashing</li>
                                        <li>No doxxing or real-life threats</li>
                                        <li>Everything else is fair game</li>
                                    </ul>
                                </div>
                                <div class="info-section">
                                    <h4>⚔️ Features</h4>
                                    <ul>
                                        <li>Full PvP with no safe zones</li>
                                        <li>Essential commands (/home, /tpa, /spawn)</li>
                                        <li>Anarchy freedom - minimal restrictions</li>
                                    </ul>
                                </div>
                            </div>
                            <p class="anarchy-note">⚠️ This is true anarchy - expect chaos, betrayal, and epic battles!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="section section-dark">
            <div class="container">
                <h2 class="section-title">Tech & Projects</h2>
                <div class="tech-showcase">
                    <div class="tech-intro">
                        <p>I love turning random hardware into useful servers and exploring how AI can improve my workflows. From Raspberry Pi CCTV systems to automated deployment scripts, here's what I'm working on:</p>
                    </div>
                    <div class="tech-grid">
                        <div class="tech-category">
                            <h3>🐧 Linux & Servers</h3>
                            <ul>
                                <li>Raspberry Pi 5 web hosting</li>
                                <li>Automated backup systems</li>
                                <li>SSH & Cockpit administration</li>
                                <li>Custom deployment scripts</li>
                            </ul>
                        </div>
                        <div class="tech-category">
                            <h3>🎮 Gaming Setup</h3>
                            <ul>
                                <li>Steam with Proton on Linux</li>
                                <li>PrismLauncher for modded Minecraft</li>
                                <li>Game server management</li>
                                <li>Performance optimization</li>
                            </ul>
                        </div>
                        <div class="tech-category">
                            <h3>🔧 Development</h3>
                            <ul>
                                <li>Bash scripting & automation</li>
                                <li>Python utilities</li>
                                <li>PHP web applications</li>
                                <li>AI-assisted coding workflows</li>
                            </ul>
                        </div>
                    </div>
                    <div class="project-actions">
                        <a href="<?php echo htmlspecialchars($social_links['github']); ?>" class="btn btn-github" target="_blank" rel="noopener noreferrer">
                            <svg viewBox="0 0 24 24"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                            View Projects on GitHub
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="section">
            <div class="container">
                <h2 class="section-title">Connect & Support</h2>
                <div class="contact-grid">
                    <div class="social-section">
                        <h3>Follow & Subscribe</h3>
                        <div class="social-links">
                            <a href="<?php echo htmlspecialchars($social_links['youtube']); ?>" class="social-link btn-youtube" target="_blank" rel="noopener noreferrer">
                                <svg viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
                                YouTube
                            </a>
                            <a href="<?php echo htmlspecialchars($social_links['twitch']); ?>" class="social-link btn-twitch" target="_blank" rel="noopener noreferrer">
                                <svg viewBox="0 0 24 24"><path d="M21 2H3v16h5v4l4-4h5l4-4V2zm-10 9V7m5 4V7"></path></svg>
                                Twitch
                            </a>
                            <a href="<?php echo htmlspecialchars($social_links['bluesky']); ?>" class="social-link btn-bluesky" target="_blank" rel="noopener noreferrer">
                                <svg viewBox="0 0 24 24"><path d="M22 12A10 10 0 0 0 12 2v10z"></path><path d="M2 12A10 10 0 0 0 12 22V12z"></path></svg>
                                Bluesky
                            </a>
                            <a href="<?php echo htmlspecialchars($social_links['email']); ?>" class="social-link btn-email">
                                <svg viewBox="0 0 24 24"><path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/><path d="M22 6l-10 7L2 6"/></svg>
                                Email
                            </a>
                        </div>
                    </div>
                    <div class="support-section">
                        <h3>Support My Work</h3>
                        <p>Like what I do? Consider supporting my projects and server hosting costs!</p>
                        <a href="<?php echo htmlspecialchars($social_links['kofi']); ?>" class="btn btn-support" target="_blank" rel="noopener noreferrer">
                            <svg viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Support via Ko-fi
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-info">
                    <p>&copy; <?php echo date('Y'); ?> Sevanial. Self-hosted on Raspberry Pi 5.</p>
                    <p class="footer-update">Last updated: <?php echo htmlspecialchars($last_updated); ?></p>
                </div>
                <div class="footer-links">
                    <a href="<?php echo htmlspecialchars($social_links['github']); ?>" target="_blank" rel="noopener noreferrer">Source Code</a>
                    <a href="<?php echo htmlspecialchars($social_links['kofi']); ?>" target="_blank" rel="noopener noreferrer">Support</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="back-to-top" title="Back to top">
        <svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15"></polyline></svg>
    </button>

    <script src="script.js"></script>
</body>
</html>
