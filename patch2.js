const fs = require('fs');
const path = 'resources/views/projects/index.blade.php';
let content = fs.readFileSync(path, 'utf8');

// The replacement was too complex to match via regex let's use a simpler approach

// UI/UX replacements
content = content.replace(
    '<div class="glass-card" data-aos="fade-up" data-aos-delay="100">',
    '<a href="#" target="_blank" class="card-link" style="text-decoration: none; color: inherit;">\n            <div class="glass-card" data-aos="fade-up" data-aos-delay="100">'
);
content = content.replace(
    '<div class="glass-card" data-aos="fade-up" data-aos-delay="200">',
    '</a>\n            <a href="#" target="_blank" class="card-link" style="text-decoration: none; color: inherit;">\n            <div class="glass-card" data-aos="fade-up" data-aos-delay="200">'
);
content = content.replace(
    '<div class="glass-card" data-aos="fade-up" data-aos-delay="300">',
    '</a>\n            <a href="#" target="_blank" class="card-link" style="text-decoration: none; color: inherit;">\n            <div class="glass-card" data-aos="fade-up" data-aos-delay="300">'
);
content = content.replace(
    '<div class="see-more-container" data-aos="fade-up">\n            <button class="see-more-btn" onclick="loadMore(\'design\')">',
    '</a>\n        </div>\n        <div class="see-more-container" data-aos="fade-up">\n            <button class="see-more-btn" onclick="loadMore(\'design\')">'
);

// Video replacements
content = content.replace(
    '<div class="glass-card video-card" data-aos="fade-up" data-aos-delay="100" onclick="playVideo(\'TikTok Compilation\')">',
    '<a href="#" target="_blank" class="card-link" style="text-decoration: none; color: inherit;">\n            <div class="glass-card video-card" data-aos="fade-up" data-aos-delay="100">'
);
content = content.replace(
    '<div class="glass-card video-card" data-aos="fade-up" data-aos-delay="200" onclick="playVideo(\'K-Pop MV Edit\')">',
    '</a>\n            <a href="#" target="_blank" class="card-link" style="text-decoration: none; color: inherit;">\n            <div class="glass-card video-card" data-aos="fade-up" data-aos-delay="200">'
);
content = content.replace(
    '<div class="glass-card video-card" data-aos="fade-up" data-aos-delay="300" onclick="playVideo(\'Creative Content\')">',
    '</a>\n            <a href="#" target="_blank" class="card-link" style="text-decoration: none; color: inherit;">\n            <div class="glass-card video-card" data-aos="fade-up" data-aos-delay="300">'
);
content = content.replace(
    '<div class="see-more-container" data-aos="fade-up">\n            <button class="see-more-btn" onclick="loadMore(\'video\')">',
    '</a>\n        </div>\n        <div class="see-more-container" data-aos="fade-up">\n            <button class="see-more-btn" onclick="loadMore(\'video\')">'
);


// Clean up duplicate closing </div> tags introduced by replacing container limits
content = content.replace(
    /<\/a>\n        <\/div>\n        <div class="see-more-container/g,
    '</a>\n        <div class="see-more-container'
);

fs.writeFileSync(path, content, 'utf8');
