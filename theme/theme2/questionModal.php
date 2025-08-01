<div class="question-modal" id="questionModal" style="display: none;">
    <div class="question-main-container">
        <!-- Left Side - Question Section -->
        <div class="question-section">
            <!-- Question Points (top-left) -->
            <div class="question-points" id="questionPoints">200 نقطة</div>
            
            <!-- Timer (top-center) -->
            <div class="question-timer">
                <div class="timer-display" id="timerDisplay">1:00</div>
                <div class="timer-controls">
                    <button class="timer-btn" id="pauseBtn" onclick="pauseTimer()">⏸</button>
                    <button class="timer-btn" id="restartBtn" onclick="restartTimer()">🔄</button>
                </div>
            </div>
            
            <!-- Question Category (top-right) -->
            <div class="question-category" id="questionCategory">فئة السؤال</div>
            
            <!-- Question Content (center) -->
            <div class="question-content" id="questionContainer">
                <div class="question-text-large" id="questionText">
                    جاري تحميل السؤال...
                </div>
                
                <div class="question-media-container" id="questionMedia">
                    <!-- Media content will be inserted here -->
                </div>
            </div>
            
            <!-- Answer Content (replaces question when revealed) -->
            <div class="question-content" id="answerContainer" style="display: none;">
                <div class="answer-text-large" id="answerText"></div>
            </div>
            
            <!-- Show Answer Button (bottom-left) -->
            <button class="show-answer-btn" id="showAnswerBtn" onclick="showAnswer()">
                <i class="fas fa-eye"></i>
                إظهار الإجابة
            </button>
            
            <!-- Double Points Indicator -->
            <div class="double-points-indicator" id="doublePointsIndicator" style="display: none;">
                <i class="fas fa-times-circle"></i> ضعف النقاط!
            </div>
        </div>
        
        <!-- Right Side - Teams Section -->
        <div class="teams-section">
            <!-- Team 1 Score Card -->
            <div class="team-score-card">
                <div class="team-name" id="team1Name">الفريق الأول</div>
                <div class="team-score" id="team1Score">1500</div>
            </div>
            
            <!-- Team 2 Score Card -->
            <div class="team-score-card">
                <div class="team-name" id="team2Name">الفريق الثاني</div>
                <div class="team-score" id="team2Score">1500</div>
            </div>
            
            <!-- Team Selection Controls (shown after answer is revealed) -->
            <div class="team-selection-controls" id="teamSelection" style="display: none;">
                <div class="team-scoring-title">أي فريق أجاب بشكل صحيح؟</div>
                <div class="team-buttons">
                    <button class="quiz-btn quiz-btn-team1" id="team1CorrectBtn" onclick="markTeamCorrect(1)">
                        <i class="fas fa-check"></i>
                        <span id="team1CorrectName">الفريق الأول</span>
                    </button>
                    
                    <button class="quiz-btn quiz-btn-team2" id="team2CorrectBtn" onclick="markTeamCorrect(2)">
                        <i class="fas fa-check"></i>
                        <span id="team2CorrectName">الفريق الثاني</span>
                    </button>
                    
                    <button class="quiz-btn quiz-btn-wrong" id="noCorrectBtn" onclick="markNoCorrect()">
                        <i class="fas fa-times"></i>
                        <span>لا أحد أجاب صحيح</span>
                    </button>
                </div>
            </div>
            
            <!-- Back to Board Button -->
            <button class="quiz-btn quiz-btn-back" id="nextBtn" onclick="closeQuestion()" style="display: none;">
                <i class="fas fa-arrow-right"></i>
                <span>العودة للوحة</span>
            </button>
        </div>
    </div>
    
    <!-- Call Friend Timer (if needed, can be positioned separately) -->
    <div class="call-friend-timer" id="callFriendTimer" style="display: none;">
        <div class="timer-icon">
            <i class="fas fa-phone-alt fa-beat"></i>
        </div>
        <div class="timer-text">جاري الاتصال بصديق...</div>
        <div class="timer-countdown" id="timerCountdown">60</div>
        <div class="timer-bar">
            <div class="timer-progress" id="timerProgress"></div>
        </div>
    </div>
</div>