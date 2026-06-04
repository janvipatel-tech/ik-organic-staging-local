document.addEventListener("DOMContentLoaded", function () {
  //locale code

  function getCountrySymbol(country) {
    return country === "India" ? "₹" : "$";
  }

  function formatNumber(amount, { locale = "USA", precision = 2 } = {}) {
    if (typeof amount !== "number") {
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
  let gaugeChart;
  function renderGaugeChart(score) {
    let aiScoreValue = score;

    const isMobile = window.innerWidth <= 375;
    const ctx = document.getElementById("gaugeChart").getContext("2d");

    if (gaugeChart) gaugeChart.destroy(); // destroy previous instance if exists

    gaugeChart = new Chart(ctx, {
      type: "doughnut",
      data: {
        datasets: [
          {
            data: [45, 15, 15, 25],
            backgroundColor: ["#FFA800", "#FFC960", "#FFEB3A", "#7FE47E"],
            borderColor: "#ffffff",
            borderWidth: 6,
            cutout: "83%",
            circumference: 180,
            rotation: 270,
            spacing: isMobile ? 1 : 7,
            borderRadius: 10,
          },
        ],
      },
      options: {
        plugins: {
          tooltip: { enabled: false },
          legend: { display: false },
        },
      },
      plugins: [
        {
          id: "gaugeIndicator",
          afterDatasetsDraw(chart) {
            const arc = chart.getDatasetMeta(0).data[0];
            const { x: centerX, y: centerY } = arc;
            const radius = arc.outerRadius - 5;

            const textCenterY = centerY - 25;
            const textCenterX = centerX - 10;

            // Convert value (0-100) to angle (in radians) within a half-circle (180 deg)
            const angle = Math.PI + (aiScoreValue / 100) * Math.PI;

            const indicatorX = centerX + radius * Math.cos(angle);
            const indicatorY = centerY + radius * Math.sin(angle);

            const ctx = chart.ctx;
            ctx.save();

            // Big Circle
            ctx.fillStyle = "#FFF";
            ctx.beginPath();
            ctx.arc(indicatorX, indicatorY, 8, 0, Math.PI * 2);
            ctx.fill();
            ctx.lineWidth = 3;
            ctx.strokeStyle = "#FFEB3B";
            ctx.stroke();

            const mainText = isMobile ? "700 46.68px Inter" : "700 56px Arial";
            const subText = isMobile ? "700 13.33px Inter" : "700 16px Inter";

            // Draw main value
            ctx.save();
            ctx.fillStyle = "#1E1B39";
            ctx.font = mainText;
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";
            ctx.fillText(`${aiScoreValue}`, textCenterX, textCenterY);

            // Get metrics of the main text to position the subtext beside it
            const metrics = ctx.measureText(`${aiScoreValue}`);
            const mainTextWidth = metrics.width;

            // Draw "/100" beside the main text
            ctx.font = subText;
            ctx.textAlign = "left";
            ctx.fillText(
              `/100`,
              textCenterX + mainTextWidth / 2 + 5,
              textCenterY + 12
            );
            ctx.restore();
          },
        },
      ],
    });
  }

  /*button copy code*/

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
            copyButton.innerHTML =
              '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"><g clip-path="url(#clip0_747_2718)"><path d="M6.66663 8.66697C6.95293 9.04972 7.3182 9.36642 7.73766 9.59559C8.15712 9.82477 8.62096 9.96105 9.09773 9.99519C9.57449 10.0293 10.053 9.96055 10.5009 9.79349C10.9487 9.62643 11.3554 9.36501 11.6933 9.02697L13.6933 7.02697C14.3005 6.39829 14.6365 5.55629 14.6289 4.6823C14.6213 3.80831 14.2707 2.97227 13.6527 2.35424C13.0347 1.73621 12.1986 1.38565 11.3246 1.37806C10.4506 1.37046 9.60863 1.70644 8.97996 2.31364L7.83329 3.45364" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.33334 7.33283C9.04704 6.95008 8.68177 6.63338 8.26231 6.40421C7.84285 6.17503 7.37901 6.03875 6.90224 6.00461C6.42548 5.97047 5.94695 6.03925 5.49911 6.20631C5.05128 6.37337 4.6446 6.63479 4.30668 6.97283L2.30668 8.97283C1.69948 9.60151 1.3635 10.4435 1.3711 11.3175C1.37869 12.1915 1.72926 13.0275 2.34728 13.6456C2.96531 14.2636 3.80135 14.6142 4.67534 14.6217C5.54933 14.6293 6.39134 14.2934 7.02001 13.6862L8.16001 12.5462" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_747_2718"><rect width="16" height="16" fill="white"/></clipPath></defs></svg> Copy link to your results';
            copyButton.classList.remove("copied");
            copyButton.classList.add("icon-btn", "btn-outline");
          }, 2000);
        })
        .catch(function (error) {
          console.error("Failed to copy text: ", error);
        });
    });
  }

  /*share code*/

  const shareButton = document.getElementById("shareButton");
  const shareModal = document.getElementById("shareOptionsModal");
  const currentUrl =
    window.location.origin +
    "/ai-quotient-analyzer?utm_source=referral&utm_campaign=sharebutton";

  const copyResultsLink = document.getElementById("copy-results-link");
  if (copyResultsLink) {
    copyResultsLink.addEventListener("click", function () {
      const url =
        window.location.origin +
        "/ai-quotient-analyzer?utm_source=referral&utm_campaign=sharebutton";
      navigator.clipboard
        .writeText(url)
        .then(function () {
          copyResultsLink.innerHTML =
            "<svg xmlns='http://www.w3.org/2000/svg' width='13' height='15' viewBox='0 0 13 15' fill='none'> <path d='M4.9375 11.3854C4.57083 11.3854 4.25706 11.255 3.99617 10.9941C3.73483 10.7327 3.60417 10.4187 3.60417 10.0521V2.05208C3.60417 1.68542 3.73483 1.37142 3.99617 1.11008C4.25706 0.849194 4.57083 0.71875 4.9375 0.71875H10.9375C11.3042 0.71875 11.6182 0.849194 11.8795 1.11008C12.1404 1.37142 12.2708 1.68542 12.2708 2.05208V10.0521C12.2708 10.4187 12.1404 10.7327 11.8795 10.9941C11.6182 11.255 11.3042 11.3854 10.9375 11.3854H4.9375ZM4.9375 10.0521H10.9375V2.05208H4.9375V10.0521ZM2.27083 14.0521C1.90417 14.0521 1.59017 13.9216 1.32883 13.6607C1.06794 13.3994 0.9375 13.0854 0.9375 12.7187V4.05208C0.9375 3.86319 1.0015 3.70475 1.1295 3.57675C1.25706 3.44919 1.41528 3.38542 1.60417 3.38542C1.79306 3.38542 1.9515 3.44919 2.0795 3.57675C2.20706 3.70475 2.27083 3.86319 2.27083 4.05208V12.7187H8.9375C9.12639 12.7187 9.28483 12.7827 9.41283 12.9107C9.54039 13.0383 9.60417 13.1965 9.60417 13.3854C9.60417 13.5743 9.54039 13.7325 9.41283 13.8601C9.28483 13.9881 9.12639 14.0521 8.9375 14.0521H2.27083Z' fill='#0082f8' stroke='none'></path></svg> Link Copied";
          copyResultsLink.classList.add("copied");
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

  function renderNetWorthChart(metrics) {
    const canvas = document.getElementById("netWorthChart");
    if (!canvas) return;

    const ctx = canvas.getContext("2d");
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Utility to format value
    const formatRange = ({ lower_range, upper_range }) =>
      `$${Math.round(lower_range / 1000)}k - $${Math.round(
        upper_range / 1000
      )}k`;

    // Get ranges from dynamic API response
    const current = formatRange(metrics.current_networth);
    const same = formatRange(metrics.networth_projection_same_job);
    const ai = formatRange(metrics.networth_projection_ai_job);

    // Draw pill function
    function drawPill(ctx, x, y, width, height, color, label) {
      ctx.fillStyle = color;
      ctx.beginPath();
      ctx.roundRect(x, y, width, height, 20);
      ctx.fill();

      ctx.fillStyle = "#fff";
      ctx.font = "16px Arial";
      ctx.textAlign = "center";
      ctx.textBaseline = "middle";
      ctx.fillText(label, x + width / 2, y + height / 2);
    }

    // Add roundRect to canvas context if not already defined
    if (!CanvasRenderingContext2D.prototype.roundRect) {
      CanvasRenderingContext2D.prototype.roundRect = function (x, y, w, h, r) {
        if (w < 2 * r) r = w / 2;
        if (h < 2 * r) r = h / 2;
        this.beginPath();
        this.moveTo(x + r, y);
        this.arcTo(x + w, y, x + w, y + h, r);
        this.arcTo(x + w, y + h, x, y + h, r);
        this.arcTo(x, y + h, x, y, r);
        this.arcTo(x, y, x + w, y, r);
        this.closePath();
        return this;
      };
    }

    // Draw dynamically with positions
    const tooltipLabelWidth = 160;
    const tooltipLabelHeight = 40;
    const baseY = 100;
    const spacing = 220;

    drawPill(
      ctx,
      150,
      baseY,
      tooltipLabelWidth,
      tooltipLabelHeight,
      "#888888",
      current
    );
    drawPill(
      ctx,
      150 + spacing,
      baseY,
      tooltipLabelWidth,
      tooltipLabelHeight,
      "#C1C1C1",
      same
    );
    drawPill(
      ctx,
      150 + spacing * 2,
      baseY,
      tooltipLabelWidth,
      tooltipLabelHeight,
      "#1E88E5",
      ai
    );
  }

  function getUUIDFromURL() {
    const query = window.location.search;
    return query ? query.substring(1) : null;
  }

  const uuid = getUUIDFromURL();
  if (!uuid) return;

  const shimmer = document.getElementById("shimmer-loader");
  const results = document.getElementById("results-content");
  const pollInterval = setInterval(pollResumeStatus, 5000);
  async function pollResumeStatus() {
    fetch(`${themeVars.ajaxUrl}?action=poll_resume_analysis&uuid=${uuid}`)
      .then((res) => res.json())
      .then((response) => {
        if (!response.success && response.data.state === "FAILED") {
          clearInterval(pollInterval);
          alert("Sorry Unable to fetch the Result,Please try again");
          window.location =
            "/ai-quotient-analyzer";
        }

        if (response.success && response.data.state === "COMPLETED") {
          //   clearInterval(pollInterval);
          clearInterval(pollInterval);
          // Hide shimmer, show results
          shimmer.style.display = "none";
          results.style.display = "block";

          //save data to localstirage

          localStorage.setItem("webinar_user_name", response.data.data?.name);
          localStorage.setItem("webinar_user_email", response.data.data?.email);
          localStorage.setItem(
            "webinar_user_phone",
            response.data.data?.phone_number
          );
          const getThePopupFrom2 = document.querySelector(".v2_from_wrapper");
          const webNearFullName2 =
            getThePopupFrom2.querySelector("input.fr_name_fl");
          const webNearEmailAddress2 =
            getThePopupFrom2.querySelector(".fr_email_fl");
          const webNearPhoneNumber2 =
            getThePopupFrom2.querySelector(".fr_phone_fl");
          if (webNearFullName2) {
            webNearFullName2.value = response.data.data?.name;
          }

          if (webNearEmailAddress2) {
            webNearEmailAddress2.value = response.data.data?.email;
          }
          if (webNearPhoneNumber2) {
            webNearPhoneNumber2.value = response.data.data?.phone_number;
          }
          getThePopupFrom2.setAttribute("active_step", "2");
          // Check if ai_readiness_score exists in the response
          // ✅ NEW (correct)
          const aiReadinessScoreData = response.data.data?.ai_readiness_score;
          if (aiReadinessScoreData) {
            // aiReadinessScore exists, log and process it
            const aiReadinessScore = aiReadinessScoreData.aiReadinessScore;
            if (aiReadinessScore !== undefined) {
              // console.log("AI Readiness Score:", aiReadinessScore); // Log the AI readiness score
              renderGaugeChart(aiReadinessScore); // Update chart with AI readiness score
            }
          }

          const aiReadinessSummary =
            response.data.data?.ai_readiness_score?.summary;
          if (aiReadinessSummary) {
            // console.log("AI Readiness Summary:", aiReadinessSummary);
            const summaryElement = document.getElementById("ai-summary-text");
            if (summaryElement) {
              summaryElement.innerHTML = aiReadinessSummary; // Update the summary element
            }
          } else {
            console.error("AI readiness summary not found in response");
          }

          const skill_gap_analysis =
            response.data.data?.ai_skill_analysis?.skill_gap_analysis;

          if (
            Array.isArray(skill_gap_analysis) &&
            skill_gap_analysis.length > 0
          ) {
            // console.log("Skills:", skill_gap_analysis);

            const skillGapListContainer = document.getElementById(
              "result-pera-box-list"
            );

            if (skillGapListContainer) {
              // console.log("test")
              skill_gap_analysis.forEach((skill, index) => {
                // console.log("skillsloop:", skill);
                const listItem = document.createElement("div");
                listItem.classList.add("result-pera-box-item");
                listItem.innerHTML = `
                                    <img src="${themeVars.themeUrl
                  }/assets/img/skills-img-${index + 1
                  }.png" alt="Skill Image" />
                                    ${skill}
                                `;
                skillGapListContainer.appendChild(listItem);
              });
              // console.log(skillGapListContainer);
            } else {
              console.error("Skill gap list container not found in the DOM.");
            }
          } else {
            console.error("Skill gap analysis not found or empty in response");
          }
          //AI road map

          const aiRoadmap = response.data.data?.ai_roadmap;

          if (
            aiRoadmap &&
            aiRoadmap["Current Role"] &&
            aiRoadmap["Current Role"]["Job Title"]
          ) {
            const jobTitle = aiRoadmap["Current Role"]["Job Title"];
            // console.log("Current Job Title:", jobTitle);
          } else {
            console.warn("Unable to locate current job title");
            // console.log("ai_roadmap object:", aiRoadmap);
          }

          //

          // Extract the data from the response
          const metrics = response.data?.data?.precomputed_metrics;
          // console.log("Precomputed Metrics:", metrics);

          currentNetworth = metrics.current_networth;
          networthProjectionSameJob = metrics.networth_projection_same_job;
          networthProjectionAIJob = metrics.networth_projection_ai_job;
          country = metrics.country;
          if (
            currentNetworth &&
            networthProjectionSameJob &&
            networthProjectionAIJob &&
            country
          ) {
            displayLineChart(
              currentNetworth,
              networthProjectionSameJob,
              networthProjectionAIJob,
              country
            );
          }

          //AI enabled jobs

          const aienabled = response.data?.data?.precomputed_metrics;
          if (aienabled?.ai_job_market_share_5_years) {
            piechart(aienabled);
          }

          //target roles
          const targetRolesContainer =
            document.getElementById("role-suggested");
          const targetRoles =
            response.data.data?.ai_skill_analysis?.target_ai_role;
          if (targetRolesContainer) {
            targetRolesContainer.innerHTML = `To becoming ${targetRoles}`;
          }

          //Role Redundancy Risk
          const roleRedundancyRiskContainer = document.getElementById(
            "role-redundancy-risk"
          );
          const roleRedundancyRisk = response.data.data?.precomputed_metrics;
          if (roleRedundancyRiskContainer) {
            roleRedundancyRiskContainer.innerHTML = `${roleRedundancyRisk?.role_redundancy_risk}%`;
          }
          const layoffRiskContainer = document.getElementById(
            "layoff-risk-reduction"
          );
          const layoffRisk = response.data.data?.precomputed_metrics;
          if (layoffRisk) {
            layoffRiskContainer.innerHTML = `${layoffRisk?.layoff_risk_reduction}%`;
          }

          //ai readdiness current score
          const AireadnessCurrentScore =
            response.data.data?.precomputed_metrics;
          const aiReadinessCurrentScoreContainer =
            document.getElementById("ai-readinesss");
          if (aiReadinessCurrentScoreContainer) {
            aiReadinessCurrentScoreContainer.innerHTML = `~${AireadnessCurrentScore?.ai_readiness_after_course}<span>/100</span>`;
          }

          //increatenteworth

          const IncrearenetWotrhConatiner =
            document.getElementById("increase-net-worth");
          const increasNetworth =
            response.data.data?.precomputed_metrics
              ?.increased_net_worth_percentage;
          if (IncrearenetWotrhConatiner) {
            IncrearenetWotrhConatiner.innerHTML = `+${increasNetworth}% from your current trajectory`;
          }

          const currentTrends = document.getElementById("current-trends");
          const currentTrendsData =
            response.data.data?.precomputed_metrics?.current_trends;
          if (currentTrends) {
            currentTrends.innerHTML = `${currentTrendsData}`;
          }

          const futureTrends = document.getElementById("future-trends");
          const futureTrendsData =
            response.data.data?.precomputed_metrics?.future_trends;
          if (futureTrends) {
            futureTrends.innerHTML = `${futureTrendsData}`;
          }

          const cousestitle1 = document.getElementById("course-title1");
          const cousestitle2 = document.getElementById("course-title2");
          const cousestitle3 = document.getElementById("course-title3");

          const cousestitle1data =
            response.data.data?.precomputed_metrics?.course_name_1;
          const cousestitle2data =
            response.data.data?.precomputed_metrics?.course_name_2;
          const cousestitle3data =
            response.data.data?.precomputed_metrics?.course_name_3;
          if (cousestitle1) {
            cousestitle1.innerHTML = `${cousestitle1data}`;
          }
          if (cousestitle2) {
            cousestitle2.innerHTML = `${cousestitle2data}`;
          }
          if (cousestitle3) {
            cousestitle3.innerHTML = `${cousestitle3data}`;
          }

          const courseLink1 = document.getElementById("course-card1");
          const courseLink2 = document.getElementById("course-card2");
          const courseLink3 = document.getElementById("course-card3");
          let couseslink1data, couseslink2data, couseslink3data;

          if (v_country === "India") {
            couseslink1data = "https://staging-4eb7-ininterviewkickstart.wpcomstaging.com";
            couseslink2data = "https://staging-4eb7-ininterviewkickstart.wpcomstaging.com";
            couseslink3data = "https://staging-4eb7-ininterviewkickstart.wpcomstaging.com";
          } else {
            couseslink1data = response.data.data?.precomputed_metrics?.course_link_1?.replace(/\\\//g, "/");
            couseslink2data = response.data.data?.precomputed_metrics?.course_link_2?.replace(/\\\//g, "/");
            couseslink3data = response.data.data?.precomputed_metrics?.course_link_3?.replace(/\\\//g, "/");
          }

          function appendUTM(urlStr, utmSourceValue) {
            try {
              const url = new URL(urlStr);
              url.searchParams.set("utm_source", utmSourceValue);
              return url.toString();
            } catch (e) {
              console.error("Invalid URL:", urlStr);
              return urlStr; // fallback to original
            }
          }

          if (couseslink1data) {
            courseLink1.href = appendUTM(couseslink1data, "AI_quotient");
          }
          if (couseslink2data) {
            courseLink2.href = appendUTM(couseslink2data, "AI_quotient");
          }
          if (couseslink3data) {
            courseLink3.href = appendUTM(couseslink3data, "AI_quotient");
          }

          const courseDesc1 = document.getElementById("course-desc1");
          const courseDesc2 = document.getElementById("course-desc2");
          const courseDesc3 = document.getElementById("course-desc3");

          const courseDesc1data =
            response.data.data?.precomputed_metrics?.course_description_1;
          const courseDesc2data =
            response.data.data?.precomputed_metrics?.course_description_2;
          const courseDesc3data =
            response.data.data?.precomputed_metrics?.course_description_3;

          if (courseDesc1) {
            courseDesc1.innerHTML = `${courseDesc1data}`;
          }
          if (courseDesc2) {
            courseDesc2.innerHTML = `${courseDesc2data}`;
          }
          if (courseDesc3) {
            courseDesc3.innerHTML = `${courseDesc3data}`;
          }

          //raadar chart
          const radarChartvalue = response.data.data?.ai_skill_analysis?.skills;
          if (radarChartvalue && radarChartvalue.length > 0) {
            let skill_names = radarChartvalue.map((skill) => skill.skill_name);
            let required_levels = radarChartvalue.map(
              (skill) => skill.required_level
            );
            let current_levels = radarChartvalue.map(
              (skill) => skill.current_level
            );
            radarChart(skill_names, required_levels, current_levels);
          }

          //airoadmap
          const airoadmapResponse = response.data.data?.ai_roadmap;

          const currentjobTitleroadMap =
            document.getElementById("current-job-title");
          const currentjobTitleroadMob = document.getElementById(
            "current-job-title-mob"
          );
          const currentRole = airoadmapResponse["Touchpoint1"];
          const currentjobDateDesk =
            document.getElementById("current-job-date");
          const currentjobDateMob = document.getElementById(
            "current-job-date-mobile"
          );
          const currentDaterange = currentRole["dateRange"];
          if (currentjobDateDesk) {
            currentjobDateDesk.innerHTML = currentDaterange;
          }

          if (currentjobDateMob) {
            currentjobDateMob.innerHTML = currentDaterange;
          }

          const jobTitleRoadMap = currentRole["Job Title"];
          if (currentjobTitleroadMap) {
            currentjobTitleroadMap.innerHTML = `${jobTitleRoadMap}`;
          }
          if (currentjobTitleroadMob) {
            currentjobTitleroadMob.innerHTML = `${jobTitleRoadMap}`;
          }

          const currentjobSumaryRoadMap = document.getElementById(
            "current-job-summary"
          );
          const jobSummary = currentRole["Summary"];
          if (currentjobSumaryRoadMap) {
            currentjobSumaryRoadMap.innerHTML = `${jobSummary}`;
          }

          const currentSkiils = document.getElementById("current-skills");
          const currentSkillsdata = currentRole["Skills"];
          if (currentSkillsdata) {
            currentSkillsdata.forEach((skill) => {
              let skills = document.createElement("div");
              skills.classList.add("badges");
              skills.innerHTML = skill;
              currentSkiils.appendChild(skills);
            });
          }

          const salaryProtections = currentRole["salaryProjection"];
          const salaryCurrency = salaryProtections["country"];
          let maxTotalComp = formatNumber(salaryProtections["maxTotalComp"], {
            locale: salaryCurrency,
          });
          let minTotalComp = formatNumber(salaryProtections["minTotalComp"], {
            locale: salaryCurrency,
          });

          const salaryProtectionsContainer =
            document.getElementById("current-salary");
          if (salaryProtectionsContainer) {
            salaryProtectionsContainer.innerHTML = `${minTotalComp + " - " + maxTotalComp
              }`;
          }

          const currentBased =
            salaryProtections["compBreakdown"]["basePercent"];
          const bonusPerccent =
            salaryProtections["compBreakdown"]["bonusPercent"];
          const stockPercent =
            salaryProtections["compBreakdown"]["stockPercent"];

          document.getElementById("currentbase").innerHTML = `${currentBased}%`;
          document.getElementById(
            "currentvarible"
          ).innerHTML = `${bonusPerccent}%`;
          document.getElementById(
            "currentequity"
          ).innerHTML = `${stockPercent}%`;

          const oneYearRole = airoadmapResponse["Touchpoint2"];
          const oneyearobtitle = document.getElementById("one-year-job-title");
          const oneyearobtitlemobile = document.getElementById(
            "one-year-job-title-mob"
          );
          const onejobDateDesk = document.getElementById("one-year-job-date");
          const onejobDateMob = document.getElementById(
            "cone-year-job-date-mob"
          );
          const secondDaterange = oneYearRole["dateRange"];
          if (onejobDateDesk) {
            onejobDateDesk.innerHTML = secondDaterange;
          }

          if (onejobDateMob) {
            onejobDateMob.innerHTML = secondDaterange;
          }
          const oneYearJobTitle = oneYearRole["Job Title"];
          if (oneyearobtitle) {
            oneyearobtitle.innerHTML = `${oneYearJobTitle}`;
          }
          if (oneyearobtitlemobile) {
            oneyearobtitlemobile.innerHTML = `${oneYearJobTitle}`;
          }
          const oneyearobtitleSummary = document.getElementById(
            "one-year-job-summary"
          );
          const oneYearJobSummary = oneYearRole["Summary"];
          if (oneyearobtitleSummary) {
            oneyearobtitleSummary.innerHTML = `${oneYearJobSummary}`;
          }

          const oneyearskiils = document.getElementById("one-year-skills");
          const oneyearSkillsdata = oneYearRole["Skills"];
          if (oneyearSkillsdata) {
            oneyearSkillsdata.forEach((skill) => {
              let skills = document.createElement("div");
              skills.classList.add("badges");
              skills.innerHTML = skill;
              oneyearskiils.appendChild(skills);
            });
          }

          const salaryOneYear = oneYearRole["salaryProjection"];
          let onemaxTotalComp = formatNumber(salaryOneYear["maxTotalComp"], {
            locale: salaryCurrency,
          });
          let oneminTotalComp = formatNumber(salaryOneYear["minTotalComp"], {
            locale: salaryCurrency,
          });

          const onesalaryProtectionsContainer =
            document.getElementById("one-year-salary");
          if (onesalaryProtectionsContainer) {
            onesalaryProtectionsContainer.innerHTML = `${oneminTotalComp + " - " + onemaxTotalComp
              }`;
          }

          const onecurrentBased = salaryOneYear["compBreakdown"]["basePercent"];
          const onebonusPercent =
            salaryOneYear["compBreakdown"]["bonusPercent"];
          const onestockPercent =
            salaryOneYear["compBreakdown"]["stockPercent"];

          document.getElementById(
            "first-year-base"
          ).innerHTML = `${onecurrentBased}%`;
          document.getElementById(
            "first-year-varible"
          ).innerHTML = `${onebonusPercent}%`;
          document.getElementById(
            "first-year-equity"
          ).innerHTML = `${onestockPercent}%`;
          //const twoyearobtitle = document.getElementById("two-year-job-title");
          const twoYearRole = airoadmapResponse["Touchpoint3"];
          const thirdDaterange = twoYearRole["dateRange"];
          const twoYearJobTitle = twoYearRole["Job Title"];
          const twojobDateDesk = document.getElementById("sec-year-job-title");
          const twojobDateMob = document.getElementById(
            "sec-year-job-title-mob"
          );
          const secondaterange = document.getElementById(
            "sec-year-job-date-desk"
          );
          const secondaterangemob = document.getElementById(
            "sec-year-job-date-mob"
          );
          if (twojobDateDesk) {
            twojobDateDesk.innerHTML = `${twoYearJobTitle}`;
          }
          if (twojobDateMob) {
            twojobDateMob.innerHTML = `${twoYearJobTitle}`;
          }

          if (secondaterange) {
            secondaterange.innerHTML = thirdDaterange;
          }

          if (secondaterangemob) {
            secondaterangemob.innerHTML = thirdDaterange;
          }

          const twoyearobtitleSummary = document.getElementById(
            "sec-year-job-summary"
          );
          const twoYearJobSummary = twoYearRole["Summary"];
          if (twoyearobtitleSummary) {
            twoyearobtitleSummary.innerHTML = `${twoYearJobSummary}`;
          }

          const secYearSkiils = document.getElementById("sec-year-skills");
          const secyearSkiilsData = twoYearRole["Skills"];
          if (secyearSkiilsData) {
            secyearSkiilsData.forEach((skill) => {
              let skills = document.createElement("div");
              skills.classList.add("badges", "success");
              skills.innerHTML = skill;
              secYearSkiils.appendChild(skills);
            });
          }

          const salarytwoYear = twoYearRole["salaryProjection"];
          let twomaxTotalComp = formatNumber(salarytwoYear["maxTotalComp"], {
            locale: salaryCurrency,
          });
          let twominTotalComp = formatNumber(salarytwoYear["minTotalComp"], {
            locale: salaryCurrency,
          });

          const twosalaryProtectionsContainer = document.getElementById(
            "second-year-salary-title"
          );
          if (twosalaryProtectionsContainer) {
            twosalaryProtectionsContainer.innerHTML = `${twominTotalComp + " - " + twomaxTotalComp
              }`;
          }

          let averageFirstYear =
            ((salaryOneYear["maxTotalComp"] + salaryOneYear["minTotalComp"]) /
              2) *
            0.25;
          let averageSecondYear =
            ((salarytwoYear["maxTotalComp"] + salarytwoYear["minTotalComp"]) /
              2) *
            0.5;

          const IncreaseNetCostontainer =
            document.getElementById("increase-net-cost");

          const increasCurrency =
            response.data.data?.precomputed_metrics.country;
          let increaseNetcost = formatNumber(
            Math.floor(averageFirstYear + averageSecondYear),
            { locale: increasCurrency, precision: 0 }
          );
          if (IncreaseNetCostontainer) {
            IncreaseNetCostontainer.innerHTML = increaseNetcost;
          }

          const avgCurrentSalary =
            (salaryProtections["maxTotalComp"] +
              salaryProtections["minTotalComp"]) /
            2 +
            ((salaryProtections["maxTotalComp"] +
              salaryProtections["minTotalComp"]) /
              2) *
            0.3;
          const newSalary =
            (salarytwoYear["maxTotalComp"] + salarytwoYear["minTotalComp"]) / 2;

          const percentageIncreaseInSalary = Math.floor(
            ((newSalary - avgCurrentSalary) / avgCurrentSalary) * 100
          );

          // New_Current_Salary = Current_Salary + (Current_Salary * 0.3)
          // AI_New_Salary = Average Salary
          // Percentage Increase = ((AI_New_Salary - New_Current_Salary)/New_Current_Salary)*100

          const currentProfle =
            response.data.data?.ai_roadmap?.percentage_increase_in_salary;
          const currentProfileContainer = document.getElementById(
            "reading-card-span-id"
          );
          if (currentProfileContainer) {
            currentProfileContainer.innerHTML = `+${percentageIncreaseInSalary}% from your current profile`;
          }

          const averageSalaryHike = document.getElementById(
            "average-salary-hike"
          );
          const averageSalaryHikeData =
            response.data.data?.precomputed_metrics?.average_salary_hike;
          if (averageSalaryHike) {
            averageSalaryHike.innerHTML = `${averageSalaryHikeData}%`;
          }

          const averageSalaryHikePercentage = document.getElementById(
            "average-salary-hike-percentage"
          );
          const averageSalaryHikePercentageData =
            response.data.data?.precomputed_metrics
              .increased_salary_hike_percentage;
          if (averageSalaryHikePercentage) {
            averageSalaryHikePercentage.innerHTML = `+${averageSalaryHikePercentageData}% from your current Profile`;
          }

          // Render into the DOM

          // Get the API response for name
          const apiName = response.data.data?.name; // from your actual API result

          let fullName = "";

          // Check the value of apiName
          // console.log("API name:", apiName);

          if (apiName && apiName.trim() !== "") {
            fullName = apiName.trim();
          } else {
            const localStorageName = localStorage.getItem("webinar_user_name");
            // console.log("LocalStorage name:", localStorageName);

            if (localStorageName && localStorageName.trim() !== "") {
              fullName = localStorageName.trim();
            }
          }

          // console.log("Full Name to use:", fullName); // Debugging the final name value

          if (fullName) {
            const nameParts = fullName.split(" ");
            const firstName = nameParts[0] || "";
            const lastName = nameParts.slice(1).join(" ") || "";

            // console.log("First Name:", firstName); // Check first name
            // console.log("Last Name:", lastName); // Check last name

            const experience =
              response.data.data?.ai_skill_analysis?.experience_years; // Get the experience years from the API
            const fname = document.getElementById("fname");
            const finame = document.getElementById("finame");
            const name3 = document.getElementById("name3");

            if (fname) {
              fname.innerHTML = `${firstName} ${lastName}'s 2-year <span>Personalized Career Roadmap</span>`;
            }

            if (finame) {
              finame.innerHTML = `${firstName} ${lastName}'s earning potential with <span>AI skills</span>`;
            }

            if (name3) {
              name3.innerHTML = `IK courses <span>recommended for ${firstName} ${lastName}</span>`;
            }
            const firstSpan = document.getElementById("first-name");
            const lastSpan = document.getElementById("last-name");

            if (firstSpan) firstSpan.textContent = firstName;

            if (lastSpan) lastSpan.textContent = lastName;
          } else {
            console.log("No name found!");
          }
        } else {
          console.error("Response state is not COMPLETED or success is false");
        }
      })
      .catch((err) => console.error("Polling error:", err));
  }
  //   simulateLoadingProgress();

  function displayLineChart(
    currentNetworth,
    networthProjectionSameJob,
    networthProjectionAIJob,
    country
  ) {
    function generateDataPoints(maxValue) {
      const ratios = [0.112, 0.18, 0.28, 0.408, 0.58, 0.8, 1.0]; // Smooth curve ratios
      return ratios.map((ratio) => Math.round(maxValue * ratio));
    }
    const ctxForLine = document
      .getElementById("netWorthChart")
      .getContext("2d");
    const labels = ["2025", "2026", "2027", "2028", "2029", "2030", "2031"];
    const getIsMobile = () => {
      // Check for actual screen width
      const viewportWidth = Math.max(
        document.documentElement.clientWidth || 0,
        window.innerWidth || 0
      );
      // You can also use window.matchMedia for more reliable device detection
      return (
        viewportWidth <= 450 || window.matchMedia("(max-width: 450px)").matches
      );
    };

    const isMobile = getIsMobile();

    // Values to display in the gray box
    const CURRENT_VALUE_LOWER = currentNetworth.lower_range;
    const CURRENT_VALUE_UPPER = currentNetworth.upper_range;

    // Values to plot the lines for the AI-Enhanced and Non-AI lines
    const MIN_VALUE_NON_AI = networthProjectionSameJob.lower_range;
    const MAX_VALUE_NON_AI = networthProjectionSameJob.upper_range;

    const MIN_VALUE_AI = networthProjectionAIJob.lower_range;
    const MAX_VALUE_AI = networthProjectionAIJob.upper_range;

    const data = {
      labels: labels,
      datasets: [
        {
          label: "AI-Enhanced",
          data: generateDataPoints(MAX_VALUE_AI),
          borderColor: "#1E88E5",
          backgroundColor: "#0082F8",
          fill: false,
          tension: 0.5,
          pointRadius: [0, 0, 0, 0, 0, 0, 0],
          pointBackgroundColor: "#1E88E5",
          borderWidth: isMobile ? 1 : 2,
        },
        {
          label: "Non-AI",
          data: generateDataPoints(MAX_VALUE_NON_AI),
          borderColor: "#90A4AE",
          backgroundColor: "#90A4AE",
          fill: false,
          tension: 0.5,
          pointRadius: [0, 0, 0, 0, 0, 0, 0],
          pointBackgroundColor: "#90A4AE",
          borderWidth: isMobile ? 1 : 2,
        },
      ],
    };

    const customLabelPlugin = {
      id: "customLabel",
      afterDatasetsDraw(chart) {
        const { ctx, scales } = chart;

        const labelText = `${formatNumber(CURRENT_VALUE_LOWER, {
          locale: country,
        })} - ${formatNumber(CURRENT_VALUE_UPPER, { locale: country })}`;
        const topText = "You're here";

        const labelX = scales.x.getPixelForValue("2025") + (isMobile ? 40 : 65);
        const labelY =
          scales.y.getPixelForValue(CURRENT_VALUE_LOWER) - (isMobile ? 10 : 15);

        const boxWidth = isMobile ? 80 : 135;
        const boxHeight = isMobile ? 36 : 53;
        const pointerHeight = isMobile ? 10 : 19;
        const pointerWidth = isMobile ? 11 : 24;
        const borderRadius = isMobile ? 5 : 10;

        const boxX = labelX - boxWidth / 2; // Make this dynamic using scales.x.getPixelForValue
        const boxY = labelY - boxHeight - pointerHeight; // Make this dynamic using scales.y.getPixelForValue

        ctx.save();
        ctx.fillStyle = "#C1C1C1";
        ctx.beginPath();

        // Draw "You're here" box
        if (isMobile) {
          const pointerBaseX = boxX;

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
          const triangleBaseLeftX = boxX;
          const triangleBaseLeftY = boxY + boxHeight;
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
          ? "400 8px Inter, sans-serif"
          : "400 11px Inter, sans-serif";

        const topTextWidth = ctx.measureText(topText).width;
        // position of top text inside the box
        ctx.fillText(
          topText,
          labelX - topTextWidth / 2 - (isMobile ? 13 : 25),
          boxY + (isMobile ? 13 : 20)
        );

        // Bottom bold text
        ctx.font = isMobile
          ? "400 10px Inter, sans-serif"
          : "700 16px Inter, sans-serif";
        const labelTextWidth = ctx.measureText(labelText).width;
        // position of bottom text inside the box
        ctx.fillText(
          labelText,
          labelX - topTextWidth / 2 - (isMobile ? 13 : 25),
          boxY + (isMobile ? 28 : 40)
        );

        const XlabelPosOffset = isMobile ? 100 : 135;
        const YlabelPosOffset = isMobile ? 23 : 23;

        // Calculate position to ensure labels are fully visible
        // So that the labels are not cut off at the top
        const calculateLabelPosition = (yValue, padding = 10) => {
          const chartTop = chart.chartArea.top;
          const yPos = scales.y.getPixelForValue(yValue);
          const tooltipHeight = 0;

          // If the label would be too close to the top
          if (yPos - YlabelPosOffset < chartTop + padding) {
            return yPos - (yPos - chartTop - padding + 10);
          }

          return yPos - YlabelPosOffset;
        };

        // Blue AI-Enhanced end value badge
        const aiX = scales.x.getPixelForValue("2031") - XlabelPosOffset;
        const aiY = calculateLabelPosition(MAX_VALUE_AI);
        const aiLabel = `${formatNumber(MIN_VALUE_AI, {
          locale: country,
        })} - ${formatNumber(MAX_VALUE_AI, { locale: country })}`;

        // Grey Non-AI end value badge
        const nonAiX = scales.x.getPixelForValue("2031") - XlabelPosOffset;
        const nonAiY = calculateLabelPosition(MAX_VALUE_NON_AI);
        const nonAiLabel = `${formatNumber(MIN_VALUE_NON_AI, {
          locale: country,
        })} - ${formatNumber(MAX_VALUE_NON_AI, { locale: country })}`;

        const tooltipLabelWidth = isMobile ? 90 : 115;
        const tooltipLabelHeight = isMobile ? 23 : 36;

        drawPill(
          ctx,
          nonAiX,
          nonAiY,
          tooltipLabelWidth,
          tooltipLabelHeight,
          "#C1C1C1",
          nonAiLabel
        );

        drawPill(
          ctx,
          aiX,
          aiY,
          tooltipLabelWidth,
          tooltipLabelHeight,
          "#1E88E5",
          aiLabel
        );

        ctx.restore();
      },
    };

    function drawPill(ctx, x, y, width, height, color, text) {
      const borderRadius = isMobile ? 2 : 8;
      const pointerWidth = isMobile ? 10 : 14;
      const pointerHeight = isMobile ? 12 : 16;

      const fontStyle = isMobile
        ? "400 11px Inter, sans-serif"
        : "700 14px Inter, sans-serif";

      // Updated gradient for blue
      if (color === "#1E88E5") {
        // Create a horizontal gradient from left to right (90.69deg equivalent)
        const gradient = ctx.createLinearGradient(x, y, x + width, y);
        gradient.addColorStop(0.2659, "#0134DA"); // 26.59%
        gradient.addColorStop(0.968, "#61B0F7"); // 96.8%
        ctx.fillStyle = gradient;
      } else {
        ctx.fillStyle = color;
      }

      ctx.beginPath();
      ctx.moveTo(x + borderRadius, y);
      ctx.lineTo(x + width - borderRadius, y);
      ctx.quadraticCurveTo(x + width, y, x + width, y + borderRadius);
      ctx.lineTo(x + width, y + height / 2 - pointerHeight / 2);

      // Draw triangle pointer with straight lines and rounded tip
      const triangleBaseY = y + height / 2 - pointerHeight / 2;
      const triangleTipX = x + width + pointerWidth;
      const triangleTipY = y + height / 2;
      const tipRadius = isMobile ? 1 : 2;

      // Right edge of triangle
      ctx.lineTo(triangleTipX - tipRadius, triangleTipY - tipRadius);
      // Arc for rounded tip
      ctx.arc(
        triangleTipX - tipRadius,
        triangleTipY,
        tipRadius,
        -Math.PI / 2,
        Math.PI / 2,
        false
      );
      // Left edge of triangle
      ctx.lineTo(x + width, y + height / 2 + pointerHeight / 2);

      ctx.lineTo(x + width, y + height - borderRadius);
      ctx.quadraticCurveTo(
        x + width,
        y + height,
        x + width - borderRadius,
        y + height
      );

      ctx.lineTo(x + borderRadius, y + height);
      ctx.quadraticCurveTo(x, y + height, x, y + height - borderRadius);
      ctx.lineTo(x, y + borderRadius);
      ctx.quadraticCurveTo(x, y, x + borderRadius, y);
      ctx.closePath();
      ctx.fill();

      // Draw label text
      ctx.fillStyle = "#FFFFFF";
      ctx.font = fontStyle;
      const textWidth = ctx.measureText(text).width;
      const yOffset = isMobile ? 4 : 5;
      ctx.fillText(text, x + (width - textWidth) / 2, y + height / 2 + yOffset);
    }

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
            bottom: 0,
          },
        },
        scales: {
          x: {
            offset: true,
            ticks: {
              color: isMobile ? "#9291A5" : "#615E83",
              font: {
                size: isMobile ? 11 : 16,
              },
              padding: isMobile ? 0 : 8,
              align: "end",
            },
            grid: {
              display: false,
              drawBorder: false,
              drawOnChartArea: true,
              drawTicks: false,
              borderWidth: 0,
              borderColor: "transparent",
            },
            border: {
              display: false,
            },
            offset: false,
          },
          y: {
            ticks: {
              color: isMobile ? "#9291A5" : "#615E83",
              font: {
                size: isMobile ? 11 : 16,
              },
              callback: function (value) {
                if (value === 0) {
                  return "0";
                }
                return formatNumber(value, { locale: country, precision: 0 });
              },
              drawOnChartArea: true,
              crossAlign: "far",
              padding: isMobile ? 5 : 10,
              align: "center",
              maxTicksLimit: 5,
            },
            grid: {
              color: "#E5E5E5",
              drawBorder: false,
              drawTicks: false,
              tickLength: 0,
              borderWidth: 0,
            },
            border: {
              display: false,
            },
            align: "start",
            position: "left",
            offset: true,
            afterFit: function (scale) {
              scale.paddingTop = 0;
              scale.paddingBottom = 0;
            },
          },
        },
      },
      plugins: [customLabelPlugin],
    };

    new Chart(ctxForLine, config);
  }

  function piechart(aienabled) {
    // console.log("aienabled",aienabled);
    const ctxForPie = document.getElementById("myChart").getContext("2d");
    const isMobileForPie = window.innerWidth <= 375;

    const image = new Image();
    image.src = themeVars.themeUrl + "/assets/img/pie-chart-img.svg";

    const blueGradient = ctxForPie.createLinearGradient(0, 0, 220, 0);
    blueGradient.addColorStop(0.0103, "#0134DA");
    blueGradient.addColorStop(0.957, "#61B0F7");

    // Custom plugin to draw centered percentage labels
    const centerLabelPlugin = {
      id: "centerLabelPlugin",
      afterDatasetsDraw(chart) {
        const { ctx, chartArea } = chart;
        const centerY = (chartArea.top + chartArea.bottom) / 2;

        chart.data.datasets.forEach((dataset, i) => {
          const meta = chart.getDatasetMeta(i);
          meta.data.forEach((arc, index) => {
            // Get the center point of each arc instead of just x
            const model = arc;
            const startAngle = model.startAngle;
            const endAngle = model.endAngle;
            const middleAngle = startAngle + (endAngle - startAngle) / 2;

            // Calculate position at the middle of the arc segment
            const centerX =
              chartArea.left + (chartArea.right - chartArea.left) / 2;
            const radius = (model.innerRadius + model.outerRadius) / 2;
            const x = centerX + radius * Math.cos(middleAngle);
            const y = centerY + radius * Math.sin(middleAngle);

            const value = dataset.data[index] + "%";

            ctx.save();
            ctx.fillStyle = index === 1 ? "#3576EA" : "#FFFFFF";
            if (window.innerWidth > 375) {
              ctx.font = "bold 13px Arial, sans-serif"; // TODO: add font family
            } else {
              ctx.font = "bold 10px Arial, sans-serif";
            }
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";
            ctx.fillText(value, x, y);
            ctx.restore();
          });
        });
      },
    };

    image.onload = function () {
      const chart = new Chart(ctxForPie, {
        type: "doughnut",
        data: {
          labels: ["AI-Enabled Jobs", "Non-AI Jobs"],
          datasets: [
            {
              // data: [55, 45],
              data: [
                aienabled.ai_job_market_share_5_years,
                100 - aienabled.ai_job_market_share_5_years,
              ],
              backgroundColor: [blueGradient, "#EDF6FF"],
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
                  width: isMobileForPie ? 40 : 51,
                  height: isMobileForPie ? 40 : 51,
                },
              },
            },
          },
          cutout: "60%",
        },
        plugins: [centerLabelPlugin],
      });
    };
  }

  function radarChart(skill_names, required_levels, current_levels) {
    const ctx = document.getElementById("radarChart").getContext("2d");

    const isMobileForRadar = window.innerWidth <= 375;

    // Get canvas dimensions
    const width = ctx.canvas.width;
    const height = ctx.canvas.height;

    // Create gray gradient
    const grayGradient = ctx.createRadialGradient(
      width * 0.5581, // 55.81% of width
      height * 0.5179, // 51.79% of height
      0,
      width * 0.5581,
      height * 0.5179,
      Math.max(width * 0.3798, height * 0.3889) // 37.98% and 38.89% of dimensions
    );
    grayGradient.addColorStop(0, "#d9d9d94d");
    grayGradient.addColorStop(1, "#b9b9b94d");

    let myRadarChart = new Chart(ctx, {
      type: "radar",
      data: {
        labels: skill_names,
        datasets: [
          {
            label: "Your skill graph",
            data: current_levels,
            backgroundColor: "rgba(0, 130, 248, 0.3)",
            borderColor: "#0047CA",
            borderWidth: 1.2,
            pointRadius: 0,
          },
          {
            label: "Skill graph required for your level",
            data: required_levels,
            backgroundColor: grayGradient,
            borderColor: "rgba(186, 186, 186, 1)",
            borderWidth: 1.2,
            pointRadius: 0,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
          padding: 0,
        },
        scales: {
          r: {
            min: 0,
            max: 100,
            angleLines: {
              display: true,
              color: "#BFBFBF",
            },
            ticks: {
              display: false,
              stepSize: 20,
              padding: 0,
            },
            pointLabels: {
              font: {
                family: "Inter, sans-serif", // update font family
                size: 10,
                weight: 700,
                lineHeight: 1.5,
              },
              padding: 8,
              color: "#000000",
              align: "center",
              callback: function (label) {
                // wrap label if too long
                const maxChars = 11; // Adjust as needed
                if (label.length > maxChars) {
                  const words = label.split(" ");
                  let line = "";
                  let newLabel = [];
                  words.forEach((word) => {
                    if ((line + word).length <= maxChars) {
                      line += word + " ";
                    } else {
                      newLabel.push(line);
                      line = word + " ";
                    }
                  });
                  newLabel.push(line);
                  return newLabel;
                }
                return label;
              },
            },
            grid: {
              color: "#BFBFBF",
              lineWidth: 0.5,
            },
            beginAtZero: false,
            offset: false,
          },
        },
        plugins: {
          legend: {
            display: false,
          },
        },
      },
    });
  }
});
