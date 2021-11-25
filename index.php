<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


</head>



<body>
    <!-- the up part of whole page -->
    <section class="page-up">

        <!-- five windows -->
        <div class="windows">
            <div class="one">
                <ul>
                    <li>
                        <img src="person.jpg" alt="person">
                        <br>
                        <cite>-Jiefu-</cite>
                        <h1>WINDOW 1</h1>
                        <div id="number-1">BUSY</div>
                    </li>
                    <li>
                        <img src="person.jpg" alt="person">
                        <br>
                        <cite>-Jiefu-</cite>
                        <h1>WINDOW 2</h1>
                        <div id="number-2">BUSY</div>
                    </li>
                    <li>
                        <img src="person.jpg" alt="person">
                        <br>
                        <cite>-Jiefu-</cite>
                        <h1>WINDOW 3</h1>
                        <div id="number-3">BUSY</div>
                    </li>
                    <li>
                        <img src="person.jpg" alt="person">
                        <br>
                        <cite>-Jiefu-</cite>
                        <h1>WINDOW 4</h1>
                        <div id="number-4">BUSY</div>
                    </li>
                    <li>
                        <img src="person.jpg" alt="person">
                        <br>
                        <cite>-Jiefu-</cite>
                        <h1>WINDOW 5</h1>
                        <div id="number-5">BUSY</div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- the down-left part of whole page -->
    <section class="page-down-left">
        <p id="shownumber"></p>
        <button onclick="onClick()" id="getnumber">GET NUMBER</button>

    </section>

    <!-- the down-right part of whole page -->
    <section class="page-down-right">
        <h1>Current Number</h1>
        <!-- the box it will display a number will terminate service immediately  -->
        <div id="current_number"></div>

        <!-- This box will display the time remaining for the number to terminate service：5555 -->
        <div class="show-time"> <strong>Waiting Time</strong>
            <h1 id="now-time">00:01:20</h1>
        </div>
    </section>

    <?php include 'src/random.php'; ?>

    <script>
        function onClick() {
            $.ajax( {
                type: "POST",
                url: 'src/random.php',
                data:{action: 'generate'},
                success:function (html) {
                    document.getElementById("shownumber").innerHTML = html;
                }
            });
        }
    </script>
</body>

</html>