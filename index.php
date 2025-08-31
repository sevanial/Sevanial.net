<?php
// Performance optimizations
ob_start('ob_gzhandler');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');

// Quick config - Edit these
$now_status = "Uploaded new video to YouTube";
$last_updated = "August 25nd, 2025";
$next_stream = "Friday 7PM CST";
$stream_topic = "Marvel's Spider-Man Remastered";

// Minecraft server
$mc = [
    'ip' => 'mc.sevanial.net',
    'version' => '1.21.7',
    'type' => 'Survival PvP Anarchy',
    'status' => 'Online',
];

// Cards
$cards = [
    ['title' => '🎥 Latest YouTube', 'text' => 'Linux gaming setup guide with performance tips', 'link' => 'https://youtube.com/@sevanial', 'type' => 'yt', 'badge' => 'New'],
    ['title' => '📺 Twitch Streams', 'text' => 'Gaming & tech live streams every Friday', 'link' => 'https://twitch.tv/sevanial', 'type' => 'tw', 'badge' => 'Live Soon'],
    ['title' => '🧱 Minecraft Server', 'text' => 'Anarchy server - no rules, pure chaos!', 'link' => '#minecraft', 'type' => 'mc', 'badge' => 'Online'],
    ['title' => '🔧 GitHub Projects', 'text' => 'Scripts, configs, and open-source tools', 'link' => 'https://github.com/sevanial', 'type' => 'gh', 'badge' => 'Updated'],
    ['title' => '🌀 Follow on Bluesky', 'text' => 'Real-time project updates and tech thoughts', 'link' => 'https://bsky.app/profile/sevanial.bsky.social', 'type' => 'bs', 'badge' => 'Active'],
    ['title' => '✉️ Contact Me', 'text' => 'Reach out for collabs or support my work', 'link' => '#contact', 'type' => 'ct', 'badge' => 'Open']
];

// Social links
$social = [
    'youtube' => 'https://youtube.com/@sevanial',
    'twitch' => 'https://twitch.tv/sevanial',
    'bluesky' => 'https://bsky.app/profile/sevanial.bsky.social',
    'github' => 'https://github.com/sevanial',
    'email' => 'mailto:sevanial@sevanial.net',
    'kofi' => 'https://ko-fi.com/sevanial'
];

// Tools
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

// Projects
$projects = [
    ['title' => '🎮 Game Servers', 'description' => 'Minecraft anarchy hosting, TF2 configs, and experimenting with mods/datapacks for enhanced gameplay.', 'tech' => ['Java', 'Paper/Spigot', 'Linux'], 'status' => 'Active'],
    ['title' => '🎨 Digital Art & 3D', 'description' => 'Blender 3D modeling, Krita illustrations, and GIMP/Inkscape designs for content and personal projects.', 'tech' => ['Blender', 'Krita', 'GIMP'], 'status' => 'Ongoing'],
    ['title' => '🔒 Networking & Security', 'description' => 'Learning system hardening with UFW/firewalld, testing VPNs, and exploring FreeIPA for identity management.', 'tech' => ['Linux', 'WireGuard', 'FreeIPA'], 'status' => 'Learning'],
    ['title' => '📹 Content Creation', 'description' => 'Streaming to YouTube & Twitch, Linux gaming tutorials, and editing with OBS/Kdenlive.', 'tech' => ['OBS', 'Kdenlive', 'Linux'], 'status' => 'Active']
];
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sevanial - Linux Gaming & Content Creator</title>
    <meta name="description" content="Linux gamer, content creator, and self-hosting enthusiast. YouTube/Twitch streams, Minecraft server, and open-source projects.">
    <meta name="keywords" content="linux gaming, content creator, minecraft server, open source, streaming">
    <link rel="canonical" href="https://sevanial.net">
    <link rel="stylesheet" href="styles.css">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">


    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Sevanial",
        "url": "https://sevanial.net",
        "description": "Linux gamer, content creator, and self-hosting enthusiast",
        "sameAs": ["<?= implode('","', $social) ?>"]
    }
    </script>
