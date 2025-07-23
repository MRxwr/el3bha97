<style>
/* Mobile responsive game design styles */
body, html {
    height: 100vh;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    font-family: 'Cairo', sans-serif;
    overflow: hidden;
    direction: rtl;
}

.game-play-container {
    display: flex;
    flex-direction: column;
    height: 100vh;
    width: 100%;
    color: white;
    padding: 15px;
    box-sizing: border-box;
}

.game-play-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 15px;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    margin-bottom: 15px;
    flex-shrink: 0;
}

.header-left, .header-center, .header-right {
    display: flex;
    align-items: center;
    flex: 1;
}

.header-center {
    justify-content: center;
}

.header-right {
    justify-content: flex-end;
}

.header-link {
    color: white;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
}

.logo-text {
    font-size: 1.3rem;
    font-weight: bold;
    text-align: center;
    line-height: 1.1;
    background: linear-gradient(45deg, #FFD700, #FFA500);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.game-board-container {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    padding: 0 10px;
}

.game-title {
    font-size: 1.8rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 5px;
}

.turn-indicator-top {
    background-color: rgba(255, 255, 255, 0.9);
    color: #667eea;
    padding: 10px 25px;
    border-radius: 25px;
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
}

.question-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    width: 100%;
    max-width: 1200px;
    flex-grow: 1;
    padding: 15px 0;
}

.category-column {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.category-header {
    background: linear-gradient(45deg, #4ECDC4, #44A08D);
    border-radius: 15px;
    padding: 15px;
    text-align: center;
    color: white;
    font-weight: bold;
    font-size: 1rem;
    min-height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.point-value {
    background: linear-gradient(45deg, #FF6B6B, #ee5a52);
    color: white;
    border-radius: 15px;
    padding: 20px 15px;
    text-align: center;
    font-weight: bold;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    border: 2px solid rgba(255,255,255,0.2);
    min-height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.point-value:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}

.point-value.disabled {
    background: rgba(0, 0, 0, 0.3);
    color: rgba(255,255,255,0.5);
    cursor: not-allowed;
    transform: none;
}

.game-play-footer {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    padding: 15px 0;
    flex-shrink: 0;
}

.team-info-footer {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 15px;
    width: 48%;
    text-align: center;
    border: 1px solid rgba(255,255,255,0.2);
}

.team-name {
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 8px;
}

.team-score-footer {
    font-size: 1.6rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #FFD700;
}

.lifelines-footer span {
    font-size: 0.8rem;
    opacity: 0.8;
    display: block;
    margin-bottom: 8px;
}

.lifeline-icons {
    display: flex;
    justify-content: center;
    gap: 8px;
}

.lifeline-icon {
    width: 35px;
    height: 35px;
    background-color: rgba(255, 255, 255, 0.8);
    color: #667eea;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.lifeline-icon:hover {
    background-color: white;
    transform: scale(1.1);
}

/* Question Modal Styles */
.question-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.question-display-container {
    background: white;
    border-radius: 20px;
    padding: 30px;
    max-width: 90%;
    max-height: 90%;
    overflow-y: auto;
    color: #333;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .game-play-container {
        padding: 10px;
    }
    
    .game-title {
        font-size: 1.4rem;
    }
    
    .turn-indicator-top {
        padding: 8px 20px;
        font-size: 0.9rem;
    }
    
    .question-grid {
        gap: 8px;
        padding: 10px 0;
    }
    
    .category-header {
        padding: 10px;
        font-size: 0.9rem;
        min-height: 60px;
    }
    
    .point-value {
        padding: 15px 10px;
        font-size: 1rem;
        min-height: 50px;
    }
    
    .team-info-footer {
        padding: 12px;
    }
    
    .team-score-footer {
        font-size: 1.3rem;
    }
    
    .lifeline-icon {
        width: 30px;
        height: 30px;
        font-size: 0.8rem;
    }
}

@media (max-width: 480px) {
    .game-play-container {
        padding: 8px;
    }
    
    .game-title {
        font-size: 1.2rem;
    }
    
    .question-grid {
        gap: 6px;
    }
    
    .category-header {
        font-size: 0.8rem;
        padding: 8px;
        min-height: 50px;
    }
    
    .point-value {
        font-size: 0.9rem;
        padding: 12px 8px;
        min-height: 45px;
    }
    
    .header-link {
        font-size: 0.8rem;
    }
    
    .logo-text {
        font-size: 1.1rem;
    }
}

/* Force portrait orientation */
@media (orientation: landscape) and (max-width: 896px) {
    body {
        transform: rotate(90deg);
        transform-origin: left top;
        width: 100vh;
        height: 100vw;
        overflow-x: hidden;
        position: absolute;
        top: 100%;
        left: 0;
    }
}
</style>

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
