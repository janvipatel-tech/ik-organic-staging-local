<?php
/* 
Template Name: Big Tech Result
*/

// Enqueue the CSS and JS for the results page
function enqueue_big_tech_result_assets() {
    wp_enqueue_style('big-tech-landing-css', get_stylesheet_directory_uri() . '/big-tech-landing.css', array(), '1.0.0');
    wp_enqueue_script('big-tech-result-js', get_stylesheet_directory_uri() . '/big-tech-result.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_big_tech_result_assets');

get_header();
?>

    <div id="shimmer-loader"><?php get_template_part('templates/salary-shimmer'); ?></div>
    <main id="results-content" style="display: none;">
        <div class="parallax-container">
            <nav class="container nav-container">
                <div class="logo">
                    <a href="/big-tech/">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/bigtechroadmap.svg" alt="" />
                    </a>
                </div>
                <div class="nav-content">
                    <p class="nav-text">
                        Learn in-demand AI/ML skills and stay ahead in today's changing
                        tech landscape.
                    </p>
                    <a href="#salary_webinar_form">
                        <button class="nav-btn btn btn-primary">
                            Connect with FAANG Expert
                        </button>
                    </a>
                </div>
            </nav>
            <div class="container">
                <div class="results-header">
                    <div class="results-container">
                        <h1 class="results-title">
                            Your personalised AI roadmap <br>
                            <span class="results-name" id="analysis-results-name"></span>
                        </h1>
                    </div>
                    <div class="results-btn-container">
                        <button id="shareButton" class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M12 5.33333C13.1046 5.33333 14 4.4379 14 3.33333C14 2.22876 13.1046 1.33333 12 1.33333C10.8954 1.33333 10 2.22876 10 3.33333C10 4.4379 10.8954 5.33333 12 5.33333Z"
                                    stroke="#E7FFAA" stroke-width="1.16667" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M4 10C5.10457 10 6 9.10457 6 8C6 6.89543 5.10457 6 4 6C2.89543 6 2 6.89543 2 8C2 9.10457 2.89543 10 4 10Z"
                                    stroke="#E7FFAA" stroke-width="1.16667" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M12 14.6667C13.1046 14.6667 14 13.7712 14 12.6667C14 11.5621 13.1046 10.6667 12 10.6667C10.8954 10.6667 10 11.5621 10 12.6667C10 13.7712 10.8954 14.6667 12 14.6667Z"
                                    stroke="#E7FFAA" stroke-width="1.16667" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M5.72656 9.00652L10.2799 11.6598" stroke="#E7FFAA" stroke-width="1.16667"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M10.2732 4.33984L5.72656 6.99318" stroke="#E7FFAA" stroke-width="1.16667"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            Share This Tool
                        </button>
                        <div id="shareOptionsModal" class="share-options-modal" style="display: none">
                            <div class="share-icons">
                                <button id="copy-results-link" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15"
                                        fill="none">
                                        <path
                                            d="M4.9375 11.3854C4.57083 11.3854 4.25706 11.255 3.99617 10.9941C3.73483 10.7327 3.60417 10.4187 3.60417 10.0521V2.05208C3.60417 1.68542 3.73483 1.37142 3.99617 1.11008C4.25706 0.849194 4.57083 0.71875 4.9375 0.71875H10.9375C11.3042 0.71875 11.6182 0.849194 11.8795 1.11008C12.1404 1.37142 12.2708 1.68542 12.2708 2.05208V10.0521C12.2708 10.4187 12.1404 10.7327 11.8795 10.9941C11.6182 11.255 11.3042 11.3854 10.9375 11.3854H4.9375ZM4.9375 10.0521H10.9375V2.05208H4.9375V10.0521ZM2.27083 14.0521C1.90417 14.0521 1.59017 13.9216 1.32883 13.6607C1.06794 13.3994 0.9375 13.0854 0.9375 12.7187V4.05208C0.9375 3.86319 1.0015 3.70475 1.1295 3.57675C1.25706 3.44919 1.41528 3.38542 1.60417 3.38542C1.79306 3.38542 1.9515 3.44919 2.0795 3.57675C2.20706 3.70475 2.27083 3.86319 2.27083 4.05208V12.7187H8.9375C9.12639 12.7187 9.28483 12.7827 9.41283 12.9107C9.54039 13.0383 9.60417 13.1965 9.60417 13.3854C9.60417 13.5743 9.54039 13.7325 9.41283 13.8601C9.28483 13.9881 9.12639 14.0521 8.9375 14.0521H2.27083Z"
                                            fill="#000" stroke="none"></path>
                                    </svg>
                                    Copy Link
                                </button>
                                <div class="border-left-line" style="
                      border-left-width: 0;
                      border-color: #54627975;
                      border-style: solid;
                      height: 38px;
                      margin: 0 7px;
                    "></div>
                                <a href="#" id="shareFacebook" class="share-icon">
                                    <!-- Facebook Icon -->
                                    <img class="share-icon"
                                        src="https://staging-07b2-interviewkickstart.wpcomstaging.com/wp-content/themes/hello-elementor-child-FT-1/assets/img/facebook.svg"
                                        alt="Facebook Icon" />
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M9.333 6.667h2.333v-2.666H9.333V2.666C9.333 1.739 9.866 1 10.777 1h1.556V0h-2.222c-2.002 0-3.556 1.526-3.556 3.417v2.25H4.444v2.666h2.222V16h2.667v-7.083h2.292l.333-2.667h-2.625V6.667z" fill="#1877F2"></path></svg> -->
                                </a>
                                <a href="#" id="shareTwitter" class="share-icon">
                                    <!-- Twitter Icon -->
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M15.966 3.049a6.39 6.39 0 01-1.875.513c.673-.402 1.18-.967 1.426-1.675-.627.37-1.318.636-2.057.779-.591-.63-1.39-1.021-2.268-1.021-1.721 0-3.114 1.31-3.114 2.92 0 .228.03.45.086.663-2.591-.127-4.888-1.37-6.418-3.235-.268.451-.42.978-.42 1.536 0 1.062.506 2.003 1.269 2.553-.464-.015-.902-.142-1.288-.354-.001.012-.001.024-.001.036-.002 2.574 1.84 4.723 4.286 5.223-.448.128-.92.2-1.403.2-.342 0-.676-.033-.997-.1.676 2.086 2.535 3.595 4.768 3.635-1.749 1.365-3.954 2.145-6.351 2.145-.415 0-.827-.024-1.237-.073 2.274 1.471 4.91 2.33 7.582 2.33 9.106 0 14.086-7.463 14.086-13.95 0-.211-.002-.421-.008-.632.966-.699 1.804-1.576 2.464-2.574-.898.398-1.87.67-2.89.8z" fill="#1DA1F2"></path></svg> -->
                                    <img class="share-icon"
                                        src="https://staging-07b2-interviewkickstart.wpcomstaging.com/wp-content/themes/hello-elementor-child-FT-1/assets/img/twitter-x.svg"
                                        alt="Twitter Icon" />
                                </a>
                                <a href="#" id="shareWhatsApp" class="share-icon">
                                    <!-- WhatsApp Icon -->
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M13.2 2.8a7.2 7.2 0 10-10.4 10.4 7.1 7.1 0 00-.4 1.8l-1.2 3.2a.3.3 0 00.3.4c1.1 0 2.3-.3 3.3-.9 1.7.8 3.6 1.2 5.4 1.2 4 0 7.2-3.2 7.2-7.2 0-4-3.2-7.2-7.2-7.2zm-7.2 12c-1.6 0-3.1-.5-4.4-1.3l-.5 1.5c-.1.3-.3.4-.5.3-.1-.1-.1-.2-.1-.3l.4-1.3c-.5-.4-.9-.8-1.3-1.2-.2-.2-.3-.4-.4-.6-.2-.4-.3-.8-.4-1.3-.1-.5-.2-1.1-.2-1.6 0-.5.1-.9.2-1.3.1-.5.3-.9.5-1.3.2-.3.4-.6.7-.9.3-.4.6-.8.9-1.1 1.1-.5.5-1.1.7-1.7.7-.2 0-.5 0-.7-.1-.4-.1-.7-.4-.8-.8-.1-.4-.1-.7-.1-1.1.1-.6.2-1.1.5-1.5.2-.3.5-.5.9-.6.4-.1.8-.2 1.3-.2 1.3 0 2.5.5 3.5 1.3 1.1.8 2.1 1.9 2.8 3.3-.2.4-.5.8-.9 1.2z" fill="#25D366"></path></svg> -->
                                    <img class="share-icon"
                                        src="https://staging-07b2-interviewkickstart.wpcomstaging.com/wp-content/themes/hello-elementor-child-FT-1/assets/img/whatsapp.svg"
                                        alt="Whatapp Icon" />
                                </a>
                                <a href="#" id="shareLinkedIn" class="share-icon">
                                    <!-- LinkedIn Icon -->
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M0 1.333v13.334h4.667v-7.334h1.5v7.334h4.667v-8.5h1.5v8.5h3v-13.334h-3v7.334h-1.5v-7.334h-4.667v7.334h-1.5v-7.334h-3v13.334h3v-7.334h1.5v7.334h4.667v-8.5h1.5v8.5h3v-13.334h-3z" fill="#0077B5"></path></svg> -->
                                    <img class="share-icon"
                                        src="https://staging-07b2-interviewkickstart.wpcomstaging.com/wp-content/themes/hello-elementor-child-FT-1/assets/img/linkedin.svg"
                                        alt="Linkdin Icon" />
                                </a>
                            </div>
                        </div>
                        <button class="btn btn-secondary" id="copyButton">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <g clip-path="url(#clip0_531_908)">
                                    <path
                                        d="M6.66699 8.66668C6.95329 9.04943 7.31856 9.36613 7.73803 9.5953C8.15749 9.82448 8.62133 9.96076 9.09809 9.9949C9.57485 10.029 10.0534 9.96026 10.5012 9.7932C10.9491 9.62614 11.3557 9.36472 11.6937 9.02668L13.6937 7.02668C14.3009 6.398 14.6368 5.556 14.6292 4.68201C14.6216 3.80802 14.2711 2.97198 13.6531 2.35395C13.035 1.73592 12.199 1.38536 11.325 1.37777C10.451 1.37017 9.609 1.70615 8.98033 2.31335L7.83366 3.45335"
                                        stroke="#E7FFAA" stroke-width="1.33" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M9.33347 7.33331C9.04716 6.95055 8.68189 6.63385 8.26243 6.40468C7.84297 6.17551 7.37913 6.03923 6.90237 6.00508C6.4256 5.97094 5.94708 6.03973 5.49924 6.20678C5.0514 6.37384 4.64472 6.63526 4.3068 6.97331L2.3068 8.97331C1.69961 9.60198 1.36363 10.444 1.37122 11.318C1.37881 12.192 1.72938 13.028 2.3474 13.646C2.96543 14.2641 3.80147 14.6146 4.67546 14.6222C5.54945 14.6298 6.39146 14.2938 7.02013 13.6866L8.16013 12.5466"
                                        stroke="#E7FFAA" stroke-width="1.33" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_531_908">
                                        <rect width="16" height="16" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                            Copy link to your results
                        </button>
                    </div>
                </div>
            </div>

            <section class="container">
                <p class="salary-insights-title heading-1">
                    Your Market Value Overview
                </p>
                <div class="salary-insights-container">
                    <div class="salary-insights-card-container">
                        <div class="salary-insights-card">
                            <div class="chart-section">
                                <div id="chart-container">
                                    <canvas id="market-value-worth" style="
                        display: block;
                        box-sizing: border-box;
                        height: 306px;
                        width: 306px;
                      " width="612" height="612"></canvas>
                                    <div class="pointer"></div>
                                    <div id="gaugeCenter">
                                        <div class="gauage-range" id="gauage-range-val">
                                            $120k-$150k
                                        </div>
                                        <div class="range-label">(Mid-Range)</div>
                                    </div>
                                    <div class="tick-left" id="lower-range-label">$48k</div>
                                    <div class="tick-right" id="upper-range-label">$195k</div>
                                </div>
                            </div>
                            <div class="worth-section">
                                <div class="worth-title heading-2">What you're worth</div>
                                <div class="worth-desc">
                                    You're on your way! Your profile shows potential, but
                                    there's room to grow when it comes to aligning with
                                    AI-first. room to grow.
                                </div>
                            </div>
                            <div class="similar-roles-section">
                                <div class="similar-roles-title heading-2">
                                    Salary ranges for similar roles
                                </div>
                                <div class="similar-roles-list">
                                    <div>
                                        <div class="role-card">
                                            <span class="role-name">Senior Full Stack Developer</span><span
                                                class="role-salary">$140k-$180k</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="role-card">
                                            <span class="role-name">Backend Engineer</span><span
                                                class="role-salary">$120k-$160k</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="role-card">
                                            <span class="role-name">DevOps Engineer</span><span
                                                class="role-salary">$125k-$165k</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="salary-standard-container">
                        <p class="salary-standard-title heading-2">
                            Current Salary vs. Industry Standards
                        </p>
                        <canvas id="industrySalaryChart"></canvas>
                    </div>
                    <div class="comp-break-up-container">
                        <div class="comp-container">
                            <div class="chart-container">
                                <canvas id="compBreakUpChart"></canvas>
                            </div>
                            <div class="legend">
                                <div class="legend-item">
                                    <div class="legend-color variable"></div>
                                    <div class="legend-text">
                                        Variable: <span id="variable-pay">10%</span>
                                    </div>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color fixed-pay"></div>
                                    <div class="legend-text">
                                        Fixed: <span id="fixed-pay">75%</span>
                                    </div>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color equity-pay"></div>
                                    <div class="legend-text">
                                        Equity: <span id="equity-pay">15%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="comp-content">
                                <p class="comp-title heading-2">Comp Break-up Estimate</p>
                                <p class="comp-subtitle">
                                    You're on your way! Your profile shows potential, but
                                    there's room to grow when it comes to aligning with
                                    AI-first. room to grow.
                                </p>
                            </div>
                        </div>

                        <div class="register-session-container">
                            <div class="register-session-card">
                                <div class="register-session-title">
                                    <span>Join our exploratory session to</span>
                                    <br />Learn how unlock 3x salaries.
                                </div>
                                <div class="register-session-slots">
                                    <button class="register-session-slot btn btn-primary" id="slot1">
                                        <span data-slot-value="2025-07-11T18:00:00+05:30">Today, 6pm</span>
                                        <img id="btnLoader" class="btn-loader" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/loadar.svg" alt="Loading">
                                    </button>
                                    <button class="register-session-slot btn btn-primary" id="slot2">
                                        <span data-slot-value="2025-07-12T12:00:00+05:30">Tomorrow, 12pm</span>
                                        <img id="btnLoader" class="btn-loader" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/loadar.svg" alt="Loading">
                                    </button>
                                    <a href="#salary_webinar_form">
                                        <button class="register-session-slot more btn btn-primary" id="slots-more">
                                            More Slots →
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container">
                <p class="heading-1 career-projection-title">Career Projection</p>
                <div class="career-projection-container">
                    <div class="career-projection-chart">
                        <div class="career-projection-card">
                            <div class="career-projection-header">
                                <div class="career-projection-title-wrap">
                                    <div class="career-projection-type">Projection</div>
                                    <div class="career-projection-desc heading-2">
                                        Your inflation adjusted salary
                                    </div>
                                </div>
                                <div class="career-projection-legend">
                                    <div class="legend-item">
                                        <span class="legend-dot orange"></span>
                                        <span class="legend-text">Your Salary Trajectory</span>
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-dot blue"></span>
                                        <span class="legend-text">Salary needed to beat inflation</span>
                                    </div>
                                </div>
                            </div>
                            <div class="career-projection-chart-area">
                                <canvas id="careerProjectionChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="carrer-projection-percentage">
                        <div class="projection-percentage-card gradient-orange">
                            <div class="projection-percentage-circle">
                                <div class="projection-percentage-bg" id="projectionPercentageBg"></div>
                                <div class="projection-percentage-text" id="projectionPercentageText">
                                    <span id="projectionPercentageValue">62%</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18"
                                        fill="none">
                                        <path
                                            d="M9.44204 9.80552C9.31241 9.67125 9.10944 9.64732 8.97934 9.78113C7.7662 11.0289 6.59956 12.2305 5.43184 13.4326C4.36508 14.528 3.29832 15.6218 2.23156 16.7139C1.88261 17.0697 1.46165 17.1797 0.987148 17.0362C0.512645 16.8927 0.230159 16.547 0.125534 16.0585C0.0246022 15.5832 0.201233 15.1933 0.524954 14.8577C2.00447 13.3392 3.48275 11.8203 4.9598 10.301C6.05487 9.17689 7.15076 8.05341 8.24747 6.93056C8.84876 6.31752 9.54482 6.31436 10.1436 6.92108C10.9757 7.76374 11.8022 8.61273 12.6232 9.46803C12.7638 9.6133 12.9745 9.65826 13.1155 9.51339L19.5539 2.8959C19.6332 2.81437 19.5807 2.67164 19.4669 2.67089C18.6668 2.67089 17.8668 2.6791 17.0667 2.66583C16.538 2.65762 16.1399 2.39407 15.9226 1.90048C15.7152 1.42901 15.7841 0.971445 16.1072 0.569494C16.2231 0.42052 16.3708 0.300876 16.5389 0.219789C16.7069 0.138702 16.8909 0.0983401 17.0766 0.101816C18.9918 0.0973918 20.912 0.0935998 22.8297 0.103712C23.554 0.107504 24.0901 0.67251 24.0926 1.41511C24.0987 3.3743 24.0987 5.3335 24.0926 7.29269C24.0926 8.03719 23.5245 8.61989 22.8364 8.61357C22.1484 8.60725 21.6179 8.05109 21.6056 7.3047C21.5939 6.50459 21.6025 5.70385 21.6025 4.90311V4.61722C21.6025 4.58854 21.5881 4.56176 21.5643 4.54586C21.5239 4.519 21.4695 4.53099 21.4426 4.57135C21.3857 4.65687 21.324 4.73895 21.2578 4.81715C18.8092 7.3363 16.3587 9.85355 13.9064 12.3689C13.2682 13.023 12.5783 13.0243 11.9426 12.3746C11.1076 11.521 10.2741 10.6646 9.44204 9.80552Z"
                                            fill="#FF9201"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="projection-percentage-content">
                                <div class="percentage-title">
                                    Your current role has a
                                    <span id="projectionPercentageValueDisplay">62%</span>
                                    chance of being impacted by AI.
                                </div>
                                <div class="percentage-desc">
                                    Percent chance your role will be automated or augmented by
                                    AI by 2030. Up to 47% of US jobs could be automated by 2030
                                    (McKinsey Global Institute).
                                </div>
                            </div>
                        </div>
                        <div class="projection-percentage-card gradient-yellow">
                            <div class="projection-percentage-content">
                                <div class="percentage-title">
                                    <span id="upskill-percentage-display">36%</span> of the
                                    workforce in
                                    <span id="upskill-domain">Full Stack</span> earning more
                                    through Upskilling.
                                </div>
                                <div class="percentage-desc">
                                Research shows that as AI reshapes the workplace, 73% of employees
                                say AI advancements are prompting them to consider upskilling or 
                                reskilling—while 65% agree that AI-related skills 
                                are essential to staying competitive.
                                </div>
                            </div>
                            <div class="projection-percentage-circle">
                                <div class="projection-percentage-bg" id="upskillPercentageBg"></div>
                                <div class="projection-percentage-text" id="upskillPercentageText">
                                    36%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container">
                <div class="timeline-container">
                    <p class="heading-1"><span id="timeline-title-name" class="timeline-title-name">[First Name]</span> ’s 3-year Personalized
                        Career Roadmap </p>
                    <p class="timeline-sub-heading">To becoming AI-Enabled <span id="role-suggested-for-user"></span></p>
                    
                </div>

                <div class="roadmap-section-body">
                    <div class="roadmap-section-body-right">
                        <div class="roadmap-card-wrapper pb-80" id="touchpoint1-card">
                            <div class="steps-wrapper">
                                <div class="icon-wrapper"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" viewBox="0 0 51 51" fill="none">
                                        <circle cx="25.5" cy="25.5" r="23.5" fill="url(#paint0_linear_5924_7623)" stroke="#E9F5FF" stroke-width="4"/>
                                        <path d="M34.9313 16.5249C29.5875 15.0031 26.8219 18.3437 21.4938 16.8187V25.2343C26.8375 26.7562 29.6032 23.4156 34.9469 24.9406C34.3657 23.4042 33.5974 21.9453 32.6594 20.5968L34.9313 16.5249Z" fill="white"/>
                                        <path d="M21.0219 34.5469V16.4469C21.0219 16.3284 20.9748 16.2147 20.891 16.1309C20.8072 16.0471 20.6935 16 20.575 16C20.4565 16 20.3428 16.0471 20.259 16.1309C20.1752 16.2147 20.1281 16.3284 20.1281 16.4469V34.5469C18.4 34.5906 17.0687 34.9 17.0687 35.2687C17.0687 35.6375 18.6375 36 20.575 36C22.5125 36 24.0812 35.6875 24.0812 35.2687C24.0812 34.85 22.75 34.5906 21.0219 34.5469Z" fill="white"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_5924_7623" x1="4" y1="31.5" x2="45.3646" y2="32.174" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#0082F8"/>
                                            <stop offset="1" stop-color="#61B0F7"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="steps-detail-box">
                                    <h5 class="steps-title" id="current-job-date">0-6 Months</h5>
                                    <p class="steps-pera">Current Role: <span id="current-job-title">Software Engineer 1</span></p>
                                </div>
                                <span class="draw-line"></span>
                            </div>
                            <div class="steps-detail-box mobile-version">
                                <h5 class="steps-title" id="current-job-date-mobile">0-6 Months</h5>
                                <p class="steps-pera">Current Role: <span id="current-job-title-mob">Software Engineer 1</span></p>
                            </div>
                            <div class="card-wrapper-for-steps1">
                                <div class="prepare-for-ai-role timeline-info-box-3">
                                    <h4 id="touchpoint1-title">Prepare for your role transition</h4>
                                    <p id="job-summary-touchpoint1">Leverage your robust full stack expertise to begin
                                        integrating AI APIs and automation into web applications. Focus on learning
                                        prompt engineering, LLM integration, and AI-driven UI/UX enhancements to prepare
                                        for AI-enabled developer roles and interviews.</p>
                                    <p class="bold-text">Skills you will need to gain</p>
                                    <div class="skills-list" id="current-skills">
                                    </div>
                                </div>
                                <div class="widget-wrapper timeline-info-box-3">
                                    <div class="widget-box danger">
                                        <p class="title-pera">Role Redundancy Risk</p>
                                        <div class="percentage-box"> <strong id="role-redundancy-risk-touchpoint1">45%</strong> <svg
                                                xmlns="http://www.w3.org/2000/svg" width="25" height="18"
                                                viewBox="0 0 25 18" fill="none">
												<g transform="scale(1, -1) translate(0, -18)">
                                                <path
                                                    d="M9.86855 9.96799C9.73892 9.83373 9.53596 9.8098 9.40586 9.94361C8.19271 11.1914 7.02608 12.3929 5.85836 13.595C4.7916 14.6905 3.72484 15.7843 2.65808 16.8764C2.30912 17.2322 1.88816 17.3421 1.41366 17.1987C0.939158 17.0552 0.656672 16.7095 0.552048 16.221C0.451116 15.7457 0.627747 15.3558 0.951467 15.0202C2.43098 13.5017 3.90926 11.9828 5.38632 10.4635C6.48139 9.33937 7.57728 8.21588 8.67399 7.09303C9.27527 6.47999 9.97133 6.47683 10.5702 7.08355C11.4022 7.92622 12.2288 8.7752 13.0498 9.63051C13.1903 9.77578 13.401 9.82074 13.542 9.67587L19.9804 3.05837C20.0597 2.97684 20.0072 2.83412 19.8934 2.83336C19.0934 2.83336 18.2933 2.84158 17.4932 2.82831C16.9646 2.82009 16.5664 2.55655 16.3491 2.06296C16.1417 1.59149 16.2106 1.13392 16.5338 0.73197C16.6497 0.582996 16.7973 0.463351 16.9654 0.382265C17.1335 0.301178 17.3174 0.260816 17.5031 0.264291C19.4183 0.259867 21.3385 0.256075 23.2562 0.266187C23.9806 0.269979 24.5166 0.834986 24.5191 1.57758C24.5252 3.53678 24.5252 5.49597 24.5191 7.45517C24.5191 8.19966 23.951 8.78236 23.263 8.77604C22.5749 8.76972 22.0444 8.21357 22.0321 7.46718C22.0204 6.66707 22.029 5.86632 22.029 5.06558V4.7797C22.029 4.75101 22.0147 4.72423 21.9908 4.70834C21.9504 4.68148 21.896 4.69346 21.8691 4.73382C21.8122 4.81935 21.7506 4.90143 21.6844 4.97963C19.2357 7.49878 16.7853 10.016 14.3329 12.5314C13.6947 13.1855 13.0048 13.1868 12.3691 12.5371C11.5341 11.6834 10.7006 10.8271 9.86855 9.96799Z"
                                                    fill="#D33E3E"></path>
                                            </svg> </div>
                                        <p class="sub-pera">Recruiters seek AI-savvy candidates</p>
                                    </div>
                                    <div class="widget-box success">
                                        <p class="title-pera">Reduction in layoff risks </p>
                                        <div class="percentage-box"> <strong class="layoff-risk-reduction" id="layoff-risk-reduction-touchpoint1">57%</strong>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 18" fill="none">
                                                <path
                                                    d="M9.86855 9.96799C9.73892 9.83373 9.53596 9.8098 9.40586 9.94361C8.19271 11.1914 7.02608 12.3929 5.85836 13.595C4.7916 14.6905 3.72484 15.7843 2.65808 16.8764C2.30912 17.2322 1.88816 17.3421 1.41366 17.1987C0.939158 17.0552 0.656672 16.7095 0.552048 16.221C0.451116 15.7457 0.627747 15.3558 0.951467 15.0202C2.43098 13.5017 3.90926 11.9828 5.38632 10.4635C6.48139 9.33937 7.57728 8.21588 8.67399 7.09303C9.27527 6.47999 9.97133 6.47683 10.5702 7.08355C11.4022 7.92622 12.2288 8.7752 13.0498 9.63051C13.1903 9.77578 13.401 9.82074 13.542 9.67587L19.9804 3.05837C20.0597 2.97684 20.0072 2.83412 19.8934 2.83336C19.0934 2.83336 18.2933 2.84158 17.4932 2.82831C16.9646 2.82009 16.5664 2.55655 16.3491 2.06296C16.1417 1.59149 16.2106 1.13392 16.5338 0.73197C16.6497 0.582996 16.7973 0.463351 16.9654 0.382265C17.1335 0.301178 17.3174 0.260816 17.5031 0.264291C19.4183 0.259867 21.3385 0.256075 23.2562 0.266187C23.9806 0.269979 24.5166 0.834986 24.5191 1.57758C24.5252 3.53678 24.5252 5.49597 24.5191 7.45517C24.5191 8.19966 23.951 8.78236 23.263 8.77604C22.5749 8.76972 22.0444 8.21357 22.0321 7.46718C22.0204 6.66707 22.029 5.86632 22.029 5.06558V4.7797C22.029 4.75101 22.0147 4.72423 21.9908 4.70834C21.9504 4.68148 21.896 4.69346 21.8691 4.73382C21.8122 4.81935 21.7506 4.90143 21.6844 4.97963C19.2357 7.49878 16.7853 10.016 14.3329 12.5314C13.6947 13.1855 13.0048 13.1868 12.3691 12.5371C11.5341 11.6834 10.7006 10.8271 9.86855 9.96799Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="sub-pera">Layoff risk reduction after upskilling</p>
                                    </div>
                                </div>
                                <div class="current-industry-card timeline-info-box-3">
                                    <div class="current-industry-title-wrapper">
                                        <div> <strong id="current-salary">$130k - $170k</strong>
                                            <p class="current-industry-pera mb-40 mobile-pera"> <span>Current
                                                    Industry</span> Average Salary Range for your role</p>
                                        </div>
                                        <div class="badge-wrapper">
                                            <div class="badge-small success"> <span id="currentbase">75%</span> Fixed
                                            </div>
                                            <div class="badge-small warning"> <span id="currentvarible">10%</span>
                                                Variable </div>
                                            <div class="badge-small info"> <span id="currentequity">15%</span> Equity
                                            </div>
                                        </div>
                                    </div>
                                    <p class="current-industry-pera"> <span>Current Industry</span> Average Salary
                                        Range for your role</p>
                                    <div class="chart-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="437" height="121"
                                            viewBox="0 0 437 121" fill="none">
                                            <path
                                                d="M48.3073 72.5171L-10 61.1633V121.001H487L491.341 2.55347L484.4 1.63289L446.916 20.3513L431.646 18.5101L384.444 36.0011L378.891 37.5354L326.655 54.4124L312.078 57.7879L285.701 39.0694H280.842L250.3 54.4124H246.83L220.093 56.8673L192.481 58.4016L184.593 55.6768L167.5 45.4453L152.427 38.4557L145.486 36.0008L134.38 38.4557L114.25 58.4016L106.615 61.1633L91.3436 56.8673L77.4609 58.4016L48.3073 72.5171Z"
                                                fill="url(#paint0_linear_6656_384)" />
                                            <path
                                                d="M-10 61.2066L49.2142 72.7718C50.1213 72.9489 51.0524 72.7263 51.7967 72.1785C57.2669 68.1525 81.1276 51.8677 100.135 59.0804C121.743 67.2803 123.003 33.8611 148.231 36.3032C160.778 37.5178 158.659 42.7925 178.019 51.7398C187.892 56.3029 185.194 59.0804 197.741 59.0804L245.2 53.9843C245.609 53.9404 246.022 53.9769 246.417 54.0916L248.683 54.7496C249.524 54.9939 250.429 54.8778 251.181 54.429L280.192 37.1173C281.32 36.4444 282.746 36.54 283.774 37.3573L308.764 57.228C309.513 57.8233 310.491 58.047 311.424 57.8362L328.769 53.9178L377.87 39.1475L429.975 18.8356C430.544 18.6138 431.165 18.5618 431.763 18.6859L444.317 21.2906C445.069 21.4467 445.853 21.3229 446.521 20.9425L480.463 1.60365C481.268 1.14532 482.233 1.06328 483.103 1.37925L490.096 3.91819"
                                                stroke="#4CACFF" stroke-width="2.10435" />
                                            <defs>
                                                <linearGradient id="paint0_linear_6656_384" x1="238.5" y1="36.0011"
                                                    x2="238.5" y2="121.001" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#0C1132" />
                                                    <stop offset="1" stop-color="#131B44" />
                                                </linearGradient>
                                            </defs>
                                        </svg>

                                    </div>
                                </div>
                            </div>

                            <p class="mobile-scroll-text"> &larr; Scroll left</p>

                        </div>

                        <div class="roadmap-card-wrapper pb-80" id="touchpoint2-card">
                            <div class="steps-wrapper">
                                <div class="icon-wrapper"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" viewBox="0 0 51 51" fill="none">
                                        <circle cx="25.5" cy="25.5" r="23.5" fill="url(#paint0_linear_6656_1142)" stroke="#E9F5FF" stroke-width="4"/>
                                        <path d="M18.7958 37.6667L20.6916 29.4708L14.3333 23.9583L22.7333 23.2292L25.9999 15.5L29.2666 23.2292L37.6666 23.9583L31.3083 29.4708L33.2041 37.6667L25.9999 33.3208L18.7958 37.6667Z" fill="#FCFDFF"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_6656_1142" x1="4" y1="31.5" x2="45.3646" y2="32.174" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#0082F8"/>
                                                <stop offset="1" stop-color="#61B0F7"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="steps-detail-box">
                                    <h5 class="steps-title" id="touchpoint2-job-date">6-12 Months</h5>
                                    <p class="steps-pera">Current Role: <span id="touchpoint2-job-title">Software Engineer 1</span></p>
                                </div>
                            </div>
                            <div class="steps-detail-box mobile-version">
                                <h5 class="steps-title" id="one-year-job-date-mob">6-12 Months</h5>
                                <p class="steps-pera">Current Role: <span id="one-year-job-title-mob">Software Engineer 1</span></p>
                            </div>
                            <div class="step-container-wrap">
                                <div class="dream-container steps-container-50">
                                    <div class="prepare-for-ai-role">
                                        <h4 id="touchpoint2-title">Land your dream role</h4>
                                        <p id="job-summary-touchpoint2">Transition into building intelligent applications by
                                            integrating LLMs, RAG, and vector search. Focus on deploying AI-powered
                                            features, collaborating with ML teams, and mastering MLOps basics for scalable
                                            AI solutions.</p>
                                        <p class="bold-text">Skills you would have mastered at this stage</p>
                                        <div class="skills-list" id="touchpoint2-skills">
                                        </div>
                                    </div>
                                    <div class="widget-wrapper">
                                        <div class="widget-box danger">
                                            <p class="title-pera">Role Redundancy Risk</p>
                                            <div class="percentage-box"> <strong id="role-redundancy-risk-touchpoint2">45%</strong> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="25" height="18"
                                                    viewBox="0 0 25 18" fill="none">
													<g transform="scale(1, -1) translate(0, -18)">
                                                    <path
                                                        d="M9.86855 9.96799C9.73892 9.83373 9.53596 9.8098 9.40586 9.94361C8.19271 11.1914 7.02608 12.3929 5.85836 13.595C4.7916 14.6905 3.72484 15.7843 2.65808 16.8764C2.30912 17.2322 1.88816 17.3421 1.41366 17.1987C0.939158 17.0552 0.656672 16.7095 0.552048 16.221C0.451116 15.7457 0.627747 15.3558 0.951467 15.0202C2.43098 13.5017 3.90926 11.9828 5.38632 10.4635C6.48139 9.33937 7.57728 8.21588 8.67399 7.09303C9.27527 6.47999 9.97133 6.47683 10.5702 7.08355C11.4022 7.92622 12.2288 8.7752 13.0498 9.63051C13.1903 9.77578 13.401 9.82074 13.542 9.67587L19.9804 3.05837C20.0597 2.97684 20.0072 2.83412 19.8934 2.83336C19.0934 2.83336 18.2933 2.84158 17.4932 2.82831C16.9646 2.82009 16.5664 2.55655 16.3491 2.06296C16.1417 1.59149 16.2106 1.13392 16.5338 0.73197C16.6497 0.582996 16.7973 0.463351 16.9654 0.382265C17.1335 0.301178 17.3174 0.260816 17.5031 0.264291C19.4183 0.259867 21.3385 0.256075 23.2562 0.266187C23.9806 0.269979 24.5166 0.834986 24.5191 1.57758C24.5252 3.53678 24.5252 5.49597 24.5191 7.45517C24.5191 8.19966 23.951 8.78236 23.263 8.77604C22.5749 8.76972 22.0444 8.21357 22.0321 7.46718C22.0204 6.66707 22.029 5.86632 22.029 5.06558V4.7797C22.029 4.75101 22.0147 4.72423 21.9908 4.70834C21.9504 4.68148 21.896 4.69346 21.8691 4.73382C21.8122 4.81935 21.7506 4.90143 21.6844 4.97963C19.2357 7.49878 16.7853 10.016 14.3329 12.5314C13.6947 13.1855 13.0048 13.1868 12.3691 12.5371C11.5341 11.6834 10.7006 10.8271 9.86855 9.96799Z"
                                                        fill="#D33E3E"></path>
                                                </svg> </div>
                                            <p class="sub-pera">Recruiters seek AI-savvy candidates</p>
                                        </div>
                                        <div class="widget-box success">
                                            <p class="title-pera">Expected Salary Range</p>
                                            <div class="percentage-box"> <strong class="layoff-risk-reduction" id="expected-salary-range-touchpoint2"></strong></div>
                                            <p class="sub-pera" id="salary-range-1">+21.01% from your current profile</p>
                                        </div>
                                    </div>
                                </div>
								<p class="mobile-scroll-text"> &larr; Scroll left</p>
                                <a href="#salary_webinar_form">
                                    <div class="explore-masterclass-card">
                                        <div class="explore-masterclass-header">
                                            <div class="explore-masterclass-desc">
                                                One-click registration button for a live AI expert session.
                                            </div>
                                            <div class="explore-masterclass-title">
                                                Talk to an industry expert for free
                                                <span class="explore-masterclass-arrow">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 24L24 8" stroke="#fff" stroke-width="3" stroke-linecap="round" />
                                                        <path d="M12 8H24V20" stroke="#fff" stroke-width="3" stroke-linecap="round" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="explore-masterclass-instructors">
                                            <div class="instructor-avatar avatar-1"></div>
                                            <div class="instructor-avatar avatar-2"></div>
                                            <div class="instructor-avatar avatar-3"></div>
                                            <div class="instructor-avatar avatar-4"></div>
                                            <div class="explore-masterclass-instructors-label">
                                                Over 700+ experienced instructors
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="roadmap-card-wrapper pb-80" id="touchpoint3-card">
                            <div class="steps-wrapper">
                                <div class="icon-wrapper"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" viewBox="0 0 51 51" fill="none">
                                        <circle cx="25.5" cy="25.5" r="23.5" fill="url(#paint0_linear_6656_1142)" stroke="#E9F5FF" stroke-width="4"/>
                                        <path d="M18.7958 37.6667L20.6916 29.4708L14.3333 23.9583L22.7333 23.2292L25.9999 15.5L29.2666 23.2292L37.6666 23.9583L31.3083 29.4708L33.2041 37.6667L25.9999 33.3208L18.7958 37.6667Z" fill="#FCFDFF"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_6656_1142" x1="4" y1="31.5" x2="45.3646" y2="32.174" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#0082F8"/>
                                                <stop offset="1" stop-color="#61B0F7"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="steps-detail-box">
                                    <h5 class="steps-title" id="touchpoint3-job-date">12-18 Months</h5>
                                    <p class="steps-pera">Current Role: <span id="touchpoint3-job-title">Software Engineer 1</span></p>
                                </div>
                            </div>
                            <div class="steps-detail-box mobile-version">
                                <h5 class="steps-title" id="touchpoint3-job-date-mob">12-18 Months</h5>
                                <p class="steps-pera">Current Role: <span id="touchpoint3-job-title-mob">Software Engineer 1</span></p>
                            </div>
                            <div class="step-container-wrap">
                                <div class="step-3-container">
                                    <div class="prepare-for-ai-role">
                                        <h4 id="touchpoint3-title">Land your dream role</h4>
                                        <p id="job-summary-touchpoint3">Transition into building intelligent applications by
                                            integrating LLMs, RAG, and vector search. Focus on deploying AI-powered
                                            features, collaborating with ML teams, and mastering MLOps basics for scalable
                                            AI solutions.</p>
                                        <p class="bold-text">Skills you would have mastered at this stage</p>
                                        <div class="skills-list" id="touchpoint3-skills">
                                        </div>
                                    </div>
                                    <div class="course-card view-all" id="unlock-3x-salaries-card">
                                        <div class="view-all-content">
                                            <div class="view-all-desc">
                                                Join our exploratory session to <br />
                                                <span>Learn how unlock 3x salaries.</span>
                                            </div>
                                            <button class="view-all-btn btn btn-primary talk-to-expert-btn">
                                                <a href="#salary_webinar_form">Talk to Expert</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mobile-scroll-text"> &larr; Scroll left</p>
                        </div>
                        
                        <div class="roadmap-card-wrapper pb-80" id="touchpoint4-card">
                            <div class="steps-wrapper">
                                <div class="icon-wrapper"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" viewBox="0 0 51 51" fill="none">
                                        <circle cx="25.5" cy="25.5" r="23.5" fill="url(#paint0_linear_6656_1142)" stroke="#E9F5FF" stroke-width="4"/>
                                        <path d="M18.7958 37.6667L20.6916 29.4708L14.3333 23.9583L22.7333 23.2292L25.9999 15.5L29.2666 23.2292L37.6666 23.9583L31.3083 29.4708L33.2041 37.6667L25.9999 33.3208L18.7958 37.6667Z" fill="#FCFDFF"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_6656_1142" x1="4" y1="31.5" x2="45.3646" y2="32.174" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#0082F8"/>
                                                <stop offset="1" stop-color="#61B0F7"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="steps-detail-box">
                                    <h5 class="steps-title" id="touchpoint4-job-date">18-24 Months</h5>
                                    <p class="steps-pera">Current Role: <span id="touchpoint4-job-title">Software Engineer 1</span></p>
                                </div>
                            </div>
                            <div class="steps-detail-box mobile-version">
                                <h5 class="steps-title" id="touchpoint4-job-date-mob">18-24 Months</h5>
                                <p class="steps-pera">Current Role: <span id="touchpoint4-job-title-mob">Software Engineer 1</span></p>
                            </div>
                            <div class="step-container-wrap">
                                <div class="step-4-container">
                                    <div class="prepare-for-ai-role">
                                        <h4 id="touchpoint4-title">Land your dream role</h4>
                                        <p id="job-summary-touchpoint4">Transition into building intelligent applications by
                                            integrating LLMs, RAG, and vector search. Focus on deploying AI-powered
                                            features, collaborating with ML teams, and mastering MLOps basics for scalable
                                            AI solutions.</p>
                                        <p class="bold-text">Skills you would have mastered at this stage</p>
                                        <div class="skills-list" id="touchpoint4-skills">
                                        </div>
                                    </div>

                                    <div class="widget-wrapper">
                                        <div class="widget-box success">
                                            <p class="title-pera">Expected Salary Range </p>
                                            <div class="percentage-box"> <strong class="layoff-risk-reduction" id="expected-salary-range-touchpoint4"></strong></div>
                                            <p class="sub-pera" id="salary-range-2">+21.01% from your current profile</p>
                                        </div>
    
                                        <div class="course-card view-all" id="unlock-3x-salaries-card">
                                            <div class="view-all-content">
                                                <div class="view-all-desc">
                                                    Join our exploratory session to <br />
                                                    <span>Learn how unlock 3x salaries.</span>
                                                </div>
                                                <button class="view-all-btn btn btn-primary">
                                                    <a href="#salary_webinar_form" target="_blank">Talk to Expert</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <section>
                                    <div class="recommended-courses-title">
                                        Interview Kickstart courses
                                        <span> recommended for you</span>
                                    </div>
                                    <div class="recommended-courses-list">
                                        <div class="course-card">
                                            <a href="#" target="_blank" id="course-card-link-1">
                                                <div class="course-card-image course-card-image-1">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/course1.png" alt="course-card-image-1" />
                                                    <span class="course-card-arrow">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                                            <path d="M8.65186 21.011L21.0115 8.65137" stroke="white" stroke-width="2.47687" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M8.65186 8.65137H21.0115V21.011" stroke="white" stroke-width="2.47687" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="course-card-content">
                                                    <div class="course-card-title" id="course-card-title-1">EdgeUp</div>
                                                    <div class="course-card-desc" id="course-card-desc-1">
                                                        Master GenAI skills and land Tier-1 tech roles with FAANG+
                                                        mentorship and real-world projects
                                                    </div>
                                                </div>
                                                <div class="course-card-badge">
                                                    Learners got avg 66% salary hike
                                                </div>
                                                <span class="course-card-arrow-mobile">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                                        <path d="M5.39307 12.8357L12.8088 5.41992" stroke="white" stroke-width="1.48315" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M5.39307 5.41992H12.8088V12.8357" stroke="white" stroke-width="1.48315" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="course-card">
                                            <a href="#" target="_blank" id="course-card-link-2">
                        
                                                <div class="course-card-image course-card-image-2">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/course2.png" alt="course-card-image-2" />
                                                    <span class="course-card-arrow">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                                                <path d="M8.65186 21.011L21.0115 8.65137" stroke="white" stroke-width="2.47687" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M8.65186 8.65137H21.0115V21.011" stroke="white" stroke-width="2.47687" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                    </span>
                                                </div>
                                                <div class="course-card-content">
                                                    <div class="course-card-title" id="course-card-title-2">
                                                        Flagship Machine Learning Course
                                                    </div>
                                                    <div class="course-card-desc" id="course-card-desc-2">
                                                        Become an industry ready ML engineer mastering GenAI through
                                                        capstone projects
                                                    </div>
                                                </div>
                                                <span class="course-card-arrow-mobile">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                                        <path d="M5.39307 12.8357L12.8088 5.41992" stroke="white" stroke-width="1.48315" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M5.39307 5.41992H12.8088V12.8357" stroke="white" stroke-width="1.48315" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="course-card">
                                            <a href="#" target="_blank" id="course-card-link-3">
                        
                                                <div class="course-card-image course-card-image-3">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/course3.png" alt="course-card-image-3" />
                                                    <span class="course-card-arrow">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                                                <path d="M8.65186 21.011L21.0115 8.65137" stroke="white" stroke-width="2.47687" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M8.65186 8.65137H21.0115V21.011" stroke="white" stroke-width="2.47687" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                    </span>
                                                </div>
                                                <div class="course-card-content">
                                                    <div class="course-card-title" id="course-card-title-3">
                                                        GenAI for Technical Program Managers
                                                    </div>
                                                    <div class="course-card-desc" id="course-card-desc-3">
                                                        Lead AI projects confidently—gain GenAI skills tailored for TPMs
                                                        from top tech instructors
                                                    </div>
                                                </div>
                                                <div class="course-card-badge badge-fast">Fast filling course!</div>
                                                <span class="course-card-arrow-mobile">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                                        <path d="M5.39307 12.8357L12.8088 5.41992" stroke="white" stroke-width="1.48315" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M5.39307 5.41992H12.8088V12.8357" stroke="white" stroke-width="1.48315" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="course-card view-all">
                                            <div class="view-all-content view-all-content-roadmap">
                                                <div class="view-all-title">We've got more</div>
                                                <div class="view-all-desc">
                                                    Check out our array of AI/ML courses tailored to upleveling your
                                                    career.
                                                </div>
                                                <button class="view-all-btn btn btn-primary" id="view-all-courses">
                                                    <a href="https://staging-07b2-interviewkickstart.wpcomstaging.com/?utm_source=L10_pagex&amp;utm_campaign=L10x_Big_tech_roadmap" target="_blank">View all courses</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <p class="mobile-scroll-text"> &larr; Scroll left</p>
                        </div>

                        <div class="roadmap-card-wrapper pb-80" id="touchpoint5-card">
                            <div class="steps-wrapper">
                                <div class="icon-wrapper"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" viewBox="0 0 51 51" fill="none">
                                        <circle cx="25.5" cy="25.5" r="23.5" fill="url(#paint0_linear_6656_1142)" stroke="#E9F5FF" stroke-width="4"/>
                                        <path d="M18.7958 37.6667L20.6916 29.4708L14.3333 23.9583L22.7333 23.2292L25.9999 15.5L29.2666 23.2292L37.6666 23.9583L31.3083 29.4708L33.2041 37.6667L25.9999 33.3208L18.7958 37.6667Z" fill="#FCFDFF"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_6656_1142" x1="4" y1="31.5" x2="45.3646" y2="32.174" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#0082F8"/>
                                                <stop offset="1" stop-color="#61B0F7"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="steps-detail-box">
                                    <h5 class="steps-title" id="touchpoint5-job-date">30-36 Months</h5>
                                    <p class="steps-pera">Current Role: <span id="touchpoint5-job-title">Software Engineer 1</span></p>
                                </div>
                            </div>

                            <div class="steps-detail-box mobile-version">
                                <h5 class="steps-title" id="touchpoint5-job-date-mob">30-36 Months</h5>
                                <p class="steps-pera">Current Role: <span id="touchpoint5-job-title-mob">Software Engineer 1</span></p>
                            </div>

                            <div class="step-container-wrap">
                                <div class="dream-container step-5-container steps-container-50">
                                    <div class="prepare-for-ai-role">
                                        <h4 id="touchpoint5-title">Land your dream role</h4>
                                        <p id="job-summary-touchpoint5">Transition into building intelligent applications by
                                            integrating LLMs, RAG, and vector search. Focus on deploying AI-powered
                                            features, collaborating with ML teams, and mastering MLOps basics for scalable
                                            AI solutions.</p>
                                        <p class="bold-text">Skills you would have mastered at this stage</p>
                                        <div class="skills-list" id="touchpoint5-skills">
                                        </div>
                                    </div>
                                    <div class="widget-wrapper">
                                        <div class="widget-box danger">
                                            <p class="title-pera">Role Redundancy Risk</p>
                                            <div class="percentage-box"> <strong id="role-redundancy-risk-touchpoint5">45%</strong> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="25" height="18"
                                                    viewBox="0 0 25 18" fill="none">
													<g transform="scale(1, -1) translate(0, -18)">
                                                    <path
                                                        d="M9.86855 9.96799C9.73892 9.83373 9.53596 9.8098 9.40586 9.94361C8.19271 11.1914 7.02608 12.3929 5.85836 13.595C4.7916 14.6905 3.72484 15.7843 2.65808 16.8764C2.30912 17.2322 1.88816 17.3421 1.41366 17.1987C0.939158 17.0552 0.656672 16.7095 0.552048 16.221C0.451116 15.7457 0.627747 15.3558 0.951467 15.0202C2.43098 13.5017 3.90926 11.9828 5.38632 10.4635C6.48139 9.33937 7.57728 8.21588 8.67399 7.09303C9.27527 6.47999 9.97133 6.47683 10.5702 7.08355C11.4022 7.92622 12.2288 8.7752 13.0498 9.63051C13.1903 9.77578 13.401 9.82074 13.542 9.67587L19.9804 3.05837C20.0597 2.97684 20.0072 2.83412 19.8934 2.83336C19.0934 2.83336 18.2933 2.84158 17.4932 2.82831C16.9646 2.82009 16.5664 2.55655 16.3491 2.06296C16.1417 1.59149 16.2106 1.13392 16.5338 0.73197C16.6497 0.582996 16.7973 0.463351 16.9654 0.382265C17.1335 0.301178 17.3174 0.260816 17.5031 0.264291C19.4183 0.259867 21.3385 0.256075 23.2562 0.266187C23.9806 0.269979 24.5166 0.834986 24.5191 1.57758C24.5252 3.53678 24.5252 5.49597 24.5191 7.45517C24.5191 8.19966 23.951 8.78236 23.263 8.77604C22.5749 8.76972 22.0444 8.21357 22.0321 7.46718C22.0204 6.66707 22.029 5.86632 22.029 5.06558V4.7797C22.029 4.75101 22.0147 4.72423 21.9908 4.70834C21.9504 4.68148 21.896 4.69346 21.8691 4.73382C21.8122 4.81935 21.7506 4.90143 21.6844 4.97963C19.2357 7.49878 16.7853 10.016 14.3329 12.5314C13.6947 13.1855 13.0048 13.1868 12.3691 12.5371C11.5341 11.6834 10.7006 10.8271 9.86855 9.96799Z"
                                                        fill="#D33E3E"></path>
                                                </svg> </div>
                                            <p class="sub-pera">Recruiters seek AI-savvy candidates</p>
                                        </div>
                                        <div class="widget-box success">
                                            <p class="title-pera">Expected Salary Range</p>
                                            <div class="percentage-box"> <strong class="layoff-risk-reduction" id="expected-salary-range-touchpoint5"></strong></div>
                                            <p class="sub-pera" id= "salary-range-3">+21.01% from your current profile</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="mobile-scroll-text"> &larr; Scroll left</p>
                        </div>

                        <div class="roadmap-card-wrapper career-stepup-wrapper" id="touchpoint6-card">
                            <div class="steps-wrapper border-none">
                                <div class="icon-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43" fill="none">
                                        <circle cx="21.5" cy="21.5" r="19.5" fill="#12B76A" stroke="#E9F5FF" stroke-width="4"/>
                                        <path d="M31.25 16.0007C30.8333 15.5423 30.2083 15.2507 29.5833 15.2507H27.3333V13.834H16.6666V15.2507H14.4166C13.7916 15.2507 13.1666 15.5423 12.75 16.0007C12.3333 16.459 12.125 17.084 12.2083 17.709C12.4583 19.6257 13.6666 24.1257 20.0833 24.1673C20.5 24.334 20.9166 24.4173 21.375 24.5007V26.3757C19.6666 26.584 18.2083 27.709 17.5416 29.334L17.1666 30.209H26.8333L26.4583 29.334C25.7916 27.709 24.3333 26.6257 22.625 26.3757V24.5007C23.0833 24.459 23.5 24.334 23.9166 24.1673C30.2916 24.1257 31.5416 19.6673 31.7916 17.709C31.8333 17.084 31.6666 16.459 31.25 16.0007ZM13.4583 17.584C13.4166 17.334 13.5 17.0423 13.6666 16.834C13.8333 16.6257 14.125 16.5007 14.375 16.5007H16.625V19.1673C16.625 20.5007 17.125 21.7507 17.9583 22.6673C14.75 21.959 13.7083 19.6257 13.4583 17.584ZM22.8333 19.2507L23.3333 20.834L22 19.8757L20.625 20.8757L21.125 19.2923L19.75 18.2923H21.4166L21.9166 16.709L22.4166 18.2923H24.0833L22.8333 19.2507ZM30.5416 17.584C30.2916 19.6257 29.25 22.0007 26.0416 22.709C26.875 21.7507 27.375 20.5423 27.375 19.209V16.5423H29.625C29.9166 16.5423 30.1666 16.6673 30.3333 16.8757C30.5 17.0423 30.5833 17.2923 30.5416 17.584Z" fill="white"/>
                                    </svg>
                                </div>
                                <div class="steps-detail-box success">
                                    <h5 class="steps-title" id="touchpoint6-job-date">24-30 Months</h5>
                                    <p class="steps-pera">Current Role: <span id="touchpoint6-job-title">Software Engineer 1</span></p>
                                </div>
                            </div>
                            <div class="steps-detail-box success mobile-version">
                                <h5 class="steps-title" id="touchpoint6-job-date-mob">24-30 Months</h5>
                                <p class="steps-pera">Current Role: <span id="touchpoint6-job-title-mob">Software Engineer 1</span></p>
                            </div>
                            <div class="career-charge">
                                <div class="prepare-for-ai-role">
                                    <h4 id="touchpoint6-title"><strong>Career Step-up</strong> Opportunities</h4>
                                    <p id="job-summary-touchpoint6">Achieve mastery in AI-driven product development,
                                        leading initiatives on generative AI, scalable deployment, and cross-functional
                                        AI projects. Position yourself for leadership and continued growth in the AI
                                        product engineering space.</p>
                                    <p class="bold-text">Skills you would have mastered at this stage</p>
                                    <div class="skills-list" id="touchpoint6-skills">
                                    </div>
                                </div>
                                <div class="reading-card-wrapper">
                                    <div class="reading-card-container grid-container">
                                        <div class="widget-box">
                                            <p>AI Readiness</p>
                                            <p class="widget-box-title"><span id="ai-readiness">~85</span><span>/100</span></p>
                                            <span class="reading-card-span">Up from your current score</span>
                                        </div>
                                        <div class="widget-box">
                                            <p>Expected Salary Range</p>
                                            <p class="salary-title widget-box-title" id="expected-salary-range-touchpoint6">$240k - $320k</p>
                                            <span class="reading-card-span"><b id="reading-card-span-id">+43%</b> from your current profile</span>
                                        </div>
                                        <div class="widget-box">
                                            <p>Increase in Net Worth</p>
                                            <p class="widget-box-title" id="increase-net-cost-touchpoint6">$191k</p> 
                                            <span class="reading-card-span" id="increase-net-worth"><b id="increase-net-worth-percentage">+185%</b> from your current trajectory</span>
                                        </div>
                                        <div class="widget-box">
                                            <p>Average Salary Hike</p>
                                            <p class="widget-box-title" id="average-salary-hike-touchpoint6">30%</p> 
                                            <span class="reading-card-span"><b id="average-salary-hike-percentage"> +130%</b> from your current Profile</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mobile-scroll-text"> &larr; Scroll left</p>
                        </div>
                    </div>
                </div>


            </section>

            <section class="container">
                <p class="heading-1 salary-uplift-title">
                    Skills and Compensation Correlation
                </p>
                <div class="skills-compensation-container">
                    <div class="salary-uplift-container">
                        <div class="earing-chart-header">
                            <div class="earing-chart-header-wrapper">
                              <p class="earing-chart-title">Projection</p>
                              <h2 class="earing-chart-subtitle">Net worth with &amp; without AI skills</h2>
                            </div>
                            <div class="earing-legend-container">
                              <div class="earing-legend-item">
                                <div class="earing-legend-color earing-ai-enhanced"></div>
                                <span class="earing-legend-text">AI-Enhanced</span>
                              </div>
                              <div class="earing-legend-item">
                                <div class="earing-legend-color earing-non-ai"></div>
                                <span class="earing-legend-text">Non-AI</span>
                              </div>
                            </div>
                          </div>
                          <div class="earing-chart-container">
                            <canvas id="netWorthChart" height="304"></canvas>
                          </div>
                    </div>
    
                    <div class="net-worth-potential-container">
                        <div class="heading-2">Your net worth potential with AI skills</div>
                        <div class="net-worth-amt">
                            <span class="net-worth-amt-lower" id="net-worth-amt-lower">$210k</span> -
                            <span class="net-worth-amt-upper" id="net-worth-amt-upper">$270k</span>
                        </div>
                        <div class="projected-net-worth-container">
                            <div class="net-worth-label projected-label">
                                <div class="net-worth-label-value" id="net-worth-label-value-projected">$210k</div>
                                <div class="net-worth-label-title" id="">Projected Net-Worth</div>
                            </div>
                            <div class="net-worth-label skill-label skill1">
                                <div class="net-worth-label-value net-worth-label-value-skill1">$27k</div>
                                <div class="net-worth-label-title net-worth-label-title-skill1">LLM Integration</div>
                            </div>
                            <div class="net-worth-label skill-label skill2">
                                <div class="net-worth-label-value net-worth-label-value-skill2">$24.3k</div>
                                <div class="net-worth-label-title net-worth-label-title-skill2">Vector Databases</div>
                            </div>
                            <div class="net-worth-label skill-label skill3">
                                <div class="net-worth-label-value net-worth-label-value-skill3">$21.6k</div>
                                <div class="net-worth-label-title net-worth-label-title-skill3">Model Serving</div>
                            </div>
                        </div>
                        <div class="projected-net-worth-skills">
                            <div class="net-worth-skill-row">
                                <div class="net-worth-skill-dot dot-base"></div>
                                <span class="net-worth-skill-text">Your current projected net worth is estimated between
                                    <span id="low-net-worth">$210k</span> -
                                    <span id="high-net-worth">$270k</span>
                                </span>
                            </div>
                            <div class="net-worth-skill-row">
                                <div class="net-worth-skill-dot dot-skill1"></div>
                                <span class="net-worth-skill-text">
                                    <p class="net-worth-label-title-skill1">LLM Integration</p> cSkill 1 can make you an indispensable engineer, adding another
                                    <span class="net-worth-label-value-skill1">$27k</span>
                                </span>
                            </div>
                            <div class="net-worth-skill-row">
                                <div class="net-worth-skill-dot dot-skill2"></div>
                                <span class="net-worth-skill-text">
                                    <p class="net-worth-label-title-skill3">Model Serving</p> can add another <span class="net-worth-label-value-skill3">$21.6k</span>
                                </span>
                            </div>
                            <div class="net-worth-skill-row">
                                <div class="net-worth-skill-dot dot-skill3"></div>
                                <span class="net-worth-skill-text">
                                    <p class="net-worth-label-title-skill3">Model Serving</p> can make you an indispensable engineer, adding another 
                                    <span class="net-worth-label-value-skill3"> $21.6k</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="container">
                <div class="heading-1 ik-advantage-title">IK Led Career Boost</div>
                <div class="net-worth-wrapper">
                    <div class="net-worth-container">
                        <div class="net-worth-header-container">
                            <div class="net-worth-header-title-wrap">
                                <div class="net-worth-header">Projection</div>
                                <div class="net-worth-subtitle">
                                    Net-worth growth comparison
                                </div>
                            </div>
                            <div class="net-growth-labels">
                                <div class="net-growth-label">
                                    <div class="net-growth-ellipse ai-enabled"></div>
                                    <div class="net-growth-label-text">AI Enabled Via IK</div>
                                </div>
                                <div class="net-growth-label">
                                    <div class="net-growth-ellipse industry-average"></div>
                                    <div class="net-growth-label-text">
                                        Industry Average (AI-Enabled)
                                    </div>
                                </div>
                                <div class="net-growth-label">
                                    <div class="net-growth-ellipse non-ai-enabled"></div>
                                    <div class="net-growth-label-text">Non-AI Enabled</div>
                                </div>
                            </div>
                        </div>
                        <div class="net-growth-chart-container">
                            <canvas id="networthGrowthChart" height="316"></canvas>
                        </div>
                        <div class="net-growth-indicator-container">
                            <div class="net-growth-indicatior-wrap">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                                    <path d="M8.89893 14.0901V3.70801" stroke="white" stroke-width="1.48315"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M3.70801 8.89905L8.89905 3.70801L14.0901 8.89905" stroke="white"
                                        stroke-width="1.48315" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p>Net worth in USD</p>
                            </div>
                            <div class="net-growth-indicatior-wrap">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18"
                                    fill="none">
                                    <path d="M4.50586 8.89893H14.8879" stroke="white" stroke-width="1.48315"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.69678 3.70801L14.8878 8.89905L9.69678 14.0901" stroke="white"
                                        stroke-width="1.48315" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p>Years after upskilling</p>
                            </div>
                        </div>
                    </div>

                    <div class="net-worth-metrics-container">
                        <div class="net-worth-metrics-row">
                            <div class="net-worth-metric-card">
                                <div class="net-worth-metric-number" id="average-salary-hike">
                                    66.5%
                                </div>
                                <div class="net-worth-metric-desc">
                                    Average salary hike for IK Alumni
                                </div>
                            </div>
                            <div class="net-worth-metric-card">
                                <div class="net-worth-metric-number" id="highest-compensation">
                                    $1.2M
                                </div>
                                <div class="net-worth-metric-desc">
                                    Highest compensation for our learners
                                </div>
                            </div>
                        </div>
                        <div class="net-worth-metrics-row">
                            <div class="net-worth-metric-card">
                                <div class="net-worth-metric-number" id="highest-number-of-offers">
                                    18
                                </div>
                                <div class="net-worth-metric-desc">
                                    Highest number of offers bagged by our learners
                                </div>
                            </div>
                            <div class="net-worth-metric-card">
                                <div class="net-worth-metric-number" id="average-compensation-package">
                                    $312,275
                                </div>
                                <div class="net-worth-metric-desc">
                                    Average compensation package for alumni
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container">
                <div class="discover-container">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/discovery.webp" alt="" />
                    <div class="discover-content">
                        <h1>Join specialized career coaching and mentoring programs</h1>
                        <p>Don't miss out on this opportunity to truly understand where you stand and what you need to do to turbocharge your career.</p>
                            <a href="#salary_webinar_form">
                                <button class="nav-btn btn btn-primary">
                                    Connect with FAANG Expert
                                </button>
                            </a>
                    </div>
                </div>
            </section>
            <!-- Footer Section -->
            <section class="container footer-container">
                <a href="/big-tech-road-map/">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/bigtechroadmap.svg" alt="" />
                </a>
            </section>
        </div>
    </main>
    <?php get_footer(); ?>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@3.1.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>
    <script src="./ai-roadmap.js"></script> -->
