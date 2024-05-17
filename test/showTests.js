let tests = document.getElementById("tests_json").innerText;
let testData = JSON.parse(tests);
console.log(tests);

let ids = document.getElementById("id_json").innerText;
ids = JSON.parse(ids);
console.log(ids);

let currentTestIndex = null;
let currentQuestionIndex = 0;
let userAnswers = {};

function createTestButtons() {
    const testList = document.getElementById("test-list");
    testData.forEach((test, index) => {
        const button = document.createElement("button");
        button.textContent = test.test_name;
        button.addEventListener("click", () => {
            currentTestIndex = index;
            currentQuestionIndex = 0;
            userAnswers = {};
            displayQuestion();

            document.getElementById("test-list").classList.add("hidden");
        });
        button.classList.add("test-button");
        testList.appendChild(button);
        testList.appendChild(document.createElement("br"));
        testList.appendChild(document.createElement("br"));
    });
}

function displayQuestion() {
    const test = testData[currentTestIndex];
    const question = test.questions[currentQuestionIndex];

    const questionContainer = document.getElementById("question-container");
    questionContainer.classList.remove("hidden");

    const questionText = questionContainer.querySelector("h2");
    questionText.textContent = question.question_text;

    const optionsList = document.getElementById("options-list");
    optionsList.innerHTML = "";

    question.options.forEach(option => {
        const optionItem = document.createElement("li");
        const radioInput = document.createElement("input");
        radioInput.type = "radio";
        radioInput.name = "answer";
        radioInput.value = option;

        const radioLabel = document.createElement("label");
        radioLabel.textContent = option;
        radioLabel.appendChild(radioInput);

        optionItem.appendChild(radioLabel);
        optionsList.appendChild(optionItem);
    });

    const answerForm = document.getElementById("answer-form");
    answerForm.addEventListener("submit", handleAnswerSubmit);
}

function handleAnswerSubmit(event) {
    event.preventDefault();

    const selectedOption = document.querySelector('input[name="answer"]:checked');

    if (!selectedOption) {
        alert("Please select an answer before proceeding.");
        return;
    }

    const userAnswer = selectedOption.value;
    const correctAnswer = testData[currentTestIndex].questions[currentQuestionIndex].correct_answer;

    userAnswers[currentQuestionIndex] = userAnswer;

    currentQuestionIndex++;

    if (currentQuestionIndex < testData[currentTestIndex].questions.length) {
        displayQuestion();
    } else {
        showResults();
    }
}

function showResults() {
    const questionContainer = document.getElementById("question-container");
    questionContainer.classList.add("hidden");

    let correctAnswers = 0;
    let totalQuestions = testData[currentTestIndex].questions.length;

    for (const answer in userAnswers) {
        if (userAnswers[answer] === testData[currentTestIndex].questions[answer].correct_answer) {
            correctAnswers++;
        }
    }

    const resultText = document.createElement("p");
    resultText.textContent = `You answered ${correctAnswers} out of ${totalQuestions} questions correctly.`;

    document.body.appendChild(resultText);

    document.getElementById("result").value = correctAnswers / totalQuestions * 100;
    document.getElementById("test-id").value = ids[currentTestIndex];
    
    setTimeout(() => document.getElementById("send-query").click(), 5000);    
}




createTestButtons();

const answerForm = document.getElementById("answer-form");
answerForm.addEventListener("submit", handleAnswerSubmit);
