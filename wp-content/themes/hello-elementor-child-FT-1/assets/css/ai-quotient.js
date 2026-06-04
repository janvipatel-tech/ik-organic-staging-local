document.addEventListener('DOMContentLoaded', function() {
    // Initialize Swiper only on mobile screens
    let featureSwiper;
    
    function initSwiper() {
        if (window.innerWidth < 768) {
            if (!featureSwiper) {
                featureSwiper = new Swiper('.feature-swiper', {
                    slidesPerView: window.innerWidth < 576 ? 1 : 2,
                    spaceBetween: window.innerWidth < 576 ? 16 : 20,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    }
                });
            } else {
                // Update slidesPerView when window is resized
                featureSwiper.params.slidesPerView = window.innerWidth < 576 ? 1 : 2;
                featureSwiper.params.spaceBetween = window.innerWidth < 576 ? 16 : 20;
                featureSwiper.update();
            }
        } else {
            if (featureSwiper) {
                featureSwiper.destroy();
                featureSwiper = null;
            }
        }
    }

    // Initial check
    initSwiper();

    // Check on window resize
    window.addEventListener('resize', initSwiper);

    // Get all FAQ items
    const faqItems = document.querySelectorAll('.faq-item');
    
    // Initialize all FAQ answers with maxHeight: 0
    faqItems.forEach(item => {
        const answer = item.querySelector('.faq-answer');
        answer.style.maxHeight = '0px';
    });
    
    // Add click event listener to each FAQ question
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        
        question.addEventListener('click', () => {
            // Toggle active class
            const isActive = item.classList.contains('active');
            
            // Close other open accordions
            faqItems.forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('active')) {
                    otherItem.classList.remove('active');
                    const otherAnswer = otherItem.querySelector('.faq-answer');
                    otherAnswer.style.maxHeight = '0px';
                }
            });
            
            // Toggle current accordion
            if (isActive) {
                item.classList.remove('active');
                answer.style.maxHeight = '0px';
            } else {
                item.classList.add('active');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });
    
    // Add scroll to top functionality for the CTA button
    const ctaButton = document.querySelector('.cta-section-button');
    if (ctaButton) {
        ctaButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    function showUploadMessage(message, type = 'success') {
        const uploadMessage = document.getElementById('uploadMessage');
        if (uploadMessage) {
            uploadMessage.style.color = type === 'error' ? 'red' : 'green';
            uploadMessage.style.marginBottom = '10px';
            uploadMessage.style.fontSize = '14px';
            uploadMessage.style.fontWeight = '400';

            if(type === 'error') {
                const errorIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                <path d="M7.99968 15.1634C11.6816 15.1634 14.6663 12.1786 14.6663 8.49675C14.6663 4.81485 11.6816 1.83008 7.99968 1.83008C4.31778 1.83008 1.33301 4.81485 1.33301 8.49675C1.33301 12.1786 4.31778 15.1634 7.99968 15.1634Z" stroke="#B00020" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 11.1647V8.49805" stroke="#B00020" stroke-width="1.50815" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 5.83008H8.00663" stroke="#B00020" stroke-width="1.50815" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>`;
            uploadMessage.innerHTML = errorIcon + message;
            } else {
                uploadMessage.textContent = message;
            }
        }
    }
    
    let selectedFile = null;
    let resumeApiResponse = {}; // stores API response
    let sessionId = "";
    let uuid = "";
    let country = "";
    let timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    const uploadArea = document.getElementById('uploadArea');
    const uploadButton = document.querySelector('.btn.btn-gradian.btn-full');
    const uploadMessage = document.getElementById('uploadMessage');
    
    // UUID generator
    function generateId() {
        return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
            (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
        );
    }
    
    
    function getUTMParams() {
        const params = new URLSearchParams(window.location.search);
        return {
            utm_source: params.get("utm_source") || "",
            utm_medium: params.get("utm_medium") || "",
            utm_campaign: params.get("utm_campaign") || "",
            utm_term: params.get("utm_term") || "",
            utm_content: params.get("utm_content") || ""
        };
    }
    
    async function getCountry() {
        try {
            const res = await fetch("https://ipapi.co/json/");
            const data = await res.json();
            return data || "Unknown";
        } catch {
            return "Unknown";
        }
    }
    
    function fileToBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result.split(',')[1]);
            reader.onerror = error => reject(error);
            reader.readAsDataURL(file);
        });
    }
    
    function validateFile(file) {
        const allowedTypes = [
            'application/pdf',
            // 'application/msword',
            // 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            // 'text/plain'
        ];
        const maxSize = 3 * 1024 * 1024; // 3MB
        return allowedTypes.includes(file.type) && file.size <= maxSize;
    }
    
    
    // Clickable Upload Area
    if (uploadArea) {
        uploadArea.addEventListener('click', function () {
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = '.pdf';
           // fileInput.accept = '.pdf,.doc,.docx';
            fileInput.style.display = 'none';
    
            document.body.appendChild(fileInput);
            fileInput.click();
    
            fileInput.addEventListener('change', function () {
                if (fileInput.files.length > 0) {
                    const file = fileInput.files[0];
                    if (validateFile(file)) {
                        selectedFile = file;
                        // uploadArea.innerHTML = `<p class="upload-area-text">Selected: ${file.name}</p>`;
                        uploadArea.innerHTML = `<p class="upload-area-text">+ Choose file <span>(.pdf only, max file size 3MB)</span></p>`;
                        document.getElementById('uploadFileNameText').textContent = file.name;
                        document.getElementById('uploadFileName').style.display = 'flex';
                        showUploadMessage('', '');
                    } else {
                        selectedFile = null;
                        // uploadArea.innerHTML = `<p class="upload-area-text">Invalid file type. Please upload PDF.</p>`;
                        // setTimeout(() => {
                        //     uploadArea.innerHTML = `<p class="upload-area-text">+ Choose file <span>(.pdf only, max file size 3MB)</span></p>`;
                        // }, 3000);
                        document.getElementById('uploadFileName').style.display = 'none';
                        document.getElementById('uploadFileNameText').textContent = '';

                        showUploadMessage('Invalid file. Upload PDF under 3MB.', 'error');
                    }
                }
                document.body.removeChild(fileInput);
            });
        });
    
        //  Drag & Drop
        uploadArea.addEventListener('dragover', function (e) {
            e.preventDefault();
            uploadArea.style.backgroundColor = '#e0efff';
        });
    
        uploadArea.addEventListener('dragleave', function () {
            uploadArea.style.backgroundColor = '#fafdff';
        });
    
        uploadArea.addEventListener('drop', function (e) {
            e.preventDefault();
            uploadArea.style.backgroundColor = '#fafdff';
    
            if (e.dataTransfer.files.length > 0) {
                const file = e.dataTransfer.files[0];
                if (validateFile(file)) {
                    selectedFile = file;
                    document.getElementById('uploadFileNameText').textContent = file.name;
                    document.getElementById('uploadFileName').style.display = 'flex';
                    showUploadMessage('', '');
                } else {
                    selectedFile = null;
                    // uploadArea.innerHTML = `<p class="upload-area-text">Invalid file type. Please upload PDF.</p>`;
                    // showUploadMessage('Invalid file. Upload PDF under 3MB.', 'error');
                    // setTimeout(() => {
                    //     uploadArea.innerHTML = `<p class="upload-area-text">+ Choose file <span>(.pdf only, max file size 3MB)</span></p>`;
                    // }, 3000);
                    document.getElementById('uploadFileName').style.display = 'none';
                    document.getElementById('uploadFileNameText').textContent = '';
                    showUploadMessage('Invalid file. Upload PDF under 3MB.', 'error');
                }
            }
        });
    }
    // Remove file name
    document.getElementById('upload-file-remove').addEventListener('click', function() {
        document.getElementById('uploadFileName').style.display = 'none';
        document.getElementById('uploadFileNameText').textContent = '';
        document.getElementById('uploadMessage').textContent = '';
        selectedFile = null;
        uploadArea.innerHTML = `<p class="upload-area-text">+ Choose file <span>(.pdf only, max file size 3MB)</span></p>`;
    });
    // Upload to API
    if (uploadButton) {
        uploadButton.addEventListener('click', async function () {
            if (!selectedFile) {
                showUploadMessage('Please upload a valid file (PDF) before proceeding.', 'error');
                return;
            }
    
            uploadArea.innerHTML = `<div class="loader">Uploading...</div>`;
    
            try {
                const base64 = await fileToBase64(selectedFile);
                sessionId = generateId();
                uuid = generateId();
                const localData = await getCountry();
                country = localData?.country_name || "USA";
                timezone = localData?.timezone || "America/New_York";
                const utmParams = getUTMParams();
                uploadButton.disabled = true;
                document.getElementById('uploadFileName').classList.add('disabled');

                const payload = {
                    resume_file: base64,
                    resume_file_name: selectedFile.name,
                    session_id: sessionId,
                    uuid: uuid,
                    country: country,
                    timezone: timezone,
                    ...utmParams
                };
    
                const response = await fetch('/wp-admin/admin-ajax.php?action=resume_api', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });
                const result = await response.json();

                    if (!result.success) {
                        throw new Error('Proxy API failed');
                    }
                    const data = result.data; 
                    window.dataLayer = window.dataLayer || [];
                    window.dataLayer.push({
                        'event': 'ai_quotient_analyzer_submitted'
                        });
                resumeApiResponse = data;
                const { name, email, phone_number, experience,domain } = data;
                localStorage.setItem('webinar_user_name', name);
                localStorage.setItem('webinar_user_email', email);
                localStorage.setItem('webinar_user_phone', phone_number);
                localStorage.setItem('webinar_user_experience', experience);
                localStorage.setItem('webinar_user_domain', domain);
                // if (domain && domain !== "None of the above") {
                //     localStorage.setItem('webinar_user_domain', domain);
                // } else {
                //     //localStorage.setItem('webinar_user_domain', 'Tech Product Manager');
                // }
                
                uploadArea.innerHTML = `<p class="upload-area-text">Upload successful! 🎉</p>`;
                showUploadMessage('', 'success');
                uploadButton.disabled = true;
                document.getElementById('uploadFileName').classList.add('disabled');
                // Optionally open modal if some data is missing
                const hasAllFields = data?.name && data?.email && data?.phone_number;
                if (!hasAllFields) {
                    if(data?.name?.trim() !== ""){
                        document.getElementById('fullname').value = data?.name;
                        document.getElementById('fullname-container').style.display='none';
                    }
                    if(data?.email?.trim() !== ""){
                        document.getElementById('email').value = data?.email;
                        document.getElementById('email-container').style.display='none';
                    }
                    if(data?.phone_number?.trim() !== ""){
                        document.getElementById('phone').value = data?.phone_number;
                        document.getElementById('phone-container').style.display='none';
                    }
                    openModal?.(); // Make sure `openModal()` exists
                    uploadButton.disabled = false;
                    document.getElementById('uploadFileName').classList.remove('disabled');
                }else{
                    window.location.href = `/result-ai-quotient-analyzer/?${uuid}`;
                }   
    
            } catch (error) {
                console.error("Upload failed", error);
                uploadArea.innerHTML = `<p class="upload-area-text">Upload failed. Please try again.</p>`;
                showUploadMessage('The uploaded file is not recognized as a resume.', 'error');
                uploadButton.disabled = false;
                document.getElementById('uploadFileName').classList.remove('disabled');
            }
        });
    }
    
    
    // Function to open modal and prevent scroll
