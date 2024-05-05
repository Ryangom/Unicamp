<?php
$page="event";
include("./include/db.php");
include("./include/header.inc.php");
?>
  
    <main>
        <section class="flex align_center justify_center _pg_head pg_event_header"> <!-- Cls need to change --> 
            <h1>Event</h1>
            <span></span>
        </section>

        <section id="pg_event">
            <div class="container ">

                <div class="card_section pg_event_card_sec">

<?php
$sql = "SELECT * FROM  event ";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $date=date_create($row['Date']);
            $start=$row['start_time'];
            $end=$row['end_time'];
            $str=$row['Event_title'];
            $des= substr($str,0,40).'..';
            echo'
            <div class="event_card pg_event_card">
                        <a href="">
                        <div class="event_right_img">
                          <img src="./assets/img/Event_img/'. $row['img'].'" alt="">
                          <div class="a">
                          <span class="text_uppar">'. date_format($date,"F d, Y").'</span>
                          </div>
                        </div>
          
                        <div class="event_right_texts">
                          <h1>'. $des.'</h1>
                          <p class="up_event_time">'. date("g:i A", strtotime($start)).'-'.date("g:i A", strtotime($end)).'</p>
                        </div>
                      </a>
                    </div>
            ';
            
           
        }
    } else{
        echo "No records matching your query were found.";
    }
} 
?>
        
                    
        
                    
                  </div>
            </div>
        </section>
    </main>

    
<?php
$a="home";
include("./include/footer.inc.php");
?>