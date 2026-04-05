<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Berhasil</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">

    <h2>Terima kasih telah melakukan booking 🙌</h2>

    <p>Halo {{ $booking->name }},</p>

    <p>Booking Anda telah kami terima dengan detail berikut:</p>

    <hr>

    <p><strong>Order Code:</strong> {{ $booking->order_code }}</p>
    <p><strong>Penginapan:</strong> {{ $booking->service_name }}</p>
    <p><strong>Check-in:</strong> {{ \Carbon\Carbon::parse($booking->check_in)->translatedFormat('d F Y') }}</p>
    <p><strong>Check-out:</strong> {{ \Carbon\Carbon::parse($booking->check_out)->translatedFormat('d F Y') }}</p>

    <hr>

    <p>Silakan simpan kode booking ini dan lakukan konfirmasi ke admin melalui WhatsApp.</p>

    <p>Terima kasih</p>

    <p><i>Admin Cuilan Swargi</i></p>

</body>
</html>