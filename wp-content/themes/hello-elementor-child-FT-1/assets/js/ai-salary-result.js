//render slots
document.addEventListener("webNearLoaded", function () {
    if (Array.isArray(webinarSlots) && webinarSlots.length >= 2) {
        const slot1 = webinarSlots[0];
        const slot2 = webinarSlots[1];

        const slot1Button = document.querySelector("#slot1 span");
        const slot2Button = document.querySelector("#slot2 span");

        // Utility: Format local time
        function formatSlotLabel(isoTime) {
            const localDate = new Date(isoTime);
            const now = new Date();

            const isToday = localDate.toDateString() === now.toDateString();

            const tomorrow = new Date();
            tomorrow.setDate(now.getDate() + 1);
            const isTomorrow = localDate.toDateString() === tomorrow.toDateString();

            let hours = localDate.getHours();
            const minutes = localDate.getMinutes();
            const isPM = hours >= 12;
            const hour12 = hours % 12 || 12;
            const suffix = isPM ? 'pm' : 'am';

            const timeStr = minutes === 0
                ? `${hour12}${suffix}`
                : `${hour12}:${minutes.toString().padStart(2, '0')}${suffix}`;

            if (isToday) return `Today, ${timeStr}`;
            if (isTomorrow) return `Tomorrow, ${timeStr}`;

            const weekday = localDate.toLocaleDateString(undefined, { weekday: 'long' }); // e.g., Thursday
            return `${weekday}, ${timeStr}`;
        }


        // Update button text and data attribute
        slot1Button.innerHTML = formatSlotLabel(slot1.start_time);
        slot1Button.dataset.slotValue = slot1.start_time;

        slot2Button.innerHTML = formatSlotLabel(slot2.start_time);
        slot2Button.dataset.slotValue = slot2.start_time;
    } else {
        console.warn("Not enough webinar slots available to populate buttons.");
    }

});
//one click registrations
function formatLocalDateTime(utcStr) {
    const localDate = new Date(utcStr);
    const options = {
        weekday: 'long',
        hour: 'numeric',
        minute: '2-digit',
        hour12: true,
        month: 'long',
        day: 'numeric'
    };
    return localDate.toLocaleString(undefined, options).replace(":00", ""); // Remove ":00" if desired
}

//more slots actions
// document.addEventListener("DOMContentLoaded", function () {
//     const moreSlotsButton = document.getElementById("slots-more");
//     let getSalaryPopup = document.querySelector(".v2_from_salary_wrapper");
//       moreSlotsButton.addEventListener("click", function () {
//         alert('clicks');
//         getSalaryPopup.setAttribute("active_step", "2");
//       });

//   });




const shareButton = document.getElementById("shareButton");
const shareModal = document.getElementById("shareOptionsModal");
const currentUrl = window.location.origin + "/ai-salary-analyzer?utm_source=referral&utm_campaign=sharebutton";


const copyButton = document.getElementById("copyButton"); // Select the 'Copy' button by its ID

if (copyButton) {
    copyButton.addEventListener("click", function () {
        //   alert('Button clicked!');  // Check if button click is detected
        // Get the current page URL
        const currentUrl = window.location.href;

        // Use the Clipboard API to copy the URL
        navigator.clipboard
            .writeText(currentUrl)
            .then(function () {
                // Change the button text to "Copied" upon successful copy
                copyButton.innerHTML = "Link Copied"; // Change the button text
                copyButton.classList.add("copied"); // Optionally, add a class for styling (e.g., change the color

                // Revert the button state after 2 seconds
                setTimeout(() => {
                    copyButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><g clip-path="url(#clip0_531_908)"><path d="M6.66699 8.66668C6.95329 9.04943 7.31856 9.36613 7.73803 9.5953C8.15749 9.82448 8.62133 9.96076 9.09809 9.9949C9.57485 10.029 10.0534 9.96026 10.5012 9.7932C10.9491 9.62614 11.3557 9.36472 11.6937 9.02668L13.6937 7.02668C14.3009 6.398 14.6368 5.556 14.6292 4.68201C14.6216 3.80802 14.2711 2.97198 13.6531 2.35395C13.035 1.73592 12.199 1.38536 11.325 1.37777C10.451 1.37017 9.609 1.70615 8.98033 2.31335L7.83366 3.45335" stroke="#E7FFAA" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.33347 7.33331C9.04716 6.95055 8.68189 6.63385 8.26243 6.40468C7.84297 6.17551 7.37913 6.03923 6.90237 6.00508C6.4256 5.97094 5.94708 6.03973 5.49924 6.20678C5.0514 6.37384 4.64472 6.63526 4.3068 6.97331L2.3068 8.97331C1.69961 9.60198 1.36363 10.444 1.37122 11.318C1.37881 12.192 1.72938 13.028 2.3474 13.646C2.96543 14.2641 3.80147 14.6146 4.67546 14.6222C5.54945 14.6298 6.39146 14.2938 7.02013 13.6866L8.16013 12.5466" stroke="#E7FFAA" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><clipPath id="clip0_531_908"><rect width="16" height="16" fill="white"></rect></clipPath></defs></svg> Copy link to your results';
                    copyButton.classList.remove("copied");
                    copyButton.classList.add("btn", "btn-secondary");
                }, 2000);
            })
            .catch(function (error) {
                console.error("Failed to copy text: ", error);
            });
    });
}

// Toggle the visibility of the modal when the share button is clicked
document.addEventListener("click", function (e) {
    const modalStyle = getComputedStyle(shareModal).display;
    if (e.target === shareButton) {
        if (modalStyle === "block") {
            shareModal.style.display = "none";
        } else {
            // Get the button's position relative to the page
            const buttonRect = shareButton.getBoundingClientRect();

            // Position the modal just below the button
            shareModal.style.display = "block"; // Show the modal
            shareModal.style.top = `${buttonRect.bottom + window.scrollY + 10}px`; // 10px below the button
            shareModal.style.left = `${buttonRect.left +
                window.scrollX +
                buttonRect.width -
                shareModal.offsetWidth
                }px`; // Centered horizontally
        }
    } else {
        shareModal.style.display = "none";
    }
    // If the modal is already visible, hide it

});

