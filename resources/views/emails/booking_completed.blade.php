<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Dikonfirmasi - Cuilan Swargi</title>
    <style>
        body { font-family: Georgia, serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .header { background: #2E514B; padding: 36px 40px; text-align: center; }
        .header h1 { color: #FBF7CA; font-size: 24px; margin: 0 0 4px 0; }
        .header p  { color: rgba(251,247,202,0.75); font-size: 13px; margin: 0; }
        .body { padding: 36px 40px; }
        .greeting { font-size: 18px; color: #2E514B; margin-bottom: 16px; }
        .message  { font-size: 15px; color: #444; line-height: 1.7; margin-bottom: 24px; }
        .order-box { background: #F5F5F2; border-left: 4px solid #2E514B; padding: 16px 20px; border-radius: 6px; margin-bottom: 24px; }
        .order-box .label { font-size: 12px; color: #888; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; }
        .order-box .code  { font-size: 22px; font-weight: bold; color: #2E514B; letter-spacing: 0.1em; }
        .details-table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        .details-table td { padding: 8px 0; font-size: 14px; color: #555; border-bottom: 1px solid #eee; }
        .details-table td:first-child { color: #888; width: 120px; }
        .closing { font-size: 15px; color: #444; line-height: 1.7; }
        .footer { background: #2E514B; padding: 20px 40px; text-align: center; }
        .footer p { color: rgba(251,247,202,0.6); font-size: 12px; margin: 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Cuilan Swargi</h1>
            <p>Be Present, Be Authentic, Live Slow</p>
        </div>

        <div class="body">
            <p class="greeting">Halo {{ $booking->name }},</p>

            <p class="message">
                Selamat! Reservasi Anda telah <strong>dikonfirmasi</strong> dan selesai diproses. 
                Terima kasih telah memilih Cuilan Swargi sebagai tempat menginap Anda.
            </p>

            <div class="order-box">
                <div class="label">Kode Pesanan Anda</div>
                <div class="code">{{ $booking->order_code }}</div>
            </div>

            <table class="details-table">
                <tr>
                    <td>Nama</td>
                    <td><strong>{{ $booking->name }}</strong></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $booking->email }}</td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>{{ $booking->phone }}</td>
                </tr>
                <tr>
                    <td>Service</td>
                    <td>{{ $booking->service_name }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><strong style="color:#2E514B;">Completed ✓</strong></td>
                </tr>
            </table>

            <p class="closing">
                Kami sangat senang bisa menjadi bagian dari pengalaman Anda. 
                Sampai jumpa di Cuilan Swargi! 🌿
            </p>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} Cuilan Swargi · Baturraden, Indonesia</p>
        </div>
    </div>
</body>
</html>
