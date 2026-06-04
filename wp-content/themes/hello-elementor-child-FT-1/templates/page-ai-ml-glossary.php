<?php
/* Template Name: AI & ML Glossary */
get_header(); ?>
<style>
/* =========================
   GLOBAL
========================= */
.glossary-container {
    max-width: 1610px;
    margin: auto;
    padding: 40px 20px;
}

section {
    margin-bottom: 80px;
}

h1, h2, h3 {
    font-weight: 600;
}

p {
    line-height: 1.6;
}

/* =========================
   HERO
========================= */
.glossary-hero {
    text-align: center;
    background: url("/wp-content/uploads/2026/02/ai-ml-banner.webp") left/cover no-repeat;
    border-radius: 12px;
    padding: 36px 32px;
}

.glossary-hero h1 {
    font-size: 2.8em;
    color: #0A3483;
    margin-bottom: 15px;
}

.glossary-hero p {
    font-size: 1.1em;
    color: #0A3483;
    font-weight: 600;
}

/* =========================
   SEARCH
========================= */
.search-box {
    max-width: 50%;
    margin: 30px auto 0;
    position: relative;
}

.search-box input {
    width: 100%;
    padding: 14px 42px 14px 16px;
    border-radius: 8px;
    border: none;
    background: #FAFDFF;
}

.search-icon {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
}

/* =========================
   SECTION HEADERS
========================= */
.section-header {
    text-align: center;
    margin-bottom: 50px;
}

.section-header h2 {
    font-size: 2.2em;
    color: #101828;
    margin-bottom: 15px;
}

.section-header p {
    font-size: 1.1em;
    color: #667085;
}

/* =========================
   ALPHABET NAV
========================= */
.alphabet-nav {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 12px;
    padding-bottom: 30px;
    border-bottom: 2px solid #f5f5f5;
}

.alphabet-nav button {
    min-width: 43px;
    height: 49px;
    background: #FAFDFF;
    border-radius: 4px;
    font-weight: 600;
    color: #667085;
    cursor: pointer;
    border: 1px solid transparent;
    box-shadow: 0 1px 2px #1018280F;
    transition: 0.3s;
}

.alphabet-nav button:hover,
.alphabet-nav button.active {
    border-color: #49A9F8;
}

/* =========================
   GRIDS
========================= */
.category-grid,
.terms-grid {
    display: grid;
    gap: 25px;
}

.category-grid {
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
}

.terms-grid {
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
}

/* =========================
   CATEGORY CARDS
========================= */
.category-card {
    padding: 20px 24px;
    cursor: pointer;
}

.category-card h3 {
    font-size: 1.3em;
    font-weight: 700;
    color: #061D48;
    margin-bottom: 15px;
}

.category-card p {
    font-size: 0.95em;
    color: #1D2939;
}

/* Backgrounds */
.category-card[data-category="foundations"] {
    background: url('/wp-content/uploads/2026/02/yellow-gradient-bg.webp');
}
.category-card[data-category="generative"] {
    background: url('/wp-content/uploads/2026/02/green-gradient-bg.webp');
}
.category-card[data-category="systems"] {
    background: url('/wp-content/uploads/2026/02/purple-gradient-bg.webp');
}
.category-card[data-category="ml-data"] {
    background: url('/wp-content/uploads/2026/02/red-gradient-bg.webp');
}

/* =========================
   TERM CARDS
========================= */
.term-card {
    background: #fff;
    border: 1px solid #f5f5f5;
    border-radius: 8px;
    padding: 25px;
    transition: 0.3s;
}

.term-card:hover {
    border-color: #C7E4FD;
    box-shadow: 0 1px 3px #1018281A;
}

.term-title {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    align-items: start;
}

.term-card h3 {
    font-size: 1.3em;
    color: #3A3D42;
    margin: 0;
}

.description {
    font-size: 0.95em;
    color: #667085;
    margin-bottom: 15px;
}

.meta {
    font-size: 0.75em;
    color: #667085;
    padding-top: 15px;
}

/* Badges */
.term-badge {
    padding: 4px 12px;
    border-radius: 8px;
    font-size: 0.75em;
    font-weight: 600;
    height: fit-content;
}

.term-badge.hot {
    background: #FEF0C7;
    color: #F79009;
}

.term-badge.featured {
    background: #e8f5e9;
    color: #2e7d32;
}

/* =========================
   BUTTONS
========================= */
.view-full-btn {
    text-align: center;
    margin-top: 50px;
}

.view-full-btn button,
.hero-btn {
    border-radius: 8px;
    font-weight: 600;
    transition: 0.3s;
    cursor: pointer;
}

.view-full-btn button {
    background: #49A9F8;
    color: #fff;
    padding: 12px 20px;
    border: none;
}

.view-full-btn button:hover {
    background: #1e88e5;
    transform: translateY(-2px);
}

