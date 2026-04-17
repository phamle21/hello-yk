<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch hẹn tối nay</title>
<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <link href="https://fonts.cdnfonts.com/css/magistral" rel="stylesheet">

    <style>
        body {
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
            background: black;
        }

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

        .bg-img {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            filter: brightness(0.55);
            animation: zoom 25s infinite alternate;
        }

        @keyframes zoom {
            from { transform: scale(1); }
            to { transform: scale(1.1); }
        }

        .glass {
            backdrop-filter: blur(14px);
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 24px 32px;
        }

        .fadeUp {
            animation: fadeUp 0.9s ease forwards;
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

        /* HEART (giảm số lượng + nhẹ hơn) */
        .heart {
            position: absolute;
            animation: floatUp 7s linear infinite;
            opacity: 0.3;
        }

        @keyframes floatUp {
            from { transform: translateY(100vh); }
            to { transform: translateY(-10vh); opacity: 0; }
        }

        .scene * {
            pointer-events: none;
        }
    </style>
</head>

<body class="text-white select-none">

<div id="hearts"></div>

<!-- SCENE 1 -->
<div class="scene active">
    <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1519681393784-d120267933ba')"></div>
    <div class="glass fadeUp">
        <h1 class="text-3xl mb-2">Hello Yến Khang</h1>
        <p class="opacity-70">Tối nay chuẩn bị đi chill nhá</p>
        <p class="text-sm mt-3 opacity-50">chạm để xem tiếp</p>
    </div>
</div>

<!-- SCENE 2 -->
<div class="scene">
    <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1504674900247-0877df9cc836')"></div>
    <div class="glass fadeUp">
        <h2 class="text-2xl mb-3">🛎 18h</h2>
        <p>Toy qua rước, go go go </p>
    </div>
</div>

<!-- SCENE 3 -->
<div class="scene">
    <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1498654896293-37aacf113fd9')"></div>
    <div class="glass fadeUp space-y-2">
        <h2 class="text-2xl mb-2">Đi ăn</h2>

        <p class="opacity-70">Một số chỗ nì</p>

        <p>• Đồ Thái → Little Chiang Mai</p>
        <p>• Mì Ý / beefsteak → Pasta Paradise (Phan Xích Long)</p>
        <p>• Cơm Nhật → Tamago Omurice</p>

        <p>Hoặc đi ăn nướng / buffet gần đó cũng được</p>

        <p class="text-sm opacity-60 mt-2">Tamago với Pasta Paradise ổn áp</p>
    </div>
</div>

<!-- SCENE 4 -->
<div class="scene">
    <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1515562141207-7a88fb7ce338')"></div>
    <div class="glass fadeUp">
        <h2 class="text-2xl mb-2">Sau đó ghé PNJ</h2>
        <p>Shoppingggggggg</p>
    </div>
</div>

<!-- SCENE 5 -->
<div class="scene">
    <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee')"></div>
    <div class="glass fadeUp">
        <h2 class="text-2xl mb-2">Đi dạo</h2>
        <p>Chạy vòng vòng thành phố hoặc đi siêu thị</p>
        <p class="text-sm opacity-60">Chilllllllllllllllllllllll</p>
    </div>
</div>

<!-- FINAL -->
<div class="scene">
    <div class="bg-img" style="background-image:url('https://static.tuoitre.vn/tto/i/s626/2015/04/25/41B6gnc8.jpg')"></div>
    <div class="glass fadeUp">
        <h1 class="text-3xl mb-4">Một buổi tối đơn giản</h1>
        <p class="opacity-80">Đi ăn, đi dạo</p>
        <p class="opacity-80">Không có gì đặc biệt</p>
        <p class="mt-2 text-sm opacity-60">Chỉ là đi cùng nhau thôi</p>
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
                particleCount: 120,
                spread: 90
            });
        }
    }
}

/* CLICK */
document.addEventListener("click", nextScene);
document.addEventListener("touchstart", nextScene);

/* HEART (ít lại) */
setInterval(() => {
    if (Math.random() < 0.5) return; // giảm 50%

    let heart = document.createElement("div");
    heart.className = "heart";
    heart.innerText = "💖";
    heart.style.left = Math.random() * 100 + "vw";
    heart.style.fontSize = (Math.random() * 12 + 16) + "px";
    document.body.appendChild(heart);

    setTimeout(() => heart.remove(), 7000);
}, 600);
</script>

</body>
</html>
