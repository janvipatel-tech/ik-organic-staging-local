const ctxProgress = document.getElementById('progressChart').getContext('2d');
let currentPercentage = 0;
const targetPercentages = [30, 60, 90];
let currentStage = 0;
const offset = 8;
let progressChartInstance = null;

function updateChart(percentage) {
    // Destroy previous instance if exists
    if (progressChartInstance) {
        progressChartInstance.destroy();
    }

    // Create a new chart
    progressChartInstance = new Chart(ctxProgress, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [percentage, 100 - percentage],
                backgroundColor: ['#3D9FF7', '#dbeaff'],
                borderWidth: 0,
                cutout: '80%',
            }]
        },
        options: {
            responsive: false,
            animation: false,
            layout: {
                padding: offset
            },
            plugins: {
                legend: { display: false },
                tooltip: { enabled: false }
            }
        },
        plugins: [{
            id: 'customElements',
            afterDraw(chart) {
                const { ctx, chartArea } = chart;

                const x = chart.width / 2;
                const y = chart.height / 2;
                const radius = (Math.min(chart.width, chart.height) / 2) - 2;
                const angle = (percentage / 100) * 2 * Math.PI - Math.PI / 2;

                // Percentage Text
                ctx.save();
                ctx.font = 'bold 16px Lato';
                ctx.fillStyle = '#3D9FF7';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText(`${Math.round(percentage)}%`, x, y);
                ctx.restore();

                // Dashed Arc
                ctx.save();
                ctx.beginPath();
                ctx.setLineDash([5, 5]);
                ctx.lineWidth = 3;
                ctx.strokeStyle = '#3D9FF7';
                ctx.arc(x, y, radius, -Math.PI / 2, angle);
                ctx.stroke();
                ctx.restore();
            }
        }]
    });
}


function animateProgress() {
    if (currentStage >= targetPercentages.length) {
        return;
    }

    const targetPercentage = targetPercentages[currentStage];
    const startPercentage = currentStage === 0 ? 0 : targetPercentages[currentStage - 1];
    const duration = 4000; // 2 seconds for each stage
    const startTime = performance.now();

    function animate(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        currentPercentage = startPercentage + (targetPercentage - startPercentage) * progress;
        
        // Clear previous chart
        ctxProgress.clearRect(0, 0, ctxProgress.canvas.width, ctxProgress.canvas.height);
        updateChart(currentPercentage);

        if (progress < 1) {
            requestAnimationFrame(animate);
        } else {
            currentStage++;
            setTimeout(animateProgress, 500); // Wait 0.5 seconds before starting next stage
        }
    }

    requestAnimationFrame(animate);
}

// Start the animation
animateProgress();

// Initialize Swiper
var swiper = new Swiper(".mySwiper", {
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    loop: true,
    effect: "fade",
    fadeEffect: {
        crossFade: true
    }
});


if(localStorage.getItem('webinar_user_name')) {
    document.getElementById('reg-user-name-courses').textContent = localStorage.getItem('webinar_user_name');
    document.getElementById('reg-user-name-roadmap').textContent = localStorage.getItem('webinar_user_name') + "'s";
    document.getElementById('reg-user-name-earning').textContent = localStorage.getItem('webinar_user_name') + "'s";
}