</head>
<body>
    <!-- Header -->
    <header id="header">
        <div class="container">
            <a href="#home" class="logo">Sevanial</a>
            <nav>
                <button id="menu-btn" aria-expanded="false" aria-label="Menu">☰</button>
                <ul id="nav">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#now">Now</a></li>
                    <li><a href="#minecraft">Minecraft</a></li>
                    <li><a href="#tools">Tools</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <button id="theme-btn" aria-label="Toggle theme">🌙</button>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section id="home" class="hero">
        <div class="container">
            <h1>Sevanial</h1>
            <p class="intro">Linux gamer, content creator, and self-hosting enthusiast. Building cool projects, streaming games, and sharing knowledge.</p>
            <div class="hero-buttons">
                <a href="<?= $social['youtube'] ?>" class="btn btn-yt" target="_blank">🎥 YouTube</a>
                <a href="<?= $social['twitch'] ?>" class="btn btn-tw" target="_blank">📺 Twitch</a>
                <a href="#minecraft" class="btn btn-mc">🧱 Minecraft</a>
                <a href="<?= $social['github'] ?>" class="btn btn-gh" target="_blank">🔧 GitHub</a>
                <a href="<?= $social['bluesky'] ?>" class="btn btn-bs" target="_blank">🌀 Bluesky</a>
                <a href="<?= $social['kofi'] ?>" class="btn btn-support" target="_blank">💖 Support</a>
            </div>
        </div>
    </section>

    <!-- Quick Links -->
    <section class="section">
        <div class="container">
            <h2>Quick Links</h2>
            <div class="cards">
                <?php foreach($cards as $card): ?>
                <div class="card">
                    <div class="card-badge card-badge-<?= $card['type'] ?>"><?= $card['badge'] ?></div>
                    <h3><?= $card['title'] ?></h3>
                    <p><?= $card['text'] ?></p>
                    <a href="<?= $card['link'] ?>" class="btn btn-<?= $card['type'] ?>"<?= strpos($card['link'], 'http') === 0 ? ' target="_blank"' : '' ?>>Visit</a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Now -->
    <section id="now" class="section dark">
        <div class="container">
            <h2>What I'm Up To</h2>
            <div class="now-card">
                <div class="status"><?= $now_status ?></div>
                <div class="meta">
                    <span>Updated: <?= $last_updated ?></span>
                    <div class="live">
                        <span class="dot online"></span>
                        Next Stream: <?= $next_stream ?> - <?= $stream_topic ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
    </section>

    <!-- Minecraft Server -->
    <section id="minecraft" class="section">
        <div class="container">
            <h2>🧱 Minecraft Server</h2>
            <div class="server-box">
                <div class="server-main">
                    <div class="ip-section">
                        <label>Server IP:</label>
                        <code id="server-ip"><?= $mc['ip'] ?></code>
                        <button class="copy-btn" onclick="copyIP()" aria-label="Copy server IP">Copy</button>
                    </div>
                    <div class="status">
                        <span class="dot <?= strtolower($mc['status']) ?>"></span>
                        <?= $mc['status'] ?>
                    </div>
                </div>
                
                <div class="server-info">
                    <span>Version: <?= $mc['version'] ?></span>
                    <span>Type: <?= $mc['type'] ?></span>
                </div>

                <div class="rules">
                    <button id="rules-btn" onclick="toggleRules()" aria-expanded="false">Rules & Info ▼</button>
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
                        <div class="warning">
                            ⚠️ This is an anarchy server - griefing and PvP are allowed! Play at your own risk.
                        </div>
                    </div>
                </div>
            </div>
</section>

    <!-- Tools -->
    <section id="tools" class="section dark">
        <div class="container">
            <h2>Tools I Use</h2>
            <div class="tool-grid">
                <?php foreach($tools as $category => $items): ?>
                <div class="tool-category">
                    <h3><?= $category ?></h3>
                    <ul>
                        <?php foreach($items as $item): ?>
                        <li><?= $item ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Projects -->
    <section id="projects" class="section">
        <div class="container">
            <h2>Current Projects</h2>
            <div class="project-grid">
                <?php foreach($projects as $project): ?>
                <div class="project">
                    <h3><?= $project['title'] ?></h3>
                    <p><?= $project['description'] ?></p>
                    <div class="project-tech">
                        <?php foreach($project['tech'] as $tech): ?>
                        <span class="tech-tag"><?= $tech ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="project-status">
                        <span class="status-badge status-<?= strtolower($project['status']) ?>"><?= $project['status'] ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="section dark">
        <div class="container">
            <h2>Get In Touch</h2>
            <div class="contact-grid">
                <div class="social-section">
                    <h3>Follow Me</h3>
                    <div class="social-links">
                        <a href="<?= $social['youtube'] ?>" class="btn btn-yt" target="_blank">YouTube</a>
                        <a href="<?= $social['twitch'] ?>" class="btn btn-tw" target="_blank">Twitch</a>
                        <a href="<?= $social['bluesky'] ?>" class="btn btn-bs" target="_blank">Bluesky</a>
                        <a href="<?= $social['github'] ?>" class="btn btn-gh" target="_blank">GitHub</a>
                    </div>
                </div>
                <div class="support-section">
                    <h3>Support My Work</h3>
                    <p>If you enjoy my content and want to support what I do, consider buying me a coffee or just saying hi!</p>
                    <a href="<?= $social['kofi'] ?>" class="btn btn-support" target="_blank">Ko-fi</a>
                    <a href="<?= $social['email'] ?>" class="btn btn-email">Email Me</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2025 Sevanial. Built with love and Linux.</p>
            <p class="update">Last updated: <?= $last_updated ?></p>
        </div>
    </footer>

    <!-- Back to Top -->
    <button id="back-to-top" aria-label="Back to top">↑</button>

    <script src="script.js"></script>
</body>
</html>
