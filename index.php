<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch hẹn tối nay 💖</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <!-- FONT -->
    <link href="https://fonts.cdnfonts.com/css/magistral" rel="stylesheet">

    <style>
        body {
            overflow: hidden;
            touch-action: manipulation;
            font-family: 'Magistral', 'Poppins', sans-serif;
        }

        /* SCENE */
        .scene {
            position: absolute;
            inset: 0;
            opacity: 0;
            transform: scale(1.05);
            transition: all 0.7s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 20px;
        }

        .scene.active {
            opacity: 1;
            transform: scale(1);
        }

        /* BACKGROUND */
        .bg-img {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            filter: brightness(0.5);
            animation: zoom 25s infinite alternate;
            pointer-events: none;
        }

        @keyframes zoom {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }

        /* GLASS */
        .glass {
            backdrop-filter: blur(14px);
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 24px 32px;
        }

        /* ANIMATION */
        .fadeUp {
            animation: fadeUp 1s ease forwards;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* HEART */
        .heart {
            position: absolute;
            animation: floatUp 6s linear infinite;
            opacity: 0.6;
        }

        @keyframes floatUp {
            from {
                transform: translateY(100vh);
            }

            to {
                transform: translateY(-10vh);
                opacity: 0;
            }
        }

        /* đảm bảo không bị block click */
        .scene * {
            pointer-events: none;
        }
    </style>
</head>

<body class="bg-black text-white select-none">

    <div id="hearts"></div>

    <!-- SCENE 1 -->
    <div class="scene active">
        <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1519681393784-d120267933ba')"></div>
        <div class="glass fadeUp">
            <h1 class="text-3xl mb-2">Yến Khang 👀</h1>
            <p class="opacity-70">Tối nay có một lịch hẹn nhỏ...</p>
            <p class="text-sm mt-3 opacity-50">chạm để xem ✨</p>
        </div>
    </div>

    <!-- SCENE 2 -->
    <div class="scene">
        <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1504674900247-0877df9cc836')"></div>
        <div class="glass fadeUp">
            <h2 class="text-2xl mb-3">⏰ 18h</h2>
            <p>Rước đi chơi</p>
        </div>
    </div>

    <!-- SCENE 3 -->
    <div class="scene">
        <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1498654896293-37aacf113fd9')"></div>
        <div class="glass fadeUp space-y-2">
            <h2 class="text-2xl mb-2">🍽️ Ăn tối</h2>
            <p><small>Tùy chọn nhó</small></p>
            <p>Đồ thái thì Little Chiang mai</p>
            <p>Mì ý hoặc beefstack thì Pasta Paradise Phan Xích Long</p>
            <p>Mì ý hoặc beefstack thì Pasta Paradise Phan Xích Long</p>
            <p>Cơm Nhật thì Tamago Omurice</p>
            <p>Hoặc đi săn quán nướng</p>
            <p>Gần chỗ làm tầm 1Km có quán buffet cũng OK</p>
            <p class="text-pink-300 mt-2 text-sm">Tùy mood nàng chọn 😌</p>
        </div>
    </div>

    <!-- SCENE 4 -->
    <div class="scene">
        <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1515562141207-7a88fb7ce338')"></div>
        <div class="glass fadeUp">
            <h2 class="text-2xl mb-2">PNJ</h2>
            <p>Gooooooo</p>
        </div>
    </div>

    <!-- SCENE 5 -->
    <div class="scene">
        <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee')"></div>
        <div class="glass fadeUp">
            <h2 class="text-2xl mb-2">🚶‍♂️ Lả lướt</h2>
            <p>Chill nhẹ vòng thành phố</p>
        </div>
    </div>

    <!-- FINAL -->
    <div class="scene">
        <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1517841905240-472988babdf9')"></div>
        <div class="glass fadeUp">
            <h1 class="text-3xl mb-4">Một buổi tối nhẹ nhàng 💖</h1>
            <p class="opacity-80">Chỉ cần đi cùng nhau là đủ ✨</p>
        </div>
    </div>

    <script>
        let current = 0;
        let scenes = document.querySelectorAll(".scene");

        function nextScene() {
            if (current < scenes.length - 1) {
                scenes[current].classList.remove("active");
                current++;
                scenes[current].classList.add("active");

                if (current === scenes.length - 1) {
                    confetti({
                        particleCount: 200,
                        spread: 100
                    });
                }
            }
        }

        /* CLICK ANYWHERE */
        document.addEventListener("click", nextScene);
        document.addEventListener("touchstart", nextScene);

        /* HEART */
        setInterval(() => {
            let heart = document.createElement("div");
            heart.className = "heart";
            heart.innerText = "💖";
            heart.style.left = Math.random() * 100 + "vw";
            heart.style.fontSize = (Math.random() * 20 + 20) + "px";
            document.body.appendChild(heart);
            setTimeout(() => heart.remove(), 6000);
        }, 300);
    </script>

</body>

</html>
