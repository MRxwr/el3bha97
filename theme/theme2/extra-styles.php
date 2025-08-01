<style>
/* Game header fix */
.game-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #ffffff59;
    border-radius: 30px;
    padding: 5px 5px;
    margin-bottom: 3px;
    border: 2px solid black;
}

.game-title {
    font-size: 0.9rem;
    font-weight: bold;
    color: white;
    margin: 0;
}

.turn-indicator {
    font-size: 12px;
    color: #6575e6;
    display: inline-flex;
    margin-top: 5px;
    border: 2px solid black;
    border-radius: 30px;
    background: #ffffff59;
    text-align: initial;
    padding: 5px 10px 5px 10px;
}

.exit-button {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border-radius: 50px;
    padding: 5px 15px;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.exit-button:hover {
    background: rgba(255, 255, 255, 0.2);
    color: white;
}

/* Fix for categories showcase */
.categories-showcase {
    display: grid !important;
    grid-template-columns: repeat(6, 1fr) !important;
    gap: 10px !important;
    padding: 6px !important;
    border-radius: 10px !important;
    overflow: visible !important;
    width: 70%;
    align-self: anchor-center;
}

.question-board-showcase {
    margin-bottom: 10px !important;
    background: rgb(255 255 255 / 35%) !important;
    border-radius: 30px !important;
    overflow: visible !important;
    border: 2px solid black;
}

.category-showcase-item {
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    text-align: center !important;
}

.category-image {
    width: 82px !important;
    height: 38px !important;
    object-fit: cover !important;
    border-radius: 14px !important;
    margin-bottom: 3px !important;
    /*background: rgba(255, 255, 255, 0.1) !important;*/
    padding: 1px !important;
}

.category-title {
    font-size: 9px !important;
    font-weight: bold !important;
    color: white !important;
}

/* Fix for numbered columns */
.numbered-columns {
    display: grid !important;
    grid-template-columns: repeat(12, 1fr) !important;
    gap: 5px !important;
    margin-bottom: 10px !important;
}

/* New Question Layout */
.question-main-container {
    display: grid !important;
    grid-template-columns: 2fr 1fr !important;
    gap: 20px !important;
    margin: 20px !important;
    height: 60vh !important;
}

.question-section {
    position: relative !important;
    background: rgba(255, 255, 255, 0.35) !important;
    border: 2px solid black !important;
    border-radius: 30px !important;
    padding: 40px 20px 20px 20px !important;
    display: flex !important;
    flex-direction: column !important;
    justify-content: center !important;
    align-items: center !important;
}

.question-points {
    position: absolute !important;
    top: -10px !important;
    left: 20px !important;
    background: rgba(100, 117, 230, 0.9) !important;
    color: white !important;
    padding: 8px 15px !important;
    border-radius: 20px !important;
    border: 2px solid black !important;
    font-weight: bold !important;
    font-size: 14px !important;
}

.question-timer {
    position: absolute !important;
    top: -15px !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
    background: rgba(255, 255, 255, 0.9) !important;
    border: 2px solid black !important;
    border-radius: 25px !important;
    padding: 8px 15px !important;
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
}

.timer-display {
    font-weight: bold !important;
    color: #333 !important;
    font-size: 16px !important;
}

.timer-controls {
    display: flex !important;
    gap: 5px !important;
}

.timer-btn {
    background: rgba(100, 117, 230, 0.8) !important;
    color: white !important;
    border: 1px solid #333 !important;
    border-radius: 15px !important;
    padding: 4px 8px !important;
    cursor: pointer !important;
    font-size: 12px !important;
    transition: all 0.3s ease !important;
}

.timer-btn:hover {
    background: rgba(100, 117, 230, 1) !important;
}

.question-category {
    position: absolute !important;
    top: -10px !important;
    right: 20px !important;
    background: rgba(100, 117, 230, 0.9) !important;
    color: white !important;
    padding: 8px 15px !important;
    border-radius: 20px !important;
    border: 2px solid black !important;
    font-weight: bold !important;
    font-size: 14px !important;
}

.question-content {
    text-align: center !important;
    color: #333 !important;
    font-size: 18px !important;
    font-weight: bold !important;
    line-height: 1.4 !important;
    margin: 20px 0 !important;
}

.question-image {
    max-width: 200px !important;
    max-height: 200px !important;
    border-radius: 50% !important;
    border: 3px solid #ffd700 !important;
    margin: 20px 0 !important;
}

.show-answer-btn {
    position: absolute !important;
    bottom: 15px !important;
    left: 20px !important;
    background: rgba(100, 117, 230, 0.9) !important;
    color: white !important;
    padding: 8px 15px !important;
    border-radius: 20px !important;
    border: 2px solid black !important;
    font-weight: bold !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
}

.show-answer-btn:hover {
    background: rgba(100, 117, 230, 1) !important;
}

.teams-section {
    display: flex !important;
    flex-direction: column !important;
    gap: 20px !important;
}

.team-score-card {
    background: rgba(255, 255, 255, 0.35) !important;
    border: 2px solid black !important;
    border-radius: 20px !important;
    padding: 15px !important;
    text-align: center !important;
}

.team-name {
    background: rgba(100, 117, 230, 0.9) !important;
    color: white !important;
    padding: 8px 15px !important;
    border-radius: 15px !important;
    font-weight: bold !important;
    font-size: 14px !important;
    margin-bottom: 10px !important;
}

.team-score {
    font-size: 36px !important;
    font-weight: bold !important;
    color: #ffd700 !important;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5) !important;
}

/* Hide lifelines block */
.lifelines-section {
    display: none !important;
}

/* Team Selection Controls */
.team-selection-controls {
    background: rgba(255, 255, 255, 0.2) !important;
    border-radius: 15px !important;
    padding: 15px !important;
    margin-top: 20px !important;
}

.team-scoring-title {
    color: white !important;
    font-weight: bold !important;
    text-align: center !important;
    margin-bottom: 10px !important;
    font-size: 14px !important;
}

.team-buttons {
    display: flex !important;
    flex-direction: column !important;
    gap: 8px !important;
}

.quiz-btn {
    border: 2px solid black !important;
    border-radius: 15px !important;
    padding: 8px 12px !important;
    font-weight: bold !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
    display: flex !important;
    align-items: center !important;
    gap: 8px !important;
    font-size: 12px !important;
}

.quiz-btn-team1 {
    background: rgba(40, 167, 69, 0.8) !important;
    color: white !important;
}

.quiz-btn-team1:hover {
    background: rgba(40, 167, 69, 1) !important;
}

.quiz-btn-team2 {
    background: rgba(0, 123, 255, 0.8) !important;
    color: white !important;
}

.quiz-btn-team2:hover {
    background: rgba(0, 123, 255, 1) !important;
}

.quiz-btn-wrong {
    background: rgba(220, 53, 69, 0.8) !important;
    color: white !important;
}

.quiz-btn-wrong:hover {
    background: rgba(220, 53, 69, 1) !important;
}

.quiz-btn-back {
    background: rgba(100, 117, 230, 0.8) !important;
    color: white !important;
    width: 100% !important;
    justify-content: center !important;
    margin-top: 15px !important;
}

.quiz-btn-back:hover {
    background: rgba(100, 117, 230, 1) !important;
}

/* Double Points Indicator */
.double-points-indicator {
    position: absolute !important;
    top: 50px !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
    background: rgba(255, 193, 7, 0.9) !important;
    color: #333 !important;
    padding: 8px 15px !important;
    border-radius: 20px !important;
    border: 2px solid black !important;
    font-weight: bold !important;
    font-size: 14px !important;
    z-index: 10 !important;
}

/* Call Friend Timer Repositioning */
.call-friend-timer {
    position: fixed !important;
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) !important;
    background: rgba(0, 0, 0, 0.9) !important;
    color: white !important;
    padding: 20px !important;
    border-radius: 20px !important;
    border: 2px solid #ffd700 !important;
    text-align: center !important;
    z-index: 1000 !important;
}

