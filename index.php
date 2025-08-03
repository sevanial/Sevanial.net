<?php
// ====================================================================
// SEVANIAL.NET - ULTRA-LIGHTWEIGHT PERSONAL SITE
// Raspberry Pi 5 Optimized - 14KB Target
// ====================================================================

// 📢 QUICK UPDATE - Edit this to change your "Now" status
$now_status = "Working on server automation scripts and prepping for Friday's stream!";
$last_updated = "August 2nd, 2025";

// 🎮 MINECRAFT SERVER CONFIG
$minecraft = [
    'ip' => 'mc.sevanial.net',
    'version' => '1.21.6',
    'type' => 'Survival PvP Anarchy',
    'status' => 'Online' // Online, Offline, Maintenance
];

// 📋 DYNAMIC CARDS - Easy to edit
$cards = [
    ['title' => '🎥 Latest YouTube', 'text' => 'Linux gaming setup guide', 'link' => 'https://youtube.com/@sevanial', 'type' => 'yt'],
    ['title' => '📺 Twitch Streams', 'text' => 'Gaming & tech live streams', 'link' => 'https://twitch.tv/sevanial', 'type' => 'tw'],
    ['title' => '🧱 Minecraft Server', 'text' => 'Anarchy server - no rules!', 'link' => '#minecraft', 'type' => 'mc'],
    ['title' => '🔧 GitHub Projects', 'text' => 'Scripts and configurations', 'link' => 'https://github.com/sevanial', 'type' => 'gh'],
    ['title' => '🌐 Follow on Bluesky', 'text' => 'Real-time project updates', 'link' => 'https://bsky.app/profile/sevanial.bsky.social', 'type' => 'bs'],
    ['title' => '✉️ Contact Me', 'text' => 'Reach out or support my work', 'link' => '#contact', 'type' => 'ct']
];


// 📺 SOCIAL LINKS
$social = [
    'youtube' => 'https://youtube.com/@sevanial',
    'twitch' => 'https://twitch.tv/sevanial',
    'bluesky' => 'https://bsky.app/profile/sevanial.bsky.social',
    'github' => 'https://github.com/sevanial',
    'email' => 'mailto:sevanial@sevanial.net',
    'kofi' => 'https://ko-fi.com/sevanial'
];

