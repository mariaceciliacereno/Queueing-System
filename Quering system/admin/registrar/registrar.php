<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Main Dashboard</title>

<style>
:root {
    --bg: #0f172a;
    --card: rgba(2,6,23,0.85);
    --accent: #22c55e;
    --muted: #94a3b8;
}

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    height: 100vh;
    background: radial-gradient(circle at top, #0f172a, #020617);
    font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    display: grid;
    place-items: center;
    color: white;
}

.container {
    background: var(--card);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 20px;
    padding: clamp(24px, 4vw, 48px);
    width: min(420px, 92vw);
    box-shadow: 0 30px 80px rgba(0,0,0,0.6);
}
.title {
    text-align: center;
    font-size: clamp(18px, 3vw, 24px);
    letter-spacing: 3px;
    color: var(--muted);
    margin-bottom: 24px;
}

.Number {
    width: 100%;
    padding: 14px 16px;
    border-radius: 12px;
    border: none;
    outline: none;
    font-size: clamp(16px, 2.5vw, 20px);
    font-family: 'Courier New', Courier, monospace;
    margin-bottom: 16px;
}

.actions {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.Sub, .Clear {
    border: none;
    border-radius: 999px;
    padding: 12px 16px;
    font-size: clamp(14px, 2vw, 18px);
    cursor: pointer;
    font-family: 'Courier New', Courier, monospace;
    transition: 0.15s ease;
}

.Sub {
    background: var(--accent);
    color: #052e16;
    font-weight: 700;
}

.Sub:hover {
    transform: translateY(-1px) scale(1.03);
    box-shadow: 0 10px 25px rgba(34,197,94,0.5);
}

.Clear {
    background: rgba(255,255,255,0.08);
    color: white;
}

.Clear:hover {
    background: rgba(255,255,255,0.15);
}

.logout {
    position: fixed;
    top: 16px;
    right: 16px;
    width: 48px;
    height: 48px;
    border-radius: 999px;
    border: none;
    background: rgba(255,255,255,0.08);
    color: white;
    cursor: pointer;
    font-size: 20px;
    transition: 0.15s ease;
}

.logout:hover {
    background: #ef4444;
    transform: scale(1.05);
}
</style>
</head>
<body>

<div class="container">
    <div class="title">QUEUE SETUP</div>

    <form action="controller/registrar maindashboard.php" method="post">
        <input 
            type="number" 
            max="1000" 
            min="1" 
            class="Number" 
            id="number" 
            name="number" 
            placeholder="Enter max queue number"
            required
        >

        <div class="actions">
            <button type="button" class="Clear" onclick="clearInput()">Clear</button>
            <button type="submit" class="Sub">Submit</button>
        </div>
    </form>
</div>

<form action="Database/logout.php">
    <button class="logout" title="Logout">⎋</button>
</form>
<script src="script.js"></script>
</body>
</html>
