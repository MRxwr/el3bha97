<div class="mobile-frame">
    <div class="inner-frame">
        <div class="game-play-container">
            <!-- Header -->
            <div class="game-play-header">
                <div class="header-left">
                    <a href="#" class="header-link"><i class="fas fa-sign-out-alt"></i> الخروج</a>
                </div>
                <div class="header-center">
                    <a href="#" class="header-link">انتهاء اللعبة <i class="fas fa-arrow-left"></i> الرجوع للوحة</a>
                </div>
                <div class="header-right">
                    <div class="logo-text">سين<br>جيم</div>
                </div>
            </div>

            <!-- Game Board -->
            <div class="game-board-container">
                <div class="game-title">شباب الدوانية</div>
                <div class="turn-indicator-top">دور فريق الدويسان</div>
                <div class="question-grid" id="questionBoard">
                    <!-- Board will be populated dynamically -->
                </div>
            </div>

            <!-- Footer with Team Info -->
            <div class="game-play-footer">
                <div class="team-info-footer team-1">
                    <div class="team-name" id="team1Name">الفريق الأول</div>
                    <div class="team-score-footer" id="team1Points">1000</div>
                    <div class="lifelines-footer">
                        <span>وسائل المساعدة</span>
                        <div class="lifeline-icons" id="team1Lifelines">
                            <div class="lifeline-icon" title="اتصل بصديق"><i class="fas fa-phone"></i></div>
                            <div class="lifeline-icon" title="إجابتان فقط"><i class="fas fa-users"></i></div>
                            <div class="lifeline-icon" title="ضعف النقاط">x2</div>
                        </div>
                    </div>
                </div>
                <div class="team-info-footer team-2">
                    <div class="team-name" id="team2Name">الفريق الثاني</div>
                    <div class="team-score-footer" id="team2Points">1000</div>
                    <div class="lifelines-footer">
                        <span>وسائل المساعدة</span>
                        <div class="lifeline-icons" id="team2Lifelines">
                            <div class="lifeline-icon" title="اتصل بصديق"><i class="fas fa-phone"></i></div>
                            <div class="lifeline-icon" title="إجابتان فقط"><i class="fas fa-users"></i></div>
                            <div class="lifeline-icon" title="ضعف النقاط">x2</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Question Display Modal (kept for functionality, might need style adjustments) -->
<div class="question-modal" id="questionModal" style="display: none;">
    <div class="question-display-container">
        <!-- Question Header -->
        <div class="question-header">
            <div class="question-category-badge" id="questionCategory">فئة السؤال</div>
            <div class="question-points" id="questionPoints">200 نقطة</div>
            <div class="double-points-indicator" id="doublePointsIndicator" style="display: none;">
                <i class="fas fa-times-circle"></i> ضعف النقاط!
            </div>
        </div>
        
        <!-- Main Content Area -->
        <div class="question-main-content">
            <!-- Left Side - Lifelines -->
            <div class="question-sidebar">
                <!-- Lifelines Section -->
                <div class="lifelines-container" id="lifelinesContainer">
                    <div class="lifelines-title">وسائل المساعدة</div>
                    <div class="lifelines-buttons">
                        <button class="lifeline-btn" id="callFriendBtn" onclick="useCallFriend()">
                            <i class="fas fa-phone"></i>
                            <span>اتصل بصديق</span>
                        </button>
                        
                        <button class="lifeline-btn" id="twoAnswersBtn" onclick="useTwoAnswers()">
                            <i class="fas fa-hand-point-right"></i>
                            <span>إجابتان فقط</span>
                        </button>
                        
                        <button class="lifeline-btn" id="doublePointsBtn" onclick="useDoublePoints()">
                            <i class="fas fa-times-circle"></i>
                            <span>ضعف النقاط</span>
                        </button>
                    </div>
                </div>
                
                <!-- Call Friend Timer -->
                <div class="call-friend-timer" id="callFriendTimer" style="display: none;">
                    <div class="timer-content">
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
            </div>
            
            <!-- Center - Question Content -->
            <div class="question-content-center">
                <div class="question-text-large" id="questionText">
                    جاري تحميل السؤال...
                </div>
                
                <div class="question-media-container" id="questionMedia">
                    <!-- Media content will be inserted here -->
                </div>
                
                <!-- Answer Section -->
                <div class="answer-display" id="answerSection" style="display: none;">
                    <div class="answer-label">الإجابة الصحيحة:</div>
                    <div class="answer-text-large" id="answerText"></div>
                </div>
            </div>
        </div>
        
        <!-- Control Buttons -->
        <div class="question-controls">
            <div class="primary-controls">
                <button class="quiz-btn quiz-btn-show" id="showAnswerBtn" onclick="showAnswer()">
                    <i class="fas fa-eye"></i>
                    <span>إظهار الإجابة</span>
                </button>
            </div>
            
            <div class="team-scoring" id="teamSelection" style="display: none;">
                <div class="scoring-title">أي فريق أجاب بشكل صحيح؟</div>
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
            
            <div class="secondary-controls">
                <button class="quiz-btn quiz-btn-back" id="nextBtn" onclick="closeQuestion()" style="display: none;">
                    <i class="fas fa-arrow-right"></i>
                    <span>العودة للوحة</span>
                </button>
            </div>
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

<!-- Confetti Container -->
<div class="confetti" id="confetti"></div>
