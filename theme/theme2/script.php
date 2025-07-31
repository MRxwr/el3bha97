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
    
    // Lifelines tracking
    let lifelines = {
        team1: {
            callFriend: true,
            twoAnswers: true,
            doublePoints: true
        },
        team2: {
            callFriend: true,
            twoAnswers: true,
            doublePoints: true
        }
    };
    
    let currentQuestionDoublePoints = false;
    let callFriendTimer = null;
    let callFriendTimeLeft = 60;

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
        window.location.href = "?v=Home";
    }

    function goToGamePlay() {
        window.location.href = "?v=GamePlay";
    }

    function newGame() {
        clearGameData();
        goToHome();
    }

    // Error Handling
    function showError(errorMessage, context) {
        console.error(errorMessage, context || '');
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
        getRandomColor: getRandomColor
    };

    // ===== HOME PAGE FUNCTIONS =====
    
    // Category Selection
    function displayCategories() {
        const container = $("#categoriesContainer");
        container.empty();
        
        if (!categories || categories.length === 0) {
            container.html('<div class="col-12 text-center text-white">لا توجد فئات متاحة</div>');
            return;
        }
        
        categories.forEach(category => {
            const iconClass = categoryIcons[category.title] || 'fas fa-question';
            const imagePath = category.image ? `logos/qas/categories/${category.image}` : 'img/logo.png';
            
            const card = $(`
                <div class="col-md-2 col-sm-6 col-6 mb-4">
                    <div class="category-card" data-category-id="${category.id}">
                        <div class="category-icon">
                            <img src="${imagePath}" alt="${category.title}" onerror="this.onerror=null; this.src='img/logo.png'; $(this).parent().html('<i class='${iconClass}'></i>');"style="width: 100%; height: auto;">
                        </div>
                        <div class="category-info">
                            <h3 class="category-title">${category.title}</h3>
                            <p class="category-count">${category.questionCount || 0} سؤال</p>
                        </div>
                        <div class="category-select">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>
                </div>
            `);
            
            container.append(card);
            
            // Check if this category is already selected
            if (selectedCategories.includes(category.id)) {
                card.find('.category-card').addClass('selected');
            }
        });
        
        // Add click event to category cards
        $(".category-card").click(function() {
            const categoryId = $(this).data('category-id');
            const card = $(this);
            
            if (card.hasClass('selected')) {
                selectedCategories = selectedCategories.filter(id => id !== categoryId);
                card.removeClass('selected');
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
        });
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
        
        $("#startGameBtn").prop("disabled", true);
        $("#startGameBtn").html("<i class=\"fas fa-spinner fa-spin me-2\"></i>جاري إعداد اللعبة...");
        
        setTimeout(() => {
            goToGamePlay();
        }, 1500);
    }

    // Game Play Functions
    function initializeGamePlay() {
        console.log('=== INITIALIZING GAME PLAY ===');
        
        const storedData = loadGameData();
        console.log('Loaded game data:', storedData);
        
        if (storedData) {
            gameData = storedData;
            console.log('Game data set:', gameData);
            
            // Update team names
            $("#team1Name").text(gameData.team1.name);
            $("#team2Name").text(gameData.team2.name);
            console.log('Team names updated in header');
            
            // Initialize scores
            team1Score = 0;
            team2Score = 0;
            currentTeam = 1;
            $("#team1Score").text(team1Score);
            $("#team2Score").text(team2Score);
            console.log('Scores initialized');
            
            // Initialize lifelines
            lifelines = {
                team1: {
                    callFriend: true,
                    twoAnswers: true,
                    doublePoints: true
                },
                team2: {
                    callFriend: true,
                    twoAnswers: true,
                    doublePoints: true
                }
            };
            
            // Update lifeline display
            updateLifelineDisplay();
            console.log('Lifelines initialized');
            
            console.log('Game data loaded:', gameData);
            
            // Load questions
            console.log('About to load questions...');
            loadGameQuestions();
        } else {
            console.error('No game data found');
            alert("لم يتم العثور على بيانات اللعبة. سيتم إعادة توجيهك لإعداد لعبة جديدة.");
            goToHome();
        }
    }

    function loadGameQuestions() {
        console.log('Loading game questions...');
        console.log('Game data categories:', gameData.categories);
        
        if (!gameData.categories || gameData.categories.length === 0) {
            alert("لم يتم اختيار فئات للعبة.");
            return;
        }

        loadQuestions(gameData.categories, function(success) {
            console.log('LoadQuestions callback - success:', success);
            console.log('Questions loaded:', questions);
            
            if (success) {
                $("#totalQuestions").text(questions.length);
                
                if (questions.length === 0) {
                    alert("لا توجد أسئلة كافية للفئات المختارة.");
                    return;
                }
                
                // Create question board
                createQuestionBoard();
                
                // Update team names in modal
                $("#team1CorrectName").text(gameData.team1.name);
                $("#team2CorrectName").text(gameData.team2.name);
            } else {
                console.error('Failed to load questions');
                alert('فشل في تحميل الأسئلة');
            }
        });
    }

    // Board data structure to track questions
    let questionBoard = {};
    let answeredQuestions = new Set();
    
    function createQuestionBoard() {
        console.log('=== CREATING QUESTION BOARD ===');
        console.log('Questions array:', questions);
        
        // Clear any existing board elements
        $('.categories-showcase').empty();
        // Don't clear the numbered columns as we've already set them in the HTML
        // $('.numbered-columns').empty();
        $('.question-board').empty();
        
        if (!questions || questions.length === 0) {
            console.error('No questions available for board creation');
            $('.game-board-container').html('<div class="text-center text-white">لا توجد أسئلة متاحة</div>');
            return;
        }
        
        // Group questions by category
        const categorizedQuestions = {};
        questions.forEach((question) => {
            if (!categorizedQuestions[question.categoryId]) {
                categorizedQuestions[question.categoryId] = [];
            }
            categorizedQuestions[question.categoryId].push(question);
        });

        // Sort questions within each category by points
        Object.keys(categorizedQuestions).forEach(categoryId => {
            categorizedQuestions[categoryId].sort((a, b) => a.points - b.points);
        });

        console.log('Categorized questions:', categorizedQuestions);
        
        // Get the selected categories
        const selectedCatIds = gameData.categories;
        
        // 1. Create Categories Showcase
        const showcaseContainer = $('.categories-showcase');
        selectedCatIds.forEach(categoryId => {
            // Find category info
            const categoryInfo = categories.find(c => c.id == categoryId);
            const categoryQuestions = categorizedQuestions[categoryId] || [];
            
            if (categoryInfo) {
                const imagePath = categoryInfo.image ? `logos/qas/categories/${categoryInfo.image}` : 'img/logo.png';
                const iconClass = categoryIcons[categoryInfo.title] || 'fas fa-question';
                
                const categoryShowcase = $(`
                    <div class="category-showcase-item">
                        <img src="${imagePath}" alt="${categoryInfo.title}" class="category-image" 
                             onerror="this.onerror=null; this.src='img/logo.png'; $(this).replaceWith('<div class=\'category-icon\'><i class=\'${iconClass}\'></i></div>');">
                        <div class="category-title">${categoryInfo.title}</div>
                    </div>
                `);
                
                showcaseContainer.append(categoryShowcase);
            }
        });
        
        // 3. Create Question Board with 12 columns, each having 3 questions
        const boardContainer = $('.question-board');
        
        // Create a flat array of all questions from categorized questions
        let allQuestions = [];
        selectedCatIds.forEach(categoryId => {
            const catQuestions = categorizedQuestions[categoryId] || [];
            allQuestions = [...allQuestions, ...catQuestions];
        });
        
        // Sort questions randomly to distribute them across columns
        allQuestions.sort(() => Math.random() - 0.5);
        
        // Set point values to 200, 400, 600 for visualization
        const pointValues = [200, 400, 600];
        
        // Create 12 columns with 3 questions each
        for (let col = 0; col < 12; col++) {
            const questionColumn = $('<div class="question-column"></div>');
            
            for (let row = 0; row < 3; row++) {
                const questionIndex = col * 3 + row;
                
                if (questionIndex < allQuestions.length) {
                    const question = allQuestions[questionIndex];
                    
                    // Override points with our fixed values for visualization
                    question.points = pointValues[row];
                    
                    const questionCell = $(`
                        <div class="question-cell" data-question-id="${question.id}">
                            ${question.points}
                        </div>
                    `);
                    
                    questionColumn.append(questionCell);
                    
                    // Store question in our board data structure
                    questionBoard[question.id] = question;
                } else {
                    // If we run out of questions, create empty cells
                    const emptyCell = $(`
                        <div class="question-cell answered">
                            -
                        </div>
                    `);
                    questionColumn.append(emptyCell);
                }
            }
            
            boardContainer.append(questionColumn);
        }
        
        // 4. Create Team and Ad panels
        const gameFooter = $('.game-footer');
        gameFooter.empty();
        
        // Team 1 Panel
        const team1Panel = $(`
            <div class="team-panel team1">
                <div class="team-header-row">
                    <div class="team-name-display" id="team1Name">${gameData.team1.name}</div>
                    <div class="team-score" id="team1Score">${team1Score}</div>
                </div>
            </div>
        `);
        gameFooter.append(team1Panel);
        
        // Ads Placeholder
        const adsPlaceholder = $(`
            <div class="team-panel team3" style="justify-content: center;">
                <div class="team-header-row" style="justify-content: center;">
                    <div class="team-name-display" id="team1Name" style="">الإعلانات</div>
                </div>
            </div>
        `);
        gameFooter.append(adsPlaceholder);
        
        // Team 2 Panel
        const team2Panel = $(`
            <div class="team-panel team2">
                <div class="team-header-row">
                    <div class="team-name-display" id="team2Name">${gameData.team2.name}</div>
                    <div class="team-score" id="team2Score">${team2Score}</div>
                </div>
            </div>
        `);
        gameFooter.append(team2Panel);
        
        // Add click handlers for question cells
        $('.question-cell').click(function() {
            const questionId = $(this).data('question-id');
            if (questionId && !$(this).hasClass('answered')) {
                console.log(`Question ${questionId} clicked`);
                selectQuestion(questionId);
            }
        });
        
        console.log('=== BOARD CREATION COMPLETE ===');
        updateTurnIndicator();
    }

    function updateTurnIndicator() {
        console.log('=== UPDATING TURN INDICATOR ===');
        console.log('Current team:', currentTeam);
        console.log('Game data:', gameData);
        
        if (!gameData || !gameData.team1 || !gameData.team2) {
            console.error('Game data not properly loaded');
            $("#currentTeamTurn").text("غير محدد");
            return;
        }
        
        const teamName = currentTeam === 1 ? gameData.team1.name : gameData.team2.name;
        console.log('Setting team name to:', teamName);
        $("#currentTeamName").text(teamName);
        
        // Update team panel highlighting
        $(".team-panel").removeClass("active");
        $(`.team-panel.team${currentTeam}`).addClass("active");
        console.log('=== TURN INDICATOR UPDATED ===');
    }

    function selectQuestion(questionId) {
        if (answeredQuestions.has(questionId)) {
            return; // Question already answered
        }
        
        const question = questionBoard[questionId];
        if (!question) return;
        
        // Show question modal
        $("#questionCategory").text(question.categoryName);
        $("#questionPoints").text(`${question.points} نقطة`);
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
        
        // Reset modal state
        $("#answerContainer").hide();
        $("#questionContainer").show();
        $("#showAnswerBtn").show();
        $("#teamSelection, #nextBtn").hide();
        
        // Reset lifeline states for new question
        currentQuestionDoublePoints = false;
        $('#doublePointsIndicator').hide();
        $('#callFriendTimer').hide();
        if (callFriendTimer) {
            clearInterval(callFriendTimer);
            callFriendTimer = null;
        }
        
        // Show lifelines container and update display
        $('#lifelinesContainer').show();
        updateLifelineDisplay();
        
        // Store current question
        window.currentSelectedQuestion = question;
        
        // Show modal
        $("#questionModal").fadeIn();
    }

    function showAnswer() {
        $("#questionContainer").hide(); // Hide question container
        $("#answerContainer").fadeIn(400); // Show answer container with fade effect
        $("#showAnswerBtn").hide();
        $("#teamSelection").show();
    }

    function markTeamCorrect(teamNumber) {
        const question = window.currentSelectedQuestion;
        let points = parseInt(question.points) || 1;
        
        // Handle double points lifeline
        if (currentQuestionDoublePoints) {
            console.log(`Double points active! Original points: ${points}`);
            points = points * 2;
            
            // Add double points to the correct team and subtract full double points from other team
            if (teamNumber === 1) {
                team1Score += points;
                // Subtract full double points from team 2
                team2Score = Math.max(0, team2Score - points);
                $("#team1Score").text(team1Score);
                $("#team2Score").text(team2Score);
                console.log(`Team 1 got ${points} points, Team 2 lost ${points} points`);
            } else {
                team2Score += points;
                // Subtract full double points from team 1
                team1Score = Math.max(0, team1Score - points);
                $("#team1Score").text(team1Score);
                $("#team2Score").text(team2Score);
                console.log(`Team 2 got ${points} points, Team 1 lost ${points} points`);
            }
            
            // Reset double points flag
            currentQuestionDoublePoints = false;
            $('#doublePointsIndicator').hide();
            
        } else {
            // Normal scoring
            if (teamNumber === 1) {
                team1Score += points;
                $("#team1Score").text(team1Score);
            } else {
                team2Score += points;
                $("#team2Score").text(team2Score);
            }
        }
        
        showConfetti();
        finishQuestion();
    }

    function markNoCorrect() {
        // No points awarded
        finishQuestion();
    }

    function finishQuestion() {
        const question = window.currentSelectedQuestion;
        
        // Mark question as answered
        answeredQuestions.add(question.id);
        $(`[data-question-id="${question.id}"]`).addClass('answered');
        
        // Hide lifelines and reset states
        $("#lifelinesContainer").hide();
        $("#callFriendTimer").hide();
        if (callFriendTimer) {
            clearInterval(callFriendTimer);
            callFriendTimer = null;
        }
        
        $("#teamSelection").hide();
        $("#nextBtn").show();
        
        // Switch to next team
        currentTeam = currentTeam === 1 ? 2 : 1;
        updateTurnIndicator();
        
        // Check if game is finished
        if (answeredQuestions.size >= questions.length) {
            setTimeout(() => {
                closeQuestion();
                endGame();
            }, 2000);
        }
    }

    function closeQuestion() {
        $("#questionModal").fadeOut();
        // Reset state for next question
        setTimeout(() => {
            $("#questionContainer").show();
            $("#answerContainer").hide();
        }, 500);
        window.currentSelectedQuestion = null;
    }

    function endGame() {
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

    // ===== LIFELINE FUNCTIONS =====
    
    function updateLifelineDisplay() {
        console.log('Updating lifeline display...');
        
        // Update Team 1 lifelines
        $('#team1CallFriend').toggleClass('used', !lifelines.team1.callFriend);
        $('#team1TwoAnswers').toggleClass('used', !lifelines.team1.twoAnswers);
        $('#team1DoublePoints').toggleClass('used', !lifelines.team1.doublePoints);
        
        // Update Team 2 lifelines
        $('#team2CallFriend').toggleClass('used', !lifelines.team2.callFriend);
        $('#team2TwoAnswers').toggleClass('used', !lifelines.team2.twoAnswers);
        $('#team2DoublePoints').toggleClass('used', !lifelines.team2.doublePoints);
        
        // Update lifeline buttons in modal if visible
        if ($('#questionModal').is(':visible')) {
            const currentTeamKey = `team${currentTeam}`;
            
            // Call Friend button
            $('#callFriendBtn').prop('disabled', !lifelines[currentTeamKey].callFriend);
            
            // Two Answers button
            $('#twoAnswersBtn').prop('disabled', !lifelines[currentTeamKey].twoAnswers);
            
            // Double Points button
            $('#doublePointsBtn').prop('disabled', !lifelines[currentTeamKey].doublePoints);
        }
    }
    
    function useCallFriend() {
        const currentTeamKey = `team${currentTeam}`;
        
        if (!lifelines[currentTeamKey].callFriend) {
            alert('هذا الفريق استخدم "اتصل بصديق" من قبل!');
            return;
        }
        
        console.log(`Team ${currentTeam} using Call Friend lifeline`);
        
        // Mark lifeline as used
        lifelines[currentTeamKey].callFriend = false;
        
        // Show timer and hide lifelines container
        $('#lifelinesContainer').hide();
        $('#callFriendTimer').show();
        
        // Initialize timer
        callFriendTimeLeft = 60;
        $('#timerCountdown').text(callFriendTimeLeft);
        $('#timerProgress').css('width', '100%');
        
        // Start countdown
        callFriendTimer = setInterval(() => {
            callFriendTimeLeft--;
            $('#timerCountdown').text(callFriendTimeLeft);
            $('#timerProgress').css('width', (callFriendTimeLeft / 60 * 100) + '%');
            
            if (callFriendTimeLeft <= 0) {
                clearInterval(callFriendTimer);
                $('#callFriendTimer').hide();
                $('#lifelinesContainer').show();
                updateLifelineDisplay();
            }
        }, 1000);
        
        updateLifelineDisplay();
    }
    
    function useTwoAnswers() {
        const currentTeamKey = `team${currentTeam}`;
        
        if (!lifelines[currentTeamKey].twoAnswers) {
            alert('هذا الفريق استخدم "إجابتان فقط" من قبل!');
            return;
        }
        
        console.log(`Team ${currentTeam} using Two Answers lifeline`);
        
        // Mark lifeline as used
        lifelines[currentTeamKey].twoAnswers = false;
        
        // This lifeline is for multiple choice questions only
        // For now, we'll just show a message since we don't have multiple choice structure
        alert('تم استخدام "إجابتان فقط"! هذه الوسيلة مفيدة فقط للأسئلة متعددة الخيارات.');
        
        updateLifelineDisplay();
    }
    
    function useDoublePoints() {
        const currentTeamKey = `team${currentTeam}`;
        
        if (!lifelines[currentTeamKey].doublePoints) {
            alert('هذا الفريق استخدم "ضعف النقاط" من قبل!');
            return;
        }
        
        console.log(`Team ${currentTeam} using Double Points lifeline`);
        
        // Mark lifeline as used
        lifelines[currentTeamKey].doublePoints = false;
        
        // Activate double points for current question
        currentQuestionDoublePoints = true;
        $('#doublePointsIndicator').show();
        
        // Update displayed points
        const currentPoints = parseInt($('#questionPoints').text().replace(/[^\d]/g, ''));
        const doublePoints = currentPoints * 2;
        $('#questionPoints').html(`<span style="text-decoration: line-through;">${currentPoints}</span> ${doublePoints} نقطة`);
        
        alert('تم تفعيل "ضعف النقاط"! إذا أجبت بشكل صحيح ستحصل على ضعف النقاط وسيتم خصم نفس المقدار من الفريق الآخر.');
        
        updateLifelineDisplay();
    }

    // Page-specific initialization
    $(document).ready(function() {
        console.log('=== PAGE INITIALIZATION ===');
        console.log('Current URL:', window.location.href);
        console.log('Categories container found:', $("#categoriesContainer").length);
        console.log('Question board found:', $(".game-board-container").length);
        
        // Check which page we're on and initialize accordingly
        if ($("#categoriesContainer").length > 0) {
            // We're on the home page
            console.log('Initializing Home page');
            
            // Load categories
            loadCategories(function(success) {
                if (success) {
                    displayCategories();
                    
                    // Check for existing game
                    const savedGame = loadGameData();
                    if (savedGame) {
                        // Restore selected categories
                        selectedCategories = savedGame.categories || [];
                        
                        // Update display
                        selectedCategories.forEach(categoryId => {
                            $(`.category-card[data-category-id="${categoryId}"]`).addClass('selected');
                        });
                        
                        // Restore team names
                        if (savedGame.team1 && savedGame.team1.name) {
                            $("#team1Name").val(savedGame.team1.name);
                        }
                        
                        if (savedGame.team2 && savedGame.team2.name) {
                            $("#team2Name").val(savedGame.team2.name);
                        }
                        
                        // Restore player counts
                        if (savedGame.team1 && savedGame.team1.players) {
                            team1Players = savedGame.team1.players;
                            $("#team1Count").text(team1Players);
                        }
                        
                        if (savedGame.team2 && savedGame.team2.players) {
                            team2Players = savedGame.team2.players;
                            $("#team2Count").text(team2Players);
                        }
                        
                        updateSelectionCounter();
                        updateGameState();
                        
                        console.log('Restored game state from saved data');
                    }
                }
            });
            
            // Team name validation
            $("#team1Name, #team2Name").on('input', function() {
                const value = $(this).val();
                if (!validateArabicInput(value)) {
                    alert('يرجى إدخال أسماء الفرق باللغة العربية فقط.');
                    $(this).val(value.substring(0, value.length - 1));
                }
            });
            
        } else if ($(".game-play-container").length > 0) {
            // We're on the game play page
            console.log('Initializing Game Play page');
            
            // Load categories first, then initialize game play
            loadCategories(function(success) {
                if (success) {
                    console.log('Categories loaded for game play page');
                    initializeGamePlay();
                } else {
                    console.error('Failed to load categories for game play page');
                    // Still try to initialize game play with fallback data
                    initializeGamePlay();
                }
            });
        }
    });
</script>
