<style>
    /* Base Styles */
    body {
        font-family: 'Cairo', sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        direction: rtl;
        overflow-x: hidden;
        /* Mobile optimizations */
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -webkit-tap-highlight-color: transparent;
        touch-action: manipulation;
    }
    
    /* Common Container Styles */
    .game-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        margin: 20px auto;
        max-width: 1200px;
    }
    
    /* Header Styles */
    .header-section {
        background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
        color: white;
        padding: 30px;
        border-radius: 20px 20px 0 0;
        text-align: center;
    }
    
    .game-header {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 15px 0;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        box-shadow: 0 2px 20px rgba(0,0,0,0.1);
    }
    
    /* Section Title Styles */
    .section-title {
        color: #333;
        font-weight: 700;
        margin-bottom: 30px;
        position: relative;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        right: 50%;
        transform: translateX(50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
        border-radius: 2px;
    }
    
    /* Card Styles */
    .category-card {
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 15px;
        padding: 20px;
        margin: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        position: relative;
        overflow: hidden;
        /* Mobile touch optimization */
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -webkit-tap-highlight-color: transparent;
        touch-action: manipulation;
        min-height: 140px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        border-color: #4ECDC4;
    }
    
    .category-card.selected {
        background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
        color: white;
        border-color: #FF6B6B;
    }
    
    .question-card {
        background: white;
        border-radius: 20px;
        padding: 40px;
        margin: 20px auto;
        max-width: 800px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        text-align: center;
        min-height: 500px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    /* Category and Question Styles */
    .category-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
        display: block;
    }
    
    .category-title {
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 10px;
    }
    
    .category-count {
        font-size: 0.9rem;
        opacity: 0.8;
    }
    
    .category-badge {
        background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
        color: white;
        padding: 8px 20px;
        border-radius: 25px;
        font-size: 0.9rem;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 20px;
    }
    
    .question-text {
        font-size: 1.8rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 30px;
        line-height: 1.6;
    }
    
    .question-media {
        margin: 20px 0;
        text-align: center;
    }
    
    .question-media img {
        max-width: 100%;
        max-height: 300px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    
    .question-media video,
    .question-media audio {
        max-width: 100%;
        border-radius: 15px;
    }
    
    .answer-section {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 30px;
        margin-top: 30px;
        display: none;
    }
    
    .answer-text {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2d3436;
        margin-bottom: 20px;
    }
    
    /* Team Styles */
    .team-section {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 25px;
        margin: 15px 0;
    }
    
    .team-header {
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        text-align: center;
    }
    
    .team-score {
        background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
        color: white;
        padding: 15px 25px;
        border-radius: 15px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .team-score.active {
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(255, 107, 107, 0.4);
    }
    
    .team-score h5 {
        margin: 0;
        font-weight: 700;
    }
    
    .score-number {
        font-size: 2rem;
        font-weight: 700;
        margin-top: 5px;
    }
    
    /* Button Styles */
    .control-btn {
        padding: 15px 30px;
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        min-width: 150px;
        /* Mobile touch optimization */
        cursor: pointer;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -webkit-tap-highlight-color: transparent;
        touch-action: manipulation;
    }
    
    .btn-show-answer {
        background: linear-gradient(45deg, #74b9ff, #0984e3);
        color: white;
    }
    
    .btn-correct {
        background: linear-gradient(45deg, #00b894, #00cec9);
        color: white;
    }
    
    .btn-wrong {
        background: linear-gradient(45deg, #fd79a8, #e84393);
        color: white;
    }
    
    .btn-next {
        background: linear-gradient(45deg, #fdcb6e, #e17055);
        color: white;
    }
    
    .start-game-btn {
        background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
        border: none;
        color: white;
        padding: 15px 50px;
        border-radius: 50px;
        font-size: 1.2rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
    }
    
    .start-game-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(255, 107, 107, 0.4);
        color: white;
    }
    
    .start-game-btn:disabled {
        background: #6c757d;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }
    
    .control-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    
    .control-btn:disabled {
        background: #6c757d !important;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }
    
    /* Counter Styles */
    .player-counter {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        margin: 20px 0;
    }
    
    .counter-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }
    
    .counter-btn.minus {
        background: #ff4757;
        color: white;
    }
    
    .counter-btn.plus {
        background: #2ed573;
        color: white;
    }
    
    .counter-btn:hover {
        transform: scale(1.1);
    }
    
    .counter-display {
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        color: #333;
    }
    
    .selection-counter {
        position: fixed;
        top: 20px;
        left: 20px;
        background: rgba(255, 255, 255, 0.95);
        padding: 15px 25px;
        border-radius: 50px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        z-index: 1000;
    }
    
    .question-counter {
        background: rgba(255, 255, 255, 0.2);
        padding: 8px 20px;
        border-radius: 25px;
        color: white;
        display: inline-block;
        margin-bottom: 10px;
    }
    
    /* Progress Bar */
    .progress-bar {
        height: 8px;
        border-radius: 4px;
        background: #e9ecef;
        margin: 10px 0;
        overflow: hidden;
    }
    
    .progress-fill {
        height: 100%;
        background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
        transition: width 0.3s ease;
        border-radius: 4px;
    }
    
    /* Game Info */
    .game-info {
        text-align: center;
        padding: 10px;
    }
    
    .main-content {
        margin-top: 120px;
        padding: 20px;
    }
    
    .game-controls {
        margin-top: 30px;
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    /* Game End Styles */
    .game-end {
        text-align: center;
        padding: 50px;
        display: none;
    }
    
    .winner-announcement {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 30px;
        background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .final-scores {
        display: flex;
        justify-content: center;
        gap: 30px;
        margin: 40px 0;
        flex-wrap: wrap;
    }
    
    .final-score-card {
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        min-width: 200px;
    }
    
    /* Confetti Animation */
    .confetti {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 9999;
    }
    
    @keyframes fall {
        0% { transform: translateY(-100vh) rotate(0deg); }
        100% { transform: translateY(100vh) rotate(360deg); }
    }
    
    .confetti-piece {
        position: absolute;
        width: 10px;
        height: 10px;
        background: #FF6B6B;
        animation: fall linear infinite;
    }
    
    /* Fade In Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate__animated {
        animation-duration: 0.6s;
        animation-fill-mode: both;
    }
    
    .animate__fadeInUp {
        animation-name: fadeInUp;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        body {
            overflow-x: hidden;
        }
        
        /* Container adjustments */
        .game-container {
            margin: 5px;
            border-radius: 15px;
            max-width: 100%;
        }
        
        /* Header adjustments */
        .header-section {
            padding: 15px;
            border-radius: 15px 15px 0 0;
        }
        
        .header-section h1 {
            font-size: 1.8rem;
        }
        
        .header-section p {
            font-size: 0.9rem;
        }
        
        /* Game header for gameplay page */
        .game-header {
            padding: 10px 0;
        }
        
        .game-header .container {
            padding: 0 10px;
        }
        
        .game-header .row {
            margin: 0;
        }
        
        .game-header .col-md-4 {
            padding: 5px;
        }
        
        /* Team score adjustments */
        .team-score {
            padding: 10px 15px;
            margin: 5px;
        }
        
        .team-score h5 {
            font-size: 0.9rem;
            margin-bottom: 5px;
        }
        
        .score-number {
            font-size: 1.5rem;
        }
        
        /* Category cards for home page */
        .category-card {
            margin: 5px;
            padding: 15px;
            min-height: 120px;
        }
        
        .category-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .category-title {
            font-size: 0.9rem;
        }
        
        .category-count {
            font-size: 0.8rem;
        }
        
        /* Selection counter */
        .selection-counter {
            top: 10px;
            left: 10px;
            padding: 8px 12px;
            font-size: 0.9rem;
        }
        
        /* Progress bar */
        .progress-section {
            margin: 15px 0;
        }
        
        /* Team setup section */
        .team-section {
            padding: 15px;
            margin: 10px 0;
        }
        
        .team-header {
            padding: 10px 15px;
            font-size: 1rem;
        }
        
        .form-control {
            font-size: 0.9rem;
            padding: 8px 12px;
        }
        
        .player-counter {
            gap: 10px;
            margin: 15px 0;
        }
        
        .counter-btn {
            width: 35px;
            height: 35px;
            font-size: 1rem;
        }
        
        .player-count {
            font-size: 1.2rem;
            min-width: 30px;
        }
        
        /* Buttons */
        .start-game-btn {
            padding: 12px 30px;
            font-size: 1rem;
            width: 100%;
            margin-top: 15px;
        }
        
        .control-btn {
            min-width: 120px;
            padding: 12px 20px;
            font-size: 0.9rem;
            margin: 5px;
        }
        
        /* Game controls layout */
        .game-controls {
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
        
        .team-selection {
            padding: 15px;
            margin: 15px 0;
        }
        
        .team-selection p {
            font-size: 1rem;
        }
        
        /* Main content adjustments */
        .main-content {
            padding: 0 5px;
        }
        
        .main-content .container {
            padding: 0 10px;
        }
    }

    /* Question Board Styles */
    .turn-indicator {
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        padding: 20px;
        border-radius: 15px;
        text-align: center;
        margin-bottom: 30px;
        margin-top: 100px;
    }

    .turn-text {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .turn-instruction {
        font-size: 1rem;
        opacity: 0.9;
    }

    .question-board {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
        gap: 20px;
        padding: 15px;
        background: linear-gradient(135deg, #ff6b6b 0%, #ff8e53 100%);
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
        height: calc(100vh - 180px);
        min-height: 480px;
        max-height: 580px;
        width: 100%;
        margin: 0 auto;
        position: relative;
    }

    .category-column {
        display: none; /* Hide the old column structure */
    }

    .category-header {
        background: linear-gradient(135deg, #2d3436 0%, #636e72 100%);
        color: white;
        border: 3px solid rgba(255, 255, 255, 0.9);
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: default;
        position: relative;
        overflow: hidden;
    }

    .category-image {
        width: 50px;
        height: 50px;
        border-radius: 8px;
        object-fit: cover;
        margin-bottom: 6px;
        border: 2px solid rgba(255, 255, 255, 0.8);
    }

    .category-title {
        font-size: 0.85rem;
        font-weight: 600;
        color: white;
        text-shadow: 0 1px 3px rgba(0,0,0,0.5);
        line-height: 1.1;
    }

    .question-cell {
        background: rgba(255, 255, 255, 0.95);
        border: 3px solid rgba(214, 48, 49, 0.4);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        font-weight: 700;
        color: #d63031;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        user-select: none;
        -webkit-user-select: none;
        -webkit-tap-highlight-color: transparent;
    }

    .question-cell:hover {
        transform: scale(1.05);
        background: rgba(255, 255, 255, 1);
        border-color: #d63031;
        box-shadow: 0 6px 20px rgba(214, 48, 49, 0.4);
    }

    .question-cell.answered {
        background: rgba(180, 180, 180, 0.8);
        color: #666;
        cursor: not-allowed;
        border-color: rgba(150, 150, 150, 0.5);
    }

    .question-cell.answered:hover {
        transform: none;
        box-shadow: none;
    }

    .question-cell:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(116, 185, 255, 0.4);
    }

    .question-cell.answered {
        background: #6c757d;
        cursor: not-allowed;
        pointer-events: none;
    }

    .question-cell.answered:hover {
        transform: none;
        box-shadow: none;
    }

    /* Small question cells around category */
    .question-cell.question-small {
        font-size: 1.2rem;
        font-weight: 600;
        min-height: 50px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .question-cell.question-small:hover {
        transform: scale(1.1);
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        border-color: rgba(255, 255, 255, 0.8);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    .question-cell.question-small.answered {
        background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);
        color: #bdc3c7;
        cursor: not-allowed;
        border-color: rgba(255, 255, 255, 0.2);
    }

    .question-cell.question-small.answered:hover {
        transform: none;
        box-shadow: none;
    }

    /* Category cell that spans multiple rows */
    .category-spanning {
        grid-row: span 3;
    }

    /* Category Collection Layout */
    .category-collection {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 8px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
        gap: 4px;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .category-row {
        display: contents;
    }

    .category-spacer {
        background: transparent;
        border: none;
        height: 100%;
    }

    .category-spacer-tall {
        background: transparent;
        border: none;
        height: 100%;
        grid-row: span 2;
    }

    /* Category that spans multiple rows */
    .category-tall {
        grid-row: span 3;
        grid-column: 2;
    }

    /* Position category in center spanning all 3 rows */
    .category-mini.category-tall {
        grid-row: 1 / 4;
        grid-column: 2;
    }

    /* Mini question cells */
    .question-cell.question-mini {
        font-size: 0.9rem;
        font-weight: 600;
        min-height: 35px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 8px;
        padding: 4px;
    }

    .question-cell.question-mini:hover {
        transform: scale(1.05);
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        border-color: rgba(255, 255, 255, 0.8);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .question-cell.question-mini.answered {
        background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);
        color: #bdc3c7;
        cursor: not-allowed;
        border-color: rgba(255, 255, 255, 0.2);
    }

    .question-cell.question-mini.answered:hover {
        transform: none;
        box-shadow: none;
    }

    /* Mini category cells */
    .category-cell.category-mini {
        background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
        border: 2px solid rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-weight: 600;
        font-size: 0.7rem;
        cursor: default;
        position: relative;
        overflow: hidden;
        min-height: 45px;
        padding: 4px;
    }

    .category-image-small {
        width: 25px;
        height: 25px;
        border-radius: 6px;
        object-fit: cover;
        margin-bottom: 2px;
        border: 1px solid rgba(255, 255, 255, 0.8);
    }

    .category-title-small {
        font-size: 0.65rem;
        font-weight: 600;
        color: white;
        text-shadow: 0 1px 2px rgba(0,0,0,0.5);
        line-height: 1;
        text-align: center;
    }

    .team-selection {
        margin: 20px 0;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 15px;
    }

    .team-selection p {
        font-size: 1.2rem;
        font-weight: 600;
        color: #333;
    }

    .btn-team1 {
        background: linear-gradient(45deg, #00b894, #00cec9);
        color: white;
        margin: 10px;
    }

    .btn-team2 {
        background: linear-gradient(45deg, #74b9ff, #0984e3);
        color: white;
        margin: 10px;
    }

    /* Responsive Design for Board */
    @media (max-width: 768px) {
        /* Turn indicator mobile */
        .turn-indicator {
            margin-top: 80px;
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 10px;
        }

        .turn-text {
            font-size: 1.1rem;
        }

        .turn-instruction {
            font-size: 0.9rem;
        }

        /* Question board mobile */
        .question-board {
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
            margin-bottom: 20px;
        }

        .category-column {
            gap: 8px;
        }

        .category-header {
            font-size: 0.7rem;
            padding: 8px 5px;
            min-height: 50px;
            line-height: 1.2;
        }

        .question-cell {
            font-size: 1rem;
            padding: 12px 5px;
            min-height: 50px;
        }
    }

    /* Extra small screens */
    @media (max-width: 480px) {
        /* Very small screens adjustments */
        .game-header {
            padding: 8px 0;
        }

        .team-score {
            padding: 8px 10px;
        }

        .team-score h5 {
            font-size: 0.8rem;
        }

        .score-number {
            font-size: 1.3rem;
        }

        .turn-indicator {
            margin-top: 70px;
            padding: 10px;
        }

        .turn-text {
            font-size: 1rem;
        }

        .question-board {
            grid-template-columns: 1fr;
            gap: 6px;
        }

        .category-header {
            font-size: 0.8rem;
            padding: 10px;
            min-height: 40px;
        }

        .question-cell {
            font-size: 1.1rem;
            padding: 15px;
            min-height: 45px;
        }

        .category-card {
            padding: 12px;
            min-height: 100px;
        }

        .category-icon {
            font-size: 1.5rem;
        }

        .category-title {
            font-size: 0.85rem;
        }
    }

    /* Important Note: The styles for the question modal, lifelines, and related components
       have been moved to bladeGamePlay.php to avoid duplication and conflicts.
       Please make all future styling changes to these elements directly in bladeGamePlay.php. */
</style>
