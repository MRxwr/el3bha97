<style>
/* Theme 2 - Game design styles */
/* Mobile responsive game design styles */
body, html {
    height: 100vh;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    font-family: 'Cairo', sans-serif;
    /*overflow: hidden;*/
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
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
    padding: 15px;
    background: transparent;
    margin-bottom: 10px;
    flex-shrink: 0;
}

.question-category-badge {
    background: linear-gradient(45deg, #4ECDC4, #44A08D);
    color: white;
    padding: 8px 20px;
    border-radius: 30px;
    font-size: 1rem;
    font-weight: bold;
}

.question-points {
    background: linear-gradient(45deg, #FF6B6B, #ee5a52);
    color: white;
    padding: 8px 20px;
    border-radius: 30px;
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
    gap: 20px;
    flex: 1 1 auto; /* Changed to flex: 1 1 auto to properly expand and shrink */
    min-height: 0;
    align-items: flex-start;
    margin: 0 15px;
}

/* Right Sidebar - Lifelines */
.question-sidebar {
    width: 220px;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-right: 15px;
}

.sidebar-title {
    color: white;
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 5px;
    text-align: right;
}

.lifelines-container {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 100%;
}

.lifeline-btn {
    background: rgba(255, 255, 255, 0.15);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 10px 15px;
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 10px;
    justify-content: flex-start;
    text-align: right;
    width: 100%;
    margin-bottom: 10px;
}

.lifeline-btn:hover:not(:disabled) {
    background: rgba(255, 255, 255, 0.25);
}

.lifeline-btn:disabled {
    background: rgba(128, 128, 128, 0.25);
    color: rgba(255, 255, 255, 0.4);
    cursor: not-allowed;
    opacity: 0.6;
}

.lifeline-btn i {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.9);
}

/* Call Friend Timer */
.call-friend-timer {
    background: rgba(255, 107, 107, 0.7);
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    color: white;
    width: 100%;
}

.timer-icon {
    font-size: 1.5rem;
    margin-bottom: 5px;
    color: white;
}

.timer-text {
    font-size: 0.8rem;
    font-weight: 600;
    margin-bottom: 5px;
}

.timer-countdown {
    font-size: 2.5rem;
    font-weight: 800;
    margin: 5px 0 10px;
}

.timer-bar {
    width: 100%;
    height: 5px;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 3px;
    overflow: hidden;
}

.timer-progress {
    height: 100%;
    background: linear-gradient(90deg, #00f2fe 0%, #4facfe 100%);
    border-radius: 3px;
    transition: width 1s linear;
}

/* Center Content Area */
.question-content-center {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    padding: 0;
    min-height: 0;
    overflow: hidden;
}

.question-text-large {
    background: transparent;
    padding: 20px 25px 30px;
    font-size: 1.6rem;
    font-weight: bold;
    text-align: center;
    line-height: 1.5;
    margin-bottom: 10px;
    width: 100%;
}

.question-media-container {
    width: 100%;
    max-width: 500px;
    margin-bottom: 20px;
    border-radius: 12px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
}

.question-media-container img {
    width: auto;
    max-width: 100%;
    max-height: 350px;
    object-fit: contain;
    border-radius: 12px;
    background: white;
    padding: 0;
}

.content-container {
    width: 100%;
    max-width: 600px;
}

.answer-text-large {
    font-size: 1.6rem;
    font-weight: bold;
    text-align: center;
    line-height: 1.5;
    padding: 20px 25px 30px;
    color: #4CAF50;
    background: linear-gradient(135deg, rgba(76, 175, 80, 0.1) 0%, rgba(76, 175, 80, 0.2) 100%);
    border: 3px solid rgba(76, 175, 80, 0.4);
    border-radius: 15px;
    width: 100%;
    box-shadow: 0 0 20px rgba(76, 175, 80, 0.2);
    animation: fadeIn 0.5s ease-in-out;
    position: relative;
    overflow: hidden;
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
    opacity: 0.2;
}

/* Control Buttons */
.question-controls {
    flex-shrink: 0;
    padding: 15px;
    display: flex;
    flex-direction: row;
    justify-content: left;
    gap: 15px;
    margin-top: auto;
    margin-bottom: 50px;
}

.team-scoring {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    width: 100%;
}

.team-buttons {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
}

.quiz-btn {
    background: linear-gradient(45deg, #4CAF50, #45a049);
    color: white;
    border: none;
    border-radius: 30px;
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
    
    /* Question Modal Mobile */
    .question-display-container {
        padding: 8px;
    }
    
    .question-main-content {
        flex-direction: column;
        gap: 10px;
    }
    
    .question-sidebar {
        width: 100%;
        order: 2;
    }
    
    .question-content-center {
        order: 1;
        padding: 0 5px;
    }
    
    .question-text-large {
        font-size: 0.95rem;
        padding: 15px;
    }
    
    .lifelines-container {
        padding: 10px;
    }
    
    .lifelines-buttons {
        flex-direction: row;
        gap: 5px;
    }
    
    .lifeline-btn {
        padding: 6px 8px;
        font-size: 0.7rem;
        flex: 1;
    }
    
    .quiz-btn {
        padding: 8px 12px;
        font-size: 0.75rem;
        min-width: 100px;
    }
    
    .question-header {
        padding: 6px 10px;
        min-height: 35px;
        flex-direction: row;
        gap: 10px;
    }
    
    .question-category-badge,
    .question-points {
        padding: 5px 10px;
        font-size: 0.75rem;
    }
    
    .question-media-container img {
        max-height: 200px;
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

body, html {
    height: 100vh;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #2C3E50 0%, #4CA1AF 100%);
    font-family: 'Cairo', sans-serif;
    direction: rtl;
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

/* Categories display at the top */
.categories-showcase {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 10px;
    margin-bottom: 10px;
    background: rgba(0, 0, 0, 0.2);
    padding: 6px;
    border-radius: 10px;
}

.category-showcase-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.category-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 5px;
    background: rgba(255, 255, 255, 0.1);
    padding: 5px;
}

.category-title {
    font-size: 0.9rem;
    font-weight: bold;
    color: white;
}

/* Numbered columns */
.numbered-columns {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 5px;
    margin-bottom: 10px;
}

.column-number {
    background: rgba(0, 0, 0, 0.3);
    color: white;
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
    background: linear-gradient(45deg, #3498db, #2980b9);
    color: white;
    border-radius: 8px;
    padding: 5px 5px;
    text-align: center;
    font-weight: bold;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.1);
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
    background: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    padding: 10px 15px;
    display: flex;
    flex-direction: column;
}

.team-panel.team1 {
    background: linear-gradient(45deg, rgba(52, 152, 219, 0.3), rgba(41, 128, 185, 0.3));
}

.team-panel.team2 {
    background: linear-gradient(45deg, rgba(230, 126, 34, 0.3), rgba(211, 84, 0, 0.3));
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
    background: linear-gradient(135deg, #2C3E50 0%, #4CA1AF 100%);
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
    background: linear-gradient(45deg, #3498db, #2980b9);
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
    padding: 20px;
    overflow: auto;
}

.question-text-large {
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    line-height: 1.6;
    margin-bottom: 20px;
}

.question-media-container {
    width: 100%;
    max-width: 500px;
    margin-bottom: 20px;
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
    background: linear-gradient(45deg, #3498db, #2980b9);
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
    
    .ads-placeholder {
        order: 3;
    }
    
    .question-text-large,
    .answer-text-large {
        font-size: 1.2rem;
    }
}

@media (max-width: 576px) {
    .categories-showcase {
        grid-template-columns: repeat(2, 1fr);
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
    .answer-text-large {
