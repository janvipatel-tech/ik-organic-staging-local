<?php
/* 
Template Name: AI Quotient
*/
get_header();
?>

   <section class="hero">
        <div class="container hero-container p-md-0">
            <div class="hero-content">
                <h1 class="hero-title">Is Your Resume <span class="text-primary">AI-Ready</span>? <p class="hero-title-span">Find Out in Just a Minute.</p></h1>
                <p class="mobile-pera">Discover your AI-Readiness Score. Get detailed skill gap analysis. Learn your salary potential with AI skills. Grab a personalized AI career roadmap.</p>
                <div class="feature-list">
                    <div class="feature-list-wrapper">
                        <div class="feature-item">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check-icon.svg" alt="check" loading="lazy" decoding="async"/>
                            <p>Discover your AI-Readiness Score</p>
                        </div>
                        <div class="feature-item">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check-icon.svg" alt="check" loading="lazy" decoding="async"/>
                            <p>Get detailed skill gap analysis</p>
                        </div>
                    </div>
                  
                    <div class="feature-list-wrapper">
                        <div class="feature-item">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check-icon.svg" alt="check" loading="lazy" decoding="async"/>
                            <p>Learn your salary potential with AI skills</p>
                        </div>
                        <div class="feature-item">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check-icon.svg" alt="check" loading="lazy" decoding="async"/>
                            <p>Grab a personalized AI career roadmap</p>
                        </div>
                    </div>
                  
                </div>

                <div class="upload-card">
                    <h2>Upload Your Resume</h2>
                    <p class="upload-subtitle">Use the latest version for the best results!</p>
                    <div class="upload-area" id="uploadArea">
                        <p class="upload-area-text">+ Choose file <span>(.pdf only, max file size 3MB)</span></p>
                    </div>
                    <div id="uploadFileName" class="upload-file-name">
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                <path d="M8.66699 1.83301H4.00033C3.6467 1.83301 3.30756 1.97348 3.05752 2.22353C2.80747 2.47358 2.66699 2.81272 2.66699 3.16634V13.833C2.66699 14.1866 2.80747 14.5258 3.05752 14.7758C3.30756 15.0259 3.6467 15.1663 4.00033 15.1663H12.0003C12.3539 15.1663 12.6931 15.0259 12.9431 14.7758C13.1932 14.5258 13.3337 14.1866 13.3337 13.833V6.49967L8.66699 1.83301Z" stroke="#717985" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.66699 1.83301V6.49967H13.3337" stroke="#717985" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span id="uploadFileNameText"></span>
                        </p>
                        <svg id="upload-file-remove" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                            <path d="M15 5.5L5 15.5" stroke="#717985" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5 5.5L15 15.5" stroke="#717985" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div id="uploadMessage" class="upload-message"></div>
                    <button class="btn btn-gradian btn-full">Get My AI-Readiness Score</button>
                    <p class="upload-note">No credit card details needed <span class="text-primary">- It's free!</span></p>
                </div>

                <div class="ratings">
                    <div class="rating-item">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/google.svg" alt="Google">
                    </div>
                    <div class="rating-item">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/courses.svg" alt="Course">
                    </div>
                    <div class="rating-item truspilot">
                     <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/truspilot.svg" alt="Trustpilot">
                    </div>
                </div>
            </div>

            <div class="hero-image">
                <?php $heroimage = content_url('/uploads/2025/04/main.png'); ?>
                <img src="<?php echo esc_url($heroimage); ?>" alt="Resume Analyzer Dashboard" loading="lazy" decoding="async" class="hero-image-desktop">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/main-hero-mobile.png" alt="Resume Analyzer Dashboard mobile" loading="lazy" decoding="async" class="hero-image-mobile">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="container">
        <div class="title-wrapper">
            <h2 class="section-title">FAANG-Powered Resume Insights You Get</h2>
            <p class="section-subtitle">Our robust tool digs deep into your resume, compares them with AI skills that jobs of your tech/semi-tech domain today ask for, and gives you actionable insights.</p>
        </div>

        <!-- Grid Layout for larger screens -->
        <div class="feature-cards-grid">
            <!-- Card 1 -->
            <div class="feature-card">
                <div class="feature-card-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/card1.jpg" alt="AI-Readiness Score">
                </div>
                <h3>Your AI-Readiness Score</h3>
                <p>Discover how optimized your resume is for an AI-enabled role. Good score? Above 80!</p>
            </div>

            <!-- Card 2 -->
            <div class="feature-card">
                <div class="feature-card-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/card2.jpg" alt="Skill Gap Analysis">
                </div>
                <h3>Detailed skill gap analysis</h3>
                <p>Understand what skills you need to gain for FAANG+ recruiters to shortlist you.</p>
            </div>

            <!-- Card 3 -->
            <div class="feature-card">
                <div class="feature-card-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/card3.jpg" alt="Salary Potential">
                </div>
                <h3>Salary potential with AI skills</h3>
                <p>Learn what kind of salaries you can command once you learn the required AI skills.</p>
            </div>

            <!-- Card 4 -->
            <div class="feature-card">
                <div class="feature-card-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/card4.jpg" alt="Career Roadmap">
                </div>
                <h3>Personalized AI career roadmap</h3>
                <p>Get a step-by-step blueprint on what you need to do to land a high-paying AI-enabled role.</p>
            </div>
        </div>

        <!-- Slider Layout for mobile screens -->
        <div class="feature-cards-slider">
            <div class="swiper feature-swiper">
                <div class="swiper-wrapper">
                    <!-- Card 1 -->
                    <div class="swiper-slide">
                        <div class="feature-card">
                            <div class="feature-card-image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/card1.jpg" alt="AI-Readiness Score">
                            </div>
                            <h3>Your AI-Readiness Score</h3>
                            <p>Discover how optimized your resume is for an AI-enabled role. Good score? Above 80!</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="swiper-slide">
                        <div class="feature-card">
                            <div class="feature-card-image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/card2.jpg" alt="Skill Gap Analysis">
                            </div>
                            <h3>Detailed skill gap analysis</h3>
                            <p>Understand what skills you need to gain for FAANG+ recruiters to shortlist you.</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="swiper-slide">
                        <div class="feature-card">
                            <div class="feature-card-image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/card3.jpg" alt="Salary Potential">
                            </div>
                            <h3>Salary potential with AI skills</h3>
                            <p>Learn what kind of salaries you can command once you learn the required AI skills.</p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="swiper-slide">
                        <div class="feature-card">
                            <div class="feature-card-image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/card4.jpg" alt="Career Roadmap">
                            </div>
                            <h3>Personalized AI career roadmap</h3>
                            <p>Get a step-by-step blueprint on what you need to do to land a high-paying AI-enabled role.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta container section-top-p-0">
        <div class="container cta-container">
            <div class="cta-content">
                <p class="cta-subtitle">Plenty of Resume Analyzers Out There...</p>
                <h2 class="cta-title">But none are tailored to <span>recognizing AI skill gaps</span> and giving you the <span>exact roadmap</span> to <span>turbocharging your career</span>.</h2>
                <button class="cta-section-button btn btn-white">Try Our Tool Now</button>
            </div>
            <div class="cta-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/user-2.jpg" alt="user">
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq container section-top-p-0">
            <div class="title-wrapper">
                <h2 class="section-title">FAQs</h2>
            </div>
            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What exactly does the AI Resume Analyzer do?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Our powerful tool reviews your resume to determine how ready you are for an AI-related role. It evaluates AI-related skill gaps, calculates your AI Readiness Score, calculates your salary potential with added AI skills, and gives you a personalized roadmap to optimize your resume for FAANG+ opportunities.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How accurate is the AI-Readiness Score?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>The AI-Readiness Score is calculated based on benchmarks from industry standards and real hiring data, making it highly reliable. Scores above 80 indicate strong suitability for AI roles.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What file formats can I upload for resume analysis?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>You can upload your resume in .pdf format. Ensure your file size is below 3MB for best performance.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Is the resume analysis tool really free?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, our resume analyzer is completely free. No credit card information is required.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Will my resume details remain private?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely. Your resume and personal details are processed securely and never shared with third parties.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Can the analyzer predict my salary after learning AI skills?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, it provides realistic estimates based on your current skillset, industry data, and salary benchmarks for AI roles at FAANG+ companies.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What makes this resume analyzer different from others available online?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Unlike general resume analyzers, our tool has a razor-sharp focus on AI skills. It identifies your skill gaps related to AI roles and shares a clear career roadmap tailored to help you secure high-paying AI-first roles.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Who should use this AI Resume Analyzer?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Our AI Resume Analyzer is ideal for tech and semi-tech professionals aspiring to transition into or advance in AI-enabled roles, especially within FAANG+ companies. Our tool gives highly accurate results for domains such as software, embedded systems, cyber security, cloud architecture, product, program management, engineering management/tech leadership, and more.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How quickly will I get my analysis after uploading my resume?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Typically, the analysis takes less than a minute. You’ll instantly see your AI-Readiness Score, detailed insights, and recommendations.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Will the analyzer suggest specific AI courses or certifications?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, as part of your personalized AI career roadmap, it recommends specific training, AI courses, and resources needed to fill the identified skill gaps.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Can I re-upload my resume after making improvements?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! We encourage you to re-upload your updated resume to track your progress and improvements over time.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How often should I analyze my resume?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>It’s beneficial to analyze your resume whenever you gain new skills or whenever you are applying for an AI-first role, helping you stay aligned with industry trends.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Does this analyzer guarantee an interview with FAANG+ companies?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>While we can't guarantee an interview, using our tool significantly improves your chances by clearly showing what FAANG+ recruiters look for in AI roles.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What does the personalized career roadmap include?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Your personalized roadmap provides step-by-step guidance, including recommended AI skills, learning resources, courses, and projects needed for you to stand out.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How do you determine the skill gaps?</h3>
                        <div class="icon-container">
                        <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/plus-circle.svg" alt="plus icon">
                        <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/minus-circle.svg" alt="minus icon">
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Our AI matches your resume against thousands of FAANG+ AI job descriptions to pinpoint the exact skills you’re missing.</p>
                    </div>
                </div>
            </div>
    </section>

    <!-- GQL POP Up Desing -->
    <div id="gqlModal" class="gql-modal">
    <div class="gql-modal-content">
    <div class="gql-form-container">
    <div id="form-loader" style="display:none; margin-top: 10px;">
        <div class="loader-gql-form"></div> 
    </div>

        <div class="gql-form">
            <div class="gql-form-body">
                <h2 class="gql-form-title">Confirm your details</h2>
                <p class="gql-form-description">Just one last step to access your resume insights!</p>
                <div class="form-container">
                    <div id="fullname-container">
                        <label for="fullname">Full Name *</label>
                        <input type="text" id="fullname" name="fullname" placeholder="Firstname Lastname">
                        <div class="error-message" id="fullname-error">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/info.png" alt="error" class="error-icon">
                            <span class="error-text">Invaid name</span>
                        </div>
                    </div>
                    <div id="email-container">
                        <label for="email">Email ID *</label>
                        <input type="email" id="email" name="email" placeholder="abc@xyz.com">
                        <div class="error-message" id="email-error">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/info.png" alt="error" class="error-icon">
                            <span class="error-text">Invalid email address</span>
                        </div>
                    </div>
                    <div id="phone-container">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
                        <div class="error-message" id="phone-number-error">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/info.png" alt="error" class="error-icon">
                            <span class="error-text">Please enter a valid phone number</span>
                        </div>
                    </div>
                    <div>
                        <label for="linkedin">LinkedIn Profile (Optional) </label>
                        <input type="url" id="linkedin" name="linkedin" placeholder="Paste the link here" required>
                        <div class="error-message" id="linkedin-error">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/info.png" alt="error" class="error-icon">
                            <span class="error-text">Please enter a valid LinkedIn URL</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gql-form-footer">
                <button class="gql-form-button" id="submit-btn">Proceed</button>
            </div>
        </div>
    </div>
    </div>
</div>



<?php get_footer(); ?>
