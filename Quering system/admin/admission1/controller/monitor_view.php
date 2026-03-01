<?php
session_start();
$number = 10; // total tickets
$current = $_SESSION['current'] ?? 1;

// Function to get letter prefix
function getLetter($num) {
    if($num<=100) return "A";
    if($num<=200) return "B";
    if($num<=300) return "C";
    if($num<=400) return "D";
    if($num<=500) return "E";
    if($num<=600) return "F";
    if($num<=700) return "G";
    if($num<=800) return "H";
    if($num<=900) return "I";
    if($num<=1000) return "J";
    return "";
}

// Prepare 5 tickets to show
$tickets = [];
for($i=0; $i<5; $i++){
    $n = $current + $i;
    if($n > $number) $n -= $number;
    $tickets[] = $n;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ticket Monitor</title>
<style>
:root {
    --bg1: #0f172a;
    --bg2: #020617;
    --card: rgba(2,6,23,0.85);
    --accent: #22c55e;
    --ticket-bg: rgba(2,6,23,0.6);
    --ticket-active: #38eb5c;
    cursor: pointer;
}

body {
    margin:0;
    padding:0;
    font-family:'Courier New', monospace;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    min-height:100vh;
    background: radial-gradient(circle at top, var(--bg1), var(--bg2));
    color:white;
}

#currentTicket {
    font-size: clamp(60px, 12vw, 150px);
    font-weight:bold;
    background: var(--accent);
    color:#000;
    padding: 50px 100px;
    border-radius: 30px;
    text-align:center;
    box-shadow: 0 0 50px var(--ticket-active);
    margin-bottom: 40px;
    transition: all 0.3s ease;
}

#ticketList {
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:20px;
}

.ticket {
    cursor:pointer;
    font-size: clamp(24px,4vw,60px);
    font-weight:bold;
    background: var(--ticket-bg);
    color:#fff;
    padding: 25px 50px;
    border-radius: 20px;
    text-align:center;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
    transition: all 0.2s ease;
}



</style>
</head>
<body>

<div id="currentTicket"><?php echo getLetter($current) . $current; ?></div>
<div id="ticketList">
    <?php foreach($tickets as $i=>$t){ ?>
        <div class="ticket <?php echo $i===0?'active':''; ?>">
            <?php echo getLetter($t) . $t; ?>
        </div>
    <?php } ?>
</div>

<script>
function getLetter(num){
    if(num<=100) return "A";
    if(num<=200) return "B";
    if(num<=300) return "C";
    if(num<=400) return "D";
    if(num<=500) return "E";
    if(num<=600) return "F";
    if(num<=700) return "G";
    if(num<=800) return "H";
    if(num<=900) return "I";
    if(num<=1000) return "J";
    return "";
}

let lastAnnounced = null;

function announceTicket(ticket){
    if(lastAnnounced === ticket) return;
    lastAnnounced = ticket;

    if(speechSynthesis.speaking) speechSynthesis.cancel();

    const letter = ticket.match(/[A-Z]/)[0];
    const number = ticket.match(/\d+/)[0];
    const utterance = new SpeechSynthesisUtterance(`Ticket ${letter} ${number}`);
    utterance.lang = "en-US";
    speechSynthesis.speak(utterance);
}

function fetchCurrent(){
    fetch('update_session.php') 
    .then(res => res.json())
    .then(data => {
        const current = data.current;
        const currentText = getLetter(current) + current;

        document.getElementById('currentTicket').textContent = currentText;
        announceTicket(currentText);

        const listDiv = document.getElementById('ticketList');
        listDiv.innerHTML = '';
        for(let i=0;i<5;i++){
            let n = current + i;
            if(n > <?php echo $number ?>) n -= <?php echo $number ?>;
            const div = document.createElement('div');
            div.className = 'ticket' + (i===0?' active':'');
            div.textContent = getLetter(n) + n;
            listDiv.appendChild(div);
        }
    });
}

fetchCurrent();
setInterval(fetchCurrent,1500);
</script>

</body>
</html>
