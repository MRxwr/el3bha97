<style>
/* Game header fix */
.game-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    padding: 10px 15px;
    margin-bottom: 3px;
}

.game-title {
    font-size: 0.9rem;
    font-weight: bold;
    color: white;
    margin: 0;
}

.turn-indicator {
    font-size: 0.5rem;
    color: #92fe9d;
    display: block;
    margin-top: 5px;
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
    grid-template-columns: repeat(3, 1fr) !important; /* Show exactly 3 in a row */
    gap: 10px !important;
    margin-bottom: 10px !important;
    background: rgba(0, 0, 0, 0.2) !important;
    padding: 10px !important;
    border-radius: 10px !important;
    min-height: 94px !important; 
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2) !important;
}

.category-showcase-item {
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    text-align: center !important;
    background: rgba(255, 255, 255, 0.05) !important;
    border-radius: 8px !important;
    padding: 10px 5px !important;
    transition: transform 0.3s ease !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
}

.category-image {
    width: 40px !important;
    height: 40px !important;
    object-fit: contain !important; /* Changed to contain to prevent distortion */
    border-radius: 8px !important;
    margin-bottom: 8px !important;
    background: rgba(255, 255, 255, 0.1) !important;
    padding: 5px !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) !important;
    border: 2px solid rgba(255, 255, 255, 0.3) !important;
}

.category-icon {
    width: 40px !important;
    height: 40px !important;
    border-radius: 8px !important;
    margin-bottom: 8px !important;
    background: rgba(255, 255, 255, 0.1) !important;
    padding: 5px !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) !important;
    border: 2px solid rgba(255, 255, 255, 0.3) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 1.2rem !important;
    color: white !important;
}

.category-title {
    font-size: 0.7rem !important;
    font-weight: bold !important;
    color: white !important;
    background: rgba(0, 0, 0, 0.2) !important;
    border-radius: 5px !important;
    padding: 3px 5px !important;
    width: 100% !important;
    margin: 0 auto !important;
    white-space: nowrap !important;
    overflow: hidden !important;
    text-overflow: ellipsis !important;
    box-sizing: border-box !important;
    max-width: 100% !important;
}

/* Numbered columns styling */
.numbered-columns {
    display: grid !important;
    grid-template-columns: repeat(12, 1fr) !important;
    gap: 5px !important;
    margin-bottom: 10px !important;
    background: rgba(0, 0, 0, 0.2) !important;
    padding: 5px !important;
    border-radius: 10px !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
}

.column-number {
    background: rgba(255, 255, 255, 0.1) !important;
    color: white !important;
    border-radius: 5px !important;
    padding: 5px !important;
    text-align: center !important;
    font-weight: bold !important;
    font-size: 0.9rem !important;
}

/* Question board styling */
.question-board {
    display: grid !important;
    grid-template-columns: repeat(12, 1fr) !important;
    gap: 5px !important;
    margin-bottom: 10px !important;
}

.question-column {
    display: flex !important;
    flex-direction: column !important;
    gap: 5px !important;
}

.question-cell {
    background: linear-gradient(45deg, #FF6B6B, #ee5a52) !important;
    color: white !important;
    border-radius: 5px !important;
    padding: 10px 5px !important;
    text-align: center !important;
    font-weight: bold !important;
    font-size: 0.9rem !important;
    min-height: 25px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    transition: all 0.2s ease !important;
    border: 1px solid rgba(255,255,255,0.2) !important;
}

.question-cell:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2) !important;
}

.question-cell.answered {
    background: rgba(0, 0, 0, 0.3) !important;
    color: rgba(255,255,255,0.5) !important;
    cursor: not-allowed !important;
    transform: none !important;
    box-shadow: none !important;
}

/* Game footer styling */
.game-footer {
    display: flex !important;
    justify-content: space-between !important;
    gap: 10px !important;
    margin-top: 10px !important;
}

.team-panel {
    background: rgba(255, 255, 255, 0.1) !important;
    border-radius: 10px !important;
    padding: 10px !important;
    width: 30% !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
}

.team-panel.active {
    background: rgba(255, 255, 255, 0.2) !important;
    border: 1px solid rgba(255, 255, 255, 0.3) !important;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.1) !important;
}

.team-header-row {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    margin-bottom: 5px !important;
}

.team-name-display {
    font-size: 0.9rem !important;
    font-weight: bold !important;
    color: white !important;
}

.team-score {
    font-size: 1.2rem !important;
    font-weight: bold !important;
    color: #FFD700 !important; /* Gold color */
}

.team-lifelines {
    display: flex !important;
    gap: 10px !important;
}

.lifeline-icon {
    width: 25px !important;
    height: 25px !important;
    background-color: rgba(255, 255, 255, 0.8) !important;
    color: #667eea !important;
    border-radius: 50% !important;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    font-size: 0.7rem !important;
    transition: all 0.3s ease !important;
    font-weight: bold !important;
}

.lifeline-icon.used {
    background-color: rgba(128, 128, 128, 0.5) !important;
    color: rgba(255, 255, 255, 0.4) !important;
    opacity: 0.5 !important;
}

