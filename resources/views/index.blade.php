<!DOCTYPE html>
<html>
<head>
    <title>TaskFlow</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <!-- HEADER FIXO -->
    <div class="header">
        <div class="logo">
            <svg width="40" viewBox="0 0 200 200">
                <rect x="20" y="20" width="160" height="160" rx="30" fill="url(#grad)" />
                <rect x="60" y="70" width="80" height="10" rx="5" fill="white"/>
                <rect x="60" y="100" width="80" height="10" rx="5" fill="white"/>
                <rect x="60" y="130" width="80" height="10" rx="5" fill="white"/>
                <circle cx="45" cy="75" r="6" fill="white"/>
                <circle cx="45" cy="105" r="6" fill="white"/>
                <circle cx="45" cy="135" r="6" fill="#22c55e"/>
                <defs>
                    <linearGradient id="grad" x1="0" y1="0" x2="200" y2="200">
                        <stop offset="0%" stop-color="#0f172a"/>
                        <stop offset="100%" stop-color="#2563eb"/>
                    </linearGradient>
                </defs>
            </svg>
            <span>TaskFlow</span>
        </div>
    </div>
    @yield('conteudo')
</body>
</html>