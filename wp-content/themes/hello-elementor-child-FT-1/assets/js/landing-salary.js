document.addEventListener("DOMContentLoaded", function () {
  // ===== CONSTANTS =====
  const SELECTORS = {
    categoryButtons: ".btn-category",
    faqLists: ".faq-list",
    faqItems: ".faq-item",
    faqQuestion: ".faq-question",
    faqAnswer: ".faq-answer",
    compensationList: ".compensation-list",
    compensationItems: ".compensation-item",
    compensationPagination: ".swiper-pagination",
    uploadArea: "#uploadArea",
    uploadButton: ".btn.btn-primary.btn-upload.btn-block",
    uploadMessage: "#uploadMessage",
    uploadFileName: "#uploadFileName",
    uploadFileNameContainer: "#uploadFileNameContainer",
    uploadFileNameText: "#uploadFileNameText",
    btnUpload: "#btnUpload",
    btnUploadText: "#btnUploadText",
    btnLoader: "#btnLoader",
    gqlModal: "#gqlModal",
    fullname: "#fullname",
    email: "#email",
    phone: "#phone",
    linkedin: "#linkedin",
    fullnameContainer: "#fullname-container",
    emailContainer: "#email-container",
    phoneContainer: "#phone-container",
    linkedinContainer: "#linkedin-container",
    discoverBtn: ".discover-btn",
    uploadCard: ".upload-card",
  };
	

  const CONFIG = {
    allowedFileTypes: ["application/pdf"],
    maxFileSize: 3 * 1024 * 1024, // 3MB
    mobileBreakpoint: 786,
    apiEndpoint:
      "https://0th2m8jcj2.execute-api.us-west-1.amazonaws.com/qa/resume/job-roles",
    productionApiEndpoint:
      "https://0cioe31gu9.execute-api.us-west-1.amazonaws.com/prod/resume/job-roles",
    ipApiEndpoint: "https://ipapi.co/json/",
  };

  const MESSAGES = {
    uploadSuccess: "Upload successful! 🎉",
    fileUploadPrompt: "Please upload a valid file (PDF) before proceeding.",
    invalidFile: "Invalid file. Upload PDF under 3MB.",
    uploadFailed: "The uploaded file is not recognized as a resume.",
    unlockSalary: "Unlock Your Salary Potential",
  };

  // ===== STATE VARIABLES =====
  let selectedFile = null;
  let resumeApiResponse = {};
  let sessionId = "";
  let uuid = "";
  let country = "";
  let timezone = "";
  let featureSwiper = null;
  let swiperWrapper = null;

  // ===== UTILITY FUNCTIONS =====
  const Utils = {
    generateId() {
      return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, (c) =>
        (
          c ^
          (crypto.getRandomValues(new Uint8Array(1))[0] & (15 >> (c / 4)))
        ).toString(16)
      );
    },

    getUTMParams() {
      const params = new URLSearchParams(window.location.search);
      return {
        utm_source: params.get("utm_source") || "",
        utm_medium: params.get("utm_medium") || "",
        utm_campaign: params.get("utm_campaign") || "",
        utm_term: params.get("utm_term") || "",
        utm_content: params.get("utm_content") || "",
      };
    },

    async getCountry() {
      try {
        const res = await fetch(CONFIG.ipApiEndpoint);
        const data = await res.json();
        return data || "Unknown";
      } catch {
        return "Unknown";
      }
    },

    fileToBase64(file) {
      return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = () => resolve(reader.result.split(",")[1]);
        reader.onerror = (error) => reject(error);
        reader.readAsDataURL(file);
      });
    },

    validateFile(file) {
      return (
        CONFIG.allowedFileTypes.includes(file.type) &&
        file.size <= CONFIG.maxFileSize
      );
    },
  };

  // ===== FAQ FUNCTIONALITY =====
  const FAQManager = {
    init() {
      this.initCategorySelection();
      this.initAccordion();
    },

    initCategorySelection() {
      const categoryButtons = document.querySelectorAll(
        SELECTORS.categoryButtons
      );
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
        if (
          otherItem !== currentItem &&
          otherItem.classList.contains("active")
        ) {
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
    },
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
      const compensationList = document.querySelector(
        SELECTORS.compensationList
      );
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

      const compensationList = document.querySelector(
        SELECTORS.compensationList
      );
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
      const compensationList = document.querySelector(
        SELECTORS.compensationList
      );
      const compensationItems = compensationList.querySelectorAll(
        SELECTORS.compensationItems
      );

      // Add Swiper classes
      compensationList.classList.add("swiper");

      // Create swiper wrapper with slides
      const swiperHTML = `
          <div class="swiper-wrapper">
            ${Array.from(compensationItems)
              .map(
                (item) => `
              <div class="swiper-slide">
                ${item.innerHTML}
              </div>
            `
              )
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
      const compensationList = document.querySelector(
        SELECTORS.compensationList
      );
      if (compensationList && this.originalHTML) {
        compensationList.classList.remove("swiper");
        compensationList.innerHTML = this.originalHTML;
      }
    },
    removeMobileStyles() {
      const compensationList = document.querySelector(
        SELECTORS.compensationList
      );
      if (compensationList) {
        compensationList.style.display = "grid";
      }
    },
    applyResponsiveStyles(windowWidth) {
      const compensationList = document.querySelector(
        SELECTORS.compensationList
      );
      if (compensationList) {
        if (windowWidth > CONFIG.mobileBreakpoint) {
          compensationList.style.display = "grid";
          compensationList.style.gridTemplateColumns = "1fr 1fr";
        }
      }
    },
    applyMobileStyles() {
      const compensationList = document.querySelector(
        SELECTORS.compensationList
      );
      const pagination = document.querySelector(
        SELECTORS.compensationPagination
      );

      if (compensationList) {
        compensationList.style.display = "block";
      }

      if (pagination) {
        pagination.style.display = "block";
      }
    },
  };

  // ===== UPLOAD FUNCTIONALITY =====
  const UploadManager = {
    init() {
      this.uploadArea = document.getElementById("uploadArea");
      this.uploadButton = document.querySelector(SELECTORS.uploadButton);
      this.bindEvents();
    },

    bindEvents() {
      if (this.uploadArea) {
        // Store bound methods for later removal
        this.handleAreaClickBound = this.handleAreaClick.bind(this);
        this.handleDropBound = this.handleDrop.bind(this);
        this.handleDragOverBound = this.handleDragOver.bind(this);
        this.handleDragLeaveBound = this.handleDragLeave.bind(this);

        this.uploadArea.addEventListener("click", this.handleAreaClickBound);
        this.uploadArea.addEventListener("drop", this.handleDropBound);
        this.uploadArea.addEventListener("dragover", this.handleDragOverBound);
        this.uploadArea.addEventListener(
          "dragleave",
          this.handleDragLeaveBound
        );
        this.uploadArea.addEventListener("keydown", (e) => {
          if (e.key === "Enter") {
            this.handleAreaClick();
          }
        });
      }

      if (this.uploadButton) {
        this.uploadButton.addEventListener("click", () => this.handleUpload());
      }
    },

    handleAreaClick() {
      const fileInput = document.createElement("input");
      fileInput.type = "file";
      fileInput.accept = ".pdf";
      fileInput.style.display = "none";

      document.body.appendChild(fileInput);
      fileInput.click();

      fileInput.addEventListener("change", () => {
        if (fileInput.files.length > 0) {
          this.processSelectedFile(fileInput.files[0]);
        }
        document.body.removeChild(fileInput);
      });
    },

    handleDrop(e) {
      e.preventDefault();
      if (e.dataTransfer.files.length > 0) {
        this.processSelectedFile(e.dataTransfer.files[0]);
      }
    },

    handleDragOver(e) {
      e.preventDefault();
      e.stopPropagation();
      if (this.uploadArea) this.uploadArea.classList.add("dragover");
    },

    handleDragLeave(e) {
      e.preventDefault();
      e.stopPropagation();
      if (this.uploadArea) this.uploadArea.classList.remove("dragover");
    },

    processSelectedFile(file) {
      if (Utils.validateFile(file)) {
        console.log(file);
        selectedFile = file;
        this.updateFileDisplay(file.name);
        MessageManager.showMessage("", "");
      } else {
        MessageManager.showMessage(MESSAGES.invalidFile, "error");
      }
    },

    updateFileDisplay(fileName) {
      const uploadFileName = document.getElementById("uploadFileName");
      const uploadFileNameContainer = document.getElementById(
        "uploadFileNameContainer"
      );
      const uploadFileNameText = document.getElementById("uploadFileNameText");

      if (uploadFileName) {
        uploadFileName.style.display = "none";
      }
      if (uploadFileNameContainer) {
        uploadFileNameContainer.style.display = "flex";
      }
      if (uploadFileNameText) {
        // Trim long file names and add ellipsis
        const maxLength = 15;
        const displayName =
          fileName.length > maxLength
            ? fileName.substring(0, maxLength) + "..."
            : fileName;
        uploadFileNameText.textContent = `${displayName} has been uploaded`;
      }
    },

    async handleUpload() {
      if (!selectedFile) {
        MessageManager.showMessage(MESSAGES.fileUploadPrompt, "error");
        return;
      }

      try {
        this.setLoadingState(true);
        await this.processUpload();
      } catch (error) {
        console.error("Upload failed", error);
        MessageManager.showMessage(MESSAGES.uploadFailed, "error");
        this.restoreButtonText(MESSAGES.unlockSalary);
        this.uploadButton.disabled = false;
      }
    },

    setLoadingState(isLoading) {
      const btnUpload = document.getElementById("btnUpload");
      const btnUploadText = document.getElementById("btnUploadText");
      const btnLoader = document.getElementById("btnLoader");

      if (isLoading) {
        btnUploadText.style.display = "none";
        btnLoader.style.display = "block";
        this.uploadButton.disabled = true;
      } else {
        btnUploadText.style.display = "block";
        btnLoader.style.display = "none";
        this.uploadButton.disabled = false;
      }
    },

    async processUpload() {
      const base64 = await Utils.fileToBase64(selectedFile);
      sessionId = Utils.generateId();
      uuid = Utils.generateId();

      const localData = await Utils.getCountry();
      if (localData.country_name === "United States") {
        country = "USA";
      } else {
        country = localData?.country_name || "USA";
      }
      timezone = localData?.timezone || "America/New_York";

      const utmParams = Utils.getUTMParams();
      const payload = {
        resume_file: base64,
        resume_file_name: selectedFile.name,
        session_id: sessionId,
        uuid: uuid,
        country: country,
        timezone: timezone,
        ...utmParams,
      };

      console.log("Payload:", payload);
      let url = CONFIG.productionApiEndpoint;
      let api_key = "GYXHgoIDIV1en538UIYNg5w1BecroB0M3I2cWTdc";
      if (window.origin.includes("staging")) {
        url = CONFIG.apiEndpoint;
        api_key = "Q6XgZ2uukP7BLeDGIP1467PKHOjMsLRs2VL9E53q";
      }


      const response = await fetch(url, {
        method: "POST",
        mode: "cors",
        headers: {
          "Content-Type": "application/json",
          "x-api-key": api_key,
          workflow: "SALARY_INSIGHT",
        },
        body: JSON.stringify(payload),
      });

      const result = await response.json();
      console.log("Result:", result);

      if (!result) {
        throw new Error("Proxy API failed");
      }

      if (result.error) {
        MessageManager.showMessage(
          result.error || MESSAGES.uploadFailed,
          "error"
        );
        this.setLoadingState(false);
        this.restoreButtonText(MESSAGES.unlockSalary);
        return;
      }

      this.handleSuccessfulUpload(result);
    },

    handleSuccessfulUpload(data) {
      // Track event
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({
        event: "resume_submitted_for_analysis",
      });

      resumeApiResponse = data;
      console.log("Response data:", data);

      const { name, email, phone_number, experience, domain } = data;

      // Store data in localStorage
      this.storeUserData(
        name,
        email,
        phone_number,
        experience,
        domain,
        data?.linkedin
      );

      // Update UI
      // this.uploadArea.innerHTML = `<p class="upload-area-text">${MESSAGES.uploadSuccess}</p>`;
      // MessageManager.showMessage("", "success");
      this.uploadButton.disabled = true;
      this.restoreButtonText(MESSAGES.unlockSalary);

      // Disable the upload area after successful upload
      // this.disableUploadArea();

      // Handle incomplete data
      this.handleIncompleteData(data);
    },

    storeUserData(name, email, phone, experience, domain, linkedin) {
      localStorage.setItem("webinar_user_name", name);
      localStorage.setItem("webinar_user_email", email);
      localStorage.setItem("webinar_user_phone", phone);
      localStorage.setItem("webinar_user_experience", experience);
      localStorage.setItem("webinar_user_domain", domain);
      localStorage.setItem("webinar_user_linkedin", linkedin);
    },

    handleIncompleteData(data) {
      console.log("data", data.email);
      console.log("data", data.name);
      console.log("data", data.phone_number);

      const hasAllRequiredFields =
        data?.name && data?.email && data?.phone_number;
      console.log("hasAllRequiredFields", hasAllRequiredFields);

      if (!hasAllRequiredFields) {
        console.log("Open The modal Here Please....");
        this.prefillFormFields(data);
        ModalManager.openModal();
        console.log("Opened The modal Here Please....");
        this.uploadButton.disabled = false;
      } else {
        console.log("No modal needed");
        this.uploadArea.innerHTML = `<p class="upload-area-text">${MESSAGES.uploadSuccess}</p>`;
        MessageManager.showMessage("", "success");
        this.disableUploadArea();
        // Redirect to result page with uuid
        window.location.href = `${window.origin}/result-ai-salary?${uuid}`;
      }
    },

    prefillFormFields(data) {
      console.log("prefillFormFields", data);
      const fields = [
        {
          element: SELECTORS.fullname,
          container: SELECTORS.fullnameContainer,
          value: data?.name,
        },
        {
          element: SELECTORS.email,
          container: SELECTORS.emailContainer,
          value: data?.email,
        },
        {
          element: SELECTORS.phone,
          container: SELECTORS.phoneContainer,
          value: data?.phone_number,
        },
        {
          element: SELECTORS.linkedin,
          container: SELECTORS.linkedinContainer,
          value: data?.linkedin,
        },
      ];
      console.log("fields", fields);

      fields.forEach(({ element, container, value }) => {
        const inputElement = document.querySelector(element);
        const containerElement = document.querySelector(container);

        // LinkedIn is always shown regardless of value
        if (element === SELECTORS.linkedin) {
          if (inputElement && value) inputElement.value = value;
          return;
        }

        if (value && value.trim() !== "") {
          // If value exists and is not empty, fill the input
          if (inputElement) inputElement.value = value;
          // Hide the container for fields that have values
          if (containerElement) containerElement.style.display = "none";
        } else {
          // Show the container for fields without values
          if (containerElement) containerElement.style.display = "flex";
          // Clear any existing value
          if (inputElement) inputElement.value = "";
        }
      });
    },

    restoreButtonText(text) {
      const btnUploadText = document.getElementById("btnUploadText");
      const btnLoader = document.getElementById("btnLoader");

      if (btnUploadText) {
        btnUploadText.textContent = text;
        btnUploadText.style.display = "block";
      }

      if (btnLoader) {
        btnLoader.style.display = "none";
      }
    },

    // Add new method to disable upload area functionality
    disableUploadArea() {
      if (this.uploadArea) {
        // Remove the existing event listeners using the stored bound methods
        this.uploadArea.removeEventListener("click", this.handleAreaClickBound);
        this.uploadArea.removeEventListener("drop", this.handleDropBound);
        this.uploadArea.removeEventListener(
          "dragover",
          this.handleDragOverBound
        );
        this.uploadArea.removeEventListener(
          "dragleave",
          this.handleDragLeaveBound
        );

        // Add a new click handler that does nothing
        this.uploadArea.addEventListener("click", (e) => {
          e.preventDefault();
          e.stopPropagation();
          return false;
        });

        // Update visual style to indicate it's no longer active
        this.uploadArea.style.cursor = "default";
      }
    },
  };

  // ===== MESSAGE MANAGER =====
  const MessageManager = {
    showMessage(message, type = "success") {
      const uploadMessage = document.getElementById("uploadMessage");
      if (!uploadMessage) return;

      uploadMessage.style.color = type === "error" ? "#FF4D4D" : "green";
      uploadMessage.style.marginBottom = "10px";
      uploadMessage.style.fontSize = "14px";
      uploadMessage.style.fontWeight = "400";

      if (type === "error") {
        const errorIcon = `<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M7.99998 15.1634C11.6819 15.1634 14.6666 12.1786 14.6666 8.49675C14.6666 4.81485 11.6819 1.83008 7.99998 1.83008C4.31808 1.83008 1.33331 4.81485 1.33331 8.49675C1.33331 12.1786 4.31808 15.1634 7.99998 15.1634Z" stroke="#FF4D4D" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M8.00012 11.165V8.49835" stroke="#FF4D4D" stroke-width="1.50815" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M8.00012 5.83008H8.00675" stroke="#FF4D4D" stroke-width="1.50815" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>`;
        uploadMessage.innerHTML = errorIcon + message;
      } else {
        uploadMessage.textContent = message;
      }
    },
  };

  // ===== MODAL MANAGER =====
  const ModalManager = {
    init() {
      this.modal = document.getElementById("gqlModal");
      this.crossButton = document.getElementById("crossButton");
      this.form = document.getElementById("gqlForm");
      this.submitBtn = document.getElementById("submitForm");
      this.bindEvents();
    },

    bindEvents() {
      if (this.modal) {
        this.crossButton.addEventListener("click", (event) => {
          if (event.target === this.crossButton) {
            this.closeModal();
          }
        });
      }

      if (this.form) {
        this.form.addEventListener("submit", (event) => {
          event.preventDefault();
          this.handleFormSubmit();
        });
      }

      // Add input validation events
      // const inputs = {
      //   fullname: document.getElementById("fullname"),
      //   email: document.getElementById("email"),
      //   phone: document.getElementById("phone"),
      // };

      // Object.entries(inputs).forEach(([key, input]) => {
      //   if (input) {
      //     input.addEventListener("input", () => this.validateField(key, input));
      //   }
      // });
    },

    openModal() {
      if (this.modal) {
        this.modal.style.display = "flex";
        document.body.classList.add("modal-open");
      }
    },

    closeModal() {
      if (this.modal) {
        this.modal.style.display = "none";
        document.body.classList.remove("modal-open");
      }
    },

    validateField(fieldName, input) {
      const value = input.value.trim();
      const errorElement = document.getElementById(`${fieldName}-error`);
      let isValid = true;
      let errorMsg = "";

      switch (fieldName) {
        case "fullname":
          if (/[^A-Za-z ]/.test(value)) {
            isValid = false;
            errorMsg = "Name must not contain numbers or special characters.";
          } else if (value.length < 3) {
            isValid = false;
            errorMsg =
              "Name must be at least 3 characters and only contain letters and spaces.";
          } else {
            isValid = true;
          }
          break;
        case "email":
          isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
          if (!isValid) errorMsg = "Please enter a valid email address.";
          break;
        case "phone":
          // Phone: exactly 10 digits, not all zeros, not all spaces, and no spaces allowed
          if (/\s/.test(value)) {
            isValid = false;
            errorMsg = "Please enter a valid phone number.";
          } else {
            const digits = value.replace(/\D/g, "");
            isValid = digits.length === 10 && !/^0{10}$/.test(digits);
            if (!isValid) errorMsg = "Please enter a valid phone number.";
          }
          break;
      }

      if (errorElement) {
        const span = errorElement.querySelector("span");
        if (!isValid) {
          input.classList.add("error");
          errorElement.classList.add("show");
          if (span) span.textContent = errorMsg;
        } else {
          input.classList.remove("error");
          errorElement.classList.remove("show");
          if (span) span.textContent = "";
        }
      }
      return isValid;
    },

    isFormValid() {
      const requiredFields = [
        { name: "fullname", element: document.getElementById("fullname") },
        { name: "email", element: document.getElementById("email") },
        { name: "phone", element: document.getElementById("phone") },
      ];

      let allValid = true;

      requiredFields.forEach(({ name, element }) => {
        if (element && element.parentElement.style.display !== "none") {
          const isValid = this.validateField(name, element);
          allValid = allValid && isValid;
        }
      });

      return allValid;
    },

    handleFormSubmit() {
      if (!this.isFormValid()) {
        return;
      }

      this.submitBtn.disabled = true;
      this.submitBtn.textContent = "Processing...";

      // Get form data
      const formData = {
        name: document.getElementById("fullname")?.value || "",
        email: document.getElementById("email")?.value || "",
        phone_number: document.getElementById("phone")?.value || "",
        linkedin_url: document.getElementById("linkedin")?.value || "",
      };

      // Update resume API response with form data
      if (resumeApiResponse) {
        resumeApiResponse = { ...resumeApiResponse, ...formData };
      }

      // Prepare GQL payload similar to PHP function
      const utmParams = Utils.getUTMParams();
      const gqlPayload = {
        email: formData.email,
        name: formData.name,
        phone_number: formData.phone_number,
        session_id: sessionId,
        uuid: uuid,
        domain: resumeApiResponse?.domain || "",
        experience: resumeApiResponse?.experience || "",
        country: country,
        timezone: timezone,
        linkedin_url: formData.linkedin_url,
        workflow: "SALARY_INSIGHT",
        utm_params: utmParams,
      };

      // API URL and key
//       let apiUrl = CONFIG.productionApiEndpoint
//       let apiKey = "GYXHgoIDIV1en538UIYNg5w1BecroB0M3I2cWTdc";

//       if (window.origin.includes("staging")) {
// 		   apiUrl = CONFIG.apiEndpoint;
// 	     apiKey = "Q6XgZ2uukP7BLeDGIP1467PKHOjMsLRs2VL9E53q";
//       }
		const apiUrl =
        "https://0th2m8jcj2.execute-api.us-west-1.amazonaws.com/qa/resume/gql";
      const apiKey = "Q6XgZ2uukP7BLeDGIP1467PKHOjMsLRs2VL9E53q";


      // Make the API request
      fetch(apiUrl, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "x-api-key": apiKey,
        },
        body: JSON.stringify(gqlPayload),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.error) {
            console.error("API Error:", data.error);
            this.submitBtn.disabled = false;
            this.submitBtn.textContent = "Submit";
            return;
          }

          // Store updated data in localStorage
          UploadManager.storeUserData(
            formData.name,
            formData.email,
            formData.phone_number,
            resumeApiResponse?.experience || "",
            resumeApiResponse?.domain || "",
            formData.linkedin_url
          );

          // Close modal and re-enable upload button
          this.closeModal();
          const btnUpload = document.getElementById("btnUpload");
          if (btnUpload) {
            btnUpload.disabled = false;
          }
          // Reset button
          this.submitBtn.disabled = false;
          this.submitBtn.textContent = "Submit";

          // Track event
          window.dataLayer = window.dataLayer || [];
          window.dataLayer.push({
            event: "user_details_submitted",
          });
          const uploadArea = document.querySelector(SELECTORS.uploadArea);
          uploadArea.innerHTML = `<p class="upload-area-text">${MESSAGES.uploadSuccess}</p>`;
          MessageManager.showMessage("", "success");
          UploadManager.disableUploadArea();
          // Redirect to result page with uuid after modal form submit
          window.location.href = `https://staging-07b2-interviewkickstart.wpcomstaging.com/result-ai-salary?${uuid}`;
        })
        .catch((error) => {
          console.error("Fetch Error:", error);
          this.submitBtn.disabled = false;
          this.submitBtn.textContent = "Submit";
        });
    },
  };

  // ===== SCROLL FUNCTIONALITY =====
  const ScrollManager = {
    init() {
      this.bindEvents();
    },

    bindEvents() {
      const discoverBtn = document.querySelector(SELECTORS.discoverBtn);
      if (discoverBtn) {
        discoverBtn.addEventListener("click", () => this.scrollToUploadCard());
      }
    },

    scrollToUploadCard() {
      const uploadCard = document.querySelector(SELECTORS.uploadCard);
      if (uploadCard) {
        uploadCard.scrollIntoView({ behavior: "smooth", block: "center" });
      }
    },
  };

  // ===== INITIALIZATION =====
  function init() {
    FAQManager.init();
    SwiperManager.init();
    UploadManager.init();
    ModalManager.init();
    ScrollManager.init();
  }

  // Start the application
  init();
});
