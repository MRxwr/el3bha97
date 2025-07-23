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
    padding: 8px 15px;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    margin-bottom: 10px;
    flex-shrink: 0;
    min-height: 60px;
}

.header-left, .header-center, .header-right {
    display: flex;
    align-items: center;
    flex: 1;
}

.header-center {
    justify-content: center;
    flex-direction: column;
    gap: 5px;
}

.header-right {
    justify-content: flex-end;
}

.header-link {
    color: white;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 500;
}

.logo-text {
    font-size: 1.1rem;
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
    padding: 0 10px;
}

.game-title {
    font-size: 1.3rem;
    font-weight: bold;
    text-align: center;
    margin: 0;
    line-height: 1.2;
}

.turn-indicator-top {
    background-color: rgba(255, 255, 255, 0.9);
    color: #667eea;
    padding: 4px 15px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: bold;
    text-align: center;
    margin: 0;
}

.question-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 8px;
    width: 100%;
    max-width: 1200px;
    flex-grow: 1;
    padding: 0px 0;
}

.category-column {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.category-header {
    background: linear-gradient(45deg, #4ECDC4, #44A08D);
    border-radius: 12px;
    padding: 10px;
    text-align: center;
    color: white;
    font-weight: bold;
    font-size: 0.9rem;
    min-height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.point-value {
    background: linear-gradient(45deg, #FF6B6B, #ee5a52);
    color: white;
    border-radius: 12px;
    padding: 15px 10px;
    text-align: center;
    font-weight: bold;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    border: 2px solid rgba(255,255,255,0.2);
    min-height: 50px;
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
    gap: 10px;
    padding: 8px 0;
    flex-shrink: 0;
}

.team-info-footer {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    padding: 6px 8px;
    width: 48%;
    text-align: center;
    border: 1px solid rgba(255,255,255,0.2);
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
}

.team-name {
    font-size: 0.6rem;
    font-weight: bold;
    margin: 0;
    line-height: 1.2;
    flex: 0 0 auto;
    text-align: right;
    min-width: 60px;
}

.team-score-footer {
    font-size: 0.9rem;
    font-weight: bold;
    margin: 0;
    color: #FFD700;
    line-height: 1.2;
    flex: 1;
    text-align: center;
}

.lifelines-footer span {
    font-size: 0.8rem;
    opacity: 0.8;
    display: block;
    margin-bottom: 8px;
}

.lifeline-icons {
    display: flex;
    justify-content: flex-start;
    gap: 2px;
    flex: 0 0 auto;
    min-width: 60px;
}

.lifeline-icon {
    width: 16px;
    height: 16px;
    background-color: rgba(255, 255, 255, 0.8);
    color: #667eea;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    font-size: 0.5rem;
    transition: all 0.3s ease;
    font-weight: bold;
}

.lifeline-icon:hover {
    background-color: white;
    transform: scale(1.1);
}

.lifeline-icon.used {
    background-color: rgba(128, 128, 128, 0.5);
    color: rgba(255, 255, 255, 0.4);
    cursor: not-allowed;
    opacity: 0.5;
}

.lifeline-icon.used:hover {
    background-color: rgba(128, 128, 128, 0.5);
    transform: none;
}

/* Question Modal Styles - Full Screen */
.question-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: linear-gradient(135deg, #FF5F5F 0%, #FF3131 100%); /* Red gradient background */
    display: flex;
    z-index: 1000;
    direction: rtl;
}

.question-display-container {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    padding: 15px;
    box-sizing: border-box;
    color: white;
    overflow: hidden;
}

/* Question Header */
.question-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 15px;
    background: transparent;
    margin-bottom: 5px;
    flex-shrink: 0;
    min-height: 40px;
}

.question-category-badge {
    background: linear-gradient(45deg, #4ECDC4, #44A08D);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: bold;
}

.question-points {
    background: linear-gradient(45deg, #FF6B6B, #ee5a52);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 1rem;
    font-weight: bold;
}

.double-points-indicator {
    background: linear-gradient(45deg, #FFD700, #FFA500);
    color: #333;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: bold;
    animation: pulse 2s infinite;
}

/* Main Content Area */
.question-main-content {
    display: flex;
    gap: 15px;
    flex: 1;
    min-height: 0;
    align-items: stretch;
}

/* Left Sidebar - Lifelines */
.question-sidebar {
    width: 200px;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.lifelines-container {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 12px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.lifelines-title {
    color: white;
    font-size: 0.9rem;
    font-weight: bold;
    margin-bottom: 8px;
    text-align: center;
}

.lifelines-buttons {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.lifeline-btn {
    background: rgba(255, 255, 255, 0.9);
    color: #667eea;
    border: none;
    border-radius: 8px;
    padding: 8px 10px;
    font-size: 0.75rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 6px;
    justify-content: flex-start;
}

.lifeline-btn:hover:not(:disabled) {
    background: white;
    transform: translateY(-1px);
}

.lifeline-btn:disabled {
    background: rgba(128, 128, 128, 0.5);
    color: rgba(255, 255, 255, 0.6);
    cursor: not-allowed;
    opacity: 0.6;
}

.lifeline-btn i {
    font-size: 0.9rem;
}

/* Call Friend Timer */
.call-friend-timer {
    background: rgba(255, 107, 107, 0.9);
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    color: white;
    animation: pulse 2s infinite;
}

.timer-icon {
    font-size: 1.5rem;
    margin-bottom: 8px;
}

.timer-text {
    font-size: 0.8rem;
    font-weight: 600;
    margin-bottom: 8px;
}

.timer-countdown {
    font-size: 2rem;
    font-weight: 800;
    margin: 10px 0;
}

.timer-bar {
    width: 100%;
    height: 4px;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 2px;
    overflow: hidden;
}

.timer-progress {
    height: 100%;
    background: linear-gradient(90deg, #00f2fe 0%, #4facfe 100%);
    border-radius: 2px;
    transition: width 1s linear;
}

/* Center Content Area */
.question-content-center {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    padding: 0 15px;
    min-height: 0;
    overflow-y: auto;
}

.question-text-large {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 20px;
    font-size: 1.1rem;
    font-weight: bold;
    text-align: center;
    line-height: 1.5;
    margin-bottom: 15px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    width: 100%;
    max-width: 600px;
}

.question-media-container {
    width: 100%;
    max-width: 500px;
    margin-bottom: 15px;
    border-radius: 12px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
}

.question-media-container img {
    width: 100%;
    max-width: 100%;
    max-height: 250px;
    object-fit: contain;
    border-radius: 12px;
    background: white;
    padding: 5px;
}

.answer-display {
    background: rgba(76, 175, 80, 0.1);
    border: 2px solid rgba(76, 175, 80, 0.3);
    border-radius: 12px;
    padding: 15px;
    margin-top: 10px;
    width: 100%;
    max-width: 600px;
}

.answer-label {
    font-size: 0.9rem;
    font-weight: bold;
    color: #4CAF50;
    margin-bottom: 8px;
}

.answer-text-large {
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
    line-height: 1.4;
}

/* Control Buttons */
.question-controls {
    flex-shrink: 0;
    padding: 10px 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.primary-controls,
.team-scoring,
.secondary-controls {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.quiz-btn {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    border: none;
    border-radius: 10px;
    padding: 10px 16px;
    font-size: 0.8rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 6px;
    min-width: 120px;
    justify-content: center;
}

/* New Question Modal Styles */
.timer-container {
    background-color: #1f1f1f;
    border-radius: 20px;
    padding: 5px 15px;
    margin: 8px 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.timer-bar-container {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 15px;
}

.timer-controls {
    display: flex;
    align-items: center;
    gap: 6px;
}

.timer-count {
    background-color: #fff;
    color: #222;
    font-size: 0.7rem;
    font-weight: bold;
    padding: 2px 6px;
    border-radius: 10px;
}

.timer-pause-btn {
    background: none;
    border: none;
    color: white;
    font-size: 1rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.timer-progress-bar {
    flex: 1;
    height: 6px;
    background-color: rgba(255,255,255,0.2);
    border-radius: 3px;
    overflow: hidden;
}

.timer-progress-fill {
    height: 100%;
    background-color: #FF5F5F;
    transition: width 0.3s linear;
}

.timer-display {
    font-weight: bold;
    color: white;
    font-size: 0.9rem;
}

.question-content-wrapper {
    background-color: white;
    border-radius: 20px;
    padding: 15px;
    margin: 10px 0;
    position: relative;
    color: #333;
    flex: 1;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.question-category-tag {
    position: absolute;
    top: -12px;
    right: 15px;
    background-color: #ff5f5f;
    color: white;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 0.7rem;
    font-weight: bold;
}

.question-text-container {
    width: 100%;
    margin-top: 10px;
    margin-bottom: 15px;
}

.question-text-large {
    background: none;
    border: none;
    padding: 0;
    font-size: 1.1rem;
    font-weight: bold;
    text-align: center;
    color: #333;
    margin-bottom: 15px;
    width: 100%;
}

.question-media-container {
    width: 90%;
    margin: 0 auto;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.game-round-info {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    margin: 10px 0;
}

.round-card {
    background-color: #ff5f5f;
    color: white;
    border-radius: 15px;
    padding: 10px;
    width: 48%;
    text-align: center;
}

.round-title {
    font-size: 0.8rem;
    font-weight: bold;
    margin-bottom: 5px;
}

.round-score {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 5px;
}

.round-actions {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.action-icon {
    width: 24px;
    height: 24px;
    background-color: rgba(255,255,255,0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ff5f5f;
    font-size: 0.7rem;
}

.team-badge {
    background-color: #FF8C00;
    color: white;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.7rem;
    font-weight: bold;
}

.bottom-nav-bar {
    display: flex;
    justify-content: space-evenly;
    background-color: rgba(255,255,255,0.1);
    border-radius: 20px;
    padding: 8px;
    margin-top: 10px;
}

.nav-button {
    display: flex;
    flex-direction: column;
    align-items: center;
    color: rgba(255,255,255,0.7);
    font-size: 0.7rem;
    padding: 5px 10px;
    border-radius: 15px;
    transition: all 0.3s ease;
}

.nav-button.active {
    background-color: rgba(255,255,255,0.2);
    color: white;
}

.nav-button i {
    font-size: 1rem;
    margin-bottom: 2px;
}

.quiz-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
}

.quiz-btn-show {
    background: linear-gradient(45deg, #4CAF50, #45a049);
}

.quiz-btn-team1 {
    background: linear-gradient(45deg, #2196F3, #1976D2);
}

.quiz-btn-team2 {
    background: linear-gradient(45deg, #FF9800, #F57C00);
}

.quiz-btn-wrong {
    background: linear-gradient(45deg, #f44336, #d32f2f);
}

.quiz-btn-back {
    background: linear-gradient(45deg, #9E9E9E, #757575);
}

.team-scoring {
    flex-wrap: wrap;
}

.scoring-title {
    width: 100%;
    text-align: center;
    font-size: 0.9rem;
    font-weight: bold;
    margin-bottom: 8px;
    color: white;
}

.team-buttons {
    display: flex;
    gap: 8px;
    justify-content: center;
    flex-wrap: wrap;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .game-play-container {
        padding: 6px;
    }
    
    .game-play-header {
        padding: 6px 12px;
        margin-bottom: 8px;
        min-height: 50px;
    }
    
    .game-title {
        font-size: 1rem;
    }
    
    .turn-indicator-top {
        padding: 3px 10px;
        font-size: 0.65rem;
    }
    
    .question-grid {
        gap: 5px;
        padding: 6px 0;
    }
    
    .category-header {
        padding: 6px;
        font-size: 0.7rem;
        min-height: 45px;
    }
    
    .point-value {
        padding: 10px 6px;
        font-size: 0.8rem;
        min-height: 40px;
    }
    
    .team-info-footer {
        padding: 4px 6px;
    }
    
    .team-score-footer {
        font-size: 0.8rem;
    }
    
    .team-name {
        font-size: 0.55rem;
    }
    
    .lifeline-icon {
        width: 14px;
        height: 14px;
        font-size: 0.45rem;
    }
    
    .header-link {
        font-size: 0.65rem;
    }
    
    .logo-text {
        font-size: 0.9rem;
    }
    
    /* Question Modal Mobile */
    .question-display-container {
        padding: 8px;
    }
    
    .question-text-large {
        font-size: 0.9rem;
    }
    
    .quiz-btn {
        padding: 8px 12px;
        font-size: 0.75rem;
        min-width: 100px;
    }
    
    .question-header {
        padding: 6px 10px;
        min-height: 35px;
    }
    
    .timer-container {
        padding: 3px 10px;
    }
    
    .timer-display {
        font-size: 0.8rem;
    }
    
    .question-content-wrapper {
        padding: 12px;
    }
    
    .question-category-tag {
        font-size: 0.65rem;
        padding: 3px 10px;
    }
    
    .round-card {
        padding: 8px;
    }
    
    .round-title {
        font-size: 0.7rem;
    }
    
    .round-score {
        font-size: 1rem;
    }
    
    .action-icon {
        width: 20px;
        height: 20px;
        font-size: 0.65rem;
    }
    
    .bottom-nav-bar {
        padding: 6px;
    }
    
    .nav-button {
        font-size: 0.65rem;
    }
    
    .question-media-container img {
        max-height: 180px;
    }
}

@media (max-width: 480px) {
    .game-play-container {
        padding: 4px;
    }
    
    .game-play-header {
        padding: 4px 8px;
        margin-bottom: 6px;
        min-height: 45px;
    }
    
    .game-title {
        font-size: 0.9rem;
    }
    
    .turn-indicator-top {
        padding: 2px 8px;
        font-size: 0.6rem;
    }
    
    .question-grid {
        gap: 3px;
        padding: 4px 0;
    }
    
    .category-header {
        font-size: 0.65rem;
        padding: 4px;
        min-height: 35px;
    }
    
    .point-value {
        font-size: 0.7rem;
        padding: 8px 4px;
        min-height: 35px;
    }
    
    .header-link {
        font-size: 0.6rem;
    }
    
    .logo-text {
        font-size: 0.8rem;
    }
    
    .team-name {
        font-size: 0.5rem;
    }
    
    .team-score-footer {
        font-size: 0.7rem;
    }
    
    .lifeline-icon {
        width: 12px;
        height: 12px;
        font-size: 0.4rem;
        gap: 1px;
    }
    
    /* Question Modal Small Mobile */
    .question-display-container {
        padding: 6px;
    }
    
    .question-text-large {
        font-size: 0.85rem;
        padding: 12px;
    }
    
    .lifeline-btn {
        padding: 5px 6px;
        font-size: 0.65rem;
    }
    
    .quiz-btn {
        padding: 6px 10px;
        font-size: 0.7rem;
        min-width: 90px;
    }
    
    .question-header {
        padding: 5px 8px;
        min-height: 30px;
    }
    
    .question-category-badge,
    .question-points {
        padding: 4px 8px;
        font-size: 0.7rem;
    }
    
    .timer-countdown {
        font-size: 1.5rem;
    }
    
    .timer-icon {
        font-size: 1.2rem;
    }
    
    .question-media-container img {
        max-height: 150px;
    }
}

/* iPhone specific optimizations */
@media (max-width: 414px) and (max-height: 896px) {
    .game-play-container {
        padding: 3px;
    }
    
    .game-play-header {
        min-height: 40px;
        padding: 3px 6px;
    }
    
    .question-grid {
        gap: 2px;
        padding: 3px 0;
    }
    
    .category-header {
        min-height: 30px;
        font-size: 0.6rem;
    }
    
    .point-value {
        min-height: 30px;
        font-size: 0.65rem;
        padding: 6px 3px;
    }
    
    .team-info-footer {
        padding: 3px 4px;
    }
    
    .lifeline-icon {
        width: 10px;
        height: 10px;
        font-size: 0.35rem;
    }
    
    /* Question Modal iPhone */
    .question-display-container {
        padding: 5px;
    }
    
    .question-text-large {
        font-size: 0.8rem;
    }
    
    .quiz-btn {
        padding: 5px 8px;
        font-size: 0.65rem;
        min-width: 80px;
    }
    
    .question-controls {
        padding: 8px 0;
        gap: 8px;
    }
    
    /* New design mobile optimizations */
    .timer-container {
        padding: 2px 8px;
    }
    
    .timer-bar-container {
        gap: 8px;
    }
    
    .timer-count {
        font-size: 0.6rem;
        padding: 1px 4px;
    }
    
    .timer-display {
        font-size: 0.7rem;
    }
    
    .timer-pause-btn {
        font-size: 0.8rem;
    }
    
    .question-content-wrapper {
        padding: 10px;
        margin: 5px 0;
    }
    
    .question-category-tag {
        top: -10px;
        font-size: 0.6rem;
        padding: 2px 8px;
    }
    
    .round-card {
        padding: 6px;
    }
    
    .round-title {
        font-size: 0.65rem;
        margin-bottom: 3px;
    }
    
    .round-score {
        font-size: 0.9rem;
        margin-bottom: 3px;
    }
    
    .action-icon {
        width: 18px;
        height: 18px;
        font-size: 0.6rem;
        gap: 5px;
    }
    
    .bottom-nav-bar {
        padding: 5px;
        margin-top: 5px;
    }
    
    .nav-button {
        font-size: 0.6rem;
    }
    
    .nav-button i {
        font-size: 0.9rem;
    }
    
    .team-badge {
        padding: 3px 8px;
        font-size: 0.65rem;
    }
    
    .question-media-container img {
        max-height: 120px;
    }
    
    .team-scoring {
        gap: 5px;
    }
    
    .scoring-title {
        font-size: 0.7rem;
        margin-bottom: 5px;
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
                    <div class="game-title">شباب الدوانية</div>
                    <div class="turn-indicator-top">دور <span id="currentTeamName">الفريق الأول</span></div>
                </div>
                <div class="header-right">
                    <div class="logo-text">صح<br>إلعبها</div>
                </div>
            </div>

            <!-- Game Board -->
            <div class="game-board-container">
                <div class="question-grid" id="questionBoard">
                    <!-- Board will be populated dynamically -->
                </div>
            </div>

            <!-- Footer with Team Info -->
            <div class="game-play-footer">
                <div class="team-info-footer team-1">
                    <div class="team-name" id="team1Name">الفريق الأول</div>
                    <div class="team-score-footer" id="team1Points">1000</div>
                    <div class="lifeline-icons" id="team1Lifelines">
                        <div class="lifeline-icon" id="team1CallFriend" title="اتصل بصديق"><i class="fas fa-phone"></i></div>
                        <div class="lifeline-icon" id="team1TwoAnswers" title="إجابتان فقط"><i class="fas fa-users"></i></div>
                        <div class="lifeline-icon" id="team1DoublePoints" title="ضعف النقاط">x2</div>
                    </div>
                </div>
                <div class="team-info-footer team-2">
                    <div class="team-name" id="team2Name">الفريق الثاني</div>
                    <div class="team-score-footer" id="team2Points">1000</div>
                    <div class="lifeline-icons" id="team2Lifelines">
                        <div class="lifeline-icon" id="team2CallFriend" title="اتصل بصديق"><i class="fas fa-phone"></i></div>
                        <div class="lifeline-icon" id="team2TwoAnswers" title="إجابتان فقط"><i class="fas fa-users"></i></div>
                        <div class="lifeline-icon" id="team2DoublePoints" title="ضعف النقاط">x2</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Question Display Modal (new mobile-friendly design) -->
<div class="question-modal" id="questionModal" style="display: none;">
    <div class="question-display-container">
        <!-- New Header Design -->
        <div class="question-header">
            <div class="header-left">
                <a href="#" class="header-link"><i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="header-center">
                <div class="game-title">سين جيم</div>
            </div>
            <div class="header-right">
                <div class="team-badge" id="currentTeamBadge">
                    <span id="teamNumber">TEAM 1</span>
                </div>
            </div>
        </div>
        
        <!-- Timer Bar -->
        <div class="timer-container">
            <div class="timer-bar-container">
                <div class="timer-controls">
                    <span class="timer-count">200</span>
                    <button class="timer-pause-btn"><i class="fas fa-pause"></i></button>
                </div>
                <div class="timer-progress-bar">
                    <div class="timer-progress-fill" id="questionTimer" style="width: 80%;"></div>
                </div>
                <div class="timer-display">
                    <span id="timerCountdownDisplay">00:05</span>
                </div>
            </div>
        </div>
        
        <!-- Question Content Area -->
        <div class="question-content-wrapper">
            <div class="question-category-tag">
                <span id="questionCategoryTag">5 مستويات</span>
            </div>
            
            <div class="question-text-container">
                <div class="question-text-large" id="questionText">
                    في أي عام تم إنتاج مسلسل درب الزلق؟
                </div>
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
        
        <!-- Game Round Info -->
        <div class="game-round-info">
            <div class="round-card">
                <div class="round-title">الفترة الأولى</div>
                <div class="round-score">5400</div>
                <div class="round-actions">
                    <div class="action-icon"><i class="fas fa-users"></i></div>
                    <div class="action-icon"><i class="far fa-clock"></i></div>
                    <div class="action-icon"><i class="fas fa-phone"></i></div>
                </div>
            </div>
            <div class="round-card">
                <div class="round-title">الفترة الثاني</div>
                <div class="round-score">5400</div>
                <div class="round-actions">
                    <div class="action-icon"><i class="fas fa-users"></i></div>
                    <div class="action-icon"><i class="far fa-clock"></i></div>
                    <div class="action-icon"><i class="fas fa-phone"></i></div>
                </div>
            </div>
        </div>
        
        <!-- Control Buttons (preserving functionality) -->
        <div class="question-controls">
            <div class="primary-controls">
                <button class="quiz-btn quiz-btn-show" id="showAnswerBtn" onclick="showAnswer()">
                    <i class="fas fa-eye"></i>
                    <span>إظهار الإجابة</span>
                </button>
            </div>
            
            <!-- Preserve functionality for team selection -->
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
            
            <!-- Hidden but preserved functionality for lifelines -->
            <div style="display: none;">
                <button id="callFriendBtn" onclick="useCallFriend()"></button>
                <button id="twoAnswersBtn" onclick="useTwoAnswers()"></button>
                <button id="doublePointsBtn" onclick="useDoublePoints()"></button>
                <div id="doublePointsIndicator"></div>
                <div id="lifelinesContainer"></div>
                <div id="callFriendTimer">
                    <div id="timerCountdown"></div>
                    <div id="timerProgress"></div>
                </div>
                <div id="questionCategory"></div>
                <div id="questionPoints"></div>
            </div>
        </div>
        
        <!-- Bottom Navigation Bar -->
        <div class="bottom-nav-bar">
            <div class="nav-button">
                <i class="fas fa-home"></i>
                <span>الرئيسية</span>
            </div>
            <div class="nav-button active">
                <i class="fas fa-play"></i>
                <span>الإجابة</span>
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