// Close the modal when a share option is clicked and open the respective share link
document
    .getElementById("shareFacebook")
    .addEventListener("click", function () {
        const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(
            currentUrl
        )}`;
        window.open(facebookUrl, "_blank");
        shareModal.style.display = "none"; // Hide the modal
    });

document
    .getElementById("shareTwitter")
    .addEventListener("click", function () {
        const twitterUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(
            currentUrl
        )}`;
        window.open(twitterUrl, "_blank");
        shareModal.style.display = "none"; // Hide the modal
    });

document
    .getElementById("shareWhatsApp")
    .addEventListener("click", function () {
        const whatsappUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(
            currentUrl
        )}`;
        window.open(whatsappUrl, "_blank");
        shareModal.style.display = "none"; // Hide the modal
    });

document
    .getElementById("shareLinkedIn")
    .addEventListener("click", function () {
        const linkedInUrl = `https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(
            currentUrl
        )}`;
        window.open(linkedInUrl, "_blank");
        shareModal.style.display = "none"; // Hide the modal
    });

const copyResultsLink = document.getElementById("copy-results-link");
if (copyResultsLink) {
    copyResultsLink.addEventListener("click", function () {
        const url = window.location.origin + "/ai-salary-analyzer?utm_source=referral&utm_campaign=sharebutton";
        navigator.clipboard
            .writeText(url)
            .then(function () {
                copyResultsLink.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' width='13' height='15' viewBox='0 0 13 15' fill='none'> <path d='M4.9375 11.3854C4.57083 11.3854 4.25706 11.255 3.99617 10.9941C3.73483 10.7327 3.60417 10.4187 3.60417 10.0521V2.05208C3.60417 1.68542 3.73483 1.37142 3.99617 1.11008C4.25706 0.849194 4.57083 0.71875 4.9375 0.71875H10.9375C11.3042 0.71875 11.6182 0.849194 11.8795 1.11008C12.1404 1.37142 12.2708 1.68542 12.2708 2.05208V10.0521C12.2708 10.4187 12.1404 10.7327 11.8795 10.9941C11.6182 11.255 11.3042 11.3854 10.9375 11.3854H4.9375ZM4.9375 10.0521H10.9375V2.05208H4.9375V10.0521ZM2.27083 14.0521C1.90417 14.0521 1.59017 13.9216 1.32883 13.6607C1.06794 13.3994 0.9375 13.0854 0.9375 12.7187V4.05208C0.9375 3.86319 1.0015 3.70475 1.1295 3.57675C1.25706 3.44919 1.41528 3.38542 1.60417 3.38542C1.79306 3.38542 1.9515 3.44919 2.0795 3.57675C2.20706 3.70475 2.27083 3.86319 2.27083 4.05208V12.7187H8.9375C9.12639 12.7187 9.28483 12.7827 9.41283 12.9107C9.54039 13.0383 9.60417 13.1965 9.60417 13.3854C9.60417 13.5743 9.54039 13.7325 9.41283 13.8601C9.28483 13.9881 9.12639 14.0521 8.9375 14.0521H2.27083Z' fill='#0082f8' stroke='none'></path></svg> Link Copied";
                copyResultsLink.classList.add('copied');
                setTimeout(() => {
                    copyResultsLink.innerHTML = "Copy Link";
                    copyResultsLink.classList.remove("copied");
                    shareModal.style.display = "none";
                }, 2000);
            })
            .catch(function (error) {
                console.error("Failed to copy text: ", error);
            });
    });
}

const API_URL = window.origin.includes("staging")
    ? "https://0th2m8jcj2.execute-api.us-west-1.amazonaws.com/qa/resume/poll"
    : "https://0cioe31gu9.execute-api.us-west-1.amazonaws.com/prod/resume/poll";
    
const API_KEY = window.origin.includes("staging") ? "Q6XgZ2uukP7BLeDGIP1467PKHOjMsLRs2VL9E53q" : "GYXHgoIDIV1en538UIYNg5w1BecroB0M3I2cWTdc";

const getIsMobile = (width) => {
    // Check for actual screen width
    const viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
    // You can also use window.matchMedia for more reliable device detection
    return viewportWidth <= width || window.matchMedia(`(max-width: ${width}px)`).matches;
};

function formatNumber(amount, { locale = "USA", precision = 2 } = {}) {
    if (typeof amount !== "number" || amount === 0) {
        return 0;
    }

    const formatToFixed = (num) => Number(num.toFixed(precision));

    if (locale === "India") {
        if (amount >= 1e7) return `₹${formatToFixed(amount / 1e7)}Cr`;
        if (amount >= 1e5) return `₹${formatToFixed(amount / 1e5)}L`;
        if (amount >= 1e3) return `₹${formatToFixed(amount / 1e3)}k`;
        return amount.toLocaleString("en-IN");
    } else {
        if (amount >= 1e9) return `$${formatToFixed(amount / 1e9)}B`;
        if (amount >= 1e6) return `$${formatToFixed(amount / 1e6)}M`;
        if (amount >= 1e3) return `$${formatToFixed(amount / 1e3)}k`;
        return amount.toLocaleString("en-US").toLocaleLowerCase();
    }
}


function getUUIDFromURL() {
    const query = window.location.search;
    return query ? query.substring(1) : null;
}

function oneClickRegister(email, slotValue, btn) {

    const isoDate = new Date(slotValue);
    const formattedDate = isoDate.toISOString().split("T")[0]; // "YYYY-MM-DD"

    const payload = {
        email: email,
        date: formattedDate,
    };
    // Conditionally add fields if locale is India
    if (v_country === "India") {
        payload.webinar_type =  webinarType,
        payload.country = "IND";
    }

    btn.classList.add("disabled");

    fetch("https://uplevel.interviewkickstart.com/webinar-registration/one-click/", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(payload)
    })
        .then((response) => response.json())
        .then((data) => {
            const slotsDiv = document.querySelector(".register-session-slots");
            btn.classList.remove("disabled")
            
            // Create and insert message div BEFORE removing slotsDiv
            const messageDiv = document.createElement("div");
            messageDiv.style.padding = "0.5em";
            messageDiv.style.marginTop = "1em";
            messageDiv.style.backgroundColor = "#e7ffaa";
            messageDiv.style.borderRadius = "6px";
            messageDiv.style.fontSize = "1rem";
            messageDiv.style.fontWeight = "600";
            const localTime = formatLocalDateTime(data.webinar_start_time);

            if (data.message === "Already registered for this webinar") {
                messageDiv.textContent = `You are already registered. Webinar is at ${localTime}.`;
            } else if (data.success) {
                messageDiv.textContent = `Registration successful. See you at the webinar on ${localTime}.`;
            } else {
                messageDiv.textContent = "Something went wrong. Please try again.";
            }

            slotsDiv.insertAdjacentElement("afterend", messageDiv); // Insert message
            slotsDiv.remove(); // Then remove the buttons
;
        })
        .catch((error) => {
            console.error("Webinar registration failed:", error);
            const errorDiv = document.createElement("div");
            errorDiv.textContent = "An error occurred while registering. Please try again.";
            errorDiv.style.padding = "1em";
            // errorDiv.style.marginTop = "1em";
            errorDiv.style.backgroundColor = "#ffebee";
            errorDiv.style.border = "1px solid #d32f2f";
            errorDiv.style.borderRadius = "6px";
            errorDiv.style.fontSize = "1rem";

            const slotsDiv = document.querySelector(".register-session-slots");
            slotsDiv.insertAdjacentElement("afterend", errorDiv);
            btn.classList.remove("disabled");
        });
}

const uuidParams = getUUIDFromURL();



const shimmer = document.getElementById("shimmer-loader");
const results = document.getElementById("results-content");
const pollInterval = setInterval(pollResumeStatus, 5000);

async function pollResumeStatus() {
    fetch(`${API_URL}?uuid=${uuidParams}&api=RESUME_ANALYSIS`, {
        headers: {
            'x-api-key': API_KEY
        }
    })
        .then((res) => res.json())
        .then((response) => {
            if (response.state === "FAILED") {
                clearInterval(pollInterval);
                alert("Sorry Unable to fetch the Result,Please try again");
                // window.location = "https://staging-07b2-interviewkickstart.wpcomstaging.com/ai-quotient-analyzer";
            }
            if (response.state === "COMPLETED") {
                const result = response.data;

                const name = result?.name;
                const email = result?.email;
                const phone_number = result?.phone_number;
                localStorage.setItem('webinar_user_name', name);
                localStorage.setItem('webinar_user_email', email);
                localStorage.setItem('webinar_user_phone', phone_number);

                clearInterval(pollInterval);
                shimmer.style.display = "none";
                results.style.display = "block";

                document.querySelectorAll(".register-session-slot").forEach((button) => {
                    if (button.classList.contains("more")) return; // Skip 'More Slots' button

                    let slotValue = button.querySelector("span").dataset.slotValue;

                    button.addEventListener("click", () => oneClickRegister(email, slotValue, button));
                });



                jQuery(document).ready(function ($) {

                    const country = result?.current_role_analysis?.inferred_country;

                    const analysis_results_name = document.getElementById("analysis-results-name");
                    analysis_results_name.textContent = name;

                    // Guage chart data
                    const market_value_upper_range = result?.current_role_analysis?.compensation?.upper_range;
                    const market_value_lower_range = result?.current_role_analysis?.compensation?.lower_range;
                    const lower_range_label = Math.floor((market_value_lower_range / 100) * 40);
                    const upper_range_label = Math.floor((market_value_upper_range / 100) * 30) + market_value_upper_range;
                    const lower_range_label_text = formatNumber(lower_range_label, { locale: country });
                    const upper_range_label_text = formatNumber(upper_range_label, { locale: country });
                    $("#lower-range-label").text(lower_range_label_text);
                    $("#upper-range-label").text(upper_range_label_text);

                    marketValueWorthChart();
                    const market_value_upper_range_text = `${formatNumber(market_value_lower_range, { locale: country })}-${formatNumber(market_value_upper_range, { locale: country })}`;
                    $("#gauage-range-val").text(market_value_upper_range_text);

                    const similar_roles = result?.similar_roles;

                    const roleCardsContainer = document.querySelector(".similar-roles-list");
                    roleCardsContainer.innerHTML = ''; // Clear existing content

                    similar_roles.forEach(role => {
                        const roleCard = document.createElement('div');

                        roleCard.innerHTML = `<div class="role-card">
                                          <span class="role-name">${role.role_title}</span><span
                                              class="role-salary">${formatNumber(role.lower_range, { locale: country })}-${formatNumber(role.upper_range, { locale: country })}</span>
                                      </div>`;

                        roleCardsContainer.appendChild(roleCard);
                    });

                    // Salary vs Industy Chart
                    const industryStandards = result?.industryStandards;
                    const industry_average = industryStandards?.industry_average;
                    const faang_average = industryStandards?.faang_average;
                    const ik_learner_average = industryStandards?.ik_learner_average;
                    const current_salary = Math.floor((market_value_upper_range + market_value_lower_range) / 2);
                    industrySalaryChart(current_salary, ik_learner_average, industry_average, faang_average, country);


                    // Comp Break-up 
                    const comp_breakup_base_salary_percent = result?.current_role_analysis?.compensation?.compensation_breakdown?.base_salary_percent;
                    const comp_breakup_variable_comp_percent = result?.current_role_analysis?.compensation?.compensation_breakdown?.variable_comp_percent;
                    const comp_breakup_equity_percent = result?.current_role_analysis?.compensation?.compensation_breakdown?.equity_percent;
                    compBreakUpChart(comp_breakup_base_salary_percent, comp_breakup_variable_comp_percent, comp_breakup_equity_percent);

                    $("#variable-pay").text(`${comp_breakup_variable_comp_percent}%`);
                    $("#fixed-pay").text(`${comp_breakup_base_salary_percent}%`);
                    $("#equity-pay").text(`${comp_breakup_equity_percent}%`);


                    //Career Projection
                    const projection_net_worth_upper_range = result?.current_net_worth?.upper_range;
                    const projection_net_worth_lower_range = result?.current_net_worth?.lower_range;
                    careerProjectionChart(projection_net_worth_lower_range,
                        projection_net_worth_upper_range, country, market_value_lower_range, market_value_upper_range);

                    const projection_percentage = result?.ai_impact_percent;
                    const upskill_percent = result?.upskill_percent;
                    $("#projectionPercentageValue").text(`${projection_percentage}%`);
                    $("#projectionPercentageValueDisplay").text(`${projection_percentage}%`);
                    $("#upskillPercentageText").text(`${upskill_percent}%`);
                    $("#upskill-percentage-display").text(`${upskill_percent}%`);
                    
                    let domain = result?.domain === "None of the above" ? "Your Domain" : result?.domain;
                    $("#upskill-domain").text(domain);

                    const projectionPercentageBg = document.getElementById('projectionPercentageBg');
                    const projectionPercentageText = document.getElementById('projectionPercentageValue');

                    projectionPercentageText.textContent = `${projection_percentage}%`;
                    projectionPercentageBg.style.background = `conic-gradient(rgba(255, 140, 0, 0.4) 0% ${projection_percentage}%, rgba(28, 28, 58, 0.4) ${projection_percentage}% 100%)`;


                    const upskillPercentageBg = document.getElementById('upskillPercentageBg');
                    const upskillPercentageText = document.getElementById('upskillPercentageText');

                    upskillPercentageText.textContent = `${upskill_percent}%`;
                    upskillPercentageBg.style.background = `conic-gradient(rgba(255, 140, 0, 0.4) 0% ${upskill_percent}%, rgba(28, 28, 58, 0.4) ${upskill_percent}% 100%)`;


                    // Skills and Compensation Correlation
                    const skills_and_compensation_correlation = result?.recommended_skills;
                    salaryUpliftChart(skills_and_compensation_correlation);


                    // Net Worth Potential
                    const netWorth = result?.current_net_worth;
                    const net_worth_potential_lower_range = netWorth?.lower_range;
                    const net_worth_potential_upper_range = netWorth?.upper_range;
                    const net_worth_potential_lower_range_text = formatNumber(net_worth_potential_lower_range, { locale: country });
                    const net_worth_potential_upper_range_text = formatNumber(net_worth_potential_upper_range, { locale: country });

                    $("#net-worth-amt-lower").text(net_worth_potential_lower_range_text);
                    $("#net-worth-amt-upper").text(net_worth_potential_upper_range_text);

                    $("#net-worth-label-value-projected").text(net_worth_potential_lower_range_text)
                    $("#low-net-worth").text(net_worth_potential_lower_range_text);
                    $("#high-net-worth").text(net_worth_potential_upper_range_text);

                    const skill1 = netWorth?.skill_1;
                    const skill2 = netWorth?.skill_2;
                    const skill3 = netWorth?.skill_3;
                    $(".net-worth-label-title-skill1").text(skill1?.title);
                    $(".net-worth-label-title-skill2").text(skill2?.title);
                    $(".net-worth-label-title-skill3").text(skill3?.title);

                    $(".net-worth-label-value-skill1").text(formatNumber(skill1?.price, { locale: country }));
                    $(".net-worth-label-value-skill2").text(formatNumber(skill2?.price, { locale: country }));
                    $(".net-worth-label-value-skill3").text(formatNumber(skill3?.price, { locale: country }));

                    // Interview Kickstart courses

                    const course1 = result?.course_name_1;
                    const course2 = result?.course_name_2;
                    const course3 = result?.course_name_3;
                    const course1_description = result?.course_description_1;
                    const course2_description = result?.course_description_2;
                    const course3_description = result?.course_description_3;
					let viewAllCourse = document.getElementById("view-all-courses");
						if (viewAllCourse) {
						  viewAllCourse.addEventListener("click", function (e) {
							if (v_country === "India") {
								e.preventDefault(); 
							  window.open("https://staging-4eb7-ininterviewkickstart.wpcomstaging.com/?utm_source=L10x&utm_campaign=L10x_Salary_Analyser", "_blank");
							}
						  });
						}

                    let course1_link = result?.course_link_1;
                    let course2_link = result?.course_link_2;
                    let course3_link = result?.course_link_3;

					if(v_country === "India")
						{
							course1_link = "https://staging-4eb7-ininterviewkickstart.wpcomstaging.com" ;
							course2_link = "https://staging-4eb7-ininterviewkickstart.wpcomstaging.com" ;
							course3_link = "https://staging-4eb7-ininterviewkickstart.wpcomstaging.com" ;
						}
					

                    $("#course-card-title-1").text(course1);
                    $("#course-card-desc-1").text(course1_description);
                    $("#course-card-link-1").attr("href", course1_link + "?utm_source=L10x&utm_campaign=L10x_Salary_Analyser");

                    $("#course-card-title-2").text(course2);
                    $("#course-card-desc-2").text(course2_description);
                    $("#course-card-link-2").attr("href", course2_link + "?utm_source=L10x&utm_campaign=L10x_Salary_Analyser");

                    $("#course-card-title-3").text(course3);
                    $("#course-card-desc-3").text(course3_description);
                    $("#course-card-link-3").attr("href", course3_link + "?utm_source=L10x&utm_campaign=L10x_Salary_Analyser");

                    // The IK advantage
                    const average_salary_hike = result?.average_salary_hike;
                    const highest_compensation = result?.highest_compensation;
                    const highest_number_of_offers = result?.highest_offers;
                    const average_compensation_package = result?.average_compensation;
                    $("#average-salary-hike").text(average_salary_hike);
                    $("#highest-compensation").text(highest_compensation);
                    $("#highest-number-of-offers").text(highest_number_of_offers);
                    $("#average-compensation-package").text(average_compensation_package);

                    const potential_net_worth_lower_range = result?.projection_net_worth;

                    // const avg_potential_net_worth = Math.floor((result?.current_net_worth?.lower_range + result?.current_net_worth?.upper_range) / 2);
                    networthGrowthChart(potential_net_worth_lower_range, country);
                    // Use $ safely inside here
                });
            }


        }).catch((err) => {
            console.log("err", err);
            clearInterval(pollInterval);
        });
}

// setTimeout(() => {
//     pollResumeStatus();
// }, 8000);


let gaugeChart;
function marketValueWorthChart() {
    const ctx = document.getElementById("market-value-worth").getContext("2d");
    const is900px = getIsMobile(900);
    const is1580px = getIsMobile(1580);

    if (gaugeChart) gaugeChart.destroy(); // destroy previous instance if exists
    const indicatorPlugin = {
        id: 'gaugeIndicator',
        afterDraw(chart) {
            const arc = chart.getDatasetMeta(0).data[0];
            if (!arc) return;

            const { x: centerX, y: centerY } = arc;
            const radius = arc.outerRadius - 5;

            const angle = Math.PI + (56 / 100) * Math.PI;
            const indicatorX = centerX + radius * Math.cos(angle);
            const indicatorY = centerY + radius * Math.sin(angle);

            const ctx = chart.ctx;
            ctx.save();
            const size = is900px ? 15 : is1580px ? 16 : 20;
            const yoffset = is900px ? 3 : is1580px ? 2 : -2;

            // Outer white circle
            ctx.fillStyle = "#FFF";
            ctx.beginPath();
            ctx.arc(indicatorX, indicatorY - yoffset, size, 0, Math.PI * 2);
            ctx.fill();

            // Inner blue circle (larger)
            ctx.fillStyle = "#51cfff";
            ctx.beginPath();
            ctx.arc(indicatorX, indicatorY - yoffset, size - 5, 0, Math.PI * 2);
            ctx.fill();

            ctx.restore();
        }
    };
    gaugeChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [35, 30, 35],
                backgroundColor: ['#f5a623', '#51cfff', '#7ed957'],
                borderWidth: 0,
                circumference: 180,
                rotation: 270,
                cutout: "78%",
                spacing: 20,
                borderRadius: 5,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: false
                }
            }
        },
        plugins: [indicatorPlugin],
    });
}

function industrySalaryChart(current_salary, ik_learner_average, industry_average, faang_average, country) {
    const ctx = document.getElementById('industrySalaryChart').getContext('2d');

    const labels = [
        "Current Salary",
        "IK learner Avg",
        "Industry Avg",
        "Top 10%"
    ];


    const salaryData = [current_salary, ik_learner_average, industry_average, faang_average];

    const is1600px = getIsMobile(1600);
    const is1920px = getIsMobile(1920);
    const is910px = getIsMobile(910);

    const aboveBarLabelsPlugin = {
        id: 'aboveBarLabels',
        afterDatasetsDraw(chart) {
            const { ctx, chartArea: { left }, scales: { x, y } } = chart;

            const offset = is910px ? 25 : is1600px ? 40 : 50;
            const labels = chart.data.labels;
            const data = chart.data.datasets[0].data;

            labels.forEach((label, index) => {
                const value = data[index];
                const barY = y.getPixelForValue(index);
                const labelText = `${label}: `;
                const valueText = `${formatNumber(value, { locale: country })}`;


                // Label font
                let labelFont = "";

                if (is910px) {
                    labelFont = '400 12px "Open Sans", sans-serif';
                } else if (is1600px) {
                    labelFont = '400 14px "Open Sans", sans-serif';
                } else {
                    labelFont = '400 16px "Open Sans", sans-serif';
                }

                // Value font
                let valueFont = "";

                if (is910px) {
                    valueFont = '700 12px "Open Sans", sans-serif';
                } else if (is1600px) {
                    valueFont = '700 14px "Open Sans", sans-serif';
                } else {
                    valueFont = '700 16px "Open Sans", sans-serif';
                }

                ctx.save();
                ctx.textBaseline = 'bottom';
                ctx.fillStyle = 'white';

                // Draw label
                const extraWidth = is1600px ? 10 : 0;
                const labelTextWidth = ctx.measureText(labelText).width + extraWidth;
                ctx.font = labelFont;
                ctx.fillText(labelText, left, barY - offset, labelTextWidth);

                // Get width of label text to position value precisely
                const labelWidth = ctx.measureText(valueText).width + 10;

                // Draw value right after label
                ctx.font = valueFont;
                ctx.fillText(valueText, left + labelTextWidth, barY - offset, labelWidth);
                ctx.restore();
            });
        }
    };

    const data = {
        labels: labels,
        datasets: [{
            data: salaryData,
            backgroundColor: '#1e90ff',
            borderRadius: is910px ? 8 : 10,
            barThickness: is910px ? 25 : is1600px ? 60 : 70,
            borderSkipped: false,
        }]
    };

    const options = {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: false,
        layout: {
            padding: {
                top: 0,
                bottom: 0,
            }
        },
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                enabled: false,
            }
        },
        scales: {
            x: {
                min: 0,
                ticks: {
                    color: '#fff',
                    callback: value => `${formatNumber(value, { locale: country })}`,
                    beginAtZero: false,
                    font: {
                        size: is1600px ? 12 : 14,
                    },
                    autoSkip: false,
                    maxTicksLimit: 5,
                },
                grid: {
                    color: '#FFFFFF40'
                },
                border: {
                    dash: [4, 10],
                },
            },
            y: {
                ticks: {
                    display: false
                },
                grid: {
                    display: false
                }
            }
        }
    };

    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options,
        plugins: [aboveBarLabelsPlugin]
    });
}

function compBreakUpChart(comp_breakup_base_salary_percent, comp_breakup_variable_comp_percent, comp_breakup_equity_percent) {
    const ctx = document.getElementById("compBreakUpChart").getContext("2d");
    const isMobile = getIsMobile(375);

    const image = new Image();
    image.src = themeVars.themeUrl + "/assets/img/salary/image.png";

    image.onload = function () {
        const chart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Fixed", "Variable", "Equity"],
                datasets: [
                    {
                        data: [comp_breakup_base_salary_percent, comp_breakup_variable_comp_percent, comp_breakup_equity_percent],
                        backgroundColor: ["#00165C", "#004998", "#5BC1FF"],
                        spacing: 6,
                        borderRadius: 5,
                        borderWidth: 0,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                    datalabels: {
                        display: false,
                    },
                    annotation: {
                        annotations: {
                            centerImage: {
                                type: "doughnutLabel",
                                content: image,
                                width: isMobile ? 40 : 67,
                                height: isMobile ? 40 : 67,
                            },
                        },
                    },
                },
                cutout: "60%",
            },
        });
    };
}

function calculateYAxisScaleCustom(startValue, lowerTarget, upperTarget) {
    // Find the largest distance from startValue to either target
    const maxDistance = Math.max(
        Math.abs(startValue - lowerTarget),
        Math.abs(startValue - upperTarget)
    );
    // Set min to 0, and max so that startValue is centered between 0 and max, with extra headroom
    const min = 0;
    // Add two extra ticks (assuming tick size is 1000)
    const tickSize = 1000;
    const max = Math.ceil((startValue + maxDistance) / tickSize) * tickSize + 2 * tickSize;
    return { min, max };
}

function generateDataPoints(startValue, isUp) {
    let points;
    if (isUp) {
        // Blue: slightly above at start, curves upward
        points = [
            startValue,                // 2025
            startValue * 1.015,        // 2026
            startValue * 1.03,         // 2027
            startValue * 1.08,         // 2028
            startValue * 1.16,         // 2029
            startValue * 1.26,         // 2030
            startValue * 1.36          // 2031
        ];
    } else {
        // Orange: close at first, then curves downward
        points = [
            startValue,                // 2025
            startValue * 0.995,        // 2026
            startValue * 0.985,        // 2027
            startValue * 0.965,        // 2028
            startValue * 0.945,        // 2029
            startValue * 0.925,        // 2030
            startValue * 0.90          // 2031
        ];
    }
    return points.map(Math.round);
}

function careerProjectionChart(projection_net_worth_lower_range, projection_net_worth_upper_range, country, market_value_lower_range, market_value_upper_range) {
    const ctx = document.getElementById('careerProjectionChart').getContext('2d');
    const isMobile = getIsMobile(900);

    // Use market_value_lower_range as the starting point for both lines
    const midpoint = market_value_lower_range;
    const yourTrajectory = generateDataPoints(midpoint, false);
    const inflationNeeded = generateDataPoints(midpoint, true);
    const gradient = ctx.createLinearGradient(0, 0, 0, 304);
    const gradientColOpacity = isMobile ? '0.30' : '0.67';
    gradient.addColorStop(0, `rgba(255, 170, 0, ${gradientColOpacity})`);
    gradient.addColorStop(1, 'rgba(118, 96, 50, 0)');

    // Values to display in the gray box
    const CURRENT_VALUE_LOWER = market_value_lower_range;
    const CURRENT_VALUE_UPPER = market_value_upper_range;


    const customLabelPlugin = {
        id: "customLabel",
        afterDatasetsDraw(chart) {
            const { ctx, scales } = chart;

            const labelText = `${formatNumber(
                CURRENT_VALUE_LOWER, { locale: country }
            )} - ${formatNumber(CURRENT_VALUE_UPPER, { locale: country })}`;
            const topText = "Currently here";

            const labelX = scales.x.getPixelForValue("2025") + (isMobile ? 40 : 65);
            const labelY = scales.y.getPixelForValue(CURRENT_VALUE_LOWER) - (isMobile ? -3 : -3);

            const boxWidth = isMobile ? 80 : 135;
            const boxHeight = isMobile ? 36 : 51;
            const pointerHeight = isMobile ? 10 : 19;
            const pointerWidth = isMobile ? 11 : 24;
            const borderRadius = isMobile ? 5 : 10;

            const boxX = labelX - boxWidth / 2; // Make this dynamic using scales.x.getPixelForValue
            let boxY = labelY - boxHeight - pointerHeight; // Make this dynamic using scales.y.getPixelForValue

            ctx.save();
            ctx.fillStyle = "#0082F8";
            ctx.beginPath();

            // Draw "Currently here" box
            if (isMobile) {
                // boxY = labelY - 5;
                // Right side rounded corner remains
                ctx.lineTo(boxX + boxWidth - borderRadius, boxY + boxHeight);
                ctx.quadraticCurveTo(
                    boxX + boxWidth,
                    boxY + boxHeight,
                    boxX + boxWidth,
                    boxY + boxHeight - borderRadius
                );

                // Continue with the rest of the right side
                ctx.lineTo(boxX + boxWidth, boxY + borderRadius);
                ctx.quadraticCurveTo(
                    boxX + boxWidth,
                    boxY,
                    boxX + boxWidth - borderRadius,
                    boxY
                );

                // Top of the box
                ctx.lineTo(boxX + borderRadius, boxY);
                ctx.quadraticCurveTo(boxX, boxY, boxX, boxY + borderRadius);

                ctx.lineTo(boxX, boxY + boxHeight - borderRadius);
                ctx.lineTo(boxX, boxY + boxHeight);

                // Draw right-angled triangle pointer with a rounded tip
                const triangleBaseRightX = boxX + pointerWidth - 3;
                const triangleBaseRightY = boxY + boxHeight;
                const triangleTipX = boxX;
                const triangleTipY = boxY + boxHeight + pointerHeight;
                const tipRadius = 2;

                ctx.lineTo(triangleTipX, triangleTipY - tipRadius);
                ctx.arc(
                    triangleTipX + tipRadius,
                    triangleTipY - tipRadius,
                    tipRadius,
                    Math.PI,
                    Math.PI / 2,
                    true
                );
                ctx.lineTo(triangleBaseRightX, triangleBaseRightY);

                ctx.closePath();
            } else {
                ctx.moveTo(boxX + borderRadius, boxY);
                ctx.lineTo(boxX + boxWidth - borderRadius, boxY);
                ctx.quadraticCurveTo(
                    boxX + boxWidth,
                    boxY,
                    boxX + boxWidth,
                    boxY + borderRadius
                );
                ctx.lineTo(boxX + boxWidth, boxY + boxHeight - borderRadius);
                ctx.quadraticCurveTo(
                    boxX + boxWidth,
                    boxY + boxHeight,
                    boxX + boxWidth - borderRadius,
                    boxY + boxHeight
                );

                // Pointer - positioned to match design
                const pointerOffsetX = 45;
                const pointerBaseX = labelX - pointerOffsetX;
                const triangleBaseY = boxY + boxHeight;
                const triangleTipY = triangleBaseY + pointerHeight;
                const tipRadius = 2;

                // Start from right side of triangle base
                ctx.lineTo(pointerBaseX + pointerWidth / 2, triangleBaseY);

                // Draw right edge of triangle down to just above tip (right side)
                ctx.lineTo(pointerBaseX + tipRadius, triangleTipY - tipRadius);

                // Curve the bottom tip
                ctx.quadraticCurveTo(
                    pointerBaseX,
                    triangleTipY, // control point (at the tip)
                    pointerBaseX - tipRadius,
                    triangleTipY - tipRadius // end at left side above tip
                );

                // Draw left edge of triangle up to left base
                ctx.lineTo(pointerBaseX - pointerWidth / 2, triangleBaseY);

                ctx.lineTo(boxX + borderRadius, boxY + boxHeight);
                ctx.quadraticCurveTo(
                    boxX,
                    boxY + boxHeight,
                    boxX,
                    boxY + boxHeight - borderRadius
                );
                ctx.lineTo(boxX, boxY + borderRadius);
                ctx.quadraticCurveTo(boxX, boxY, boxX + borderRadius, boxY);
                ctx.closePath();
            }

            ctx.fill();

            // Top text
            ctx.fillStyle = "#FFFFFF";
            ctx.font = isMobile
                ? "400 8px Open Sans"
                : "400 11px Open Sans";

            const topTextWidth = ctx.measureText(topText).width;
            // position of top text inside the box
            ctx.fillText(
                topText,
                labelX - topTextWidth / 2 - (isMobile ? 4 : 15),
                boxY + (isMobile ? 13 : 20)
            );

            // Bottom bold text
            ctx.font = isMobile
                ? "700 10px Open Sans"
                : "700 16px Open Sans";

            // position of bottom text inside the box
            ctx.fillText(
                labelText,
                labelX - topTextWidth / 2 - (isMobile ? 4 : 15),
                boxY + (isMobile ? 28 : 40)
            );

            ctx.restore();
        },
    };

    const yAxisScale = (() => {
        const allValues = inflationNeeded.concat(yourTrajectory);
        const min = 0;
        const maxVal = Math.max(...allValues);
        const buffer = Math.ceil(maxVal * 0.12 / 1000) * 1000; // 12% headroom
        const max = maxVal + buffer;
        const stepSize = Math.ceil(max / 5 / 1000) * 1000; // uniform 5 steps
        return { min, max, stepSize };
    })();


    const labels = ["2025", "2026", "2027", "2028", "2029", "2030", "2031"];
    
    const data = {
        labels: labels,
        datasets: [
          {
            label: 'Your Salary Trajectory',
            data: yourTrajectory,
            borderColor: '#FF9201',
            backgroundColor: gradient,
            pointRadius: 0,
            pointHoverRadius: 0,
            borderWidth: 4,
            tension: 0.4,
            fill: true,
          },
          {
            label: 'Salary needed to beat inflation',
            data: inflationNeeded,
            borderColor: '#0082F8',
            backgroundColor: '#0082F8',
            pointRadius: 0,
            pointHoverRadius: 0,
            borderWidth: 4,
            tension: 0.4,
          },
        ],
      };

    const config = {
        type: "line",
        data: data,
        options: {
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            },
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          scales: {
            x: {
              offset: true,
              ticks: {
                color: isMobile ? '#FFFFFFE5' : '#fff',
                font: { size: isMobile ? 10 : 14, weight: '500', family: 'Lato' },
                padding: isMobile ? 5 : 10,
                maxTicksLimit: isMobile ? 5 : 7,
                align: "end",
              },
              grid: {
                  display: false,
              },
              border: {
                display: false,
              },
              offset: false,
            },
            y: {
                min: yAxisScale.min,
                max: yAxisScale.max,
              ticks: {
                color: isMobile ? '#FFFFFFE5' : '#fff',
                font: { size: isMobile ? 10 : 14, weight: '500', family: 'Lato' },
                callback: value => `${formatNumber(value, { locale: country, precision: 0 })}`,
                maxTicksLimit: isMobile ? 6 : 8,
                drawOnChartArea: true,
                crossAlign: "far",
                padding: isMobile ? 5 : 12,
                align: "left",
                stepSize: yAxisScale.stepSize,
              },
              border: {
                display: false,
              },
              grid: {
                color: "#FFFFFF33",
                drawBorder: false,
                drawTicks: false,
              },
              align: "start",
              position: "left",
              offset: true,
              afterFit: function (scale) {
                  scale.paddingTop = 0;
                  scale.paddingBottom = 0;
              },
              border: { display: false },
            },
          },
        },
        plugins: [customLabelPlugin],
      };
  
      new Chart(ctx, config);
}

function salaryUpliftChart(skills_and_compensation_correlation) {
    // Shuffle the array for random order
    const shuffled = [...skills_and_compensation_correlation].sort(() => Math.random() - 0.5);


    const ctx = document.getElementById('salaryUpliftChart').getContext('2d');
    const isMobile = getIsMobile(900);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: shuffled.map(skill => skill.skill_name),
            datasets: [{
                data: shuffled.map(skill => skill.salary_uplift_percentage),
                backgroundColor: '#0082F8',
                borderRadius: 6,
                barPercentage: 0.6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    top: 30
                }
            },
            scales: {
                y: {
                    min: 0,
                    max: 30,
                    ticks: {
                        color: isMobile ? '#FFFFFFE5' : '#FFF8F8',
                        callback: value => value + '%',
                        font: { size: isMobile ? 11 : 14, weight: '400' },
                        padding: 3,
                        crossAlign: "far",
                        stepSize: 6,
                    },
                    grid: {
                        color: '#FFFFFF33'
                    },
                    border: { display: false },
                    beginAtZero: true
                },
                x: {
                    ticks: {
                        color: isMobile ? '#FFFFFFE5' : '#FFFFFF',
                        padding: 10,
                        font: { size: isMobile ? 11 : 14, weight: '400' },
                        minRotation: isMobile ? 90 : 0, // Vertical on mobile, horizontal on desktop
                        maxRotation: isMobile ? 90 : 0,
                        callback: function (value, index, ticks) {
                            // if (isMobile) return this.getLabelForValue(value); // vertical, no wrapping
                            const label = this.getLabelForValue(value);
                            const maxLineLength = 14; // max chars per line
                            if (label.length <= maxLineLength) return label;
                            // Split by space, then join words into lines
                            const words = label.split(' ');
                            let lines = [];
                            let currentLine = '';
                            words.forEach(word => {
                                if ((currentLine + ' ' + word).trim().length > maxLineLength) {
                                    if (currentLine) lines.push(currentLine.trim());
                                    currentLine = word;
                                } else {
                                    currentLine += ' ' + word;
                                }
                            });
                            if (currentLine) lines.push(currentLine.trim());
                            return lines;
                        },
                        crossAlign: "center",
                    },
                    grid: {
                        display: false
                    },
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: context => context.raw + '%'
                    }
                }
            }
        }
    });
}

function networthGrowthChart(avg_potential_net_worth, country) {
    const ctx = document.getElementById('networthGrowthChart').getContext('2d');
    const isMobile = getIsMobile(900);

    const lower_range = avg_potential_net_worth?.start_point; // e.g. 5000000
    const upper_range = avg_potential_net_worth?.end_point;   // e.g. 14900000

    const labels = [1.0, 1.5, 2.0, 2.5, 3.0, 3.5, 4.0];

    // Base multipliers - all starting at 1.0
    const BASE_AI_ENABLED_VIA_IK = [1.0, 1.5, 1.8, 2.0, 2.1, 2.3, 2.5];
    const BASE_INDUSTRY_AVERAGE = [1.0, 1.2, 1.5, 1.7, 1.9, 2.0, 2.2];
    const BASE_NON_AI_ENABLED = [1.0, 1.1, 1.15, 1.2, 1.25, 1.3, 1.35];

    // Calculate scale factor to ensure final value reaches upper_range
    const finalMultiplier = BASE_AI_ENABLED_VIA_IK[BASE_AI_ENABLED_VIA_IK.length - 1];
    const scaleFactor = (upper_range - lower_range) / (lower_range * (finalMultiplier - 1));

    // Scale all multipliers accordingly, ensuring they all start at lower_range
    const aiEnabledViaIK = BASE_AI_ENABLED_VIA_IK.map(m => lower_range + (m - 1) * scaleFactor * lower_range);
    const industryAverage = BASE_INDUSTRY_AVERAGE.map(m => lower_range + (m - 1) * scaleFactor * lower_range);
    const nonAiEnabled = BASE_NON_AI_ENABLED.map(m => lower_range + (m - 1) * scaleFactor * lower_range);

    const stepSize = (upper_range - lower_range) / 6; // Divide the range into 5 evenly spaced ticks

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'AI Enabled Via IK',
                    data: aiEnabledViaIK,
                    borderColor: '#fff',
                    backgroundColor: 'transparent',
                    borderWidth: 4,
                    pointRadius: 0,
                    pointHoverRadius: 0,
                    fill: false,
                    order: 1,
                },
                {
                    label: 'Industry Average (AI-Enabled)',
                    data: industryAverage,
                    borderColor: '#81c0ff',
                    backgroundColor: 'transparent',
                    borderWidth: 4,
                    pointRadius: 0,
                    pointHoverRadius: 0,
                    fill: false,
                    order: 2,
                },
                {
                    label: 'Non-AI Enabled',
                    data: nonAiEnabled,
                    borderColor: '#535353',
                    backgroundColor: 'transparent',
                    borderWidth: 4,
                    pointRadius: 0,
                    pointHoverRadius: 0,
                    fill: false,
                    order: 3,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: false },
            },
            layout: {
                padding: 0,
            },
            scales: {
                x: {
                    type: 'linear',
                    min: 1.0,
                    max: 4.0,
                    grid: {
                        display: false,
                        drawBorder: false,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderWidth: 0,
                        borderColor: "transparent",
                    },
                    ticks: {
                        callback: v => v.toFixed(1),
                        color: isMobile ? '#FFFFFFE5' : '#fff',
                        font: { size: isMobile ? 11 : 14, weight: '400' },
                        padding: 25,
                        align: "end",
                        stepSize: 0.5,
                        beginAtZero: false,
                    },
                },
                y: {
                    min: lower_range,
                    max: upper_range,
                    grid: {
                        color: '#FFFFFF33',
                        drawBorder: false,
                        drawOnChartArea: true,
                        drawTicks: false,
                    },
                    ticks: {
                        color: isMobile ? '#FFFFFFE5' : '#fff',
                        font: { size: isMobile ? 11 : 14, weight: '400' },
                        callback: v => formatNumber(v, { locale: country }),
                        padding: 10,
                        maxTicksLimit: isMobile ? 6 : 7,
                        stepSize: stepSize, // Set the calculated step size
                    },
                    border: {
                        display: false
                    }
                },
            },
        },
    });
}

