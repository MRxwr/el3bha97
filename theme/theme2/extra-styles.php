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
    grid-template-columns: repeat(6, 1fr) !important;
    gap: 10px !important;
    margin-bottom: 10px !important;
    background: rgba(0, 0, 0, 0.2) !important;
    padding: 6px !important;
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
    width: 50px !important;
    height: 50px !important;
    object-fit: cover !important;
    border-radius: 10px !important;
    margin-bottom: 10px !important;
    background: rgba(255, 255, 255, 0.1) !important;
    padding: 5px !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) !important;
    border: 2px solid rgba(255, 255, 255, 0.3) !important;
}

.category-icon {
    width: 50px !important;
    height: 50px !important;
    border-radius: 10px !important;
    margin-bottom: 10px !important;
    background: rgba(255, 255, 255, 0.1) !important;
    padding: 5px !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) !important;
    border: 2px solid rgba(255, 255, 255, 0.3) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 1.5rem !important;
    color: white !important;
}

.category-title {
    font-size: 0.9rem !important;
    font-weight: bold !important;
    color: white !important;
    background: rgba(0, 0, 0, 0.2) !important;
    border-radius: 5px !important;
    padding: 5px 8px !important;
    width: 100% !important;
    margin: 0 auto !important;
    white-space: nowrap !important;
    overflow: hidden !important;
    text-overflow: ellipsis !important;
    box-sizing: border-box !important;
}
.categories-showcase {
    display: grid !important;
    grid-template-columns: repeat(6, 1fr) !important;
    gap: 10px !important;
    margin-bottom: 15px !important;
    background: rgba(0, 0, 0, 0.2) !important;
    padding: 15px !important;
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
