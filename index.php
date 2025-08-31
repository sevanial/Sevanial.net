<?php
// Enhanced SEVANIAL.NET with security and performance improvements
error_reporting(E_ALL);
ini_set('display_errors', 0); // Set to 1 for development

// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: geolocation=(), microphone=(), camera=()');

// Performance optimizations
if (!headers_sent()) {
    ob_start('ob_gzhandler');
    header('Cache-Control: public, max-age=3600');
}

// Configuration - Move to separate config.php in production
$config = [
    'site' => [
        'name' => 'Sevanial',
        'description' => 'Linux gamer, content creator, and self-hosting enthusiast',
        'url' => 'https://sevanial.net',
        'version' => '2.0.0'
    ],
    'now' => [
        'status' => 'Uploaded new video to YouTube',
        'last_updated' => 'August 31st, 2025',
        'next_stream' => 'Friday 7PM CST',
        'stream_topic' => "Marvel's Spider-Man Remastered"
    ],
    'minecraft' => [
        'ip' => 'mc.sevanial.net',
        'version' => '1.21.7',
        'type' => 'Survival PvP Anarchy',
        'status' => 'online',
        'players_online' => 0,
        'max_players' => 100
    ]
];

// Social media links
$social = [
    'youtube' => 'https://youtube.com/@sevanial',
    'twitch' => 'https://twitch.tv/sevanial',
    'bluesky' => 'https://bsky.app/profile/sevanial.bsky.social',
    'github' => 'https://github.com/sevanial',
    'email' => 'mailto:sevanial@sevanial.net',
    'kofi' => 'https://ko-fi.com/sevanial'
];

// Quick links cards
$cards = [
    [
        'title' => '🎥 Latest YouTube',
        'text' => 'Linux gaming setup guide with performance tips',
        'link' => $social['youtube'],
        'type' => 'yt',
        'badge' => 'New',
        'external' => true
    ],
    [
        'title' => '📺 Twitch Streams',
        'text' => 'Gaming & tech live streams every Friday',
        'link' => $social['twitch'],
        'type' => 'tw',
        'badge' => 'Live Soon',
        'external' => true
    ],
    [
        'title' => '🧱 Minecraft Server',
        'text' => 'Anarchy server - no rules, pure chaos!',
        'link' => '#minecraft',
        'type' => 'mc',
        'badge' => 'Online',
        'external' => false
    ],
    [
        'title' => '🔧 GitHub Projects',
        'text' => 'Scripts, configs, and open-source tools',
        'link' => $social['github'],
        'type' => 'gh',
        'badge' => 'Updated',
        'external' => true
    ],
    [
        'title' => '🌀 Follow on Bluesky',
        'text' => 'Real-time project updates and tech thoughts',
        'link' => $social['bluesky'],
        'type' => 'bs',
        'badge' => 'Active',
        'external' => true
    ],
    [
        'title' => '✉️ Contact Me',
        'text' => 'Reach out for collabs or support my work',
        'link' => '#contact',
        'type' => 'ct',
        'badge' => 'Open',
        'external' => false
    ]
];

// Tools and technologies
$tools = [
    'Operating Systems' => [
        'Arch Linux (KDE Plasma 6) - Primary desktop OS',
        'Fedora - Server deployments',
        'Ubuntu - Server deployments',
        'Raspberry Pi OS - IoT & self-hosting'
    ],
    'Gaming Platforms' => [
        'Steam + Proton (GE, Experimental) - Linux gaming',
        'MangoHUD / GOverlay - Performance monitoring',
        'PrismLauncher (Minecraft) - Modded instances',
        'Team Fortress 2 Configs - Competitive settings'
    ],
    'Development & Code' => [
        'VS Code - Primary code editor',
        'GitHub (git) - Version control',
        'Python - Automation & scripting',
        'MySQL / MariaDB - Database management',
        'HTML / CSS / PHP / JavaScript - Web development'
    ],
    'Content Creation' => [
        'OBS Studio - Streaming & recording',
        'GIMP / Krita - Image editing & digital art',
        'Kdenlive - Video editing & production',
        'Audacity - Audio editing & processing'
    ]
];

