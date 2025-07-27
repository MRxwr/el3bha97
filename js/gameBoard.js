// Game Board Initialization Script
document.addEventListener('DOMContentLoaded', function() {
    // Sample game categories and points (customize these based on your game)
    const gameCategories = [
        { id: 1, name: 'لغة وأدب' },
        { id: 2, name: 'مجتمعات الكويت' },
        { id: 3, name: 'الكويت' },
        { id: 4, name: 'دول وعواصم' },
        { id: 5, name: 'قصص الأنبياء' },
        { id: 6, name: 'تاريخ' }
    ];
    
    const pointValues = [200, 400, 600];
    
    // Reference to the game board container
    const questionBoard = document.getElementById('questionBoard');
    
    // Clear the board
    questionBoard.innerHTML = '';
    
    // Create game board layout
    gameCategories.forEach(category => {
        const categoryColumn = document.createElement('div');
        categoryColumn.className = 'category-column';
        
        // Add category header
        const categoryHeader = document.createElement('div');
        categoryHeader.className = 'category-header';
        categoryHeader.textContent = category.name;
        categoryColumn.appendChild(categoryHeader);
        
        // Add point values for this category
        pointValues.forEach(points => {
            const pointValueDiv = document.createElement('div');
            pointValueDiv.className = 'point-value';
            pointValueDiv.textContent = points;
            pointValueDiv.dataset.category = category.id;
            pointValueDiv.dataset.points = points;
            
            // Add click event for point values
            pointValueDiv.addEventListener('click', function() {
                showQuestion(category.id, points, category.name);
            });
            
            categoryColumn.appendChild(pointValueDiv);
        });
        
        questionBoard.appendChild(categoryColumn);
    });
    
    // Function to show a question when a point value is clicked
    function showQuestion(categoryId, points, categoryName) {
        // Get modal elements
        const modal = document.getElementById('questionModal');
        const categoryBadge = document.getElementById('questionCategory');
        const pointsDisplay = document.getElementById('questionPoints');
        const questionContent = document.getElementById('questionText');
        
        // Set question details
        categoryBadge.textContent = categoryName;
        pointsDisplay.textContent = points + ' نقطة';
        
        // Example: Display a sample question (replace with your actual question)
        questionContent.textContent = 'سؤال من فئة ' + categoryName + ' بقيمة ' + points + ' نقطة';
        
        // Reset UI elements
        document.getElementById('answerSection').style.display = 'none';
        document.getElementById('teamSelection').style.display = 'none';
        document.getElementById('nextBtn').style.display = 'none';
        document.getElementById('showAnswerBtn').style.display = '';
        
        // Show the modal
        modal.style.display = 'flex';
    }
    
    // Function to show answer
    window.showAnswer = function() {
        document.getElementById('answerText').textContent = 'هذه هي الإجابة النموذجية للسؤال';
        document.getElementById('answerSection').style.display = 'block';
        document.getElementById('teamSelection').style.display = 'block';
        document.getElementById('showAnswerBtn').style.display = 'none';
    };
    
    // Function to mark team correct
    window.markTeamCorrect = function(team) {
        // Get the point value of the current question
        const points = parseInt(document.getElementById('questionPoints').textContent);
        
        // Update team score
        const teamPoints = document.getElementById('team' + team + 'Points');
        const currentPoints = parseInt(teamPoints.textContent);
        teamPoints.textContent = currentPoints + points;
        
        // Hide team selection and show next button
        document.getElementById('teamSelection').style.display = 'none';
        document.getElementById('nextBtn').style.display = 'block';
    };
    
    // Function to mark no correct answer
    window.markNoCorrect = function() {
        // Hide team selection and show next button
        document.getElementById('teamSelection').style.display = 'none';
        document.getElementById('nextBtn').style.display = 'block';
    };
    
    // Function to close question modal
    window.closeQuestion = function() {
        // Hide modal
        document.getElementById('questionModal').style.display = 'none';
        
        // Mark question as answered
        const categoryId = document.querySelector('#questionCategory').textContent;
        const points = parseInt(document.getElementById('questionPoints').textContent);
        
        // Find the point value button and mark it as used
        const pointButtons = document.querySelectorAll('.point-value');
        pointButtons.forEach(button => {
            if (button.textContent == points && 
                document.querySelector('.category-header:nth-child(1)').textContent === categoryId) {
                button.classList.add('disabled');
                button.style.pointerEvents = 'none';
            }
        });
    };
    
    // Set up event listener for the exit button
    document.querySelector('.header-link').addEventListener('click', function(e) {
        e.preventDefault();
        if (confirm('هل أنت متأكد من أنك تريد الخروج من اللعبة؟')) {
            window.location.href = 'index.php'; // Redirect to homepage or wherever appropriate
        }
    });
    
    // Set up lifeline functions
    window.useCallFriend = function() {
        // Show timer
        document.getElementById('callFriendTimer').style.display = 'block';
        document.getElementById('callFriendBtn').disabled = true;
        
        // Start a 60-second countdown
        let timeLeft = 60;
        const timerElement = document.getElementById('timerCountdown');
        const progressElement = document.getElementById('timerProgress');
        
        const timer = setInterval(function() {
            timeLeft--;
            timerElement.textContent = timeLeft;
            
            // Update progress bar
            const progress = (timeLeft / 60) * 100;
            progressElement.style.width = progress + '%';
            
            if (timeLeft <= 0) {
                clearInterval(timer);
                document.getElementById('callFriendTimer').style.display = 'none';
            }
        }, 1000);
    };
    
    window.useTwoAnswers = function() {
        document.getElementById('twoAnswersBtn').disabled = true;
        alert('تم تنشيط مساعدة إجابتان فقط');
    };
    
    window.useDoublePoints = function() {
        document.getElementById('doublePointsBtn').disabled = true;
        document.getElementById('doublePointsIndicator').style.display = 'block';
        alert('تم تنشيط مساعدة ضعف النقاط');
    };
});