/* =========================
   CTA HERO
========================= */
.hero-container {
    max-width: 1600px;
    margin: auto;
    background: url('/wp-content/uploads/2026/02/blue-banner-bg.webp') center/cover;
    border-radius: 16px;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hero-content {
    width: 50%;
    padding: 48px 56px;
    color: #fff;
}

.hero-content h3 {
    font-size: 2.3rem;
    font-weight: 700;
}

.hero-content p {
    font-size: 18px;
    margin-bottom: 28px;
}

.hero-btn {
    background: #fff;
    color: #2f80ed;
    padding: 14px 26px;
    display: inline-block;
}

.hero-btn:hover {
    background: #f2f6ff;
}

.hero-image {
    width: 50%;
}

/* =========================
   STATES
========================= */
.no-results,
.loading {
    text-align: center;
    padding: 40px;
    color: #757575;
}

/* =========================
   RESPONSIVE
========================= */
@media (max-width: 1024px) {
    .hero-container {
        flex-direction: column;
        text-align: center;
        padding: 50px 30px;
    }

    .hero-content,
    .hero-image {
        width: 100%;
    }
}

@media (max-width: 768px) {
    .glossary-hero h1 {
        font-size: 2em;
    }

    .search-box {
        max-width: 100%;
    }

    .alphabet-nav {
        gap: 6px;
    }

    .alphabet-nav button {
        min-width: 35px;
        height: 35px;
        font-size: 0.9em;
    }

    .category-grid,
    .terms-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<main class="glossary-container">
    <!-------------------------------------------------------------------------------------------------------------- Section-1 - HERO SECTION -->
    <section class="glossary-hero">
        <h1>AI & ML Tech Glossary</h1>
        <p>Clear definitions of 500+ AI, ML, and systems terms, built for professionals.</p>

        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Search any term or word">
            <span class="search-icon"><img src="/wp-content/uploads/2026/02/search-icon.webp" alt="search-icon" /></span>
        </div>
    </section>

    <!-------------------------------------------------------------------------------------------------------------- Section-2 - ALPHABET NAVIGATION -->
    <section class="alphabet-section">
        <div class="alphabet-nav" id="alphabetNav">
            <?php foreach (range('A', 'Z') as $letter) : ?>
                <button class="alphabet-btn" data-letter="<?php echo $letter; ?>">
                    <?php echo $letter; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </section>

    <!-------------------------------------------------------------------------------------------------------------- Section-3 - WHAT YOU'LL FIND -->
    <section class="glossary-categories">
        <div class="section-header">
            <h2>What You'll Find in This Glossary</h2>
            <p>Get the latest and most used terms in AI/ML and never miss any reference</p>
        </div>

        <div class="category-grid">
                <div class="category-card" data-category="foundations">
                    <div class="category-icon"><img src="/wp-content/uploads/2026/02/ai-foundation.webp" alt="ai-foundation" width="56"/></div>
                    <h3>AI Foundations</h3>
                    <p>Core concepts that explain how modern AI systems work. And learn essential terms around models</p>
                </div>

                <div class="category-card" data-category="generative">
                    <div class="category-icon"><img src="/wp-content/uploads/2026/02/generative-ai.webp" alt="generative-ai" width="56"/></div>
                    <h3>Generative & Agentic AI</h3>
                    <p>Terms covering generative models, autonomous agents, and AI workflows.</p>
                </div>

                <div class="category-card" data-category="systems">
                    <div class="category-icon"><img src="/wp-content/uploads/2026/02/ai-systems.webp" alt="ai-systems" width="56"/></div>
                    <h3>AI Systems & Infrastructure</h3>
                    <p>Concepts related to deploying, scaling, and operating AI systems. Includes tooling, architectures</p>
                </div>

                <div class="category-card" data-category="ml-data">
                    <div class="category-icon"><img src="/wp-content/uploads/2026/02/machine-learning.webp" alt="machine-learning" width="56"/></div>
                    <h3>Machine Learning & Data</h3>
                    <p>Key terminology across supervised, unsupervised, and applied ML. Covers data pipelines, features.</p>
                </div>
        </div>
    </section>

    <!-------------------------------------------------------------------------------------------------------------- Section-4 - POPULAR TERMS -->
    <section class="popular-terms">
        <div class="section-header">
            <h2>Popular Terms</h2>
            <p>Get the latest and most used terms in AI/ML and never miss any reference</p>
        </div>

        <div class="terms-grid">
            <?php
            $args = [
                'post_type'      => 'ai-glossary',
                'posts_per_page' => 8,
                'post_status'    => 'publish',
            ];

            $glossary_query = new WP_Query($args);

            if ($glossary_query->have_posts()) :
                while ($glossary_query->have_posts()) :
                    $glossary_query->the_post();

                    $title       = get_the_title();
                    $permalink   = get_permalink();
                    $description = wp_trim_words(get_the_excerpt(), 25, '...');
                    $badge       = get_field('badge_type');
                    $writer_name = get_field('writer_name') ?: get_the_author();
                    $date        = get_the_date('F Y');
            ?>
                    <a href="<?php echo esc_url($permalink); ?>" class="term-card-link">
                        <div class="term-card">
                            <div class="term-title">
                                <h3><?php echo esc_html($title); ?></h3>

                                <?php if ($badge === 'hot') : ?>
                                    <span class="term-badge hot">Hot</span>
                                <?php elseif ($badge === 'featured') : ?>
                                    <span class="term-badge featured">Featured</span>
                                <?php endif; ?>
                            </div>

                            <p class="description">
                                <?php echo esc_html($description); ?>
                            </p>

                            <div class="meta">
                                Posted on <?php echo esc_html($date); ?> ·
                                By <?php echo esc_html($writer_name); ?>
                            </div>
                        </div>
                    </a>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="no-results">No terms found.</div>
            <?php endif; ?>
        </div>


        <div class="view-full-btn">
            <button id="viewFullBtn">View Full Glossary</button>
        </div>
    </section>

    <!-------------------------------------------------------------------------------------------------------------- Section-5 -  ELEMENTOR SECTION -->
    <section class="glossary-elementor">
        <?php echo do_shortcode('[elementor-template id="51567"]'); ?>
    </section>

    <!-------------------------------------------------------------------------------------------------------------- Section-6 -  CTA / HERO BANNER -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h3>Go from concepts to career application</h3>
                <p>Join a free live session on applying AI concepts in real interviews</p>
                <a href="#" class="hero-btn">Explore free webinar</a>
            </div>

            <div class="hero-image">
                <img src="/wp-content/uploads/2026/02/team-img.webp" alt="Professionals">
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>