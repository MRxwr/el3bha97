// This script ensures categories are displayed properly
$(document).ready(function() {
    // Make sure categories showcase is visible
    setTimeout(function() {
        if ($('.categories-showcase').children().length === 0) {
            console.log("No categories found in showcase - attempting to reload");
            
            // If there's game data available, try to load categories
            const gameData = localStorage.getItem('seenJeemGame');
            if (gameData) {
                const parsedData = JSON.parse(gameData);
                if (parsedData && parsedData.categories && parsedData.categories.length > 0) {
                    console.log("Found categories in localStorage, displaying them");
                    
                    // Display categories manually if they're not showing up
                    const showcaseContainer = $('.categories-showcase');
                    showcaseContainer.empty();
                    
                    parsedData.categories.forEach(categoryId => {
                        $.ajax({
                            url: 'requests/?a=CategoryById',
                            method: 'GET',
                            data: { id: categoryId },
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 'success' && response.data) {
                                    const categoryInfo = response.data;
                                    const iconClass = SeenJeemGame.categoryIcons[categoryInfo.title] || 'fas fa-question';
                                    const imagePath = categoryInfo.image ? `logos/qas/categories/${categoryInfo.image}` : 'img/logo.png';
                                    
                                    const categoryShowcase = $(`
                                        <div class="category-showcase-item">
                                            <img src="${imagePath}" alt="${categoryInfo.title}" class="category-image" 
                                                onerror="this.onerror=null; this.src='img/logo.png'; $(this).replaceWith('<div class=\'category-icon\'><i class=\'${iconClass}\'></i></div>');">
                                            <div class="category-title">${categoryInfo.title || 'فئة'}</div>
                                        </div>
                                    `);
                                    
                                    showcaseContainer.append(categoryShowcase);
                                }
                            },
                            error: function() {
                                // Create a placeholder if we can't get the category info
                                const categoryShowcase = $(`
                                    <div class="category-showcase-item">
                                        <div class="category-icon"><i class="fas fa-question"></i></div>
                                        <div class="category-title">فئة ${categoryId}</div>
                                    </div>
                                `);
                                
                                showcaseContainer.append(categoryShowcase);
                            }
                        });
                    });
                }
            }
        }
    }, 2000);
});
