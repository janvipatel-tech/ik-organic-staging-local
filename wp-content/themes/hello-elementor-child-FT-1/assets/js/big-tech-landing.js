// Complete FAQ Functionality with Swiper Support and Form Management
document.addEventListener('DOMContentLoaded', function() {
	
// function setDefaultExperienceStyling() {
//     const expField = document.querySelector('#exp-field');
//     if (!expField) return;

//     const firstLabel = expField.querySelector('.gql_exp_select label:first-child');
//     const allLabels = expField.querySelectorAll('.gql_exp_select label');
// 	const bigform = document.querySelector('.big_tech_roadmap');

//     function resetStyles() {
//         allLabels.forEach(l => {
//             l.style.borderColor = '#E7FFAA';
//             l.style.color = '#E7FFAA';
//             l.style.fontWeight = 'normal';
//             l.style.backgroundColor = 'transparent';
//         });
//     }

//     function highlightLabel(label) {
//         label.style.borderColor = '#E7FFAA';
//         label.style.color = '#000';
//         label.style.fontWeight = '700';
//         label.style.backgroundColor = '#E7FFAA';
//     }

//     // Detect if page is restored from back/forward cache
//     window.addEventListener('pageshow', (event) => {
//         if (event.persisted) {
//             bigform.setAttribute('show_status', false);
//             window.location.reload();
//         }
//     });

//     // Detect manual reload or first load
//     const navEntries = performance.getEntriesByType("navigation");
//     const navType = navEntries.length ? navEntries[0].type : "navigate";

//     if (navType === "reload" || navType === "navigate") {
//         // Always reset to first option on reload or fresh load
//         if (firstLabel) {
//             const firstInput = firstLabel.querySelector('input');
//             if (firstInput) firstInput.checked = true;
//             resetStyles();
//             highlightLabel(firstLabel);
//         }
//     }

//     // Add change listeners for highlighting and optional saving
//     allLabels.forEach(label => {
//         const input = label.querySelector('input');
//         if (input) {
//             input.addEventListener('change', function () {
//                 if (this.checked) {
//                     resetStyles();
//                     highlightLabel(label);
//                     // (optional) save selection if you want
//                     // localStorage.setItem('webinar_user_experience', this.value);
//                 }
//             });
//         }
//     });
// }
function setDefaultExperienceStyling() {
        const expFields = document.querySelectorAll('#exp-field');
        if (!expFields.length) return;

        const bigform = document.querySelector('.big_tech_roadmap');

        // Detect if page is restored from back/forward cache
        window.addEventListener('pageshow', (event) => {
            if (event.persisted) {
                if (bigform) bigform.setAttribute('show_status', false);
                window.location.reload();
            }
        });

        // Detect manual reload or first load
        const navEntries = performance.getEntriesByType("navigation");
        const navType = navEntries.length ? navEntries[0].type : "navigate";

        expFields.forEach((expField) => {
            const firstLabel = expField.querySelector('.gql_exp_select label:first-child');
            const allLabels = expField.querySelectorAll('.gql_exp_select label');

            function resetStyles() {
                allLabels.forEach(l => {
                    l.style.borderColor = '#E7FFAA';
                    l.style.color = '#E7FFAA';
                    l.style.fontWeight = 'normal';
                    l.style.backgroundColor = 'transparent';
                });
            }

            function highlightLabel(label) {
                label.style.borderColor = '#E7FFAA';
                label.style.color = '#000';
                label.style.fontWeight = '700';
                label.style.backgroundColor = '#E7FFAA';
            }

            if (navType === "reload" || navType === "navigate") {
                // Always reset to first option on reload or fresh load
                if (firstLabel) {
                    const firstInput = firstLabel.querySelector('input');
                    if (firstInput) firstInput.checked = true;
                    resetStyles();
                    highlightLabel(firstLabel);
                }
            }

            // Add change listeners for highlighting and optional saving
            allLabels.forEach(label => {
                const input = label.querySelector('input');
                if (input) {
                    input.addEventListener('change', function () {
                        if (this.checked) {
                            resetStyles();
                            highlightLabel(label);
                            // (optional) save selection if you want
                            // localStorage.setItem('webinar_user_experience', this.value);
                        }
                    });
                }
            });
        });
    }


// ===== FAQ CONSTANTS =====
const SELECTORS = {
    categoryButtons: ".btn-category",
    faqLists: ".faq-list",
    faqItems: ".faq-item",
    faqQuestion: ".faq-question",
    faqAnswer: ".faq-answer",
    compensationList: ".compensation-list",
    compensationItems: ".compensation-item",
    compensationPagination: ".swiper-pagination",
    // Form selectors
    formWrapper: ".v2_big_tech_wrapper",
    formSteps: ".from_step",
    stepIndicators: ".step_indicator",
    nameInput: ".fr_name_fl",
    emailInput: ".fr_email_fl",
    phoneInput: ".fr_phone_fl",
    experienceOptions: ".exp_options",
    domainSelect: ".gql_domain_select",
    stepBtn1: ".step_btn_1",
    stepBtn2: ".step_btn_2",
    stepBack2: ".step_back_2",
    errorFields: ".fr_fild",
    errorMessages: ".err_fild"
};

const CONFIG = {
    mobileBreakpoint: 786,
    //apiEndpoint: "https://0cioe31gu9.execute-api.us-west-1.amazonaws.com/prod/ai-roadmap" // LIVE
	apiEndpoint: "https://0th2m8jcj2.execute-api.us-west-1.amazonaws.com/qa/ai-roadmap" // STG
};

// ===== STATE VARIABLES =====
let featureSwiper = null;
let swiperWrapper = null;
let currentFormStep = 0;
let phoneInputInstance = null;

// ===== FORM VALIDATION REGEX =====
const VALIDATION = {
    name: /^[a-zA-Z ]+$/,
    email: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(?!con$)[a-zA-Z]{2,}$/,
    phone: /^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/
};

// ===== FORM FUNCTIONALITY =====
const FormManager = {
    init() {
        this.loadPhoneLibrary().then(() => {
            this.initFormSteps();
            this.initPhoneInput();
            this.bindFormEvents();
        });
    },

    async loadPhoneLibrary() {
        // Check if intl-tel-input is already loaded
        if (typeof window.intlTelInput !== 'undefined') {
            console.log('intl-tel-input library already loaded');
            return;
        }

        // Load CSS if not already loaded
        if (!document.querySelector('link[href*="intlTelInput.css"]')) {
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css';
            document.head.appendChild(link);
        }

        // Load JavaScript if not already loaded
        if (typeof window.intlTelInput === 'undefined') {
            return new Promise((resolve, reject) => {
                const script = document.createElement('script');
                script.src = 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js';
                script.onload = () => {
                    console.log('intl-tel-input library loaded successfully');
                    resolve();
                };
                script.onerror = () => {
                    console.error('Failed to load intl-tel-input library');
                    resolve(); // Don't reject, just resolve to continue
                };
                document.head.appendChild(script);
            });
        }
    },

    initFormSteps() {
        const formWrapper = document.querySelector(SELECTORS.formWrapper);
        if (!formWrapper) return;

        // Set initial step
        formWrapper.setAttribute('active_step', '1');
        this.showStep(0);
    },

    initPhoneInput() {
        const phoneInput = document.querySelector(SELECTORS.phoneInput);
        if (!phoneInput) {
            console.log('Phone input element not found');
            return;
        }

        // Check if intl-tel-input library is available
        if (typeof window.intlTelInput === 'undefined') {
            console.log('intl-tel-input library not loaded, using fallback');
            // Fallback: make it a regular phone input
            phoneInput.type = 'tel';
            phoneInput.placeholder = 'Enter your phone number';
            return;
        }

        try {
            // Initialize intl-tel-input with India as default
            phoneInputInstance = window.intlTelInput(phoneInput, {
               initialCountry: "auto",
                separateDialCode: true,
                formatOnDisplay: true,
                autoHideDialCode: false,
                autoPlaceholder: "polite",
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                geoIpLookup: function (callback) {
                    // Try to get user's country, fallback to India
                    fetch("https://ipinfo.io", { 
                        headers: { Accept: "application/json" } 
                    })
                    .then((resp) => resp.json())
                    .then((resp) => {
                        callback(resp.country || "in");
                    })
                    .catch(() => callback("in"));
                }
            });
            console.log('Phone input initialized successfully with India as default');
            } catch (error) {
            console.error('Error initializing phone input:', error);
            // Fallback: make it a regular phone input
            phoneInput.type = 'tel';
            phoneInput.placeholder = 'Enter your phone number';
        }
    },

    showStep(stepIndex) {
        const steps = document.querySelectorAll(SELECTORS.formSteps);
        const indicators = document.querySelectorAll(SELECTORS.stepIndicators);
        const formWrapper = document.querySelector(SELECTORS.formWrapper);

        // Hide all steps and remove active indicators
        steps.forEach((step, i) => {
            step.classList.toggle('active', i === stepIndex);
        });

        indicators.forEach((ind, i) => {
            ind.classList.toggle('active', i === stepIndex);
        });

        // Update wrapper attribute
        if (formWrapper) {
            formWrapper.setAttribute('active_step', stepIndex + 1);
        }

        currentFormStep = stepIndex;
    },

    validateStep(stepIndex) {
        if (stepIndex === 0) {
            return this.validateStep1();
        } else if (stepIndex === 1) {
            return this.validateStep2();
        }
        return false;
    },

    validateStep1() {
        let isValid = true;
        const nameInput = document.querySelector(SELECTORS.nameInput);
        const emailInput = document.querySelector(SELECTORS.emailInput);
        const phoneInput = document.querySelector(SELECTORS.phoneInput);

        // Name validation
        if (!nameInput || !nameInput.value.trim() || !VALIDATION.name.test(nameInput.value.trim())) {
            this.showFieldError(nameInput, 'Please enter a valid name (letters only)');
            isValid = false;
        } else if (nameInput.value.trim().length > 31) {
            this.showFieldError(nameInput, 'Full Name cannot exceed 31 characters');
            isValid = false;
        } else {
            this.hideFieldError(nameInput);
        }

        // Email validation
        if (!emailInput || !emailInput.value.trim() || !VALIDATION.email.test(emailInput.value.trim())) {
            this.showFieldError(emailInput, 'Please enter a valid email address');
            isValid = false;
        } else {
            this.hideFieldError(emailInput);
        }

        // Phone validation - works with both intl-tel-input and regular input
        if (!phoneInput || !phoneInput.value.trim()) {
            this.showFieldError(phoneInput, 'Please enter your phone number');
            isValid = false;
        } else if (phoneInputInstance && phoneInputInstance.isValidNumber && phoneInputInstance.isValidNumber()) {
            // Use intl-tel-input validation if available and working
            this.hideFieldError(phoneInput);
        } else if (phoneInputInstance && phoneInputInstance.isValidNumber) {
            // If intl-tel-input is available but validation fails, be more lenient
            const phoneValue = phoneInput.value.trim();
            if (phoneValue.length >= 10) {
                // Accept any phone number with at least 10 digits
                this.hideFieldError(phoneInput);
            } else {
                this.showFieldError(phoneInput, 'Please enter a valid phone number (at least 10 digits)');
                isValid = false;
            }
        } else {
            // Fallback validation for regular phone input
            const phoneValue = phoneInput.value.trim();
            const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
            if (!phoneRegex.test(phoneValue.replace(/[\s\-\(\)]/g, ''))) {
                // More lenient validation - just check if it has enough digits
                if (phoneValue.replace(/\D/g, '').length >= 10) {
                    this.hideFieldError(phoneInput);
                } else {
                    this.showFieldError(phoneInput, 'Please enter a valid phone number (at least 10 digits)');
                    isValid = false;
                }
            } else {
                this.hideFieldError(phoneInput);
            }
        }

        return isValid;
    },

    validateStep2() {
        let isValid = true;
        const selectedExperience = document.querySelector(`${SELECTORS.experienceOptions}:checked`);
        const domainSelect = document.querySelector(SELECTORS.domainSelect);

        // Experience validation
        if (!selectedExperience) {
            this.showFieldError(document.querySelector('#exp-field'), 'Please select your years of experience');
            isValid = false;
        } else {
            this.hideFieldError(document.querySelector('#exp-field'));
        }

        // Domain validation
        if (!domainSelect || !domainSelect.value) {
            this.showFieldError(document.querySelector('#domain-rle'), 'Please select your domain/role');
            isValid = false;
        } else {
            this.hideFieldError(document.querySelector('#domain-rle'));
        }

        return isValid;
    },

    showFieldError(input, message) {
        if (!input) return;
        
        const field = input.closest('.fr_fild');
        if (!field) return;

        const errorSpan = field.querySelector(SELECTORS.errorMessages);
        if (errorSpan) {
            errorSpan.innerHTML = `<b>ⓘ</b> ${message}`;
        }
        
        field.setAttribute('err_status', 'true');
        field.classList.add('error');
    },

    hideFieldError(input) {
        if (!input) return;
        
        const field = input.closest('.fr_fild');
        if (!field) return;

        field.setAttribute('err_status', 'false');
        field.classList.remove('error');
    },

    captureUrlParameters() {
        const urlParams = new URLSearchParams(window.location.search);
        const urlData = {};
        
        // Debug: Log current URL and parameters
        console.log('Current URL:', window.location.href);
        console.log('URL search params:', window.location.search);
        console.log('All URL parameters:', Object.fromEntries(urlParams));
        
        // Capture UTM parameters
        const utmParams = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'];
        utmParams.forEach(param => {
            if (urlParams.has(param)) {
                urlData[param] = urlParams.get(param);
                console.log(`Found UTM parameter: ${param} = ${urlParams.get(param)}`);
            }
        });
        
        // Capture other common parameters
        const otherParams = ['ref', 'referrer', 'source', 'campaign'];
        otherParams.forEach(param => {
            if (urlParams.has(param)) {
                urlData[param] = urlParams.get(param);
                console.log(`Found other parameter: ${param} = ${urlParams.get(param)}`);
            }
        });
        
        console.log('Captured URL data:', urlData);
        return urlData;
    },

    collectFormData() {
        const nameInput = document.querySelector(SELECTORS.nameInput);
        const emailInput = document.querySelector(SELECTORS.emailInput);
        const phoneInput = document.querySelector(SELECTORS.phoneInput);
        const selectedExperience = document.querySelector(`${SELECTORS.experienceOptions}:checked`);
        const domainSelect = document.querySelector(SELECTORS.domainSelect);

        // Get phone number - try intl-tel-input first, fallback to raw value
        let phoneNumber = '';
        if (phoneInputInstance && phoneInputInstance.isValidNumber && phoneInputInstance.isValidNumber()) {
            phoneNumber = phoneInputInstance.getNumber();
        } else if (phoneInput && phoneInput.value.trim()) {
            // Fallback: use the raw input value if intl-tel-input validation fails or not available
            phoneNumber = phoneInput.value.trim();
        }

        const formData = {
            full_name: nameInput ? nameInput.value.trim() : '',
            email: emailInput ? emailInput.value.trim() : '',
            phone: phoneNumber,
            experience: selectedExperience ? selectedExperience.value : '',
            domain: domainSelect ? domainSelect.value : '',
            country: phoneInputInstance ? phoneInputInstance.getSelectedCountryData().iso2.toUpperCase() : 'IN',
            // Add URL parameters to payload
            ...this.captureUrlParameters()
        };

        // Validate that all required fields are present
        const requiredFields = ['full_name', 'email', 'phone', 'experience', 'domain'];
        const missingFields = requiredFields.filter(field => !formData[field]);
        
        if (missingFields.length > 0) {
            console.error('Missing required fields:', missingFields);
            throw new Error(`Missing required fields: ${missingFields.join(', ')}`);
        }

        console.log('Collected form data:', formData);
        return formData;
    },



    async submitForm() {
        try {
            console.log('submitForm() called - starting form submission');
            const formData = this.collectFormData();
            
            // Debug: Log the form data being sent
            console.log('Form data being sent to API:', formData);
            
            
            // Show loading state
            this.showLoadingState();
            
            // Create form-only data for localStorage (no URL parameters)
            const formOnlyData = {
                full_name: formData.full_name,
                email: formData.email,
                phone: formData.phone,
                experience: formData.experience,
                domain: formData.domain,
                country: formData.country
            };
            
            // Create API payload with form data + URL parameters
            const apiPayload = {
                ...formOnlyData,
                ...this.captureUrlParameters()
            };
            
            console.log('Form data for localStorage:', formOnlyData);
            console.log('API payload (with URL params):', apiPayload);
            
            // console.log('API payload (all form data):', apiPayload);
            // console.log('API endpoint:', CONFIG.apiEndpoint);
            // console.log('Request method: POST');
            // console.log('Request headers:', {
            //     'Content-Type': 'application/json',
            //     'Accept': 'application/json'
            // });
            // console.log('Request body (JSON):', JSON.stringify(apiPayload, null, 2));
            
            // Try the fetch approach first
            try {
                const response = await fetch(CONFIG.apiEndpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
						'x-api-key': 'Q6XgZ2uukP7BLeDGIP1467PKHOjMsLRs2VL9E53q'
                    },
                    body: JSON.stringify(apiPayload)
                });

                console.log('API Response status:', response.status);

                if (response.ok) {
                    const result = await response.json();
                    console.log('API Response success:', result);
                    
                    // Store form data in localStorage for results page (no URL parameters)
                    localStorage.setItem('formData', JSON.stringify(formOnlyData));
                    
                    // Redirect to results page with only required query parameters
                    this.redirectToResults({
                        domain: formData.domain,
                        experience: formData.experience,
                        country: formData.country
                    });
                    return;
                } else {
                    // Try to get error details from response
                    let errorMessage = `HTTP error! status: ${response.status}`;
                    try {
                        const errorData = await response.text();
                        console.log('API Error response body:', errorData);
                        if (errorData) {
                            errorMessage += ` - ${errorData}`;
                        }
                    } catch (e) {
                        console.log('Could not read error response body');
                    }
                    throw new Error(errorMessage);
                }
            } catch (fetchError) {
                console.log('Fetch failed, trying alternative method...');
                
                // If fetch fails due to CORS, try alternative approach
                if (fetchError.message.includes('CORS') || fetchError.message.includes('Failed to fetch')) {
                    console.log('CORS error detected, using alternative approach...');
                    
                    // Store form data in localStorage for results page
                    localStorage.setItem('formData', JSON.stringify(apiPayload));
                    
                    // For CORS issues, we'll proceed with the redirect anyway
                    // since the API might have received the data even if we can't read the response
                    this.redirectToResults({
                        domain: formData.domain,
                        experience: formData.experience,
                        country: formData.country
                    });
                    return;
                }
                
                throw fetchError;
            }
        } catch (error) {
            console.error('Form submission error:', error);
            
            // Provide more specific error messages
            let userMessage = 'Something went wrong. Please try again.';
            
            if (error.name === 'TypeError' && error.message.includes('fetch')) {
                userMessage = 'Network error. Please check your internet connection and try again.';
            } else if (error.message.includes('404')) {
                userMessage = 'API endpoint not found. Please contact support.';
            } else if (error.message.includes('500')) {
                userMessage = 'Server error. Please try again later.';
            } else if (error.message.includes('403')) {
                userMessage = 'Access denied. Please contact support.';
            } else if (error.message.includes('Missing required fields')) {
                userMessage = 'Please fill in all required fields.';
            }
            
            this.showErrorMessage(userMessage);
			this.hideLoadingState();
        }
    },

    redirectToResults(apiPayload) {
        // Build query parameters with domain, experience, country, AND URL parameters
        const queryParams = new URLSearchParams({
            domain: apiPayload.domain,
            experience: apiPayload.experience,
            country: apiPayload.country
        });
        
        // Add the captured URL parameters to the redirect URL
        const urlParams = this.captureUrlParameters();
        Object.keys(urlParams).forEach(key => {
            queryParams.set(key, urlParams[key]);
        });

        // Construct the redirect URL
        const currentDomain = window.location.origin;
        const resultsUrl = `${currentDomain}/big-tech-results?${queryParams.toString()}`;
        
        console.log('Redirecting to:', resultsUrl);
        
        // Show success message before redirect
        this.showSuccessMessage();
        
        // Redirect after a short delay to show success message
        setTimeout(() => {
            window.location.href = resultsUrl;
        }, 1500);
    },

    showLoadingState() {
        const submitBtn = document.querySelector(SELECTORS.stepBtn2);
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.textContent = 'Submitting...';
        }
    },

    hideLoadingState() {
        const submitBtn = document.querySelector(SELECTORS.stepBtn2);
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Finish';
        }
    },

    showSuccessMessage() {
        // Show success message before redirect
        const successMessage = 'Form submitted successfully! Redirecting to your results...';
        
        // You can customize this success message display
        // For now using alert, but you can replace with a custom modal
        //alert(successMessage);
    },

    showErrorMessage(message) {
        alert(message);
    },

    resetForm() {
        const form = document.querySelector(SELECTORS.formWrapper);
        if (form) {
            form.reset();
        }
        
        // Reset phone input to India
        if (phoneInputInstance) {
            phoneInputInstance.setCountry("in");
        }
        
        // Clear all error states
        document.querySelectorAll(SELECTORS.errorFields).forEach(field => {
            field.setAttribute('err_status', 'false');
            field.classList.remove('error');
        });
    },

    bindFormEvents() {
        // Check for any form elements that might cause default submission
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                console.log('Form submit prevented - using custom submission');
            });
        });
        
        // Step 1 to Step 2 button
        const stepBtn1 = document.querySelector(SELECTORS.stepBtn1);
        if (stepBtn1) {
            stepBtn1.addEventListener('click', () => {
                if (this.validateStep(0)) {
                    this.showStep(1);
                }
            });
        }

        // Step 2 back to Step 1 button
        const stepBack2 = document.querySelector(SELECTORS.stepBack2);
        if (stepBack2) {
            stepBack2.addEventListener('click', () => {
                this.showStep(0);
            });
        }

        // Submit form button
        const stepBtn2 = document.querySelector(SELECTORS.stepBtn2);
        if (stepBtn2) {
            stepBtn2.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent default form submission
                if (this.validateStep(1)) {
                    this.submitForm();
                }
            });
        }

        // Real-time validation for step 1 fields
        const nameInput = document.querySelector(SELECTORS.nameInput);
        if (nameInput) {
            nameInput.addEventListener('input', () => {
                if (nameInput.value.trim().length >= 2 && VALIDATION.name.test(nameInput.value.trim())) {
                    this.hideFieldError(nameInput);
                }
            });
        }

        const emailInput = document.querySelector(SELECTORS.emailInput);
        if (emailInput) {
            emailInput.addEventListener('input', () => {
                if (VALIDATION.email.test(emailInput.value.trim())) {
                    this.hideFieldError(emailInput);
                }
            });
        }

        const phoneInput = document.querySelector(SELECTORS.phoneInput);
        if (phoneInput) {
            // Basic input event for all phone inputs
            phoneInput.addEventListener('input', () => {
                // Clear error if user is typing and has at least some content
                if (phoneInput.value.trim().length > 0) {
                    this.hideFieldError(phoneInput);
                }
            });

            // Blur event for validation - more lenient
            phoneInput.addEventListener('blur', () => {
                if (phoneInput.value.trim()) {
                    const phoneValue = phoneInput.value.trim();
                    const digitCount = phoneValue.replace(/\D/g, '').length;
                    
                    if (digitCount >= 10) {
                        // Accept any phone number with at least 10 digits
                        this.hideFieldError(phoneInput);
                    } else {
                        this.showFieldError(phoneInput, 'Please enter a valid phone number (at least 10 digits)');
                    }
                }
            });

            // Country change event (only for intl-tel-input)
            if (phoneInputInstance) {
                phoneInput.addEventListener('countrychange', () => {
                    // Clear error when country changes
                    if (phoneInput.value.trim()) {
                        this.hideFieldError(phoneInput);
                    }
                });
            }
        }

        // Real-time validation for step 2 fields
        document.querySelectorAll(SELECTORS.experienceOptions).forEach(option => {
            option.addEventListener('change', () => {
                this.hideFieldError(document.querySelector('#exp-field'));
            });
        });

        const domainSelect = document.querySelector(SELECTORS.domainSelect);
        if (domainSelect) {
            domainSelect.addEventListener('change', () => {
                this.hideFieldError(document.querySelector('#domain-rle'));
            });
        }
    }
};