/* Fix for game footer */
.game-footer {
    display: grid !important;
    grid-template-columns: 1fr 1fr 1fr !important;
    gap: 10px !important;
}

.ads-placeholder {
    background: rgba(0, 0, 0, 0.1) !important;
    border-radius: 10px !important;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    padding: 10px !important;
    font-size: 0.8rem !important;
    color: rgba(255, 255, 255, 0.6) !important;
    border: 1px dashed rgba(255, 255, 255, 0.2) !important;
    height: 100% !important;
}

/* Responsive fixes */
@media (max-width: 768px) {
    .categories-showcase {
        grid-template-columns: repeat(3, 1fr) !important;
    }
    
    .game-footer {
        grid-template-columns: 1fr 1fr 1fr !important;
    }
    
    .question-main-container {
        grid-template-columns: 1fr !important;
        gap: 15px !important;
        height: auto !important;
    }
    
    .question-section {
        min-height: 300px !important;
    }
    
    .question-content {
        font-size: 16px !important;
    }
    
    .team-score {
        font-size: 28px !important;
    }
}

@media (max-width: 576px) {
    .categories-showcase {
        grid-template-columns: repeat(2, 1fr) !important;
    }
    
    .game-footer {
        grid-template-columns: 1fr !important;
    }
    
    .team-panel {
        margin-bottom: 10px !important;
    }
    
    .question-main-container {
        margin: 10px !important;
        gap: 10px !important;
    }
    
    .question-section {
        padding: 30px 15px 15px 15px !important;
    }
    
    .question-points,
    .question-category {
        font-size: 12px !important;
        padding: 6px 12px !important;
    }
    
    .question-timer {
        padding: 6px 12px !important;
    }
    
    .timer-display {
        font-size: 14px !important;
    }
    
    .teams-section {
        gap: 10px !important;
    }
    
    .team-score {
        font-size: 24px !important;
    }
}
</style>
