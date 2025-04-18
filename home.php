<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    
    
<style>
    .objicon2{
    margin-left: 100px;
    margin-top: 18rem;
}
    body{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        text-transform:capitalize;
        margin:0;
        text-align:justify;
    }
.container{
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 99.5%;
    background-color: transparent;
    transition: 0.3s;
    margin-top: -30px;
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




        </style>
    <title>index</title>
</head>
<body>






<div class="intro">

<div class="container" id="myHeader">
        <div class="logo">
            <img src="logo.png" alt="logo">
        </div>

        
        <div class="nav">
        <a href="home.php" id="lnk1">home</a>
        <a href="login.html" id="lnk2" style="display: none;">login</a>
        
        <a href="events.php" id="lnk4">Events</a>
        <a href="myprof.php" id="lnk5">My Profile</a>
        <a href="logout.php" id="lnk3">Log out</a>
        </div>
    </div>



    <h1 data-aos="fade-right" style="text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.526);">Events Management System</h1>

    <p style="text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.526);">
        Here, you are going to explore our events and activities.
        you will be able to learn, communicate and contribute 
        in the evens that are provided.
        <br><br>
    </p>

</div>

<div class="width70">
<div class="about">
    <div class="abh">
    
        <h1 data-aos="fade-right">About the website</h1>

        <br><br><br><br>
        <br><br><br><br>
        <br><br><br><br>
        <br><br><br><br>

    </div>

    
    <div class="objective">

        <div class="opjcon">


        <h2>Our Message</h2>
    

        
        <br><br><br><br>
        <br><br><br><br>

        <p class="objp" style="text-align: justify;">
           <p class="objp" style="text-align: justify;"> To establish a dynamic and inclusive online platform for
             UTAS-Suhar, fostering a vibrant community where students can seamlessly enroll in events, engage in various activities,
               and stay updated with the latest news and announcements.</p>
               <p class="objp" style="text-align:justify;"> Our
                vision is to create a digital hub that embodies the spirit of
                 innovation, collaboration, and excellence, 
                 enriching the collegiate experience and empowering every student to thrive.</p>
            
        </div>

            <div class="objicon" style="transform: perspective(600px) rotateY(-30deg);">   

                <img src="img/messagefiger.png" alt="message" class="abimg1" data-aos="fade-left" data-aos-duration="700">


            </div>


        </div>

        <br><br><br><br>
        <br><br><br><br>
        <br><br><br><br>
        <br><br><br><br>


    <div class="objective1">

       

            <div class="objicon2" style="transform: perspective(600px) rotateY(30deg);">
    
                <img src="img/Screenshot 2024-05-08 154335.png" data-aos="fade-right"  alt="goal" class="abimg4">

            </div>


            <div class="opjcon1">
                <div style="width: 100%; text-align:right;">
                <h2>Our Goal</h2>
                </div>
                <br><br><br><br>
                <br><br><br><br>
        
                <p class="objp" style="text-align: justify;">
                    <p class="objp" style="text-align: justify;">Our primary objective is to digitize and streamline the process
                     of event enrollment and information dissemination within
                      UTAS-Suhar, leveraging innovative digital solutions to enhance student
                       engagement and facilitate seamless access to campus activities and
                        news updates.</p>
                        <p class="objp" style="text-align: justify;">Through the implementation of intuitive online tools
                         and platforms, we aim to simplify event registration, improve communication channels
                         , and provide students with a centralized hub for accessing comprehensive information
                          about upcoming events.</p></p>
            </div>

</div>




</div>

<section class="respeople">


    <div class="resccc">


        
        <div >
            <section id="card1" class="card">
                
                <div class="card__content">
                  <p class="card__title"><b>Ahmed Nadir</b><br><br>IT Student</p>
                  <div class="card__description">
                    <h4>Events:</h4>
                    <div class="elist">
                    <li>liorem ibslon</li>
                    <li>liorem ibslon</li>
                    <li>liorem ibslon</li>
                    <li>liorem ibslon</li>
                    </div>
                </div>
                </div>
              </section>
              
        </div>

        <div >
            <section id="card1" class="card">
                
                <div class="card__content">
                  <p class="card__title"><b>Ahmed Nadir</b><br><br>IT Student</p>
                  <div class="card__description">
                    <h4>Events:</h4>
                    <div class="elist">
                    <li>OCPC Compitition</li>
                    <li>UTAS - Theatrical Festival</li>
                    <li>Cultures Day</li>
                    <li>UTAS - Chef</li>
                    </div>
                </div>
                </div>
              </section>
              
        </div>

        <div >
            <section id="card1" class="card">
                
                <div class="card__content">
                  <p class="card__title"><b>Ahmed Nadir</b><br><br>IT Student</p>
                  <div class="card__description">
                    <h4>Events:</h4>
                    <div class="elist">
                    <li>liorem ibslon</li>
                    <li>liorem ibslon</li>
                    <li>liorem ibslon</li>
                    <li>liorem ibslon</li>
                    </div>
                </div>
                </div>
              </section>
              
        </div>

    </div>


<div class="rescont" data-aos="fade-up">
<h1>amazing staff</h1>
<p>
    Our college boasts an exceptional team of staff members who excel
     in event management, orchestrating memorable experiences for our
      student body. With meticulous planning and unwavering dedication,
       they ensure every detail is attended to, providing seamless execution and a
        wealth of opportunities for student engagement. Their creativity, professionalism
        , and tireless efforts bring our campus events to life, fostering a vibrant
         and inclusive atmosphere where students can thrive. We are deeply grateful
          for their remarkable contributions, which enrich the collegiate experience and
           unite our community in celebration and camaraderie. 
</p>
</div>
</section>

<section class="news">

    <h1>News</h1>

    <div class="insnews" data-aos="fade-up">

        <div class="newsinfo">
            
            <h3>OCPC Compitition</h3>
            <h3>Alya Al-Harthi</h3>
            <h3>18-11-2023</h3>

        </div>

        <p class="newsdisc">
            UTAS Suhar students, led by teacher Arwa Al-Sariri, participated in the "OCPC Competition"
             on November 18, 2023. With three teams showcasing their coding skills
             , they proudly represented their university. It was an exhilarating experience as
              they competed against other teams, aiming for victory and making UTAS Suhar proud.
        </p>

    </div>

    
    <div class="insnews" data-aos="fade-up">

        <div class="newsinfo1">
            
            <h3>UTAS - Theatrical Festival</h3>
            <h3>Ali Al-Buraiky</h3>
            <h3>28-4-2024</h3>

        </div>

        <p class="newsdisc">
            The theater team, under the guidance of supervisor Ali Al-Buraiky,
             embarked on an exciting journey to Sur to participate in the UTAS - Theatrical Festival
              on April 28, 2024. With their captivating show "Cotard," they mesmerized audiences and
               judges alike. Their stellar performance earned them accolades, with the team
                securing prestigious awards for "Best Secondary Actor" and "Best Theatrical Lighting
                ." Led by their passion for the stage and guided by Ali Al-Buraiky's expertise,
                 the team showcased their talent and creativity, leaving a lasting impression
                  at the festival. Their success not only reflects their
                   hard work but also highlights the vibrant theater culture fostered at UTAS Suhar.
        </p>

    </div>


</section>



</div>

    <footer>
        
        <div class="fotcont">

            <div class="fotcontt">
                <p>University of Technology and Applied Sciences</p>
                <p>PO Box 135, Khawr As Siyabi, Suhar 311</p>
                <p>Sultanate of Oman</p>
            </div>
            <div class="fotcontt">
                <ul class="fcoimg"><img src="img/call.png" width="20px" >&nbsp; +968 22056900</ul>
                <ul class="fcoimg"><img src="img/mail (1).png" width="20px">&nbsp; <a href="mailto:deanoffice.suhar@utas.edu.om" style="text-decoration: none; color: white;">Send us email</a></ul>
                <ul class="fcoimg"><img src="img/pin.png" width="20px">&nbsp; <a href="https://maps.app.goo.gl/Zdt5kuVXi3Kubjj8A" target="_blank" style="text-decoration: none; color: white;">Get Map Direction</a></ul>
            </div>
            <div class="fotcontt1">
                <img class="px" src="img/sohar-white.png"><br><br>
                <img class="px" src="img/broad-white.png">
            </div>


        </div>

        <div>
            <div></div>
        <div class="foco">
            <a href="https://www.instagram.com/cas_sohar/?hl=ar" target="_blank"><img src="img/instagram (2).png" alt="insta" width="50px"></a>
            <a href="https://x.com/UTAS_Suhar" target="_blank"><img src="img/twitter.png" alt="X" width="30px"></a>
            <a href="https://www.linkedin.com/school/utas-suhar/" target="_blank"><img src="img/linkedin-big-logo.png" alt="linkedin" width="30px"></a>
        </div>

        <div></div>

    </div>


    </footer>


</body>
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
</html>