function openModal() {
    const modal = document.getElementById('gqlModal');
    if (modal) {
        modal.style.display = 'flex';
        document.body.classList.add('modal-open');
    }
}
function closeModal() {
    const modal = document.getElementById('gqlModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.classList.remove('modal-open');
    }
}
const gqlModal = document.getElementById('gqlModal');

if (gqlModal) {
    gqlModal.addEventListener('click', function(event) {
        if (event.target === gqlModal) {
            closeModal();
        }
    });
}

/*GQL for validations*/

function setIfMissing(key, value) {
    if (!localStorage.getItem(key) || localStorage.getItem(key).trim() === '') {
        localStorage.setItem(key, value);
    }
}

document.getElementById('submit-btn').addEventListener('click', function(event) {
    event.preventDefault();
    const loader = document.getElementById('form-loader');
    loader.style.display = 'flex'; 
    const fullName = document.getElementById('fullname');
    const email = document.getElementById('email');
    const linkedin = document.getElementById('linkedin');
    const phone = document.getElementById('phone');
    const fullNameError = document.getElementById('fullname-error');
    const emailError = document.getElementById('email-error');
    const linkedinError = document.getElementById('linkedin-error');
    const phoneError = document.getElementById('phone-number-error');
    let isValid = true;
    const namePattern = /^[A-Za-z\s]+$/;
    function isValidPhoneNumber(phone) {
        const phoneRegex = /^(\+?\d{1,3}[- ]?)?(\(?\d{3}\)?[- ]?)?\d{3}[- ]?\d{4}$/;
        return phoneRegex.test(phone);
    }
    if (!fullName.value.trim() || !namePattern.test(fullName.value.trim())) {
        fullNameError.style.display = 'flex';
        isValid = false;
    } else {
        fullNameError.style.display = 'none';
    }
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.value.trim() || !emailPattern.test(email.value.trim())) {
        emailError.style.display = 'flex';
        isValid = false;
    } else {
        emailError.style.display = 'none';
    }
    if (!isValidPhoneNumber(phone.value.trim())) {
        phoneError.style.display = 'flex';
        isValid = false;
    } else {
        phoneError.style.display = 'none';
    }

    const linkedinPattern = /^(https?:\/\/)?([^\/]+)?linkedin\.com\/(in\/)?[\w-]+\/?$/;
    if (linkedin.value.trim() && !linkedinPattern.test(linkedin.value.trim())) {
        linkedinError.style.display = 'flex';
        isValid = false;
    } else {
        linkedinError.style.display = 'none';
    }

    if (isValid) {
        // UTM params
        const utmParams = getUTMParams(); // Reuse your existing getUTMParams() function
    
        const gqlPayload = {
            email: email.value.trim().toLowerCase(),
            name: fullName.value.trim(),
            phone_number: resumeApiResponse.phone_number || phone.value.trim(),
            session_id: sessionId,
            uuid: uuid,
            domain: resumeApiResponse.domain,
            experience: resumeApiResponse.experience,
            country: country,
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
            linkedin_id: linkedin.value.trim(),
            utm_params: utmParams
        };
    
        const data = {
            action: 'send_gql_payload', // The action hooked in functions.php
            email: gqlPayload.email,
            name: gqlPayload.name,
            phone_number: gqlPayload.phone_number,
            session_id: gqlPayload.session_id,
            uuid: gqlPayload.uuid,
            domain: gqlPayload.domain,
            experience: gqlPayload.experience,
            country: gqlPayload.country,
            timezone: gqlPayload.timezone,
            linkedin_url: gqlPayload.linkedin_id,
            workflow:"RESUME_ANALYSIS_SU",
            ...gqlPayload.utm_params
        };
    
        jQuery.ajax({
            url: ajaxurl, 
            type: 'POST',
            data: data,
            success: function(response) {
                if (response.success) {
                    window.dataLayer = window.dataLayer || [];
                    window.dataLayer.push({
                        'event': 'ai_quotient_analyzer_submitted'
                        });
                    console.log("GQL API Response:", response.data);
                    //Update missing localStorage values here
                    setIfMissing('webinar_user_name', gqlPayload.name);
                    setIfMissing('webinar_user_email', gqlPayload.email);
                    closeModal(); // Or show success message
                    window.location.href = `/result-ai-quotient-analyzer/?${uuid}`;
                } else {
                    console.error("Error:", response.data.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            },
            complete: function() {
                loader.style.display = 'none'; // Hide the loader after the request is done
            }
        });
    } else {
        loader.style.display = 'none'; // Hide the loader if validation fails
    }
      
});

});