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
                    <div class="text-center">
                        <h4>سين جيم</h4>
                        <small class="text-muted">لعبة الأسئلة والأجوبة</small>
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
        <!-- Current Turn Indicator -->
        <div class="turn-indicator" id="turnIndicator">
            <div class="turn-text">
                دور <span id="currentTeamTurn">الفريق الأول</span>
            </div>
            <div class="turn-instruction">اختر سؤالاً من اللوحة</div>
        </div>

        <!-- Question Board -->
        <div class="question-board" id="questionBoard">
            <!-- Board will be populated dynamically -->
        </div>

        <!-- Question Display Modal -->
        <div class="question-modal" id="questionModal" style="display: none;">
            <div class="question-modal-content">
                <div class="category-badge" id="questionCategory">فئة السؤال</div>
                
                <div class="question-text" id="questionText">
                    جاري تحميل السؤال...
                </div>
                
                <div class="question-media" id="questionMedia">
                    <!-- Media content will be inserted here -->
                </div>
                
                <div class="answer-section" id="answerSection" style="display: none;">
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
                    
                    <div class="team-selection" id="teamSelection" style="display: none;">
                        <p class="mb-3">أي فريق أجاب بشكل صحيح؟</p>
                        <button class="control-btn btn-team1" id="team1CorrectBtn" onclick="markTeamCorrect(1)">
                            <i class="fas fa-check me-2"></i>
                            <span id="team1CorrectName">الفريق الأول</span>
                        </button>
                        
                        <button class="control-btn btn-team2" id="team2CorrectBtn" onclick="markTeamCorrect(2)">
                            <i class="fas fa-check me-2"></i>
                            <span id="team2CorrectName">الفريق الثاني</span>
                        </button>
                        
                        <button class="control-btn btn-wrong" id="noCorrectBtn" onclick="markNoCorrect()">
                            <i class="fas fa-times me-2"></i>
                            لا أحد أجاب صحيح
                        </button>
                    </div>
                    
                    <button class="control-btn btn-next" id="nextBtn" onclick="closeQuestion()" style="display: none;">
                        <i class="fas fa-arrow-left me-2"></i>
                        العودة للوحة
                    </button>
                </div>
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
