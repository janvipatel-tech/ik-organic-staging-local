<nav class="container nav-container">
      <div class="logo">
      <?php
    $page_name = get_post_field('post_name', get_post()); // Get the current page name

    if ($page_name === 'big-tech-results' || $page_name === 'big-tech-road-map') {
        // Show the Big Tech Road Map logo and link
        ?>
        <a href="/big-tech/">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/bigtechroadmap.svg" alt="Big Tech Road Map Logo" />
        </a>
        <?php
    } else {
        // Show the default AI Salary Analyzer logo and link
        ?>
        <a href="/ai-salary-analyzer">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/SalaryScopeLogoDarkTheme.svg" alt="AI Salary Analyzer Logo" />
        </a>
        <?php
    }
    ?>
      </div>
      <div class="nav-content">
        <p class="nav-text">
          Learn in-demand AI/ML skills and stay ahead in today's changing tech
          landscape.
        </p>
        <button class="btn btn-primary">Connect with FAANG Expert</button>
      </div>
    </nav>
<section class="container shimmer-wrapper">
      <!-- Shimmer Loading Status and Progress Bar -->
      <div class="shimmer-status-card">
        <div class="shimmer-status-text">
          <h4>Thank you, we're working on your Analysis</h4>
          <p>
            <span>Did you know</span> - AI will impact 40% of global jobs by
            2030. Demand for AI skills has grown4× faster than overall tech
            roles.
          </p>
        </div>
        <canvas
          id="shimmerProgressBar"
          class="shimmer-loading-bar"
          width="80"
          height="80"
        ></canvas>
      </div>

      <!-- Shimmer Loading Content Container -->
      <div class="shimmer-content-container">
        <div class="shimmer-section-title title-one"></div>
        <div class="shimmer-dashboard-grid">
          <!-- Salary Graph Card -->
          <div class="shimmer-card salary-graph-card">
            <div class="shimmer-graph-wrapper">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/Graph1.webp" alt="Salary Graph" />
              <div class="shimmer-text-lines">
                <div class="shimmer-line"></div>
                <div class="shimmer-line"></div>
                <div class="shimmer-line"></div>
                <div class="shimmer-line"></div>
              </div>
            </div>
            <div class="shimmer-salary-ranges">
              <h4>Salary ranges for similar roles</h4>
              <div class="shimmer-range-item">
                <div class="shimmer-line"></div>
              </div>
              <div class="shimmer-range-item">
                <div class="shimmer-line"></div>
              </div>
              <div class="shimmer-range-item">
                <div class="shimmer-line"></div>
              </div>
            </div>
          </div>

          <!-- Industry Standards Card -->
          <div class="shimmer-card industry-standards-card">
            <h3>Current Salary vs. Industry Standards</h3>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/Graph2.svg" alt="Industry Standards Graph" />
          </div>

          <!-- Trends Analysis Card -->
          <div class="shimmer-trends-container">
            <div class="shimmer-card trends-graph-card">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/Graph3.png" alt="Trends Graph" />
              <div class="shimmer-text-lines">
                <div class="shimmer-line"></div>
                <div class="shimmer-line"></div>
                <div class="shimmer-line"></div>
                <div class="shimmer-line"></div>
              </div>
            </div>
            <div class="shimmer-card trends-highlight-card">
              <div class="shimmer-text-lines">
                <div class="shimmer-line"></div>
                <div class="shimmer-line"></div>
                <div class="shimmer-line"></div>
              </div>
              <div class="shimmer-btn-container">
                <div class="shimmer-btn"></div>
                <div class="shimmer-btn"></div>
                <div class="shimmer-btn"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- part tow -->
      <div class="shimmer-content-part2">
        <div class="shimmer-section-title title-two"></div>
        <div class="shimmer-dashboard-grid-two">
          <div class="shimmer-card-layout">
            <div class="shimmer-card card-lauyot1">
              <div class="card-layout1-content">
                <div class="card-layout1-content-left">
                  <div class="shimmer-line w-84"></div>
                  <div class="shimmer-line w-200"></div>
                </div>
                <div class="card-layout1-content-right">
                  <div>
                    <div class="circle orange-circle"></div>
                    <div class="shimmer-line"></div>
                  </div>
                  <div>
                    <div class="circle blue-circle"></div>
                    <div class="shimmer-line"></div>
                  </div>
                </div>
              </div>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/Graph4.png" alt="Graph3" />
            </div>
            <div class="card-layout2">
              <div>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/Graph5.png" alt="Graph5" />
                <div class="shimmer-line-container">
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                </div>
              </div>
              <div>
                <div class="shimmer-line-container">
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                </div>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/Graph5.png" alt="Graph6" />
              </div>
            </div>
          </div>
          <div class="shimmer-card card-layout-two">
            <div class="card-layout-two-content">
              <div class="shimmer-line w-500"></div>
              <div class="arrow-container">
                <div class="shimmer-line w-600"></div>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/arrow.png" alt="Arrow" />
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="shimmer-content-part2">
        <div class="shimmer-section-title w-200"></div>
        <div class="shimmer-dashboard-grid-two">
          <div class="shimmer-card-layout">
            <div class="shimmer-card card-lauyot1">
              <div class="card-layout1-content">
                <div class="card-layout1-content-left">
                  <div class="shimmer-line w-84"></div>
                  <div class="shimmer-line w-200"></div>
                </div>
                <div class="card-layout1-content-right"></div>
              </div>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/Graph4.png" alt="Graph3" />
            </div>
            <div class="shimmer-card card-layout3">
              <div class="shimmer-card-layout3-content">
                <div class="w-400 shimmer-line"></div>
                <div class="w-400 shimmer-line"></div>
              </div>
              <h2>$xx - $xx</h2>
              <div class="custom-graph-container">
                <div class="color-blue1"></div>
                <div class="color-blue2"></div>
                <div class="color-blue3"></div>
                <div class="color-blue4"></div>
              </div>
              <div class="shimmer-line-container2">
                <div class="shimmer-line"></div>
                <div class="shimmer-line"></div>
                <div class="shimmer-line"></div>
                <div class="shimmer-line"></div>
              </div>
            </div>
          </div>
          <div class="card-layout-3">
            <div class="shimmer-line h-20 w-200"></div>
            <div class="learning-card-container">
              <div class="learning-card">
                <div class="image-placeholder">
                  <svg
                    class="external-link-icon"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path d="M7 17L17 7"></path>
                    <path d="M7 7h10v10"></path>
                  </svg>
                </div>

                <div class="shimmer-text-lines">
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                </div>

                <div class="stats-badge">
                  <span class="stats-text"
                    >Learners got avg xx% salary hike</span
                  >
                </div>
              </div>
              <div class="learning-card">
                <div class="image-placeholder">
                  <svg
                    class="external-link-icon"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path d="M7 17L17 7"></path>
                    <path d="M7 7h10v10"></path>
                  </svg>
                </div>

                <div class="shimmer-text-lines">
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                </div>

                <div class="stats-badge">
                  <span class="stats-text"
                    >Learners got avg xx% salary hike</span
                  >
                </div>
              </div>
              <div class="learning-card">
                <div class="image-placeholder">
                  <svg
                    class="external-link-icon"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path d="M7 17L17 7"></path>
                    <path d="M7 7h10v10"></path>
                  </svg>
                </div>

                <div class="shimmer-text-lines">
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                </div>

                <div class="stats-badge">
                  <span class="stats-text"
                    >Learners got avg xx% salary hike</span
                  >
                </div>
              </div>
              <div class="more-learning-card">
                <div>
                  <div class="shimmer-line align-center w-200"></div>
                  <div class="shimmer-text-lines">
                    <div class="shimmer-line"></div>
                    <div class="shimmer-line"></div>
                  </div>
                </div>
                <button class="btn shimmer-btn learning-btn"></button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="shimmer-content-part2">
        <div class="shimmer-section-title w-200"></div>
        <div class="shimmer-dashboard-grid-two">
          <div class="shimmer-card-layout">
            <div class="shimmer-card card-lauyot1">
              <div class="card-layout1-content">
                <div class="card-layout1-content-left">
                  <div class="shimmer-line w-84"></div>
                  <div class="shimmer-line w-200"></div>
                </div>
                <div class="card-layout1-content-right"></div>
              </div>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/Graph4.png" alt="Graph3" />
            </div>
            <div class="card-layout4">
              <div>
                <h2>xx%</h2>
                <div class="shimmer-text-lines">
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                </div>
              </div>
              <div>
                <h2>$xx M</h2>
                <div class="shimmer-text-lines">
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                </div>
              </div>
              <div>
                <h2>xx</h2>
                <div class="shimmer-text-lines">
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                </div>
              </div>
              <div>
                <h2>$xxxx</h2>
                <div class="shimmer-text-lines">
                  <div class="shimmer-line"></div>
                  <div class="shimmer-line"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="discover-container">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/discovery.webp" alt="" />
        <div class="discover-content">
          <h1>Discover What Your Skills & Experience Are Worth.</h1>
          <p>
            Don't miss out on this opportunity to truly understand where you
            stand and what you need to do to turbocharge your career.
          </p>
          <button class="btn btn-primary discover-btn lazyloaded">
              <a href="/?utm_source=L10_pagex&utm_campaign=L10x_Salary_Analyser" target="_blank">
                  Unlock Your Salary Potential Now
              </a>
          </button>
        </div>
      </div>
      
      <!-- Footer Section -->
     <section class="container footer-container">
      <?php
    $page_name = get_post_field('post_name', get_post()); // Get the current page name

    if ($page_name === 'big-tech-results' || $page_name === 'big-tech-road-map') {
        // Show the Big Tech Road Map logo and link
        ?>
        <a href="/big-tech">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/bigtechroadmap.svg" alt="Big Tech Road Map Logo" />
        </a>
        <?php
    } else {
        // Show the default AI Salary Analyzer logo and link
        ?>
        <a href="/ai-salary-analyzer">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/SalaryScopeLogoDarkTheme.svg" alt="AI Salary Analyzer Logo" />
        </a>
        <?php
    }
    ?>
      </section>
    </section>