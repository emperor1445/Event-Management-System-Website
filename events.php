<?php
    session_start();
    $usertype=$_SESSION['usertype'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Events</title>
    <style>
        body{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin:0;
            padding:0;
        }
    .container{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 99.5%;
        background-color: transparent;
        transition: 0.3s;
        margin-top: -130px;
        margin-bottom: 30px;
        padding-bottom: 5px;
    }
    .logo{
        display: flex;
        margin: 0px 0px 3px 17px;
    }
    .logo img{
        width: 65px;
    }
    .nav{
        display: flex;
        justify-content: space-around;
        flex-direction: row;
    
    }
    
    .nav a{
        padding-right: 2rem;
        text-decoration: none;
        font-weight: 700;
        font-size: large;
        color: white;
        font-weight: 900;
        transition: 0.3s;
    }
    .nav a:hover{
        transform: scale(1.1);
        transition-duration: 0.6s;
        color: #e06112;
        text-shadow:3px 3px 4px black;
    }
    .px{
        max-width: 269px;
    }
     .sticky{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 99.5%;
        position: fixed;
        top: 0;
        width: 100%;
        color: black;
        background-color:white;
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.569),3px 3px 5px rgba(0, 0, 0, 0.569);
        transition: 0.5s;
        padding-bottom: 5px;
        z-index: 1000; /* or any higher value */
    
     }
     .sticky + .intro{
        margin-top: 110px;
        
     }


     .but {
    padding: 5px 25px;
    font-size: 1rem;
    color: #fff;
    font-weight: 600;
    transition: all .2s;
    position: relative;
    border: none;
    border-radius: 5px;
    background: #443eb3;
    transform: scale(1.1);
  }

.but:before,.but:after {
    content: "";
    position: absolute;
    top: 50%;
    background: #e76e22;
    height: 108%;
    width: 0;
    z-index: -1;
    transition: all .35s;
    transform: translateY(-50%);
    
    
  }
  
  .but:before {
    left: 0%;
    border-radius: 0px 5px 5px 0px;
  }
  
  .but:after {
    right: 0%;
    border-radius: 5px 0px 0px 5px;
    
  }
  
  .but:hover {
    color: #fff;
    box-shadow: #e06112 0 30px 60px -12px inset, #ffffff 0 18px 36px -18px inset, 7px 7px 3px  #443eb3;
    z-index: 2;
  }
  
  .but:hover::before {
    width: 50%;
    left: 50%;
  }
  
  .but:hover::after {
    width: 50%;
    right: 50%;
  }  


     
     .btnstf{
        width: 100%;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
     }
     #btnlft{
        margin: 10px 30px;
        background: none;
        border: none;
     }
     #btnlft img{
        width: 35px;
     }
    
     
    
     #btnlft img:hover{
        transform: scale(1.1);
        transition: 0.5s;
        filter: drop-shadow(2px 2px 3px rgba(0, 0, 0, 0.421));
     }
    
     .abimg1{
        width: 550px;
        filter: drop-shadow(3px 3px 3px);
        border-radius: 15px;
        transform: perspective(600px) rotateY(-30deg);
    }
     #btnrt{
        margin: 10px 70px;
        background: none;
        border: none;
     }
     
    .objective{
        display: flex;
        justify-content: space-around;
        flex-direction: row;
        text-align: center;
        align-items: flex-end;
        
    }
     #btnrt img{
        width: 35px;
     }
    
     
     #btnrt img:hover{
        transform: scale(1.1);
        transition: 0.5s;
        filter: drop-shadow(2px 2px 3px rgba(0, 0, 0, 0.421));
     }
    
     
footer{
    margin-top: 100px;
    color: white;
    display: flex;
    justify-content: center;
    flex-direction: column;
    background-color: #e06112;
    padding: 5% 0% 0% 0%;
}
.fotcont{
    font-size: large;
    color: white;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-bottom: 25px;
    margin-right: 25px;
}