// Current projects
$projects = [
    [
        'title' => '🎮 Game Servers',
        'description' => 'Minecraft anarchy hosting, TF2 configs, and experimenting with mods/datapacks for enhanced gameplay.',
        'tech' => ['Java', 'Paper/Spigot', 'Linux'],
        'status' => 'Active'
    ],
    [
        'title' => '🎨 Digital Art & 3D',
        'description' => 'Blender 3D modeling, Krita illustrations, and GIMP/Inkscape designs for content and personal projects.',
        'tech' => ['Blender', 'Krita', 'GIMP'],
        'status' => 'Ongoing'
    ],
    [
        'title' => '🔒 Networking & Security',
        'description' => 'Learning system hardening with UFW/firewalld, testing VPNs, and exploring FreeIPA for identity management.',
        'tech' => ['Linux', 'WireGuard', 'FreeIPA'],
        'status' => 'Learning'
    ],
    [
        'title' => '📹 Content Creation',
        'description' => 'Streaming to YouTube & Twitch, Linux gaming tutorials, and editing with OBS/Kdenlive.',
        'tech' => ['OBS', 'Kdenlive', 'Linux'],
        'status' => 'Active'
    ]
];

// Helper functions
function escapeHtml($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function generateStructuredData($config, $social) {
    return json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Person',
        'name' => $config['site']['name'],
        'url' => $config['site']['url'],
        'description' => $config['site']['description'],
        'sameAs' => array_values($social)
    ], JSON_UNESCAPED_SLASHES);
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= escapeHtml($config['site']['name']) ?> - Linux Gaming & Content Creator</title>
    <meta name="description" content="<?= escapeHtml($config['site']['description']) ?>. YouTube/Twitch streams, Minecraft server, and open-source projects.">
    <meta name="keywords" content="linux gaming, content creator, minecraft server, open source, streaming, twitch, youtube">
    <meta name="author" content="<?= escapeHtml($config['site']['name']) ?>">
    <link rel="canonical" href="<?= escapeHtml($config['site']['url']) ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= escapeHtml($config['site']['url']) ?>">
    <meta property="og:title" content="<?= escapeHtml($config['site']['name']) ?> - Linux Gaming & Content Creator">
    <meta property="og:description" content="<?= escapeHtml($config['site']['description']) ?>">
    <meta property="og:image" content="<?= escapeHtml($config['site']['url']) ?>/favicon/og-image.png">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= escapeHtml($config['site']['url']) ?>">
    <meta property="twitter:title" content="<?= escapeHtml($config['site']['name']) ?> - Linux Gaming & Content Creator">
    <meta property="twitter:description" content="<?= escapeHtml($config['site']['description']) ?>">
    <meta property="twitter:image" content="<?= escapeHtml($config['site']['url']) ?>/favicon/og-image.png">
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    
    <!-- Preload critical resources -->
    <link rel="preload" href="styles.css" as="style">
    <link rel="preload" href="script.js" as="script">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="styles.css">
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    <?= generateStructuredData($config, $social) ?>
    </script>