// ===== FAQ FUNCTIONALITY =====
const FAQManager = {
    init() {
        this.initCategorySelection();
        this.initAccordion();
    },

    initCategorySelection() {
        const categoryButtons = document.querySelectorAll(SELECTORS.categoryButtons);
        const faqLists = document.querySelectorAll(SELECTORS.faqLists);

        categoryButtons.forEach((button) => {
            button.addEventListener("click", () => {
                this.handleCategoryClick(button, categoryButtons, faqLists);
            });
        });
    },

    handleCategoryClick(clickedButton, allButtons, faqLists) {
        // Remove active class from all buttons
        allButtons.forEach((btn) => btn.classList.remove("active"));
        
        // Add active class to clicked button
        clickedButton.classList.add("active");
        
        // Hide all FAQ lists
        faqLists.forEach((list) => (list.style.display = "none"));
        
        // Show the selected FAQ list
        const category = clickedButton.getAttribute("data-category");
        const targetList = document.getElementById(`${category}-faqs`);
        if (targetList) {
            targetList.style.display = "flex";
            targetList.style.flexDirection = "column";
        }
    },

    initAccordion() {
        const faqItems = document.querySelectorAll(SELECTORS.faqItems);

        // Initialize all FAQ answers with maxHeight: 0
        faqItems.forEach((item) => {
            const answer = item.querySelector(SELECTORS.faqAnswer);
            if (answer) {
                answer.style.maxHeight = "0px";
            }
        });

        // Add click event listener to each FAQ question
        faqItems.forEach((item) => {
            const question = item.querySelector(SELECTORS.faqQuestion);
            const answer = item.querySelector(SELECTORS.faqAnswer);

            if (question && answer) {
                question.addEventListener("click", () => {
                    this.handleAccordionClick(item, answer, faqItems);
                });
            }
        });
    },

    handleAccordionClick(currentItem, currentAnswer, allItems) {
        const isActive = currentItem.classList.contains("active");

        // Close other open accordions
        allItems.forEach((otherItem) => {
            if (otherItem !== currentItem && otherItem.classList.contains("active")) {
                otherItem.classList.remove("active");
                const otherAnswer = otherItem.querySelector(SELECTORS.faqAnswer);
                if (otherAnswer) {
                    otherAnswer.style.maxHeight = "0px";
                }
            }
        });

        // Toggle current accordion
        if (isActive) {
            currentItem.classList.remove("active");
            currentAnswer.style.maxHeight = "0px";
        } else {
            currentItem.classList.add("active");
            currentAnswer.style.maxHeight = currentAnswer.scrollHeight + "px";
        }
    }
};

