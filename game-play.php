<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سين جيم - اللعب</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            direction: rtl;
            overflow-x: hidden;
        }
        
        .game-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }
        
        .team-score {
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
            color: white;
            padding: 15px 25px;
            border-radius: 15px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .team-score.active {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.4);
        }
        
        .team-score h5 {
            margin: 0;
            font-weight: 700;
        }
        
        .score-number {
            font-size: 2rem;
            font-weight: 700;
            margin-top: 5px;
        }
        
        .game-info {
            text-align: center;
            padding: 10px;
        }
        
        .question-counter {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 20px;
            border-radius: 25px;
            color: white;
            display: inline-block;
            margin-bottom: 10px;
        }
        
        .main-content {
            margin-top: 120px;
            padding: 20px;
        }
        
        .question-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            text-align: center;
            min-height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .category-badge {
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
        }
        
        .question-text {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .question-media {
            margin: 20px 0;
            text-align: center;
        }
        
        .question-media img {
            max-width: 100%;
            max-height: 300px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .question-media video,
        .question-media audio {
            max-width: 100%;
            border-radius: 15px;
        }
        
        .answer-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            margin-top: 30px;
            display: none;
        }
        
        .answer-text {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d3436;
            margin-bottom: 20px;
        }
        
        .game-controls {
            margin-top: 30px;
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .control-btn {
            padding: 15px 30px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            min-width: 150px;
        }
        
        .btn-show-answer {
            background: linear-gradient(45deg, #74b9ff, #0984e3);
            color: white;
        }
        
        .btn-correct {
            background: linear-gradient(45deg, #00b894, #00cec9);
            color: white;
        }
        
        .btn-wrong {
            background: linear-gradient(45deg, #fd79a8, #e84393);
            color: white;
        }
        
        .btn-next {
            background: linear-gradient(45deg, #fdcb6e, #e17055);
            color: white;
        }
        
        .control-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .control-btn:disabled {
            background: #6c757d !important;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .game-end {
            text-align: center;
            padding: 50px;
            display: none;
        }
        
        .winner-announcement {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 30px;
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .final-scores {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 40px 0;
            flex-wrap: wrap;
        }
        
        .final-score-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            min-width: 200px;
        }
        
        .confetti {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999;
        }
        
        @keyframes fall {
            0% { transform: translateY(-100vh) rotate(0deg); }
            100% { transform: translateY(100vh) rotate(360deg); }
        }
        
        .confetti-piece {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #FF6B6B;
            animation: fall linear infinite;
        }
        
        @media (max-width: 768px) {
            .question-card {
                margin: 10px;
                padding: 20px;
                min-height: 400px;
            }
            
            .question-text {
                font-size: 1.4rem;
            }
            
            .game-controls {
                flex-direction: column;
                align-items: center;
            }
            
            .control-btn {
                min-width: 200px;
            }
            
            .team-score {
                padding: 10px 15px;
            }
            
            .score-number {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Game Header -->
    <div class="game-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="team-score" id="team1Score">
                        <h5 id="team1Name">الفريق الأول</h5>
                        <div class="score-number" id="team1Points">0</div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="game-info">
                        <div class="question-counter">
                            السؤال <span id="currentQuestion">1</span> من <span id="totalQuestions">36</span>
                        </div>
                        <div class="text-muted">
                            <small id="currentCategory">الفئة الحالية</small>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="team-score" id="team2Score">
                        <h5 id="team2Name">الفريق الثاني</h5>
                        <div class="score-number" id="team2Points">0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- Question Display -->
            <div class="question-card" id="questionCard">
                <div class="category-badge" id="questionCategory">فئة السؤال</div>
                
                <div class="question-text" id="questionText">
                    جاري تحميل السؤال...
                </div>
                
                <div class="question-media" id="questionMedia">
                    <!-- Media content will be inserted here -->
                </div>
                
                <div class="answer-section" id="answerSection">
                    <div class="text-success mb-2">
                        <i class="fas fa-check-circle"></i> الإجابة الصحيحة:
                    </div>
                    <div class="answer-text" id="answerText"></div>
                </div>
                
                <div class="game-controls">
                    <button class="control-btn btn-show-answer" id="showAnswerBtn" onclick="showAnswer()">
                        <i class="fas fa-eye me-2"></i>
                        إظهار الإجابة
                    </button>
                    
                    <button class="control-btn btn-correct" id="correctBtn" onclick="markCorrect()" style="display: none;">
                        <i class="fas fa-check me-2"></i>
                        إجابة صحيحة
                    </button>
                    
                    <button class="control-btn btn-wrong" id="wrongBtn" onclick="markWrong()" style="display: none;">
                        <i class="fas fa-times me-2"></i>
                        إجابة خاطئة
                    </button>
                    
                    <button class="control-btn btn-next" id="nextBtn" onclick="nextQuestion()" style="display: none;">
                        <i class="fas fa-arrow-left me-2"></i>
                        السؤال التالي
                    </button>
                </div>
            </div>
            
            <!-- Game End Screen -->
            <div class="game-end" id="gameEndScreen">
                <div class="winner-announcement" id="winnerText">
                    🎉 انتهت اللعبة! 🎉
                </div>
                
                <div class="final-scores" id="finalScores">
                    <!-- Final scores will be populated here -->
                </div>
                
                <div class="mt-4">
                    <button class="control-btn btn-next" onclick="newGame()">
                        <i class="fas fa-play me-2"></i>
                        لعبة جديدة
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Confetti Container -->
    <div class="confetti" id="confetti"></div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let gameData = {};
        let questions = [];
        let currentQuestionIndex = 0;
        let currentTeam = 1; // 1 or 2
        let team1Score = 0;
        let team2Score = 0;
        let answerShown = false;

        // Initialize game
        $(document).ready(function() {
            loadGameData();
            loadQuestions();
        });

        function loadGameData() {
            const storedData = localStorage.getItem('seenJeemGame');
            if (storedData) {
                gameData = JSON.parse(storedData);
                
                // Update team names
                $('#team1Name').text(gameData.team1.name);
                $('#team2Name').text(gameData.team2.name);
                
                // Highlight current team
                updateCurrentTeam();
                
                console.log('Game data loaded:', gameData);
            } else {
                alert('لم يتم العثور على بيانات اللعبة. سيتم إعادة توجيهك لإعداد لعبة جديدة.');
                window.location.href = 'bladeHome.php';
            }
        }

        function loadQuestions() {
            if (!gameData.categories || gameData.categories.length === 0) {
                alert('لم يتم اختيار فئات للعبة.');
                return;
            }

            // Load questions for selected categories
            $.ajax({
                url: '../get_questions.php',
                method: 'POST',
                data: {
                    categories: gameData.categories
                },
                dataType: 'json',
                success: function(data) {
                    if (data.error) {
                        console.error('Error loading questions:', data);
                        alert('خطأ في تحميل الأسئلة: ' + data.message);
                        return;
                    }
                    
                    questions = data;
                    $('#totalQuestions').text(questions.length);
                    
                    if (questions.length === 0) {
                        alert('لا توجد أسئلة كافية للفئات المختارة.');
                        return;
                    }
                    
                    // Start the game
                    displayCurrentQuestion();
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error loading questions:', {xhr, status, error});
                    alert('خطأ في تحميل الأسئلة. تحقق من الاتصال بالخادم.');
                }
            });
        }

        function displayCurrentQuestion() {
            if (currentQuestionIndex >= questions.length) {
                endGame();
                return;
            }

            const question = questions[currentQuestionIndex];
            
            // Update question display
            $('#currentQuestion').text(currentQuestionIndex + 1);
            $('#questionCategory').text(question.categoryName);
            $('#currentCategory').text(question.categoryName);
            $('#questionText').text(question.question);
            $('#answerText').text(question.answer);
            
            // Clear and setup media
            const mediaContainer = $('#questionMedia');
            mediaContainer.empty();
            
            if (question.image) {
                mediaContainer.append(`<img src="../logos/qas/questions/${question.image}" alt="صورة السؤال">`);
            }
            
            if (question.video) {
                mediaContainer.append(`
                    <video controls style="max-width: 100%; max-height: 300px;">
                        <source src="../logos/qas/questions/${question.video}" type="video/mp4">
                    </video>
                `);
            }
            
            if (question.audio) {
                mediaContainer.append(`
                    <audio controls style="width: 100%; max-width: 400px;">
                        <source src="../logos/qas/questions/${question.audio}" type="audio/mpeg">
                    </audio>
                `);
            }
            
            // Reset button states
            $('#showAnswerBtn').show();
            $('#correctBtn, #wrongBtn, #nextBtn').hide();
            $('#answerSection').hide();
            answerShown = false;
            
            // Update current team highlight
            updateCurrentTeam();
        }

        function updateCurrentTeam() {
            $('#team1Score, #team2Score').removeClass('active');
            $(`#team${currentTeam}Score`).addClass('active');
        }

        function showAnswer() {
            $('#answerSection').fadeIn();
            $('#showAnswerBtn').hide();
            $('#correctBtn, #wrongBtn').show();
            answerShown = true;
        }

        function markCorrect() {
            const question = questions[currentQuestionIndex];
            const points = parseInt(question.points) || 1;
            
            if (currentTeam === 1) {
                team1Score += points;
                $('#team1Points').text(team1Score);
            } else {
                team2Score += points;
                $('#team2Points').text(team2Score);
            }
            
            showNextButton();
            
            // Add visual feedback
            $(`#team${currentTeam}Score`).addClass('animate__animated animate__pulse');
            setTimeout(() => {
                $(`#team${currentTeam}Score`).removeClass('animate__animated animate__pulse');
            }, 1000);
        }

        function markWrong() {
            // Switch to other team for next question
            currentTeam = currentTeam === 1 ? 2 : 1;
            showNextButton();
        }

        function showNextButton() {
            $('#correctBtn, #wrongBtn').hide();
            $('#nextBtn').show();
        }

        function nextQuestion() {
            currentQuestionIndex++;
            displayCurrentQuestion();
        }

        function endGame() {
            $('#questionCard').hide();
            $('#gameEndScreen').show();
            
            // Determine winner
            let winnerText = '';
            if (team1Score > team2Score) {
                winnerText = `🏆 فاز ${gameData.team1.name}! 🏆`;
            } else if (team2Score > team1Score) {
                winnerText = `🏆 فاز ${gameData.team2.name}! 🏆`;
            } else {
                winnerText = '🤝 تعادل! 🤝';
            }
            
            $('#winnerText').text(winnerText);
            
            // Show final scores
            $('#finalScores').html(`
                <div class="final-score-card">
                    <h4>${gameData.team1.name}</h4>
                    <div class="score-number">${team1Score}</div>
                    <small>نقطة</small>
                </div>
                <div class="final-score-card">
                    <h4>${gameData.team2.name}</h4>
                    <div class="score-number">${team2Score}</div>
                    <small>نقطة</small>
                </div>
            `);
            
            // Show confetti if there's a winner
            if (team1Score !== team2Score) {
                showConfetti();
            }
        }

        function showConfetti() {
            const confetti = $('#confetti');
            const colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEAA7', '#DDA0DD'];
            
            for (let i = 0; i < 50; i++) {
                setTimeout(() => {
                    const piece = $('<div class="confetti-piece"></div>');
                    piece.css({
                        left: Math.random() * 100 + '%',
                        backgroundColor: colors[Math.floor(Math.random() * colors.length)],
                        animationDuration: (Math.random() * 3 + 2) + 's',
                        animationDelay: Math.random() * 2 + 's'
                    });
                    confetti.append(piece);
                    
                    setTimeout(() => piece.remove(), 5000);
                }, i * 100);
            }
        }

        function newGame() {
            localStorage.removeItem('seenJeemGame');
            window.location.href = 'bladeHome.php';
        }

        // Keyboard shortcuts
        $(document).keydown(function(e) {
            if (e.which === 32) { // Spacebar
                e.preventDefault();
                if ($('#showAnswerBtn').is(':visible')) {
                    showAnswer();
                } else if ($('#nextBtn').is(':visible')) {
                    nextQuestion();
                }
            } else if (e.which === 37) { // Left arrow
                if ($('#correctBtn').is(':visible')) {
                    markCorrect();
                }
            } else if (e.which === 39) { // Right arrow
                if ($('#wrongBtn').is(':visible')) {
                    markWrong();
                }
            }
        });
    </script>
</body>
</html>
