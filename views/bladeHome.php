<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سين جيم - لعبة الأسئلة التفاعلية</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            direction: rtl;
        }
        
        .game-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            margin: 20px auto;
            max-width: 1200px;
        }
        
        .header-section {
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
            color: white;
            padding: 30px;
            border-radius: 20px 20px 0 0;
            text-align: center;
        }
        
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
        
        @media (max-width: 768px) {
            .game-container {
                margin: 10px;
                border-radius: 15px;
            }
            
            .header-section {
                padding: 20px;
                border-radius: 15px 15px 0 0;
            }
            
            .category-card {
                margin: 5px;
                padding: 15px;
            }
            
            .category-icon {
                font-size: 2rem;
            }
            
            .selection-counter {
                top: 10px;
                left: 10px;
                padding: 10px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Selection Counter -->
        <div class="selection-counter">
            <div class="d-flex align-items-center gap-2">
                <i class="fas fa-check-circle text-success"></i>
                <span id="selectedCount">0</span> / 6 فئات
            </div>
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill" style="width: 0%"></div>
            </div>
        </div>

        <div class="game-container">
            <!-- Header -->
            <div class="header-section">
                <h1 class="mb-3">
                    <i class="fas fa-gamepad me-3"></i>
                    إنشاء لعبة سين جيم
                </h1>
                <p class="mb-0 fs-5">لعبة جماعية تفاعلية نختبر فيها معرفتكم وثقافتكم</p>
                <p class="mb-0 mt-2 opacity-75">اختر 6 فئات للعبة - 3 فئات لكل فريق مع 36 سؤال مختلف</p>
            </div>

            <div class="p-4">
                <!-- Categories Selection -->
                <div class="mb-5">
                    <h2 class="section-title text-center">اختر الفئات</h2>
                    <div class="row" id="categoriesContainer">
                        <!-- Categories will be loaded here -->
                    </div>
                </div>

                <!-- Teams Configuration -->
                <div class="mb-5" id="teamsSection" style="display: none;">
                    <h2 class="section-title text-center">حدد معلومات الفرق</h2>
                    
                    <div class="row">
                        <!-- Team 1 -->
                        <div class="col-md-6">
                            <div class="team-section">
                                <div class="team-header">
                                    <h4 class="mb-0">
                                        <i class="fas fa-users me-2"></i>
                                        الفريق الأول
                                    </h4>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold">اسم الفريق</label>
                                    <input type="text" class="form-control" id="team1Name" placeholder="أدخل اسم الفريق الأول" value="الفريق الأول">
                                </div>
                                
                                <div class="text-center">
                                    <label class="form-label fw-bold">عدد اللاعبين</label>
                                    <div class="player-counter">
                                        <button type="button" class="counter-btn minus" onclick="changePlayerCount(1, -1)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <div class="counter-display" id="team1Count">1</div>
                                        <button type="button" class="counter-btn plus" onclick="changePlayerCount(1, 1)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Team 2 -->
                        <div class="col-md-6">
                            <div class="team-section">
                                <div class="team-header">
                                    <h4 class="mb-0">
                                        <i class="fas fa-users me-2"></i>
                                        الفريق الثاني
                                    </h4>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold">اسم الفريق</label>
                                    <input type="text" class="form-control" id="team2Name" placeholder="أدخل اسم الفريق الثاني" value="الفريق الثاني">
                                </div>
                                
                                <div class="text-center">
                                    <label class="form-label fw-bold">عدد اللاعبين</label>
                                    <div class="player-counter">
                                        <button type="button" class="counter-btn minus" onclick="changePlayerCount(2, -1)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <div class="counter-display" id="team2Count">1</div>
                                        <button type="button" class="counter-btn plus" onclick="changePlayerCount(2, 1)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Start Game Button -->
                <div class="text-center mb-4">
                    <button type="button" class="start-game-btn" id="startGameBtn" onclick="startGame()" disabled>
                        <i class="fas fa-play me-2"></i>
                        ابدأ اللعب
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let selectedCategories = [];
        let categories = [];
        let team1Players = 1;
        let team2Players = 1;

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

        // Load categories from database
        $(document).ready(function() {
            loadCategories();
        });

        function loadCategories() {
            // This would typically be an AJAX call to get categories from your database
            // For now, I'll simulate with dummy data based on your database structure
            $.ajax({
                url: 'get_categories.php', // You'll need to create this
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    categories = data;
                    renderCategories();
                },
                error: function() {
                    // Fallback dummy data for demonstration
                    categories = [
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
                    renderCategories();
                }
            });
        }

        function renderCategories() {
            const container = $('#categoriesContainer');
            container.empty();

            categories.forEach(category => {
                const icon = categoryIcons[category.title] || 'fas fa-question-circle';
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
                // Remove category
                selectedCategories.splice(index, 1);
                card.removeClass('selected');
            } else {
                // Add category (if not at limit)
                if (selectedCategories.length < 6) {
                    selectedCategories.push(categoryId);
                    card.addClass('selected');
                } else {
                    // Show alert for max selection
                    alert('يمكنك اختيار 6 فئات فقط!');
                    return;
                }
            }

            updateSelectionCounter();
            updateGameState();
        }

        function updateSelectionCounter() {
            const count = selectedCategories.length;
            $('#selectedCount').text(count);
            
            const percentage = (count / 6) * 100;
            $('#progressFill').css('width', percentage + '%');
        }

        function updateGameState() {
            const canProceed = selectedCategories.length === 6;
            
            if (canProceed) {
                $('#teamsSection').fadeIn();
                $('#startGameBtn').prop('disabled', false);
            } else {
                $('#teamsSection').fadeOut();
                $('#startGameBtn').prop('disabled', true);
            }
        }

        function changePlayerCount(team, change) {
            if (team === 1) {
                team1Players = Math.max(1, Math.min(10, team1Players + change));
                $('#team1Count').text(team1Players);
            } else {
                team2Players = Math.max(1, Math.min(10, team2Players + change));
                $('#team2Count').text(team2Players);
            }
        }

        function startGame() {
            if (selectedCategories.length !== 6) {
                alert('يجب اختيار 6 فئات بالضبط!');
                return;
            }

            const team1Name = $('#team1Name').val().trim() || 'الفريق الأول';
            const team2Name = $('#team2Name').val().trim() || 'الفريق الثاني';

            // Prepare game data
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

            // Store game data and redirect to game page
            localStorage.setItem('seenJeemGame', JSON.stringify(gameData));
            
            // Show loading state
            $('#startGameBtn').html('<i class="fas fa-spinner fa-spin me-2"></i>جاري إعداد اللعبة...');
            
            // Simulate game creation delay
            setTimeout(() => {
                window.location.href = 'game-play.php'; // You'll need to create this page
            }, 1500);
        }

        // Add some nice animations
        $(document).ready(function() {
            $('.category-card').each(function(index) {
                $(this).css('animation-delay', (index * 0.1) + 's');
                $(this).addClass('animate__animated animate__fadeInUp');
            });
        });
    </script>

    <style>
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
    </style>
</body>
</html>