.ads-placeholder {
    background: rgba(255, 255, 255, 0.1) !important;
    border-radius: 10px !important;
    padding: 10px !important;
    width: 40% !important;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    color: rgba(255, 255, 255, 0.7) !important;
    font-style: italic !important;
    border: 1px dashed rgba(255, 255, 255, 0.3) !important;
}

/* Responsive styles */
@media (max-width: 768px) {
    .categories-showcase {
        grid-template-columns: repeat(3, 1fr) !important;
        padding: 8px !important;
        gap: 8px !important;
    }
    
    .category-image, .category-icon {
        width: 30px !important;
        height: 30px !important;
        margin-bottom: 5px !important;
    }
    
    .category-title {
        font-size: 0.6rem !important;
        padding: 2px 4px !important;
    }
    
    .numbered-columns {
        gap: 3px !important;
        padding: 3px !important;
    }
    
    .column-number {
        font-size: 0.7rem !important;
        padding: 3px !important;
    }
    
    .question-board {
        gap: 3px !important;
    }
    
    .question-column {
        gap: 3px !important;
    }
    
    .question-cell {
        font-size: 0.7rem !important;
        padding: 5px 3px !important;
        min-height: 20px !important;
    }
    
    .team-panel {
        padding: 6px !important;
    }
    
    .team-name-display {
        font-size: 0.7rem !important;
    }
    
    .team-score {
        font-size: 0.9rem !important;
    }
    
    .lifeline-icon {
        width: 20px !important;
        height: 20px !important;
        font-size: 0.6rem !important;
    }
    
    .ads-placeholder {
        padding: 6px !important;
        font-size: 0.7rem !important;
    }
}

@media (max-width: 480px) {
    .categories-showcase {
        grid-template-columns: repeat(3, 1fr) !important;
        padding: 5px !important;
        gap: 5px !important;
    }
    
    .category-image, .category-icon {
        width: 25px !important;
        height: 25px !important;
        margin-bottom: 3px !important;
    }
    
    .category-title {
        font-size: 0.5rem !important;
        padding: 2px 3px !important;
    }
    
    .numbered-columns {
        gap: 2px !important;
        padding: 2px !important;
    }
    
    .column-number {
        font-size: 0.6rem !important;
        padding: 2px !important;
    }
    
    .question-cell {
        font-size: 0.6rem !important;
        padding: 4px 2px !important;
        min-height: 18px !important;
    }
    
    .team-panel {
        padding: 4px !important;
    }
    
    .team-name-display {
        font-size: 0.6rem !important;
    }
    
    .team-score {
        font-size: 0.8rem !important;
    }
    
    .lifeline-icon {
        width: 16px !important;
        height: 16px !important;
        font-size: 0.5rem !important;
        gap: 5px !important;
    }
    
    .ads-placeholder {
        padding: 4px !important;
        font-size: 0.6rem !important;
    }
}

/* Fix for numbered columns */
.numbered-columns {
    display: grid !important;
    grid-template-columns: repeat(12, 1fr) !important;
    gap: 5px !important;
    margin-bottom: 10px !important;
}

/* Fix for game footer */
.game-footer {
    display: grid !important;
    grid-template-columns: 1fr 1fr 1fr !important;
    gap: 10px !important;
    margin-top: auto !important;
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
        padding: 10px !important;
        gap: 8px !important;
    }
    
    .category-image, .category-icon {
        width: 45px !important;
        height: 45px !important;
        margin-bottom: 8px !important;
    }
    
    .category-title {
        font-size: 0.8rem !important;
        padding: 4px 6px !important;
    }
    
    .game-footer {
        grid-template-columns: 1fr 1fr 1fr !important;
    }
}

@media (max-width: 576px) {
    .categories-showcase {
        grid-template-columns: repeat(3, 1fr) !important;
        padding: 8px !important;
        gap: 5px !important;
    }
    
    .category-showcase-item {
        padding: 6px 3px !important;
    }
    
    .category-image, .category-icon {
        width: 35px !important;
        height: 35px !important;
        margin-bottom: 5px !important;
        padding: 3px !important;
    }
    
    .category-icon {
        font-size: 1.2rem !important;
    }
    
    .category-title {
        font-size: 0.7rem !important;
        padding: 3px 5px !important;
    }
    
    .game-footer {
        grid-template-columns: 1fr !important;
    }
    
    .team-panel {
        margin-bottom: 10px !important;
    }
}

/* Extra small devices */
@media (max-width: 400px) {
    .categories-showcase {
        grid-template-columns: repeat(3, 1fr) !important;
        padding: 5px !important;
        gap: 3px !important;
    }
    
    .category-showcase-item {
        padding: 4px 2px !important;
    }
    
    .category-image, .category-icon {
        width: 30px !important;
        height: 30px !important;
        margin-bottom: 3px !important;
        padding: 2px !important;
        border-width: 1px !important;
    }
    
    .category-icon {
        font-size: 1rem !important;
    }
    
    .category-title {
        font-size: 0.6rem !important;
        padding: 2px 3px !important;
    }
}
</style>
