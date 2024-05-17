let test = {"questions": []};

function addQuesion() {
    let quesionName = document.getElementById("question-name").value;
    let variants = document.getElementById("quesion-variants").value;
    variants = variants.split(' ');
    let correctAnsver = document.getElementById("correct-answer").value;

    if (variants.indexOf(correctAnsver) == -1) {
        alert("input correct answer");
        return;
    }

    let quesion = {
        "question_text": quesionName,
        "options": variants,
        "correct_answer": correctAnsver
    };

    test["test_name"] = document.getElementById("test-name").value;
    test["questions"].push(quesion);

    let a = JSON;
    document.getElementById("json-test").value = JSON.stringify(test);

    console.log(test);
    console.log(123);

    displayQuestion(quesion);
}
console.log(123);

function displayQuestion(question) {
    const block = document.querySelector(".block");
    
    const questionContainer = document.createElement('div');
    questionContainer.classList.add('question-container');
    
    const questionText = document.createElement('p');
    questionText.textContent = question.question_text;
    questionContainer.appendChild(questionText);
    
    const selectElement = document.createElement('select');
    
    question.options.forEach(option => {
        const optionElement = document.createElement('option');
        optionElement.textContent = option;
        selectElement.appendChild(optionElement);
    });
    questionContainer.appendChild(selectElement);
    
    const correctAnswer = document.createElement('input');
    correctAnswer.value = question.correct_answer;
    correctAnswer.hidden = true;    
    questionContainer.appendChild(correctAnswer);
    
    block.appendChild(questionContainer);
}