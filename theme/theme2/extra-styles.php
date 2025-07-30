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
    color: #eed6ff;
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
    grid-template-columns: repeat(6, 1fr) !important;
    gap: 10px !important;
    margin-bottom: 10px !important;
    background: rgba(0, 0, 0, 0.2) !important;
    padding: 6px !important;
    border-radius: 10px !important;
    overflow: visible !important;
}

.category-showcase-item {
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    text-align: center !important;
}

.category-image {
    width: 50px !important;
    height: 50px !important;
    object-fit: cover !important;
    border-radius: 10px !important;
    margin-bottom: 5px !important;
    background: rgba(255, 255, 255, 0.1) !important;
    padding: 5px !important;
}

.category-title {
    font-size: 0.9rem !important;
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
    }
    
    .game-footer {
        grid-template-columns: 1fr 1fr 1fr !important;
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
}
</style>
