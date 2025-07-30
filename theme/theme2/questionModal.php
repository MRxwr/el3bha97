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
            <!-- Sidebar - Lifelines -->
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
            
            <!-- Center - Question/Answer Content -->
            <div class="question-content-center">
                <!-- Question Content (shown initially) -->
                <div class="content-container" id="questionContainer">
                    <div class="question-text-large" id="questionText">
                        جاري تحميل السؤال...
                    </div>
                    
                    <div class="question-media-container" id="questionMedia">
                        <!-- Media content will be inserted here -->
                    </div>
                </div>
                
                <!-- Answer Content (replaces question when revealed) -->
                <div class="content-container" id="answerContainer" style="display: none;">
                    <div class="answer-text-large" id="answerText"></div>
                </div>
                
                <!-- Control Buttons -->
                <div class="question-controls">
                    <div class="controls-row">
                        <button class="quiz-btn quiz-btn-show" id="showAnswerBtn" onclick="showAnswer()">
                            <i class="fas fa-eye"></i>
                            <span>إظهار الإجابة</span>
                        </button>
                    </div>
                    
                    <div class="controls-row" id="teamSelection" style="display: none;">
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
                    
                    <div class="controls-row">
                        <button class="quiz-btn quiz-btn-back" id="nextBtn" onclick="closeQuestion()" style="display: none;">
                            <i class="fas fa-arrow-right"></i>
                            <span>العودة للوحة</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>