</head>
<body>
    <!-- Skip to main content for accessibility -->
    <a href="#main" class="sr-only">Skip to main content</a>
    
    <!-- Header -->
    <header id="header" role="banner">
        <div class="container">
            <a href="#home" class="logo" aria-label="<?= escapeHtml($config['site']['name']) ?> homepage">
                <?= escapeHtml($config['site']['name']) ?>
            </a>
            <nav role="navigation" aria-label="Main navigation">
                <button id="menu-btn" aria-expanded="false" aria-label="Toggle navigation menu">☰</button>
                <ul id="nav">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#now">Now</a></li>
                    <li><a href="#minecraft">Minecraft</a></li>
                    <li><a href="#tools">Tools</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <button id="theme-btn" aria-label="Switch to light theme">🌙</button>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main id="main">
        <!-- Hero -->
        <section id="home" class="hero">
            <div class="container">
                <h1><?= escapeHtml($config['site']['name']) ?></h1>
                <p class="intro"><?= escapeHtml($config['site']['description']) ?>. Building cool projects, streaming games, and sharing knowledge.</p>
                <div class="hero-buttons">
                    <a href="<?= escapeHtml($social['youtube']) ?>" class="btn btn-yt" target="_blank" rel="noopener" aria-label="Visit YouTube channel">🎥 YouTube</a>
                    <a href="<?= escapeHtml($social['twitch']) ?>" class="btn btn-tw" target="_blank" rel="noopener" aria-label="Visit Twitch channel">📺 Twitch</a>
                    <a href="#minecraft" class="btn btn-mc" aria-label="Go to Minecraft server section">🧱 Minecraft</a>
                    <a href="<?= escapeHtml($social['github']) ?>" class="btn btn-gh" target="_blank" rel="noopener" aria-label="Visit GitHub profile">🔧 GitHub</a>
                    <a href="<?= escapeHtml($social['bluesky']) ?>" class="btn btn-bs" target="_blank" rel="noopener" aria-label="Follow on Bluesky">🌀 Bluesky</a>
                    <a href="<?= escapeHtml($social['kofi']) ?>" class="btn btn-support" target="_blank" rel="noopener" aria-label="Support on Ko-fi">💖 Support</a>
                </div>
            </div>
        </section>

        <!-- Quick Links -->
        <section class="section" aria-labelledby="quick-links-heading">
            <div class="container">
                <h2 id="quick-links-heading">Quick Links</h2>
                <div class="cards">
                    <?php foreach($cards as $index => $card): ?>
                    <article class="card">
                        <div class="card-badge card-badge-<?= escapeHtml($card['type']) ?>"><?= escapeHtml($card['badge']) ?></div>
                        <h3><?= escapeHtml($card['title']) ?></h3>
                        <p><?= escapeHtml($card['text']) ?></p>
                        <a href="<?= escapeHtml($card['link']) ?>" 
                           class="btn btn-<?= escapeHtml($card['type']) ?>"
                           <?= $card['external'] ? 'target="_blank" rel="noopener"' : '' ?>
                           aria-label="<?= escapeHtml($card['title']) ?>">
                            Visit
                        </a>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Now -->
        <section id="now" class="section dark" aria-labelledby="now-heading">
            <div class="container">
                <h2 id="now-heading">What I'm Up To</h2>
                <div class="now-card">
                    <div class="status"><?= escapeHtml($config['now']['status']) ?></div>
                    <div class="meta">
                        <span>Updated: <?= escapeHtml($config['now']['last_updated']) ?></span>
                        <div class="live">
                            <span class="dot online" aria-label="Live status"></span>
                            Next Stream: <?= escapeHtml($config['now']['next_stream']) ?> - <?= escapeHtml($config['now']['stream_topic']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Minecraft Server -->
        <section id="minecraft" class="section" aria-labelledby="minecraft-heading">
            <div class="container">
                <h2 id="minecraft-heading">🧱 Minecraft Server</h2>
                <div class="server-box">
                    <div class="server-main">
                        <div class="ip-section">
                            <label for="server-ip">Server IP:</label>
                            <code id="server-ip" tabindex="0"><?= escapeHtml($config['minecraft']['ip']) ?></code>
                            <button class="copy-btn" onclick="copyIP()" aria-label="Copy server IP to clipboard">Copy</button>
                        </div>
                        <div class="status">
                            <span class="dot <?= escapeHtml(strtolower($config['minecraft']['status'])) ?>" 
                                  aria-label="Server is <?= escapeHtml($config['minecraft']['status']) ?>"></span>
                            <?= escapeHtml($config['minecraft']['status']) ?>
                        </div>
                    </div>
                    
                    <div class="server-info">
                        <span>Version: <?= escapeHtml($config['minecraft']['version']) ?></span>
                        <span>Type: <?= escapeHtml($config['minecraft']['type']) ?></span>
                        <?php if ($config['minecraft']['status'] === 'online'): ?>
                        <span>Players: <?= intval($config['minecraft']['players_online']) ?>/<?= intval($config['minecraft']['max_players']) ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="rules">
                        <button id="rules-btn" onclick="toggleRules()" aria-expanded="false" aria-controls="rules-panel">
                            Rules & Info ▼
                        </button>
                        <div id="rules-panel" class="rules-panel" aria-hidden="true">
                            <div class="rule-cols">
                                <div>
                                    <h4>Server Rules</h4>
                                    <ul>
                                        <li>No cheating/hacking</li>
                                        <li>No doxxing or real-world threats</li>
                                        <li>No excessive spam</li>
                                        <li>Use common sense</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4>Features</h4>
                                    <ul>
                                        <li>Anarchy gameplay</li>
                                        <li>No world resets</li>
                                        <li>24/7 uptime</li>
                                        <li>Anti-cheat protection</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="warning" role="alert">
                                ⚠️ This is an anarchy server - griefing and PvP are allowed! Play at your own risk.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tools -->
        <section id="tools" class="section dark" aria-labelledby="tools-heading">
            <div class="container">
                <h2 id="tools-heading">Tools I Use</h2>
                <div class="tool-grid">
                    <?php foreach($tools as $category => $items): ?>
                    <article class="tool-category">
                        <h3><?= escapeHtml($category) ?></h3>
                        <ul>
                            <?php foreach($items as $item): ?>
                            <li><?= escapeHtml($item) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Projects -->
        <section id="projects" class="section" aria-labelledby="projects-heading">
            <div class="container">
                <h2 id="projects-heading">Current Projects</h2>
                <div class="project-grid">
                    <?php foreach($projects as $project): ?>
                    <article class="project">
                        <h3><?= escapeHtml($project['title']) ?></h3>
                        <p><?= escapeHtml($project['description']) ?></p>
                        <div class="project-tech">
                            <?php foreach($project['tech'] as $tech): ?>
                            <span class="tech-tag"><?= escapeHtml($tech) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <div class="project-status">
                            <span class="status-badge status-<?= escapeHtml(strtolower($project['status'])) ?>">
                                <?= escapeHtml($project['status']) ?>
                            </span>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact" class="section dark" aria-labelledby="contact-heading">
            <div class="container">
                <h2 id="contact-heading">Get In Touch</h2>
                <div class="contact-grid">
                    <div class="social-section">
                        <h3>Follow Me</h3>
                        <div class="social-links">
                            <a href="<?= escapeHtml($social['youtube']) ?>" class="btn btn-yt" target="_blank" rel="noopener" aria-label="Follow on YouTube">YouTube</a>
                            <a href="<?= escapeHtml($social['twitch']) ?>" class="btn btn-tw" target="_blank" rel="noopener" aria-label="Follow on Twitch">Twitch</a>
                            <a href="<?= escapeHtml($social['bluesky']) ?>" class="btn btn-bs" target="_blank" rel="noopener" aria-label="Follow on Bluesky">Bluesky</a>
                            <a href="<?= escapeHtml($social['github']) ?>" class="btn btn-gh" target="_blank" rel="noopener" aria-label="View GitHub profile">GitHub</a>
                        </div>
                    </div>
                    <div class="support-section">
                        <h3>Support My Work</h3>
                        <p>If you enjoy my content and want to support what I do, consider buying me a coffee or just saying hi!</p>
                        <div class="social-links">
                            <a href="<?= escapeHtml($social['kofi']) ?>" class="btn btn-support" target="_blank" rel="noopener" aria-label="Support on Ko-fi">Ko-fi</a>
                            <a href="<?= escapeHtml($social['email']) ?>" class="btn btn-email" aria-label="Send email">Email Me</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer role="contentinfo">
        <div class="container">
            <p>&copy; <?= date('Y') ?> <?= escapeHtml($config['site']['name']) ?>. Built with love and Linux.</p>
            <p class="update">Last updated: <?= escapeHtml($config['now']['last_updated']) ?> • v<?= escapeHtml($config['site']['version']) ?></p>
        </div>
    </footer>

    <!-- Back to Top -->
    <button id="back-to-top" aria-label="Back to top" title="Back to top">↑</button>

    <!-- Scripts -->
    <script src="script.js"></script>
    
    <!-- Performance monitoring (remove in production) -->
    <script>
        if ('performance' in window) {
            window.addEventListener('load', () => {
                setTimeout(() => {
                    const timing = performance.timing;
                    const loadTime = timing.loadEventEnd - timing.navigationStart;
                    console.log(`🚀 Page loaded in ${loadTime}ms`);
                }, 0);
            });
        }
    </script>
</body>
</html>
