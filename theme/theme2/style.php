<style>
/* Theme 2 - Game design styles */
/* Mobile responsive game design styles */
body, html {
    height: 100vh;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #8d569d 0%, #471b53 100%);
    font-family: 'Cairo', sans-serif;
    direction: rtl;
}

/* Game Play Styles from bladeGamePlay.php */
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
    font-size: 0.9rem;
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
    background: linear-gradient(135deg, #8d569d 0%, #471b53 100%);
    display: flex;
    z-index: 1000;
    direction: rtl;
}

.question-display-container {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    padding: 20px;
    box-sizing: border-box;
    color: white;
    overflow: hidden;
}

/* Question Header */
.question-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 25px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    margin-bottom: 20px;
    flex-shrink: 0;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.question-category-badge {
    background: linear-gradient(360deg, #431e4e, #6f3d7d);
    color: #1a1a1a;
    padding: 12px 24px;
    border-radius: 25px;
    font-size: 1.1rem;
    font-weight: bold;
    box-shadow: 0 4px 15px rgba(128, 83, 141, 1);
}

.question-points {
    background: linear-gradient(45deg, #ff6b6b, #ee5a52);
    color: white;
    padding: 12px 24px;
    border-radius: 25px;
    font-size: 1.1rem;
    font-weight: bold;
    box-shadow: 0 4px 15px rgb(127 81 139);
}

.double-points-indicator {
    background: linear-gradient(45deg, #ffd700, #ffb347);
    color: #1a1a1a;
    padding: 10px 20px;
    border-radius: 20px;
    font-size: 1rem;
    font-weight: bold;
    animation: pulse 2s infinite;
    box-shadow: 0 4px 15px rgba(255, 215, 0, 0.4);
}

/* Main Content Area - Bootstrap Grid Style - ALWAYS ROW */
.question-main-content {
    display: flex;
    flex-direction: row !important;
    gap: 15px;
    flex: 1 1 auto;
    min-height: 0;
    align-items: stretch;
    margin: 0;
    height: 100%;
}

/* Right Sidebar - Lifelines (25% width like col-3) */
.question-sidebar {
    width: 25%;
    min-width: 200px;
    max-width: 280px;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    gap: 15px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 15px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    height: fit-content;
    order: 2;
}

.sidebar-title {
    color: white;
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 15px;
    text-align: center;
    padding-bottom: 10px;
    border-bottom: 2px solid rgba(255, 255, 255, 0.3);
}

.lifelines-container {
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 100%;
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
    gap: 8px;
}

.lifeline-btn {
    background: linear-gradient(45deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.25));
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 12px;
    padding: 10px 12px;
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    justify-content: flex-start;
    text-align: right;
    width: 100%;
    backdrop-filter: blur(5px);
}

.lifeline-btn:hover:not(:disabled) {
    background: linear-gradient(45deg, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.35));
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
}

.lifeline-btn:disabled {
    background: linear-gradient(45deg, rgba(128, 128, 128, 0.15), rgba(128, 128, 128, 0.25));
    color: rgba(255, 255, 255, 0.4);
    cursor: not-allowed;
    opacity: 0.5;
    border-color: rgba(128, 128, 128, 0.3);
}

.lifeline-btn i {
    font-size: 1rem;
    color: #eaa3ff;
    min-width: 16px;
}

/* Call Friend Timer */
.call-friend-timer {
    background: linear-gradient(45deg, #ff6b6b, #ee5a52);
    border-radius: 12px;
    padding: 12px;
    text-align: center;
    color: white;
    width: 100%;
    box-shadow: 0 5px 20px rgba(255, 107, 107, 0.3);
    border: 2px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
}

.timer-icon {
    font-size: 1.5rem;
    margin-bottom: 8px;
    color: white;
}

.timer-text {
    font-size: 0.8rem;
    font-weight: 600;
    margin-bottom: 8px;
}

.timer-countdown {
    font-size: 2rem;
    font-weight: 800;
    margin: 8px 0 10px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.timer-bar {
    width: 100%;
    height: 8px;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 4px;
    overflow: hidden;
}

.timer-progress {
    height: 100%;
    background: linear-gradient(90deg, #00f2fe 0%, #4facfe 100%);
    border-radius: 4px;
    transition: width 1s linear;
}

/* Center Content Area (75% width like col-9) */
.question-content-center {
    flex: 1;
    width: 75%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    padding: 5px;
    min-height: 0;
    overflow-y: auto;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 12px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    order: 1;
}

.question-text-large {
    background: transparent;
    padding: 20px 15px;
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
    line-height: 1.5;
    margin-bottom: 10px;
    width: 100%;
    color: white;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
}

.question-media-container {
    width: 100%;
    max-width: 150px;
    margin-bottom: 10px;
    border-radius: 12px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

.question-media-container img {
    width: auto;
    max-width: 100%;
    max-height: 300px;
    object-fit: contain;
    border-radius: 12px;
    background: white;
    padding: 8px;
}

.content-container {
    width: 100%;
    max-width: 700px;
    padding: 5px;
    justify-items: center;
}

.answer-text-large {
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    line-height: 1.5;
    padding: 20px 15px;
    color: #4CAF50;
    background: linear-gradient(135deg, rgba(76, 175, 80, 0.15) 0%, rgba(76, 175, 80, 0.25) 100%);
    border: 3px solid rgba(76, 175, 80, 0.5);
    border-radius: 15px;
    width: 100%;
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.3);
    animation: fadeIn 0.5s ease-in-out;
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(10px);
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
}

.answer-text-large::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="%234CAF50" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>');
    background-repeat: no-repeat;
    background-position: 95% 90%;
    background-size: 40px;
    opacity: 0.3;
}

/* Control Buttons */
.question-controls {
    flex-shrink: 0;
    padding: 15px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 15px;
    margin-top: auto;
    width: 100%;
}

.controls-row {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
}

.team-scoring-title {
    width: 100%;
    text-align: center;
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 12px;
    color: white;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
}

.team-buttons {
    display: flex;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
}

.quiz-btn {
    background: linear-gradient(45deg, #4CAF50, #45a049);
    color: white;
    border: none;
    border-radius: 20px;
    padding: 12px 20px;
    font-size: 0.9rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    min-width: 120px;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
}

.quiz-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

.quiz-btn-show {
    background: linear-gradient(360deg, #421d4b, #703e7f);
    box-shadow: 0 5px 15px rgba(126, 81, 138, 1);
}

.quiz-btn-team1 {
    background: linear-gradient(45deg, #2196F3, #1976D2);
    box-shadow: 0 5px 15px rgba(33, 150, 243, 0.4);
}

.quiz-btn-team2 {
    background: linear-gradient(45deg, #FF9800, #F57C00);
    box-shadow: 0 5px 15px rgba(255, 152, 0, 0.4);
}

.quiz-btn-wrong {
    background: linear-gradient(45deg, #f44336, #d32f2f);
    box-shadow: 0 5px 15px rgba(244, 67, 54, 0.4);
}

.quiz-btn-back {
    background: linear-gradient(45deg, #9E9E9E, #757575);
    box-shadow: 0 5px 15px rgba(158, 158, 158, 0.4);
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

/* Desktop specific rules for question modal */
@media (min-width: 769px) {
    .question-main-content {
        flex-direction: row !important;
        align-items: stretch !important;
        justify-content: space-between;
        gap: 20px; 
    }
    
    .question-sidebar {
        width: 25% !important;
        order: 2 !important;
        min-width: 200px;
        max-width: 280px;
        flex-shrink: 0;
        padding: 15px;
        gap: 15px;
    }
    
    .question-content-center {
        width: 75% !important;
        order: 1 !important;
        flex: 1;
        margin-right: 0;
        padding: 5px;
    }
    
    .question-text-large {
        font-size: 1rem;
        padding: 20px 15px;
    }
    
    .answer-text-large {
        font-size: 1.5rem;
        padding: 20px 15px;
    }
    
    .lifelines-title {
        font-size: 0.9rem;
    }
    
    .lifeline-btn {
        padding: 10px 12px;
        font-size: 0.8rem;
    }
    
    .quiz-btn {
        padding: 12px 20px;
        font-size: 0.9rem;
        min-width: 120px;
    }
}

/* Mobile Responsive for bladeGamePlay */
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
        font-size: 0.9rem;
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
    
    /* Question Modal Mobile - ALWAYS ROW LAYOUT */
    .question-display-container {
        padding: 10px;
    }
    
    .question-main-content {
        flex-direction: row !important;
        gap: 10px;
        align-items: stretch;
    }
    
    .question-sidebar {
        width: 30% !important;
        min-width: 150px !important;
        max-width: 200px !important;
        order: 2 !important;
        padding: 10px;
        gap: 8px;
    }
    
    .question-content-center {
        width: 70% !important;
        order: 1 !important;
        padding: 5px;
    }
    
    .question-text-large {
        font-size: 1rem;
        padding: 15px 10px;
    }
    
    .lifelines-title {
        font-size: 0.8rem;
        margin-bottom: 6px;
    }
    
    .lifeline-btn {
        padding: 8px 10px;
        font-size: 0.7rem;
        gap: 6px;
    }
    
    .lifeline-btn i {
        font-size: 0.8rem;
        min-width: 12px;
    }
    
    .quiz-btn {
        padding: 10px 15px;
        font-size: 0.8rem;
        min-width: 100px;
    }
    
    .question-header {
        padding: 10px 15px;
        margin-bottom: 10px;
    }
    
    .question-category-badge,
    .question-points {
        padding: 6px 12px;
        font-size: 0.8rem;
    }
    
    .question-media-container img {
        max-height: 200px;
    }
    
    .answer-text-large {
        font-size: 1.2rem;
        padding: 15px 10px;
    }
    
    .call-friend-timer {
        padding: 8px;
    }
    
    .timer-countdown {
        font-size: 1.5rem;
        margin: 6px 0 8px;
    }
    
    .timer-icon {
        font-size: 1.2rem;
        margin-bottom: 6px;
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
    
    /* Question Modal Small Mobile - ALWAYS ROW LAYOUT */
    .question-display-container {
        padding: 8px;
    }
    
    .question-main-content {
        gap: 8px;
    }
    
    .question-sidebar {
        width: 35% !important;
        min-width: 120px !important;
        max-width: 160px !important;
        padding: 8px;
        gap: 6px;
    }
    
    .question-content-center {
        width: 65% !important;
        padding: 5px;
    }
    
    .question-text-large {
        font-size: 1rem;
        padding: 12px 8px;
    }
    
    .lifelines-title {
        font-size: 0.7rem;
        margin-bottom: 4px;
    }
    
    .lifeline-btn {
        padding: 6px 8px;
        font-size: 0.65rem;
        gap: 4px;
    }
    
    .lifeline-btn i {
        font-size: 0.7rem;
        min-width: 10px;
    }
    
    .quiz-btn {
        padding: 8px 12px;
        font-size: 0.75rem;
        min-width: 90px;
        gap: 6px;
    }
    
    .question-header {
        padding: 8px 12px;
        margin-bottom: 8px;
    }
    
    .question-category-badge,
    .question-points {
        padding: 5px 10px;
        font-size: 0.75rem;
    }
    
    .timer-countdown {
        font-size: 1.3rem;
        margin: 4px 0 6px;
    }
    
    .timer-icon {
        font-size: 1rem;
        margin-bottom: 4px;
    }
    
    .question-media-container img {
        max-height: 150px;
    }
    
    .answer-text-large {
        font-size: 1rem;
        padding: 12px 8px;
    }
    
    .call-friend-timer {
        padding: 6px;
    }
    
    .question-controls {
        padding: 10px;
        gap: 10px;
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
    
    /* Question Modal iPhone - ALWAYS ROW LAYOUT */
    .question-display-container {
        padding: 6px;
    }
    
    .question-main-content {
        gap: 6px;
    }
    
    .question-sidebar {
        width: 40% !important;
        min-width: 100px !important;
        max-width: 140px !important;
        padding: 6px;
        gap: 4px;
    }
    
    .question-content-center {
        width: 60% !important;
        padding: 5px;
    }
    
    .question-text-large {
        font-size: 0.9rem;
        padding: 10px 6px;
    }
    
    .answer-text-large {
        font-size: 0.9rem;
        padding: 10px 6px;
    }
    
    .lifelines-title {
        font-size: 0.65rem;
        margin-bottom: 3px;
    }
    
    .lifeline-btn {
        padding: 5px 6px;
        font-size: 0.6rem;
        gap: 3px;
    }
    
    .lifeline-btn i {
        font-size: 0.65rem;
        min-width: 8px;
    }
    
    .quiz-btn {
        padding: 6px 10px;
        font-size: 0.7rem;
        min-width: 75px;
        gap: 4px;
    }
    
    .question-category-badge,
    .question-points {
        padding: 4px 8px;
        font-size: 0.7rem;
    }
    
    .call-friend-timer {
        padding: 5px;
    }
    
    .timer-countdown {
        font-size: 1.1rem;
        margin: 3px 0 4px;
    }
    
    .timer-icon {
        font-size: 0.9rem;
        margin-bottom: 3px;
    }
    
    .question-controls {
        padding: 8px;
        gap: 8px;
    }
    
    .question-media-container img {
        max-height: 120px;
    }
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
        padding: 10px;
    }
    
    .lifeline-btn {
        padding: 4px 5px;
        font-size: 0.6rem;
    }
    
    .quiz-btn {
        padding: 10px 10px;
        font-size: 0.65rem;
        min-width: 80px;
    }
    
    .question-controls {
        padding: 8px 0;
        gap: 8px;
    }
    
    .timer-countdown {
        font-size: 1.3rem;
    }
    
    .timer-icon {
        font-size: 1rem;
    }
    
    .lifelines-container {
        padding: 6px;
    }
    
    .call-friend-timer {
        padding: 10px;
    }
    
    .question-media-container img {
        max-height: 120px;
    }

/* Landscape mode optimization for small screens */
@media (orientation: landscape) and (max-width: 896px) {
    .game-play-container {
        padding: 2px;
    }
    
    .game-play-header {
        min-height: 30px;
        padding: 2px 5px;
        margin-bottom: 3px;
    }
    
    .game-title {
        font-size: 0.9rem;
    }
    
    .turn-indicator-top {
        font-size: 0.5rem;
        padding: 1px 5px;
    }
    
    .header-link {
        font-size: 0.5rem;
    }
    
    .logo-text {
        font-size: 0.65rem;
    }
    
    .question-grid {
        gap: 2px;
    }
    
    .category-header {
        min-height: 20px;
        font-size: 0.5rem;
        padding: 2px 3px;
    }
    
    .point-value {
        min-height: 20px;
        font-size: 0.5rem;
        padding: 3px 2px;
    }
    
    .team-info-footer {
        padding: 2px 3px;
    }
    
    .team-name {
        font-size: 0.45rem;
        min-width: 40px;
    }
    
    .team-score-footer {
        font-size: 0.6rem;
    }
    
    .lifeline-icon {
        width: 9px;
        height: 9px;
        font-size: 0.35rem;
    }
    
    /* Question Modal in Landscape */
    .question-display-container {
        padding: 5px;
    }
    
    .question-header {
        padding: 5px 8px;
        margin-bottom: 5px;
    }
    
    .question-category-badge,
    .question-points {
        padding: 4px 10px;
        font-size: 0.7rem;
        border-radius: 15px;
    }
    
    .question-main-content {
        margin: 0 5px;
        gap: 8px;
    }
    
    .question-content-center {
        flex: 1;
    }
    
    .question-text-large {
        font-size: 0.9rem;
        padding: 8px 10px 10px;
        margin-bottom: 3px;
    }
    
    .question-media-container {
        margin-bottom: 5px;
    }
    
    .question-media-container img {
        max-height: 150px;
    }
    
    .question-sidebar {
        width: 160px;
        margin-right: 5px;
        gap: 8px;
    }
    
    .sidebar-title {
        font-size: 0.7rem;
        margin-bottom: 2px;
    }
    
    .lifelines-container {
        gap: 6px;
    }
    
    .lifeline-btn {
        padding: 6px 8px;
        font-size: 0.65rem;
        gap: 5px;
        border-radius: 8px;
    }
    
    .lifeline-btn i {
        font-size: 0.7rem;
    }
    
    .call-friend-timer {
        padding: 8px;
    }
    
    .timer-icon {
        font-size: 1rem;
        margin-bottom: 2px;
    }
    
    .timer-text {
        font-size: 0.65rem;
        margin-bottom: 2px;
    }
    
    .timer-countdown {
        font-size: 1.5rem;
        margin: 2px 0 3px;
    }
    
    .timer-bar {
        height: 3px;
    }
    
    .question-controls {
        padding: 5px;
    }
    
    .quiz-btn {
        padding: 6px 10px;
        font-size: 0.65rem;
        min-width: 90px;
        border-radius: 15px;
    }
    
    .team-buttons {
        gap: 8px;
    }
    
    .scoring-title {
        font-size: 0.7rem;
        margin-bottom: 5px;
    }
    
    .answer-text-large {
        font-size: 0.8rem;
    }
}

/* Extra optimization for very short height in landscape mode */
@media (orientation: landscape) and (max-height: 450px) {
    .question-text-large, .answer-text-large {
        font-size: 0.8rem;
        padding: 5px 8px 8px;
        margin-bottom: 2px;
    }
    
    .question-media-container img {
        max-height: 120px;
    }
    
    .question-sidebar {
        width: 140px;
    }
    
    .lifeline-btn {
        padding: 4px 6px;
        font-size: 0.6rem;
    }
    
    .call-friend-timer {
        padding: 5px;
    }
    
    .timer-countdown {
        font-size: 1.2rem;
        margin: 1px 0 2px;
    }
    
    .question-controls {
        padding: 3px;
    }
    
    .quiz-btn {
        padding: 4px 8px;
        font-size: 0.6rem;
        min-width: 80px;
    }
    
    .team-buttons {
        gap: 5px;
    }
}

/* Home page styles */
.container-fluid {
    padding: 15px;
}

.selection-counter {
    background-color: rgba(255, 255, 255, 0.1);
    padding: 10px 15px;
    border-radius: 10px;
    margin-bottom: 15px;
    color: white;
}

.progress-bar {
    background-color: rgba(255, 255, 255, 0.2);
    height: 8px;
    border-radius: 4px;
    margin-top: 8px;
    overflow: hidden;
}

.progress-fill {
    background: linear-gradient(45deg, #00c9ff, #92fe9d);
    height: 100%;
    border-radius: 4px;
    transition: width 0.3s ease;
}

.game-container {
    background-color: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    padding: 0;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    color: white;
    overflow: hidden;
}

.header-section {
    background-color: rgba(0, 0, 0, 0.2);
    padding: 25px 20px;
    text-align: center;
}

.section-title {
    color: #fff;
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    position: relative;
    display: inline-block;
}

.section-title:after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: linear-gradient(45deg, #00c9ff, #92fe9d);
    border-radius: 3px;
}

.team-section {
    background-color: rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 15px;
}

.team-header {
    background-color: rgba(255, 255, 255, 0.1);
    padding: 10px 15px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.player-counter {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: 10px;
}

.counter-btn {
    background: rgba(255, 255, 255, 0.1);
    border: none;
    width: 36px;
    height: 36px;
    border-radius: 18px;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
}

.counter-btn:hover {
    background: rgba(255, 255, 255, 0.2);
}

.counter-btn.plus {
    background: linear-gradient(45deg, #00c9ff, #92fe9d);
}

.counter-btn.minus {
    background: linear-gradient(45deg, #ff9966, #ff5e62);
}

.counter-display {
    font-size: 1.2rem;
    font-weight: bold;
    min-width: 40px;
    text-align: center;
}

.start-game-btn {
    background: linear-gradient(45deg, #00c9ff, #92fe9d);
    border: none;
    color: #2C3E50;
    padding: 12px 40px;
    border-radius: 30px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 20px;
}

.start-game-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.start-game-btn:disabled {
    background: rgba(255, 255, 255, 0.1);
    color: rgba(255, 255, 255, 0.5);
    transform: none;
    box-shadow: none;
    cursor: not-allowed;
}

/* Game Play Styles */
.game-play-container {
    display: flex;
    flex-direction: column;
    height: 100vh;
    width: 100%;
    color: white;
    padding: 15px;
    box-sizing: border-box;
}

/* Categories display at the top - Bootstrap Row/Col-2 Layout */
.categories-showcase {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 15px;
    background: rgba(0, 0, 0, 0.2);
    padding: 15px;
    border-radius: 12px;
    justify-content: space-between;
}

.category-showcase-item {
    flex: 0 0 calc(16.666% - 8px); /* Equivalent to col-2 (1/6 of width) */
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    /*background: rgba(255, 255, 255, 0.1);*/
    border-radius: 10px;
    /*padding: 10px;*/
    transition: all 0.3s ease;
    /*border: 1px solid rgba(255, 255, 255, 0.2);*/
    backdrop-filter: blur(5px);
}

.category-showcase-item:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.category-image {
    width: 100px;
    height: 50px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 8px;
    /*background: rgba(255, 255, 255, 0.2);*/
    padding: 1px;
    border: 2px solid rgba(0, 0, 0, 0);
}

.category-title {
    font-size: 0.8rem;
    font-weight: bold;
    color: white;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    line-height: 1.2;
}

/* Numbered columns */
.numbered-columns {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 5px;
    margin-bottom: 10px;
}

.column-number {
    background: rgba(255, 255, 255, 1);
    color: black;
    text-align: center;
    font-weight: bold;
    font-size: 13px;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid black;
}

/* Question board */
.question-board {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 5px;
    margin-bottom: 20px;
    flex-grow: 1;
}

.question-column {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.question-cell {
    background: linear-gradient(360deg, #71257c, #8e2f9c);
    color: white;
    border-radius: 8px;
    padding: 5px 5px;
    text-align: center;
    font-weight: bold;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 2px solid rgba(0, 0, 0, 1);
    display: flex;
    align-items: center;
    justify-content: center;
}

.question-cell:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.question-cell.answered {
    background: rgba(0, 0, 0, 0.3);
    color: rgba(255, 255, 255, 0.4);
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

/* Teams and ads footer */
.game-footer {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 10px;
    margin-top: auto;
}

.team-panel {
    background: linear-gradient(360deg, #71257c, #8e2f9c);
    border-radius: 10px;
    padding: 10px 15px;
    display: flex;
    flex-direction: column;
    border: 2px solid rgba(0, 0, 0, 1);
}

.team-panel.team1 {
    background: linear-gradient(360deg, #71257c, #8e2f9c);
}

.team-panel.team2 {
    background: linear-gradient(360deg, #71257c, #8e2f9c);
}

.team-header-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
}

.team-name-display {
    font-weight: bold;
    font-size: 1rem;
}

.team-score {
    font-size: 1.2rem;
    font-weight: bold;
    color: #f1c40f;
}

.team-lifelines {
    display: flex;
    gap: 8px;
}

.lifeline-icon {
    width: 24px;
    height: 24px;
    background-color: rgba(255, 255, 255, 0.2);
    color: white;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 0.7rem;
    transition: all 0.2s ease;
}

.lifeline-icon.used {
    background-color: rgba(128, 128, 128, 0.2);
    color: rgba(255, 255, 255, 0.3);
    opacity: 0.6;
}

.ads-placeholder {
    background: rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.6);
    border: 1px dashed rgba(255, 255, 255, 0.2);
}

/* Question Modal */
.question-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: linear-gradient(135deg, #8d569d 0%, #471b53 100%);
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
}

.question-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 15px;
    background: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    margin-bottom: 15px;
}

.question-category-badge {
    background: linear-gradient(360deg, #431e4e, #6f3d7d);
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: bold;
}

.question-points {
    background: linear-gradient(45deg, #e67e22, #d35400);
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: bold;
}

.question-main-content {
    display: flex;
    gap: 20px;
    flex: 1;
    min-height: 0;
}

.question-sidebar {
    width: 250px;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.lifelines-container {
    background: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    padding: 15px;
}

.lifelines-title {
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: white;
}

.lifeline-btn {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: none;
    border-radius: 8px;
    padding: 10px 15px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 10px;
    width: 100%;
    margin-bottom: 10px;
    text-align: right;
}

.lifeline-btn:hover:not(:disabled) {
    background: rgba(255, 255, 255, 0.2);
}

.lifeline-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.call-friend-timer {
    background: rgba(231, 76, 60, 0.3);
    border-radius: 10px;
    padding: 15px;
    text-align: center;
}

.timer-countdown {
    font-size: 2.5rem;
    font-weight: 800;
    margin: 10px 0;
}

.timer-bar {
    width: 100%;
    height: 6px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 3px;
    overflow: hidden;
}

.timer-progress {
    height: 100%;
    background: linear-gradient(90deg, #00c9ff, #92fe9d);
    border-radius: 3px;
    transition: width 1s linear;
}

.question-content-center {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    background: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    padding: 5px;
    overflow: auto;
}

.question-text-large {
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
    line-height: 1.6;
    margin-bottom: 10px;
}

.question-media-container {
    width: 100%;
    max-width: 150px;
    margin-bottom: 10px;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    justify-content: center;
}

.question-media-container img {
    max-width: 100%;
    max-height: 300px;
    border-radius: 10px;
}

.answer-text-large {
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    line-height: 1.6;
    padding: 20px;
    color: #2ecc71;
    background: rgba(46, 204, 113, 0.1);
    border: 2px solid rgba(46, 204, 113, 0.3);
    border-radius: 10px;
    width: 100%;
    box-sizing: border-box;
}

.question-controls {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 100%;
}

.controls-row {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.quiz-btn {
    background: linear-gradient(45deg, #3498db, #2980b9);
    color: white;
    border: none;
    border-radius: 25px;
    padding: 10px 20px;
    font-size: 0.9rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    min-width: 120px;
    justify-content: center;
}

.quiz-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.quiz-btn-show {
    background: linear-gradient(360deg, #421d4b, #703e7f);
}

.quiz-btn-team1 {
    background: linear-gradient(45deg, #3498db, #2980b9);
}

.quiz-btn-team2 {
    background: linear-gradient(45deg, #e67e22, #d35400);
}

.quiz-btn-wrong {
    background: linear-gradient(45deg, #e74c3c, #c0392b);
}

.quiz-btn-back {
    background: linear-gradient(45deg, #7f8c8d, #576574);
}

.team-scoring-title {
    font-size: 1rem;
    text-align: center;
    margin-bottom: 10px;
}

/* Game End Screen */
.game-end {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: linear-gradient(135deg, #2C3E50 0%, #4CA1AF 100%);
    display: none;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 2000;
    padding: 20px;
    box-sizing: border-box;
    color: white;
    text-align: center;
}

.winner-announcement {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 30px;
    animation: pulse 2s infinite;
}

.final-scores {
    display: flex;
    gap: 30px;
    margin-bottom: 40px;
}

.final-score-card {
    background: rgba(0, 0, 0, 0.2);
    padding: 20px 30px;
    border-radius: 15px;
    text-align: center;
    min-width: 150px;
}

.score-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #f1c40f;
    margin: 10px 0;
}

/* Confetti animation */
.confetti {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 9999;
}

.confetti-piece {
    position: absolute;
    width: 10px;
    height: 30px;
    background: #d13447;
    top: -10px;
    opacity: 0;
    animation: confetti-fall 3s linear infinite;
}

@keyframes confetti-fall {
    0% {
        opacity: 1;
        top: -10px;
        transform: translateX(0) rotateX(0) rotateY(0);
    }
    100% {
        opacity: 0;
        top: 100%;
        transform: translateX(100px) rotateX(360deg) rotateY(180deg);
    }
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

/* Responsive Styles */
@media (max-width: 1200px) {
    .categories-showcase {
        grid-template-columns: repeat(6, 1fr);
    }
    
    .numbered-columns,
    .question-board {
        grid-template-columns: repeat(12, 1fr);
        font-size: 0.9em;
    }
}

@media (max-width: 992px) {
    .categories-showcase {
        grid-template-columns: repeat(3, 1fr);
        gap: 8px;
    }
    
    .numbered-columns,
    .question-board {
        grid-template-columns: repeat(12, 1fr);
        font-size: 0.8em;
    }
    
    .question-main-content {
        flex-direction: column;
    }
    
    .question-sidebar {
        width: 100%;
        flex-direction: row;
        flex-wrap: wrap;
    }
    
    .lifelines-container,
    .call-friend-timer {
        flex: 1;
        min-width: 200px;
    }
}

@media (max-width: 768px) {
    .category-showcase-item {
        flex: 0 0 calc(33.333% - 8px);
    }
    
    .numbered-columns,
    .question-board {
        grid-template-columns: repeat(12, 1fr);
        font-size: 0.7em;
        gap: 3px;
    }
    
    .question-cell {
        padding: 5px 2px;
        font-size: 0.85rem;
    }
    
    .game-footer {
        grid-template-columns: 1fr;
    }
    
    .ads-placeholder {
        order: 3;
    }
    
    .question-text-large,
    .answer-text-large {
        font-size: 1rem;
    }
}

@media (max-width: 576px) {
    .category-showcase-item {
        flex: 0 0 calc(50% - 8px);
    }
    
    .numbered-columns,
    .question-board {
        grid-template-columns: repeat(12, 1fr);
        font-size: 0.6em;
        gap: 2px;
    }
    
    .question-cell {
        padding: 5px 1px;
        font-size: 0.8rem;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        font-size: 0.8rem;
    }
    
    .question-sidebar {
        flex-direction: column;
    }
    
    .question-text-large,
    .answer-text-large {
        font-size: 1rem;
    }
}

/* Media query for screen sizes between 576px and 450px */
@media (max-width: 450px) {
    .categories-showcase {
        grid-template-columns: repeat(1, 1fr);
    }
    
    .numbered-columns,
    .question-board {
        grid-template-columns: repeat(12, 1fr);
        font-size: 0.5em;
        gap: 1px;
    }
    
    .question-cell {
        padding: 5px 1px;
        font-size: 0.7rem;
        border-radius: 4px;
        box-shadow: none;
        border-width: 0.5px;
    }
    
    .numbered-column {
        font-size: 0.6rem;
        padding: 2px;
    }
}

/* Make sure very small devices still see everything important */
@media (max-width: 400px) {
    .categories-showcase {
        grid-template-columns: repeat(1, 1fr);
    }
    
    .numbered-columns,
    .question-board {
        grid-template-columns: repeat(12, 1fr);
        font-size: 0.45em;
        gap: 0.5px;
    }
    
    .question-cell {
        padding: 5px 0px;
        font-size: 0.65rem;
        border-radius: 3px;
    }
    
    .game-header h1 {
        font-size: 0.9rem;
    }
}
</style>