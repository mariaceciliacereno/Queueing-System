<?php
$number = $_POST["number"] ?? 10;
$default = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Queue Monitor</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- LEFT LIST -->
<div class="list">
    <div class="li">List</div>
    <div class="content">
        <?php
        for ($i = 1; $i <= $number; $i++) {
            if ($i <= 100) {
                echo '<div class="item" id="item-'.$i.'">A'.$i.'</div>';
            } else if ($i <= 200) {
                echo '<div class="item" id="item-'.$i.'">B'.$i.'</div>';
            } else if ($i <= 300) {
                echo '<div class="item" id="item-'.$i.'">C'.$i.'</div>';
            } else if ($i <= 400) {
                echo '<div class="item" id="item-'.$i.'">D'.$i.'</div>';
            } else if ($i <= 500) {
                echo '<div class="item" id="item-'.$i.'">E'.$i.'</div>';
            } else if ($i <= 600) {
                echo '<div class="item" id="item-'.$i.'">F'.$i.'</div>';
            } else if ($i <= 700) {
                echo '<div class="item" id="item-'.$i.'">G'.$i.'</div>';
            } else if ($i <= 800) {
                echo '<div class="item" id="item-'.$i.'">H'.$i.'</div>';
            } else if ($i <= 900) {
                echo '<div class="item" id="item-'.$i.'">I'.$i.'</div>';
            } else if ($i <= 1000) {
                echo '<div class="item" id="item-'.$i.'">J'.$i.'</div>';
            }
        }
        ?>
    </div>
</div>

<!-- MAIN DISPLAY -->
<div class="main">
    <div>
        <div class="label">CURRENT NUMBER</div>
        <div class="card">
            <button class="prev" onclick="prevNumber()">‹</button>
            <div id="displayID"><?php echo "A".$default; ?></div>
            <button class="next" onclick="nextNumber()">›</button>
        </div>
    </div>
</div>
<a href="monitor_view.php"><button class="monitorpath" style="box-shadow: 0 0 10px rgba(255, 255, 255, 0.07); border: 0.1px solid #ffffff33; position: absolute; border-radius:10%; right: 2%; top: 2%; font-style: none; text-decoration: none; background-color: #0f172a; font-size: 20px;">🖥️<br><div style="font-size: 7px; font-family: 'Courier New', Courier, monospace; color: white; cursor: pointer;"><b>Monitor View</b></div></button></a>
<script>
let currentNumber = <?php echo $default; ?>;
let maxNumber = <?php echo $number; ?>;

const display = document.getElementById("displayID");
const items = document.querySelectorAll(".item");

function getLetter(num) {
    if (num <= 100) return "A";
    if (num <= 200) return "B";
    if (num <= 300) return "C";
    if (num <= 400) return "D";
    if (num <= 500) return "E";
    if (num <= 600) return "F";
    if (num <= 700) return "G";
    if (num <= 800) return "H";
    if (num <= 900) return "I";
    if (num <= 1000) return "J";
    return "";
}

function updateDisplay() {
    const letter = getLetter(currentNumber);
    display.textContent = letter + currentNumber;

    items.forEach(item => item.classList.remove("active"));
    const activeItem = document.getElementById("item-" + currentNumber);
    if (activeItem) {
        activeItem.classList.add("active");
        activeItem.scrollIntoView({ behavior: "smooth", block: "center" });
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "update_session.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("current=" + currentNumber);
}

display.addEventListener("click", nextNumber);

function nextNumber() {
    if (currentNumber < maxNumber) {
        currentNumber++;
        updateDisplay();
    }
}

function prevNumber() {
    if (currentNumber > 1) {
        currentNumber--;
        updateDisplay();
    }
}

items.forEach(item => {
    item.addEventListener("click", function() {
        const value = parseInt(this.textContent.replace(/[A-Z]/g, ""));
        currentNumber = value;
        updateDisplay();
    });
});

updateDisplay();
</script>

</body>
</html>