// 🛠️ TOOLS I USE
$tools = [
    'Operating Systems' => ['Fedora', 'Ubuntu 24.04', 'Arch Linux (KDE)', 'Raspberry Pi OS'],
    'Gaming Platforms' => ['Steam + Proton (any)', 'PrismLauncher (Minecraft)', 'MangoHUD / GOverlay'],
    'Games & Servers' => ['Minecraft', 'Team Fortress 2', 'Local AI', 'Apache', 'Nginx'],
    'Network & Security' => ['UFW', 'iptables', 'firewalld', 'SSH', 'Cockpit'],
    'Editors & Code' => ['VS Code', 'Nano', 'GitHub', 'Python', 'MySQL', 'HTML/CSS'],
    'Scripting & Automation' => ['Bash', 'PHP', 'JavaScript', 'cron jobs', 'shell scripts', 'Python scripts'],
    'Content Creation' => ['OBS Studio (browser support)', 'GIMP', 'Krita', 'Blender', 'Audacity', 'Kdenlive'],
    'Platforms & AI Tools' => ['YouTube / Twitch', 'ChatGPT (ideas/text)', 'Claude (code assistance)']
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sevanial - Linux gamer, content creator, and self-hosting enthusiast">
    <title>Sevanial - Gaming, Tech & Self-Hosted Adventures</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="shortcut icon" href="/favicon.ico">


</head>
<body>
    <!-- Header -->
    <header id="header">
        <div class="container">
            <a href="#" class="logo">Sevanial</a>
            <nav>
                <button id="menu-btn">☰</button>
                <ul id="nav">
                    <li><a href="#now">Now</a></li>
                    <li><a href="#content">Content</a></li>
                    <li><a href="#minecraft">Minecraft</a></li>
                    <li><a href="#tools">Tools</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <button id="theme-btn" title="Toggle theme">🌙</button>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section class="hero">
        <div class="container">
            <h1>Hey, I'm Sevanial 👋</h1>
            <p class="intro">Linux gamer, content creator, and server host.<br>Building digital experiences and hosting epic Minecraft adventures.</p>
            <div class="hero-buttons">
                <a href="<?= $social['youtube'] ?>" class="btn btn-yt" target="_blank">YouTube</a>
                <a href="<?= $social['twitch'] ?>" class="btn btn-tw" target="_blank">Twitch</a>
                <a href="#minecraft" class="btn btn-mc">Minecraft</a>
            </div>
        </div>
    </section>

    <!-- Now Section -->
    <section id="now" class="section">
        <div class="container">
            <h2>What I'm Up To Now</h2>
            <div class="now-card">
                <p class="status"><?= htmlspecialchars($now_status) ?></p>
                <div class="meta">
                    <span>Updated: <?= htmlspecialchars($last_updated) ?></span>
                    <span class="live">🔴 Next stream: Friday 7PM CST</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Cards -->
    <section id="content" class="section dark">
        <div class="container">
            <h2>Latest & Featured</h2>
            <div class="cards">
               <?php foreach ($cards as $card): ?>
<div class="card">
    <h3><?= htmlspecialchars($card['title']) ?></h3>
    <p><?= htmlspecialchars($card['text']) ?></p>
    <a href="<?= htmlspecialchars($card['link']) ?>" 
       class="btn btn-<?= $card['type'] === 'ct' ? 'email' : $card['type'] ?>"
       <?= strpos($card['link'], 'http') === 0 ? 'target="_blank"' : '' ?>>
        <?php
            switch ($card['type']) {
                case 'yt': echo 'Watch →'; break;
                case 'tw': echo 'Watch Live →'; break;
                case 'mc': echo 'Join →'; break;
                case 'gh': echo 'View →'; break;
                case 'bs': echo 'Follow →'; break;
                case 'ct': echo 'Contact →'; break;
                default: echo 'View →'; break;
            }
        ?>
    </a>
</div>
<?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- Minecraft Server -->
    <section id="minecraft" class="section">
        <div class="container">
            <h2>Minecraft Anarchy Server</h2>
            <div class="server-box">
                <div class="server-main">
                    <div class="ip-section">
                        <label>Server IP:</label>
                        <code id="server-ip"><?= htmlspecialchars($minecraft['ip']) ?></code>
                        <button onclick="copyIP()" class="copy-btn" title="Copy IP">📋</button>
                    </div>
                    <div class="status">
                        <span class="dot <?= strtolower($minecraft['status']) ?>"></span>
                        <?= htmlspecialchars($minecraft['status']) ?>
                    </div>
                </div>
                <div class="server-info">
                    <span><strong>Version:</strong> <?= htmlspecialchars($minecraft['version']) ?></span>
                    <span><strong>Type:</strong> <?= htmlspecialchars($minecraft['type']) ?></span>
                </div>
                <div class="rules">
                    <button onclick="toggleRules()" id="rules-btn">Rules & Info ▼</button>
                    <div id="rules-panel" class="rules-panel">
                        <div class="rule-cols">
                            <div>
                                <h4>🚨 Rules</h4>
                                <ul>
                                    <li>No lag machines</li>
                                    <li>No doxxing/threats</li>
                                    <li>Everything else is fair game</li>
                                </ul>
                            </div>
                            <div>
                                <h4>⚔️ Features</h4>
                                <ul>
                                    <li>Full PvP anarchy</li>
                                    <li>/home, /tpa, /spawn</li>
                                    <li>Minimal restrictions</li>
                                </ul>
                            </div>
                        </div>
                        <p class="warning">⚠️ True anarchy - expect chaos and epic battles!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tools Section (New) -->
    <section id="tools" class="section dark">
        <div class="container">
            <h2>Tools I Use</h2>
            <p class="section-intro">The software and tech that powers my daily workflow and content creation.</p>
            <div class="tool-grid">
                <?php foreach ($tools as $category => $items): ?>
                <div class="tool-category">
                    <h3><?= htmlspecialchars($category) ?></h3>
                    <ul>
                        <?php foreach ($items as $tool): ?>
                        <li><?= htmlspecialchars($tool) ?></li>
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
            <h2>Projects & Tech</h2>
            <div class="project-grid">
                <div class="project">
                    <h3>🐧 Linux Gaming</h3>
                    <p>Steam + Proton tutorials, performance guides, and Ubuntu gaming setup content.</p>
                </div>
                <div class="project">
                    <h3>🏠 Self-Hosting</h3>
                    <p>Raspberry Pi servers, automated backups, and home lab configurations.</p>
                </div>
                <div class="project">
                    <h3>🤖 Automation</h3>
                    <p>Bash scripts, Python utilities, and AI-assisted development workflows.</p>
                </div>
            </div>
            <div class="project-action">
                <a href="<?= $social['github'] ?>" class="btn btn-gh" target="_blank">View on GitHub →</a>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="section dark">
        <div class="container">
            <h2>Connect & Support</h2>
            <div class="contact-grid">
                <div class="social-section">
                    <h3>Follow & Subscribe</h3>
                    <div class="social-links">
                        <a href="<?= $social['youtube'] ?>" class="btn btn-yt" target="_blank">YouTube</a>
                        <a href="<?= $social['twitch'] ?>" class="btn btn-tw" target="_blank">Twitch</a>
                        <a href="<?= $social['bluesky'] ?>" class="btn btn-bs" target="_blank">Bluesky</a>
                        <a href="<?= $social['email'] ?>" class="btn btn-email">Email</a>
                    </div>
                </div>
                <div class="support-section">
                    <h3>Support My Work</h3>
                    <p>Help keep the servers running and content coming!</p>
                    <a href="<?= $social['kofi'] ?>" class="btn btn-support" target="_blank">Support via Ko-fi</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; <?= date('Y') ?> Sevanial. Self-hosted on Raspberry Pi 5.</p>
            <p class="update">Last updated: <?= htmlspecialchars($last_updated) ?></p>
        </div>
    </footer>

    <!-- Back to Top -->
    <button id="back-to-top" title="Back to top">↑</button>

    <script src="script.js"></script>
</body>
</html>
