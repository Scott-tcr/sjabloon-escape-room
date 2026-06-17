// =========================
// TIMER 3:00 → 0:00
// =========================

let timeLeft = 180; // 3 minuten

function updateTimer() {
    const timerDisplay = document.getElementById("timer");
    if (!timerDisplay) return;

    let minutes = Math.floor(timeLeft / 60);
    let seconds = timeLeft % 60;

    if (minutes < 10) minutes = "0" + minutes;
    if (seconds < 10) seconds = "0" + seconds;

    timerDisplay.textContent = `${minutes}:${seconds}`;
}

function startTimer() {
    updateTimer();

    const interval = setInterval(() => {
        timeLeft--;
        updateTimer();

        if (timeLeft < 0) {
            clearInterval(interval);
            window.location.href = "../lose.php";
        }
    }, 1000);
}

window.addEventListener("DOMContentLoaded", startTimer);


// =========================
// RIDDLE LOGICA (ALLE ROOMS)
// =========================

let correctCount = 0;

function openModal(index) {
    // Pak altijd de box op basis van data-index, ongeacht de class (room1-box, room2-box, etc.)
    const box = document.querySelector(`[data-index='${index}']`);
    if (!box) {
        console.error("Geen box gevonden voor index:", index);
        return;
    }

    const riddleText = box.dataset.riddle || '';
    const correctAnswer = box.dataset.answer || '';

    document.getElementById('riddle').innerText = riddleText;
    document.getElementById('modal').dataset.answer = correctAnswer;
    document.getElementById('answer').value = '';
    document.getElementById('feedback').innerText = '';

    document.getElementById('overlay').style.display = 'block';
    document.getElementById('modal').style.display = 'block';
}

function closeModal() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('modal').style.display = 'none';
    document.getElementById('feedback').innerText = '';
}

function checkAnswer() {
    const userAnswer = document.getElementById('answer').value.trim();
    const correctAnswer = document.getElementById('modal').dataset.answer || '';
    const feedback = document.getElementById('feedback');

    if (userAnswer.toLowerCase() === correctAnswer.toLowerCase()) {
        correctCount++;

        // Pas dit aan als een kamer meer/minder raadsels heeft
        if (correctCount === 3) {
            window.location.href = "../win.php";
            return;
        }

        feedback.innerText = 'Correct! Goed gedaan!';
        feedback.style.color = 'green';

        setTimeout(closeModal, 800);
    } else {
        window.location.href = "../lose.php";
    }
}

let totalSeconds = 180; // 180 sec
let elapsedSeconds = 0;

setInterval(() => {
    elapsedSeconds++;
}, 1000);
