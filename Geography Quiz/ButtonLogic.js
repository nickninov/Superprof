// To select quiz difficulty
var openQuizDifficulty = document.querySelector("#introText");

/*
    A function that displays the buttonWrapper
    and hides the Select Quiz Continent button
*/
function openQuizSelector(){
    document.getElementById('selectButton').style.display = "none";
    document.getElementById("buttonWrapper").style.display = "block";
}

// #introText event listener on click
openQuizDifficulty.addEventListener("click", openQuizSelector);


// Display the feedback page
var resultsPage = document.getElementById('resultsPage');

// A function that will return the user to the main screen
function close(){
    resultsPage.style.display = "none";
    document.getElementById("buttonWrapper").style.display = "none";
    document.getElementById("quizWrapperID").style.display = "none";
    document.getElementById('selectButton').style.display = "inline";
}


// Declare the exit button on the buttonWrapper modal
var exitButton = document.querySelector("#closeMenu");

// Declare the exit button for the quiz
var exitQuiz = document.querySelector("#closeQuiz");

/*
    The Exit button will execute the close function
    when it has been clicked.
    
    Left side - what am I waiting for?
    Right side - what should I do?
*/
exitButton.addEventListener("click", close);

exitQuiz.addEventListener("click", close);

// Close with escape key
window.onkeyup = function(e) {
    var key = e.keyCode ? e.keyCode : e.which;
    
    // checks if this is the ESC key and will CLOSE al windows
    if (key == 27) {
      close();
    }
}



// ---------------------------------------------------- QUIZ LOGIC SCRIPT ----------------------------------------------------

