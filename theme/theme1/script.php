<script>
    
    // Global Variables
    let selectedCategories = [];
    let categories = [];
    let gameData = {};
    let questions = [];
    let currentQuestionIndex = 0;
    let currentTeam = 1;
    let team1Score = 0;
    let team2Score = 0;
    let team1Players = 1;
    let team2Players = 1;
    let answerShown = false;

    // Category icons mapping
    const categoryIcons = {
        'رياضة': 'fas fa-futbol',
        'تاريخ': 'fas fa-landmark',
        'جغرافيا': 'fas fa-globe',
        'علوم': 'fas fa-flask',
        'فنون': 'fas fa-palette',
        'أدب': 'fas fa-book',
        'تكنولوجيا': 'fas fa-microchip',
        'طبيعة': 'fas fa-leaf',
        'مشاهير': 'fas fa-star',
        'عام': 'fas fa-lightbulb',
        'دين': 'fas fa-mosque',
        'طعام': 'fas fa-utensils'
    };

    // Common API Functions
    function loadCategories(callback) {
        console.log('Loading categories...');
        
        $.ajax({
            url: 'requests/?a=Categories',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Categories loaded:', response);
                
                if (response.status === 'success') {
                    categories = response.data;
                    if (callback) callback(true);
                } else {
                    console.error('API Error:', response.message);
                    alert('خطأ في تحميل الفئات: ' + response.message);
                    categories = getFallbackCategories();
                    if (callback) callback(false);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', {xhr, status, error});
                console.log('Response Text:', xhr.responseText);
                alert('خطأ في تحميل الفئات. سيتم استخدام البيانات التجريبية.');
                
                categories = getFallbackCategories();
                if (callback) callback(false);
            }
        });
    }

    function loadQuestions(selectedCategories, callback) {
        if (!selectedCategories || selectedCategories.length === 0) {
            alert('لم يتم اختيار فئات للعبة.');
            return;
        }

        $.ajax({
            url: 'requests/?a=Questions',
            method: 'POST',
            data: JSON.stringify({
                categories: selectedCategories
            }),
            contentType: 'application/json',
            dataType: 'json',
            success: function(response) {
                console.log('Questions API response:', response);
                console.log('Debug info:', response.debug_info);
                console.log('Received categories:', response.received_categories);
                console.log('Questions count:', response.count);
                
                if (response.status === 'success') {
                    questions = response.data;
                    
                    if (questions.length === 0) {
                        console.error('No questions found. Debug info:', response.debug_info);
                        alert('لا توجد أسئلة كافية للفئات المختارة.\nDebug: ' + (response.debug_info ? response.debug_info.join('\n') : 'No debug info'));
                        return;
                    }
                    
                    if (callback) callback(true);
                } else {
                    console.error('API Error:', response.message);
                    alert('خطأ في تحميل الأسئلة: ' + response.message);
                    if (callback) callback(false);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error loading questions:', {xhr, status, error});
                console.log('Response Text:', xhr.responseText);
                alert('خطأ في تحميل الأسئلة. تحقق من الاتصال بالخادم.');
                if (callback) callback(false);
            }
        });
    }

    function getFallbackCategories() {
        return [
            {id: 1, title: 'رياضة', image: 'sport.png', questionCount: 15},
            {id: 2, title: 'تاريخ', image: 'history.png', questionCount: 20},
            {id: 3, title: 'جغرافيا', image: 'geography.png', questionCount: 18},
            {id: 4, title: 'علوم', image: 'science.png', questionCount: 22},
            {id: 5, title: 'فنون', image: 'arts.png', questionCount: 12},
            {id: 6, title: 'أدب', image: 'literature.png', questionCount: 16},
            {id: 7, title: 'تكنولوجيا', image: 'tech.png', questionCount: 25},
            {id: 8, title: 'طبيعة', image: 'nature.png', questionCount: 14},
            {id: 9, title: 'مشاهير', image: 'celebrities.png', questionCount: 19},
            {id: 10, title: 'عام', image: 'general.png', questionCount: 30},
            {id: 11, title: 'دين', image: 'religion.png', questionCount: 17},
            {id: 12, title: 'طعام', image: 'food.png', questionCount: 13}
        ];
    }

    // Game Data Management
    function saveGameData(data) {
        localStorage.setItem('seenJeemGame', JSON.stringify(data));
    }

    function loadGameData() {
        const storedData = localStorage.getItem('seenJeemGame');
        if (storedData) {
            return JSON.parse(storedData);
        }
        return null;
    }

    function clearGameData() {
        localStorage.removeItem('seenJeemGame');
    }

    // Animation Functions
    function showConfetti() {
        const confetti = $('#confetti');
        const colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEAA7', '#DDA0DD'];
        
        for (let i = 0; i < 50; i++) {
            setTimeout(() => {
                const piece = $('<div class="confetti-piece"></div>');
                piece.css({
                    left: Math.random() * 100 + '%',
                    backgroundColor: colors[Math.floor(Math.random() * colors.length)],
                    animationDuration: (Math.random() * 3 + 2) + 's',
                    animationDelay: Math.random() * 2 + 's'
                });
                confetti.append(piece);
                
                setTimeout(() => piece.remove(), 5000);
            }, i * 100);
        }
    }

    function addFadeInAnimation() {
        $('.category-card').each(function(index) {
            $(this).css('animation-delay', (index * 0.1) + 's');
            $(this).addClass('animate__animated animate__fadeInUp');
        });
    }

    // Utility Functions
    function validateArabicInput(input) {
        const arabicRegex = /^[\u0600-\u06FF\u0750-\u077F\u08A0-\u08FF\uFB50-\uFDFF\uFE70-\uFEFF\s]+$/;
        return arabicRegex.test(input) || input.trim() === '';
    }

    function formatScore(score) {
        return score.toLocaleString('ar-SA');
    }

    function getRandomColor() {
        const colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEAA7', '#DDA0DD', '#74b9ff', '#fd79a8'];
        return colors[Math.floor(Math.random() * colors.length)];
    }

    // Navigation Functions
    function goToHome() {
        window.location.href = '?v=Home';
    }

    function goToGamePlay() {
        window.location.href = '?v=GamePlay';
    }

    function newGame() {
        clearGameData();
        goToHome();
    }

    // Error Handling
    function handleAjaxError(xhr, status, error, context = '') {
        console.error(`AJAX Error ${context}:`, {xhr, status, error});
        console.log('Response Text:', xhr.responseText);
        
        let errorMessage = 'حدث خطأ في الاتصال بالخادم.';
        
        if (xhr.status === 404) {
            errorMessage = 'الملف المطلوب غير موجود.';
        } else if (xhr.status === 500) {
            errorMessage = 'خطأ في الخادم الداخلي.';
        } else if (xhr.status === 0) {
            errorMessage = 'لا يوجد اتصال بالإنترنت.';
        }
        
        alert(errorMessage + (context ? ` (${context})` : ''));
    }

    // Common Event Handlers
    function setupKeyboardShortcuts() {
        $(document).keydown(function(e) {
            // Spacebar - Show answer or next question
            if (e.which === 32) { 
                e.preventDefault();
                if ($('#showAnswerBtn').is(':visible')) {
                    showAnswer();
                } else if ($('#nextBtn').is(':visible')) {
                    nextQuestion();
                }
            }
            // Left arrow - Correct answer
            else if (e.which === 37) { 
                if ($('#correctBtn').is(':visible')) {
                    markCorrect();
                }
            }
            // Right arrow - Wrong answer
            else if (e.which === 39) { 
                if ($('#wrongBtn').is(':visible')) {
                    markWrong();
                }
            }
            // Escape - Go back to home
            else if (e.which === 27) {
                if (confirm('هل تريد العودة للصفحة الرئيسية؟')) {
                    goToHome();
                }
            }
        });
    }

    // Initialize common functionality
    $(document).ready(function() {
        // Setup keyboard shortcuts if not disabled
        if (!window.disableKeyboardShortcuts) {
            setupKeyboardShortcuts();
        }
        
        // Add fade in animations
        addFadeInAnimation();
        
        // Initialize tooltips if Bootstrap is loaded
        if (typeof bootstrap !== 'undefined') {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }
    });

    // Export functions for global use
    window.SeenJeemGame = {
        loadCategories: loadCategories,
        loadQuestions: loadQuestions,
        saveGameData: saveGameData,
        loadGameData: loadGameData,
        clearGameData: clearGameData,
        showConfetti: showConfetti,
        goToHome: goToHome,
        goToGamePlay: goToGamePlay,
        newGame: newGame,
        categoryIcons: categoryIcons,
        getFallbackCategories: getFallbackCategories
    };

    // Home Page Functions
    function renderCategories() {
        const container = $("#categoriesContainer");
        container.empty();

        categories.forEach(category => {
            const icon = categoryIcons[category.title] || "fas fa-question-circle";
            const card = `
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="category-card" data-id="${category.id}" onclick="toggleCategory(${category.id})">
                        <i class="${icon} category-icon"></i>
                        <div class="category-title">${category.title}</div>
                        <div class="category-count">${category.questionCount} سؤال</div>
                    </div>
                </div>
            `;
            container.append(card);
        });
    }

    function toggleCategory(categoryId) {
        const index = selectedCategories.indexOf(categoryId);
        const card = $(`.category-card[data-id="${categoryId}"]`);

        if (index > -1) {
            selectedCategories.splice(index, 1);
            card.removeClass("selected");
        } else {
            if (selectedCategories.length < 6) {
                selectedCategories.push(categoryId);
                card.addClass("selected");
            } else {
                alert("يمكنك اختيار 6 فئات فقط!");
                return;
            }
        }

        updateSelectionCounter();
        updateGameState();
    }

    function updateSelectionCounter() {
        const count = selectedCategories.length;
        $("#selectedCount").text(count);
        
        const percentage = (count / 6) * 100;
        $("#progressFill").css("width", percentage + "%");
    }

    function updateGameState() {
        const canProceed = selectedCategories.length === 6;
        
        if (canProceed) {
            $("#teamsSection").fadeIn();
            $("#startGameBtn").prop("disabled", false);
        } else {
            $("#teamsSection").fadeOut();
            $("#startGameBtn").prop("disabled", true);
        }
    }

    function changePlayerCount(team, change) {
        if (team === 1) {
            team1Players = Math.max(1, Math.min(10, team1Players + change));
            $("#team1Count").text(team1Players);
        } else {
            team2Players = Math.max(1, Math.min(10, team2Players + change));
            $("#team2Count").text(team2Players);
        }
    }

    function startGame() {
        if (selectedCategories.length !== 6) {
            alert("يجب اختيار 6 فئات بالضبط!");
            return;
        }

        const team1Name = $("#team1Name").val().trim() || "الفريق الأول";
        const team2Name = $("#team2Name").val().trim() || "الفريق الثاني";

        const gameData = {
            categories: selectedCategories,
            team1: {
                name: team1Name,
                players: team1Players
            },
            team2: {
                name: team2Name,
                players: team2Players
            }
        };

        saveGameData(gameData);
        
        $("#startGameBtn").html("<i class=\"fas fa-spinner fa-spin me-2\"></i>جاري إعداد اللعبة...");
        
        setTimeout(() => {
            goToGamePlay();
        }, 1500);
    }

    // Game Play Functions
    function initializeGamePlay() {
        const storedData = loadGameData();
        if (storedData) {
            gameData = storedData;
            
            // Update team names
            $("#team1Name").text(gameData.team1.name);
            $("#team2Name").text(gameData.team2.name);
            
            // Highlight current team
            updateCurrentTeam();
            
            console.log("Game data loaded:", gameData);
            
            // Load questions
            loadGameQuestions();
        } else {
            alert("لم يتم العثور على بيانات اللعبة. سيتم إعادة توجيهك لإعداد لعبة جديدة.");
            goToHome();
        }
    }

    function loadGameQuestions() {
        if (!gameData.categories || gameData.categories.length === 0) {
            alert("لم يتم اختيار فئات للعبة.");
            return;
        }

        loadQuestions(gameData.categories, function(success) {
            if (success) {
                $("#totalQuestions").text(questions.length);
                
                if (questions.length === 0) {
                    alert("لا توجد أسئلة كافية للفئات المختارة.");
                    return;
                }
                
                // Start the game
                displayCurrentQuestion();
            }
        });
    }

    function displayCurrentQuestion() {
        if (currentQuestionIndex >= questions.length) {
            endGame();
            return;
        }

        const question = questions[currentQuestionIndex];
        
        // Update question display
        $("#currentQuestion").text(currentQuestionIndex + 1);
        $("#questionCategory").text(question.categoryName);
        $("#currentCategory").text(question.categoryName);
        $("#questionText").text(question.question);
        $("#answerText").text(question.answer);
        
        // Clear and setup media
        const mediaContainer = $("#questionMedia");
        mediaContainer.empty();
        
        if (question.image) {
            mediaContainer.append(`<img src="logos/qas/questions/${question.image}" alt="صورة السؤال">`);
        }
        
        if (question.video) {
            mediaContainer.append(`
                <video controls style="max-width: 100%; max-height: 300px;">
                    <source src="logos/qas/questions/${question.video}" type="video/mp4">
                </video>
            `);
        }
        
        if (question.audio) {
            mediaContainer.append(`
                <audio controls style="width: 100%; max-width: 400px;">
                    <source src="logos/qas/questions/${question.audio}" type="audio/mpeg">
                </audio>
            `);
        }
        
        // Reset button states
        $("#showAnswerBtn").show();
        $("#correctBtn, #wrongBtn, #nextBtn").hide();
        $("#answerSection").hide();
        answerShown = false;
        
        // Update current team highlight
        updateCurrentTeam();
    }

    function updateCurrentTeam() {
        $("#team1Score, #team2Score").removeClass("active");
        $("#team" + currentTeam + "Score").addClass("active");
    }

    function showAnswer() {
        $("#answerSection").fadeIn();
        $("#showAnswerBtn").hide();
        $("#correctBtn, #wrongBtn").show();
        answerShown = true;
    }

    function markCorrect() {
        const question = questions[currentQuestionIndex];
        const points = parseInt(question.points) || 1;
        
        if (currentTeam === 1) {
            team1Score += points;
            $("#team1Points").text(team1Score);
        } else {
            team2Score += points;
            $("#team2Points").text(team2Score);
        }
        
        showNextButton();
        
        // Add visual feedback
        $("#team" + currentTeam + "Score").addClass("animate__animated animate__pulse");
        setTimeout(() => {
            $("#team" + currentTeam + "Score").removeClass("animate__animated animate__pulse");
        }, 1000);
    }

    function markWrong() {
        // Switch to other team for next question
        currentTeam = currentTeam === 1 ? 2 : 1;
        showNextButton();
    }

    function showNextButton() {
        $("#correctBtn, #wrongBtn").hide();
        $("#nextBtn").show();
    }

    function nextQuestion() {
        currentQuestionIndex++;
        displayCurrentQuestion();
    }

    function endGame() {
        $("#questionCard").hide();
        $("#gameEndScreen").show();
        
        // Determine winner
        let winnerText = "";
        if (team1Score > team2Score) {
            winnerText = `🏆 فاز ${gameData.team1.name}! 🏆`;
        } else if (team2Score > team1Score) {
            winnerText = `🏆 فاز ${gameData.team2.name}! 🏆`;
        } else {
            winnerText = "🤝 تعادل! 🤝";
        }
        
        $("#winnerText").text(winnerText);
        
        // Show final scores
        $("#finalScores").html(`
            <div class="final-score-card">
                <h4>${gameData.team1.name}</h4>
                <div class="score-number">${team1Score}</div>
                <small>نقطة</small>
            </div>
            <div class="final-score-card">
                <h4>${gameData.team2.name}</h4>
                <div class="score-number">${team2Score}</div>
                <small>نقطة</small>
            </div>
        `);
        
        // Show confetti if there is a winner
        if (team1Score !== team2Score) {
            showConfetti();
        }
    }

    // Page-specific initialization
    $(document).ready(function() {
        // Check which page we're on and initialize accordingly
        if ($("#categoriesContainer").length) {
            // Home page
            loadCategories(function(success) {
                if (success) {
                    renderCategories();
                } else {
                    categories = getFallbackCategories();
                    renderCategories();
                }
            });
        }
        
        if ($("#questionCard").length) {
            // Game play page
            initializeGamePlay();
        }
    });
</script>