// ===== SWIPER FUNCTIONALITY =====
const SwiperManager = {
    swiper: null,
    originalHTML: "",
    
    init() {
        this.cacheOriginalHTML();
        this.initResponsiveSwiper();
        this.bindEvents();
    },
    
    cacheOriginalHTML() {
        const compensationList = document.querySelector(SELECTORS.compensationList);
        if (compensationList) {
            this.originalHTML = compensationList.innerHTML;
        }
    },
    
    initResponsiveSwiper() {
        this.handleResize();
    },
    
    bindEvents() {
        let resizeTimeout;
        window.addEventListener("resize", () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                this.handleResize();
            }, 250);
        });
    },

    handleResize() {
        const windowWidth = window.innerWidth;

        if (windowWidth <= CONFIG.mobileBreakpoint) {
            this.initMobileSwiper();
        } else {
            this.destroySwiper();
            this.applyResponsiveStyles(windowWidth);
        }
    },

    initMobileSwiper() {
        if (this.swiper) return; // Already initialized

        const compensationList = document.querySelector(SELECTORS.compensationList);
        if (!compensationList) return;

        // Transform HTML structure for Swiper
        this.transformToSwiperStructure();

        // Initialize Swiper
        this.swiper = new Swiper(SELECTORS.compensationList, {
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: SELECTORS.compensationPagination,
                clickable: true,
            },
            loop: false,
            grabCursor: true,
            touchRatio: 1,
            touchAngle: 45,
        });

        // Apply mobile styles
        this.applyMobileStyles();
    },

    transformToSwiperStructure() {
        const compensationList = document.querySelector(SELECTORS.compensationList);
        const compensationItems = compensationList.querySelectorAll(SELECTORS.compensationItems);

        // Add Swiper classes
        compensationList.classList.add("swiper");

        // Create swiper wrapper with slides
        const swiperHTML = `
            <div class="swiper-wrapper">
                ${Array.from(compensationItems)
                    .map((item) => `
                        <div class="swiper-slide">
                            ${item.innerHTML}
                        </div>
                    `)
                    .join("")}
            </div>
            <div class="swiper-pagination"></div>
        `;

        compensationList.innerHTML = swiperHTML;
    },

    destroySwiper() {
        if (this.swiper) {
            this.swiper.destroy(true, true);
            this.swiper = null;
            this.restoreOriginalStructure();
            this.removeMobileStyles();
        }
    },
    
    restoreOriginalStructure() {
        const compensationList = document.querySelector(SELECTORS.compensationList);
        if (compensationList && this.originalHTML) {
            compensationList.classList.remove("swiper");
            compensationList.innerHTML = this.originalHTML;
        }
    },
    
    removeMobileStyles() {
        const compensationList = document.querySelector(SELECTORS.compensationList);
        if (compensationList) {
            compensationList.style.display = "grid";
        }
    },
    
    applyResponsiveStyles(windowWidth) {
        const compensationList = document.querySelector(SELECTORS.compensationList);
        if (compensationList) {
            if (windowWidth > CONFIG.mobileBreakpoint) {
                compensationList.style.display = "grid";
                compensationList.style.gridTemplateColumns = "1fr 1fr";
            }
        }
    },
    
    applyMobileStyles() {
        const compensationList = document.querySelector(SELECTORS.compensationList);
        const pagination = document.querySelector(SELECTORS.compensationPagination);

        if (compensationList) {
            compensationList.style.display = "block";
        }

        if (pagination) {
            pagination.style.display = "block";
        }
    }
};

// ===== INITIALIZATION =====
function init() {
    FAQManager.init();
    SwiperManager.init();
    FormManager.init();
    setDefaultExperienceStyling();
}

// Start the application
init();
});