.fotcontt{
    color: white;
}
.fotcontt1{
    max-width: 269px;
}
.px{
    max-width: 269px;
}


     .foco {
        width: 100%;
        background-color: #bc5312;
        color: white;
        display: flex;
        box-sizing: border-box;
        justify-content: space-around;
        align-content: center;
        align-items: center;
        margin-top: 10px;
    }
    
    
    section.card {
      position: relative;
      width: 350px;
      height: 350px;
      background-image: url(img/ahmed.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      perspective: 1000px;
      transition: all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 16px #000000;
      background-color: #f2f2f2;
      color: #ffffff;
    }
    
    .card__content {
      color: #000000;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      padding: 20px;
      box-sizing: border-box;
      background-color: #f2f2f2;
      transform: rotateX(-90deg);
      transform-origin: bottom;
      transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .card:hover .card__content {
      transform: rotateX(0deg);
    }
    
    .card__title {
      margin: 0;
      padding-left: 5px;
      font-size: 18px;
      color: #000000;
      font-weight: 700;
    }
    
    
    
    .card__description {
      margin: 10px ;
      display: flex;
      flex-direction: column;
      font-size: 16px;
      color: #000000;
      line-height: 1.4;
      list-style: square;
      
    }
    .elist{
        padding-bottom: 15px;
        color: #e06112;
    }
    /* Commands to change the shadows in dark mode
    @media (prefers-color-scheme: dark) {
      .card:hover {
      box-shadow: 0 8px 16px #000000;
      }
    }*/

    /* Event styles */
.event {
    padding: 20px;
}
.evgrp {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 20px; /* زيادة الفجوة قليلاً للتأكد من وجود مسافة كافية بين البطاقات */
}

.enin {
    background-color: #FFFFFF;
    box-shadow: 4px 4px 20px #3d4e9c;
    border-radius: 10px;
    width: 40%; /* زيادة العرض لجعل البطاقات أكبر */
    margin: 10px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
}

.enin:hover img {
    transform: scale(1.8);
    filter: blur(4px) brightness(90%) ;
}

.enin img {
    width: 100%;
    transition: transform 0.3s ease-in-out, filter 0.3s ease-in-out;
}

.event-info {
    padding: 15px;
    text-align: center;
    transition: opacity 0.3s ease-in-out;
}

.enin:hover .event-info {
    opacity: 0;
}

.event-details {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    display: none;
}

.enin:hover .event-details {
    display: block;
}

.evgrp {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.evimg{
    width: min-content;
}


.enin {
    
    position: relative;
    background-color: #FFFFFF;
    box-shadow: 4px 4px 20px #3d4e9c;
    border-radius: 10px;
    width: 45%;
    margin: 10px auto;
    margin-right: 21px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
}




.enin:hover img {
    transform: scale(2);
    filter: blur(4px) brightness(20%);
    
}

.enin img {
    max-width: 100%;
    max-height:350px ;
    transition: transform 0.3s ease-in-out, filter 0.3s ease-in-out;
}

.event-info {
    padding: 15px;
    width: 100%;
    text-align: center;
    transition: opacity 0.3s ease-in-out;
    opacity: 1;
}

.enin:hover .event-info {
    opacity: 0;
}

.event-details {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    display: none;
}

.enin:hover .event-details {
    display: block;
}

.h2{ color: #E91E63}



#pagination {
    text-align: center; /* توسيط أزرار التنقل */
    margin-top: 20px; /* إضافة مسافة بين الأزرار وبطاقات الأحداث */
}

#pagination button {
    padding: 5px 10px; /* تحديد حجم الأزرار */
    margin-right: 5px; /* مسافة بين الأزرار */
    background-color: #3d4e9c; /* لون الخلفية للأزرار */
    border: none; /* لا حدود للأزرار */
    color: white; /* لون النص */
    border-radius: 5px; /* الحواف الدائرية للأزرار */
    cursor: pointer; /* تغيير شكل المؤشر إلى يد عند المرور على الأزرار */
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.519);
}

#pagination button:hover {
    background-color: #0056b3; /* تغيير لون الخلفية عند المرور بالمؤشر */
    transform: scale(1.1);
    transition: 0.8s;
}

    
    
    
.intro{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 25% 0%;
    height: 600px;
    background:
    linear-gradient(to bottom, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0)),
    url('img/Eventint.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: rgb(255, 255, 255);
    box-shadow: 3px 5px 7px rgba(0, 0, 0, 0.555);
    margin-bottom: 100px;


}
    
            </style>
    
    
</head>
<body>

    <div class="intro">

        <div class="container" id="myHeader">
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
    
            
            <div class="nav">
            <a href="home.php" id="lnk1">home</a>
            <a href="events.php" id="lnk3">Events</a>
            <a href="myprof.php" id="lnk4">My profile</a>
            <a href="logout.php" id="lnk2">logout</a>
            </div>
        </div>

        <div style="display: flex; justify-content: center; align-items: center;">
        <h1 style="text-shadow: 5px 3px 6px #e06112; font-size: 3rem;">Amazing Events</h1>
