<div class="game-play-container">
    <!-- Header with game info -->
    <div class="game-header">
        <h1 class="game-title">شباب الدوانية <span class="turn-indicator">دور <span id="currentTeamName">الفريق الأول</span></span></h1>
        <a href="?v=Home" class="exit-button"><i class="fas fa-sign-out-alt"></i> خروج</a>
    </div>
    
    <!-- Categories showcase at top -->
    <div class="categories-showcase">
        <!-- Categories will be displayed here -->
    </div>
    
    <div class="question-board-showcase">
    <!-- Numbered columns -->
    <div class="numbered-columns">
        <!-- Column numbers will be displayed here -->
        <div class="column-number">1</div>
        <div class="column-number">2</div>
        <div class="column-number">3</div>
        <div class="column-number">4</div>
        <div class="column-number">5</div>
        <div class="column-number">6</div>
        <div class="column-number">7</div>
        <div class="column-number">8</div>
        <div class="column-number">9</div>
        <div class="column-number">10</div>
        <div class="column-number">11</div>
        <div class="column-number">12</div>
    </div>
    
    <!-- Question board with 12 columns, each with 3 questions -->
    <div class="question-board">
        <!-- Questions will be displayed here -->
    </div>
    </div>

    <!-- Footer with teams and ads placeholder -->
    <div class="game-footer">
        <!-- Team panels and ads will be displayed here -->
        <div class="team-panel team1">
            <div class="team-header-row">
                <div class="team-name-display" id="team1Name">الفريق الأول</div>
                <div class="team-score" id="team1Score">0</div>
            </div>
        </div>
        
        <div class="team-panel team3" style="justify-content: center;">
            <div class="team-header-row" style="justify-content: center;">
                <div class="team-name-display" id="team1Name">الإعلانات</div>
            </div>
        </div>
        
        <div class="team-panel team2">
            <div class="team-header-row">
                <div class="team-name-display" id="team2Name">الفريق الثاني</div>
                <div class="team-score" id="team2Score">0</div>
            </div>
        </div>
    </div>
</div>

<!-- Question Modal -->
<?php require_once "theme/{$theme}/questionModal.php"; ?>

<!-- Game End Screen -->
<div class="game-end" id="gameEndScreen" style="display: none;">
    <div class="winner-announcement" id="winnerText">
        🎉 انتهت اللعبة! 🎉
    </div>
    
    <div class="final-scores" id="finalScores">
        <!-- Final scores will be populated here -->
    </div>
    
    <div class="mt-4">
        <button class="quiz-btn" onclick="newGame()">
            <i class="fas fa-play me-2"></i>
            لعبة جديدة
        </button>
    </div>
</div>

<!-- Confetti Container -->
<div class="confetti" id="confetti"></div>
