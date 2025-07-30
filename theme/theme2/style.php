<style>
/* Theme 2 - Game design styles */
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
    margin-bottom: 15px;
    background: rgba(0, 0, 0, 0.2);
    padding: 15px;
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
    
    .lifelines-container,
    .call-friend-timer {
        flex: 1;
        min-width: 200px;
    }
}

@media (max-width: 768px) {
    .categories-showcase {
        grid-template-columns: repeat(3, 1fr);
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