</div>
    </div>


    <section class="event">
        
        <div class="evgrp">


        <?php
        include('dbconnection.php');


        function getFirst20Words($str) {
            // Split the string into words
            $words = explode(' ', $str);
        
            // Extract the first 20 words
            $first_20_words = array_slice($words, 0, 20);
        
            // Join the first 20 words back into a string
            $result = implode(' ', $first_20_words);
        
            return $result;
        }


        $sql="SELECT * from event ORDER BY EID DESC;";
        $stmt=$conn->query($sql);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $n=$stmt->rowCount();
        foreach($rows as $row){
            echo "<div class=enin>";
            echo "<img src=\"img/uploaded/eventimg/{$row['EIMG']}\" class=\"evimg\">";
            echo "<div class=\"event-info\">";
            echo "<p>Event name: {$row['EName']}</p>";
            echo "<p>Event date: from {$row['StartDate']} to {$row['EndDate']}</p>";
            echo "</div>";
            echo "<div class=\"event-details\">";
            echo "<p>".getFirst20Words($row['EDisc'])."...</p>";
            echo "<form action=\"evins.php\" method=\"get\">";
            echo "<input type=\"hidden\" name=\"EID\" value=\"{$row['EID']}\">";
            echo "<button type=\"submit\" class=\"but\" name=\"more\">View Details</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        

        ?>

            
            <div class="enin" onclick="location.href='evins.html';">
                <img src="img/bg.jpg" class="evimg">
                <div class="event-info">
                    <p>اسم الفعالية: ليلة الفنون</p>
                    <p>تاريخ الفاعلية: 30 أبريل</p>
                </div>
                <div class="event-details">
                    <p>ليلة الفنون تحتفي بالمواهب الفنية الناشئة من خلال معرض يضم أعمالاً فنية متنوعة تغطي جوانب متعددة من الفن الحديث والتقليدي.</p>
                
                    
                </div>
            </div>
            
            <div class="enin" onclick="location.href='evins.html';">
                <img src="img/bg.jpg" class="evimg">
                <div class="event-info">
                    <p>اسم الفعالية: ماراثون الجري</p>
                    <p>تاريخ الفاعلية: 10 يونيو</p>
                </div>
                <div class="event-details">
                    <p>انضم إلينا في ماراثون الجري للتنافس والاستمتاع في مسارات مصممة خصيصاً لتشجيع الرياضة والصحة العامة.</p>
                </div>
            </div>
            
            <div class="enin" onclick="location.href='evins.html';">
                <img src="img/bg.jpg" class="evimg">
                <div class="event-info">
                    <p>اسم الفعالية: مؤتمر التكنولوجيا</p>
                    <p>تاريخ الفاعلية: 25 نوفمبر</p>
                </div>
                <div class="event-details">
                    <p>مؤتمر التكنولوجيا يستقطب خبراء الصناعة لمناقشة التقدم التكنولوجي الأحدث وتأثيره على مجتمعاتنا اليوم.</p>
                </div>
            </div>
            <div class="enin" onclick="location.href='evins.html';">
                <img src="img/bg.jpg" class="evimg">
                <div class="event-info">
                    <p>Name: asladkjx</p>
                    <p>Name: asladkjx</p>
                </div>
                <div class="event-details">
                    <p>Detailed event description here...</p>
                </div>
            </div>
            <div class="enin" onclick="location.href='evins.html';">
                <img src="img/bg.jpg" class="evimg">
                <div class="event-info">
                    <p>Name: asladkjx</p>
                    <p>Name: asladkjx</p>
                </div>
                <div class="event-details">
                    <p>Detailed event description here...</p>
                </div>
            </div>
            <div class="enin" onclick="location.href='evins.html';">
                <img src="img/bg.jpg" class="evimg">
                <div class="event-info">
                    <p>Name: asladkjx</p>
                    <p>Name: asladkjx</p>
                </div>
                <div class="event-details">
                    <p>Detailed event description here...</p>
                </div>
            </div>
            <div class="enin" onclick="location.href='evins.html';">
                <img src="img/bg.jpg" class="evimg">
                <div class="event-info">
                    <p>Name: asladkjx</p>
                    <p>Name: asladkjx</p>
                </div>
                <div class="event-details">
                    <p>Detailed event description here...</p>
                </div>
            </div>
            <div class="enin" onclick="location.href='evins.html';">
                <img src="img/bg.jpg" class="evimg">
                <div class="event-info">
                    <p>Name: asladkjx</p>
                    <p>Name: asladkjx</p>
                </div>
                <div class="event-details">
                    <p>Detailed event description here...</p>
                </div>
            </div>
            <div class="enin">
                <img src="img/bg.jpg" class="evimg">
                <div class="event-info">
                    <p>Name: asladkjx</p>
                    <p>Name: asladkjx</p>
                </div>
                <div class="event-details">
                    <p>Detailed event description here...</p>
                </div>
            </div>
        </div>
        <div id="pagination">
            <button id="prevPage">&laquo; Previous</button> <!-- زر الصفحة السابقة -->
            <!-- أزرار الصفحات الرقمية سيتم إنشاؤها هنا بواسطة JavaScript -->
            <button id="nextPage">Next &raquo;</button> <!-- زر الصفحة التالية -->
        </div>
    </section>

    <footer>
        
        <div class="fotcont">

            <div class="fotcontt">
                <p>University of Technology and Applied Sciences</p>
                <p>PO Box 135, Khawr As Siyabi, Suhar 311</p>
                <p>Sultanate of Oman</p>
            </div>
            <div class="fotcontt">
                <ul class="fcoimg"><img src="img/call.png" width="20px" >&nbsp; +968 22056900</ul>
                <ul class="fcoimg"><img src="img/mail (1).png" width="20px">&nbsp; Send us email</ul>
                <ul class="fcoimg"><img src="img/pin.png" width="20px">&nbsp; Get Map Direction</ul>
            </div>
            <div class="fotcontt1">
                <img class="px" src="img/sohar-white.png"><br><br>
                <img class="px" src="img/broad-white.png">
            </div>


        </div>

        <div>
            <div></div>
        <div class="foco">
            <img src="img/instagram (2).png" alt="insta" width="50px">
            <img src="img/twitter.png" alt="X" width="30px">
            <img src="img/linkedin-big-logo.png" alt="linkedin" width="30px">
        </div>

        <div></div>

    </div>


    </footer>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    const cardsPerPage = 6;
    const container = document.querySelector(".evgrp");
    const cards = Array.from(container.children);
    const totalPages = Math.ceil(cards.length / cardsPerPage);
    let currentPage = 1; // الصفحة الحالية

    function showPage(page) {
        if (page < 1 || page > totalPages) return; // تأكد من أن الصفحة ضمن الحدود
        currentPage = page; // تحديث الصفحة الحالية
        container.innerHTML = ''; // إزالة البطاقات الحالية
        const start = (page - 1) * cardsPerPage;
        const end = start + cardsPerPage;
        cards.slice(start, end).forEach(card => {
            container.appendChild(card);
        });
    }

    function setupPagination() {
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = ''; // إزالة الأزرار الحالية

        // زر الانتقال للصفحة السابقة
        const prevBtn = document.createElement('button');
        prevBtn.textContent = '«';
        prevBtn.onclick = () => showPage(currentPage - 1);
        pagination.appendChild(prevBtn);

        // أزرار الترقيم
        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement('button');
            btn.textContent = i;
            btn.className = currentPage === i ? 'active' : ''; // تمييز الصفحة الحالية
            btn.onclick = () => showPage(i);
            pagination.appendChild(btn);
        }

        // زر الانتقال للصفحة التالية
        const nextBtn = document.createElement('button');
        nextBtn.textContent = '»';
        nextBtn.onclick = () => showPage(currentPage + 1);
        pagination.appendChild(nextBtn);
    }

    setupPagination();
    showPage(1); // عرض الصفحة الأولى في البداية
});

        
        </script>
        <script>
            window.onscroll = function() {myFunction()};
            
            var header = document.getElementById("myHeader");
            var sticky = header.offsetTop;
            
            
            function myFunction() {
              if (window.pageYOffset > sticky) {
                header.setAttribute("class","sticky");
                document.getElementById("lnk1").style.color= "black";
                document.getElementById("lnk2").style.color= "black";
                document.getElementById("lnk3").style.color= "black";
                document.getElementById("lnk4").style.color= "black";
                document.getElementById("lnk5").style.color= "black";
              } else {
                header.setAttribute("class","container");
                document.getElementById("lnk1").style.color= "white";
                document.getElementById("lnk2").style.color= "white";
                document.getElementById("lnk3").style.color= "white";
                document.getElementById("lnk4").style.color= "white";
                document.getElementById("lnk5").style.color= "white";
                
              }
            }
            </script>
            <script>
                AOS.init();
              </script>