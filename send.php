<?php

$to = "phamle21@gmail.com";
$subject = "Đã chốt kèo 💖";

$message = "
Yến Khang đã đồng ý đi chơi 🎉

Kế hoạch:
- Ăn uống
- Mua sắm
- Đi dạo
";

$headers = "From: no-reply@date.com";

mail($to, $subject, $message, $headers);