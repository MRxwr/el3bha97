<!-- Game Header -->
<div class="game-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="team-score" id="team1Score">
                    <h5 id="team1Name">الفريق الأول</h5>
                    <div class="score-number" id="team1Points">0</div>
                    <div class="team-lifelines" id="team1Lifelines">
                        <div class="lifeline-indicator" id="team1CallFriend" title="اتصل بصديق">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="lifeline-indicator" id="team1TwoAnswers" title="إجابتان فقط">
                            <i class="fas fa-hand-point-right"></i>
                        </div>
                        <div class="lifeline-indicator" id="team1DoublePoints" title="ضعف النقاط">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
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
                    <div class="team-lifelines" id="team2Lifelines">
                        <div class="lifeline-indicator" id="team2CallFriend" title="اتصل بصديق">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="lifeline-indicator" id="team2TwoAnswers" title="إجابتان فقط">
                            <i class="fas fa-hand-point-right"></i>
                        </div>
                        <div class="lifeline-indicator" id="team2DoublePoints" title="ضعف النقاط">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
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
    </div>
</div>

<!-- Confetti Container -->
<div class="confetti" id="confetti"></div>
