const fs = require('fs');
const path = 'resources/views/projects/index.blade.php';
let content = fs.readFileSync(path, 'utf8');

// Wrap UI/UX Design cards
content = content.replace(
    /<div class="glass-card" data-aos="fade-up" data-aos-delay="100">\s*<img src="assets\/hubber\.png"/,
    '<a href="https://example.com/project1" target="_blank" class="card-link" style="text-decoration: none;">\n            <div class="glass-card" data-aos="fade-up" data-aos-delay="100">\n                <img src="assets/hubber.png"'
).replace(
    /<div class="glass-card" data-aos="fade-up" data-aos-delay="200">\s*<img src="https:\/\/picsum\.photos\/seed\/figma2\/400\/250"/,
    '</div>\n            </a>\n            <a href="https://example.com/project2" target="_blank" class="card-link" style="text-decoration: none;">\n            <div class="glass-card" data-aos="fade-up" data-aos-delay="200">\n                <img src="https://picsum.photos/seed/figma2/400/250"'
).replace(
    /<div class="glass-card" data-aos="fade-up" data-aos-delay="300">\s*<img src="https:\/\/picsum\.photos\/seed\/figma3\/400\/250"/,
    '</div>\n            </a>\n            <a href="https://example.com/project3" target="_blank" class="card-link" style="text-decoration: none;">\n            <div class="glass-card" data-aos="fade-up" data-aos-delay="300">\n                <img src="https://picsum.photos/seed/figma3/400/250"'
);

// Close the last UI/UX card
content = content.replace(
    /<\/div>\s*<\/div>\s*<div class="see-more-container"/,
    '</div>\n                </div>\n            </a>\n        </div>\n        <div class="see-more-container"'
);


// Wrap Video cards
content = content.replace(
    /<div class="glass-card video-card" data-aos="fade-up" data-aos-delay="100" onclick="playVideo\('TikTok Compilation'\)">/,
    '<a href="https://example.com/video1" target="_blank" class="card-link" style="text-decoration: none;">\n            <div class="glass-card video-card" data-aos="fade-up" data-aos-delay="100">'
).replace(
    /<div class="glass-card video-card" data-aos="fade-up" data-aos-delay="200" onclick="playVideo\('K-Pop MV Edit'\)">/,
    '</div>\n            </a>\n            <a href="https://example.com/video2" target="_blank" class="card-link" style="text-decoration: none;">\n            <div class="glass-card video-card" data-aos="fade-up" data-aos-delay="200">'
).replace(
    /<div class="glass-card video-card" data-aos="fade-up" data-aos-delay="300" onclick="playVideo\('Creative Content'\)">/,
    '</div>\n            </a>\n            <a href="https://example.com/video3" target="_blank" class="card-link" style="text-decoration: none;">\n            <div class="glass-card video-card" data-aos="fade-up" data-aos-delay="300">'
);

// Close the last Video card
content = content.replace(
    /<\/div>\s*<\/div>\s*<div class="see-more-container"/,
    '</div>\n                </div>\n            </a>\n        </div>\n        <div class="see-more-container"'
);


fs.writeFileSync(path, content, 'utf8');