// A function that will build a quiz according to it's difficulty
function quizDifficulty(apiLink, difficultyOfTheQuiz) {
    (function() {
    
      // A function that will return a random number
      function getRandomInt(max) {
        return Math.floor(Math.random() * Math.floor(max));
      }
    
      // Create an empty array for the questions
      var myQuestions = [];
          
      // Gets the data from the website
      fetch(
          apiLink
        ) 
        // Makes the data into a Json object
          .then(response => response.json())
          // Allows data to be read and modified - coding starts from here
          .then(data => {
          
            console.log(data)
          
            // A for loop that will loop through each question from the API
            for(var i = 0; i < data.results.length; i++){
      
              // Transfers the data from the API to the Array
              
              // Get a random number from 0 to 3
              var option = getRandomInt(4);
    
              // The current question will have a random format
              switch(option) {
    
                // Case 0 - correct answer is A
                case 0:
                  myQuestions.push(
                    {
                      question: i+1+") "+data.results[i].question,
                      answers: {
                        a: data.results[i].correct_answer,
                        b: data.results[i].incorrect_answers[0],
                        c: data.results[i].incorrect_answers[2],
                        d: data.results[i].incorrect_answers[1],
                      },
                      correctAnswer: "a"
                    }
                  )
                  console.log(i+1+") Correct answer is A - "+ difficultyOfTheQuiz);
                  break;
                
                // Case 1 - correct answer is B
                case 1:
                    myQuestions.push(
                      {
                        question: i+1+") "+data.results[i].question,
                        answers: {
                          a: data.results[i].incorrect_answers[0],
                          b: data.results[i].correct_answer,
                          c: data.results[i].incorrect_answers[2],
                          d: data.results[i].incorrect_answers[1],
                        },
                        correctAnswer: "b"
                      }
                    )
                    console.log(i+1+") Correct answer is B - "+ difficultyOfTheQuiz);
                  break;
    
                case 2:
    
                    myQuestions.push(
                      {
                        question: i+1+") "+data.results[i].question,
                        answers: {
                          a: data.results[i].incorrect_answers[0],
                          b: data.results[i].incorrect_answers[1],
                          c: data.results[i].correct_answer,
                          d: data.results[i].incorrect_answers[2],
                        },
                        correctAnswer: "c"
                      }
                    )
                    console.log(i+1+") Correct answer is C - "+ difficultyOfTheQuiz);
                  break;
                
                case 3:
                    
                    myQuestions.push(
                      {
                        question: i+1+") "+data.results[i].question,
                        answers: {
                          a: data.results[i].incorrect_answers[0],
                          b: data.results[i].incorrect_answers[1],
                          c: data.results[i].incorrect_answers[2],
                          d: data.results[i].correct_answer,
                        },
                        correctAnswer: "d"
                      }
                    )
    
                    console.log(i+1+") Correct answer is D - "+ difficultyOfTheQuiz);
    
                  break;
              }
  
              function buildQuiz() {
                // we'll need a place to store the HTML output
                const output = [];
            
                // for each question...
                myQuestions.forEach((currentQuestion, questionNumber) => {
                  // we'll want to store the list of answer choices
                  const answers = [];
            
                  // and for each available answer...
                  for (letter in currentQuestion.answers) {
                    // ...add an HTML radio button
                    answers.push(
                      `<label>
                         <input type="radio" name="question${questionNumber}" value="${letter}">
                          ${letter} :
                          ${currentQuestion.answers[letter]}
                       </label>`
                    );
                  }
            
                  // add this question and its answers to the output
                  output.push(
                    `<div class="slide">
                       <div class="question"> ${currentQuestion.question} </div>
                       <div class="answers"> ${answers.join("")} </div>
                     </div>`
                  );
                });
            
                // finally combine our output list into one string of HTML and put it on the page
                quizContainer.innerHTML = output.join("");
              }
            
              function showResults() {
                // gather answer containers from our quiz
                const answerContainers = quizContainer.querySelectorAll(".answers");
            
                // keep track of user's answers
                let numCorrect = 0;
            
                // for each question...
                myQuestions.forEach((currentQuestion, questionNumber) => {
                  // find selected answer
                  const answerContainer = answerContainers[questionNumber];
                  const selector = `input[name=question${questionNumber}]:checked`;
                  const userAnswer = (answerContainer.querySelector(selector) || {}).value;
            
                  // if answer is correct
                  if (userAnswer === currentQuestion.correctAnswer) {
                    // Increment numbert of correct answers
                    numCorrect++;
            
                    // Color the correct answers in light green
                    answerContainers[questionNumber].style.color = "lightgreen";
                  } else {
                    // if answer is wrong or blank - colors the question in red
                    answerContainers[questionNumber].style.color = "red";
                  }
                });

                /*
                  Variable for the feedback text.
                  The text changes depending on the number of correct answers - numCorrect.
                */
                var feedbackText = document.getElementById('feedbackTextResult');
                
                // Close all divs from z-index 1, 2 and 3
                document.getElementById("buttonWrapper").style.display = "none";
                document.getElementById("quizWrapperID").style.display = "none";
                document.getElementById('selectButton').style.display = "none";

                // Display the result page
                resultsPage.style.display = "block";

                // Display the amount of correct answers
                document.getElementById('correctAnswerText').innerHTML = 'Correct answers: '+numCorrect;

                // Correct answers from 0 to 10
                if(numCorrect >= 0 && numCorrect <= 10){
                  feedbackText.innerHTML = "Not good enough. Try again. ";
                }

                // Correct answers from 11 to 15
                else if (numCorrect >= 11 && numCorrect <= 15) {
                  feedbackText.innerHTML = "Good! More study required.";
                }

                // Correct answers +16
                else {
                  feedbackText.innerHTML = "Excellent!";
                }
              }
            
              function showSlide(n) {
                slides[currentSlide].classList.remove("active-slide");
                slides[n].classList.add("active-slide");
                
                currentSlide = n;
                
                if (currentSlide === 0) {
                  previousButton.style.display = "none";
                } else {
                  previousButton.style.display = "inline-block";
                }
                
                if (currentSlide === slides.length - 1) {
                  nextButton.style.display = "none";
                  submitButton.style.display = "inline-block";
                } else {
                  nextButton.style.display = "inline-block";
                  submitButton.style.display = "none";
                }
              }
            
              function showNextSlide() {
                showSlide(currentSlide + 1);
              }
            
              function showPreviousSlide() {
                showSlide(currentSlide - 1);
              }
            
              var difficultyLabel = document.getElementById("quizDifficultyText");
              difficultyLabel.innerHTML = difficultyOfTheQuiz;
  
              const quizContainer = document.getElementById("quiz");
              const resultsContainer = document.getElementById("results");
              const submitButton = document.getElementById("submit");
            
              // Build the quiz
              buildQuiz();
            
              const previousButton = document.getElementById("previous");
              const nextButton = document.getElementById("next");
              const slides = document.querySelectorAll(".slide");
              let currentSlide = 0;
            
              showSlide(0);
            
              // on submit, show results
              submitButton.addEventListener("click", showResults);
              previousButton.addEventListener("click", showPreviousSlide);
              nextButton.addEventListener("click", showNextSlide);
            }
          })
          .catch(error => console.log(error));
      })();
  }
    
  // Easy button difficulty

  // declare easy button
  var easyButton = document.getElementById("btn1");
  
  // A function that will open the easy quiz
  function openEasyQuiz() {
    quizDifficulty('https://opentdb.com/api.php?amount=20&category=22&difficulty=easy&type=multiple', 'Difficulty: Easy');
    document.getElementById("buttonWrapper").style.display = "none";
    document.getElementById("quizWrapperID").style.display = "block";
  }

  // declare medium button
  var mediumButton = document.getElementById("btn2");

  // A function that will open the medium difficulty quiz
  function openMediumQuiz() {
    quizDifficulty('https://opentdb.com/api.php?amount=20&category=22&difficulty=medium&type=multiple', 'Difficulty: Medium');
    document.getElementById("buttonWrapper").style.display = "none";
    document.getElementById("quizWrapperID").style.display = "block";
  }

  // declare hard button
  var hardButton = document.getElementById("btn3");

  // A function that will open the hard difficulty quiz
  function openHardQuiz(){
    quizDifficulty('https://opentdb.com/api.php?amount=20&category=22&difficulty=hard&type=multiple', 'Difficulty: Hard');
    document.getElementById("buttonWrapper").style.display = "none";
    document.getElementById("quizWrapperID").style.display = "block";
  }
  
  // declare feedback button
  var feedbackButton = document.getElementById("btn4");

  // Quiz event button listeners
  easyButton.addEventListener("click", openEasyQuiz);
  mediumButton.addEventListener("click", openMediumQuiz);
  hardButton.addEventListener("click", openHardQuiz);
  feedbackButton.addEventListener("click", close);