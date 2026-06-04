<?php
/* 
Template Name: Salary AI Result
*/

get_header();
?>
<!-- html code -->
 <!-- shimmer loader -->
<div id="shimmer-loader"><?php get_template_part('templates/salary-shimmer'); ?></div>
<main id="results-content" style="display:none;">
    <div class="parallax-container">
        <nav class="container nav-container">
            <div class="logo">
                <a href="/ai-salary-analyzer">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/SalaryScopeLogoDarkTheme.svg" alt="" />
                </a>
            </div>
            <div class="nav-content">
                <p class="nav-text">
                    Learn in-demand AI/ML skills and stay ahead in today's changing tech
                    landscape.
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
                        Analysis Results for
                        <span class="results-name" id="analysis-results-name">[Firstname] [lastname]</span>
                    </h1>
                </div>
                <div class="results-btn-container">
                    <button id="shareButton" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path
                                d="M12 5.33333C13.1046 5.33333 14 4.4379 14 3.33333C14 2.22876 13.1046 1.33333 12 1.33333C10.8954 1.33333 10 2.22876 10 3.33333C10 4.4379 10.8954 5.33333 12 5.33333Z"
                                stroke="#E7FFAA" stroke-width="1.16667" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M4 10C5.10457 10 6 9.10457 6 8C6 6.89543 5.10457 6 4 6C2.89543 6 2 6.89543 2 8C2 9.10457 2.89543 10 4 10Z"
                                stroke="#E7FFAA" stroke-width="1.16667" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M12 14.6667C13.1046 14.6667 14 13.7712 14 12.6667C14 11.5621 13.1046 10.6667 12 10.6667C10.8954 10.6667 10 11.5621 10 12.6667C10 13.7712 10.8954 14.6667 12 14.6667Z"
                                stroke="#E7FFAA" stroke-width="1.16667" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5.72656 9.00652L10.2799 11.6598" stroke="#E7FFAA" stroke-width="1.16667"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.2732 4.33984L5.72656 6.99318" stroke="#E7FFAA" stroke-width="1.16667"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Share This Tool
                    </button>
                    <div id="shareOptionsModal" class="share-options-modal" style="display: none;">
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
                            <div class="border-left-line" style="border-left-width: 0; border-color: #54627975; border-style: solid; height: 38px; margin: 0 7px;"></div>
                                <a href="#" id="shareFacebook" class="share-icon">
                                    <!-- Facebook Icon -->
                                    <img class="share-icon"
                                        src="https://staging-07b2-interviewkickstart.wpcomstaging.com/wp-content/themes/hello-elementor-child-FT-1/assets/img/facebook.svg"
                                        alt="Facebook Icon">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M9.333 6.667h2.333v-2.666H9.333V2.666C9.333 1.739 9.866 1 10.777 1h1.556V0h-2.222c-2.002 0-3.556 1.526-3.556 3.417v2.25H4.444v2.666h2.222V16h2.667v-7.083h2.292l.333-2.667h-2.625V6.667z" fill="#1877F2"></path></svg> -->
                                </a>
                                <a href="#" id="shareTwitter" class="share-icon">
                                    <!-- Twitter Icon -->
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M15.966 3.049a6.39 6.39 0 01-1.875.513c.673-.402 1.18-.967 1.426-1.675-.627.37-1.318.636-2.057.779-.591-.63-1.39-1.021-2.268-1.021-1.721 0-3.114 1.31-3.114 2.92 0 .228.03.45.086.663-2.591-.127-4.888-1.37-6.418-3.235-.268.451-.42.978-.42 1.536 0 1.062.506 2.003 1.269 2.553-.464-.015-.902-.142-1.288-.354-.001.012-.001.024-.001.036-.002 2.574 1.84 4.723 4.286 5.223-.448.128-.92.2-1.403.2-.342 0-.676-.033-.997-.1.676 2.086 2.535 3.595 4.768 3.635-1.749 1.365-3.954 2.145-6.351 2.145-.415 0-.827-.024-1.237-.073 2.274 1.471 4.91 2.33 7.582 2.33 9.106 0 14.086-7.463 14.086-13.95 0-.211-.002-.421-.008-.632.966-.699 1.804-1.576 2.464-2.574-.898.398-1.87.67-2.89.8z" fill="#1DA1F2"></path></svg> -->
                                    <img class="share-icon"
                                        src="https://staging-07b2-interviewkickstart.wpcomstaging.com/wp-content/themes/hello-elementor-child-FT-1/assets/img/twitter-x.svg"
                                        alt="Twitter Icon">
                                </a>
                                <a href="#" id="shareWhatsApp" class="share-icon">
                                    <!-- WhatsApp Icon -->
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M13.2 2.8a7.2 7.2 0 10-10.4 10.4 7.1 7.1 0 00-.4 1.8l-1.2 3.2a.3.3 0 00.3.4c1.1 0 2.3-.3 3.3-.9 1.7.8 3.6 1.2 5.4 1.2 4 0 7.2-3.2 7.2-7.2 0-4-3.2-7.2-7.2-7.2zm-7.2 12c-1.6 0-3.1-.5-4.4-1.3l-.5 1.5c-.1.3-.3.4-.5.3-.1-.1-.1-.2-.1-.3l.4-1.3c-.5-.4-.9-.8-1.3-1.2-.2-.2-.3-.4-.4-.6-.2-.4-.3-.8-.4-1.3-.1-.5-.2-1.1-.2-1.6 0-.5.1-.9.2-1.3.1-.5.3-.9.5-1.3.2-.3.4-.6.7-.9.3-.4.6-.8.9-1.1 1.1-.5.5-1.1.7-1.7.7-.2 0-.5 0-.7-.1-.4-.1-.7-.4-.8-.8-.1-.4-.1-.7-.1-1.1.1-.6.2-1.1.5-1.5.2-.3.5-.5.9-.6.4-.1.8-.2 1.3-.2 1.3 0 2.5.5 3.5 1.3 1.1.8 2.1 1.9 2.8 3.3-.2.4-.5.8-.9 1.2z" fill="#25D366"></path></svg> -->
                                    <img class="share-icon"
                                        src="https://staging-07b2-interviewkickstart.wpcomstaging.com/wp-content/themes/hello-elementor-child-FT-1/assets/img/whatsapp.svg"
                                        alt="Whatapp Icon">
                                </a>
                                <a href="#" id="shareLinkedIn" class="share-icon">
                                    <!-- LinkedIn Icon -->
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M0 1.333v13.334h4.667v-7.334h1.5v7.334h4.667v-8.5h1.5v8.5h3v-13.334h-3v7.334h-1.5v-7.334h-4.667v7.334h-1.5v-7.334h-3v13.334h3v-7.334h1.5v7.334h4.667v-8.5h1.5v8.5h3v-13.334h-3z" fill="#0077B5"></path></svg> -->
                                    <img class="share-icon"
                                        src="https://staging-07b2-interviewkickstart.wpcomstaging.com/wp-content/themes/hello-elementor-child-FT-1/assets/img/linkedin.svg"
                                        alt="Linkdin Icon">
                                </a>
                            </div>
                        </div>
                    <button class="btn btn-secondary" id="copyButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <g clip-path="url(#clip0_531_908)">
                                <path
                                    d="M6.66699 8.66668C6.95329 9.04943 7.31856 9.36613 7.73803 9.5953C8.15749 9.82448 8.62133 9.96076 9.09809 9.9949C9.57485 10.029 10.0534 9.96026 10.5012 9.7932C10.9491 9.62614 11.3557 9.36472 11.6937 9.02668L13.6937 7.02668C14.3009 6.398 14.6368 5.556 14.6292 4.68201C14.6216 3.80802 14.2711 2.97198 13.6531 2.35395C13.035 1.73592 12.199 1.38536 11.325 1.37777C10.451 1.37017 9.609 1.70615 8.98033 2.31335L7.83366 3.45335"
                                    stroke="#E7FFAA" stroke-width="1.33" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M9.33347 7.33331C9.04716 6.95055 8.68189 6.63385 8.26243 6.40468C7.84297 6.17551 7.37913 6.03923 6.90237 6.00508C6.4256 5.97094 5.94708 6.03973 5.49924 6.20678C5.0514 6.37384 4.64472 6.63526 4.3068 6.97331L2.3068 8.97331C1.69961 9.60198 1.36363 10.444 1.37122 11.318C1.37881 12.192 1.72938 13.028 2.3474 13.646C2.96543 14.2641 3.80147 14.6146 4.67546 14.6222C5.54945 14.6298 6.39146 14.2938 7.02013 13.6866L8.16013 12.5466"
                                    stroke="#E7FFAA" stroke-width="1.33" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_531_908">
                                    <rect width="16" height="16" fill="white" />
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
                                <canvas id="market-value-worth"></canvas>
                                <div class="pointer"></div>
                                <div id="gaugeCenter">
                                    <div class="gauage-range" id="gauage-range-val">
                                        65k–85k
                                    </div>
                                    <div class="range-label">(Mid-Range)</div>
                                </div>
                                <div class="tick-left" id="lower-range-label">30k</div>
                                <div class="tick-right" id="upper-range-label">120k</div>
                            </div>
                        </div>
                        <div class="worth-section">
                            <div class="worth-title heading-2">What you're worth</div>
                            <div class="worth-desc">
                                You're on your way! Your profile shows potential, but there's
                                room to grow when it comes to aligning with AI-first. room to
                                grow.
                            </div>
                        </div>
                        <div class="similar-roles-section">
                            <div class="similar-roles-title heading-2">
                                Salary ranges for similar roles
                            </div>
                            <div class="similar-roles-list">
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
                                    Variable: <span id="variable-pay">20%</span>
                                </div>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color fixed-pay"></div>
                                <div class="legend-text">
                                    Fixed: <span id="fixed-pay">40%</span>
                                </div>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color equity-pay"></div>
                                <div class="legend-text">
                                    Equity: <span id="equity-pay">40%</span>
                                </div>
                            </div>
                        </div>

                        <div class="comp-content">
                            <p class="comp-title heading-2">Comp Break-up Estimate</p>
                            <p class="comp-subtitle">
                                You're on your way! Your profile shows potential, but there's
                                room to grow when it comes to aligning with AI-first. room to
                                grow.
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
                                    <span>Today, 6PM</span>     
                                    <img id="btnLoader" class="btn-loader" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/loadar.svg" alt="Loading">
                                </button>
                                <button class="register-session-slot btn btn-primary" id="slot2">
                                    <span>Tomorrow 11 AM</span> 
                                    <img id="btnLoader" class="btn-loader"  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/loadar.svg" alt="Loading">
                                </button>
                                <a href="#salary_webinar_form">
                                    <button class="register-session-slot more btn btn-primary" id="slots-more">
                                        More Slots &rarr;
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
                            <canvas id="careerProjectionChart" width="700" height="304"></canvas>
                        </div>
                    </div>
                </div>
                <div class="carrer-projection-percentage">
                    <div class="projection-percentage-card gradient-orange">
                        <div class="projection-percentage-circle">
                            <div class="projection-percentage-bg" id="projectionPercentageBg"></div>
                            <div class="projection-percentage-text" id="projectionPercentageText">
                                <span id="projectionPercentageValue">40%</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18"
                                    fill="none">
                                    <path
                                        d="M9.44204 9.80552C9.31241 9.67125 9.10944 9.64732 8.97934 9.78113C7.7662 11.0289 6.59956 12.2305 5.43184 13.4326C4.36508 14.528 3.29832 15.6218 2.23156 16.7139C1.88261 17.0697 1.46165 17.1797 0.987148 17.0362C0.512645 16.8927 0.230159 16.547 0.125534 16.0585C0.0246022 15.5832 0.201233 15.1933 0.524954 14.8577C2.00447 13.3392 3.48275 11.8203 4.9598 10.301C6.05487 9.17689 7.15076 8.05341 8.24747 6.93056C8.84876 6.31752 9.54482 6.31436 10.1436 6.92108C10.9757 7.76374 11.8022 8.61273 12.6232 9.46803C12.7638 9.6133 12.9745 9.65826 13.1155 9.51339L19.5539 2.8959C19.6332 2.81437 19.5807 2.67164 19.4669 2.67089C18.6668 2.67089 17.8668 2.6791 17.0667 2.66583C16.538 2.65762 16.1399 2.39407 15.9226 1.90048C15.7152 1.42901 15.7841 0.971445 16.1072 0.569494C16.2231 0.42052 16.3708 0.300876 16.5389 0.219789C16.7069 0.138702 16.8909 0.0983401 17.0766 0.101816C18.9918 0.0973918 20.912 0.0935998 22.8297 0.103712C23.554 0.107504 24.0901 0.67251 24.0926 1.41511C24.0987 3.3743 24.0987 5.3335 24.0926 7.29269C24.0926 8.03719 23.5245 8.61989 22.8364 8.61357C22.1484 8.60725 21.6179 8.05109 21.6056 7.3047C21.5939 6.50459 21.6025 5.70385 21.6025 4.90311V4.61722C21.6025 4.58854 21.5881 4.56176 21.5643 4.54586C21.5239 4.519 21.4695 4.53099 21.4426 4.57135C21.3857 4.65687 21.324 4.73895 21.2578 4.81715C18.8092 7.3363 16.3587 9.85355 13.9064 12.3689C13.2682 13.023 12.5783 13.0243 11.9426 12.3746C11.1076 11.521 10.2741 10.6646 9.44204 9.80552Z"
                                        fill="#FF9201" />
                                </svg>
                            </div>
                        </div>
                        <div class="projection-percentage-content">
                            <div class="percentage-title">
                                Your current role has a
                                <span id="projectionPercentageValueDisplay">40%</span> chance of
                                being impacted by AI.
                            </div>
                            <div class="percentage-desc">
                                Percent chance your role will be automated or augmented by AI
                                by 2030. Up to 47% of US jobs could be automated by 2030
                                (McKinsey Global Institute).
                            </div>
                        </div>
                    </div>
                    <div class="projection-percentage-card gradient-yellow">
                        <div class="projection-percentage-content">
                            <div class="percentage-title">
                                <span id="upskill-percentage-display">55%</span> of the workforce in
                                <span id="upskill-domain">[domain]</span> earning more through
                                Upskilling.
                            </div>
                            <div class="percentage-desc">
                                Percent chance your role will be automated or augmented by AI
                                by 2030. Up to 47% of US jobs could be automated by 2030
                                (McKinsey Global Institute).
                            </div>
                        </div>
                        <div class="projection-percentage-circle">
                            <div class="projection-percentage-bg" id="upskillPercentageBg"></div>
                            <div class="projection-percentage-text" id="upskillPercentageText">
                                55%
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="explore-masterclass-container">
                <div class="explore-masterclass-card">
                    <div class="explore-masterclass-header">
                        <div class="explore-masterclass-desc">
                            Unlock your potential in AI quickly and elevate your skills for
                            the future of technology.
                        </div>
                        <div class="explore-masterclass-title">
                            Explore our masterclasses
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
            </div>
        </section>

        <section class="container">
            <p class="heading-1 salary-uplift-title">
                Skills and Compensation Correlation
            </p>
            <div class="skills-compensation-container">
                <div class="salary-uplift-container">
                    <div class="heading-2">
                        High value skills & their potential salary uplift
                    </div>
                    <div class="salary-uplift-chart">
                        <canvas id="salaryUpliftChart"></canvas>
                    </div>
                </div>

                <div class="net-worth-potential-container">
                    <div class="heading-2">Your net worth potential with AI skills</div>
                    <div class="net-worth-amt">
                        <span class="net-worth-amt-lower" id="net-worth-amt-lower">$200,000</span> -
                        <span class="net-worth-amt-upper" id="net-worth-amt-upper">$220,000</span>
                    </div>
                    <div class="projected-net-worth-container">
                        <div class="net-worth-label projected-label">
                            <div class="net-worth-label-value" id="net-worth-label-value-projected">$200,000</div>
                            <div class="net-worth-label-title" id=>Projected Net-Worth</div>
                        </div>
                        <div class="net-worth-label skill-label skill1">
                            <div class="net-worth-label-value net-worth-label-value-skill1">$200,000</div>
                            <div class="net-worth-label-title net-worth-label-title-skill1"></div>
                        </div>
                        <div class="net-worth-label skill-label skill2">
                            <div class="net-worth-label-value net-worth-label-value-skill2">$200,000</div>
                            <div class="net-worth-label-title net-worth-label-title-skill2"></div>
                        </div>
                        <div class="net-worth-label skill-label skill3">
                            <div class="net-worth-label-value net-worth-label-value-skill3">$200,000</div>
                            <div class="net-worth-label-title net-worth-label-title-skill3"></div>
                        </div>
                    </div>
                    <div class="projected-net-worth-skills">
                        <div class="net-worth-skill-row">
                            <div class="net-worth-skill-dot dot-base"></div>
                            <span class="net-worth-skill-text">Your current projected net worth is estimated between
                                <span id="low-net-worth">$100,000</span> -
                                <span id="high-net-worth">$120,000</span>
                            </span>
                        </div>
                        <div class="net-worth-skill-row">
                            <div class="net-worth-skill-dot dot-skill1"></div>
                            <span class="net-worth-skill-text">
                                <p class="net-worth-label-title-skill1"></p> can significantly elevate your engineering
                                value, unlocking up to
                                <span class="net-worth-label-value-skill1">$100,000</span> in
                                additional potential.
                            </span>
                        </div>
                        <div class="net-worth-skill-row">
                            <div class="net-worth-skill-dot dot-skill2"></div>
                            <span class="net-worth-skill-text">
                                <p class="net-worth-label-title-skill2"></p> adds strategic depth, increasing your
                                worth by
                                another
                                <span class="net-worth-label-value-skill2">$100,000</span>.
                            </span>
                        </div>
                        <div class="net-worth-skill-row">
                            <div class="net-worth-skill-dot dot-skill3"></div>
                            <span class="net-worth-skill-text">
                                <p class="net-worth-label-title-skill3"></p> positions you as a high-leverage engineer,
                                unlocking an additional
                                <span class="net-worth-label-value-skill3">$100,000</span> in exit
                                value.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container">
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                    fill="none">
                                    <path d="M8.65186 21.011L21.0115 8.65137" stroke="white" stroke-width="2.47687"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8.65186 8.65137H21.0115V21.011" stroke="white" stroke-width="2.47687"
                                        stroke-linecap="round" stroke-linejoin="round" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"
                                fill="none">
                                <path d="M5.39307 12.8357L12.8088 5.41992" stroke="white" stroke-width="1.48315"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5.39307 5.41992H12.8088V12.8357" stroke="white" stroke-width="1.48315"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                </div>
                <div class="course-card">
                    <a href="#" target="_blank" id="course-card-link-2">

                        <div class="course-card-image course-card-image-2">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/course2.png" alt="course-card-image-2" />
                            <span class="course-card-arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                        fill="none">
                                        <path d="M8.65186 21.011L21.0115 8.65137" stroke="white" stroke-width="2.47687"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8.65186 8.65137H21.0115V21.011" stroke="white" stroke-width="2.47687"
                                            stroke-linecap="round" stroke-linejoin="round" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"
                                fill="none">
                                <path d="M5.39307 12.8357L12.8088 5.41992" stroke="white" stroke-width="1.48315"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5.39307 5.41992H12.8088V12.8357" stroke="white" stroke-width="1.48315"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                </div>
                <div class="course-card">
                    <a href="#" target="_blank" id="course-card-link-3">

                        <div class="course-card-image course-card-image-3">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/course3.png" alt="course-card-image-3" />
                            <span class="course-card-arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                        fill="none">
                                        <path d="M8.65186 21.011L21.0115 8.65137" stroke="white" stroke-width="2.47687"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8.65186 8.65137H21.0115V21.011" stroke="white" stroke-width="2.47687"
                                            stroke-linecap="round" stroke-linejoin="round" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"
                                fill="none">
                                <path d="M5.39307 12.8357L12.8088 5.41992" stroke="white" stroke-width="1.48315"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5.39307 5.41992H12.8088V12.8357" stroke="white" stroke-width="1.48315"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                </div>
                <div class="course-card view-all">
                    <div class="view-all-content">
                        <div class="view-all-title">We've got more</div>
                        <div class="view-all-desc">
                            Check out our array of AI/ML courses tailored to upleveling your
                            career.
                        </div>
                        <button class="view-all-btn btn btn-primary" id="view-all-courses">
                            <a href="https://staging-07b2-interviewkickstart.wpcomstaging.com/?utm_source=L10_pagex&utm_campaign=L10x_Salary_Analyser" target="_blank">View all courses</a>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="container">
            <div class="heading-1 ik-advantage-title">The IK advantage</div>
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
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3.70801 8.89905L8.89905 3.70801L14.0901 8.89905" stroke="white"
                                    stroke-width="1.48315" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p>Net worth in USD</p>
                        </div>
                        <div class="net-growth-indicatior-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18"
                                fill="none">
                                <path d="M4.50586 8.89893H14.8879" stroke="white" stroke-width="1.48315"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.69678 3.70801L14.8878 8.89905L9.69678 14.0901" stroke="white"
                                    stroke-width="1.48315" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p>Years after upskilling</p>
                        </div>
                    </div>
                </div>

                <div class="net-worth-metrics-container">
                    <div class="net-worth-metrics-row">
                        <div class="net-worth-metric-card">
                            <div class="net-worth-metric-number" id="average-salary-hike">66.5%</div>
                            <div class="net-worth-metric-desc">
                                Average salary hike for IK Alumni
                            </div>
                        </div>
                        <div class="net-worth-metric-card">
                            <div class="net-worth-metric-number" id="highest-compensation">
                                $1.2 M
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
                    <h1>Discover What Your Skills &amp; Experience Are Worth.</h1>
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
        </section>
        <!-- Footer Section -->
        <section class="container footer-container">
            <a href="/ai-salary-analyzer">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/SalaryScopeLogoDarkTheme.svg" alt="" />
            </a>
        </section>
    </div>
</main>

<?php get_footer(); ?>