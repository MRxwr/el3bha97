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