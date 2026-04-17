<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lời mời tối nay 💖</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <style>
        body {
            overflow: hidden;
            touch-action: manipulation;
        }

        /* SCENE */
        .scene {
            position: absolute;
            inset: 0;
            opacity: 0;
            pointer-events: none;
            transform: scale(1.05);
            transition: all 0.6s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 20px;
        }

        .scene.active {
            opacity: 1;
            pointer-events: auto;
            transform: scale(1);
        }

        /* BACKGROUND */
        .bg-img {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            filter: brightness(0.6);
            animation: zoom 20s infinite alternate;
        }

        @keyframes zoom {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
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

        /* GLOW */
        .glow {
            animation: glow 1.2s infinite alternate;
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 10px #ff69b4;
            }

            to {
                box-shadow: 0 0 40px #ff1493;
            }
        }

        /* TYPING */
        .typing {
            border-right: 2px solid white;
            white-space: nowrap;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-black text-white select-none">

    <!-- HEART CONTAINER -->
    <div id="hearts"></div>

    <!-- SCENE 1 -->
    <div class="scene active" onclick="nextScene()">
        <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e')"></div>
        <h1 class="text-3xl mb-4 z-10">Yến Khang 👀</h1>
        <p id="hint" class="opacity-70 animate-pulse z-10 text-sm">chạm để bắt đầu...</p>
    </div>

    <!-- SCENE 2 -->
    <div class="scene" onclick="nextScene()">
        <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1511988617509-a57c8a288659')"></div>
        <h1 id="typingText" class="text-2xl z-10 typing"></h1>
    </div>

    <!-- SCENE 3 -->
    <div class="scene" onclick="nextScene()">
        <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1504674900247-0877df9cc836')"></div>
        <h2 class="text-2xl z-10 mb-2">🍽️ Ăn uống</h2>
        <p class="z-10">Một bữa tối nhẹ nhàng</p>
    </div>

    <!-- SCENE 4 -->
    <div class="scene" onclick="nextScene()">
        <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1521335629791-ce4aec67dd47')"></div>
        <h2 class="text-2xl z-10 mb-2">🛍️ Mua sắm</h2>
        <p class="z-10">Có thể có bất ngờ ✨</p>
    </div>

    <!-- SCENE 5 -->
    <div class="scene" onclick="nextScene()">
        <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee')"></div>
        <h2 class="text-2xl z-10 mb-2">🚶‍♂️ Đi dạo</h2>
        <p class="z-10">Đi dạo và nói chuyện</p>
    </div>

    <!-- FINAL -->
    <div class="scene">

        <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1517841905240-472988babdf9')"></div>

        <h1 class="text-3xl mb-6 z-10">Yến Khang đi cùng chứ? 💖</h1>

        <div class="relative z-10 w-full h-40 flex items-center justify-center">

            <button id="yesBtn" onclick="accept()"
                class="glow bg-pink-500 px-6 py-3 rounded-full text-lg">
                Đi luôn 💖
            </button>

            <button id="noBtn"
                class="absolute bg-gray-500 px-5 py-2 rounded-full">
                Không 😆
            </button>
        </div>

        <p id="trollMsg" class="mt-6 text-sm opacity-70 hidden"></p>

    </div>

    <script>
        let current = 0;
        let scenes = document.querySelectorAll(".scene");

        /* NEXT SCENE */
        function nextScene() {
            if (current < scenes.length - 1) {
                if (navigator.vibrate) navigator.vibrate(10);

                scenes[current].classList.remove("active");
                current++;
                scenes[current].classList.add("active");
            }
        }

        /* TYPING */
        let text = "Tối nay Yến Khang có rảnh không?";
        let i = 0;

        function typeEffect() {
            if (i < text.length) {
                document.getElementById("typingText").innerHTML += text.charAt(i);
                i++;
                setTimeout(typeEffect, 50);
            }
        }
        typeEffect();

        /* HEART */
        setInterval(() => {
            let heart = document.createElement("div");
            heart.className = "heart";
            heart.innerText = "💖";
            heart.style.left = Math.random() * 100 + "vw";
            heart.style.fontSize = (Math.random() * 20 + 20) + "px";
            document.getElementById("hearts").appendChild(heart);
            setTimeout(() => heart.remove(), 6000);
        }, 300);

        /* TROLL BUTTON */
        const noBtn = document.getElementById("noBtn");
        const trollMsg = document.getElementById("trollMsg");

        let angle = 0;
        let moveCount = 0;
        let canClick = false;

        function moveAround() {
            if (canClick) return;

            const radius = 80;
            angle += 0.8;

            const x = Math.cos(angle) * radius;
            const y = Math.sin(angle) * radius;

            noBtn.style.transform = `translate(${x}px, ${y}px)`;

            moveCount++;

            if (moveCount > 15) {
                canClick = true;
                noBtn.style.transform = "translate(120px, 0)";
            }
        }

        noBtn.addEventListener("mouseover", moveAround);
        noBtn.addEventListener("touchstart", (e) => {
            e.preventDefault();
            moveAround();
        });

        noBtn.addEventListener("click", () => {
            if (!canClick) return;

            const messages = [
                "Không hợp lệ 😏",
                "Chọn lại đi ✨",
                "Sai rồi nha 😜",
                "Nút này không có tác dụng 😆"
            ];

            trollMsg.innerText = messages[Math.floor(Math.random() * messages.length)];
            trollMsg.classList.remove("hidden");

            setTimeout(() => accept(), 1500);
        });

        /* ACCEPT */
        function accept() {
            if (navigator.vibrate) navigator.vibrate([50, 50, 50]);

            confetti({
                particleCount: 250,
                spread: 120
            });

            fetch("send.php");

            setTimeout(() => {
                alert("Đã chốt kèo 🎉");
            }, 300);
        }

        /* Hint */
        setTimeout(() => {
            let hint = document.getElementById("hint");
            if (hint) hint.innerText = "chạm tiếp đi ✨";
        }, 2500);
    </script>

</body>

</html>