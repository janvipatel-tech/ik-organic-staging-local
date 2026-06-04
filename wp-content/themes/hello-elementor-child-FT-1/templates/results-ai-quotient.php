<?php
/* 
Template Name: Result AI Quotient
*/
get_header();
?>



<!-- shimmer loader-->
<div id="shimmer-loader"><?php get_template_part('templates/shimmer-loader'); ?></div>
 <main id="results-content" style="display:none;">
 <section class="container result-section">
            <div class="result-section-header">
            <h1>Analysis Results for <span><span id="first-name"></span> <span id="last-name"></span></span></h1>
                <div class="button-wrapper">
                    <button id="shareButton"class="icon-btn btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none">
                            <path d="M12 5.33301C13.1046 5.33301 14 4.43758 14 3.33301C14 2.22844 13.1046 1.33301 12 1.33301C10.8954 1.33301 10 2.22844 10 3.33301C10 4.43758 10.8954 5.33301 12 5.33301Z"  stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4 10C5.10457 10 6 9.10457 6 8C6 6.89543 5.10457 6 4 6C2.89543 6 2 6.89543 2 8C2 9.10457 2.89543 10 4 10Z"  stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 14.667C13.1046 14.667 14 13.7716 14 12.667C14 11.5624 13.1046 10.667 12 10.667C10.8954 10.667 10 11.5624 10 12.667C10 13.7716 10.8954 14.667 12 14.667Z"  stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.72656 9.00684L10.2799 11.6602"  stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.2732 4.33984L5.72656 6.99318"  stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Share This Tool </button>

                            <!-- Share Options Modal -->
                        <div id="shareOptionsModal" class="share-options-modal" style="display: none;">
                            <div class="share-icons">
                                <button id="copy-results-link" class="icon-btn btn-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">
                                        <path d="M4.9375 11.3854C4.57083 11.3854 4.25706 11.255 3.99617 10.9941C3.73483 10.7327 3.60417 10.4187 3.60417 10.0521V2.05208C3.60417 1.68542 3.73483 1.37142 3.99617 1.11008C4.25706 0.849194 4.57083 0.71875 4.9375 0.71875H10.9375C11.3042 0.71875 11.6182 0.849194 11.8795 1.11008C12.1404 1.37142 12.2708 1.68542 12.2708 2.05208V10.0521C12.2708 10.4187 12.1404 10.7327 11.8795 10.9941C11.6182 11.255 11.3042 11.3854 10.9375 11.3854H4.9375ZM4.9375 10.0521H10.9375V2.05208H4.9375V10.0521ZM2.27083 14.0521C1.90417 14.0521 1.59017 13.9216 1.32883 13.6607C1.06794 13.3994 0.9375 13.0854 0.9375 12.7187V4.05208C0.9375 3.86319 1.0015 3.70475 1.1295 3.57675C1.25706 3.44919 1.41528 3.38542 1.60417 3.38542C1.79306 3.38542 1.9515 3.44919 2.0795 3.57675C2.20706 3.70475 2.27083 3.86319 2.27083 4.05208V12.7187H8.9375C9.12639 12.7187 9.28483 12.7827 9.41283 12.9107C9.54039 13.0383 9.60417 13.1965 9.60417 13.3854C9.60417 13.5743 9.54039 13.7325 9.41283 13.8601C9.28483 13.9881 9.12639 14.0521 8.9375 14.0521H2.27083Z" fill="#0082f8" stroke="none"></path>
                                    </svg>
                                    Copy Link
                                </button>
                                <div class="border-left-line" style="border-left-width: 0;
	border-color: #54627975;
	border-style: solid; height: 38px; margin: 0 7px;"></div>
                                <a href="#" id="shareFacebook" class="share-icon">
                                    <!-- Facebook Icon -->
                                     <img class="share-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/facebook.svg" alt="Facebook Icon">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M9.333 6.667h2.333v-2.666H9.333V2.666C9.333 1.739 9.866 1 10.777 1h1.556V0h-2.222c-2.002 0-3.556 1.526-3.556 3.417v2.25H4.444v2.666h2.222V16h2.667v-7.083h2.292l.333-2.667h-2.625V6.667z" fill="#1877F2"></path></svg> -->
                                </a>
                                <a href="#" id="shareTwitter" class="share-icon">
                                    <!-- Twitter Icon -->
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M15.966 3.049a6.39 6.39 0 01-1.875.513c.673-.402 1.18-.967 1.426-1.675-.627.37-1.318.636-2.057.779-.591-.63-1.39-1.021-2.268-1.021-1.721 0-3.114 1.31-3.114 2.92 0 .228.03.45.086.663-2.591-.127-4.888-1.37-6.418-3.235-.268.451-.42.978-.42 1.536 0 1.062.506 2.003 1.269 2.553-.464-.015-.902-.142-1.288-.354-.001.012-.001.024-.001.036-.002 2.574 1.84 4.723 4.286 5.223-.448.128-.92.2-1.403.2-.342 0-.676-.033-.997-.1.676 2.086 2.535 3.595 4.768 3.635-1.749 1.365-3.954 2.145-6.351 2.145-.415 0-.827-.024-1.237-.073 2.274 1.471 4.91 2.33 7.582 2.33 9.106 0 14.086-7.463 14.086-13.95 0-.211-.002-.421-.008-.632.966-.699 1.804-1.576 2.464-2.574-.898.398-1.87.67-2.89.8z" fill="#1DA1F2"></path></svg> -->
                                    <img class="share-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/twitter-x.svg" alt="Twitter Icon">
                                </a>
                                <a href="#" id="shareWhatsApp" class="share-icon">
                                    <!-- WhatsApp Icon -->
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M13.2 2.8a7.2 7.2 0 10-10.4 10.4 7.1 7.1 0 00-.4 1.8l-1.2 3.2a.3.3 0 00.3.4c1.1 0 2.3-.3 3.3-.9 1.7.8 3.6 1.2 5.4 1.2 4 0 7.2-3.2 7.2-7.2 0-4-3.2-7.2-7.2-7.2zm-7.2 12c-1.6 0-3.1-.5-4.4-1.3l-.5 1.5c-.1.3-.3.4-.5.3-.1-.1-.1-.2-.1-.3l.4-1.3c-.5-.4-.9-.8-1.3-1.2-.2-.2-.3-.4-.4-.6-.2-.4-.3-.8-.4-1.3-.1-.5-.2-1.1-.2-1.6 0-.5.1-.9.2-1.3.1-.5.3-.9.5-1.3.2-.3.4-.6.7-.9.3-.4.6-.8.9-1.1 1.1-.5.5-1.1.7-1.7.7-.2 0-.5 0-.7-.1-.4-.1-.7-.4-.8-.8-.1-.4-.1-.7-.1-1.1.1-.6.2-1.1.5-1.5.2-.3.5-.5.9-.6.4-.1.8-.2 1.3-.2 1.3 0 2.5.5 3.5 1.3 1.1.8 2.1 1.9 2.8 3.3-.2.4-.5.8-.9 1.2z" fill="#25D366"></path></svg> -->
                                    <img class="share-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/whatsapp.svg" alt="Whatapp Icon">
                                </a>
                                <a href="#" id="shareLinkedIn" class="share-icon">
                                    <!-- LinkedIn Icon -->
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><path d="M0 1.333v13.334h4.667v-7.334h1.5v7.334h4.667v-8.5h1.5v8.5h3v-13.334h-3v7.334h-1.5v-7.334h-4.667v7.334h-1.5v-7.334h-3v13.334h3v-7.334h1.5v7.334h4.667v-8.5h1.5v8.5h3v-13.334h-3z" fill="#0077B5"></path></svg> -->
                                    <img class="share-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/linkedin.svg" alt="Linkdin Icon">
                                </a>
                            </div>
                        </div>
                    <button id="copyButton" class=" icon-btn btn-outline"><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 16 16" fill="none">
                            <g clip-path="url(#clip0_747_2718)">
                                <path
                                    d="M6.66663 8.66697C6.95293 9.04972 7.3182 9.36642 7.73766 9.59559C8.15712 9.82477 8.62096 9.96105 9.09773 9.99519C9.57449 10.0293 10.053 9.96055 10.5009 9.79349C10.9487 9.62643 11.3554 9.36501 11.6933 9.02697L13.6933 7.02697C14.3005 6.39829 14.6365 5.55629 14.6289 4.6823C14.6213 3.80831 14.2707 2.97227 13.6527 2.35424C13.0347 1.73621 12.1986 1.38565 11.3246 1.37806C10.4506 1.37046 9.60863 1.70644 8.97996 2.31364L7.83329 3.45364"
                                     stroke-width="1.33" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M9.33334 7.33283C9.04704 6.95008 8.68177 6.63338 8.26231 6.40421C7.84285 6.17503 7.37901 6.03875 6.90224 6.00461C6.42548 5.97047 5.94695 6.03925 5.49911 6.20631C5.05128 6.37337 4.6446 6.63479 4.30668 6.97283L2.30668 8.97283C1.69948 9.60151 1.3635 10.4435 1.3711 11.3175C1.37869 12.1915 1.72926 13.0275 2.34728 13.6456C2.96531 14.2636 3.80135 14.6142 4.67534 14.6217C5.54933 14.6293 6.39134 14.2934 7.02001 13.6862L8.16001 12.5462"
                                     stroke-width="1.33" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_747_2718">
                                    <rect width="16" height="16" fill="white" />
                                </clipPath>
                            </defs>
                        </svg> Copy link to your results</button>
                </div>
            </div>
            <div class="result-section-body section-y-space ">
                <div class="result-section-body-left">
                    <div class="result-left-box">
                        <h5>Your <span>AI-Readiness Score</span> </h5>
                        <div class="gauge-chart-wrapper">
                            <canvas id="gaugeChart"></canvas>
                        </div>
                        <p id="ai-summary-text">You’re on your way! Your profile shows potential, but there's room to grow when it comes to aligning with AI-first roles at top tech companies ✨🚀</p>
                    </div>
                    <div class="result-right-box">
                        <h2>Your <span>skill gaps</span></h2>
                        <div class="result-box-wrapper">
                            <div class="chart-container">
                                <canvas id="radarChart"></canvas>
                          
                                <!-- Custom Legend -->
                                <div class="custom-legend">
                                  <div class="legend-item">
                                    <div class="legend-color your-skill"></div>
                                    <span>Your skill graph</span>
                                  </div>
                                  <div class="legend-item">
                                    <div class="legend-color required-skill"></div>
                                    <span>Skill graph required for your level</span>
                                  </div>
                                </div>
                              </div>
                            <div class="result-pera-box">
                                <p class="result-pera">You're on your way! Your profile shows potential, but there's room to grow when it comes to aligning with AI-first. The following skills need to be sharpened:</p>
                                    <div class="result-pera-box-list" id="result-pera-box-list">
                                        <!-- <div class="result-pera-box-item"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/img/bar-chart.png" alt="bar-chart"> Brush up on Data Analysis </div>
                                        <div class="result-pera-box-item"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/img/gear.png" alt="gear"> Learn systems engineering</div>
                                        <div class="result-pera-box-item"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/img/chart.png" alt=""> Brush up on Data Analysis</div>
                                        <div class="result-pera-box-item"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/img/books.png" alt=""> Brush up on Data Analysis</div>
                                        <div class="result-pera-box-item"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/img/bar-chart.png" alt=""> Brush up on Data Analysis</div> -->
                                    </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section>

        <section class="container roadmap-section">
            <div class="roadmap-section-header">
                <h3 id="fname">[Firstname] 's  2-year  <span>Personalized Career Roadmap</span> </h3>
                <p id ="role-suggested">To becoming AI-Enabled [role suggested for user]</p>
            </div>
            <div class="roadmap-section-body">
                <div class="roadmap-section-body-right">
                    <div class="roadmap-card-wrapper pb-80">
                        <div class="steps-wrapper">
                            <div class="icon-wrapper">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/flag.png" alt="Flag">
                            </div>
                            <div class="steps-detail-box">
                                <h5 class="steps-title" id="current-job-date">April - June, 2025</h5>
                                <p class="steps-pera">Current Role: <span id="current-job-title">Software Engineer 1</span></p>
                            </div>
                        </div>
                        <div class="steps-detail-box mobile-version">
                            <h5 class="steps-title" id="current-job-date-mobile">April - June, 2025</h5>
                            <p class="steps-pera">Current Role: <span id="current-job-title-mob">Software Engineer 1</span></p>
                        </div>
                        <div class="card-wrapper-for-steps1">
                            <div class="prepare-for-ai-role">
                                <div class="badges rounded">
                                    You're Here!
                                </div>
                                <h4>Prepare for your role transition</h4>
                                <p id="current-job-summary">our profile shows potential, but there's room to grow when it comes to aligning with AI-first roles at top tech companies.. our profile shows potential, but there's room to grow when it comes to aligning with AI-first roles at top tech companies.</p>
                                <p class="bold-text">Skills you will need to gain</p>
                                <div class="skills-list" id="current-skills">
                                    <!-- <div class="badges">
                                        Data Analysis
                                    </div>
                                    <div class="badges">
                                        Data Analysis
                                    </div>
                                    <div class="badges">
                                        Data Analysis
                                    </div> -->
                                </div>
                                </div>
                                <div class="widget-wrapper">
                                <div class="widget-box danger">
                                    <p class="title-pera">Role Redundancy Risk</p>
                                    <div class="percentage-box">
                                        <strong id="role-redundancy-risk">80%</strong>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18" fill="none">
                                            <path d="M9.86855 9.96799C9.73892 9.83373 9.53596 9.8098 9.40586 9.94361C8.19271 11.1914 7.02608 12.3929 5.85836 13.595C4.7916 14.6905 3.72484 15.7843 2.65808 16.8764C2.30912 17.2322 1.88816 17.3421 1.41366 17.1987C0.939158 17.0552 0.656672 16.7095 0.552048 16.221C0.451116 15.7457 0.627747 15.3558 0.951467 15.0202C2.43098 13.5017 3.90926 11.9828 5.38632 10.4635C6.48139 9.33937 7.57728 8.21588 8.67399 7.09303C9.27527 6.47999 9.97133 6.47683 10.5702 7.08355C11.4022 7.92622 12.2288 8.7752 13.0498 9.63051C13.1903 9.77578 13.401 9.82074 13.542 9.67587L19.9804 3.05837C20.0597 2.97684 20.0072 2.83412 19.8934 2.83336C19.0934 2.83336 18.2933 2.84158 17.4932 2.82831C16.9646 2.82009 16.5664 2.55655 16.3491 2.06296C16.1417 1.59149 16.2106 1.13392 16.5338 0.73197C16.6497 0.582996 16.7973 0.463351 16.9654 0.382265C17.1335 0.301178 17.3174 0.260816 17.5031 0.264291C19.4183 0.259867 21.3385 0.256075 23.2562 0.266187C23.9806 0.269979 24.5166 0.834986 24.5191 1.57758C24.5252 3.53678 24.5252 5.49597 24.5191 7.45517C24.5191 8.19966 23.951 8.78236 23.263 8.77604C22.5749 8.76972 22.0444 8.21357 22.0321 7.46718C22.0204 6.66707 22.029 5.86632 22.029 5.06558V4.7797C22.029 4.75101 22.0147 4.72423 21.9908 4.70834C21.9504 4.68148 21.896 4.69346 21.8691 4.73382C21.8122 4.81935 21.7506 4.90143 21.6844 4.97963C19.2357 7.49878 16.7853 10.016 14.3329 12.5314C13.6947 13.1855 13.0048 13.1868 12.3691 12.5371C11.5341 11.6834 10.7006 10.8271 9.86855 9.96799Z" fill="#D33E3E"/>
                                            </svg>
                                    </div>
                                    <p class="sub-pera">Recruiters seek AI-savvy candidates</p>
                                </div>
                                <div class="widget-box success">
                                    <p class="title-pera">Reduction in layoff risks </p>
                                    <div class="percentage-box">
                                        <strong id="layoff-risk-reduction">75%</strong> 
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 18" fill="none">
                                            <path d="M9.86855 9.96799C9.73892 9.83373 9.53596 9.8098 9.40586 9.94361C8.19271 11.1914 7.02608 12.3929 5.85836 13.595C4.7916 14.6905 3.72484 15.7843 2.65808 16.8764C2.30912 17.2322 1.88816 17.3421 1.41366 17.1987C0.939158 17.0552 0.656672 16.7095 0.552048 16.221C0.451116 15.7457 0.627747 15.3558 0.951467 15.0202C2.43098 13.5017 3.90926 11.9828 5.38632 10.4635C6.48139 9.33937 7.57728 8.21588 8.67399 7.09303C9.27527 6.47999 9.97133 6.47683 10.5702 7.08355C11.4022 7.92622 12.2288 8.7752 13.0498 9.63051C13.1903 9.77578 13.401 9.82074 13.542 9.67587L19.9804 3.05837C20.0597 2.97684 20.0072 2.83412 19.8934 2.83336C19.0934 2.83336 18.2933 2.84158 17.4932 2.82831C16.9646 2.82009 16.5664 2.55655 16.3491 2.06296C16.1417 1.59149 16.2106 1.13392 16.5338 0.73197C16.6497 0.582996 16.7973 0.463351 16.9654 0.382265C17.1335 0.301178 17.3174 0.260816 17.5031 0.264291C19.4183 0.259867 21.3385 0.256075 23.2562 0.266187C23.9806 0.269979 24.5166 0.834986 24.5191 1.57758C24.5252 3.53678 24.5252 5.49597 24.5191 7.45517C24.5191 8.19966 23.951 8.78236 23.263 8.77604C22.5749 8.76972 22.0444 8.21357 22.0321 7.46718C22.0204 6.66707 22.029 5.86632 22.029 5.06558V4.7797C22.029 4.75101 22.0147 4.72423 21.9908 4.70834C21.9504 4.68148 21.896 4.69346 21.8691 4.73382C21.8122 4.81935 21.7506 4.90143 21.6844 4.97963C19.2357 7.49878 16.7853 10.016 14.3329 12.5314C13.6947 13.1855 13.0048 13.1868 12.3691 12.5371C11.5341 11.6834 10.7006 10.8271 9.86855 9.96799Z"/>
                                            </svg>
                                    </div>
                                    <p class="sub-pera">Layoff risk reduction after upskilling</p>
                                </div>
                                </div>
                                <div class="current-industry-card">
                                <div class="current-industry-title-wrapper">
                                    <div>
                                        <strong id="current-salary">$100k - $200k</strong>
                                        <p class="current-industry-pera mb-40 mobile-pera"> <span>Current Industry</span> Average Salary Range for your role</p>
                                    </div>

                                    <div class="badge-wrapper">
                                        <div class="badge-small success">
                                            <span id ="currentbase"> 30% </span> Fixed 
                                        </div>
                                        <div class="badge-small warning">
                                        <span id ="currentvarible"> 40% </span> Variable
                                        </div>
                                        <div class="badge-small info">
                                        <span id ="currentequity"> 30% </span> Equity
                                        </div>
                                    </div>
                                </div>
                                <p class="current-industry-pera mb-40"> <span>Current Industry</span> Average Salary Range for your role</p>
                                <div class="chart-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 77" fill="none">
                                        <path d="M22.1453 46.1988L-10 38.9858V77.0002H264L266.393 1.75127L262.566 1.16643L241.902 13.0581L233.483 11.8885L207.46 23.0004L204.399 23.9751L175.601 34.697L167.564 36.8414L153.022 24.9496H150.344L133.506 34.697H131.592L116.852 36.2565L101.63 37.2313L97.2804 35.5002L87.8571 29.0002L79.5475 24.5597L75.7207 23.0002L69.5978 24.5597L58.5 37.2313L54.2905 38.9858L45.8715 36.2565L38.2179 37.2313L22.1453 46.1988Z" fill="url(#paint0_linear_0_1279)"/>
                                        <path d="M-10 39.0142L21.8241 46.1766C22.8323 46.4035 23.8801 46.1294 24.6806 45.4759C28.5746 42.2968 40.8362 33.3422 50.7181 37.6634C62.6311 42.8728 63.3257 21.6417 77.2342 23.1932C84.1515 23.9648 82.9832 27.3158 93.6561 33C99.0992 35.8989 97.6118 37.6634 104.529 37.6634L130.325 34.4716C130.792 34.4137 131.267 34.4613 131.714 34.6109L131.848 34.6557C132.788 34.9703 133.821 34.825 134.638 34.2633L148.949 24.4229C150.16 23.59 151.786 23.7035 152.87 24.6966L165.124 35.9248C165.913 36.6481 167.015 36.9219 168.052 36.6522L176.766 34.3837L203.836 25.0001L232.061 12.321C232.697 12.0352 233.41 11.9682 234.088 12.1304L239.786 13.4925C240.632 13.6949 241.525 13.5388 242.252 13.0612L259.693 1.61072C260.57 1.03491 261.676 0.932499 262.643 1.33744L265.707 2.61917" stroke="#4CACFF" stroke-width="2.10435"/>
                                        <defs>
                                        <linearGradient id="paint0_linear_0_1279" x1="127" y1="23.0004" x2="127" y2="77.0004" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#B6DDFF"/>
                                        <stop offset="1" stop-color="white" stop-opacity="0.08"/>
                                        </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                </div>
                        </div>
                        <div class="courser-wrapper">
                            <h4 id="name3">IK courses <span>recommended for John</span></h4>
                            <div class="card-wrapper">
                                <div class="course-card">
                                    <a href="#" target="_blank" id="course-card1">
                                        <div class="card-content-wrapper">
                                            <div class="course-image">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img_1.jpg" alt="Course 1">
                                            </div>
                                            <div class="course-content">
                                                <h5 id="course-title1">AI-Enabled Back-end Engineering</h5>
                                                <p id="course-desc1">A short description of the course to hook the user and convince them to purchase it</p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="icon-for-card">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="none">
                                            <path d="M8.65222 21.011L21.0118 8.65137" stroke-width="2.47687" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.65222 8.65137H21.0118V21.011" stroke-width="2.47687" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="badge-for-card">
                                        <p>Learners got avg 66% salary hike</p>
                                    </div>
                                </div>
                                <div class="course-card">
                                <a href="#" target="_blank" id="course-card2">
                                    <div class="card-content-wrapper">
                                        <div class="course-image">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img_2.png" alt="Course 1">
                                        </div>
                                        <div class="course-content">
                                            <h5 id="course-title2">AI-Enabled Back-end Engineering</h5>
                                            <p id="course-desc2">A short description of the course to hook the user and convince them to purchase it</p>
                                        </div>
                                    
                                    </div>
                                    </a>
                                    <div class="icon-for-card">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="none">
                                            <path d="M8.65222 21.011L21.0118 8.65137" stroke-width="2.47687" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.65222 8.65137H21.0118V21.011" stroke-width="2.47687" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <!-- <div class="badge-for-card">
                                        <p>Fast filling course!</p>
                                    </div> -->
                                </div>
                                <div class="course-card">
                                <a href="#" target="_blank" id="course-card3">
                                    <div class="card-content-wrapper">
                                        <div class="course-image">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img_3.png" alt="Course 1">
                                        </div>
                                        <div class="course-content">
                                            <h5 id="course-title3">AI-Enabled Back-end Engineering</h5>
                                            <p id="course-desc3">A short description of the course to hook the user and convince them to purchase it</p>
                                        </div>
                                    
                                    </div>
                                    </a>
                                   
                                    <div class="icon-for-card">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="none">
                                            <path d="M8.65222 21.011L21.0118 8.65137" stroke-width="2.47687" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.65222 8.65137H21.0118V21.011" stroke-width="2.47687" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="badge-for-card">
                                        <p>Fast filling course!</p>
                                    </div>
                                </div>
                                <div class="blue-card">
                                    <h5>We’ve got more</h5>
                                    <p>Check out our array of AI/ML courses tailored to upleveling your career.</p>
                                    <a href="https://interviewkickstart.com/#courses" target="_blank" class="btn-white">View all courses</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="roadmap-card-wrapper pb-80">
                        <div class="steps-wrapper">
                            <div class="icon-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 43 43" fill="none">
                                    <circle cx="21.5" cy="21.5" r="21" fill="#E9F5FF" stroke="#B6DDFF"/>
                                    </svg>
                            </div>
                            <div class="steps-detail-box">
                                <h5 class="steps-title" id="one-year-job-date">June - Sept, 2025</h5>
                                <p class="steps-pera">Transition to: <span id="one-year-job-title">AI - Software Engineer</span></p>
                            </div>
                        </div>
                        <div class="steps-detail-box mobile-version">
                            <h5 class="steps-title" id="one-year-job-date-mob">June - Sept, 2025</h5>
                            <p class="steps-pera">Transition to: <span id="one-year-job-title-mob">AI - Software Engineer</span></p>
                        </div>
                        <div class="dream-container">
                            <div class="dream-role-card">
                                <h5>Land your dream role</h5>
                                <p id="one-year-job-summary">our profile shows potential, but there's room to grow when it comes to aligning with AI-first roles at top tech companies.. our profile shows potential, but there's room to grow when it comes to aligning with AI-first roles at top tech companies.</p>
                                <p class="bold-text">Skills you will need to gain</p>
                                <div class="skills-list" id="one-year-skills">
                                    <!-- <div class="badges">
                                        Data Analysis
                                    </div>
                                    <div class="badges">
                                        Data Analysis
                                    </div>
                                    <div class="badges">
                                        Data Analysis
                                    </div> -->
                                </div>
                            </div>
                            <div class="current-industry-card">
                                <div class="current-industry-title-wrapper">
                                    <div>
                                        <strong id="one-year-salary">$100k - $200k</strong>
                                        <p class="current-industry-pera mb-40 mobile-pera"> <span>Current Industry</span> Average Salary Range for your role</p>
                                    </div>

                                    <div class="badge-wrapper">
                                    <div class="badge-small success">
                                            <span id ="first-year-base"> 30% </span> Fixed 
                                        </div>
                                        <div class="badge-small warning">
                                        <span id ="first-year-varible"> 40% </span> Variable
                                        </div>
                                        <div class="badge-small info">
                                        <span id ="first-year-equity"> 30% </span> Equity
                                </div>
                                    </div>
                                </div>
                                <p class="current-industry-pera mb-40"> <span>Current Industry</span> Average Salary Range for your role</p>
                                <div class="chart-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 77" fill="none">
                                        <path d="M22.1453 46.1988L-10 38.9858V77.0002H264L266.393 1.75127L262.566 1.16643L241.902 13.0581L233.483 11.8885L207.46 23.0004L204.399 23.9751L175.601 34.697L167.564 36.8414L153.022 24.9496H150.344L133.506 34.697H131.592L116.852 36.2565L101.63 37.2313L97.2804 35.5002L87.8571 29.0002L79.5475 24.5597L75.7207 23.0002L69.5978 24.5597L58.5 37.2313L54.2905 38.9858L45.8715 36.2565L38.2179 37.2313L22.1453 46.1988Z" fill="url(#paint0_linear_0_1279)"></path>
                                        <path d="M-10 39.0142L21.8241 46.1766C22.8323 46.4035 23.8801 46.1294 24.6806 45.4759C28.5746 42.2968 40.8362 33.3422 50.7181 37.6634C62.6311 42.8728 63.3257 21.6417 77.2342 23.1932C84.1515 23.9648 82.9832 27.3158 93.6561 33C99.0992 35.8989 97.6118 37.6634 104.529 37.6634L130.325 34.4716C130.792 34.4137 131.267 34.4613 131.714 34.6109L131.848 34.6557C132.788 34.9703 133.821 34.825 134.638 34.2633L148.949 24.4229C150.16 23.59 151.786 23.7035 152.87 24.6966L165.124 35.9248C165.913 36.6481 167.015 36.9219 168.052 36.6522L176.766 34.3837L203.836 25.0001L232.061 12.321C232.697 12.0352 233.41 11.9682 234.088 12.1304L239.786 13.4925C240.632 13.6949 241.525 13.5388 242.252 13.0612L259.693 1.61072C260.57 1.03491 261.676 0.932499 262.643 1.33744L265.707 2.61917" stroke="#4CACFF" stroke-width="2.10435"></path>
                                        <defs>
                                        <linearGradient id="paint0_linear_0_1279" x1="127" y1="23.0004" x2="127" y2="77.0004" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#B6DDFF"></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0.08"></stop>
                                        </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                </div>
                        </div>
                    </div>
                    <div class="roadmap-card-wrapper">
                        <div class="steps-wrapper border-none">
                            <div class="icon-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 43 43" fill="none">
                                    <circle cx="21.5" cy="21.5" r="19.5" fill="#B6DDFF" stroke="#E9F5FF" stroke-width="4"/>
                                    <path d="M31.25 15.9997C30.8333 15.5413 30.2083 15.2497 29.5833 15.2497H27.3333V13.833H16.6667V15.2497H14.4167C13.7917 15.2497 13.1667 15.5413 12.75 15.9997C12.3333 16.458 12.125 17.083 12.2083 17.708C12.4583 19.6247 13.6667 24.1247 20.0833 24.1663C20.5 24.333 20.9167 24.4163 21.375 24.4997V26.3747C19.6667 26.583 18.2083 27.708 17.5417 29.333L17.1667 30.208H26.8333L26.4583 29.333C25.7917 27.708 24.3333 26.6247 22.625 26.3747V24.4997C23.0833 24.458 23.5 24.333 23.9167 24.1663C30.2917 24.1247 31.5417 19.6663 31.7917 17.708C31.8333 17.083 31.6667 16.458 31.25 15.9997ZM13.4583 17.583C13.4167 17.333 13.5 17.0413 13.6667 16.833C13.8333 16.6247 14.125 16.4997 14.375 16.4997H16.625V19.1663C16.625 20.4997 17.125 21.7497 17.9583 22.6663C14.75 21.958 13.7083 19.6247 13.4583 17.583ZM22.8333 19.2497L23.3333 20.833L22 19.8747L20.625 20.8747L21.125 19.2913L19.75 18.2913H21.4167L21.9167 16.708L22.4167 18.2913H24.0833L22.8333 19.2497ZM30.5417 17.583C30.2917 19.6247 29.25 21.9997 26.0417 22.708C26.875 21.7497 27.375 20.5413 27.375 19.208V16.5413H29.625C29.9167 16.5413 30.1667 16.6663 30.3333 16.8747C30.5 17.0413 30.5833 17.2913 30.5417 17.583Z" fill="white"/>
                                    </svg>
                            </div>
                            <div class="steps-detail-box success">
                                <h5 class="steps-title" id="sec-year-job-date-desk">Sept - Oct, 2025</h5>
                                <p class="steps-pera">Uplevel to: <span id="sec-year-job-title">
                                    Senior AI Software Engineer</span></p>
                            </div>
                            
                        </div>
                        <div class="steps-detail-box success mobile-version">
                            <h5 class="steps-title" id="sec-year-job-date-mob">Sept - Oct, 2025</h5>
                            <p class="steps-pera">Uplevel to: <span id="sec-year-job-title-mob">
                                Senior AI Software Engineer</span></p>
                        </div>
                        <div class="career-charge">
                            <div class="career-card">
                                <h5><strong>Turbocharge</strong> your career</h5>
                                <p id="sec-year-job-summary">our profile shows potential, but there's room to grow when it comes to aligning with AI-first roles at top tech companies.. our profile shows potential, but there's room to grow when it comes to aligning with AI-first roles at top tech companies.</p>
                                <p class="bold-text">Skills you would have mastered at this stage</p>
                                <div class="skills-list" id="sec-year-skills">
                                    <!-- <div class="badges success">
                                        Data Analysis
                                    </div>
                                    <div class="badges success">
                                        FAANG Interview practice
                                    </div>
                                    <div class="badges success">
                                        Data structures and Algorithms
                                    </div>
                                    <div class="badges success">
                                        Data Analysis
                                    </div>
                                    <div class="badges success">
                                        FAANG Interview practice
                                    </div>
                                    <div class="badges success">
                                        Data structures and Algorithms
                                    </div> -->
                                </div>
                            </div>
                            <div class="reading-card-wrapper">
                                <div class="reading-card-container grid-container">
                                    <div class="reading-card">
                                        <p>AI Readiness</p>
                                        <h5 id="ai-readinesss">~90<span>/100</span></h5>
                                        <span class="reading-card-span">Up from your current score</span>
                                    </div>
                                    <div class="reading-card">
                                        <p>Expected Salary Range</p>
                                        <h5 class="salary-title" id="second-year-salary-title">$100k - $200k</h5>
                                        <span class="reading-card-span" id="reading-card-span-id">+21.01% from your current profile</span>
                                    </div>
                                    <div class="reading-card">
                                        <p>Increase in Net Worth</p>
                                        <h5 id="increase-net-cost">$345k</h5>
                                        <span class="reading-card-span" id="increase-net-worth">+21.01% from your current trajectory</span>
                                    </div>
                                    <div class="reading-card">
                                        <p>Average Salary Hike</p>
                                        <h5 id="average-salary-hike">50%</h5>
                                        <span class="reading-card-span" id="average-salary-hike-percentage">+21.01% from your current Profile</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                </div>
        </section>

        <section class="earning-section section-y-space">
            <div class="container">
                <h4 id="finame">[Firstname] ’s earning potential with <span>AI skills</span></h4>
                <div class="wrapper-card">
                        <div class="earing-chart-container">
                            <div class="earing-chart-header">
                              <div class="earing-chart-header-wrapper">
                                <p class="earing-chart-title">Projection</p>
                                <h2 class="earing-chart-subtitle">Net worth with & without AI skills</h2>
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
                        
                            <div class="earing-chart-wrapper">
                              <canvas id="netWorthChart"></canvas>
                            </div>
                        
                            <div class="earing-legend-container-mobile">
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

                    <div class="chart-card-right">
                        <p class="chart-card-pera">Domain's Future</p>
                        <h5>AI-enabled Job Market share in 5 years</h5>
                        <div class="chart-card-wrapper">
                            <div class="chart-box">
                                <div class="pie-chart-container">
                                    <canvas id="myChart"></canvas>
                                  </div>
                                  <div class="pie-chart-legend">
                                    <div class="pie-chart-legend-item">
                                      <div class="pie-chart-legend-color pie-chart-blue-gradient"></div>
                                      <div class="pie-chart-legend-text">AI-Enabled Jobs</div>
                                    </div>
                                    <div class="legend-item">
                                      <div class="pie-chart-legend-color pie-chart-light-gray"></div>
                                          <div class="pie-chart-legend-text">Non-AI Jobs</div>
                                    </div>
                                  </div>
                            </div>
                            <div class="chart-contnet-box">
                                <div class="chart-content">
                                    <h5>Current trends for your domain</h5>
                                    <p id="current-trends">You’re on your way! Your profile shows potential, but there's room to grow when it comes to aligning with AI-first. </p>
                                </div>
                                <div class="chart-content mt-16">
                                    <h5>Future trends for your domain</h5>
                                    <p id="future-trends">You’re on your way! Your profile shows potential, but there's room to grow when it comes to aligning with AI-first. The following skills need to be sharpened: </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta container section-top-p-0">
            <div class="container cta-container">
                <div class="cta-content">
                    <h4 class="cta-title">Take the First Step—Join the AI Revolution</h4>
                    <p class="cta-pera">Your competition is already moving. AI isn’t the future—it’s today’s baseline. Reserve your spot now for an exclusive webinar with an AI career expert.</p>
                    <a href="#data_webinar_form">
                    <button class="cta-section-button btn btn-white">Connect with FAANG Expert</button>
					</a> 
                </div>
                <div class="cta-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/user-2.jpg" alt="user">
                </div>
            </div>
        </section>
        </main>
        <?php get_footer(); ?>