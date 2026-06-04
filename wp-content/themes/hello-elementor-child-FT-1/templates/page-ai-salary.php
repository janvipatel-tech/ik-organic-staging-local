<?php
/* 
Template Name: Salary AI Quotient
*/
get_header();
?>
	<style>
      html, body { background-color: #0b1b30 !important; }
    </style>
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
        <a href="#salary_webinar_form" class="btn btn-primary">Connect with FAANG Expert</a>
<!-- <button class="btn btn-primary" data-target="#data_webinar_form">Connect with FAANG Expert</button> -->
      </div>
    </nav>

    <!-- Hero Section -->
    <section class="container">
      <div class="hero-container">
        <div class="hero-content">
          <div class="hero-header">
            <div class="hero-content-wrapper">
              <h2 class="hero-sub-title">
                Is Your <span>Pay Keeping Up With the Market?</span>
              </h2>
              <h1 class="hero-title">Find Out Instantly.</h1>
            </div>
            <div class="hero-description">
              Discover your true market value. Find out where you stand among
              peers. Learn your salary growth potential with AI skills. Unlock
              45%-100% hike in compensation.
            </div>
            <div class="feature-list">
              <div class="feature-item">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/check.webp" alt="Check" />
                <p>Discover your true market value</p>
              </div>
              <div class="feature-item">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/check.webp" alt="Check" />
                <p>Find out where you stand among peers</p>
              </div>
              <div class="feature-item">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/check.webp" alt="Check" />
                <p>Unlock 45%-100% salary hike</p>
              </div>
              <div class="feature-item">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/check.webp" alt="Check" />
                <p>Learn your salary growth potential with AI</p>
              </div>
            </div>
          </div>
          <div class="hero-right">
            <div class="ratings">
              <div class="rating-item">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/google.webp" alt="Google" />
              </div>
              <div class="rating-item">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/course.webp" alt="Course" />
              </div>
              <div class="rating-item truspilot">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/trustpilot.webp" alt="Trustpilot" />
              </div>
            </div>
            <div class="upload-card">
              <div class="upload-card-header">
                <h2>Upload Your Resume</h2>
                <p class="upload-subtitle">
                  Use the latest version for the best results!
                </p>
              </div>
              <div class="upload-area" id="uploadArea" tabindex="0">
                <p id="uploadFileName" class="upload-area-text">
                  + Choose file <span>(.pdf only, max file size 3MB)</span>
                </p>
                <div id="uploadFileNameContainer" class="uploaded-file">
                  <p id="uploadFileNameText">Uploaded file</p>
                  <div class="upload-another">
                    <p>UPLOAD ANOTHER</p>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/upload.svg" alt="upload-another" />
  
                  </div>
                </div>
              </div>
              <div id="uploadMessage" class="upload-message"></div>
              <button
                id="btnUpload"
                class="btn btn-primary btn-upload btn-block"
              >
                <span id="btnUploadText">Unlock Your Salary Potential</span>
                <img id="btnLoader" class="btn-loader" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/loadar.svg" alt="Loading" style="display: none;" />
              </button>
              <p class="upload-note">
                No credit card details needed
                <span class="text-primary">- It's free!</span>
              </p>
            </div>
          </div>
        </div>
        <div class="hero-image">
       <a href="#salary_webinar_form"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/hero.webp" alt="AI Salary" /> </a>
      
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="container main-compensation">
      <div class="compensation-container">
        <div class="compensation-content">
          <h1>In-Depth Compensation Insights You Won't Get Anywhere Else.</h1>
          <p>
            Our powerful tool analyzes global compensation data tailored to your
            specific role and skillset. Uncover your current market worth and
            get personalized strategies to reach elite compensation brackets in
            your industry.
          </p>
        </div>
        <div class="compensation-list">
          <div class="compensation-item">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/comp1.webp" alt="" />
            
            <div>
              <h3>Your current market valuation</h3>
              <p>
                Discover your true worth, and what peers in similar roles and
                experience levels are earning.
              </p>
            </div>
          </div>
          <div class="compensation-item">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/comp2.webp" alt="" />
            <div>
              <h3>Detailed salary gap analysis</h3>
              <p>
                Understand what skills will turbocharge your compensation
                potential.
              </p>
            </div>
          </div>
          <div class="compensation-item">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/comp3.webp" alt="" />
    
            <div>
              <h3>Impact of AI skills on salary</h3>
              <p>
                Learn what kind of salaries you can command once you learn
                in-demand AI skills.
              </p>
            </div>
          </div>
          <div class="compensation-item">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/comp4.webp" alt="" />
            <div>
              <h3>The IK Advantage</h3>
              <p>
                Learn the different ways you can use us to land a high-paying
                AI-enabled role.
              </p>
            </div>
          </div>
          <div class="swiper-pagination"></div>
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
          <button class="btn btn-primary discover-btn">Try Our Tool Now</button>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq">
      <h2 class="section-title">FAQs</h2>

      <div class="faq-categories">
        <button class="btn btn-category active" data-category="tool">
          About the Tool
        </button>
        <button class="btn btn-category" data-category="salary">
          Salary Insights
        </button>
        <button class="btn btn-category" data-category="career">
          Career Growth
        </button>
      </div>

      <div class="faq-list" id="tool-faqs">
        <div class="faq-item">
          <div class="faq-question">
            <h3>What is this tool, and how does it work?</h3>
            <div class="icon-container">
              <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/plus.svg" alt="plus icon" />
              <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/minus.svg" alt="minus icon" />
            </div>
          </div>
          <div class="faq-answer">
            <p>
              Our powerful salary analyzer reviews your resume and assesses your
              current market compensation based on your role, experience,
              location, and skills—including AI capabilities—and offers
              personalized strategies to boost your earning potential.
            </p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>Is it really personalized to my experience and background?</h3>
            <div class="icon-container">
            <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/plus.svg" alt="plus icon" />
            <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/minus.svg" alt="minus icon" />
            </div>
          </div>
          <div class="faq-answer">
            <p>
              Yes. The insights are tailored using inputs from your resume, like
              your job title, years of experience, technical skillset, location,
              and emerging skill proficiencies (like AI or GenAI).
            </p>
          </div>
        </div>
        <div class="faq-item">
          <div class="faq-question">
            <h3>Is this a free tool?</h3>
            <div class="icon-container">
            <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/plus.svg" alt="plus icon" />
            <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/minus.svg" alt="minus icon" />
            </div>
          </div>
          <div class="faq-answer">
            <p>
              Yes, it's completely free to use. There's no cost or obligation,
              and your information is kept confidential.
            </p>
          </div>
        </div>
      </div>

      <div class="faq-list" id="salary-faqs" style="display: none">
        <div class="faq-item">
          <div class="faq-question">
            <h3>How accurate is the compensation data?</h3>
            <div class="icon-container">
            <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/plus.svg" alt="plus icon" />
            <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/minus.svg" alt="minus icon" />
            </div>
          </div>
          <div class="faq-answer">
            <p>
              We leverage anonymized data from top tech companies, real user
              submissions, market research, and expert benchmarking to deliver
              accurate, up-to-date compensation insights.
            </p>
          </div>
        </div>
        <div class="faq-item">
          <div class="faq-question">
            <h3>Will I get a salary range or an exact figure?</h3>
            <div class="icon-container">
            <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/plus.svg" alt="plus icon" />
            <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/minus.svg" alt="minus icon" />
            </div>
          </div>
          <div class="faq-answer">
            <p>
              You'll receive a detailed compensation band—including base, bonus,
              and equity—aligned to your profile, plus insights into what it
              takes to reach the next tier.
            </p>
          </div>
        </div>
        <div class="faq-item">
          <div class="faq-question">
            <h3>Can this tool show how learning AI will impact my salary?</h3>
            <div class="icon-container">
            <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/plus.svg" alt="plus icon" />
            <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/minus.svg" alt="minus icon" />
            </div>
          </div>
          <div class="faq-answer">
            <p>
              Absolutely. One of the key features of our salary analyzer is
              mapping salary uplift potential based on acquiring in-demand AI
              and Generative AI skills.
            </p>
          </div>
        </div>
      </div>

      <div class="faq-list" id="career-faqs" style="display: none">
        <div class="faq-item">
          <div class="faq-question">
            <h3>
              Will this tool help me understand what skills to learn to increase
              my pay?
            </h3>
            <div class="icon-container">
            <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/plus.svg" alt="plus icon" />
            <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/minus.svg" alt="minus icon" />
            </div>
          </div>
          <div class="faq-answer">
            <p>
              Yes. You'll get a salary gap analysis and actionable
              recommendations on high-value skills—especially in AI—that can
              significantly improve your compensation.
            </p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>
              Can this help me if I'm planning to switch roles or companies?
            </h3>
            <div class="icon-container">
            <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/plus.svg" alt="plus icon" />
              <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/minus.svg" alt="minus icon" />
            </div>
          </div>
          <div class="faq-answer">
            <p>
              Definitely. Whether you're actively job hunting or exploring
              options, this tool gives you a benchmark to guide smarter career
              moves.
            </p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>What's the next step after using the tool?</h3>
            <div class="icon-container">
            <img class="plus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/plus.svg" alt="plus icon" />
            <img class="minus-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/minus.svg" alt="minus icon" />
            </div>
          </div>
          <div class="faq-answer">
            <p>
              Once you see your insights, you can explore targeted programs—like
              our AI/ML upskilling paths—to close your salary gaps and reach the
              compensation you deserve.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer Section -->
    <section class="container footer-container">
        <a href="/ai-salary-analyzer">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/SalaryScopeLogoDarkTheme.svg" alt="" />
        </a>
    </section>

    <!-- Gql Modal -->
    <div id="gqlModal" class="gql-modal">
      <div class="gql-modal-content">
        <div class="gql-form-container">
          <form class="gql-form" id="gqlForm">
            <div>
              <h2 class="gql-form-title">Confirm your details</h2>
              <p class="gql-form-description">
                Just one last step to access your resume insights!
              </p>
            </div>
            <div class="form-container">
              <div id="fullname-container">
                <label for="fullname">Full Name *</label>
                <input
                  type="text"
                  id="fullname"
                  name="fullname"
                  placeholder="Enter your full name"
                />
                <div class="error-message" id="fullname-error">
                  <img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/error-icon.svg"
                    alt="Error"
                    class="error-icon"
                  />
                  <span>Error</span>
                </div>
              </div>
              <div id="email-container">
                <label for="email">Email ID *</label>
                <input
                  type="text"
                  id="email"
                  name="email"
                  placeholder="Enter your email"
                />
                <div class="error-message" id="email-error">
                  <img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/error-icon.svg"
                    alt="Error"
                    class="error-icon"
                  />
                  <span>Error</span>
                </div>
              </div>
              <div id="phone-container">
                <label for="phone">Phone Number *</label>
                <input
                  type="tel"
                  id="phone"
                  name="phone"
                  placeholder="Enter your phone number"
                />
                <div class="error-message" id="phone-error">
                  <img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/error-icon.svg"
                    alt="Error"
                    class="error-icon"
                  />
                  <span>Error</span>
                </div>
              </div>
              <div id="linkedin-container">
                <label for="linkedin">LinkedIn Profile</label>
                <input
                  type="url"
                  id="linkedin"
                  name="linkedin"
                  placeholder="Enter your LinkedIn profile URL"
                />
              </div>
            </div>
            <div class="gql-form-footer">
              <button
                type="submit"
                id="submitForm"
                class="btn btn-primary gql-form-button"
              >
                Proceed
              </button>
            </div>
          </form>
        </div>
        <img
          id="crossButton"
          src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/salary/cross.svg"
          alt="close"
          class="close-modal"
        />
      </div>
    </div>

    <?php get_footer(); ?>
<!-- 
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="./script.js"></script> -->
  
