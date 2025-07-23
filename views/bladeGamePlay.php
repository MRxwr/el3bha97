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
