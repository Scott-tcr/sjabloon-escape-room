// Teller voor goede antwoorden
let correctCount = 0;

// Deze functie opent de modal en toont de vraag
function openModal(index) {
  let box = document.querySelector(`.box[data-index='${index}']`);
  let riddleText = box.dataset.riddle;
  let correctAnswer = box.dataset.answer;

  document.getElementById('riddle').innerText = riddleText;
  document.getElementById('modal').dataset.answer = correctAnswer;
  document.getElementById('answer').value = '';

  document.getElementById('overlay').style.display = 'block';
  document.getElementById('modal').style.display = 'block';
}

// Deze functie sluit de modal en de overlay
function closeModal() {
  document.getElementById('overlay').style.display = 'none';
  document.getElementById('modal').style.display = 'none';
  document.getElementById('feedback').innerText = '';
}

// Deze functie controleert of het ingevoerde antwoord correct is
function checkAnswer() {
  let userAnswer = document.getElementById('answer').value.trim();
  let correctAnswer = document.getElementById('modal').dataset.answer;
  let feedback = document.getElementById('feedback');

  if (userAnswer.toLowerCase() === correctAnswer.toLowerCase()) {

    // Goed antwoord → teller +1
    correctCount++;

    // Als alle 3 goed zijn → win scherm
    if (correctCount === 3) {
      window.location.href = "../win.php";
      return;
    }

    // Feedback tonen
    feedback.innerText = 'Correct! Goed gedaan!';
    feedback.style.color = 'green';

    // Modal sluiten na korte delay
    setTimeout(closeModal, 800);

  } else {
    // Fout → verlies scherm
    window.location.href = "../lose.php";
  }
}


