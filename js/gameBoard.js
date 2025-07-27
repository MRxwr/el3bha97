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
        const questionContent = document.querySelector('.question-content-center');
        const lifelineButtons = document.querySelector('.lifelines-buttons');
        const questionControls = document.querySelector('.question-controls');
        
        // Set question details
        categoryBadge.textContent = categoryName;
        pointsDisplay.textContent = points + ' نقطة';
        
        // Example: Display a sample question
        questionContent.innerHTML = `
            <div class="question-text-large">
                سؤال من فئة ${categoryName} بقيمة ${points} نقطة
            </div>
            <div class="question-media-container">
                <!-- Image would go here if needed -->
            </div>
        `;
        
        // Set up lifeline buttons based on current team
        const currentTeam = document.getElementById('currentTeamName').textContent;
        lifelineButtons.innerHTML = `
            <button class="lifeline-btn" id="callFriendBtn">
                <i class="fas fa-phone"></i> اتصل بصديق
            </button>
            <button class="lifeline-btn" id="twoAnswersBtn">
                <i class="fas fa-users"></i> إجابتان فقط
            </button>
            <button class="lifeline-btn" id="doublePointsBtn">
                <i class="fas fa-bolt"></i> ضعف النقاط
            </button>
        `;
        
        // Set up controls
        questionControls.innerHTML = `
            <div class="primary-controls">
                <button class="quiz-btn quiz-btn-show" id="showAnswerBtn">
                    <i class="fas fa-eye"></i> عرض الإجابة
                </button>
            </div>
            <div class="team-scoring">
                <div class="scoring-title">تسجيل النقاط</div>
                <div class="team-buttons">
                    <button class="quiz-btn quiz-btn-team1" id="team1CorrectBtn">
                        <i class="fas fa-check"></i> الفريق الأول
                    </button>
                    <button class="quiz-btn quiz-btn-team2" id="team2CorrectBtn">
                        <i class="fas fa-check"></i> الفريق الثاني
                    </button>
                    <button class="quiz-btn quiz-btn-wrong" id="wrongAnswerBtn">
                        <i class="fas fa-times"></i> إجابة خاطئة
                    </button>
                </div>
            </div>
            <div class="secondary-controls">
                <button class="quiz-btn quiz-btn-back" id="backToBoard">
                    <i class="fas fa-arrow-left"></i> العودة للوحة
                </button>
            </div>
        `;
        
        // Add event listener for the back button
        document.getElementById('backToBoard').addEventListener('click', function() {
            modal.style.display = 'none';
            
            // Mark this question as answered by changing its appearance
            const answeredQuestion = document.querySelector(`.point-value[data-category="${categoryId}"][data-points="${points}"]`);
            if (answeredQuestion) {
                answeredQuestion.classList.add('disabled');
                answeredQuestion.style.pointerEvents = 'none';
            }
        });
        
        // Add event listener for show answer button
        document.getElementById('showAnswerBtn').addEventListener('click', function() {
            questionContent.innerHTML += `
                <div class="answer-display">
                    <div class="answer-label">الإجابة الصحيحة:</div>
                    <div class="answer-text-large">هذه هي الإجابة النموذجية للسؤال</div>
                </div>
            `;
        });
        
        // Add event listeners for team scoring buttons
        document.getElementById('team1CorrectBtn').addEventListener('click', function() {
            // Update team 1 score
            const team1Points = document.getElementById('team1Points');
            team1Points.textContent = parseInt(team1Points.textContent) + points;
            
            // Return to board
            modal.style.display = 'none';
            
            // Mark question as answered
            const answeredQuestion = document.querySelector(`.point-value[data-category="${categoryId}"][data-points="${points}"]`);
            if (answeredQuestion) {
                answeredQuestion.classList.add('disabled');
                answeredQuestion.style.pointerEvents = 'none';
            }
        });
        
        document.getElementById('team2CorrectBtn').addEventListener('click', function() {
            // Update team 2 score
            const team2Points = document.getElementById('team2Points');
            team2Points.textContent = parseInt(team2Points.textContent) + points;
            
            // Return to board
            modal.style.display = 'none';
            
            // Mark question as answered
            const answeredQuestion = document.querySelector(`.point-value[data-category="${categoryId}"][data-points="${points}"]`);
            if (answeredQuestion) {
                answeredQuestion.classList.add('disabled');
                answeredQuestion.style.pointerEvents = 'none';
            }
        });
        
        document.getElementById('wrongAnswerBtn').addEventListener('click', function() {
            // Return to board
            modal.style.display = 'none';
            
            // Mark question as answered
            const answeredQuestion = document.querySelector(`.point-value[data-category="${categoryId}"][data-points="${points}"]`);
            if (answeredQuestion) {
                answeredQuestion.classList.add('disabled');
                answeredQuestion.style.pointerEvents = 'none';
            }
        });
        
        // Show the modal
        modal.style.display = 'flex';
    }
    
    // Set up event listener for the exit button
    document.querySelector('.header-link').addEventListener('click', function(e) {
        e.preventDefault();
        if (confirm('هل أنت متأكد من أنك تريد الخروج من اللعبة؟')) {
            window.location.href = 'index.php'; // Redirect to homepage or wherever appropriate
        }
    });
});
